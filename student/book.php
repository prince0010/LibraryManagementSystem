<?php

$title = "Books";
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
.scroll{

width: 101.3%;
height:450px;
overflow:auto;
}
th, td{
 width: 8%;
    }
    h2{
  font-weight: 800;
  font-size:30px;
  color:black;
  margin-left: 35px;
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
                          echo "<img class = 'img=circle profile-img' height = 120 width = 120 src='image/default-profile.png'>";
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

        <!----------------------------Search bar ------------------------------->
        <div class = "srch">
        <form class = "navbar-form" method = "post" name = "form1" action="">
       
                <input class = "form-control inp" type="text" name = "search" placeholder = "Search books...">
                <button type = "submit" name = "submit" class = "btn btn-default"> <span class ="glyphicon glyphicon-search"> </span> </button>
           
        </form>
        </div>
        <!--------------------Request Form ---------------------->

        <div class = "srch1">
        <form class = "navbar-form" method = "post" name = "form1" action="">
       
                <input class = "form-control inp" type="text" name = "bookid" placeholder = "Enter Book ID...">
                <button type = "submit" name = "request" class = "btn btn-default" placeholder = "Request Book..."> Request </button>
           
        </form>
        </div>

<h2> List of Books </h2> 

<?php 

        if(isset($_POST['submit']))
        {
            $sql = mysqli_query($db, "SELECT * FROM books WHERE bookname like '%$_POST[search]%'");

            if(mysqli_num_rows($sql) == 0)
            {
                echo "Sorry, the book that you've search is not existed or out of order. Please try again.";
            }
            else{
                echo "<table class= 'table table-bordered'>";
                echo "<tr style = 'background-color: #6db6b9e6;'>";
        
                echo "<th>"; echo "BookId"; echo "<th>";
                echo "<th>"; echo "Book Name"; echo "<th>";
                echo "<th>"; echo "Book Author"; echo "<th>";
                echo "<th>"; echo "Publisher"; echo "<th>";
                echo "<th>"; echo "Edition"; echo "<th>";
                echo "<th>"; echo "Status"; echo "<th>";
                echo "<th>"; echo "Quantity"; echo "<th>";
                echo "<th>"; echo "Department"; echo "<th>";
        
                echo "</tr>";
        
                while($row= mysqli_fetch_assoc($sql)){
                    echo "<tr>"; 
                    
                    echo "<td>"; echo $row['bookid']; echo "<td>";
                    echo "<td>"; echo $row['bookname']; echo "<td>";
                    echo "<td>"; echo $row['publisher']; echo "<td>";
                    echo "<td>"; echo $row['bookauthor']; echo "<td>";
                    echo "<td>"; echo $row['edition']; echo "<td>";
                    echo "<td>"; echo $row['status']; echo "<td>";
                    echo "<td>"; echo $row['quantity']; echo "<td>";
                    echo "<td>"; echo $row['department']; echo "<td>";
                    
                    echo "</tr>";
                }
                    echo "</table>";  
            }          
        }
        
       
        else{

        $res = mysqli_query($db, "SELECT * FROM books ORDER BY books.bookname ASC;");

        echo "<table class= 'table table-bordered' style = 'background-color: black; color:white;'>";
        echo "<tr style = 'background-color: #6db6b9e6;'>";

        echo "<th>"; echo "BookId"; echo "</th>";
        echo "<th>"; echo "Book Name"; echo "</th>";
        echo "<th>"; echo "Publisher"; echo "</th>";
        echo "<th>"; echo "Book Author"; echo "</th>";
        echo "<th>"; echo "Edition"; echo "</th>";
        echo "<th>"; echo "Status"; echo "</th>";
        echo "<th>"; echo "Quantity"; echo "</th>";
        echo "<th>"; echo "Department"; echo "</th>";

        echo "</tr>";
      echo "</table>";
        echo "<div class = 'scroll'>"; 
        echo "<table class= 'table table-bordered'  style = 'background-color: black; color:white;'>";
        while($row= mysqli_fetch_assoc($res)){
            echo "<tr>"; 
            
            echo "<td>"; echo $row['bookid']; echo "</td>";
            echo "<td>"; echo $row['bookname']; echo "</td>";
            echo "<td>"; echo $row['publisher']; echo "</td>";
            echo "<td>"; echo $row['bookauthor']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['status']; echo "</td>";
            echo "<td>"; echo $row['quantity']; echo "</td>";
            echo "<td>"; echo $row['department']; echo "</td>";
            
            echo "</tr>";
        }
        echo "</div>";
            echo "</table>";
    }


    if(isset($_POST['request']))
    {
       if(isset($_SESSION['login_user']))
       {
        $sql2 = mysqli_query($db, "SELECT * FROM books WHERE bookid = '$_POST[bookid]';");
   
        $countrow = mysqli_num_rows($sql2);
        
        if($countrow != 0){
        
         
        mysqli_query($db, "INSERT INTO issue VALUES('$_SESSION[login_user]', '$_POST[bookid]', '' , '' ,'' ); ");
       ?>
        <!-- after requesting a book it will redirect to the request page -->
        <script type = "text/javascript">
            window.location = "request.php";
          </script>
       <?php
      }
      else
      {
       

        ?>
        <script type = "text/javascript">
          alert("The book that you're loooking for is not avaiable in this library");
        </script>
           
           <?php
      }
    }
       else{ 
         /* if a person is not logged in */
         ?>
      <script type = "text/javascript">
        alert("You need to login first to request a book");
      </script>
         
         <?php
       }
      }
?>

</div>
</body>
    </html>