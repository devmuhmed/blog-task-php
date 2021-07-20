<?php 

//connection 
   $conn= new PDO("mysql:host=localhost;dbname=facebook","root","");
    
//registeration
if (isset($_POST['signup'])) {
  //validation
    $FirstName = testinput($_POST ['firstname']);
    $LastName= testinput($_POST ['lastname']);
    $Username = testinput($_POST ['username']);
    $Address = testinput($_POST ['address']);
    $gender = testinput($_POST['gender']);
    $Email =testinput($_POST['email']);
    $password=testinput($_POST['password']);
    $confirmPass=testinput($_POST['confirmpass']);
    validateImg($_FILES['img']);
    $img=$_FILES['img']['name'];
    if (filter_var( $Email, FILTER_VALIDATE_EMAIL) && $password==$confirmPass) {
       $conn->query("insert into users 
                        set
                        fname= ' $FirstName',
                        lname = ' $LastName',
                        Username = '$Username',
                        Address ='$Address ',
                        Email= ' $Email',
                        Password= '$password',
                        Gender = '$gender',
                        Profile_Img='$img'
                        ");
        header("Location:login.php");                
  } else{
      header("Location:singup.php");
  }
  
}
  //login
if (isset($_POST['login'])) {
  session_start();  
  $query= $conn->query("select * from users where Username='{$_POST ['username']}' and  Password='{$_POST['password']}' ");
        $uselogin=$query -> fetch(PDO::FETCH_ASSOC);
        $id= $uselogin['User_Id'];
                $count = $query->rowCount();  
                if($count > 0)  
                {  
                  setcookie("username",$_POST ['username']);
                  setcookie("password",$_POST['password']);
                  setcookie("userid", $id);
                   header("Location:index.php");  
                }  else{
                  header("Location:login.php");
                }        
}

  function testinput($input) {
    $data=trim($input);
    $stripdata=stripslashes($data);
    $validate= htmlspecialchars($stripdata);
    return $validate;
}

function validateimg($img){
  $extension=pathinfo($img['name'],PATHINFO_EXTENSION);
  $arrtype=['png','jpg','jpeg']; 
  if(in_array($extension,$arrtype)){  
      move_uploaded_file($img['tmp_name'],'images/'.$img['name']);
  }
  else{
      echo "choose another type of image";
  }
}
?>
