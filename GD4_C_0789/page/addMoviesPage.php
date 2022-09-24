
<?php
    include '../component/sidebar.php'
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);" >

<div class="body d-flex justify-content-between">
    <h4>ADD NEW DATA MOVIES</h4>
    <a href="../page/listMoviesPage.php"> 
    <i style="color: red" class="fa fa-arrow-left fa-2x"></i></a>
</div>
<hr>
<form action="../process/addMoviesProcess.php" method="post">
    <div class="mb-3">
        <label for="movie" class="form-label" >Name</label>
        <input class="form-control" id="name" name="name" placeholder="Nama Movie">  
    </div>

    <div class="mb-3">
        <label for="movie" class="form-label" >Genre</label>
        <select class="form-select" aria-label="Default select example" name="genre" id="genre">
                    <option value="Action">Action</option>
                    <option value="Romance">Romance</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Fantasy">Fantasy</option>
                    </select>
    </div>

    <div class="mb-3">
        <label for="movie" class="form-label" >Release</label>
        <input class="form-control" id="realese" name="realese" placeholder="Year Movie"> 
    </div>

    <div class="mb-3">
        <label for="movie" class="form-label" >Season</label>
        <input class="form-control" id="season" name="season" placeholder="Season Movie"> 
    </div>

    <div class="mb-3">

        <label for="movie" class="form-label" >Synopsis</label>
        <input class="form-control" id="synopsis" name="synopsis" placeholder="Synopsis Movie"> 

    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary" name="add">Save</button>
    </div>
</form>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>