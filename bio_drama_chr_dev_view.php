<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/bio_drama_chr_dev.php");
	include_once("{$currDir}/bio_drama_chr_dev_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('bio_drama_chr_dev');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout(function() { window.location = "index.php?signOut=1"; }, 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = 'bio_drama_chr_dev';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`bio_drama_chr_dev`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* MemberID */" => "agent_id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Agent name */" => "agent_name",
		"IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, ' - ', `bio_story1`.`story_title`), '') /* Bio story */" => "bio_story",
		"IF(    CHAR_LENGTH(`bio_chr1`.`character_name`) || CHAR_LENGTH(`bio_chr1`.`agent_name`), CONCAT_WS('',   `bio_chr1`.`character_name`, ' - ', `bio_chr1`.`agent_name`), '') /* Cw name */" => "cw_name",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints11`.`term`), CONCAT_WS('',   `class_dramatica_storypoints11`.`term`), '') /* Dynamic point cat1 */" => "dp1_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints21`.`term`), CONCAT_WS('',   `class_dramatica_storypoints21`.`term`), '') /* Dynamic point cat2 */" => "dp2_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') /* Dynamic point cat3 */" => "dp3_resolve",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints41`.`term`), CONCAT_WS('',   `class_dynamicstorypoints41`.`term`), '') /* MC resolve */" => "mc_resolve",
		"IF(    CHAR_LENGTH(`bio_chr_scene1`.`id`) || CHAR_LENGTH(`bio_chr_scene1`.`illustration`), CONCAT_WS('',   `bio_chr_scene1`.`id`, ' - ', `bio_chr_scene1`.`illustration`), '') /* Illustration of MC Resolve */" => "illust_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints32`.`term`), CONCAT_WS('',   `class_dramatica_storypoints32`.`term`), '') /* Dynamic point cat3 */" => "dp3_growth",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints42`.`term`), CONCAT_WS('',   `class_dynamicstorypoints42`.`term`), '') /* Growth */" => "mc_growth",
		"IF(    CHAR_LENGTH(`bio_chr_scene2`.`id`) || CHAR_LENGTH(`bio_chr_scene2`.`illustration`), CONCAT_WS('',   `bio_chr_scene2`.`id`, ' - ', `bio_chr_scene2`.`illustration`), '') /* Illustration of MC Growth */" => "illust_growth",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints33`.`term`), CONCAT_WS('',   `class_dramatica_storypoints33`.`term`), '') /* Dynamic point cat3 */" => "dp3_approach",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints43`.`term`), CONCAT_WS('',   `class_dynamicstorypoints43`.`term`), '') /* Approach */" => "mc_approach",
		"IF(    CHAR_LENGTH(`bio_chr_scene3`.`id`) || CHAR_LENGTH(`bio_chr_scene3`.`illustration`), CONCAT_WS('',   `bio_chr_scene3`.`id`, ' - ', `bio_chr_scene3`.`illustration`), '') /* Illustration of MC Approach */" => "illust_approach",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints34`.`term`), CONCAT_WS('',   `class_dramatica_storypoints34`.`term`), '') /* Dynamic point cat3 */" => "dp3_psstyle",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints44`.`term`), CONCAT_WS('',   `class_dynamicstorypoints44`.`term`), '') /* Problem Solving Style */" => "mc_ps_style",
		"IF(    CHAR_LENGTH(`bio_chr_scene4`.`id`) || CHAR_LENGTH(`bio_chr_scene4`.`illustration`), CONCAT_WS('',   `bio_chr_scene4`.`id`, ' - ', `bio_chr_scene4`.`illustration`), '') /* Illustration of MC PS Style */" => "illust_ps_style",
		"`bio_drama_chr_dev`.`cw_age`" => "cw_age",
		"`bio_drama_chr_dev`.`cw_gender`" => "cw_gender",
		"`bio_drama_chr_dev`.`cw_communication_style`" => "cw_communication_style",
		"`bio_drama_chr_dev`.`cw_background`" => "cw_background",
		"`bio_drama_chr_dev`.`cw_appearance`" => "cw_appearance",
		"`bio_drama_chr_dev`.`cw_relationships`" => "cw_relationships",
		"`bio_drama_chr_dev`.`cw_ambition`" => "cw_ambition",
		"`bio_drama_chr_dev`.`cw_defects`" => "cw_defects",
		"`bio_drama_chr_dev`.`cw_thoughts`" => "cw_thoughts",
		"`bio_drama_chr_dev`.`cw_relatedness`" => "cw_relatedness",
		"`bio_drama_chr_dev`.`cw_restrictions`" => "cw_restrictions",
		"`bio_drama_chr_dev`.`locations`" => "locations",
		"`bio_drama_chr_dev`.`persons`" => "persons",
		"`bio_drama_chr_dev`.`events`" => "events",
		"IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') /* Noetic tension */" => "noetictension",
		"IF(    CHAR_LENGTH(`bio_chr_scene5`.`id`) || CHAR_LENGTH(`bio_chr_scene5`.`illustration`), CONCAT_WS('',   `bio_chr_scene5`.`id`, ' - ', `bio_chr_scene5`.`illustration`), '') /* Illustration of Noetic Tension */" => "illust_nt",
		"IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') /* Overall Impression Management */" => "impression",
		"IF(    CHAR_LENGTH(`bio_chr_scene6`.`id`) || CHAR_LENGTH(`bio_chr_scene6`.`illustration`), CONCAT_WS('',   `bio_chr_scene6`.`id`, ' - ', `bio_chr_scene6`.`illustration`), '') /* Illustration of Impression Mnmt. */" => "illust_im",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problem */" => "mcs_problem",
		"IF(    CHAR_LENGTH(`bio_chr_scene7`.`id`) || CHAR_LENGTH(`bio_chr_scene7`.`illustration`), CONCAT_WS('',   `bio_chr_scene7`.`id`, ' - ', `bio_chr_scene7`.`illustration`), '') /* Illustration of MCS Problem */" => "illust_mcs_problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Solution */" => "mcs_solution",
		"IF(    CHAR_LENGTH(`bio_chr_scene8`.`id`) || CHAR_LENGTH(`bio_chr_scene8`.`illustration`), CONCAT_WS('',   `bio_chr_scene8`.`id`, ' - ', `bio_chr_scene8`.`illustration`), '') /* Illustration of MCS Solution */" => "illust_mcs_solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* Symptom */" => "mcs_symptom",
		"IF(    CHAR_LENGTH(`bio_chr_scene9`.`id`) || CHAR_LENGTH(`bio_chr_scene9`.`illustration`), CONCAT_WS('',   `bio_chr_scene9`.`id`, ' - ', `bio_chr_scene9`.`illustration`), '') /* Illustration of MCS Symptome */" => "illust_mcs_symptom",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Response */" => "mcs_response",
		"IF(    CHAR_LENGTH(`bio_chr_scene10`.`id`), CONCAT_WS('',   `bio_chr_scene10`.`id`, ' - '), '') /* Illustration of MCS Response */" => "illust_mcs_response",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`bio_drama_chr_dev`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => '`class_dramatica_storypoints11`.`term`',
		7 => '`class_dramatica_storypoints21`.`term`',
		8 => '`class_dramatica_storypoints31`.`term`',
		9 => '`class_dynamicstorypoints41`.`term`',
		10 => 10,
		11 => '`class_dramatica_storypoints32`.`term`',
		12 => '`class_dynamicstorypoints42`.`term`',
		13 => 13,
		14 => '`class_dramatica_storypoints33`.`term`',
		15 => '`class_dynamicstorypoints43`.`term`',
		16 => 16,
		17 => '`class_dramatica_storypoints34`.`term`',
		18 => '`class_dynamicstorypoints44`.`term`',
		19 => 19,
		20 => 20,
		21 => '`bio_drama_chr_dev`.`cw_gender`',
		22 => 22,
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
		34 => '`class_nt1`.`noetictension`',
		35 => 35,
		36 => '`class_im1`.`impression`',
		37 => 37,
		38 => 38,
		39 => 39,
		40 => 40,
		41 => 41,
		42 => 42,
		43 => 43,
		44 => 44,
		45 => 45,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`bio_drama_chr_dev`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* MemberID */" => "agent_id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Agent name */" => "agent_name",
		"IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, ' - ', `bio_story1`.`story_title`), '') /* Bio story */" => "bio_story",
		"IF(    CHAR_LENGTH(`bio_chr1`.`character_name`) || CHAR_LENGTH(`bio_chr1`.`agent_name`), CONCAT_WS('',   `bio_chr1`.`character_name`, ' - ', `bio_chr1`.`agent_name`), '') /* Cw name */" => "cw_name",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints11`.`term`), CONCAT_WS('',   `class_dramatica_storypoints11`.`term`), '') /* Dynamic point cat1 */" => "dp1_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints21`.`term`), CONCAT_WS('',   `class_dramatica_storypoints21`.`term`), '') /* Dynamic point cat2 */" => "dp2_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') /* Dynamic point cat3 */" => "dp3_resolve",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints41`.`term`), CONCAT_WS('',   `class_dynamicstorypoints41`.`term`), '') /* MC resolve */" => "mc_resolve",
		"IF(    CHAR_LENGTH(`bio_chr_scene1`.`id`) || CHAR_LENGTH(`bio_chr_scene1`.`illustration`), CONCAT_WS('',   `bio_chr_scene1`.`id`, ' - ', `bio_chr_scene1`.`illustration`), '') /* Illustration of MC Resolve */" => "illust_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints32`.`term`), CONCAT_WS('',   `class_dramatica_storypoints32`.`term`), '') /* Dynamic point cat3 */" => "dp3_growth",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints42`.`term`), CONCAT_WS('',   `class_dynamicstorypoints42`.`term`), '') /* Growth */" => "mc_growth",
		"IF(    CHAR_LENGTH(`bio_chr_scene2`.`id`) || CHAR_LENGTH(`bio_chr_scene2`.`illustration`), CONCAT_WS('',   `bio_chr_scene2`.`id`, ' - ', `bio_chr_scene2`.`illustration`), '') /* Illustration of MC Growth */" => "illust_growth",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints33`.`term`), CONCAT_WS('',   `class_dramatica_storypoints33`.`term`), '') /* Dynamic point cat3 */" => "dp3_approach",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints43`.`term`), CONCAT_WS('',   `class_dynamicstorypoints43`.`term`), '') /* Approach */" => "mc_approach",
		"IF(    CHAR_LENGTH(`bio_chr_scene3`.`id`) || CHAR_LENGTH(`bio_chr_scene3`.`illustration`), CONCAT_WS('',   `bio_chr_scene3`.`id`, ' - ', `bio_chr_scene3`.`illustration`), '') /* Illustration of MC Approach */" => "illust_approach",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints34`.`term`), CONCAT_WS('',   `class_dramatica_storypoints34`.`term`), '') /* Dynamic point cat3 */" => "dp3_psstyle",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints44`.`term`), CONCAT_WS('',   `class_dynamicstorypoints44`.`term`), '') /* Problem Solving Style */" => "mc_ps_style",
		"IF(    CHAR_LENGTH(`bio_chr_scene4`.`id`) || CHAR_LENGTH(`bio_chr_scene4`.`illustration`), CONCAT_WS('',   `bio_chr_scene4`.`id`, ' - ', `bio_chr_scene4`.`illustration`), '') /* Illustration of MC PS Style */" => "illust_ps_style",
		"`bio_drama_chr_dev`.`cw_age`" => "cw_age",
		"`bio_drama_chr_dev`.`cw_gender`" => "cw_gender",
		"`bio_drama_chr_dev`.`cw_communication_style`" => "cw_communication_style",
		"`bio_drama_chr_dev`.`cw_background`" => "cw_background",
		"`bio_drama_chr_dev`.`cw_appearance`" => "cw_appearance",
		"`bio_drama_chr_dev`.`cw_relationships`" => "cw_relationships",
		"`bio_drama_chr_dev`.`cw_ambition`" => "cw_ambition",
		"`bio_drama_chr_dev`.`cw_defects`" => "cw_defects",
		"`bio_drama_chr_dev`.`cw_thoughts`" => "cw_thoughts",
		"`bio_drama_chr_dev`.`cw_relatedness`" => "cw_relatedness",
		"`bio_drama_chr_dev`.`cw_restrictions`" => "cw_restrictions",
		"`bio_drama_chr_dev`.`locations`" => "locations",
		"`bio_drama_chr_dev`.`persons`" => "persons",
		"`bio_drama_chr_dev`.`events`" => "events",
		"IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') /* Noetic tension */" => "noetictension",
		"IF(    CHAR_LENGTH(`bio_chr_scene5`.`id`) || CHAR_LENGTH(`bio_chr_scene5`.`illustration`), CONCAT_WS('',   `bio_chr_scene5`.`id`, ' - ', `bio_chr_scene5`.`illustration`), '') /* Illustration of Noetic Tension */" => "illust_nt",
		"IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') /* Overall Impression Management */" => "impression",
		"IF(    CHAR_LENGTH(`bio_chr_scene6`.`id`) || CHAR_LENGTH(`bio_chr_scene6`.`illustration`), CONCAT_WS('',   `bio_chr_scene6`.`id`, ' - ', `bio_chr_scene6`.`illustration`), '') /* Illustration of Impression Mnmt. */" => "illust_im",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problem */" => "mcs_problem",
		"IF(    CHAR_LENGTH(`bio_chr_scene7`.`id`) || CHAR_LENGTH(`bio_chr_scene7`.`illustration`), CONCAT_WS('',   `bio_chr_scene7`.`id`, ' - ', `bio_chr_scene7`.`illustration`), '') /* Illustration of MCS Problem */" => "illust_mcs_problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Solution */" => "mcs_solution",
		"IF(    CHAR_LENGTH(`bio_chr_scene8`.`id`) || CHAR_LENGTH(`bio_chr_scene8`.`illustration`), CONCAT_WS('',   `bio_chr_scene8`.`id`, ' - ', `bio_chr_scene8`.`illustration`), '') /* Illustration of MCS Solution */" => "illust_mcs_solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* Symptom */" => "mcs_symptom",
		"IF(    CHAR_LENGTH(`bio_chr_scene9`.`id`) || CHAR_LENGTH(`bio_chr_scene9`.`illustration`), CONCAT_WS('',   `bio_chr_scene9`.`id`, ' - ', `bio_chr_scene9`.`illustration`), '') /* Illustration of MCS Symptome */" => "illust_mcs_symptom",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Response */" => "mcs_response",
		"IF(    CHAR_LENGTH(`bio_chr_scene10`.`id`), CONCAT_WS('',   `bio_chr_scene10`.`id`, ' - '), '') /* Illustration of MCS Response */" => "illust_mcs_response",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`bio_drama_chr_dev`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* MemberID */" => "MemberID",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Agent name */" => "Agent name",
		"IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, ' - ', `bio_story1`.`story_title`), '') /* Bio story */" => "Bio story",
		"IF(    CHAR_LENGTH(`bio_chr1`.`character_name`) || CHAR_LENGTH(`bio_chr1`.`agent_name`), CONCAT_WS('',   `bio_chr1`.`character_name`, ' - ', `bio_chr1`.`agent_name`), '') /* Cw name */" => "Cw name",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints11`.`term`), CONCAT_WS('',   `class_dramatica_storypoints11`.`term`), '') /* Dynamic point cat1 */" => "Dynamic point cat1",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints21`.`term`), CONCAT_WS('',   `class_dramatica_storypoints21`.`term`), '') /* Dynamic point cat2 */" => "Dynamic point cat2",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') /* Dynamic point cat3 */" => "Dynamic point cat3",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints41`.`term`), CONCAT_WS('',   `class_dynamicstorypoints41`.`term`), '') /* MC resolve */" => "MC resolve",
		"IF(    CHAR_LENGTH(`bio_chr_scene1`.`id`) || CHAR_LENGTH(`bio_chr_scene1`.`illustration`), CONCAT_WS('',   `bio_chr_scene1`.`id`, ' - ', `bio_chr_scene1`.`illustration`), '') /* Illustration of MC Resolve */" => "Illustration of MC Resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints32`.`term`), CONCAT_WS('',   `class_dramatica_storypoints32`.`term`), '') /* Dynamic point cat3 */" => "Dynamic point cat3",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints42`.`term`), CONCAT_WS('',   `class_dynamicstorypoints42`.`term`), '') /* Growth */" => "Growth",
		"IF(    CHAR_LENGTH(`bio_chr_scene2`.`id`) || CHAR_LENGTH(`bio_chr_scene2`.`illustration`), CONCAT_WS('',   `bio_chr_scene2`.`id`, ' - ', `bio_chr_scene2`.`illustration`), '') /* Illustration of MC Growth */" => "Illustration of MC Growth",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints33`.`term`), CONCAT_WS('',   `class_dramatica_storypoints33`.`term`), '') /* Dynamic point cat3 */" => "Dynamic point cat3",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints43`.`term`), CONCAT_WS('',   `class_dynamicstorypoints43`.`term`), '') /* Approach */" => "Approach",
		"IF(    CHAR_LENGTH(`bio_chr_scene3`.`id`) || CHAR_LENGTH(`bio_chr_scene3`.`illustration`), CONCAT_WS('',   `bio_chr_scene3`.`id`, ' - ', `bio_chr_scene3`.`illustration`), '') /* Illustration of MC Approach */" => "Illustration of MC Approach",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints34`.`term`), CONCAT_WS('',   `class_dramatica_storypoints34`.`term`), '') /* Dynamic point cat3 */" => "Dynamic point cat3",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints44`.`term`), CONCAT_WS('',   `class_dynamicstorypoints44`.`term`), '') /* Problem Solving Style */" => "Problem Solving Style",
		"IF(    CHAR_LENGTH(`bio_chr_scene4`.`id`) || CHAR_LENGTH(`bio_chr_scene4`.`illustration`), CONCAT_WS('',   `bio_chr_scene4`.`id`, ' - ', `bio_chr_scene4`.`illustration`), '') /* Illustration of MC PS Style */" => "Illustration of MC PS Style",
		"`bio_drama_chr_dev`.`cw_age`" => "Age",
		"`bio_drama_chr_dev`.`cw_gender`" => "Gender",
		"`bio_drama_chr_dev`.`cw_communication_style`" => "Communication style",
		"`bio_drama_chr_dev`.`cw_background`" => "Background",
		"`bio_drama_chr_dev`.`cw_appearance`" => "Appearance",
		"`bio_drama_chr_dev`.`cw_relationships`" => "Relationships",
		"`bio_drama_chr_dev`.`cw_ambition`" => "Ambition",
		"`bio_drama_chr_dev`.`cw_defects`" => "Defects",
		"`bio_drama_chr_dev`.`cw_thoughts`" => "Thoughts",
		"`bio_drama_chr_dev`.`cw_relatedness`" => "Relatedness",
		"`bio_drama_chr_dev`.`cw_restrictions`" => "Restrictions",
		"`bio_drama_chr_dev`.`locations`" => "Locations",
		"`bio_drama_chr_dev`.`persons`" => "Persons",
		"`bio_drama_chr_dev`.`events`" => "Events",
		"IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') /* Noetic tension */" => "Noetic tension",
		"IF(    CHAR_LENGTH(`bio_chr_scene5`.`id`) || CHAR_LENGTH(`bio_chr_scene5`.`illustration`), CONCAT_WS('',   `bio_chr_scene5`.`id`, ' - ', `bio_chr_scene5`.`illustration`), '') /* Illustration of Noetic Tension */" => "Illustration of Noetic Tension",
		"IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') /* Overall Impression Management */" => "Overall Impression Management",
		"IF(    CHAR_LENGTH(`bio_chr_scene6`.`id`) || CHAR_LENGTH(`bio_chr_scene6`.`illustration`), CONCAT_WS('',   `bio_chr_scene6`.`id`, ' - ', `bio_chr_scene6`.`illustration`), '') /* Illustration of Impression Mnmt. */" => "Illustration of Impression Mnmt.",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problem */" => "Problem",
		"IF(    CHAR_LENGTH(`bio_chr_scene7`.`id`) || CHAR_LENGTH(`bio_chr_scene7`.`illustration`), CONCAT_WS('',   `bio_chr_scene7`.`id`, ' - ', `bio_chr_scene7`.`illustration`), '') /* Illustration of MCS Problem */" => "Illustration of MCS Problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Solution */" => "Solution",
		"IF(    CHAR_LENGTH(`bio_chr_scene8`.`id`) || CHAR_LENGTH(`bio_chr_scene8`.`illustration`), CONCAT_WS('',   `bio_chr_scene8`.`id`, ' - ', `bio_chr_scene8`.`illustration`), '') /* Illustration of MCS Solution */" => "Illustration of MCS Solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* Symptom */" => "Symptom",
		"IF(    CHAR_LENGTH(`bio_chr_scene9`.`id`) || CHAR_LENGTH(`bio_chr_scene9`.`illustration`), CONCAT_WS('',   `bio_chr_scene9`.`id`, ' - ', `bio_chr_scene9`.`illustration`), '') /* Illustration of MCS Symptome */" => "Illustration of MCS Symptome",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Response */" => "Response",
		"IF(    CHAR_LENGTH(`bio_chr_scene10`.`id`), CONCAT_WS('',   `bio_chr_scene10`.`id`, ' - '), '') /* Illustration of MCS Response */" => "Illustration of MCS Response",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`bio_drama_chr_dev`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* MemberID */" => "agent_id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') /* Agent name */" => "agent_name",
		"IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, ' - ', `bio_story1`.`story_title`), '') /* Bio story */" => "bio_story",
		"IF(    CHAR_LENGTH(`bio_chr1`.`character_name`) || CHAR_LENGTH(`bio_chr1`.`agent_name`), CONCAT_WS('',   `bio_chr1`.`character_name`, ' - ', `bio_chr1`.`agent_name`), '') /* Cw name */" => "cw_name",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints11`.`term`), CONCAT_WS('',   `class_dramatica_storypoints11`.`term`), '') /* Dynamic point cat1 */" => "dp1_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints21`.`term`), CONCAT_WS('',   `class_dramatica_storypoints21`.`term`), '') /* Dynamic point cat2 */" => "dp2_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') /* Dynamic point cat3 */" => "dp3_resolve",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints41`.`term`), CONCAT_WS('',   `class_dynamicstorypoints41`.`term`), '') /* MC resolve */" => "mc_resolve",
		"IF(    CHAR_LENGTH(`bio_chr_scene1`.`id`) || CHAR_LENGTH(`bio_chr_scene1`.`illustration`), CONCAT_WS('',   `bio_chr_scene1`.`id`, ' - ', `bio_chr_scene1`.`illustration`), '') /* Illustration of MC Resolve */" => "illust_resolve",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints32`.`term`), CONCAT_WS('',   `class_dramatica_storypoints32`.`term`), '') /* Dynamic point cat3 */" => "dp3_growth",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints42`.`term`), CONCAT_WS('',   `class_dynamicstorypoints42`.`term`), '') /* Growth */" => "mc_growth",
		"IF(    CHAR_LENGTH(`bio_chr_scene2`.`id`) || CHAR_LENGTH(`bio_chr_scene2`.`illustration`), CONCAT_WS('',   `bio_chr_scene2`.`id`, ' - ', `bio_chr_scene2`.`illustration`), '') /* Illustration of MC Growth */" => "illust_growth",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints33`.`term`), CONCAT_WS('',   `class_dramatica_storypoints33`.`term`), '') /* Dynamic point cat3 */" => "dp3_approach",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints43`.`term`), CONCAT_WS('',   `class_dynamicstorypoints43`.`term`), '') /* Approach */" => "mc_approach",
		"IF(    CHAR_LENGTH(`bio_chr_scene3`.`id`) || CHAR_LENGTH(`bio_chr_scene3`.`illustration`), CONCAT_WS('',   `bio_chr_scene3`.`id`, ' - ', `bio_chr_scene3`.`illustration`), '') /* Illustration of MC Approach */" => "illust_approach",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints34`.`term`), CONCAT_WS('',   `class_dramatica_storypoints34`.`term`), '') /* Dynamic point cat3 */" => "dp3_psstyle",
		"IF(    CHAR_LENGTH(`class_dynamicstorypoints44`.`term`), CONCAT_WS('',   `class_dynamicstorypoints44`.`term`), '') /* Problem Solving Style */" => "mc_ps_style",
		"IF(    CHAR_LENGTH(`bio_chr_scene4`.`id`) || CHAR_LENGTH(`bio_chr_scene4`.`illustration`), CONCAT_WS('',   `bio_chr_scene4`.`id`, ' - ', `bio_chr_scene4`.`illustration`), '') /* Illustration of MC PS Style */" => "illust_ps_style",
		"`bio_drama_chr_dev`.`cw_age`" => "cw_age",
		"`bio_drama_chr_dev`.`cw_gender`" => "cw_gender",
		"`bio_drama_chr_dev`.`cw_communication_style`" => "cw_communication_style",
		"`bio_drama_chr_dev`.`cw_background`" => "cw_background",
		"`bio_drama_chr_dev`.`cw_appearance`" => "cw_appearance",
		"`bio_drama_chr_dev`.`cw_relationships`" => "cw_relationships",
		"`bio_drama_chr_dev`.`cw_ambition`" => "cw_ambition",
		"`bio_drama_chr_dev`.`cw_defects`" => "cw_defects",
		"`bio_drama_chr_dev`.`cw_thoughts`" => "cw_thoughts",
		"`bio_drama_chr_dev`.`cw_relatedness`" => "cw_relatedness",
		"`bio_drama_chr_dev`.`cw_restrictions`" => "cw_restrictions",
		"`bio_drama_chr_dev`.`locations`" => "locations",
		"`bio_drama_chr_dev`.`persons`" => "persons",
		"`bio_drama_chr_dev`.`events`" => "events",
		"IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') /* Noetic tension */" => "noetictension",
		"IF(    CHAR_LENGTH(`bio_chr_scene5`.`id`) || CHAR_LENGTH(`bio_chr_scene5`.`illustration`), CONCAT_WS('',   `bio_chr_scene5`.`id`, ' - ', `bio_chr_scene5`.`illustration`), '') /* Illustration of Noetic Tension */" => "illust_nt",
		"IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') /* Overall Impression Management */" => "impression",
		"IF(    CHAR_LENGTH(`bio_chr_scene6`.`id`) || CHAR_LENGTH(`bio_chr_scene6`.`illustration`), CONCAT_WS('',   `bio_chr_scene6`.`id`, ' - ', `bio_chr_scene6`.`illustration`), '') /* Illustration of Impression Mnmt. */" => "illust_im",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Problem */" => "mcs_problem",
		"IF(    CHAR_LENGTH(`bio_chr_scene7`.`id`) || CHAR_LENGTH(`bio_chr_scene7`.`illustration`), CONCAT_WS('',   `bio_chr_scene7`.`id`, ' - ', `bio_chr_scene7`.`illustration`), '') /* Illustration of MCS Problem */" => "illust_mcs_problem",
		"IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') /* Solution */" => "mcs_solution",
		"IF(    CHAR_LENGTH(`bio_chr_scene8`.`id`) || CHAR_LENGTH(`bio_chr_scene8`.`illustration`), CONCAT_WS('',   `bio_chr_scene8`.`id`, ' - ', `bio_chr_scene8`.`illustration`), '') /* Illustration of MCS Solution */" => "illust_mcs_solution",
		"IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') /* Symptom */" => "mcs_symptom",
		"IF(    CHAR_LENGTH(`bio_chr_scene9`.`id`) || CHAR_LENGTH(`bio_chr_scene9`.`illustration`), CONCAT_WS('',   `bio_chr_scene9`.`id`, ' - ', `bio_chr_scene9`.`illustration`), '') /* Illustration of MCS Symptome */" => "illust_mcs_symptom",
		"IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') /* Response */" => "mcs_response",
		"IF(    CHAR_LENGTH(`bio_chr_scene10`.`id`), CONCAT_WS('',   `bio_chr_scene10`.`id`, ' - '), '') /* Illustration of MCS Response */" => "illust_mcs_response",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['agent_id' => 'MemberID', 'bio_story' => 'Bio story', 'cw_name' => 'Cw name', 'dp1_resolve' => 'Dynamic point cat1', 'dp2_resolve' => 'Dynamic point cat2', 'dp3_resolve' => 'Dynamic point cat3', 'mc_resolve' => 'MC resolve', 'illust_resolve' => 'Illustration of MC Resolve', 'dp3_growth' => 'Dynamic point cat3', 'mc_growth' => 'Growth', 'illust_growth' => 'Illustration of MC Growth', 'dp3_approach' => 'Dynamic point cat3', 'mc_approach' => 'Approach', 'illust_approach' => 'Illustration of MC Approach', 'dp3_psstyle' => 'Dynamic point cat3', 'mc_ps_style' => 'Problem Solving Style', 'illust_ps_style' => 'Illustration of MC PS Style', 'noetictension' => 'Noetic tension', 'illust_nt' => 'Illustration of Noetic Tension', 'impression' => 'Overall Impression Management', 'illust_im' => 'Illustration of Impression Mnmt.', 'mcs_problem' => 'Problem', 'illust_mcs_problem' => 'Illustration of MCS Problem', 'illust_mcs_solution' => 'Illustration of MCS Solution', 'illust_mcs_symptom' => 'Illustration of MCS Symptome', 'illust_mcs_response' => 'Illustration of MCS Response', ];

	$x->QueryFrom = "`bio_drama_chr_dev` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_drama_chr_dev`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_drama_chr_dev`.`bio_story` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_drama_chr_dev`.`cw_name` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`bio_drama_chr_dev`.`dp1_resolve` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`bio_drama_chr_dev`.`dp2_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`bio_drama_chr_dev`.`dp3_resolve` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints41 ON `class_dynamicstorypoints41`.`id`=`bio_drama_chr_dev`.`mc_resolve` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_drama_chr_dev`.`illust_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints32 ON `class_dramatica_storypoints32`.`id`=`bio_drama_chr_dev`.`dp3_growth` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints42 ON `class_dynamicstorypoints42`.`id`=`bio_drama_chr_dev`.`mc_growth` LEFT JOIN `bio_chr_scene` as bio_chr_scene2 ON `bio_chr_scene2`.`id`=`bio_drama_chr_dev`.`illust_growth` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints33 ON `class_dramatica_storypoints33`.`id`=`bio_drama_chr_dev`.`dp3_approach` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints43 ON `class_dynamicstorypoints43`.`id`=`bio_drama_chr_dev`.`mc_approach` LEFT JOIN `bio_chr_scene` as bio_chr_scene3 ON `bio_chr_scene3`.`id`=`bio_drama_chr_dev`.`illust_approach` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints34 ON `class_dramatica_storypoints34`.`id`=`bio_drama_chr_dev`.`dp3_psstyle` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints44 ON `class_dynamicstorypoints44`.`id`=`bio_drama_chr_dev`.`mc_ps_style` LEFT JOIN `bio_chr_scene` as bio_chr_scene4 ON `bio_chr_scene4`.`id`=`bio_drama_chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_drama_chr_dev`.`noetictension` LEFT JOIN `bio_chr_scene` as bio_chr_scene5 ON `bio_chr_scene5`.`id`=`bio_drama_chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_drama_chr_dev`.`impression` LEFT JOIN `bio_chr_scene` as bio_chr_scene6 ON `bio_chr_scene6`.`id`=`bio_drama_chr_dev`.`illust_im` LEFT JOIN `bio_storystatic` as bio_storystatic1 ON `bio_storystatic1`.`id`=`bio_drama_chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic1`.`problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene7 ON `bio_chr_scene7`.`id`=`bio_drama_chr_dev`.`illust_mcs_problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene8 ON `bio_chr_scene8`.`id`=`bio_drama_chr_dev`.`illust_mcs_solution` LEFT JOIN `bio_chr_scene` as bio_chr_scene9 ON `bio_chr_scene9`.`id`=`bio_drama_chr_dev`.`illust_mcs_symptom` LEFT JOIN `bio_chr_scene` as bio_chr_scene10 ON `bio_chr_scene10`.`id`=`bio_drama_chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic1`.`response` ";
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
	$x->ScriptFileName = 'bio_drama_chr_dev_view.php';
	$x->RedirectAfterInsert = 'bio_drama_chr_dev_view.php';
	$x->TableTitle = 'Bio character dev.';
	$x->TableIcon = 'resources/table_icons/private.png';
	$x->PrimaryKey = '`bio_drama_chr_dev`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['ID', 'MemberID', 'Agent name', 'Bio story', 'Cw name', 'Dynamic point cat1', 'Dynamic point cat2', 'Dynamic point cat3', 'MC resolve', 'Illustration of MC Resolve', 'Dynamic point cat3', 'Growth', 'Illustration of MC Growth', 'Dynamic point cat3', 'Approach', 'Illustration of MC Approach', 'Dynamic point cat3', 'Problem Solving Style', 'Illustration of MC PS Style', 'Age', 'Gender', 'Communication style', 'Background', 'Appearance', 'Relationships', 'Ambition', 'Defects', 'Thoughts', 'Relatedness', 'Restrictions', 'Locations', 'Persons', 'Events', 'Noetic tension', 'Illustration of Noetic Tension', 'Overall Impression Management', 'Illustration of Impression Mnmt.', 'Problem', 'Illustration of MCS Problem', 'Solution', 'Illustration of MCS Solution', 'Symptom', 'Illustration of MCS Symptome', 'Response', 'Illustration of MCS Response', ];
	$x->ColFieldName = ['id', 'agent_id', 'agent_name', 'bio_story', 'cw_name', 'dp1_resolve', 'dp2_resolve', 'dp3_resolve', 'mc_resolve', 'illust_resolve', 'dp3_growth', 'mc_growth', 'illust_growth', 'dp3_approach', 'mc_approach', 'illust_approach', 'dp3_psstyle', 'mc_ps_style', 'illust_ps_style', 'cw_age', 'cw_gender', 'cw_communication_style', 'cw_background', 'cw_appearance', 'cw_relationships', 'cw_ambition', 'cw_defects', 'cw_thoughts', 'cw_relatedness', 'cw_restrictions', 'locations', 'persons', 'events', 'noetictension', 'illust_nt', 'impression', 'illust_im', 'mcs_problem', 'illust_mcs_problem', 'mcs_solution', 'illust_mcs_solution', 'mcs_symptom', 'illust_mcs_symptom', 'mcs_response', 'illust_mcs_response', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/bio_drama_chr_dev_templateTV.html';
	$x->SelectedTemplate = 'templates/bio_drama_chr_dev_templateTVS.html';
	$x->TemplateDV = 'templates/bio_drama_chr_dev_templateDV.html';
	$x->TemplateDVP = 'templates/bio_drama_chr_dev_templateDVP.html';

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
		$x->QueryWhere = "WHERE `bio_drama_chr_dev`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='bio_drama_chr_dev' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
	} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $DisplayRecords == 'group' && !$_REQUEST['NoFilter_x'])) { // view group only
		$x->QueryFrom .= ', `membership_userrecords`';
		$x->QueryWhere = "WHERE `bio_drama_chr_dev`.`id`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='bio_drama_chr_dev' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
	} elseif($perm['view'] == 3) { // view all
		// no further action
	} elseif($perm['view'] == 0) { // view none
		$x->QueryFields = ['Not enough permissions' => 'NEP'];
		$x->QueryFrom = '`bio_drama_chr_dev`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: bio_drama_chr_dev_init
	$render = true;
	if(function_exists('bio_drama_chr_dev_init')) {
		$args = [];
		$render = bio_drama_chr_dev_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: bio_drama_chr_dev_header
	$headerCode = '';
	if(function_exists('bio_drama_chr_dev_header')) {
		$args = [];
		$headerCode = bio_drama_chr_dev_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: bio_drama_chr_dev_footer
	$footerCode = '';
	if(function_exists('bio_drama_chr_dev_footer')) {
		$args = [];
		$footerCode = bio_drama_chr_dev_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
