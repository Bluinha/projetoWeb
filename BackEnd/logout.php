<?php
session_start();
session_destroy();
header("Location: login_form.php"); // ou página de login
exit();
?>