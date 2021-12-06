<?php
unset($_COOKIE['Loged']);
setcookie('Loged', null, -1, '/');
header('Location: index.php');