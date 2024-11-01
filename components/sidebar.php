    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile border-bottom" style="background-color: #d9d9d9;">
                <a href="<?php echo $base_static; ?>" class="nav-link flex-column">
                    <div class="nav-profile-image">
                        <img src="<?php echo $base_static; ?>assets/images/logo.png" alt="profile">
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $base_static; ?>home/cursos/">
                    <i class="fa fa-book menu-icon"></i>
                    <span class="menu-title">Grados</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $base_static; ?>home/materias/">
                    <i class="fa fa-briefcase menu-icon"></i>
                    <span class="menu-title">Materias</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $base_static; ?>home/profesores/">
                    <i class="fa fa-users menu-icon"></i>
                    <span class="menu-title">Profesores</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $base_static; ?>home/estudiantes/">
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
                        <li class="nav-item"> <a class="nav-link" href="<?php echo $base_static; ?>home/icons/pagina1.php">Font Awesome</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?php echo $base_static; ?>home/icons/pagina2.php">Material Design Icons</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>