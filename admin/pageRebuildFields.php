<?php
	$currDir = dirname(__FILE__);
	require("{$currDir}/incCommon.php");
	$GLOBALS['page_title'] = $Translation['view or rebuild fields'];
	include("{$currDir}/incHeader.php");

	/*
		$schema: [ tablename => [ fieldname => [ appgini => '...', 'db' => '...'], ... ], ... ]
	*/

	/* application schema as created in AppGini */
	$schema = array(   
		'biblio_community' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'com_name' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'biblio_author' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'memberID' => array('appgini' => 'VARCHAR(40) null unique '),
			'img' => array('appgini' => 'VARCHAR(40) null '),
			'groupID' => array('appgini' => 'VARCHAR(40) null '),
			'selection_class' => array('appgini' => 'INT unsigned null '),
			'agenttype1' => array('appgini' => 'INT(10) unsigned null '),
			'agenttype2' => array('appgini' => 'INT(10) unsigned null '),
			'gender' => array('appgini' => 'INT unsigned null '),
			'last_name' => array('appgini' => 'VARCHAR(40) null '),
			'first_name' => array('appgini' => 'VARCHAR(40) null '),
			'other_name' => array('appgini' => 'VARCHAR(40) null '),
			'birthday' => array('appgini' => 'DATETIME null '),
			'birth_location' => array('appgini' => 'VARCHAR(250) null '),
			'birth_location_map' => array('appgini' => 'VARCHAR(40) null '),
			'deathday' => array('appgini' => 'DATETIME null '),
			'death_location' => array('appgini' => 'VARCHAR(250) null '),
			'workplace' => array('appgini' => 'VARCHAR(250) null '),
			'knows' => array('appgini' => 'VARCHAR(250) null '),
			'shortbio' => array('appgini' => 'LONGTEXT null '),
			'data_evaluation' => array('appgini' => 'INT unsigned null '),
			'authority_record' => array('appgini' => 'VARCHAR(255) null '),
			'authority_organization' => array('appgini' => 'INT(10) unsigned null ')
		),
		'biblio_doc' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'img' => array('appgini' => 'VARCHAR(40) null '),
			'author_name' => array('appgini' => 'INT(10) unsigned null '),
			'author_id' => array('appgini' => 'INT(10) unsigned not null '),
			'type' => array('appgini' => 'INT(10) unsigned null '),
			'genre' => array('appgini' => 'INT(10) unsigned null '),
			'created' => array('appgini' => 'DATETIME null '),
			'published' => array('appgini' => 'DATETIME null '),
			'title' => array('appgini' => 'LONGTEXT not null '),
			'subtitle' => array('appgini' => 'LONGTEXT null '),
			'publisher' => array('appgini' => 'VARCHAR(40) null '),
			'location' => array('appgini' => 'VARCHAR(250) null '),
			'citation' => array('appgini' => 'TEXT null '),
			'description' => array('appgini' => 'TEXT null '),
			'source' => array('appgini' => 'VARCHAR(40) null '),
			'medium' => array('appgini' => 'VARCHAR(40) null '),
			'language' => array('appgini' => 'INT(10) unsigned null '),
			'format' => array('appgini' => 'VARCHAR(40) null '),
			'subject' => array('appgini' => 'TEXT null '),
			'rights' => array('appgini' => 'INT(10) unsigned null '),
			'rights_holder' => array('appgini' => 'VARCHAR(255) null '),
			'data_evaluation' => array('appgini' => 'INT unsigned null '),
			'authority_record' => array('appgini' => 'INT(10) unsigned null '),
			'authority_organization' => array('appgini' => 'INT(10) unsigned null '),
			'pdf_book' => array('appgini' => 'VARCHAR(255) null '),
			'ext_source' => array('appgini' => 'VARCHAR(255) null ')
		),
		'biblio_transcript' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'author' => array('appgini' => 'INT(10) unsigned null '),
			'author_memberID' => array('appgini' => 'INT(10) unsigned not null '),
			'bibliography_id' => array('appgini' => 'INT(10) unsigned null '),
			'bibliography_title' => array('appgini' => 'INT(10) unsigned not null '),
			'trascriber_memberID' => array('appgini' => 'VARCHAR(40) null '),
			'transcript_title' => array('appgini' => 'VARCHAR(250) not null '),
			'transcript' => array('appgini' => 'VARCHAR(40) not null '),
			'credits' => array('appgini' => 'VARCHAR(40) null '),
			'ip_rights' => array('appgini' => 'INT(10) unsigned not null ')
		),
		'biblio_token' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'author_id' => array('appgini' => 'INT(10) unsigned not null '),
			'author_name' => array('appgini' => 'INT(10) unsigned null '),
			'bibliography' => array('appgini' => 'INT(10) unsigned not null '),
			'transcript' => array('appgini' => 'INT(10) unsigned not null '),
			'token_sequence' => array('appgini' => 'INT(11) null '),
			'token' => array('appgini' => 'LONGTEXT null ')
		),
		'code_invivo' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'author' => array('appgini' => 'INT(10) unsigned null '),
			'bibliography' => array('appgini' => 'INT(10) unsigned null '),
			'transcript' => array('appgini' => 'INT(10) unsigned null '),
			'token_sequence' => array('appgini' => 'INT(10) unsigned null '),
			'token' => array('appgini' => 'INT(10) unsigned null '),
			'invivo' => array('appgini' => 'LONGTEXT null '),
			'start_date' => array('appgini' => 'DATETIME null '),
			'end_date' => array('appgini' => 'DATETIME null '),
			'person' => array('appgini' => 'VARCHAR(255) null '),
			'place' => array('appgini' => 'VARCHAR(40) null '),
			'freecode' => array('appgini' => 'LONGTEXT null ')
		),
		'code_herme' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'author_id' => array('appgini' => 'INT(10) unsigned null '),
			'author_name' => array('appgini' => 'INT(10) unsigned null '),
			'bibliography' => array('appgini' => 'INT(10) unsigned null '),
			'transcript' => array('appgini' => 'INT(10) unsigned null '),
			'token_sequence' => array('appgini' => 'INT(10) unsigned null '),
			'token' => array('appgini' => 'INT(10) unsigned null '),
			'hermeneutic' => array('appgini' => 'TEXT null '),
			'impression' => array('appgini' => 'INT(10) unsigned null '),
			'noetictension' => array('appgini' => 'INT(10) unsigned null '),
			'quadrilemma' => array('appgini' => 'BLOB null '),
			'pc' => array('appgini' => 'INT unsigned null '),
			'freecode' => array('appgini' => 'LONGTEXT null ')
		),
		'chr_dev' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'agent_id' => array('appgini' => 'INT(10) unsigned null '),
			'agent_name' => array('appgini' => 'INT(10) unsigned null '),
			'cw_name' => array('appgini' => 'VARCHAR(40) null '),
			'img' => array('appgini' => 'VARCHAR(40) null '),
			'dp_resolve' => array('appgini' => 'INT unsigned null '),
			'mc_resolve' => array('appgini' => 'INT unsigned null '),
			'illust_resolve' => array('appgini' => 'INT(10) unsigned null '),
			'mc_growth' => array('appgini' => 'TEXT null '),
			'illust_growth' => array('appgini' => 'INT(10) unsigned null '),
			'mc_approach' => array('appgini' => 'TEXT null '),
			'illust_approach' => array('appgini' => 'INT(10) unsigned null '),
			'mc_ps_style' => array('appgini' => 'TEXT null '),
			'illust_ps_style' => array('appgini' => 'INT(10) unsigned null '),
			'cw_age' => array('appgini' => 'VARCHAR(40) null '),
			'cw_gender' => array('appgini' => 'INT(10) unsigned null '),
			'cw_communication_style' => array('appgini' => 'TEXT null '),
			'cw_background' => array('appgini' => 'TEXT null '),
			'cw_appearance' => array('appgini' => 'TEXT null '),
			'cw_relationships' => array('appgini' => 'VARCHAR(255) null '),
			'cw_ambition' => array('appgini' => 'TEXT null '),
			'cw_defects' => array('appgini' => 'TEXT null '),
			'cw_thoughts' => array('appgini' => 'TEXT null '),
			'cw_relatedness' => array('appgini' => 'VARCHAR(255) null '),
			'cw_restrictions' => array('appgini' => 'TEXT null '),
			'locations' => array('appgini' => 'VARCHAR(255) null '),
			'persons' => array('appgini' => 'VARCHAR(255) null '),
			'events' => array('appgini' => 'TEXT null '),
			'noetictension' => array('appgini' => 'INT(10) unsigned null '),
			'illust_nt' => array('appgini' => 'INT(10) unsigned null '),
			'impression' => array('appgini' => 'INT(10) unsigned null '),
			'illust_im' => array('appgini' => 'INT(10) unsigned null '),
			'mcs_problem' => array('appgini' => 'INT(10) unsigned null '),
			'illust_mcs_problem' => array('appgini' => 'INT(10) unsigned null '),
			'mcs_solution' => array('appgini' => 'INT(10) unsigned null '),
			'illust_mcs_solution' => array('appgini' => 'INT(10) unsigned null '),
			'mcs_symptom' => array('appgini' => 'INT(10) unsigned null '),
			'illust_mcs_symptom' => array('appgini' => 'INT(10) unsigned null '),
			'mcs_response' => array('appgini' => 'INT(10) unsigned null '),
			'illust_mcs_response' => array('appgini' => 'INT(10) unsigned null ')
		),
		'chr_scenes' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'author_id' => array('appgini' => 'INT(10) unsigned null '),
			'author_name' => array('appgini' => 'INT(10) unsigned null '),
			'bibliography' => array('appgini' => 'INT(10) unsigned null '),
			'transcript' => array('appgini' => 'INT(10) unsigned null '),
			'token_sequence' => array('appgini' => 'INT(10) unsigned null '),
			'token' => array('appgini' => 'INT(10) unsigned null '),
			'invivo_code' => array('appgini' => 'INT(10) unsigned null '),
			'startdate' => array('appgini' => 'INT(10) unsigned null default \'1\' '),
			'enddate' => array('appgini' => 'INT(10) unsigned null default \'1\' '),
			'person' => array('appgini' => 'INT(10) unsigned null '),
			'place' => array('appgini' => 'INT(10) unsigned null '),
			'herme_code' => array('appgini' => 'INT(10) unsigned null '),
			'impression' => array('appgini' => 'INT(10) unsigned null '),
			'noetictension' => array('appgini' => 'INT(10) unsigned null '),
			'pc' => array('appgini' => 'INT(10) unsigned null '),
			'chr_element' => array('appgini' => 'INT(10) unsigned null '),
			'comment' => array('appgini' => 'TEXT null '),
			'illustration' => array('appgini' => 'TEXT null '),
			'scene' => array('appgini' => 'LONGTEXT null ')
		),
		'code_encounter_scenes' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'scene' => array('appgini' => 'TEXT null ')
		),
		'code_encounters' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'authorA' => array('appgini' => 'INT(10) unsigned null '),
			'author_nameA' => array('appgini' => 'INT(10) unsigned null '),
			'bibliographyA' => array('appgini' => 'INT(10) unsigned null '),
			'transcriptA' => array('appgini' => 'INT(10) unsigned null '),
			'tokenA' => array('appgini' => 'INT(10) unsigned null '),
			'sceneA' => array('appgini' => 'INT(10) unsigned null '),
			'authorB' => array('appgini' => 'INT(10) unsigned null '),
			'authornameB' => array('appgini' => 'INT(10) unsigned null '),
			'bibliographyB' => array('appgini' => 'INT(10) unsigned null '),
			'transcriptB' => array('appgini' => 'INT(10) unsigned null '),
			'tokenB' => array('appgini' => 'INT(10) unsigned null '),
			'sceneB' => array('appgini' => 'INT(10) unsigned null '),
			'type' => array('appgini' => 'VARCHAR(40) null '),
			'conflicttype' => array('appgini' => 'VARCHAR(40) null '),
			'story_scene' => array('appgini' => 'INT(10) unsigned null '),
			'nd_color' => array('appgini' => 'INT(10) unsigned null '),
			'nd_width' => array('appgini' => 'VARCHAR(40) null '),
			'nd_style' => array('appgini' => 'VARCHAR(40) null '),
			'nd_opacity' => array('appgini' => 'VARCHAR(40) null '),
			'nd_visibility' => array('appgini' => 'VARCHAR(40) null '),
			'lbl_lable' => array('appgini' => 'VARCHAR(40) null '),
			'lbl_color' => array('appgini' => 'VARCHAR(40) null '),
			'lbl_size' => array('appgini' => 'VARCHAR(40) null ')
		),
		'story' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'com_name' => array('appgini' => 'INT(10) unsigned null '),
			'project_leader' => array('appgini' => 'VARCHAR(40) null '),
			'subject' => array('appgini' => 'VARCHAR(40) null '),
			'story' => array('appgini' => 'VARCHAR(250) null '),
			'approach' => array('appgini' => 'VARCHAR(40) null '),
			'tags' => array('appgini' => 'VARCHAR(80) null '),
			'collaboration_status' => array('appgini' => 'INT unsigned null ')
		),
		'storylines' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'story' => array('appgini' => 'INT(10) unsigned null '),
			'story_act' => array('appgini' => 'INT unsigned null '),
			'character' => array('appgini' => 'INT(10) unsigned null '),
			'role' => array('appgini' => 'INT(10) unsigned null '),
			'storyline_no' => array('appgini' => 'VARCHAR(40) null '),
			'parenthetic' => array('appgini' => 'VARCHAR(40) null '),
			'storyline_title' => array('appgini' => 'VARCHAR(40) null '),
			'storyline' => array('appgini' => 'LONGTEXT null '),
			'notes' => array('appgini' => 'TEXT null '),
			'storyweaving_scene_no' => array('appgini' => 'INT(10) unsigned null '),
			'storyweaving_scene' => array('appgini' => 'INT(10) unsigned null '),
			'storyweaving_sequence' => array('appgini' => 'INT(10) unsigned null '),
			'storyweaving_theme' => array('appgini' => 'INT(10) unsigned null '),
			'characterevent_scene' => array('appgini' => 'INT(10) unsigned null '),
			'character_event' => array('appgini' => 'INT(10) unsigned null ')
		),
		'story_chrs' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'agent_id' => array('appgini' => 'INT(10) unsigned null '),
			'agent_name' => array('appgini' => 'INT(10) unsigned null '),
			'character' => array('appgini' => 'INT(10) unsigned null '),
			'role' => array('appgini' => 'VARCHAR(40) null '),
			'story_character' => array('appgini' => 'INT unsigned null '),
			'story' => array('appgini' => 'INT(10) unsigned null '),
			'story_archetype' => array('appgini' => 'INT(10) unsigned null '),
			'comment' => array('appgini' => 'TEXT null ')
		),
		'storystatic' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'story' => array('appgini' => 'INT(10) unsigned null '),
			'throughline' => array('appgini' => 'INT(10) unsigned null '),
			'story_character_mc' => array('appgini' => 'INT(10) unsigned null '),
			'throughline_domain' => array('appgini' => 'INT(10) unsigned null '),
			'concern' => array('appgini' => 'INT(10) unsigned null '),
			'issue' => array('appgini' => 'INT(10) unsigned null '),
			'problem' => array('appgini' => 'INT(10) unsigned null '),
			'solution' => array('appgini' => 'INT(10) unsigned null '),
			'symptom' => array('appgini' => 'INT(10) unsigned null '),
			'response' => array('appgini' => 'INT(10) unsigned null '),
			'catalyst' => array('appgini' => 'INT(10) unsigned null '),
			'inhibitor' => array('appgini' => 'INT(10) unsigned null '),
			'benchmark' => array('appgini' => 'INT(10) unsigned null '),
			'signpost1' => array('appgini' => 'INT(10) unsigned null '),
			'signpost2' => array('appgini' => 'INT(10) unsigned null '),
			'signpost3' => array('appgini' => 'INT(10) unsigned null '),
			'signpost4' => array('appgini' => 'INT(10) unsigned null ')
		),
		'storydynamic' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'story' => array('appgini' => 'INT(10) unsigned null '),
			'agent' => array('appgini' => 'INT(10) unsigned null '),
			'story_dev_chr' => array('appgini' => 'INT(10) unsigned null '),
			'storystatic_ost' => array('appgini' => 'INT(10) unsigned null '),
			'storystatic_chr_mc' => array('appgini' => 'INT(10) unsigned null '),
			'mc_problem' => array('appgini' => 'INT(10) unsigned null '),
			'mc_resolve' => array('appgini' => 'INT unsigned null '),
			'mc_growth' => array('appgini' => 'INT(10) unsigned null '),
			'mc_approach' => array('appgini' => 'INT(10) unsigned null '),
			'mc_ps_style' => array('appgini' => 'INT(10) unsigned null '),
			'ic_resolve' => array('appgini' => 'VARCHAR(40) null '),
			'os_driver' => array('appgini' => 'VARCHAR(40) null '),
			'os_limit' => array('appgini' => 'VARCHAR(40) null '),
			'os_outcome' => array('appgini' => 'VARCHAR(40) null '),
			'os_judgement' => array('appgini' => 'VARCHAR(40) null '),
			'os_goal_domain' => array('appgini' => 'INT(10) unsigned null '),
			'os_goal_concern' => array('appgini' => 'INT(10) unsigned null '),
			'os_consequence_domain' => array('appgini' => 'INT(10) unsigned null '),
			'os_consequence_concern' => array('appgini' => 'INT(10) unsigned null '),
			'os_cost_domain' => array('appgini' => 'INT(10) unsigned null '),
			'os_cost_concern' => array('appgini' => 'INT(10) unsigned null '),
			'os_dividend_domain' => array('appgini' => 'INT(10) unsigned null '),
			'os_dividend_concern' => array('appgini' => 'INT(10) unsigned null '),
			'os_requirements_domain' => array('appgini' => 'INT(10) unsigned null '),
			'os_requirements_concern' => array('appgini' => 'INT(10) unsigned null '),
			'os_prerequesites_domain' => array('appgini' => 'INT(10) unsigned null '),
			'os_prerequesites_concern' => array('appgini' => 'INT(10) unsigned null '),
			'os_preconditions_domain' => array('appgini' => 'INT(10) unsigned null '),
			'os_preconditions_concern' => array('appgini' => 'INT(10) unsigned null '),
			'os_forewarnings_domain' => array('appgini' => 'INT(10) unsigned null '),
			'os_forewarnings_concern' => array('appgini' => 'INT(10) unsigned null ')
		),
		'storyweaving_scenes' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'story' => array('appgini' => 'INT(10) unsigned null '),
			'step' => array('appgini' => 'INT unsigned null '),
			'throughline' => array('appgini' => 'INT(10) unsigned null '),
			'domain' => array('appgini' => 'INT(10) unsigned null '),
			'concern' => array('appgini' => 'INT(10) unsigned null '),
			'issue' => array('appgini' => 'INT(10) unsigned null '),
			'theme' => array('appgini' => 'INT(10) unsigned null '),
			'sequence' => array('appgini' => 'VARCHAR(40) null ')
		),
		'class_agent_selection' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'selection_phase' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_agent_type1' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'type' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_agent_type2' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'type' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_gender' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'gender' => array('appgini' => 'VARCHAR(40) null ')
		),
		'class_authority_agent' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'abbreviation' => array('appgini' => 'VARCHAR(40) null '),
			'authority_name' => array('appgini' => 'VARCHAR(250) null ')
		),
		'class_evaluation' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'evaluation_type' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_bibliography_type' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'type' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_bibliography_genre' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'genre' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_authority_library' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'abbreviation' => array('appgini' => 'VARCHAR(40) null '),
			'authority_name' => array('appgini' => 'VARCHAR(80) null ')
		),
		'class_rights' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'right' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null '),
			'certification' => array('appgini' => 'VARCHAR(40) null ')
		),
		'class_language' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'short' => array('appgini' => 'VARCHAR(40) null '),
			'language' => array('appgini' => 'VARCHAR(40) null ')
		),
		'class_story_collab_type' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'collab_type' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_story_acts' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'act' => array('appgini' => 'VARCHAR(40) null ')
		),
		'class_story_path' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'path' => array('appgini' => 'VARCHAR(40) null '),
			'topic' => array('appgini' => 'VARCHAR(40) null ')
		),
		'class_dramatica_steps' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'step' => array('appgini' => 'VARCHAR(40) null '),
			'type' => array('appgini' => 'VARCHAR(40) null '),
			'act' => array('appgini' => 'INT unsigned null ')
		),
		'class_dramatica_throughline' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'throughline' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_dramatica_signpost' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'signpost' => array('appgini' => 'VARCHAR(40) null ')
		),
		'class_dramatica_domain' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'domain' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_dramatica_concern' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'domain' => array('appgini' => 'INT(10) unsigned null '),
			'concern' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_dramatica_issue' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'domain' => array('appgini' => 'INT(10) unsigned null '),
			'concern' => array('appgini' => 'INT(10) unsigned null '),
			'issue' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_dramatica_themes' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'domain' => array('appgini' => 'INT(10) unsigned null '),
			'concern' => array('appgini' => 'INT(10) unsigned null '),
			'issue' => array('appgini' => 'INT(10) unsigned null '),
			'theme' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_dramatica_archetype' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'archetype' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_dramatica_character' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'character' => array('appgini' => 'VARCHAR(40) null '),
			'definition' => array('appgini' => 'VARCHAR(40) null ')
		),
		'class_character_element' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'element' => array('appgini' => 'VARCHAR(40) null '),
			'value' => array('appgini' => 'VARCHAR(40) null ')
		),
		'class_dramatica_storypoints1' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'term' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_dramatica_storypoints2' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'cat1' => array('appgini' => 'INT unsigned null '),
			'term' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_dramatica_storypoints3' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'cat1' => array('appgini' => 'INT unsigned null '),
			'cat2' => array('appgini' => 'INT unsigned null '),
			'term' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_dynamicstorypoints' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'term' => array('appgini' => 'VARCHAR(40) null '),
			'value' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null '),
			'cat1' => array('appgini' => 'INT unsigned null '),
			'cat2' => array('appgini' => 'INT unsigned null '),
			'cat3' => array('appgini' => 'INT unsigned null ')
		),
		'class_im' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'impression' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null '),
			'category' => array('appgini' => 'TEXT null ')
		),
		'class_pc' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'perform_contrad' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'class_nt' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'noetictension' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'dictionary' => array(   
			'id' => array('appgini' => 'INT(10) unsigned not null primary key auto_increment '),
			'term' => array('appgini' => 'VARCHAR(40) null '),
			'definition' => array('appgini' => 'TEXT null ')
		),
		'class_dictionary1' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'category' => array('appgini' => 'VARCHAR(40) null ')
		),
		'class_dictionary2' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'class1' => array('appgini' => 'INT unsigned null '),
			'category' => array('appgini' => 'VARCHAR(40) null ')
		),
		'class_dictionary3' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'class1' => array('appgini' => 'INT unsigned null '),
			'class2' => array('appgini' => 'INT unsigned null '),
			'category' => array('appgini' => 'VARCHAR(40) null ')
		),
		'class_dictionary4' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'class1' => array('appgini' => 'INT unsigned null '),
			'class2' => array('appgini' => 'INT unsigned null '),
			'class3' => array('appgini' => 'INT unsigned null '),
			'category' => array('appgini' => 'VARCHAR(40) null ')
		),
		'class_dictionary5' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'class1' => array('appgini' => 'INT unsigned null '),
			'class2' => array('appgini' => 'INT unsigned null '),
			'class3' => array('appgini' => 'INT unsigned null '),
			'class4' => array('appgini' => 'INT unsigned null '),
			'category' => array('appgini' => 'VARCHAR(40) null ')
		)
	);

	$table_captions = getTableList();

	/* function for preparing field definition for comparison */
	function prepare_def($def) {
		$def = strtolower($def);

		/* ignore 'null' */
		$def = preg_replace('/\s+not\s+null\s*/', '%%NOT_NULL%%', $def);
		$def = preg_replace('/\s+null\s*/', ' ', $def);
		$def = str_replace('%%NOT_NULL%%', ' not null ', $def);

		/* ignore length for int data types */
		$def = preg_replace('/int\s*\([0-9]+\)/', 'int', $def);

		/* make sure there is always a space before mysql words */
		$def = preg_replace('/(\S)(unsigned|not null|binary|zerofill|auto_increment|default)/', '$1 $2', $def);

		/* treat 0.000.. same as 0 */
		$def = preg_replace('/([0-9])*\.0+/', '$1', $def);

		/* treat unsigned zerofill same as zerofill */
		$def = str_ireplace('unsigned zerofill', 'zerofill', $def);

		/* ignore zero-padding for date data types */
		$def = preg_replace("/date\s*default\s*'([0-9]{4})-0?([1-9])-0?([1-9])'/", "date default '$1-$2-$3'", $def);

		return trim($def);
	}

	/**
	 *  @brief creates/fixes given field according to given schema
	 *  @return integer: 0 = error, 1 = field updated, 2 = field created
	 */
	function fix_field($fix_table, $fix_field, $schema, &$qry) {
		if(!isset($schema[$fix_table][$fix_field])) return 0;

		$def = $schema[$fix_table][$fix_field];
		$field_added = $field_updated = false;
		$eo['silentErrors'] = true;

		// field exists?
		$res = sql("show columns from `{$fix_table}` like '{$fix_field}'", $eo);
		if($row = db_fetch_assoc($res)){
			// modify field
			$qry = "alter table `{$fix_table}` modify `{$fix_field}` {$def['appgini']}";
			sql($qry, $eo);

			// remove unique from db if necessary
			if($row['Key'] == 'UNI' && !stripos($def['appgini'], ' unique')){
				// retrieve unique index name
				$res_unique = sql("show index from `{$fix_table}` where Column_name='{$fix_field}' and Non_unique=0", $eo);
				if($row_unique = db_fetch_assoc($res_unique)){
					$qry_unique = "drop index `{$row_unique['Key_name']}` on `{$fix_table}`";
					sql($qry_unique, $eo);
					$qry .= ";\n{$qry_unique}";
				}
			}

			return 1;
		}

		// missing field is defined as PK and table has another PK field?
		$current_pk = getPKFieldName($fix_table);
		if(stripos($def['appgini'], 'primary key') !== false && $current_pk !== false) {
			// if current PK is not another AppGini-defined field, then rename it.
			if(!isset($schema[$fix_table][$current_pk])) {
				// no need to include 'primary key' in definition since it's already a PK field
				$redef = str_ireplace(' primary key', '', $def['appgini']);
				$qry = "alter table `{$fix_table}` change `{$current_pk}` `{$fix_field}` {$redef}";
				sql($qry, $eo);
				return 1;
			}

			// current PK field is another AppGini-defined field
			// this happens if table had a PK field in AppGini then it was unset as PK
			// and another field was created and set as PK
			// in that case, drop PK index from current PK
			// and also remove auto_increment from it if defined
			// then proceed to creating the missing PK field
			$pk_def = str_ireplace(' auto_increment', '', $schema[$fix_table][$current_pk]);
			sql("alter table `{$fix_table}` modify `{$current_pk}` {$pk_def}", $eo);
		}

		// create field
		$qry = "alter table `{$fix_table}` add column `{$fix_field}` {$def['appgini']}";
		sql($qry, $eo);
		return 2;
	}

	/* process requested fixes */
	$fix_table = (isset($_GET['t']) ? $_GET['t'] : false);
	$fix_field = (isset($_GET['f']) ? $_GET['f'] : false);
	$fix_all = (isset($_GET['all']) ? true : false);

	if($fix_field && $fix_table) $fix_status = fix_field($fix_table, $fix_field, $schema, $qry);

	/* retrieve actual db schema */
	foreach($table_captions as $tn => $tc){
		$eo['silentErrors'] = true;
		$res = sql("show columns from `{$tn}`", $eo);
		if($res){
			while($row = db_fetch_assoc($res)){
				if(!isset($schema[$tn][$row['Field']]['appgini'])) continue;
				$field_description = strtoupper(str_replace(' ', '', $row['Type']));
				$field_description = str_ireplace('unsigned', ' unsigned', $field_description);
				$field_description = str_ireplace('zerofill', ' zerofill', $field_description);
				$field_description = str_ireplace('binary', ' binary', $field_description);
				$field_description .= ($row['Null'] == 'NO' ? ' not null' : '');
				$field_description .= ($row['Key'] == 'PRI' ? ' primary key' : '');
				$field_description .= ($row['Key'] == 'UNI' ? ' unique' : '');
				$field_description .= ($row['Default'] != '' ? " default '" . makeSafe($row['Default']) . "'" : '');
				$field_description .= ($row['Extra'] == 'auto_increment' ? ' auto_increment' : '');

				$schema[$tn][$row['Field']]['db'] = '';
				if(isset($schema[$tn][$row['Field']])){
					$schema[$tn][$row['Field']]['db'] = $field_description;
				}
			}
		}
	}

	/* handle fix_all request */
	if($fix_all){
		foreach($schema as $tn => $fields){
			foreach($fields as $fn => $fd){
				if(prepare_def($fd['appgini']) == prepare_def($fd['db'])) continue;
				fix_field($tn, $fn, $schema, $qry);
			}
		}

		redirect('admin/pageRebuildFields.php');
		exit;
	}
