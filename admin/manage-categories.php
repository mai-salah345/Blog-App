<?php

include 'parts2/header2.php';

// fetch categories from DB
$query = "SELECT * FROM categories ORDER BY title";
$categories = mysqli_query($connection, $query);
?>
   
 <section class="dashboard">
    <?php
    if (isset($_SESSION['add-category-success'])):  //show if add category was successful ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-category-success'];
                unset($_SESSION['add-category-success']);
                ?>
            </p>
        </div>
    <?php
    elseif (isset($_SESSION['add-category'])):  //show if add category was NOT successful ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['add-category'];
                unset($_SESSION['add-category']);
                ?>
            </p>
        </div>
    <?php
    elseif (isset($_SESSION['edit-category'])):  //show if edit category was NOT successful ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['edit-category'];
                unset($_SESSION['edit-category']);
                ?>
            </p>
        </div>
    <?php
    elseif (isset($_SESSION['edit-category-success'])):  //show if edit category was successful ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-category-success'];
                unset($_SESSION['edit-category-success']);
                ?>
            </p>
        </div>
    <?php
    elseif (isset($_SESSION['delete-category-success'])):  //show if delete category was successful ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['delete-category-success'];
                unset($_SESSION['delete-category-success']);
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
    <h2>manage categories</h2>
    <?php if(mysqli_num_rows($categories) > 0) : ?>
    <table>
        <thead>
            <tr>
                <th class="white">Title</th>
                <th  class="white">Edit</th>
                <th  class="white">Delet</th>
            </tr>
        </thead>
        <tbody>
            <?php while($category = mysqli_fetch_assoc($categories)) : ?>
            <tr>
                <td class="white" ><?= $category['title'] ?></td>
                <td><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $category['id'] ?>" class="btn clr green">Edit</a></td>
                <td><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $category['id'] ?>" class="btn clr danger">Delete</a></td>
            </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <?php else : ?>
        <div class="alert__message error"><?= "No categories found " ?></div>
        <?php endif ?>
</main>

   </div>


 </section>
  <?php

include '../parts/footer.php';
?>