<?php
    require 'connect.php';
    $post_data = json_decode(file_get_contents('php://input'), true);
    $status = $post_data["status"];
    $date = $post_data["date"];
    if (isset($post_data["id"])) 
    {
        $id = $post_data["id"];
        $newstatus = $post_data["newstatus"];
        $stm = $pdo->prepare("UPDATE heuressupp SET status = ? WHERE idHeuresSupp = ?");
        $stm->execute([$newstatus, $id]);
    }
    $stm = $pdo->prepare("SELECT * FROM employe E NATURAL JOIN (SELECT * FROM heuressupp WHERE status = ?) H
                          ORDER BY H.dateTravail DESC");
    $stm->execute([$status]);
    $heuresSupp = $stm->fetchAll(PDO::FETCH_ASSOC);
    if ($status == "En cours") $color = "warning";
    elseif ($status == "Refusée") $color = "danger";
    else $color = "success";
?>

<?php foreach ($heuresSupp as $hr): ?>

<div class="col-lg-4">
  <div class="card card-margin">
    <div class="card-header no-border">
      <h5 class="card-title"><?php echo $hr['nom']." ".$hr['prenom']; ?></h5>
    </div>
    <div class="card-body pt-0">
      <div class="widget-49">
        <div class="widget-49-title-wrapper">
          <div class="widget-49-date-primary">
            <img class="rounded-circle m-5" width="64px" height="64px" src="images/profile/<?php echo $hr['image']; ?>" alt="profile image">
          </div>
          <div class="widget-49-meeting-info">
            <span class="widget-49-pro-title text-<?php echo $color; ?>"><?php echo $hr['status']; ?></span>
            <span class="widget-49-meeting-time"><?php echo $hr['dateTravail']; ?></span>
          </div>
        </div>
        <ul class="widget-49-meeting-points">
          <li class="widget-49-meeting-item"><span><?php echo $hr['nbHs']; ?> heures</span></li>
        </ul>
        <div class="widget-49-meeting-action">
          <!-- <a href="" class="btn btn-sm btn-flash-border-primary">View All</a> -->
          <?php if ($status == "En cours"): ?>
          <button class="btn btn-sm btn-outline-success" onclick="send_ajax_request({'status':'<?php echo $status; ?>','date':'<?php echo $date; ?>','id':'<?php echo $hr['idHeuresSupp']; ?>','newstatus':'Acceptée'}, '../scripts/heuresSupp.inc.php', 'status')">Accepter</button>
          <button class="btn btn-sm btn-outline-danger" onclick="send_ajax_request({'status':'<?php echo $status; ?>','date':'<?php echo $date; ?>','id':'<?php echo $hr['idHeuresSupp']; ?>','newstatus':'Refusée'}, '../scripts/heuresSupp.inc.php', 'status')">Refuser</button>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>
    