<?php
  require_once '../scripts/inc.php';
  require_once '../scripts/rp.inc.php';
  require_once '../scripts/entreprise.inc.php';
  $regles = getAllRegles();
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
                <?php require_once 'alerts.php'; ?>
                <div class="row flex-grow">
                  <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                      <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                          <div>
                            <h4 class="card-title card-title-dash title">Liste des règles de paie</h4>
                          </div>
                          <div>
                            <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" onclick="location.href='add_regle_paie'"><i class="mdi mdi-account-plus"></i>Ajouter Règle</button>
                          </div>
                        </div>
                        <div class="table-responsive  mt-1">
                          <table class="table select-table" id="table">
                            <thead>
                              <tr>
                                <th>Entreprise</th>
                                <th>Rubrique</th>
                                <th>Formule</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($regles as $regle): ?>
                              <tr>
                                <td><?php echo $regle['nomEntreprise']; ?></td>
                                <td><?php echo $regle['nomRubrique']; ?></td>
                                <td><?php echo $regle['shortName']." = ".$regle['formule']; ?></td>
                                <td class="action-btn">
                                  <form action="../scripts/entreprise.php" method="post" >
                                    <input type="hidden" name="idE" value="<?php echo $regle['idEntreprise']; ?>">
                                    <input type="hidden" name="idR" value="<?php echo $regle['idRubrique']; ?>">
                                    <input type="submit" class="btn-check" name="update_id" id="btnradio<?php echo $regle['idEntreprise'].''.$regle['idRubrique']; ?>" autocomplete="off" checked>
                                    <label class="badge badge-opacity-warning" for="btnradio<?php echo $regle['idEntreprise'].''.$regle['idRubrique']; ?>" title="Modifier"><i class="mdi mdi-lead-pencil"></i></label>
                                    <input type="button" class="btn-check" name="delete" id="btnradio_<?php echo $regle['idEntreprise'].''.$regle['idRubrique']; ?>" autocomplete="off">
                                    <label class="badge badge-opacity-danger" for="btnradio_<?php echo $regle['idEntreprise'].''.$regle['idRubrique']; ?>" title="Supprimer" onclick="openWindow('deleteConfirmation',<?php echo $regle['idEntreprise']; ?>,<?php echo $regle['idRubrique']; ?> );"><i class="mdi mdi-delete"></i></label>

                                  </form>
                                </td>
                              </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 

                <div class="modal" tabindex="-1" id="deleteConfirmation">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="../scripts/entreprise.php" method="post">
                        <div class="modal-body d-flex">
                          <input type="hidden" name="id" value="">
                          <p class="fs-6 text-center">Vous voulez vraiment suppremer cette règle?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="deleteRegle" class="btn btn-danger btn-lg">Supprimer</button>
                        </div>
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
  <?php include ('partials/_plugins-js.html'); ?>
  <script>
    function openWindow(modal, id){
      // Set the id value in the modal form
      document.querySelector("#"+modal+" input[name='id']").value = id;
      // Show the modal
      $('#'+modal).modal('show');
    }
  </script>
</body>
</html>