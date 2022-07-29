<?php  include 'header.php';
include '../database/database.php' ;
include_once 'auth-check.php';

$carts = $crud->getcategory();

if (!isset($_GET['id'])){
    // echo "<h1>Error occured</h1>";
    include './includes/error.php';
}
else{
    $id=$_GET['id'];
    $attendee = $crud->getID($id);
    ?>

<h1 class="reg" style="color: green;">Update your status</h1>

<div class="container form__container">
    <form action="editdetails.php"  class="form" enctype="multipart/form-data" method="post">
     <input type="hidden" name="attend" value="<?php echo $attendee['Attendee_id']?>">
    
    <div class="form-group">
            <label for="first_name">First Name</label><br>
            <input type="text" value="<?php echo $attendee['firstname'];?>" name="first_name" placeholder="Enter Your First Name" id="first_name">
        </div> 
        <div class="form-group">
            <label for="last_name"> Last Name </label><br>
            <input type="text" value="<?php echo $attendee['lastname'];?>" name="last_name" placeholder="Enter Your last Name" id="last_name">
        </div>
        <div class="form-group">
            <label for="datepicker">Enter Your D.O.B</label><br>
            <input type="text" value="<?php echo $attendee['dateofbirth'];?>" name="date" placeholder="Format yy/mm/dd" id="datepicker">
        </div>
        <div class="form-group">
            <label for="select">Update Your Status</label><br>
            <select name="select-number" class="select">
             <?php while ($r = $carts->fetch(PDO::FETCH_ASSOC)) {?>
             <option value="<?php echo  $r['category_id']; ?>" <?php  if ($r['category_id'] == $attendee['Category'])echo 'selected';?> >
             <?php echo  $r["name"];?></option>

             <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="number">Update Your Phone Number</label><br>
            <input type="text" value="<?php echo $attendee['phone_number'];?>" name="number" placeholder="Enter Your Phone" id="number">
        </div>
        <div class="form-group">
            <label for="email">Update Your Email</label><br>
            <input type="email" value="<?php echo $attendee['Email_address'];?>" name="email" placeholder="Enter Your Email" id="email">
        </div>
        <div class="form-group">
            <label for="pass">Update Password</label><br>
            <input type="password" name="pass1" value="<?php echo $attendee['PASS'];?>"  placeholder="Enter Password" id="pass">
        </div>
        <div class="form-group">
            <label for="pass">Confirm Password</label><br>
            <input type="password" name="pass2" placeholder="Retype Password" id="pass1">
        </div>
        <div class="form-group">
            <label for="avatar">Enter Address</label></label><br>
          <input type="text" name="avatar" id="avatar">
        </div>
        <button class="btn" type="submit" name="submit">Update</button>
    </form>
    

</div>
}
<?php
}?>

<?php include 'footer.php' ?>
