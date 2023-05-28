<?php 
  include ("../CONFIG.php");
  // require_once ("../scripts/inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo SITE_TITLE; ?></title>
  <link rel="shortcut icon" href="<?php echo FAVICON; ?>" />
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

                <div class="title">Ajouter Employe</div>    
                
                <?php if (isset($_SESSION['error'])): ?>  
                  <div class="alert alert-danger" role="alert">
                    <?php 
                      echo $_SESSION['error']; 
                      unset($_SESSION['error']);
                    ?>
                  </div>
                <?php endif; ?> 

                <form method="post" action="../scripts/employe.php" class="row g-3 needs-validation" id="msform" enctype="multipart/form-data" novalidate>

                  <div class="progress mt-3" style="height: 30px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="font-weight:bold; font-size:15px;" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                  <div class="card mt-3">

                    <fieldset id="step1" class="card-body row g-3 step">
                      <legend>Informations personnelle</legend>
                      <hr>

                      <div class="col-md-4 form-group">
                        <label for="nom" class="form-label">NOM</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="NOM" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="cin" class="form-label">CIN</label>
                        <input type="text" class="form-control" id="cin" name="cin" placeholder="CIN" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="sexe" class="form-label">Sexe</label>
                        <select class="form-select" id="sexe" name="sexe" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="Homme">Homme</option>
                          <option value="Femme">Femme</option>
                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="birthday" class="form-label">Date de Naissance</label>
                        <input type="date" min="<?= (date('Y')-60).'-1-1'; ?>" max="<?= date('Y-m-d'); ?>" class="form-control" name="dateNais" id="birthday" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="telephone" class="form-label">Télephone</label>
                        <input type="phone" class="form-control" id="telephone" name="phone" placeholder="Télephone" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="adresse" class="form-label">Adresse de résidence</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse de résidence" required>
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
                      <div class="col-md-3">
                        <img src="images/profile/default-profile-img.png" id="profile-img" class="rounded-circle" width="80px" height="80px" alt="image">
                      </div>
                      <div class="col-md-9">
                        <label for="image" class="form-label">Image de profile</label>
                        <input type="file" accept="image/*" class="form-control" id="image" name="image" placeholder="Image de profile" required onchange="loadFile(event, 'profile-img')">
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>

                    </fieldset>

                    <fieldset id="step2" class="card-body row g-3 step" style="display: none">
                      <legend>Situation familiale</legend>
                      <hr>

                      <div class="col-md-4">
                        <label for="situation" class="form-label">Situation</label>
                        <select class="form-select" id="situation" name="situation" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="Célibataire">Célibataire</option>
                          <option value="Marié">Marié</option>
                          <option value="Divorcé">Divorcé</option>
                          <option value="Veuf">Veuf</option>
                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-2">
                        <label for="nbEnfants" class="form-label">Nombre d'enfants</label>
                        <input type="number" min=0 class="form-control" id="nbEnfants" name="nbEnfants" placeholder="Nombre d'enfants" value="0" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>

                    </fieldset>

                    <fieldset id="step3" class="card-body row g-3 step" style="display: none">
                      <legend>Informations salariale</legend>
                      <hr>

                      <div class="col-md-4">
                        <label for="diplome" class="form-label">Diplôme</label>
                        <input type="text" class="form-control" id="diplome" name="diplome" placeholder="Diplôme" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="post" class="form-label">Post</label>
                        <select class="form-select" id="post" name="post" required>
                          <option selected disabled value="">Choose...</option>
                          
                          <option value="Technicien">Technicien</option>

                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="salaire" class="form-label">Salaire de base</label>
                        <input type="number" min=0 step="any" class="form-control" id="salaire" name="salaire" placeholder="Salaire de base" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="cnss" class="form-label">CNSS</label>
                        <input type="text" class="form-control" id="cnss" name="cnss" placeholder="CNSS" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="amo" class="form-label">AMO</label>
                        <input type="text" class="form-control" id="amo" name="amo" placeholder="AMO" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="cimr" class="form-label">CIMR</label>
                        <input type="text" class="form-control" id="cimr" name="cimr" placeholder="CIMR" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="igr" class="form-label">IGR</label>
                        <input type="text" class="form-control" id="igr" name="igr" placeholder="IGR" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
        
                    </fieldset>

                    <fieldset id="step3" class="card-body row g-3 step" style="display: none">
                      <legend>Confirmation</legend>
                      <hr>

                      <div class="col-12 d-flex justify-content-center">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                          <label class="form-check-label" for="invalidCheck">
                            Les informations fournies sont correctes
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
        
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