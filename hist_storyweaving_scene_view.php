<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/hist_storyweaving_scene.php");
	include_once("{$currDir}/hist_storyweaving_scene_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('hist_storyweaving_scene');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'hist_storyweaving_scene';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`hist_storyweaving_scene`.`id`" => "id",
		"IF(    CHAR_LENGTH(`hist_story1`.`id`) || CHAR_LENGTH(`hist_story1`.`story_title`), CONCAT_WS('',   `hist_story1`.`id`, '   ', `hist_story1`.`story_title`), '') /* Story */" => "story",
		"IF(    CHAR_LENGTH(`class_dramatica_steps1`.`step`), CONCAT_WS('',   `class_dramatica_steps1`.`step`), '') /* Step */" => "step",
		"IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') /* Throughline */" => "throughline",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* Domain */" => "domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* Concern */" => "concern",
		"IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') /* Issue */" => "issue",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Theme */" => "theme",
		"`hist_storyweaving_scene`.`sequence`" => "sequence",
		"`hist_storyweaving_scene`.`encoding`" => "encoding",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`hist_storyweaving_scene`.`id`',
		2 => 2,
		3 => '`class_dramatica_steps1`.`step`',
		4 => '`class_dramatica_throughline1`.`throughline`',
		5 => '`class_dramatica_domain1`.`domain`',
		6 => '`class_dramatica_concern1`.`concern`',
		7 => '`class_dramatica_issue1`.`issue`',
		8 => '`class_dramatica_themes1`.`theme`',
		9 => 9,
		10 => 10,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`hist_storyweaving_scene`.`id`" => "id",
		"IF(    CHAR_LENGTH(`hist_story1`.`id`) || CHAR_LENGTH(`hist_story1`.`story_title`), CONCAT_WS('',   `hist_story1`.`id`, '   ', `hist_story1`.`story_title`), '') /* Story */" => "story",
		"IF(    CHAR_LENGTH(`class_dramatica_steps1`.`step`), CONCAT_WS('',   `class_dramatica_steps1`.`step`), '') /* Step */" => "step",
		"IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') /* Throughline */" => "throughline",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* Domain */" => "domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* Concern */" => "concern",
		"IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') /* Issue */" => "issue",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Theme */" => "theme",
		"`hist_storyweaving_scene`.`sequence`" => "sequence",
		"`hist_storyweaving_scene`.`encoding`" => "encoding",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`hist_storyweaving_scene`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`hist_story1`.`id`) || CHAR_LENGTH(`hist_story1`.`story_title`), CONCAT_WS('',   `hist_story1`.`id`, '   ', `hist_story1`.`story_title`), '') /* Story */" => "Story",
		"IF(    CHAR_LENGTH(`class_dramatica_steps1`.`step`), CONCAT_WS('',   `class_dramatica_steps1`.`step`), '') /* Step */" => "Step",
		"IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') /* Throughline */" => "Throughline",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* Domain */" => "Domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* Concern */" => "Concern",
		"IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') /* Issue */" => "Issue",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Theme */" => "Theme",
		"`hist_storyweaving_scene`.`sequence`" => "Sequence",
		"`hist_storyweaving_scene`.`encoding`" => "Encoding",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`hist_storyweaving_scene`.`id`" => "id",
		"IF(    CHAR_LENGTH(`hist_story1`.`id`) || CHAR_LENGTH(`hist_story1`.`story_title`), CONCAT_WS('',   `hist_story1`.`id`, '   ', `hist_story1`.`story_title`), '') /* Story */" => "story",
		"IF(    CHAR_LENGTH(`class_dramatica_steps1`.`step`), CONCAT_WS('',   `class_dramatica_steps1`.`step`), '') /* Step */" => "step",
		"IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') /* Throughline */" => "throughline",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* Domain */" => "domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* Concern */" => "concern",
		"IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') /* Issue */" => "issue",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Theme */" => "theme",
		"`hist_storyweaving_scene`.`sequence`" => "sequence",
		"`hist_storyweaving_scene`.`encoding`" => "encoding",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['story' => 'Story', 'step' => 'Step', 'throughline' => 'Throughline', 'domain' => 'Domain', 'concern' => 'Concern', 'issue' => 'Issue', 'theme' => 'Theme', ];

	$x->QueryFrom = "`hist_storyweaving_scene` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_storyweaving_scene`.`story` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`hist_storyweaving_scene`.`step` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`hist_storyweaving_scene`.`throughline` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`hist_storyweaving_scene`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`hist_storyweaving_scene`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`hist_storyweaving_scene`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`hist_storyweaving_scene`.`theme` ";
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
	$x->ScriptFileName = 'hist_storyweaving_scene_view.php';
	$x->RedirectAfterInsert = 'hist_storyweaving_scene_view.php?SelectedID=#ID#';
	$x->TableTitle = 'History storyweaving scenes';
	$x->TableIcon = 'resources/table_icons/layers_map.png';
	$x->PrimaryKey = '`hist_storyweaving_scene`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['ID', 'Story', 'Step', 'Throughline', 'Domain', 'Concern', 'Issue', 'Theme', 'Sequence', 'Encoding', ];
	$x->ColFieldName = ['id', 'story', 'step', 'throughline', 'domain', 'concern', 'issue', 'theme', 'sequence', 'encoding', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/hist_storyweaving_scene_templateTV.html';
	$x->SelectedTemplate = 'templates/hist_storyweaving_scene_templateTVS.html';
	$x->TemplateDV = 'templates/hist_storyweaving_scene_templateDV.html';
	$x->TemplateDVP = 'templates/hist_storyweaving_scene_templateDVP.html';

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
		$x->QueryWhere = "WHERE `hist_storyweaving_scene`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='hist_storyweaving_scene' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `hist_storyweaving_scene`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='hist_storyweaving_scene' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`hist_storyweaving_scene`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: hist_storyweaving_scene_init
	$render = true;
	if(function_exists('hist_storyweaving_scene_init')) {
		$args = [];
		$render = hist_storyweaving_scene_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: hist_storyweaving_scene_header
	$headerCode = '';
	if(function_exists('hist_storyweaving_scene_header')) {
		$args = [];
		$headerCode = hist_storyweaving_scene_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: hist_storyweaving_scene_footer
	$footerCode = '';
	if(function_exists('hist_storyweaving_scene_footer')) {
		$args = [];
		$footerCode = hist_storyweaving_scene_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
