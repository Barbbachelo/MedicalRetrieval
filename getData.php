<?php 


 /* CAT:Bar Chart */ 

 /* pChart library inclusions */ 
 include("pChart/class/pData.class.php");  
 include("pChart/class/pDraw.class.php"); 
 include("pChart/class/pImage.class.php"); 

	/* Create and populate the pData object */
	$MyData = new pData(); 
	$connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	$searchQuery = "Select PostCode, ICD from patients";
	$search = mysqli_query($connection, $searchQuery);
	while($row = mysqli_fetch_assoc($search))
	{
		$ICD[] = $row["ICD"];
		$pCode[] = $row["PostCode"];
 	}
	$count = array_count_values($ICD);
	$ICD = array_unique($ICD, SORT_REGULAR);
	
	$MyData->addPoints($count,"Number of Patients");
	$MyData->addPoints($ICD,"ICD");
	$MyData->setSerieDescription("ICD", "ICD");
	$MyData->setAbscissa("ICD");
	$MyData->setAbscissaName("ICD");
	
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
?>