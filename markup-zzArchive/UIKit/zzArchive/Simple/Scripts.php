<?php

namespace Eightfold\UIKit\Simple;

use Eightfold\UIKit\UIKit;

/**
 * Scripts
 *
 * Made specifically for generating references to multiple `<script></script>` sources.
 *
 * This component really does take the term simple to a new level. No keys necessary.
 * Just pass in an array of strings where each string is the url of the script.
 *
 * @deprecated
 */
class Scripts
{
    static public function build($config)
    {
        $html = [];
        foreach($config as $script) {
            $html[] = UIKit::script([
                'attributes' => ['src' => $script]
            ]);
        }
        return implode('', $html);
    }
}
