<?php

include 'parts2/header2.php';

if(isset($_GET['id'])) 
{

    // $id =filter_var ($_GET['id'],FILTER-SANITIZE_NUMBER_INT);
    $id = $_GET['id'];
     $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connection, $query);

    $user = mysqli_fetch_assoc($result);  
}
else{
header('location: ' . ROOT_URL . 'admin/manage-users.php');
die();
}
?>
   
    <section class="form__section" >

        <div class="container form__section-container">
            <h2>Edit User</h2>
            
            <form action="<?= ROOT_URL ?>admin/edit-user-logic.php" method="POST">
    
                   <input type="hidden" name="id" value="<?= $user['id'] ?>">

               <input type="text" name="firstname" placeholder="First Name" value="<?= $user['firstname']?>">
               <input type="text" name="lastname" placeholder="Last Name" value="<?= $user['lastname'] ?>">

                
                <select name="userrole" id="">
                    <option value="0">Author </option>
                    <option value="1">Admin </option>

                </select>

                
                <button type="submit" name="submit" class="btn">update User</button>


            </form>
        </div>





    </section>
      <?php

include '../parts/footer.php';
?>