<?php

require_once '../load.php';
confirm_logged_in();

//TODO: 
// 1. refer how we built the add user page
// 2. check database and find out how the form looks like
// 3. build the form

$content_table = 'tbl_content';
$contents = getAll($content_table);

if(isset($_POST['submit'])){
    $content = array(
        'title' => $_POST['title'],
        'description' => $_POST['description']
    );

    $result = addContent($content);
    $message = $result;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
</head>
<body>
    
    <?php echo !empty($message)?$message:'';?>
    <form action="admin_addcontent.php" method="post" enctype="multipart/form-data">

            <label>Content title:</label>
            <input type="text" name="title" value=""><br><br>

            <label>Content Description:</label>
            <textarea name="description" cols="50" rows="20"></textarea><br><br>

            <button type="submit" name="submit">Add Content</button>

    </form>

</body>
</html>