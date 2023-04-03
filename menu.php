<?php require_once ("include/connect_db.php");?>

<div id="menu">
 <ul>
   <li><a href="index.php" title="Pagina di benvenuto">Home</a></li>
   <?php
      $query = connect("SELECT * FROM categoria WHERE enabled = 1 ORDER BY nome");
      while($row=mysql_fetch_array($query)){
        echo '<li><a href="thumb.php?name='.$row['nome'].'&cat_id='.$row['id_categoria'].'"';
        echo 'title="'.$row['descrizione'].'">'.$row['nome'].'</a></li>';
        echo "\n";
      }
   ?>
 </ul>
</div>


<br>
<div class="fankounter">
  <script type="text/javascript" language="javascript" src="fkounter5/counter.js.php?id=fimomania"></script>
</div>
<br>

