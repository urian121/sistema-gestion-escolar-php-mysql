<nav
  class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button
      class="navbar-toggler navbar-toggler align-self-center"
      type="button"
      data-toggle="minimize">
      <span class="mdi mdi-chevron-double-left"></span>
    </button>
    <div
      class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo-mini" href="<?php echo BASE_STATIC; ?>">
        <img src="<?php echo BASE_STATIC; ?>assets/images/logo-mini.svg" alt="logo" />
      </a>
    </div>

    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown d-none d-md-block">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-text">
            <i class="fa fa-user-circle-o"></i>
            Urian Viera
          </div>
        </a>
        <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="#">
            <i class="fa fa-gear me-3"></i> Mi Perfil </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <i class="fa fa-power-off me-3"></i> Salir </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
    <button
      class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
      type="button"
      data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>