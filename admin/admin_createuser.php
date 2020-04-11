<?php 
require_once '../load.php';
confirm_logged_in();

if(isset($_POST['submit'])){
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $avatar = trim($_POST['avatar']);
    $permission = trim($_POST['per']);
    $admin = trim($_POST['admin']);

    if(empty($email) || empty($password) || empty($username) || empty($fname)){
        $message = 'Please fill the required fields';
    }else{
        $message = createUser($fname, $username, $password, $email, $avatar, $permission, $admin);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
</head>
<body>
    <h2>Create User</h2>
    <?php echo !empty($message)? $message: ''; ?>
    <form action="admin_createuser.php" method="post">
        <label>First Name</label>
        <input type="text" name="fname" value=""><br><br>
        <label>Username</label>
        <input type="text" name="username" value=""><br><br>
        <label>Password</label>
        <input type="text" name="password" value=""><br><br>
        <label>Email</label>
        <input type="email" name="email" value=""><br><br>
        <label>Avatar</label>
        <input type="text" name="avatar" value=""><br><br>
        <label>permssion</label>
        <input type="text" name="per" value=""><br><br>
        <label>admin</label>
        <input type="text" name="admin" value=""><br><br>
        <button name="submit">Create User</button>
    </form>
</body>
</html>