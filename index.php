<?php
//require_once("adatbazis.php");
$sql = "";

$leiras = "Az oldal pár mondatos leírása ...";
$kulcsszavak = "kulcso1, kulcszo2 ";
$menu = '<ul>
			<li><a href="#" class="aktiv">Bemutatkozás</a></li>
			<li><a href="#" >Kedvencek</a></li>
			<li><a href="#" >Képgaléria</a></li>
			<li><a href="#" >Kapcsolat</a></li>
		 </ul>
		';
$menunev = "Bemutatkozás";
$tartalom = " Lorem ipsum cococo";
$oldalsav = " ... ";

$sablon = file_get_contents("sablon.html");
$sablon = str_replace("{{menu}}", $menu, $sablon);
$sablon = str_replace("{{menunev}}", $menunev, $sablon);
$sablon = str_replace("{{tartalom}}", $tartalom, $sablon);
$sablon = str_replace("{{oldalsav}}", $oldalsav, $sablon);
$sablon = str_replace("{{leiras}}", $leiras, $sablon);
$sablon = str_replace("{{kulcsszavak}}", $kulcsszavak, $sablon);

print $sablon;
?>