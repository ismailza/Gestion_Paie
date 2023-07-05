<?php
require_once '../scripts/inc.php';
require_once '../scripts/connect.php';

$stmt = $pdo->prepare("SELECT * FROM reclamation WHERE idEmploye = ?");
$stmt->execute([$_SESSION['auth']['idEmploye']]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['idReclamation'])) {
  $recId = $_GET['idReclamation'];

  try {
    // Delete the entry from the "reclamation" table
    $deleteReclamation = $pdo->prepare("DELETE FROM reclamation WHERE idReclamation = :idReclamation");
    $deleteReclamation->bindParam(':idReclamation', $recId, PDO::PARAM_INT);
    $deleteReclamation->execute();

    // Set a success message
    $_SESSION['success'] = 'Reclamation canceled successfully.';

    // Redirect back to the current page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  } catch (PDOException $e) {
    // Handle any errors
    $_SESSION['error'] = 'Failed to cancel reclamation: ' . $e->getMessage();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  }
}

if (isset($_POST['update'])) {
  // Get the submitted data
  $avanceId = $_POST['avanceId'];
  $newSujet = $_POST['sujet'];
  $newPiece = $_POST['pieceJoint'];
  $newContenu = $_POST['contenu'];
  $newResponsable = $_POST['responsable'];

  try {
    // Update the reclamation in the database
    $updateReclamation = $pdo->prepare("UPDATE reclamation SET sujet = :sujet, contenu = :contenu, responsable = :responsable, pieceJoint = :pieceJoint  WHERE idReclamation = :idReclamation");
    $updateReclamation->bindParam(':sujet', $newSujet, PDO::PARAM_STR);
    $updateReclamation->bindParam(':contenu', $newContenu, PDO::PARAM_STR);
    $updateReclamation->bindParam(':responsable', $newResponsable, PDO::PARAM_STR);
    $updateReclamation->bindParam(':pieceJoint', $newPiece, PDO::PARAM_STR);
    $updateReclamation->bindParam(':idReclamation', $avanceId, PDO::PARAM_INT);
    $updateReclamation->execute();

    // Set a success message
    $_SESSION['success'] = 'Reclamation modified successfully.';

    // Redirect back to the current page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  } catch (PDOException $e) {
    // Handle any errors
    $_SESSION['error'] = 'Failed to modify reclamation: ' . $e->getMessage();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo SITE_TITLE; ?></title>
  <link rel="shortcut icon" href="images/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-*********" crossorigin="anonymous" />

  <!-- plugins:css -->
  <?php include('partials/_plugins-css.html'); ?>
</head>

<style>
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
            <h5 class="modal-title" id="modifyModalLabel">Modifier votre reclamation </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="avanceId" value="">
            <div class="modal-body m-0 p-3">
              <div class="">
                <div class="col-md-12 form-group">
                  <label for="responsable" class="form-label">Responsable</label>
                  <select class="form-control" name="responsable" id="responsable" required>
                    <option value="1">Responsable Ressources Humaines</option>
                    <option value="2">Responsable de Paie</option>
                  </select>
                  <div class="invalid-feedback">
                    * Champ obligatoire
                  </div>
                </div>
                <div class="col-md-12 form-group">
                  <label for="nom" class="form-label">Sujet</label>
                  <input type="text" class="form-control" id="nom" name="sujet" placeholder="Sujet" required>
                  <div class="invalid-feedback">
                    * Champ obligatoire
                  </div>
                </div>
                <div class="col-md-12 form-group">
                  <label for="nom" class="form-label">Piece joint</label>
                  <input type="file" class="form-control" id="nom" name="pieceJoint" placeholder="Piec joint" required>
                  <div class="invalid-feedback">
                    * Champ obligatoire
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="descriptif" class="form-label">Description</label>
                  <textarea name="contenu" id="descr"></textarea>

                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Annuler</button>
            <button type="submit" name="update" class="btn btn-primary">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="pieceModal" tabindex="-1" role="dialog" aria-labelledby="pieceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pieceModalLabel">Pièce jointe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <iframe id="pieceIframe" src="" style="width: 100%; height: 500px;"></iframe>
        </div>
      </div>
    </div>
  </div>


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
                            <h4 class="card-title card-title-dash title">Liste des reclamations</h4>
                          </div>
                          <div></div>
                        </div>
                        <div class="table-responsive mt-1">
                          <table class="table " id="table">
                            <thead>
                              <tr>
                                <th>Sujet</th>
                                <th>Contenu</th>
                                <th>Statut</th>
                                <th style="width :50px">Piece Jointe</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($result as $row) : ?>
                                <tr>
                                  <td><?php echo $row['sujet']; ?></td>
                                  <td><?php echo $row['contenu']; ?></td>
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
                                  <td>
                                    <?php if (!empty($row['pieceJoint'])) : ?>
                                      <a href="#" class="view-piece" data-src="files/reclamations/<?php echo $row['pieceJoint']; ?>">
                                        <i class="fas fa-eye"></i> <?php echo $row['pieceJoint']; ?>
                                      </a>
                                    <?php else : ?>
                                      Aucune pièce jointe
                                    <?php endif; ?>
                                  </td>
                                  <td>
                                    <?php if ($row['status'] == 'En cours') : ?>
                                      <input type="button" class="btn-check" id="btnradio<?php echo $employe['idEmploye']; ?>" autocomplete="off" checked>
                                      <label class="badge badge-opacity-warning" role="button" onclick="openWindow(<?php echo $row['idReclamation']; ?>)" for="btnradio<?php echo $employe['idEmploye']; ?>" title="Modifier"><i class="mdi mdi-lead-pencil"></i></label>

                                      <input type="button" class="btn-check" name="delete" id="btnradio_<?php echo $employe['idEmploye']; ?>" autocomplete="off">
                                      <label class="badge badge-opacity-danger" role="button" for="btnradio_<?php echo $employe['idEmploye']; ?>" title="Supprimer" onclick="document.location.href=\" ?idReclamation=<?php echo $row['idReclamation']; ?>\""><i class="mdi mdi-delete"></i></label>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function openWindow(avanceId, descr) {
    // Set the avanceId value in the modal form
    document.querySelector("#modifyModal input[name='avanceId']").value = avanceId;


    // Show the modal
    $('#modifyModal').modal('show');
  }

  function closeModal() {
    $('#modifyModal').modal('hide');
  }
  $(document).ready(function() {
    $('.view-piece').click(function(e) {
      e.preventDefault();
      var pieceUrl = $(this).data('src');
      $('#pieceIframe').attr('src', pieceUrl);
      $('#pieceModal').modal('show');
    });
  });
</script>

</html>