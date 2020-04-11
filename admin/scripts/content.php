<?php

function addContent($content){
    //DEBUG code remove it later

    // var_dump($content);
    // exit;

    try{

        // 1.Connect to the DB
        $pdo = Database::getInstance()->getConnection();


        //optional
        //if the upload file is a image, convert it to WebP

        //4. Insert into DB (tbl_movies as well as tbl_mov_category)
        $insert_content_query = 'INSERT INTO tbl_content(title, description) VALUES (:title, :description)';

    $insert_content = $pdo->prepare($insert_content_query);
    $insert_content_result = $insert_content->execute(
        array(
            ':title'=>$content['title'],
            ':description'=>$content['description']
        )
        );

        //5. if all of above works, redirect user to index.php
        redirect_to('index.php');

    }catch(Exception $e){
// Otherwise return some error message
        $error = $e->getMessage();
        return $error;
    }
    
}


function getSingleContent($id)
{
    //TODO: refer the function above to finish this one

    // 
    $pdo = Database::getInstance()->getConnection();
    $get_content_query = "SELECT * FROM tbl_content WHERE id = $id;";

    $results = $pdo->query($get_content_query);

    if ($results) {
        return $results;
    } else {
        return 'There was a problem';
    }
}

function getAllContent(){
    $pdo = Database::getInstance()->getConnection();

    $get_allcontent_query = 'SELECT * FROM tbl_content';
    $get_allcontent_set = $pdo->prepare($get_allcontent_query);
    $get_allcontent_result = $get_allcontent_set->execute();

    $allcontent = array();

    if ($get_allcontent_result) {
        while($content = $get_allcontent_set->fetch(PDO::FETCH_ASSOC)) {
            $currentcontent = array();

            $currentcontent["id"] = $content["id"];
            $currentcontent["page_title"] = $content["page_title"];
            $currentcontent["main_title"] = $content["title"];
            $currentcontent["description"] = $content["description"];

            $allcontent[] = $currentcontent;
        }

        return json_encode($allcontent);
    }else{
        return "There was an issue retreiving allcontents";
    }
    
    }

function getContent()
{
    $pdo = Database::getInstance()->getConnection();

    //TODO: run the proper SQL query to fetch the content based on $id
    $query_content = 'SELECT * FROM `tbl_content`';


    //TODO: return the content data if the above query went through
    $get_content = $pdo->prepare($query_content);
    $fetch_content = $get_content->execute();

    // echo $get_content_id->debugDumpParams();
    if ($fetch_content && $get_content->rowCount()) {
        return $get_content;
    } else {
        return false;
    }
}



function updateContent($content){
    //DEBUG code remove it later

    //  var_dump($content);
    //  exit;

    try{

        // 1.Connect to the DB
        $pdo = Database::getInstance()->getConnection();
        //optional
        //if the upload file is a image, convert it to WebP

        //4. Insert into DB (tbl_movies as well as tbl_mov_genre)
        $insert_content_query = 'UPDATE tbl_content SET title = :title, description = :description WHERE id = :id';
    $insert_content = $pdo->prepare($insert_content_query);
    $insert_content_result = $insert_content->execute(
        array(
            ':id'=>$content['id'],
            ':title'=>$content['title'],
            ':description'=>$content['description']
        )
        );

        //5. if all of above works, redirect content to index.php
        redirect_to('index.php');

    }catch(Exception $e){
// Otherwise return some error message
        $error = $e->getMessage();
        return $error;
    }
    
}

function editContent($id, $p_title, $title, $desc){

    // var_dump($id, $p_title, $title, $desc);
    // exit;
    //TODO: set up database connection
    $pdo = Database::getInstance()->getConnection();

    //TODO: Run the proper SQL query to update tbl_content with proper values
    $update_content_query = 'UPDATE tbl_content SET page_title = :p_title, title = :title,';
    $update_content_query .= ' description = :desc WHERE id = :id';
    $update_content_set = $pdo->prepare($update_content_query);
    $update_content_result = $update_content_set->execute(
        array(
            ':p_title'=>$p_title,
            ':title'=>$title,
            ':desc'=>$desc,
            ':id'=>$id
        )
    );

    // echo $update_content_set->debugDumpParams();
    // exit;

    //TODO: if everything goes well, redirect content to index.php
    // Otherwise, return some error message...
    if($update_content_result){
        redirect_to('index.php');
    }else{
        return 'Guess you got canned...';
    }
}

function deleteContent($id){
    $pdo = Database::getInstance()->getConnection();
    $delete_content_query = 'DELETE FROM tbl_content WHERE id = :id';
    $delete_content_set = $pdo->prepare($delete_content_query);
    $delete_content_result = $delete_content_set->execute(
        array(
            ':id'=>$id
        )
    );

    //If everything went through, redirect to admin_deletecontent.php
    //Otherwise, return false
    if($delete_content_result && $delete_content_set->rowCount() > 0){
        redirect_to('admin_deletecontent.php');
    }else{
        return false;
    }
}