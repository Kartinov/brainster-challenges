<?php

require_once __DIR__ . '/DB.php';

abstract class Model extends DB
{
    protected array $where = [];

    protected string $table;


    /**
     * Return all rows from the table.
     * 
     * @return array
     */
    public function all(): array
    {
        return $this->connection
            ->query("SELECT * FROM {$this->table};")
            ->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Insert data in the table.
     * 
     * @param  array $data
     * @return bool
     */
    public function create(array $data): bool
    {
        if ($this->timestamp) {
            $data['created_at'] = date("Y-m-d H:i:s");
            $data['updated_at'] = date("Y-m-d H:i:s");
        }

        /**
         * @var array
         */
        $columns = array_keys($data);

        /**
         * @var string
         */
        $query = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $this->table,
            implode(",", $columns),
            substr(str_repeat('?, ', count($columns)), 0, -2)
        );

        return $this->pdo
            ->prepare($query)
            ->execute(array_values($data));
    }

    protected function update()
    {
    }

    /**
     * @param array $conditions
     */
    public function where($conditions)
    {
        $this->where = array_merge($this->where, $conditions);

        return $this;
    }

    /**
     * @return bool
     */
    public function exists(): bool
    {
        $query = "SELECT EXISTS(SELECT 1 FROM `{$this->table}` WHERE ";

        foreach ($this->where as $column => $value) {
            $query .= "{$column} = :$column ";
        }

        $query = substr($query, 0, -1); // remove last char (space)

        $query .= ');';

        $stmt = $this->connection->prepare($query);
        $stmt->execute($this->where);

        return $stmt->fetchColumn();
    }

    public function get()
    {
        $query = "SELECT * FROM {$this->table} ";

        if (count($this->where)) {

            $query .= "WHERE ";

            $count = 0;

            foreach ($this->where as $column => $value) {
                if ($count > 0) {
                    $query .= "AND ";
                }

                $query .= "{$column} = :$column ";
                $count++;
            }
        }

        $query = substr($query, 0, -1); // remove last char (space)

        $query .= ';';

        $stmt = $this->connection->prepare($query);
        $stmt->execute($this->where);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function first()
    {
        $query = "SELECT * FROM {$this->table} ";

        if (count($this->where)) {

            $query .= "WHERE ";

            $count = 0;

            foreach ($this->where as $column => $value) {
                if ($count > 0) {
                    $query .= "AND ";
                }

                $query .= "{$column} = :$column ";
                $count++;
            }
        }

        $query = substr($query, 0, -1); // remove last char (space)

        $query .= ' LIMIT 1;';

        $stmt = $this->connection->prepare($query);
        $stmt->execute($this->where);

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
