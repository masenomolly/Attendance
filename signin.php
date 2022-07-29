<?php require './includes/header.php';
  require_once "./database/database.php";
//   if form is submitted using post

// $_SERVER['REQUEST_METHOD'] == 'POST'  used to  setup login authentication
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
     
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['Pass'];
    $new_password = md5($password);

    $results= $users->getuser($username,$new_password);

    if(!$results){
        echo"<h1 style='margin:2rem auto; background-color: #FF6363; padding:.5rem; width:fit-content;border-radius:8px; text-align:center; font-size:18px;'>Details Don't Match</h1>";
    }
    else{
        $_SESSION['username']= $username;
        $_SESSION['id']= $results['user_id'];
        header('Location: attended.php');
    }
    // echo "<h1>$username your Password is  $new_password</h1>";

  }
  
  
  
  
  
  
  ?>
<h1 class="reg">Login</h1>
<div class="container form__container">
    <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" class="form" encrequired type="multipart/form-data" method="POST">
   
        <div class="form-group">
            <label for="email">Enter Your Username</label><br>
            <!-- value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']?>" -->
            <input  type="text" name="username"  placeholder="Enter Your Email/Username" id="email">
        </div>
        <div class="form-group">
            <label for="pass">Enter Password</label><br>
            <input  type="password" name="Pass" placeholder="Enter Password" id="pass">
        </div>
        <div class="form-group ck">
           <input  type="checkbox" name="" id="">
           <label for="check">Remember Me</label>
        </div>
        <div class="forgot">
        <small>Forgot Password <a href="">click here</a></small><br>
        <small>Don't have an account <a href="./sigin-up.php">Sign Up</a></small>
    </div>
        <button class="btn"  type="submit">Login</button>
    </form>

    
</div>

<?php require'./includes/footer.php'?>