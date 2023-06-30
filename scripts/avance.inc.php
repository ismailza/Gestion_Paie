<?php
    require 'connect.php';
    $post_data = json_decode(file_get_contents('php://input'), true);
    $status = $post_data["status"];
    $date = $post_data["date"];
    if (isset($post_data["id"])) 
    {
        $id = $post_data["id"];
        $newstatus = $post_data["newstatus"];
        $stm = $pdo->prepare("UPDATE avance SET status = ? WHERE idAvance = ?");
        $stm->execute([$newstatus, $id]);
    }
    $stm = $pdo->prepare("SELECT * FROM employe E NATURAL JOIN (SELECT * FROM avance WHERE status = ?) A
                          ORDER BY A.dateDemande DESC");
    $stm->execute([$status]);
    $avances = $stm->fetchAll(PDO::FETCH_ASSOC);
    if ($status == "En cours") $color = "warning";
    elseif ($status == "Refusé") $color = "danger";
    else $color = "success";
?>

<?php foreach ($avances as $avance): ?>

<div class="col-lg-4">
  <div class="card card-margin">
    <div class="card-header no-border">
      <h5 class="card-title"><?php echo $avance['nom']." ".$avance['prenom']; ?></h5>
    </div>
    <div class="card-body pt-0">
      <div class="widget-49">
        <div class="widget-49-title-wrapper">
          <div class="widget-49-date-primary">
            <img class="rounded-circle m-5" width="64px" height="64px" src="images/profile/<?php echo $avance['image']; ?>" alt="profile image">
          </div>
          <div class="widget-49-meeting-info">
            <span class="widget-49-pro-title text-<?php echo $color; ?>"><?php echo $avance['status']; ?></span>
            <span class="widget-49-meeting-time"><?php echo $avance['dateDemande']; ?></span>
          </div>
        </div>
        <ul class="widget-49-meeting-points">
          <li class="widget-49-meeting-item"><span><?php echo $avance['avance']; ?></span></li>
        </ul>
        <div class="widget-49-meeting-action">
          <!-- <a href="" class="btn btn-sm btn-flash-border-primary">View All</a> -->
          <?php if ($status == "En cours"): ?>
          <button class="btn btn-sm btn-outline-success" onclick="send_ajax_request({'status':'<?php echo $status; ?>','date':'<?php echo $date; ?>','id':'<?php echo $avance['idAvance']; ?>','newstatus':'Accepté'}, '../scripts/avance.inc.php', 'status')">Accepter</button>
          <button class="btn btn-sm btn-outline-danger" onclick="send_ajax_request({'status':'<?php echo $status; ?>','date':'<?php echo $date; ?>','id':'<?php echo $avance['idAvance']; ?>','newstatus':'Refusé'}, '../scripts/avance.inc.php', 'status')">Refuser</button>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>
    