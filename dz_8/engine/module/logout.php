<?php
unset($_SESSION['user']);
unset($_SESSION['user_id']);
unset($_SESSION['iduserfororders']);
unset($_SESSION['ordernumber']);
session_destroy();
header('Location: /src/public/?module=login');