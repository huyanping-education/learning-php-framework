<?php

/**
 * Created by PhpStorm.
 * User: huyanping
 * Date: 16/8/2
 * Time: 下午3:41
 */
class BadCacheService
{
    /**
     * @var Redis
     */
    protected $redis;

    /**
     * BadCacheService constructor.
     * @param array $config must contain key:host, port
     */
    public function __construct($config)
    {
        $this->redis = new Redis();
        $this->redis->connect($config['host'], $config['port']);
    }
}

/**
 * Class GoodCacheService
 */
class GoodCacheService {
    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * GoodCacheService constructor.
     * @param CacheInterface $cache
     */
    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }
}

/**
 * Interface CacheInterface
 */
interface CacheInterface {
    /**
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value);
}

