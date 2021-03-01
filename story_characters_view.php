<?php
// This script and data application were generated by AppGini 5.76
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/story_characters.php");
	include("$currDir/story_characters_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('story_characters');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "story_characters";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`story_characters`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* Agent */" => "agent",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Agent name */" => "agent_name",
		"IF(    CHAR_LENGTH(`character_development1`.`cw_name`), CONCAT_WS('',   `character_development1`.`cw_name`), '') /* Character */" => "character",
		"IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`), CONCAT_WS('',   `class_dramatica_character1`.`character`), '') /* Story character */" => "story_character",
		"IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, '   ', `story1`.`story`), '') /* Story */" => "story",
		"IF(    CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS('',   `class_dramatica_archetype1`.`archetype`, ' '), '') /* Story Archetype */" => "story_archetype",
		"`story_characters`.`comment`" => "comment"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`story_characters`.`id`',
		2 => 2,
		3 => 3,
		4 => '`character_development1`.`cw_name`',
		5 => '`class_dramatica_character1`.`character`',
		6 => 6,
		7 => 7,
		8 => 8
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`story_characters`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* Agent */" => "agent",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Agent name */" => "agent_name",
		"IF(    CHAR_LENGTH(`character_development1`.`cw_name`), CONCAT_WS('',   `character_development1`.`cw_name`), '') /* Character */" => "character",
		"IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`), CONCAT_WS('',   `class_dramatica_character1`.`character`), '') /* Story character */" => "story_character",
		"IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, '   ', `story1`.`story`), '') /* Story */" => "story",
		"IF(    CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS('',   `class_dramatica_archetype1`.`archetype`, ' '), '') /* Story Archetype */" => "story_archetype",
		"`story_characters`.`comment`" => "comment"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`story_characters`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* Agent */" => "Agent",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Agent name */" => "Agent name",
		"IF(    CHAR_LENGTH(`character_development1`.`cw_name`), CONCAT_WS('',   `character_development1`.`cw_name`), '') /* Character */" => "Character",
		"IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`), CONCAT_WS('',   `class_dramatica_character1`.`character`), '') /* Story character */" => "Story character",
		"IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, '   ', `story1`.`story`), '') /* Story */" => "Story",
		"IF(    CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS('',   `class_dramatica_archetype1`.`archetype`, ' '), '') /* Story Archetype */" => "Story Archetype",
		"`story_characters`.`comment`" => "Comment"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`story_characters`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* Agent */" => "agent",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Agent name */" => "agent_name",
		"IF(    CHAR_LENGTH(`character_development1`.`cw_name`), CONCAT_WS('',   `character_development1`.`cw_name`), '') /* Character */" => "character",
		"IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`), CONCAT_WS('',   `class_dramatica_character1`.`character`), '') /* Story character */" => "story_character",
		"IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, '   ', `story1`.`story`), '') /* Story */" => "story",
		"IF(    CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS('',   `class_dramatica_archetype1`.`archetype`, ' '), '') /* Story Archetype */" => "story_archetype",
		"`story_characters`.`comment`" => "comment"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'agent' => 'Agent', 'character' => 'Character', 'story_character' => 'Story character', 'story' => 'Story', 'story_archetype' => 'Story Archetype');

	$x->QueryFrom = "`story_characters` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`story_characters`.`agent` LEFT JOIN `character_development` as character_development1 ON `character_development1`.`id`=`story_characters`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`story_characters`.`story_character` LEFT JOIN `story` as story1 ON `story1`.`id`=`story_characters`.`story` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`story_characters`.`story_archetype` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
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
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "story_characters_view.php";
	$x->RedirectAfterInsert = "story_characters_view.php";
	$x->TableTitle = "V.2. Characters";
	$x->TableIcon = "resources/table_icons/map_edit.png";
	$x->PrimaryKey = "`story_characters`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("ID", "Agent", "Agent name", "Character", "Story character", "Story", "Story Archetype", "Comment");
	$x->ColFieldName = array('id', 'agent', 'agent_name', 'character', 'story_character', 'story', 'story_archetype', 'comment');
	$x->ColNumber  = array(1, 2, 3, 4, 5, 6, 7, 8);

	// template paths below are based on the app main directory
	$x->Template = 'templates/story_characters_templateTV.html';
	$x->SelectedTemplate = 'templates/story_characters_templateTVS.html';
	$x->TemplateDV = 'templates/story_characters_templateDV.html';
	$x->TemplateDVP = 'templates/story_characters_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `story_characters`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='story_characters' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `story_characters`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='story_characters' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`story_characters`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: story_characters_init
	$render=TRUE;
	if(function_exists('story_characters_init')){
		$args=array();
		$render=story_characters_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: story_characters_header
	$headerCode='';
	if(function_exists('story_characters_header')){
		$args=array();
		$headerCode=story_characters_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: story_characters_footer
	$footerCode='';
	if(function_exists('story_characters_footer')){
		$args=array();
		$footerCode=story_characters_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>