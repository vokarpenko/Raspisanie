<link rel="stylesheet" type="text/css" href="/css/wishes2.css">
<div id ="tab">
  <?php
$sql = " SELECT * FROM gruppa";
$db->run($sql);
$db->num_row();
$ngrupp=$db->nrows;
echo "<body style ='width:".(500*$ngrupp)."px' >";
?>
<body >
 <h1>Расписание</h1> 
<table >
  
  
 <?php
$main_matrix = array();
$sql = " SELECT num_den, num_par, predmet.nam_predmet, prepod.nam_prepod, gruppa.nam_gruppa FROM para JOIN prepod on para.prepod_id = prepod.ID JOIN predmet on para.predmet_id = predmet.ID JOIN gruppa on para.gruppa_id = gruppa.ID";
$db->run($sql);
$db->num_row();
for ($i = 0 ; $i < $db->nrows ; ++$i)
{

  $db->row();
  if(array_key_exists($db->data['nam_gruppa'],$main_matrix))
  {
      if(array_key_exists($db->data['num_den'], $main_matrix[$db->data['nam_gruppa']])){
          $main_matrix[$db->data['nam_gruppa']][$db->data['num_den']][$db->data['num_par']] = "<b>".$db->data['nam_predmet']."</b>\n<i>".$db->data['nam_prepod']."</i>"; 
      }else{
        $main_matrix[$db->data['nam_gruppa']][$db->data['num_den']] =array();
        $main_matrix[$db->data['nam_gruppa']][$db->data['num_den']][$db->data['num_par']] = "<b>".$db->data['nam_predmet']."</b>\n<i>".$db->data['nam_prepod']."</i>"; 
      }
  }
  else{
    $main_matrix[$db->data['nam_gruppa']]= array();
    if(array_key_exists($db->data['num_den'], $main_matrix[$db->data['nam_gruppa']])){
          $main_matrix[$db->data['nam_gruppa']][$db->data['num_den']][$db->data['num_par']] = "<b>".$db->data['nam_predmet']."</b>\n<i>".$db->data['nam_prepod']."</i>"; 
      }else{
        $main_matrix[$db->data['nam_gruppa']][$db->data['num_den']] =array();
        $main_matrix[$db->data['nam_gruppa']][$db->data['num_den']][$db->data['num_par']] = "<b>".$db->data['nam_predmet']."</b>\n<i>".$db->data['nam_prepod']."</i>"; 
      }

  }
  
}


foreach ( $main_matrix as $key =>$gruppa ) {
  for ($i = 1 ; $i <= 14 ; $i++){
    if(!(array_key_exists($i,$main_matrix[$key]))){
      $main_matrix[$key][$i]=array();
      for ($j = 1 ; $j <= 7 ; ++$j){
        $main_matrix[$key][$i][$j]="";
      }
    }
    else{
      for ($j = 1 ; $j <= 7 ; ++$j){
        if(!array_key_exists($j,$main_matrix[$key][$i])){
          $main_matrix[$key][$i][$j]="";
        }
      }
    }
  }
}




$table="";
/*$table.="<tr>";
foreach ( $main_matrix as $key => $gruppa ) {
  $table.="<td>".$key."</td>";
}
$table.="</tr>";*/



$table.="<tr>";

/*foreach ( $main_matrix as $key =>$gruppa ) {
  $table.="<td style= 'width:50%'><table style= 'height:100%'>";*/
  for ($i = 1 ; $i <= 14 ; $i++){
    
    $table.="<tr><td>".$i."</td><td><table>";
    for ($j = 1 ; $j <= 7 ; $j++){
      if(($j == 1)&&($i == 1)){
        $table.="<tr><td></td>";
        foreach ( $main_matrix as $key => $gruppa ) {
          $table.="<td>".$key."</td>";
        }
        $table.="</tr>";
      }
      $table.="<tr><td style ='width:5%'>".$j."</td>";

      foreach ( $main_matrix as $key =>$gruppa ) {
        $table.="<td style ='width:400px'><pre>".$main_matrix[$key][$i][$j]."</pre></td>";
      }
      $table.="</tr>";
    }
    $table.="</table></td></tr>";
  }
 /* $table.="</table></td>";
}
$table.="</tr>";*/



  echo $table;
  $db->stop();

  ?>
</table>
</div>