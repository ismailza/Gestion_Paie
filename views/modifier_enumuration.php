<?php
require_once '../CONFIG.php';
require_once '../scripts/connect.php';
require_once '../scripts/inc_admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['poste'])) {
    $titre = $_POST['titrePoste'];
    $salaire = $_POST['salaire'];
    $stm = $pdo->prepare("INSERT INTO poste value ('$titre','$salaire')");
    $stm->execute();
    $_SESSION['confirmation'] = "opération est bien effectué";
  }
  if (isset($_POST['prime'])) {
    $prime = $_POST['primeTitre'];
    $stm = $pdo->prepare("INSERT INTO primeTypes value ('$prime')");
    $stm->execute();
    $_SESSION['confirmation'] = "opération est bien effectué";
  }
  if (isset($_POST['conge'])) {
    $conge = $_POST['titreConge'];
    $stm = $pdo->prepare("INSERT INTO congeTypes value ($conge)");
    $stm->execute();
    $_SESSION['confirmation'] = "opération est bien effectué";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JI2A</title>
  <link rel="shortcut icon" href="images/favicon.png" />
  <!-- plugins:css -->
  <?php include('partials/_plugins-css.html'); ?>
  <style>
    .fh5co-loader {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(./loader.gif) center no-repeat #fff;
    }
  </style>
</head>

<body>
  <div class="fh5co-loader"></div>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('partials/_navbar.php'); ?>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php include('partials/_settings-panel.html'); ?>
      <!-- partial:partials/_sidebar.html -->
      <?php include('partials/_sidebar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="title">Alimenter une enumuration</div>
                <?php if (isset($_SESSION['confirmation'])) : ?>
                  <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert" align="center">
                    <b><?php echo $_SESSION['confirmation']; ?></b>
                  </div>
                <?php unset($_SESSION['confirmation']);
                endif ?>
                <div class="card mt-4">
                  <fieldset id="step1" class="card-body row g-3 step">
                    <div class="col-md-4 form-group">
                      <label for="nom" class="form-label">Enumuration</label>
                      <select class="form-select" onchange="changer()" id="choix" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="poste">Poste</option>
                        <option value="conge">Congé</option>
                        <option value="prime">Prime</option>
                      </select>
                      <div class="invalid-feedback">
                        * Champ obligatoire
                      </div>
                    </div>
                  </fieldset>
                </div>
                <br>
                <div class="card mt-3" id="poste" style="display:none">
                  <fieldset id="step1" class="card-body row g-3 step">
                    <h4>Poste</h4>
                    <form action="modifier_enumuration" method="post">
                      <div class="col-md-12 form-group row">
                        <label for="nom" class="form-label">Titre du poste</label>
                        <div class="col-md-6">
                          <input type="phone" class="form-control" id="telephone" name="titrePoste" placeholder="Titre du poste" required>
                          <div class="invalid-feedback">
                            * Champ obligatoire
                          </div>
                        </div>
                        <label for="nom" class="form-label">Salaire de base</label>
                        <div class="col-md-6">
                          <input type="phone" class="form-control" id="telephone" name="salaire" placeholder="Salaire de base" required>
                          <div class="invalid-feedback">
                            * Champ obligatoire
                          </div>
                        </div>
                        <div class="col-md-3">
                          <input type="submit" class="form-control btn btn-info" name="poste" value="Ajouter" required>
                        </div>
                      </div>
                    </form>
                  </fieldset>
                </div>
                <div class="card mt-3" id="conge" style="display:none">
                  <fieldset id="step1" class="card-body row g-3 step">
                    <h4>Conge</h4>
                    <form action="modifier_enumuration" method="post">
                      <div class="col-md-6 form-group row">
                        <label for="nom" class="form-label">Titre du conge</label>
                        <div class="col-md-8">
                          <input type="phone" class="form-control" id="Titre du conge" name="titreConge" placeholder="Titre du conge" required>
                          <div class="invalid-feedback">
                            * Champ obligatoire
                          </div>
                        </div>
                        <div class="col-md-4">
                          <input type="submit" name="conge" class="form-control btn btn-info" value="Ajouter" required>
                        </div>
                      </div>
                    </form>
                  </fieldset>
                </div>
                <div class="card mt-3" id="prime" style="display:none">
                  <fieldset id="step1" class="card-body row g-3 step">
                    <h4>Prime</h4>
                    <form action="modifier_enumuration" method="post">
                      <div class="col-md-8 form-group row">
                        <label for="nom" class="form-label">Titre du Pime</label>
                        <div class="col-md-6">
                          <input type="phone" class="form-control" id="telephone" name="primeTitre" placeholder="Titre du Pime" required>
                        </div>
                        <div class="col-md-3">
                          <input type="submit" name="prime" class="form-control btn btn-info" value="Ajouter" required>
                        </div>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                  </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include('partials/_footer.html'); ?>
  </div><!-- main-panel ends -->
  </div><!-- page-body-wrapper ends -->
  </div><!-- container-scroller ends-->
  <!-- plugins:js -->
  <?php include('partials/_plugins-js.html'); ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
  poste = document.getElementById("poste");
  conge = document.getElementById("conge");
  prime = document.getElementById("prime");
  choix = document.getElementById("choix");

  function changer() {
    poste.style = "display:none";
    conge.style = "display:none";
    prime.style = "display:none";
    console.log("ZADDI");
    if (choix.value == "poste") {
      poste.style = "display:block";
    }
    if (choix.value == "conge") {
      conge.style = "display:flex";
    }
    if (choix.value == "prime") {
      prime.style = "display:flex";
    }
  }
</script>

</html>