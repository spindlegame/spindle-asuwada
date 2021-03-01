<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/hist_chr_dev.php");
	include_once("{$currDir}/hist_chr_dev_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('hist_chr_dev');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'hist_chr_dev';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`hist_chr_dev`.`id`" => "id",
		"IF(    CHAR_LENGTH(`hist_story1`.`id`) || CHAR_LENGTH(`hist_story1`.`story_title`), CONCAT_WS('',   `hist_story1`.`id`, ' - ', `hist_story1`.`story_title`), '') /* Hist story */" => "hist_story",
		"IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, ' - ', `bio_story1`.`story_title`), '') /* Bio story */" => "bio_story",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* MemberID */" => "agent_id",
		"IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`) || CHAR_LENGTH(`hist_chr1`.`agent_name`), CONCAT_WS('',   `class_dramatica_character1`.`character`, ', ', `hist_chr1`.`agent_name`), '') /* Agent name */" => "agent_name",
		"IF(    CHAR_LENGTH(`hist_chr2`.`character_name`), CONCAT_WS('',   `hist_chr2`.`character_name`), '') /* Cw name */" => "cw_name",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints11`.`term`), CONCAT_WS('',   `class_dramatica_storypoints11`.`term`), '') /* Dynamic point cat1 */" => "dp1_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints21`.`term`), CONCAT_WS('',   `class_dramatica_storypoints21`.`term`), '') /* Dynamic point cat2 */" => "dp2_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') /* Dynamic point cat3 */" => "dp3_resolve",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints41`.`term`), CONCAT_WS('',   `class_dynamicstorypoints41`.`term`), '') /* MC resolve */" => "mc_resolve",
		"IF(    CHAR_LENGTH(`hist_chr_scene1`.`id`) || CHAR_LENGTH(`hist_chr_scene1`.`illustration`), CONCAT_WS('',   `hist_chr_scene1`.`id`, ' - ', `hist_chr_scene1`.`illustration`), '') /* Illustration of MC Resolve */" => "illust_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints32`.`term`), CONCAT_WS('',   `class_dramatica_storypoints32`.`term`), '') /* Dynamic point cat3 */" => "dp3_growth",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints42`.`term`), CONCAT_WS('',   `class_dynamicstorypoints42`.`term`), '') /* Growth */" => "mc_growth",
		"IF(    CHAR_LENGTH(`hist_chr_scene2`.`id`) || CHAR_LENGTH(`hist_chr_scene2`.`illustration`), CONCAT_WS('',   `hist_chr_scene2`.`id`, ' - ', `hist_chr_scene2`.`illustration`), '') /* Illustration of MC Growth */" => "illust_growth",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints33`.`term`), CONCAT_WS('',   `class_dramatica_storypoints33`.`term`), '') /* Dynamic point cat3 */" => "dp3_approach",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints43`.`term`), CONCAT_WS('',   `class_dynamicstorypoints43`.`term`), '') /* Approach */" => "mc_approach",
		"IF(    CHAR_LENGTH(`hist_chr_scene3`.`id`) || CHAR_LENGTH(`hist_chr_scene3`.`illustration`), CONCAT_WS('',   `hist_chr_scene3`.`id`, ' - ', `hist_chr_scene3`.`illustration`), '') /* Illustration of MC Approach */" => "illust_approach",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints34`.`term`), CONCAT_WS('',   `class_dramatica_storypoints34`.`term`), '') /* Dynamic point cat3 */" => "dp3_psstyle",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints44`.`term`), CONCAT_WS('',   `class_dynamicstorypoints44`.`term`), '') /* Problem Solving Style */" => "mc_ps_style",
		"IF(    CHAR_LENGTH(`hist_chr_scene4`.`id`) || CHAR_LENGTH(`hist_chr_scene4`.`illustration`), CONCAT_WS('',   `hist_chr_scene4`.`id`, ' - ', `hist_chr_scene4`.`illustration`), '') /* Illustration of MC PS Style */" => "illust_ps_style",
		"`hist_chr_dev`.`cw_age`" => "cw_age",
		"`hist_chr_dev`.`cw_gender`" => "cw_gender",
		"`hist_chr_dev`.`cw_communication_style`" => "cw_communication_style",
		"`hist_chr_dev`.`cw_background`" => "cw_background",
		"`hist_chr_dev`.`cw_appearance`" => "cw_appearance",
		"`hist_chr_dev`.`cw_relationships`" => "cw_relationships",
		"`hist_chr_dev`.`cw_ambition`" => "cw_ambition",
		"`hist_chr_dev`.`cw_defects`" => "cw_defects",
		"`hist_chr_dev`.`cw_thoughts`" => "cw_thoughts",
		"`hist_chr_dev`.`cw_relatedness`" => "cw_relatedness",
		"`hist_chr_dev`.`cw_restrictions`" => "cw_restrictions",
		"`hist_chr_dev`.`locations`" => "locations",
		"`hist_chr_dev`.`persons`" => "persons",
		"`hist_chr_dev`.`events`" => "events",
		"IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') /* Noetic tension */" => "noetictension",
		"IF(    CHAR_LENGTH(`hist_chr_scene5`.`id`) || CHAR_LENGTH(`hist_chr_scene5`.`illustration`), CONCAT_WS('',   `hist_chr_scene5`.`id`, ' - ', `hist_chr_scene5`.`illustration`), '') /* Illustration of Noetic Tension */" => "illust_nt",
		"IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') /* Overall Impression Management */" => "impression",
		"IF(    CHAR_LENGTH(`hist_chr_scene6`.`id`) || CHAR_LENGTH(`hist_chr_scene6`.`illustration`), CONCAT_WS('',   `hist_chr_scene6`.`id`, ' - ', `hist_chr_scene6`.`illustration`), '') /* Illustration of Impression Mnmt. */" => "illust_im",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problem */" => "mcs_problem",
		"IF(    CHAR_LENGTH(`hist_chr_scene7`.`id`) || CHAR_LENGTH(`hist_chr_scene7`.`illustration`), CONCAT_WS('',   `hist_chr_scene7`.`id`, ' - ', `hist_chr_scene7`.`illustration`), '') /* Illustration of MCS Problem */" => "illust_mcs_problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Solution */" => "mcs_solution",
		"IF(    CHAR_LENGTH(`hist_chr_scene8`.`id`) || CHAR_LENGTH(`hist_chr_scene8`.`illustration`), CONCAT_WS('',   `hist_chr_scene8`.`id`, ' - ', `hist_chr_scene8`.`illustration`), '') /* Illustration of MCS Solution */" => "illust_mcs_solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* Symptom */" => "mcs_symptom",
		"IF(    CHAR_LENGTH(`hist_chr_scene9`.`id`) || CHAR_LENGTH(`hist_chr_scene9`.`illustration`), CONCAT_WS('',   `hist_chr_scene9`.`id`, ' - ', `hist_chr_scene9`.`illustration`), '') /* Illustration of MCS Symptome */" => "illust_mcs_symptom",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Response */" => "mcs_response",
		"IF(    CHAR_LENGTH(`hist_chr_scene10`.`id`) || CHAR_LENGTH(`hist_chr_scene10`.`illustration`), CONCAT_WS('',   `hist_chr_scene10`.`id`, ' - ', `hist_chr_scene10`.`illustration`), '') /* Illustration of MCS Response */" => "illust_mcs_response",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`hist_chr_dev`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => '`hist_chr2`.`character_name`',
		7 => '`class_dramatica_storypoints11`.`term`',
		8 => '`class_dramatica_storypoints21`.`term`',
		9 => '`class_dramatica_storypoints31`.`term`',
		10 => '`class_dynamicstorypoints41`.`term`',
		11 => 11,
		12 => '`class_dramatica_storypoints32`.`term`',
		13 => '`class_dynamicstorypoints42`.`term`',
		14 => 14,
		15 => '`class_dramatica_storypoints33`.`term`',
		16 => '`class_dynamicstorypoints43`.`term`',
		17 => 17,
		18 => '`class_dramatica_storypoints34`.`term`',
		19 => '`class_dynamicstorypoints44`.`term`',
		20 => 20,
		21 => 21,
		22 => '`hist_chr_dev`.`cw_gender`',
		23 => 23,
		24 => 24,
		25 => 25,
		26 => 26,
		27 => 27,
		28 => 28,
		29 => 29,
		30 => 30,
		31 => 31,
		32 => 32,
		33 => 33,
		34 => 34,
		35 => '`class_nt1`.`noetictension`',
		36 => 36,
		37 => '`class_im1`.`impression`',
		38 => 38,
		39 => 39,
		40 => 40,
		41 => 41,
		42 => 42,
		43 => 43,
		44 => 44,
		45 => 45,
		46 => 46,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`hist_chr_dev`.`id`" => "id",
		"IF(    CHAR_LENGTH(`hist_story1`.`id`) || CHAR_LENGTH(`hist_story1`.`story_title`), CONCAT_WS('',   `hist_story1`.`id`, ' - ', `hist_story1`.`story_title`), '') /* Hist story */" => "hist_story",
		"IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, ' - ', `bio_story1`.`story_title`), '') /* Bio story */" => "bio_story",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* MemberID */" => "agent_id",
		"IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`) || CHAR_LENGTH(`hist_chr1`.`agent_name`), CONCAT_WS('',   `class_dramatica_character1`.`character`, ', ', `hist_chr1`.`agent_name`), '') /* Agent name */" => "agent_name",
		"IF(    CHAR_LENGTH(`hist_chr2`.`character_name`), CONCAT_WS('',   `hist_chr2`.`character_name`), '') /* Cw name */" => "cw_name",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints11`.`term`), CONCAT_WS('',   `class_dramatica_storypoints11`.`term`), '') /* Dynamic point cat1 */" => "dp1_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints21`.`term`), CONCAT_WS('',   `class_dramatica_storypoints21`.`term`), '') /* Dynamic point cat2 */" => "dp2_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') /* Dynamic point cat3 */" => "dp3_resolve",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints41`.`term`), CONCAT_WS('',   `class_dynamicstorypoints41`.`term`), '') /* MC resolve */" => "mc_resolve",
		"IF(    CHAR_LENGTH(`hist_chr_scene1`.`id`) || CHAR_LENGTH(`hist_chr_scene1`.`illustration`), CONCAT_WS('',   `hist_chr_scene1`.`id`, ' - ', `hist_chr_scene1`.`illustration`), '') /* Illustration of MC Resolve */" => "illust_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints32`.`term`), CONCAT_WS('',   `class_dramatica_storypoints32`.`term`), '') /* Dynamic point cat3 */" => "dp3_growth",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints42`.`term`), CONCAT_WS('',   `class_dynamicstorypoints42`.`term`), '') /* Growth */" => "mc_growth",
		"IF(    CHAR_LENGTH(`hist_chr_scene2`.`id`) || CHAR_LENGTH(`hist_chr_scene2`.`illustration`), CONCAT_WS('',   `hist_chr_scene2`.`id`, ' - ', `hist_chr_scene2`.`illustration`), '') /* Illustration of MC Growth */" => "illust_growth",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints33`.`term`), CONCAT_WS('',   `class_dramatica_storypoints33`.`term`), '') /* Dynamic point cat3 */" => "dp3_approach",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints43`.`term`), CONCAT_WS('',   `class_dynamicstorypoints43`.`term`), '') /* Approach */" => "mc_approach",
		"IF(    CHAR_LENGTH(`hist_chr_scene3`.`id`) || CHAR_LENGTH(`hist_chr_scene3`.`illustration`), CONCAT_WS('',   `hist_chr_scene3`.`id`, ' - ', `hist_chr_scene3`.`illustration`), '') /* Illustration of MC Approach */" => "illust_approach",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints34`.`term`), CONCAT_WS('',   `class_dramatica_storypoints34`.`term`), '') /* Dynamic point cat3 */" => "dp3_psstyle",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints44`.`term`), CONCAT_WS('',   `class_dynamicstorypoints44`.`term`), '') /* Problem Solving Style */" => "mc_ps_style",
		"IF(    CHAR_LENGTH(`hist_chr_scene4`.`id`) || CHAR_LENGTH(`hist_chr_scene4`.`illustration`), CONCAT_WS('',   `hist_chr_scene4`.`id`, ' - ', `hist_chr_scene4`.`illustration`), '') /* Illustration of MC PS Style */" => "illust_ps_style",
		"`hist_chr_dev`.`cw_age`" => "cw_age",
		"`hist_chr_dev`.`cw_gender`" => "cw_gender",
		"`hist_chr_dev`.`cw_communication_style`" => "cw_communication_style",
		"`hist_chr_dev`.`cw_background`" => "cw_background",
		"`hist_chr_dev`.`cw_appearance`" => "cw_appearance",
		"`hist_chr_dev`.`cw_relationships`" => "cw_relationships",
		"`hist_chr_dev`.`cw_ambition`" => "cw_ambition",
		"`hist_chr_dev`.`cw_defects`" => "cw_defects",
		"`hist_chr_dev`.`cw_thoughts`" => "cw_thoughts",
		"`hist_chr_dev`.`cw_relatedness`" => "cw_relatedness",
		"`hist_chr_dev`.`cw_restrictions`" => "cw_restrictions",
		"`hist_chr_dev`.`locations`" => "locations",
		"`hist_chr_dev`.`persons`" => "persons",
		"`hist_chr_dev`.`events`" => "events",
		"IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') /* Noetic tension */" => "noetictension",
		"IF(    CHAR_LENGTH(`hist_chr_scene5`.`id`) || CHAR_LENGTH(`hist_chr_scene5`.`illustration`), CONCAT_WS('',   `hist_chr_scene5`.`id`, ' - ', `hist_chr_scene5`.`illustration`), '') /* Illustration of Noetic Tension */" => "illust_nt",
		"IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') /* Overall Impression Management */" => "impression",
		"IF(    CHAR_LENGTH(`hist_chr_scene6`.`id`) || CHAR_LENGTH(`hist_chr_scene6`.`illustration`), CONCAT_WS('',   `hist_chr_scene6`.`id`, ' - ', `hist_chr_scene6`.`illustration`), '') /* Illustration of Impression Mnmt. */" => "illust_im",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problem */" => "mcs_problem",
		"IF(    CHAR_LENGTH(`hist_chr_scene7`.`id`) || CHAR_LENGTH(`hist_chr_scene7`.`illustration`), CONCAT_WS('',   `hist_chr_scene7`.`id`, ' - ', `hist_chr_scene7`.`illustration`), '') /* Illustration of MCS Problem */" => "illust_mcs_problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Solution */" => "mcs_solution",
		"IF(    CHAR_LENGTH(`hist_chr_scene8`.`id`) || CHAR_LENGTH(`hist_chr_scene8`.`illustration`), CONCAT_WS('',   `hist_chr_scene8`.`id`, ' - ', `hist_chr_scene8`.`illustration`), '') /* Illustration of MCS Solution */" => "illust_mcs_solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* Symptom */" => "mcs_symptom",
		"IF(    CHAR_LENGTH(`hist_chr_scene9`.`id`) || CHAR_LENGTH(`hist_chr_scene9`.`illustration`), CONCAT_WS('',   `hist_chr_scene9`.`id`, ' - ', `hist_chr_scene9`.`illustration`), '') /* Illustration of MCS Symptome */" => "illust_mcs_symptom",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Response */" => "mcs_response",
		"IF(    CHAR_LENGTH(`hist_chr_scene10`.`id`) || CHAR_LENGTH(`hist_chr_scene10`.`illustration`), CONCAT_WS('',   `hist_chr_scene10`.`id`, ' - ', `hist_chr_scene10`.`illustration`), '') /* Illustration of MCS Response */" => "illust_mcs_response",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`hist_chr_dev`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`hist_story1`.`id`) || CHAR_LENGTH(`hist_story1`.`story_title`), CONCAT_WS('',   `hist_story1`.`id`, ' - ', `hist_story1`.`story_title`), '') /* Hist story */" => "Hist story",
		"IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, ' - ', `bio_story1`.`story_title`), '') /* Bio story */" => "Bio story",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* MemberID */" => "MemberID",
		"IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`) || CHAR_LENGTH(`hist_chr1`.`agent_name`), CONCAT_WS('',   `class_dramatica_character1`.`character`, ', ', `hist_chr1`.`agent_name`), '') /* Agent name */" => "Agent name",
		"IF(    CHAR_LENGTH(`hist_chr2`.`character_name`), CONCAT_WS('',   `hist_chr2`.`character_name`), '') /* Cw name */" => "Cw name",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints11`.`term`), CONCAT_WS('',   `class_dramatica_storypoints11`.`term`), '') /* Dynamic point cat1 */" => "Dynamic point cat1",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints21`.`term`), CONCAT_WS('',   `class_dramatica_storypoints21`.`term`), '') /* Dynamic point cat2 */" => "Dynamic point cat2",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') /* Dynamic point cat3 */" => "Dynamic point cat3",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints41`.`term`), CONCAT_WS('',   `class_dynamicstorypoints41`.`term`), '') /* MC resolve */" => "MC resolve",
		"IF(    CHAR_LENGTH(`hist_chr_scene1`.`id`) || CHAR_LENGTH(`hist_chr_scene1`.`illustration`), CONCAT_WS('',   `hist_chr_scene1`.`id`, ' - ', `hist_chr_scene1`.`illustration`), '') /* Illustration of MC Resolve */" => "Illustration of MC Resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints32`.`term`), CONCAT_WS('',   `class_dramatica_storypoints32`.`term`), '') /* Dynamic point cat3 */" => "Dynamic point cat3",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints42`.`term`), CONCAT_WS('',   `class_dynamicstorypoints42`.`term`), '') /* Growth */" => "Growth",
		"IF(    CHAR_LENGTH(`hist_chr_scene2`.`id`) || CHAR_LENGTH(`hist_chr_scene2`.`illustration`), CONCAT_WS('',   `hist_chr_scene2`.`id`, ' - ', `hist_chr_scene2`.`illustration`), '') /* Illustration of MC Growth */" => "Illustration of MC Growth",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints33`.`term`), CONCAT_WS('',   `class_dramatica_storypoints33`.`term`), '') /* Dynamic point cat3 */" => "Dynamic point cat3",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints43`.`term`), CONCAT_WS('',   `class_dynamicstorypoints43`.`term`), '') /* Approach */" => "Approach",
		"IF(    CHAR_LENGTH(`hist_chr_scene3`.`id`) || CHAR_LENGTH(`hist_chr_scene3`.`illustration`), CONCAT_WS('',   `hist_chr_scene3`.`id`, ' - ', `hist_chr_scene3`.`illustration`), '') /* Illustration of MC Approach */" => "Illustration of MC Approach",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints34`.`term`), CONCAT_WS('',   `class_dramatica_storypoints34`.`term`), '') /* Dynamic point cat3 */" => "Dynamic point cat3",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints44`.`term`), CONCAT_WS('',   `class_dynamicstorypoints44`.`term`), '') /* Problem Solving Style */" => "Problem Solving Style",
		"IF(    CHAR_LENGTH(`hist_chr_scene4`.`id`) || CHAR_LENGTH(`hist_chr_scene4`.`illustration`), CONCAT_WS('',   `hist_chr_scene4`.`id`, ' - ', `hist_chr_scene4`.`illustration`), '') /* Illustration of MC PS Style */" => "Illustration of MC PS Style",
		"`hist_chr_dev`.`cw_age`" => "Age",
		"`hist_chr_dev`.`cw_gender`" => "Gender",
		"`hist_chr_dev`.`cw_communication_style`" => "Communication style",
		"`hist_chr_dev`.`cw_background`" => "Background",
		"`hist_chr_dev`.`cw_appearance`" => "Appearance",
		"`hist_chr_dev`.`cw_relationships`" => "Relationships",
		"`hist_chr_dev`.`cw_ambition`" => "Ambition",
		"`hist_chr_dev`.`cw_defects`" => "Defects",
		"`hist_chr_dev`.`cw_thoughts`" => "Thoughts",
		"`hist_chr_dev`.`cw_relatedness`" => "Relatedness",
		"`hist_chr_dev`.`cw_restrictions`" => "Restrictions",
		"`hist_chr_dev`.`locations`" => "Locations",
		"`hist_chr_dev`.`persons`" => "Persons",
		"`hist_chr_dev`.`events`" => "Events",
		"IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') /* Noetic tension */" => "Noetic tension",
		"IF(    CHAR_LENGTH(`hist_chr_scene5`.`id`) || CHAR_LENGTH(`hist_chr_scene5`.`illustration`), CONCAT_WS('',   `hist_chr_scene5`.`id`, ' - ', `hist_chr_scene5`.`illustration`), '') /* Illustration of Noetic Tension */" => "Illustration of Noetic Tension",
		"IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') /* Overall Impression Management */" => "Overall Impression Management",
		"IF(    CHAR_LENGTH(`hist_chr_scene6`.`id`) || CHAR_LENGTH(`hist_chr_scene6`.`illustration`), CONCAT_WS('',   `hist_chr_scene6`.`id`, ' - ', `hist_chr_scene6`.`illustration`), '') /* Illustration of Impression Mnmt. */" => "Illustration of Impression Mnmt.",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problem */" => "Problem",
		"IF(    CHAR_LENGTH(`hist_chr_scene7`.`id`) || CHAR_LENGTH(`hist_chr_scene7`.`illustration`), CONCAT_WS('',   `hist_chr_scene7`.`id`, ' - ', `hist_chr_scene7`.`illustration`), '') /* Illustration of MCS Problem */" => "Illustration of MCS Problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Solution */" => "Solution",
		"IF(    CHAR_LENGTH(`hist_chr_scene8`.`id`) || CHAR_LENGTH(`hist_chr_scene8`.`illustration`), CONCAT_WS('',   `hist_chr_scene8`.`id`, ' - ', `hist_chr_scene8`.`illustration`), '') /* Illustration of MCS Solution */" => "Illustration of MCS Solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* Symptom */" => "Symptom",
		"IF(    CHAR_LENGTH(`hist_chr_scene9`.`id`) || CHAR_LENGTH(`hist_chr_scene9`.`illustration`), CONCAT_WS('',   `hist_chr_scene9`.`id`, ' - ', `hist_chr_scene9`.`illustration`), '') /* Illustration of MCS Symptome */" => "Illustration of MCS Symptome",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Response */" => "Response",
		"IF(    CHAR_LENGTH(`hist_chr_scene10`.`id`) || CHAR_LENGTH(`hist_chr_scene10`.`illustration`), CONCAT_WS('',   `hist_chr_scene10`.`id`, ' - ', `hist_chr_scene10`.`illustration`), '') /* Illustration of MCS Response */" => "Illustration of MCS Response",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`hist_chr_dev`.`id`" => "id",
		"IF(    CHAR_LENGTH(`hist_story1`.`id`) || CHAR_LENGTH(`hist_story1`.`story_title`), CONCAT_WS('',   `hist_story1`.`id`, ' - ', `hist_story1`.`story_title`), '') /* Hist story */" => "hist_story",
		"IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, ' - ', `bio_story1`.`story_title`), '') /* Bio story */" => "bio_story",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* MemberID */" => "agent_id",
		"IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`) || CHAR_LENGTH(`hist_chr1`.`agent_name`), CONCAT_WS('',   `class_dramatica_character1`.`character`, ', ', `hist_chr1`.`agent_name`), '') /* Agent name */" => "agent_name",
		"IF(    CHAR_LENGTH(`hist_chr2`.`character_name`), CONCAT_WS('',   `hist_chr2`.`character_name`), '') /* Cw name */" => "cw_name",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints11`.`term`), CONCAT_WS('',   `class_dramatica_storypoints11`.`term`), '') /* Dynamic point cat1 */" => "dp1_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints21`.`term`), CONCAT_WS('',   `class_dramatica_storypoints21`.`term`), '') /* Dynamic point cat2 */" => "dp2_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') /* Dynamic point cat3 */" => "dp3_resolve",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints41`.`term`), CONCAT_WS('',   `class_dynamicstorypoints41`.`term`), '') /* MC resolve */" => "mc_resolve",
		"IF(    CHAR_LENGTH(`hist_chr_scene1`.`id`) || CHAR_LENGTH(`hist_chr_scene1`.`illustration`), CONCAT_WS('',   `hist_chr_scene1`.`id`, ' - ', `hist_chr_scene1`.`illustration`), '') /* Illustration of MC Resolve */" => "illust_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints32`.`term`), CONCAT_WS('',   `class_dramatica_storypoints32`.`term`), '') /* Dynamic point cat3 */" => "dp3_growth",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints42`.`term`), CONCAT_WS('',   `class_dynamicstorypoints42`.`term`), '') /* Growth */" => "mc_growth",
		"IF(    CHAR_LENGTH(`hist_chr_scene2`.`id`) || CHAR_LENGTH(`hist_chr_scene2`.`illustration`), CONCAT_WS('',   `hist_chr_scene2`.`id`, ' - ', `hist_chr_scene2`.`illustration`), '') /* Illustration of MC Growth */" => "illust_growth",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints33`.`term`), CONCAT_WS('',   `class_dramatica_storypoints33`.`term`), '') /* Dynamic point cat3 */" => "dp3_approach",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints43`.`term`), CONCAT_WS('',   `class_dynamicstorypoints43`.`term`), '') /* Approach */" => "mc_approach",
		"IF(    CHAR_LENGTH(`hist_chr_scene3`.`id`) || CHAR_LENGTH(`hist_chr_scene3`.`illustration`), CONCAT_WS('',   `hist_chr_scene3`.`id`, ' - ', `hist_chr_scene3`.`illustration`), '') /* Illustration of MC Approach */" => "illust_approach",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints34`.`term`), CONCAT_WS('',   `class_dramatica_storypoints34`.`term`), '') /* Dynamic point cat3 */" => "dp3_psstyle",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints44`.`term`), CONCAT_WS('',   `class_dynamicstorypoints44`.`term`), '') /* Problem Solving Style */" => "mc_ps_style",
		"IF(    CHAR_LENGTH(`hist_chr_scene4`.`id`) || CHAR_LENGTH(`hist_chr_scene4`.`illustration`), CONCAT_WS('',   `hist_chr_scene4`.`id`, ' - ', `hist_chr_scene4`.`illustration`), '') /* Illustration of MC PS Style */" => "illust_ps_style",
		"`hist_chr_dev`.`cw_age`" => "cw_age",
		"`hist_chr_dev`.`cw_gender`" => "cw_gender",
		"`hist_chr_dev`.`cw_communication_style`" => "cw_communication_style",
		"`hist_chr_dev`.`cw_background`" => "cw_background",
		"`hist_chr_dev`.`cw_appearance`" => "cw_appearance",
		"`hist_chr_dev`.`cw_relationships`" => "cw_relationships",
		"`hist_chr_dev`.`cw_ambition`" => "cw_ambition",
		"`hist_chr_dev`.`cw_defects`" => "cw_defects",
		"`hist_chr_dev`.`cw_thoughts`" => "cw_thoughts",
		"`hist_chr_dev`.`cw_relatedness`" => "cw_relatedness",
		"`hist_chr_dev`.`cw_restrictions`" => "cw_restrictions",
		"`hist_chr_dev`.`locations`" => "locations",
		"`hist_chr_dev`.`persons`" => "persons",
		"`hist_chr_dev`.`events`" => "events",
		"IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') /* Noetic tension */" => "noetictension",
		"IF(    CHAR_LENGTH(`hist_chr_scene5`.`id`) || CHAR_LENGTH(`hist_chr_scene5`.`illustration`), CONCAT_WS('',   `hist_chr_scene5`.`id`, ' - ', `hist_chr_scene5`.`illustration`), '') /* Illustration of Noetic Tension */" => "illust_nt",
		"IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') /* Overall Impression Management */" => "impression",
		"IF(    CHAR_LENGTH(`hist_chr_scene6`.`id`) || CHAR_LENGTH(`hist_chr_scene6`.`illustration`), CONCAT_WS('',   `hist_chr_scene6`.`id`, ' - ', `hist_chr_scene6`.`illustration`), '') /* Illustration of Impression Mnmt. */" => "illust_im",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problem */" => "mcs_problem",
		"IF(    CHAR_LENGTH(`hist_chr_scene7`.`id`) || CHAR_LENGTH(`hist_chr_scene7`.`illustration`), CONCAT_WS('',   `hist_chr_scene7`.`id`, ' - ', `hist_chr_scene7`.`illustration`), '') /* Illustration of MCS Problem */" => "illust_mcs_problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Solution */" => "mcs_solution",
		"IF(    CHAR_LENGTH(`hist_chr_scene8`.`id`) || CHAR_LENGTH(`hist_chr_scene8`.`illustration`), CONCAT_WS('',   `hist_chr_scene8`.`id`, ' - ', `hist_chr_scene8`.`illustration`), '') /* Illustration of MCS Solution */" => "illust_mcs_solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* Symptom */" => "mcs_symptom",
		"IF(    CHAR_LENGTH(`hist_chr_scene9`.`id`) || CHAR_LENGTH(`hist_chr_scene9`.`illustration`), CONCAT_WS('',   `hist_chr_scene9`.`id`, ' - ', `hist_chr_scene9`.`illustration`), '') /* Illustration of MCS Symptome */" => "illust_mcs_symptom",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Response */" => "mcs_response",
		"IF(    CHAR_LENGTH(`hist_chr_scene10`.`id`) || CHAR_LENGTH(`hist_chr_scene10`.`illustration`), CONCAT_WS('',   `hist_chr_scene10`.`id`, ' - ', `hist_chr_scene10`.`illustration`), '') /* Illustration of MCS Response */" => "illust_mcs_response",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['hist_story' => 'Hist story', 'bio_story' => 'Bio story', 'agent_id' => 'MemberID', 'agent_name' => 'Agent name', 'cw_name' => 'Cw name', 'dp1_resolve' => 'Dynamic point cat1', 'dp2_resolve' => 'Dynamic point cat2', 'dp3_resolve' => 'Dynamic point cat3', 'mc_resolve' => 'MC resolve', 'illust_resolve' => 'Illustration of MC Resolve', 'dp3_growth' => 'Dynamic point cat3', 'mc_growth' => 'Growth', 'illust_growth' => 'Illustration of MC Growth', 'dp3_approach' => 'Dynamic point cat3', 'mc_approach' => 'Approach', 'illust_approach' => 'Illustration of MC Approach', 'dp3_psstyle' => 'Dynamic point cat3', 'mc_ps_style' => 'Problem Solving Style', 'illust_ps_style' => 'Illustration of MC PS Style', 'noetictension' => 'Noetic tension', 'illust_nt' => 'Illustration of Noetic Tension', 'impression' => 'Overall Impression Management', 'illust_im' => 'Illustration of Impression Mnmt.', 'mcs_problem' => 'Problem', 'illust_mcs_problem' => 'Illustration of MCS Problem', 'illust_mcs_solution' => 'Illustration of MCS Solution', 'illust_mcs_symptom' => 'Illustration of MCS Symptome', 'illust_mcs_response' => 'Illustration of MCS Response', ];

	$x->QueryFrom = "`hist_chr_dev` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr_dev`.`hist_story` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr_dev`.`bio_story` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`hist_chr_dev`.`agent_id` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_chr_dev`.`agent_name` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `hist_chr` as hist_chr2 ON `hist_chr2`.`id`=`hist_chr_dev`.`cw_name` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`hist_chr_dev`.`dp1_resolve` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`hist_chr_dev`.`dp2_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`hist_chr_dev`.`dp3_resolve` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints41 ON `class_dynamicstorypoints41`.`id`=`hist_chr_dev`.`mc_resolve` LEFT JOIN `hist_chr_scene` as hist_chr_scene1 ON `hist_chr_scene1`.`id`=`hist_chr_dev`.`illust_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints32 ON `class_dramatica_storypoints32`.`id`=`hist_chr_dev`.`dp3_growth` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints42 ON `class_dynamicstorypoints42`.`id`=`hist_chr_dev`.`mc_growth` LEFT JOIN `hist_chr_scene` as hist_chr_scene2 ON `hist_chr_scene2`.`id`=`hist_chr_dev`.`illust_growth` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints33 ON `class_dramatica_storypoints33`.`id`=`hist_chr_dev`.`dp3_approach` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints43 ON `class_dynamicstorypoints43`.`id`=`hist_chr_dev`.`mc_approach` LEFT JOIN `hist_chr_scene` as hist_chr_scene3 ON `hist_chr_scene3`.`id`=`hist_chr_dev`.`illust_approach` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints34 ON `class_dramatica_storypoints34`.`id`=`hist_chr_dev`.`dp3_psstyle` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints44 ON `class_dynamicstorypoints44`.`id`=`hist_chr_dev`.`mc_ps_style` LEFT JOIN `hist_chr_scene` as hist_chr_scene4 ON `hist_chr_scene4`.`id`=`hist_chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`hist_chr_dev`.`noetictension` LEFT JOIN `hist_chr_scene` as hist_chr_scene5 ON `hist_chr_scene5`.`id`=`hist_chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`hist_chr_dev`.`impression` LEFT JOIN `hist_chr_scene` as hist_chr_scene6 ON `hist_chr_scene6`.`id`=`hist_chr_dev`.`illust_im` LEFT JOIN `hist_storystatic` as hist_storystatic1 ON `hist_storystatic1`.`id`=`hist_chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`hist_storystatic1`.`problem` LEFT JOIN `hist_chr_scene` as hist_chr_scene7 ON `hist_chr_scene7`.`id`=`hist_chr_dev`.`illust_mcs_problem` LEFT JOIN `hist_chr_scene` as hist_chr_scene8 ON `hist_chr_scene8`.`id`=`hist_chr_dev`.`illust_mcs_solution` LEFT JOIN `hist_chr_scene` as hist_chr_scene9 ON `hist_chr_scene9`.`id`=`hist_chr_dev`.`illust_mcs_symptom` LEFT JOIN `hist_chr_scene` as hist_chr_scene10 ON `hist_chr_scene10`.`id`=`hist_chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`hist_storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`hist_storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`hist_storystatic1`.`response` ";
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
	$x->ScriptFileName = 'hist_chr_dev_view.php';
	$x->RedirectAfterInsert = 'hist_chr_dev_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Hist. character dev.';
	$x->TableIcon = 'resources/table_icons/private.png';
	$x->PrimaryKey = '`hist_chr_dev`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['ID', 'Hist story', 'Bio story', 'MemberID', 'Agent name', 'Cw name', 'Dynamic point cat1', 'Dynamic point cat2', 'Dynamic point cat3', 'MC resolve', 'Illustration of MC Resolve', 'Dynamic point cat3', 'Growth', 'Illustration of MC Growth', 'Dynamic point cat3', 'Approach', 'Illustration of MC Approach', 'Dynamic point cat3', 'Problem Solving Style', 'Illustration of MC PS Style', 'Age', 'Gender', 'Communication style', 'Background', 'Appearance', 'Relationships', 'Ambition', 'Defects', 'Thoughts', 'Relatedness', 'Restrictions', 'Locations', 'Persons', 'Events', 'Noetic tension', 'Illustration of Noetic Tension', 'Overall Impression Management', 'Illustration of Impression Mnmt.', 'Problem', 'Illustration of MCS Problem', 'Solution', 'Illustration of MCS Solution', 'Symptom', 'Illustration of MCS Symptome', 'Response', 'Illustration of MCS Response', ];
	$x->ColFieldName = ['id', 'hist_story', 'bio_story', 'agent_id', 'agent_name', 'cw_name', 'dp1_resolve', 'dp2_resolve', 'dp3_resolve', 'mc_resolve', 'illust_resolve', 'dp3_growth', 'mc_growth', 'illust_growth', 'dp3_approach', 'mc_approach', 'illust_approach', 'dp3_psstyle', 'mc_ps_style', 'illust_ps_style', 'cw_age', 'cw_gender', 'cw_communication_style', 'cw_background', 'cw_appearance', 'cw_relationships', 'cw_ambition', 'cw_defects', 'cw_thoughts', 'cw_relatedness', 'cw_restrictions', 'locations', 'persons', 'events', 'noetictension', 'illust_nt', 'impression', 'illust_im', 'mcs_problem', 'illust_mcs_problem', 'mcs_solution', 'illust_mcs_solution', 'mcs_symptom', 'illust_mcs_symptom', 'mcs_response', 'illust_mcs_response', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/hist_chr_dev_templateTV.html';
	$x->SelectedTemplate = 'templates/hist_chr_dev_templateTVS.html';
	$x->TemplateDV = 'templates/hist_chr_dev_templateDV.html';
	$x->TemplateDVP = 'templates/hist_chr_dev_templateDVP.html';

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
		$x->QueryWhere = "WHERE `hist_chr_dev`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='hist_chr_dev' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `hist_chr_dev`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='hist_chr_dev' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`hist_chr_dev`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: hist_chr_dev_init
	$render = true;
	if(function_exists('hist_chr_dev_init')) {
		$args = [];
		$render = hist_chr_dev_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: hist_chr_dev_header
	$headerCode = '';
	if(function_exists('hist_chr_dev_header')) {
		$args = [];
		$headerCode = hist_chr_dev_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: hist_chr_dev_footer
	$footerCode = '';
	if(function_exists('hist_chr_dev_footer')) {
		$args = [];
		$footerCode = hist_chr_dev_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
