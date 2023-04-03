<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->
  <meta name="google-site-verification" content="9nrYcONBel7SVuCZYK2YhhUswvsYXgG0AciJre_Odoo" />
  <meta name="description" content="Fimomania gioielli bigiotteria in pasta polimerica Fimo" />
  <meta name="keywords" content="gioielli, nyx88, kiara, simonsoft, fimo, bigiotteria, collane, anelli, orecchini, bracciali, braccialetti, portachiavi" />
  <meta name="robots" content="index,follow" />
  <title>Fimomania by Kiara</title>
  <link rel="stylesheet" href="css/kiara.css" type="text/css">
  <link rel="stylesheet" href="css/left_menu.css" type="text/css">
  <link rel="stylesheet" href="css/thumb.css" type="text/css">
</head>

<body>

<?php require_once("top.html");?>
<?php require_once("top_link.php");?>
<?php require_once("include/utils.php");/*Libreria con diverse funzioni utili*/?>
<?php require_once("include/connect_db.php");/* Libreria per il collegamento al DB*/?>

<?php // Capisco da che record partire per visualizzare i prodotti (visualizzazione multipagina)
  if (isset ($_GET['start'])) $start = $_GET['start'];
  else $start = 0;
  $thumb_per_page = 9;
?>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td class="table_menu" width="125"> <?php require_once ("menu.php"); ?> </td>
    <td class="thumb_body" valign="top">  <!-- Apertura del TD del body della pagina -->
    <?php
      if(isset($_GET["name"]) && isset($_GET["cat_id"])){ // Controllo che siano stati passati dei parametri
        echo "<div class=\"nome_categoria\">".$_GET["name"]."</div>\n";
        echo "<table border=\"0\" WIDTH=\"100%\">\n";

        // Ricavo il numero di prodotti disponibili per questa categoria
        $sql_prodotti = "SELECT COUNT(*) AS num_record
                         FROM  categoria INNER JOIN
                               prodotti ON categoria.id_categoria = prodotti.id_categoria
                         WHERE prodotti.enabled = 1 AND
                               categoria.enabled = 1 AND
                               categoria.id_categoria = \"".numero($_GET["cat_id"])."\"";

        $query = connect($sql_prodotti);
        $row = mysql_fetch_array($query);
        $num_prodotti = $row['num_record'];

        $sql_prodotti = "SELECT   prodotti.id_prodotto,
                                  prodotti.descrizione as descrizione,
                                  prodotti.prezzo as prezzo,
                                  prodotti.thumb_name,
                                  prodotti.nome as nome_prod,
                                  categoria.nome
                         FROM
                                  categoria INNER JOIN
                                  prodotti ON categoria.id_categoria = prodotti.id_categoria
                         WHERE
                                  prodotti.enabled = 1 AND
                                  categoria.enabled = 1 AND
                                  categoria.id_categoria = \"".numero($_GET["cat_id"])."\"".
                        "ORDER BY
                                  prodotti.nome
                        ASC LIMIT $start, $thumb_per_page";

        $query = connect($sql_prodotti);
        $cnt=1; // Questo contatore permette di allineare 3 prodotti alla volta
        echo "\n<tr>\n";
        while($row=mysql_fetch_array($query)){
          echo "  <td width=\"33%\">\n";
          echo "    <table border=\"0\">\n";
          echo "    <tr>\n";
          echo "      <td width=\"30%\">\n";
          echo "        <a href=\"show_prod.php?prod_id=".$row["id_prodotto"]."\">".make_link_image($row["thumb_name"],110,110)."</a>\n";
          echo "        <a href=\"show_prod.php?prod_id=".$row["id_prodotto"]."\" class=\"tryitbtn\">Dettagli</a>\n";
          echo "        <br><br>";
          echo "      </td>\n";
          echo "      <td valign=\"top\">\n";
          echo "        <table  width=\"100%\" border=\"0\">\n";
          echo "          <tr><td>\n";
          echo "            <div class=\"thumb_product_title\">\n";
          echo "              <a href=\"show_prod.php?prod_id=".$row["id_prodotto"]."\">".$row["nome_prod"]."</a>\n";
          echo "            </div>\n";
          echo "          </td></tr>\n";
          echo "          <tr><td><div class=\"thumb_product_text\">".text_cut($row["descrizione"])."</div></td></tr>\n";
          echo "          <tr><td><div class = \"thumb_product_price\">PREZZO: ".$row["prezzo"]."&euro;</div></td></tr>\n";
          echo "        </table>\n";
          echo "      </td>\n";
          echo "    </tr>\n";
          echo "    </table>\n";
          echo "  </td>\n";
          if(($cnt%3)==0) echo "</tr>\n\n<tr>\n";
          $cnt++;
        }
        echo "</table>\n";

        echo "<div align=\"center\">";
        // Stampa dei link per le pagine precedente e successiva
        if (($start < $thumb_per_page) && ($start + $thumb_per_page > $num_prodotti)){
        }else {
          if ($start >= $thumb_per_page) { // link alla pagina precedente (se da utilizzare)
            echo '<a href="thumb.php?name='.$_GET["name"].'&cat_id='.$_GET["cat_id"].'&start='.($start - $thumb_per_page).'">Pagina precedente </a>| ';
          }else echo 'Inizio | ';
          if ($start + $thumb_per_page < $num_prodotti){ // link alla pagina successiva (se da utilizzare)
            echo '<a href="thumb.php?name='.$_GET["name"].'&cat_id='.$_GET["cat_id"].'&start='.($start + $thumb_per_page).'">Pagina successiva</a>';
          }else echo 'Fine';
        }
      echo "</div>"; // Div dei link alle pagine

      }else{ // Caso in cui ho aperto la pagina thumb.php senza mettere i parametri ?name=..&cat_id=...
        error_redirect_box("ATTENZIONE! Errore nella pagina","Si è arrivati a questa pagina tramite un link errato. Si prega
          di utilizzare il menu a destra.","index.php", "20", "error.png");
      }
    ?>
    <br><br>
    </td> <!-- Chiusura del TD del body della pagina -->
    <td id="banner_dx" width="120"> <?php require_once("banner_big.txt");?> </td>
  </tr> <!-- Chiusura del TR della pagina -->
</table>
<div class="copyright">&copy; 2009 - Developed by SimonSoft. Contents by Kiara aka nyx88</div>
</body>
</html>