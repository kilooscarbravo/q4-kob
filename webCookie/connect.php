<?php
try {
	$pdo = new PDO("mysql:host=localhost;dbname=sec1_1;charset=utf8", "Wstd1", "iXRIg7xU");
} catch (PDOException $e) {
	echo "เกิดข้อผิดพลาด : ".$e->getMessage();
}
?>