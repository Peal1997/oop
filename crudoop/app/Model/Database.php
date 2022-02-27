<?php

namespace APP\Model;

use mysqli;

abstract class Database{
private $host = 'localhost';
private $user = 'root';
private $pass = '';
private $db = 'object';
/**
 * connection
 */

private function connect(){
    return new mysqli($this->host , $this->user ,$this->pass , $this->db);
}

/**
 * Insert record into database
 */

protected function create($sql)
{
   return $this->connect()->query("$sql");
}

 /**
  * show record from database
  */

  protected function all($table , $type='DESC')
  {
     return $this->connect()->query("SELECT * FROM {$table} ORDER BY id {$type}");
  }

/**
 * call a function for view in a single page
 */
  protected function select($table,$id )
  {
    return $this->connect()->query("SELECT * FROM {$table} WHERE id='{$id}'   ");

  }
  /**
 * call a function for delete data
 */

  protected function delete($table,$id )  {

     $this->connect()->query(" DELETE FROM {$table} WHERE id='{$id}' ");
  }
/**
 * Load previous data into edit page
 */

  protected function editLoad($table,$id )  {

  return $this->connect()->query(" SELECT * FROM {$table} WHERE id='{$id}' ");
}

/**
 * update new data
 */

 protected function update($sql)
 {
   return $this->connect()->query("$sql");
 }
 /**
 * call a funtion for searching data
 */

 protected function search($table ,$gender,$education)
 {
   return $this->connect()->query("SELECT * FROM {$table} WHERE gender = '$gender' AND education = '$education' ");
 }




    
}


?>