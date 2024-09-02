<?php
session_start();
session_destroy();
header('Location: loginfornecedor.php');
exit();
?>
