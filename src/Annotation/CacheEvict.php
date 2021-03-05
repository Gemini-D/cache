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
namespace Gemini\Cache\Annotation;

/**
 * @Annotation
 * @Target({"METHOD"})
 */
class CacheEvict extends \Hyperf\Cache\Annotation\CacheEvict
{
}
