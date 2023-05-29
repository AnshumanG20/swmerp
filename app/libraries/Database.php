<?php
  /*
   * PDO Database Class
   * Connect to database
   * Create prepared statements
   * Bind values
   * Return rows and results
   */
  require_once 'helpers/abstract/abstractDatabase.php';
  class Database extends abstractDatabase{
    public function beginTransaction(){
      $this->pdo->beginTransaction();
    }
    public function commit(){
      $this->pdo->commit();
    }
    public function rollBack(){
      $this->pdo->rollBack();
    }
    // Prepare statement with query
    public function query($sql){
      $this->stmt = $this->pdo->prepare($sql);
    }

    // Bind values
    public function bind($param, $value, $type = null){
      if(is_null($type)){
        switch(true){
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default:
            $type = PDO::PARAM_STR;
        }
      }

      $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute(){
      return $this->stmt->execute();
    }

    // Get result set as array of objects
    public function resultSet(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single(){
      $this->execute();
      $fetchedRes = $this->stmt->fetch(PDO::FETCH_OBJ);
      return json_decode(json_encode($fetchedRes), true);
    }

    // Get row count
    public function rowCount(){
      return $this->stmt->rowCount();
    }

    // Execute the prepared statement & return insertion id
    public function insertion(){
      return $this->stmt->execute();
    }
    public function insertionGetID(){
      if($this->stmt->execute()){
        return $this->pdo->lastInsertId();
      }
      else{
        return false;
      }
    }
    public function updation(){
      return $this->stmt->execute();
    }
    public function deletion(){
      return $this->stmt->execute();
    }

    // chain functon 
    public function table($tblName){
      $this->tblName = $tblName;
      $this->queryBuilder = $tblName;
      return $this;
    }
    public function insert($values){
      if(!is_array($values)){
        throw new Exception("required 1 parater in insert(['column1'=>'value1', 'column2'=>'value2'])");
      }else{
        $this->queryBuilder = "INSERT INTO ".$this->queryBuilder." (";
        $i = 0;
        foreach ($values as $key => $value) {
          $i++;
          if($i==1)
            $this->queryBuilder .= $key;
          else
            $this->queryBuilder .= ", ".$key;
        }
        $this->queryBuilder .= ") VALUES (";

        $i = 0;
        foreach ($values as $key => $value) {
          $i++;
          if($i==1)
            $this->queryBuilder .= ":".$key;
          else
            $this->queryBuilder .= ", :".$key;
        }
        $this->queryBuilder .= ");";
        try{
          $this->query($this->queryBuilder);
          foreach ($values as $key => $value) {
              $this->bind($key, $value);
          }
          return $this->insertion();
        }catch(Exception $e){
          die($e->getMessage());
        }
      }
    }
    public function insertGetId($values){
      if(!is_array($values)){
        throw new Exception("required 1 parater in insertGetId(['column1'=>'value1', 'column2'=>'value2'])");
      }else{
        $errTblName = $this->queryBuilder;
        $this->queryBuilder = "INSERT INTO ".$this->queryBuilder." (";
        $i = 0;
        foreach ($values as $key => $value) {
          $i++;
          if($i==1)
            $this->queryBuilder .= $key;
          else
            $this->queryBuilder .= ", ".$key;
        }
        $this->queryBuilder .= ") VALUES (";

        $i = 0;
        foreach ($values as $key => $value) {
          $i++;
          if($i==1)
            $this->queryBuilder .= ":".$key;
          else
            $this->queryBuilder .= ", :".$key;
        }
        $this->queryBuilder .= ");";
        try{
          $this->query($this->queryBuilder);
          foreach ($values as $key => $value) {
              $this->bind($key, $value);
          }
          return $this->insertionGetID();
        }catch(PDOException $e){
          die($e->getMessage()." in ".$errTblName);
        }catch(Exception $e){
          die($e->getMessage()." in ".$errTblName);
        }
      }
    }

    public function insertQuery($values){
      if(!is_array($values)){
        throw new Exception("required 1 parater in insertQuery(['key1'=>'value1', 'key2'=>'value2'])");
      }else{
        $this->queryBuilder = "INSERT INTO ".$this->queryBuilder." (";
        $i = 0;
        foreach ($values as $key => $value) {
          $i++;
          if($i==1)
            $this->queryBuilder .= $key;
          else
            $this->queryBuilder .= ", ".$key;
        }
        $this->queryBuilder .= ") VALUES (";

        $i = 0;
        foreach ($values as $key => $value) {
          $i++;
          if($i==1)
            $this->queryBuilder .= "'".$value."'";
          else
            $this->queryBuilder .= ", '".$value."'";
        }
        $this->queryBuilder .= ");";
        try{
          foreach ($values as $key => $value) {
            $this->queryBuilder = str_replace(":".$key, "'".$value."'", $this->queryBuilder);
          }
          $query = $this->queryBuilder;
          return $query;
        }catch(Exception $e){
          die($e->getMessage());
        }
      }
    }

    public function select($selectSt){
      $this->queryBuilder = "SELECT ".$selectSt." FROM ".$this->queryBuilder;
      return $this;
    }
    public function selectJson($selectSt){
      $this->queryBuilder = "SELECT row_to_json(".$this->queryBuilder.") FROM ".$this->queryBuilder." WHERE 1=1";
      return $this;
    }
    public function where($colName=null, $operator=null, $value=null){
      if($colName!=null  && $operator!=null  && $value!=null){
        ++$this->increment;
        $this->whereCond = true;
        list($explode0, $explode1) = array_pad(explode('.', $colName, 2), 2, "");
        $colExplode = $explode0.$explode1;
        $this->queryBuilder .= " AND ".$colName.$operator.":".$colExplode.$this->increment;
        $this->bindArray[$colExplode.$this->increment]=$value;
      }else{
          throw new Exception("required 3 parater in where('column', 'operator', 'value')");
      }
      
      return $this;
    }

    public function whereIsNull($colName=null){
      if($colName!=null){
        ++$this->increment;
        $this->whereCond = true;
        $this->queryBuilder .= " AND ".$colName." IS NULL";
      }else{
          throw new Exception("required 1 parater in whereIsNull('column')");
      }
      
      return $this;
    }

    public function whereIsNotNull($colName=null){
      if($colName!=null){
        ++$this->increment;
        $this->whereCond = true;
        $this->queryBuilder .= " AND ".$colName." IS NOT NULL";
      }else{
          throw new Exception("required 1 parater in whereIsNotNull('column')");
      }
      
      return $this;
    }

    public function whereLike($colName, $value){
      ++$this->increment;
      $this->whereCond = true;
      list($explode0, $explode1) = array_pad(explode('.', $colName, 2), 2, "");
      $colExplode = $explode0.$explode1;
      $this->queryBuilder .= " AND ".$colName." LIKE :".$colExplode.$this->increment;
      $this->bindArray[$colExplode.$this->increment]=$value;
      return $this;
    }

    public function orWhereLike($colName, $value){
      ++$this->increment;
      $this->whereCond = true;
      list($explode0, $explode1) = array_pad(explode('.', $colName, 2), 2, "");
      $colExplode = $explode0.$explode1;
      $this->queryBuilder .= " OR ".$colName." LIKE :".$colExplode.$this->increment;
      $this->bindArray[$colExplode.$this->increment]=$value;
      return $this;
    }

    public function orWhere($colName=null, $operator=null, $value=null){
      if($colName!=null  && $operator!=null  && $value!=null){
        ++$this->increment;
        $this->whereCond = true;
        list($explode0, $explode1) = array_pad(explode('.', $colName, 2), 2, "");
        $colExplode = $explode0.$explode1;
        $this->queryBuilder .= " OR ".$colName.$operator.":".$colExplode.$this->increment;
        $this->bindArray[$colExplode.$this->increment]=$value;
      }else{
        throw new Exception("required 3 parater in orWhere('column', 'operator', 'value')");
      }
      return $this;
    }
    public function whereIn($colName=null, $values = array()){
      if($colName!=null  && $values!=null){
        ++$this->increment;
        $this->whereCond = true;
        list($explode0, $explode1) = array_pad(explode('.', $colName, 2), 2, "");
        $colExplode = $explode0.$explode1;
        if(is_array($values)){
          $whereIn = null;
          $i = 0;
          foreach ($values as $key => $value) {
            $i++;
            if($i==1)
              $whereIn = ":list".$this->increment.$i;
            else
              $whereIn .= ",:list".$this->increment.$i;             
            $this->bindArray["list".$this->increment.$i]=$value;
          }
          $this->queryBuilder .= " AND ".$colName." IN (".$whereIn.")";
        }else{
          $this->queryBuilder .= " AND ".$colName." IN (:list".$this->increment.")";
          $this->bindArray["list".$this->increment]=$values;
        }
      }else{
        throw new Exception("required 2 parater in whereIn('column', 'value')");
      }
      return $this;
    }
    public function orWhereIn($colName=null, $values = array()){
      if($colName!=null  && $values!=null){
        ++$this->increment;
        $this->whereCond = true;
        if(is_array($values)){
          $whereIn = null;
          $i = 0;
          foreach ($values as $key => $value) {
            $i++;
            if($i==1)
              $whereIn = ":list".$this->increment.$i;
            else
              $whereIn .= ",:list".$this->increment.$i;             
            $this->bindArray["list".$this->increment.$i]=$value;
          }
          $this->queryBuilder .= " OR ".$colName." IN (".$whereIn.")";
        }else{
          $this->queryBuilder .= " OR ".$colName." IN (:list".$this->increment.")";
          $this->bindArray["list".$this->increment]=$values;
        }
      }else{
        throw new Exception("required 2 parater in orWhereIn('column', 'value')");
      }
      return $this;
    }
    public function whereNotIn($colName=null, $values = array()){
      if($colName!=null  && $values!=null){
        ++$this->increment;
        $this->whereCond = true;
        if(is_array($values)){
          $whereIn = null;
          $i = 0;
          foreach ($values as $key => $value) {
            $i++;
            if($i==1)
              $whereIn = ":list".$this->increment.$i;
            else
              $whereIn .= ",:list".$this->increment.$i; 

            $this->bindArray["list".$this->increment.$i]=$value;
          }
          $this->queryBuilder .= " AND ".$colName." NOT IN (".$whereIn.")";
        }else{
          $this->queryBuilder .= " AND ".$colName." NOT IN (:list".$this->increment.")";
          $this->bindArray["list".$this->increment]=$values;
        }
      }else{
        throw new Exception("required 2 parater in whereNotIn('column', 'value')");
      }
    }
    public function orWhereNotIn($colName=null, $values = array()){
      if($colName!=null  && $values!=null){
        ++$this->increment;
        $this->whereCond = true;
        if(is_array($values)){
          $whereIn = null;
          $i = 0;
          foreach ($values as $key => $value) {
            $i++;
            if($i==1)
              $whereIn = ":list".$this->increment.$i;
            else
              $whereIn .= ",:list".$this->increment.$i;             
            $this->bindArray["list".$this->increment.$i]=$value;
          }
          $this->queryBuilder .= " OR ".$colName." NOT IN (".$whereIn.")";
        }else{
          $this->queryBuilder .= " OR ".$colName." NOT IN (:list".$this->increment.")";
          $this->bindArray["list".$this->increment]=$values;
        }
      }else{
        throw new Exception("required 2 parater in orwhereNotIn('column', 'value')");
      }
    }
    public function whereBetween($colName=null, $value = array()){
      if($colName!=null  && $value!=null){
        if(!is_array($value)){
          throw new Exception("required 2 parater in whereBetween('column', [value1, value2])");
        }else{
          ++$this->increment;
          $this->whereCond = true;
          $this->queryBuilder .= " AND ".$colName." BETWEEN :ZERO".$this->increment." AND :ONE".$this->increment;
          $this->bindArray["ZERO".$this->increment]=$value[0];
          $this->bindArray["ONE".$this->increment]=$value[1];
        }
      }else{
        throw new Exception("required 2 parater in whereBetween('column', '[value1, value2]')");
      } 
      return $this;
    }
    public function orWhereBetween($colName=null, $value = array()){
       if($colName!=null  && $value!=null){
        if(!is_array($value)){
          throw new Exception("required 2 parater in orWhereBetween('column', [value1, value2])");
        }else{
          ++$this->increment;
          $this->whereCond = true;
          $this->queryBuilder .= " OR ".$colName." BETWEEN :ZERO".$this->increment." AND :ONE".$this->increment;
          $this->bindArray["ZERO".$this->increment]=$value[0];
          $this->bindArray["ONE".$this->increment]=$value[1];
        }
      }else{
        throw new Exception("required 2 parater in orWhereBetween('column', [value1, value2])");
      } 
      return $this;
    }
    public function whereNotBetween($colName=null, $value = array()){
      if($colName!=null  && $value!=null){
        if(!is_array($value)){
          throw new Exception("required 2 parater in whereNotBetween('column', [value1, value2])");
        }else{
          ++$this->increment;
          $this->whereCond = true;
          $this->queryBuilder .= " AND ".$colName." NOT BETWEEN :ZERO".$this->increment." AND :ONE".$this->increment;
          $this->bindArray["ZERO".$this->increment]=$value[0];
          $this->bindArray["ONE".$this->increment]=$value[1];
        }
      }else{
        throw new Exception("required 2 parater in whereNotBetween('column', [value1, value2])");
      } 
      return $this;
    }
    public function orWhereNotBetween($colName=null, $value = array()){
      if($colName!=null  && $value!=null){
        if(!is_array($value)){
          throw new Exception("required 2 parater in orWhereNotBetween('column', [value1, value2])");
        }else{
          ++$this->increment;
          $this->whereCond = true;
          $this->queryBuilder .= " OR ".$colName." NOT BETWEEN :ZERO".$this->increment." AND :ONE".$this->increment;
          $this->bindArray["ZERO".$this->increment]=$value[0];
          $this->bindArray["ONE".$this->increment]=$value[1];
        }
      }else{
        throw new Exception("required 2 parater in orWhereNotBetween('column', '[value1, value2]')");
      } 
      return $this;
    }
    public function groupBy($colName=null, $colName2=null){
      if($colName!=null && $colName2==null){
        if(is_array($colName))
          $this->queryBuilder .= " GROUP BY ".implode(",",$colName);
        else
          $this->queryBuilder .= " GROUP BY ".$colName;
      }else{
        throw new Exception("required 1 parater in groupBy('column') OR groupBy(['field1', 'field2', 'field3', 'field4'])");
      }  
      return $this;
    }
    public function having($colName, $operator, $value){
      ++$this->increment;
      $this->queryBuilder .= "HAVING ".$colName.$operator.":".$colName.$this->increment;
      $this->bindArray[$colName.$this->increment]=$value;
      return $this;
    }
    public function andHaving($colName, $operator, $value){
      ++$this->increment;
      $this->queryBuilder .= "AND ".$colName.$operator.":".$colName.$this->increment;
      $this->bindArray[$colName.$this->increment]=$value;
      return $this;
    }
    public function havingCount($colName, $operator, $value){
      $this->queryBuilder .= "COUNT(*) :havingCount";
      $this->bindArray["havingCount"]=$value;
      return $this;
    }
    public function orderBy($colName = array()){
      if($colName!=null){
        if(is_array($colName))
          $this->queryBuilder .= " ORDER BY ".implode(",",$colName)." ASC";
        else
          $this->queryBuilder .= " ORDER BY ".$colName." ASC";
      }else{
        throw new Exception("required 1 parater in orderBy('column') OR orderBy(['field1', 'field2', 'field3', 'field4'])");
      }
      return $this;
    }
    public function orderByDesc($colName = array()){
      if($colName!=null){
        if(is_array($colName))
          $this->queryBuilder .= " ORDER BY ".implode(",",$colName)." DESC";
        else
          $this->queryBuilder .= " ORDER BY ".$colName." DESC";
      }else{
        throw new Exception("required 1 parater in orderByDesc('column') OR orderByDesc(['field1', 'field2', 'field3', 'field4'])");
      }
      return $this;
    }
    public function orderByAscDesc($colName1=null, $colName2=null){
      if($colName1!=null && $colName2!=null){
        $this->queryBuilder .= " ORDER BY ".$colName1." ASC, ".$colName2." DESC";
      }else{
        throw new Exception("required 1 parater in orderByAscDesc('ascendingColumn', 'descendingColumn')");
      }
      return $this;
    }
    public function orderByDescAsc($colName1=null, $colName2=null){
      if($colName1!=null && $colName2!=null){
        $this->queryBuilder .= " ORDER BY ".$colName1." DESC, ".$colName2." ASC";
      }else{
        throw new Exception("required 1 parater in orderByDescAsc('descendingColumn', 'ascendingColumn')");
      }
      return $this;
    }
    public function limit($row_count = null, $offSet = null){
      if($row_count!=null){
        $this->queryBuilder .= " LIMIT ".$row_count;
        if($offSet!=null)
            $this->queryBuilder .= " OFFSET ".$offSet;
      }else{
        throw new Exception("required 1 parater in limit('rowCount', 'offSet') : offSet is optional");
      }
      return $this;
    }
    public function join($tblName, $colFirst, $operator, $colSecond){
      $this->joinBuilder .= " INNER JOIN ".$tblName." ON ".$colFirst.$operator.$colSecond;
      $this->queryBuilder .= " INNER JOIN ".$tblName." ON ".$colFirst.$operator.$colSecond;
      return $this;
    }
    public function leftJoin($tblName, $colFirst, $operator, $colSecond){
      $this->joinBuilder .= " LEFT JOIN ".$tblName." ON ".$colFirst.$operator.$colSecond;
      $this->queryBuilder .= " LEFT JOIN ".$tblName." ON ".$colFirst.$operator.$colSecond;
      return $this;
    }
    public function rightJoin($tblName, $colFirst, $operator, $colSecond){
      $this->joinBuilder .= " RIGHT JOIN ".$tblName." ON ".$colFirst.$operator.$colSecond;
      $this->queryBuilder .= " RIGHT JOIN ".$tblName." ON ".$colFirst.$operator.$colSecond;
      return $this;
    }
    public function fullJoin($tblName, $colFirst, $operator, $colSecond){
      $this->joinBuilder .= " FULL JOIN ".$tblName." ON ".$colFirst.$operator.$colSecond;
      $this->queryBuilder .= " FULL JOIN ".$tblName." ON ".$colFirst.$operator.$colSecond;
      return $this;
    }
    public function update($values = array()){
      if(!is_array($values) || $this->whereCond==false){
        if(!is_array($values)){
          throw new Exception("required 1 parater in update(['column1'=>'value1', 'column2'=>'value2'])");
        }else{
          throw new Exception("in queryBuilder add once where condition with update(['column1'=>'value1', 'column2'=>'value2'])"); 
        }
      }else{
        $updateQuery = "";
        if (is_array($values)) {
          $i=0;
          foreach ($values as $key => $value) {
            ++$i;
            if($i==1)
              $updateQuery .= $key."=:value".$i;
            else
              $updateQuery .= ", ".$key."=:value".$i;
            $this->bindArray["value".$i]=$value;
          }

          list($explode0, $explode1) = array_pad(explode($this->tblName." AND", $this->queryBuilder, 2), 2, "");
          if($explode1!=""){
            $this->queryBuilder = "UPDATE ".$this->tblName." SET ".$updateQuery." WHERE ".$explode1;
          }else{
            list($explode0, $explode1) = array_pad(explode($this->tblName." OR", $this->queryBuilder, 2), 2, "");
            $this->queryBuilder = "UPDATE ".$this->tblName." SET ".$updateQuery." WHERE ".$explode1;
          }
          try{
            //echo $this->queryBuilder;
            $this->query($this->queryBuilder);
            foreach ($this->bindArray as $key => $value) {
              $this->bind($key, $value);
            }
            $this->queryBuilder = null;
            $this->bindArray = (array)null;
            $this->joinBuilder = "";
            $this->whereCond = false;
            return $this->execute();
          }catch(Exception $e){
            die($e->getMessage());
          }
        }
      }
    }

    public function updateQuery($values = array()){
      if(!is_array($values) || $this->whereCond==false){
        if(!is_array($values)){
          throw new Exception("required 1 parater in updateQuery(['column1'=>'value1', 'column2'=>'value2'])");
        }else{
          throw new Exception("in queryBuilder add once where condition with updateQuery(['column1'=>'value1', 'column2'=>'value2'])"); 
        }
      }else{
        $updateQuery = "";
        if (is_array($values)) {
          $i=0;
          foreach ($values as $key => $value) {
            ++$i;
            if($i==1)
              $updateQuery .= $key."=:value".$i;
            else
              $updateQuery .= ", ".$key."=:value".$i;
            $this->bindArray["value".$i]=$value;
          }

          list($explode0, $explode1) = array_pad(explode($this->tblName." AND", $this->queryBuilder, 2), 2, "");
          if($explode1!=""){
            $this->queryBuilder = "UPDATE ".$this->tblName." SET ".$updateQuery." WHERE ".$explode1;
          }else{
            list($explode0, $explode1) = array_pad(explode($this->tblName." OR", $this->queryBuilder, 2), 2, "");
            $this->queryBuilder = "UPDATE ".$this->tblName." SET ".$updateQuery." WHERE ".$explode1;
          }
          try{
            foreach ($this->bindArray as $key => $value) {
              $this->queryBuilder = str_replace(":".$key, "'".$value."'", $this->queryBuilder);
            }
            $query = $this->queryBuilder;
            $this->queryBuilder = null;
            $this->bindArray = (array)null;
            $this->joinBuilder = "";
            $this->whereCond = false;
            return $query;
          }catch(Exception $e){
            die($e->getMessage());
          }
        }
      }
    }

    public function delete(){
        list($explode0, $explode1) = array_pad(explode($this->tblName." AND", $this->queryBuilder, 2), 2, "");
          if($explode1!=""){
            $this->queryBuilder = "DELETE FROM ".$this->tblName." WHERE ".$explode1;
          }else{
            list($explode0, $explode1) = array_pad(explode($this->tblName." OR", $this->queryBuilder, 2), 2, "");
            $this->queryBuilder = "DELETE FROM ".$this->tblName." WHERE ".$explode1;
          }
        try{
          $this->query($this->queryBuilder);
          foreach ($this->bindArray as $key => $value) {
            $this->bind($key, $value);
          }
          $this->queryBuilder = null;
          $this->bindArray = (array)null;
          $this->joinBuilder = "";
          $this->whereCond = false;
          return $this->execute();
        }catch(Exception $e){
          die($e->getMessage());
        }
    }
    public function deleteQuery(){
        list($explode0, $explode1) = array_pad(explode($this->tblName." AND", $this->queryBuilder, 2), 2, "");
          if($explode1!=""){
            $this->queryBuilder = "DELETE FROM ".$this->tblName." WHERE ".$explode1;
          }else{
            list($explode0, $explode1) = array_pad(explode($this->tblName." OR", $this->queryBuilder, 2), 2, "");
            $this->queryBuilder = "DELETE FROM ".$this->tblName." WHERE ".$explode1;
          }
        try{
          $this->query($this->queryBuilder);
          foreach ($this->bindArray as $key => $value) {
            $this->queryBuilder = str_replace(":".$key, "'".$value."'", $this->queryBuilder);
          }
          $query = $this->queryBuilder;
          $this->queryBuilder = null;
          $this->bindArray = (array)null;
          $this->joinBuilder = "";
          $this->whereCond = false;
          return $query;
        }catch(Exception $e){
          die($e->getMessage());
        }
    }
    public function get(){
      try{
        if($this->joinBuilder!=""){
          if($this->whereCond){
            list($explode0, $explode1) = array_pad(explode($this->joinBuilder." AND", $this->queryBuilder, 2), 2, "");
            if($explode1!=""){
              $this->queryBuilder = $explode0.$this->joinBuilder." WHERE ".$explode1;
            }else{
              list($explode0, $explode1) = array_pad(explode($this->joinBuilder." OR", $this->queryBuilder, 2), 2, "");
              $this->queryBuilder = $explode0.$this->joinBuilder." WHERE ".$explode1;
            }
          }
        }else{
          if($this->whereCond){
            list($explode0, $explode1) = array_pad(explode($this->tblName, $this->queryBuilder, 2), 2, "");
            $this->queryBuilder = $explode0.$this->tblName.$explode1;
            list($explode0, $explode1) = array_pad(explode($this->tblName." AND", $this->queryBuilder, 2), 2, "");
            if($explode1!=""){
              $this->queryBuilder = $explode0.$this->tblName." WHERE ".$explode1;
            }else{
              list($explode0, $explode1) = array_pad(explode($this->tblName." OR", $this->queryBuilder, 2), 2, "");
              $this->queryBuilder = $explode0.$this->tblName." WHERE ".$explode1;
            }
          }
        }
        //echo $this->queryBuilder;
        $this->query($this->queryBuilder);
        foreach ($this->bindArray as $key => $value) {
          $this->bind($key, $value);
        }
        $resultSet = $this->resultSet();
        $this->queryBuilder = null;
        $this->bindArray = (array)null;
        $this->joinBuilder = "";
        $this->whereCond = false;
        return json_decode(json_encode($resultSet), true);  
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function getQuery(){
      try{
        if($this->joinBuilder!=""){
          if($this->whereCond){
            list($explode0, $explode1) = array_pad(explode($this->joinBuilder." AND", $this->queryBuilder, 2), 2, "");
            if($explode1!=""){
              $this->queryBuilder = $explode0.$this->joinBuilder." WHERE ".$explode1;
            }else{
              list($explode0, $explode1) = array_pad(explode($this->joinBuilder." OR", $this->queryBuilder, 2), 2, "");
              $this->queryBuilder = $explode0.$this->joinBuilder." WHERE ".$explode1;
            }
          }
        }else{
          if($this->whereCond){
            list($explode0, $explode1) = array_pad(explode($this->tblName, $this->queryBuilder, 2), 2, "");
            $this->queryBuilder = $explode0.$this->tblName.$explode1;
            list($explode0, $explode1) = array_pad(explode($this->tblName." AND", $this->queryBuilder, 2), 2, "");
            if($explode1!=""){
              $this->queryBuilder = $explode0.$this->tblName." WHERE ".$explode1;
            }else{
              list($explode0, $explode1) = array_pad(explode($this->tblName." OR", $this->queryBuilder, 2), 2, "");
              $this->queryBuilder = $explode0.$this->tblName." WHERE ".$explode1;
            }
          }
        }
        //echo $this->queryBuilder;
        foreach ($this->bindArray as $key => $value) {
          $this->queryBuilder = str_replace(":".$key, $value,$this->queryBuilder);
        }
        $query = $this->queryBuilder;
        $this->queryBuilder = null;
        $this->bindArray = (array)null;
        $this->joinBuilder = "";
        $this->whereCond = false;
        return $query;
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function first(){
      try{
        if($this->joinBuilder!=""){
          if($this->whereCond){
            list($explode0, $explode1) = array_pad(explode($this->joinBuilder." AND", $this->queryBuilder, 2), 2, "");
            if($explode1!=""){
              $this->queryBuilder = $explode0.$this->joinBuilder." WHERE ".$explode1;
            }else{
              list($explode0, $explode1) = array_pad(explode($this->joinBuilder." OR", $this->queryBuilder, 2), 2, "");
              $this->queryBuilder = $explode0.$this->joinBuilder." WHERE ".$explode1;
            }
          }
        }else{
          if($this->whereCond){
            list($explode0, $explode1) = array_pad(explode($this->tblName, $this->queryBuilder, 2), 2, "");
            $this->queryBuilder = $explode0.$this->tblName.$explode1;
            list($explode0, $explode1) = array_pad(explode($this->tblName." AND", $this->queryBuilder, 2), 2, "");
            if($explode1!=""){
              $this->queryBuilder = $explode0.$this->tblName." WHERE ".$explode1;
            }else{
              list($explode0, $explode1) = array_pad(explode($this->tblName." OR", $this->queryBuilder, 2), 2, "");
              $this->queryBuilder = $explode0.$this->tblName." WHERE ".$explode1;
            }
          }
        }
        //echo $this->queryBuilder;
        $this->query($this->queryBuilder);
        foreach ($this->bindArray as $key => $value) {
          $this->bind($key, $value);
        }
        $this->queryBuilder = null;
        $this->bindArray = (array)null;
        $this->joinBuilder = "";
        $this->whereCond = false;
        return $this->single();
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
    public function firstQuery(){
      try{
        if($this->joinBuilder!=""){
          if($this->whereCond){
            list($explode0, $explode1) = array_pad(explode($this->joinBuilder." AND", $this->queryBuilder, 2), 2, "");
            if($explode1!=""){
              $this->queryBuilder = $explode0.$this->joinBuilder." WHERE ".$explode1;
            }else{
              list($explode0, $explode1) = array_pad(explode($this->joinBuilder." OR", $this->queryBuilder, 2), 2, "");
              $this->queryBuilder = $explode0.$this->joinBuilder." WHERE ".$explode1;
            }
          }
        }else{
          if($this->whereCond){
            list($explode0, $explode1) = array_pad(explode($this->tblName, $this->queryBuilder, 2), 2, "");
            $this->queryBuilder = $explode0.$this->tblName.$explode1;
            list($explode0, $explode1) = array_pad(explode($this->tblName." AND", $this->queryBuilder, 2), 2, "");
            if($explode1!=""){
              $this->queryBuilder = $explode0.$this->tblName." WHERE ".$explode1;
            }else{
              list($explode0, $explode1) = array_pad(explode($this->tblName." OR", $this->queryBuilder, 2), 2, "");
              $this->queryBuilder = $explode0.$this->tblName." WHERE ".$explode1;
            }
          }
        }
        //echo $this->queryBuilder;
        $this->query($this->queryBuilder);
        foreach ($this->bindArray as $key => $value) {
          $this->queryBuilder = str_replace(":".$key, $value,$this->queryBuilder);
        }
        $query = $this->queryBuilder;
        $this->queryBuilder = null;
        $this->bindArray = (array)null;
        $this->joinBuilder = "";
        $this->whereCond = false;
        return $query;
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
  }
