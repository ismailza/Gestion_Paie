<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <?php if (isset($_SESSION['admin'])) : ?>
    <li class="nav-item">
      <a class="nav-link" href="admin_home">
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
          <li class="nav-item"> 
            <a class="nav-link" href="admin_profile">Mon profile</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link" href="reset_password_admin">Modifier mot de passe</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item nav-category">Gestion</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#rubrique" aria-expanded="false" aria-controls="rubrique">
        <i class="menu-icon mdi mdi-account-multiple-outline"></i>
        <span class="menu-title">Responsables</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="rubrique">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="liste_responsable">Profil des Responsables</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ajouter_responsable">Ajouter Responsable</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="modifier_enumuration">
        <i class="menu-icon mdi mdi-format-list-bulleted"></i>
        <span class="menu-title">Enumuration</span>
      </a>
    </li>
    <?php else: ?>
    <li class="nav-item">
      <a class="nav-link" href="home">
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
          <li class="nav-item"> 
            <a class="nav-link" href="view_profile">Mon profile</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link" href="reset_password">Modifier mot de passe</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="view_bulletins">
        <i class="mdi mdi-file-check-outline menu-icon"></i>
        <span class="menu-title">Mes bulletins de paie</span>
      </a>  
    </li>
    <?php if ($_SESSION['auth']['poste'] == "Responsable Ressources Humaines"): ?>
    <li class="nav-item nav-category">Gestion</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#entreprise" aria-expanded="false" aria-controls="entreprise">
        <i class="menu-icon mdi mdi-domain"></i>
        <span class="menu-title">Entreprises</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="entreprise">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="view_entreprises">Afficher entreprises</a></li>
          <li class="nav-item"><a class="nav-link" href="add_entreprise">Ajouter entreprise</a></li>
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
          <li class="nav-item"><a class="nav-link" href="view_employes">Afficher employés</a></li>
          <li class="nav-item"><a class="nav-link" href="add_employe">Ajouter employé</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#declaration" aria-expanded="false" aria-controls="declaration">
        <i class="menu-icon mdi mdi-check-decagram"></i>
        <span class="menu-title">Déclarations</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="declaration">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="view_heuresSupp">Heures Supplimentaires</a></li>
          <li class="nav-item"><a class="nav-link" href="view_absences">Absences</a></li>
          <li class="nav-item"><a class="nav-link" href="view_conge">Congés</a></li>
          <li class="nav-item"><a class="nav-link" href="view_reclamations">Reclamations</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="simuler_salaire">
        <i class="mdi mdi-power-socket-au menu-icon"></i>
        <span class="menu-title">Simuler salaire</span>
      </a>  
    </li>
    <?php elseif ($_SESSION['auth']['poste'] == "Responsable Paie") : ?>
    <li class="nav-item nav-category">Gestion</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#paie" aria-expanded="false" aria-controls="paie">
        <i class="mdi mdi-check menu-icon"></i>
        <span class="menu-title">Valider la paie</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="paie">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="valider_paie">Valider la paie</a></li>
          <li class="nav-item"><a class="nav-link" href="histo_bulletin_paie">Afficher bulletins</a></li>
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
          <li class="nav-item"><a class="nav-link" href="view_rubriques">Afficher Rubriques</a></li>
          <li class="nav-item"><a class="nav-link" href="#rubriqueModal" data-bs-toggle="modal" data-bs-target="#rubriqueModal">Ajouter Rubriques</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#regle" aria-expanded="false" aria-controls="regle">
        <i class="menu-icon mdi mdi-cogs"></i>
        <span class="menu-title">Règles de paie</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="regle">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="view_regle">Afficher Règles de paie</a></li>
          <li class="nav-item"><a class="nav-link" href="add_regle_paie">Ajouter Règle de paie</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#declaration" aria-expanded="false" aria-controls="declaration">
        <i class="menu-icon mdi mdi-check-decagram"></i>
        <span class="menu-title">Déclarations</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="declaration">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="view_demandes_avance">Avance de salaire</a></li>
          <li class="nav-item"><a class="nav-link" href="view_reclamations">Reclamations</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="simuler_salaire">
        <i class="mdi mdi-power-socket-au menu-icon"></i>
        <span class="menu-title">Simuler salaire</span>
      </a>  
    </li>
    <?php endif; ?>
    <li class="nav-item nav-category">Demandes</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#heuresSupp" aria-expanded="false" aria-controls="heuresSupp">
        <i class="menu-icon mdi mdi-card-text-outline"></i>
        <span class="menu-title">Heures Supplementaires</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="heuresSupp">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="heures_supp">Afficher mes heures supp</a></li>
          <li class="nav-item"><a class="nav-link" href="#heuresuppModal" data-bs-toggle="modal" data-bs-target="#heuresuppModal">Déclarer des heures supp</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#absence" aria-expanded="false" aria-controls="absence">
        <i class="menu-icon mdi mdi-file-cancel"></i>
        <span class="menu-title">Absence</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="absence">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="visualiserabscence">Mes absences</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#avance" aria-expanded="false" aria-controls="avance">
        <i class="menu-icon mdi mdi-cash-100"></i>
        <span class="menu-title">Avance</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="avance">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="afficheravance">Mes demandes avance</a></li>
          <li class="nav-item"><a class="nav-link" href="#avanceModal" data-bs-toggle="modal" data-bs-target="#avanceModal">Demander avance</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#conge" aria-expanded="false" aria-controls="conge">
        <i class="menu-icon mdi mdi-reflect-vertical"></i>
        <span class="menu-title">Congé</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="conge">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="visualiserconge">Afficher mes congés</a></li>
          <li class="nav-item"><a class="nav-link" href="#congeModal" data-bs-toggle="modal" data-bs-target="#congeModal">Demander congé</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#reclamation" aria-expanded="false" aria-controls="reclamation">
        <i class="menu-icon mdi mdi-file-replace-outline"></i>
        <span class="menu-title">Reclamation</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="reclamation">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="afficherreclamation">Afficher mes réclamations</a></li>
          <li class="nav-item"><a class="nav-link" href="#reclamationModal" data-bs-toggle="modal" data-bs-target="#reclamationModal">Effectuer une réclamation</a></li>
        </ul>
      </div>
    </li>
    <?php endif; ?>
  </ul>
</nav>
<?php require_once 'modals.php'; ?>