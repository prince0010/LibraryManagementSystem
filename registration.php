
<?php

$title = "Registration";
require("header.php");

?>

<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
    <html>
        <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset = "utf-8">
        <meta name = "viewport" content= "width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            section{
                margin-top: -20px;
                height: 630px;
                width: 1350px;
                background-image:url(image/as.jpg);
                background-size: cover;
                background-repeat:no-repeat;
            }
            .box
            {
    height: 500px;
    width: 600px;
    background-color: #080808a6 ;
     margin: 0px auto;
   
  opacity: 0.9;
          }
          label{
    font-size:17px;
    font-weight:600;
    color:white;
}
button{
        margin-top: 110px;
        margin-left:-150px;
        
}
        </style>
        </head>
        <body>
           <section><br><br>
<div class= "box">
<form name = "register" action="" method="post">
  
                <b> <p style ="font-size:50px; color:white; text-align: center; padding-top: 50px;
                padding-bottom: 40px;">Register as </p> </b>
                
                        <input style= " margin-left:140px; width:18px; "  type = "radio" id = "student" name = "user" value = "student"> </input>
                        <label for=" student">Student</label>
                        <input style= " margin-left:100px; width:18px;"  type = "radio" id = "admin" name = "user" value = "admin" > 
                        <label for="admin">Admin</label> </input>
                       
                        <button class = "btn btn-default" name = "ok" type = "submit">  OK </button>
</form>
</div>
<?php 

              if(isset($_POST['ok'])){

                if($_POST['user'] == 'admin'){
                    ?>
                    <script type = "text/javascript">
                        window.location = "admin/registration.php";
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script type = "text/javascript">
                        window.location = "student/registration.php";
                    </script>
                    <?php
                }
              }

?>

           </section>
            
          
            </body>
            </html>