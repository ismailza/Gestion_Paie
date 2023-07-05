<?php if (isset($_SESSION['warning'])) : ?>
  <div class="alert alert-warning fade-out" role="alert">
    <?php
    echo $_SESSION['warning'];
    unset($_SESSION['warning']);
    ?>
  </div>
<?php endif;
if (isset($_SESSION['info'])) : ?>
  <div class="alert alert-info" role="alert">
    <?php
    echo $_SESSION['info'];
    unset($_SESSION['info']);
    ?>
  </div>
<?php endif; ?>
<?php if (isset($_SESSION['success'])) : ?>
  <div class="alert alert-success fade-out" role="alert">
    <?php
    echo $_SESSION['success'];
    unset($_SESSION['success']);
    ?>
  </div>
<?php endif;
if (isset($_SESSION['error'])) : ?>
  <div class="alert alert-danger fade-out" role="alert">
    <?php
    echo $_SESSION['error'];
    unset($_SESSION['error']);
    ?>
  </div>
<?php endif; ?>