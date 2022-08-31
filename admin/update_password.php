
<?php

$title = "Update Password";
require("../header.php");

?>

<?php

include "connection.php";
include "navbar.php";
?>

<!DOCTYPE html>

<html>
    <head>
       
        <style type = "text/css">
            body{
             
                height: 650px;
                background-image: url("image/background.jpg");
            }
         
           .title2{
            text-align: center; 
            font-size: 35px; 
            font-family: Lucida Console;
            color:black;
            
           }
            .wrapper{
                width: 400px;
                height: 400px;
                margin: 100 auto;
                background-color: #FACE77;
                opacity: .8;
               padding: 10px 15px;
            }
           .form-control{
               width: 300px;
           }

        </style>
    </head>
           


            
    <body>

    <div class ="wrapper" >
        <div style = "text-align: center;">
    <h1 class = "title2">Change your Password</h1>
        </div>
        <div style = "padding-left: 40px;">
        <form action = "" method = "post">
            <input type = "text" name = "username" class = "form-control" placeholder = "Username" required ="">
            <br>
            <input type = "text" name = "email" class = "form-control" placeholder = "Email" required ="">
            <br>
            <input type = "text" name = "password" class = "form-control" placeholder = "Old Password" required =""> 
            <br>
            <input type = "text" name = "password" class = "form-control" placeholder = "New Password" required =""> 
            <br>
            <button class = "btn btn-default" type = "submit" name = "submit"> Update </button>
    </div>
        </div>
           <?php 

           if(isset($_POST['submit']))
           {
               if($sql = mysqli_query($db, "UPDATE admin SET password = '$_POST[password]' WHERE
                 username = '$_POST[username]' AND email = '$_POST[email]';")) {
                     ?>
                     <script type = "text/javascript">
                         alert("The Password Updated Successfully.");
                         </script>
                         <?php
                 }

           }

           ?>
    </body>
</html>