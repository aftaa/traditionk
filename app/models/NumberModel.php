<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 06.12.2018
 * Time: 21:08
 */

namespace app\models;


use PDO;
use PDOException;

class NumberModel
{
    /**
     * @var PdoConnection
     */
    private $pdo;

    /**
     * Number constructor.
     *
     * @param array $dbConfig
     */
    public function __construct(array $dbConfig)
    {
        $this->pdo = new PdoConnection($dbConfig);
    }

    /**
     * Save into DB.
     *
     * @param int $number
     */
    public function save(int $number)
    {
        $dbh = $this->pdo->dbh;

        try {
            $dbh->beginTransaction();
            $dbh->query('DELETE FROM number');
            $stmt = $dbh->prepare('INSERT INTO number SET number=:number');
            $stmt->execute([
                'number' => $number,
            ]);
            $dbh->commit();
        } catch (PDOException $e) {
            $dbh->rollBack();
            echo $e->getMessage();
        }
    }

    public function load(): int
    {
        $dbh = $this->pdo->dbh;

        try {
            $stmt = $dbh->query('SELECT * FROM number');
            $stmt->execute();
            $number = $stmt->fetch(PDO::FETCH_ASSOC)['number'];
            return $number;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}