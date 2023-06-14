<?php
    require 'connect.php';
    $post_data = json_decode(file_get_contents('php://input'), true);
    $status = $post_data["status"];
    $date = $post_data["date"];
    if (isset($post_data["id"])) 
    {
        $id = $post_data["id"];
        $newstatus = $post_data["newstatus"];
        $stm = $pdo->prepare("UPDATE absence SET status = ? WHERE idAbsence = ?");
        $stm->execute([$newstatus, $id]);
    }
    $stm = $pdo->prepare("SELECT * FROM employe E NATURAL JOIN (SELECT * FROM absence WHERE status = ?) A
                          ORDER BY A.dateAbsence");
    $stm->execute([$status]);
    $absences = $stm->fetchAll(PDO::FETCH_ASSOC);
    if ($status == "En cours") $color = "warning";
    elseif ($status == "Refusée") $color = "danger";
    else $color = "success";
?>

<?php foreach ($absences as $absence): ?>

<div class="col-lg-4">
  <div class="card card-margin">
    <div class="card-header no-border" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $absence['idAbsence']; ?>">
      <h5 class="card-title"><?php echo $absence['nom']." ".$absence['prenom']; ?></h5>
    </div>
    <div class="card-body pt-0">
      <div class="widget-49">
        <div class="widget-49-title-wrapper" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $absence['idAbsence']; ?>">
          <div class="widget-49-date-primary">
            <img class="rounded-circle m-5" width="64px" height="64px" src="images/profile/<?php echo $absence['image']; ?>" alt="profile image">
          </div>
          <div class="widget-49-meeting-info">
            <span class="widget-49-pro-title text-<?php echo $color; ?>"><?php echo $absence['status']; ?></span>
            <span class="widget-49-meeting-time"><?php echo $absence['dateAbsence']; ?></span>
          </div>
        </div>
        <ul class="widget-49-meeting-points" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $absence['idAbsence']; ?>">
          <li class="widget-49-meeting-item"><span><?php echo $absence['justification']; ?></span></li>
        </ul>
        <div class="widget-49-meeting-action">
          <!-- <a href="" class="btn btn-sm btn-flash-border-primary">View All</a> -->
          <?php if ($status == "En cours"): ?>
          <button class="btn btn-sm btn-outline-success" onclick="send_ajax_request({'status':'<?php echo $status; ?>','date':'<?php echo $date; ?>','id':'<?php echo $absence['idAbsence']; ?>','newstatus':'Acceptée'}, '../scripts/absence.inc.php', 'status')">Accepter</button>
          <button class="btn btn-sm btn-outline-danger" onclick="send_ajax_request({'status':'<?php echo $status; ?>','date':'<?php echo $date; ?>','id':'<?php echo $absence['idAbsence']; ?>','newstatus':'Refusée'}, '../scripts/absence.inc.php', 'status')">Refuser</button>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop<?php echo $absence['idAbsence']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <img class="rounded-circle" width="40px" height="40px" src="images/profile/<?php echo $absence['image']; ?>" alt="profile image">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" style="margin-left: 5px;">  <?php echo $absence['nom']." ".$absence['prenom']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span class="text-left font-italic"><?php echo $absence['dateAbsence']; ?></span> <br>
        <h5 class="font-bold">Nombre de jours : <?php echo $absence['nbJours']; ?></h5>
        <?php echo $absence['justification']; ?>
        <?php echo $absence['pieceJoint']; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info">OK</button>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>
    