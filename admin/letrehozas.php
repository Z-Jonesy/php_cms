/**
* Created by PhpStorm.
* User: 1022699
* Date: 2018. 03. 24.
* Time: 10:23
*/
<form method="post" action="">
    <h3>Új oldal létrehozása</h3>
    <p><label for="alias">Alias:</label><br>
        <input type="text" id="alias" name="alias"></p>
    <p><label for="sorrend">Sorrend:</label><br>
        <input type="number" id="sorrend" name="sorrend" min="1"></p>
    <p><label for="menunev">Menünév:</label><br>
        <input type="text" id="menunev" name="menunev"></p>
    <p><label for="tartalom">Tartalom:</label><br>
        <textarea id="tartalom" name="tartalom"></textarea></p>
    <p><label for="leiras">Leírás:</label><br>
        <textarea id="leiras" name="leiras"></textarea></p>
    <p><label for="kulcsszavak">Kulcsszavak:</label><br>
        <textarea id="kulcsszavak" name="kulcsszavak"></textarea></p>
    <p><label for statusz="">Státusz</label><br>
        <select id="statusz" name="statusz">
            <option value="1">Aktív</option>
            <option value="0">Passzív</option>
        </select></p>
    <input type="submit" id="rendben" name="rendben" value="Rendben">
    <input type="reset" value="Mégse">

</form>

<?php
// Sablonozó
$sablon = file_get_contents("sablon.html");
$sablon = str_replace("{{menu}}", $menu, $sablon);
$sablon = str_replace("{{menunev}}", "Új oldal létrehozása", $sablon);
$sablon = str_replace("{{tartalom}}", $tartalom, $sablon);
$sablon = str_replace("{{oldalsav}}", $oldalsav, $sablon);
print $sablon;

?>