<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $base_path = $_SERVER['DOCUMENT_ROOT'] . '/vac.tecno-escuela-gaitan/';
    $base_static = "http://localhost/sistema-gestion-escolar-php-mysql/";
} else {
    $base_path = '/ruta/absoluta/a/tu/proyecto/en/produccion/';
    $base_static = "http://localhost/sistema-gestion-escolar-php-mysql/";
}

function btn_volver($link_black, $base_static = "")
{
    echo '<a href="' . $base_static . $link_black . '" class="btn btn-inverse-dark mb-5">
            <i class="fa fa-mail-reply"></i> Volver
         </a>';
}

function btn_cancelar($link_black, $base_static = "")
{
    echo '<button type="button" class="btn btn-secondary" onclick="window.location.href=\'' . $base_static . $link_black . '\'">
                Cancelar
                <i class="fa fa-times ms-2" style="color: #4d4a4a;"></i>
            </button>';
}
