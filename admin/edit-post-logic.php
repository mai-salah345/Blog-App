<?php 
require 'config/database.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
    $thumbnail = $_FILES['thumbnail'];

    // Validate required fields
    if (!$title || !$body || !$category_id) {
        $_SESSION['edit-post'] = 'Please fill in all required fields';
       
       
    }
else{
    // Handle thumbnail update
    if ($thumbnail['name']) {
        $previous_thumbnail_name = '../images/' . $previous_thumbnail_name;
        if (file_exists($previous_thumbnail_name)) {
            unlink($previous_thumbnail_name);
        }

        $time = time(); 
        $thumbnail_name = $time . '-' . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;

        $allowed_extensions = ['png', 'jpg', 'jpeg', 'webp'];
        $extention = explode('.', $thumbnail_name);
                $extention = end($extention);
       

        if (in_array($extention, $allowed_extensions)) {

            if ($thumbnail['size'] < 1000000) {
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['edit-post'] = "File size too big. Should be less than 1MB.";
                
            }
        } else {
            $_SESSION['edit-post'] = "Invalid file type. Must be PNG, JPG, JPEG or WEBP.";
        }
        }
    }

    if (isset($_SESSION["edit-post"])) 
 {
        header('location:'.ROOT_URL.'admin/');
        die();}
        else{
    // Handle is_featured logic
    if ($is_featured == 1) {
        $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
        mysqli_query($connection, $zero_all_is_featured_query);
    }

    // Use new thumbnail if uploaded, otherwise keep old
    $thumbnail_to_insert =  $thumbnail_name ?? $previous_thumbnail_name;

    // Update post in database
    $query = "UPDATE posts SET title='$title', body='$body', category_id=$category_id, thumbnail='$thumbnail_to_insert', is_featured=$is_featured WHERE id=$id LIMIT 1";
    $result = mysqli_query($connection, $query);
        }
    if (!mysqli_errno($connection)) {
        $_SESSION['edit-post-success'] = "Post updated successfully";
       
      
    }
}
 header('location: ' . ROOT_URL . 'admin/');
 die();
?>
