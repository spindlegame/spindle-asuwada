<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/bio_story.php");
	include_once("{$currDir}/bio_story_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('bio_story');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'bio_story';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`bio_story`.`id`" => "id",
		"IF(    CHAR_LENGTH(`bio_team1`.`team`), CONCAT_WS('',   `bio_team1`.`team`), '') /* Bio team */" => "bio_team",
		"IF(    CHAR_LENGTH(`bio_author1`.`id`) || CHAR_LENGTH(`bio_author1`.`author_memberid`), CONCAT_WS('',   `bio_author1`.`id`, '   ', `bio_author1`.`author_memberid`), '') /* Author ID */" => "author_id",
		"IF(    CHAR_LENGTH(`bio_author1`.`last_name`) || CHAR_LENGTH(`bio_author1`.`first_name`), CONCAT_WS('',   `bio_author1`.`last_name`, ', ', `bio_author1`.`first_name`), '') /* Author name */" => "author_name",
		"IF(    CHAR_LENGTH(`class_bibliography_type1`.`type`), CONCAT_WS('',   `class_bibliography_type1`.`type`), '') /* Type */" => "type",
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* Subject */" => "agent_id",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`last_name`, ', ', `game_agent1`.`first_name`), '') /* Subject name */" => "agent_name",
		"`bio_story`.`story_title`" => "story_title",
		"`bio_story`.`approach`" => "approach",
		"`bio_story`.`tags`" => "tags",
		"IF(    CHAR_LENGTH(`class_story_collab_type1`.`collab_type`), CONCAT_WS('',   `class_story_collab_type1`.`collab_type`), '') /* Collaboration status */" => "collaboration_status",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`bio_story`.`id`',
		2 => '`bio_team1`.`team`',
		3 => 3,
		4 => 4,
		5 => '`class_bibliography_type1`.`type`',
		6 => 6,
		7 => 7,
		8 => 8,
		9 => 9,
		10 => 10,
		11 => '`class_story_collab_type1`.`collab_type`',
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`bio_story`.`id`" => "id",
		"IF(    CHAR_LENGTH(`bio_team1`.`team`), CONCAT_WS('',   `bio_team1`.`team`), '') /* Bio team */" => "bio_team",
		"IF(    CHAR_LENGTH(`bio_author1`.`id`) || CHAR_LENGTH(`bio_author1`.`author_memberid`), CONCAT_WS('',   `bio_author1`.`id`, '   ', `bio_author1`.`author_memberid`), '') /* Author ID */" => "author_id",
		"IF(    CHAR_LENGTH(`bio_author1`.`last_name`) || CHAR_LENGTH(`bio_author1`.`first_name`), CONCAT_WS('',   `bio_author1`.`last_name`, ', ', `bio_author1`.`first_name`), '') /* Author name */" => "author_name",
		"IF(    CHAR_LENGTH(`class_bibliography_type1`.`type`), CONCAT_WS('',   `class_bibliography_type1`.`type`), '') /* Type */" => "type",
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* Subject */" => "agent_id",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`last_name`, ', ', `game_agent1`.`first_name`), '') /* Subject name */" => "agent_name",
		"`bio_story`.`story_title`" => "story_title",
		"`bio_story`.`approach`" => "approach",
		"`bio_story`.`tags`" => "tags",
		"IF(    CHAR_LENGTH(`class_story_collab_type1`.`collab_type`), CONCAT_WS('',   `class_story_collab_type1`.`collab_type`), '') /* Collaboration status */" => "collaboration_status",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`bio_story`.`id`" => "Id",
		"IF(    CHAR_LENGTH(`bio_team1`.`team`), CONCAT_WS('',   `bio_team1`.`team`), '') /* Bio team */" => "Bio team",
		"IF(    CHAR_LENGTH(`bio_author1`.`id`) || CHAR_LENGTH(`bio_author1`.`author_memberid`), CONCAT_WS('',   `bio_author1`.`id`, '   ', `bio_author1`.`author_memberid`), '') /* Author ID */" => "Author ID",
		"IF(    CHAR_LENGTH(`bio_author1`.`last_name`) || CHAR_LENGTH(`bio_author1`.`first_name`), CONCAT_WS('',   `bio_author1`.`last_name`, ', ', `bio_author1`.`first_name`), '') /* Author name */" => "Author name",
		"IF(    CHAR_LENGTH(`class_bibliography_type1`.`type`), CONCAT_WS('',   `class_bibliography_type1`.`type`), '') /* Type */" => "Type",
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* Subject */" => "Subject",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`last_name`, ', ', `game_agent1`.`first_name`), '') /* Subject name */" => "Subject name",
		"`bio_story`.`story_title`" => "Story title",
		"`bio_story`.`approach`" => "Approach",
		"`bio_story`.`tags`" => "Tags",
		"IF(    CHAR_LENGTH(`class_story_collab_type1`.`collab_type`), CONCAT_WS('',   `class_story_collab_type1`.`collab_type`), '') /* Collaboration status */" => "Collaboration status",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`bio_story`.`id`" => "id",
		"IF(    CHAR_LENGTH(`bio_team1`.`team`), CONCAT_WS('',   `bio_team1`.`team`), '') /* Bio team */" => "bio_team",
		"IF(    CHAR_LENGTH(`bio_author1`.`id`) || CHAR_LENGTH(`bio_author1`.`author_memberid`), CONCAT_WS('',   `bio_author1`.`id`, '   ', `bio_author1`.`author_memberid`), '') /* Author ID */" => "author_id",
		"IF(    CHAR_LENGTH(`bio_author1`.`last_name`) || CHAR_LENGTH(`bio_author1`.`first_name`), CONCAT_WS('',   `bio_author1`.`last_name`, ', ', `bio_author1`.`first_name`), '') /* Author name */" => "author_name",
		"IF(    CHAR_LENGTH(`class_bibliography_type1`.`type`), CONCAT_WS('',   `class_bibliography_type1`.`type`), '') /* Type */" => "type",
		"IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`), '') /* Subject */" => "agent_id",
		"IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`last_name`, ', ', `game_agent1`.`first_name`), '') /* Subject name */" => "agent_name",
		"`bio_story`.`story_title`" => "story_title",
		"`bio_story`.`approach`" => "approach",
		"`bio_story`.`tags`" => "tags",
		"IF(    CHAR_LENGTH(`class_story_collab_type1`.`collab_type`), CONCAT_WS('',   `class_story_collab_type1`.`collab_type`), '') /* Collaboration status */" => "collaboration_status",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['bio_team' => 'Bio team', 'author_id' => 'Author ID', 'type' => 'Type', 'agent_id' => 'Subject', 'collaboration_status' => 'Collaboration status', ];

	$x->QueryFrom = "`bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ";
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
	$x->ScriptFileName = 'bio_story_view.php';
	$x->RedirectAfterInsert = 'bio_story_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Biographies';
	$x->TableIcon = 'resources/table_icons/butterfly.png';
	$x->PrimaryKey = '`bio_story`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Id', 'Bio team', 'Author ID', 'Author name', 'Type', 'Subject', 'Subject name', 'Story title', 'Approach', 'Tags', 'Collaboration status', ];
	$x->ColFieldName = ['id', 'bio_team', 'author_id', 'author_name', 'type', 'agent_id', 'agent_name', 'story_title', 'approach', 'tags', 'collaboration_status', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/bio_story_templateTV.html';
	$x->SelectedTemplate = 'templates/bio_story_templateTVS.html';
	$x->TemplateDV = 'templates/bio_story_templateDV.html';
	$x->TemplateDVP = 'templates/bio_story_templateDVP.html';

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
		$x->QueryWhere = "WHERE `bio_story`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='bio_story' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `bio_story`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='bio_story' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`bio_story`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: bio_story_init
	$render = true;
	if(function_exists('bio_story_init')) {
		$args = [];
		$render = bio_story_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: bio_story_header
	$headerCode = '';
	if(function_exists('bio_story_header')) {
		$args = [];
		$headerCode = bio_story_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: bio_story_footer
	$footerCode = '';
	if(function_exists('bio_story_footer')) {
		$args = [];
		$footerCode = bio_story_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
