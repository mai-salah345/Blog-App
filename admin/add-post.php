<?php
include 'parts2/header2.php';

// fetch categories from database
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;
unset($_SESSION['add-post-data']); 
?>
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Add Post</h2>
            <?php if(isset($_SESSION['add-post'])): ?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['add-post'];
                        unset($_SESSION['add-post']);
                        ?>
                    </p>
                </div>
            <?php endif; ?>
            
            <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">  
                <input type="text" name="title" value="<?= $title ?>" placeholder="Title ">
                <select name="category" id="">
                    <?php while($category = mysqli_fetch_assoc($categories)): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                    <?php endwhile ?>
                </select>


                <textarea name="body" id="" rows="10" placeholder="body"><?= $body ?></textarea>
                <?php if(isset($_SESSION['user_is_admin'])) : ?>
                <div class="form__control inline">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                    <label for="is_featured" class="white"> Featured</label>
                </div>
                <?php endif ?>
                <!-- ////////////////اخد بالي من photo مش thumbel ///////////-->
                <div class="form__control">
                     <label for="photo" class="white"> Add Photo here</label>
                    <input type="file" name="thumbnail" id="photo" >
                   
                </div>

                <button type="submit" name="submit" class="btn">Add Post</button>


            </form>
        </div>

    </section>
      <?php

include '../parts/footer.php';
?>