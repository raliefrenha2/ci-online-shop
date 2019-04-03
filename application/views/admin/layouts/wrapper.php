<?php
// Proteksi Halaman Admin
$this->simple_login->login_check();

require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');