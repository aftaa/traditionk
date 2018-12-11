<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 06.12.2018
 * Time: 17:21
 */

namespace mvc;


class App
{
    /**
     * @var array
     */
    private static $config = [];
    /**
     * @var Session
     */
    private static $session;

    /**
     * App constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        self::$config = $config;
        $this->sessionInit($config);
        $this->resolveUri($config);
    }

    /**
     *
     */
    private function sessionInit(): void
    {
        self::$session = new Session;
    }

    /**
     * @return array
     */
    public static function getConfig(): array
    {
        return self::$config;
    }

    /**
     * @return Session
     */
    public static function getSession(): Session
    {
        return self::$session;
    }

    /**
     * @param array $config
     */
    private function resolveUri(array $config): void
    {
        $route = new Route($_SERVER['REQUEST_URI'], $config['appFolder']);
        $controller = new $route->controller;
        $action = $route->action;
        $param = $route->param;
        $controller->$action($param);
    }

}