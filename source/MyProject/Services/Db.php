<?php

namespace MyProject\Services;

use MyProject\Exceptions\DbException;
use PDO;
use PDOException;

class Db
{
    private PDO $pdo;

    private static Db $instance;

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
        $dbOptions = (require __DIR__ . '/../../settings.php')['db'];
        try {
            $this->pdo = new PDO(
                'pgsql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
                $dbOptions['user'],
                $dbOptions['password']);
            } catch (PDOException $e) {
            throw new DbException("Ошибка при подключении к базе данных: " . $e->getMessage());
        }
    }

    public function query(string $sql, array $params = [], string $className = 'stdClass'): false|array|null
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll(PDO::FETCH_CLASS, $className);
    }

    public function getLastInsertId(): int
    {
        return (int)$this->pdo->lastInsertId();
    }
}