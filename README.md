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


## 使用 MD5 格式化缓存 KEY

配置映射关系，修改 `dependencies.php`

```php
<?php

return [
    Hyperf\Cache\AnnotationManager::class => Gemini\Cache\AnnotationManager::class
];
```

再使用 `Cacheable` 注解时，`KEY` 值便会被转化为 `prefix:md5` 的格式。
