<?php  

include  'header.php';
include '../database/database.php';
include_once 'auth-check.php';


  
  if (!isset($_GET['id'])){
    include './includes/error.php';
    header('location: viewlist.php');
  }
  else{
    $id = $_GET['id'];
    $result = $crud->getID($id); ?>

<div class="container card">
    <p>First Name : <?php echo $result['firstname']; ?></p>
    <p>Last Name :<?php echo $result['lastname']; ?></p>
    <p> Category :<?php echo $result['name']; ?></p>
    <p>D.O.B :<?php echo $result['dateofbirth']; ?></p>
    <p>Phone Number:<?php echo $result['phone_number']; ?></p>
    <p >Email Address  :<?php echo $result['Email_address']; ?></p>
    <p>Password  :<?php echo $result['PASS']; ?></p>
    <p><Address :<?php echo $result['Avatar']; ?> ></p>
    <!-- <p>Address :<?php echo $result['avatar']; ?></p> -->


</div>

 <div class="btns" style="margin: 1rem auto; width:fit-content;">
 <a class="btn"  style="background-color: #1E2A78 ; color:#fff; text-align:center; border-radius:8px; padding:.5rem; width:fit-content; font-size:18px;" href="viewlist.php">Go Back</a>
        <a class="btn update" style="background-color: #B6FFCE ;padding:.5rem; width:fit-content;border-radius:8px; text-align:center; color:#354259;font-size:18px;" href="update.php?id=<?php echo $result["Attendee_id"];?>">Update</a>
        <a class="btn delete" onclick="return confirm('Confirm you want to delete  this record')" style="background-color: #FF6363 ;padding:.5rem; width:fit-content;border-radius:8px; font-size:18px; color:#F7ECDE; "href="delete.php?id=<?php echo $result["Attendee_id"];?>">Delete</a>
 </div>       
            
<?php } ?>
<?php  include 'footer.php'?>