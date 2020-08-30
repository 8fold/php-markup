<?php
declare(strict_types=1);

namespace Eightfold\Markup\Filters;

use Eightfold\Foldable\Filter;

use Eightfold\Shoop\Shoop;

class AttrString extends Filter
{
    public function __invoke(array $using): string
    {
        if (empty($using)) {
            return "";
        }

        $attributes = [];
        foreach (Shoop::this($using) as $attr) {
            list($attr, $content) = Shoop::this($attr)->asArray(" ", false, 2);
            $attributes[] = "{$attr}=\"{$content}\"";
        }

        return Shoop::this(" ")->plus(
            Shoop::this($attributes)->efToString(" ")
        )->unfold();
    }
}
