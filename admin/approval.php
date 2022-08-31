

<?php

$title = "Approval Requests";
require("../header.php");

?>

<?php
    include "connection.php";
    include "navbar.php";

?>

<!DOCTYPE html>
<html>
    <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
            <style type = "text/css">
                body {
                font-family: "Lato", sans-serif;
                background-image: url(image/as.jpg);
                 background-repeat: no-repeat;
                 background-size: cover;
                 background-color: rgba(255,255,255,0.4);
                 background-blend-mode: lighten;
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
  color: #f1f1f1;
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
.container{
    height:600px;
    background-color:black;
    opacity: .7;
    color: white;
    text-align: center;
    padding-top: 30px;
}
.form-control{
    height: 40px;
    width: 60%;
    text-align:center;
    margin: 0 auto;
    
   
}
 h3{
     margin-bottom: 60px;
 }

.btn{
    margin-left: 20px;
    margin-top:10px;  
    background-color:black;
    color: white;
}
                </style>

</head>
    <body>
           <!---Sidenavigation---->
           <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style = "color:white; margin-left: 60px; font-size: 20px;"> 
                
                     <?php 
                          if(isset($_SESSION['login_admin'])){
                          echo "<img class = 'img-circle profile-img' height = 120 width = 120 src='image/".$_SESSION['pic']."'>";
                          echo "</br></br>";
                         echo "Welcome ".$_SESSION['login_admin'] ;
                         echo "</br></br>";
                        }  ?> 
                        </div> 
 
  <a href="book.php">Books</a>
  <a href="request.php">Request Book</a>
  <a href="issue.php">Issue Information</a>
</div>

<div id="main">
 
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "rgba(255,255,255,0.3)";
}
</script>
<div class = "container">
    <h3> Approve Request </h3>

    <form action="" method = "post"  class = "Approve">

    <input type="text" class = "form-control" name = "approval" placeholder = "Aprrove - Not" require =""><br>
    <input type="text" class = "form-control" name = "issue" placeholder = "Issue Date - Year-Month-Day" require =""><br>
    <input type="text" class = "form-control" name = "return" placeholder = "Return Date - Year-Month-Day" require =""><br>
    <button class = "btn btn-default" name = "approved">Approve</button>

    </form>
</div>
<?php
            if(isset($_POST['approved'])){
                 mysqli_query($db, "UPDATE issue SET approve='$_POST[approval]',issue='$_POST[issue]',book_return='$_POST[return]' 
                 WHERE username = '$_SESSION[db_name]' and bookid = '$_SESSION[db_id]'; ");

                 mysqli_query($db, "UPDATE books SET quantity = quantity-1 WHERE bookid = '$_SESSION[db_id]';");

                $query = mysqli_query($db, "SELECT quantity FROM books WHERE bookid = '$_SESSION[db_id]';");

                while($row = mysqli_fetch_assoc($query))
                {
                    if($row['quantity'] == 0){

                        mysqli_query($db, "UPDATE books SET status = 'not available' WHERE bookid = '$_SESSION[db_id]';");
                    }

                }
                ?>
                <script type = "text/javascript">

                    alert("Updated Successfully");
                    window.location = "request.php";
                </script>

                <?php

            }
?>
</body>

</html>