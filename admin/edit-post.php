<?php

include 'parts2/header2.php';
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);

if(isset($_GET["id"])){
$id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT * FROM posts WHERE id=$id";
$result = mysqli_query($connection, $query);
$post = mysqli_fetch_assoc($result);


}
else{ 
   header('location: ' . ROOT_URL . 'admin/');
die();

  }
?>
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Edit Post</h2>
           
           <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">

                <input type="hidden" name="id" value="<?= $post['id']?>">
                 <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail']?>">
                <input type="text" placeholder="Title" name="title" value="<?= $post['title']?>">
                <select name="category" id="">
                    <?php while($category = mysqli_fetch_assoc($categories)): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                    <?php endwhile ?>
                    
                    
                </select>


                <textarea id="" rows="10" placeholder="body" name="body"><?=$post['body']?></textarea>
                <div class="form__control inline">
                    <input type="checkbox" id="is_featured" name="is_featured" value="1" checked>
                    <label for="is_featured" class="white"> Featured</label>
                </div>
                <!-- ////////////////اخد بالي من photo مش thumbel ///////////-->
                <div class="form__control">
                     <label for="photo" class="white"> update photo</label>
                    <input type="file" name="thumbnail" id="photo" >
                   
                </div>

                <button type="submit" class="btn" name="submit">Update Post</button>


            </form>
        </div>

    </section>
     <?php

include '../parts/footer.php';
?>