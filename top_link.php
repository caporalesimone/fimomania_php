<div id="top_link">
  <table width = "100%" border="0">
  <tr>
    <td align="left">

<?php

 require_once ("include/connect_db.php");
 require_once ("include/utils.php");

 if (user_logged()) {
    echo "  <b>Ciao ".$_COOKIE['_nome_user']."</b>\n";
    echo "</td>\n";
    echo "<td>\n";
    //echo "  <a href=\"mailto:nyx88@live.it?subject=Domanda su FIMOMANIA\">Contattami</a> | <a href=\"logout.php\">Esci</a>\n";
    echo "  <a href=\"mailto:nyx88@live.it?subject=Domanda su FIMOMANIA\">Contattami</a>\n";
    echo "</td>\n";
 }else{
    echo "  Benvenuto ospite non registrato.\n";
    echo "</td>\n";
    echo "<td>\n";
    //echo "  <a href=\"mailto:nyx88@live.it?subject=Domanda su FIMOMANIA\">Contattami</a> | <a href=\"login.php\">Accedi come utente</a> | <a href=\"registrazione.php\">Registrati</a>";
    echo "  <a href=\"mailto:nyx88@live.it?subject=Domanda su FIMOMANIA\">Contattami</a>";
    echo "    </td>\n";
 }

echo "  </tr>\n";
echo "  </table>\n";


?>

</div>
