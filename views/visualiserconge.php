<?php
require_once '../scripts/inc.php';
require_once '../scripts/connect.php';

if (isset($_GET['idConge'])) {
  $avanceId = $_GET['idConge'];

  try {
    // Delete the entry from the "avance" table
    $deleteAvance = $pdo->prepare("DELETE FROM Conge WHERE idConge = :idConge");
    $deleteAvance->bindParam(':idConge', $avanceId, PDO::PARAM_INT);
    $deleteAvance->execute();

    // Set a success message
    $_SESSION['success'] = 'Avance canceled successfully.';

    // Redirect back to the current page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  } catch (PDOException $e) {
    // Handle any errors
    $_SESSION['error'] = 'Failed to cancel avance: ' . $e->getMessage();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  }
}
if (isset($_POST['update'])) {
  // Get the submitted data
  $avanceId = $_POST['avanceId'];
  $newConge = $_POST['newConge'];
  $newCongeD = date_format(date_create($_POST['newCongeD']), 'Y-m-d');
  $newCongeF = date_format(date_create($_POST['newCongeF']), 'Y-m-d');

  try {
    // Update the avance in the database
    $updateAvance = $pdo->prepare("UPDATE conge SET typeConge = :typeConge, dateDebut = :dateDebut, dateFin = :dateFin WHERE idConge = :idConge");
    $updateAvance->bindParam(':typeConge', $newConge, PDO::PARAM_STR);
    $updateAvance->bindParam(':dateDebut', $newCongeD, PDO::PARAM_STR);
    $updateAvance->bindParam(':dateFin', $newCongeF, PDO::PARAM_STR);
    $updateAvance->bindParam(':idConge', $avanceId, PDO::PARAM_INT);
    $updateAvance->execute();

    // Set a success message
    $_SESSION['success'] = 'Avance modified successfully.';

    // Redirect back to the current page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  } catch (PDOException $e) {
    // Handle any errors
    $_SESSION['error'] = 'Failed to modify avance: ' . $e->getMessage();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  }
}



// Retrieve the updated list of advances
$stmt = $pdo->prepare("SELECT * FROM conge WHERE idEmploye = ?");
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
</head>
<style>
  body {
    font-family: Arial, sans-serif;
    /* Change the font-family to your desired font */
  }

  .custom-button {
    background-color: #5C62D6;
    color: white;
    /* Other custom styles */
  }
</style>

<body>
  <!-- Modal -->
  <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="modal-header">
            <h5 class="modal-title" id="modifyModalLabel">Modifier votre conge </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="avanceId" value="">
            <input type="text" class="form-control" name="newConge" placeholder="Entrer le  nauveau  type du conge" required>
            <input type="date" class="form-control" name="newCongeD" placeholder="Entrer la date de  debut" required>
            <input type="date" class="form-control" name="newCongeF" placeholder="Entrer la date de fin " required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Annuler</button>
            <button type="submit" name="update" class="btn btn-primary">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function openWindow(avanceId) {
      // Set the avanceId value in the modal form
      document.querySelector("#modifyModal input[name='avanceId']").value = avanceId;
      // Show the modal
      $('#modifyModal').modal('show');
    }
    function closeModal() {
      $('#modifyModal').modal('hide');
    }
  </script>

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
                              <h4 class="card-title card-title-dash title">Liste des congés</h4>
                            </div>

                          </div>
                          <div class="table-responsive  mt-1">
                            <table class="table select-table" id="table">
                              <thead>
                                <tr>
                                  <th>Type conge</th>
                                  <th>Date debut </th>
                                  <th>Date fin</th>
                                  <th>Status</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($result as $row) : ?>
                                  <tr>
                                    <td><?php echo $row['typeConge']; ?></td>
                                    <td> <?php echo $row['dateDebut']; ?></td>
                                    <td><?php echo $row['dateFin']; ?></td>
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
                                    <td align="right">
                                      <?php if ($row['status'] == 'En cours') : ?>
                                        <input type="button" class="btn-check" id="btnradio<?php echo $employe['idConge']; ?>" autocomplete="off" checked>
                                        <label class="badge badge-opacity-warning" role="button" onclick="openWindow(<?php echo $row['idConge']; ?>)" for="btnradio<?php echo $employe['idConge']; ?>" title="Modifier"><i class="mdi mdi-lead-pencil"></i></label>

                                        <input type="button" class="btn-check" name="delete" id="btnradio_<?php echo $employe['idConge']; ?>" autocomplete="off">
                                        <label class="badge badge-opacity-danger" role="button" for="btnradio_<?php echo $employe['idConge']; ?>" title="Supprimer" onclick="document.location.href=\" ?idConge=<?php echo $row['idConge']; ?>\""><i class="mdi mdi-delete"></i></label>
                                      <?php endif; ?>
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
    <?php include('partials/_plugins-js.html'); ?>
  </body>

</html>