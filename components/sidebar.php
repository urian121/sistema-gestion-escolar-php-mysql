    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile border-bottom" style="background-color: #d9d9d9;">
                <a href="<?php echo BASE_STATIC; ?>" class="nav-link flex-column">
                    <div class="nav-profile-image">
                        <img src="<?php echo BASE_STATIC; ?>assets/images/logo.png" alt="profile">
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_STATIC; ?>home/grados/">
                    <i class="fa fa-book menu-icon"></i>
                    <span class="menu-title">Grados</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_STATIC; ?>home/materias/">
                    <i class="fa fa-briefcase menu-icon"></i>
                    <span class="menu-title">Materias</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_STATIC; ?>home/profesores/">
                    <i class="fa fa-users menu-icon"></i>
                    <span class="menu-title">Profesores</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_STATIC; ?>home/estudiantes/">
                    <i class="fa fa-address-card-o menu-icon"></i>
                    <span class="menu-title">Estudiantes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                    <i class="mdi mdi-contacts menu-icon"></i>
                    <span class="menu-title">Otro Modulo</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="icons">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_STATIC; ?>home/otro-modulo/pagina1.php">Pagina 1</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_STATIC; ?>home/otro-modulo/pagina2.php">Pagina 2</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>