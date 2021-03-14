<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/class_dramatica_steps.php");
	include_once("{$currDir}/class_dramatica_steps_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('class_dramatica_steps');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'class_dramatica_steps';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`class_dramatica_steps`.`id`" => "id",
		"`class_dramatica_steps`.`step`" => "step",
		"`class_dramatica_steps`.`type`" => "type",
		"IF(    CHAR_LENGTH(`class_story_acts1`.`act`), CONCAT_WS('',   `class_story_acts1`.`act`), '') /* Act */" => "act",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`class_dramatica_steps`.`id`',
		2 => 2,
		3 => 3,
		4 => '`class_story_acts1`.`act`',
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`class_dramatica_steps`.`id`" => "id",
		"`class_dramatica_steps`.`step`" => "step",
		"`class_dramatica_steps`.`type`" => "type",
		"IF(    CHAR_LENGTH(`class_story_acts1`.`act`), CONCAT_WS('',   `class_story_acts1`.`act`), '') /* Act */" => "act",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`class_dramatica_steps`.`id`" => "ID",
		"`class_dramatica_steps`.`step`" => "Step",
		"`class_dramatica_steps`.`type`" => "Type",
		"IF(    CHAR_LENGTH(`class_story_acts1`.`act`), CONCAT_WS('',   `class_story_acts1`.`act`), '') /* Act */" => "Act",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`class_dramatica_steps`.`id`" => "id",
		"`class_dramatica_steps`.`step`" => "step",
		"`class_dramatica_steps`.`type`" => "type",
		"IF(    CHAR_LENGTH(`class_story_acts1`.`act`), CONCAT_WS('',   `class_story_acts1`.`act`), '') /* Act */" => "act",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['act' => 'Act', ];

	$x->QueryFrom = "`class_dramatica_steps` LEFT JOIN `class_story_acts` as class_story_acts1 ON `class_story_acts1`.`id`=`class_dramatica_steps`.`act` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm['view'] == 0 ? 1 : 0);
	$x->AllowDelete = $perm['delete'];
	$x->AllowMassDelete = (getLoggedAdmin() !== false);
	$x->AllowInsert = $perm['insert'];
	$x->AllowUpdate = $perm['edit'];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = (getLoggedAdmin() !== false);
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'class_dramatica_steps_view.php';
	$x->RedirectAfterInsert = 'class_dramatica_steps_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Steps';
	$x->TableIcon = 'resources/table_icons/blackboard_steps.png';
	$x->PrimaryKey = '`class_dramatica_steps`.`id`';

	$x->ColWidth = [150, 150, 150, ];
	$x->ColCaption = ['Step', 'Type', 'Act', ];
	$x->ColFieldName = ['step', 'type', 'act', ];
	$x->ColNumber  = [2, 3, 4, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/class_dramatica_steps_templateTV.html';
	$x->SelectedTemplate = 'templates/class_dramatica_steps_templateTVS.html';
	$x->TemplateDV = 'templates/class_dramatica_steps_templateDV.html';
	$x->TemplateDVP = 'templates/class_dramatica_steps_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, ['user', 'group'])) { $DisplayRecords = 'all'; }
	if($perm['view'] == 1 || ($perm['view'] > 1 && $DisplayRecords == 'user' && !$_REQUEST['NoFilter_x'])) { // view owner only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `class_dramatica_steps`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='class_dramatica_steps' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `class_dramatica_steps`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='class_dramatica_steps' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`class_dramatica_steps`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: class_dramatica_steps_init
	$render = true;
	if(function_exists('class_dramatica_steps_init')) {
		$args = [];
		$render = class_dramatica_steps_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: class_dramatica_steps_header
	$headerCode = '';
	if(function_exists('class_dramatica_steps_header')) {
		$args = [];
		$headerCode = class_dramatica_steps_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: class_dramatica_steps_footer
	$footerCode = '';
	if(function_exists('class_dramatica_steps_footer')) {
		$args = [];
		$footerCode = class_dramatica_steps_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
