<?php
require_once("adatbazis.php");

// menü összeállítása
$sql = "SELECT id, alias, menunev 
		FROM cms_tartalom
		WHERE statusz = 1
		ORDER BY sorrend ASC";
$eredmeny =	mysqli_query($dbconn, $sql);

$menu = "<ul>\n";
	while ($sor = mysqli_fetch_assoc($eredmeny)) {
		$menu.= "<li><a href=\"\">{$sor['menunev']}</a></li>\n";
}
$menu.= "</ul>\n";

// Tartalom összeállítása
$id = (isset($_GET['id'])) ? (int)$_GET['id'] : 1;
$sql = "SELECT menunev, tartalom, modositas, leiras, kulcsszavak, letrehozas
		FROM cms_tartalom
		WHERE id = {$id}
		LIMIT 1"; 
$eredmeny =	mysqli_query($dbconn, $sql);

// Érvényes tartalom
if (mysqli_num_rows($eredmeny) == 1) {
		$sor = mysqli_fetch_assoc($eredmeny);

		$leiras = $sor['leiras'];
		$kulcsszavak = $sor['kulcsszavak'];
		$menunev = $sor['menunev'];
		$tartalom = $sor['tartalom'];
		$letrehozas = $sor['letrehozas'];
} else {
	$leiras = "";
	$kulcsszavak = "";
	$menunev = "Hiba";
	$tartalom = "<p><em>A keresett oldal nem található ... </em></p>";
	$tartalom = date("Y-m-d H-i-s");
}

// modulok kezelése
$oldalsav = " ... ";

// Sablonozó
$sablon = file_get_contents("sablon.html");
$sablon = str_replace("{{menu}}", $menu, $sablon);
$sablon = str_replace("{{menunev}}", $menunev, $sablon);
$sablon = str_replace("{{tartalom}}", $tartalom, $sablon);
$sablon = str_replace("{{oldalsav}}", $oldalsav, $sablon);
$sablon = str_replace("{{leiras}}", $leiras, $sablon);
$sablon = str_replace("{{kulcsszavak}}", $kulcsszavak, $sablon);

print $sablon;
?>