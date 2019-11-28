<html>
    <head>
        <title>Admin Panel</title>
        <style>
            body{
                margin:0px;
                border:0px;
            }
            #header{
                width:100%;
                height:120px;
                background:lightgreen;
                color:white;
            }
            #sidebar{
                width:300px;
                height:600px;
                background: lightgrey;
                float:left;
            }
            #data{
                height:817px;
                background:grey;
            }
            #adminlogo{
                width:100px;
                height:100px;
                
            }
            ul li{
                padding:20px;
                font-size:22px;
                color:White;
                list-style-type:none;
                list-style:none;
                font-family:monospace;
            }
            ul li:hover{
                transition:.5s;
                color:grey;
                font-family:monospace;
            }
            .title{
                color:white;
                font-size:32px;
                font-family:monospace;
            }
            .paragraph{
                font-size:25px;
                font-family:monospace;
            }
            .link1{
                text-decoration:none;
                font-size:22px;
                color:White;
                list-style-type:none;
                list-style:none;
                font-family:monospace;
            }
            .link1:hover{
                transition:.5s;
                color:grey;
                font-family:monospace;
            }
        </style>
    </head>
    <body>
        <div id="header">
            <center>
                <img src="admin.png" alt="adminlogo" id="adminlogo">
                <br>
                
            </center>
        </div>


        <div id="sidebar">
        <ul>    
            
            <li><a href="display.php" class="link1">Display reclamation</a></li>
            <li><a href="delete.php?id=" class="link1">Supprimer reclamation</a></li>
            
        </ul>
        </div>


        
    </body>
</html>