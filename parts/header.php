<?php

require 'config/database.php';

if(isset($_SESSION['user_id'])) {
    // User is logged in, you can access user data
    $id =  filter_var($_SESSION['user_id'],FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT avatar FROM users WHERE id = $id";
$result = mysqli_query($connection, $query);
$avatar = mysqli_fetch_assoc($result);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & MYSQL Blog Application with Admin panel</title>
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>css/style.css">
    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
   
        <nav>
            <div class="container nav__container">
                <a href="<?php echo ROOT_URL ?>index.php" class="nav__logo">MIXOLA</a>
                <ul class="nav__items">
                    <li><a href="<?php echo ROOT_URL ?>index.php">Home</a></li>
                    <li><a href="<?php echo ROOT_URL ?>blog.php">Blog</a></li>
                    <li><a href="<?php echo ROOT_URL ?>#aboutus">About</a></li>
                    <!-- <li><a href="services.html">Services</a></li> -->
                    <li><a href="<?php echo ROOT_URL ?>#contact">Contact</a></li>
                       <?php if(isset($_SESSION['user_id'])): ?>

                    <!-- <li><a href="<?php echo ROOT_URL ?>signin.php">Sign in</a></li> -->
                    <li class="nav__profile">
                        <div class="avatar">
                            <img src="<?php echo ROOT_URL . 'images/' . $avatar['avatar']; ?>" alt="User Avatar">
                        </div>
                        <ul>
                            <li><a href="<?php echo ROOT_URL ?>admin/index.php">Dashboard</a></li>
                            <li><a href="<?php echo ROOT_URL ?>logout.php">Log out</a></li>
                        </ul>
                    </li>
                
                <?php else: ?>
                    <li><a href="<?php echo ROOT_URL ?>signin.php">Sign in</a></li>
<?php endif; ?>
                </ul>
                </ul>

                <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
                <button id="close__nav-btn"><i class="uil uil-times"></i></button>
            </div>
        </nav>
