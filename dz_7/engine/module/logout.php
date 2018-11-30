<?php
unset($_SESSION['name']);
session_destroy();
header('Location: /src/public/?module=login');