<?php
// This script and data application were generated by AppGini 5.76
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/story.php");
	include("$currDir/story_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('story');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "story";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`story`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_community1`.`id`) || CHAR_LENGTH(`biblio_community1`.`com_name`), CONCAT_WS('',   `biblio_community1`.`id`, ' - ', `biblio_community1`.`com_name`), '') /* Comm name */" => "com_name",
		"`story`.`project_leader`" => "project_leader",
		"`story`.`subject`" => "subject",
		"`story`.`story`" => "story",
		"`story`.`approach`" => "approach",
		"`story`.`tags`" => "tags",
		"IF(    CHAR_LENGTH(`class_story_collab_type1`.`collab_type`), CONCAT_WS('',   `class_story_collab_type1`.`collab_type`), '') /* Collaboration status */" => "collaboration_status"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`story`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6,
		7 => 7,
		8 => '`class_story_collab_type1`.`collab_type`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`story`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_community1`.`id`) || CHAR_LENGTH(`biblio_community1`.`com_name`), CONCAT_WS('',   `biblio_community1`.`id`, ' - ', `biblio_community1`.`com_name`), '') /* Comm name */" => "com_name",
		"`story`.`project_leader`" => "project_leader",
		"`story`.`subject`" => "subject",
		"`story`.`story`" => "story",
		"`story`.`approach`" => "approach",
		"`story`.`tags`" => "tags",
		"IF(    CHAR_LENGTH(`class_story_collab_type1`.`collab_type`), CONCAT_WS('',   `class_story_collab_type1`.`collab_type`), '') /* Collaboration status */" => "collaboration_status"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`story`.`id`" => "Id",
		"IF(    CHAR_LENGTH(`biblio_community1`.`id`) || CHAR_LENGTH(`biblio_community1`.`com_name`), CONCAT_WS('',   `biblio_community1`.`id`, ' - ', `biblio_community1`.`com_name`), '') /* Comm name */" => "Comm name",
		"`story`.`project_leader`" => "Project leader",
		"`story`.`subject`" => "Subject",
		"`story`.`story`" => "Story title",
		"`story`.`approach`" => "Approach",
		"`story`.`tags`" => "Tags",
		"IF(    CHAR_LENGTH(`class_story_collab_type1`.`collab_type`), CONCAT_WS('',   `class_story_collab_type1`.`collab_type`), '') /* Collaboration status */" => "Collaboration status"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`story`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_community1`.`id`) || CHAR_LENGTH(`biblio_community1`.`com_name`), CONCAT_WS('',   `biblio_community1`.`id`, ' - ', `biblio_community1`.`com_name`), '') /* Comm name */" => "com_name",
		"`story`.`project_leader`" => "project_leader",
		"`story`.`subject`" => "subject",
		"`story`.`story`" => "story",
		"`story`.`approach`" => "approach",
		"`story`.`tags`" => "tags",
		"IF(    CHAR_LENGTH(`class_story_collab_type1`.`collab_type`), CONCAT_WS('',   `class_story_collab_type1`.`collab_type`), '') /* Collaboration status */" => "collaboration_status"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'com_name' => 'Comm name', 'collaboration_status' => 'Collaboration status');

	$x->QueryFrom = "`story` LEFT JOIN `biblio_community` as biblio_community1 ON `biblio_community1`.`id`=`story`.`com_name` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`story`.`collaboration_status` ";
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
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "story_view.php";
	$x->RedirectAfterInsert = "story_view.php";
	$x->TableTitle = "V.1. Stories";
	$x->TableIcon = "resources/table_icons/butterfly.png";
	$x->PrimaryKey = "`story`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("Id", "Comm name", "Project leader", "Subject", "Story title", "Approach", "Tags", "Collaboration status");
	$x->ColFieldName = array('id', 'com_name', 'project_leader', 'subject', 'story', 'approach', 'tags', 'collaboration_status');
	$x->ColNumber  = array(1, 2, 3, 4, 5, 6, 7, 8);

	// template paths below are based on the app main directory
	$x->Template = 'templates/story_templateTV.html';
	$x->SelectedTemplate = 'templates/story_templateTVS.html';
	$x->TemplateDV = 'templates/story_templateDV.html';
	$x->TemplateDVP = 'templates/story_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `story`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='story' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `story`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='story' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`story`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: story_init
	$render=TRUE;
	if(function_exists('story_init')){
		$args=array();
		$render=story_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: story_header
	$headerCode='';
	if(function_exists('story_header')){
		$args=array();
		$headerCode=story_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: story_footer
	$footerCode='';
	if(function_exists('story_footer')){
		$args=array();
		$footerCode=story_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>