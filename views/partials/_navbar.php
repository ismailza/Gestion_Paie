<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
    </div>
    <div>
      <a class="navbar-brand brand-logo" href="home.php">
        <img src="images/logo.svg" alt="logo" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="home.php">
        <img src="images/logo.svg" alt="logo" />
      </a>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-top"> 
    <ul class="navbar-nav">
      <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
        <h1 class="welcome-text">Bonjour, <span class="text-black fw-bold"><?php echo $_SESSION['auth']['prenom']." ".$_SESSION['auth']['nom']; ?></span></h1>
        <h3 class="welcome-sub-text"><?php echo $_SESSION['auth']['poste']; ?></h3>
      </li>
    </ul>

    <ul class="navbar-nav ms-auto">

    <?php $notifications = array(); ?>
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
          <i class="icon-bell"></i>
          <span class="count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
          <span class="dropdown-item py-3 border-bottom">
            <p class="mb-0 font-weight-medium float-left">Vous avez <?php echo count($notifications); ?> nouvelles notifications</p>
            <a href="notifications.php" class="badge badge-pill badge-primary float-right">Voir tout</a>
          </span>
          
          <a class="dropdown-item preview-item py-3">
            <?php foreach ($notifications as $not): ?>
            <div class="preview-item-content">
              <h6 class="preview-subject fw-normal text-dark mb-1"><?php "Application Error"; ?></h6>
              <p class="fw-light small-text mb-0"><?php echo "Just now"; ?></p>
            </div>
            <?php endforeach; ?>
          </a>

        </div>
      </li>

      <li class="nav-item dropdown d-none d-lg-block user-dropdown">
        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <img class="img-xs rounded-circle" src="images/profile/<?php echo $_SESSION['auth']['image']; ?>" alt="Profile image"> </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img class="img-md img-xs rounded-circle" src="images/profile/<?php echo $_SESSION['auth']['image']; ?>" alt="Profile image">
            <p class="mb-1 mt-3 font-weight-semibold"><?php echo $_SESSION['auth']['prenom']." ".$_SESSION['auth']['nom'];; ?></p>
            <p class="fw-light text-muted mb-0"><?php echo $_SESSION['auth']['email']; ?></p>
          </div>
          <a href="view_profile.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i>Mon profile</a>
          <!-- <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a> -->
          <a href="../scripts/logout.inc.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>