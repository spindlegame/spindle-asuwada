<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/biblio_author.php");
	include_once("{$currDir}/biblio_author_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('biblio_author');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'biblio_author';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* Game agent */" => "game_agent_id",
		"`biblio_author`.`memberID`" => "memberID",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`last_name`, ', ', `game_agent1`.`first_name`), '') /* Agent name */" => "agent_name",
		"`biblio_author`.`id`" => "id",
		"`biblio_author`.`img`" => "img",
		"`biblio_author`.`groupID`" => "groupID",
		"IF(    CHAR_LENGTH(`class_agent_selection1`.`selection_phase`), CONCAT_WS('',   `class_agent_selection1`.`selection_phase`), '') /* Selection class */" => "selection_class",
		"IF(    CHAR_LENGTH(`class_agent_type11`.`type`), CONCAT_WS('',   `class_agent_type11`.`type`), '') /* Agent type 1 */" => "agenttype1",
		"IF(    CHAR_LENGTH(`class_agent_type21`.`type`), CONCAT_WS('',   `class_agent_type21`.`type`), '') /* Agent type 2 */" => "agenttype2",
		"IF(    CHAR_LENGTH(`class_gender1`.`gender`), CONCAT_WS('',   `class_gender1`.`gender`), '') /* Gender */" => "gender",
		"`biblio_author`.`last_name`" => "last_name",
		"`biblio_author`.`first_name`" => "first_name",
		"`biblio_author`.`other_name`" => "other_name",
		"DATE_FORMAT(`biblio_author`.`birthday`, '%Y-%m-%d %H:%i')" => "birthday",
		"`biblio_author`.`birth_location`" => "birth_location",
		"`biblio_author`.`birth_location_map`" => "birth_location_map",
		"DATE_FORMAT(`biblio_author`.`deathday`, '%Y-%m-%d %H:%i')" => "deathday",
		"`biblio_author`.`death_location`" => "death_location",
		"`biblio_author`.`workplace`" => "workplace",
		"`biblio_author`.`knows`" => "knows",
		"`biblio_author`.`shortbio`" => "shortbio",
		"IF(    CHAR_LENGTH(`class_evaluation1`.`evaluation_type`), CONCAT_WS('',   `class_evaluation1`.`evaluation_type`), '') /* Data evaluation */" => "data_evaluation",
		"`biblio_author`.`authority_record`" => "authority_record",
		"IF(    CHAR_LENGTH(`class_authority_agent1`.`abbreviation`) || CHAR_LENGTH(`class_authority_agent1`.`authority_name`), CONCAT_WS('',   `class_authority_agent1`.`abbreviation`, '   ', `class_authority_agent1`.`authority_name`), '') /* Authority organization */" => "authority_organization",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => 1,
		2 => 2,
		3 => 3,
		4 => '`biblio_author`.`id`',
		5 => 5,
		6 => 6,
		7 => '`class_agent_selection1`.`selection_phase`',
		8 => '`class_agent_type11`.`type`',
		9 => '`class_agent_type21`.`type`',
		10 => '`class_gender1`.`gender`',
		11 => 11,
		12 => 12,
		13 => 13,
		14 => '`biblio_author`.`birthday`',
		15 => 15,
		16 => 16,
		17 => '`biblio_author`.`deathday`',
		18 => 18,
		19 => 19,
		20 => 20,
		21 => 21,
		22 => '`class_evaluation1`.`evaluation_type`',
		23 => 23,
		24 => 24,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* Game agent */" => "game_agent_id",
		"`biblio_author`.`memberID`" => "memberID",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`last_name`, ', ', `game_agent1`.`first_name`), '') /* Agent name */" => "agent_name",
		"`biblio_author`.`id`" => "id",
		"`biblio_author`.`img`" => "img",
		"`biblio_author`.`groupID`" => "groupID",
		"IF(    CHAR_LENGTH(`class_agent_selection1`.`selection_phase`), CONCAT_WS('',   `class_agent_selection1`.`selection_phase`), '') /* Selection class */" => "selection_class",
		"IF(    CHAR_LENGTH(`class_agent_type11`.`type`), CONCAT_WS('',   `class_agent_type11`.`type`), '') /* Agent type 1 */" => "agenttype1",
		"IF(    CHAR_LENGTH(`class_agent_type21`.`type`), CONCAT_WS('',   `class_agent_type21`.`type`), '') /* Agent type 2 */" => "agenttype2",
		"IF(    CHAR_LENGTH(`class_gender1`.`gender`), CONCAT_WS('',   `class_gender1`.`gender`), '') /* Gender */" => "gender",
		"`biblio_author`.`last_name`" => "last_name",
		"`biblio_author`.`first_name`" => "first_name",
		"`biblio_author`.`other_name`" => "other_name",
		"DATE_FORMAT(`biblio_author`.`birthday`, '%Y-%m-%d %H:%i')" => "birthday",
		"`biblio_author`.`birth_location`" => "birth_location",
		"`biblio_author`.`birth_location_map`" => "birth_location_map",
		"DATE_FORMAT(`biblio_author`.`deathday`, '%Y-%m-%d %H:%i')" => "deathday",
		"`biblio_author`.`death_location`" => "death_location",
		"`biblio_author`.`workplace`" => "workplace",
		"`biblio_author`.`knows`" => "knows",
		"`biblio_author`.`shortbio`" => "shortbio",
		"IF(    CHAR_LENGTH(`class_evaluation1`.`evaluation_type`), CONCAT_WS('',   `class_evaluation1`.`evaluation_type`), '') /* Data evaluation */" => "data_evaluation",
		"`biblio_author`.`authority_record`" => "authority_record",
		"IF(    CHAR_LENGTH(`class_authority_agent1`.`abbreviation`) || CHAR_LENGTH(`class_authority_agent1`.`authority_name`), CONCAT_WS('',   `class_authority_agent1`.`abbreviation`, '   ', `class_authority_agent1`.`authority_name`), '') /* Authority organization */" => "authority_organization",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* Game agent */" => "Game agent",
		"`biblio_author`.`memberID`" => "MemberID",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`last_name`, ', ', `game_agent1`.`first_name`), '') /* Agent name */" => "Agent name",
		"`biblio_author`.`id`" => "ID",
		"`biblio_author`.`groupID`" => "Group",
		"IF(    CHAR_LENGTH(`class_agent_selection1`.`selection_phase`), CONCAT_WS('',   `class_agent_selection1`.`selection_phase`), '') /* Selection class */" => "Selection class",
		"IF(    CHAR_LENGTH(`class_agent_type11`.`type`), CONCAT_WS('',   `class_agent_type11`.`type`), '') /* Agent type 1 */" => "Agent type 1",
		"IF(    CHAR_LENGTH(`class_agent_type21`.`type`), CONCAT_WS('',   `class_agent_type21`.`type`), '') /* Agent type 2 */" => "Agent type 2",
		"IF(    CHAR_LENGTH(`class_gender1`.`gender`), CONCAT_WS('',   `class_gender1`.`gender`), '') /* Gender */" => "Gender",
		"`biblio_author`.`last_name`" => "Last name(s)",
		"`biblio_author`.`first_name`" => "First name(s)",
		"`biblio_author`.`other_name`" => "Other name(s)",
		"`biblio_author`.`birthday`" => "Date of birth",
		"`biblio_author`.`birth_location`" => "Location of birth",
		"`biblio_author`.`birth_location_map`" => "Map",
		"`biblio_author`.`deathday`" => "Day of decease",
		"`biblio_author`.`death_location`" => "Location of death",
		"`biblio_author`.`workplace`" => "Workplace",
		"`biblio_author`.`knows`" => "Knows",
		"`biblio_author`.`shortbio`" => "Short biography",
		"IF(    CHAR_LENGTH(`class_evaluation1`.`evaluation_type`), CONCAT_WS('',   `class_evaluation1`.`evaluation_type`), '') /* Data evaluation */" => "Data evaluation",
		"`biblio_author`.`authority_record`" => "Authority code",
		"IF(    CHAR_LENGTH(`class_authority_agent1`.`abbreviation`) || CHAR_LENGTH(`class_authority_agent1`.`authority_name`), CONCAT_WS('',   `class_authority_agent1`.`abbreviation`, '   ', `class_authority_agent1`.`authority_name`), '') /* Authority organization */" => "Authority organization",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* Game agent */" => "game_agent_id",
		"`biblio_author`.`memberID`" => "memberID",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`last_name`, ', ', `game_agent1`.`first_name`), '') /* Agent name */" => "agent_name",
		"`biblio_author`.`id`" => "id",
		"`biblio_author`.`groupID`" => "groupID",
		"IF(    CHAR_LENGTH(`class_agent_selection1`.`selection_phase`), CONCAT_WS('',   `class_agent_selection1`.`selection_phase`), '') /* Selection class */" => "selection_class",
		"IF(    CHAR_LENGTH(`class_agent_type11`.`type`), CONCAT_WS('',   `class_agent_type11`.`type`), '') /* Agent type 1 */" => "agenttype1",
		"IF(    CHAR_LENGTH(`class_agent_type21`.`type`), CONCAT_WS('',   `class_agent_type21`.`type`), '') /* Agent type 2 */" => "agenttype2",
		"IF(    CHAR_LENGTH(`class_gender1`.`gender`), CONCAT_WS('',   `class_gender1`.`gender`), '') /* Gender */" => "gender",
		"`biblio_author`.`last_name`" => "last_name",
		"`biblio_author`.`first_name`" => "first_name",
		"`biblio_author`.`other_name`" => "other_name",
		"DATE_FORMAT(`biblio_author`.`birthday`, '%Y-%m-%d %H:%i')" => "birthday",
		"`biblio_author`.`birth_location`" => "birth_location",
		"`biblio_author`.`birth_location_map`" => "birth_location_map",
		"DATE_FORMAT(`biblio_author`.`deathday`, '%Y-%m-%d %H:%i')" => "deathday",
		"`biblio_author`.`death_location`" => "death_location",
		"`biblio_author`.`workplace`" => "workplace",
		"`biblio_author`.`knows`" => "knows",
		"`biblio_author`.`shortbio`" => "shortbio",
		"IF(    CHAR_LENGTH(`class_evaluation1`.`evaluation_type`), CONCAT_WS('',   `class_evaluation1`.`evaluation_type`), '') /* Data evaluation */" => "data_evaluation",
		"`biblio_author`.`authority_record`" => "authority_record",
		"IF(    CHAR_LENGTH(`class_authority_agent1`.`abbreviation`) || CHAR_LENGTH(`class_authority_agent1`.`authority_name`), CONCAT_WS('',   `class_authority_agent1`.`abbreviation`, '   ', `class_authority_agent1`.`authority_name`), '') /* Authority organization */" => "authority_organization",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['game_agent_id' => 'Game agent', 'selection_class' => 'Selection class', 'agenttype1' => 'Agent type 1', 'agenttype2' => 'Agent type 2', 'gender' => 'Gender', 'data_evaluation' => 'Data evaluation', 'authority_organization' => 'Authority organization', ];

	$x->QueryFrom = "`biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ";
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
	$x->ScriptFileName = 'biblio_author_view.php';
	$x->RedirectAfterInsert = 'biblio_author_view.php';
	$x->TableTitle = 'Authors';
	$x->TableIcon = 'resources/table_icons/user_edit.png';
	$x->PrimaryKey = '`biblio_author`.`id`';
	$x->DefaultSortField = '11';
	$x->DefaultSortDirection = 'asc';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Game agent', 'MemberID', 'Agent name', 'ID', 'Img', 'Group', 'Selection class', 'Agent type 1', 'Agent type 2', 'Gender', 'Last name(s)', 'First name(s)', 'Other name(s)', 'Date of birth', 'Location of birth', 'Map', 'Day of decease', 'Location of death', 'Workplace', 'Knows', 'Data evaluation', 'Authority code', 'Authority organization', ];
	$x->ColFieldName = ['game_agent_id', 'memberID', 'agent_name', 'id', 'img', 'groupID', 'selection_class', 'agenttype1', 'agenttype2', 'gender', 'last_name', 'first_name', 'other_name', 'birthday', 'birth_location', 'birth_location_map', 'deathday', 'death_location', 'workplace', 'knows', 'data_evaluation', 'authority_record', 'authority_organization', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 22, 23, 24, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/biblio_author_templateTV.html';
	$x->SelectedTemplate = 'templates/biblio_author_templateTVS.html';
	$x->TemplateDV = 'templates/biblio_author_templateDV.html';
	$x->TemplateDVP = 'templates/biblio_author_templateDVP.html';

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
		$x->QueryWhere = "WHERE `biblio_author`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='biblio_author' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `biblio_author`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='biblio_author' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`biblio_author`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: biblio_author_init
	$render = true;
	if(function_exists('biblio_author_init')) {
		$args = [];
		$render = biblio_author_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: biblio_author_header
	$headerCode = '';
	if(function_exists('biblio_author_header')) {
		$args = [];
		$headerCode = biblio_author_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: biblio_author_footer
	$footerCode = '';
	if(function_exists('biblio_author_footer')) {
		$args = [];
		$footerCode = biblio_author_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
