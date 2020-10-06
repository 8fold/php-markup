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

        return Shoop::this($using)->each(function($v, $k, &$build) {
            list($attr, $content) = Shoop::this($v)->divide(" ", false, 2);
            $build[$attr] = $content;
        })->unfold();
    }
}
