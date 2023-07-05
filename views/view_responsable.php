<?php
require_once '../scripts/connect.php';
require_once '../scripts/inc_admin.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: liste_responsable");
  exit;
}
$stm1 = $pdo->prepare("SELECT * FROM employe NATURAL JOIN contrat WHERE idEmploye= ?");
$stm1->execute([$_GET['id']]);
$responsable = $stm1->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nom    = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $phone  = $_POST['tel'];
  $email  = $_POST['email'];
  $ville  = $_POST['ville'];
  $id     = $_POST['id'];

  $sql = "UPDATE employe SET nom=:nom, prenom=:prenom, email=:email, phone=:phone, ville=:ville WHERE idEmploye=:id";
  $stm = $pdo->prepare($sql);
  $stm->bindParam(':nom', $nom);
  $stm->bindParam(':prenom', $prenom);
  $stm->bindParam(':email', $email);
  $stm->bindParam(':phone', $phone);
  $stm->bindParam(':ville', $ville);
  $stm->bindParam(':id', $id);
  $stm->execute();
  $stm1 = $pdo->prepare("SELECT * FROM employe INNER JOIN poste WHERE poste=idPoste AND  idEmploye=?");
  $stm1->execute([$id]);
  $responsable = $stm1->fetch();
  $_SESSION['confiramation'] = "La modification est bien effectué";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo SITE_TITLE; ?></title>
  <link rel="shortcut icon" href="images/favicon.png" />
  <!-- plugins:css -->
  <?php include('partials/_plugins-css.html'); ?>
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
                <div class="container rounded bg-white mt-5 mb-5">
                  <div class="row">
                    <div class="col-md-3 border-right">
                      <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="images/profile/IMG_20210102_203408_124.jpg">
                        <span class="font-weight-bold"><?php echo $responsable['nom'] . " " . $responsable['prenom']; ?></span>
                        <span class="text-black-50"><?php echo $responsable['email']; ?></span>
                        <span class="text-black-50"><?php echo $responsable['poste']; ?></span>
                      </div>
                    </div>
                    <div class="col-md-9 border-right">
                      <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <h4 class="text-right">Informations personnelle</h4>
                        </div>
                        <?php require_once 'alerts.php'; ?>
                        <?php if (isset($_SESSION['confiramation'])) : ?>
                          <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert" align="center">
                            <b>
                              <?php echo $_SESSION['confiramation']; ?>
                            </b>
                          </div>
                        <?php unset($_SESSION['confiramation']);
                        endif ?>
                        <form action="view_responsable" method="post">
                          <input type="hidden" name="id" value="<?php echo $responsable['idEmploye']; ?>">
                          <div class="row mt-2">
                            <div class="col-md-6">
                              <label class="labels">Nom</label>
                              <input type="text" class="form-control" name="nom" value="<?php echo $responsable['nom']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label class="labels">Prénom</label>
                              <input type="text" class="form-control" name="prenom" value="<?php echo $responsable['prenom']; ?>" disabled>
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col-md-6">
                              <label class="labels">CIN</label>
                              <input type="text" class="form-control" name="cin" value="<?php echo $responsable['cin']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label class="labels">Sexe</label>
                              <input type="text" class="form-control" name="sexe" value="<?php echo $responsable['sexe']; ?>" disabled>
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col-md-6">
                              <label class="labels">Phone</label>
                              <input type="text" class="form-control" name="tel" value="<?php echo $responsable['phone']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label class="labels">Date de naissance</label>
                              <input type="text" class="form-control" name="email" value="<?php echo $responsable['email']; ?>" disabled>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-md-6">
                              <label class="labels">Adresse</label>
                              <input type="text" class="form-control" name="adress" value="<?php echo $responsable['adresse']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label class="labels">Ville</label>
                              <input type="text" class="form-control" name="ville" value="<?php echo $responsable['ville']; ?>" disabled>
                            </div>
                          </div>
                          <br>

                          <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Situation familiale</h4>
                          </div>

                          <div class="row mt-2">
                            <div class="col-md-6">
                              <label class="labels">Situation</label>
                              <input type="text" name="situation" class="form-control" value="<?php echo $responsable['situationF']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label class="labels">Nombre d'enfants</label>
                              <input type="text" name="nbEnfant" class="form-control" value="<?php echo $responsable['nbEnfants']; ?>" disabled>
                            </div>
                          </div>
                          <br>

                          <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Informations salariale</h4>
                          </div>

                          <div class="row mt-2">
                            <div class="col-md-6">
                              <label class="labels">Diplôme</label>
                              <input type="text" name="diplome" class="form-control" value="<?php echo $responsable['diplome']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label class="labels">Salaire de base</label>
                              <input type="text" name="salaire" class="form-control" value="<?php echo $responsable['salaireBase']; ?>" disabled>
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col-md-6">
                              <label class="labels">CNSS</label>
                              <input type="text" name="cnss" class="form-control" value="<?php echo $responsable['numCNSS']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label class="labels">AMO</label>
                              <input type="text" name="amo" class="form-control" value="<?php echo $responsable['numAMO']; ?>" disabled>
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col-md-6">
                              <label class="labels">CIMR</label>
                              <input type="text" name="cimr" class="form-control" value="<?php echo $responsable['numCIMR']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label class="labels">IGR</label>
                              <input type="text" name="igr" class="form-control" value="<?php echo $responsable['numIGR']; ?>" disabled>
                            </div>
                          </div>

                          <div class="mt-2 text-center">
                            <button class="btn btn-info profile-button" id="btn1" type="button" onclick="Update()">Modifier</button>
                          </div>


                          <button class="btn btn-info profile-button" id="btn2" type="submit">Enregister</button>
                        </form>

                      </div>
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

<script>
  var submit2 = document.querySelector('#btn1');
  var submit1 = document.querySelector('#btn2');
  submit1.style = "display:none";

  function Update() {

    var inputs = document.getElementsByTagName('input');


    for (var i = 0; i < inputs.length; i++) {
      inputs[i].removeAttribute('disabled');
    }
    submit1.style = "display:block";
    submit2.style = "display:none";

  }
</script>

</html>