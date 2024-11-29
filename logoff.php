<?php
    session_start();
    session_destroy();   //encerra sessão
    header('Location:Tela_login.php');  //volta a página login
?>