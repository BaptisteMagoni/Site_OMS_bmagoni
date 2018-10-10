<?php 
  session_start();

  include_once('data_base.php');
  include_once('upload.php');

  $adresse = "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].$_SERVER["REQUEST_URI"];
  $_SESSION['adresse'] = $adresse;
  $req_galerie = $bdd->query("SELECT * FROM galeries");

  if(isset($_GET['id_galerie'])){
    $id = (int) $_GET['id_galerie'];

    $count = sizeof($bdd->query('SELECT COUNT(id) FROM photos WHERE galerie_id='.$id));

    for ($i=0;$i<$count; $i++) { 
      $req_sup = $bdd->query("DELETE FROM photos WHERE galerie_id = ".$id);
    }
    $req_sup_galerie = $bdd->query("DELETE FROM galeries WHERE id = ".$id);
    $list = array();
    $list = explode("&", $adresse);
    header("Location: ".$list[0]);
  }

  if(isset($_POST['save'])){
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);

    if(!in_array($title, $album_exists)){
      if (!empty($title) AND !empty($description)) {
        $date = date("Y-m-d H:i:s");
        $date_maj = date("Y-m-d H:i:s");
        $insert = $bdd->prepare("INSERT INTO galeries(title, description, date_mel, date_maj, miniature) VALUES (?, ?, ?, ?, ?)");
        $insert->execute(array($title, $description, $date, $date_maj, $path));
        header('Location: photo_admin.php?page=photo_admin');
      }
    }else{
      echo "Existe déjà !";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OMS Site - Baptiste MAGONI</title>

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
            <li class="nav-item active">
              <a class="nav-link" href="creer_galerie.php">Galerie admin
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="photo_admin.php?id_user=<?=$_SESSION['userinfo']['id']?>&page=photo_admin">Photo admin</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group" style="margin-top: 20px; margin-bottom: 20px">
          <label for="exampleFormControlInput1">Titre de la Galerie</label>
          <input name="title" id="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="6ème à la plage" />
        </div>
        <div class="form-group" style="margin-top: 20px; margin-bottom: 20px">
          <label for="exampleFormControlInput1">Description</label>
          <textarea name="description" id="description" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Quelle belle journée à la plage"></textarea>
        </div>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" name="file" value="Choisir une image"/>
          </div>
      </div>
      <div class="input-group mb-3" style="margin-left: 1100px ; margin-top: 70px;">
        <div class="input-group-prepend">
          <input type="submit" name="save" value="Enregistrer" style="background-color: green;" />
        </div>
      </div>
      </form>
       <div class="row text-center text-lg-left">
            <?php
              while($m = $req_galerie->fetch()){
                $g = array($m);
            ?>
              <div class="col-lg-3 col-md-4 col-xs-6 text-center">
                  <h5><?= $m['title'] ?></h5>
                    <img class="img-fluid img-thumbnail" src="<?= $m['miniature'] ?>" alt="" style="border: 1px solid gray; width: 250px; height: 200px;">
                    <a class="btn btn-xs btn-danger" href="<?= $adresse.'&id_galerie='.$m['id'] ?>">Supprimer</a>
              </div>
            <?php
              }
            ?>
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
