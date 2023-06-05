<?php
 class dataBaseController{
    public $con;

    public function connect(){
        try {
            $this->con=mysqli_connect('localhost','root','','myTask');
           if(!$this->con){
            echo '<br>connection failed<br>';
           }
           
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        
    }

    // public function crateDatabes(){
    //    try {
    //     $this->connect();
    //     $dbname='myTask';
    //     $sql="CREATE DATABASE $dbname";
    //     $data=  mysqli_query($this->con,$sql);
    //     $this->con=mysqli_connect('localhost','root','',$dbname);
    
    //    } catch (Exception $th) {
    //     echo $th->getMessage();
    //    }
    // }



    public function createDataTable(){

        try {
            $this->connect();
            $sql="CREATE TABLE data (
                id INT(6)   AUTO_INCREMENT  PRIMARY KEY,
                name VARCHAR(50) NOT NULL,
                email varchar(50) UNIQUE NOT NULL,
                password VARCHAR(10) NOT NULL,
                room INT(5) NOT NULL ,
                image VARCHAR(20) NOT NULL
            )";

            $data=mysqli_query($this->con,$sql);
            mysqli_close($this->con);
          if(!$data){
            echo 'table users is created '.mysqli_error($this->con).'<br>';
          }

        } catch (\Throwable $th) {
           echo $th->getMessage();
        }
    }


    public function inserData($name,$email,$password,$room,$image){

        try {
            $this->connect();
            $sql="INSERT INTO `data`( `name`, `email`, `password`, `room`, `image`) 
              VALUES ('$name','$email','$password','$room','$image') ";
            $data= mysqli_query($this->con,$sql);
            mysqli_close($this->con);
                if($data){
                   
                    header('location:./Login.php');
                }
          
        } catch (Exception $th) {
           echo $th->getMessage();
        }
    }


    public function checkUSer($email,$password){

        try {
          $this->connect();
            $sql="select * from data where 1";
           $data= mysqli_query($this->con,$sql);
           if(!$data){
            echo 'nodata'.mysqli_error($this->con);
           }
           else{

            while($row=mysqli_fetch_assoc($data)){
                // echo $row['email'];
                if($email == $row['email'] && $password ==$row['password']){
                    return $row;
                }
            }
           }
        
         mysqli_close($this->con);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }




    // get all  data 
    public function getAllData(){

        try {
          $this->connect();
            $sql="select * from data where 1";
           $data= mysqli_query($this->con,$sql);
           if(!$data){
            return 'nodata'.mysqli_error($this->con);
           }
           else{

            return $data;
           
           }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }


    // delete row

    public function DeleteRow(){

        try {
          $this->connect();
          $id=$_GET['delete'];
            $sql="delete from data where id=$id";
           $data= mysqli_query($this->con,$sql);
           if(!$data){
            return 'nodata'.mysqli_error($this->con);
           }
           else{
            header('Location:home.php');
           
           }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    // search row 

    public  function SearchRow(){

        try {
          $this->connect();
          $id=$_GET['update'];
        //   echo $id;
            $sql="SELECT * from data where id=$id";
           $data= mysqli_query($this->con,$sql);
           if(!$data){
            return 'nodata'.mysqli_error($this->con);
           }
         else{
          while($row=mysqli_fetch_assoc($data)){
            return $row;
          }
         }
        } catch (\Throwable $th) {
             return $th->getMessage();
        }
    }


    // update data 

    public function updateData($name ,$email,$password,$image,$room){
        try {
            $this->connect();
            $id=$_GET['update'];
            echo '<br>'.$id;
            $sql="UPDATE `data` SET `name`='$name',`email`='$email',
                `password`='$password',`room`='$room',`image`='$image' WHERE id=$id";
            $data=mysqli_query($this->con,$sql);

            if($data){
                header('Location:home.php');
            }
            else{
                    echo '<br>falied'.mysqli_error($this->con);
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }

    }


  
}
?>