<?php

/* metodo de PHP para destruir la sesion */

session_destroy();


/* edireccionamos al usuario al login  y lo enviamos al una pagina que se llama ingreso*/

echo '<script>


	window.location = "ingreso";

</script>';