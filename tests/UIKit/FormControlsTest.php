<?php

namespace Eightfold\Markup\Tests\UIKit;

use PHPUnit\Framework\TestCase;

use Carbon\Carbon;

use Eightfold\Markup\UIKit;
use Eightfold\Markup\UIKit\FormControls\InputText;

class FormControlsTest extends TestCase
{
    public function testFlowsToHtml()
    {
        $expected = '<input type="text" placeholder="hello">';
        $actual = UIKit::input()->attr("type text", "placeholder hello");
        $this->assertEquals($expected, $actual->unfold());
    }

    // public function testFileInputBase()
    // {
    //     $expected = '<div><label for="some_file">Label</label><input id="some_file" type="file" name="some_file" required></div>';
    //     $result = UIKit::fileInput('Label', 'some_file')->unfold();
    //     $this->assertEquals($expected, $result);
    // }

    // public function testHiddenInputBase()
    // {
    //     $expected = '<input type="hidden" name="input_name" value="input_value">';
    //     $result = UIKit::hiddenInput('input_name', 'input_value')->unfold();
    //     $this->assertEquals($expected, $result);
    // }

    // public function testStripeElementsBase()
    // {
    //     $expected = "<div><label for=\"this_form-label\">Input label</label><span id=\"this_form-errors\"></span><div id=\"this_form-element\"></div><ef-button>Button label</ef-button><script type=\"text/javascript\">const stripeForthis_form = Stripe('MY_API_KEY'); const elementsForthis_form = stripeForthis_form.elements(); const this_formStyle={base:{color:'#32325d',lineHeight:'24px',fontFamily:'\"Helvetica Neue\", Helvetica, sans-serif',fontSmoothing: 'antialiased',fontSize:'16px','::placeholder':{color:'#aab7c4'}},invalid:{color:'#fa755a',iconColor:'#fa755a'}}; const cardforthis_form = elementsForthis_form.create('card', {style: this_formStyle}); cardforthis_form.mount('#this_form-element');cardforthis_form.addEventListener('change', function(event) {var displayError = document.getElementById('card-errors');if (event.error) {displayError.textContent = event.error.message;} else {displayError.textContent = '';}});const this_formTokenHandler = function(token) {const form = document.getElementById('this_form');const hiddenInput = document.createElement('input');hiddenInput.setAttribute('type', 'hidden');hiddenInput.setAttribute('name', 'stripeToken');hiddenInput.setAttribute('value', token.id);form.appendChild(hiddenInput);form.submit();};</script></div>";
    //     $result = UIKit::stripeElements(
    //           'this_form'
    //         , 'MY_API_KEY'
    //         , 'Input label'
    //         , 'Button label')->unfold();
    //     $this->assertEquals($expected, $result);
    // }
}
