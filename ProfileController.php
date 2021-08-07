<?php


//session 
session_start();
require ("classes/db.php") ;
require_once("classes/profile.php");

//db connection
$conn=new db();
if (($_GET['action'] == 'edit')){
    $profile = new profile();
    validateImg($_FILES['EdittedPostImg']);

    $post->body = ucfirst($_POST['']);
    // $post->date = $_POST['date'];
    $post->image = $_FILES['EdittedPostImg']['name'];

    var_dump($post);

    $conn->updateData("posts","
    Body='{$post->body}',  
    Image='{$post->image}'",
    "Post_Id = '{$_POST['id']}'");

    header("Location:index.php");
}



//validate images
function validateImg($img){
    $extypesion = pathinfo($img['name'],PATHINFO_EXTENSION );
    $type_arr = ['png','jpg','jpeg'];
    
    if(in_array($extypesion,$type_arr)){
       move_uploaded_file($img['tmp_name'],"images/".$img['name']); 
    }else{
       echo "Enter valid image ... " ;
    }   
 }
