
<link rel="stylesheet" type="text/css" href="/css/wishes.css">
<table>
  <tr>
    <th>ФИО</th>
    <th>Номер телефона</th>
    <th>Пожелания</th>
  </tr>
  <?php
  $sql = "SELECT * FROM prepod ORDER BY nam_prepod";
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
    $sql = "SELECT * FROM wishes WHERE `prepod_id` = '".$prepod_id."'";
    $db2->run($sql);
    $db2->num_row();
    $pr_wishes = '';
    for ($j = 0 ; $j < $db->nrows ; ++$j)
    {
      $db2->row();
      $wish = $db2->data['wish_text'];
      $pr_wishes .= "-       ".$wish."\n";      
    }
    $table .= "<tr>
            <td>".$fio."</td>
            <td>".$phonenumber."</td>
            <td><pre>".$pr_wishes."</pre></td>
          </tr>";     
  }
  echo $table;
  $db->stop();
  $db2->stop();
  ?>
</table>