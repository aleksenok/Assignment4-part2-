<?php
$cakeDescription = 'Store';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('nucleo.css') ?>
    <?= $this->Html->css('all.min.css') ?>
    <?= $this->Html->css('argon.css?v=1.0.0') ?>
    <?= $this->Html->css('app.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <?= $this->fetch('css') ?>
</head>
<body>
<?=$this->Flash->render()?>
    <!-- Sidenav -->
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-aliceblue" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="/store/">
                Cake-Store
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/store/products">
              <i class="fab fa-product-hunt text-green"></i> Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse"
              data-target="#usersAccordion" aria-expanded="false"
              aria-controls="usersAccordion">
            <i class="fas fa-users text-blue"></i> My Account
            </a>
            <div class="collapse" id="usersAccordion">
              <div class="card card-body">
                <a class="nav-link" href="/store/users/view">
                  <i class="fas fa-list text-orange"></i> Summary
                </a>
              </div>
              <div class="card card-body">
                <a class="nav-link" href="/store/purchases">
                  <i class="fas fa-coins text-blue"></i> Purchases
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse"
              data-target="#cartAccordion" aria-expanded="false"
              aria-controls="cartAccordion">
            <i class="fas fa-shopping-cart text-red"></i> Cart
            </a>
            <div class="collapse" id="cartAccordion">
              <div class="card card-body">
                <a class="nav-link" href="/store/products/cart">
                  <i class="fas fa-list text-orange"></i> View
                </a>
              </div>
              <div class="card card-body">
                <a class="nav-link" href="/store/products/checkout">
                  <i class="fas fa-coins text-green"></i> Checkout
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/store/users/logout">
              <i class="ni ni-spaceship"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <div class="container-fluid mt-3">
      <?= $this->fetch('content') ?>
      <!-- Footer -->
      
    </div>
  </div>
  
</div>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.bundle.min.js') ?>
    <?= $this->Html->script('Chart.min.js') ?>
    <?= $this->Html->script('Chart.extension.js') ?>
    <?= $this->Html->script('argon.js') ?>
    <script>
      window.onload = setTimeout(function() {
        $("#message").fadeOut("slow");
      }, 2000);
    </script>
    <?= $this->fetch('script') ?>
</body>
</html>