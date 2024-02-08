<?php

namespace Imadepurnamayasa\PhpInti\Crud;

use DateTime;
use Exception;
use Imadepurnamayasa\PhpInti\Database\IConnection;

class Action implements Icrud
{
    protected IConnection $connection;
    protected string $table = '';
    protected array $columnTypes = [];
    protected array $hideColumns = [];

    public function __construct(IConnection $connection)
    {
        $this->connection = $connection;
    }

    public function table(string $table)
    {
        $this->table = $table;
    }

    public function primaryKeys(array $columns)
    {
        
    }

    public function columnTypes(array $columns)
    {
        $this->columnTypes = $columns;
    }

    public function hideColumns(array $columns)
    {
        $this->hideColumns = $columns;
    }

    public function process()
    {
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        if (!isset($_POST['crud_form'])) {
            return 'error';
        }

        $data = $_POST['crud_form'];

        $sql = "INSERT INTO $this->table (";
        $sql .= implode(", ", array_keys($data));
        $sql .= ") VALUES (";
        $sql .= ":" . implode(", :", array_keys($data));
        $sql .= ")";

        $stmt = $this->connection->connection()->prepare($sql);

        foreach ($data as $key => $value) {
            if (in_array($key, array_keys($this->columnTypes))) {
                if ($this->columnTypes[$key] === 'DATETIME') {
                    $dateTime = DateTime::createFromFormat('d-m-Y H:i:s', $value);
                    if ($dateTime instanceof DateTime) {
                        $value = $dateTime->format('Y-m-d H:i:s');
                    } else {
                        $currentDateTime = new DateTime();
                        $value = $currentDateTime->format('Y-m-d H:i:s');
                    }
                }
            }
            $stmt->bindValue(":$key", $value);
        }

        try {
            $stmt->execute();
            return json_encode([
                'messages' => "Record inserted successfully."
            ]);
        } catch (Exception $e) {
            return json_encode([
                'messages' => $e->getMessage()
            ]);
        }
    }
}