<?php
define("INDEX", "");
require_once($_SERVER['DOCUMENT_ROOT']."/cfg/core.php"); 
require_once($_SERVER['DOCUMENT_ROOT']."/com/library.php");
$db = new MyDB();
$db->connect();

if (!empty($_FILES['ExcelFile']['tmp_name'])) { 
	echo "Даров";
	$path = $_SERVER['DOCUMENT_ROOT']."/upload/".$_FILES['ExcelFile']['name']; 
	$file_name="";
	if (copy($_FILES['ExcelFile']['tmp_name'], $path)){ 
		$myFaile = $path; 
		$file_name = $_FILES['ExcelFile']['name'];
	}

	require $_SERVER['DOCUMENT_ROOT'].'vendor/autoload.php';
	//use PhpOffice\PhpSpreadsheet;

	$inputFileName = $path;

	/*check point*/
	$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
	$reader->setReadDataOnly(false);
	$objPHPExcel=$reader->load($inputFileName);
	$objPHPExcel->setActiveSheetIndexByName($_POST['listName']);

	$dayOfWeek = $_POST['dayOfWeek'];
	$numOfPar = $_POST['numOfPar'];
	$mainGroup = $_POST['mainGroup'];
	$nameOfGroup = $_POST['nameOfGroup'];


	$ar2=letterNumber($mainGroup);
	$lmg=$ar2[0];
	$nmg =1*$ar2[1];
	$para1="";
	$para2="";
	$tpara ="";
	$tnpara="";
	$tday="";

	$table="";
	$gruppa_id = addNewRetID($db,"gruppa","nam_gruppa",$nameOfGroup); 

	while ( getCellValue($objPHPExcel,$dayOfWeek.$nmg) !="") {
		$day = dowtn(getCellValue($objPHPExcel,$dayOfWeek.$nmg));
		$npara = getCellValue($objPHPExcel,$numOfPar.$nmg);
		$para=getCellValue($objPHPExcel,$lmg.$nmg);

		if($tnpara==$npara){
			if($tpara!=$para){
				if(($para=="")||(ksrs($para))){
					$para1=$tpara;
				}
				else{
					$para1=$tpara;
					$para2=$para;
				}
			}else{
				if(!(($para=="")||(ksrs($para)))){
					$para2=$tpara;
				}
				
			}
		}
		else{
			//здесь сохраняем пару1 и пару2
			if((($para1!="")||($para2!=""))&&(!(ksrs($para1))||(!ksrs($para2)))){
				if(($para1!="")&&(!(ksrs($para1)))){
					$ar1=getFormat($para1);
					$table.="|препод - ".$ar1[2]."предмет- ".$ar1[1]." числитель день - ".$tday." пара - ".$tnpara."\n";
					//SELECT * FROM tprepod  WHERE nam_prepod LIKE '%Кармазин В.Н.%'
					$prepod_id = addNewRetID($db,"tprepod","nam_prepod",$ar1[2]);
					$predmet_id = addNewRetID($db,"tpredmet","nam_predmet",$ar1[1]);
					$keyV=array();
					$value=array();

					$keyV[0]="gruppa_id";
					$keyV[1]="predmet_id";
					$keyV[2]="prepod_id";
					$keyV[3]="num_den";
					$keyV[4]="num_par";

					$value[0]=$gruppa_id;
					$value[1]=$predmet_id;
					$value[2]=$prepod_id;
					$value[3]=$tday;
					$value[4]=$tnpara;

					$table.= addNewRetID($db,"tpara",$keyV,$value);    		      			
				}
				if(($para2!="")&&(!(ksrs($para2)))){
					$ar1=getFormat($para2);
					$table.=$ar1[0]." знаменатель день - ".$tday." пара - ".$tnpara."\n";

					$prepod_id = addNewRetID($db,"tprepod","nam_prepod",$ar1[2]);
					$predmet_id = addNewRetID($db,"tpredmet","nam_predmet",$ar1[1]);
					$keyV=array();
					$value=array();

					$keyV[0]="gruppa_id";
					$keyV[1]="predmet_id";
					$keyV[2]="prepod_id";
					$keyV[3]="num_den";
					$keyV[4]="num_par";

					$value[0]=$gruppa_id;
					$value[1]=$predmet_id;
					$value[2]=$prepod_id;
					$value[3]=7+$tday;
					$value[4]=$tnpara;

					$table.= addNewRetID($db,"tpara",$keyV,$value); 
				}
			}

			if(($para=="")||(ksrs($para))){
				$para1="";
			}
			else{
				$para1=$para;
			}
			$para2="";
			
			
		}
		$tnpara = $npara;
		$tpara=$para;
		$tday=$day;
		$nmg++;
	}
	echo $table;
	//$ar1 = getFormat(getCellValue($objPHPExcel,$_POST['mainGroup']));
	
}

 
// 
// echo getFormat(getCellValue($objPHPExcel,'AM42'));
?>