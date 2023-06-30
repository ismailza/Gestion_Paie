<?php
  require_once '../scripts/inc.php';
  require_once '../scripts/connect.php';
  $req = "SELECT * FROM absence ";
  $stmt = $pdo->prepare($req);
  $stmt->execute();
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-*********" crossorigin="anonymous" />
  <!-- plugins:css -->
  <?php include('partials/_plugins-css.html'); ?>
</head>
<style>
  .custom-button {
    background-color: green;
    color: white;
    /* Autres styles personnalisés */
  }
</style>
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
                            <h4 class="card-title card-title-dash title">Liste des absences</h4>
                          </div>
                          
                        </div>
                        <div class="table-responsive  mt-1">
                          <table class="table select-table" id="table">
                            <thead>
                              <tr>
                                <th>Date d'absence</th> 
                                <th>Justification</th>
                                <th>Statut</th>
                                <th>Piece joint</th>  
                              </tr>
                            </thead>
                            <tbody>
  <?php foreach ($result as $row): ?>
    <tr>
      <td><?php echo $row['dateAbsence']; ?></td>
      <td><?php echo $row['justification']; ?></td>
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
  <?php if (!empty($row['pieceJoint'])): ?>
    <a href="#" class="view-piece" data-src="files/absences/<?php echo $row['pieceJoint']; ?>">
      <i class="fas fa-eye"></i> <?php echo $row['pieceJoint']; ?>
    </a>
  <?php else: ?>
    Aucune pièce jointe
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
  <?php include ('partials/_plugins-js.html'); ?>

  <div class="modal fade" id="pieceModal" tabindex="-1" role="dialog" aria-labelledby="pieceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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