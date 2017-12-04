<?php

    /**
     * Simple QueryBuilder to interact with MYSQL
     * Class QueryBuilder
     */
    class QueryBuilder
    {

        private $pdo;


        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        /**
         * Select all fields from table
         * @param $table
         * @param null $intoClass
         * @return array
         */
        function selectAll($table, $intoClass = null)
        {
            $query = $this->pdo->query("select * from {$table}");

            $query->execute();

            if ($intoClass)
                return $query->fetchAll(PDO::FETCH_CLASS, $intoClass);

            return $query->fetchAll(PDO::FETCH_CLASS);

        }

        /**
         * Insert fields into table
         * @param $table
         * @param $parameters
         */
        public function insert($table, $parameters)
        {
            $sql = sprintf(
                'insert into %s (%s) values (%s)',
                $table,
                implode(', ', array_keys($parameters)),
                ':' . implode(', :', array_keys($parameters))
            );
            try {
                $query = $this->pdo->prepare($sql);
                $query->execute($parameters);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }