<?php

namespace APP\Controller;

use APP\Model\Database;



class Student extends Database{

public function createNewStudent($name ,$email,$cell,$edu,$gender)
{
return $this->create("INSERT INTO users (name ,email , cell ,education,gender) VALUES ('$name','$email','$cell','$edu','$gender')");
}

/**
 * show records
 */
public function showAll()
{
   $data = $this->all('users');
   return $data;
}
/**
 * call from user table
 */

public function viewAll($user_id)
{
  return  $this->select('users' , $user_id );

}
   /**
    * call function for delete data
    */

public function deleteData($delete_id)
{
   $this->delete('users',$delete_id);

}
  /**
    * call function for edit data
    */


public function editData($edit_id)
{
   return $this->editLoad('users',$edit_id);
}
/**
    * call function for update data
    */

public function updateData($name ,$email,$cell,$edu,$gender,$edit_id)
{
   return $this->update("UPDATE users SET name ='$name' ,email ='$email',cell ='$cell',gender ='$gender' ,
   education ='$edu' WHERE id ='$edit_id' ");
}
/**
 * gender and education wise search
 */
public function searchData($gender,$education)
{
   return $this->search('users',$gender,$education);
}









}

?>
