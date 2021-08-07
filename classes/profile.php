<?php 
class profile {
private  $id ;

private  $fname;
private  $lname;
private  $fullname;
private  $address;
private  $email;
private  $gender;
private  $ProfileImg;

function __construct (){
}

function __set($key,$data){
    $this->$key = $data ;
}

function __get($key){
    return $this->$key;
}

}
?>
