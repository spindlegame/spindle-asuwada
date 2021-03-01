<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/biblio_doc.php");
	include_once("{$currDir}/biblio_doc_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('biblio_doc');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'biblio_doc';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`biblio_doc`.`id`" => "id",
		"`biblio_doc`.`img`" => "img",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Author name */" => "author_name",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '    ', `biblio_author1`.`memberID`), '') /* Author_id */" => "author_id",
		"IF(    CHAR_LENGTH(`class_bibliography_type1`.`type`), CONCAT_WS('',   `class_bibliography_type1`.`type`), '') /* Type */" => "type",
		"IF(    CHAR_LENGTH(`class_bibliography_genre1`.`genre`), CONCAT_WS('',   `class_bibliography_genre1`.`genre`), '') /* Genre */" => "genre",
		"if(`biblio_doc`.`created`,date_format(`biblio_doc`.`created`,'%d/%m/%Y %H:%i'),'')" => "created",
		"if(`biblio_doc`.`published`,date_format(`biblio_doc`.`published`,'%d/%m/%Y %H:%i'),'')" => "published",
		"`biblio_doc`.`title`" => "title",
		"`biblio_doc`.`subtitle`" => "subtitle",
		"`biblio_doc`.`publisher`" => "publisher",
		"`biblio_doc`.`location`" => "location",
		"`biblio_doc`.`citation`" => "citation",
		"`biblio_doc`.`description`" => "description",
		"`biblio_doc`.`source`" => "source",
		"`biblio_doc`.`medium`" => "medium",
		"IF(    CHAR_LENGTH(`class_language1`.`short`) || CHAR_LENGTH(`class_language1`.`language`), CONCAT_WS('',   `class_language1`.`short`, '   ', `class_language1`.`language`), '') /* Language */" => "language",
		"`biblio_doc`.`format`" => "format",
		"`biblio_doc`.`subject`" => "subject",
		"IF(    CHAR_LENGTH(`class_rights1`.`right`), CONCAT_WS('',   `class_rights1`.`right`), '') /* Rights */" => "rights",
		"`biblio_doc`.`rights_holder`" => "rights_holder",
		"IF(    CHAR_LENGTH(`class_evaluation1`.`evaluation_type`), CONCAT_WS('',   `class_evaluation1`.`evaluation_type`), '') /* Data evaluation */" => "data_evaluation",
		"`biblio_doc`.`world_cat_no`" => "world_cat_no",
		"`biblio_doc`.`authority_record`" => "authority_record",
		"IF(    CHAR_LENGTH(`class_authority_library1`.`abbreviation`) || CHAR_LENGTH(`class_authority_library1`.`authority_name`), CONCAT_WS('',   `class_authority_library1`.`abbreviation`, '   ', `class_authority_library1`.`authority_name`), '') /* Authority organization */" => "authority_organization",
		"`biblio_doc`.`pdf_book`" => "pdf_book",
		"`biblio_doc`.`ext_source`" => "ext_source",
		"`biblio_doc`.`tags`" => "tags",
		"IF(    CHAR_LENGTH(`biblio_team1`.`team`), CONCAT_WS('',   `biblio_team1`.`team`), '') /* Team */" => "team",
		"IF(    CHAR_LENGTH(`biblio_analyst1`.`last_name`) || CHAR_LENGTH(`biblio_analyst1`.`first_name`), CONCAT_WS('',   `biblio_analyst1`.`last_name`, ', ', `biblio_analyst1`.`first_name`), '') /* Analyst */" => "biblio_lead",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`biblio_doc`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => '`class_bibliography_type1`.`type`',
		6 => '`class_bibliography_genre1`.`genre`',
		7 => '`biblio_doc`.`created`',
		8 => '`biblio_doc`.`published`',
		9 => 9,
		10 => 10,
		11 => 11,
		12 => 12,
		13 => 13,
		14 => 14,
		15 => 15,
		16 => 16,
		17 => 17,
		18 => 18,
		19 => 19,
		20 => '`class_rights1`.`right`',
		21 => 21,
		22 => '`class_evaluation1`.`evaluation_type`',
		23 => 23,
		24 => '`biblio_doc`.`authority_record`',
		25 => 25,
		26 => 26,
		27 => 27,
		28 => 28,
		29 => '`biblio_team1`.`team`',
		30 => 30,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`biblio_doc`.`id`" => "id",
		"`biblio_doc`.`img`" => "img",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Author name */" => "author_name",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '    ', `biblio_author1`.`memberID`), '') /* Author_id */" => "author_id",
		"IF(    CHAR_LENGTH(`class_bibliography_type1`.`type`), CONCAT_WS('',   `class_bibliography_type1`.`type`), '') /* Type */" => "type",
		"IF(    CHAR_LENGTH(`class_bibliography_genre1`.`genre`), CONCAT_WS('',   `class_bibliography_genre1`.`genre`), '') /* Genre */" => "genre",
		"if(`biblio_doc`.`created`,date_format(`biblio_doc`.`created`,'%d/%m/%Y %H:%i'),'')" => "created",
		"if(`biblio_doc`.`published`,date_format(`biblio_doc`.`published`,'%d/%m/%Y %H:%i'),'')" => "published",
		"`biblio_doc`.`title`" => "title",
		"`biblio_doc`.`subtitle`" => "subtitle",
		"`biblio_doc`.`publisher`" => "publisher",
		"`biblio_doc`.`location`" => "location",
		"`biblio_doc`.`citation`" => "citation",
		"`biblio_doc`.`description`" => "description",
		"`biblio_doc`.`source`" => "source",
		"`biblio_doc`.`medium`" => "medium",
		"IF(    CHAR_LENGTH(`class_language1`.`short`) || CHAR_LENGTH(`class_language1`.`language`), CONCAT_WS('',   `class_language1`.`short`, '   ', `class_language1`.`language`), '') /* Language */" => "language",
		"`biblio_doc`.`format`" => "format",
		"`biblio_doc`.`subject`" => "subject",
		"IF(    CHAR_LENGTH(`class_rights1`.`right`), CONCAT_WS('',   `class_rights1`.`right`), '') /* Rights */" => "rights",
		"`biblio_doc`.`rights_holder`" => "rights_holder",
		"IF(    CHAR_LENGTH(`class_evaluation1`.`evaluation_type`), CONCAT_WS('',   `class_evaluation1`.`evaluation_type`), '') /* Data evaluation */" => "data_evaluation",
		"`biblio_doc`.`world_cat_no`" => "world_cat_no",
		"`biblio_doc`.`authority_record`" => "authority_record",
		"IF(    CHAR_LENGTH(`class_authority_library1`.`abbreviation`) || CHAR_LENGTH(`class_authority_library1`.`authority_name`), CONCAT_WS('',   `class_authority_library1`.`abbreviation`, '   ', `class_authority_library1`.`authority_name`), '') /* Authority organization */" => "authority_organization",
		"`biblio_doc`.`pdf_book`" => "pdf_book",
		"`biblio_doc`.`ext_source`" => "ext_source",
		"`biblio_doc`.`tags`" => "tags",
		"IF(    CHAR_LENGTH(`biblio_team1`.`team`), CONCAT_WS('',   `biblio_team1`.`team`), '') /* Team */" => "team",
		"IF(    CHAR_LENGTH(`biblio_analyst1`.`last_name`) || CHAR_LENGTH(`biblio_analyst1`.`first_name`), CONCAT_WS('',   `biblio_analyst1`.`last_name`, ', ', `biblio_analyst1`.`first_name`), '') /* Analyst */" => "biblio_lead",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`biblio_doc`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Author name */" => "Author name",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '    ', `biblio_author1`.`memberID`), '') /* Author_id */" => "Author_id",
		"IF(    CHAR_LENGTH(`class_bibliography_type1`.`type`), CONCAT_WS('',   `class_bibliography_type1`.`type`), '') /* Type */" => "Type",
		"IF(    CHAR_LENGTH(`class_bibliography_genre1`.`genre`), CONCAT_WS('',   `class_bibliography_genre1`.`genre`), '') /* Genre */" => "Genre",
		"`biblio_doc`.`created`" => "Created",
		"`biblio_doc`.`published`" => "Published",
		"`biblio_doc`.`title`" => "Title",
		"`biblio_doc`.`subtitle`" => "Subtitle",
		"`biblio_doc`.`publisher`" => "Publisher",
		"`biblio_doc`.`location`" => "Location",
		"`biblio_doc`.`citation`" => "Citation",
		"`biblio_doc`.`description`" => "Description",
		"`biblio_doc`.`source`" => "Source",
		"`biblio_doc`.`medium`" => "Medium",
		"IF(    CHAR_LENGTH(`class_language1`.`short`) || CHAR_LENGTH(`class_language1`.`language`), CONCAT_WS('',   `class_language1`.`short`, '   ', `class_language1`.`language`), '') /* Language */" => "Language",
		"`biblio_doc`.`format`" => "Format",
		"`biblio_doc`.`subject`" => "Subject",
		"IF(    CHAR_LENGTH(`class_rights1`.`right`), CONCAT_WS('',   `class_rights1`.`right`), '') /* Rights */" => "Rights",
		"`biblio_doc`.`rights_holder`" => "Rights_holder",
		"IF(    CHAR_LENGTH(`class_evaluation1`.`evaluation_type`), CONCAT_WS('',   `class_evaluation1`.`evaluation_type`), '') /* Data evaluation */" => "Data evaluation",
		"`biblio_doc`.`world_cat_no`" => "World cat no",
		"`biblio_doc`.`authority_record`" => "Authority code",
		"IF(    CHAR_LENGTH(`class_authority_library1`.`abbreviation`) || CHAR_LENGTH(`class_authority_library1`.`authority_name`), CONCAT_WS('',   `class_authority_library1`.`abbreviation`, '   ', `class_authority_library1`.`authority_name`), '') /* Authority organization */" => "Authority organization",
		"`biblio_doc`.`pdf_book`" => "Pdf_book",
		"`biblio_doc`.`ext_source`" => "Ext_source",
		"`biblio_doc`.`tags`" => "Tags",
		"IF(    CHAR_LENGTH(`biblio_team1`.`team`), CONCAT_WS('',   `biblio_team1`.`team`), '') /* Team */" => "Team",
		"IF(    CHAR_LENGTH(`biblio_analyst1`.`last_name`) || CHAR_LENGTH(`biblio_analyst1`.`first_name`), CONCAT_WS('',   `biblio_analyst1`.`last_name`, ', ', `biblio_analyst1`.`first_name`), '') /* Analyst */" => "Analyst",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`biblio_doc`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Author name */" => "author_name",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '    ', `biblio_author1`.`memberID`), '') /* Author_id */" => "author_id",
		"IF(    CHAR_LENGTH(`class_bibliography_type1`.`type`), CONCAT_WS('',   `class_bibliography_type1`.`type`), '') /* Type */" => "type",
		"IF(    CHAR_LENGTH(`class_bibliography_genre1`.`genre`), CONCAT_WS('',   `class_bibliography_genre1`.`genre`), '') /* Genre */" => "genre",
		"if(`biblio_doc`.`created`,date_format(`biblio_doc`.`created`,'%d/%m/%Y %H:%i'),'')" => "created",
		"if(`biblio_doc`.`published`,date_format(`biblio_doc`.`published`,'%d/%m/%Y %H:%i'),'')" => "published",
		"`biblio_doc`.`title`" => "title",
		"`biblio_doc`.`subtitle`" => "subtitle",
		"`biblio_doc`.`publisher`" => "publisher",
		"`biblio_doc`.`location`" => "location",
		"`biblio_doc`.`citation`" => "citation",
		"`biblio_doc`.`description`" => "description",
		"`biblio_doc`.`source`" => "source",
		"`biblio_doc`.`medium`" => "medium",
		"IF(    CHAR_LENGTH(`class_language1`.`short`) || CHAR_LENGTH(`class_language1`.`language`), CONCAT_WS('',   `class_language1`.`short`, '   ', `class_language1`.`language`), '') /* Language */" => "language",
		"`biblio_doc`.`format`" => "format",
		"`biblio_doc`.`subject`" => "subject",
		"IF(    CHAR_LENGTH(`class_rights1`.`right`), CONCAT_WS('',   `class_rights1`.`right`), '') /* Rights */" => "rights",
		"`biblio_doc`.`rights_holder`" => "rights_holder",
		"IF(    CHAR_LENGTH(`class_evaluation1`.`evaluation_type`), CONCAT_WS('',   `class_evaluation1`.`evaluation_type`), '') /* Data evaluation */" => "data_evaluation",
		"`biblio_doc`.`world_cat_no`" => "world_cat_no",
		"`biblio_doc`.`authority_record`" => "authority_record",
		"IF(    CHAR_LENGTH(`class_authority_library1`.`abbreviation`) || CHAR_LENGTH(`class_authority_library1`.`authority_name`), CONCAT_WS('',   `class_authority_library1`.`abbreviation`, '   ', `class_authority_library1`.`authority_name`), '') /* Authority organization */" => "authority_organization",
		"`biblio_doc`.`pdf_book`" => "pdf_book",
		"`biblio_doc`.`ext_source`" => "ext_source",
		"`biblio_doc`.`tags`" => "tags",
		"IF(    CHAR_LENGTH(`biblio_team1`.`team`), CONCAT_WS('',   `biblio_team1`.`team`), '') /* Team */" => "team",
		"IF(    CHAR_LENGTH(`biblio_analyst1`.`last_name`) || CHAR_LENGTH(`biblio_analyst1`.`first_name`), CONCAT_WS('',   `biblio_analyst1`.`last_name`, ', ', `biblio_analyst1`.`first_name`), '') /* Analyst */" => "biblio_lead",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['author_id' => 'Author_id', 'type' => 'Type', 'genre' => 'Genre', 'language' => 'Language', 'rights' => 'Rights', 'data_evaluation' => 'Data evaluation', 'authority_organization' => 'Authority organization', 'team' => 'Team', 'biblio_lead' => 'Analyst', ];

	$x->QueryFrom = "`biblio_doc` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_doc`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`biblio_doc`.`type` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`biblio_doc`.`genre` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`biblio_doc`.`language` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_doc`.`rights` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_doc`.`data_evaluation` LEFT JOIN `class_authority_library` as class_authority_library1 ON `class_authority_library1`.`id`=`biblio_doc`.`authority_organization` LEFT JOIN `biblio_team` as biblio_team1 ON `biblio_team1`.`id`=`biblio_doc`.`team` LEFT JOIN `biblio_analyst` as biblio_analyst1 ON `biblio_analyst1`.`id`=`biblio_doc`.`biblio_lead` ";
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
	$x->ScriptFileName = 'biblio_doc_view.php';
	$x->RedirectAfterInsert = 'biblio_doc_view.php';
	$x->TableTitle = 'Corpus';
	$x->TableIcon = 'resources/table_icons/books.png';
	$x->PrimaryKey = '`biblio_doc`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['ID', 'Cover image', 'Author name', 'Author_id', 'Type', 'Genre', 'Created', 'Published', 'Title', 'Subtitle', 'Publisher', 'Location', 'Citation', 'Description', 'Source', 'Medium', 'Language', 'Format', 'Subject', 'Rights', 'Rights_holder', 'Data evaluation', 'World cat no', 'Authority code', 'Authority organization', 'Pdf_book', 'Ext_source', 'Tags', 'Team', 'Analyst', ];
	$x->ColFieldName = ['id', 'img', 'author_name', 'author_id', 'type', 'genre', 'created', 'published', 'title', 'subtitle', 'publisher', 'location', 'citation', 'description', 'source', 'medium', 'language', 'format', 'subject', 'rights', 'rights_holder', 'data_evaluation', 'world_cat_no', 'authority_record', 'authority_organization', 'pdf_book', 'ext_source', 'tags', 'team', 'biblio_lead', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/biblio_doc_templateTV.html';
	$x->SelectedTemplate = 'templates/biblio_doc_templateTVS.html';
	$x->TemplateDV = 'templates/biblio_doc_templateDV.html';
	$x->TemplateDVP = 'templates/biblio_doc_templateDVP.html';

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
		$x->QueryWhere = "WHERE `biblio_doc`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='biblio_doc' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `biblio_doc`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='biblio_doc' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`biblio_doc`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: biblio_doc_init
	$render = true;
	if(function_exists('biblio_doc_init')) {
		$args = [];
		$render = biblio_doc_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: biblio_doc_header
	$headerCode = '';
	if(function_exists('biblio_doc_header')) {
		$args = [];
		$headerCode = biblio_doc_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: biblio_doc_footer
	$footerCode = '';
	if(function_exists('biblio_doc_footer')) {
		$args = [];
		$footerCode = biblio_doc_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
