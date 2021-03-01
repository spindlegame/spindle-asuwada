<?php
// This script and data application were generated by AppGini 5.76
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/chr_dev.php");
	include("$currDir/chr_dev_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('chr_dev');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "chr_dev";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`chr_dev`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* MemberID */" => "agent_id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Agent name */" => "agent_name",
		"`chr_dev`.`cw_name`" => "cw_name",
		"`chr_dev`.`img`" => "img",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') /* Dp resolve */" => "dp_resolve",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints1`.`term`), CONCAT_WS('',   `class_dynamicstorypoints1`.`term`), '') /* Resolve */" => "mc_resolve",
		"IF(    CHAR_LENGTH(`chr_scenes1`.`id`) || CHAR_LENGTH(`chr_scenes1`.`illustration`), CONCAT_WS('',   `chr_scenes1`.`id`, ' - ', `chr_scenes1`.`illustration`), '') /* Illustration of MC Resolve */" => "illust_resolve",
		"`chr_dev`.`mc_growth`" => "mc_growth",
		"IF(    CHAR_LENGTH(`chr_scenes2`.`id`) || CHAR_LENGTH(`chr_scenes2`.`illustration`), CONCAT_WS('',   `chr_scenes2`.`id`, ' - ', `chr_scenes2`.`illustration`), '') /* Illustration of MC Growth */" => "illust_growth",
		"`chr_dev`.`mc_approach`" => "mc_approach",
		"IF(    CHAR_LENGTH(`chr_scenes3`.`id`) || CHAR_LENGTH(`chr_scenes3`.`illustration`), CONCAT_WS('',   `chr_scenes3`.`id`, ' - ', `chr_scenes3`.`illustration`), '') /* Illustration of MC Approach */" => "illust_approach",
		"`chr_dev`.`mc_ps_style`" => "mc_ps_style",
		"IF(    CHAR_LENGTH(`chr_scenes4`.`id`) || CHAR_LENGTH(`chr_scenes4`.`illustration`), CONCAT_WS('',   `chr_scenes4`.`id`, ' - ', `chr_scenes4`.`illustration`), '') /* Illustration of MC PS Style */" => "illust_ps_style",
		"`chr_dev`.`cw_age`" => "cw_age",
		"`chr_dev`.`cw_gender`" => "cw_gender",
		"`chr_dev`.`cw_communication_style`" => "cw_communication_style",
		"`chr_dev`.`cw_background`" => "cw_background",
		"`chr_dev`.`cw_appearance`" => "cw_appearance",
		"`chr_dev`.`cw_relationships`" => "cw_relationships",
		"`chr_dev`.`cw_ambition`" => "cw_ambition",
		"`chr_dev`.`cw_defects`" => "cw_defects",
		"`chr_dev`.`cw_thoughts`" => "cw_thoughts",
		"`chr_dev`.`cw_relatedness`" => "cw_relatedness",
		"`chr_dev`.`cw_restrictions`" => "cw_restrictions",
		"`chr_dev`.`locations`" => "locations",
		"`chr_dev`.`persons`" => "persons",
		"`chr_dev`.`events`" => "events",
		"IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') /* Noetic tension */" => "noetictension",
		"IF(    CHAR_LENGTH(`chr_scenes5`.`id`) || CHAR_LENGTH(`chr_scenes5`.`illustration`), CONCAT_WS('',   `chr_scenes5`.`id`, ' - ', `chr_scenes5`.`illustration`), '') /* Illustration of Noetic Tension */" => "illust_nt",
		"IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') /* Overall Impression Management */" => "impression",
		"IF(    CHAR_LENGTH(`chr_scenes6`.`id`) || CHAR_LENGTH(`chr_scenes6`.`illustration`), CONCAT_WS('',   `chr_scenes6`.`id`, ' - ', `chr_scenes6`.`illustration`), '') /* Illustration of Impression Mnmt. */" => "illust_im",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problem */" => "mcs_problem",
		"IF(    CHAR_LENGTH(`chr_scenes7`.`id`) || CHAR_LENGTH(`chr_scenes7`.`illustration`), CONCAT_WS('',   `chr_scenes7`.`id`, ' - ', `chr_scenes7`.`illustration`), '') /* Illustration of MCS Problem */" => "illust_mcs_problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Solution */" => "mcs_solution",
		"IF(    CHAR_LENGTH(`chr_scenes8`.`id`) || CHAR_LENGTH(`chr_scenes8`.`illustration`), CONCAT_WS('',   `chr_scenes8`.`id`, ' - ', `chr_scenes8`.`illustration`), '') /* Illustration of MCS Solution */" => "illust_mcs_solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* Symptom */" => "mcs_symptom",
		"IF(    CHAR_LENGTH(`chr_scenes9`.`id`) || CHAR_LENGTH(`chr_scenes9`.`illustration`), CONCAT_WS('',   `chr_scenes9`.`id`, ' - ', `chr_scenes9`.`illustration`), '') /* Illustration of MCS Symptome */" => "illust_mcs_symptom",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Response */" => "mcs_response",
		"IF(    CHAR_LENGTH(`chr_scenes10`.`id`), CONCAT_WS('',   `chr_scenes10`.`id`, ' - '), '') /* Illustration of MCS Response */" => "illust_mcs_response"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`chr_dev`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => '`class_dramatica_storypoints31`.`term`',
		7 => '`class_dynamicstorypoints1`.`term`',
		8 => 8,
		9 => 9,
		10 => 10,
		11 => 11,
		12 => 12,
		13 => 13,
		14 => 14,
		15 => 15,
		16 => '`chr_dev`.`cw_gender`',
		17 => 17,
		18 => 18,
		19 => 19,
		20 => 20,
		21 => 21,
		22 => 22,
		23 => 23,
		24 => 24,
		25 => 25,
		26 => 26,
		27 => 27,
		28 => 28,
		29 => '`class_nt1`.`noetictension`',
		30 => 30,
		31 => '`class_im1`.`impression`',
		32 => 32,
		33 => 33,
		34 => 34,
		35 => 35,
		36 => 36,
		37 => 37,
		38 => 38,
		39 => 39,
		40 => 40
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`chr_dev`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* MemberID */" => "agent_id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Agent name */" => "agent_name",
		"`chr_dev`.`cw_name`" => "cw_name",
		"`chr_dev`.`img`" => "img",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') /* Dp resolve */" => "dp_resolve",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints1`.`term`), CONCAT_WS('',   `class_dynamicstorypoints1`.`term`), '') /* Resolve */" => "mc_resolve",
		"IF(    CHAR_LENGTH(`chr_scenes1`.`id`) || CHAR_LENGTH(`chr_scenes1`.`illustration`), CONCAT_WS('',   `chr_scenes1`.`id`, ' - ', `chr_scenes1`.`illustration`), '') /* Illustration of MC Resolve */" => "illust_resolve",
		"`chr_dev`.`mc_growth`" => "mc_growth",
		"IF(    CHAR_LENGTH(`chr_scenes2`.`id`) || CHAR_LENGTH(`chr_scenes2`.`illustration`), CONCAT_WS('',   `chr_scenes2`.`id`, ' - ', `chr_scenes2`.`illustration`), '') /* Illustration of MC Growth */" => "illust_growth",
		"`chr_dev`.`mc_approach`" => "mc_approach",
		"IF(    CHAR_LENGTH(`chr_scenes3`.`id`) || CHAR_LENGTH(`chr_scenes3`.`illustration`), CONCAT_WS('',   `chr_scenes3`.`id`, ' - ', `chr_scenes3`.`illustration`), '') /* Illustration of MC Approach */" => "illust_approach",
		"`chr_dev`.`mc_ps_style`" => "mc_ps_style",
		"IF(    CHAR_LENGTH(`chr_scenes4`.`id`) || CHAR_LENGTH(`chr_scenes4`.`illustration`), CONCAT_WS('',   `chr_scenes4`.`id`, ' - ', `chr_scenes4`.`illustration`), '') /* Illustration of MC PS Style */" => "illust_ps_style",
		"`chr_dev`.`cw_age`" => "cw_age",
		"`chr_dev`.`cw_gender`" => "cw_gender",
		"`chr_dev`.`cw_communication_style`" => "cw_communication_style",
		"`chr_dev`.`cw_background`" => "cw_background",
		"`chr_dev`.`cw_appearance`" => "cw_appearance",
		"`chr_dev`.`cw_relationships`" => "cw_relationships",
		"`chr_dev`.`cw_ambition`" => "cw_ambition",
		"`chr_dev`.`cw_defects`" => "cw_defects",
		"`chr_dev`.`cw_thoughts`" => "cw_thoughts",
		"`chr_dev`.`cw_relatedness`" => "cw_relatedness",
		"`chr_dev`.`cw_restrictions`" => "cw_restrictions",
		"`chr_dev`.`locations`" => "locations",
		"`chr_dev`.`persons`" => "persons",
		"`chr_dev`.`events`" => "events",
		"IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') /* Noetic tension */" => "noetictension",
		"IF(    CHAR_LENGTH(`chr_scenes5`.`id`) || CHAR_LENGTH(`chr_scenes5`.`illustration`), CONCAT_WS('',   `chr_scenes5`.`id`, ' - ', `chr_scenes5`.`illustration`), '') /* Illustration of Noetic Tension */" => "illust_nt",
		"IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') /* Overall Impression Management */" => "impression",
		"IF(    CHAR_LENGTH(`chr_scenes6`.`id`) || CHAR_LENGTH(`chr_scenes6`.`illustration`), CONCAT_WS('',   `chr_scenes6`.`id`, ' - ', `chr_scenes6`.`illustration`), '') /* Illustration of Impression Mnmt. */" => "illust_im",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problem */" => "mcs_problem",
		"IF(    CHAR_LENGTH(`chr_scenes7`.`id`) || CHAR_LENGTH(`chr_scenes7`.`illustration`), CONCAT_WS('',   `chr_scenes7`.`id`, ' - ', `chr_scenes7`.`illustration`), '') /* Illustration of MCS Problem */" => "illust_mcs_problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Solution */" => "mcs_solution",
		"IF(    CHAR_LENGTH(`chr_scenes8`.`id`) || CHAR_LENGTH(`chr_scenes8`.`illustration`), CONCAT_WS('',   `chr_scenes8`.`id`, ' - ', `chr_scenes8`.`illustration`), '') /* Illustration of MCS Solution */" => "illust_mcs_solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* Symptom */" => "mcs_symptom",
		"IF(    CHAR_LENGTH(`chr_scenes9`.`id`) || CHAR_LENGTH(`chr_scenes9`.`illustration`), CONCAT_WS('',   `chr_scenes9`.`id`, ' - ', `chr_scenes9`.`illustration`), '') /* Illustration of MCS Symptome */" => "illust_mcs_symptom",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Response */" => "mcs_response",
		"IF(    CHAR_LENGTH(`chr_scenes10`.`id`), CONCAT_WS('',   `chr_scenes10`.`id`, ' - '), '') /* Illustration of MCS Response */" => "illust_mcs_response"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`chr_dev`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* MemberID */" => "MemberID",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Agent name */" => "Agent name",
		"`chr_dev`.`cw_name`" => "Character name",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') /* Dp resolve */" => "Dp resolve",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints1`.`term`), CONCAT_WS('',   `class_dynamicstorypoints1`.`term`), '') /* Resolve */" => "Resolve",
		"IF(    CHAR_LENGTH(`chr_scenes1`.`id`) || CHAR_LENGTH(`chr_scenes1`.`illustration`), CONCAT_WS('',   `chr_scenes1`.`id`, ' - ', `chr_scenes1`.`illustration`), '') /* Illustration of MC Resolve */" => "Illustration of MC Resolve",
		"`chr_dev`.`mc_growth`" => "Growth",
		"IF(    CHAR_LENGTH(`chr_scenes2`.`id`) || CHAR_LENGTH(`chr_scenes2`.`illustration`), CONCAT_WS('',   `chr_scenes2`.`id`, ' - ', `chr_scenes2`.`illustration`), '') /* Illustration of MC Growth */" => "Illustration of MC Growth",
		"`chr_dev`.`mc_approach`" => "Approach",
		"IF(    CHAR_LENGTH(`chr_scenes3`.`id`) || CHAR_LENGTH(`chr_scenes3`.`illustration`), CONCAT_WS('',   `chr_scenes3`.`id`, ' - ', `chr_scenes3`.`illustration`), '') /* Illustration of MC Approach */" => "Illustration of MC Approach",
		"`chr_dev`.`mc_ps_style`" => "Problem Solving Style",
		"IF(    CHAR_LENGTH(`chr_scenes4`.`id`) || CHAR_LENGTH(`chr_scenes4`.`illustration`), CONCAT_WS('',   `chr_scenes4`.`id`, ' - ', `chr_scenes4`.`illustration`), '') /* Illustration of MC PS Style */" => "Illustration of MC PS Style",
		"`chr_dev`.`cw_age`" => "Age",
		"`chr_dev`.`cw_gender`" => "Gender",
		"`chr_dev`.`cw_communication_style`" => "Communication style",
		"`chr_dev`.`cw_background`" => "Background",
		"`chr_dev`.`cw_appearance`" => "Appearance",
		"`chr_dev`.`cw_relationships`" => "Relationships",
		"`chr_dev`.`cw_ambition`" => "Ambition",
		"`chr_dev`.`cw_defects`" => "Defects",
		"`chr_dev`.`cw_thoughts`" => "Thoughts",
		"`chr_dev`.`cw_relatedness`" => "Relatedness",
		"`chr_dev`.`cw_restrictions`" => "Restrictions",
		"`chr_dev`.`locations`" => "Locations",
		"`chr_dev`.`persons`" => "Persons",
		"`chr_dev`.`events`" => "Events",
		"IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') /* Noetic tension */" => "Noetic tension",
		"IF(    CHAR_LENGTH(`chr_scenes5`.`id`) || CHAR_LENGTH(`chr_scenes5`.`illustration`), CONCAT_WS('',   `chr_scenes5`.`id`, ' - ', `chr_scenes5`.`illustration`), '') /* Illustration of Noetic Tension */" => "Illustration of Noetic Tension",
		"IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') /* Overall Impression Management */" => "Overall Impression Management",
		"IF(    CHAR_LENGTH(`chr_scenes6`.`id`) || CHAR_LENGTH(`chr_scenes6`.`illustration`), CONCAT_WS('',   `chr_scenes6`.`id`, ' - ', `chr_scenes6`.`illustration`), '') /* Illustration of Impression Mnmt. */" => "Illustration of Impression Mnmt.",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problem */" => "Problem",
		"IF(    CHAR_LENGTH(`chr_scenes7`.`id`) || CHAR_LENGTH(`chr_scenes7`.`illustration`), CONCAT_WS('',   `chr_scenes7`.`id`, ' - ', `chr_scenes7`.`illustration`), '') /* Illustration of MCS Problem */" => "Illustration of MCS Problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Solution */" => "Solution",
		"IF(    CHAR_LENGTH(`chr_scenes8`.`id`) || CHAR_LENGTH(`chr_scenes8`.`illustration`), CONCAT_WS('',   `chr_scenes8`.`id`, ' - ', `chr_scenes8`.`illustration`), '') /* Illustration of MCS Solution */" => "Illustration of MCS Solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* Symptom */" => "Symptom",
		"IF(    CHAR_LENGTH(`chr_scenes9`.`id`) || CHAR_LENGTH(`chr_scenes9`.`illustration`), CONCAT_WS('',   `chr_scenes9`.`id`, ' - ', `chr_scenes9`.`illustration`), '') /* Illustration of MCS Symptome */" => "Illustration of MCS Symptome",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Response */" => "Response",
		"IF(    CHAR_LENGTH(`chr_scenes10`.`id`), CONCAT_WS('',   `chr_scenes10`.`id`, ' - '), '') /* Illustration of MCS Response */" => "Illustration of MCS Response"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`chr_dev`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* MemberID */" => "agent_id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Agent name */" => "agent_name",
		"`chr_dev`.`cw_name`" => "cw_name",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') /* Dp resolve */" => "dp_resolve",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints1`.`term`), CONCAT_WS('',   `class_dynamicstorypoints1`.`term`), '') /* Resolve */" => "mc_resolve",
		"IF(    CHAR_LENGTH(`chr_scenes1`.`id`) || CHAR_LENGTH(`chr_scenes1`.`illustration`), CONCAT_WS('',   `chr_scenes1`.`id`, ' - ', `chr_scenes1`.`illustration`), '') /* Illustration of MC Resolve */" => "illust_resolve",
		"`chr_dev`.`mc_growth`" => "mc_growth",
		"IF(    CHAR_LENGTH(`chr_scenes2`.`id`) || CHAR_LENGTH(`chr_scenes2`.`illustration`), CONCAT_WS('',   `chr_scenes2`.`id`, ' - ', `chr_scenes2`.`illustration`), '') /* Illustration of MC Growth */" => "illust_growth",
		"`chr_dev`.`mc_approach`" => "mc_approach",
		"IF(    CHAR_LENGTH(`chr_scenes3`.`id`) || CHAR_LENGTH(`chr_scenes3`.`illustration`), CONCAT_WS('',   `chr_scenes3`.`id`, ' - ', `chr_scenes3`.`illustration`), '') /* Illustration of MC Approach */" => "illust_approach",
		"`chr_dev`.`mc_ps_style`" => "mc_ps_style",
		"IF(    CHAR_LENGTH(`chr_scenes4`.`id`) || CHAR_LENGTH(`chr_scenes4`.`illustration`), CONCAT_WS('',   `chr_scenes4`.`id`, ' - ', `chr_scenes4`.`illustration`), '') /* Illustration of MC PS Style */" => "illust_ps_style",
		"`chr_dev`.`cw_age`" => "cw_age",
		"`chr_dev`.`cw_gender`" => "cw_gender",
		"`chr_dev`.`cw_communication_style`" => "cw_communication_style",
		"`chr_dev`.`cw_background`" => "cw_background",
		"`chr_dev`.`cw_appearance`" => "cw_appearance",
		"`chr_dev`.`cw_relationships`" => "cw_relationships",
		"`chr_dev`.`cw_ambition`" => "cw_ambition",
		"`chr_dev`.`cw_defects`" => "cw_defects",
		"`chr_dev`.`cw_thoughts`" => "cw_thoughts",
		"`chr_dev`.`cw_relatedness`" => "cw_relatedness",
		"`chr_dev`.`cw_restrictions`" => "cw_restrictions",
		"`chr_dev`.`locations`" => "locations",
		"`chr_dev`.`persons`" => "persons",
		"`chr_dev`.`events`" => "events",
		"IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') /* Noetic tension */" => "noetictension",
		"IF(    CHAR_LENGTH(`chr_scenes5`.`id`) || CHAR_LENGTH(`chr_scenes5`.`illustration`), CONCAT_WS('',   `chr_scenes5`.`id`, ' - ', `chr_scenes5`.`illustration`), '') /* Illustration of Noetic Tension */" => "illust_nt",
		"IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') /* Overall Impression Management */" => "impression",
		"IF(    CHAR_LENGTH(`chr_scenes6`.`id`) || CHAR_LENGTH(`chr_scenes6`.`illustration`), CONCAT_WS('',   `chr_scenes6`.`id`, ' - ', `chr_scenes6`.`illustration`), '') /* Illustration of Impression Mnmt. */" => "illust_im",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problem */" => "mcs_problem",
		"IF(    CHAR_LENGTH(`chr_scenes7`.`id`) || CHAR_LENGTH(`chr_scenes7`.`illustration`), CONCAT_WS('',   `chr_scenes7`.`id`, ' - ', `chr_scenes7`.`illustration`), '') /* Illustration of MCS Problem */" => "illust_mcs_problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Solution */" => "mcs_solution",
		"IF(    CHAR_LENGTH(`chr_scenes8`.`id`) || CHAR_LENGTH(`chr_scenes8`.`illustration`), CONCAT_WS('',   `chr_scenes8`.`id`, ' - ', `chr_scenes8`.`illustration`), '') /* Illustration of MCS Solution */" => "illust_mcs_solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* Symptom */" => "mcs_symptom",
		"IF(    CHAR_LENGTH(`chr_scenes9`.`id`) || CHAR_LENGTH(`chr_scenes9`.`illustration`), CONCAT_WS('',   `chr_scenes9`.`id`, ' - ', `chr_scenes9`.`illustration`), '') /* Illustration of MCS Symptome */" => "illust_mcs_symptom",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Response */" => "mcs_response",
		"IF(    CHAR_LENGTH(`chr_scenes10`.`id`), CONCAT_WS('',   `chr_scenes10`.`id`, ' - '), '') /* Illustration of MCS Response */" => "illust_mcs_response"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'agent_id' => 'MemberID', 'dp_resolve' => 'Dp resolve', 'mc_resolve' => 'Resolve', 'illust_resolve' => 'Illustration of MC Resolve', 'illust_growth' => 'Illustration of MC Growth', 'illust_approach' => 'Illustration of MC Approach', 'illust_ps_style' => 'Illustration of MC PS Style', 'noetictension' => 'Noetic tension', 'illust_nt' => 'Illustration of Noetic Tension', 'impression' => 'Overall Impression Management', 'illust_im' => 'Illustration of Impression Mnmt.', 'mcs_problem' => 'Problem', 'illust_mcs_problem' => 'Illustration of MCS Problem', 'illust_mcs_solution' => 'Illustration of MCS Solution', 'illust_mcs_symptom' => 'Illustration of MCS Symptome', 'illust_mcs_response' => 'Illustration of MCS Response');

	$x->QueryFrom = "`chr_dev` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`chr_dev`.`agent_id` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`chr_dev`.`dp_resolve` LEFT JOIN `class_dynamicstorypoints` as class_dynamicstorypoints1 ON `class_dynamicstorypoints1`.`id`=`chr_dev`.`mc_resolve` LEFT JOIN `chr_scenes` as chr_scenes1 ON `chr_scenes1`.`id`=`chr_dev`.`illust_resolve` LEFT JOIN `chr_scenes` as chr_scenes2 ON `chr_scenes2`.`id`=`chr_dev`.`illust_growth` LEFT JOIN `chr_scenes` as chr_scenes3 ON `chr_scenes3`.`id`=`chr_dev`.`illust_approach` LEFT JOIN `chr_scenes` as chr_scenes4 ON `chr_scenes4`.`id`=`chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`chr_dev`.`noetictension` LEFT JOIN `chr_scenes` as chr_scenes5 ON `chr_scenes5`.`id`=`chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`chr_dev`.`impression` LEFT JOIN `chr_scenes` as chr_scenes6 ON `chr_scenes6`.`id`=`chr_dev`.`illust_im` LEFT JOIN `storystatic` as storystatic1 ON `storystatic1`.`id`=`chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`storystatic1`.`problem` LEFT JOIN `chr_scenes` as chr_scenes7 ON `chr_scenes7`.`id`=`chr_dev`.`illust_mcs_problem` LEFT JOIN `chr_scenes` as chr_scenes8 ON `chr_scenes8`.`id`=`chr_dev`.`illust_mcs_solution` LEFT JOIN `chr_scenes` as chr_scenes9 ON `chr_scenes9`.`id`=`chr_dev`.`illust_mcs_symptom` LEFT JOIN `chr_scenes` as chr_scenes10 ON `chr_scenes10`.`id`=`chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`storystatic1`.`response` ";
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
	$x->ScriptFileName = "chr_dev_view.php";
	$x->RedirectAfterInsert = "chr_dev_view.php";
	$x->TableTitle = "IV.1. Character Dev.";
	$x->TableIcon = "resources/table_icons/private.png";
	$x->PrimaryKey = "`chr_dev`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("ID", "MemberID", "Agent name", "Character name", "Img", "Dp resolve", "Resolve", "Illustration of MC Resolve", "Growth", "Illustration of MC Growth", "Approach", "Illustration of MC Approach", "Problem Solving Style", "Illustration of MC PS Style", "Age", "Gender", "Communication style", "Background", "Appearance", "Relationships", "Ambition", "Defects", "Thoughts", "Relatedness", "Restrictions", "Locations", "Persons", "Events", "Noetic tension", "Illustration of Noetic Tension", "Overall Impression Management", "Illustration of Impression Mnmt.", "Problem", "Illustration of MCS Problem", "Solution", "Illustration of MCS Solution", "Symptom", "Illustration of MCS Symptome", "Response", "Illustration of MCS Response");
	$x->ColFieldName = array('id', 'agent_id', 'agent_name', 'cw_name', 'img', 'dp_resolve', 'mc_resolve', 'illust_resolve', 'mc_growth', 'illust_growth', 'mc_approach', 'illust_approach', 'mc_ps_style', 'illust_ps_style', 'cw_age', 'cw_gender', 'cw_communication_style', 'cw_background', 'cw_appearance', 'cw_relationships', 'cw_ambition', 'cw_defects', 'cw_thoughts', 'cw_relatedness', 'cw_restrictions', 'locations', 'persons', 'events', 'noetictension', 'illust_nt', 'impression', 'illust_im', 'mcs_problem', 'illust_mcs_problem', 'mcs_solution', 'illust_mcs_solution', 'mcs_symptom', 'illust_mcs_symptom', 'mcs_response', 'illust_mcs_response');
	$x->ColNumber  = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40);

	// template paths below are based on the app main directory
	$x->Template = 'templates/chr_dev_templateTV.html';
	$x->SelectedTemplate = 'templates/chr_dev_templateTVS.html';
	$x->TemplateDV = 'templates/chr_dev_templateDV.html';
	$x->TemplateDVP = 'templates/chr_dev_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `chr_dev`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='chr_dev' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `chr_dev`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='chr_dev' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`chr_dev`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: chr_dev_init
	$render=TRUE;
	if(function_exists('chr_dev_init')){
		$args=array();
		$render=chr_dev_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: chr_dev_header
	$headerCode='';
	if(function_exists('chr_dev_header')){
		$args=array();
		$headerCode=chr_dev_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: chr_dev_footer
	$footerCode='';
	if(function_exists('chr_dev_footer')){
		$args=array();
		$footerCode=chr_dev_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>