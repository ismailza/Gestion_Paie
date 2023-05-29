<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

      <li class="nav-item">
        <a class="nav-link" href="home.php">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item nav-category">Profile</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#profile" aria-expanded="false" aria-controls="profile">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">Profile</span>
          <i class="menu-arrow"></i> 
        </a>
        <div class="collapse" id="profile">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="view_profile.php">Mon profile</a></li>
            <li class="nav-item"> <a class="nav-link" href="reset_password.php">Modifier mot de passe</a></li>
          </ul>
        </div>
      </li>
      <?php // if ($_SESSION['role'] == "Responsable RH"): ?>
      <li class="nav-item nav-category">Gestion</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#entreprise" aria-expanded="false" aria-controls="entreprise">
          <i class="menu-icon mdi mdi-domain"></i>
          <span class="menu-title">Entreprises</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="entreprise">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="view_entreprises.php">Afficher entreprises</a></li>
            <li class="nav-item"><a class="nav-link" href="add_entreprise.php">Ajouter entreprise</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#employe" aria-expanded="false" aria-controls="employe">
          <i class="menu-icon mdi mdi-account-group-outline"></i>
          <span class="menu-title">Employés</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="employe">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="view_employes.php">Afficher employés</a></li>
            <li class="nav-item"><a class="nav-link" href="add_employe.php">Ajouter employé</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#rubrique" aria-expanded="false" aria-controls="rubrique">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Rubriques</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="rubrique">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="">Afficher Rubriques</a></li>
            <li class="nav-item"><a class="nav-link" href="">Ajouter Rubriques</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#regle" aria-expanded="false" aria-controls="regle">
          <i class="menu-icon mdi mdi-reflect-vertical"></i>
          <span class="menu-title">Règles de paie</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="regle">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="">Afficher Règles de paie</a></li>
            <li class="nav-item"><a class="nav-link" href="">Ajouter Règle de paie</a></li>
          </ul>
        </div>
      </li>
      <?php //endif; ?>
      <li class="nav-item nav-category">Notifications</li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Heures Supplimentaires</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Abscences</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Congés</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Reclamations</span>
        </a>
      </li>

  </ul>
</nav>