<?php

namespace Eightfold\Markup\UIKit\Elements\FormControls;

// use Eightfold\Html\Elements\HtmlElement;

// use Eightfold\HtmlComponent\Component;
use Eightfold\Markup\Html;
use Eightfold\Markup\UIKit;

class StripeElements
{
    private $formId = '';
    private $apiKey = '';
    private $inputLabel = '';
    private $buttonLabel = '';

    public function __construct(
        string $formId,
        string $apiKey,
        string $inputLabel,
        string $buttonLabel)
    {
        $this->formId = $formId;
        $this->apiKey = $apiKey;
        $this->inputLabel = $inputLabel;
        $this->buttonLabel = $buttonLabel;
    }

    public function unfold(): string
    {
        $javascript = self::script($this->formId, $this->apiKey);

        return Html::div(
              Html::label($this->inputLabel)
                ->attr('for '. $this->formId .'-label')
            , Html::span()->attr('id '. $this->formId .'-errors')
            , Html::div()->attr('id '. $this->formId .'-element')
            , UIKit::ef_button($this->buttonLabel)
            , $javascript
        )->unfold();
    }

    private static function script(string $formId, string $apiKey)
    {
        $id = $formId;
        $cardForm = self::formIdToJavaScriptVar($id);
        $cardFor = self::cardforVar($id);
        $apiKey = $apiKey;
        $styles = self::stripeStyles($formId);

        return Html::script(
            // Create a Stripe client
            'const stripeFor'. $cardForm .' = Stripe(\''. $apiKey .'\'); '.

            // Create an instance of Elements
            'const elementsFor'. $cardForm .' = stripeFor'. $cardForm .'.elements(); '.

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            $styles .' '.

            // Create an instance of the card Element
            'const '. $cardFor .' = elementsFor'. $cardForm .
                '.create(\'card\', '.
                '{style: '. $cardForm .'Style}); '.

            // Add an instance of the card Element into the `card-element` <div>
            $cardFor .'.mount(\'#'. $id .'-element\');'.

            // Handle real-time validation errors from the card Element.
            $cardFor .'.addEventListener(\'change\', function(event) {'.
              'var displayError = document.getElementById(\'card-errors\');'.
              'if (event.error) {'.
                'displayError.textContent = event.error.message;'.
              '} else {'.
                'displayError.textContent = \'\';'.
              '}'.
            '});'.

            // Initialize token handler - pre-submit
            'const '. $cardForm .'TokenHandler = function(token) {'.
                'const form = document.getElementById(\''. $id .'\');'.
                'const hiddenInput = document.createElement(\'input\');'.
                'hiddenInput.setAttribute(\'type\', \'hidden\');'.
                'hiddenInput.setAttribute(\'name\', \'stripeToken\');'.
                'hiddenInput.setAttribute(\'value\', token.id);'.
                'form.appendChild(hiddenInput);'.
                'form.submit();'.
            '};',

            // Handle form submission
            'const '. $cardForm .' = document.getElementById(\''. $id .'\');'.
            $cardForm .'.addEventListener(\'submit\', function(event) {'.
              'event.preventDefault();'.

              'stripeFor'. $cardForm .'.createToken('. $cardFor .').then(function(result) {'.
                'if (result.error) {'.
                  // Inform the user if there was an error
                  'var errorElement = document.getElementById(\'card-errors\');'.
                  'errorElement.textContent = result.error.message;'.
                '} else {'.
                  // Send the token to your server
                  $cardForm .'TokenHandler(result.token);'.
                '}'.
              '});'.
            '});'
        )->attr('type text/javascript');
    }
    static private function formIdToJavaScriptVar(string $formId): string
    {
        return str_replace('-', '', $formId);
    }

    static private function cardforVar(string $formId): string
    {
        return 'cardfor'. self::formIdToJavaScriptVar($formId);
    }

    static private function stripeStyles(string $formId): string
    {
        // TODO: Deprecate once styles are in place.
        $config = [];

        $const = self::formIdToJavaScriptVar($formId);

        $baseColor = (isset($config['font-color']))
            ? 'color:\''. $config['font-color'] .'\''
            : 'color:\'#32325d\'';
        $lineHeight = (isset($config['line-height']))
            ? 'lineHeight:\''. $config['line-height'] .'\''
            : 'lineHeight:\'24px\'';
        $fontFamily = (isset($config['font-family']))
            ? 'fontFamily:\''. $config['font-family'] .'\''
            : 'fontFamily:\'"Helvetica Neue", Helvetica, sans-serif\'';
        $fontSmoothing = (isset($config['font-smoothing']))
            ? 'fontSmoothing:\''. $config['font-smoothing'] .'\''
            : 'fontSmoothing: \'antialiased\'';
        $fontSize = (isset($config['font-size']))
            ? 'fontSize:\''. $config['font-size'] .'\''
            : 'fontSize:\'16px\'';
        $placeholderColor = (isset($config['placeholder-color']))
            ? 'color:\''. $config['placeholder-color'] .'\''
            : 'color:\'#aab7c4\'';
        $invalidColor = (isset($config['invalid-color']))
            ? 'color:\''. $config['invalid-color'] .'\''
            : 'color:\'#fa755a\'';
        $invalidIconColor = (isset($config['invalid-icon-color']))
            ? 'iconColor:\''. $config['invalid-icon-color'] .'\''
            : 'iconColor:\'#fa755a\'';

        // $create = 'const cardfor'. $const .'='.
        //     $const .'elements.create(\'card\',{style: '. $const .'Style});';

        return 'const '. $const .'Style={'.
            'base:{'.
                $baseColor .','.
                $lineHeight .','.
                $fontFamily .','.
                $fontSmoothing .','.
                $fontSize .','.
                '\'::placeholder\':{'.
                    $placeholderColor .
                '}'.
            '},'.
            'invalid:{'.
                $invalidColor .','.
                $invalidIconColor .
            '}'.
        '};';
        // $create;
    }
}
