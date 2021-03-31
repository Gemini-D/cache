<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Gemini\Cache;

class AnnotationManager extends \Hyperf\Cache\AnnotationManager
{
    protected function getFormatedKey(string $prefix, array $arguments, ?string $value = null): string
    {
        if ($value !== null) {
            return parent::getFormatedKey($prefix, $arguments, $value);
        }

        $formatted = [];
        foreach ($arguments as $key => $argument) {
            // Ignore $this, it will be conflicted with `Hyperf\Cache\Listener\DeleteListener`.
            if ($key !== 'this') {
                $formatted[] = $argument;
            }
        }

        return $prefix . ':' . md5(serialize($formatted));
    }
}
