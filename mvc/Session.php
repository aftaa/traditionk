<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 06.12.2018
 * Time: 20:19
 */

namespace mvc;


class Session
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return $_SESSION[$key];
    }
}