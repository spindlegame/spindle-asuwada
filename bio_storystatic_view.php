<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/bio_storystatic.php");
	include_once("{$currDir}/bio_storystatic_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('bio_storystatic');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'bio_storystatic';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`bio_storystatic`.`id`" => "id",
		"IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, '   ', `bio_story1`.`story_title`), '') /* Biograf&#237;a */" => "story",
		"IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') /* L&#237;nea de paso (Throughline) */" => "throughline",
		"IF(    CHAR_LENGTH(`bio_chr1`.`character_name`) || CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS('',   `bio_chr1`.`character_name`, ' - ', `class_dramatica_archetype1`.`archetype`, ' '), '') /* Personaje principal */" => "story_character_mc",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* Dominio de la l&#237;nea de paso */" => "throughline_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* Aspecto (Concern) */" => "concern",
		"IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') /* Asunto (Issue) */" => "issue",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problema */" => "problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Soluci&#243;n */" => "solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* S&#237;ntoma / Enfoque */" => "symptom",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Respuesta / Direcci&#243;n */" => "response",
		"IF(    CHAR_LENGTH(`class_dramatica_issue2`.`issue`) || CHAR_LENGTH(`class_dramatica_concern2`.`concern`), CONCAT_WS('',   `class_dramatica_issue2`.`issue`, ' - ', `class_dramatica_concern2`.`concern`), '') /* Catalizador / Habilidad &#218;nica */" => "catalyst",
		"IF(    CHAR_LENGTH(`class_dramatica_issue3`.`issue`) || CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_issue3`.`issue`, '- ', `class_dramatica_concern3`.`concern`), '') /* Inhibidor / Defecto cr&#237;tico */" => "inhibitor",
		"IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`) || CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`, ' - ', `class_dramatica_domain2`.`domain`), '') /* Punto de referencia (Benchmark) */" => "benchmark",
		"IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') /* Punto clave (Signpost) 1 */" => "signpost1",
		"IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') /* Punto clave (Signpost) 2 */" => "signpost2",
		"IF(    CHAR_LENGTH(`class_dramatica_concern7`.`concern`), CONCAT_WS('',   `class_dramatica_concern7`.`concern`), '') /* Punto clave (Signpost) 3 */" => "signpost3",
		"IF(    CHAR_LENGTH(`class_dramatica_concern8`.`concern`), CONCAT_WS('',   `class_dramatica_concern8`.`concern`), '') /* Signpost4 */" => "signpost4",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`bio_storystatic`.`id`',
		2 => 2,
		3 => '`class_dramatica_throughline1`.`throughline`',
		4 => 4,
		5 => '`class_dramatica_domain1`.`domain`',
		6 => '`class_dramatica_concern1`.`concern`',
		7 => '`class_dramatica_issue1`.`issue`',
		8 => '`class_dramatica_themes1`.`theme`',
		9 => '`class_dramatica_themes2`.`theme`',
		10 => '`class_dramatica_themes3`.`theme`',
		11 => '`class_dramatica_themes4`.`theme`',
		12 => 12,
		13 => 13,
		14 => 14,
		15 => '`class_dramatica_concern5`.`concern`',
		16 => '`class_dramatica_concern6`.`concern`',
		17 => '`class_dramatica_concern7`.`concern`',
		18 => '`class_dramatica_concern8`.`concern`',
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`bio_storystatic`.`id`" => "id",
		"IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, '   ', `bio_story1`.`story_title`), '') /* Biograf&#237;a */" => "story",
		"IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') /* L&#237;nea de paso (Throughline) */" => "throughline",
		"IF(    CHAR_LENGTH(`bio_chr1`.`character_name`) || CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS('',   `bio_chr1`.`character_name`, ' - ', `class_dramatica_archetype1`.`archetype`, ' '), '') /* Personaje principal */" => "story_character_mc",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* Dominio de la l&#237;nea de paso */" => "throughline_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* Aspecto (Concern) */" => "concern",
		"IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') /* Asunto (Issue) */" => "issue",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problema */" => "problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Soluci&#243;n */" => "solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* S&#237;ntoma / Enfoque */" => "symptom",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Respuesta / Direcci&#243;n */" => "response",
		"IF(    CHAR_LENGTH(`class_dramatica_issue2`.`issue`) || CHAR_LENGTH(`class_dramatica_concern2`.`concern`), CONCAT_WS('',   `class_dramatica_issue2`.`issue`, ' - ', `class_dramatica_concern2`.`concern`), '') /* Catalizador / Habilidad &#218;nica */" => "catalyst",
		"IF(    CHAR_LENGTH(`class_dramatica_issue3`.`issue`) || CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_issue3`.`issue`, '- ', `class_dramatica_concern3`.`concern`), '') /* Inhibidor / Defecto cr&#237;tico */" => "inhibitor",
		"IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`) || CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`, ' - ', `class_dramatica_domain2`.`domain`), '') /* Punto de referencia (Benchmark) */" => "benchmark",
		"IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') /* Punto clave (Signpost) 1 */" => "signpost1",
		"IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') /* Punto clave (Signpost) 2 */" => "signpost2",
		"IF(    CHAR_LENGTH(`class_dramatica_concern7`.`concern`), CONCAT_WS('',   `class_dramatica_concern7`.`concern`), '') /* Punto clave (Signpost) 3 */" => "signpost3",
		"IF(    CHAR_LENGTH(`class_dramatica_concern8`.`concern`), CONCAT_WS('',   `class_dramatica_concern8`.`concern`), '') /* Signpost4 */" => "signpost4",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`bio_storystatic`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, '   ', `bio_story1`.`story_title`), '') /* Biograf&#237;a */" => "Biograf&#237;a",
		"IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') /* L&#237;nea de paso (Throughline) */" => "L&#237;nea de paso (Throughline)",
		"IF(    CHAR_LENGTH(`bio_chr1`.`character_name`) || CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS('',   `bio_chr1`.`character_name`, ' - ', `class_dramatica_archetype1`.`archetype`, ' '), '') /* Personaje principal */" => "Personaje principal",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* Dominio de la l&#237;nea de paso */" => "Dominio de la l&#237;nea de paso",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* Aspecto (Concern) */" => "Aspecto (Concern)",
		"IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') /* Asunto (Issue) */" => "Asunto (Issue)",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problema */" => "Problema",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Soluci&#243;n */" => "Soluci&#243;n",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* S&#237;ntoma / Enfoque */" => "S&#237;ntoma / Enfoque",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Respuesta / Direcci&#243;n */" => "Respuesta / Direcci&#243;n",
		"IF(    CHAR_LENGTH(`class_dramatica_issue2`.`issue`) || CHAR_LENGTH(`class_dramatica_concern2`.`concern`), CONCAT_WS('',   `class_dramatica_issue2`.`issue`, ' - ', `class_dramatica_concern2`.`concern`), '') /* Catalizador / Habilidad &#218;nica */" => "Catalizador / Habilidad &#218;nica",
		"IF(    CHAR_LENGTH(`class_dramatica_issue3`.`issue`) || CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_issue3`.`issue`, '- ', `class_dramatica_concern3`.`concern`), '') /* Inhibidor / Defecto cr&#237;tico */" => "Inhibidor / Defecto cr&#237;tico",
		"IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`) || CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`, ' - ', `class_dramatica_domain2`.`domain`), '') /* Punto de referencia (Benchmark) */" => "Punto de referencia (Benchmark)",
		"IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') /* Punto clave (Signpost) 1 */" => "Punto clave (Signpost) 1",
		"IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') /* Punto clave (Signpost) 2 */" => "Punto clave (Signpost) 2",
		"IF(    CHAR_LENGTH(`class_dramatica_concern7`.`concern`), CONCAT_WS('',   `class_dramatica_concern7`.`concern`), '') /* Punto clave (Signpost) 3 */" => "Punto clave (Signpost) 3",
		"IF(    CHAR_LENGTH(`class_dramatica_concern8`.`concern`), CONCAT_WS('',   `class_dramatica_concern8`.`concern`), '') /* Signpost4 */" => "Signpost4",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`bio_storystatic`.`id`" => "id",
		"IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, '   ', `bio_story1`.`story_title`), '') /* Biograf&#237;a */" => "story",
		"IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') /* L&#237;nea de paso (Throughline) */" => "throughline",
		"IF(    CHAR_LENGTH(`bio_chr1`.`character_name`) || CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS('',   `bio_chr1`.`character_name`, ' - ', `class_dramatica_archetype1`.`archetype`, ' '), '') /* Personaje principal */" => "story_character_mc",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* Dominio de la l&#237;nea de paso */" => "throughline_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* Aspecto (Concern) */" => "concern",
		"IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') /* Asunto (Issue) */" => "issue",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problema */" => "problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Soluci&#243;n */" => "solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* S&#237;ntoma / Enfoque */" => "symptom",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Respuesta / Direcci&#243;n */" => "response",
		"IF(    CHAR_LENGTH(`class_dramatica_issue2`.`issue`) || CHAR_LENGTH(`class_dramatica_concern2`.`concern`), CONCAT_WS('',   `class_dramatica_issue2`.`issue`, ' - ', `class_dramatica_concern2`.`concern`), '') /* Catalizador / Habilidad &#218;nica */" => "catalyst",
		"IF(    CHAR_LENGTH(`class_dramatica_issue3`.`issue`) || CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_issue3`.`issue`, '- ', `class_dramatica_concern3`.`concern`), '') /* Inhibidor / Defecto cr&#237;tico */" => "inhibitor",
		"IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`) || CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`, ' - ', `class_dramatica_domain2`.`domain`), '') /* Punto de referencia (Benchmark) */" => "benchmark",
		"IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') /* Punto clave (Signpost) 1 */" => "signpost1",
		"IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') /* Punto clave (Signpost) 2 */" => "signpost2",
		"IF(    CHAR_LENGTH(`class_dramatica_concern7`.`concern`), CONCAT_WS('',   `class_dramatica_concern7`.`concern`), '') /* Punto clave (Signpost) 3 */" => "signpost3",
		"IF(    CHAR_LENGTH(`class_dramatica_concern8`.`concern`), CONCAT_WS('',   `class_dramatica_concern8`.`concern`), '') /* Signpost4 */" => "signpost4",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['story' => 'Biograf&#237;a', 'throughline' => 'L&#237;nea de paso (Throughline)', 'story_character_mc' => 'Personaje principal', 'throughline_domain' => 'Dominio de la l&#237;nea de paso', 'concern' => 'Aspecto (Concern)', 'issue' => 'Asunto (Issue)', 'problem' => 'Problema', 'solution' => 'Soluci&#243;n', 'symptom' => 'S&#237;ntoma / Enfoque', 'response' => 'Respuesta / Direcci&#243;n', 'catalyst' => 'Catalizador / Habilidad &#218;nica', 'inhibitor' => 'Inhibidor / Defecto cr&#237;tico', 'benchmark' => 'Punto de referencia (Benchmark)', 'signpost1' => 'Punto clave (Signpost) 1', 'signpost2' => 'Punto clave (Signpost) 2', 'signpost3' => 'Punto clave (Signpost) 3', 'signpost4' => 'Signpost4', ];

	$x->QueryFrom = "`bio_storystatic` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storystatic`.`throughline` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr1`.`bio_archetype` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`bio_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes5`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`bio_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`class_dramatica_themes6`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`bio_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`bio_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`bio_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`bio_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`bio_storystatic`.`signpost4` ";
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
	$x->ScriptFileName = 'bio_storystatic_view.php';
	$x->RedirectAfterInsert = 'bio_storystatic_view.php';
	$x->TableTitle = 'Puntos est&#225;ticos de biograf&#237;a';
	$x->TableIcon = 'resources/table_icons/application_view_tile.png';
	$x->PrimaryKey = '`bio_storystatic`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['ID', 'Biograf&#237;a', 'L&#237;nea de paso (Throughline)', 'Personaje principal', 'Dominio de la l&#237;nea de paso', 'Aspecto (Concern)', 'Asunto (Issue)', 'Problema', 'Soluci&#243;n', 'S&#237;ntoma / Enfoque', 'Respuesta / Direcci&#243;n', 'Catalizador / Habilidad &#218;nica', 'Inhibidor / Defecto cr&#237;tico', 'Punto de referencia (Benchmark)', 'Punto clave (Signpost) 1', 'Punto clave (Signpost) 2', 'Punto clave (Signpost) 3', 'Signpost4', ];
	$x->ColFieldName = ['id', 'story', 'throughline', 'story_character_mc', 'throughline_domain', 'concern', 'issue', 'problem', 'solution', 'symptom', 'response', 'catalyst', 'inhibitor', 'benchmark', 'signpost1', 'signpost2', 'signpost3', 'signpost4', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/bio_storystatic_templateTV.html';
	$x->SelectedTemplate = 'templates/bio_storystatic_templateTVS.html';
	$x->TemplateDV = 'templates/bio_storystatic_templateDV.html';
	$x->TemplateDVP = 'templates/bio_storystatic_templateDVP.html';

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
		$x->QueryWhere = "WHERE `bio_storystatic`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='bio_storystatic' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `bio_storystatic`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='bio_storystatic' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`bio_storystatic`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: bio_storystatic_init
	$render = true;
	if(function_exists('bio_storystatic_init')) {
		$args = [];
		$render = bio_storystatic_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: bio_storystatic_header
	$headerCode = '';
	if(function_exists('bio_storystatic_header')) {
		$args = [];
		$headerCode = bio_storystatic_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: bio_storystatic_footer
	$footerCode = '';
	if(function_exists('bio_storystatic_footer')) {
		$args = [];
		$footerCode = bio_storystatic_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
