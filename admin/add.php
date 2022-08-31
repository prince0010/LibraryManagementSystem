

<?php

$title = "Add Books";
require("../header.php");

?>

<?php
include "connection.php";
    include "navbar.php";
?>

<DOCTYPE html>
    <html>
        <head>
            
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style type = "text/css">
                body {
                  background-image: url(image/as.jpg);
                 background-repeat: no-repeat;
                 background-size: cover;
                 background-color: rgba(255,255,255,0.4);
                 background-blend-mode: lighten;
                 font-family: "Lato", sans-serif;
                transition: background-color .5s;
                }
                                .sidenav {
                  height: 100%;
                  width: 0;
                  margin-top: 70px;
                  position: fixed;
                  z-index: 1;
                  top: 0;
                  left: 0;
                  background-color: #222;
                  overflow-x: hidden;
                  transition: 0.5s; 
                  padding-top: 60px;
                }

                              .sidenav a {
                                padding: 8px 8px 8px 32px;
                                text-decoration: none;
                                font-size: 25px;
                                color: #818181;
                                display: block;
                                transition: 0.3s;
                              }

                              .sidenav a:hover {
                                color: white ;
                              }

                              .sidenav .closebtn {
                                position: absolute;
                                top: 0;
                                right: 25px;
                                font-size: 36px;
                                margin-left: 50px;
                              }

                              #main {
                                transition: margin-left .5s;
                                padding: 16px;
                              }

                              @media screen and (max-height: 450px) {
                                .sidenav {padding-top: 15px;}
                                .sidenav a {font-size: 18px;}
                              }
                              .p:hover{
                                    color:white;
                                    height:50px;
                                    width: 300px;
                                    background-color: #00544c;
                                }
                             .books{
                                 width: 400px;
                                 margin: 0 auto;
                                
                             }
                             .form-control{
                                 background-color:#080707;
                                 color:white;
                                 height: 40px;
                             }
                             .btn{
                                background-color:#080707;
                                 color:white;
                                 margin-bottom: 50px;
                             }
                                    
                                    </style>
                                      </head>
                                      <body>
                                  <!-----------------Sidenavigation------------------->
                                <div id="mySidenav" class="sidenav">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                <div style = "color:white; margin-left: 60px; font-size: 20px;"> 
                       
                       
                       <?php 
                       if(isset($_SESSION['login_admin'])){
                          echo "<img class = 'img=circle profile-img' height = 120 width = 120 src='image/".$_SESSION['pic']."'>";
                          echo "</br></br>";
                         echo "Welcome ".$_SESSION['login_admin'] ;
                         echo "</br></br>";
                        } 
                        ?> 

                        </div> 
  <div class = "p"> <a href="add.php">Add Books</a></div>
  <div class = "p"> <a href="request.php">Book Request</a></div>
  <div class = "p"><a href="issue.php">Issue Information</a></div>
</div>

<div id="main">
 
  <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776;</span>

  </div>
                        <div class = "container"> 
                            <h2 style = "color: black; font-family: Lucida Console; text-align: center;"><b> Add New Books </b></h2>

                            <form class = "books" action = "" method ="post">
                                
                                <input type = "text" class = "form-control" name = "bookid" placeholder = "Book id" require = "">
                                <br>
                                <input type = "text" class = "form-control" name = "bookname" placeholder = "Book Name" require = ""> 
                                <br>
                                <input type = "text" class = "form-control" name = "bookauthor" placeholder = "Book Author" require = "">
                                <br>
                                <input type = "text" class = "form-control" name = "publisher" placeholder = "Book Publisher" require = "">
                                <br>
                                <input type = "text" class = "form-control" name = "edition" placeholder = "Book Edition" require = "">
                                <br>
                                <input type = "text" class = "form-control" name = "status" placeholder = "Status" require = "">
                                <br>
                                <input type = "text" class = "form-control" name = "quantity" placeholder = "Quantity" require = "">
                                <br>
                                <input type = "text" class = "form-control" name = "department" placeholder = "Department" require = "">
                                <br>
                                <button type = "submit" class = "btn btn-default" name = "submit" placeholder = "Add"> ADD </button>

                    </form>
                    </div>
                        <?php
                        if(isset($_POST['submit']))
                        {
                                if(isset($_SESSION['login_admin']))
                                {
                                    mysqli_query($db, "INSERT INTO books VALUES ('$_POST[bookid]','$_POST[bookname]', '$_POST[bookauthor]', 
                                    '$_POST[publisher]', '$_POST[edition]', '$_POST[status]', '$_POST[quantity]', '$_POST[department]') ; ");
                                    ?>
                                    <script type = "text/javascript">
                                        alert ("Successfully Added the Book");
                                        </script>
                                        <?php
                                }
                                else{
                                    ?>
                                    <script type = "text/javascript">
                                        alert("Need to Log in first");
                                    </script>
                                    <?php
                                }
                        }
                        ?>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "rgba(255,255,255,0.3)";
}
</script>
       
</body>

</html>