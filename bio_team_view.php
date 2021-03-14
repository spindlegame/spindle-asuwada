<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/bio_team.php");
	include_once("{$currDir}/bio_team_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('bio_team');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'bio_team';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`bio_team`.`id`" => "id",
		"`bio_team`.`team`" => "team",
		"`bio_team`.`description`" => "description",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`bio_team`.`id`',
		2 => 2,
		3 => 3,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`bio_team`.`id`" => "id",
		"`bio_team`.`team`" => "team",
		"`bio_team`.`description`" => "description",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`bio_team`.`id`" => "ID",
		"`bio_team`.`team`" => "Equipo",
		"`bio_team`.`description`" => "Descripci&#243;n",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`bio_team`.`id`" => "id",
		"`bio_team`.`team`" => "team",
		"`bio_team`.`description`" => "description",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`bio_team` ";
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
	$x->ScriptFileName = 'bio_team_view.php';
	$x->RedirectAfterInsert = 'bio_team_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Equipos biogr&#225;ficos';
	$x->TableIcon = 'resources/table_icons/reseller_account.png';
	$x->PrimaryKey = '`bio_team`.`id`';

	$x->ColWidth = [150, 150, ];
	$x->ColCaption = ['Equipo', 'Descripci&#243;n', ];
	$x->ColFieldName = ['team', 'description', ];
	$x->ColNumber  = [2, 3, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/bio_team_templateTV.html';
	$x->SelectedTemplate = 'templates/bio_team_templateTVS.html';
	$x->TemplateDV = 'templates/bio_team_templateDV.html';
	$x->TemplateDVP = 'templates/bio_team_templateDVP.html';

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
		$x->QueryWhere = "WHERE `bio_team`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='bio_team' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `bio_team`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='bio_team' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`bio_team`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: bio_team_init
	$render = true;
	if(function_exists('bio_team_init')) {
		$args = [];
		$render = bio_team_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: bio_team_header
	$headerCode = '';
	if(function_exists('bio_team_header')) {
		$args = [];
		$headerCode = bio_team_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: bio_team_footer
	$footerCode = '';
	if(function_exists('bio_team_footer')) {
		$args = [];
		$footerCode = bio_team_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
