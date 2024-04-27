<?php
session_start();
session_destroy();
header('location:../../../one/index.php');