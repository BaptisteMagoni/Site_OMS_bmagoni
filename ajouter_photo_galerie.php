<?php 
    include_once('data_base.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thumbnail Gallery - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/index.css">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Galerie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="creer_galerie.php">Creer Galerie</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="photo.php">Ajouter une photo
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container" style="margin-top: 20px;">

      <div class="input-group">
        <div class="custom-file">
          <input type="file" name="Fichier">
        </div>
      </div>
      <form>
        <div class="form-group" style="margin-top: 20px; margin-bottom: 20px">
          <label for="exampleFormControlInput1">Commentaire</label>
          <input type="text" name="Commentaire" class="form-control" id="exampleFormControlInput1" placeholder="Ex : 6ème à la plage">
        </div>
      </form>
      <div class="input-group mb-3" style="margin-left: 1100px ; margin-top: 100px">
        <div class="input-group-prepend" style="background-color: green;">
          <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03" style="color: white;">Enregistrer</button>
        </div>
      </div>
    </div>

    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
