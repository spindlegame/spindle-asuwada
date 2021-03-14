<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/biblio_analyst.php");
	include_once("{$currDir}/biblio_analyst_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('biblio_analyst');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'biblio_analyst';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`biblio_analyst`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_team1`.`team`), CONCAT_WS('',   `biblio_team1`.`team`), '') /* Equipo */" => "team",
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* ID Agente */" => "author_id",
		"IF(    CHAR_LENGTH(`game_agent2`.`memberID`), CONCAT_WS('',   `game_agent2`.`memberID`), '') /* Author memberid */" => "author_memberid",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`), CONCAT_WS('',   `game_agent1`.`last_name`), '') /* Apellido(s) */" => "last_name",
		"IF(    CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`first_name`), '') /* First name(s) */" => "first_name",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`biblio_analyst`.`id`',
		2 => '`biblio_team1`.`team`',
		3 => 3,
		4 => '`game_agent2`.`memberID`',
		5 => '`game_agent1`.`last_name`',
		6 => '`game_agent1`.`first_name`',
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`biblio_analyst`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_team1`.`team`), CONCAT_WS('',   `biblio_team1`.`team`), '') /* Equipo */" => "team",
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* ID Agente */" => "author_id",
		"IF(    CHAR_LENGTH(`game_agent2`.`memberID`), CONCAT_WS('',   `game_agent2`.`memberID`), '') /* Author memberid */" => "author_memberid",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`), CONCAT_WS('',   `game_agent1`.`last_name`), '') /* Apellido(s) */" => "last_name",
		"IF(    CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`first_name`), '') /* First name(s) */" => "first_name",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`biblio_analyst`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`biblio_team1`.`team`), CONCAT_WS('',   `biblio_team1`.`team`), '') /* Equipo */" => "Equipo",
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* ID Agente */" => "ID Agente",
		"IF(    CHAR_LENGTH(`game_agent2`.`memberID`), CONCAT_WS('',   `game_agent2`.`memberID`), '') /* Author memberid */" => "Author memberid",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`), CONCAT_WS('',   `game_agent1`.`last_name`), '') /* Apellido(s) */" => "Apellido(s)",
		"IF(    CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`first_name`), '') /* First name(s) */" => "First name(s)",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`biblio_analyst`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_team1`.`team`), CONCAT_WS('',   `biblio_team1`.`team`), '') /* Equipo */" => "team",
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* ID Agente */" => "author_id",
		"IF(    CHAR_LENGTH(`game_agent2`.`memberID`), CONCAT_WS('',   `game_agent2`.`memberID`), '') /* Author memberid */" => "author_memberid",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`), CONCAT_WS('',   `game_agent1`.`last_name`), '') /* Apellido(s) */" => "last_name",
		"IF(    CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`first_name`), '') /* First name(s) */" => "first_name",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['team' => 'Equipo', 'author_id' => 'ID Agente', 'author_memberid' => 'Author memberid', ];

	$x->QueryFrom = "`biblio_analyst` LEFT JOIN `biblio_team` as biblio_team1 ON `biblio_team1`.`id`=`biblio_analyst`.`team` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_analyst`.`author_id` LEFT JOIN `game_agent` as game_agent2 ON `game_agent2`.`id`=`biblio_analyst`.`author_memberid` ";
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
	$x->ScriptFileName = 'biblio_analyst_view.php';
	$x->RedirectAfterInsert = 'biblio_analyst_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Bibli&#243;grafos';
	$x->TableIcon = 'resources/table_icons/user_policeman.png';
	$x->PrimaryKey = '`biblio_analyst`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, ];
	$x->ColCaption = ['ID', 'Equipo', 'ID Agente', 'Apellido(s)', 'First name(s)', ];
	$x->ColFieldName = ['id', 'team', 'author_id', 'last_name', 'first_name', ];
	$x->ColNumber  = [1, 2, 3, 5, 6, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/biblio_analyst_templateTV.html';
	$x->SelectedTemplate = 'templates/biblio_analyst_templateTVS.html';
	$x->TemplateDV = 'templates/biblio_analyst_templateDV.html';
	$x->TemplateDVP = 'templates/biblio_analyst_templateDVP.html';

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
		$x->QueryWhere = "WHERE `biblio_analyst`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='biblio_analyst' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `biblio_analyst`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='biblio_analyst' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`biblio_analyst`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: biblio_analyst_init
	$render = true;
	if(function_exists('biblio_analyst_init')) {
		$args = [];
		$render = biblio_analyst_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: biblio_analyst_header
	$headerCode = '';
	if(function_exists('biblio_analyst_header')) {
		$args = [];
		$headerCode = biblio_analyst_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: biblio_analyst_footer
	$footerCode = '';
	if(function_exists('biblio_analyst_footer')) {
		$args = [];
		$footerCode = biblio_analyst_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
