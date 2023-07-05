<?php
  require_once '../CONFIG.php';
  require_once '../scripts/inc.php';
  require '../scripts/connect.php';
  $stm = $pdo->prepare("SELECT * FROM rubrique");
  $stm->execute();
  $rubriques = $stm->fetchAll(PDO::FETCH_ASSOC);
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
                            <h4 class="card-title card-title-dash title">Liste des rubrique</h4>
                          </div>
                          <div>
                            <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" onclick="location.href='add_regle_paie'"><i class="mdi mdi-account-plus"></i>Ajouter Rubrique</button>
                          </div>
                        </div>
                        <div class="table-responsive  mt-1">
                          <table class="table select-table" id="table">
                            <thead>
                              <tr>
                                <th>Nom de la rubrique</th>
                                <th>clé</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($rubriques as $rubrique): ?>
                              <tr>
                                <td><?php echo $rubrique['nomRubrique']; ?></td>
                                <td><?php echo $rubrique['shortName']; ?></td>
                                <td class="action-btn">
                                  <form action="../scripts/entreprise.php" method="post" >
                                    <input type="hidden" name="id" value="<?php //echo $rubrique['idRubrique']; ?>">
                                    <input type="submit" class="btn-check" name="update_id" id="btnradio<?php //echo $rubrique['idRubrique']; ?>" autocomplete="off" checked>
                                    <label class="badge badge-opacity-warning" for="btnradio<?php //echo $rubrique['idRubrique']; ?>" title="Modifier"><i class="mdi mdi-lead-pencil"></i></label>
                                    <input type="button" class="btn-check" name="delete" id="btnradio_<?php //echo $rubrique['idRubrique']; ?>" autocomplete="off">
                                    <label class="badge badge-opacity-danger" for="btnradio_<?php //echo $rubrique['idRubrique']; ?>" title="Supprimer" data-bs-toggle="modal" data-bs-target="#exampleModal<?php //echo $regle['idRubrique']; ?>"><i class="mdi mdi-delete"></i></label>

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