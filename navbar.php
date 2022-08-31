<?php 
    session_start();
?>

<DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="style.css">
            <link rel="stylesheet" type="text/css" href="css/css.css">
        <meta charset = "utf-8">
        <meta name = "viewport" content= "width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        </head>
     
        <body>
            
        <nav class="navbar navbar-inverse" >
                        <div class="container-fluid">
                        <div class = "navbar-header">
                            <a class = "navbar-brand active" href="index.php"> <img class="logopic" src="images/logo2.png" alt=""></a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="book.php">Books</a></li>
                            <li><a href="feedbacks.php">Feedback</a></li>
                     
                        </ul>
                        <?php 
                        
                         if(isset($_SESSION['login_user']))
                         {?>
                         <ul class="nav navbar-nav">
                             <li><a href="profile.php">PROFILE</a></li>
                         </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="profile.php">
                        <div class = "wel"> 
                         <?php 
                          echo "<img class = 'img=circle profile-img' height = 24 width = 24 src='image/".$_SESSION['pic']."'>";
                         echo "Welcome ".$_SESSION['login_user'] 
                         ?> 
                        </div> 
                        </a></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style = "color:white;"> Logout</span> </a></li>
                        </ul>
                        <?php 
                        }        
                            else{ ?>
                             <ul class="nav navbar-nav navbar-right">
                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"> Login</span> </a></li>
                            <li><a href="registration.php"><span class="glyphicon glyphicon-user"> Signup</span> </a></li>              
                    </ul>
                            <?php }
                        ?>

                     
                    </nav>

        </body>
    </html>