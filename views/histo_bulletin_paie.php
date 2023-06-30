<?php
  require_once '../CONFIG.php';
  require_once '../scripts/inc.php';
  require_once '../scripts/employe.inc.php';
  $bulletins = getAllBulletins ();
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
                            <h4 class="card-title card-title-dash title">Les bulletins de paie</h4>
                          </div>
                        </div>
                        <div class="table-responsive  mt-1">
                          <table class="table select-table" id="table">
                            <thead>
                              <tr>
                                <th>Mois</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de validation</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody >
                              <?php foreach ($bulletins as $bulletin): ?>
                              <tr>
                                <td><?php echo $bulletin['mois']; ?></td>
                                <td><?php echo $bulletin['nom']; ?></td>
                                <td><?php echo $bulletin['prenom']; ?></td>
                                <td><?php echo $bulletin['createdAt']; ?></td>
                                <td align="right">
                                  <form action="../scripts/entreprise.php" method="post">
                                    <input type="hidden" name="file" value="<?php echo $bulletin['bulletin']; ?>">
                                    <input type="submit" class="btn-check" name="view_bulletin" id="btnradio1<?php echo $bulletin['idBulletin']; ?>" autocomplete="off" checked>
                                    <label class="badge badge-opacity-warning" role="button" for="btnradio1<?php echo $bulletin['idBulletin']; ?>" title="Afficher"><i class="mdi mdi-eye"></i></label>

                                    <input type="submit" class="btn-check" name="download_bulletin" id="btnradio2<?php echo $bulletin['idBulletin']; ?>" autocomplete="off" checked>
                                    <label class="badge badge-opacity-warning" role="button" for="btnradio2<?php echo $bulletin['idBulletin']; ?>" title="Afficher"><i class="mdi mdi-download"></i></label>
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
</body>
</html>