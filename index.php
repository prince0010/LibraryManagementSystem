
<?php

$title = " Online Library Management System";
require("header.php");

?>

<?php 
    session_start();

?>
<DOCTYPE html>
    <html>
        <head>
        
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset = "utf-8">
        <meta name = "viewport" content= "width=device-width, initial-scale=1">
        
    </head>
    <style>
        
    nav{
    float: right;
    word-spacing: 30px;
    padding:10px;
    margin-right: 35px;
}
.bg-img{
    opacity: 0.96;
}

.welcome{
    color: white;
    font-size: 60px;

}
nav li{
    display: inline-block;
    line-height: 80px;
    margin-right: 30px;

}
.box{
    background-color:transparent;
    width: 700px;
}


.logo{
    float: left;
    padding-left: 20px;
    padding-top: 10px;
}
    </style>
    <body>

     <div class="wrapper">
        <header>

            <div class = "logo">
            <a href="index.php"><img src="images/logo.png" ></a>
        </div>

        <?php 
        if(isset($_SESSION['login_user']))
        {?>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="book.php">Books</a></li>
                    <li><a href="logout.php">Logout </a></li>
                </ul>
            </nav>
            <?php
        }
        else{
    
        ?>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="book.php">Books</a></li>
                    <li><a href="feedbacks.php">Feedbacks </a></li>
                    <li><a href="login.php">Login </a></li>
                    
                   
                </ul>
            </nav>

            <?php 
        }
        ?>

        </header>

        <section class = "bg-img" style="background-image: url(images/background.jpg);">
            <br>
            <div class = "box">
                <h1 class="welcome"><br>Welcome to the <br><br> Library</h1><br>
                

            </div>
        </section>
        
    </div>
    <?php 
    include "footer.php";
    ?>

    </body>
    </html>
</DOCTYPE>