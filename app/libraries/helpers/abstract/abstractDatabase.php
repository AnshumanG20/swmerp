<?php
  abstract class abstractDatabase {

    protected $sql_name = SQL_NAME;
    protected $host = DB_HOST;
	  protected $port = DB_PORT;
    protected $user = DB_USER;
    protected $pass = DB_PASS;
    protected $dbname = DB_NAME;

    protected $pdo;
    protected $stmt;
    protected $error;

    protected $queryBuilder = NULL;
    protected $bindArray = [];//(array)null;
    protected $increment = 0;
    protected $tblName = NULL;
    protected $whereCond = false;
    protected $joinBuilder = "";
    protected $joinCond = false;
    public function __construct(){
      // Set DSN
      $dsn = $this->sql_name.':host='.$this->host.'; port='.$this->port.'; dbname=' . $this->dbname;
      // Create PDO instance
      try{
        $this->pdo = new PDO($dsn, $this->user, $this->pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e){
        die("Main Database => ".$this->error = $e->getMessage());
      }
    }
    public function __destruct(){
      $this->pdo = null;
    }
    abstract public function beginTransaction();

    abstract public function commit();

    abstract public function rollBack();
    // Prepare statement with query
    abstract public function query($sql);

    // Bind values
    abstract public function bind($param, $value, $type);

    // Execute the prepared statement
    abstract public function execute();

    // Get result set as array of objects
    abstract public function resultSet();

    // Get single record as object
    abstract public function single();

    // Get row count
    abstract public function rowCount();

    // Execute the prepared statement & return insertion id
    abstract public function insertion();

    abstract public function insertionGetID();

    abstract public function updation();

    abstract public function deletion();

    // chain functon 
    abstract public function table($tblName);
    
    abstract public function insert($values);

    abstract public function insertGetId($values);

    abstract public function insertQuery($values);

    abstract public function select($selectSt);

    abstract public function selectJson($selectSt);

    abstract public function where($colName, $operator, $value);

    abstract public function whereLike($colName, $value);

    abstract public function orWhereLike($colName, $value);

    abstract public function orWhere($colName, $operator, $value);

    abstract public function whereIn($colName, $values);

    abstract public function orWhereIn($colName, $values);
    
    abstract public function whereNotIn($colName, $values);

    abstract public function orWhereNotIn($colName, $values);

    abstract public function whereBetween($colName, $value);

    abstract public function orWhereBetween($colName, $value);

    abstract public function whereNotBetween($colName, $value);

    abstract public function orWhereNotBetween($colName, $value);

    abstract public function groupBy($colName, $colName2);

    abstract public function having($colName, $operator, $value);

    abstract public function andHaving($colName, $operator, $value);

    abstract public function havingCount($colName, $operator, $value);

    abstract public function orderBy($colName);

    abstract public function orderByDesc($colName);

    abstract public function orderByAscDesc($colName1, $colName2);

    abstract public function orderByDescAsc($colName1, $colName2);

    abstract public function limit($row_count);

    abstract public function join($tblName, $colFirst, $operator, $colSecond);

    abstract public function leftJoin($tblName, $colFirst, $operator, $colSecond);

    abstract public function rightJoin($tblName, $colFirst, $operator, $colSecond);

    abstract public function fullJoin($tblName, $colFirst, $operator, $colSecond);

    abstract public function update($values);

    abstract public function updateQuery($values);

    abstract public function delete();

    abstract public function deleteQuery();

    abstract public function get();

    abstract public function getQuery();

    abstract public function first();

    abstract public function firstQuery();
    
    
  }