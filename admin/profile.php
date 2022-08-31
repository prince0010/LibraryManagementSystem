<?php

$title = "Profile";
require("../header.php");

?>

<?php 
include "connection.php";
include "navbar.php"; 

?>

<!DOCTYPE html>

<html>
    <head>
 

    <style type = "text/css">
        .wrapper{
            
            margin: 0 auto;
            width: 500px;
            color: white;
            
        }
        h2{
            text-align: center;
            padding-top: 20px;
            font-weight: 700;
            color:black;
            font-size:40px;
        }
        h4{
            font-size:30px;
            color:black;
            font-weight: 750;
        }
        .pic{
            text-align: center;
        }
       
        
        </style>
    </head>
<body style = "background-image:url(image/as.jpg); background-repeat: no-repeat; background-size: cover;   background-color: rgba(255,255,255,0.4);
                 background-blend-mode: lighten;">
<div class = "container">
    <form action = "" method = "post">
    
<div class = "wrapper">

<?php 
  if(isset($_POST['edit'])){

    ?>
<script type = "text/javascript">

window.location = "editpage.php";
</script>
    <?php
}
        $q = mysqli_query($db, "SELECT * FROM admin WHERE username = '$_SESSION[login_admin]';");
       
?>
 <h2 > My Profile </h2>
<?php

    $row = mysqli_fetch_assoc($q);

    echo "<div class = 'pic'><img class = 'img-circle profile-img' height = 110 width = 120 src = 'image/".$_SESSION['pic']."'></img> 
    </div>";
        
?>
        <div style = "text-align: center ; font-size: 25px;margin-top: 10px; color:black;"> <b> Welcome </b> 
        <h4> 
        <?php
        echo $_SESSION['login_admin'];   
        ?>     
    </h4>
    </div>
          <?php 
            echo "<b>";
            echo "<table class = 'table table-bordered' style = 'color: white; background-color: black;'>";
 
            echo "<tr>";
            echo "<td> ";
                echo "<b>Firstname:  </b>";
            echo "</td>";
 
            echo "<td> ";
                 echo $row['firstname'];
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>";
                echo "<b>Lastname:  </b>"; 
            echo "</td>";

            echo "<td>";
                echo $row['lastname'];
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>";
                echo "<b> Email:</b>";
            echo "</td>";
            echo "<td>";
                echo $row['email'];
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>";
                echo "<b> Username: </b>";
            echo "</td>";
            echo "<td>";
                echo $row['username'];
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>";
                echo "<b>Password </b>";
            echo "</td>";
            echo "<td>";
                echo $row['password'];
            echo "</td>";
            echo "</tr>";

        
            echo "<tr>";
            echo "<td>";
                echo "<b> Contact Number: </b>";
            echo "</td>";
            echo "<td>";
                echo $row['contact'];
            echo "</td>";
            echo "</tr>";

            echo "</table>";

            echo "</b>";
           ?>
</div>
</div>
</form>

</body>

</html>