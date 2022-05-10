<?php
session_start();
session_destroy();

header("Location: ../login.php?message=Vous avez été déconnecté");
