<?php

namespace Eightfold\Markup\UIKit\Elements\FormControls;

use Eightfold\UIKit\Elements\FormControls\Textarea;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;

/**
 * Text area
 *
 * The text area component allows users to input long-form text content.
 *
 * @example
 * [
 *     {
 *         "label":"Long text",
 *         "name":"long_text",
 *         "content":"Hello, World!"
 *     }
 * ]
 */
class TextareaMarkdown extends Textarea
{
    protected function getFormElement()
    {
        $textarea = parent::getFormElement();
        $script = Html::script(Component::text('var simplemde = new SimpleMDE({'.
            'element: document.getElementById("'. $this->_name .'-editor"), '.
            'autoDownloadFontAwesome: false, '.
            'hideIcons: [\'heading\', \'image\']'.
            '});'
        ));

        return Component::text($textarea->compile() . $script->compile());
    }
}
