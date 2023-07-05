<?php
  require_once '../CONFIG.php';
  require_once '../scripts/inc.php';
  require_once '../scripts/rp.inc.php';
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
  <link rel="stylesheet" href="css/card.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
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
                <div class="title">Les demandes d'avance</div>   
                <?php require_once 'alerts.php'; ?>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                  <input type="radio" class="btn-check" name="status" id="btnradio1" value="En cours" autocomplete="off" onclick="send_ajax_request({'status':this.value,'date':$('#datepicker').val()}, '../scripts/avance.inc.php', 'status')" checked>
                  <label class="btn btn-outline-warning" for="btnradio1">En cours</label>

                  <input type="radio" class="btn-check" name="status" id="btnradio2" value="Refusé" autocomplete="off" onclick="send_ajax_request({'status':this.value,'date':$('#datepicker').val()}, '../scripts/avance.inc.php', 'status')">
                  <label class="btn btn-outline-danger" for="btnradio2">Refusés</label>

                  <input type="radio" class="btn-check" name="status" id="btnradio3" value="Accepté" autocomplete="off" onclick="send_ajax_request({'status':this.value,'date':$('#datepicker').val()}, '../scripts/avance.inc.php', 'status')">
                  <label class="btn btn-outline-success" for="btnradio3">Acceptés</label>
                </div>
                <div class="d-inline float-end">
                  <input type="text" class="form-control" name="datepicker" id="datepicker" placeholder="Filtre" onchange="send_ajax_request({'status':$('input[name=\'status\']:checked').val(),'date':this.value}, '../scripts/avance.inc.php', 'status')">
                </div>
                <div class="row" id="status">
                
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    var dp = $("#datepicker").datepicker({
        format: "mm-yyyy",
        startView: "months", 
        minViewMode: "months"
    });

    send_ajax_request({'status':'En cours','date':$('#datepicker').val()}, '../scripts/avance.inc.php', 'status');
  </script>
</body>
</html>