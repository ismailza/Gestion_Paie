<?php 
  require_once '../scripts/inc.php';
  require_once '../scripts/rh.inc.php';
  require_once '../scripts/entreprise.inc.php';
  $entreprises = getAllEntreprise();
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
                
                <?php if (isset($_SESSION['success'])): ?>
                  <div class="alert alert-success" role="alert">
                    <?php 
                      echo $_SESSION['success']; 
                      unset($_SESSION['success']);
                    ?>
                  </div>
                <?php endif; if (isset($_SESSION['error'])): ?>  
                  <div class="alert alert-danger" role="alert">
                    <?php 
                      echo $_SESSION['error']; 
                      unset($_SESSION['error']);
                    ?>
                  </div>
                <?php endif; ?> 

                <div class="row flex-grow">
                  <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                      <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                          <div>
                            <h4 class="card-title card-title-dash title">Liste des entreprises</h4>
                          </div>
                          <div>
                            <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" onclick="location.href='add_entreprise'"><i class="mdi mdi-account-plus"></i>Ajouter entreprise</button>
                          </div>
                        </div>
                        <div class="table-responsive  mt-1">
                          <table class="table select-table" id="table">
                            <thead>
                              <tr>
                                <th>Nom</th>
                                <th>Ville</th>
                                <th>Adresse</th>
                                <th>Descriptif</th>
                                <th>Created At</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($entreprises as $ent): ?>
                              <tr>  
                                <td><?php echo $ent['nomEntreprise']; ?></td>
                                <td><?php echo $ent['ville']; ?></td>
                                <td><?php echo $ent['adresse']; ?></td>
                                <td><?php echo $ent['descriptif']; ?></td>
                                <td><?php echo $ent['createdAt']; ?></td>
                                <td class="action-btn">
                                  <form action="../scripts/entreprise.php" method="post" >
                                    <input type="hidden" name="id" value="<?php echo $ent['idEntreprise']; ?>">
                                    <input type="submit" class="btn-check" name="view_id" id="btnradio1<?php echo $ent['idEntreprise']; ?>" autocomplete="off" checked>
                                    <label class="badge badge-opacity-warning" role="button" for="btnradio1<?php echo $ent['idEntreprise']; ?>" title="Afficher"><i class="mdi mdi-eye"></i></label>
                                    <input type="submit" class="btn-check" name="update_id" id="btnradio<?php echo $ent['idEntreprise']; ?>" autocomplete="off" checked>
                                    <label class="badge badge-opacity-warning" role="button" for="btnradio<?php echo $ent['idEntreprise']; ?>" title="Modifier"><i class="mdi mdi-lead-pencil"></i></label>
                                    <input type="button" class="btn-check" name="delete" id="btnradio_<?php echo $ent['idEntreprise']; ?>" autocomplete="off">
                                    <label class="badge badge-opacity-warning" role="button" for="btnradio_<?php echo $ent['idEntreprise']; ?>" title="Supprimer" onclick="openWindow ('deleteConfirmation', <?php echo $ent['idEntreprise']; ?>);"><i class="mdi mdi-delete"></i></label>
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
                          <p class="fs-6 text-center">Vous voulez vraiment suppremer cet entreprise?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="delete" class="btn btn-danger btn-lg">Supprimer</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
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