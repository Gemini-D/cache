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
namespace HyperfTest\Cases;

use Gemini\Cache\AnnotationManager;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Utils\Reflection\ClassInvoker;

/**
 * @internal
 * @coversNothing
 */
class AnnotationManagerTest extends AbstractTestCase
{
    public function testGetFormatedKey()
    {
        $manager = new ClassInvoker(
            new AnnotationManager(\Mockery::mock(ConfigInterface::class), \Mockery::mock(StdoutLoggerInterface::class))
        );

        $key = $manager->getFormatedKey('test', [1, 2, 3]);
        $this->assertSame('test:262bbc0aa0dc62a93e350f1f7df792b9', $key);

        $key = $manager->getFormatedKey('test', [new \stdClass(), 123]);
        $this->assertSame('test:78809ca5903f2cc2568a61c75333faaa', $key);

        $key = $manager->getFormatedKey('test', ['o' => new \stdClass(), 'id' => 123]);
        $this->assertSame('test:78809ca5903f2cc2568a61c75333faaa', $key);
    }
}
