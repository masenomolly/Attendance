<?php
 require '../database/database.php';
  include_once 'auth-check.php';



if(!$_GET['id']){
    include './includes/error.php';
}
else{
    //get id value
    $id = $_GET['id'];


    // call delete function
    $result= $crud->delete($id);
    // redirect to list
    if($result){
        header("Location: viewlist.php");
    }
    else{
        include './includes/error.php';
    }


}

 ?>