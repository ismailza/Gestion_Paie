<?php
include("../CONFIG.php");
require_once ("../scripts/inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo SITE_TITLE; ?></title>
  <link rel="shortcut icon" href="<?php echo FAVICON; ?>" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <link rel="stylesheet" href="css/simuler.css">
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

                <div class="title">Simualtion du Salaire</div>

                <?php if (isset($_SESSION['error'])) : ?>
                  <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                  </div>
                <?php endif; ?>
                <div class="modal" id="simulationModal" tabindex="-1" role="dialog" aria-labelledby="simulationModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="simulationModalLabel">Résultats de
                          simulation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="bulletin">
                          <p class="additional-text">{{additionalText}}</p>
                          <p class="result2">{{result2}}</p>
                          <p class="amo">{{amo}}</p>
                          <p class="cnss">{{cnss}}</p>
                          <p class="result3">{{result3}}</p>
                          <p class="result4">{{result4}}</p>
                          <p class="result2">{{result2}}</p>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" onclick="closeModal()" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <a href="#" onclick="generate_pdf()" class="btn btn-primary download-btn">Télécharger</a>
                      </div>
                    </div>
                  </div>
                </div>
                <form method="post" action="../scripts/employe.php" class="row g-3 needs-validation" id="msform" enctype="multipart/form-data" novalidate>
                  <div class="card mt-3">
                    <fieldset id="step1" class="card-body row g-3 step">
                      <legend>Simuler salaire</legend>
                      <div class="col-md-6">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control" id="lname" placeholder="NOM">
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="fname" placeholder="Prénom">
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Catégorie</label>
                        <select class="form-select" id="categorie" name="categorie" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="9000" id="choix1">Cadres</option>
                          <option value="5000" id="choix2">Techniciens</option>
                          <option value="3000" id="choix3">Ouvriers</option>
                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label">Département</label>
                        <select class="form-select" id="corps" name="corps" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="1000" id="Choix11">Informatique</option>
                          <option value="800" id="choix22">Management et gestion</option>
                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label">Poste</label>
                        <select class="form-select" id="grade" name="grade" required>
                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label">Région</label>
                        <select class="form-select" id="region" name="region" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="50">Tanger-Tétouan-Al Hoceïma</option>
                          <option value="250">Dakhla-Oued Ed-Dahab</option>
                          <option value="250">Laâyoune-Sakia El Hamra</option>
                          <option value="250">Guelmim-Oued Noun</option>
                          <option value="150">Souss-Massa</option>
                          <option value="250">Drâa-Tafilalet</option>
                          <option value="100">Marrakech-Safi</option>
                          <option value="50">Casablanca-Settat</option>
                          <option value="200">Béni Mellal-Khénifra</option>
                          <option value="50">Rabat-Salé-Kénitra</option>
                          <option value="50">Fès-Meknès</option>
                          <option value="200">L'Oriental</option>
                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label">Mutuelle complémetaire</label>
                        <select class="form-select" id="mutuelle" name="mutuelle" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="500">CIMR</option>
                          <option value="13">Sanad Assurance</option>
                          <option value="13">Wafae Assurance</option>

                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label">Diplome</label>
                        <select class="form-select" id="indice" name="indice" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="50">Bac</option>
                          <option value="150">Bac+2</option>
                          <option value="300">Bac+3</option>
                          <option value="900">Bac+5</option>
                          <option value="1700">Doctorat</option>

                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label">Situation familiale</label>
                        <select class="form-select" id="situation" name="situation" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="300">Marié</option>
                          <option value="200">Celebataire</option>

                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                      <div class="col-md-6">

                        <label for="sexe" class="form-label">Nombre d'enfants < 21 ans </label>
                            <input type="number" class="form-control" name="nombreEnefant" id="nombre" name="nombre">
                            <div class="invalid-feedback">
                              * Champ obligatoire
                            </div>
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label">Année d'experience</label>
                        <select class="form-select" id="expertise" name="expertise" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="200" id="choix2222">0-1ans</option>
                          <option value="500" id="choix1111">1-2 ans</option>
                          <option value="1200" id="choix2222">2-5 ans</option>
                          <option value="2400" id="choix2222">5-10 ans</option>
                          <option value="5000" id="choix2222">Plus 10 ans</option>

                        </select>
                        <div class="invalid-feedback">
                          * Champ obligatoire
                        </div>
                      </div>
                    </fieldset>

                    <div class="card-footer">
                      <input type="button" value="Précédent" class="action back btn btn-sm btn-warning" style="display: none" />
                      <button type="button" onclick="simulate()" class="btn btn-sm btn-info float-end">Simuler</button>
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
  <?php include('partials/_plugins-js.html'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
  <script>
    var categorie = document.getElementById('categorie');
    var corps = document.getElementById('corps');
    var grade = document.getElementById('grade');
    var region = document.getElementById('region');
    var mutuelle = document.getElementById('mutuelle');
    var indice = document.getElementById('indice');
    var situation = document.getElementById('situation');
    var nombreEnfant = document.getElementById('nombre');
    var expertise = document.getElementById('expertise');
    var fname = document.getElementById('fname');
    var lname = document.getElementById('lname');
    corps.disabled = true;
    grade.disabled = true;
    region.disabled = true;
    mutuelle.disabled = true;
    indice.disabled = true;
    situation.disabled = true;
    nombreEnfant.disabled = true;
    expertise.disabled = true;
    // Gestionnaire d'événement pour la liste déroulante "categorie"
    $('#categorie').change(function() {
      var selectedCorps = $(this).val();
      var gradeSelect = $('#corps');

      // Réinitialisez les options de la liste déroulante "corps"
      gradeSelect.empty();

      // Filtrez les options de la liste déroulante "Grade" en fonction de la valeur sélectionnée dans "Corps"
      if (selectedCorps === '9000') {
        gradeSelect.append(
          '<option selected value ="1100" id = "choix111">Ingénieurie</option>');
        gradeSelect.append(
          '<option selected value ="1200" id = "choix111">Mangement et Gestion</option>');
      } else if (selectedCorps === '5000') {
        gradeSelect.append('<option selected value="600">Technicien de 1er grade</option>');
        gradeSelect.append('<option value="300">Technicien de 2ème grade</option>');
        gradeSelect.append('<option value="200">	Technicien de 3ème grade</option>');

      } else {
        gradeSelect.append('<option value="100">Ouvrier</option>');


      }
      // Ajoutez d'autres conditions pour les autres valeurs de "Corps"

      // Mettez à jour la liste déroulante "Grade"
      gradeSelect.prop('disabled', false);
    });

    // Gestionnaire d'événement pour la liste déroulante "Corps"
    $('#corps').change(function() {
      var selectedCorps = $(this).val();
      var gradeSelect = $('#grade');

      // Réinitialisez les options de la liste déroulante "Grade"
      gradeSelect.empty();

      // Filtrez les options de la liste déroulante "Grade" en fonction de la valeur sélectionnée dans "Corps"
      if (selectedCorps == '1100') {
        gradeSelect.append(
          '<option selected value ="1200" id = "choix111">Chef de projet informatique</option>');
        gradeSelect.append(
          '<option value = "800" id = "choix111" > Ingénieur recherche et développement </option>');
        gradeSelect.append(
          '<option value = "750" id = "choix111" > Ingénieur système </option>');
        gradeSelect.append(
          '<option value = "600" id = "choix111" > Développeur informatique </option>');
      } else if (selectedCorps === '1200') {
        gradeSelect.append(
          '<option value = "800" id = "choix111" > Résponsable Ressource humaines </option>');
        gradeSelect.append('<option value = "800" id = "choix111" > Résponsable de paie </option>');
      } else if (selectedCorps === '100') {
        gradeSelect.append('<option value = "100" id = "choix111" > Ouvrier </option>');

      } else {
        gradeSelect.append('<option value = "200" id = "choix111" > technicien reseaux </option>');
        gradeSelect.append('<option value = "200" id = "choix111" > technicien de maintenance</option>');

      }
      // Ajoutez d'autres conditions pour les autres valeurs de "Corps"

      // Mettez à jour la liste déroulante "Grade"
      gradeSelect.prop('disabled', false);
    });

    grade.addEventListener('change', function() {
      // Activer/désactiver le choix suivant en fonction de la valeur du choix précédent
      if (grade.value !== "") {
        region.disabled = false;
      } else {
        region.disabled = true;
        mutuelle.disabled = true;
        indice.disabled = true;
        situation.disabled = true;
        nombreEnfant.disabled = true;
        expertise.disabled = true;
      }
      // Réinitialiser les choix suivants
      region.value = "";
      mutuelle.value = "";
      indice.value = "";
      situation.value = "";
      nombreEnfant.value = "";
      expertise.value = "";
      checkSimulationButton();
    });

    // Gérer l'événement de modification du choix précédent
    categorie.addEventListener('change', function() {
      // Activer/désactiver le choix suivant en fonction de la valeur du choix précédent
      if (categorie.value !== "") corps.disabled = false;
      else {
        corps.disabled = true;
        grade.disabled = true;
        region.disabled = true;
        mutuelle.disabled = true;
        indice.disabled = true;
        situation.disabled = true;
        nombreEnfant.disabled = true;
        expertise.disabled = true;
      }
      // Réinitialiser les choix suivants
      corps.value = "";
      grade.value = "";
      region.value = "";
      mutuelle.value = "";
      indice.value = "";
      situation.value = "";
      nombreEnfant.value = "";
      expertise.value = "";
      checkSimulationButton();
    });

    corps.addEventListener('change', function() {
      // Activer/désactiver le choix suivant en fonction de la valeur du choix précédent
      if (corps.value !== "") {
        grade.disabled = false;
      } else {
        grade.disabled = true;
        region.disabled = true;
        mutuelle.disabled = true;
        indice.disabled = true;
        situation.disabled = true;
        nombreEnfant.disabled = true;
        expertise.disabled = true;
      }
      // Réinitialiser les choix suivants
      grade.value = "";
      region.value = "";
      mutuelle.value = "";
      indice.value = "";
      situation.value = "";
      nombreEnfant.value = "";
      expertise.value = "";
      checkSimulationButton();
    });




    region.addEventListener('change', function() {
      // Activer/désactiver le choix suivant en fonction de la valeur du choix précédent
      if (region.value !== "") {
        mutuelle.disabled = false;
      } else {
        mutuelle.disabled = true;
        indice.disabled = true;
        situation.disabled = true;
        nombreEnfant.disabled = true;
        expertise.disabled = true;
      }
      // Réinitialiser les choix suivants
      mutuelle.value = "";
      indice.value = "";
      situation.value = "";
      nombreEnfant.value = "";
      expertise.value = "";
      checkSimulationButton();
    });

    mutuelle.addEventListener('change', function() {
      // Activer/désactiver le choix suivant en fonction de la valeur du choix précédent
      if (mutuelle.value !== "") {
        indice.disabled = false;
      } else {
        indice.disabled = true;
        situation.disabled = true;
        nombreEnfant.disabled = true;
        expertise.disabled = true;
      }
      // Réinitialiser les choix suivants
      indice.value = "";
      situation.value = "";
      nombreEnfant.value = "";
      expertise.value = "";
      checkSimulationButton();
    });

    indice.addEventListener('change', function() {
      // Activer/désactiver le choix suivant en fonction de la valeur du choix précédent
      if (indice.value !== "") {
        situation.disabled = false;
      } else {
        situation.disabled = true;
        nombreEnfant.disabled = true;
        expertise.disabled = true;
      }
      // Réinitialiser les choix suivants
      situation.value = "";
      nombreEnfant.value = "";
      expertise.value = "";

      checkSimulationButton();
    });

    situation.addEventListener('change', function() {
      // Activer/désactiver le choix suivant en fonction de la valeur du choix précédent
      if (situation.value !== "") {
        nombreEnfant.disabled = false;
      } else {
        nombreEnfant.disabled = true;
        expertise.disabled = true;
      }
      // Réinitialiser les choix suivants
      nombreEnfant.value = "";
      expertise.value = "";
      checkSimulationButton();

    });

    nombreEnfant.addEventListener('change', function() {
      // Activer/désactiver le choix suivant en fonction de la valeur du choix précédent
      if (nombreEnfant.value !== "") {
        expertise.disabled = false;
      } else {
        expertise.disabled = true;
      }
      // Réinitialiser les choix suivants
      expertise.value = "";
      checkSimulationButton();

    });

    // Fonction pour afficher la modale de simulation
    function showSimulationResult() {
      $('#simulationModal').modal('show');
    }
    // Fonction pour simuler le salaire
    function simulate() {
      // le code de simulation de salaire

      // Get the value of the input field with id="choix"
      // Récupérer les éléments du formulaire

      // Convertir les valeurs en nombres
      var indiceValue = parseInt(indice.value);
      var corpsValue = parseInt(corps.value);
      var categorieValue = parseInt(categorie.value);
      var regionValue = parseInt(region.value);
      var situationValue = parseInt(situation.value);

      // Vérifier si tous les choix ont été remplis
      if (
        isNaN(indiceValue) ||
        isNaN(corpsValue) ||
        isNaN(categorieValue) ||
        isNaN(regionValue) ||
        isNaN(situationValue)
      ) {
        alert('Veuillez remplir tous les choix avant de simuler.');
        return;
      }

      function checkSimulationButton() {
        var choixRemplis = categorie.value !== "" &&
          corps.value !== "" &&
          grade.value !== "" &&
          region.value !== "" &&
          mutuelle.value !== "" &&
          indice.value !== "" &&
          situation.value !== "" &&
          nombreEnfant.value !== "" &&
          expertise.value !== "";
        var boutonSimuler = document.getElementById('boutonSimuler');
        boutonSimuler.disabled = !choixRemplis;
      }


      var additionalText = "<p>nombre d'enfant < 21</p>" + (nombreEnfant.value);
      // Calculer les résultats de la simulation
      if (nombreEnfant.value < 3) {
        var AnombreEnfant = nombreEnfant.value * 300;
      } else if (nombreEnfant.value <= 6) {
        var defasage = nombreEnfant.value - 3;
        AnombreEnfant = 900 + defasage * 36;
      } else
        AnombreEnfant = 1008;
      var amo = 0.02 * (categorie.value);
      var cnss = 0.1 * (categorie.value);
      result2 = 0.2 * categorie.value;
      result3 = 0.05 * categorie.value;


      salb = parseInt(categorie.value) + parseInt(corps.value) + parseInt(grade.value) + parseInt(indice
          .value) + parseInt(region.value) + parseInt(expertise.value) +
        parseInt(AnombreEnfant);

      retenue = (amo + cnss + result3 + result2);

      // Mettre à jour le contenu de la modale avec les résultats de la simulation
      var modalBody = $('#simulationModal .modal-body');
      modalBody.html(
        "<h4 class='modal-title'></h4>" +
        "<p>" + fname.value + " " + lname.value + "</p>" +
        "<table class='table'>" +
        "<tr><td>Salaire de base </td><td>" + categorie.value + " MAD</td></tr>" +
        "<tr><td>Indemnité de corps </td><td>" + corps.value + " MAD</td></tr>" +
        "<tr><td>Indemnité de fonction</td><td>" + grade.value + " MAD</td></tr>" +
        "<tr><td>Indemnité du diplome</td><td>" + indice.value + " MAD</td></tr>" +
        "<tr><td>Indemnité du region</td><td>" + region.value + " MAD</td></tr>" +
        "<tr><td>Indemnité d'éxperience'</td><td>" + expertise.value + " MAD</td></tr>" +
        "<tr><td>AMO</td><td>" + amo + " MAD</td></tr>" +
        "<tr><td>CNSS</td><td>" + cnss + " MAD</td></tr>" +
        "<tr><td>Muttel coplaimentaire</td><td>" + result3 + " MAD</td></tr>" +
        "<tr><td>IGR</td><td>" + result2 + "</td></tr>" +
        "<tr><td>Allocation familial</td><td>" + AnombreEnfant + " MAD</td></tr>" +
        "</table>" +

        "<p>Salaire Brute :" + (salb) + " MAD</p>" +
        "<p>Totale des Retenues :" + (retenue) + " MAD</p>" +
        "<p>Salaire Net :" + (salb - retenue) + " MAD</p>"
      );
      // Ajouter des classes CSS pour décorer la modale
      modalBody.addClass('custom-modal-body');
      $('#simulationModal .bulletin').addClass('custom-bulletin');
      $('#simulationModal p').addClass('custom-paragraph');

      // Ajouter un titre stylisé à la modale
      var modalTitle = $('#simulationModal .modal-title');
      modalTitle.text('Résultat de la simulation');
      modalTitle.addClass('custom-modal-title');

      // Affichez la modale
      showSimulationResult();
    }

    // Gestionnaire d'événement pour le bouton de téléchargement


    // Fonction pour gérer la fermeture de la modale
    function closeModal() {
      $('#simulationModal').modal('hide');
    }



    function generate_pdf() {
      var doc = new jsPDF();
      var source = window.document.querySelector("#simulationModal .modal-body");
      doc.fromHTML(source, 15, 15, {});

      doc.save('document.pdf')
    }
  </script>

</body>

</html>