
<link rel="stylesheet" type="text/css" href="/css/wishes.css">
<table>
  <tr>
    <th>ФИО</th>
    <th>Номер телефона</th>
    <th>Кафедра</th>
    <th>Пожелания</th>
    
  </tr>
  <?php
  $sql = " SELECT prepod.*, kafedra.nam_kafedra FROM prepod JOIN kafedra on prepod.kafedra_id = kafedra.ID ORDER BY nam_kafedra, nam_prepod";
  $db->run($sql);
  $db2 = new MyDB();
  $db2->connect();
  $db->num_row();
  $table="";
  for ($i = 0 ; $i < $db->nrows ; ++$i)
  {
    $db->row();
    $prepod_id = $db->data['ID'];
    $fio = $db->data['nam_prepod'];
    $phonenumber = $db->data['phonenumber'];
    $department = $db->data['nam_kafedra'];
    $sql = "SELECT * FROM wishes WHERE prepod_id = '".$prepod_id."'";
    $db2->run($sql);
    $db2->num_row();
    $pr_wishes = '';
    for ($j = 0 ; $j < $db2->nrows ; ++$j)
    {
      $db2->row();
      $wish = $db2->data['wish_text'];
      $pr_wishes .= "-       ".$wish."\n";      
    }
    $table .= "<tr>
            <td><xmp>".$fio."</xmp></td>
            <td>".$phonenumber."</td>
            <td>".$department."</td>
            <td><xmp>".$pr_wishes."</xmp></td>
          </tr>";     
  }
  echo $table;
  $db->stop();
  $db2->stop();
  ?>
</table>