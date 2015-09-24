<?php 
	/* pChart library inclusions */
include("pChart/class/pData.class.php");
include("pChart/class/pDraw.class.php");
include("pChart/class/pPie.class.php");
include("pChart/class/pImage.class.php");

function ICDvspCodeBar($postcode)
{

	/* Create and populate the pData object */
	$MyData = new pData(); 
	$connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	$searchQuery = "Select ICD from patients where PostCode = '$postcode'";
	$search = mysqli_query($connection, $searchQuery);
	while($row = mysqli_fetch_assoc($search))
	{
		$ICD[] = $row["ICD"];
 	}
	$count = array_count_values($ICD);
	$ICD = array_unique($ICD, SORT_REGULAR);
	
	$MyData->addPoints($count,"Number of Patients");
	$MyData->addPoints($ICD,"ICD");
	$MyData->setSerieDescription("ICD", "ICD");
	$MyData->setAbscissa("ICD");
	$MyData->setAbscissaName("ICD");
	$MyData->loadPalette("pChart/palettes/blind.color", TRUE);
	
	/* Create the cache object */

 /* Create the pChart object */ 
 $myPicture = new pImage(700,230,$MyData); 

 /* Turn of Antialiasing */ 
 $myPicture->Antialias = FALSE; 

 /* Add a border to the picture */ 
 $myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100)); 
 $myPicture->drawGradientArea(0,0,700,230,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20)); 
 $myPicture->drawRectangle(0,0,699,229,array("R"=>0,"G"=>0,"B"=>0)); 

 /* Set the default font */ 
 $myPicture->setFontProperties(array("FontName"=>"pChart/fonts/calibri.ttf","FontSize"=>10)); 

 /* Define the chart area */ 
 $myPicture->setGraphArea(60,40,650,200); 

 /* Draw the scale */ 
 $scaleSettings = array("GridR"=>200,"GridG"=>200,"GridB"=>200,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE); 
 $myPicture->drawScale($scaleSettings); 

 /* Write the chart legend */ 
 $myPicture->drawLegend(580,12,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL)); 

 /* Turn on shadow computing */  
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 

 /* Draw the chart */ 
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 
 $settings = array("Display Values"=>TRUE, "DisplayPos"=>LABEL_POS_INSIDE, "Surrounding"=>-30,"InnerSurrounding"=>30,"Interleave"=>0); 
 $myPicture->drawBarChart($settings);
 $myPicture->render("chart.png");
}

function ICDvspCodePie($postcode)
{
/* Create and populate the pData object */
  $MyData = new pData();   
  
  $connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
  $searchQuery = "Select ICD from patients where PostCode = '$postcode'";
  $search = mysqli_query($connection, $searchQuery);
  while($row = mysqli_fetch_assoc($search))
  {
	  $ICD[] = $row["ICD"];
  }
  $count = array_count_values($ICD);
 $ICD = array_unique($ICD, SORT_REGULAR);  
  
  $MyData->addPoints($count,"Number of Patients"); 
  $MyData->setSerieDescription("Number of Patients","ICD");
   
/* Define the absissa serie */
$MyData->addPoints($ICD ,"ICD");
$MyData->setAbscissa("ICD");
$MyData->loadPalette("pChart/palettes/blind.color", TRUE);
 
/* Create the pChart object */
$myPicture = new pImage(300,260,$MyData);
 
/* Draw a solid background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
//$myPicture->drawFilledRectangle(0,0,300,300,$Settings);
 
/* Overlay with a gradient */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
//$myPicture->drawGradientArea(0,0,300,260,DIRECTION_VERTICAL,$Settings);
$myPicture->drawGradientArea(0,0,300,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
 
/* Add a border to the picture */
$myPicture->drawRectangle(0,0,299,259,array("R"=>0,"G"=>0,"B"=>0));
 
/* Write the picture title */ 
$myPicture->setFontProperties(array("FontName"=>"pChart/fonts/Silkscreen.ttf","FontSize"=>6));
$myPicture->drawText(10,13,"ICD in postcode '$postcode'",array("R"=>255,"G"=>255,"B"=>255));
 
/* Set the default font properties */ 
$myPicture->setFontProperties(array("FontName"=>"pChart/fonts/Forgotte.ttf","FontSize"=>10,"R"=>80,"G"=>80,"B"=>80));
 
/* Create the pPie object */ 
$PieChart = new pPie($myPicture,$MyData);
 
/* Draw an AA pie chart */ 
$PieChart->draw3DPie(160,140,array("Radius"=>70,"DrawLabels"=>TRUE,"LabelStacked"=>TRUE,"Border"=>TRUE));
 
/* Write the legend box */ 
$myPicture->setShadow(FALSE);
$PieChart->drawPieLegend(15,40,array("Alpha"=>20));
 
/* Render the picture (choose the best way) */
$myPicture->render("chart.png");
	
}
?>