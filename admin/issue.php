<?php

$title = "Issue Books";
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
                .btn{
                    background-color: #6db6b9e6;  
                }
                .srch{
                    padding-left: 1000px;
                }
                .srch1{
                    padding-left: 1000px;
                }
                .table{
                    color:white;
                    font-size: 15px;
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
.container{
    height:600px;
    background-color:black;
    opacity: .7;
    color: white;
    text-align: center;
    padding-top: 30px;
}
.form-control{
    width: 250px;
    margin-top:10px;  
    background-color:black;
    color:white;  
}
.first{
   float:left;
   margin-top:10.9px;
   margin-left:120px;
}
.second{
    float: right;
}
.sr{
         padding-left: 500px;
         
}
button{
    margin-left: 20px;
    margin-top:10px;  
}

.scroll{
   width: 100%;
   height: 400px;
   overflow: auto;
}
.table{
  margin-top: 20px;
}
th, td{
  width: 10%;
 
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
                        }  
                        ?> 
                        </div> 
 
 <div> <a href="book.php">Books</a> </div>
 <div> <a href="request.php">Request Book</a></div>
 <div> <a href="issue.php">Issue Information</a></div>
 <div> <a href="expire.php">Expire Data </a></div>


</div>


<div id="main">
 
  <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776;</span>


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

<div class = "container">
<h2 style = "text-align: center;"> Data of Borrowed Books</h2>

<?php  

    $c=0;

    if(isset($_SESSION['login_admin'])) 
    {

      $sql = "SELECT registration.studentid, registration.username, books.bookid, books.bookname, books.bookauthor, 
      books.edition, issue.issue, issue.book_return FROM registration INNER JOIN issue ON registration.username = issue.username 
      INNER JOIN books ON issue.bookid = books.bookid WHERE issue.approve = 'Approve' ORDER BY issue.book_return ASC;
      ";

       $res = mysqli_query($db, $sql);
      // res = db and sql "select reg"
    
       echo "<table class= 'table table-bordered'>";

               
                echo "<tr style = 'background-color: #6db6b9e6;'>";
        
                echo "<th>"; echo "Student Id"; echo "</th>";
                echo "<th>"; echo "Student Username"; echo "</th>";
                echo "<th>"; echo "Book ID"; echo "</th>";
                echo "<th>"; echo "Book Name"; echo "</th>";
                echo "<th>"; echo "Book Author"; echo "</th>";
                echo "<th>"; echo "Book Edition"; echo "</th>";
                echo "<th>"; echo "Issue Date"; echo "</th>";
                echo "<th>"; echo "Book Return"; echo "</th>";
                
                echo "</tr>";
                echo "</table>";
                echo "<div class = 'scroll'>"; 
                echo "<table class= 'table table-bordered'>";

                while($row = mysqli_fetch_assoc($res))
                {
                  // if ang date return is on due na or na exceed na
                  $d=date("Y-m-d");

                  // if ang date is greater than sa giinput na book return date then iya dayon ni siya i auot expire ang tanan na nasobraan sa data
                        if($d > $row['book_return']){
                          $c = $c + 1;
                          mysqli_query($db, "UPDATE issue SET approve = 'Expired' WHERE book_return = '$row[book_return]' and approve = 'Approve' limit $c;");
                         
                          echo $d."<br>";
                        }
                        // res = db and sql "select reg"
                        // row = kung unsa ang gi fetch sa $res
                    echo "<tr>"; 
                    echo "<td>"; echo $row['studentid']; echo "</td>";
                    echo "<td>"; echo $row['username']; echo "</td>";
                    echo "<td>"; echo $row['bookid']; echo "</td>";
                    echo "<td>"; echo $row['bookname']; echo "</td>";
                    echo "<td>"; echo $row['bookauthor']; echo "</td>";
                    echo "<td>"; echo $row['edition']; echo "</td>";
                    echo "<td>"; echo $row['issue']; echo "</td>";
                    echo "<td>"; echo $row['book_return']; echo "</td>";
                    
                    echo "</tr>";
                }
                
                    echo "</table>";  
                    echo "</div>";
    }
    else{
    ?>
   <h3 style = "text-align: center;"> Login to see the data borrowed books.</h3>
    <?php
    }

?>
</div>

</div>
</body>
</html?