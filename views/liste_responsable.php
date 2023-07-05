<?php
require_once '../scripts/connect.php';
require_once '../scripts/inc_admin.php';

$stm = $pdo->prepare("SELECT * FROM employe NATURAL JOIN contrat WHERE poste = 'Responsable Ressources Humaines' OR poste = 'Responsable Paie'");
$stm->execute();
$users = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <tile>JI2A</title>
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- plugins:css -->
    <?php include('partials/_plugins-css.html'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <style>
      @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");
      body {
        background: #f5f5f5;
        font-family: "Roboto", sans-serif;
      }
      .shadow {
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06) !important;
      }
      .main-content {
        padding-top: 100px;
        padding-bottom: 100px;
      }
      .banner {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 125px;
        background-image: url("./images/profile/banner.jpg");
        background-position: center;
        background-size: cover;
      }
      .img-circle {
        height: 150px;
        width: 150px;
        border-radius: 150px;
        border: 3px solid #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        z-index: 1;
      }
      .social-links a {
        transition: all 0.2s;
      }
      .social-links a img {
        height: 30px;
      }
      .social-links a:hover {
        transform: translateY(-3px);
      }
    </style>
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
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="home-tab">
            <div class="title">Profils des Responsables</div>
            <br> <br>
            <div class="row">
              <?php foreach ($users as $user) : ?>
                <div class="col-sm-8 offset-sm-2 col-md-5 offset-md-1">
                  <div class="profile-card card rounded-lg shadow p-4 p-xl-5 mb-4 text-center position-relative overflow-hidden">
                    <div class="banner"></div>
                    <img src="./images/profile/user1.jpg" alt="" class="img-circle mx-auto mb-3">
                    <h3 class="mb-4"><?php echo $user['nom'] . " " . $user['prenom'] ?></h3>
                    <b class="text-primary"><?php echo $user['poste'] ?></b>
                    <hr>
                    <div class="text-left mb-4">
                      <p class="mb-2"><i class="fa fa-envelope mr-2"></i><?php echo $user['email'] ?></p>
                      <p class="mb-2"><i class="fa fa-phone mr-2"></i><?php echo $user['phone'] ?></p>
                      <p class="mb-2"><i class="fa fa-map-marker-alt mr-2"></i><?php echo $user['ville'] ?></p>
                    </div>
                    <div class="social-links d-flex justify-content-center">
                      <a class="btn btn-primary" href="view_responsable?id=<?php echo $user['idEmploye'] ?>">voir</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <?php include('partials/_footer.html'); ?>
      </div>
    </div>
  </div><!-- container-scroller ends-->
  <!-- plugins:js -->
  <?php include('partials/_plugins-js.html'); ?>
</body>

</html>