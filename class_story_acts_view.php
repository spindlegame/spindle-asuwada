<?php
// This script and data application were generated by AppGini 5.76
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/class_story_acts.php");
	include("$currDir/class_story_acts_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('class_story_acts');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "class_story_acts";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`class_story_acts`.`id`" => "id",
		"`class_story_acts`.`act`" => "act"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`class_story_acts`.`id`',
		2 => 2
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`class_story_acts`.`id`" => "id",
		"`class_story_acts`.`act`" => "act"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`class_story_acts`.`id`" => "ID",
		"`class_story_acts`.`act`" => "Act"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`class_story_acts`.`id`" => "id",
		"`class_story_acts`.`act`" => "act"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array();

	$x->QueryFrom = "`class_story_acts` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "class_story_acts_view.php";
	$x->RedirectAfterInsert = "class_story_acts_view.php?SelectedID=#ID#";
	$x->TableTitle = "Story acts";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`class_story_acts`.`id`";

	$x->ColWidth   = array(  150);
	$x->ColCaption = array("Act");
	$x->ColFieldName = array('act');
	$x->ColNumber  = array(2);

	// template paths below are based on the app main directory
	$x->Template = 'templates/class_story_acts_templateTV.html';
	$x->SelectedTemplate = 'templates/class_story_acts_templateTVS.html';
	$x->TemplateDV = 'templates/class_story_acts_templateDV.html';
	$x->TemplateDVP = 'templates/class_story_acts_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `class_story_acts`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='class_story_acts' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `class_story_acts`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='class_story_acts' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`class_story_acts`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: class_story_acts_init
	$render=TRUE;
	if(function_exists('class_story_acts_init')){
		$args=array();
		$render=class_story_acts_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: class_story_acts_header
	$headerCode='';
	if(function_exists('class_story_acts_header')){
		$args=array();
		$headerCode=class_story_acts_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: class_story_acts_footer
	$footerCode='';
	if(function_exists('class_story_acts_footer')){
		$args=array();
		$footerCode=class_story_acts_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>