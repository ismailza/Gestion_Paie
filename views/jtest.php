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
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <!-- Bootstrap 4 CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
      <!-- Telephone Input CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css'>
      <!-- Icons CSS -->
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
      <!-- Nice Select CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css'>
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

                <div class="title"><h2>Ajouter Employe</h2></div>
                <div class="space-15" style="height: 15px;"></div>                

                <form method="post" action="" class="row g-3 needs-validation" id="msform" novalidate>
                  <!-- progressbar -->
                  <ul id="progressbar">
                    <li class="active" id="start"><strong>Informations personnelle  </strong></li>
                    <li id="second"><strong>Situation familiale</strong></li>
                    <li id="third"><strong>Informations salariale</strong></li>
                    <li id="finish"><strong>Confirmation</strong></li>
                  </ul>
                 
                  <fieldset id="step1" class="step row g-3">
                    <legend>Informations personnelle</legend>
                    <hr>

                    <div class="col-md-4">
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
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                      <input type="button" value="Next" class="next action-button" name="next"/>
                    </div>
                  </fieldset>

                  <fieldset id="step2" class="step row g-3">
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
                 
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                      <button class="action-button previous previous_button" name="previous">Précédent</button>
                      <button class="next action-button" name="next">Suivant</button>
                    </div>
                  </fieldset>

                  <fieldset id="step2" class="step row g-3">
                    <legend>Situation salariale</legend>
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
                 
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                      <button class="action-button previous previous_button" name="previous">Précédent</button>
                      <button class="next action-button" name="next">Suivant</button>
                    </div>
                  </fieldset>

                  <fieldset id="step2" class="step row g-3">
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
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                      <button class="action-button previous previous_button" name="previous">Précédent</button>
                      <button class="btn btn-info" name="submit">Ajouter</button>
                    </div>
                  </fieldset>

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

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js'></script>
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

    (function($) {
    "use strict";  
    
    //* Form js
    function verificationForm(){
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'absolute'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function () {
            return false;
        })
    }; 
    
    //* Add Phone no select
    function phoneNoselect(){
        if ( $('#msform').length ){   
            $("#phone").intlTelInput(); 
            $("#phone").intlTelInput("setNumber", "+880"); 
        };
    }; 
    //* Select js
    function nice_Select(){
        if ( $('.product_select').length ){ 
            $('select').niceSelect();
        };
    }; 
    /*Function Calls*/  
    verificationForm ();
    phoneNoselect ();
    nice_Select ();
})(jQuery);
  </script>


</body>
</html>