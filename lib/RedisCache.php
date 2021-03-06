<?php
/**
 * Created by PhpStorm.
 * User: wuxua
 * Date: 2017/7/12
 * Time: 14:38
 */

namespace app\lib;

use yii\caching\Cache;

class RedisCache extends Cache
{
    /*
     * @var \Redis
     * */
    private $redis;

    public $host;
    public $port;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

        $redis = new \Redis();
        $redis->connect($this->host, $this->port);

        $this->redis = $redis;
    }

    public function setValue($key, $value, $duration = 300)
    {
        return $this->redis->set($key, $value, $duration);
    }

    public function getValue($key)
    {
        return $this->redis->get($key);
    }

    public function exists($key)
    {
        return $this->redis->exists($key);
    }

    public function flushValues()
    {
        return $this->redis->flushAll();
    }

    public function addValue($key, $value, $duration = 300)
    {
        if(!$this->exists($key))
        {
            return $this->setValue($key, $value, $duration);
        }

        return false;
    }

    public function deleteValue($key)
    {
        return $this->redis->delete($key);
    }
}