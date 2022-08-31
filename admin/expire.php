
<?php

$title = "Expire Data Information";
require("../header.php");

?>

<?php
    include "connection.php";
    include "navbar.php";

?>

<DOCTYPE html>
    <html>
        <head>
            <title>
                Books
            </title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style type = "text/css">
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
                                h2{
                                    text-align:center;
                                }
                                .scroll{
                                        width: 100%;
                                        height: 400px;
                                        overflow:auto;
                                        margin-bottom:50px;
                                        }

                                th, td{
                                    width: 10%;
                                                                        
                                }
                             .tbl1{
                                 width:100%;
                             }

                             .expire{
                                 color:red;
                             }
                             .container{
                         height:680px;
    background-color:black;
    opacity: .7;
    color: white;
    text-align: center;
    padding-top: 60px;
}
.form-control{
    width: 250px;
    margin-top:50px;  

}
.first{
   float:left;
   margin-top:10.9px;
   margin-left:100px;
}
.second{
    float: right;
    margin-top:10.9px;
}
.sr{
   padding-left: 500px;
         
}
button{
    margin-left: 50px;
    margin-top:10px;  
}
th, td{
  color:white;
}
                                         </style>
                                      </head>
                                      <body>
                                  <!-----------------Sidenavigation------------------->
                                <div id="mySidenav" class="sidenav">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                <div style = "color:white; margin-left: 60px; font-size: 20px;"> 
                       
                       <?php 

                       $first = 0;
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
 
  <span style="font-size:30px;cursor:pointer; color:black;" onclick="openNav()">&#9776;</span>


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

<?php 
    if(isset($_SESSION['login_admin'])){
?>

<form method = "post" action = "">

<button type = "submit" class = "btn btn-default return" placeholder = "Returned" name = "btnreturned" style = "float: left; background-color: #06861a; color:white;" >Returned</button>
 <button type = "submit" class = "btn btn-default expire" placeholder = "Expired" name = "btnexpired" style = "float: left; background-color: red; color: yellow;">Expired</button> 
    </form>
    <div class = "sr">
        <form action="" method = "post" class = "" name = "form1">
        <input type="text" name = "username" class = "form-control first" placeholder = "Username" require = "" >
        <input type="text" name = "bookid" class = "form-control second" placeholder = "Book Id" require = "">
        <button class = "btn btn-default" type = "submit" name = "return"> Return </button>
        
        
        </form>
       
</div>
<?php

if(isset($_POST['return'])){

  mysqli_query($db, "UPDATE issue SET approve = 'Returned' WHERE username = '$_POST[username]' and bookid = '$_POST[bookid]' ");

  mysqli_query($db, "UPDATE books set quantity = quantity+1 where bookid = '$_POST[bookid]';");
}
}

?>
    <h2> List of Expired Data</h2>
<?php
    
        if(isset($_SESSION['login_admin'])){
        
            $sql = "SELECT registration.studentid, registration.username, books.bookid, books.bookname, books.bookauthor, 
    books.edition, issue.approve , issue.issue, issue.book_return FROM registration INNER JOIN issue ON registration.username = issue.username 
    INNER JOIN books ON issue.bookid = books.bookid WHERE issue.approve != '' and issue.approve != 'Approve' ORDER BY issue.book_return ASC;";
       $result = mysqli_query($db, $sql);

        if(isset($_POST['btnreturned'])){
         
          $sql = "SELECT registration.studentid, registration.username, books.bookid, books.bookname, books.bookauthor, 
          books.edition, issue.approve , issue.issue, issue.book_return FROM registration INNER JOIN issue ON registration.username = issue.username 
          INNER JOIN books ON issue.bookid = books.bookid WHERE issue.approve = 'Returned' ORDER BY issue.book_return ASC;";
             $result = mysqli_query($db, $sql);

        }
        else if(isset($_POST['btnexpired'])){

          $sql = "SELECT registration.studentid, registration.username, books.bookid, books.bookname, books.bookauthor, 
          books.edition, issue.approve , issue.issue, issue.book_return FROM registration INNER JOIN issue ON registration.username = issue.username 
          INNER JOIN books ON issue.bookid = books.bookid WHERE issue.approve = 'Expired' ORDER BY issue.book_return ASC;";
             $result = mysqli_query($db, $sql);
        }
        else{

          $sql = "SELECT registration.studentid, registration.username, books.bookid, books.bookname, books.bookauthor, 
          books.edition, issue.approve , issue.issue, issue.book_return FROM registration INNER JOIN issue ON registration.username = issue.username 
          INNER JOIN books ON issue.bookid = books.bookid WHERE issue.approve != '' and issue.approve != 'Approve' ORDER BY issue.book_return ASC;";  
             $result = mysqli_query($db, $sql);
        }
     

        echo "<table class= 'table table-bordered tbl1'>";
        echo "<tr style = 'background-color: #6db6b9e6;'>";

        echo "<th>"; echo "Student Id"; echo "</th>";
        echo "<th>"; echo "Student Username"; echo "</th>";
        echo "<th>"; echo "Book ID"; echo "</th>";
        echo "<th>"; echo "Book Name"; echo "</th>";
        echo "<th>"; echo "Book Author"; echo "</th>";
        echo "<th>"; echo "Book Edition"; echo "</th>";
        echo "<th>"; echo "Book Approval"; echo "</th>";
        echo "<th>"; echo "Book Issue"; echo "</th>";
        echo "<th>"; echo "Book Return"; echo "</th>";
        
        echo "</tr>";

        echo "</table>";
        echo "<div class = 'scroll'>";
        echo "<table class= 'table table-bordered'>";

        while($row= mysqli_fetch_assoc($result)){

          //displaying the data row in the query 
            echo "<tr>"; 
            echo "<td>"; echo $row['studentid']; echo "</td>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['bookid']; echo "</td>";
            echo "<td>"; echo $row['bookname']; echo "</td>";
            echo "<td>"; echo $row['bookauthor']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['approve']; echo "</td>";
            echo "<td>"; echo $row['issue']; echo "</td>";
            echo "<td>"; echo $row['book_return']; echo "</td>";
            
            echo "</tr>";
        }
            echo "</div>";
        
        }
        else{
            ?>
                <h2>Please Login First in order to see the Book Requests.</h2>;
            <?php
        }
    
?>

</div>
</div>

</body>
</html>