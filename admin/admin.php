
<?php

$title = "Admin Login";
require("../header.php");

?>


<?php
    include "connection.php"; 
    include "navbar.php";
?>


<DOCTYPE html>
    <html>
        <head>
        
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset = "utf-8">
        <meta name = "viewport" content= "width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
    
        <style type = "text/css">
     section{
    margin-top: -20px;
}

.alert{
 background-color: #ff0000cc;
    border-color: #ff0000cc; 
    color: white;
}
</style>
    </head>
     
        <body>
      
                <section class ="log_img" style="background-image: url(image/2.jpg);">
                   <br>
                    <div class="box1">
                        <h1 class="title1">Library Management System</h1>
                        <hr>
                        <h1 class="title2">Admin</h1>

                        <form name = "login" action="" method="post">
                            <div class="login">   
                                <h3 style="color: white; font-size: 20px;"> Enter Username</h3>
                            <input class="form-control" type="text" name="username" placeholder="Username" required ="">
                            <h3 style="color: white; font-size: 20px;"> Enter Password</h3>  
                            <input class="form-control" type="password" name="password" placeholder="Password" required =""><br>    
                            <a class = "forgot_pass" href="update_password.php"> Forgot Password?</a><br><br>
                            <input class="btn btn-default" type = "submit" name = "submit" value="Login"> 
                             <a class="signup1" href="registration.php">Signup</a></div>
                        
           
            <?php
            
            if(isset($_POST['submit']))
                {
                    $count = 0;
            $res = mysqli_query($db, " SELECT * FROM admin WHERE username = '$_POST[username]'
             && password = '$_POST[password]'; ");

             $row = mysqli_fetch_assoc($res); 
                     
            $count = mysqli_num_rows($res);
                        
                    

                    if($count == 0)
                    
                    {
                        ?>

                        <div class = "alert alert-warning " style = "" > 
                            <strong>The username and password did not match</strong>
                        </div>
                
                    <?php   
                    }
                else {
                    /* if user and password matches */
                    $_SESSION['login_admin'] = $_POST['username'];
                   
                    $_SESSION['pic'] = $row['pic'];

                    ?>
                    <script type = "text/javascript">
                        window.location= "index.php";

                    </script>
        <?php

                }

            }


            ?>
            </form>
                    </div>
</div>
           </section>
           <footer>
            <p class = "foot">
                <br>
                Email: &nbsp Online.library@gmail.com <br><br>
                Mobile: &nbsp &nbsp +63966321141
            </p>
        </footer>
        </body>
        </html>
        