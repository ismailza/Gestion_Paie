<?php 
  include ("../CONFIG.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gestion de paie</title>
  <!-- plugins:css -->
  <?php include('partials/_plugins-css.html'); ?>
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('partials/_navbar.php'); ?>

    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php include('partials/_settings-panel.html'); ?>
      <!-- partial:partials/_sidebar.html -->
      <?php include('partials/_sidebar_ERH.html'); ?>

      <!-- partial -->
      <div class="main-panel">
        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">

                <div class="title">Ajouter Employe</div>            

                <form method="post" action="" class="row g-3 needs-validation" id="msform" novalidate>

                  <div class="progress mt-3" style="height: 30px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="font-weight:bold; font-size:15px;" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                  <div class="card mt-3">

                    <fieldset id="step1" class="card-body row g-3 step">
                      <legend>Informations personnelle</legend>
                      <hr>

                      <div class="col-md-4 form-group">
                        <label for="lastname" class="form-label">NOM</label>
                        <input type="text" class="form-control" id="lastname" placeholder="NOM" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="firstname" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="firstname" placeholder="Prénom" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="cin" class="form-label">CIN</label>
                        <input type="text" class="form-control" id="cin" placeholder="CIN" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="birthday" class="form-label">Date de Naissance</label>
                        <input type="date" min="<?= (date('Y')-60).'-1-1'; ?>" max="<?= date('Y-m-d'); ?>" class="form-control" id="birthday" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="address" class="form-label">Adresse de résidence</label>
                        <input type="text" class="form-control" id="address" placeholder="Adresse de résidence" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="city" class="form-label">Ville</label>
                        <select class="form-select" id="city" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="zeiog">ksjbj</option>
                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="zip" class="form-label">Code postal</label>
                        <input type="text" class="form-control" id="zip" placeholder="Code postal" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="telephone" class="form-label">Télephone</label>
                        <input type="phone" class="form-control" id="telephone" placeholder="Télephone" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-3">
                        <img src="images/profile/default-profile-img.png" id="profile-img" class="rounded-circle" width="80px" height="80px" alt="image">
                      </div>
                      <div class="col-md-9">
                        <label for="image" class="form-label">Image de profile</label>
                        <input type="file" accept="image/*" class="form-control" id="image" placeholder="Image de profile" required onchange="loadFile(event, 'profile-img')">
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
                        <select class="form-select" id="situation" required>
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
                        <label for="childrens" class="form-label">Nombre d'enfants</label>
                        <input type="number" min=0 class="form-control" id="childrens" placeholder="Nombre d'enfants" value="0" required>
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
                        <input type="text" class="form-control" id="diplome" placeholder="Diplôme" required>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="post" class="form-label">Post</label>
                        <select class="form-select" id="post" required>
                          <option selected disabled value="">Choose...</option>
                          
                          <option value="Technicien">Technicien</option>

                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="salaire" class="form-label">Salaire de base</label>
                        <input type="number" min=0 step="any" class="form-control" id="salaire" placeholder="Salaire de base" required>
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
                      <input type="button" value="Back" class="action back btn btn-sm btn-warning" style="display: none"/>
                      <input type="button" value="Next" class="action next btn btn-sm btn-info float-end"/>
                      <button class="action submit btn btn-sm btn-outline-success float-end" style="display: none">Submit</button>
                    </div>
                  </div>

                </form>
              
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- partial:partials/_footer.html -->

        <?php include('partials/_footer.html'); ?>

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller ends-->

  <!-- plugins:js -->
  <?php include ('partials/_plugins-js.html'); ?>

  <script>
    fetch('cities.json')
    .then(response => response.json())
    .then(data => {
      data.forEach (myfnct)
    })
    .catch(error => {
      console.log('Error:', error);
    });
    function myfnct (item) {
        option = document.createElement("option");
        option.value = option.text = item.ville;
        document.getElementById('city').appendChild(option);
    }

    var loadFile = function(event, idSRC) {
      var output = document.getElementById(idSRC);
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script>
  

</body>
</html>