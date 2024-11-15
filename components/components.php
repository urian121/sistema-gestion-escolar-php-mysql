<?php
function btn_volver()
{
    echo '<button type="button" class="btn btn-inverse-dark mb-5" onclick="window.history.back();"> <i class="fa fa-mail-reply"></i> Volver</button>';
}

function btn_cancelar()
{
    echo '<button type="button" class="btn btn-secondary" onclick="window.location.href=\'' . BASE_HOME . '\'">
              Cancelar
              <i class="fa fa-times ms-2" style="color: #4d4a4a;"></i>
          </button>';
}
