<!DOCTYPE html>
<?php

setcookie("usuario", "", time() - 3600);
?>
<html>
<body>

  <?php
  echo "Cookie 'usuario' BORRADA.";
  ?>
  <br /><a href="comlogincli.php">Volver a Login</a>

</body>
</html>
