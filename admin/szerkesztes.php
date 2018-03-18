<?php
require_once("../adatbazis.php");

$sql = "SELECT id, alias, sorrend, menunev, tartalom, letrehozas, modositas, leiras, kulcsszavak, statusz
		FROM cms_tartalom
		ORDER BY sorrend ASC";
$eredmeny =	mysqli_query($dbconn, $sql);

$tablazat = "<p><a href=\"letrehozas.php\"><i class=\"material-icons\">add_box</i>Új oldal</a></p>
 <table>
    <tr>
        <th>Alias</th>
        <th>Sorrend</th>
        <th>Menunév</th>
        <th>Tartalom</th>
        <th>Státusz</th>
        <th>Művelet</th>
    </tr>\n";
    
	while ($sor = mysqli_fetch_assoc($eredmeny)) {
        $tablazat.= "<tr>

        <td>{$sor['alias']}</td>
        <td>{$sor['sorrend']}</td>
        <td>{$sor['menunev']}</td>
        <td>".substr(strip_tags($sor['tartalom']), 0, 100)."</td>
        <td>{$sor['statusz']}</td>
        <td><a href=\"modositas.php?id={sor['id']} \"><i class=\"material-icons\">mode_edit</i></a>
            <a href=\"torles.php?id={sor['id']} \"><i class=\"material-icons\">delete</i></a>
          </td>
        </tr>\n";
    }
$tablazat.= "</table><p><a href=\"letrehozas.php\"><i class=\"material-icons\">add_box</i>Új oldal</a></p>\n";

// Sablonozó
$sablon = file_get_contents("sablon.html");
$sablon = str_replace("{{menu}}", "", $sablon);
$sablon = str_replace("{{menunev}}", "szerkesztés", $sablon);
$sablon = str_replace("{{tartalom}}", $tablazat, $sablon);
$sablon = str_replace("{{oldalsav}}", " ", $sablon);


print $sablon;


?>