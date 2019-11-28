<?php
error_reporting(0);
    $hostname="localhost";
    $username="root";
    $password="";
    $database="reclamation";
    $connect=mysqli_connect($hostname,$username,$password,$database);
    $query="SELECT * FROM reclamation";
    $result=mysqli_query($connect,$query);
    
    
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
                <th>first name</th>
                <th>last name</th>
                <th>E-mail</th>
                <th>message</th>
            </tr>
            <?php while($row=mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php  echo $row['first name']; ?></td>
                <td><?php  echo $row['last name']; ?></td>
                <td><?php  echo $row['E-mail']; ?></td>
                <td><?php  echo $row['message'];?><a class="del_btn" href="delete.php?id=<?php echo $row['id']?>"</a></td>
                
            </tr>
            <?php } ?>
            </table>
        </form>
    </body>
</html>