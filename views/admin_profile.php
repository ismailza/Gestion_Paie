<?php
require_once '../scripts/connect.php';
require_once '../scripts/inc_admin.php';
$user = $_SESSION['admin'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $phone = $_POST['tel'];
    $email = $_POST['email'];
    $ville = $_POST['ville'];
    $date = $_POST['date'];
    $id = $_SESSION['admin']['idAdmin'];

    $sql = "UPDATE admin SET nom=:nom, prenom=:prenom, email=:email, phone=:phone, dateNaissance=:date, ville=:ville WHERE idAdmin=:id";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(':nom', $nom);
    $stm->bindParam(':prenom', $prenom);
    $stm->bindParam(':email', $email);
    $stm->bindParam(':phone', $phone);
    $stm->bindParam(':date', $date);
    $stm->bindParam(':ville', $ville);
    $stm->bindParam(':id', $id);
    $stm->execute();

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE idAdmin=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch();
    $_SESSION['admin'] = $user;
    $_SESSION['confiramation'] = "La modification est bien effectué";
}
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
    <style>
    .fh5co-loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(./loader.gif) center no-repeat #fff;
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
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                                <div class="container rounded bg-white mt-5 mb-5">
                                    <div class="row">
                                        <div class="col-md-3 border-right">
                                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                                <img class="rounded-circle mt-5" width="150px" src="images/profile/<?php echo $user['image'] ?>">
                                                <span class="font-weight-bold"><?php echo $user['nom'] . " " . $user['prenom']; ?></span>
                                                <span class="text-black-50"><?php echo $user['email']; ?></span>
                                                <span class="text-black-50">Administrateur</span>
                                            </div>
                                        </div>
                                        <div class="col-md-9 border-right">
                                            <div class="p-3 py-5">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="text-right">Informations personnelle</h4>
                                                </div>
                                                <?php if (isset($_SESSION['confiramation'])) : ?>
                                                <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert" align="center">
                                                    <b><?php echo $_SESSION['confiramation']; ?></b>
                                                </div>
                                                <?php unset($_SESSION['confiramation']);
                                                endif ?>
                                                <form action="" method="post">
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <label class="labels">Nom</label>
                                                            <input type="text" class="form-control" name="nom" value="<?php echo $user['nom']; ?>" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="labels">Prénom</label>
                                                            <input type="text" class="form-control" name="prenom" value="<?php echo $user['prenom']; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <label class="labels">Date de naissance</label>
                                                            <input type="text" class="form-control" name="date"value="<?php echo $user['dateNaissance']; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <label class="labels">Tel</label>
                                                            <input type="text" class="form-control" name="tel" value="<?php echo $user['phone']; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <label class="labels">Email</label>
                                                            <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <label class="labels">Ville</label>
                                                            <input type="text" class="form-control" name="ville" value="<?php echo $user['ville']; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2 text-center">
                                                        <button class="btn btn-info profile-button" id="btn1" type="button" onclick="Update()">Modifier</button>
                                                    </div>
                                                    <button class="btn btn-info profile-button" id="btn2" type="submit">Enregister</button>
                                                </form>
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
<script>
    var submit2 = document.querySelector('#btn1');
    var submit1 = document.querySelector('#btn2');
    submit1.style = "display:none";
    function Update() 
    {
        var inputs = document.getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) inputs[i].removeAttribute('disabled');
        submit1.style = "display:block";
        submit2.style = "display:none";
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
$(".fh5co-loader").fadeOut("slow");
</script>
</html>