<?php

include 'parts2/header2.php';

// get back form data if invalid
$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);
?>

    <section class="form__section" style="margin:0; padding: 0;">
        <div class="container form__section-container">
            <h2>Add Category</h2>
            <?php if(isset($_SESSION['add-category'])) : ?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['add-category'];
                        unset($_SESSION['add-category']) ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="POST">  
                <input type="text" value="<?= $title ?>" name="title" placeholder="Title ">  
                <textarea name="description" value="<?= $description ?>" id="" rows="4" placeholder="description"></textarea>    
                <button type="submit" name="submit" class="btn" >Add Category</button>
            </form>
        </div>

    </section>
    <?php

include '../parts/footer.php';
?>