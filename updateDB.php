<?php
	// check this file's MD5 to make sure it wasn't called before
	$prevMD5=@implode('', @file(dirname(__FILE__).'/setup.md5'));
	$thisMD5=md5(@implode('', @file("./updateDB.php")));
	if($thisMD5==$prevMD5){
		$setupAlreadyRun=true;
	}else{
		// set up tables
		if(!isset($silent)){
			$silent=true;
		}

		// set up tables
		setupTable('biblio_community', "create table if not exists `biblio_community` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `com_name` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('biblio_author', "create table if not exists `biblio_author` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `memberID` VARCHAR(40) null , unique `memberID_unique` (`memberID`), `img` VARCHAR(40) null , `groupID` VARCHAR(40) null , `selection_class` INT unsigned null , `agenttype1` INT(10) unsigned null , `agenttype2` INT(10) unsigned null , `gender` INT unsigned null , `last_name` VARCHAR(40) null , `first_name` VARCHAR(40) null , `other_name` VARCHAR(40) null , `birthday` DATETIME null , `birth_location` VARCHAR(250) null , `birth_location_map` VARCHAR(40) null , `deathday` DATETIME null , `death_location` VARCHAR(250) null , `workplace` VARCHAR(250) null , `knows` VARCHAR(250) null , `shortbio` LONGTEXT null , `data_evaluation` INT unsigned null , `authority_record` VARCHAR(255) null , `authority_organization` INT(10) unsigned null ) CHARSET utf8", $silent);
		setupIndexes('biblio_author', array('selection_class','agenttype1','agenttype2','gender','data_evaluation','authority_organization'));
		setupTable('biblio_doc', "create table if not exists `biblio_doc` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `img` VARCHAR(40) null , `author_name` INT(10) unsigned null , `author_id` INT(10) unsigned not null , `type` INT(10) unsigned null , `genre` INT(10) unsigned null , `created` DATETIME null , `published` DATETIME null , `title` LONGTEXT not null , `subtitle` LONGTEXT null , `publisher` VARCHAR(40) null , `location` VARCHAR(250) null , `citation` TEXT null , `description` TEXT null , `source` VARCHAR(40) null , `medium` VARCHAR(40) null , `language` INT(10) unsigned null , `format` VARCHAR(40) null , `subject` TEXT null , `rights` INT(10) unsigned null , `rights_holder` VARCHAR(255) null , `data_evaluation` INT unsigned null , `authority_record` INT(10) unsigned null , `authority_organization` INT(10) unsigned null , `pdf_book` VARCHAR(255) null , `ext_source` VARCHAR(255) null ) CHARSET utf8", $silent);
		setupIndexes('biblio_doc', array('author_id','type','genre','language','rights','data_evaluation','authority_organization'));
		setupTable('biblio_transcript', "create table if not exists `biblio_transcript` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `author` INT(10) unsigned null , `author_memberID` INT(10) unsigned not null , `bibliography_id` INT(10) unsigned null , `bibliography_title` INT(10) unsigned not null , `trascriber_memberID` VARCHAR(40) null , `transcript_title` VARCHAR(250) not null , `transcript` VARCHAR(40) not null , `credits` VARCHAR(40) null , `ip_rights` INT(10) unsigned not null ) CHARSET utf8", $silent);
		setupIndexes('biblio_transcript', array('author_memberID','bibliography_title','ip_rights'));
		setupTable('biblio_token', "create table if not exists `biblio_token` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `author_id` INT(10) unsigned not null , `author_name` INT(10) unsigned null , `bibliography` INT(10) unsigned not null , `transcript` INT(10) unsigned not null , `token_sequence` INT(11) null , `token` LONGTEXT null ) CHARSET utf8", $silent);
		setupIndexes('biblio_token', array('author_id','bibliography','transcript'));
		setupTable('code_invivo', "create table if not exists `code_invivo` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `author` INT(10) unsigned null , `bibliography` INT(10) unsigned null , `transcript` INT(10) unsigned null , `token_sequence` INT(10) unsigned null , `token` INT(10) unsigned null , `invivo` LONGTEXT null , `start_date` DATETIME null , `end_date` DATETIME null , `person` VARCHAR(255) null , `place` VARCHAR(40) null , `freecode` LONGTEXT null ) CHARSET utf8", $silent);
		setupIndexes('code_invivo', array('author','bibliography','transcript','token_sequence'));
		setupTable('code_herme', "create table if not exists `code_herme` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `author_id` INT(10) unsigned null , `author_name` INT(10) unsigned null , `bibliography` INT(10) unsigned null , `transcript` INT(10) unsigned null , `token_sequence` INT(10) unsigned null , `token` INT(10) unsigned null , `hermeneutic` TEXT null , `impression` INT(10) unsigned null , `noetictension` INT(10) unsigned null , `quadrilemma` BLOB null , `pc` INT unsigned null , `freecode` LONGTEXT null ) CHARSET utf8", $silent);
		setupIndexes('code_herme', array('author_id','bibliography','transcript','token_sequence','impression','noetictension','pc'));
		setupTable('chr_dev', "create table if not exists `chr_dev` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `agent_id` INT(10) unsigned null , `agent_name` INT(10) unsigned null , `cw_name` VARCHAR(40) null , `img` VARCHAR(40) null , `dp_resolve` INT unsigned null , `mc_resolve` INT unsigned null , `illust_resolve` INT(10) unsigned null , `mc_growth` TEXT null , `illust_growth` INT(10) unsigned null , `mc_approach` TEXT null , `illust_approach` INT(10) unsigned null , `mc_ps_style` TEXT null , `illust_ps_style` INT(10) unsigned null , `cw_age` VARCHAR(40) null , `cw_gender` INT(10) unsigned null , `cw_communication_style` TEXT null , `cw_background` TEXT null , `cw_appearance` TEXT null , `cw_relationships` VARCHAR(255) null , `cw_ambition` TEXT null , `cw_defects` TEXT null , `cw_thoughts` TEXT null , `cw_relatedness` VARCHAR(255) null , `cw_restrictions` TEXT null , `locations` VARCHAR(255) null , `persons` VARCHAR(255) null , `events` TEXT null , `noetictension` INT(10) unsigned null , `illust_nt` INT(10) unsigned null , `impression` INT(10) unsigned null , `illust_im` INT(10) unsigned null , `mcs_problem` INT(10) unsigned null , `illust_mcs_problem` INT(10) unsigned null , `mcs_solution` INT(10) unsigned null , `illust_mcs_solution` INT(10) unsigned null , `mcs_symptom` INT(10) unsigned null , `illust_mcs_symptom` INT(10) unsigned null , `mcs_response` INT(10) unsigned null , `illust_mcs_response` INT(10) unsigned null ) CHARSET utf8", $silent);
		setupIndexes('chr_dev', array('agent_id','dp_resolve','mc_resolve','illust_resolve','illust_growth','illust_approach','illust_ps_style','noetictension','illust_nt','impression','illust_im','mcs_problem','illust_mcs_problem','illust_mcs_solution','illust_mcs_symptom','illust_mcs_response'));
		setupTable('chr_scenes', "create table if not exists `chr_scenes` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `author_id` INT(10) unsigned null , `author_name` INT(10) unsigned null , `bibliography` INT(10) unsigned null , `transcript` INT(10) unsigned null , `token_sequence` INT(10) unsigned null , `token` INT(10) unsigned null , `invivo_code` INT(10) unsigned null , `startdate` INT(10) unsigned null default '1' , `enddate` INT(10) unsigned null default '1' , `person` INT(10) unsigned null , `place` INT(10) unsigned null , `herme_code` INT(10) unsigned null , `impression` INT(10) unsigned null , `noetictension` INT(10) unsigned null , `pc` INT(10) unsigned null , `chr_element` INT(10) unsigned null , `comment` TEXT null , `illustration` TEXT null , `scene` LONGTEXT null ) CHARSET utf8", $silent);
		setupIndexes('chr_scenes', array('author_id','bibliography','transcript','token','invivo_code','startdate','herme_code','chr_element'));
		setupTable('code_encounter_scenes', "create table if not exists `code_encounter_scenes` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `scene` TEXT null ) CHARSET utf8", $silent);
		setupTable('code_encounters', "create table if not exists `code_encounters` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `authorA` INT(10) unsigned null , `author_nameA` INT(10) unsigned null , `bibliographyA` INT(10) unsigned null , `transcriptA` INT(10) unsigned null , `tokenA` INT(10) unsigned null , `sceneA` INT(10) unsigned null , `authorB` INT(10) unsigned null , `authornameB` INT(10) unsigned null , `bibliographyB` INT(10) unsigned null , `transcriptB` INT(10) unsigned null , `tokenB` INT(10) unsigned null , `sceneB` INT(10) unsigned null , `type` VARCHAR(40) null , `conflicttype` VARCHAR(40) null , `story_scene` INT(10) unsigned null , `nd_color` INT(10) unsigned null , `nd_width` VARCHAR(40) null , `nd_style` VARCHAR(40) null , `nd_opacity` VARCHAR(40) null , `nd_visibility` VARCHAR(40) null , `lbl_lable` VARCHAR(40) null , `lbl_color` VARCHAR(40) null , `lbl_size` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupIndexes('code_encounters', array('authorA','author_nameA','bibliographyA','transcriptA','tokenA','sceneA','authorB','authornameB','bibliographyB','transcriptB','tokenB','sceneB'));
		setupTable('story', "create table if not exists `story` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `com_name` INT(10) unsigned null , `project_leader` VARCHAR(40) null , `subject` VARCHAR(40) null , `story` VARCHAR(250) null , `approach` VARCHAR(40) null , `tags` VARCHAR(80) null , `collaboration_status` INT unsigned null ) CHARSET utf8", $silent, array( "ALTER TABLE story ADD `field9` VARCHAR(40)","ALTER TABLE `story` CHANGE `field9` `agent` VARCHAR(40) null ","ALTER TABLE `story` DROP `agent`","ALTER TABLE story ADD `field9` VARCHAR(40)","ALTER TABLE `story` CHANGE `field9` `agent` VARCHAR(40) null ","ALTER TABLE `story` DROP `agent`","ALTER TABLE story ADD `field9` VARCHAR(40)","ALTER TABLE `story` DROP `field9`"));
		setupIndexes('story', array('com_name','collaboration_status'));
		setupTable('storylines', "create table if not exists `storylines` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `story` INT(10) unsigned null , `story_act` INT unsigned null , `character` INT(10) unsigned null , `role` INT(10) unsigned null , `storyline_no` VARCHAR(40) null , `parenthetic` VARCHAR(40) null , `storyline_title` VARCHAR(40) null , `storyline` LONGTEXT null , `notes` TEXT null , `storyweaving_scene_no` INT(10) unsigned null , `storyweaving_scene` INT(10) unsigned null , `storyweaving_sequence` INT(10) unsigned null , `storyweaving_theme` INT(10) unsigned null , `characterevent_scene` INT(10) unsigned null , `character_event` INT(10) unsigned null ) CHARSET utf8", $silent);
		setupIndexes('storylines', array('story','story_act','character','storyweaving_scene_no','characterevent_scene','character_event'));
		setupTable('story_chrs', "create table if not exists `story_chrs` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `agent_id` INT(10) unsigned null , `agent_name` INT(10) unsigned null , `character` INT(10) unsigned null , `role` VARCHAR(40) null , `story_character` INT unsigned null , `story` INT(10) unsigned null , `story_archetype` INT(10) unsigned null , `comment` TEXT null ) CHARSET utf8", $silent);
		setupIndexes('story_chrs', array('agent_id','character','story_character','story','story_archetype'));
		setupTable('storystatic', "create table if not exists `storystatic` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `story` INT(10) unsigned null , `throughline` INT(10) unsigned null , `story_character_mc` INT(10) unsigned null , `throughline_domain` INT(10) unsigned null , `concern` INT(10) unsigned null , `issue` INT(10) unsigned null , `problem` INT(10) unsigned null , `solution` INT(10) unsigned null , `symptom` INT(10) unsigned null , `response` INT(10) unsigned null , `catalyst` INT(10) unsigned null , `inhibitor` INT(10) unsigned null , `benchmark` INT(10) unsigned null , `signpost1` INT(10) unsigned null , `signpost2` INT(10) unsigned null , `signpost3` INT(10) unsigned null , `signpost4` INT(10) unsigned null ) CHARSET utf8", $silent);
		setupIndexes('storystatic', array('story','throughline','story_character_mc','throughline_domain','concern','issue','problem','solution','symptom','response','catalyst','inhibitor','benchmark','signpost1','signpost2','signpost3','signpost4'));
		setupTable('storydynamic', "create table if not exists `storydynamic` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `story` INT(10) unsigned null , `agent` INT(10) unsigned null , `story_dev_chr` INT(10) unsigned null , `storystatic_ost` INT(10) unsigned null , `storystatic_chr_mc` INT(10) unsigned null , `mc_problem` INT(10) unsigned null , `mc_resolve` INT unsigned null , `mc_growth` INT(10) unsigned null , `mc_approach` INT(10) unsigned null , `mc_ps_style` INT(10) unsigned null , `ic_resolve` VARCHAR(40) null , `os_driver` VARCHAR(40) null , `os_limit` VARCHAR(40) null , `os_outcome` VARCHAR(40) null , `os_judgement` VARCHAR(40) null , `os_goal_domain` INT(10) unsigned null , `os_goal_concern` INT(10) unsigned null , `os_consequence_domain` INT(10) unsigned null , `os_consequence_concern` INT(10) unsigned null , `os_cost_domain` INT(10) unsigned null , `os_cost_concern` INT(10) unsigned null , `os_dividend_domain` INT(10) unsigned null , `os_dividend_concern` INT(10) unsigned null , `os_requirements_domain` INT(10) unsigned null , `os_requirements_concern` INT(10) unsigned null , `os_prerequesites_domain` INT(10) unsigned null , `os_prerequesites_concern` INT(10) unsigned null , `os_preconditions_domain` INT(10) unsigned null , `os_preconditions_concern` INT(10) unsigned null , `os_forewarnings_domain` INT(10) unsigned null , `os_forewarnings_concern` INT(10) unsigned null ) CHARSET utf8", $silent, array( "ALTER TABLE storydynamic ADD `field32` VARCHAR(40)","ALTER TABLE `storydynamic` CHANGE `field32` `agent` VARCHAR(40) null "));
		setupIndexes('storydynamic', array('story','agent','story_dev_chr','storystatic_ost','mc_problem','mc_resolve','mc_growth','mc_approach','mc_ps_style','os_goal_domain','os_consequence_domain','os_consequence_concern','os_cost_domain','os_cost_concern','os_dividend_domain','os_dividend_concern','os_requirements_domain','os_requirements_concern','os_prerequesites_domain','os_prerequesites_concern','os_preconditions_domain','os_preconditions_concern','os_forewarnings_domain','os_forewarnings_concern'));
		setupTable('storyweaving_scenes', "create table if not exists `storyweaving_scenes` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `story` INT(10) unsigned null , `step` INT unsigned null , `throughline` INT(10) unsigned null , `domain` INT(10) unsigned null , `concern` INT(10) unsigned null , `issue` INT(10) unsigned null , `theme` INT(10) unsigned null , `sequence` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupIndexes('storyweaving_scenes', array('story','step','throughline','domain','concern','issue','theme'));
		setupTable('class_agent_selection', "create table if not exists `class_agent_selection` (   `id` INT unsigned not null auto_increment , primary key (`id`), `selection_phase` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_agent_type1', "create table if not exists `class_agent_type1` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `type` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_agent_type2', "create table if not exists `class_agent_type2` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `type` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_gender', "create table if not exists `class_gender` (   `id` INT unsigned not null auto_increment , primary key (`id`), `gender` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('class_authority_agent', "create table if not exists `class_authority_agent` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `abbreviation` VARCHAR(40) null , `authority_name` VARCHAR(250) null ) CHARSET utf8", $silent);
		setupTable('class_evaluation', "create table if not exists `class_evaluation` (   `id` INT unsigned not null auto_increment , primary key (`id`), `evaluation_type` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_bibliography_type', "create table if not exists `class_bibliography_type` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `type` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_bibliography_genre', "create table if not exists `class_bibliography_genre` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `genre` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_authority_library', "create table if not exists `class_authority_library` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `abbreviation` VARCHAR(40) null , `authority_name` VARCHAR(80) null ) CHARSET utf8", $silent);
		setupTable('class_rights', "create table if not exists `class_rights` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `right` VARCHAR(40) null , `description` TEXT null , `certification` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('class_language', "create table if not exists `class_language` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `short` VARCHAR(40) null , `language` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('class_story_collab_type', "create table if not exists `class_story_collab_type` (   `id` INT unsigned not null auto_increment , primary key (`id`), `collab_type` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_story_acts', "create table if not exists `class_story_acts` (   `id` INT unsigned not null auto_increment , primary key (`id`), `act` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('class_story_path', "create table if not exists `class_story_path` (   `id` INT unsigned not null auto_increment , primary key (`id`), `path` VARCHAR(40) null , `topic` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('class_dramatica_steps', "create table if not exists `class_dramatica_steps` (   `id` INT unsigned not null auto_increment , primary key (`id`), `step` VARCHAR(40) null , `type` VARCHAR(40) null , `act` INT unsigned null ) CHARSET utf8", $silent);
		setupIndexes('class_dramatica_steps', array('act'));
		setupTable('class_dramatica_throughline', "create table if not exists `class_dramatica_throughline` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `throughline` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_dramatica_signpost', "create table if not exists `class_dramatica_signpost` (   `id` INT unsigned not null auto_increment , primary key (`id`), `signpost` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('class_dramatica_domain', "create table if not exists `class_dramatica_domain` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `domain` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_dramatica_concern', "create table if not exists `class_dramatica_concern` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `domain` INT(10) unsigned null , `concern` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupIndexes('class_dramatica_concern', array('domain'));
		setupTable('class_dramatica_issue', "create table if not exists `class_dramatica_issue` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `domain` INT(10) unsigned null , `concern` INT(10) unsigned null , `issue` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupIndexes('class_dramatica_issue', array('domain','concern'));
		setupTable('class_dramatica_themes', "create table if not exists `class_dramatica_themes` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `domain` INT(10) unsigned null , `concern` INT(10) unsigned null , `issue` INT(10) unsigned null , `theme` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupIndexes('class_dramatica_themes', array('domain','concern','issue'));
		setupTable('class_dramatica_archetype', "create table if not exists `class_dramatica_archetype` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `archetype` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_dramatica_character', "create table if not exists `class_dramatica_character` (   `id` INT unsigned not null auto_increment , primary key (`id`), `character` VARCHAR(40) null , `definition` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('class_character_element', "create table if not exists `class_character_element` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `element` VARCHAR(40) null , `value` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('class_dramatica_storypoints1', "create table if not exists `class_dramatica_storypoints1` (   `id` INT unsigned not null auto_increment , primary key (`id`), `term` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_dramatica_storypoints2', "create table if not exists `class_dramatica_storypoints2` (   `id` INT unsigned not null auto_increment , primary key (`id`), `cat1` INT unsigned null , `term` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupIndexes('class_dramatica_storypoints2', array('cat1'));
		setupTable('class_dramatica_storypoints3', "create table if not exists `class_dramatica_storypoints3` (   `id` INT unsigned not null auto_increment , primary key (`id`), `cat1` INT unsigned null , `cat2` INT unsigned null , `term` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupIndexes('class_dramatica_storypoints3', array('cat1','cat2'));
		setupTable('class_dynamicstorypoints', "create table if not exists `class_dynamicstorypoints` (   `id` INT unsigned not null auto_increment , primary key (`id`), `term` VARCHAR(40) null , `value` VARCHAR(40) null , `description` TEXT null , `cat1` INT unsigned null , `cat2` INT unsigned null , `cat3` INT unsigned null ) CHARSET utf8", $silent);
		setupIndexes('class_dynamicstorypoints', array('cat1','cat2','cat3'));
		setupTable('class_im', "create table if not exists `class_im` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `impression` VARCHAR(40) null , `description` TEXT null , `category` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_pc', "create table if not exists `class_pc` (   `id` INT unsigned not null auto_increment , primary key (`id`), `perform_contrad` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_nt', "create table if not exists `class_nt` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `noetictension` VARCHAR(40) null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('dictionary', "create table if not exists `dictionary` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `term` VARCHAR(40) null , `definition` TEXT null ) CHARSET utf8", $silent);
		setupTable('class_dictionary1', "create table if not exists `class_dictionary1` (   `id` INT unsigned not null auto_increment , primary key (`id`), `category` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('class_dictionary2', "create table if not exists `class_dictionary2` (   `id` INT unsigned not null auto_increment , primary key (`id`), `class1` INT unsigned null , `category` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupIndexes('class_dictionary2', array('class1'));
		setupTable('class_dictionary3', "create table if not exists `class_dictionary3` (   `id` INT unsigned not null auto_increment , primary key (`id`), `class1` INT unsigned null , `class2` INT unsigned null , `category` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupIndexes('class_dictionary3', array('class1','class2'));
		setupTable('class_dictionary4', "create table if not exists `class_dictionary4` (   `id` INT unsigned not null auto_increment , primary key (`id`), `class1` INT unsigned null , `class2` INT unsigned null , `class3` INT unsigned null , `category` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupIndexes('class_dictionary4', array('class1','class2','class3'));
		setupTable('class_dictionary5', "create table if not exists `class_dictionary5` (   `id` INT unsigned not null auto_increment , primary key (`id`), `class1` INT unsigned null , `class2` INT unsigned null , `class3` INT unsigned null , `class4` INT unsigned null , `category` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupIndexes('class_dictionary5', array('class1','class2','class3','class4'));


		// save MD5
		if($fp=@fopen(dirname(__FILE__).'/setup.md5', 'w')){
			fwrite($fp, $thisMD5);
			fclose($fp);
		}
	}


	function setupIndexes($tableName, $arrFields){
		if(!is_array($arrFields)){
			return false;
		}

		foreach($arrFields as $fieldName){
			if(!$res=@db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")){
				continue;
			}
			if(!$row=@db_fetch_assoc($res)){
				continue;
			}
			if($row['Key']==''){
				@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
			}
		}
	}


	function setupTable($tableName, $createSQL='', $silent=true, $arrAlter=''){
		global $Translation;
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)){
			$matches=array();
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/", $arrAlter[0], $matches)){
				$oldTableName=$matches[1];
			}
		}

		if($res=@db_query("select count(1) from `$tableName`")){ // table already exists
			if($row = @db_fetch_array($res)){
				echo str_replace("<TableName>", $tableName, str_replace("<NumRecords>", $row[0],$Translation["table exists"]));
				if(is_array($arrAlter)){
					echo '<br>';
					foreach($arrAlter as $alter){
						if($alter!=''){
							echo "$alter ... ";
							if(!@db_query($alter)){
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							}else{
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				}else{
					echo $Translation["table uptodate"];
				}
			}else{
				echo str_replace("<TableName>", $tableName, $Translation["couldnt count"]);
			}
		}else{ // given tableName doesn't exist

			if($oldTableName!=''){ // if we have a table rename query
				if($ro=@db_query("select count(1) from `$oldTableName`")){ // if old table exists, rename it.
					$renameQuery=array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)){
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					}else{
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				}else{ // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			}else{ // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)){
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				}else{
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}
		}

		echo "</div>";

		$out=ob_get_contents();
		ob_end_clean();
		if(!$silent){
			echo $out;
		}
	}
?>