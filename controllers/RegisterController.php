<?php

require_once 'dbController.php';

class RegisterControl {
 public $errors=array();

  // valaidate data ------------------------>

 public function RegisterValidate($name,$email,$password,$confirmPassword,$image){
    
    if(empty($name) ){
      $this->errors['name']='name is requierd';
     
    }else{
      if(preg_match('/^[a-zA-z]*$/',$name)==0){
        $this->errors['name']='name should be string';
      }
    }

    if(empty($email)){
        $this->errors['email']='email is requierd';       
      }else{
        if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
          $this->errors['email']='email not valid';
       }

       $pattern = "/^[A-Za-z0-9._%+-]+@gmail.com$/";
        if(preg_match($pattern,$email)==0){
          $this->errors['email']='emailnot valid';
        }
      }

      if(empty($password)){
        $this->errors['password']='password is requierd';

      }else{
        $passpattern = '/^(?=.*[a-z])(?=.*\d)[a-z\d]{8}$/';

       
        if (!preg_match($passpattern, $password)) {
           $this->errors['Password']='invalid Password';
        }
      }

      if(empty($confirmPassword)){
        $this->errors['confirmpassword']='confirmpassword is requierd';
        
      }
      else{
        if($confirmPassword !=$password){
          $this->errors['confirmpassword']='confirmpassword not equal to password';
      }
      }

      if(empty($image)){
        $this->errors['image']='image is requierd';
      }

      return $this->errors;

 }


 // controle data ------------------>

 public function showValidateError(){

   $db=new dataBaseController();
    if(isset($_POST['submit']) || isset($_POST['update'])){

        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmPassword=$_POST['confirmPassword'];
        $room=$_POST['room'];
        $image=$_FILES['image']['name'];

        // upload image  ------>

        if (isset($_FILES['image'])) {

          $targetDir = 'images/';  
         
          $targetFile = $targetDir . basename($_FILES['image']['name']);  
      
          if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            echo 'File uploaded successfully.';
          } 
        }
    
        // validate data ----->

        $errors=$this->RegisterValidate($name,$email,$password,$confirmPassword,$image);
        
        if(empty($errors)){
         
          if(isset($_POST['submit'])){

            $db->createDataTable();
            $db->inserData($name,$email,$password,$room,$image);
          }
          else{
            $db->updateData($name,$email,$password,$image,$room);
          }
         
        


        }
        else{
            foreach($errors as $key=>$vale){
                echo " <span class='text-danger'>".$key."  =>  ".$vale."</span><br>";
            }
        }
    }
 }


 public function CreateFile($name,$email,$password,$room,$image){
  $data=array('name'=>$name ,'email'=>$email,'password'=>$password,'room'=>$room,'image'=>$image);  
    $file= fopen('data.txt','a');
    fwrite($file,implode(':',$data).PHP_EOL);
    fclose($file);
     echo'data Writen';
   
 }
 
}

?>