<?php
/**
 * Created by PhpStorm.
 * User: huyanping
 * Date: 16/8/3
 * Time: 下午3:27
 */

for($i=0; $i<10000; $i++) {
    file_put_contents('/tmp/test.log', $i . PHP_EOL, FILE_APPEND);
}
