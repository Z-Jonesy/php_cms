<?php
require_once("../adatbazis.php");

$sql = "SELECT id, alias, sorrend, menunev, tartalom, letrehozas, modositas, leiras, kulcsszavak, statusz
		FROM cms_tartalom
		ORDER BY sorrend ASC";
$eredmeny =	mysqli_query($dbconn, $sql);

$tablazat = "<table>
    <tr>
        <th>ID</th>
        <th>Alias</th>
        <th>Sorrend</th>
        <th>Menunév</th>
        <th>Tartalom</th>
        <th>Létrehozás</th>
        <th>Módosítás</th>
        <th>Leírás</th>
        <th>Kulcsszavak</th>
        <th>Státusz</th>
    </tr>\n";
	while ($sor = mysqli_fetch_assoc($eredmeny)) {
        $tablazat.= "<tr>
        <td>{$sor['id']}</td>
        <td>{$sor['alias']}</td>
        <td>{$sor['sorrend']}</td>
        <td>{$sor['menunev']}</td>
        <td>{$sor['tartalom']}</td>
        <td>{$sor['letrehozas']}</td>
        <td>{$sor['modositas']}</td>
        <td>{$sor['leiras']}</td>
        <td>{$sor['kulcsszavak']}</td>
        <td>{$sor['statusz']}</td>
        </tr>\n";
    }
$tablazat.= "</table>\n"

// Sablonozó
$sablon = file_get_contents("sablon.html");
$sablon = str_replace("{{menu}}", $menu, $sablon);
$sablon = str_replace("{{menunev}}", $menunev, $sablon);
$sablon = str_replace("{{tartalom}}", $tartalom, $sablon);
$sablon = str_replace("{{oldalsav}}", $oldalsav, $sablon);
$sablon = str_replace("{{leiras}}", $leiras, $sablon);
$sablon = str_replace("{{kulcsszavak}}", $kulcsszavak, $sablon);
$sablon = str_replace("{{letrehozas}}", $letrehozas, $sablon);

print $sablon;
?>
