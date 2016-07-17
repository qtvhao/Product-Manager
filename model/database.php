<?php
$dsn = 'mysql:host=localhost;dbname=product_manager';
$username = 'root';
$password = '';
$db = new PDO($dsn, $username, $password);
$db->exec('SET NAMES utf8');
