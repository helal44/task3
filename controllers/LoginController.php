<?php

require_once 'dbController.php';
class LoginControl{
    public $errors=array();


    public function LoginValidate($email,$password){
    
        if(empty($email)){
            $this->errors['email']='email is requierd';
           
          }
          else{

            if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
                $this->errors['emailstyle']='email not valid';
            }

          }

          if(empty($password)){
            $this->errors['password']='password is requierd';
          }

          return $this->errors;
     }



     public function showValidateError(){
        $db=new dataBaseController();

        if(isset($_POST['submit'])){
            $email=$_POST['email'];
            $password=$_POST['password'];

            $errors=$this->LoginValidate($email,$password);

                if(empty($errors)){
                   $data=$db->checkUSer($email,$password);
                   if($data){
                    echo $data['email'];
                    session_start();
                    $_SESSION['name']=$data['name'];
                    $_SESSION['email']=$data['email'];
                    $_SESSION['image']=$data['image'];
                   
                    header('Location:home.php');
                   }
                   else{
                    echo 'there is no user with this data';
                   }

                }
                else{
                    foreach($errors as $key=>$vale){
                        echo " <span class='text-danger'>".$key."  =>  ".$vale."</span><br>";
                    }
            }
        }
     }


     public function checkData($email,$password){
            $file=fopen('data.txt','r') or die('file not exist');
            while(!feof($file)){
                $line=explode(':',fgets($file));
              
               if($email==$line[1] && $password==$line[2]){
                session_start();
                $_SESSION['name']=$line[1];
                $_SESSION['image']=$line[4];
                 echo $line[1].':'.$line[2].'image:'.$line[4].'<br>';
                  header('location:home.php');

               }
               else{
                
                echo " <span class='text-danger'> login failed </span><br>";
              
               }
            }
     }


}

?>