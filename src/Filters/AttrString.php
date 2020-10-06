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

        return Shoop::this($using)->each(function($v, $m, &$build) {
            list($attr, $content) = Shoop::this($v)->divide(" ", false, 2);
            $build[] = (Shoop::this($attr)->is($content)->unfold())
                ? "{$attr}"
                : "{$attr}=\"{$content}\"";
        })->asString(" ")->prepend(" ")->unfold();
    }
}
