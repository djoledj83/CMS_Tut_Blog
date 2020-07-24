<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>    
    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">
<!-- Comment -->

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


            <?php 

            $query = "SELECT * FROM posts ORDER BY post_id DESC";

            $select_all_posts_query = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_all_posts_query)) {
$post_id = $row['post_id'];    
$post_title = $row['post_title'];
$post_author = $row['post_author'];
$post_date = $row['post_date'];
$post_image = $row['post_image'];
$post_content = substr($row['post_content'],0,100);
$post_status = $row['post_status'];
$post_category_id = $row['post_category_id'];


if($post_status == 'Published') {


?> 
<h1 class="page-header">
    
<?php
$query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                                $select_categories_id = mysqli_query($connection,$query);
    
                                while($row = mysqli_fetch_assoc($select_categories_id)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];

                                echo "<td>{$cat_title}</td>";
                                }
?>

<small>Kategorija</small>
                </h1>

                <!-- First Blog Post -->
                <h2><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a></h2>
                
                <p class="lead">by <a href="index.php"><?php echo $post_author ?></a></p>

                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>

                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt=""></a>

                <hr><p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                <?php } ?>
<?php }   ?>

                
  

            </div>

            <!-- Blog Sidebar Widgets Column -->
           <?php include "includes/sidebar.php"; ?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php"; ?>