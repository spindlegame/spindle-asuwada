<?php
	// check this file's MD5 to make sure it wasn't called before
	$prevMD5 = @file_get_contents(dirname(__FILE__) . '/setup.md5');
	$thisMD5 = md5(@file_get_contents(dirname(__FILE__) . '/updateDB.php'));

	// check if setup already run
	if($thisMD5 != $prevMD5) {
		// $silent is set if this file is included from setup.php
		if(!isset($silent)) $silent = true;

		// set up tables
		setupTable(
			'game_agent', " 
			CREATE TABLE IF NOT EXISTS `game_agent` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`user_id` VARCHAR(40) NULL,
				`memberID` VARCHAR(40) NULL,
				UNIQUE `memberID_unique` (`memberID`),
				`img` VARCHAR(40) NULL,
				`groupID` VARCHAR(40) NULL,
				`selection_class` INT UNSIGNED NULL,
				`agenttype1` INT(10) UNSIGNED NULL,
				`agenttype2` INT(10) UNSIGNED NULL,
				`gender` INT UNSIGNED NULL,
				`last_name` VARCHAR(40) NULL,
				`first_name` VARCHAR(40) NULL,
				`other_name` VARCHAR(40) NULL,
				`birthday` DATETIME NULL,
				`birth_location` VARCHAR(250) NULL,
				`birth_location_map` VARCHAR(40) NULL,
				`deathday` DATETIME NULL,
				`death_location` VARCHAR(250) NULL,
				`workplace` VARCHAR(250) NULL,
				`knows` VARCHAR(250) NULL,
				`shortbio` LONGTEXT NULL,
				`data_evaluation` INT UNSIGNED NULL,
				`viaf_no` VARCHAR(40) NULL,
				`authority_record` VARCHAR(255) NULL,
				`authority_organization` INT(10) UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('game_agent', ['selection_class','agenttype1','agenttype2','gender','data_evaluation','authority_organization',]);

		setupTable(
			'biblio_author', " 
			CREATE TABLE IF NOT EXISTS `biblio_author` ( 
				`game_agent_id` INT(10) UNSIGNED NULL,
				`memberID` VARCHAR(40) NULL,
				`agent_name` INT(10) UNSIGNED NULL,
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`img` VARCHAR(40) NULL,
				`groupID` VARCHAR(40) NULL,
				`selection_class` INT UNSIGNED NULL,
				`agenttype1` INT(10) UNSIGNED NULL,
				`agenttype2` INT(10) UNSIGNED NULL,
				`gender` INT UNSIGNED NULL,
				`last_name` VARCHAR(40) NULL,
				`first_name` VARCHAR(40) NULL,
				`other_name` VARCHAR(40) NULL,
				`birthday` DATETIME NULL,
				`birth_location` VARCHAR(250) NULL,
				`birth_location_map` VARCHAR(40) NULL,
				`deathday` DATETIME NULL,
				`death_location` VARCHAR(250) NULL,
				`workplace` VARCHAR(250) NULL,
				`knows` VARCHAR(250) NULL,
				`shortbio` LONGTEXT NULL,
				`data_evaluation` INT UNSIGNED NULL,
				`authority_record` VARCHAR(255) NULL,
				`authority_organization` INT(10) UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('biblio_author', ['game_agent_id','selection_class','agenttype1','agenttype2','gender','data_evaluation','authority_organization',]);

		setupTable(
			'biblio_doc', " 
			CREATE TABLE IF NOT EXISTS `biblio_doc` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`img` VARCHAR(40) NULL,
				`author_name` INT(10) UNSIGNED NULL,
				`author_id` INT(10) UNSIGNED NOT NULL,
				`type` INT(10) UNSIGNED NULL,
				`genre` INT(10) UNSIGNED NULL,
				`created` DATETIME NULL,
				`published` DATETIME NULL,
				`title` LONGTEXT NOT NULL,
				`subtitle` LONGTEXT NULL,
				`publisher` VARCHAR(40) NULL,
				`location` VARCHAR(250) NULL,
				`citation` TEXT NULL,
				`description` TEXT NULL,
				`source` VARCHAR(40) NULL,
				`medium` VARCHAR(40) NULL,
				`language` INT(10) UNSIGNED NULL,
				`format` VARCHAR(40) NULL,
				`subject` TEXT NULL,
				`rights` INT(10) UNSIGNED NULL,
				`rights_holder` VARCHAR(255) NULL,
				`data_evaluation` INT UNSIGNED NULL,
				`world_cat_no` VARCHAR(40) NULL,
				`authority_record` INT(10) UNSIGNED NULL,
				`authority_organization` INT(10) UNSIGNED NULL,
				`pdf_book` VARCHAR(255) NULL,
				`ext_source` VARCHAR(255) NULL,
				`tags` LONGTEXT NULL,
				`team` INT UNSIGNED NULL,
				`biblio_lead` INT(10) UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('biblio_doc', ['author_id','type','genre','language','rights','data_evaluation','authority_organization','team','biblio_lead',]);

		setupTable(
			'biblio_transcript', " 
			CREATE TABLE IF NOT EXISTS `biblio_transcript` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`author` INT(10) UNSIGNED NULL,
				`author_memberID` INT(10) UNSIGNED NOT NULL,
				`bibliography_id` INT(10) UNSIGNED NULL,
				`bibliography_title` INT(10) UNSIGNED NOT NULL,
				`trascriber_memberID` VARCHAR(40) NULL,
				`transcript_title` VARCHAR(250) NOT NULL,
				`transcript` VARCHAR(40) NOT NULL,
				`credits` VARCHAR(40) NULL,
				`ip_rights` INT(10) UNSIGNED NOT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('biblio_transcript', ['author_memberID','bibliography_title','ip_rights',]);

		setupTable(
			'biblio_token', " 
			CREATE TABLE IF NOT EXISTS `biblio_token` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`author_id` INT(10) UNSIGNED NOT NULL,
				`author_name` INT(10) UNSIGNED NULL,
				`bibliography` INT(10) UNSIGNED NOT NULL,
				`transcript` INT(10) UNSIGNED NOT NULL,
				`token_sequence` INT(11) NULL,
				`token` LONGTEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('biblio_token', ['author_id','bibliography','transcript',]);

		setupTable(
			'biblio_code_invivo', " 
			CREATE TABLE IF NOT EXISTS `biblio_code_invivo` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`author` INT(10) UNSIGNED NULL,
				`bibliography` INT(10) UNSIGNED NULL,
				`transcript` INT(10) UNSIGNED NULL,
				`token_sequence` INT(10) UNSIGNED NULL,
				`token` INT(10) UNSIGNED NULL,
				`invivo` LONGTEXT NULL,
				`start_date` DATETIME NULL,
				`end_date` DATETIME NULL,
				`person` VARCHAR(255) NULL,
				`place` VARCHAR(40) NULL,
				`freecode` LONGTEXT NULL,
				`tags` LONGTEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('biblio_code_invivo', ['author','bibliography','transcript','token_sequence',]);

		setupTable(
			'biblio_code_demo', " 
			CREATE TABLE IF NOT EXISTS `biblio_code_demo` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`author` INT(10) UNSIGNED NULL,
				`bibliography` INT(10) UNSIGNED NULL,
				`transcript` INT(10) UNSIGNED NULL,
				`token_id` INT(10) UNSIGNED NULL,
				`token` INT(10) UNSIGNED NULL,
				`sex` VARCHAR(40) NULL,
				`race` VARCHAR(40) NULL,
				`age` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('biblio_code_demo', ['author','bibliography','transcript','token_id','token',]);

		setupTable(
			'biblio_team', " 
			CREATE TABLE IF NOT EXISTS `biblio_team` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`team` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'biblio_analyst', " 
			CREATE TABLE IF NOT EXISTS `biblio_analyst` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`team` INT UNSIGNED NULL,
				`author_id` INT(10) UNSIGNED NULL,
				`author_memberid` INT(10) UNSIGNED NULL,
				`last_name` INT(10) UNSIGNED NULL,
				`first_name` INT(10) UNSIGNED NULL,
				`other_name` INT(10) UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('biblio_analyst', ['team','author_id',]);

		setupTable(
			'bio_team', " 
			CREATE TABLE IF NOT EXISTS `bio_team` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`team` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'bio_author', " 
			CREATE TABLE IF NOT EXISTS `bio_author` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`team` INT UNSIGNED NULL,
				`author_id` INT(10) UNSIGNED NULL,
				`author_memberid` INT(10) UNSIGNED NULL,
				`last_name` INT(10) UNSIGNED NULL,
				`first_name` INT(10) UNSIGNED NULL,
				`other_name` INT(10) UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('bio_author', ['team','author_id',]);

		setupTable(
			'bio_story', " 
			CREATE TABLE IF NOT EXISTS `bio_story` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`bio_team` INT UNSIGNED NULL,
				`author_id` INT(10) UNSIGNED NULL,
				`author_name` INT(10) UNSIGNED NULL,
				`type` INT(10) UNSIGNED NULL,
				`agent_id` INT(10) UNSIGNED NULL,
				`agent_name` INT(10) UNSIGNED NULL,
				`story_title` VARCHAR(250) NULL,
				`approach` VARCHAR(40) NULL,
				`tags` VARCHAR(80) NULL,
				`collaboration_status` INT UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('bio_story', ['bio_team','author_id','type','agent_id','collaboration_status',]);

		setupTable(
			'bio_chr', " 
			CREATE TABLE IF NOT EXISTS `bio_chr` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`img` VARCHAR(40) NULL,
				`author_id` INT(10) UNSIGNED NULL,
				`author_name` INT(10) UNSIGNED NULL,
				`agent_id` INT(10) UNSIGNED NULL,
				`agent_name` INT(10) UNSIGNED NULL,
				`bio_story` INT(10) UNSIGNED NULL,
				`bio_character` INT UNSIGNED NULL,
				`bio_archetype` INT(10) UNSIGNED NULL,
				`character_name` VARCHAR(40) NULL,
				`role` VARCHAR(250) NULL,
				`comment` TEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('bio_chr', ['author_id','agent_id','bio_story','bio_character','bio_archetype',]);

		setupTable(
			'bio_storyline', " 
			CREATE TABLE IF NOT EXISTS `bio_storyline` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`biography` INT(10) UNSIGNED NULL,
				`author_id` INT(10) UNSIGNED NULL,
				`author_name` INT(10) UNSIGNED NULL,
				`bibliography` INT(10) UNSIGNED NULL,
				`transcript` INT(10) UNSIGNED NULL,
				`token_sequence` INT(10) UNSIGNED NULL,
				`token` INT(10) UNSIGNED NULL,
				`story_act` INT UNSIGNED NULL,
				`sequence` VARCHAR(40) NULL,
				`character` INT(10) UNSIGNED NULL,
				`role` INT(10) UNSIGNED NULL,
				`storyline_no` VARCHAR(40) NULL,
				`parenthetic` VARCHAR(40) NULL,
				`storyline_title` VARCHAR(250) NULL,
				`storyline` LONGTEXT NULL,
				`notes` TEXT NULL,
				`storyweaving_scene_no` INT(10) UNSIGNED NULL,
				`storyweaving_scene` INT(10) UNSIGNED NULL,
				`storyweaving_sequence` INT(10) UNSIGNED NULL,
				`storyweaving_theme` INT(10) UNSIGNED NULL,
				`character_scene` INT(10) UNSIGNED NULL,
				`character_event` INT(10) UNSIGNED NULL,
				`startdate` DATETIME NULL,
				`enddate` DATETIME NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('bio_storyline', ['biography','author_id','bibliography','transcript','token','story_act','character','storyweaving_scene_no','character_scene','character_event',]);

		setupTable(
			'bio_storystatic', " 
			CREATE TABLE IF NOT EXISTS `bio_storystatic` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`story` INT(10) UNSIGNED NULL,
				`throughline` INT(10) UNSIGNED NULL,
				`story_character_mc` INT(10) UNSIGNED NULL,
				`throughline_domain` INT(10) UNSIGNED NULL,
				`concern` INT(10) UNSIGNED NULL,
				`issue` INT(10) UNSIGNED NULL,
				`problem` INT(10) UNSIGNED NULL,
				`solution` INT(10) UNSIGNED NULL,
				`symptom` INT(10) UNSIGNED NULL,
				`response` INT(10) UNSIGNED NULL,
				`catalyst` INT(10) UNSIGNED NULL,
				`inhibitor` INT(10) UNSIGNED NULL,
				`benchmark` INT(10) UNSIGNED NULL,
				`signpost1` INT(10) UNSIGNED NULL,
				`signpost2` INT(10) UNSIGNED NULL,
				`signpost3` INT(10) UNSIGNED NULL,
				`signpost4` INT(10) UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('bio_storystatic', ['story','throughline','story_character_mc','throughline_domain','concern','issue','problem','solution','symptom','response','catalyst','inhibitor','benchmark','signpost1','signpost2','signpost3','signpost4',]);

		setupTable(
			'bio_storyweaving_scene', " 
			CREATE TABLE IF NOT EXISTS `bio_storyweaving_scene` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`story` INT(10) UNSIGNED NULL,
				`step` INT UNSIGNED NULL,
				`throughline` INT(10) UNSIGNED NULL,
				`domain` INT(10) UNSIGNED NULL,
				`concern` INT(10) UNSIGNED NULL,
				`issue` INT(10) UNSIGNED NULL,
				`theme` INT(10) UNSIGNED NULL,
				`sequence` VARCHAR(40) NULL,
				`encoding` LONGTEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('bio_storyweaving_scene', ['story','step','throughline','domain','concern','issue','theme',]);

		setupTable(
			'bio_chr_scene', " 
			CREATE TABLE IF NOT EXISTS `bio_chr_scene` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`biography` INT(10) UNSIGNED NULL,
				`author_id` INT(10) UNSIGNED NULL,
				`author_name` INT(10) UNSIGNED NULL,
				`bibliography` INT(10) UNSIGNED NULL,
				`transcript` INT(10) UNSIGNED NULL,
				`token_sequence` INT(10) UNSIGNED NULL,
				`token` INT(10) UNSIGNED NULL,
				`invivo_code` INT(10) UNSIGNED NULL,
				`startdate` INT(10) UNSIGNED NULL DEFAULT '1',
				`enddate` INT(10) UNSIGNED NULL DEFAULT '1',
				`person` INT(10) UNSIGNED NULL,
				`place` INT(10) UNSIGNED NULL,
				`herme_code` INT(10) UNSIGNED NULL,
				`impression` INT(10) UNSIGNED NULL,
				`noetictension` INT(10) UNSIGNED NULL,
				`pc` INT(10) UNSIGNED NULL,
				`chr_element` INT(10) UNSIGNED NULL,
				`comment` TEXT NULL,
				`illustration` TEXT NULL,
				`scene` LONGTEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('bio_chr_scene', ['biography','author_id','bibliography','transcript','token','invivo_code','startdate','herme_code','chr_element',]);

		setupTable(
			'bio_chr_dev', " 
			CREATE TABLE IF NOT EXISTS `bio_chr_dev` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`agent_id` INT(10) UNSIGNED NULL,
				`agent_name` INT(10) UNSIGNED NULL,
				`bio_story` INT(10) UNSIGNED NULL,
				`cw_name` INT(10) UNSIGNED NULL,
				`dp1_resolve` INT UNSIGNED NULL,
				`dp2_resolve` INT UNSIGNED NULL,
				`dp3_resolve` INT UNSIGNED NULL,
				`mc_resolve` INT UNSIGNED NULL,
				`illust_resolve` INT(10) UNSIGNED NULL,
				`dp3_growth` INT UNSIGNED NULL,
				`mc_growth` INT UNSIGNED NULL,
				`illust_growth` INT(10) UNSIGNED NULL,
				`dp3_approach` INT UNSIGNED NULL,
				`mc_approach` INT UNSIGNED NULL,
				`illust_approach` INT(10) UNSIGNED NULL,
				`dp3_psstyle` INT UNSIGNED NULL,
				`mc_ps_style` INT UNSIGNED NULL,
				`illust_ps_style` INT(10) UNSIGNED NULL,
				`cw_age` VARCHAR(40) NULL,
				`cw_gender` INT(10) UNSIGNED NULL,
				`cw_communication_style` TEXT NULL,
				`cw_background` TEXT NULL,
				`cw_appearance` TEXT NULL,
				`cw_relationships` VARCHAR(255) NULL,
				`cw_ambition` TEXT NULL,
				`cw_defects` TEXT NULL,
				`cw_thoughts` TEXT NULL,
				`cw_relatedness` VARCHAR(255) NULL,
				`cw_restrictions` TEXT NULL,
				`locations` VARCHAR(255) NULL,
				`persons` VARCHAR(255) NULL,
				`events` TEXT NULL,
				`noetictension` INT(10) UNSIGNED NULL,
				`illust_nt` INT(10) UNSIGNED NULL,
				`impression` INT(10) UNSIGNED NULL,
				`illust_im` INT(10) UNSIGNED NULL,
				`mcs_problem` INT(10) UNSIGNED NULL,
				`illust_mcs_problem` INT(10) UNSIGNED NULL,
				`mcs_solution` INT(10) UNSIGNED NULL,
				`illust_mcs_solution` INT(10) UNSIGNED NULL,
				`mcs_symptom` INT(10) UNSIGNED NULL,
				`illust_mcs_symptom` INT(10) UNSIGNED NULL,
				`mcs_response` INT(10) UNSIGNED NULL,
				`illust_mcs_response` INT(10) UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('bio_chr_dev', ['agent_id','bio_story','cw_name','dp1_resolve','dp2_resolve','dp3_resolve','mc_resolve','illust_resolve','dp3_growth','mc_growth','illust_growth','dp3_approach','mc_approach','illust_approach','dp3_psstyle','mc_ps_style','illust_ps_style','noetictension','illust_nt','impression','illust_im','mcs_problem','illust_mcs_problem','illust_mcs_solution','illust_mcs_symptom','illust_mcs_response',]);

		setupTable(
			'bio_encounter', " 
			CREATE TABLE IF NOT EXISTS `bio_encounter` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`authorA` INT(10) UNSIGNED NULL,
				`author_nameA` INT(10) UNSIGNED NULL,
				`bibliographyA` INT(10) UNSIGNED NULL,
				`transcriptA` INT(10) UNSIGNED NULL,
				`tokenA` INT(10) UNSIGNED NULL,
				`sceneA` INT(10) UNSIGNED NULL,
				`authorB` INT(10) UNSIGNED NULL,
				`authornameB` INT(10) UNSIGNED NULL,
				`bibliographyB` INT(10) UNSIGNED NULL,
				`transcriptB` INT(10) UNSIGNED NULL,
				`tokenB` INT(10) UNSIGNED NULL,
				`sceneB` INT(10) UNSIGNED NULL,
				`relation_description` LONGTEXT NULL,
				`type` VARCHAR(40) NULL,
				`conflicttype` VARCHAR(40) NULL,
				`story_scene` INT(10) UNSIGNED NULL,
				`nd_color` INT(10) UNSIGNED NULL,
				`nd_width` VARCHAR(40) NULL,
				`nd_style` VARCHAR(40) NULL,
				`nd_opacity` VARCHAR(40) NULL,
				`nd_visibility` VARCHAR(40) NULL,
				`lbl_lable` VARCHAR(40) NULL,
				`lbl_color` VARCHAR(40) NULL,
				`lbl_size` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('bio_encounter', ['authorA','author_nameA','bibliographyA','transcriptA','tokenA','sceneA','authorB','authornameB','bibliographyB','transcriptB','tokenB','sceneB',]);

		setupTable(
			'bio_encounter_scene', " 
			CREATE TABLE IF NOT EXISTS `bio_encounter_scene` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`scene` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'bio_code_herme', " 
			CREATE TABLE IF NOT EXISTS `bio_code_herme` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`biography` INT(10) UNSIGNED NULL,
				`agent_id` INT(10) UNSIGNED NULL,
				`agent_name` INT(10) UNSIGNED NULL,
				`author_id` INT(10) UNSIGNED NULL,
				`author_name` INT(10) UNSIGNED NULL,
				`bibliography` INT(10) UNSIGNED NULL,
				`transcript` INT(10) UNSIGNED NULL,
				`token_sequence` INT(10) UNSIGNED NULL,
				`token` INT(10) UNSIGNED NULL,
				`hermeneutic` TEXT NULL,
				`impression` INT(10) UNSIGNED NULL,
				`noetictension` INT(10) UNSIGNED NULL,
				`quadrilemma` BLOB NULL,
				`pc` INT UNSIGNED NULL,
				`freecode` LONGTEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('bio_code_herme', ['biography','agent_id','author_id','bibliography','transcript','token_sequence','impression','noetictension','pc',]);

		setupTable(
			'bio_storydynamic', " 
			CREATE TABLE IF NOT EXISTS `bio_storydynamic` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`story` INT(10) UNSIGNED NULL,
				`storystatic_mc` INT(10) UNSIGNED NULL,
				`story_chr_mc` INT(10) UNSIGNED NULL,
				`mc_problem` INT(10) UNSIGNED NULL,
				`mc_resolve` INT(10) UNSIGNED NULL,
				`mc_growth` INT(10) UNSIGNED NULL,
				`mc_approach` INT(10) UNSIGNED NULL,
				`mc_ps_style` INT(10) UNSIGNED NULL,
				`story_chr_ic` INT(10) UNSIGNED NULL,
				`ic_resolve` INT(10) UNSIGNED NULL,
				`dp_cat1` INT UNSIGNED NULL,
				`dp_cat2` INT UNSIGNED NULL,
				`dp_cat3_driver` INT UNSIGNED NULL,
				`os_driver` INT UNSIGNED NULL,
				`dp_cat3_limit` INT UNSIGNED NULL,
				`os_limit` INT UNSIGNED NULL,
				`dp_cat3_outcome` INT UNSIGNED NULL,
				`os_outcome` INT UNSIGNED NULL,
				`dp_cat3_judgement` INT UNSIGNED NULL,
				`os_judgement` INT UNSIGNED NULL,
				`os_goal_domain` INT(10) UNSIGNED NULL,
				`os_goal_concern` INT(10) UNSIGNED NULL,
				`os_consequence_domain` INT(10) UNSIGNED NULL,
				`os_consequence_concern` INT(10) UNSIGNED NULL,
				`os_cost_domain` INT(10) UNSIGNED NULL,
				`os_cost_concern` INT(10) UNSIGNED NULL,
				`os_dividend_domain` INT(10) UNSIGNED NULL,
				`os_dividend_concern` INT(10) UNSIGNED NULL,
				`os_requirements_domain` INT(10) UNSIGNED NULL,
				`os_requirements_concern` INT(10) UNSIGNED NULL,
				`os_prerequesites_domain` INT(10) UNSIGNED NULL,
				`os_prerequesites_concern` INT(10) UNSIGNED NULL,
				`os_preconditions_domain` INT(10) UNSIGNED NULL,
				`os_preconditions_concern` INT(10) UNSIGNED NULL,
				`os_forewarnings_domain` INT(10) UNSIGNED NULL,
				`os_forewarnings_concern` INT(10) UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('bio_storydynamic', ['story','storystatic_mc','story_chr_mc','mc_problem','mc_resolve','mc_growth','mc_approach','mc_ps_style','story_chr_ic','ic_resolve','dp_cat1','dp_cat2','dp_cat3_driver','os_driver','dp_cat3_limit','os_limit','dp_cat3_outcome','os_outcome','dp_cat3_judgement','os_judgement','os_goal_domain','os_consequence_domain','os_consequence_concern','os_cost_domain','os_cost_concern','os_dividend_domain','os_dividend_concern','os_requirements_domain','os_requirements_concern','os_prerequesites_domain','os_prerequesites_concern','os_preconditions_domain','os_preconditions_concern','os_forewarnings_domain','os_forewarnings_concern',]);

		setupTable(
			'hist_author', " 
			CREATE TABLE IF NOT EXISTS `hist_author` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`team` INT UNSIGNED NULL,
				`agent_id` INT(10) UNSIGNED NULL,
				`agent_memberid` INT(10) UNSIGNED NULL,
				`last_name` INT(10) UNSIGNED NULL,
				`first_name` INT(10) UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('hist_author', ['team','agent_id',]);

		setupTable(
			'hist_team', " 
			CREATE TABLE IF NOT EXISTS `hist_team` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`team` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'hist_story', " 
			CREATE TABLE IF NOT EXISTS `hist_story` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`team` INT UNSIGNED NULL,
				`hist_lead_id` INT(10) UNSIGNED NULL,
				`hist_lead_name` INT(10) UNSIGNED NULL,
				`community_id` INT(10) UNSIGNED NULL,
				`story_title` VARCHAR(250) NULL,
				`genre` INT(10) UNSIGNED NULL,
				`approach` VARCHAR(250) NULL,
				`description` LONGTEXT NULL,
				`tags` LONGTEXT NULL,
				`collaboration_status` INT UNSIGNED NULL,
				`language` INT(10) UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('hist_story', ['team','hist_lead_id','community_id','genre','collaboration_status','language',]);

		setupTable(
			'hist_chr', " 
			CREATE TABLE IF NOT EXISTS `hist_chr` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`team` INT UNSIGNED NULL,
				`hist_lead_id` INT(10) UNSIGNED NULL,
				`hist_lead_memberid` INT(10) UNSIGNED NULL,
				`hist_lead_name` INT(10) UNSIGNED NULL,
				`hist_story` INT(10) UNSIGNED NULL,
				`agent_id` INT(10) UNSIGNED NULL,
				`agent_name` INT(10) UNSIGNED NULL,
				`bio_story` INT(10) UNSIGNED NULL,
				`story_character` INT UNSIGNED NULL,
				`story_archetype` INT(10) UNSIGNED NULL,
				`character_name` VARCHAR(40) NULL,
				`role` VARCHAR(40) NULL,
				`comment` TEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('hist_chr', ['team','hist_lead_id','hist_story','agent_id','bio_story','story_character','story_archetype',]);

		setupTable(
			'hist_chr_dev', " 
			CREATE TABLE IF NOT EXISTS `hist_chr_dev` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`hist_story` INT(10) UNSIGNED NULL,
				`bio_story` INT(10) UNSIGNED NULL,
				`agent_id` INT(10) UNSIGNED NULL,
				`agent_name` INT(10) UNSIGNED NULL,
				`cw_name` INT(10) UNSIGNED NULL,
				`dp1_resolve` INT UNSIGNED NULL,
				`dp2_resolve` INT UNSIGNED NULL,
				`dp3_resolve` INT UNSIGNED NULL,
				`mc_resolve` INT UNSIGNED NULL,
				`illust_resolve` INT(10) UNSIGNED NULL,
				`dp3_growth` INT UNSIGNED NULL,
				`mc_growth` INT UNSIGNED NULL,
				`illust_growth` INT(10) UNSIGNED NULL,
				`dp3_approach` INT UNSIGNED NULL,
				`mc_approach` INT UNSIGNED NULL,
				`illust_approach` INT(10) UNSIGNED NULL,
				`dp3_psstyle` INT UNSIGNED NULL,
				`mc_ps_style` INT UNSIGNED NULL,
				`illust_ps_style` INT(10) UNSIGNED NULL,
				`cw_age` VARCHAR(40) NULL,
				`cw_gender` INT(10) UNSIGNED NULL,
				`cw_communication_style` TEXT NULL,
				`cw_background` TEXT NULL,
				`cw_appearance` TEXT NULL,
				`cw_relationships` VARCHAR(255) NULL,
				`cw_ambition` TEXT NULL,
				`cw_defects` TEXT NULL,
				`cw_thoughts` TEXT NULL,
				`cw_relatedness` VARCHAR(255) NULL,
				`cw_restrictions` TEXT NULL,
				`locations` VARCHAR(255) NULL,
				`persons` VARCHAR(255) NULL,
				`events` TEXT NULL,
				`noetictension` INT(10) UNSIGNED NULL,
				`illust_nt` INT(10) UNSIGNED NULL,
				`impression` INT(10) UNSIGNED NULL,
				`illust_im` INT(10) UNSIGNED NULL,
				`mcs_problem` INT(10) UNSIGNED NULL,
				`illust_mcs_problem` INT(10) UNSIGNED NULL,
				`mcs_solution` INT(10) UNSIGNED NULL,
				`illust_mcs_solution` INT(10) UNSIGNED NULL,
				`mcs_symptom` INT(10) UNSIGNED NULL,
				`illust_mcs_symptom` INT(10) UNSIGNED NULL,
				`mcs_response` INT(10) UNSIGNED NULL,
				`illust_mcs_response` INT(10) UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('hist_chr_dev', ['hist_story','bio_story','agent_id','agent_name','cw_name','dp1_resolve','dp2_resolve','dp3_resolve','mc_resolve','illust_resolve','dp3_growth','mc_growth','illust_growth','dp3_approach','mc_approach','illust_approach','dp3_psstyle','mc_ps_style','illust_ps_style','noetictension','illust_nt','impression','illust_im','mcs_problem','illust_mcs_problem','illust_mcs_solution','illust_mcs_symptom','illust_mcs_response',]);

		setupTable(
			'hist_chr_scene', " 
			CREATE TABLE IF NOT EXISTS `hist_chr_scene` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`author_id` INT(10) UNSIGNED NULL,
				`author_name` INT(10) UNSIGNED NULL,
				`hist_story` INT(10) UNSIGNED NULL,
				`character` INT(10) UNSIGNED NULL,
				`agent_id` INT(10) UNSIGNED NULL,
				`agent_name` INT(10) UNSIGNED NULL,
				`bio_story` INT(10) UNSIGNED NULL,
				`bio_storyline_no` INT(10) UNSIGNED NULL,
				`bio_storyline_text` INT(10) UNSIGNED NULL,
				`chr_element` INT(10) UNSIGNED NULL,
				`scene` LONGTEXT NULL,
				`illustration` TEXT NULL,
				`comment` TEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('hist_chr_scene', ['author_id','hist_story','character','agent_id','bio_story','bio_storyline_no','chr_element',]);

		setupTable(
			'hist_storyline', " 
			CREATE TABLE IF NOT EXISTS `hist_storyline` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`story` INT(10) UNSIGNED NULL,
				`story_act` INT UNSIGNED NULL,
				`character` INT(10) UNSIGNED NULL,
				`role` INT(10) UNSIGNED NULL,
				`scene` VARCHAR(40) NULL,
				`sequence` VARCHAR(40) NULL,
				`storyline_no` VARCHAR(40) NULL,
				`parenthetic` VARCHAR(250) NULL,
				`storyline_title` VARCHAR(250) NULL,
				`storyline` LONGTEXT NULL,
				`notes` TEXT NULL,
				`storyweaving_scene_no` INT(10) UNSIGNED NULL,
				`storyweaving_scene` INT(10) UNSIGNED NULL,
				`storyweaving_sequence` INT(10) UNSIGNED NULL,
				`storyweaving_theme` INT(10) UNSIGNED NULL,
				`characterevent_scene` INT(10) UNSIGNED NULL,
				`character_event` INT(10) UNSIGNED NULL,
				`startdate` DATE NULL,
				`enddate` DATE NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('hist_storyline', ['story','story_act','character','storyweaving_scene_no','storyweaving_scene','storyweaving_sequence','storyweaving_theme','characterevent_scene','character_event',]);

		setupTable(
			'hist_storystatic', " 
			CREATE TABLE IF NOT EXISTS `hist_storystatic` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`story` INT(10) UNSIGNED NULL,
				`throughline` INT(10) UNSIGNED NULL,
				`story_character_mc` INT(10) UNSIGNED NULL,
				`throughline_domain` INT(10) UNSIGNED NULL,
				`concern` INT(10) UNSIGNED NULL,
				`issue` INT(10) UNSIGNED NULL,
				`problem` INT(10) UNSIGNED NULL,
				`solution` INT(10) UNSIGNED NULL,
				`symptom` INT(10) UNSIGNED NULL,
				`response` INT(10) UNSIGNED NULL,
				`catalyst` INT(10) UNSIGNED NULL,
				`inhibitor` INT(10) UNSIGNED NULL,
				`benchmark` INT(10) UNSIGNED NULL,
				`signpost1` INT(10) UNSIGNED NULL,
				`signpost2` INT(10) UNSIGNED NULL,
				`signpost3` INT(10) UNSIGNED NULL,
				`signpost4` INT(10) UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('hist_storystatic', ['story','throughline','story_character_mc','throughline_domain','concern','issue','problem','solution','symptom','response','catalyst','inhibitor','benchmark','signpost1','signpost2','signpost3','signpost4',]);

		setupTable(
			'hist_storydynamic', " 
			CREATE TABLE IF NOT EXISTS `hist_storydynamic` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`hist_story` INT(10) UNSIGNED NULL,
				`bio_story_mc` INT(10) UNSIGNED NULL,
				`hist_chr_mc` INT(10) UNSIGNED NULL,
				`storystatic_mc` INT(10) UNSIGNED NULL,
				`story_chr_mc` INT(10) UNSIGNED NULL,
				`mc_problem` INT(10) UNSIGNED NULL,
				`mc_resolve` INT(10) UNSIGNED NULL,
				`mc_growth` INT(10) UNSIGNED NULL,
				`mc_approach` INT(10) UNSIGNED NULL,
				`mc_ps_style` INT(10) UNSIGNED NULL,
				`story_chr_ic` INT(10) UNSIGNED NULL,
				`ic_resolve` INT(10) UNSIGNED NULL,
				`dp_cat1` INT UNSIGNED NULL,
				`dp_cat2` INT UNSIGNED NULL,
				`dp_cat3_driver` INT UNSIGNED NULL,
				`os_driver` INT UNSIGNED NULL,
				`dp_cat3_limit` INT UNSIGNED NULL,
				`os_limit` INT UNSIGNED NULL,
				`dp_cat3_outcome` INT UNSIGNED NULL,
				`os_outcome` INT UNSIGNED NULL,
				`dp_cat3_judgement` INT UNSIGNED NULL,
				`os_judgement` INT UNSIGNED NULL,
				`os_goal_domain` INT(10) UNSIGNED NULL,
				`os_goal_concern` INT(10) UNSIGNED NULL,
				`os_consequence_domain` INT(10) UNSIGNED NULL,
				`os_consequence_concern` INT(10) UNSIGNED NULL,
				`os_cost_domain` INT(10) UNSIGNED NULL,
				`os_cost_concern` INT(10) UNSIGNED NULL,
				`os_dividend_domain` INT(10) UNSIGNED NULL,
				`os_dividend_concern` INT(10) UNSIGNED NULL,
				`os_requirements_domain` INT(10) UNSIGNED NULL,
				`os_requirements_concern` INT(10) UNSIGNED NULL,
				`os_prerequesites_domain` INT(10) UNSIGNED NULL,
				`os_prerequesites_concern` INT(10) UNSIGNED NULL,
				`os_preconditions_domain` INT(10) UNSIGNED NULL,
				`os_preconditions_concern` INT(10) UNSIGNED NULL,
				`os_forewarnings_domain` INT(10) UNSIGNED NULL,
				`os_forewarnings_concern` INT(10) UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('hist_storydynamic', ['hist_story','bio_story_mc','hist_chr_mc','storystatic_mc','story_chr_mc','mc_problem','mc_resolve','mc_growth','mc_approach','mc_ps_style','story_chr_ic','ic_resolve','dp_cat1','dp_cat2','dp_cat3_driver','os_driver','dp_cat3_limit','os_limit','dp_cat3_outcome','os_outcome','dp_cat3_judgement','os_judgement','os_goal_domain','os_goal_concern','os_consequence_domain','os_consequence_concern','os_cost_domain','os_cost_concern','os_dividend_domain','os_dividend_concern','os_requirements_domain','os_requirements_concern','os_prerequesites_domain','os_prerequesites_concern','os_preconditions_domain','os_preconditions_concern','os_forewarnings_domain','os_forewarnings_concern',]);

		setupTable(
			'hist_storyweaving_scene', " 
			CREATE TABLE IF NOT EXISTS `hist_storyweaving_scene` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`story` INT(10) UNSIGNED NULL,
				`step` INT UNSIGNED NULL,
				`throughline` INT(10) UNSIGNED NULL,
				`domain` INT(10) UNSIGNED NULL,
				`concern` INT(10) UNSIGNED NULL,
				`issue` INT(10) UNSIGNED NULL,
				`theme` INT(10) UNSIGNED NULL,
				`sequence` VARCHAR(40) NULL,
				`encoding` LONGTEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('hist_storyweaving_scene', ['story','step','throughline','domain','concern','issue','theme',]);

		setupTable(
			'hist_encounter', " 
			CREATE TABLE IF NOT EXISTS `hist_encounter` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`bio_chrA` INT(10) UNSIGNED NULL,
				`bio_storyA` INT(10) UNSIGNED NULL,
				`bio_storyline` INT(10) UNSIGNED NULL,
				`bio_storytext` INT(10) UNSIGNED NULL,
				`sceneA` INT(10) UNSIGNED NULL,
				`bio_chrB` INT(10) UNSIGNED NULL,
				`bio_storyB` INT(10) UNSIGNED NULL,
				`bio_storylineB` INT(10) UNSIGNED NULL,
				`bio_storytextB` INT(10) UNSIGNED NULL,
				`type` VARCHAR(40) NULL,
				`conflicttype` VARCHAR(40) NULL,
				`story_scene` INT(10) UNSIGNED NULL,
				`nd_color` INT(10) UNSIGNED NULL,
				`nd_width` VARCHAR(40) NULL,
				`nd_style` VARCHAR(40) NULL,
				`nd_opacity` VARCHAR(40) NULL,
				`nd_visibility` VARCHAR(40) NULL,
				`lbl_lable` VARCHAR(40) NULL,
				`lbl_color` VARCHAR(40) NULL,
				`lbl_size` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('hist_encounter', ['bio_chrA','bio_storyA','bio_storyline','bio_storytext','sceneA','bio_chrB','bio_storyB','bio_storylineB','bio_storytextB',]);

		setupTable(
			'hist_encounter_scene', " 
			CREATE TABLE IF NOT EXISTS `hist_encounter_scene` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`scene` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'hist_community', " 
			CREATE TABLE IF NOT EXISTS `hist_community` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`com_name` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_agent_selection', " 
			CREATE TABLE IF NOT EXISTS `class_agent_selection` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`selection_phase` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_agent_type1', " 
			CREATE TABLE IF NOT EXISTS `class_agent_type1` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`type` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_agent_type2', " 
			CREATE TABLE IF NOT EXISTS `class_agent_type2` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`type` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_character_element', " 
			CREATE TABLE IF NOT EXISTS `class_character_element` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`element` VARCHAR(40) NULL,
				`value` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_gender', " 
			CREATE TABLE IF NOT EXISTS `class_gender` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`gender` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_authority_agent', " 
			CREATE TABLE IF NOT EXISTS `class_authority_agent` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`abbreviation` VARCHAR(40) NULL,
				`authority_name` VARCHAR(250) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_evaluation', " 
			CREATE TABLE IF NOT EXISTS `class_evaluation` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`evaluation_type` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_bibliography_type', " 
			CREATE TABLE IF NOT EXISTS `class_bibliography_type` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`type` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_bibliography_genre', " 
			CREATE TABLE IF NOT EXISTS `class_bibliography_genre` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`genre` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_authority_library', " 
			CREATE TABLE IF NOT EXISTS `class_authority_library` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`abbreviation` VARCHAR(40) NULL,
				`authority_name` VARCHAR(80) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_rights', " 
			CREATE TABLE IF NOT EXISTS `class_rights` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`right` VARCHAR(40) NULL,
				`description` TEXT NULL,
				`certification` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_language', " 
			CREATE TABLE IF NOT EXISTS `class_language` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`short` VARCHAR(40) NULL,
				`language` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_story_collab_type', " 
			CREATE TABLE IF NOT EXISTS `class_story_collab_type` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`collab_type` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_story_acts', " 
			CREATE TABLE IF NOT EXISTS `class_story_acts` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`act` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_story_path', " 
			CREATE TABLE IF NOT EXISTS `class_story_path` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`path` VARCHAR(40) NULL,
				`topic` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_dramatica_steps', " 
			CREATE TABLE IF NOT EXISTS `class_dramatica_steps` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`step` VARCHAR(40) NULL,
				`type` VARCHAR(40) NULL,
				`act` INT UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('class_dramatica_steps', ['act',]);

		setupTable(
			'class_dramatica_throughline', " 
			CREATE TABLE IF NOT EXISTS `class_dramatica_throughline` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`throughline` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_dramatica_signpost', " 
			CREATE TABLE IF NOT EXISTS `class_dramatica_signpost` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`signpost` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_dramatica_domain', " 
			CREATE TABLE IF NOT EXISTS `class_dramatica_domain` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`domain` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_dramatica_concern', " 
			CREATE TABLE IF NOT EXISTS `class_dramatica_concern` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`domain` INT(10) UNSIGNED NULL,
				`concern` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('class_dramatica_concern', ['domain',]);

		setupTable(
			'class_dramatica_issue', " 
			CREATE TABLE IF NOT EXISTS `class_dramatica_issue` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`domain` INT(10) UNSIGNED NULL,
				`concern` INT(10) UNSIGNED NULL,
				`issue` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('class_dramatica_issue', ['domain','concern',]);

		setupTable(
			'class_dramatica_themes', " 
			CREATE TABLE IF NOT EXISTS `class_dramatica_themes` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`domain` INT(10) UNSIGNED NULL,
				`concern` INT(10) UNSIGNED NULL,
				`issue` INT(10) UNSIGNED NULL,
				`theme` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('class_dramatica_themes', ['domain','concern','issue',]);

		setupTable(
			'class_dramatica_archetype', " 
			CREATE TABLE IF NOT EXISTS `class_dramatica_archetype` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`archetype` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_dramatica_character', " 
			CREATE TABLE IF NOT EXISTS `class_dramatica_character` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`character` VARCHAR(40) NULL,
				`definition` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_dramatica_storypoints1', " 
			CREATE TABLE IF NOT EXISTS `class_dramatica_storypoints1` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`term` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_dramatica_storypoints2', " 
			CREATE TABLE IF NOT EXISTS `class_dramatica_storypoints2` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`cat1` INT UNSIGNED NULL,
				`term` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('class_dramatica_storypoints2', ['cat1',]);

		setupTable(
			'class_dramatica_storypoints3', " 
			CREATE TABLE IF NOT EXISTS `class_dramatica_storypoints3` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`cat1` INT UNSIGNED NULL,
				`cat2` INT UNSIGNED NULL,
				`term` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('class_dramatica_storypoints3', ['cat1','cat2',]);

		setupTable(
			'class_dynamicstorypoints4', " 
			CREATE TABLE IF NOT EXISTS `class_dynamicstorypoints4` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`cat1` INT UNSIGNED NULL,
				`cat2` INT UNSIGNED NULL,
				`cat3` INT UNSIGNED NULL,
				`term` VARCHAR(40) NULL,
				`value` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('class_dynamicstorypoints4', ['cat1','cat2','cat3',]);

		setupTable(
			'class_im', " 
			CREATE TABLE IF NOT EXISTS `class_im` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`impression` VARCHAR(40) NULL,
				`description` TEXT NULL,
				`category` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_pc', " 
			CREATE TABLE IF NOT EXISTS `class_pc` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`perform_contrad` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_nt', " 
			CREATE TABLE IF NOT EXISTS `class_nt` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`noetictension` VARCHAR(40) NULL,
				`description` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'dictionary', " 
			CREATE TABLE IF NOT EXISTS `dictionary` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`term` VARCHAR(40) NULL,
				`definition` TEXT NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_dictionary1', " 
			CREATE TABLE IF NOT EXISTS `class_dictionary1` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`category` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'class_dictionary2', " 
			CREATE TABLE IF NOT EXISTS `class_dictionary2` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`class1` INT UNSIGNED NULL,
				`category` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('class_dictionary2', ['class1',]);

		setupTable(
			'class_dictionary3', " 
			CREATE TABLE IF NOT EXISTS `class_dictionary3` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`class1` INT UNSIGNED NULL,
				`class2` INT UNSIGNED NULL,
				`category` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('class_dictionary3', ['class1','class2',]);

		setupTable(
			'class_dictionary5', " 
			CREATE TABLE IF NOT EXISTS `class_dictionary5` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`class1` INT UNSIGNED NULL,
				`class2` INT UNSIGNED NULL,
				`class3` INT UNSIGNED NULL,
				`class4` INT UNSIGNED NULL,
				`category` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('class_dictionary5', ['class1','class2','class3','class4',]);

		setupTable(
			'class_dictionary4', " 
			CREATE TABLE IF NOT EXISTS `class_dictionary4` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`class1` INT UNSIGNED NULL,
				`class2` INT UNSIGNED NULL,
				`class3` INT UNSIGNED NULL,
				`category` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('class_dictionary4', ['class1','class2','class3',]);



		// save MD5
		@file_put_contents(dirname(__FILE__) . '/setup.md5', $thisMD5);
	}


	function setupIndexes($tableName, $arrFields) {
		if(!is_array($arrFields) || !count($arrFields)) return false;

		foreach($arrFields as $fieldName) {
			if(!$res = @db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")) continue;
			if(!$row = @db_fetch_assoc($res)) continue;
			if($row['Key']) continue;

			@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
		}
	}


	function setupTable($tableName, $createSQL = '', $silent = true, $arrAlter = '') {
		global $Translation;
		$oldTableName = '';
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)) {
			$matches = [];
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/i", $arrAlter[0], $matches)) {
				$oldTableName = $matches[1];
			}
		}

		if($res = @db_query("SELECT COUNT(1) FROM `$tableName`")) { // table already exists
			if($row = @db_fetch_array($res)) {
				echo str_replace(['<TableName>', '<NumRecords>'], [$tableName, $row[0]], $Translation['table exists']);
				if(is_array($arrAlter)) {
					echo '<br>';
					foreach($arrAlter as $alter) {
						if($alter != '') {
							echo "$alter ... ";
							if(!@db_query($alter)) {
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							} else {
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				} else {
					echo $Translation['table uptodate'];
				}
			} else {
				echo str_replace('<TableName>', $tableName, $Translation['couldnt count']);
			}
		} else { // given tableName doesn't exist

			if($oldTableName != '') { // if we have a table rename query
				if($ro = @db_query("SELECT COUNT(1) FROM `$oldTableName`")) { // if old table exists, rename it.
					$renameQuery = array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)) {
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					} else {
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				} else { // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			} else { // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)) {
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				} else {
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}
		}

		echo '</div>';

		$out = ob_get_clean();
		if(!$silent) echo $out;
	}
