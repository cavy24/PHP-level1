<?php
unset($_SESSION['name']);
unset($_SESSION['user']);
unset($_SESSION['user_id']);
session_destroy();
header('Location: /src/public/?module=login');