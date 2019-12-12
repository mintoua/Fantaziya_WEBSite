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
    $query = "SELECT * FROM events WHERE CONCAT(`id`, `nom`, `description`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
} else
{
    $query = "SELECT * FROM events";
    $search_result = filterTable($query);
}


// function to connect and execute the query

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="events/jquery-ui.css">
        <link rel="stylesheet" href="events/bootstrap.min.css" />
		<script src="events/jquery.min.js"></script>  
		<script src="events/jquery-ui.js"></script>
        <title>Recherche D'evenement</title>
        <style>
            table,tr,th,td
            {
                border: 2px solid black;
            }
           
        </style>
    </head>
    <body>
        <center>
        <h1 align="center">Recherche sur les évenements</a></h1><br />
			<br />
        <form action="rechercheevent.php" method="post">
        <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th width="20%">Id</th>
                    <th>Nom</th>
                    <th>Description</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)){ ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['nom'];?></td>
                    <td><?php echo $row['description'];?></td>
                </tr>
                <?php  } ?>
            </table>
        </form>
        </center>
    </body>
</html>