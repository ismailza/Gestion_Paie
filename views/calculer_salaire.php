<?php
  require_once '../CONFIG.php';
  require_once '../scripts/inc.php';
  require_once '../scripts/rp.inc.php';
  require_once '../scripts/employe.inc.php';

  if (!isset($_GET['id']) || empty($_GET['id']))
  {
    header("location: valider_paie");
    exit;
  }
  $emp = getEmploye($_GET['id']);
  $bulletin = valider_paie_employe($_GET['id'], date('m'));
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
                <?php if (isset($emp)): ?>
                <div class="card" id="bulletin">
                  <div class="card-header">
                    <h4 class="text-center">Bulletin de paie</h4>
                    <p class="text-end">Date : <?php echo date('d/m/y h:m'); ?></p>
                    <div class="panel">
                      <div class="panel-body bio-graph-info">
                          <table class="table">
                            <tr>
                              <td>Nom</td>
                              <td><?php echo $emp['nom']." ".$emp['prenom']; ?></td>
                            </tr>
                            <tr>
                              <td>CIN</td>
                              <td><?php echo $emp['cin']; ?></td>
                            </tr>
                            <tr>
                              <td>Date Naissance</td>
                              <td><?php echo $emp['dateNaiss']; ?></td>
                            </tr>
                            <tr>
                              <td>adresse</td>
                              <td><?php echo $emp['adresse']; ?></td>
                            </tr>
                            <tr>
                              <td>Ville</td>
                              <td><?php echo $emp['ville']; ?></td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td><?php echo $emp['email']; ?></td>
                            </tr>
                            <tr>
                              <td>Phone</td>
                              <td><?php echo $emp['phone']; ?></td>
                            </tr>
                          </table>
                      </div>
                    </div>
                  </div>
                  <div class="content">
                    <table class="table">
                      <tbody>
                        <?php foreach ($bulletin as $key => $value): ?>
                        <tr>
                          <td><?php echo $key; ?></td>
                          <td><?php echo number_format($value,2,'.',' '); ?> DH</td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer" id="ignorePDF">
                    <button type="button" class="btn btn-outline-info" onclick="generate_pdf()">Télecharger</button>
                  </div>
                </div>
                <?php endif; ?>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
  <script>
    function generate_pdf() {
      var doc = new jsPDF();
      var elementHandler = {
        '#ignorePDF': function (element, renderer) {
          return true;
        }
      };
      var source = window.document.getElementById("bulletin");
      doc.fromHTML(source, 15, 15, {
        'width': 300,
        'elementHandlers': elementHandler
      });
      doc.save('bulletin.pdf');
    }
  </script>
</body>
</html>