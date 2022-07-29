<?php 
$title = 'View Colleagues present';
require_once './database/database.php';

include './includes/header.php';
include_once './includes/auth-check.php';
// we call the result  we defined in  crud.php
$results = $crud->getsigned();


?> 

<div class="container">
<table>
    <tr>
        <th>Course Id</th>
        <th>Course Name</th>
        <th>Current Term</th>
        <th>Course Yr</th>
        <th>Comments</th>
    </tr>
    <!-- TO print  our  values  in our table we declare a while statement -->
    <?php
while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
    
    ?>


    <!-- Here we  print our values  as indicated  in our database -->
    <tr>
        <td><?php echo $r["course_id"];?></td>
        <td><?php echo $r["course"];?></td>
        <td><?php echo $r["term"];?></td>
        <td><?php echo $r["course_yr"];?></td>
        <td><?php echo $r["comments"];?></td>
    </tr>
    <!-- Here we close our while loop } -->
    <?php }?>
 </table>
</div>



<?php include './includes/footer.php';?>
