<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 06.12.2018
 * Time: 21:00
 */

namespace app\models;


use PDO;
use PDOException;

class PdoConnection
{
    /**
     * @var PDO
     */
    public $dbh = null;

    /**
     * PdoConnection constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        try {
            $this->dbh = new PDO($config['dsn'], $config['user'], $config['pass'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}