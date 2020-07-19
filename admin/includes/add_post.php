<?php

if(isset($_POST['create_post'])){

   $post_title = $_POST['title'];
   $post_category_id = $_POST['post_category'];
   $post_author = $_POST['author'];
   $post_status = $_POST['post_status'];

   $post_image = $_FILES['image']['name'];
   $post_image_temp = $_FILES['image']['tmp_name'];

   $post_tag = $_POST['post_tag'];
   $post_content = addslashes($_POST['post_content']);
   $post_date = date('d-m-y');
   $post_comment_count = 0;

   move_uploaded_file($post_image_temp, "../images/$post_image" );

   $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tag,post_comment_count,post_status) ";
   $query .=
    "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tag}','{$post_comment_count}','{$post_status}' ) ";

    $create_post_query = mysqli_query($connection, $query);

    confirmQuery($create_post_query);

    $the_post_id = mysqli_insert_id($connection);

    echo "<p>Post Created <a href='../post.php?p_id={$the_post_id}'> View Post</a> or <a href='posts.php'>Edit More posts</a></p>";

}

?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" class="form-control" name="title">
</div>

<div class="form-group">
<label for="post_status">Kategorija Posta</label><br>
<select name="post_category" id="">

<?php 

$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection,$query);

confirmQuery($select_categories);

while($row = mysqli_fetch_assoc($select_categories)) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

echo "<option value='{$cat_id}'>{$cat_title}</option>";
}
?>

</select>
 
</div>

<div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" class="form-control" name="author">
</div>

<div class="form-group">
    <label for="post_status">Post Status</label><br>
    <select name="post_status" id="">

<option value="Status">Status</option>

<option value='Draft'>Draft</option>";
<option value='Published'>Published</option>";
<option value='Reject'>Reject</option>";
</select>
</div>

<div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
</div>

<div class="form-group">
    <label for="post_Tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tag">
</div>

<div class="form-group">
    <label for="post_content">Post content</label>
    <textarea class="form-control" name="post_content" id="my_editor" cols="30" rows="10"></textarea>

    <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'my_editor' );
            </script>

</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
</div>


</form>