<?php
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "fantaziya");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM reclamation WHERE CONCAT(`id`, `first name`, `last name`, `E-mail`,`message`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
} else
{
    $query = "SELECT * FROM reclamation";
    $search_result = filterTable($query);
}


// function to connect and execute the query

?>

<!DOCTYPE html>
<html>
    <head>
        
        <title>Recherche Des reclamation</title>
        <style>
            table,tr,th,td
            {
                border: 2px solid black;
            }
           
        </style>
    </head>
    <body>
        <center>
        <h1 align="center">Recherche des reclamation</a></h1><br />
			<br />
        <form action="recherche.php" method="post">
        <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th width="20%">Id</th>
                    <th>first name</th>
                    <th>last name</th>
                    <th>email</th>
                    <th width="20%">message</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)){ ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['first name'];?></td>
                    <td><?php echo $row['last name'];?></td>
                    <td><?php echo $row['E-mail'];?></td>
                    <td><?php echo $row['message'];?></td>
                </tr>
                <?php  } ?>
            </table>
        </form>
        </center>
    </body>
</html>