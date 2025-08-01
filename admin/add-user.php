
<?php

include 'parts2/header2.php';
$firstname = $_SESSION['add-user-data']['firstname'] ?? null;
$lastname = $_SESSION['add-user-data']['lastname'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$createpassword = $_SESSION['add-user-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ?? null;
// $userrole = $_SESSION['add-user-data']['userrole'] ?? null;

unset($_SESSION['add-user-data']); // clear session data after using it

?>

    <section class="form__section" >

        <div class="container form__section-container">
            <h2>Add User</h2>
            <?php
            if(isset($_SESSION['add-user'])):?> 
            <div class="alert__message error">
                <p><?= $_SESSION['add-user'] ;
                unset($_SESSION['add-user']); ?></p>
            </div>
            <?php endif; ?>
            <form action="<?= ROOT_URL?>admin/add-user-logic.php" enctype="multipart/form-data" method="POST">

                <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
                <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name">
                <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
                <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
                <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder=" Create Password">
                <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder=" Confirm Password">
                <select name="userrole" id="">
                    <option value="0">Author </option>
                    <option value="1">Admin </option>

                </select>

                <div class="form__control">
                    <label for="avatar" class="white">User Avatar</label>
                    <input type="file" name="avatar" style="margin: 4px 0;" id="avatar">

                </div>
                <button type="submit" name="submit" class="btn">Add User</button>


            </form>
        </div>





    </section>
 <?php

include '../parts/footer.php'; 
?>