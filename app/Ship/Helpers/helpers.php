<?php

/*
|--------------------------------------------------------------------------
| Ship Helpers
|--------------------------------------------------------------------------
|
| Write only general helper functions here.
| Container specific helper functions should go into their own related Containers.
| All files under app/{section_name}/{container_name}/Helpers/ folder will be autoloaded by Apiato.
|
*/

use Prettus\Repository\Helpers\CacheKeys;

if (!function_exists('cache_key')) {
    function cache_key(string $method, string $class, $args = null)
    {
        $args = serialize($args);
        $key = sprintf('%s@%s-%s', $class, $method, md5($args));

        CacheKeys::putKey($class, $key);

        return $key;
    }
}
