<?php
    $this->layout = false;
?>

<?php
$this->layout = false;
?>
<!DOCTYPE html>
<html>

<head>
<?=$this->Html->charset()?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Store: Register
    </title>
    <?=$this->Html->meta('icon')?>
    <?=$this->fetch('meta')?>

    <?=$this->Html->css('bootstrap.min.css')?>
    <?=$this->Html->css('nucleo.css')?>
    <?=$this->Html->css('all.min.css')?>
    <?=$this->Html->css('argon.css?v=1.0.0')?>
    <?=$this->Html->css('app.css')?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <?=$this->fetch('css')?>
</head>

<body class="">
  <div class="main-content" style="background-color: #5e72e4; height: auto">
    <!-- Header -->
    <div class="header mt--3 py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-4">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Store API Customer</h1>
              <p class="text-white">Your one stop solution for all material things.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-7 col-md-7">
          <div class="card shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
            <?=$this->Form->create(null, [
              'class' => 'text-left text-dark',
              'role' => 'form'
            ])?>
            <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <?php
echo $this->Form->control("name", array("class" => "form-control",
    "placeholder" => "Enter your name here...", "label" => false, "required"));
?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <?php
echo $this->Form->control("email", array("type" => "email", "class" => "form-control",
    "placeholder" => "Enter your email here...", "label" => false, "required"));
?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <?php
echo $this->Form->control("Customer.shipment_address", array("class" => "form-control",
    "placeholder" => "Enter your shipping address here...", "label" => false, "required"));
?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <?php
echo $this->Form->control("Customer.payment_method_id", array("options" => $paymentMethods, "class" => "form-control", "type" => "select", "label" => false, "required"));
?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <?php
echo $this->Form->control("password", array("type" => "password", "class" => "form-control",
    "placeholder" => "Enter your password here...", "label" => false, "required"));
?>
                  </div>
                </div>
                <div class="text-center">
                <?=$this->Form->button(__('Register'), [
    'class' => 'btn btn-primary my-4 col-md-4',
])?>
                        <?=$this->Form->end()?>
                </div>
            </div>
          </div>
          <div class="row mt-3">
          <div class="col-6">
                <a href="/store/users/login" class="text-light">
                  <small>Sign in</small>
                </a>
              </div>
              <div class="col-6 text-right">
                <a href="/store/users/add" class="text-light">
                  <small>Create new account</small>
                </a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <?=$this->Flash->render()?>
  <?=$this->Html->script('jquery.min.js')?>
  <?=$this->Html->script('bootstrap.bundle.min.js')?>
  <?=$this->Html->script('argon.js')?>
  <script>
            window.onload = setTimeout(function() {
                $("#message").fadeOut("slow");
            }, 3000);
        </script>
</body>

</html>