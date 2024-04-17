<?php

session_start();
session_unset();
session_destroy();

header("Location: https://mikecochito.000webhostapp.com/login/index.php");
?>