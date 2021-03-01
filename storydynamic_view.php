<?php
// This script and data application were generated by AppGini 5.76
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/storydynamic.php");
	include("$currDir/storydynamic_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('storydynamic');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "storydynamic";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`storydynamic`.`id`" => "id",
		"IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, `story1`.`story`), '') /* Story */" => "story",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* Agent */" => "agent",
		"IF(    CHAR_LENGTH(`chr_dev1`.`cw_name`), CONCAT_WS('',   `chr_dev1`.`cw_name`), '') /* Story dev chr */" => "story_dev_chr",
		"IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') /* Story static ost */" => "storystatic_ost",
		"IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`) || CHAR_LENGTH(`story_chrs2`.`agent_name`), CONCAT_WS('',   `class_dramatica_character1`.`character`, '- ', ' - ', `story_chrs2`.`agent_name`), '') /* Mc character */" => "storystatic_chr_mc",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Mc goal */" => "mc_problem",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`id`), CONCAT_WS('',   `class_dramatica_storypoints31`.`id`), '') /* MC resolve */" => "mc_resolve",
		"IF(    CHAR_LENGTH(`chr_dev3`.`mc_growth`), CONCAT_WS('',   `chr_dev3`.`mc_growth`), '') /* MC growth */" => "mc_growth",
		"IF(    CHAR_LENGTH(`chr_dev4`.`mc_approach`), CONCAT_WS('',   `chr_dev4`.`mc_approach`), '') /* MC approach */" => "mc_approach",
		"IF(    CHAR_LENGTH(`chr_dev5`.`mc_ps_style`), CONCAT_WS('',   `chr_dev5`.`mc_ps_style`), '') /* MC PS style */" => "mc_ps_style",
		"`storydynamic`.`ic_resolve`" => "ic_resolve",
		"`storydynamic`.`os_driver`" => "os_driver",
		"`storydynamic`.`os_limit`" => "os_limit",
		"`storydynamic`.`os_outcome`" => "os_outcome",
		"`storydynamic`.`os_judgement`" => "os_judgement",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* OS goal domain */" => "os_goal_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern8`.`concern`), CONCAT_WS('',   `class_dramatica_concern8`.`concern`), '') /* OS goal concern */" => "os_goal_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_domain2`.`domain`), '') /* OS consquence domain */" => "os_consequence_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* OS consequence concern */" => "os_consequence_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain3`.`domain`), CONCAT_WS('',   `class_dramatica_domain3`.`domain`), '') /* OS cost domain */" => "os_cost_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern2`.`concern`), CONCAT_WS('',   `class_dramatica_concern2`.`concern`), '') /* OS cost concern */" => "os_cost_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain4`.`domain`), CONCAT_WS('',   `class_dramatica_domain4`.`domain`), '') /* OS dividend domain */" => "os_dividend_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_concern3`.`concern`), '') /* OS dividend concern */" => "os_dividend_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain5`.`domain`), CONCAT_WS('',   `class_dramatica_domain5`.`domain`), '') /* OS requirements domain */" => "os_requirements_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`), '') /* OS requirements concern */" => "os_requirements_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain6`.`domain`), CONCAT_WS('',   `class_dramatica_domain6`.`domain`), '') /* OS prerequisites domain */" => "os_prerequesites_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') /* OS prerequisites concern */" => "os_prerequesites_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain7`.`domain`), CONCAT_WS('',   `class_dramatica_domain7`.`domain`), '') /* OS preconditions domain */" => "os_preconditions_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') /* OS preconditions concern */" => "os_preconditions_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain8`.`domain`), CONCAT_WS('',   `class_dramatica_domain8`.`domain`), '') /* OS forewarnings domain */" => "os_forewarnings_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern7`.`concern`), CONCAT_WS('',   `class_dramatica_concern7`.`concern`), '') /* OS forewarnings concern */" => "os_forewarnings_concern"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`storydynamic`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6,
		7 => 7,
		8 => '`class_dramatica_storypoints31`.`id`',
		9 => '`chr_dev3`.`mc_growth`',
		10 => '`chr_dev4`.`mc_approach`',
		11 => '`chr_dev5`.`mc_ps_style`',
		12 => 12,
		13 => 13,
		14 => 14,
		15 => 15,
		16 => 16,
		17 => 17,
		18 => 18,
		19 => '`class_dramatica_domain2`.`domain`',
		20 => '`class_dramatica_concern1`.`concern`',
		21 => '`class_dramatica_domain3`.`domain`',
		22 => '`class_dramatica_concern2`.`concern`',
		23 => '`class_dramatica_domain4`.`domain`',
		24 => '`class_dramatica_concern3`.`concern`',
		25 => '`class_dramatica_domain5`.`domain`',
		26 => '`class_dramatica_concern4`.`concern`',
		27 => '`class_dramatica_domain6`.`domain`',
		28 => '`class_dramatica_concern5`.`concern`',
		29 => '`class_dramatica_domain7`.`domain`',
		30 => '`class_dramatica_concern6`.`concern`',
		31 => '`class_dramatica_domain8`.`domain`',
		32 => '`class_dramatica_concern7`.`concern`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`storydynamic`.`id`" => "id",
		"IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, `story1`.`story`), '') /* Story */" => "story",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* Agent */" => "agent",
		"IF(    CHAR_LENGTH(`chr_dev1`.`cw_name`), CONCAT_WS('',   `chr_dev1`.`cw_name`), '') /* Story dev chr */" => "story_dev_chr",
		"IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') /* Story static ost */" => "storystatic_ost",
		"IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`) || CHAR_LENGTH(`story_chrs2`.`agent_name`), CONCAT_WS('',   `class_dramatica_character1`.`character`, '- ', ' - ', `story_chrs2`.`agent_name`), '') /* Mc character */" => "storystatic_chr_mc",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Mc goal */" => "mc_problem",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`id`), CONCAT_WS('',   `class_dramatica_storypoints31`.`id`), '') /* MC resolve */" => "mc_resolve",
		"IF(    CHAR_LENGTH(`chr_dev3`.`mc_growth`), CONCAT_WS('',   `chr_dev3`.`mc_growth`), '') /* MC growth */" => "mc_growth",
		"IF(    CHAR_LENGTH(`chr_dev4`.`mc_approach`), CONCAT_WS('',   `chr_dev4`.`mc_approach`), '') /* MC approach */" => "mc_approach",
		"IF(    CHAR_LENGTH(`chr_dev5`.`mc_ps_style`), CONCAT_WS('',   `chr_dev5`.`mc_ps_style`), '') /* MC PS style */" => "mc_ps_style",
		"`storydynamic`.`ic_resolve`" => "ic_resolve",
		"`storydynamic`.`os_driver`" => "os_driver",
		"`storydynamic`.`os_limit`" => "os_limit",
		"`storydynamic`.`os_outcome`" => "os_outcome",
		"`storydynamic`.`os_judgement`" => "os_judgement",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* OS goal domain */" => "os_goal_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern8`.`concern`), CONCAT_WS('',   `class_dramatica_concern8`.`concern`), '') /* OS goal concern */" => "os_goal_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_domain2`.`domain`), '') /* OS consquence domain */" => "os_consequence_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* OS consequence concern */" => "os_consequence_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain3`.`domain`), CONCAT_WS('',   `class_dramatica_domain3`.`domain`), '') /* OS cost domain */" => "os_cost_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern2`.`concern`), CONCAT_WS('',   `class_dramatica_concern2`.`concern`), '') /* OS cost concern */" => "os_cost_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain4`.`domain`), CONCAT_WS('',   `class_dramatica_domain4`.`domain`), '') /* OS dividend domain */" => "os_dividend_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_concern3`.`concern`), '') /* OS dividend concern */" => "os_dividend_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain5`.`domain`), CONCAT_WS('',   `class_dramatica_domain5`.`domain`), '') /* OS requirements domain */" => "os_requirements_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`), '') /* OS requirements concern */" => "os_requirements_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain6`.`domain`), CONCAT_WS('',   `class_dramatica_domain6`.`domain`), '') /* OS prerequisites domain */" => "os_prerequesites_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') /* OS prerequisites concern */" => "os_prerequesites_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain7`.`domain`), CONCAT_WS('',   `class_dramatica_domain7`.`domain`), '') /* OS preconditions domain */" => "os_preconditions_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') /* OS preconditions concern */" => "os_preconditions_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain8`.`domain`), CONCAT_WS('',   `class_dramatica_domain8`.`domain`), '') /* OS forewarnings domain */" => "os_forewarnings_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern7`.`concern`), CONCAT_WS('',   `class_dramatica_concern7`.`concern`), '') /* OS forewarnings concern */" => "os_forewarnings_concern"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`storydynamic`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, `story1`.`story`), '') /* Story */" => "Story",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* Agent */" => "Agent",
		"IF(    CHAR_LENGTH(`chr_dev1`.`cw_name`), CONCAT_WS('',   `chr_dev1`.`cw_name`), '') /* Story dev chr */" => "Story dev chr",
		"IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') /* Story static ost */" => "Story static ost",
		"IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`) || CHAR_LENGTH(`story_chrs2`.`agent_name`), CONCAT_WS('',   `class_dramatica_character1`.`character`, '- ', ' - ', `story_chrs2`.`agent_name`), '') /* Mc character */" => "Mc character",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Mc goal */" => "Mc goal",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`id`), CONCAT_WS('',   `class_dramatica_storypoints31`.`id`), '') /* MC resolve */" => "MC resolve",
		"IF(    CHAR_LENGTH(`chr_dev3`.`mc_growth`), CONCAT_WS('',   `chr_dev3`.`mc_growth`), '') /* MC growth */" => "MC growth",
		"IF(    CHAR_LENGTH(`chr_dev4`.`mc_approach`), CONCAT_WS('',   `chr_dev4`.`mc_approach`), '') /* MC approach */" => "MC approach",
		"IF(    CHAR_LENGTH(`chr_dev5`.`mc_ps_style`), CONCAT_WS('',   `chr_dev5`.`mc_ps_style`), '') /* MC PS style */" => "MC PS style",
		"`storydynamic`.`ic_resolve`" => "IC resolve",
		"`storydynamic`.`os_driver`" => "OS driver",
		"`storydynamic`.`os_limit`" => "OS limit",
		"`storydynamic`.`os_outcome`" => "OS outcome",
		"`storydynamic`.`os_judgement`" => "OS judgement",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* OS goal domain */" => "OS goal domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern8`.`concern`), CONCAT_WS('',   `class_dramatica_concern8`.`concern`), '') /* OS goal concern */" => "OS goal concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_domain2`.`domain`), '') /* OS consquence domain */" => "OS consquence domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* OS consequence concern */" => "OS consequence concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain3`.`domain`), CONCAT_WS('',   `class_dramatica_domain3`.`domain`), '') /* OS cost domain */" => "OS cost domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern2`.`concern`), CONCAT_WS('',   `class_dramatica_concern2`.`concern`), '') /* OS cost concern */" => "OS cost concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain4`.`domain`), CONCAT_WS('',   `class_dramatica_domain4`.`domain`), '') /* OS dividend domain */" => "OS dividend domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_concern3`.`concern`), '') /* OS dividend concern */" => "OS dividend concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain5`.`domain`), CONCAT_WS('',   `class_dramatica_domain5`.`domain`), '') /* OS requirements domain */" => "OS requirements domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`), '') /* OS requirements concern */" => "OS requirements concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain6`.`domain`), CONCAT_WS('',   `class_dramatica_domain6`.`domain`), '') /* OS prerequisites domain */" => "OS prerequisites domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') /* OS prerequisites concern */" => "OS prerequisites concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain7`.`domain`), CONCAT_WS('',   `class_dramatica_domain7`.`domain`), '') /* OS preconditions domain */" => "OS preconditions domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') /* OS preconditions concern */" => "OS preconditions concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain8`.`domain`), CONCAT_WS('',   `class_dramatica_domain8`.`domain`), '') /* OS forewarnings domain */" => "OS forewarnings domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern7`.`concern`), CONCAT_WS('',   `class_dramatica_concern7`.`concern`), '') /* OS forewarnings concern */" => "OS forewarnings concern"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`storydynamic`.`id`" => "id",
		"IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, `story1`.`story`), '') /* Story */" => "story",
		"IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') /* Agent */" => "agent",
		"IF(    CHAR_LENGTH(`chr_dev1`.`cw_name`), CONCAT_WS('',   `chr_dev1`.`cw_name`), '') /* Story dev chr */" => "story_dev_chr",
		"IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') /* Story static ost */" => "storystatic_ost",
		"IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`) || CHAR_LENGTH(`story_chrs2`.`agent_name`), CONCAT_WS('',   `class_dramatica_character1`.`character`, '- ', ' - ', `story_chrs2`.`agent_name`), '') /* Mc character */" => "storystatic_chr_mc",
		"IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') /* Mc goal */" => "mc_problem",
		"IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`id`), CONCAT_WS('',   `class_dramatica_storypoints31`.`id`), '') /* MC resolve */" => "mc_resolve",
		"IF(    CHAR_LENGTH(`chr_dev3`.`mc_growth`), CONCAT_WS('',   `chr_dev3`.`mc_growth`), '') /* MC growth */" => "mc_growth",
		"IF(    CHAR_LENGTH(`chr_dev4`.`mc_approach`), CONCAT_WS('',   `chr_dev4`.`mc_approach`), '') /* MC approach */" => "mc_approach",
		"IF(    CHAR_LENGTH(`chr_dev5`.`mc_ps_style`), CONCAT_WS('',   `chr_dev5`.`mc_ps_style`), '') /* MC PS style */" => "mc_ps_style",
		"`storydynamic`.`ic_resolve`" => "ic_resolve",
		"`storydynamic`.`os_driver`" => "os_driver",
		"`storydynamic`.`os_limit`" => "os_limit",
		"`storydynamic`.`os_outcome`" => "os_outcome",
		"`storydynamic`.`os_judgement`" => "os_judgement",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* OS goal domain */" => "os_goal_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern8`.`concern`), CONCAT_WS('',   `class_dramatica_concern8`.`concern`), '') /* OS goal concern */" => "os_goal_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_domain2`.`domain`), '') /* OS consquence domain */" => "os_consequence_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* OS consequence concern */" => "os_consequence_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain3`.`domain`), CONCAT_WS('',   `class_dramatica_domain3`.`domain`), '') /* OS cost domain */" => "os_cost_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern2`.`concern`), CONCAT_WS('',   `class_dramatica_concern2`.`concern`), '') /* OS cost concern */" => "os_cost_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain4`.`domain`), CONCAT_WS('',   `class_dramatica_domain4`.`domain`), '') /* OS dividend domain */" => "os_dividend_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_concern3`.`concern`), '') /* OS dividend concern */" => "os_dividend_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain5`.`domain`), CONCAT_WS('',   `class_dramatica_domain5`.`domain`), '') /* OS requirements domain */" => "os_requirements_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`), '') /* OS requirements concern */" => "os_requirements_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain6`.`domain`), CONCAT_WS('',   `class_dramatica_domain6`.`domain`), '') /* OS prerequisites domain */" => "os_prerequesites_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') /* OS prerequisites concern */" => "os_prerequesites_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain7`.`domain`), CONCAT_WS('',   `class_dramatica_domain7`.`domain`), '') /* OS preconditions domain */" => "os_preconditions_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') /* OS preconditions concern */" => "os_preconditions_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain8`.`domain`), CONCAT_WS('',   `class_dramatica_domain8`.`domain`), '') /* OS forewarnings domain */" => "os_forewarnings_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern7`.`concern`), CONCAT_WS('',   `class_dramatica_concern7`.`concern`), '') /* OS forewarnings concern */" => "os_forewarnings_concern"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'story' => 'Story', 'agent' => 'Agent', 'story_dev_chr' => 'Story dev chr', 'storystatic_ost' => 'Story static ost', 'mc_problem' => 'Mc goal', 'mc_resolve' => 'MC resolve', 'mc_growth' => 'MC growth', 'mc_approach' => 'MC approach', 'mc_ps_style' => 'MC PS style', 'os_goal_domain' => 'OS goal domain', 'os_consequence_domain' => 'OS consquence domain', 'os_consequence_concern' => 'OS consequence concern', 'os_cost_domain' => 'OS cost domain', 'os_cost_concern' => 'OS cost concern', 'os_dividend_domain' => 'OS dividend domain', 'os_dividend_concern' => 'OS dividend concern', 'os_requirements_domain' => 'OS requirements domain', 'os_requirements_concern' => 'OS requirements concern', 'os_prerequesites_domain' => 'OS prerequisites domain', 'os_prerequesites_concern' => 'OS prerequisites concern', 'os_preconditions_domain' => 'OS preconditions domain', 'os_preconditions_concern' => 'OS preconditions concern', 'os_forewarnings_domain' => 'OS forewarnings domain', 'os_forewarnings_concern' => 'OS forewarnings concern');

	$x->QueryFrom = "`storydynamic` LEFT JOIN `story` as story1 ON `story1`.`id`=`storydynamic`.`story` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`storydynamic`.`agent` LEFT JOIN `story_chrs` as story_chrs1 ON `story_chrs1`.`id`=`storydynamic`.`story_dev_chr` LEFT JOIN `chr_dev` as chr_dev1 ON `chr_dev1`.`id`=`story_chrs1`.`character` LEFT JOIN `storystatic` as storystatic1 ON `storystatic1`.`id`=`storydynamic`.`storystatic_ost` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`storystatic1`.`throughline` LEFT JOIN `chr_dev` as chr_dev2 ON `chr_dev2`.`id`=`storydynamic`.`mc_problem` LEFT JOIN `storystatic` as storystatic2 ON `storystatic2`.`id`=`chr_dev2`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`storystatic2`.`problem` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`storydynamic`.`mc_resolve` LEFT JOIN `chr_dev` as chr_dev3 ON `chr_dev3`.`id`=`storydynamic`.`mc_growth` LEFT JOIN `chr_dev` as chr_dev4 ON `chr_dev4`.`id`=`storydynamic`.`mc_approach` LEFT JOIN `chr_dev` as chr_dev5 ON `chr_dev5`.`id`=`storydynamic`.`mc_ps_style` LEFT JOIN `storystatic` as storystatic3 ON `storystatic3`.`id`=`storydynamic`.`os_goal_domain` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`storystatic3`.`throughline_domain` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`storydynamic`.`os_consequence_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`storydynamic`.`os_consequence_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain3 ON `class_dramatica_domain3`.`id`=`storydynamic`.`os_cost_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`storydynamic`.`os_cost_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain4 ON `class_dramatica_domain4`.`id`=`storydynamic`.`os_dividend_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`storydynamic`.`os_dividend_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain5 ON `class_dramatica_domain5`.`id`=`storydynamic`.`os_requirements_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`storydynamic`.`os_requirements_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain6 ON `class_dramatica_domain6`.`id`=`storydynamic`.`os_prerequesites_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`storydynamic`.`os_prerequesites_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain7 ON `class_dramatica_domain7`.`id`=`storydynamic`.`os_preconditions_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`storydynamic`.`os_preconditions_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain8 ON `class_dramatica_domain8`.`id`=`storydynamic`.`os_forewarnings_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`storydynamic`.`os_forewarnings_concern` LEFT JOIN `story_chrs` as story_chrs2 ON `story_chrs2`.`id`=`storystatic1`.`story_character_mc` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`story_chrs2`.`story_character` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`storystatic1`.`concern` ";
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
	$x->ScriptFileName = "storydynamic_view.php";
	$x->RedirectAfterInsert = "storydynamic_view.php";
	$x->TableTitle = "VI.2. Dynamic story points";
	$x->TableIcon = "resources/table_icons/areachart.png";
	$x->PrimaryKey = "`storydynamic`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("ID", "Story", "Agent", "Story dev chr", "Story static ost", "Mc character", "Mc goal", "MC resolve", "MC growth", "MC approach", "MC PS style", "IC resolve", "OS driver", "OS limit", "OS outcome", "OS judgement", "OS goal domain", "OS goal concern", "OS consquence domain", "OS consequence concern", "OS cost domain", "OS cost concern", "OS dividend domain", "OS dividend concern", "OS requirements domain", "OS requirements concern", "OS prerequisites domain", "OS prerequisites concern", "OS preconditions domain", "OS preconditions concern", "OS forewarnings domain", "OS forewarnings concern");
	$x->ColFieldName = array('id', 'story', 'agent', 'story_dev_chr', 'storystatic_ost', 'storystatic_chr_mc', 'mc_problem', 'mc_resolve', 'mc_growth', 'mc_approach', 'mc_ps_style', 'ic_resolve', 'os_driver', 'os_limit', 'os_outcome', 'os_judgement', 'os_goal_domain', 'os_goal_concern', 'os_consequence_domain', 'os_consequence_concern', 'os_cost_domain', 'os_cost_concern', 'os_dividend_domain', 'os_dividend_concern', 'os_requirements_domain', 'os_requirements_concern', 'os_prerequesites_domain', 'os_prerequesites_concern', 'os_preconditions_domain', 'os_preconditions_concern', 'os_forewarnings_domain', 'os_forewarnings_concern');
	$x->ColNumber  = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32);

	// template paths below are based on the app main directory
	$x->Template = 'templates/storydynamic_templateTV.html';
	$x->SelectedTemplate = 'templates/storydynamic_templateTVS.html';
	$x->TemplateDV = 'templates/storydynamic_templateDV.html';
	$x->TemplateDVP = 'templates/storydynamic_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `storydynamic`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='storydynamic' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `storydynamic`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='storydynamic' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`storydynamic`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: storydynamic_init
	$render=TRUE;
	if(function_exists('storydynamic_init')){
		$args=array();
		$render=storydynamic_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: storydynamic_header
	$headerCode='';
	if(function_exists('storydynamic_header')){
		$args=array();
		$headerCode=storydynamic_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: storydynamic_footer
	$footerCode='';
	if(function_exists('storydynamic_footer')){
		$args=array();
		$footerCode=storydynamic_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>