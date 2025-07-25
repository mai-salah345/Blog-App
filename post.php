 <?php
include 'parts/header.php';

// fetch post from DB if id is set
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}
?>
    
    <!-- ========================== end of nav =============================== -->



    <section class="singlepost">
    

        <div class="container singlepost__container">
            <h2><?= $post['title'] ?></h2>
            <div class="post__author singpoauthr">
                    <?php
                    // fetch author from users table using author_id
                    $author_id = $post['author_id'];
                    $author_query = "SELECT * FROM users WHERE id=$author_id";
                    $author_result = mysqli_query($connection, $author_query);
                    $author = mysqli_fetch_assoc($author_result);

                    ?>
                    <div class="post__author-avatar">
                        <img src="./images/<?= $author['avatar'] ?>">
                    </div>
                    <div class="post__author-info">
                        <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                        <small class="white">
                            <?= date("M d, Y - H:i", strtotime($post['date_time'])) ?>
                        </small>
                    </div>

                </div>

                <div class="singlepost__thumbnail">
                <img src="images/<?= $post['thumbnail'] ?>" alt="">
            </div>
            <p class="white">
                <?= $post['body'] ?>
            </p>
            
            <!-- <div class="post__author singpoauthr">
                <div class="post__author-avatar">
                    <img src="./images/avatar3.jpg">
                </div>
                <div class="post__author-info">
                    <h5>By:amr diab</h5>
                    <small class="white">april 30,2004 - 08:00 </small>
                </div>
            </div> -->


            
                
           
        </div>
    </section>
    <!-- ========================== end of single post =============================== -->


     <?php

include 'parts/footer.php';
?>
    