?>

<?php if($fix_status == 1 || $fix_status == 2){ ?>
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<i class="glyphicon glyphicon-info-sign"></i>
		<?php 
			$originalValues = array('<ACTION>', '<FIELD>', '<TABLE>', '<QUERY>');
			$action = ($fix_status == 2 ? 'create' : 'update');
			$replaceValues = array($action, $fix_field, $fix_table, $qry);
			echo str_replace($originalValues, $replaceValues, $Translation['create or update table']);
		?>
	</div>
<?php } ?>

<div class="page-header"><h1>
	<?php echo $Translation['view or rebuild fields'] ; ?>
	<button type="button" class="btn btn-default" id="show_deviations_only"><i class="glyphicon glyphicon-eye-close"></i> <?php echo $Translation['show deviations only'] ; ?></button>
	<button type="button" class="btn btn-default hidden" id="show_all_fields"><i class="glyphicon glyphicon-eye-open"></i> <?php echo $Translation['show all fields'] ; ?></button>
</h1></div>

<p class="lead"><?php echo $Translation['compare tables page'] ; ?></p>

<div class="alert summary"></div>
<table class="table table-responsive table-hover table-striped">
	<thead><tr>
		<th></th>
		<th><?php echo $Translation['field'] ; ?></th>
		<th><?php echo $Translation['AppGini definition'] ; ?></th>
		<th><?php echo $Translation['database definition'] ; ?></th>
		<th id="fix_all"></th>
	</tr></thead>

	<tbody>
	<?php foreach($schema as $tn => $fields){ ?>
		<tr class="text-info"><td colspan="5"><h4 data-placement="left" data-toggle="tooltip" title="<?php echo str_replace ( "<TABLENAME>" , $tn , $Translation['table name title']) ; ?>"><i class="glyphicon glyphicon-th-list"></i> <?php echo $table_captions[$tn]; ?></h4></td></tr>
		<?php foreach($fields as $fn => $fd){ ?>
			<?php $diff = ((prepare_def($fd['appgini']) == prepare_def($fd['db'])) ? false : true); ?>
			<?php $no_db = ($fd['db'] ? false : true); ?>
			<tr class="<?php echo ($diff ? 'warning' : 'field_ok'); ?>">
				<td><i class="glyphicon glyphicon-<?php echo ($diff ? 'remove text-danger' : 'ok text-success'); ?>"></i></td>
				<td><?php echo $fn; ?></td>
				<td class="<?php echo ($diff ? 'bold text-success' : ''); ?>"><?php echo $fd['appgini']; ?></td>
				<td class="<?php echo ($diff ? 'bold text-danger' : ''); ?>"><?php echo thisOr($fd['db'], $Translation['does not exist']); ?></td>
				<td>
					<?php if($diff && $no_db){ ?>
						<a href="pageRebuildFields.php?t=<?php echo $tn; ?>&f=<?php echo $fn; ?>" class="btn btn-success btn-xs btn_create" data-toggle="tooltip" data-placement="top" title="<?php echo $Translation['create field'] ; ?>"><i class="glyphicon glyphicon-plus"></i> <?php echo $Translation['create it'] ; ?></a>
					<?php }elseif($diff){ ?>
						<a href="pageRebuildFields.php?t=<?php echo $tn; ?>&f=<?php echo $fn; ?>" class="btn btn-warning btn-xs btn_update" data-toggle="tooltip" title="<?php echo $Translation['fix field'] ; ?>"><i class="glyphicon glyphicon-cog"></i> <?php echo $Translation['fix it'] ; ?></a>
					<?php } ?>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	</tbody>
</table>
<div class="alert summary"></div>

<style>
	.bold{ font-weight: bold; }
	[data-toggle="tooltip"]{ display: block !important; }
</style>

<script>
	$j(function(){
		$j('[data-toggle="tooltip"]').tooltip();

		$j('#show_deviations_only').click(function(){
			$j(this).addClass('hidden');
			$j('#show_all_fields').removeClass('hidden');
			$j('.field_ok').hide();
		});

		$j('#show_all_fields').click(function(){
			$j(this).addClass('hidden');
			$j('#show_deviations_only').removeClass('hidden');
			$j('.field_ok').show();
		});

		$j('.btn_update, #fix_all').click(function(){
			return confirm("<?php echo $Translation['field update warning'] ; ?>");
		});

		var count_updates = $j('.btn_update').length;
		var count_creates = $j('.btn_create').length;
		if(!count_creates && !count_updates){
			$j('.summary').addClass('alert-success').html("<?php echo $Translation['no deviations found'] ; ?>");
		}else{
			var fieldsCount = "<?php echo $Translation['error fields']; ?>";
			fieldsCount = fieldsCount.replace(/<CREATENUM>/, count_creates ).replace(/<UPDATENUM>/, count_updates);


			$j('.summary')
				.addClass('alert-warning')
				.html(
					fieldsCount + 
					'<br><br>' + 
					'<a href="pageBackupRestore.php" class="alert-link">' +
						'<b><?php echo addslashes($Translation['backup before fix']); ?></b>' +
					'</a>'
				);

			$j('<a href="pageRebuildFields.php?all=1" class="btn btn-danger btn-block"><i class="glyphicon glyphicon-cog"></i> <?php echo addslashes($Translation['fix all']); ?></a>').appendTo('#fix_all');
		}
	});
</script>

<?php
	include("{$currDir}/incFooter.php");
?>
