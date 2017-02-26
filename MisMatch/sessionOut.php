<?php

// script para terminar a session caso o user clique em SAIR
session_start();

session_destroy();
header('Location: index.php');
?>