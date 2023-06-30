<?php 
  require_once '../scripts/inc.php';
  require_once '../scripts/rp.inc.php';
  require_once '../scripts/employe.inc.php';
  $employes = getAllEmployes();
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
                            <h4 class="card-title card-title-dash title">Liste des employés</h4>
                          </div>
                          <div>
                            <form action="../scripts/employe.php" method="post">
                              <button class="btn btn-primary btn-lg text-white mb-0 me-0" name="validate" type="submit"><i class="mdi mdi-check-all"></i>Valider Paie</button>
                            </form>
                          </div>
                        </div>
                        <div class="table-responsive  mt-1">
                          <table class="table select-table" id="table">
                            <thead>
                              <tr>
                                <th>Image</th>
                                <th>CIN</th>
                                <th>NOM</th>
                                <th>Prénom</th>
                                <th>Sexe</th>
                                <th>Date Naissance</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Bulletin</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($employes as $employe) : ?>
                              <tr onclick="document.location.href='view_employe?id=<?php echo $employe['idEmploye']; ?>'">  
                                <td><img src="images/profile/<?php echo $employe['image']; ?>" class="rounded-circle" width="40px" height="40px" alt="profile image">
                                </td>
                                <td><?php echo $employe['cin']; ?></td>
                                <td><?php echo $employe['nom']; ?></td>
                                <td><?php echo $employe['prenom']; ?></td>
                                <td><?php echo $employe['sexe']; ?></td>
                                <td><?php echo $employe['dateNaiss']; ?></td>
                                <td><?php echo $employe['email']; ?></td>
                                <td><?php echo $employe['phone']; ?></td>
                                <td class="action-btn">
                                  <form action="../scripts/employe.php" method="post" >
                                    <input type="hidden" name="id" value="<?php echo $employe['idEmploye']; ?>">  

                                    <input type="submit" class="btn-check" name="view_bulletin" id="btnradio_<?php echo $employe['idEmploye']; ?>" autocomplete="off">
                                    <label role="button" class="badge badge-opacity-info" for="btnradio_<?php echo $employe['idEmploye']; ?>" title="Afficher"><i class="mdi mdi-eye"></i></label>

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
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include('partials/_footer.html'); ?>
      </div><!-- main-panel ends -->
    </div><!-- page-body-wrapper ends -->
  </div><!-- container-scroller ends-->
  <!-- plugins:js -->
  <?php include ('partials/_plugins-js.html'); ?>
</body>
</html>