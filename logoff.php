<?php 

session_start();
//destruição de sessão e redirecionamento para a index
session_destroy();
header('location: index.php');



?>