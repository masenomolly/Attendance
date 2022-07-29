<?php require_once'./includes/header.php';

require "./database/database.php";


if(isset($_POST['submit'])){
    $course_id = $_POST["course_id"];
    $course =  $_POST["course_id"];
    $term =  $_POST["term"];
    $course_yr = $_POST["course_yr"];
    $comments = $_POST['comments'];


    // call inserstion  function
    $results = $crud->insertsigned($course_id, $course,$term,$course_yr,$comments);
     if($results){
        header('Location: list.php');
     }
     else{
        include './includes/error.php';
     }
     
}

?>

<h1 class="reg">Attedance Register For Student</h1>
<p style="text-align: center;color:red;">* Required</p>

<div class="container form__container">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" class="form" encrequired type="multipart/form-data" method="post">
    <div class="form-group">
            <label for="course">* Enter Your School Number ID</label><br>
            <input required type="text" name="course_id" placeholder=" Enter ID " id="course_id">
        </div>
    <div class="form-group">
            <label for="course"> * Enter Course Name</label><br>
            <input required type="text" name="course" placeholder="Course Name" id="course">
        </div>
        
        <div class="form-group">
        <label for="sem">* Select Semester</label><br>
            <input type="text" name="term" id="term" placeholder="Enter term session">
        </div>
        <div class="form-group">
            <label for="course_yr">* Enter Your Course number/year</label><br>
            <input required type="text" name="course_yr" placeholder=" Format abdv/2020 " id="course_yr">
        </div>
        <div class="form-group">
            <label for="textarea">Comment on Last term</label><br>
            <textarea name="comments" id="textarea" cols="30" rows="10"></textarea>
            <!-- <input required type="text" name="text" placeholder=" Comments on Last term " id="comments"> -->
        </div>
       

        <button class="btn" required type="submit" name="submit">Done</button>
    </form>
    

</div>





<?php include "./includes/footer.php";?>