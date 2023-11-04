<?php

namespace DevSkill\Supports;

 use PDO;

 class Model
{

    protected mixed $connection = null;

    protected string $table = '';

    protected array $fields = [];

    private array $whereClauses = [];


    public function __construct()
    {
        /** @var DatabaseConnection $dbConnection */
        $dbConnection  = app()->get(DatabaseConnection::class);

        $this->connection = $dbConnection->getConnection();
    }

    private function processWhere(): string
    {
        $where = ' WHERE ';

        foreach ($this->whereClauses as $whereClause){
            /** @var array{field: string, condition: string, value: mixed} $whereClause */
            $where .= "  {$whereClause['field']} {$whereClause['condition']} '{$whereClause['value']}' AND";
        }

        return rtrim($where, 'AND');
    }

    public function first()
    {
        $statement = $this->connection->prepare("SELECT * FROM ".$this->table.$this->processWhere());

        $statement->execute();

       return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function get()
    {
        $statement = $this->connection->prepare("SELECT * FROM ".$this->table.$this->processWhere());

        $statement->execute();

       return  $statement->fetchAll(PDO::FETCH_ASSOC);;
    }

    public function where($field, $condition = '=', $value = null): Model
    {
        if(!$value){
            $value = $condition;
            $condition = '=';
        }

        $this->whereClauses[] = [
           'field' => $field,
            'condition' => $condition,
            'value' => $value
        ] ;

        return $this;
    }

 }