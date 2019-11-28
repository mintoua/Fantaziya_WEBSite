<?php
    if (isset($_POST['insert'])){
        $hostname="localhost";
        $username="root";
        $password="";
        $database="testbd";

        $nom=$_POST['nom'];
        $description=$_POST['description'];

        $connect=mysqli_connect($hostname,$username,$password,$database);
        $query="INSERT INTO events(nom, description) VALUES ('$nom','$description')";

        $result=mysqli_query($connect,$query);
        if($result){
            echo '<p class="message">POST IS ADDED TO THE DATABASE</p>';
        }else{
            echo '<p class="message">THERE WAS PROBLEM ADDING THE POST</p>';
        }
    }
?>
<html>
    <head>
    <style>
        .message{
            color:blue;
            font-size:24px;
            text-align:center;
        }
        .btn1{
	        width: 25%;
	        height: 52px;
	        background: #e0e6f1;
	        border: none;
	        outline: none;
	        padding-left: 15px;
        }
        .btn1:hover{

        }
        p{
            font-family:monospace;
            font-size:20px;
        }
        .insert{
            background-color:white;
            border:2px bold #e0e6f1;
            border-radius:1px;
            font-size:27px;
            padding:3px 8px 3px 8px;
            font-family:monospace;
            margin:5px 0px 0px 0px;
            cursor:pointer;
        }
        .insert:hover{
            background-color:#e0e6f1;
            border-color:white;
            color:black;

        }
        .contact_input
        {
	        width: 100%;
	        height: 52px;
	        background: #e0e6f1;
	        border: none;
	        outline: none;
	        padding-left: 15px;
        }
        .contact_textarea
        {
	        height: 197px;
	        padding-top: 15px;
        }
        .description{
            margin:5px 0px 0px 0px;
            font-family:monospace;
            font-size:20px;
        }
        </style>
        </head>
        <body>
            <form name="form1" action="" method="post">
                <p>Nom:</p><input type="text" name="nom" class="btn1" required="required"><br><br>
                <div>
				    <label for="contact_textarea" class="description" >Description : </label><br>
				    <textarea id="contact_textarea" name="description" class="contact_input contact_textarea" required="required"></textarea>
				</div>
                <input type="submit" name="insert" value="Ajouter un post"class="insert">
            </form>
        </body>
</html>