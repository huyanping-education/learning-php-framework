<?php

/**
 * Created by PhpStorm.
 * User: huyanping
 * Date: 16/8/1
 * Time: 上午11:19
 */
class View
{
    public function make($template) {
        $cache_filename = $this->getCacheFilename($template);
        if($cache_filename !== false) {
            include $cache_filename;
            return;
        }else{
            $content = file_get_contents($template);
        }
        $content = str_replace("{{{", "<?php", $content);
        $content = str_replace("}}}", "?>", $content);

        $cache_filename = $this->cache($template, $content);
        include $cache_filename;
    }

    protected function cache($template, $content) {
        $cache_filename = md5($template);
        file_put_contents($cache_filename, $content);
        return $cache_filename;
    }

    protected function getCacheFilename($template) {
        $cache_filename = md5($template);
        if(file_exists($cache_filename)) {
            return $cache_filename;
        }

        return false;
    }
}

$view = new View();
$view->make(__DIR__ . '/' . "template.tpl");
