<?php 
  require_once '../CONFIG.php';
  require_once ("../scripts/inc.php");
  if ($_SESSION['auth']['poste'] != "Responsable Ressources Humains")
  {
    $_SESSION['error'] = "Vous n'avez pas l'autorisation d'acces";
    header("location: home.php");
    exit();
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

                <div class="title">Ajouter Entreprise</div>    
                
                <?php if (isset($_SESSION['error'])): ?>  
                  <div class="alert alert-danger" role="alert">
                    <?php 
                      echo $_SESSION['error']; 
                      unset($_SESSION['error']);
                    ?>
                  </div>
                <?php endif; ?> 

                <form method="post" action="../scripts/entreprise.php" class="row g-3 needs-validation" id="msform" enctype="multipart/form-data" novalidate>

                  <div class="progress mt-3" style="height: 30px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="font-weight:bold; font-size:15px;" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                  <div class="card mt-3">

                    <fieldset id="step1" class="card-body row g-3 step">
                      <legend>Informations de l'entreprise</legend>
                      <hr>

                      <div class="col-md-6 form-group">
                        <label for="nom" class="form-label">Nom de l'entreprise</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom de l'entreprise" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="ville" class="form-label">Ville</label>
                        <select class="form-select" id="ville" name="ville" required>
                          <option selected disabled value="">Choose...</option>
                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label for="adresse" class="form-label">Adresse de l'entreprise</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse de résidence" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label for="descriptif" class="form-label">Descriptif de l'entreprise</label>
                        <textarea class="form-control" name="descriptif" id="descriptif" rows="10" required></textarea>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div

                    </fieldset>

                    <div class="card-footer">
                      <input type="button" value="Précédent" class="action back btn btn-sm btn-warning" style="display: none"/>
                      <input type="button" value="Continue" class="action next btn btn-sm btn-info float-end"/>
                      <button class="action submit btn btn-sm btn-outline-success float-end" name="submit" style="display: none">Ajouter</button>
                    </div>
                  </div>

                </form>
              
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
  <?php include ('partials/_plugins-js.html'); ?>
</body>
</html>