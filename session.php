<?php
    session_start();

    $_SESSION['username'] = "Sander";
        echo "Welkom " . $_SESSION['username'];

?>