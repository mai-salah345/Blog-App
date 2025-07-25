<?php
include 'parts/header.php';

// fetch featured post from DB
$featured_query = "SELECT * FROM posts WHERE is_featured=1";
$featured_result = mysqli_query($connection, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);

// fetch 9 posts from posts table
$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
$posts = mysqli_query($connection,$query);
?>


        <!-- ============== end of nav =============== -->
    <section class="home">
        <div class="home-intro ">
            <h2>MIXOLA</h2>
            <p> Your space to explore ideas, share stories, and connect with voices from around the world.
                Dive into trending topics and discover content that inspires, informs, and entertains.</p>
            <!-- <button >about us</button> -->
        </div>
    </section> 

<!-- ============== end of body content =============== -->

 <section class="about-us" >
        <div class="row" id="aboutus">
            <div class="img_sec">
                <img src="images/create-blog-window-camera.jpg">
            </div> 
            <div class="aboutcontent">
                <h1>About Us </h1>
                <h2>Who We Are & What We Do</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Facere, iusto ratione culpa tempora blanditiis dicta obcaecati quidem aspernatur ex, ab impedit
                    , dolor praesentium! Blanditiis architecto earum quibusdam aliquid veritatis nobisdolor praesentium! Blanditiis architecto earum quibusdam aliquid veritatis nobisdolor praesentium! Blanditiis architecto earum quibusdam aliquid veritatis nobisdolor praesentium! Blanditiis architecto earum quibusdam aliquid veritatis nobisdolor praesentium! Blanditiis 
                    architecto earum quibusdam aliquid veritatis nobis.
                </p>
            </div>
        </div>
</section> 
   

    <!-- ============== end of about us =============== -->

<!-- show featured post if there's any -->
<?php if(mysqli_num_rows($featured_result) == 1) : ?>
    <section class="featured big">
        <div class="container featured_container">
            <div class="sample">
                <img src="./images/<?= $featured['thumbnail'] ?>">
            </div>
            <div class="post-info ">
                <?php
                // fetch category from categories table using category_id of post
                $category_id = $featured['category_id'];
                $category_query = "SELECT * FROM categories WHERE id=$category_id";
                $category_result = mysqli_query($connection, $category_query);
                $category = mysqli_fetch_assoc($category_result);
                ?>

                <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $featured['category_id'] ?>" class="category_button"><?= $category['title'] ?></a>
                <h2 class="post_title"><a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a></h2>
                <p class="post__body white">
                    <?= substr($featured['body'], 0, 300) ?>...
                </p>
                <div class="post__author">
                    <?php
                    // fetch author from users table using author_id
                    $author_id = $featured['author_id'];
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
                            <?= date("M d, Y - H:i", strtotime($featured['date_time'])) ?>
                        </small>
                    </div>

                </div>

            </div>

        </div>
    </section>
<?php endif ?>
    <!-- ============== end of body feature =============== -->



    <section class="posts <?= $featured ? '' : 'section__extra-margin' ?>">
        <div class="container posts_container">
            <?php while($post = mysqli_fetch_assoc($posts)) : ?>
            <article class="post">
                <div class="sample">
                    <img src="images/<?= $post['thumbnail'] ?>">
                </div>
                <div class="post-info">
                    <?php
                    // fetch category from categories table using category_id of post
                    $category_id = $post['category_id'];
                    $category_query = "SELECT * FROM categories WHERE id=$category_id";
                    $category_result = mysqli_query($connection, $category_query);
                    $category = mysqli_fetch_assoc($category_result);
                    ?>
                    <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>" class="category_button"><?= $category['title'] ?></a>
                    <h3 class="post_title">
                        <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                    </h3>
                    <p class="post__body white">
                        <?= substr($post['body'], 0, 200) ?>...
                    </p>
                    <div class="post__author">
                        <?php
                        // fetch author from users table using author_id
                        $author_id = $post['author_id'];
                        $author_query = "SELECT * FROM users WHERE id=$author_id";
                        $author_result = mysqli_query($connection, $author_query);
                        $author = mysqli_fetch_assoc($author_result);
                        ?>
                        <div class="post__author-avatar">
                            <img src="images/<?= $author['avatar'] ?>">
                        </div>
                        <div class="post__author-info">
                            <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                            <small class="white">
                                <?= date("M d, Y - H:i", strtotime($post['date_time'])) ?>
                            </small>
                        </div>

                    </div>
                </div>
            </article>
            <?php endwhile ?>
        </div>
    </section>

    <!-- ============== end of body posts  =============== -->
    <section class="category_buttons">
        <div class="container category_buttons-container">
            <?php
                $all_categories_query = "SELECT * FROM categories";
                $all_categories = mysqli_query($connection,$all_categories_query);
            ?>
            <?php while($category = mysqli_fetch_assoc($all_categories)) : ?>
                <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category_button"><?= $category['title'] ?></a>
            <?php endwhile ?>
        </div>

    </section>
    <!-- ============== end of categories buttons =============== -->


   <?php

include 'parts/footer.php';
?>