<?php 
$title = 'View Records';
require_once '../database/database.php';

include 'header.php';
include_once 'auth-check.php';
// we call the result  we defined in  crud.php
$results = $crud->getAttendees();


?>

<div class="container">
<table>
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <!-- <th>DOB</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Password</th>
        <th>Address</th> -->
        <th>Category</th>
        <th>View</th>
    </tr>
    <!-- TO print  our  values  in our table we declare a while statement -->
    <?php
while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
    
    ?>


    <!-- Here we  print our values  as indicated  in our database -->
    <tr>
        <td><?php echo $r["Attendee_id"];?></td>
        <td><?php echo $r["firstname"];?></td>
        <td><?php echo $r["lastname"];?></td>
         <!-- <td><?php echo $r["dateofbirth"];?></td>
        <td><?php echo $r["phone_number"];?></td>
        <td><?php echo $r["Email_address"];?></td>
        <td><?php echo $r["PASS"];?></td>
        <td><?php echo $r["Avatar"];?></td>-->
        <td><?php echo $r["name"];?></td>
        <td>
        <a class="btn" href="view.php?id=<?php echo $r["Attendee_id"];?>">View</a>
        <a class="btn update" href="update.php?id=<?php echo $r["Attendee_id"];?>">Update</a>
        <a class="btn delete" href="delete.php?id=<?php echo $r["Attendee_id"];?>">Delete</a>
            </td>
    </tr>
    <!-- Here we close our while loop } -->
    <?php }?>
 </table>
</div>



<?php include 'footer.php';?>

