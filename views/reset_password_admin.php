<?php
require_once '../CONFIG.php';
require_once '../scripts/connect.php';
require_once '../scripts/inc_admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $current_password = $_POST['current_password'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];
  $id = $_SESSION['admin']['idAdmin'];

  $stm = $pdo->prepare("SELECT password FROM admin WHERE idAdmin = :id");
  $stm->bindParam(':id', $id);
  $stm->execute();
  $result = $stm->fetch();

  if ($result[0] === $current_password) {
    if ($new_password === $confirm_password) {
      $sql = "UPDATE admin SET password=:new_password  WHERE idAdmin=:id";
      $stm = $pdo->prepare($sql);
      $stm->bindParam(':new_password', $new_password);
      $stm->bindParam(':id', $id);
      $stm->execute();
      $_SESSION['confirmation'] = "Mot de passe est bien modifé";
    } else $_SESSION['error'] = "Les mots de passe ne sont pas identique";
  } else $_SESSION['error'] = "Mot de passe est invalide";
}
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
  <div class="fh5co-loader"></div>
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
                <div class="card-container">
                  <div class="card-content">
                    <div class="avatar-flip">
                      <img class="img-circle" src="<?php echo "images/profile/" . $_SESSION['admin']['image']; ?>" height="150" width="150">
                    </div>
                    <h3><?php echo $_SESSION['admin']['nom'] . " " . $_SESSION['admin']['prenom']; ?>
                    </h3>
                    <h4><?php echo $_SESSION['admin']['email']; ?></h4>
                    <form action="reset_password_admin.php" method="post">

                      <div class="form-group">
                        <div class="home-tab">
                          <?php if (isset($_SESSION['confirmation'])) : ?>
                            <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert" align="center">
                              <b>
                                <?php echo $_SESSION['confirmation']; ?>
                              </b>
                            </div>
                          <?php unset($_SESSION['confirmation']);
                          endif ?>
                          <div class="home-tab">
                            <?php if (isset($_SESSION['error'])) : ?>
                              <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
                                <b>
                                  <?php echo $_SESSION['error']; ?>
                                </b>
                              </div>
                            <?php unset($_SESSION['error']);
                            endif ?>
                          </div>
                          <label for="current_password">Mot de passe actuel</label>
                          <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Mot de passe actuel" required>
                          <label for="new_password">Nouveau mot de passe</label>
                          <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Nouveau mot de passe" required>
                          <label for="confirm_password">Confirmer Mot de passe</label>
                          <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirmer le mot de passe" required>
                        </div>
                        <div class="form-group">
                          <input type="submit" name="reset" class="btn btn-warning" value="Modifier">
                          <input type="reset" class="btn btn-warning" value="Annuler"></a>
                        </div>
                    </form>
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
  <?php include('partials/_plugins-js.html'); ?>
</body>

</html>