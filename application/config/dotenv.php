<?php 
require_once FCPATH . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(FCPATH);
$dotenv->load();
?>