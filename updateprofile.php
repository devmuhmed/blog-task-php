<?php 
validateImg($_FILES['Profile_Img']);
$img=$_FILES['Profile_Img']['name'];
// echo $img;
$connection = new PDO("mysql:host=localhost; dbname=Facebook","root","");


if($_POST['fname']==validation($_POST['fname']) && $_POST['lname']==validation($_POST['lname']) && $_POST['Username']==validation($_POST['Username'])){
    $connection->query("update users Set 
        fname ='{$_POST['fname']}',
        lname ='{$_POST['lname']}',
        Email ='{$_POST['Email']}',
        Address ='{$_POST['Address']}',
        Username ='{$_POST['Username']}',
        Profile_Img='$img'
        where     
        User_Id='{$_POST['id']}'
    ");
    header("LOCATION:index.php");
}



function validateImg($img){
    $extypesion = pathinfo($img['name'],PATHINFO_EXTENSION );
    $type_arr = ['png','jpg','jpeg'];
    
    if(in_array($extypesion,$type_arr)){
        move_uploaded_file($img['tmp_name'],"images/".$img['name']); 
    }else{
        echo "Enter valid image ... " ;
    }   
}
function validation($input){
    if(strlen($input)> 1){
        $data = trim($input);
        $stripdata = stripslashes($data);
        $valideData=htmlspecialchars($stripdata);
        return $valideData;
    }else{
        echo "you have an error";
    }

}
?>
