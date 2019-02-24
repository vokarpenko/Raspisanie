<?php
	function check_mobile_device() { 
		$mobile_agent_array = array('ipad', 'iphone', 'android', 'pocket', 'palm', 'windows ce', 'windowsce', 'cellphone', 'opera mobi', 'ipod', 'small', 'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'tablet browser');
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);    
	    // var_dump($agent);exit;
		foreach ($mobile_agent_array as $value) {    
			if (strpos($agent, $value) !== false) return true;   
		}       
		return false; 
	} 

	# Функция для генерации случайной строки

	function generateCode($length=6) {

	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

	    $code = "";

	    $clen = strlen($chars) - 1;  
	    while (strlen($code) < $length) {

	            $code .= $chars[mt_rand(0,$clen)];  
	    }

	    return $code;

	}
	function getCellValue($objPHPExcel,$rowcol)
    {
       if($objPHPExcel->getActiveSheet()->getCell( $rowcol )->isInMergeRange()){
            return $objPHPExcel->getActiveSheet()->getCell(substr($objPHPExcel->getActiveSheet()->getCell($rowcol)->getMergeRange(),0,stripos($objPHPExcel->getActiveSheet()->getCell($rowcol)->getMergeRange(),":")))->getValue();
       }else{
        $objPHPExcel->getActiveSheet()->getCell($rowcol)->getValue();
       }
    }
    
    function getFormat($value){
        if($value instanceof PhpOffice\PhpSpreadsheet\RichText\RichText){
            $cellData="";
            $boldT ="";
            $italicT="";
            $ar1 = array();
            $elements = $value->getRichTextElements();
            foreach ($elements as $element) {
                // Rich text start?
                if ($element instanceof PhpOffice\PhpSpreadsheet\RichText\Run ) {
                    

                    if ($element->getFont()->getBold()) {
                        $cellData .= '<b>';
                        $boldT .=htmlspecialchars($element->getText());
                    } else if ($element->getFont()->getItalic()) {
                        $cellData .= '<i>';
                        $italicT .=htmlspecialchars($element->getText());
                    }
                }
                else{
                    if ($element instanceof PhpOffice\PhpSpreadsheet\RichText\TextElement){
                        $cellData .= '<b>';
                        $boldT .=htmlspecialchars($element->getText());
                    }
                }

                // Convert UTF8 data to PCDATA
                $cellText = $element->getText();
                $cellData .= htmlspecialchars($cellText);

                if ($element instanceof PhpOffice\PhpSpreadsheet\RichText\Run ) {
                    if ($element->getFont()->getBold()) {
                        $cellData .= '</b>';
                    } else if ($element->getFont()->getItalic()) {
                        $cellData .= '</i>';
                    }

                    
                }
                else{
                    if ($element instanceof PhpOffice\PhpSpreadsheet\RichText\TextElement){
                        $cellData .= '</b>';
                    }
                }
            }
            $ar1[0]=$cellData;
            $ar1[1]=$boldT;
            $ar1[2]=$italicT;
            return $ar1;
        }
    }
    function isNumber($str){
        $str2="0123456789";
        return strpos($str2,$str);

        
    }
	function letterNumber($str){
        $ar1=array();
        $letter="";
        $number="";
        for($i=0;$i<strlen($str);$i++){
            if(!isNumber($str[$i])){
                $letter.=$str[$i];
            }
            else
            {
                $number.=$str[$i];
            }            
        }
        $ar1[0]=$letter;
        $ar1[1]=$number;
        return $ar1;
    }
    function DelSpace($str){
       $str2="";
        for($i=0;$i<strlen($str);$i++){
            if($str[$i]!=" "){
                $str2.=$str[$i];
            }
        }
        return $str2;
         
    }
    function ksrs($str){
         $str=mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
        $str = DelSpace($str);
        return ($str == "ксрс");
    }
    function dowtn($str){
        $str=mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
        $str = DelSpace($str);
        switch ($str) {
            case 'понедельник':
                return 1;
                break;
            case 'вторник':
                return 2;
                break;
            case 'среда':
                return 3;
                break;
            case 'четверг':
                return 4;
                break;
            case 'пятница':
                return 5;
                break;
            case 'суббота':
                return 6;
                break;
            case 'воскресенье':
                return 7;
                break;
            default:
                return 0;
                break;
        }
    }
    function norm($str){
        return preg_replace('/\s+/', ' ', trim($str," "));
    }
//SELECT * FROM prepod  WHERE nam_prepod LIKE '%Павлова А.В.%'
    function addNewRetID($db,$keyT,$keyV,$value){
        
        
        if(gettype($keyV)!="array"){
            $value=norm($value);
            $sql = "SELECT * FROM ".$keyT."  WHERE ".$keyV." = '".$value."'";
            $db->run($sql);
            $db->num_row();

            if($db->nrows){
                $db->row();
                return $db->data['ID'];
            }
            else{                  
                $sql = "INSERT INTO ".$keyT." (`ID`,`".$keyV."`) VALUES (NULL,'".$value."')";
                $db->run($sql);
                $sql = "SELECT ID FROM ".$keyT."  WHERE ".$keyV." = '".$value."'";
                $db->run($sql);
                $db->row();
                return $db->data['ID'];
            } 
        }
        else{
            for($i=0;$i<count($keyV);$i++){
                $value[$i] = norm($value[$i]);
            } 
            $sql ="SELECT ID FROM ".$keyT." WHERE ";
            for($i=0;$i<count($keyV);$i++){
                if($i==0){
                    $sql .= $keyV[$i]." LIKE '".$value[$i]."'";
                }
                else{
                    $sql .=" AND ".$keyV[$i]." LIKE '".$value[$i]."'";
                }
            }
            $db->run($sql);
            $db->num_row();
            if($db->nrows){
                $db->row();
                return $db->data['ID'];
            }
            else{
                $sql = "INSERT INTO ".$keyT." (`ID`";
                for($i=0;$i<count($keyV);$i++){
                    $sql .=",`".$keyV[$i]."`";
                }
                $sql.=") VALUES (NULL";
                for($i=0;$i<count($value);$i++){
                    $sql .=",'".$value[$i]."'";
                }
                $sql.=")";
                $db->run($sql);
                $sql ="SELECT ID FROM ".$keyT." WHERE ";
                for($i=0;$i<count($keyV);$i++){
                    if($i==0){
                        $sql .= $keyV[$i]." LIKE '".$value[$i]."'";
                    }
                    else{
                        $sql .=" AND ".$keyV[$i]." LIKE '".$value[$i]."'";
                    }
                }
                $db->run($sql);
                $db->row();
                return $db->data['ID'];
            }
        }           
    }


    function addToMatrixFrDb($db,$main_matrix,$sql){
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
        return $main_matrix;
    }
?>