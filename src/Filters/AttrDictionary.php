<?php
declare(strict_types=1);

namespace Eightfold\Markup\Filters;

use Eightfold\Foldable\Filter;

use Eightfold\Shoop\Shoop;

class AttrDictionary extends Filter
{
    public function __invoke(array $using): array
    {
        if (count($using) === 0) {
            return [];
        }

        $attributes = [];
        foreach ($using as $item) {
            list($attr, $content) = Shoop::this($item)->asArray(" ", false, 2);
            $attributes[$attr] = $content;
        }
        return $attributes;
    }
}
