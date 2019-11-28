
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
                background:#2c3e50;
                color:white;
            }
            #sidebar{
                width:300px;
                height:600px;
                background:#34495e;
                float:left;
            }
            #data{
                height:817px;
                background:#2980b9;
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
            <li><a href="add.php" class="link1">Ajouter Event</a></li>
            <li><a href="delete.php?id=" class="link1">Supprimer Event</a></li>
            <li><a href="update.php" class="link1">Modifier Event</a></li>
            <li><a href="display.php" class="link1">Display Posts</a></li>
        </ul>
        </div>


        <div id="data"><br>
            <center>
                <h3 class="title">Hello</h3>
                <p class="paragraph">This is the admin panel ,you can insert modify or delete posts from here</p>
            </center>
        </div>
    </body>
</html>