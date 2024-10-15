<?php
	$mango = $_GET["mango"];
	$orange = $_GET["orange"];
	$banana = $_GET["banana"];
	echo "<br><b>ยอดขาย " . ($mango*30)+($orange*70)+($banana*30) . " บาท</b>";
?>