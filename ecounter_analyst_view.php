<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/ecounter_analyst.php");
	include_once("{$currDir}/ecounter_analyst_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('ecounter_analyst');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'ecounter_analyst';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`ecounter_analyst`.`id`" => "id",
		"IF(    CHAR_LENGTH(`encounter_team1`.`id`) || CHAR_LENGTH(`encounter_team1`.`team`), CONCAT_WS('',   `encounter_team1`.`id`, ' - ', `encounter_team1`.`team`), '') /* Equipo */" => "team",
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* Agente */" => "agent_id",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`), CONCAT_WS('',   `game_agent1`.`last_name`), '') /* Apellido(s) */" => "last_name",
		"IF(    CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`first_name`), '') /* Nombre(s) */" => "first_name",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`ecounter_analyst`.`id`',
		2 => 2,
		3 => 3,
		4 => '`game_agent1`.`last_name`',
		5 => '`game_agent1`.`first_name`',
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`ecounter_analyst`.`id`" => "id",
		"IF(    CHAR_LENGTH(`encounter_team1`.`id`) || CHAR_LENGTH(`encounter_team1`.`team`), CONCAT_WS('',   `encounter_team1`.`id`, ' - ', `encounter_team1`.`team`), '') /* Equipo */" => "team",
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* Agente */" => "agent_id",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`), CONCAT_WS('',   `game_agent1`.`last_name`), '') /* Apellido(s) */" => "last_name",
		"IF(    CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`first_name`), '') /* Nombre(s) */" => "first_name",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`ecounter_analyst`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`encounter_team1`.`id`) || CHAR_LENGTH(`encounter_team1`.`team`), CONCAT_WS('',   `encounter_team1`.`id`, ' - ', `encounter_team1`.`team`), '') /* Equipo */" => "Equipo",
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* Agente */" => "Agente",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`), CONCAT_WS('',   `game_agent1`.`last_name`), '') /* Apellido(s) */" => "Apellido(s)",
		"IF(    CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`first_name`), '') /* Nombre(s) */" => "Nombre(s)",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`ecounter_analyst`.`id`" => "id",
		"IF(    CHAR_LENGTH(`encounter_team1`.`id`) || CHAR_LENGTH(`encounter_team1`.`team`), CONCAT_WS('',   `encounter_team1`.`id`, ' - ', `encounter_team1`.`team`), '') /* Equipo */" => "team",
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* Agente */" => "agent_id",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`), CONCAT_WS('',   `game_agent1`.`last_name`), '') /* Apellido(s) */" => "last_name",
		"IF(    CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`first_name`), '') /* Nombre(s) */" => "first_name",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['team' => 'Equipo', 'agent_id' => 'Agente', ];

	$x->QueryFrom = "`ecounter_analyst` LEFT JOIN `encounter_team` as encounter_team1 ON `encounter_team1`.`id`=`ecounter_analyst`.`team` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`ecounter_analyst`.`agent_id` ";
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
	$x->ScriptFileName = 'ecounter_analyst_view.php';
	$x->RedirectAfterInsert = 'ecounter_analyst_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Analistas de conflictos';
	$x->TableIcon = 'resources/table_icons/user_female.png';
	$x->PrimaryKey = '`ecounter_analyst`.`id`';

	$x->ColWidth = [150, 150, 150, 150, ];
	$x->ColCaption = ['Equipo', 'Agente', 'Apellido(s)', 'Nombre(s)', ];
	$x->ColFieldName = ['team', 'agent_id', 'last_name', 'first_name', ];
	$x->ColNumber  = [2, 3, 4, 5, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/ecounter_analyst_templateTV.html';
	$x->SelectedTemplate = 'templates/ecounter_analyst_templateTVS.html';
	$x->TemplateDV = 'templates/ecounter_analyst_templateDV.html';
	$x->TemplateDVP = 'templates/ecounter_analyst_templateDVP.html';

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
		$x->QueryWhere = "WHERE `ecounter_analyst`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='ecounter_analyst' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `ecounter_analyst`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='ecounter_analyst' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`ecounter_analyst`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: ecounter_analyst_init
	$render = true;
	if(function_exists('ecounter_analyst_init')) {
		$args = [];
		$render = ecounter_analyst_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: ecounter_analyst_header
	$headerCode = '';
	if(function_exists('ecounter_analyst_header')) {
		$args = [];
		$headerCode = ecounter_analyst_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: ecounter_analyst_footer
	$footerCode = '';
	if(function_exists('ecounter_analyst_footer')) {
		$args = [];
		$footerCode = ecounter_analyst_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
