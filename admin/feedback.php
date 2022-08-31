
<?php

$title = "Feedbacks";
require("../header.php");

?>

<?php
    include "navbar.php";
    include "connection.php";
?>

<!DOCTYPE html>
     <html>
         <head>
             
             <link rel="stylesheet" type="text/css" href="css/style.css">   
        <meta charset = "utf-8">
        <meta name = "viewport" content= "width=device-width, initial-scale=1">
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
         </head>

         <style type="text/css">
                body{
                    background-image: url("image/2.jpg");
                    
                }

                .wrapper{
                    width: 800px;
                    height: 750px;
                    background-color: black;
                    opacity: .8;
                    color:white;
                    padding: 10px;
                    margin: -20px auto;
                }

                .form-control{
                 height:140px;
                 width: 650px;
                 margin-top:30px;
                margin-left: 40px;
                }
                .btn{
                  margin-top: 50px;
                  margin-left:40px;
                  margin-bottom:20px;
                    }
                h4{
                 margin-top:50px;
                }
                hr{
                display: block;
                margin-top: 0.8em;
                margin-bottom: 0.5em;
                margin-left: auto;
                margin-right: auto;
                border-style: inset;
                border-width: 1px;
                    }

                    .table{
                        margin-top: 20px;
                        color:white;
                    }
                    .scroll{

                        width: 100%;
                        height:300px;
                        overflow:auto;
                    }

         </style>
         <body>
             <div class = "wrapper">
                 <h1> Feedback </h1>
                 <hr>
                 <h4> If you have any suggestions or question please comment below. </h4>
             <form action="" method = "post">

                 <input class ="form-control" type="text" name = "comment" placeholder = "Write something.... " >
                 <input class= "btn btn-default" type="submit" name = "submit" value = "Comment">
             </form>

             <div class= "scroll">

             <?php 
             
             if(isset($_POST['submit']))
             {

                $sql = "INSERT INTO comments VALUES ('' , 'Admin','$_POST[comment]');";
                if(mysqli_query($db, $sql))
                { 

                $q = "SELECT * FROM comments ORDER BY comments.id DESC";
                $res = mysqli_query($db, $q);

                echo "<table class='table table-bordered'>";
                while($row = mysqli_fetch_assoc($res))
                {
                echo "<tr>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['comment']; echo "</td>";
                echo "</tr>";
                
                }
                echo "</table>";
            } 
        
        }

        else{
             /* if the user is not making a comment or feedback or inputting */
            $q = "SELECT * FROM comments ORDER BY comments.id DESC";
                $res = mysqli_query($db, $q);

                echo "<table class='table table-bordered'>";
                while($row = mysqli_fetch_assoc($res))
                {
                echo "<tr>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['comment']; echo "</td>";
                echo "</tr>";
                
                }
                echo "</table>";

        }
                
             ?>
                </div>
          </div>
            <br><footer>
            <p class = "foot">
                <br>
                Email: &nbsp Online.library@gmail.com <br><br>
                Mobile: &nbsp &nbsp +63966321141
            </p>
        </footer>
         </body>


     </html>