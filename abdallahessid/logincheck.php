<?php
    session_start();

    $con=mysqli_connect('localhost','root','');
    if ($con){
        echo "connection successful";
    }else{
        echo "no connection";
    }
    $db=mysqli_select_db($con,'fantaziya');

    if (isset($_POST['submit'])){
        $user=$_POST['username'];
        $password=$_POST['password'];

        $sql="select * from admin where username ='$user' and password='$password'";
        $query=mysqli_query($con,$sql);

        $sql1="select * from utilisateurs where username ='$user' and motdepasse='$password'";
        $query1=mysqli_query($con,$sql1);

        $row=mysqli_num_rows($query);
        $row1=mysqli_num_rows($query1);
            
            if ($row == 1){
                echo "login successful";
                $_SESSION['user']=$user;
                header('location:admin.php');
            }else{
                echo"login failed";
                header('location:login.php');
            }
            

        }


?>