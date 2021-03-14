<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/class_dilemma.php");
	include_once("{$currDir}/class_dilemma_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('class_dilemma');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'class_dilemma';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`class_dilemma`.`id`" => "id",
		"`class_dilemma`.`defense`" => "defense",
		"`class_dilemma`.`description`" => "description",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`class_dilemma`.`id`',
		2 => 2,
		3 => 3,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`class_dilemma`.`id`" => "id",
		"`class_dilemma`.`defense`" => "defense",
		"`class_dilemma`.`description`" => "description",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`class_dilemma`.`id`" => "ID",
		"`class_dilemma`.`defense`" => "Defense",
		"`class_dilemma`.`description`" => "Description",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`class_dilemma`.`id`" => "id",
		"`class_dilemma`.`defense`" => "defense",
		"`class_dilemma`.`description`" => "description",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`class_dilemma` ";
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
	$x->ScriptFileName = 'class_dilemma_view.php';
	$x->RedirectAfterInsert = 'class_dilemma_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Defense ethical categories';
	$x->TableIcon = 'resources/table_icons/universal_binary.png';
	$x->PrimaryKey = '`class_dilemma`.`id`';

	$x->ColWidth = [150, 150, ];
	$x->ColCaption = ['Defense', 'Description', ];
	$x->ColFieldName = ['defense', 'description', ];
	$x->ColNumber  = [2, 3, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/class_dilemma_templateTV.html';
	$x->SelectedTemplate = 'templates/class_dilemma_templateTVS.html';
	$x->TemplateDV = 'templates/class_dilemma_templateDV.html';
	$x->TemplateDVP = 'templates/class_dilemma_templateDVP.html';

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
		$x->QueryWhere = "WHERE `class_dilemma`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='class_dilemma' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `class_dilemma`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='class_dilemma' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`class_dilemma`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: class_dilemma_init
	$render = true;
	if(function_exists('class_dilemma_init')) {
		$args = [];
		$render = class_dilemma_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: class_dilemma_header
	$headerCode = '';
	if(function_exists('class_dilemma_header')) {
		$args = [];
		$headerCode = class_dilemma_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: class_dilemma_footer
	$footerCode = '';
	if(function_exists('class_dilemma_footer')) {
		$args = [];
		$footerCode = class_dilemma_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
