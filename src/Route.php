<?php

/**
 * Created by PhpStorm.
 * User: huyanping
 * Date: 16/8/1
 * Time: 上午10:53
 */
class Route
{
    public function parse($path) {
        $path = trim($path);
        $info = explode("/", $path);
        if(count($info) != 2) {
            throw new InvalidArgumentException("Unexpected path format");
        }

        $result = array(
            'controller' => $info[0],
            'action' => $info[1]
        );
        return $result;
    }

    public function execute(array $router) {
        $controller = $router['controller'];
        $action = $router['action'];
        if(!class_exists($controller)) {
            throw new RuntimeException("controller not found");
        }
        $obj = new $controller();
        if(!method_exists($obj, $action)) {
            throw new RuntimeException("action not found");
        }
        return call_user_func(array($obj, $action));
    }
}

$route = new Route();
$router = $route->parse("/Index/Hello");
$route->execute($router);