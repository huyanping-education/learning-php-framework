<?php
/**
 * Created by PhpStorm.
 * User: huyanping
 * Date: 16/8/2
 * Time: 下午5:43
 */

try{
    throw new InvalidArgumentException("test");
} catch (InvalidArgumentException $e) {
    syslog(0, $e->getTraceAsString());
}catch (Exception $e) {
    syslog(0, $e->getTraceAsString());
}