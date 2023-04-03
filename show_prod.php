<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="google-site-verification" content="9nrYcONBel7SVuCZYK2YhhUswvsYXgG0AciJre_Odoo" />
  <meta name="description" content="Fimomania gioielli bigiotteria in pasta polimerica Fimo" />
  <meta name="keywords" content="gioielli, nyx88, kiara, simonsoft, fimo, bigiotteria, collane, anelli, orecchini, bracciali, braccialetti, portachiavi" />
  <meta name="robots" content="index,follow" />
  <title>Fimomania by Kiara</title>
  <link rel="stylesheet" href="css/kiara.css" type="text/css">
  <link rel="stylesheet" href="css/left_menu.css" type="text/css">
  <link rel="stylesheet" href="css/show_prod.css" type="text/css">
  <link rel="stylesheet" href="rating/css/rating.css" type="text/css">


  <!-- Script Lightbox -->
  <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
  <script type="text/javascript" src="js/prototype.js"></script>
  <script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
  <script type="text/javascript" src="js/lightbox.js"></script>


</head>

<body>

<?php require_once("top.html");?>
<?php require_once("top_link.php");?>
<?php require_once("include/utils.php"); /* Libreria con diverse funzioni utili */?>
<?php require_once("include/connect_db.php"); /* Libreria per il collegamento al DB */?>
<?php require_once("rating/_drawrating.php"); /* Libreria per il sistema di votazione a stelle */?>

<table  width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td class="table_menu" width="125"> <?php require_once ("menu.php"); ?> </td>
    <td valign="top">   <!-- Apertura del TD del body della pagina -->
    <?php
      if(isset($_GET["prod_id"])){ // Controllo che siano stati passati i parametri
        $sql = "SELECT  prodotti.id_prodotto As id_prodotto,
                        prodotti.nome As nome,
                        prodotti.descrizione As descrizione,
                        prodotti.prezzo As prezzo,
                        prodotti.thumb_name As thumb_name,
                        categoria.nome As nome_categoria,
                        categoria.descrizione As descrizione_categoria
                FROM
                        prodotti INNER JOIN
                        categoria ON prodotti.id_categoria = categoria.id_categoria
                WHERE
                        prodotti.enabled = 1 AND
                        categoria.enabled = 1 AND
                        prodotti.id_prodotto = ".numero($_GET["prod_id"]);
        $query = connect($sql);
        $row=mysql_fetch_array($query);
        ?>
        <table class="table_body" width="100%" border="0">
        <tr> <!-- Nome e prezzo -->
          <td colspan="4" class="product_name_big"> <?php echo $row['nome']?> </td>
          <td width="35%" class="product_big_price"><?php echo $row['prezzo'].'&euro;'?></td>
        </tr>
        <tr> <!-- Thumb, Descrizione + Dettagli -->
          <td width="13%" class="product_thumb"><?php  echo make_link_image($row["thumb_name"],110,110)?></td>
          <td width="2%">&nbsp;</td>
          <td> <div class="product_text_line">Descrizione</div><br><?php echo $row['descrizione']?> </td>
          <td width="10%">&nbsp;</td>
          <td class="product_summary">
             <div class="product_text_line">Dettagli</div><br>
             <div class="product_descrizione">
               <img src="img/lista.png"> Prodotto: <?php echo $row["nome"] ?> <br>
               <img src="img/lista.png"> Categoria: <?php echo $row["nome_categoria"] ?> <br>
             </div>
             <div class="product_descrizione_prezzo"><img src="img/lista.png"> Prezzo :  <?php echo $row["prezzo"]."&euro;" ?></div><br>
             <div class="rating"><?php echo rating_bar($row["id_prodotto"],5); ?> </div>
          </td>
        </tr>
        <tr><td colspan="5">&nbsp;</td></tr> <!-- Spazio separatore --->
        <tr> <!-- Guestbook e immagini --->
          <td colspan="4">
            <div class="product_text_line" align="center">Guestbook</div><br>
          </td>
          <td>
            <div class="product_text_line" align="center">Immagini</div><br>
            <table border="0" align="center"> <!-- Tabella contente le immagini -->
            <tr>
<?php
   $sql= "SELECT * FROM immagini WHERE immagini.id_prodotto = ".numero($_GET["prod_id"]);
   $query = connect($sql);
   $cnt = 0;
   while($row=mysql_fetch_array($query)){
    echo "              <td>";
    echo "<a href=\"immagini/".$row['filename']."\" rel=\"lightbox[show_prod]\" title=\"".$row['descrizione']."\">"; //"
    echo make_link_image($row["filename_thumb"],110,110);
    echo "</a></td>\n";
    $cnt = $cnt+1;
    if ($cnt == 3) {echo "            </tr>\n"; $cnt=0;}
   }
?>
            </table>
          </td>
        </tr>
        </table>
<?php
      } else {// Caso in cui ho aperto la pagina show_prod.php senza mettere i parametri es. ?prod_id=...
        error_redirect_box("ATTENZIONE! Errore nella pagina","Si è arrivati a questa pagina tramite un link errato. Si prega
          di utilizzare il menu a destra.","index.php", "20", "error.png");
      }
?>
    </td>  <!-- Chiusura del TD del body della pagina -->
    <td id="banner_dx" width="120"> <?php require_once("banner_big.txt");?> </td>
  </tr> <!-- Chiusura del TR della pagina -->
</table>
<div class="copyright">&copy; 2009 - Developed by SimonSoft. Contents by Kiara aka nyx88</div>
</body>
</html>