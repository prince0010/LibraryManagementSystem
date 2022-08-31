
<?php

$title = "Student Records";
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
                .btn{
                    background-color: #6db6b9e6;  
                }
                .srch{
                    padding-left: 870px;
                }
                body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
  background-image: url(image/as.jpg);
  background-repeat: no-repeat;
  background-size: cover;
}
h2{
  font-weight: 800;
  font-size:30px;
  color:black;
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
.p:hover{
     color:white;
     height:50px;
     width: 300px;
     background-color: #00544c;
   }

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
                </style>
                
        </head>

        <body>

            <!-----------------------------Sidenavigation------------------------------------->
                               <div id="mySidenav" class="sidenav">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                <div style = "color:white; margin-left:50px; font-size: 20px;"> 
                         <?php 
                         if(isset($_SESSION['login_admin'])){
                          echo "<img class = 'img-circle profile-img' height = 120 width = 120 src='image/".$_SESSION['pic']."'>";
                          echo "</br></br>";
                         echo "Welcome ".$_SESSION['login_admin'] ;
                         echo "</br></br>";
                        } 
                         ?> 

                        </div> 


  <div class = "p"> <a href="request.php">Book Request</a></div>
  <div class = "p"><a href=" issue.php">Issue Information</a></div>
  <div class = "p"><a href=" expire.php">Expire Data</a></div>
</div>

<div id="main">
 
  <span style="font-size:30px;cursor:pointer; color:white;" onclick="openNav()">&#9776;</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

        <!----------------------------Search bar ------------------------------->
        <div class = "container">
        <div class = "srch">
        <form class = "navbar-form" method = "post" name = "form1" action="">
       
                <input class = "form-control inp" type="text" name = "search" placeholder = "Student Username">
                <button type = "submit" name = "submit" class = "btn btn-default"> <span class ="glyphicon glyphicon-search"> </span> </button>
           
        </form>
        </div>

<h2> Student Information </h2>

<?php 

        if(isset($_POST['submit']))
        {
            $sql = mysqli_query($db, "SELECT studentid, firstname,lastname,username,email FROM 
            registration WHERE username like '%$_POST[search]%'");

            if(mysqli_num_rows($sql) == 0)
            {
                echo "No Student Found with that username. Please try again.";
            }
            else{
                echo "<table class= 'table table-bordered ' style = 'background-color: black; color:white;'>";
                echo "<tr style = 'background-color: #6db6b9e6;'>";
        
                echo "<th>"; echo "Student Id"; echo "</th>";
                echo "<th>"; echo "Firstname"; echo "</th>";
                echo "<th>"; echo "Lastname"; echo "</th>";
                echo "<th>"; echo "Username"; echo "</th>";
                echo "<th>"; echo "Email"; echo "</th>";
                echo "</tr>";
        
                while($row= mysqli_fetch_assoc($sql)){
                    echo "<tr>"; 
                    echo "<td>"; echo $row['studentid']; echo "</td>";
                    echo "<td>"; echo $row['firstname']; echo "</td>";
                    echo "<td>"; echo $row['lastname']; echo "</td>";
                    echo "<td>"; echo $row['username']; echo "</td>";
                    echo "<td>"; echo $row['email']; echo "</td>";
                    echo "</tr>";
                }
                    echo "</table>";  
            }          
        }
      
        else{

        $res = mysqli_query($db, "SELECT * FROM registration ORDER BY registration.username ASC;");

        echo "<table class= 'table table-bordered'  style = 'background-color: black; color:white;'>";
        echo "<tr style = 'background-color: #6db6b9e6;'>";

        echo "<th>"; echo "Student Id"; echo "</th>";
        echo "<th>"; echo "Firstname"; echo "</th>";
        echo "<th>"; echo "Lastname"; echo "</th>";
        echo "<th>"; echo "Username"; echo "</th>";
        echo "<th>"; echo "Email"; echo "</th>";
        echo "</tr>";

        echo "</tr>";

        while($row= mysqli_fetch_assoc($res)){
           
            
            echo "<tr>"; 
                    echo "<td>"; echo $row['studentid']; echo "</td>";
                    echo "<td>"; echo $row['firstname']; echo "</td>";
                    echo "<td>"; echo $row['lastname']; echo "</td>";
                    echo "<td>"; echo $row['username']; echo "</td>";
                    echo "<td>"; echo $row['email']; echo "</td>";
                    echo "</tr>";
        }
            echo "</table>";
    }
?>

  </div>
</body>
    </html>