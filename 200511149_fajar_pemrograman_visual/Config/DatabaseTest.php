<?php

require_once __DIR__ . "/Database.php";

$db = \Config\Database::getConnection();
echo "Sukses terhubung ke database" . PHP_EOL;
