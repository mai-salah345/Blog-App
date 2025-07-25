<?php

include 'parts2/header2.php';


//display allll users instead of current user 
$current_admin_id = $_SESSION['user_id'] ;
$query = "SELECT * FROM users WHERE id != $current_admin_id";

$users=mysqli_query($connection, $query);
?>
   

<section class="dashboard">
    <?php
    if (isset($_SESSION['add-user-success'])): ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']);
                ?>
            </p>
        </div>
    <?php
    elseif (isset($_SESSION['edit-user-success'])): ?> 
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>
            </p>
        </div>
    <?php
    elseif (isset($_SESSION['edit-user-success'])): ?> 
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>
            </p>
        </div>
    <?php
    if (isset($_SESSION['add-user-success'])): ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']);
                ?>
            </p>
        </div>
    <?php
    elseif (isset($_SESSION['edit-user-success'])): // shows if edit user was successful ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <?php
    elseif (isset($_SESSION['edit-user'])): // shows if edit user was NOT successful ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
            </p>
        </div>
    <?php
    elseif (isset($_SESSION['delete-user'])):  // shows if delete user was NOT successful ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['delete-user'];
                unset($_SESSION['delete-user']);
                ?>
            </p>
        </div>
    <?php
    elseif (isset($_SESSION['delete-user-success'])):  // shows if edit user was successful ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success']);
                ?>
            </p>
        </div>
    <?php endif ?>



   <div class=" container dashboard__container">
<aside>

    <ul>

        <li>
            <a href="add-post.php"><i class="uil uil-pen"></i><h5>add post</h5></a>
        </li>
         <li>
            <a href="index.php"><i class="uil uil-postcard"></i><h5>manage posts</h5></a>
        </li>
        <?php
        if(isset($_SESSION['user_is_admin'])): ?>
         <li>
            <a href="add-user.php"><i class="uil uil-user-plus"></i><h5>add user</h5></a>
        </li>
         <li>
            <a href="manage-users.php"><i class="uil uil-users-alt"></i><h5>manage user</h5></a>
        </li>
         <li>
            <a href="add-category.php"><i class="uil uil-edit"></i> <h5>add category</h5></a>
        </li>
         <li>
            <a href="manage-categories.php"><i class="uil uil-list-ul"></i> <h5>manage category</h5></a>
        </li>
        <?php endif ?>
    </ul>
</aside>
<main>
    <h2>manage users</h2>
    <?php if(mysqli_num_rows($users) > 0) : ?>
    <table>
        <thead>
        <tr>
        <th class="white">name</th>
        <th class="white">username</th>
        <th  class="white">Edit</th>
        <th  class="white">Delet</th>
        <th class="white">admin</th>
        </tr></thead>
        <tbody>
             <?php while($user = mysqli_fetch_assoc($users)): ?>
        
        <tr>
            <td class="white"><?= $user['firstname'] . ' ' . $user['lastname'] ?></td>

            <td class="white"><?= $user['username'] ?></td>

           <td><a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['id'] ?>" class="btn clr green">Edit</a></td>
<td><a href="<?= ROOT_URL ?>admin/delete-user.php?id=<?= $user['id'] ?>" class="btn clr danger">Delete</a></td>


      <td class="white"><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>

        </tr>
        <?php endwhile; ?>
       </tbody>
         
    </table>
    <?php else : ?>
        <div class="alert__message error"><?= "No users found "  ?></div>
    <?php endif ?>
</main>

   </div>


 </section>
   <?php

include '../parts/footer.php';
?>