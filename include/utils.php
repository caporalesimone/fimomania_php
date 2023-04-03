<?php

/* Se la stringa e' un numero la ritorna altrimenti restituisce errore */
function numero($str){
   if (is_numeric ($str)) return $str;
   echo "ERRORE. Contattare l'amministratore del sito'";
   exit(0);
}

/* Se l'immagine e' presente resituisce il nome del file, altrimenti no_image.png */
function make_link_image($image_name,$img_width,$img_height) {

   if (file_exists("immagini/".$image_name)) {
     if (($img_width==0) || ($img_height==0)) {
        return "<img src=\"immagini/".$image_name."\" border=\"0\">";
     }else{
       return "<img src=\"immagini/".$image_name."\" width=\"".$img_width."\" height=\"".$img_height."\" border=\"0\">";
       //return '<img src="immagini/'.$image_name." width="'.$img_width.'" height="'.$img_height.'" border="0">';
     }
   }else{
     return "<img src=\"img/no_image.png\" border=\"0\">";
   }
}


/* Se il testo e' più lungo di un certo numero di caratteri viene tagliato */
function text_cut($testo){
   $str_max_len = 210;
   if (strlen($testo) > $str_max_len){
      $testo = substr($testo, 0, $str_max_len)." ...";
   }
   return $testo;
}


/* Controlla se l'utente è loggato oppure no */
function user_logged(){
   if(isset($_COOKIE['_username'])) { // Controlla i cookies per vedere se l'utente è loggato
    $username = $_COOKIE['_username'];
    $pass = $_COOKIE['_password'];
    $check = connect("SELECT * FROM utenti WHERE username = '$username'")or die(mysql_error());
    while($info = mysql_fetch_array( $check )) {
      if ($pass != $info['password']) {// Se il cookie ha una password differente si viene rimandati al login
         // Cookie con password errata
         echo "Ci sono stati dei problemi di autenticazione. E' necessario ripetere il login\n";
         redirect("login.php",5);
      } else  {
         return true;
      }
    }
  }
  else return false; // Il cookie non esiste
}


/* Message box di errore con redirect verso una certa pagina. */
/* Per funzionare è necessario includere un js e fare un onload sul body della pagina*/
/* <head> */
/* <script src="include/timer.js" type="text/javascript"></script> */
/* </head> */
/* <body onload='timed_redirect("url")'> */

function error_redirect_box($title,$message,$redirect_url, $redirect_time, $error_img){
  echo "\n<script src=\"include/timer.js\" type=\"text/javascript\"></script>\n";
  echo "<div align=\"center\">\n";
  echo "  <div id=\"error_box\">\n";
  echo "    <table   align=\"center\" width=\"500\" border=\"0\">\n";
  echo "      <tr>\n";
  echo "        <td width=\"50\" rowspan=\"3\" align=\"center\" valign=\"middle\"><img src=\"img/$error_img\"></td>\n";
  echo "        <td width=\"5\" rowspan=\"3\" align=\"center\" valign=\"middle\">&nbsp;</td>\n";
  echo "        <td align=\"center\"><b>$title<b></td>\n";
  echo "      </tr>\n";
  echo "      <tr>\n";
  echo "        <td>";
  echo "          $message<br>";
  echo "          Attendere <b><span id=\"_TIMER\">$redirect_time</span></b> secondi oppure <a href=\"$redirect_url\"> cliccare qui</a>.<br>";
  echo "        </td>\n";
  echo "      </tr>\n";
  echo "    </table>\n";
  echo "  </div>\n";
  echo "</div>\n";
  echo "<script type=\"text/javascript\">timed_redirect(\"$redirect_url\");</script>\n";
}




?>