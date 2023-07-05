<!-- Reclamation -->
<div class="modal fade" id="reclamationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header p-3">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Votre réclamation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="../scripts/employe.php" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
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
              <input type="file" class="form-control" id="nom" name="pieceJoint" placeholder="Piece joint" required>
              <div class="invalid-feedback">
                * Champ obligatoire
              </div>
            </div>
            <div class="col-md-12">
              <label for="descriptif" class="form-label">Description</label>
              <textarea class="form-control" name="contenu" id="descriptif" rows="10" required></textarea>
              <div class="invalid-feedback">
                * Champ obligatoire
              </div>
            </div>   
          </div>
        </div>
        <div class="modal-footer m-0">
          <input type="button" value="Annuler" class="action back btn btn-sm btn-secondary" data-bs-dismiss="modal">
          <input type="submit" name="reclamation" value="Envoyer" class="action next btn btn-sm btn-info float-end">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Conge -->
<div class="modal fade" id="congeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header p-3">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Demande de congé</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="../scripts/employe.php" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
        <div class="modal-body m-0 p-4">
          <div class="mt-3 row">
            <div class="col-md-12">
              <label for="type" class="form-label">Type de conge</label>
              <input class="form-control" type="text" name="typeConge" id="type" required>
              <div class="invalid-feedback">
                * Champ obligatoire
              </div>
            </div>
            <div class="col-md-6">
              <label for="dateD" class="form-label">Date debut</label>
              <input type="date" class="form-control" id="dateD" name="dateDebut" placeholder="Date debut" required>
              <div class="invalid-feedback">
                * Champ obligatoire
              </div>
            </div>
            <div class="col-md-6">
              <label for="dateF" class="form-label">Date fin</label>
              <input type="date" class="form-control" id="dateF" name="dateFin" placeholder="Date fin" required>
              <div class="invalid-feedback">
                * Champ obligatoire
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer m-0">
          <input type="button" value="Annuler" class="action back btn btn-sm btn-secondary" data-bs-dismiss="modal">
          <input type="submit" name="conge" value="Envoyer" class="action next btn btn-sm btn-info float-end">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Heures Supp -->
<div class="modal fade" id="heuresuppModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header p-3">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Déclarer heures supplémentaire</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="../scripts/employe.php" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
        <div class="modal-body m-0 p-4">
          <div class="col-md-12">
            <label for="adresse" class="form-label">Date</label>
            <input type="date" class="form-control" id="nb" name="dateTravail" placeholder="Date" required>
            <div class="invalid-feedback">
              * Champ obligatoire
            </div>
          </div>
          <div class="col-md-12">
            <label for="adresse" class="form-label">Nombre des heures supplementaires</label>
            <input type="number" min="1" max="24" class="form-control" id="nb" name="nbHs" placeholder=" Nombre des heures supplementaires" required>
            <div class="invalid-feedback">
              * Champ obligatoire
            </div>
          </div>  
        </div>
        <div class="modal-footer p-3">
          <input type="button" value="Annuler" class="action back btn btn-sm btn-secondary" data-bs-dismiss="modal">
          <input type="submit" name="heuressupp" value="Envoyer" class="action next btn btn-sm btn-info float-end">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Avance -->
<div class="modal fade" id="avanceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header p-3">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Demande d'avance</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="../scripts/employe.php" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
        <div class="modal-body m-0 p-4">
          <div class="mt-3">
            <div class="col-md-6 input-group mb-3">
              <span class="input-group-text">Avance</span>
              <input type="number" class="form-control" min="1000" max="10000" id="nb" name="montant" placeholder="Montant d'Avance" required>
              <span class="input-group-text">DH</span>
              <div class="invalid-feedback">
                * Champ obligatoire
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer p-3">
          <input type="button" value="Annuler" class="action back btn btn-sm btn-secondary" data-bs-dismiss="modal">
          <input type="submit" name="avance" value="Envoyer" class="action next btn btn-sm btn-info float-end">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Rubrique -->
<div class="modal fade" id="rubriqueModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header p-3">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter une rubrique</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="../scripts/entreprise.php" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
        <div class="modal-body m-0 p-4">
          <div class="mt-3 row">
            <div class="col-md-6">
              <label for="rubrique" class="form-label">Nom de rubrique</label>
              <input class="form-control" type="text" name="nomRubrique" id="rubrique" placeholder="Nom de la rubrique" required>
              <div class="invalid-feedback">
                * Champ obligatoire
              </div>
            </div>
            <div class="col-md-6">
              <label for="short" class="form-label">Short name</label>
              <input class="form-control" type="text" name="shortName" id="short" placeholder="Short name" required>
              <div class="invalid-feedback">
                * Champ obligatoire
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer p-3">
          <input type="button" value="Annuler" class="action back btn btn-sm btn-secondary" data-bs-dismiss="modal">
          <input type="submit" name="rubrique" value="Ajouter" class="action next btn btn-sm btn-info float-end">
        </div>
      </form>
    </div>
  </div>
</div>
