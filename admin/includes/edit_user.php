<?php

if(isset($_GET['edit_user'])){
     $the_user_id = $_GET['edit_user'];
    }

     $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
     $select_users_query = mysqli_query($connection, $query);
 
     while($row = mysqli_fetch_assoc($select_users_query)) {
     $user_id = $row['user_id'];
     $user_password = $row['user_password'];
     $username = $row['username'];
     $user_firstname = $row['user_firstname'];
     $user_lastname = $row['user_lastname'];
     $user_image = $row['user_image'];
     $user_email = $row['user_email'];
     $user_role = $row['user_role'];
    }
    



if(isset($_POST['edit_user'])){


    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    move_uploaded_file($user_image_temp, "../images/$user_image");

    if(empty($user_image)){

        $query = "SELECT * FROM users WHERE user_id = $the_user_id";
        $select_image = mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_array($select_image)){
            $user_image = $row['user_image'];
        }
    
    
    }

   $query = "UPDATE users SET ";
   $query .="user_firstname = '{$user_firstname}', ";
   $query .="user_lastname = '{$user_lastname}', ";
   $query .="user_role = '{$user_role}', ";
   $query .="user_image = '{$user_image}', ";
   $query .="username = '{$username}', ";
   $query .="user_email = '{$user_email}', ";
   $query .="user_password = '{$user_password}' ";
   $query .= "WHERE user_id = {$the_user_id} ";

   

$edit_user_query = mysqli_query($connection,$query);
confirmQuery($edit_user_query);
}




?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="post_author">Firstname</label>
    <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
</div>

<div class="form-group">
    <label for="post_status">Lastname</label>
    <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
</div>

<div class="form-group">
     
<select name="user_role" id="">
<option value="Subscriber"><?php echo $user_role ?></option>

<?php

if($user_role == 'admin'){
    echo "<option value='subscriber'>Subscriber</option>";
} else {
    echo "<option value='admin'>Admin</option>";
}

?>

</select>
 
</div>



<div class="form-group">
    <img width="100" src="../images/<?php echo $user_image; ?>" alt="">
    <input type="file" name="image">
</div>

<div class="form-group">
    <label for="post_Tags">Username</label>
    <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
</div>

<div class="form-group">
    <label for="post_content">Email</label>
    <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
</div>

<div class="form-group">
    <label for="post_content">Password</label>
    <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
</div>


</form>