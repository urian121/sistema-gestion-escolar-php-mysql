<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  include_once('settings/config.php');
  include_once(BASE_PATH_COMPONENTS . '/head.php'); ?>
</head>

<body>
  <?php
  include(BASE_PATH_COMPONENTS . '/loader.html');
  ?>

  <div class="container-scroller">
    <?php include(BASE_PATH_COMPONENTS . '/sidebar.php'); ?>
    <div class="container-fluid page-body-wrapper">
      <?php include(BASE_PATH_COMPONENTS . '/header.php'); ?>
      <div class="main-panel fade-in">
        <div class="content-wrapper pb-0 justify-content-center">
          <div class="row justify-content-center">
            <div class="col-sm-12 stretch-card grid-margin">
              <!--<div class="card border-0">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card" style="border: 1px solid red;">
                      <div class="card-body border">
                        /**
                        Contenido dinamico aqui
                        */
                        </div>
                      </div>
                    </div>
                  </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include(BASE_PATH_COMPONENTS . '/footer.php'); ?>

</body>

</html>