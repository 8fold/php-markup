<?php

namespace Eightfold\UIKit\Tests;

use Eightfold\UIKit\Tests\BaseTest;

use Carbon\Carbon;

use Eightfold\UIKit\UIKit;
use Eightfold\UIKit\FormControls\InputText;

class FormControlsTest extends BaseTest
{
    public function testFormBase()
    {
        $expected = '<form action="/somewhere" method="post"><div is="ef-form-control"><label for="hello">Hello, Label</label><input id="hello" type="text" name="hello" required></div></form>';
        $result = UIKit::form(
            'post /somewhere',
            UIKit::textInput('Hello, Label', 'hello')
        )->compile();
        $this->assertEquals($expected, $result);
    }

    public function testSelect()
    {
        // $expected = '<div is="ef-form-control"><label for="my_name">Some label</label><select id="my_name" name="my_name"><option value="key" selected>value</option></select></div>';
        // $result = UIKit::select(
        //       'Some label'
        //     , 'my_name'
        //     , ['key']
        //     , 'Select something...'
        // )->options('key value')->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testSelectCheckbox()
    {
        // $expected = '<fieldset is="ef-form-control" class="fieldset-inputs"><legend>Some label</legend><ul class="ef-unstyled-list"><li><input id="something" type="checkbox" name="my_name[]" value="something" checked><label for="something">value</label></li></ul></fieldset>';
        // $result = UIKit::select(
        //       'Some label'
        //     , 'my_name'
        //     , ['something']
        //     , 'Select something...'
        // )->options('something value')->checkbox()->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testTextarea()
    {
        // $expected = '<div is="ef-form-control"><label for="comment">Say something</label><textarea id="comment" name="comment" placeholder="Some example text" required>Hello, World!</textarea></div>';
        // $result = UIKit::textarea(
        //     'Say something',
        //     'comment',
        //     'Hello, World!',
        //     'Some example text'
        // )->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testEfTextareaMarkdown()
    {
        // $expected = '<div is="ef-form-control"><label for="comment">Say something</label><textarea id="comment" name="comment" placeholder="Some example text" required>Hello, World!</textarea><script>var simplemde = new SimpleMDE({element: document.getElementById("comment-editor"), autoDownloadFontAwesome: false, hideIcons: [\'heading\', \'image\']});</script></div>';
        // $result = UIKit::markdown_textarea(
        //     'Say something',
        //     'comment',
        //     'Hello, World!',
        //     'Some example text'
        // )->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testButtonPrimary()
    {
        $expected = '<button is="ef-button">hello</button>';
        $result = UIKit::button('hello')->compile();
        $this->assertEquals($expected, $result);
    }

    public function testButtonSecondary()
    {
        // $expected = '<button is="ef-button" class="secondary">hello</button>';
        // $result = UIKit::button('hello')->secondary()->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testTextInputBase()
    {
        // $expected = '<div is="ef-form-control"><label for="hello">Hello</label><input id="hello" type="text" name="hello" value="Hello, World!" placeholder="Howdy, World!" required></div>';
        // $result = UIKit::textInput(
        //     'Hello',
        //     'hello',
        //     'Hello, World!',
        //     'Howdy, World!'
        // )->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testTextInputHint()
    {
        // $expected = '<div is="ef-form-control"><label for="hello">Hello</label><span is="ef-form-hint" id="hello-hint-text">This is a hint</span><input id="hello" type="text" name="hello" value="Hello, World!" aria-describedby="hello-hint-text" placeholder="Howdy, World!" required></div>';
        // $result = UIKit::textInput(
        //     'Hello',
        //     'hello',
        //     'Hello, World!',
        //     'Howdy, World!'
        // )->hint('This is a hint')->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testTextInputError()
    {
        // $expected = '<div is="ef-form-control" class="error"><label for="hello">Hello</label><span is="ef-form-hint" id="hello-hint-text">This is a hint</span><span is="ef-input-error-message" id="hello-error-message">This is an error</span><input id="hello" type="text" name="hello" value="Hello, World!" aria-describedby="hello-error-message" placeholder="Howdy, World!" required></div>';
        // $result = UIKit::textInput(
        //     'Hello',
        //     'hello',
        //     'Hello, World!',
        //     'Howdy, World!'
        // )->hint('This is a hint')->error('This is an error')->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testDateInputBase()
    {
        // $expected = '<fieldset is="ef-form-control" class="fieldset-inputs"><legend>My date</legend><div class="ef-date-of-birth"><div is="ef-form-control"><label for="my_date-month">Month</label><input id="my_date-month" class="input-inline" type="number" name="my_date-month" value="12" max="12" min="1" placeholder="1" required></div><div is="ef-form-control"><label for="my_date-day">Day</label><input id="my_date-day" class="input-inline" type="number" name="my_date-day" value="15" max="31" min="1" placeholder="1" required></div><div is="ef-form-control"><label for="my_date-year">Year</label><input id="my_date-year" class="input-inline" type="number" name="my_date-year" value="2016" max="3017" min="1900" placeholder="2015" required></div></div></fieldset>';
        // $result = UIKit::date_input(
        //       'My date'
        //     , 'my_date'
        //     , Carbon::create(2016, 12, 15, 0, 0, 0)
        //     , Carbon::create(2015, 01, 01, 0, 0, 0)
        // )->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testDateInputHint()
    {
        // $expected = '<fieldset is="ef-form-control" class="fieldset-inputs"><legend>My date</legend><span is="ef-form-hint" id="my_date-hint-text">My date hint</span><div class="ef-date-of-birth"><div is="ef-form-control"><label for="my_date-month">Month</label><input id="my_date-month" class="input-inline" type="number" name="my_date-month" value="12" aria-describedby="my_date-hint-text" max="12" min="1" placeholder="1" required></div><div is="ef-form-control"><label for="my_date-day">Day</label><input id="my_date-day" class="input-inline" type="number" name="my_date-day" value="15" aria-describedby="my_date-hint-text" max="31" min="1" placeholder="1" required></div><div is="ef-form-control"><label for="my_date-year">Year</label><input id="my_date-year" class="input-inline" type="number" name="my_date-year" value="2016" aria-describedby="my_date-hint-text" max="3017" min="1900" placeholder="2015" required></div></div></fieldset>';
        // $result = UIKit::date_input(
        //       'My date'
        //     , 'my_date'
        //     , Carbon::create(2016, 12, 15, 0, 0, 0)
        //     , Carbon::create(2015, 01, 01, 0, 0, 0)
        // )->hint('My date hint')->compile();
        // $this->assertEquals($expected, $result);
    }

    public function testDateInputError()
    {
    //     $expected = '<fieldset is="ef-form-control" class="fieldset-inputs error"><legend>My date</legend><span is="ef-form-hint" id="my_date-hint-text">My date hint</span><span is="ef-input-error-message" id="my_date-error-message">My date error</span><div class="ef-date-of-birth"><div is="ef-form-control"><label for="my_date-month">Month</label><input id="my_date-month" class="input-inline" type="number" name="my_date-month" value="12" aria-describedby="my_date-error-message" max="12" min="1" placeholder="1" required></div><div is="ef-form-control"><label for="my_date-day">Day</label><input id="my_date-day" class="input-inline" type="number" name="my_date-day" value="15" aria-describedby="my_date-error-message" max="31" min="1" placeholder="1" required></div><div is="ef-form-control"><label for="my_date-year">Year</label><input id="my_date-year" class="input-inline" type="number" name="my_date-year" value="2016" aria-describedby="my_date-error-message" max="3017" min="1900" placeholder="2015" required></div></div></fieldset>';
    //     $result = UIKit::date_input(
    //           'My date'
    //         , 'my_date'
    //         , Carbon::create(2016, 12, 15, 0, 0, 0)
    //         , Carbon::create(2015, 01, 01, 0, 0, 0)
    //     )->error('My date error')->hint('My date hint')->compile();
    //     $this->assertEquals($expected, $result);
    }

    public function testProgressBase()
    {
        // $expected = '<div is="ef-progress" class="membership-level"><div><p>Double</p></div><div><p>135</p></div><div><p>Quad</p></div><progress value="100" max="200"></progress><div><p><a href="/test">contribute</a></p></div><div><p><a href="/test">transfer</a></p></div><div><p><a href="/test">history</a></p></div></div>';
        // $result = UIKit::progress(100, 0, 200)
        //     ->labels('Double', '135', 'Quad')
        //     ->links(
        //         ['contribute', '/test'],
        //         ['transfer', '/test'],
        //         ['history', '/test']
        //     )->compile('class membership-level');
        // $this->assertEquals($expected, $result);
    }

    public function testTextInputTypes()
    {
        $expected = '<div is="ef-form-control"><label for="test">Hello</label><input id="test" type="password" name="test" required></div>';
        $result = UIKit::textInput(
              'Hello'
            , 'test'
        )->password()->compile();
        $this->assertEquals($expected, $result);
    }

    public function testFileInputBase()
    {
        $expected = '<div is="ef-form-control"><label for="some_file">Label</label><input id="some_file" type="file" name="some_file" required></div>';
        $result = UIKit::fileInput('Label', 'some_file')->compile();
        $this->assertEquals($expected, $result);
    }

    public function testHiddenInputBase()
    {
        $expected = '<input type="hidden" name="input_name" value="input_value">';
        $result = UIKit::hiddenInput('input_name', 'input_value')->compile();
        $this->assertEquals($expected, $result);
    }

    public function testStripeElementsBase()
    {
        $expected = "<div><label for=\"this_form-label\">Input label</label><span id=\"this_form-errors\"></span><div id=\"this_form-element\"></div><ef-button>Button label</ef-button><script type=\"text/javascript\">const stripeForthis_form = Stripe('MY_API_KEY'); const elementsForthis_form = stripeForthis_form.elements(); const this_formStyle={base:{color:'#32325d',lineHeight:'24px',fontFamily:'\"Helvetica Neue\", Helvetica, sans-serif',fontSmoothing: 'antialiased',fontSize:'16px','::placeholder':{color:'#aab7c4'}},invalid:{color:'#fa755a',iconColor:'#fa755a'}}; const cardforthis_form = elementsForthis_form.create('card', {style: this_formStyle}); cardforthis_form.mount('#this_form-element');cardforthis_form.addEventListener('change', function(event) {var displayError = document.getElementById('card-errors');if (event.error) {displayError.textContent = event.error.message;} else {displayError.textContent = '';}});const this_formTokenHandler = function(token) {const form = document.getElementById('this_form');const hiddenInput = document.createElement('input');hiddenInput.setAttribute('type', 'hidden');hiddenInput.setAttribute('name', 'stripeToken');hiddenInput.setAttribute('value', token.id);form.appendChild(hiddenInput);form.submit();};</script></div>";
        $result = UIKit::stripeElements(
              'this_form'
            , 'MY_API_KEY'
            , 'Input label'
            , 'Button label')->compile();
        $this->assertEquals($expected, $result);
    }
}
