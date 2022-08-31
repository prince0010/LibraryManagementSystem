
<?php

$title = "Request Books";
require("../header.php");

?>


<?php

include "connection.php";
include "navbar.php";

?>

<!DOCTYPE html>
<html>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
            <style type = "text/css">
                .btn{
                    background-color: #6db6b9e6;  
                }
                .srch{
                    padding-left: 1000px;
                }
                .srch1{
                    padding-left: 1000px;
                }
                body {
                font-family: "Lato", sans-serif;
                 transition: background-color .5s;
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
                </style>

</head>

    <body>

           <!---Sidenavigation---->
           <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style = "color:white; margin-left: 60px; font-size: 20px;"> 
                
                     <?php 
                          if(isset($_SESSION['login_user'])){
                          echo "<img class = 'img-circle profile-img' height = 120 width = 120 src='image/default-profile.png'>";
                          echo "</br></br>";
                         echo "Welcome ".$_SESSION['login_user'] ;
                         echo "</br></br>";
                        }  ?> 
                        </div> 
 
  <a href="book.php">Books</a>
  <a href="request.php">Request Book</a>

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

<?php 

        if(isset($_SESSION['login_user']))
        {
            $sql = mysqli_query($db, "SELECT * FROM issue WHERE username = '$_SESSION[login_user]';");

            if(mysqli_num_rows($sql) == 0)
            {
                echo "There is no pending request, please try again.";
            }
            else{ 
                echo "<table class= 'table table-bordered ' style = 'background-color:black; color:white;'>";
                echo "<tr style = 'background-color: #6db6b9e6;'>";
        
                echo "<th>"; echo "Book Id"; echo "</th>";
                echo "<th>"; echo "Approval Status"; echo "</th>";
                echo "<th>"; echo "Issue Date"; echo "</th>";
                echo "<th>"; echo "Book Return"; echo "</th>";
              
        
                echo "</tr>";
        
                while($row= mysqli_fetch_assoc($sql)){
                    echo "<tr>"; 
                    
                    echo "<td>"; echo $row['bookid']; echo "</td>";
                    echo "<td>"; echo $row['approve']; echo "</td>";
                    echo "<td>"; echo $row['issue']; echo "</td>";
                    echo "<td>"; echo $row['book_return']; echo "</td>";
                
                    
                    echo "</tr>";
                }
                    echo "</table>";  
            }    
                  
        }
        else{
            
            echo "<br><br>";
            echo "<h1>";
            echo "Please Login first before you can request books";
            echo "</h1>";
        }
        ?>
        </body>
    </html>

