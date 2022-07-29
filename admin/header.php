<?php include 'session.php';?>
<!-- This file has session   -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attedance</title>
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="../css/main.css">

    <!--FONTS GOOGLE CDN-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

<!--FONT AWESOME ICONS  CDN-->
<script src="https://kit.fontawesome.com/f1deb10f83.js" crossorigin="anonymous"></script>


<!--JQUERY DATE PICKER-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body>
    <header >
        
        <nav class="container nav__container">
        <div><h1 class="logo"><a href="index.php">ATTENDANCE SYSTEM</a></h1></div>
            <ul class="nav__container-list">
                <!-- <li><a href="<?php echo 'http://localhost/Attedance/'?>index.php">home</a></li> -->
                <!-- <li><a href="<?php echo 'http://localhost/Attedance/'?>about.php">about</a></li> -->
                <!-- <li><a href="<?php echo 'http://localhost/Attedance/'?>services.php">services</a></li> -->
                <!-- <li><a href="<?php echo 'http://localhost/Attedance/'?>contact.php">contact</a></li> -->
                <!-- <li><a href="<?php echo 'http://localhost/Attedance/'?>signin.php">signin</a></li> -->
                

                <li><a href="../index.php">home</a></li>
                <li><a href="../about.php">about</a></li>
                <!-- <li><a href="services.php">services</a></li> -->
                <li><a href="../contact.php">contact</a></li>
                <div class="logs">
                    <?php
                    if(!isset($_SESSION['id'])){
                 ?>
                <li><a href="../signin.php">Sign In</a></li>
                <?php }else{?>
                <span style="display: inline-block;"><?php echo $_SESSION['username']?></span>
                <li><a href="../logout.php"> Sign Out</a></li>

                    <?php }?>
                </div>
                </div>
            </ul>
        </nav>
    </header>
    <aside class="aside">
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="viewlist.php">Accounts</a></li>
        <li><a href="../list.php">Signed</a></li>

    </ul>
 </aside>