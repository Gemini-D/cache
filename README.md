# Some Features for Hyperf Cache

[![PHPUnit](https://github.com/Gemini-D/cache/actions/workflows/test.yml/badge.svg)](https://github.com/Gemini-D/cache/actions/workflows/test.yml)

```
composer require gemini/cache
```

## 支持使用 this 获取当前实例的成员变量

```php
<?php

use Gemini\Cache\Annotation\Cacheable;

class UserService
{
    public $id = 1;

    /**
     * @Cacheable(prefix="test", value="#{this.id}")
     */
    function getCache()
    {
        return uniqid();
    }
}

$res = (new UserService())->getCache(); // 生成的缓存 KEY 为 test:1

```
