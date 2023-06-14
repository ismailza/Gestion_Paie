<?php 
  require_once '../scripts/inc.php';
  require_once '../scripts/rh.inc.php';
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
                            <h4 class="card-title card-title-dash title">Liste des employés</h4>
                          </div>
                          <div>
                            <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" onclick="location.href='add_employe'"><i class="mdi mdi-account-plus"></i>Ajouter employe</button>
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
                                <th></th>
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
                                    <input type="submit" class="btn-check" name="update_id" id="btnradio<?php echo $employe['idEmploye']; ?>" autocomplete="off" checked>
                                    <label class="badge badge-opacity-warning" for="btnradio<?php echo $employe['idEmploye']; ?>" title="Modifier"><i class="mdi mdi-lead-pencil"></i></label>
                                    <input type="button" class="btn-check" name="delete" id="btnradio_<?php echo $employe['idEmploye']; ?>" autocomplete="off">
                                    <label class="badge badge-opacity-danger" for="btnradio_<?php echo $employe['idEmploye']; ?>" title="Supprimer" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $employe['idEmploye']; ?>"><i class="mdi mdi-delete"></i></label>
                                    
                                    <div class="modal" tabindex="-1" id="exampleModal<?php echo $employe['idEmploye']; ?>">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title">Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body d-flex">
                                            <p class="fs-6 text-center">Vous voulez vraiment suppremer cet employe?</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="delete" class="btn btn-danger btn-lg">Supprimer</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

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