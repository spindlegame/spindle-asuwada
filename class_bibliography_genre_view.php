<?php
// This script and data application were generated by AppGini 5.31
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/class_bibliography_genre.php");
	include("$currDir/class_bibliography_genre_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('class_bibliography_genre');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "class_bibliography_genre";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV=array(   
		"`class_bibliography_genre`.`id`" => "id",
		"`class_bibliography_genre`.`genre`" => "genre"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`class_bibliography_genre`.`id`',
		2 => 2
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV=array(   
		"`class_bibliography_genre`.`id`" => "id",
		"`class_bibliography_genre`.`genre`" => "genre"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters=array(   
		"`class_bibliography_genre`.`id`" => "id",
		"`class_bibliography_genre`.`genre`" => "genre"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS=array(   
		"`class_bibliography_genre`.`id`" => "id",
		"`class_bibliography_genre`.`genre`" => "genre"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array();

	$x->QueryFrom="`class_bibliography_genre` ";
	$x->QueryWhere='';
	$x->QueryOrder='';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 0;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "class_bibliography_genre_view.php";
	$x->RedirectAfterInsert = "class_bibliography_genre_view.php?SelectedID=#ID#";
	$x->TableTitle = "Genre";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`class_bibliography_genre`.`id`";

	$x->ColWidth   = array(  150, 150);
	$x->ColCaption = array("id", "genre");
	$x->ColFieldName = array('id', 'genre');
	$x->ColNumber  = array(1, 2);

	$x->Template = 'templates/class_bibliography_genre_templateTV.html';
	$x->SelectedTemplate = 'templates/class_bibliography_genre_templateTVS.html';
	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `class_bibliography_genre`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='class_bibliography_genre' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `class_bibliography_genre`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='class_bibliography_genre' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`class_bibliography_genre`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: class_bibliography_genre_init
	$render=TRUE;
	if(function_exists('class_bibliography_genre_init')){
		$args=array();
		$render=class_bibliography_genre_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: class_bibliography_genre_header
	$headerCode='';
	if(function_exists('class_bibliography_genre_header')){
		$args=array();
		$headerCode=class_bibliography_genre_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: class_bibliography_genre_footer
	$footerCode='';
	if(function_exists('class_bibliography_genre_footer')){
		$args=array();
		$footerCode=class_bibliography_genre_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>