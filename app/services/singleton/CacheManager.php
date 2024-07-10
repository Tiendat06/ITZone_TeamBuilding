<?php

class CacheManager{
    private static CacheManager $uniqueInstance;
    private static array $cache;

    private function __construct(){}

    public static function getInstanceCacheManager(): CacheManager{
        if(self::$uniqueInstance === null){
            self::$uniqueInstance = new CacheManager();
        }
        return self::$uniqueInstance;
    }

    public static function setCache($key, $value): void{
        self::$cache[$key] = $value;
    }

    public static function getCache($key){
        return self::$cache[$key] ?? null;
    }
}

?>