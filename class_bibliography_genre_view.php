<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/class_bibliography_genre.php");
	include_once("{$currDir}/class_bibliography_genre_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('class_bibliography_genre');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'class_bibliography_genre';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`class_bibliography_genre`.`id`" => "id",
		"`class_bibliography_genre`.`genre`" => "genre",
		"`class_bibliography_genre`.`description`" => "description",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`class_bibliography_genre`.`id`',
		2 => 2,
		3 => 3,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`class_bibliography_genre`.`id`" => "id",
		"`class_bibliography_genre`.`genre`" => "genre",
		"`class_bibliography_genre`.`description`" => "description",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`class_bibliography_genre`.`id`" => "Id",
		"`class_bibliography_genre`.`genre`" => "Genre",
		"`class_bibliography_genre`.`description`" => "Description",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`class_bibliography_genre`.`id`" => "id",
		"`class_bibliography_genre`.`genre`" => "genre",
		"`class_bibliography_genre`.`description`" => "description",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`class_bibliography_genre` ";
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
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'class_bibliography_genre_view.php';
	$x->RedirectAfterInsert = 'class_bibliography_genre_view.php';
	$x->TableTitle = 'Genre';
	$x->TableIcon = 'resources/table_icons/text_drama.png';
	$x->PrimaryKey = '`class_bibliography_genre`.`id`';

	$x->ColWidth = [150, 150, 150, ];
	$x->ColCaption = ['Id', 'Genre', 'Description', ];
	$x->ColFieldName = ['id', 'genre', 'description', ];
	$x->ColNumber  = [1, 2, 3, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/class_bibliography_genre_templateTV.html';
	$x->SelectedTemplate = 'templates/class_bibliography_genre_templateTVS.html';
	$x->TemplateDV = 'templates/class_bibliography_genre_templateDV.html';
	$x->TemplateDVP = 'templates/class_bibliography_genre_templateDVP.html';

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
		$x->QueryWhere = "WHERE `class_bibliography_genre`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='class_bibliography_genre' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `class_bibliography_genre`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='class_bibliography_genre' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`class_bibliography_genre`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: class_bibliography_genre_init
	$render = true;
	if(function_exists('class_bibliography_genre_init')) {
		$args = [];
		$render = class_bibliography_genre_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: class_bibliography_genre_header
	$headerCode = '';
	if(function_exists('class_bibliography_genre_header')) {
		$args = [];
		$headerCode = class_bibliography_genre_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: class_bibliography_genre_footer
	$footerCode = '';
	if(function_exists('class_bibliography_genre_footer')) {
		$args = [];
		$footerCode = class_bibliography_genre_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
