<?php
error_reporting(0);
    $hostname="localhost";
    $username="root";
    $password="";
    $database="testbd";
    $connect=mysqli_connect($hostname,$username,$password,$database);
    $query="SELECT * FROM events";
    $result=mysqli_query($connect,$query);
    
    if(isset($_GET['id'])){   
        $query1="DELETE FROM events where id='$_GET[id]'";
        $result1=mysqli_query($connect,$query1);
        header('location:delete.php');
    }
?>
<html>
    <head>
        <title>Display Page</title>
        <style>
                table{
                    broder-collapse:collapse;
                    width:100%;
                    color:#588c7e;
                    font-family:monospace;
                    font-size:25px;
                    text-align:left;
                }
                th{
                    background-color:#588c7e;
                    color:white;
                }
                tr:nth-chile(even) {background-color:#f2f2f2}
            </style>
    </head>
    <body>
        <form action="">
            <table border="0">
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
            <?php while($row=mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php  echo $row['nom']; ?></td>
                <td><?php  echo $row['description'];?><a class="del_btn" href="delete.php?id=<?php echo $row['id']?>"</a>delete</td>
                
            </tr>
            <?php } ?>
            </table>
        </form>
    </body>
</html>