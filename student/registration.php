
<?php

$title = "Student Register";
require("../header.php");

?>


<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
    <html>
        <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset = "utf-8">
        <meta name = "viewport" content= "width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            section{
                margin-top: -20px;
            }
        </style>
        </head>
        <body>
                <section class ="reg_img" style="background-image: url(image/2.jpg);">   
                     <div class="box2">
                         <br>
                         <h1 class="title1">Library Management System</h1>
                         <hr>
                         <h1 class="title3">Student Registration</h1>
                         <form name = "Registration" action="" method="post">
                             <div class="reg">
                                <h3 class = "reg_h3" >Enter your StudentID</h3>
                                <input class = "form-control" type="text" name="studentid" placeholder="StudentID" required ="">
                                <h3 class = "reg_h3"> Enter your First Name</h3>
                                <input class = "form-control" type="text" name="firstname" placeholder="First Name" required ="">
                                <h3 class = "reg_h3"> Enter your Last Name</h3>
                                <input class = "form-control" type="text" name="lastname" placeholder="Last Name" required ="">
                                 <h3 class = "reg_h3"> Enter Username</h3>
                             <input class = "form-control" type="text" name="username" placeholder="Username" required ="">
                             <h3 class = "reg_h3"> Password</h3>
                              <input class = "form-control" type="password" name="password" placeholder="Password" required ="">
                             <h3 class = "reg_h3"> Enter your Email</h3>
                                <input class = "form-control" type="text" name="email" placeholder="Email" required =""><br>
                                <h3 class = "reg_h3"> Contact </h3>
                                <input class = "form-control" type="text" name="contact" placeholder="Contact" required =""><br>
                             <a class = "forgot_pass" href=""> Forgot Password?</a><br><br>
                             <input class="btn btn-default" type = "submit" name = "submit" value="Sign Up" style=""> 
                            
                         </form>
                    
                    
            </section>
            <footer>  
                <p class = "foot1">
                <br>
                Email: &nbsp Online.library@gmail.com <br>
                Mobile: &nbsp &nbsp +63966321141
            </p></footer>

            <?php 

            if(isset($_POST['submit']))
            {
            $count = 0;
            $sql = "SELECT studentid FROM registration";
            $res = mysqli_query($db, $sql);

            while($row = mysqli_fetch_assoc($res))
            {
                if($row['studentid'] == $_POST['studentid'])
                {
                    $count+=1;
                }

            }
            if($count == 0){
             mysqli_query($db, "INSERT INTO registration VALUES('$_POST[studentid]', '$_POST[firstname]','$_POST[lastname]','$_POST[username]',
             '$_POST[password]','$_POST[email]','$_POST[contact]');");
            
            ?>
         <script type = "text/javascript">
                      alert("Registration Successfully");
                        window.location = "../login.php";
                    </script>

            <?php
            }
            else{
               ?>
            <script type = "text/javascript">
                alert("The Student ID is already exists.");
            </script>
               <?php
            }
        }
            ?>

            </body>
            </html>