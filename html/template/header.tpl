<header>
  <div class="container">
    <a href="/">
      <div class="site-logo">
        YuniMovie.
      </div>
    </a>
    <?php if ($T->location === 'index.php'): ?>
      <?php if($T->session_status !== 'login'): ?>
        <button type="button" class="btn btn-outline-primary login-button" data-toggle="modal" data-target="#loginModal">
          <i class="fas fa-user-circle"></i>
        </button>
      <?php else: ?>
        <button type="button" class="btn btn-outline-primary logout-button" data-toggle="modal" data-target="#logoutModal">
          Logout
        </button>
      <?php endif ?>
    <?php endif ?>
  </div>
</header>
<div style="height:70px"></div>
<?php
if ($T->session_status === 'login') {
  $T->render('logout.tpl');
} else {
  $T->render('login.tpl');
}
?>