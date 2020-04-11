<?php
    require_once '../load.php';
    confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome! <?php echo $_SESSION['user_name'];?></h2>
    
    <h1>User Prefrences</h1>
    <a href="admin_createuser.php">Create User</a>
    <a href="admin_edituser.php">Edit User</a>
    <a href="admin_deleteuser.php">Delete User</a>
    <br><br><br>
    <h1>Content Control</h1>
    <a href="admin_contentlist.php">Edit or Delete Content</a>
    <a href="admin_addcontent">Add Content</a>
    <a href="admin_logout.php">Sign Out</a>
</body>
</html>