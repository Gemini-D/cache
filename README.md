# Some Features for Hyperf Cache

[![PHPUnit](https://github.com/Gemini-D/cache/actions/workflows/test.yml/badge.svg)](https://github.com/Gemini-D/cache/actions/workflows/test.yml)

```
composer require gemini/cache
```

## Support key `this` for `Cacheable` `CachePut` and `CacheEvict`

```php
<?php

use Gemini\Cache\Annotation\Cacheable;

class UserService
{
    public $id = 1;
    
    /**
     * @Cacheable(prefix="test", value="#{this.id}")
     */
    function getCache(){
        return uniqid();
    }
}

$service = (new UserService())->getCache(); // The cache key is test:1
```
