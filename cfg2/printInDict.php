<?php
  define("INDEX", "");
  require_once($_SERVER['DOCUMENT_ROOT']."/cfg/core.php"); 
  $db = new MyDB();
  $db->connect();
  $table="";
  if($_POST['ver']==1){
      $sql = " SELECT prepod.*, kafedra.nam_kafedra FROM prepod JOIN kafedra on prepod.kafedra_id = kafedra.ID ORDER BY nam_kafedra, nam_prepod";
      $db->run($sql);


      $db->num_row();
      
      for ($i = 0 ; $i < $db->nrows ; ++$i)
      {
        $db->row();
        $prepod_id = $db->data['ID'];
        $fio = $db->data['nam_prepod'];
        $phonenumber = $db->data['phonenumber'];
        $department = $db->data['nam_kafedra'];
        
        $table .= "<li class='ui-widget-content'>".$prepod_id." ".$fio." ".$phonenumber." ".$department."
        </li>";     
      }
  }
  if($_POST['ver']==2){
      $sql = " SELECT * FROM predmet ";
      $db->run($sql);


      $db->num_row();
      
      for ($i = 0 ; $i < $db->nrows ; ++$i)
      {
        $db->row();
        $prepod_id = $db->data['ID'];
        $fio = $db->data['nam_predmet'];
       
        $table .= "<li class='ui-widget-content'>".$prepod_id." ".$fio."</li>";     
      }
  }
  if($_POST['ver']==3){
      $sql = " SELECT * FROM gruppa ";
      $db->run($sql);


      $db->num_row();
      
      for ($i = 0 ; $i < $db->nrows ; ++$i)
      {
        $db->row();
        $prepod_id = $db->data['ID'];
        $fio = $db->data['nam_gruppa'];
       
        $table .= "<li class='ui-widget-content'>".$prepod_id." ".$fio."</li>";     
      }
  }
  echo $table;
  $db->stop();

?>