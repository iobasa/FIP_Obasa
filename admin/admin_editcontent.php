<?php 
    require_once '../load.php';
    confirm_logged_in();

    $id = $_GET['id'];
    // $id = mysql_insert_id($_GET['id']);
    
    $user = getSingleContent($id);
    if(!$user){
        $message = 'Failed to get user list';
    }

    if (isset($_POST['submit'])) {
        $content = array(
            'id' => $_POST['id'],
            'title' => $_POST['title'],
            'description' => $_POST['description']
        );
    
    
        $message = updateContent($content);
    }

    // if(isset($_POST['submit']) && isset($_GET['id'])){
    //     $id = $_GET['id'];
    //     $p_title = trim($_POST['page_title']);
    //     $title = trim($_POST['title']);
    //     $desc = trim($_POST['description']); 

    //     $message = editUser($id, $p_title, $title, $desc);
    // }

    




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <?php echo !empty($message)? $message : '';?>
    <form action="admin_editcontent.php" method="post">
        <?php while($info = $user->fetch(PDO::FETCH_ASSOC)): ?>

            <label>Content id:</label>
            <input type="text" name="id" value="<?php echo $info['id'];?>"><br><br>

            <label>Content title:</label>
            <input type="text" name="title" value="<?php echo $info['title'];?>"><br><br>

            <label>Content Description:</label>
            <textarea name="description" cols="50" rows="20"><?php echo $info['description'];?></textarea>

            <button type="submit" name="submit">Edit Content</button><br><br><br>


        <?php endwhile;?>
    </form>
</body>
</html>
