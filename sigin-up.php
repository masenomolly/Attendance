<?php
$title = 'index';
require_once './database/database.php';
 require 'includes/header.php';
 $carts = $crud->getcategory();

 if(isset($_POST['submit'])){
    //extract values in form in array
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $dob = $_POST['date'];
    $category = $_POST['select-number'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $pass = $_POST['pass1'];
    $avatar = $_POST['avatar'];



// call function to insert and track if succes or not

    $isSuccess= $crud->insertAttendees ($fname,$lname,$dob,$number,$email,$pass,$avatar,$category) ;
    if($isSuccess){
    //   echo"<h1>Success</h1>";
    // include './includes/Suc_message.php';
    header('Location: signin.php');
    
      
    }
    else{
        // echo "<h1>Error occured</h1>";
        include './includes/error.php';
    }
}
if (isset($_POST['submit'])) {
    //extract values in form in array
 
    $username = $_POST['email'];
    $Pass= $_POST['pass1'];
    

    // call function to insert and track if succes or not

    $isSuccess= $users->insertuser($username,$Pass) ;
    if ($isSuccess) {
        //   echo"<h1>Success</h1>";
    header('Location: signin.php');
    // include './includes/Suc_message.php';
    } else {
        // echo "<h1>Error occured</h1>";
        include './includes/error.php';
    }
}
 ?>

<h1 class="reg">Registration For Student/Lecturer</h1>

<div class="container form__container">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" class="form" encrequired type="multipart/form-data" method="post">
    <div class="form-group">
            <label for="first_name">First Name</label><br>
            <input required type="text" name="first_name" placeholder="Enter Your First Name" id="first_name">
        </div>
        <div class="form-group">
            <label for="last_name"> Last Name </label><br>
            <input required type="text" name="last_name" placeholder="Enter Your last Name" id="last_name">
        </div>
        <div class="form-group">
            <label for="datepicker">Enter Your D.O.B</label><br>
            <input  type="text" name="date" placeholder="Format yy/mm/dd" id="datepicker">
        </div>
        <div class="form-group">
            <label for="select">Select Who you are</label><br>
            <select name="select-number" id="select">
             <?php while($r = $carts->fetch(PDO::FETCH_ASSOC)) {?>
             <option value="<?php echo  $r['category_id'];?>"><?php echo  $r["name"];?></option>

             <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label for="number">Enter Your Phone Number</label><br>
       
            <input  type="text" name="number" placeholder="Enter Your Phone" id="number">
        </div>
        <div class="form-group">
            <label for="email">Enter Your Email</label><br>
            <input required type="email" name="email" placeholder="Enter Your Email" id="email">
        </div>
        <div class="form-group">
            <label for="pass">Enter Password</label><br>
            <input required type="password" name="pass1" placeholder="Enter Password" id="pass">
        </div>
        <div class="form-group">
            <label for="pass">Confirm Password</label><br>
            <input required type="password" name="pass2" placeholder="Re-type Password" id="pass1">
        </div>
        <div class="form-group">
            <label for="avatar">Enter Address</label></label><br>
          <input  type="text" name="avatar" placeholder="Where do you stay" id="avatar">
        </div>
        <div class="forgot">
        <small>Already have an account <a href="./signin.php">Sign In</a></small>
        </div>
        <button class="btn" required type="submit" name="submit">Register</button>
    </form>  
    

</div>


<?php require'./includes/footer.php'?>