<?php 
    require_once '../load.php';
    confirm_logged_in();

    $users = getContent();
    // $users = $pdo->prepare($user);
    // $users->execute();


    if(!$users){
        $message = 'Failed to get user list';
    }


    if (isset($_POST['submit'])) {
        $content = array(
            'title' => $_POST['title'],
            'description' => $_POST['description']
        );
    
    
        $message = updateContent($content);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>
<body>
    <h2>Edit or delete content from the site!</h2>
    <?php echo !empty($message)?$message:'';?>
    <table>
        <thead>
            <tr>
                <th>Content ID</th>
                <th>Content Title</th>
                <th>Content Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $users->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $row["id"];?></td>
                <td><?php echo $row["title"];?></td>
                <td><?php echo $row["description"];?></td>
                <td><a href="admin_editcontent.php?id=<?php echo $row['id'];?>">Edit</a></td>
                <td><a href="admin_deletecontent.php?id=<?php echo $row['id'];?>">Delete</a></td>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>
</body>
</html>