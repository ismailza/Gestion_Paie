<?php
require_once '../scripts/inc.php';
require_once '../scripts/connect.php';

$stmt = $pdo->prepare("SELECT * FROM heuressupp WHERE idEmploye = ?");
$stmt->execute([$_SESSION['auth']['idEmploye']]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo SITE_TITLE; ?></title>
  <link rel="shortcut icon" href="images/favicon.png">
  <!-- plugins:css -->
  <?php include('partials/_plugins-css.html'); ?>


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
                            <h4 class="card-title card-title-dash title">Liste des heures supplementaires </h4>
                          </div>

                        </div>
                        <div class="table-responsive  mt-1">
                          <table class="table select-table" id="table">
                            <thead>
                              <tr>
                                <th>Date </th>
                                <th>Status</th>
                                <th>Nombre des HS </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if (empty($result)) echo "<tr><td colspan=\"3\">Vous n'avez pas aucun heure supplémentaire</td></tr>"; ?>
                              <?php foreach ($result as $row) : ?>
                                <tr>
                                  <td><?php echo $row['dateTravail']; ?></td>
                                  <td>
                                    <?php
                                    $status = $row['status'];
                                    $statusColor = '';
                                    if ($status == 'Acceptée') {
                                      $statusColor = 'green';
                                    } elseif ($status == 'En cours') {
                                      $statusColor = 'orange';
                                    } elseif ($status == 'Refusée') {
                                      $statusColor = 'red';
                                    }
                                    ?>
                                    <span style="color: <?php echo $statusColor; ?>"><?php echo $status; ?></span>
                                  </td>
                                  <td><?php echo $row['nbHs']; ?></td>
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
  <?php include('partials/_plugins-js.html'); ?>
</body>

</html>