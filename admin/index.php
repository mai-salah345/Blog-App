<?php

include 'parts2/header2.php';
$current_admin_id = $_SESSION['user_id'] ;
$query = "SELECT id , title ,category_id FROM posts  WHERE author_id = $current_admin_id order by id desc";

$posts=mysqli_query($connection, $query);
?>
   
 <section class="dashboard">
     <?php
    if (isset($_SESSION['add-post-success'])):  //show if add category was successful ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-post-success'];
                unset($_SESSION['add-post-success']);
                ?>
            </p>
        </div>
        <?php
    elseif (isset($_SESSION['edit-post-success'])):  //show if add category was successful ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-post-success'];
                unset($_SESSION['edit-post-success']);
                ?>
            </p>
        </div>
        <?php
         elseif (isset($_SESSION['edit-post'])):  //show if add category was successful ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['edit-post'];
                unset($_SESSION['edit-post']);
                ?>
            </p>
        </div>
        <?php
        elseif (isset($_SESSION['delete-post-success'])):  //show if add category was successful ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['delete-post-success'];
                unset($_SESSION['delete-post-success']);
                ?>
            </p>
        </div>
        
        
    <?php endif; ?>
   <div class=" container dashboard__container">
<aside>
    <ul>
        <li>
            <a href="<?php echo ROOT_URL ?>admin/add-post.php"><i class="uil uil-pen"></i><h5>add post</h5></a>
        </li>
         <li>
            <a href="<?php echo ROOT_URL ?>admin/index.php"><i class="uil uil-postcard"></i><h5>manage posts</h5></a>
        </li>
        <?php
        if(isset($_SESSION['user_is_admin'])): ?>
         <li>
            <a href="<?php echo ROOT_URL ?>admin/add-user.php"><i class="uil uil-user-plus"></i><h5>add user</h5></a>
        </li>
         <li>
            <a href="<?php echo ROOT_URL ?>admin/manage-users.php"><i class="uil uil-users-alt"></i><h5>manage user</h5></a>
        </li>
         <li>
            <a href="<?php echo ROOT_URL ?>admin/add-category.php"><i class="uil uil-edit"></i> <h5>add category</h5></a>
        </li>
         <li>
            <a href="<?php echo ROOT_URL ?>admin/manage-categories.php"><i class="uil uil-list-ul"></i> <h5>manage category</h5></a>
        </li>
        <?php endif ?>
    </ul>
</aside>
<main>
    <h2>manage posts</h2>
    <?php if(mysqli_num_rows($posts) > 0) : ?>
    <table>
        <thead>
        <tr>
        <th class="white">title</th>
        <th class="white">category</th>
        <th  class="white">Edit</th>
        <th  class="white">Delet</th>
        
        </tr>
    </thead>
        <tbody>
             <?php while($post = mysqli_fetch_assoc($posts)): ?>
        <?php
        $category_id = $post['category_id'];
        $category_query = "SELECT title FROM categories WHERE id = $category_id";
        $category_result = mysqli_query($connection, $category_query); 
        $category = mysqli_fetch_assoc($category_result);
                   ?>
        <tr>
            <td class="white"><?= $post['title'] ?></td>
            <td class="white"><?= $category['title'] ?></td>
           <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="btn clr green">Edit</a></td>
<td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id'] ?>" class="btn clr danger">Delete</a></td>
        </tr>
        <?php endwhile ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="alert__message error">
            <p>No posts found</p>
        </div>
    <?php endif; ?>
</main>

   </div>


 </section>
   <?php

include '../parts/footer.php';
?>