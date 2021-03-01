<?php

	#########################################################
	/*
	~~~~~~ LIST OF FUNCTIONS ~~~~~~
		getTableList() -- returns an associative array (tableName => tableData, tableData is array(tableCaption, tableDescription, tableIcon)) of tables accessible by current user
		get_table_groups() -- returns an associative array (table_group => tables_array)
		logInMember() -- checks POST login. If not valid, redirects to index.php, else returns TRUE
		getTablePermissions($tn) -- returns an array of permissions allowed for logged member to given table (allowAccess, allowInsert, allowView, allowEdit, allowDelete) -- allowAccess is set to true if any access level is allowed
		get_sql_fields($tn) -- returns the SELECT part of the table view query
		get_sql_from($tn[, true, [, false]]) -- returns the FROM part of the table view query, with full joins (unless third paramaeter is set to true), optionally skipping permissions if true passed as 2nd param.
		get_joined_record($table, $id[, true]) -- returns assoc array of record values for given PK value of given table, with full joins, optionally skipping permissions if true passed as 3rd param.
		get_defaults($table) -- returns assoc array of table fields as array keys and default values (or empty), excluding automatic values as array values
		htmlUserBar() -- returns html code for displaying user login status to be used on top of pages.
		showNotifications($msg, $class) -- returns html code for displaying a notification. If no parameters provided, processes the GET request for possible notifications.
		parseMySQLDate(a, b) -- returns a if valid mysql date, or b if valid mysql date, or today if b is true, or empty if b is false.
		parseCode(code) -- calculates and returns special values to be inserted in automatic fields.
		addFilter(i, filterAnd, filterField, filterOperator, filterValue) -- enforce a filter over data
		clearFilters() -- clear all filters
		loadView($view, $data) -- passes $data to templates/{$view}.php and returns the output
		loadTable($table, $data) -- loads table template, passing $data to it
		filterDropdownBy($filterable, $filterers, $parentFilterers, $parentPKField, $parentCaption, $parentTable, &$filterableCombo) -- applies cascading drop-downs for a lookup field, returns js code to be inserted into the page
		br2nl($text) -- replaces all variations of HTML <br> tags with a new line character
		htmlspecialchars_decode($text) -- inverse of htmlspecialchars()
		entitiesToUTF8($text) -- convert unicode entities (e.g. &#1234;) to actual UTF8 characters, requires multibyte string PHP extension
		func_get_args_byref() -- returns an array of arguments passed to a function, by reference
		permissions_sql($table, $level) -- returns an array containing the FROM and WHERE additions for applying permissions to an SQL query
		error_message($msg[, $back_url]) -- returns html code for a styled error message .. pass explicit false in second param to suppress back button
		toMySQLDate($formattedDate, $sep = datalist_date_separator, $ord = datalist_date_format)
		reIndex(&$arr) -- returns a copy of the given array, with keys replaced by 1-based numeric indices, and values replaced by original keys
		get_embed($provider, $url[, $width, $height, $retrieve]) -- returns embed code for a given url (supported providers: youtube, googlemap)
		check_record_permission($table, $id, $perm = 'view') -- returns true if current user has the specified permission $perm ('view', 'edit' or 'delete') for the given recors, false otherwise
		NavMenus($options) -- returns the HTML code for the top navigation menus. $options is not implemented currently.
		StyleSheet() -- returns the HTML code for included style sheet files to be placed in the <head> section.
		getUploadDir($dir) -- if dir is empty, returns upload dir configured in defaultLang.php, else returns $dir.
		PrepareUploadedFile($FieldName, $MaxSize, $FileTypes='jpg|jpeg|gif|png', $NoRename=false, $dir="") -- validates and moves uploaded file for given $FieldName into the given $dir (or the default one if empty)
		get_home_links($homeLinks, $default_classes, $tgroup) -- process $homeLinks array and return custom links for homepage. Applies $default_classes to links if links have classes defined, and filters links by $tgroup (using '*' matches all table_group values)
		quick_search_html($search_term, $label, $separate_dv = true) -- returns HTML code for the quick search box.
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	*/

	#########################################################

	function getTableList($skip_authentication = false){
		$arrAccessTables = array();
		$arrTables = array(
			/* 'table_name' => ['table caption', 'homepage description', 'icon', 'table group name'] */   
			'biblio_community' => array('I.1. Communities', 'First we look for covenant communities, communities whose shared narrative linkes their material existence with a transcendent experience.', 'resources/table_icons/tower.png', 'I. Data Sampling'),
			'biblio_author' => array('I.2. Authors', 'At sampling level II, collect all the authors of autobiographical texts, as well as related persons, here, with an emergent sampling strategy.', 'resources/table_icons/user_edit.png', 'I. Data Sampling'),
			'biblio_doc' => array('I.3. Corpus', 'At level III, collect autobiographical writings as part of the text corpus.', 'resources/table_icons/books.png', 'I. Data Sampling'),
			'biblio_transcript' => array('II.1. Transcripts', 'Part of the preparation requires to transcribe all handwritten manuscrips, and to make all text avaible for OCR.', 'resources/table_icons/book_edit.png', 'II. Data Preparation'),
			'biblio_token' => array('II.2. Tokens', 'After transcription, the data are ready to be tokenized. Use Voyant Tools for this purpose.', 'resources/table_icons/book_key.png', 'II. Data Preparation'),
			'code_invivo' => array('III.1. Invivo', 'Start encoding the data based on invivo; dates, places, names.', 'resources/table_icons/book_link.png', 'III. Data Encoding'),
			'code_herme' => array('III.2. Hermeneutic', 'Based on the use of language and the context, encode the impression management and noetic interpretation.', 'resources/table_icons/book_next.png', 'III. Data Encoding'),
			'chr_dev' => array('IV.1. Character Dev.', 'Convert some of the authors in characters for the story you are telling.<br>Use character creation tools such as Dramatica Pro Character Builder to assign Elements in the correct way.', 'resources/table_icons/private.png', 'IV. Drama Encoding'),
			'chr_scenes' => array('IV.2. Character scenes', 'Take part of the authentic text and convert it in character scenes.', 'resources/table_icons/camera.png', 'IV. Drama Encoding'),
			'code_encounter_scenes' => array('IV.4. Encounter scenes', 'Select special scenes in which characters encounter with others.', 'resources/table_icons/comments.png', 'IV. Drama Encoding'),
			'code_encounters' => array('IV.5. Encounters', 'Combine encounter scenes of different characters into a one-to-one encounter.', 'resources/table_icons/arrow_refresh.png', 'IV. Drama Encoding'),
			'story' => array('V.1. Stories', 'This is your final story, which can be analysed and compared.', 'resources/table_icons/butterfly.png', 'V. Storyforming'),
			'storylines' => array('V.3. Story lines', 'Weave your story along a story line.', 'resources/table_icons/chart_curve_edit.png', 'V. Storyforming'),
			'story_chrs' => array('V.2. Characters', 'Encode a characters role within a story context.', 'resources/table_icons/map_edit.png', 'V. Storyforming'),
			'storystatic' => array('VI.1. Static story points', 'Encode static story points.<br>They are also known  as static plot points and remain the same throughout an entire story.', 'resources/table_icons/application_view_tile.png', 'VI. Analysis'),
			'storydynamic' => array('VI.2. Dynamic story points', 'Encode the story dynamic base on Dramatica.<br>They are the dynamic forces that will act upon the dramatic potentials to change the relationship between characters, change the course of the plot and develop the theme as the story unfolds.', 'resources/table_icons/areachart.png', 'VI. Analysis'),
			'storyweaving_scenes' => array('VI.3. Story weaving scenes', 'Create scenes for further story weaving.', 'resources/table_icons/layers_map.png', 'VI. Analysis'),
			'class_agent_selection' => array('Agent selection phase', 'The phase of the selection process this agent belong to and the strategy used.', 'table.gif', 'Library Codes'),
			'class_agent_type1' => array('Agent type 1', 'Use this category for strategic sampling groups.', 'resources/table_icons/group_key.png', 'Library Codes'),
			'class_agent_type2' => array('Agent type 2', 'Use this category for strategic sampling groups.', 'resources/table_icons/group_key.png', 'Library Codes'),
			'class_gender' => array('Gender', '', 'table.gif', 'Library Codes'),
			'class_authority_agent' => array('Agent authority code', 'Set here the code that assigns a unique identifier to the historical persons.', 'resources/table_icons/barcode.png', 'Library Codes'),
			'class_evaluation' => array('Evaluation phase', 'The level of certainty the associated data have and who proved them.', 'table.gif', 'Library Codes'),
			'class_bibliography_type' => array('Text type', 'Classify your text.', 'resources/table_icons/align_center.png', 'Library Codes'),
			'class_bibliography_genre' => array('Genre', 'Define a genre.', 'resources/table_icons/text_drama.png', 'Library Codes'),
			'class_authority_library' => array('Text authority code', 'Set here the code that assigns a unique identifier to the text.', 'resources/table_icons/barcode.png', 'Library Codes'),
			'class_rights' => array('IP Rigths', 'Define the intelectual property right of the corpus.', 'resources/table_icons/balance_unbalance.png', 'Library Codes'),
			'class_language' => array('Document Language', 'Languages for documents.', 'resources/table_icons/arrow_switch.png', 'Library Codes'),
			'class_story_collab_type' => array('Collaboration type', 'What level of collaboration used to write the story.', 'table.gif', 'Dramatic Codes'),
			'class_story_acts' => array('Story acts', 'Structure your story along acts.<br>They are the largest sequential increments by which the progress of a story is measured.', 'table.gif', 'Dramatic Codes'),
			'class_story_path' => array('Story pathes', 'I am not sure what I used this for.', 'table.gif', 'Dramatic Codes'),
			'class_dramatica_steps' => array('Steps', '', 'table.gif', 'Dramatic Codes'),
			'class_dramatica_throughline' => array('Throughlines', 'Throughlines as defined by Dramatica.<br>A Throughline is a sequence of story points within a single perspective.', 'resources/table_icons/participation_rate.png', 'Dramatic Codes'),
			'class_dramatica_signpost' => array('Signposts', 'Sequential markers of a story\'s progress that indicate the kind of concern central to each throughline in each Act.', 'table.gif', 'Dramatic Codes'),
			'class_dramatica_domain' => array('Domains', 'As defined  by Dramatica.', 'resources/table_icons/flood_it.png', 'Dramatic Codes'),
			'class_dramatica_concern' => array('Concerns', 'As defined  by Dramatica.', 'resources/table_icons/server_components.png', 'Dramatic Codes'),
			'class_dramatica_issue' => array('Issues', 'As defined  by Dramatica.', 'resources/table_icons/winrar_view.png', 'Dramatic Codes'),
			'class_dramatica_themes' => array('Themes', 'Themes as defined by Dramatica.', 'resources/table_icons/barchart.png', 'Dramatic Codes'),
			'class_dramatica_archetype' => array('Archetypes', 'Archetypes as defined by Dramatica.', 'resources/table_icons/application_view_icons.png', 'Dramatic Codes'),
			'class_dramatica_character' => array('Class dramatica character', '', 'table.gif', 'Dramatic Codes'),
			'class_character_element' => array('Character elements', 'Character elements as defined by Dramatica.', 'resources/table_icons/application_view_gallery.png', 'Dramatic Codes'),
			'class_dramatica_storypoints1' => array('Class dramatica storypoints 1', '', 'table.gif', 'Dramatic Codes'),
			'class_dramatica_storypoints2' => array('Class dramatica storypoints 2', '', 'table.gif', 'Dramatic Codes'),
			'class_dramatica_storypoints3' => array('Class dramatica storypoints 3', '', 'table.gif', 'Dramatic Codes'),
			'class_dynamicstorypoints' => array('Class dynamicstorypoints', '', 'table.gif', 'Dramatic Codes'),
			'class_im' => array('Impressions', 'Impressions as defined by Goffmanian impression management.', 'resources/table_icons/3d_glasses.png', 'Discursive Codes'),
			'class_pc' => array('Performative contradiction', 'Performative contradiction, types and definitions according to Chapman et al.(2013).', 'table.gif', 'Discursive Codes'),
			'class_nt' => array('Noetic tension', 'Impressions as defined by Franklian logotherapy.', 'resources/table_icons/application_lightning.png', 'Discursive Codes'),
			'dictionary' => array('Dictionary', 'A general reference database for terminology.', 'resources/table_icons/books.png', 'Library Codes'),
			'class_dictionary1' => array('Class dictionary1', '', 'table.gif', 'Library Codes'),
			'class_dictionary2' => array('Class dictionary1', '', 'table.gif', 'Library Codes'),
			'class_dictionary3' => array('Class dictionary1', '', 'table.gif', 'Library Codes'),
			'class_dictionary4' => array('Class dictionary1', '', 'table.gif', 'Library Codes'),
			'class_dictionary5' => array('Class dictionary1', '', 'table.gif', 'Library Codes')
		);
		if($skip_authentication || getLoggedAdmin()) return $arrTables;

		if(is_array($arrTables)){
			foreach($arrTables as $tn => $tc){
				$arrPerm = getTablePermissions($tn);
				if($arrPerm[0]){
					$arrAccessTables[$tn] = $tc;
				}
			}
		}

		return $arrAccessTables;
	}

	#########################################################

	function get_table_groups($skip_authentication = false){
		$tables = getTableList($skip_authentication);
		$all_groups = array('I. Data Sampling', 'II. Data Preparation', 'III. Data Encoding', 'IV. Drama Encoding', 'V. Storyforming', 'VI. Analysis', 'Library Codes', 'Discursive Codes', 'Dramatic Codes');

		$groups = array();
		foreach($all_groups as $grp){
			foreach($tables as $tn => $td){
				if($td[3] && $td[3] == $grp) $groups[$grp][] = $tn;
				if(!$td[3]) $groups[0][] = $tn;
			}
		}

		return $groups;
	}

	#########################################################

	function getTablePermissions($tn){
		static $table_permissions = array();
		if(isset($table_permissions[$tn])) return $table_permissions[$tn];

		$groupID = getLoggedGroupID();
		$memberID = makeSafe(getLoggedMemberID());
		$res_group = sql("select tableName, allowInsert, allowView, allowEdit, allowDelete from membership_grouppermissions where groupID='{$groupID}'", $eo);
		$res_user = sql("select tableName, allowInsert, allowView, allowEdit, allowDelete from membership_userpermissions where lcase(memberID)='{$memberID}'", $eo);

		while($row = db_fetch_assoc($res_group)){
			$table_permissions[$row['tableName']] = array(
				1 => intval($row['allowInsert']),
				2 => intval($row['allowView']),
				3 => intval($row['allowEdit']),
				4 => intval($row['allowDelete']),
				'insert' => intval($row['allowInsert']),
				'view' => intval($row['allowView']),
				'edit' => intval($row['allowEdit']),
				'delete' => intval($row['allowDelete'])
			);
		}

		// user-specific permissions, if specified, overwrite his group permissions
		while($row = db_fetch_assoc($res_user)){
			$table_permissions[$row['tableName']] = array(
				1 => intval($row['allowInsert']),
				2 => intval($row['allowView']),
				3 => intval($row['allowEdit']),
				4 => intval($row['allowDelete']),
				'insert' => intval($row['allowInsert']),
				'view' => intval($row['allowView']),
				'edit' => intval($row['allowEdit']),
				'delete' => intval($row['allowDelete'])
			);
		}

		// if user has any type of access, set 'access' flag
		foreach($table_permissions as $t => $p){
			$table_permissions[$t]['access'] = $table_permissions[$t][0] = false;

			if($p['insert'] || $p['view'] || $p['edit'] || $p['delete']){
				$table_permissions[$t]['access'] = $table_permissions[$t][0] = true;
			}
		}

		return $table_permissions[$tn];
	}

	#########################################################

	function get_sql_fields($table_name){
		$sql_fields = array(   
			'biblio_community' => "`biblio_community`.`id` as 'id', `biblio_community`.`com_name` as 'com_name', `biblio_community`.`description` as 'description'",
			'biblio_author' => "`biblio_author`.`id` as 'id', `biblio_author`.`memberID` as 'memberID', `biblio_author`.`img` as 'img', `biblio_author`.`groupID` as 'groupID', IF(    CHAR_LENGTH(`class_agent_selection1`.`selection_phase`), CONCAT_WS('',   `class_agent_selection1`.`selection_phase`), '') as 'selection_class', IF(    CHAR_LENGTH(`class_agent_type11`.`type`), CONCAT_WS('',   `class_agent_type11`.`type`), '') as 'agenttype1', IF(    CHAR_LENGTH(`class_agent_type21`.`type`), CONCAT_WS('',   `class_agent_type21`.`type`), '') as 'agenttype2', IF(    CHAR_LENGTH(`class_gender1`.`gender`), CONCAT_WS('',   `class_gender1`.`gender`), '') as 'gender', `biblio_author`.`last_name` as 'last_name', `biblio_author`.`first_name` as 'first_name', `biblio_author`.`other_name` as 'other_name', if(`biblio_author`.`birthday`,date_format(`biblio_author`.`birthday`,'%d/%m/%Y %H:%i'),'') as 'birthday', `biblio_author`.`birth_location` as 'birth_location', `biblio_author`.`birth_location_map` as 'birth_location_map', if(`biblio_author`.`deathday`,date_format(`biblio_author`.`deathday`,'%d/%m/%Y %H:%i'),'') as 'deathday', `biblio_author`.`death_location` as 'death_location', `biblio_author`.`workplace` as 'workplace', `biblio_author`.`knows` as 'knows', `biblio_author`.`shortbio` as 'shortbio', IF(    CHAR_LENGTH(`class_evaluation1`.`evaluation_type`), CONCAT_WS('',   `class_evaluation1`.`evaluation_type`), '') as 'data_evaluation', `biblio_author`.`authority_record` as 'authority_record', IF(    CHAR_LENGTH(`class_authority_agent1`.`abbreviation`) || CHAR_LENGTH(`class_authority_agent1`.`authority_name`), CONCAT_WS('',   `class_authority_agent1`.`abbreviation`, '   ', `class_authority_agent1`.`authority_name`), '') as 'authority_organization'",
			'biblio_doc' => "`biblio_doc`.`id` as 'id', `biblio_doc`.`img` as 'img', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') as 'author_name', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '    ', `biblio_author1`.`memberID`), '') as 'author_id', IF(    CHAR_LENGTH(`class_bibliography_type1`.`type`), CONCAT_WS('',   `class_bibliography_type1`.`type`), '') as 'type', IF(    CHAR_LENGTH(`class_bibliography_genre1`.`genre`), CONCAT_WS('',   `class_bibliography_genre1`.`genre`), '') as 'genre', if(`biblio_doc`.`created`,date_format(`biblio_doc`.`created`,'%d/%m/%Y %H:%i'),'') as 'created', if(`biblio_doc`.`published`,date_format(`biblio_doc`.`published`,'%d/%m/%Y %H:%i'),'') as 'published', `biblio_doc`.`title` as 'title', `biblio_doc`.`subtitle` as 'subtitle', `biblio_doc`.`publisher` as 'publisher', `biblio_doc`.`location` as 'location', `biblio_doc`.`citation` as 'citation', `biblio_doc`.`description` as 'description', `biblio_doc`.`source` as 'source', `biblio_doc`.`medium` as 'medium', IF(    CHAR_LENGTH(`class_language1`.`short`) || CHAR_LENGTH(`class_language1`.`language`), CONCAT_WS('',   `class_language1`.`short`, '   ', `class_language1`.`language`), '') as 'language', `biblio_doc`.`format` as 'format', `biblio_doc`.`subject` as 'subject', IF(    CHAR_LENGTH(`class_rights1`.`right`), CONCAT_WS('',   `class_rights1`.`right`), '') as 'rights', `biblio_doc`.`rights_holder` as 'rights_holder', IF(    CHAR_LENGTH(`class_evaluation1`.`evaluation_type`), CONCAT_WS('',   `class_evaluation1`.`evaluation_type`), '') as 'data_evaluation', `biblio_doc`.`authority_record` as 'authority_record', IF(    CHAR_LENGTH(`class_authority_library1`.`abbreviation`) || CHAR_LENGTH(`class_authority_library1`.`authority_name`), CONCAT_WS('',   `class_authority_library1`.`abbreviation`, '   ', `class_authority_library1`.`authority_name`), '') as 'authority_organization', `biblio_doc`.`pdf_book` as 'pdf_book', `biblio_doc`.`ext_source` as 'ext_source'",
			'biblio_transcript' => "`biblio_transcript`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') as 'author', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') as 'author_memberID', IF(    CHAR_LENGTH(`biblio_doc1`.`id`), CONCAT_WS('',   `biblio_doc1`.`id`, '   '), '') as 'bibliography_id', IF(    CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`title`), '') as 'bibliography_title', `biblio_transcript`.`trascriber_memberID` as 'trascriber_memberID', `biblio_transcript`.`transcript_title` as 'transcript_title', `biblio_transcript`.`transcript` as 'transcript', `biblio_transcript`.`credits` as 'credits', IF(    CHAR_LENGTH(`class_rights1`.`right`), CONCAT_WS('',   `class_rights1`.`right`), '') as 'ip_rights'",
			'biblio_token' => "`biblio_token`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') as 'author_id', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`last_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`last_name`), '') as 'author_name', IF(    CHAR_LENGTH(`biblio_doc1`.`id`) || CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`id`, '   ', `biblio_doc1`.`title`), '') as 'bibliography', IF(    CHAR_LENGTH(`biblio_transcript1`.`id`) || CHAR_LENGTH(`biblio_transcript1`.`transcript_title`), CONCAT_WS('',   `biblio_transcript1`.`id`, '   ', `biblio_transcript1`.`transcript_title`), '') as 'transcript', `biblio_token`.`token_sequence` as 'token_sequence', `biblio_token`.`token` as 'token'",
			'code_invivo' => "`code_invivo`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`id`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`id`), '') as 'author', IF(    CHAR_LENGTH(`biblio_doc1`.`id`) || CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`id`, '   ', `biblio_doc1`.`title`), '') as 'bibliography', IF(    CHAR_LENGTH(`biblio_transcript1`.`id`) || CHAR_LENGTH(`biblio_transcript1`.`transcript_title`), CONCAT_WS('',   `biblio_transcript1`.`id`, '   ', `biblio_transcript1`.`transcript_title`), '') as 'transcript', IF(    CHAR_LENGTH(`biblio_token1`.`id`) || CHAR_LENGTH(`biblio_token1`.`token_sequence`), CONCAT_WS('',   `biblio_token1`.`id`, '   ', `biblio_token1`.`token_sequence`), '') as 'token_sequence', IF(    CHAR_LENGTH(`biblio_token1`.`token`), CONCAT_WS('',   `biblio_token1`.`token`), '') as 'token', `code_invivo`.`invivo` as 'invivo', if(`code_invivo`.`start_date`,date_format(`code_invivo`.`start_date`,'%d/%m/%Y %H:%i'),'') as 'start_date', if(`code_invivo`.`end_date`,date_format(`code_invivo`.`end_date`,'%d/%m/%Y %H:%i'),'') as 'end_date', `code_invivo`.`person` as 'person', `code_invivo`.`place` as 'place', `code_invivo`.`freecode` as 'freecode'",
			'code_herme' => "`code_herme`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') as 'author_id', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') as 'author_name', IF(    CHAR_LENGTH(`biblio_doc1`.`id`) || CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`id`, '   ', `biblio_doc1`.`title`), '') as 'bibliography', IF(    CHAR_LENGTH(`biblio_transcript1`.`id`) || CHAR_LENGTH(`biblio_transcript1`.`transcript_title`), CONCAT_WS('',   `biblio_transcript1`.`id`, '   ', `biblio_transcript1`.`transcript_title`), '') as 'transcript', IF(    CHAR_LENGTH(`biblio_token1`.`id`) || CHAR_LENGTH(`biblio_token1`.`token_sequence`), CONCAT_WS('',   `biblio_token1`.`id`, ' - ', `biblio_token1`.`token_sequence`), '') as 'token_sequence', IF(    CHAR_LENGTH(`biblio_token1`.`token`), CONCAT_WS('',   `biblio_token1`.`token`), '') as 'token', `code_herme`.`hermeneutic` as 'hermeneutic', IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') as 'impression', IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') as 'noetictension', `code_herme`.`quadrilemma` as 'quadrilemma', IF(    CHAR_LENGTH(`class_pc1`.`perform_contrad`), CONCAT_WS('',   `class_pc1`.`perform_contrad`), '') as 'pc', `code_herme`.`freecode` as 'freecode'",
			'chr_dev' => "`chr_dev`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') as 'agent_id', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') as 'agent_name', `chr_dev`.`cw_name` as 'cw_name', `chr_dev`.`img` as 'img', IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') as 'dp_resolve', IF(    CHAR_LENGTH(`class_dynamicstorypoints1`.`term`), CONCAT_WS('',   `class_dynamicstorypoints1`.`term`), '') as 'mc_resolve', IF(    CHAR_LENGTH(`chr_scenes1`.`id`) || CHAR_LENGTH(`chr_scenes1`.`illustration`), CONCAT_WS('',   `chr_scenes1`.`id`, ' - ', `chr_scenes1`.`illustration`), '') as 'illust_resolve', `chr_dev`.`mc_growth` as 'mc_growth', IF(    CHAR_LENGTH(`chr_scenes2`.`id`) || CHAR_LENGTH(`chr_scenes2`.`illustration`), CONCAT_WS('',   `chr_scenes2`.`id`, ' - ', `chr_scenes2`.`illustration`), '') as 'illust_growth', `chr_dev`.`mc_approach` as 'mc_approach', IF(    CHAR_LENGTH(`chr_scenes3`.`id`) || CHAR_LENGTH(`chr_scenes3`.`illustration`), CONCAT_WS('',   `chr_scenes3`.`id`, ' - ', `chr_scenes3`.`illustration`), '') as 'illust_approach', `chr_dev`.`mc_ps_style` as 'mc_ps_style', IF(    CHAR_LENGTH(`chr_scenes4`.`id`) || CHAR_LENGTH(`chr_scenes4`.`illustration`), CONCAT_WS('',   `chr_scenes4`.`id`, ' - ', `chr_scenes4`.`illustration`), '') as 'illust_ps_style', `chr_dev`.`cw_age` as 'cw_age', `chr_dev`.`cw_gender` as 'cw_gender', `chr_dev`.`cw_communication_style` as 'cw_communication_style', `chr_dev`.`cw_background` as 'cw_background', `chr_dev`.`cw_appearance` as 'cw_appearance', `chr_dev`.`cw_relationships` as 'cw_relationships', `chr_dev`.`cw_ambition` as 'cw_ambition', `chr_dev`.`cw_defects` as 'cw_defects', `chr_dev`.`cw_thoughts` as 'cw_thoughts', `chr_dev`.`cw_relatedness` as 'cw_relatedness', `chr_dev`.`cw_restrictions` as 'cw_restrictions', `chr_dev`.`locations` as 'locations', `chr_dev`.`persons` as 'persons', `chr_dev`.`events` as 'events', IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') as 'noetictension', IF(    CHAR_LENGTH(`chr_scenes5`.`id`) || CHAR_LENGTH(`chr_scenes5`.`illustration`), CONCAT_WS('',   `chr_scenes5`.`id`, ' - ', `chr_scenes5`.`illustration`), '') as 'illust_nt', IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') as 'impression', IF(    CHAR_LENGTH(`chr_scenes6`.`id`) || CHAR_LENGTH(`chr_scenes6`.`illustration`), CONCAT_WS('',   `chr_scenes6`.`id`, ' - ', `chr_scenes6`.`illustration`), '') as 'illust_im', IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') as 'mcs_problem', IF(    CHAR_LENGTH(`chr_scenes7`.`id`) || CHAR_LENGTH(`chr_scenes7`.`illustration`), CONCAT_WS('',   `chr_scenes7`.`id`, ' - ', `chr_scenes7`.`illustration`), '') as 'illust_mcs_problem', IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') as 'mcs_solution', IF(    CHAR_LENGTH(`chr_scenes8`.`id`) || CHAR_LENGTH(`chr_scenes8`.`illustration`), CONCAT_WS('',   `chr_scenes8`.`id`, ' - ', `chr_scenes8`.`illustration`), '') as 'illust_mcs_solution', IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') as 'mcs_symptom', IF(    CHAR_LENGTH(`chr_scenes9`.`id`) || CHAR_LENGTH(`chr_scenes9`.`illustration`), CONCAT_WS('',   `chr_scenes9`.`id`, ' - ', `chr_scenes9`.`illustration`), '') as 'illust_mcs_symptom', IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') as 'mcs_response', IF(    CHAR_LENGTH(`chr_scenes10`.`id`), CONCAT_WS('',   `chr_scenes10`.`id`, ' - '), '') as 'illust_mcs_response'",
			'chr_scenes' => "`chr_scenes`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '    ', `biblio_author1`.`memberID`), '') as 'author_id', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') as 'author_name', IF(    CHAR_LENGTH(`biblio_doc1`.`id`) || CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`id`, '    ', `biblio_doc1`.`title`), '') as 'bibliography', IF(    CHAR_LENGTH(`biblio_transcript1`.`id`) || CHAR_LENGTH(`biblio_transcript1`.`transcript_title`), CONCAT_WS('',   `biblio_transcript1`.`id`, '   ', `biblio_transcript1`.`transcript_title`), '') as 'transcript', IF(    CHAR_LENGTH(`biblio_token1`.`id`) || CHAR_LENGTH(`biblio_token1`.`token_sequence`), CONCAT_WS('',   `biblio_token1`.`id`, '   ', `biblio_token1`.`token_sequence`), '') as 'token_sequence', IF(    CHAR_LENGTH(`biblio_token1`.`token`), CONCAT_WS('',   `biblio_token1`.`token`), '') as 'token', IF(    CHAR_LENGTH(`code_invivo1`.`invivo`), CONCAT_WS('',   `code_invivo1`.`invivo`), '') as 'invivo_code', IF(    CHAR_LENGTH(if(`code_invivo2`.`start_date`,date_format(`code_invivo2`.`start_date`,'%d/%m/%Y %H:%i'),'')) || CHAR_LENGTH(if(`code_invivo2`.`end_date`,date_format(`code_invivo2`.`end_date`,'%d/%m/%Y %H:%i'),'')), CONCAT_WS('',   if(`code_invivo2`.`start_date`,date_format(`code_invivo2`.`start_date`,'%d/%m/%Y %H:%i'),''), ' - ', if(`code_invivo2`.`end_date`,date_format(`code_invivo2`.`end_date`,'%d/%m/%Y %H:%i'),'')), '') as 'startdate', IF(    CHAR_LENGTH(if(`code_invivo1`.`end_date`,date_format(`code_invivo1`.`end_date`,'%d/%m/%Y %H:%i'),'')), CONCAT_WS('',   if(`code_invivo1`.`end_date`,date_format(`code_invivo1`.`end_date`,'%d/%m/%Y %H:%i'),'')), '') as 'enddate', IF(    CHAR_LENGTH(`code_invivo1`.`person`), CONCAT_WS('',   `code_invivo1`.`person`), '') as 'person', IF(    CHAR_LENGTH(`code_invivo1`.`place`), CONCAT_WS('',   `code_invivo1`.`place`), '') as 'place', IF(    CHAR_LENGTH(`code_herme1`.`hermeneutic`), CONCAT_WS('',   `code_herme1`.`hermeneutic`), '') as 'herme_code', IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') as 'impression', IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') as 'noetictension', IF(    CHAR_LENGTH(`class_pc1`.`perform_contrad`), CONCAT_WS('',   `class_pc1`.`perform_contrad`), '') as 'pc', IF(    CHAR_LENGTH(`class_character_element1`.`element`) || CHAR_LENGTH(`class_character_element1`.`value`), CONCAT_WS('',   `class_character_element1`.`element`, '- ', `class_character_element1`.`value`), '') as 'chr_element', `chr_scenes`.`comment` as 'comment', `chr_scenes`.`illustration` as 'illustration', `chr_scenes`.`scene` as 'scene'",
			'code_encounter_scenes' => "`code_encounter_scenes`.`id` as 'id', `code_encounter_scenes`.`scene` as 'scene'",
			'code_encounters' => "`code_encounters`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') as 'authorA', IF(    CHAR_LENGTH(`biblio_author2`.`last_name`) || CHAR_LENGTH(`biblio_author2`.`first_name`), CONCAT_WS('',   `biblio_author2`.`last_name`, ', ', `biblio_author2`.`first_name`), '') as 'author_nameA', IF(    CHAR_LENGTH(`biblio_doc1`.`id`) || CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`id`, '   ', `biblio_doc1`.`title`), '') as 'bibliographyA', IF(    CHAR_LENGTH(`biblio_transcript1`.`id`) || CHAR_LENGTH(`biblio_doc2`.`title`), CONCAT_WS('',   `biblio_transcript1`.`id`, '    ', `biblio_doc2`.`title`), '') as 'transcriptA', IF(    CHAR_LENGTH(`biblio_token1`.`token_sequence`) || CHAR_LENGTH(`biblio_token1`.`token`), CONCAT_WS('',   `biblio_token1`.`token_sequence`, '   ', `biblio_token1`.`token`), '') as 'tokenA', IF(    CHAR_LENGTH(`chr_scenes1`.`id`) || CHAR_LENGTH(`chr_scenes1`.`scene`), CONCAT_WS('',   `chr_scenes1`.`id`, '   ', `chr_scenes1`.`scene`), '') as 'sceneA', IF(    CHAR_LENGTH(`biblio_author3`.`id`) || CHAR_LENGTH(`biblio_author3`.`memberID`), CONCAT_WS('',   `biblio_author3`.`id`, '   ', `biblio_author3`.`memberID`), '') as 'authorB', IF(    CHAR_LENGTH(`biblio_author4`.`last_name`) || CHAR_LENGTH(`biblio_author4`.`first_name`), CONCAT_WS('',   `biblio_author4`.`last_name`, ', ', `biblio_author4`.`first_name`), '') as 'authornameB', IF(    CHAR_LENGTH(`biblio_doc3`.`id`) || CHAR_LENGTH(`biblio_doc3`.`title`), CONCAT_WS('',   `biblio_doc3`.`id`, '   ', `biblio_doc3`.`title`), '') as 'bibliographyB', IF(    CHAR_LENGTH(`biblio_transcript2`.`id`) || CHAR_LENGTH(`biblio_transcript2`.`transcript_title`), CONCAT_WS('',   `biblio_transcript2`.`id`, '   ', `biblio_transcript2`.`transcript_title`), '') as 'transcriptB', IF(    CHAR_LENGTH(`biblio_token2`.`token_sequence`) || CHAR_LENGTH(`biblio_token2`.`token`), CONCAT_WS('',   `biblio_token2`.`token_sequence`, '   ', `biblio_token2`.`token`), '') as 'tokenB', IF(    CHAR_LENGTH(`chr_scenes2`.`id`) || CHAR_LENGTH(`chr_scenes2`.`scene`), CONCAT_WS('',   `chr_scenes2`.`id`, '   ', `chr_scenes2`.`scene`), '') as 'sceneB', `code_encounters`.`type` as 'type', `code_encounters`.`conflicttype` as 'conflicttype', `code_encounters`.`story_scene` as 'story_scene', `code_encounters`.`nd_color` as 'nd_color', `code_encounters`.`nd_width` as 'nd_width', `code_encounters`.`nd_style` as 'nd_style', `code_encounters`.`nd_opacity` as 'nd_opacity', `code_encounters`.`nd_visibility` as 'nd_visibility', `code_encounters`.`lbl_lable` as 'lbl_lable', `code_encounters`.`lbl_color` as 'lbl_color', `code_encounters`.`lbl_size` as 'lbl_size'",
			'story' => "`story`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_community1`.`id`) || CHAR_LENGTH(`biblio_community1`.`com_name`), CONCAT_WS('',   `biblio_community1`.`id`, ' - ', `biblio_community1`.`com_name`), '') as 'com_name', `story`.`project_leader` as 'project_leader', `story`.`subject` as 'subject', `story`.`story` as 'story', `story`.`approach` as 'approach', `story`.`tags` as 'tags', IF(    CHAR_LENGTH(`class_story_collab_type1`.`collab_type`), CONCAT_WS('',   `class_story_collab_type1`.`collab_type`), '') as 'collaboration_status'",
			'storylines' => "`storylines`.`id` as 'id', IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, '   ', `story1`.`story`), '') as 'story', IF(    CHAR_LENGTH(`class_story_acts1`.`act`), CONCAT_WS('',   `class_story_acts1`.`act`), '') as 'story_act', IF(    CHAR_LENGTH(`story_chrs1`.`id`) || CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `story_chrs1`.`id`, ' - ', `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') as 'character', IF(    CHAR_LENGTH(`chr_dev1`.`cw_name`) || CHAR_LENGTH(`story_chrs1`.`role`), CONCAT_WS('',   `chr_dev1`.`cw_name`, ' - ', ' - ', `story_chrs1`.`role`), '') as 'role', `storylines`.`storyline_no` as 'storyline_no', `storylines`.`parenthetic` as 'parenthetic', `storylines`.`storyline_title` as 'storyline_title', `storylines`.`storyline` as 'storyline', `storylines`.`notes` as 'notes', IF(    CHAR_LENGTH(`class_dramatica_steps1`.`step`), CONCAT_WS('',   `class_dramatica_steps1`.`step`), '') as 'storyweaving_scene_no', IF(    CHAR_LENGTH(`storyweaving_scenes1`.`id`), CONCAT_WS('',   `storyweaving_scenes1`.`id`), '') as 'storyweaving_scene', IF(    CHAR_LENGTH(`storyweaving_scenes1`.`sequence`), CONCAT_WS('',   `storyweaving_scenes1`.`sequence`), '') as 'storyweaving_sequence', IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') as 'storyweaving_theme', IF(    CHAR_LENGTH(`chr_scenes1`.`id`) || CHAR_LENGTH(`chr_scenes1`.`scene`), CONCAT_WS('',   `chr_scenes1`.`id`, '   ', `chr_scenes1`.`scene`), '') as 'characterevent_scene', IF(    CHAR_LENGTH(`code_encounter_scenes1`.`scene`), CONCAT_WS('',   `code_encounter_scenes1`.`scene`), '') as 'character_event'",
			'story_chrs' => "`story_chrs`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') as 'agent_id', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') as 'agent_name', IF(    CHAR_LENGTH(`chr_dev1`.`cw_name`), CONCAT_WS('',   `chr_dev1`.`cw_name`), '') as 'character', `story_chrs`.`role` as 'role', IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`), CONCAT_WS('',   `class_dramatica_character1`.`character`), '') as 'story_character', IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, ' - ', `story1`.`story`), '') as 'story', IF(    CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS('',   `class_dramatica_archetype1`.`archetype`, ' '), '') as 'story_archetype', `story_chrs`.`comment` as 'comment'",
			'storystatic' => "`storystatic`.`id` as 'id', IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, '   ', `story1`.`story`), '') as 'story', IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') as 'throughline', IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`) || CHAR_LENGTH(`story_chrs1`.`agent_name`), CONCAT_WS('',   `class_dramatica_character1`.`character`, ' - ', ' - ', `story_chrs1`.`agent_name`), '') as 'story_character_mc', IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') as 'throughline_domain', IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') as 'concern', IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') as 'issue', IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') as 'problem', IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') as 'solution', IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') as 'symptom', IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') as 'response', IF(    CHAR_LENGTH(`class_dramatica_issue2`.`issue`) || CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_issue2`.`issue`, ' - ', `class_dramatica_domain2`.`domain`), '') as 'catalyst', IF(    CHAR_LENGTH(`class_dramatica_issue3`.`issue`) || CHAR_LENGTH(`class_dramatica_domain3`.`domain`), CONCAT_WS('',   `class_dramatica_issue3`.`issue`, '- ', `class_dramatica_domain3`.`domain`), '') as 'inhibitor', IF(    CHAR_LENGTH(`class_dramatica_concern2`.`concern`) || CHAR_LENGTH(`class_dramatica_domain4`.`domain`), CONCAT_WS('',   `class_dramatica_concern2`.`concern`, ' - ', `class_dramatica_domain4`.`domain`), '') as 'benchmark', IF(    CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_concern3`.`concern`), '') as 'signpost1', IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`), '') as 'signpost2', IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') as 'signpost3', IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') as 'signpost4'",
			'storydynamic' => "`storydynamic`.`id` as 'id', IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, `story1`.`story`), '') as 'story', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') as 'agent', IF(    CHAR_LENGTH(`chr_dev1`.`cw_name`), CONCAT_WS('',   `chr_dev1`.`cw_name`), '') as 'story_dev_chr', IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') as 'storystatic_ost', IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`) || CHAR_LENGTH(`story_chrs2`.`agent_name`), CONCAT_WS('',   `class_dramatica_character1`.`character`, '- ', ' - ', `story_chrs2`.`agent_name`), '') as 'storystatic_chr_mc', IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') as 'mc_problem', IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`id`), CONCAT_WS('',   `class_dramatica_storypoints31`.`id`), '') as 'mc_resolve', IF(    CHAR_LENGTH(`chr_dev3`.`mc_growth`), CONCAT_WS('',   `chr_dev3`.`mc_growth`), '') as 'mc_growth', IF(    CHAR_LENGTH(`chr_dev4`.`mc_approach`), CONCAT_WS('',   `chr_dev4`.`mc_approach`), '') as 'mc_approach', IF(    CHAR_LENGTH(`chr_dev5`.`mc_ps_style`), CONCAT_WS('',   `chr_dev5`.`mc_ps_style`), '') as 'mc_ps_style', `storydynamic`.`ic_resolve` as 'ic_resolve', `storydynamic`.`os_driver` as 'os_driver', `storydynamic`.`os_limit` as 'os_limit', `storydynamic`.`os_outcome` as 'os_outcome', `storydynamic`.`os_judgement` as 'os_judgement', IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') as 'os_goal_domain', IF(    CHAR_LENGTH(`class_dramatica_concern8`.`concern`), CONCAT_WS('',   `class_dramatica_concern8`.`concern`), '') as 'os_goal_concern', IF(    CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_domain2`.`domain`), '') as 'os_consequence_domain', IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') as 'os_consequence_concern', IF(    CHAR_LENGTH(`class_dramatica_domain3`.`domain`), CONCAT_WS('',   `class_dramatica_domain3`.`domain`), '') as 'os_cost_domain', IF(    CHAR_LENGTH(`class_dramatica_concern2`.`concern`), CONCAT_WS('',   `class_dramatica_concern2`.`concern`), '') as 'os_cost_concern', IF(    CHAR_LENGTH(`class_dramatica_domain4`.`domain`), CONCAT_WS('',   `class_dramatica_domain4`.`domain`), '') as 'os_dividend_domain', IF(    CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_concern3`.`concern`), '') as 'os_dividend_concern', IF(    CHAR_LENGTH(`class_dramatica_domain5`.`domain`), CONCAT_WS('',   `class_dramatica_domain5`.`domain`), '') as 'os_requirements_domain', IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`), '') as 'os_requirements_concern', IF(    CHAR_LENGTH(`class_dramatica_domain6`.`domain`), CONCAT_WS('',   `class_dramatica_domain6`.`domain`), '') as 'os_prerequesites_domain', IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') as 'os_prerequesites_concern', IF(    CHAR_LENGTH(`class_dramatica_domain7`.`domain`), CONCAT_WS('',   `class_dramatica_domain7`.`domain`), '') as 'os_preconditions_domain', IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') as 'os_preconditions_concern', IF(    CHAR_LENGTH(`class_dramatica_domain8`.`domain`), CONCAT_WS('',   `class_dramatica_domain8`.`domain`), '') as 'os_forewarnings_domain', IF(    CHAR_LENGTH(`class_dramatica_concern7`.`concern`), CONCAT_WS('',   `class_dramatica_concern7`.`concern`), '') as 'os_forewarnings_concern'",
			'storyweaving_scenes' => "`storyweaving_scenes`.`id` as 'id', IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, '   ', `story1`.`story`), '') as 'story', IF(    CHAR_LENGTH(`class_dramatica_steps1`.`step`), CONCAT_WS('',   `class_dramatica_steps1`.`step`), '') as 'step', IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') as 'throughline', IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') as 'domain', IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') as 'concern', IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') as 'issue', IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') as 'theme', `storyweaving_scenes`.`sequence` as 'sequence'",
			'class_agent_selection' => "`class_agent_selection`.`id` as 'id', `class_agent_selection`.`selection_phase` as 'selection_phase', `class_agent_selection`.`description` as 'description'",
			'class_agent_type1' => "`class_agent_type1`.`id` as 'id', `class_agent_type1`.`type` as 'type', `class_agent_type1`.`description` as 'description'",
			'class_agent_type2' => "`class_agent_type2`.`id` as 'id', `class_agent_type2`.`type` as 'type', `class_agent_type2`.`description` as 'description'",
			'class_gender' => "`class_gender`.`id` as 'id', `class_gender`.`gender` as 'gender'",
			'class_authority_agent' => "`class_authority_agent`.`id` as 'id', `class_authority_agent`.`abbreviation` as 'abbreviation', `class_authority_agent`.`authority_name` as 'authority_name'",
			'class_evaluation' => "`class_evaluation`.`id` as 'id', `class_evaluation`.`evaluation_type` as 'evaluation_type', `class_evaluation`.`description` as 'description'",
			'class_bibliography_type' => "`class_bibliography_type`.`id` as 'id', `class_bibliography_type`.`type` as 'type', `class_bibliography_type`.`description` as 'description'",
			'class_bibliography_genre' => "`class_bibliography_genre`.`id` as 'id', `class_bibliography_genre`.`genre` as 'genre', `class_bibliography_genre`.`description` as 'description'",
			'class_authority_library' => "`class_authority_library`.`id` as 'id', `class_authority_library`.`abbreviation` as 'abbreviation', `class_authority_library`.`authority_name` as 'authority_name'",
			'class_rights' => "`class_rights`.`id` as 'id', `class_rights`.`right` as 'right', `class_rights`.`description` as 'description', `class_rights`.`certification` as 'certification'",
			'class_language' => "`class_language`.`id` as 'id', `class_language`.`short` as 'short', `class_language`.`language` as 'language'",
			'class_story_collab_type' => "`class_story_collab_type`.`id` as 'id', `class_story_collab_type`.`collab_type` as 'collab_type', `class_story_collab_type`.`description` as 'description'",
			'class_story_acts' => "`class_story_acts`.`id` as 'id', `class_story_acts`.`act` as 'act'",
			'class_story_path' => "`class_story_path`.`id` as 'id', `class_story_path`.`path` as 'path', `class_story_path`.`topic` as 'topic'",
			'class_dramatica_steps' => "`class_dramatica_steps`.`id` as 'id', `class_dramatica_steps`.`step` as 'step', `class_dramatica_steps`.`type` as 'type', IF(    CHAR_LENGTH(`class_story_acts1`.`act`), CONCAT_WS('',   `class_story_acts1`.`act`), '') as 'act'",
			'class_dramatica_throughline' => "`class_dramatica_throughline`.`id` as 'id', `class_dramatica_throughline`.`throughline` as 'throughline', `class_dramatica_throughline`.`description` as 'description'",
			'class_dramatica_signpost' => "`class_dramatica_signpost`.`id` as 'id', `class_dramatica_signpost`.`signpost` as 'signpost'",
			'class_dramatica_domain' => "`class_dramatica_domain`.`id` as 'id', `class_dramatica_domain`.`domain` as 'domain', `class_dramatica_domain`.`description` as 'description'",
			'class_dramatica_concern' => "`class_dramatica_concern`.`id` as 'id', IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') as 'domain', `class_dramatica_concern`.`concern` as 'concern', `class_dramatica_concern`.`description` as 'description'",
			'class_dramatica_issue' => "`class_dramatica_issue`.`id` as 'id', IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') as 'domain', IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') as 'concern', `class_dramatica_issue`.`issue` as 'issue', `class_dramatica_issue`.`description` as 'description'",
			'class_dramatica_themes' => "`class_dramatica_themes`.`id` as 'id', IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') as 'domain', IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') as 'concern', IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') as 'issue', `class_dramatica_themes`.`theme` as 'theme', `class_dramatica_themes`.`description` as 'description'",
			'class_dramatica_archetype' => "`class_dramatica_archetype`.`id` as 'id', `class_dramatica_archetype`.`archetype` as 'archetype', `class_dramatica_archetype`.`description` as 'description'",
			'class_dramatica_character' => "`class_dramatica_character`.`id` as 'id', `class_dramatica_character`.`character` as 'character', `class_dramatica_character`.`definition` as 'definition'",
			'class_character_element' => "`class_character_element`.`id` as 'id', `class_character_element`.`element` as 'element', `class_character_element`.`value` as 'value'",
			'class_dramatica_storypoints1' => "`class_dramatica_storypoints1`.`id` as 'id', `class_dramatica_storypoints1`.`term` as 'term', `class_dramatica_storypoints1`.`description` as 'description'",
			'class_dramatica_storypoints2' => "`class_dramatica_storypoints2`.`id` as 'id', IF(    CHAR_LENGTH(`class_dramatica_storypoints11`.`term`), CONCAT_WS('',   `class_dramatica_storypoints11`.`term`), '') as 'cat1', `class_dramatica_storypoints2`.`term` as 'term', `class_dramatica_storypoints2`.`description` as 'description'",
			'class_dramatica_storypoints3' => "`class_dramatica_storypoints3`.`id` as 'id', IF(    CHAR_LENGTH(`class_dramatica_storypoints11`.`term`), CONCAT_WS('',   `class_dramatica_storypoints11`.`term`), '') as 'cat1', IF(    CHAR_LENGTH(`class_dramatica_storypoints21`.`term`), CONCAT_WS('',   `class_dramatica_storypoints21`.`term`), '') as 'cat2', `class_dramatica_storypoints3`.`term` as 'term', `class_dramatica_storypoints3`.`description` as 'description'",
			'class_dynamicstorypoints' => "`class_dynamicstorypoints`.`id` as 'id', `class_dynamicstorypoints`.`term` as 'term', `class_dynamicstorypoints`.`value` as 'value', `class_dynamicstorypoints`.`description` as 'description', IF(    CHAR_LENGTH(`class_dramatica_storypoints11`.`term`), CONCAT_WS('',   `class_dramatica_storypoints11`.`term`), '') as 'cat1', IF(    CHAR_LENGTH(`class_dramatica_storypoints21`.`term`), CONCAT_WS('',   `class_dramatica_storypoints21`.`term`), '') as 'cat2', IF(    CHAR_LENGTH(`class_dramatica_storypoints31`.`term`), CONCAT_WS('',   `class_dramatica_storypoints31`.`term`), '') as 'cat3'",
			'class_im' => "`class_im`.`id` as 'id', `class_im`.`impression` as 'impression', `class_im`.`description` as 'description', `class_im`.`category` as 'category'",
			'class_pc' => "`class_pc`.`id` as 'id', `class_pc`.`perform_contrad` as 'perform_contrad', `class_pc`.`description` as 'description'",
			'class_nt' => "`class_nt`.`id` as 'id', `class_nt`.`noetictension` as 'noetictension', `class_nt`.`description` as 'description'",
			'dictionary' => "`dictionary`.`id` as 'id', `dictionary`.`term` as 'term', `dictionary`.`definition` as 'definition'",
			'class_dictionary1' => "`class_dictionary1`.`id` as 'id', `class_dictionary1`.`category` as 'category'",
			'class_dictionary2' => "`class_dictionary2`.`id` as 'id', IF(    CHAR_LENGTH(`class_dictionary11`.`category`), CONCAT_WS('',   `class_dictionary11`.`category`), '') as 'class1', `class_dictionary2`.`category` as 'category'",
			'class_dictionary3' => "`class_dictionary3`.`id` as 'id', IF(    CHAR_LENGTH(`class_dictionary11`.`category`), CONCAT_WS('',   `class_dictionary11`.`category`), '') as 'class1', IF(    CHAR_LENGTH(`class_dictionary21`.`category`), CONCAT_WS('',   `class_dictionary21`.`category`), '') as 'class2', `class_dictionary3`.`category` as 'category'",
			'class_dictionary4' => "`class_dictionary4`.`id` as 'id', IF(    CHAR_LENGTH(`class_dictionary11`.`category`), CONCAT_WS('',   `class_dictionary11`.`category`), '') as 'class1', IF(    CHAR_LENGTH(`class_dictionary21`.`category`), CONCAT_WS('',   `class_dictionary21`.`category`), '') as 'class2', IF(    CHAR_LENGTH(`class_dictionary31`.`category`), CONCAT_WS('',   `class_dictionary31`.`category`), '') as 'class3', `class_dictionary4`.`category` as 'category'",
			'class_dictionary5' => "`class_dictionary5`.`id` as 'id', IF(    CHAR_LENGTH(`class_dictionary11`.`category`), CONCAT_WS('',   `class_dictionary11`.`category`), '') as 'class1', IF(    CHAR_LENGTH(`class_dictionary21`.`category`), CONCAT_WS('',   `class_dictionary21`.`category`), '') as 'class2', IF(    CHAR_LENGTH(`class_dictionary31`.`category`), CONCAT_WS('',   `class_dictionary31`.`category`), '') as 'class3', IF(    CHAR_LENGTH(`class_dictionary41`.`category`), CONCAT_WS('',   `class_dictionary41`.`category`), '') as 'class4', `class_dictionary5`.`category` as 'category'"
		);

		if(isset($sql_fields[$table_name])){
			return $sql_fields[$table_name];
		}

		return false;
	}

	#########################################################

	function get_sql_from($table_name, $skip_permissions = false, $skip_joins = false) {
		$sql_from = array(   
			'biblio_community' => "`biblio_community` ",
			'biblio_author' => "`biblio_author` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ",
			'biblio_doc' => "`biblio_doc` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_doc`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`biblio_doc`.`type` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`biblio_doc`.`genre` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`biblio_doc`.`language` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_doc`.`rights` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_doc`.`data_evaluation` LEFT JOIN `class_authority_library` as class_authority_library1 ON `class_authority_library1`.`id`=`biblio_doc`.`authority_organization` ",
			'biblio_transcript' => "`biblio_transcript` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_transcript`.`author_memberID` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_transcript`.`bibliography_title` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_transcript`.`ip_rights` ",
			'biblio_token' => "`biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript` ",
			'code_invivo' => "`code_invivo` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`code_invivo`.`author` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`code_invivo`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`code_invivo`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`code_invivo`.`token_sequence` ",
			'code_herme' => "`code_herme` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`code_herme`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`code_herme`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`code_herme`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`code_herme`.`token_sequence` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`code_herme`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`code_herme`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`code_herme`.`pc` ",
			'chr_dev' => "`chr_dev` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`chr_dev`.`agent_id` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`chr_dev`.`dp_resolve` LEFT JOIN `class_dynamicstorypoints` as class_dynamicstorypoints1 ON `class_dynamicstorypoints1`.`id`=`chr_dev`.`mc_resolve` LEFT JOIN `chr_scenes` as chr_scenes1 ON `chr_scenes1`.`id`=`chr_dev`.`illust_resolve` LEFT JOIN `chr_scenes` as chr_scenes2 ON `chr_scenes2`.`id`=`chr_dev`.`illust_growth` LEFT JOIN `chr_scenes` as chr_scenes3 ON `chr_scenes3`.`id`=`chr_dev`.`illust_approach` LEFT JOIN `chr_scenes` as chr_scenes4 ON `chr_scenes4`.`id`=`chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`chr_dev`.`noetictension` LEFT JOIN `chr_scenes` as chr_scenes5 ON `chr_scenes5`.`id`=`chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`chr_dev`.`impression` LEFT JOIN `chr_scenes` as chr_scenes6 ON `chr_scenes6`.`id`=`chr_dev`.`illust_im` LEFT JOIN `storystatic` as storystatic1 ON `storystatic1`.`id`=`chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`storystatic1`.`problem` LEFT JOIN `chr_scenes` as chr_scenes7 ON `chr_scenes7`.`id`=`chr_dev`.`illust_mcs_problem` LEFT JOIN `chr_scenes` as chr_scenes8 ON `chr_scenes8`.`id`=`chr_dev`.`illust_mcs_solution` LEFT JOIN `chr_scenes` as chr_scenes9 ON `chr_scenes9`.`id`=`chr_dev`.`illust_mcs_symptom` LEFT JOIN `chr_scenes` as chr_scenes10 ON `chr_scenes10`.`id`=`chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`storystatic1`.`response` ",
			'chr_scenes' => "`chr_scenes` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`chr_scenes`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`chr_scenes`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`chr_scenes`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`chr_scenes`.`token` LEFT JOIN `code_invivo` as code_invivo1 ON `code_invivo1`.`id`=`chr_scenes`.`invivo_code` LEFT JOIN `code_invivo` as code_invivo2 ON `code_invivo2`.`id`=`chr_scenes`.`startdate` LEFT JOIN `code_herme` as code_herme1 ON `code_herme1`.`id`=`chr_scenes`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`chr_scenes`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`code_herme1`.`pc` ",
			'code_encounter_scenes' => "`code_encounter_scenes` ",
			'code_encounters' => "`code_encounters` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`code_encounters`.`authorA` LEFT JOIN `biblio_author` as biblio_author2 ON `biblio_author2`.`id`=`code_encounters`.`author_nameA` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`code_encounters`.`bibliographyA` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`code_encounters`.`transcriptA` LEFT JOIN `biblio_doc` as biblio_doc2 ON `biblio_doc2`.`id`=`biblio_transcript1`.`bibliography_title` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`code_encounters`.`tokenA` LEFT JOIN `chr_scenes` as chr_scenes1 ON `chr_scenes1`.`id`=`code_encounters`.`sceneA` LEFT JOIN `biblio_author` as biblio_author3 ON `biblio_author3`.`id`=`code_encounters`.`authorB` LEFT JOIN `biblio_author` as biblio_author4 ON `biblio_author4`.`id`=`code_encounters`.`authornameB` LEFT JOIN `biblio_doc` as biblio_doc3 ON `biblio_doc3`.`id`=`code_encounters`.`bibliographyB` LEFT JOIN `biblio_transcript` as biblio_transcript2 ON `biblio_transcript2`.`id`=`code_encounters`.`transcriptB` LEFT JOIN `biblio_token` as biblio_token2 ON `biblio_token2`.`id`=`code_encounters`.`tokenB` LEFT JOIN `chr_scenes` as chr_scenes2 ON `chr_scenes2`.`id`=`code_encounters`.`sceneB` ",
			'story' => "`story` LEFT JOIN `biblio_community` as biblio_community1 ON `biblio_community1`.`id`=`story`.`com_name` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`story`.`collaboration_status` ",
			'storylines' => "`storylines` LEFT JOIN `story` as story1 ON `story1`.`id`=`storylines`.`story` LEFT JOIN `class_story_acts` as class_story_acts1 ON `class_story_acts1`.`id`=`storylines`.`story_act` LEFT JOIN `story_chrs` as story_chrs1 ON `story_chrs1`.`id`=`storylines`.`character` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`story_chrs1`.`agent_id` LEFT JOIN `storyweaving_scenes` as storyweaving_scenes1 ON `storyweaving_scenes1`.`id`=`storylines`.`storyweaving_scene_no` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`storyweaving_scenes1`.`step` LEFT JOIN `chr_scenes` as chr_scenes1 ON `chr_scenes1`.`id`=`storylines`.`characterevent_scene` LEFT JOIN `code_encounter_scenes` as code_encounter_scenes1 ON `code_encounter_scenes1`.`id`=`storylines`.`character_event` LEFT JOIN `chr_dev` as chr_dev1 ON `chr_dev1`.`id`=`story_chrs1`.`character` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`storyweaving_scenes1`.`theme` ",
			'story_chrs' => "`story_chrs` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`story_chrs`.`agent_id` LEFT JOIN `chr_dev` as chr_dev1 ON `chr_dev1`.`id`=`story_chrs`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`story_chrs`.`story_character` LEFT JOIN `story` as story1 ON `story1`.`id`=`story_chrs`.`story` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`story_chrs`.`story_archetype` ",
			'storystatic' => "`storystatic` LEFT JOIN `story` as story1 ON `story1`.`id`=`storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`storystatic`.`throughline` LEFT JOIN `story_chrs` as story_chrs1 ON `story_chrs1`.`id`=`storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`story_chrs1`.`story_character` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes5`.`domain` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain3 ON `class_dramatica_domain3`.`id`=`class_dramatica_themes6`.`domain` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain4 ON `class_dramatica_domain4`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`storystatic`.`signpost4` ",
			'storydynamic' => "`storydynamic` LEFT JOIN `story` as story1 ON `story1`.`id`=`storydynamic`.`story` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`storydynamic`.`agent` LEFT JOIN `story_chrs` as story_chrs1 ON `story_chrs1`.`id`=`storydynamic`.`story_dev_chr` LEFT JOIN `chr_dev` as chr_dev1 ON `chr_dev1`.`id`=`story_chrs1`.`character` LEFT JOIN `storystatic` as storystatic1 ON `storystatic1`.`id`=`storydynamic`.`storystatic_ost` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`storystatic1`.`throughline` LEFT JOIN `chr_dev` as chr_dev2 ON `chr_dev2`.`id`=`storydynamic`.`mc_problem` LEFT JOIN `storystatic` as storystatic2 ON `storystatic2`.`id`=`chr_dev2`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`storystatic2`.`problem` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`storydynamic`.`mc_resolve` LEFT JOIN `chr_dev` as chr_dev3 ON `chr_dev3`.`id`=`storydynamic`.`mc_growth` LEFT JOIN `chr_dev` as chr_dev4 ON `chr_dev4`.`id`=`storydynamic`.`mc_approach` LEFT JOIN `chr_dev` as chr_dev5 ON `chr_dev5`.`id`=`storydynamic`.`mc_ps_style` LEFT JOIN `storystatic` as storystatic3 ON `storystatic3`.`id`=`storydynamic`.`os_goal_domain` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`storystatic3`.`throughline_domain` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`storydynamic`.`os_consequence_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`storydynamic`.`os_consequence_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain3 ON `class_dramatica_domain3`.`id`=`storydynamic`.`os_cost_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`storydynamic`.`os_cost_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain4 ON `class_dramatica_domain4`.`id`=`storydynamic`.`os_dividend_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`storydynamic`.`os_dividend_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain5 ON `class_dramatica_domain5`.`id`=`storydynamic`.`os_requirements_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`storydynamic`.`os_requirements_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain6 ON `class_dramatica_domain6`.`id`=`storydynamic`.`os_prerequesites_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`storydynamic`.`os_prerequesites_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain7 ON `class_dramatica_domain7`.`id`=`storydynamic`.`os_preconditions_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`storydynamic`.`os_preconditions_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain8 ON `class_dramatica_domain8`.`id`=`storydynamic`.`os_forewarnings_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`storydynamic`.`os_forewarnings_concern` LEFT JOIN `story_chrs` as story_chrs2 ON `story_chrs2`.`id`=`storystatic1`.`story_character_mc` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`story_chrs2`.`story_character` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`storystatic1`.`concern` ",
			'storyweaving_scenes' => "`storyweaving_scenes` LEFT JOIN `story` as story1 ON `story1`.`id`=`storyweaving_scenes`.`story` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`storyweaving_scenes`.`step` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`storyweaving_scenes`.`throughline` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`storyweaving_scenes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`storyweaving_scenes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`storyweaving_scenes`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`storyweaving_scenes`.`theme` ",
			'class_agent_selection' => "`class_agent_selection` ",
			'class_agent_type1' => "`class_agent_type1` ",
			'class_agent_type2' => "`class_agent_type2` ",
			'class_gender' => "`class_gender` ",
			'class_authority_agent' => "`class_authority_agent` ",
			'class_evaluation' => "`class_evaluation` ",
			'class_bibliography_type' => "`class_bibliography_type` ",
			'class_bibliography_genre' => "`class_bibliography_genre` ",
			'class_authority_library' => "`class_authority_library` ",
			'class_rights' => "`class_rights` ",
			'class_language' => "`class_language` ",
			'class_story_collab_type' => "`class_story_collab_type` ",
			'class_story_acts' => "`class_story_acts` ",
			'class_story_path' => "`class_story_path` ",
			'class_dramatica_steps' => "`class_dramatica_steps` LEFT JOIN `class_story_acts` as class_story_acts1 ON `class_story_acts1`.`id`=`class_dramatica_steps`.`act` ",
			'class_dramatica_throughline' => "`class_dramatica_throughline` ",
			'class_dramatica_signpost' => "`class_dramatica_signpost` ",
			'class_dramatica_domain' => "`class_dramatica_domain` ",
			'class_dramatica_concern' => "`class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ",
			'class_dramatica_issue' => "`class_dramatica_issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_issue`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_issue`.`concern` ",
			'class_dramatica_themes' => "`class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ",
			'class_dramatica_archetype' => "`class_dramatica_archetype` ",
			'class_dramatica_character' => "`class_dramatica_character` ",
			'class_character_element' => "`class_character_element` ",
			'class_dramatica_storypoints1' => "`class_dramatica_storypoints1` ",
			'class_dramatica_storypoints2' => "`class_dramatica_storypoints2` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints2`.`cat1` ",
			'class_dramatica_storypoints3' => "`class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ",
			'class_dynamicstorypoints' => "`class_dynamicstorypoints` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints`.`cat3` ",
			'class_im' => "`class_im` ",
			'class_pc' => "`class_pc` ",
			'class_nt' => "`class_nt` ",
			'dictionary' => "`dictionary` ",
			'class_dictionary1' => "`class_dictionary1` ",
			'class_dictionary2' => "`class_dictionary2` LEFT JOIN `class_dictionary1` as class_dictionary11 ON `class_dictionary11`.`id`=`class_dictionary2`.`class1` ",
			'class_dictionary3' => "`class_dictionary3` LEFT JOIN `class_dictionary1` as class_dictionary11 ON `class_dictionary11`.`id`=`class_dictionary3`.`class1` LEFT JOIN `class_dictionary2` as class_dictionary21 ON `class_dictionary21`.`id`=`class_dictionary3`.`class2` ",
			'class_dictionary4' => "`class_dictionary4` LEFT JOIN `class_dictionary1` as class_dictionary11 ON `class_dictionary11`.`id`=`class_dictionary4`.`class1` LEFT JOIN `class_dictionary2` as class_dictionary21 ON `class_dictionary21`.`id`=`class_dictionary4`.`class2` LEFT JOIN `class_dictionary3` as class_dictionary31 ON `class_dictionary31`.`id`=`class_dictionary4`.`class3` ",
			'class_dictionary5' => "`class_dictionary5` LEFT JOIN `class_dictionary1` as class_dictionary11 ON `class_dictionary11`.`id`=`class_dictionary5`.`class1` LEFT JOIN `class_dictionary2` as class_dictionary21 ON `class_dictionary21`.`id`=`class_dictionary5`.`class2` LEFT JOIN `class_dictionary3` as class_dictionary31 ON `class_dictionary31`.`id`=`class_dictionary5`.`class3` LEFT JOIN `class_dictionary4` as class_dictionary41 ON `class_dictionary41`.`id`=`class_dictionary5`.`class4` "
		);

		$pkey = array(   
			'biblio_community' => 'id',
			'biblio_author' => 'id',
			'biblio_doc' => 'id',
			'biblio_transcript' => 'id',
			'biblio_token' => 'id',
			'code_invivo' => 'id',
			'code_herme' => 'id',
			'chr_dev' => 'id',
			'chr_scenes' => 'id',
			'code_encounter_scenes' => 'id',
			'code_encounters' => 'id',
			'story' => 'id',
			'storylines' => 'id',
			'story_chrs' => 'id',
			'storystatic' => 'id',
			'storydynamic' => 'id',
			'storyweaving_scenes' => 'id',
			'class_agent_selection' => 'id',
			'class_agent_type1' => 'id',
			'class_agent_type2' => 'id',
			'class_gender' => 'id',
			'class_authority_agent' => 'id',
			'class_evaluation' => 'id',
			'class_bibliography_type' => 'id',
			'class_bibliography_genre' => 'id',
			'class_authority_library' => 'id',
			'class_rights' => 'id',
			'class_language' => 'id',
			'class_story_collab_type' => 'id',
			'class_story_acts' => 'id',
			'class_story_path' => 'id',
			'class_dramatica_steps' => 'id',
			'class_dramatica_throughline' => 'id',
			'class_dramatica_signpost' => 'id',
			'class_dramatica_domain' => 'id',
			'class_dramatica_concern' => 'id',
			'class_dramatica_issue' => 'id',
			'class_dramatica_themes' => 'id',
			'class_dramatica_archetype' => 'id',
			'class_dramatica_character' => 'id',
			'class_character_element' => 'id',
			'class_dramatica_storypoints1' => 'id',
			'class_dramatica_storypoints2' => 'id',
			'class_dramatica_storypoints3' => 'id',
			'class_dynamicstorypoints' => 'id',
			'class_im' => 'id',
			'class_pc' => 'id',
			'class_nt' => 'id',
			'dictionary' => 'id',
			'class_dictionary1' => 'id',
			'class_dictionary2' => 'id',
			'class_dictionary3' => 'id',
			'class_dictionary4' => 'id',
			'class_dictionary5' => 'id'
		);

		if(!isset($sql_from[$table_name])) return false;

		$from = ($skip_joins ? "`{$table_name}`" : $sql_from[$table_name]);

		if($skip_permissions) return $from . ' WHERE 1=1';

		// mm: build the query based on current member's permissions
		$perm = getTablePermissions($table_name);
		if($perm[2] == 1){ // view owner only
			$from .= ", membership_userrecords WHERE `{$table_name}`.`{$pkey[$table_name]}`=membership_userrecords.pkValue and membership_userrecords.tableName='{$table_name}' and lcase(membership_userrecords.memberID)='" . getLoggedMemberID() . "'";
		}elseif($perm[2] == 2){ // view group only
			$from .= ", membership_userrecords WHERE `{$table_name}`.`{$pkey[$table_name]}`=membership_userrecords.pkValue and membership_userrecords.tableName='{$table_name}' and membership_userrecords.groupID='" . getLoggedGroupID() . "'";
		}elseif($perm[2] == 3){ // view all
			$from .= ' WHERE 1=1';
		}else{ // view none
			return false;
		}

		return $from;
	}

	#########################################################

	function get_joined_record($table, $id, $skip_permissions = false){
		$sql_fields = get_sql_fields($table);
		$sql_from = get_sql_from($table, $skip_permissions);

		if(!$sql_fields || !$sql_from) return false;

		$pk = getPKFieldName($table);
		if(!$pk) return false;

		$safe_id = makeSafe($id, false);
		$sql = "SELECT {$sql_fields} FROM {$sql_from} AND `{$table}`.`{$pk}`='{$safe_id}'";
		$eo['silentErrors'] = true;
		$res = sql($sql, $eo);
		if($row = db_fetch_assoc($res)) return $row;

		return false;
	}

	#########################################################

	function get_defaults($table){
		/* array of tables and their fields, with default values (or empty), excluding automatic values */
		$defaults = array(
			'biblio_community' => array(
				'id' => '',
				'com_name' => '',
				'description' => ''
			),
			'biblio_author' => array(
				'id' => '',
				'memberID' => '',
				'img' => '',
				'groupID' => '',
				'selection_class' => '',
				'agenttype1' => '',
				'agenttype2' => '',
				'gender' => '',
				'last_name' => '',
				'first_name' => '',
				'other_name' => '',
				'birthday' => '',
				'birth_location' => '',
				'birth_location_map' => '',
				'deathday' => '',
				'death_location' => '',
				'workplace' => '',
				'knows' => '',
				'shortbio' => '',
				'data_evaluation' => '',
				'authority_record' => '',
				'authority_organization' => ''
			),
			'biblio_doc' => array(
				'id' => '',
				'img' => '',
				'author_name' => '',
				'author_id' => '',
				'type' => '',
				'genre' => '',
				'created' => '',
				'published' => '',
				'title' => '',
				'subtitle' => '',
				'publisher' => '',
				'location' => '',
				'citation' => '',
				'description' => '',
				'source' => '',
				'medium' => '',
				'language' => '',
				'format' => '',
				'subject' => '',
				'rights' => '',
				'rights_holder' => '',
				'data_evaluation' => '',
				'authority_record' => '',
				'authority_organization' => '',
				'pdf_book' => '',
				'ext_source' => ''
			),
			'biblio_transcript' => array(
				'id' => '',
				'author' => '',
				'author_memberID' => '',
				'bibliography_id' => '',
				'bibliography_title' => '',
				'trascriber_memberID' => '',
				'transcript_title' => '',
				'transcript' => '',
				'credits' => '',
				'ip_rights' => ''
			),
			'biblio_token' => array(
				'id' => '',
				'author_id' => '',
				'author_name' => '',
				'bibliography' => '',
				'transcript' => '',
				'token_sequence' => '',
				'token' => ''
			),
			'code_invivo' => array(
				'id' => '',
				'author' => '',
				'bibliography' => '',
				'transcript' => '',
				'token_sequence' => '',
				'token' => '',
				'invivo' => '',
				'start_date' => '',
				'end_date' => '',
				'person' => '',
				'place' => '',
				'freecode' => ''
			),
			'code_herme' => array(
				'id' => '',
				'author_id' => '',
				'author_name' => '',
				'bibliography' => '',
				'transcript' => '',
				'token_sequence' => '',
				'token' => '',
				'hermeneutic' => '',
				'impression' => '',
				'noetictension' => '',
				'quadrilemma' => '',
				'pc' => '',
				'freecode' => ''
			),
			'chr_dev' => array(
				'id' => '',
				'agent_id' => '',
				'agent_name' => '',
				'cw_name' => '',
				'img' => '',
				'dp_resolve' => '',
				'mc_resolve' => '',
				'illust_resolve' => '',
				'mc_growth' => '',
				'illust_growth' => '',
				'mc_approach' => '',
				'illust_approach' => '',
				'mc_ps_style' => '',
				'illust_ps_style' => '',
				'cw_age' => '',
				'cw_gender' => '',
				'cw_communication_style' => '',
				'cw_background' => '',
				'cw_appearance' => '',
				'cw_relationships' => '',
				'cw_ambition' => '',
				'cw_defects' => '',
				'cw_thoughts' => '',
				'cw_relatedness' => '',
				'cw_restrictions' => '',
				'locations' => '',
				'persons' => '',
				'events' => '',
				'noetictension' => '',
				'illust_nt' => '',
				'impression' => '',
				'illust_im' => '',
				'mcs_problem' => '',
				'illust_mcs_problem' => '',
				'mcs_solution' => '',
				'illust_mcs_solution' => '',
				'mcs_symptom' => '',
				'illust_mcs_symptom' => '',
				'mcs_response' => '',
				'illust_mcs_response' => ''
			),
			'chr_scenes' => array(
				'id' => '',
				'author_id' => '',
				'author_name' => '',
				'bibliography' => '',
				'transcript' => '',
				'token_sequence' => '',
				'token' => '',
				'invivo_code' => '',
				'startdate' => '1',
				'enddate' => '1',
				'person' => '',
				'place' => '',
				'herme_code' => '',
				'impression' => '',
				'noetictension' => '',
				'pc' => '',
				'chr_element' => '',
				'comment' => '',
				'illustration' => '',
				'scene' => ''
			),
			'code_encounter_scenes' => array(
				'id' => '',
				'scene' => ''
			),
			'code_encounters' => array(
				'id' => '',
				'authorA' => '',
				'author_nameA' => '',
				'bibliographyA' => '',
				'transcriptA' => '',
				'tokenA' => '',
				'sceneA' => '',
				'authorB' => '',
				'authornameB' => '',
				'bibliographyB' => '',
				'transcriptB' => '',
				'tokenB' => '',
				'sceneB' => '',
				'type' => '',
				'conflicttype' => '',
				'story_scene' => '',
				'nd_color' => '',
				'nd_width' => '',
				'nd_style' => '',
				'nd_opacity' => '',
				'nd_visibility' => '',
				'lbl_lable' => '',
				'lbl_color' => '',
				'lbl_size' => ''
			),
			'story' => array(
				'id' => '',
				'com_name' => '',
				'project_leader' => '',
				'subject' => '',
				'story' => '',
				'approach' => '',
				'tags' => '',
				'collaboration_status' => ''
			),
			'storylines' => array(
				'id' => '',
				'story' => '',
				'story_act' => '',
				'character' => '',
				'role' => '',
				'storyline_no' => '',
				'parenthetic' => '',
				'storyline_title' => '',
				'storyline' => '',
				'notes' => '',
				'storyweaving_scene_no' => '',
				'storyweaving_scene' => '',
				'storyweaving_sequence' => '',
				'storyweaving_theme' => '',
				'characterevent_scene' => '',
				'character_event' => ''
			),
			'story_chrs' => array(
				'id' => '',
				'agent_id' => '',
				'agent_name' => '',
				'character' => '',
				'role' => '',
				'story_character' => '',
				'story' => '',
				'story_archetype' => '',
				'comment' => ''
			),
			'storystatic' => array(
				'id' => '',
				'story' => '',
				'throughline' => '',
				'story_character_mc' => '',
				'throughline_domain' => '',
				'concern' => '',
				'issue' => '',
				'problem' => '',
				'solution' => '',
				'symptom' => '',
				'response' => '',
				'catalyst' => '',
				'inhibitor' => '',
				'benchmark' => '',
				'signpost1' => '',
				'signpost2' => '',
				'signpost3' => '',
				'signpost4' => ''
			),
			'storydynamic' => array(
				'id' => '',
				'story' => '',
				'agent' => '',
				'story_dev_chr' => '',
				'storystatic_ost' => '',
				'storystatic_chr_mc' => '',
				'mc_problem' => '',
				'mc_resolve' => '',
				'mc_growth' => '',
				'mc_approach' => '',
				'mc_ps_style' => '',
				'ic_resolve' => '',
				'os_driver' => '',
				'os_limit' => '',
				'os_outcome' => '',
				'os_judgement' => '',
				'os_goal_domain' => '',
				'os_goal_concern' => '',
				'os_consequence_domain' => '',
				'os_consequence_concern' => '',
				'os_cost_domain' => '',
				'os_cost_concern' => '',
				'os_dividend_domain' => '',
				'os_dividend_concern' => '',
				'os_requirements_domain' => '',
				'os_requirements_concern' => '',
				'os_prerequesites_domain' => '',
				'os_prerequesites_concern' => '',
				'os_preconditions_domain' => '',
				'os_preconditions_concern' => '',
				'os_forewarnings_domain' => '',
				'os_forewarnings_concern' => ''
			),
			'storyweaving_scenes' => array(
				'id' => '',
				'story' => '',
				'step' => '',
				'throughline' => '',
				'domain' => '',
				'concern' => '',
				'issue' => '',
				'theme' => '',
				'sequence' => ''
			),
			'class_agent_selection' => array(
				'id' => '',
				'selection_phase' => '',
				'description' => ''
			),
			'class_agent_type1' => array(
				'id' => '',
				'type' => '',
				'description' => ''
			),
			'class_agent_type2' => array(
				'id' => '',
				'type' => '',
				'description' => ''
			),
			'class_gender' => array(
				'id' => '',
				'gender' => ''
			),
			'class_authority_agent' => array(
				'id' => '',
				'abbreviation' => '',
				'authority_name' => ''
			),
			'class_evaluation' => array(
				'id' => '',
				'evaluation_type' => '',
				'description' => ''
			),
			'class_bibliography_type' => array(
				'id' => '',
				'type' => '',
				'description' => ''
			),
			'class_bibliography_genre' => array(
				'id' => '',
				'genre' => '',
				'description' => ''
			),
			'class_authority_library' => array(
				'id' => '',
				'abbreviation' => '',
				'authority_name' => ''
			),
			'class_rights' => array(
				'id' => '',
				'right' => '',
				'description' => '',
				'certification' => ''
			),
			'class_language' => array(
				'id' => '',
				'short' => '',
				'language' => ''
			),
			'class_story_collab_type' => array(
				'id' => '',
				'collab_type' => '',
				'description' => ''
			),
			'class_story_acts' => array(
				'id' => '',
				'act' => ''
			),
			'class_story_path' => array(
				'id' => '',
				'path' => '',
				'topic' => ''
			),
			'class_dramatica_steps' => array(
				'id' => '',
				'step' => '',
				'type' => '',
				'act' => ''
			),
			'class_dramatica_throughline' => array(
				'id' => '',
				'throughline' => '',
				'description' => ''
			),
			'class_dramatica_signpost' => array(
				'id' => '',
				'signpost' => ''
			),
			'class_dramatica_domain' => array(
				'id' => '',
				'domain' => '',
				'description' => ''
			),
			'class_dramatica_concern' => array(
				'id' => '',
				'domain' => '',
				'concern' => '',
				'description' => ''
			),
			'class_dramatica_issue' => array(
				'id' => '',
				'domain' => '',
				'concern' => '',
				'issue' => '',
				'description' => ''
			),
			'class_dramatica_themes' => array(
				'id' => '',
				'domain' => '',
				'concern' => '',
				'issue' => '',
				'theme' => '',
				'description' => ''
			),
			'class_dramatica_archetype' => array(
				'id' => '',
				'archetype' => '',
				'description' => ''
			),
			'class_dramatica_character' => array(
				'id' => '',
				'character' => '',
				'definition' => ''
			),
			'class_character_element' => array(
				'id' => '',
				'element' => '',
				'value' => ''
			),
			'class_dramatica_storypoints1' => array(
				'id' => '',
				'term' => '',
				'description' => ''
			),
			'class_dramatica_storypoints2' => array(
				'id' => '',
				'cat1' => '',
				'term' => '',
				'description' => ''
			),
			'class_dramatica_storypoints3' => array(
				'id' => '',
				'cat1' => '',
				'cat2' => '',
				'term' => '',
				'description' => ''
			),
			'class_dynamicstorypoints' => array(
				'id' => '',
				'term' => '',
				'value' => '',
				'description' => '',
				'cat1' => '',
				'cat2' => '',
				'cat3' => ''
			),
			'class_im' => array(
				'id' => '',
				'impression' => '',
				'description' => '',
				'category' => ''
			),
			'class_pc' => array(
				'id' => '',
				'perform_contrad' => '',
				'description' => ''
			),
			'class_nt' => array(
				'id' => '',
				'noetictension' => '',
				'description' => ''
			),
			'dictionary' => array(
				'id' => '',
				'term' => '',
				'definition' => ''
			),
			'class_dictionary1' => array(
				'id' => '',
				'category' => ''
			),
			'class_dictionary2' => array(
				'id' => '',
				'class1' => '',
				'category' => ''
			),
			'class_dictionary3' => array(
				'id' => '',
				'class1' => '',
				'class2' => '',
				'category' => ''
			),
			'class_dictionary4' => array(
				'id' => '',
				'class1' => '',
				'class2' => '',
				'class3' => '',
				'category' => ''
			),
			'class_dictionary5' => array(
				'id' => '',
				'class1' => '',
				'class2' => '',
				'class3' => '',
				'class4' => '',
				'category' => ''
			)
		);

		return isset($defaults[$table]) ? $defaults[$table] : array();
	}

	#########################################################

	function logInMember(){
		$redir = 'index.php';
		if($_POST['signIn'] != ''){
			if($_POST['username'] != '' && $_POST['password'] != ''){
				$username = makeSafe(strtolower($_POST['username']));
				$hash = sqlValue("select passMD5 from membership_users where lcase(memberID)='{$username}' and isApproved=1 and isBanned=0");
				$password = $_POST['password'];

				if(password_match($password, $hash)) {
					$_SESSION['memberID'] = $username;
					$_SESSION['memberGroupID'] = sqlValue("SELECT `groupID` FROM `membership_users` WHERE LCASE(`memberID`)='{$username}'");

					if($_POST['rememberMe'] == 1){
						RememberMe::login($username);
					}else{
						RememberMe::delete();
					}

					// harden user's password hash
					password_harden($username, $password, $hash);

					// hook: login_ok
					if(function_exists('login_ok')){
						$args=array();
						if(!$redir=login_ok(getMemberInfo(), $args)){
							$redir='index.php';
						}
					}

					redirect($redir);
					exit;
				}
			}

			// hook: login_failed
			if(function_exists('login_failed')){
				$args=array();
				login_failed(array(
					'username' => $_POST['username'],
					'password' => $_POST['password'],
					'IP' => $_SERVER['REMOTE_ADDR']
					), $args);
			}

			if(!headers_sent()) header('HTTP/1.0 403 Forbidden');
			redirect("index.php?loginFailed=1");
			exit;
		}

		/* check if a rememberMe cookie exists and sign in user if so */
		if(RememberMe::check()) {
			$username = makeSafe(strtolower(RememberMe::user()));
			$_SESSION['memberID'] = $username;
			$_SESSION['memberGroupID'] = sqlValue("SELECT `groupID` FROM `membership_users` WHERE LCASE(`memberID`)='{$username}'");
		}
	}

	#########################################################

	function htmlUserBar(){
		global $adminConfig, $Translation;
		if(!defined('PREPEND_PATH')) define('PREPEND_PATH', '');

		ob_start();
		$home_page = (basename($_SERVER['PHP_SELF'])=='index.php' ? true : false);

		?>
		<nav class="navbar navbar-default navbar-fixed-top hidden-print" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- application title is obtained from the name besides the yellow database icon in AppGini, use underscores for spaces -->
				<a class="navbar-brand" href="<?php echo PREPEND_PATH; ?>index.php"><i class="glyphicon glyphicon-home"></i> spindle</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<?php if(!$home_page){ ?>
						<?php echo NavMenus(); ?>
					<?php } ?>
				</ul>

				<?php if(getLoggedAdmin()){ ?>
					<ul class="nav navbar-nav">
						<a href="<?php echo PREPEND_PATH; ?>admin/pageHome.php" class="btn btn-danger navbar-btn hidden-xs" title="<?php echo html_attr($Translation['admin area']); ?>"><i class="glyphicon glyphicon-cog"></i> <?php echo $Translation['admin area']; ?></a>
						<a href="<?php echo PREPEND_PATH; ?>admin/pageHome.php" class="btn btn-danger navbar-btn visible-xs btn-lg" title="<?php echo html_attr($Translation['admin area']); ?>"><i class="glyphicon glyphicon-cog"></i> <?php echo $Translation['admin area']; ?></a>
					</ul>
				<?php } ?>

				<?php if(!$_GET['signIn'] && !$_GET['loginFailed']){ ?>
					<?php if(getLoggedMemberID() == $adminConfig['anonymousMember']){ ?>
						<p class="navbar-text navbar-right">&nbsp;</p>
						<a href="<?php echo PREPEND_PATH; ?>index.php?signIn=1" class="btn btn-success navbar-btn navbar-right"><?php echo $Translation['sign in']; ?></a>
						<p class="navbar-text navbar-right">
							<?php echo $Translation['not signed in']; ?>
						</p>
					<?php }else{ ?>
						<ul class="nav navbar-nav navbar-right hidden-xs" style="min-width: 330px;">
							<a class="btn navbar-btn btn-default" href="<?php echo PREPEND_PATH; ?>index.php?signOut=1"><i class="glyphicon glyphicon-log-out"></i> <?php echo $Translation['sign out']; ?></a>
							<p class="navbar-text">
								<?php echo $Translation['signed as']; ?> <strong><a href="<?php echo PREPEND_PATH; ?>membership_profile.php" class="navbar-link"><?php echo getLoggedMemberID(); ?></a></strong>
							</p>
						</ul>
						<ul class="nav navbar-nav visible-xs">
							<a class="btn navbar-btn btn-default btn-lg visible-xs" href="<?php echo PREPEND_PATH; ?>index.php?signOut=1"><i class="glyphicon glyphicon-log-out"></i> <?php echo $Translation['sign out']; ?></a>
							<p class="navbar-text text-center">
								<?php echo $Translation['signed as']; ?> <strong><a href="<?php echo PREPEND_PATH; ?>membership_profile.php" class="navbar-link"><?php echo getLoggedMemberID(); ?></a></strong>
							</p>
						</ul>
						<script>
							/* periodically check if user is still signed in */
							setInterval(function(){
								$j.ajax({
									url: '<?php echo PREPEND_PATH; ?>ajax_check_login.php',
									success: function(username){
										if(!username.length) window.location = '<?php echo PREPEND_PATH; ?>index.php?signIn=1';
									}
								});
							}, 60000);
						</script>
					<?php } ?>
				<?php } ?>
			</div>
		</nav>
		<?php

		$html = ob_get_contents();
		ob_end_clean();

		return $html;
	}

	#########################################################

	function showNotifications($msg = '', $class = '', $fadeout = true){
		global $Translation;

		$notify_template_no_fadeout = '<div id="%%ID%%" class="alert alert-dismissable %%CLASS%%" style="display: none; padding-top: 6px; padding-bottom: 6px;">' .
					'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' .
					'%%MSG%%</div>' .
					'<script> jQuery(function(){ /* */ jQuery("#%%ID%%").show("slow"); }); </script>'."\n";
		$notify_template = '<div id="%%ID%%" class="alert %%CLASS%%" style="display: none; padding-top: 6px; padding-bottom: 6px;">%%MSG%%</div>' .
					'<script>' .
						'jQuery(function(){' .
							'jQuery("#%%ID%%").show("slow", function(){' .
								'setTimeout(function(){ /* */ jQuery("#%%ID%%").hide("slow"); }, 4000);' .
							'});' .
						'});' .
					'</script>'."\n";

		if(!$msg){ // if no msg, use url to detect message to display
			if($_REQUEST['record-added-ok'] != ''){
				$msg = $Translation['new record saved'];
				$class = 'alert-success';
			}elseif($_REQUEST['record-added-error'] != ''){
				$msg = $Translation['Couldn\'t save the new record'];
				$class = 'alert-danger';
				$fadeout = false;
			}elseif($_REQUEST['record-updated-ok'] != ''){
				$msg = $Translation['record updated'];
				$class = 'alert-success';
			}elseif($_REQUEST['record-updated-error'] != ''){
				$msg = $Translation['Couldn\'t save changes to the record'];
				$class = 'alert-danger';
				$fadeout = false;
			}elseif($_REQUEST['record-deleted-ok'] != ''){
				$msg = $Translation['The record has been deleted successfully'];
				$class = 'alert-success';
				$fadeout = false;
			}elseif($_REQUEST['record-deleted-error'] != ''){
				$msg = $Translation['Couldn\'t delete this record'];
				$class = 'alert-danger';
				$fadeout = false;
			}else{
				return '';
			}
		}
		$id = 'notification-' . rand();

		$out = ($fadeout ? $notify_template : $notify_template_no_fadeout);
		$out = str_replace('%%ID%%', $id, $out);
		$out = str_replace('%%MSG%%', $msg, $out);
		$out = str_replace('%%CLASS%%', $class, $out);

		return $out;
	}

	#########################################################

	function parseMySQLDate($date, $altDate){
		// is $date valid?
		if(preg_match("/^\d{4}-\d{1,2}-\d{1,2}$/", trim($date))){
			return trim($date);
		}

		if($date != '--' && preg_match("/^\d{4}-\d{1,2}-\d{1,2}$/", trim($altDate))){
			return trim($altDate);
		}

		if($date != '--' && $altDate && intval($altDate)==$altDate){
			return @date('Y-m-d', @time() + ($altDate >= 1 ? $altDate - 1 : $altDate) * 86400);
		}

		return '';
	}

	#########################################################

	function parseCode($code, $isInsert=true, $rawData=false){
		if($isInsert){
			$arrCodes=array(
				'<%%creatorusername%%>' => $_SESSION['memberID'],
				'<%%creatorgroupid%%>' => $_SESSION['memberGroupID'],
				'<%%creatorip%%>' => $_SERVER['REMOTE_ADDR'],
				'<%%creatorgroup%%>' => sqlValue("select name from membership_groups where groupID='{$_SESSION['memberGroupID']}'"),

				'<%%creationdate%%>' => ($rawData ? @date('Y-m-d') : @date('j/n/Y')),
				'<%%creationtime%%>' => ($rawData ? @date('H:i:s') : @date('h:i:s a')),
				'<%%creationdatetime%%>' => ($rawData ? @date('Y-m-d H:i:s') : @date('j/n/Y h:i:s a')),
				'<%%creationtimestamp%%>' => ($rawData ? @date('Y-m-d H:i:s') : @time())
			);
		}else{
			$arrCodes=array(
				'<%%editorusername%%>' => $_SESSION['memberID'],
				'<%%editorgroupid%%>' => $_SESSION['memberGroupID'],
				'<%%editorip%%>' => $_SERVER['REMOTE_ADDR'],
				'<%%editorgroup%%>' => sqlValue("select name from membership_groups where groupID='{$_SESSION['memberGroupID']}'"),

				'<%%editingdate%%>' => ($rawData ? @date('Y-m-d') : @date('j/n/Y')),
				'<%%editingtime%%>' => ($rawData ? @date('H:i:s') : @date('h:i:s a')),
				'<%%editingdatetime%%>' => ($rawData ? @date('Y-m-d H:i:s') : @date('j/n/Y h:i:s a')),
				'<%%editingtimestamp%%>' => ($rawData ? @date('Y-m-d H:i:s') : @time())
			);
		}

		$pc=str_ireplace(array_keys($arrCodes), array_values($arrCodes), $code);

		return $pc;
	}

	#########################################################

	function addFilter($index, $filterAnd, $filterField, $filterOperator, $filterValue){
		// validate input
		if($index < 1 || $index > 80 || !is_int($index)) return false;
		if($filterAnd != 'or')   $filterAnd = 'and';
		$filterField = intval($filterField);

		/* backward compatibility */
		if(in_array($filterOperator, $GLOBALS['filter_operators'])){
			$filterOperator = array_search($filterOperator, $GLOBALS['filter_operators']);
		}

		if(!in_array($filterOperator, array_keys($GLOBALS['filter_operators']))){
			$filterOperator = 'like';
		}

		if(!$filterField){
			$filterOperator = '';
			$filterValue = '';
		}

		$_REQUEST['FilterAnd'][$index] = $filterAnd;
		$_REQUEST['FilterField'][$index] = $filterField;
		$_REQUEST['FilterOperator'][$index] = $filterOperator;
		$_REQUEST['FilterValue'][$index] = $filterValue;

		return true;
	}

	#########################################################

	function clearFilters(){
		for($i=1; $i<=80; $i++){
			addFilter($i, '', 0, '', '');
		}
	}

	#########################################################

	if(!function_exists('str_ireplace')){
		function str_ireplace($search, $replace, $subject){
			$ret=$subject;
			if(is_array($search)){
				for($i=0; $i<count($search); $i++){
					$ret=str_ireplace($search[$i], $replace[$i], $ret);
				}
			}else{
				$ret=preg_replace('/'.preg_quote($search, '/').'/i', $replace, $ret);
			}

			return $ret;
		} 
	} 

	#########################################################

	/**
	* Loads a given view from the templates folder, passing the given data to it
	* @param $view the name of a php file (without extension) to be loaded from the 'templates' folder
	* @param $the_data_to_pass_to_the_view (optional) associative array containing the data to pass to the view
	* @return the output of the parsed view as a string
	*/
	function loadView($view, $the_data_to_pass_to_the_view=false){
		global $Translation;

		$view = dirname(__FILE__)."/templates/$view.php";
		if(!is_file($view)) return false;

		if(is_array($the_data_to_pass_to_the_view)){
			foreach($the_data_to_pass_to_the_view as $k => $v)
				$$k = $v;
		}
		unset($the_data_to_pass_to_the_view, $k, $v);

		ob_start();
		@include($view);
		$out=ob_get_contents();
		ob_end_clean();

		return $out;
	}

	#########################################################

	/**
	* Loads a table template from the templates folder, passing the given data to it
	* @param $table_name the name of the table whose template is to be loaded from the 'templates' folder
	* @param $the_data_to_pass_to_the_table associative array containing the data to pass to the table template
	* @return the output of the parsed table template as a string
	*/
	function loadTable($table_name, $the_data_to_pass_to_the_table = array()){
		$dont_load_header = $the_data_to_pass_to_the_table['dont_load_header'];
		$dont_load_footer = $the_data_to_pass_to_the_table['dont_load_footer'];

		$header = $table = $footer = '';

		if(!$dont_load_header){
			// try to load tablename-header
			if(!($header = loadView("{$table_name}-header", $the_data_to_pass_to_the_table))){
				$header = loadView('table-common-header', $the_data_to_pass_to_the_table);
			}
		}

		$table = loadView($table_name, $the_data_to_pass_to_the_table);

		if(!$dont_load_footer){
			// try to load tablename-footer
			if(!($footer = loadView("{$table_name}-footer", $the_data_to_pass_to_the_table))){
				$footer = loadView('table-common-footer', $the_data_to_pass_to_the_table);
			}
		}

		return "{$header}{$table}{$footer}";
	}

	#########################################################

	function filterDropdownBy($filterable, $filterers, $parentFilterers, $parentPKField, $parentCaption, $parentTable, &$filterableCombo){
		$filterersArray = explode(',', $filterers);
		$parentFilterersArray = explode(',', $parentFilterers);
		$parentFiltererList = '`' . implode('`, `', $parentFilterersArray) . '`';
		$res=sql("SELECT `$parentPKField`, $parentCaption, $parentFiltererList FROM `$parentTable` ORDER BY 2", $eo);
		$filterableData = array();
		while($row=db_fetch_row($res)){
			$filterableData[$row[0]] = $row[1];
			$filtererIndex = 0;
			foreach($filterersArray as $filterer){
				$filterableDataByFilterer[$filterer][$row[$filtererIndex + 2]][$row[0]] = $row[1];
				$filtererIndex++;
			}
			$row[0] = addslashes($row[0]);
			$row[1] = addslashes($row[1]);
			$jsonFilterableData .= "\"{$row[0]}\":\"{$row[1]}\",";
		}
		$jsonFilterableData .= '}';
		$jsonFilterableData = '{'.str_replace(',}', '}', $jsonFilterableData);     
		$filterJS = "\nvar {$filterable}_data = $jsonFilterableData;";

		foreach($filterersArray as $filterer){
			if(is_array($filterableDataByFilterer[$filterer])) foreach($filterableDataByFilterer[$filterer] as $filtererItem => $filterableItem){
				$jsonFilterableDataByFilterer[$filterer] .= '"'.addslashes($filtererItem).'":{';
				foreach($filterableItem as $filterableItemID => $filterableItemData){
					$jsonFilterableDataByFilterer[$filterer] .= '"'.addslashes($filterableItemID).'":"'.addslashes($filterableItemData).'",';
				}
				$jsonFilterableDataByFilterer[$filterer] .= '},';
			}
			$jsonFilterableDataByFilterer[$filterer] .= '}';
			$jsonFilterableDataByFilterer[$filterer] = '{'.str_replace(',}', '}', $jsonFilterableDataByFilterer[$filterer]);

			$filterJS.="\n\n// code for filtering {$filterable} by {$filterer}\n";
			$filterJS.="\nvar {$filterable}_data_by_{$filterer} = {$jsonFilterableDataByFilterer[$filterer]}; ";
			$filterJS.="\nvar selected_{$filterable} = \$j('#{$filterable}').val();";
			$filterJS.="\nvar {$filterable}_change_by_{$filterer} = function(){";
			$filterJS.="\n\t$('{$filterable}').options.length=0;";
			$filterJS.="\n\t$('{$filterable}').options[0] = new Option();";
			$filterJS.="\n\tif(\$j('#{$filterer}').val()){";
			$filterJS.="\n\t\tfor({$filterable}_item in {$filterable}_data_by_{$filterer}[\$j('#{$filterer}').val()]){";
			$filterJS.="\n\t\t\t$('{$filterable}').options[$('{$filterable}').options.length] = new Option(";
			$filterJS.="\n\t\t\t\t{$filterable}_data_by_{$filterer}[\$j('#{$filterer}').val()][{$filterable}_item],";
			$filterJS.="\n\t\t\t\t{$filterable}_item,";
			$filterJS.="\n\t\t\t\t({$filterable}_item == selected_{$filterable} ? true : false),";
			$filterJS.="\n\t\t\t\t({$filterable}_item == selected_{$filterable} ? true : false)";
			$filterJS.="\n\t\t\t);";
			$filterJS.="\n\t\t}";
			$filterJS.="\n\t}else{";
			$filterJS.="\n\t\tfor({$filterable}_item in {$filterable}_data){";
			$filterJS.="\n\t\t\t$('{$filterable}').options[$('{$filterable}').options.length] = new Option(";
			$filterJS.="\n\t\t\t\t{$filterable}_data[{$filterable}_item],";
			$filterJS.="\n\t\t\t\t{$filterable}_item,";
			$filterJS.="\n\t\t\t\t({$filterable}_item == selected_{$filterable} ? true : false),";
			$filterJS.="\n\t\t\t\t({$filterable}_item == selected_{$filterable} ? true : false)";
			$filterJS.="\n\t\t\t);";
			$filterJS.="\n\t\t}";
			$filterJS.="\n\t\tif(selected_{$filterable} && selected_{$filterable} == \$j('#{$filterable}').val()){";
			$filterJS.="\n\t\t\tfor({$filterer}_item in {$filterable}_data_by_{$filterer}){";
			$filterJS.="\n\t\t\t\tfor({$filterable}_item in {$filterable}_data_by_{$filterer}[{$filterer}_item]){";
			$filterJS.="\n\t\t\t\t\tif({$filterable}_item == selected_{$filterable}){";
			$filterJS.="\n\t\t\t\t\t\t$('{$filterer}').value = {$filterer}_item;";
			$filterJS.="\n\t\t\t\t\t\tbreak;";
			$filterJS.="\n\t\t\t\t\t}";
			$filterJS.="\n\t\t\t\t}";
			$filterJS.="\n\t\t\t\tif({$filterable}_item == selected_{$filterable}) break;";
			$filterJS.="\n\t\t\t}";
			$filterJS.="\n\t\t}";
			$filterJS.="\n\t}";
			$filterJS.="\n\t$('{$filterable}').highlight();";
			$filterJS.="\n};";
			$filterJS.="\n$('{$filterer}').observe('change', function(){ /* */ window.setTimeout({$filterable}_change_by_{$filterer}, 25); });";
			$filterJS.="\n";
		}

		$filterableCombo = new Combo;
		$filterableCombo->ListType = 0;
		$filterableCombo->ListItem = array_slice(array_values($filterableData), 0, 10);
		$filterableCombo->ListData = array_slice(array_keys($filterableData), 0, 10);
		$filterableCombo->SelectName = $filterable;
		$filterableCombo->AllowNull = true;

		return $filterJS;
	}

	#########################################################
	function br2nl($text){
		return  preg_replace('/\<br(\s*)?\/?\>/i', "\n", $text);
	}

	#########################################################

	if(!function_exists('htmlspecialchars_decode')){
		function htmlspecialchars_decode($string, $quote_style = ENT_COMPAT){
			return strtr($string, array_flip(get_html_translation_table(HTML_SPECIALCHARS, $quote_style)));
		}
	}

	#########################################################

	function entitiesToUTF8($input){
		return preg_replace_callback('/(&#[0-9]+;)/', '_toUTF8', $input);
	}

	function _toUTF8($m){
		if(function_exists('mb_convert_encoding')){
			return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES");
		}else{
			return $m[1];
		}
	}

	#########################################################

	function func_get_args_byref() {
		if(!function_exists('debug_backtrace')) return false;

		$trace = debug_backtrace();
		return $trace[1]['args'];
	}

	#########################################################

	function permissions_sql($table, $level = 'all'){
		if(!in_array($level, array('user', 'group'))){ $level = 'all'; }
		$perm = getTablePermissions($table);
		$from = '';
		$where = '';
		$pk = getPKFieldName($table);

		if($perm[2] == 1 || ($perm[2] > 1 && $level == 'user')){ // view owner only
			$from = 'membership_userrecords';
			$where = "(`$table`.`$pk`=membership_userrecords.pkValue and membership_userrecords.tableName='$table' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."')";
		}elseif($perm[2] == 2 || ($perm[2] > 2 && $level == 'group')){ // view group only
			$from = 'membership_userrecords';
			$where = "(`$table`.`$pk`=membership_userrecords.pkValue and membership_userrecords.tableName='$table' and membership_userrecords.groupID='".getLoggedGroupID()."')";
		}elseif($perm[2] == 3){ // view all
			// no further action
		}elseif($perm[2] == 0){ // view none
			return false;
		}

		return array('where' => $where, 'from' => $from, 0 => $where, 1 => $from);
	}

	#########################################################

	function error_message($msg, $back_url = '', $full_page = true){
		$curr_dir = dirname(__FILE__);
		global $Translation;

		ob_start();

		if($full_page) include_once($curr_dir . '/header.php');

		echo '<div class="panel panel-danger">';
			echo '<div class="panel-heading"><h3 class="panel-title">' . $Translation['error:'] . '</h3></div>';
			echo '<div class="panel-body"><p class="text-danger">' . $msg . '</p>';
			if($back_url !== false){ // explicitly passing false suppresses the back link completely
				echo '<div class="text-center">';
				if($back_url){
					echo '<a href="' . $back_url . '" class="btn btn-danger btn-lg vspacer-lg"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['< back'] . '</a>';
				}else{
					echo '<a href="#" class="btn btn-danger btn-lg vspacer-lg" onclick="history.go(-1); return false;"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['< back'] . '</a>';
				}
				echo '</div>';
			}
			echo '</div>';
		echo '</div>';

		if($full_page) include_once($curr_dir . '/footer.php');

		$out = ob_get_contents();
		ob_end_clean();

		return $out;
	}

	#########################################################

	function toMySQLDate($formattedDate, $sep = datalist_date_separator, $ord = datalist_date_format){
		// extract date elements
		$de=explode($sep, $formattedDate);
		$mySQLDate=intval($de[strpos($ord, 'Y')]).'-'.intval($de[strpos($ord, 'm')]).'-'.intval($de[strpos($ord, 'd')]);
		return $mySQLDate;
	}

	#########################################################

	function reIndex(&$arr){
		$i=1;
		foreach($arr as $n=>$v){
			$arr2[$i]=$n;
			$i++;
		}
		return $arr2;
	}

	#########################################################

	function get_embed($provider, $url, $max_width = '', $max_height = '', $retrieve = 'html'){
		global $Translation;
		if(!$url) return '';

		$providers = array(
			'youtube' => array('oembed' => 'http://www.youtube.com/oembed?'),
			'googlemap' => array('oembed' => '', 'regex' => '/^http.*\.google\..*maps/i')
		);

		if(!isset($providers[$provider])){
			return '<div class="text-danger">' . $Translation['invalid provider'] . '</div>';
		}

		if(isset($providers[$provider]['regex']) && !preg_match($providers[$provider]['regex'], $url)){
			return '<div class="text-danger">' . $Translation['invalid url'] . '</div>';
		}

		if($providers[$provider]['oembed']){
			$oembed = $providers[$provider]['oembed'] . 'url=' . urlencode($url) . "&maxwidth={$max_width}&maxheight={$max_height}&format=json";
			$data_json = request_cache($oembed);

			$data = json_decode($data_json, true);
			if($data === null){
				/* an error was returned rather than a json string */
				if($retrieve == 'html') return "<div class=\"text-danger\">{$data_json}\n<!-- {$oembed} --></div>";
				return '';
			}

			return (isset($data[$retrieve]) ? $data[$retrieve] : $data['html']);
		}

		/* special cases (where there is no oEmbed provider) */
		if($provider == 'googlemap') return get_embed_googlemap($url, $max_width, $max_height, $retrieve);

		return '<div class="text-danger">Invalid provider!</div>';
	}

	#########################################################

	function get_embed_googlemap($url, $max_width = '', $max_height = '', $retrieve = 'html'){
		global $Translation;
		$url_parts = parse_url($url);
		$coords_regex = '/-?\d+(\.\d+)?[,+]-?\d+(\.\d+)?(,\d{1,2}z)?/'; /* https://stackoverflow.com/questions/2660201 */

		if(preg_match($coords_regex, $url_parts['path'] . '?' . $url_parts['query'], $m)){
			list($lat, $long, $zoom) = explode(',', $m[0]);
			$zoom = intval($zoom);
			if(!$zoom) $zoom = 10; /* default zoom */
			if(!$max_height) $max_height = 360;
			if(!$max_width) $max_width = 480;

			$api_key = 'AIzaSyDY0xL4RTIZHOrWbJFHilhLMjTI4A61QiA';
			$embed_url = "https://www.google.com/maps/embed/v1/view?key={$api_key}&center={$lat},{$long}&zoom={$zoom}&maptype=roadmap";
			$thumbnail_url = "https://maps.googleapis.com/maps/api/staticmap?key={$api_key}&center={$lat},{$long}&zoom={$zoom}&maptype=roadmap&size={$max_width}x{$max_height}";

			if($retrieve == 'html'){
				return "<iframe width=\"{$max_width}\" height=\"{$max_height}\" frameborder=\"0\" style=\"border:0\" src=\"{$embed_url}\"></iframe>";
			}else{
				return $thumbnail_url;
			}
		}else{
			return '<div class="text-danger">' . $Translation['cant retrieve coordinates from url'] . '</div>';
		}
	}

	#########################################################

	function request_cache($request, $force_fetch = false){
		$max_cache_lifetime = 7 * 86400; /* max cache lifetime in seconds before refreshing from source */

		/* membership_cache table exists? if not, create it */
		static $cache_table_exists = false;
		if(!$cache_table_exists && !$force_fetch){
			$te = sqlValue("show tables like 'membership_cache'");
			if(!$te){
				if(!sql("CREATE TABLE `membership_cache` (`request` VARCHAR(100) NOT NULL, `request_ts` INT, `response` TEXT NOT NULL, PRIMARY KEY (`request`))", $eo)){
					/* table can't be created, so force fetching request */
					return request_cache($request, true);
				}
			}
			$cache_table_exists = true;
		}

		/* retrieve response from cache if exists */
		if(!$force_fetch){
			$res = sql("select response, request_ts from membership_cache where request='" . md5($request) . "'", $eo);
			if(!$row = db_fetch_array($res)) return request_cache($request, true);

			$response = $row[0];
			$response_ts = $row[1];
			if($response_ts < time() - $max_cache_lifetime) return request_cache($request, true);
		}

		/* if no response in cache, issue a request */
		if(!$response || $force_fetch){
			$response = @file_get_contents($request);
			if($response === false){
				$error = error_get_last();
				$error_message = preg_replace('/.*: (.*)/', '$1', $error['message']);
				return $error_message;
			}elseif($cache_table_exists){
				/* store response in cache */
				$ts = time();
				sql("replace into membership_cache set request='" . md5($request) . "', request_ts='{$ts}', response='" . makeSafe($response, false) . "'", $eo);
			}
		}

		return $response;
	}

	#########################################################

	function check_record_permission($table, $id, $perm = 'view'){
		if($perm != 'edit' && $perm != 'delete') $perm = 'view';

		$perms = getTablePermissions($table);
		if(!$perms[$perm]) return false;

		$safe_id = makeSafe($id);
		$safe_table = makeSafe($table);

		if($perms[$perm] == 1){ // own records only
			$username = getLoggedMemberID();
			$owner = sqlValue("select memberID from membership_userrecords where tableName='{$safe_table}' and pkValue='{$safe_id}'");
			if($owner == $username) return true;
		}elseif($perms[$perm] == 2){ // group records
			$group_id = getLoggedGroupID();
			$owner_group_id = sqlValue("select groupID from membership_userrecords where tableName='{$safe_table}' and pkValue='{$safe_id}'");
			if($owner_group_id == $group_id) return true;
		}elseif($perms[$perm] == 3){ // all records
			return true;
		}

		return false;
	}

	#########################################################

	function NavMenus($options = array()){
		if(!defined('PREPEND_PATH')) define('PREPEND_PATH', '');
		global $Translation;
		$prepend_path = PREPEND_PATH;

		/* default options */
		if(empty($options)){
			$options = array(
				'tabs' => 7
			);
		}

		$table_group_name = array_keys(get_table_groups()); /* 0 => group1, 1 => group2 .. */
		/* if only one group named 'None', set to translation of 'select a table' */
		if((count($table_group_name) == 1 && $table_group_name[0] == 'None') || count($table_group_name) < 1) $table_group_name[0] = $Translation['select a table'];
		$table_group_index = array_flip($table_group_name); /* group1 => 0, group2 => 1 .. */
		$menu = array_fill(0, count($table_group_name), '');

		$t = time();
		$arrTables = getTableList();
		if(is_array($arrTables)){
			foreach($arrTables as $tn => $tc){
				/* ---- list of tables where hide link in nav menu is set ---- */
				$tChkHL = array_search($tn, array('class_story_path'));

				/* ---- list of tables where filter first is set ---- */
				$tChkFF = array_search($tn, array());
				if($tChkFF !== false && $tChkFF !== null){
					$searchFirst = '&Filter_x=1';
				}else{
					$searchFirst = '';
				}

				/* when no groups defined, $table_group_index['None'] is NULL, so $menu_index is still set to 0 */
				$menu_index = intval($table_group_index[$tc[3]]);
				if(!$tChkHL && $tChkHL !== 0) $menu[$menu_index] .= "<li><a href=\"{$prepend_path}{$tn}_view.php?t={$t}{$searchFirst}\"><img src=\"{$prepend_path}" . ($tc[2] ? $tc[2] : 'blank.gif') . "\" height=\"32\"> {$tc[0]}</a></li>";
			}
		}

		// custom nav links, as defined in "hooks/links-navmenu.php" 
		global $navLinks;
		if(is_array($navLinks)){
			$memberInfo = getMemberInfo();
			$links_added = array();
			foreach($navLinks as $link){
				if(!isset($link['url']) || !isset($link['title'])) continue;
				if($memberInfo['admin'] || @in_array($memberInfo['group'], $link['groups']) || @in_array('*', $link['groups'])){
					$menu_index = intval($link['table_group']);
					if(!$links_added[$menu_index]) $menu[$menu_index] .= '<li class="divider"></li>';

					/* add prepend_path to custom links if they aren't absolute links */
					if(!preg_match('/^(http|\/\/)/i', $link['url'])) $link['url'] = $prepend_path . $link['url'];
					if(!preg_match('/^(http|\/\/)/i', $link['icon']) && $link['icon']) $link['icon'] = $prepend_path . $link['icon'];

					$menu[$menu_index] .= "<li><a href=\"{$link['url']}\"><img src=\"" . ($link['icon'] ? $link['icon'] : "{$prepend_path}blank.gif") . "\" height=\"32\"> {$link['title']}</a></li>";
					$links_added[$menu_index]++;
				}
			}
		}

		$menu_wrapper = '';
		for($i = 0; $i < count($menu); $i++){
			$menu_wrapper .= <<<EOT
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{$table_group_name[$i]} <b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu">{$menu[$i]}</ul>
				</li>
EOT;
		}

		return $menu_wrapper;
	}

	#########################################################

	function StyleSheet(){
		if(!defined('PREPEND_PATH')) define('PREPEND_PATH', '');
		$prepend_path = PREPEND_PATH;

		$css_links = <<<EOT

			<link rel="stylesheet" href="{$prepend_path}resources/initializr/css/cyborg.css">
			<link rel="stylesheet" href="{$prepend_path}resources/lightbox/css/lightbox.css" media="screen">
			<link rel="stylesheet" href="{$prepend_path}resources/select2/select2.css" media="screen">
			<link rel="stylesheet" href="{$prepend_path}resources/timepicker/bootstrap-timepicker.min.css" media="screen">
			<link rel="stylesheet" href="{$prepend_path}dynamic.css.php">
EOT;

		return $css_links;
	}

	#########################################################

	function getUploadDir($dir){
		global $Translation;

		if($dir==""){
			$dir=$Translation['ImageFolder'];
		}

		if(substr($dir, -1)!="/"){
			$dir.="/";
		}

		return $dir;
	}

	#########################################################

	function PrepareUploadedFile($FieldName, $MaxSize, $FileTypes = 'jpg|jpeg|gif|png', $NoRename = false, $dir = ''){
		global $Translation;
		$f = $_FILES[$FieldName];
		if($f['error'] == 4 || !$f['name']) return '';

		$dir = getUploadDir($dir);

		/* get php.ini upload_max_filesize in bytes */
		$php_upload_size_limit = trim(ini_get('upload_max_filesize'));
		$last = strtolower($php_upload_size_limit[strlen($php_upload_size_limit) - 1]);
		switch($last){
			case 'g':
				$php_upload_size_limit *= 1024;
			case 'm':
				$php_upload_size_limit *= 1024;
			case 'k':
				$php_upload_size_limit *= 1024;
		}

		$MaxSize = min($MaxSize, $php_upload_size_limit);

		if($f['size'] > $MaxSize || $f['error']){
			echo error_message(str_replace('<MaxSize>', intval($MaxSize / 1024), $Translation['file too large']));
			exit;
		}
		if(!preg_match('/\.(' . $FileTypes . ')$/i', $f['name'], $ft)){
			echo error_message(str_replace('<FileTypes>', str_replace('|', ', ', $FileTypes), $Translation['invalid file type']));
			exit;
		}

		$name = str_replace(' ', '_', $f['name']);
		if(!$NoRename) $name = substr(md5(microtime() . rand(0, 100000)), -17) . $ft[0];

		if(!file_exists($dir)) @mkdir($dir, 0777);

		if(!@move_uploaded_file($f['tmp_name'], $dir . $name)){
			echo error_message("Couldn't save the uploaded file. Try chmoding the upload folder '{$dir}' to 777.");
			exit;
		}

		@chmod($dir . $name, 0666);
		return $name;
	}

	#########################################################

	function get_home_links($homeLinks, $default_classes, $tgroup = ''){
		if(!is_array($homeLinks) || !count($homeLinks)) return '';

		$memberInfo = getMemberInfo();

		ob_start();
		foreach($homeLinks as $link){
			if(!isset($link['url']) || !isset($link['title'])) continue;
			if($tgroup != $link['table_group'] && $tgroup != '*') continue;

			/* fall-back classes if none defined */
			if(!$link['grid_column_classes']) $link['grid_column_classes'] = $default_classes['grid_column'];
			if(!$link['panel_classes']) $link['panel_classes'] = $default_classes['panel'];
			if(!$link['link_classes']) $link['link_classes'] = $default_classes['link'];

			if($memberInfo['admin'] || @in_array($memberInfo['group'], $link['groups']) || @in_array('*', $link['groups'])){
				?>
				<div class="col-xs-12 <?php echo $link['grid_column_classes']; ?>">
					<div class="panel <?php echo $link['panel_classes']; ?>">
						<div class="panel-body">
							<a class="btn btn-block btn-lg <?php echo $link['link_classes']; ?>" title="<?php echo preg_replace("/&amp;(#[0-9]+|[a-z]+);/i", "&$1;", html_attr(strip_tags($link['description']))); ?>" href="<?php echo $link['url']; ?>"><?php echo ($link['icon'] ? '<img src="' . $link['icon'] . '">' : ''); ?><strong><?php echo $link['title']; ?></strong></a>
							<div class="panel-body-description"><?php echo $link['description']; ?></div>
						</div>
					</div>
				</div>
				<?php
			}
		}

		$html = ob_get_contents();
		ob_end_clean();

		return $html;
	}

	#########################################################

	function quick_search_html($search_term, $label, $separate_dv = true){
		global $Translation;

		$safe_search = html_attr($search_term);
		$safe_label = html_attr($label);
		$safe_clear_label = html_attr($Translation['Reset Filters']);

		if($separate_dv){
			$reset_selection = "document.myform.SelectedID.value = '';";
		}else{
			$reset_selection = "document.myform.writeAttribute('novalidate', 'novalidate');";
		}
		$reset_selection .= ' document.myform.NoDV.value=1; return true;';

		$html = <<<EOT
		<div class="input-group" id="quick-search">
			<input type="text" id="SearchString" name="SearchString" value="{$safe_search}" class="form-control" placeholder="{$safe_label}">
			<span class="input-group-btn">
				<button name="Search_x" value="1" id="Search" type="submit" onClick="{$reset_selection}" class="btn btn-default" title="{$safe_label}"><i class="glyphicon glyphicon-search"></i></button>
				<button name="ClearQuickSearch" value="1" id="ClearQuickSearch" type="submit" onClick="\$j('#SearchString').val(''); {$reset_selection}" class="btn btn-default" title="{$safe_clear_label}"><i class="glyphicon glyphicon-remove-circle"></i></button>
			</span>
		</div>
EOT;
		return $html;
	}

	#########################################################

