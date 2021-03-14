<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/class_cuadrilemma.php");
	include_once("{$currDir}/class_cuadrilemma_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('class_cuadrilemma');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'class_cuadrilemma';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`class_cuadrilemma`.`id`" => "id",
		"`class_cuadrilemma`.`dilemma`" => "dilemma",
		"`class_cuadrilemma`.`orientation1`" => "orientation1",
		"`class_cuadrilemma`.`orientation2`" => "orientation2",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`class_cuadrilemma`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`class_cuadrilemma`.`id`" => "id",
		"`class_cuadrilemma`.`dilemma`" => "dilemma",
		"`class_cuadrilemma`.`orientation1`" => "orientation1",
		"`class_cuadrilemma`.`orientation2`" => "orientation2",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`class_cuadrilemma`.`id`" => "ID",
		"`class_cuadrilemma`.`dilemma`" => "Dilemma",
		"`class_cuadrilemma`.`orientation1`" => "Orientation1",
		"`class_cuadrilemma`.`orientation2`" => "Orientation2",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`class_cuadrilemma`.`id`" => "id",
		"`class_cuadrilemma`.`dilemma`" => "dilemma",
		"`class_cuadrilemma`.`orientation1`" => "orientation1",
		"`class_cuadrilemma`.`orientation2`" => "orientation2",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`class_cuadrilemma` ";
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
	$x->ScriptFileName = 'class_cuadrilemma_view.php';
	$x->RedirectAfterInsert = 'class_cuadrilemma_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Class cuadrilemma';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`class_cuadrilemma`.`id`';

	$x->ColWidth = [150, 150, 150, ];
	$x->ColCaption = ['Dilemma', 'Orientation1', 'Orientation2', ];
	$x->ColFieldName = ['dilemma', 'orientation1', 'orientation2', ];
	$x->ColNumber  = [2, 3, 4, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/class_cuadrilemma_templateTV.html';
	$x->SelectedTemplate = 'templates/class_cuadrilemma_templateTVS.html';
	$x->TemplateDV = 'templates/class_cuadrilemma_templateDV.html';
	$x->TemplateDVP = 'templates/class_cuadrilemma_templateDVP.html';

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
		$x->QueryWhere = "WHERE `class_cuadrilemma`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='class_cuadrilemma' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `class_cuadrilemma`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='class_cuadrilemma' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`class_cuadrilemma`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: class_cuadrilemma_init
	$render = true;
	if(function_exists('class_cuadrilemma_init')) {
		$args = [];
		$render = class_cuadrilemma_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: class_cuadrilemma_header
	$headerCode = '';
	if(function_exists('class_cuadrilemma_header')) {
		$args = [];
		$headerCode = class_cuadrilemma_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: class_cuadrilemma_footer
	$footerCode = '';
	if(function_exists('class_cuadrilemma_footer')) {
		$args = [];
		$footerCode = class_cuadrilemma_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
