<?php 
  session_start();
  if(isset($_POST['Update'])) {
    include ('../db.php');
    $id = $_POST['id'];
    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $realese = $_POST['realese'];
    $season = $_POST['season'];
    $synopsis = $_POST['synopsis'];
    
    $query = mysqli_query($con, "UPDATE movies SET name='$name', genre='$genre', realese='$realese', synopsis='$synopsis' WHERE id='$id'")or
        die(mysqli_error($con));

    if( $query){
            echo
               '<script>
                    alert("Update Success"); window.location = "../page/listMoviesPage.php"
                </script>';
    } else{
            echo
            '<script>
                alert("Update Failed"); window.location = "../page/listMoviesPage.php"
               
            </script>';
       }
  }
?>