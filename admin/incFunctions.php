<?php
	########################################################################
	/*
	~~~~~~ LIST OF FUNCTIONS ~~~~~~
		set_headers() -- sets HTTP headers (encoding, same-origin frame policy, .. etc)
		getTableList() -- returns an associative array of all tables in this application in the format tableName=>tableCaption
		getThumbnailSpecs($tableName, $fieldName, $view) -- returns an associative array specifying the width, height and identifier of the thumbnail file.
		createThumbnail($img, $specs) -- $specs is an array as returned by getThumbnailSpecs(). Returns true on success, false on failure.
		makeSafe($string)
		checkPermissionVal($pvn)
		sql($statment, $o)
		sqlValue($statment)
		getLoggedAdmin()
		checkUser($username, $password)
		logOutUser()
		getPKFieldName($tn)
		getCSVData($tn, $pkValue, $stripTag=true)
		errorMsg($msg)
		redirect($URL, $absolute=FALSE)
		htmlRadioGroup($name, $arrValue, $arrCaption, $selectedValue, $selClass="", $class="", $separator="<br>")
		htmlSelect($name, $arrValue, $arrCaption, $selectedValue, $class="", $selectedClass="")
		htmlSQLSelect($name, $sql, $selectedValue, $class="", $selectedClass="")
		isEmail($email) -- returns $email if valid or false otherwise.
		notifyMemberApproval($memberID) -- send an email to member acknowledging his approval by admin, returns false if no mail is sent
		setupMembership() -- check if membership tables exist or not. If not, create them.
		thisOr($this_val, $or) -- return $this_val if it has a value, or $or if not.
		getUploadedFile($FieldName, $MaxSize=0, $FileTypes='csv|txt', $NoRename=false, $dir='')
		toBytes($val)
		convertLegacyOptions($CSVList)
		getValueGivenCaption($query, $caption)
		undo_magic_quotes($str)
		time24($t) -- return time in 24h format
		time12($t) -- return time in 12h format
		application_url($page) -- return absolute URL of provided page
		is_ajax() -- return true if this is an ajax request, false otherwise
		array_trim($arr) -- recursively trim provided value/array
		is_allowed_username($username, $exception = false) -- returns username if valid and unique, or false otherwise (if exception is provided and same as username, no uniqueness check is performed)
		csrf_token($validate) -- csrf-proof a form
		get_plugins() -- scans for installed plugins and returns them in an array ('name', 'title', 'icon' or 'glyphicon', 'admin_path')
		maintenance_mode($new_status = '') -- retrieves (and optionally sets) maintenance mode status
		html_attr($str) -- prepare $str to be placed inside an HTML attribute
		html_attr_tags_ok($str) -- same as html_attr, but allowing HTML tags
		Request($var) -- class for providing sanitized values of given request variable (->sql, ->attr, ->html, ->url, and ->raw)
		Notification() -- class for providing a standardized html notifications functionality
		sendmail($mail) -- sends an email using PHPMailer as specified in the assoc array $mail( ['to', 'name', 'subject', 'message', 'debug'] ) and returns true on success or an error message on failure
		safe_html($str) -- sanitize HTML strings, and apply nl2br() to non-HTML ones
		get_tables_info($skip_authentication = false) -- retrieves table properties as a 2D assoc array ['table_name' => ['prop1' => 'val', ..], ..]
		getLoggedMemberID() -- returns memberID of logged member. If no login, returns anonymous memberID
		getLoggedGroupID() -- returns groupID of logged member, or anonymous groupID
		getMemberInfo() -- returns an array containing the currently signed-in member's info
		get_group_id($user = '') -- returns groupID of given user, or current one if empty
		prepare_sql_set($set_array, $glue = ', ') -- Prepares data for a SET or WHERE clause, to be used in an INSERT/UPDATE query
		insert($tn, $set_array) -- Inserts a record specified by $set_array to the given table $tn
		update($tn, $set_array, $where_array) -- Updates a record identified by $where_array to date specified by $set_array in the given table $tn
		set_record_owner($tn, $pk, $user) -- Set/update the owner of given record
		app_datetime_format($destination = 'php', $datetime = 'd') -- get date/time format string for use with one of these: 'php' (see date function), 'mysql', 'moment'. $datetime: 'd' = date, 't' = time, 'dt' = both
		mysql_datetime($app_datetime) -- converts $app_datetime to mysql-formatted datetime, 'yyyy-mm-dd H:i:s', or empty string on error
		app_datetime($mysql_datetime, $datetime = 'd') -- converts $mysql_datetime to app-formatted datetime (if 2nd param is 'dt'), or empty string on error
		to_utf8($str) -- converts string from app-configured encoding to utf8
		from_utf8($str) -- converts string from utf8 to app-configured encoding
		membership_table_functions() -- returns a list of update_membership_* functions
		configure_anonymous_group() -- sets up anonymous group and guest user if necessary
		configure_admin_group() -- sets up admins group and super admin user if necessary
		get_table_keys($tn) -- returns keys (indexes) of given table
		get_table_fields($tn) -- returns fields spec for given table
		update_membership_{tn}() -- sets up membership table tn and its indexes if necessary
		test($subject, $test) -- perform a test and return results
		invoke_method($object, $methodName, $param_array) -- invoke a private/protected method of a given object
		invoke_static_method($class, $methodName, $param_array) -- invoke a private/protected method of a given class statically
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	*/
	########################################################################
	function set_headers() {
		@header('Content-Type: text/html; charset=' . datalist_db_encoding);
		@header('X-Frame-Options: SAMEORIGIN'); // prevent iframing by other sites to prevent clickjacking
	}
	########################################################################
	function get_tables_info($skip_authentication = false){
		static $all_tables = array(), $accessible_tables = array();

		/* return cached results, if found */
		if(($skip_authentication || getLoggedAdmin()) && count($all_tables)) return $all_tables;
		if(!$skip_authentication && count($accessible_tables)) return $accessible_tables;

		/* table groups */
		$tg = array(
			'I. Data Sampling',
			'II. Data Preparation',
			'III. Data Encoding',
			'IV. Drama Encoding',
			'V. Storyforming',
			'VI. Analysis',
			'Library Codes',
			'Discursive Codes',
			'Dramatic Codes'
		);

		$all_tables = array(
			/* ['table_name' => [table props assoc array] */   
				'biblio_community' => array(
					'Caption' => 'I.1. Communities',
					'Description' => 'First we look for covenant communities, communities whose shared narrative linkes their material existence with a transcendent experience.',
					'tableIcon' => 'resources/table_icons/tower.png',
					'group' => $tg[0],
					'homepageShowCount' => 0
				),
				'biblio_author' => array(
					'Caption' => 'I.2. Authors',
					'Description' => 'At sampling level II, collect all the authors of autobiographical texts, as well as related persons, here, with an emergent sampling strategy.',
					'tableIcon' => 'resources/table_icons/user_edit.png',
					'group' => $tg[0],
					'homepageShowCount' => 1
				),
				'biblio_doc' => array(
					'Caption' => 'I.3. Corpus',
					'Description' => 'At level III, collect autobiographical writings as part of the text corpus.',
					'tableIcon' => 'resources/table_icons/books.png',
					'group' => $tg[0],
					'homepageShowCount' => 1
				),
				'biblio_transcript' => array(
					'Caption' => 'II.1. Transcripts',
					'Description' => 'Part of the preparation requires to transcribe all handwritten manuscrips, and to make all text avaible for OCR.',
					'tableIcon' => 'resources/table_icons/book_edit.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'biblio_token' => array(
					'Caption' => 'II.2. Tokens',
					'Description' => 'After transcription, the data are ready to be tokenized. Use Voyant Tools for this purpose.',
					'tableIcon' => 'resources/table_icons/book_key.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'code_invivo' => array(
					'Caption' => 'III.1. Invivo',
					'Description' => 'Start encoding the data based on invivo; dates, places, names.',
					'tableIcon' => 'resources/table_icons/book_link.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'code_herme' => array(
					'Caption' => 'III.2. Hermeneutic',
					'Description' => 'Based on the use of language and the context, encode the impression management and noetic interpretation.',
					'tableIcon' => 'resources/table_icons/book_next.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'chr_dev' => array(
					'Caption' => 'IV.1. Character Dev.',
					'Description' => 'Convert some of the authors in characters for the story you are telling.<br>Use character creation tools such as Dramatica Pro Character Builder to assign Elements in the correct way.',
					'tableIcon' => 'resources/table_icons/private.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'chr_scenes' => array(
					'Caption' => 'IV.2. Character scenes',
					'Description' => 'Take part of the authentic text and convert it in character scenes.',
					'tableIcon' => 'resources/table_icons/camera.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'code_encounter_scenes' => array(
					'Caption' => 'IV.4. Encounter scenes',
					'Description' => 'Select special scenes in which characters encounter with others.',
					'tableIcon' => 'resources/table_icons/comments.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'code_encounters' => array(
					'Caption' => 'IV.5. Encounters',
					'Description' => 'Combine encounter scenes of different characters into a one-to-one encounter.',
					'tableIcon' => 'resources/table_icons/arrow_refresh.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'story' => array(
					'Caption' => 'V.1. Stories',
					'Description' => 'This is your final story, which can be analysed and compared.',
					'tableIcon' => 'resources/table_icons/butterfly.png',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'storylines' => array(
					'Caption' => 'V.3. Story lines',
					'Description' => 'Weave your story along a story line.',
					'tableIcon' => 'resources/table_icons/chart_curve_edit.png',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'story_chrs' => array(
					'Caption' => 'V.2. Characters',
					'Description' => 'Encode a characters role within a story context.',
					'tableIcon' => 'resources/table_icons/map_edit.png',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'storystatic' => array(
					'Caption' => 'VI.1. Static story points',
					'Description' => 'Encode static story points.<br>They are also known  as static plot points and remain the same throughout an entire story.',
					'tableIcon' => 'resources/table_icons/application_view_tile.png',
					'group' => $tg[5],
					'homepageShowCount' => 1
				),
				'storydynamic' => array(
					'Caption' => 'VI.2. Dynamic story points',
					'Description' => 'Encode the story dynamic base on Dramatica.<br>They are the dynamic forces that will act upon the dramatic potentials to change the relationship between characters, change the course of the plot and develop the theme as the story unfolds.',
					'tableIcon' => 'resources/table_icons/areachart.png',
					'group' => $tg[5],
					'homepageShowCount' => 1
				),
				'storyweaving_scenes' => array(
					'Caption' => 'VI.3. Story weaving scenes',
					'Description' => 'Create scenes for further story weaving.',
					'tableIcon' => 'resources/table_icons/layers_map.png',
					'group' => $tg[5],
					'homepageShowCount' => 1
				),
				'class_agent_selection' => array(
					'Caption' => 'Agent selection phase',
					'Description' => 'The phase of the selection process this agent belong to and the strategy used.',
					'tableIcon' => 'table.gif',
					'group' => $tg[6],
					'homepageShowCount' => 0
				),
				'class_agent_type1' => array(
					'Caption' => 'Agent type 1',
					'Description' => 'Use this category for strategic sampling groups.',
					'tableIcon' => 'resources/table_icons/group_key.png',
					'group' => $tg[6],
					'homepageShowCount' => 1
				),
				'class_agent_type2' => array(
					'Caption' => 'Agent type 2',
					'Description' => 'Use this category for strategic sampling groups.',
					'tableIcon' => 'resources/table_icons/group_key.png',
					'group' => $tg[6],
					'homepageShowCount' => 1
				),
				'class_gender' => array(
					'Caption' => 'Gender',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[6],
					'homepageShowCount' => 0
				),
				'class_authority_agent' => array(
					'Caption' => 'Agent authority code',
					'Description' => 'Set here the code that assigns a unique identifier to the historical persons.',
					'tableIcon' => 'resources/table_icons/barcode.png',
					'group' => $tg[6],
					'homepageShowCount' => 1
				),
				'class_evaluation' => array(
					'Caption' => 'Evaluation phase',
					'Description' => 'The level of certainty the associated data have and who proved them.',
					'tableIcon' => 'table.gif',
					'group' => $tg[6],
					'homepageShowCount' => 0
				),
				'class_bibliography_type' => array(
					'Caption' => 'Text type',
					'Description' => 'Classify your text.',
					'tableIcon' => 'resources/table_icons/align_center.png',
					'group' => $tg[6],
					'homepageShowCount' => 1
				),
				'class_bibliography_genre' => array(
					'Caption' => 'Genre',
					'Description' => 'Define a genre.',
					'tableIcon' => 'resources/table_icons/text_drama.png',
					'group' => $tg[6],
					'homepageShowCount' => 1
				),
				'class_authority_library' => array(
					'Caption' => 'Text authority code',
					'Description' => 'Set here the code that assigns a unique identifier to the text.',
					'tableIcon' => 'resources/table_icons/barcode.png',
					'group' => $tg[6],
					'homepageShowCount' => 1
				),
				'class_rights' => array(
					'Caption' => 'IP Rigths',
					'Description' => 'Define the intelectual property right of the corpus.',
					'tableIcon' => 'resources/table_icons/balance_unbalance.png',
					'group' => $tg[6],
					'homepageShowCount' => 1
				),
				'class_language' => array(
					'Caption' => 'Document Language',
					'Description' => 'Languages for documents.',
					'tableIcon' => 'resources/table_icons/arrow_switch.png',
					'group' => $tg[6],
					'homepageShowCount' => 1
				),
				'class_story_collab_type' => array(
					'Caption' => 'Collaboration type',
					'Description' => 'What level of collaboration used to write the story.',
					'tableIcon' => 'table.gif',
					'group' => $tg[8],
					'homepageShowCount' => 0
				),
				'class_story_acts' => array(
					'Caption' => 'Story acts',
					'Description' => 'Structure your story along acts.<br>They are the largest sequential increments by which the progress of a story is measured.',
					'tableIcon' => 'table.gif',
					'group' => $tg[8],
					'homepageShowCount' => 0
				),
				'class_story_path' => array(
					'Caption' => 'Story pathes',
					'Description' => 'I am not sure what I used this for.',
					'tableIcon' => 'table.gif',
					'group' => $tg[8],
					'homepageShowCount' => 0
				),
				'class_dramatica_steps' => array(
					'Caption' => 'Steps',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[8],
					'homepageShowCount' => 0
				),
				'class_dramatica_throughline' => array(
					'Caption' => 'Throughlines',
					'Description' => 'Throughlines as defined by Dramatica.<br>A Throughline is a sequence of story points within a single perspective.',
					'tableIcon' => 'resources/table_icons/participation_rate.png',
					'group' => $tg[8],
					'homepageShowCount' => 1
				),
				'class_dramatica_signpost' => array(
					'Caption' => 'Signposts',
					'Description' => 'Sequential markers of a story\'s progress that indicate the kind of concern central to each throughline in each Act.',
					'tableIcon' => 'table.gif',
					'group' => $tg[8],
					'homepageShowCount' => 0
				),
				'class_dramatica_domain' => array(
					'Caption' => 'Domains',
					'Description' => 'As defined  by Dramatica.',
					'tableIcon' => 'resources/table_icons/flood_it.png',
					'group' => $tg[8],
					'homepageShowCount' => 1
				),
				'class_dramatica_concern' => array(
					'Caption' => 'Concerns',
					'Description' => 'As defined  by Dramatica.',
					'tableIcon' => 'resources/table_icons/server_components.png',
					'group' => $tg[8],
					'homepageShowCount' => 1
				),
				'class_dramatica_issue' => array(
					'Caption' => 'Issues',
					'Description' => 'As defined  by Dramatica.',
					'tableIcon' => 'resources/table_icons/winrar_view.png',
					'group' => $tg[8],
					'homepageShowCount' => 1
				),
				'class_dramatica_themes' => array(
					'Caption' => 'Themes',
					'Description' => 'Themes as defined by Dramatica.',
					'tableIcon' => 'resources/table_icons/barchart.png',
					'group' => $tg[8],
					'homepageShowCount' => 1
				),
				'class_dramatica_archetype' => array(
					'Caption' => 'Archetypes',
					'Description' => 'Archetypes as defined by Dramatica.',
					'tableIcon' => 'resources/table_icons/application_view_icons.png',
					'group' => $tg[8],
					'homepageShowCount' => 1
				),
				'class_dramatica_character' => array(
					'Caption' => 'Class dramatica character',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[8],
					'homepageShowCount' => 0
				),
				'class_character_element' => array(
					'Caption' => 'Character elements',
					'Description' => 'Character elements as defined by Dramatica.',
					'tableIcon' => 'resources/table_icons/application_view_gallery.png',
					'group' => $tg[8],
					'homepageShowCount' => 1
				),
				'class_dramatica_storypoints1' => array(
					'Caption' => 'Class dramatica storypoints 1',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[8],
					'homepageShowCount' => 0
				),
				'class_dramatica_storypoints2' => array(
					'Caption' => 'Class dramatica storypoints 2',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[8],
					'homepageShowCount' => 0
				),
				'class_dramatica_storypoints3' => array(
					'Caption' => 'Class dramatica storypoints 3',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[8],
					'homepageShowCount' => 0
				),
				'class_dynamicstorypoints' => array(
					'Caption' => 'Class dynamicstorypoints',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[8],
					'homepageShowCount' => 0
				),
				'class_im' => array(
					'Caption' => 'Impressions',
					'Description' => 'Impressions as defined by Goffmanian impression management.',
					'tableIcon' => 'resources/table_icons/3d_glasses.png',
					'group' => $tg[7],
					'homepageShowCount' => 1
				),
				'class_pc' => array(
					'Caption' => 'Performative contradiction',
					'Description' => 'Performative contradiction, types and definitions according to Chapman et al.(2013).',
					'tableIcon' => 'table.gif',
					'group' => $tg[7],
					'homepageShowCount' => 0
				),
				'class_nt' => array(
					'Caption' => 'Noetic tension',
					'Description' => 'Impressions as defined by Franklian logotherapy.',
					'tableIcon' => 'resources/table_icons/application_lightning.png',
					'group' => $tg[7],
					'homepageShowCount' => 1
				),
				'dictionary' => array(
					'Caption' => 'Dictionary',
					'Description' => 'A general reference database for terminology.',
					'tableIcon' => 'resources/table_icons/books.png',
					'group' => $tg[6],
					'homepageShowCount' => 1
				),
				'class_dictionary1' => array(
					'Caption' => 'Class dictionary1',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[6],
					'homepageShowCount' => 0
				),
				'class_dictionary2' => array(
					'Caption' => 'Class dictionary1',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[6],
					'homepageShowCount' => 0
				),
				'class_dictionary3' => array(
					'Caption' => 'Class dictionary1',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[6],
					'homepageShowCount' => 0
				),
				'class_dictionary4' => array(
					'Caption' => 'Class dictionary1',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[6],
					'homepageShowCount' => 0
				),
				'class_dictionary5' => array(
					'Caption' => 'Class dictionary1',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[6],
					'homepageShowCount' => 0
				)
		);

		if($skip_authentication || getLoggedAdmin()) return $all_tables;

		foreach($all_tables as $tn => $ti){
			$arrPerm = getTablePermissions($tn);
			if($arrPerm[0]) $accessible_tables[$tn] = $ti;
		}

		return $accessible_tables;
	}
	#########################################################
	if(!function_exists('getTableList')){
		function getTableList($skip_authentication = false){
			$arrTables = array(   
				'biblio_community' => 'I.1. Communities',
				'biblio_author' => 'I.2. Authors',
				'biblio_doc' => 'I.3. Corpus',
				'biblio_transcript' => 'II.1. Transcripts',
				'biblio_token' => 'II.2. Tokens',
				'code_invivo' => 'III.1. Invivo',
				'code_herme' => 'III.2. Hermeneutic',
				'chr_dev' => 'IV.1. Character Dev.',
				'chr_scenes' => 'IV.2. Character scenes',
				'code_encounter_scenes' => 'IV.4. Encounter scenes',
				'code_encounters' => 'IV.5. Encounters',
				'story' => 'V.1. Stories',
				'storylines' => 'V.3. Story lines',
				'story_chrs' => 'V.2. Characters',
				'storystatic' => 'VI.1. Static story points',
				'storydynamic' => 'VI.2. Dynamic story points',
				'storyweaving_scenes' => 'VI.3. Story weaving scenes',
				'class_agent_selection' => 'Agent selection phase',
				'class_agent_type1' => 'Agent type 1',
				'class_agent_type2' => 'Agent type 2',
				'class_gender' => 'Gender',
				'class_authority_agent' => 'Agent authority code',
				'class_evaluation' => 'Evaluation phase',
				'class_bibliography_type' => 'Text type',
				'class_bibliography_genre' => 'Genre',
				'class_authority_library' => 'Text authority code',
				'class_rights' => 'IP Rigths',
				'class_language' => 'Document Language',
				'class_story_collab_type' => 'Collaboration type',
				'class_story_acts' => 'Story acts',
				'class_story_path' => 'Story pathes',
				'class_dramatica_steps' => 'Steps',
				'class_dramatica_throughline' => 'Throughlines',
				'class_dramatica_signpost' => 'Signposts',
				'class_dramatica_domain' => 'Domains',
				'class_dramatica_concern' => 'Concerns',
				'class_dramatica_issue' => 'Issues',
				'class_dramatica_themes' => 'Themes',
				'class_dramatica_archetype' => 'Archetypes',
				'class_dramatica_character' => 'Class dramatica character',
				'class_character_element' => 'Character elements',
				'class_dramatica_storypoints1' => 'Class dramatica storypoints 1',
				'class_dramatica_storypoints2' => 'Class dramatica storypoints 2',
				'class_dramatica_storypoints3' => 'Class dramatica storypoints 3',
				'class_dynamicstorypoints' => 'Class dynamicstorypoints',
				'class_im' => 'Impressions',
				'class_pc' => 'Performative contradiction',
				'class_nt' => 'Noetic tension',
				'dictionary' => 'Dictionary',
				'class_dictionary1' => 'Class dictionary1',
				'class_dictionary2' => 'Class dictionary1',
				'class_dictionary3' => 'Class dictionary1',
				'class_dictionary4' => 'Class dictionary1',
				'class_dictionary5' => 'Class dictionary1'
			);

			return $arrTables;
		}
	}
	########################################################################
	function getThumbnailSpecs($tableName, $fieldName, $view){
		if($tableName=='biblio_author' && $fieldName=='img' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='biblio_author' && $fieldName=='img' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='biblio_doc' && $fieldName=='img' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='biblio_doc' && $fieldName=='img' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='chr_dev' && $fieldName=='img' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='chr_dev' && $fieldName=='img' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		return FALSE;
	}
	########################################################################
	function createThumbnail($img, $specs){
		$w=$specs['width'];
		$h=$specs['height'];
		$id=$specs['identifier'];
		$path=dirname($img);

		// image doesn't exist or inaccessible?
		if(!$size=@getimagesize($img))   return FALSE;

		// calculate thumbnail size to maintain aspect ratio
		$ow=$size[0]; // original image width
		$oh=$size[1]; // original image height
		$twbh=$h/$oh*$ow; // calculated thumbnail width based on given height
		$thbw=$w/$ow*$oh; // calculated thumbnail height based on given width
		if($w && $h){
			if($twbh>$w) $h=$thbw;
			if($thbw>$h) $w=$twbh;
		}elseif($w){
			$h=$thbw;
		}elseif($h){
			$w=$twbh;
		}else{
			return FALSE;
		}

		// dir not writeable?
		if(!is_writable($path))  return FALSE;

		// GD lib not loaded?
		if(!function_exists('gd_info'))  return FALSE;
		$gd=gd_info();

		// GD lib older than 2.0?
		preg_match('/\d/', $gd['GD Version'], $gdm);
		if($gdm[0]<2)    return FALSE;

		// get file extension
		preg_match('/\.[a-zA-Z]{3,4}$/U', $img, $matches);
		$ext=strtolower($matches[0]);

		// check if supplied image is supported and specify actions based on file type
		if($ext=='.gif'){
			if(!$gd['GIF Create Support'])   return FALSE;
			$thumbFunc='imagegif';
		}elseif($ext=='.png'){
			if(!$gd['PNG Support'])  return FALSE;
			$thumbFunc='imagepng';
		}elseif($ext=='.jpg' || $ext=='.jpe' || $ext=='.jpeg'){
			if(!$gd['JPG Support'] && !$gd['JPEG Support'])  return FALSE;
			$thumbFunc='imagejpeg';
		}else{
			return FALSE;
		}

		// determine thumbnail file name
		$ext=$matches[0];
		$thumb=substr($img, 0, -5).str_replace($ext, $id.$ext, substr($img, -5));

		// if the original image smaller than thumb, then just copy it to thumb
		if($h>$oh && $w>$ow){
			return (@copy($img, $thumb) ? TRUE : FALSE);
		}

		// get image data
		if(!$imgData=imagecreatefromstring(implode('', file($img)))) return FALSE;

		// finally, create thumbnail
		$thumbData=imagecreatetruecolor($w, $h);

		//preserve transparency of png and gif images
		if($thumbFunc=='imagepng'){
			if(($clr=@imagecolorallocate($thumbData, 0, 0, 0))!=-1){
				@imagecolortransparent($thumbData, $clr);
				@imagealphablending($thumbData, false);
				@imagesavealpha($thumbData, true);
			}
		}elseif($thumbFunc=='imagegif'){
			@imagealphablending($thumbData, false);
			$transIndex=imagecolortransparent($imgData);
			if($transIndex>=0){
				$transClr=imagecolorsforindex($imgData, $transIndex);
				$transIndex=imagecolorallocatealpha($thumbData, $transClr['red'], $transClr['green'], $transClr['blue'], 127);
				imagefill($thumbData, 0, 0, $transIndex);
			}
		}

		// resize original image into thumbnail
		if(!imagecopyresampled($thumbData, $imgData, 0, 0 , 0, 0, $w, $h, $ow, $oh)) return FALSE;
		unset($imgData);

		// gif transparency
		if($thumbFunc=='imagegif' && $transIndex>=0){
			imagecolortransparent($thumbData, $transIndex);
			for($y=0; $y<$h; ++$y)
				for($x=0; $x<$w; ++$x)
					if(((imagecolorat($thumbData, $x, $y)>>24) & 0x7F) >= 100)   imagesetpixel($thumbData, $x, $y, $transIndex);
			imagetruecolortopalette($thumbData, true, 255);
			imagesavealpha($thumbData, false);
		}

		if(!$thumbFunc($thumbData, $thumb))  return FALSE;
		unset($thumbData);

		return TRUE;
	}
	########################################################################
	function makeSafe($string, $is_gpc = true){
		if($is_gpc) $string = (get_magic_quotes_gpc() ? stripslashes($string) : $string);
		if(!db_link()){ sql("select 1+1", $eo); }

		// prevent double escaping
		$na = explode(',', "\x00,\n,\r,',\",\x1a");
		$escaped = true;
		$nosc = true; // no special chars exist
		foreach($na as $ns){
			$dan = substr_count($string, $ns);
			$esdan = substr_count($string, "\\{$ns}");
			if($dan != $esdan) $escaped = false;
			if($dan) $nosc = false;
		}
		if($nosc){
			// find unescaped \
			$dan = substr_count($string, '\\');
			$esdan = substr_count($string, '\\\\');
			if($dan != $esdan * 2) $escaped = false;
		}

		return ($escaped ? $string : db_escape($string));
	}
	########################################################################
	function checkPermissionVal($pvn){
		// fn to make sure the value in the given POST variable is 0, 1, 2 or 3
		// if the value is invalid, it default to 0
		$pvn=intval($_POST[$pvn]);
		if($pvn!=1 && $pvn!=2 && $pvn!=3){
			return 0;
		}else{
			return $pvn;
		}
	}
	########################################################################
	if(!function_exists('sql')){
		function sql($statment, &$o){

			/*
				Supported options that can be passed in $o options array (as array keys):
				'silentErrors': If true, errors will be returned in $o['error'] rather than displaying them on screen and exiting.
			*/

			global $Translation;
			static $connected = false, $db_link;

			$dbServer = config('dbServer');
			$dbUsername = config('dbUsername');
			$dbPassword = config('dbPassword');
			$dbDatabase = config('dbDatabase');

			$admin_dir = dirname(__FILE__);
			$header = (defined('ADMIN_AREA') ? "{$admin_dir}/incHeader.php" : "{$admin_dir}/../header.php");
			$footer = (defined('ADMIN_AREA') ? "{$admin_dir}/incFooter.php" : "{$admin_dir}/../footer.php");

			ob_start();

			if(!$connected){
				/****** Connect to MySQL ******/
				if(!extension_loaded('mysql') && !extension_loaded('mysqli')){
					$o['error'] = 'PHP is not configured to connect to MySQL on this machine. Please see <a href="http://www.php.net/manual/en/ref.mysql.php">this page</a> for help on how to configure MySQL.';
					if($o['silentErrors']) return false;

					@include_once($header);
					echo Notification::placeholder();
					echo Notification::show(array(
						'message' => $o['error'],
						'class' => 'danger',
						'dismiss_seconds' => 7200
					));
					@include_once($footer);
					echo ob_get_clean();
					exit;
				}

				if(!($db_link = @db_connect($dbServer, $dbUsername, $dbPassword))){
					$o['error'] = db_error($db_link, true);
					if($o['silentErrors']) return false;

					@include_once($header);
					echo Notification::placeholder();
					echo Notification::show(array(
						'message' => $o['error'],
						'class' => 'danger',
						'dismiss_seconds' => 7200
					));
					@include_once($footer);
					echo ob_get_clean();
					exit;
				}

				/****** Select DB ********/
				if(!db_select_db($dbDatabase, $db_link)){
					$o['error'] = db_error($db_link);
					if($o['silentErrors']) return false;

					@include_once($header);
					echo Notification::placeholder();
					echo Notification::show(array(
						'message' => $o['error'],
						'class' => 'danger',
						'dismiss_seconds' => 7200
					));
					@include_once($footer);
					echo ob_get_clean();
					exit;
				}

				$connected = true;
			}

			if(!$result = @db_query($statment, $db_link)){
				if(!stristr($statment, "show columns")){
					// retrieve error codes
					$errorNum = db_errno($db_link);
					$errorMsg = htmlspecialchars(db_error($db_link));

					if(getLoggedAdmin()) $errorMsg .= "<pre class=\"ltr\">{$Translation['query:']}\n" . htmlspecialchars($statment) . "</pre><p><i class=\"text-right\">{$Translation['admin-only info']}</i></p><p>{$Translation['rebuild fields']}</p>";

					if($o['silentErrors']){ $o['error'] = $errorMsg; return false; }

					@include_once($header);
					echo Notification::placeholder();
					echo Notification::show(array(
						'message' => $errorMsg,
						'class' => 'danger',
						'dismiss_seconds' => 7200
					));
					@include_once($footer);
					echo ob_get_clean();
					exit;
				}
			}

			ob_end_clean();
			return $result;
		}
	}

	########################################################################
	function sqlValue($statment, &$error = NULL){
		// executes a statment that retreives a single data value and returns the value retrieved
		$eo = array('silentErrors' => true);
		if(!$res = sql($statment, $eo)) { $error = $eo['error']; return false; }
		if(!$row = db_fetch_row($res)) return false;
		return $row[0];
	}
	########################################################################
	function getLoggedAdmin() {
		// checks session variables to see whether the admin is logged or not
		// if not, it returns false
		// if logged, it returns the user id

		$adminConfig = config('adminConfig');
		if(!isset($_SESSION['memberID']) || empty($_SESSION['memberID'])) return false;
		if($_SESSION['adminUsername'] == $_SESSION['memberID']) {
			return $_SESSION['adminUsername'];
		}elseif($_SESSION['memberID'] == $adminConfig['adminUsername']) {
			$_SESSION['adminUsername'] = $_SESSION['memberID'];
			return $_SESSION['adminUsername'];
		}

		unset($_SESSION['adminUsername']);
		return false;
	}
	########################################################################
	function checkUser($username, $password){
		// checks given username and password for validity
		// if valid, registers the username in a session and returns true
		// else, returns false and destroys session

		$adminConfig = config('adminConfig');
		if($username != $adminConfig['adminUsername'] || !password_match($password, $adminConfig['adminPassword'])){
			return false;
		}

		$_SESSION['adminUsername'] = $username;
		$_SESSION['memberGroupID'] = sqlValue("select groupID from membership_users where memberID='" . makeSafe($username) ."'");
		$_SESSION['memberID'] = $username;
		return true;
	}
	########################################################################
	function logOutUser(){
		RememberMe::logout();
	}
	########################################################################
	function getPKFieldName($tn){
		// get pk field name of given table

		$stn = makeSafe($tn, false);
		if(!$res = sql("show fields from `$stn`", $eo)){
			return false;
		}

		while($row = db_fetch_assoc($res)){
			if($row['Key'] == 'PRI'){
				return $row['Field'];
			}
		}

		return false;
	}
	########################################################################
	function getCSVData($tn, $pkValue, $stripTags=true){
		// get pk field name for given table
		if(!$pkField=getPKFieldName($tn)){
			return "";
		}

		// get a concat string to produce a csv list of field values for given table record
		if(!$res=sql("show fields from `$tn`", $eo)){
			return "";
		}
		while($row=db_fetch_assoc($res)){
			$csvFieldList.="`{$row['Field']}`,";
		}
		$csvFieldList=substr($csvFieldList, 0, -1);

		$csvData=sqlValue("select CONCAT_WS(', ', $csvFieldList) from `$tn` where `$pkField`='" . makeSafe($pkValue, false) . "'");

		return ($stripTags ? strip_tags($csvData) : $csvData);
	}
	########################################################################
	function errorMsg($msg){
		echo "<div class=\"alert alert-danger\">{$msg}</div>";
	}
	########################################################################
	function redirect($url, $absolute = false){
		$fullURL = ($absolute ? $url : application_url($url));
		if(!headers_sent()) header("Location: {$fullURL}");

		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;url={$fullURL}\">";
		echo "<br><br><a href=\"{$fullURL}\">Click here</a> if you aren't automatically redirected.";
		exit;
	}
	########################################################################
	function htmlRadioGroup($name, $arrValue, $arrCaption, $selectedValue, $selClass = "text-primary", $class = "", $separator = "<br>"){
		if(!is_array($arrValue)) return '';

		ob_start();
		?>
		<div class="radio %%CLASS%%"><label>
			<input type="radio" name="%%NAME%%" id="%%ID%%" value="%%VALUE%%" %%CHECKED%%> %%LABEL%%
		</label></div>
		<?php
		$template = ob_get_contents();
		ob_end_clean();

		$out = '';
		for($i = 0; $i < count($arrValue); $i++){
			$replacements = array(
				'%%CLASS%%' => html_attr($arrValue[$i] == $selectedValue ? $selClass :$class),
				'%%NAME%%' => html_attr($name),
				'%%ID%%' => html_attr($name . $i),
				'%%VALUE%%' => html_attr($arrValue[$i]),
				'%%LABEL%%' => $arrCaption[$i],
				'%%CHECKED%%' => ($arrValue[$i]==$selectedValue ? " checked" : "")
			);
			$out .= str_replace(array_keys($replacements), array_values($replacements), $template);
		}

		return $out;
	}
	########################################################################
	function htmlSelect($name, $arrValue, $arrCaption, $selectedValue, $class="", $selectedClass=""){
		if($selectedClass==""){
			$selectedClass=$class;
		}
		if(is_array($arrValue)){
			$out="<select name=\"$name\" id=\"$name\">";
			for($i=0; $i<count($arrValue); $i++){
				$out.="<option value=\"".$arrValue[$i]."\"".($arrValue[$i]==$selectedValue ? " selected class=\"$class\"" : " class=\"$selectedClass\"").">".$arrCaption[$i]."</option>";
			}
			$out.="</select>";
		}
		return $out;
	}
	########################################################################
	function htmlSQLSelect($name, $sql, $selectedValue, $class="", $selectedClass=""){
		$arrVal[]='';
		$arrCap[]='';
		if($res=sql($sql, $eo)){
			while($row=db_fetch_row($res)){
				$arrVal[]=$row[0];
				$arrCap[]=$row[1];
			}
			return htmlSelect($name, $arrVal, $arrCap, $selectedValue, $class, $selectedClass);
		}else{
			return "";
		}
	}
	########################################################################
	function bootstrapSelect($name, $arrValue, $arrCaption, $selectedValue, $class = '', $selectedClass = ''){
		if($selectedClass == '') $selectedClass = $class;

		$out = "<select class=\"form-control\" name=\"{$name}\" id=\"{$name}\">";
		if(is_array($arrValue)){
			for($i = 0; $i < count($arrValue); $i++){
				$selected = "class=\"{$class}\"";
				if($arrValue[$i] == $selectedValue) $selected = "selected class=\"{$selectedClass}\"";
				$out .= "<option value=\"{$arrValue[$i]}\" {$selected}>{$arrCaption[$i]}</option>";
			}
		}
		$out .= '</select>';

		return $out;
	}
	########################################################################
	function bootstrapSQLSelect($name, $sql, $selectedValue, $class = '', $selectedClass = ''){
		$arrVal[] = '';
		$arrCap[] = '';
		if($res = sql($sql, $eo)){
			while($row = db_fetch_row($res)){
				$arrVal[] = $row[0];
				$arrCap[] = $row[1];
			}
			return bootstrapSelect($name, $arrVal, $arrCap, $selectedValue, $class, $selectedClass);
		}

		return '';
	}
	########################################################################
	function isEmail($email) {
		if(preg_match('/^([*+!.&#$�\'\\%\/0-9a-z^_`{}=?~:-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,45})$/i', $email)){
			return $email;
		}

		return false;
	}
	########################################################################
	function notifyMemberApproval($memberID){
		$adminConfig = config('adminConfig');
		$memberID = strtolower($memberID);

		$email = sqlValue("select email from membership_users where lcase(memberID)='{$memberID}'");

		return sendmail(array(
			'to' => $email,
			'name' => $memberID,
			'subject' => $adminConfig['approvalSubject'],
			'message' => nl2br($adminConfig['approvalMessage'])
		));
	}
	########################################################################
	function setupMembership() {
		// run once per session, but force proceeding if not all mem tables created
		$res = sql("show tables like 'membership_%'", $eo);
		$num_mem_tables = db_num_rows($res);
		$mem_update_fn = membership_table_functions();
		if(isset($_SESSION['setupMembership']) && $num_mem_tables >= count($mem_update_fn)) return;

		/* abort if current page is one of the following exceptions */
		if(in_array(basename($_SERVER['PHP_SELF']), array(
			'pageEditMember.php', 
			'membership_passwordReset.php', 
			'membership_profile.php', 
			'membership_signup.php', 
			'pageChangeMemberStatus.php', 
			'pageDeleteGroup.php', 
			'pageDeleteMember.php', 
			'pageEditGroup.php', 
			'pageEditMemberPermissions.php', 
			'pageRebuildFields.php', 
			'pageSettings.php',
			'ajax_check_login.php'
		))) return;

		// call each update_membership function
		foreach($mem_update_fn as $mem_fn) {
			$mem_fn();
		}

		configure_anonymous_group();
		configure_admin_group();

		$_SESSION['setupMembership'] = time();
	}
	########################################################################
	function membership_table_functions() {
		// returns a list of update_membership_* functions
		$arr = get_defined_functions();
		return array_filter($arr['user'], function($f) {
			return (strpos($f, 'update_membership_') !== false);
		});
	}
	########################################################################
	function configure_anonymous_group() {
		$eo = array('silentErrors' => true);

		$adminConfig = config('adminConfig');
		$today = @date('Y-m-d');

		$anon_group_safe = makeSafe($adminConfig['anonymousGroup']);
		$anon_user = strtolower($adminConfig['anonymousMember']);
		$anon_user_safe = makeSafe($anon_user);

		/* create anonymous group if not there and get its ID */
		$same_fields = "`allowSignup`=0, `needsApproval`=0";
		sql("INSERT INTO `membership_groups` SET 
				`name`='{$anon_group_safe}', {$same_fields}, 
				`description`='Anonymous group created automatically on {$today}'
			ON DUPLICATE KEY UPDATE {$same_fields}", 
		$eo);

		$anon_group_id = sqlValue("SELECT `groupID` FROM `membership_groups` WHERE `name`='{$anon_group_safe}'");
		if(!$anon_group_id) return;

		/* create guest user if not there or if guest name in config differs from that in db */
		$anon_user_db = sqlValue("SELECT LCASE(`memberID`) FROM `membership_users` 
			WHERE `groupID`='{$anon_group_id}'");
		if(!$anon_user_db || $anon_user_db != $anon_user) {
			sql("DELETE FROM `membership_users` WHERE `groupID`='{$anon_group_id}'", $eo);
			sql("INSERT INTO `membership_users` SET 
			`memberID`='{$anon_user_safe}', 
				`signUpDate`='{$today}', 
				`groupID`='{$anon_group_id}', 
				`isBanned`=0, 
				`isApproved`=1, 
				`comments`='Anonymous member created automatically on {$today}'", 
			$eo);
		}
	}
	########################################################################
	function configure_admin_group() {
		$eo = array('silentErrors' => true);

		$adminConfig = config('adminConfig');
		$today = @date('Y-m-d');
		$admin_group_safe = 'Admins';
		$admin_user_safe = makeSafe(strtolower($adminConfig['adminUsername']));
		$admin_hash_safe = makeSafe($adminConfig['adminPassword']);
		$admin_email_safe = makeSafe($adminConfig['senderEmail']);

		/* create admin group if not there and get its ID */
		$same_fields = "`allowSignup`=0, `needsApproval`=1";
		sql("INSERT INTO `membership_groups` SET 
				`name`='{$admin_group_safe}', {$same_fields}, 
				`description`='Admin group created automatically on {$today}'
			ON DUPLICATE KEY UPDATE {$same_fields}", 
		$eo);
		$admin_group_id = sqlValue("SELECT `groupID` FROM `membership_groups` WHERE `name`='{$admin_group_safe}'");
		if(!$admin_group_id) return;

		/* create super-admin user if not there (if exists, query would abort with suppressed error) */
		sql("INSERT INTO `membership_users` SET 
			`memberID`='{$admin_user_safe}', 
			`passMD5`='{$admin_hash_safe}', 
			`email`='{$admin_email_safe}', 
			`signUpDate`='{$today}', 
			`groupID`='{$admin_group_id}', 
			`isBanned`=0, 
			`isApproved`=1, 
			`comments`='Admin member created automatically on {$today}'", 
		$eo);

		/* insert/update admin group permissions to allow full access to all tables */
		$tables = getTableList(true);
		foreach($tables as $tn => $ignore) {
			$same_fields = '`allowInsert`=1,`allowView`=3,`allowEdit`=3,`allowDelete`=3';
			sql("INSERT INTO `membership_grouppermissions` SET
					`groupID`='{$admin_group_id}',
					`tableName`='{$tn}',
					{$same_fields}
				ON DUPLICATE KEY UPDATE {$same_fields}",
			$eo);
		}
	}
	########################################################################
	function get_table_keys($tn) {
		$keys = array();
		$res = sql("SHOW KEYS FROM `{$tn}`", $eo);
		while($row = db_fetch_assoc($res))
			$keys[$row['Key_name']][$row['Seq_in_index']] = $row;

		return $keys;
	}
	########################################################################
	function get_table_fields($tn) {
		$fields = array();
		$res = sql("SHOW COLUMNS FROM `{$tn}`", $eo);
		while($row = db_fetch_assoc($res))
			$fields[$row['Field']] = $row;

		return $fields;
	}
	########################################################################
	function update_membership_groups() {
		$tn = 'membership_groups';
		$eo = array('silentErrors' => true);

		sql(
			"CREATE TABLE IF NOT EXISTS `{$tn}` (
				`groupID` INT UNSIGNED NOT NULL AUTO_INCREMENT, 
				`name` varchar(100) NOT NULL, 
				`description` TEXT, 
				`allowSignup` TINYINT, 
				`needsApproval` TINYINT, 
				PRIMARY KEY (`groupID`)
			) CHARSET " . mysql_charset,
		$eo);

		sql("ALTER TABLE `{$tn}` CHANGE COLUMN `name` `name` VARCHAR(100) NOT NULL", $eo);
		sql("ALTER TABLE `{$tn}` ADD UNIQUE INDEX `name` (`name`)", $eo);
	}
	########################################################################
	function update_membership_users() {
		$tn = 'membership_users';
		$eo = array('silentErrors' => true);

		sql(
			"CREATE TABLE IF NOT EXISTS `{$tn}` (
				`memberID` VARCHAR(100) NOT NULL, 
				`passMD5` VARCHAR(255), 
				`email` VARCHAR(100), 
				`signupDate` DATE, 
				`groupID` INT UNSIGNED, 
				`isBanned` TINYINT, 
				`isApproved` TINYINT, 
				`custom1` TEXT, 
				`custom2` TEXT, 
				`custom3` TEXT, 
				`custom4` TEXT, 
				`comments` TEXT, 
				`pass_reset_key` VARCHAR(100),
				`pass_reset_expiry` INT UNSIGNED,
				PRIMARY KEY (`memberID`),
				INDEX `groupID` (`groupID`)
			) CHARSET " . mysql_charset,
		$eo);

		sql("ALTER TABLE `{$tn}` ADD COLUMN `pass_reset_key` VARCHAR(100)", $eo);
		sql("ALTER TABLE `{$tn}` ADD COLUMN `pass_reset_expiry` INT UNSIGNED", $eo);
		sql("ALTER TABLE `{$tn}` CHANGE COLUMN `passMD5` `passMD5` VARCHAR(255)", $eo);
		sql("ALTER TABLE `{$tn}` CHANGE COLUMN `memberID` `memberID` VARCHAR(100) NOT NULL", $eo);
		sql("ALTER TABLE `{$tn}` ADD INDEX `groupID` (`groupID`)", $eo);
		sql("ALTER TABLE `{$tn}` ADD COLUMN `flags` TEXT", $eo);
	}
	########################################################################
	function update_membership_userrecords() {
		$tn = 'membership_userrecords';
		$eo = array('silentErrors' => true);

		sql(
			"CREATE TABLE IF NOT EXISTS `{$tn}` (
				`recID` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, 
				`tableName` VARCHAR(100), 
				`pkValue` VARCHAR(255), 
				`memberID` VARCHAR(100), 
				`dateAdded` BIGINT UNSIGNED, 
				`dateUpdated` BIGINT UNSIGNED, 
				`groupID` INT UNSIGNED, 
				PRIMARY KEY (`recID`),
				UNIQUE INDEX `tableName_pkValue` (`tableName`, `pkValue`(150)),
				INDEX `pkValue` (`pkValue`),
				INDEX `tableName` (`tableName`),
				INDEX `memberID` (`memberID`),
				INDEX `groupID` (`groupID`)
			) CHARSET " . mysql_charset,
		$eo);

		sql("ALTER TABLE `{$tn}` ADD UNIQUE INDEX `tableName_pkValue` (`tableName`, `pkValue`(150))", $eo);
		sql("ALTER TABLE `{$tn}` ADD INDEX `pkValue` (`pkValue`)", $eo);
		sql("ALTER TABLE `{$tn}` ADD INDEX `tableName` (`tableName`)", $eo);
		sql("ALTER TABLE `{$tn}` ADD INDEX `memberID` (`memberID`)", $eo);
		sql("ALTER TABLE `{$tn}` ADD INDEX `groupID` (`groupID`)", $eo);
		sql("ALTER TABLE `{$tn}` CHANGE COLUMN `memberID` `memberID` VARCHAR(100)", $eo);
	}
	########################################################################
	function update_membership_grouppermissions() {
		$tn = 'membership_grouppermissions';
		$eo = array('silentErrors' => true);

		sql(
			"CREATE TABLE IF NOT EXISTS `{$tn}` (
				`permissionID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				`groupID` INT UNSIGNED,
				`tableName` VARCHAR(100),
				`allowInsert` TINYINT NOT NULL DEFAULT '0',
				`allowView` TINYINT NOT NULL DEFAULT '0',
				`allowEdit` TINYINT NOT NULL DEFAULT '0',
				`allowDelete` TINYINT NOT NULL DEFAULT '0',
				PRIMARY KEY (`permissionID`)
			) CHARSET " . mysql_charset,
		$eo);

		sql("ALTER TABLE `{$tn}` ADD UNIQUE INDEX `groupID_tableName` (`groupID`, `tableName`)", $eo);
	}
	########################################################################
	function update_membership_userpermissions() {
		$tn = 'membership_userpermissions';
		$eo = array('silentErrors' => true);

		sql(
			"CREATE TABLE IF NOT EXISTS `{$tn}` (
				`permissionID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				`memberID` VARCHAR(100) NOT NULL,
				`tableName` VARCHAR(100),
				`allowInsert` TINYINT NOT NULL DEFAULT '0',
				`allowView` TINYINT NOT NULL DEFAULT '0',
				`allowEdit` TINYINT NOT NULL DEFAULT '0',
				`allowDelete` TINYINT NOT NULL DEFAULT '0',
				PRIMARY KEY (`permissionID`)
			) CHARSET " . mysql_charset,
		$eo);

		sql("ALTER TABLE `{$tn}` CHANGE COLUMN `memberID` `memberID` VARCHAR(100) NOT NULL", $eo);
		sql("ALTER TABLE `{$tn}` ADD UNIQUE INDEX `memberID_tableName` (`memberID`, `tableName`)", $eo);
	}
	########################################################################
	function update_membership_usersessions() {
		$tn = 'membership_usersessions';
		$eo = array('silentErrors' => true);

		sql(
			"CREATE TABLE IF NOT EXISTS `membership_usersessions` (
				`memberID` VARCHAR(100) NOT NULL,
				`token` VARCHAR(100) NOT NULL,
				`agent` VARCHAR(100) NOT NULL,
				`expiry_ts` INT(10) UNSIGNED NOT NULL,
				UNIQUE INDEX `memberID_token_agent` (`memberID`, `token`, `agent`),
				INDEX `memberID` (`memberID`),
				INDEX `expiry_ts` (`expiry_ts`)
			) CHARSET " . mysql_charset,
		$eo);
	}
	########################################################################
	function thisOr($this_val, $or = '&nbsp;'){
		return ($this_val != '' ? $this_val : $or);
	}
	########################################################################
	function getUploadedFile($FieldName, $MaxSize=0, $FileTypes='csv|txt', $NoRename=false, $dir=''){
		$currDir=dirname(__FILE__);
		if(is_array($_FILES)){
			$f = $_FILES[$FieldName];
		}else{
			return 'Your php settings don\'t allow file uploads.';
		}

		if(!$MaxSize){
			$MaxSize=toBytes(ini_get('upload_max_filesize'));
		}

		if(!is_dir("$currDir/csv")){
			@mkdir("$currDir/csv");
		}

		$dir=(is_dir($dir) && is_writable($dir) ? $dir : "$currDir/csv/");

		if($f['error']!=4 && $f['name']!=''){
			if($f['size']>$MaxSize || $f['error']){
				return 'File size exceeds maximum allowed of '.intval($MaxSize / 1024).'KB';
			}
			if(!preg_match('/\.('.$FileTypes.')$/i', $f['name'], $ft)){
				return 'File type not allowed. Only these file types are allowed: '.str_replace('|', ', ', $FileTypes);
			}

			if($NoRename){
				$n  = str_replace(' ', '_', $f['name']);
			}else{
				$n  = microtime();
				$n  = str_replace(' ', '_', $n);
				$n  = str_replace('0.', '', $n);
				$n .= $ft[0];
			}

			if(!@move_uploaded_file($f['tmp_name'], $dir . $n)){
				return 'Couldn\'t save the uploaded file. Try chmoding the upload folder "'.$dir.'" to 777.';
			}else{
				@chmod($dir.$n, 0666);
				return $dir.$n;
			}
		}
		return 'An error occured while uploading the file. Please try again.';
	}
	########################################################################
	function toBytes($val){
		$val = trim($val);
		$last = strtolower($val{strlen($val)-1});
		switch($last){
			 // The 'G' modifier is available since PHP 5.1.0
			 case 'g':
					$val *= 1024;
			 case 'm':
					$val *= 1024;
			 case 'k':
					$val *= 1024;
		}

		return $val;
	}
	########################################################################
	function convertLegacyOptions($CSVList){
		$CSVList=str_replace(';;;', ';||', $CSVList);
		$CSVList=str_replace(';;', '||', $CSVList);
		return $CSVList;
	}
	########################################################################
	function getValueGivenCaption($query, $caption){
		if(!preg_match('/select\s+(.*?)\s*,\s*(.*?)\s+from\s+(.*?)\s+order by.*/i', $query, $m)){
			if(!preg_match('/select\s+(.*?)\s*,\s*(.*?)\s+from\s+(.*)/i', $query, $m)){
				return '';
			}
		}

		// get where clause if present
		if(preg_match('/\s+from\s+(.*?)\s+where\s+(.*?)\s+order by.*/i', $query, $mw)){
			$where="where ($mw[2]) AND";
			$m[3]=$mw[1];
		}else{
			$where='where';
		}

		$caption=makeSafe($caption);
		return sqlValue("SELECT $m[1] FROM $m[3] $where $m[2]='$caption'");
	}
	########################################################################
	function undo_magic_quotes($str){
		return (get_magic_quotes_gpc() ? stripslashes($str) : $str);
	}
	########################################################################
	function time24($t = false){
		if($t === false) $t = date('Y-m-d H:i:s'); // time now if $t not passed
		elseif(!$t) return ''; // empty string if $t empty
		return date('H:i:s', strtotime($t));
	}
	########################################################################
	function time12($t = false){
		if($t === false) $t = date('Y-m-d H:i:s'); // time now if $t not passed
		elseif(!$t) return ''; // empty string if $t empty
		return date('h:i:s A', strtotime($t));
	}
	########################################################################
	function normalize_path($path) {
		// Adapted from https://developer.wordpress.org/reference/functions/wp_normalize_path/

		// Standardise all paths to use /
		$path = str_replace('\\', '/', $path);

		// Replace multiple slashes down to a singular, allowing for network shares having two slashes.
		$path = preg_replace('|(?<=.)/+|', '/', $path);

		// Windows paths should uppercase the drive letter
		if(':' === substr($path, 1, 1)) {
			$path = ucfirst($path);
		}

		return $path;
	}
	########################################################################
	function application_url($page = '', $s = false) {
		if($s === false) $s = $_SERVER;
		$ssl = (!empty($s['HTTPS']) && strtolower($s['HTTPS']) != 'off');
		$http = ($ssl ? 'https:' : 'http:');
		$port = $s['SERVER_PORT'];
		$port = ($port == '80' || $port == '443' || !$port) ? '' : ':' . $port;
		// HTTP_HOST already includes server port if not standard, but SERVER_NAME doesn't
		$host = (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : $s['SERVER_NAME'] . $port);

		$uri = config('appURI');
		if(!$uri) $uri = '/';

		// uri must begin and end with /, but not be '//'
		if($uri != '/' && $uri[0] != '/') $uri = "/{$uri}";
		if($uri != '/' && $uri[strlen($uri) - 1] != '/') $uri = "{$uri}/";

		return "{$http}//{$host}{$uri}{$page}";
	}
	########################################################################
	function application_uri($page = '') {
		$url = application_url($page);
		return trim(parse_url($url, PHP_URL_PATH), '/');
	}
	########################################################################
	function is_ajax(){
		return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	}
	########################################################################
	function array_trim($arr){
		if(!is_array($arr)) return trim($arr);
		return array_map('array_trim', $arr);
	}
	########################################################################
	function is_allowed_username($username, $exception = false){
		$username = trim(strtolower($username));
		if(!preg_match('/^[a-z0-9][a-z0-9 _.@]{3,100}$/', $username) || preg_match('/(@@|  |\.\.|___)/', $username)) return false;

		if($username == $exception) return $username;

		if(sqlValue("select count(1) from membership_users where lcase(memberID)='{$username}'")) return false;
		return $username;
	}
	########################################################################
	/*
		if called without parameters, looks for a non-expired token in the user's session (or creates one if
		none found) and returns html code to insert into the form to be protected.

		if set to true, validates token sent in $_REQUEST against that stored in the session
		and returns true if valid or false if invalid, absent or expired.

		usage:
			1. in a new form that needs csrf proofing: echo csrf_token();
			   >> in case of ajax requests and similar, retrieve token directly
			      by calling csrf_token(false, true);
			2. when validating a submitted form: if(!csrf_token(true)){ reject_submission_somehow(); }
	*/
	function csrf_token($validate = false, $token_only = false){
		$token_age = 60 * 60;
		/* retrieve token from session */
		$csrf_token = (isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : false);
		$csrf_token_expiry = (isset($_SESSION['csrf_token_expiry']) ? $_SESSION['csrf_token_expiry'] : false);

		if(!$validate){
			/* create a new token if necessary */
			if($csrf_token_expiry < time() || !$csrf_token){
				$csrf_token = md5(uniqid(rand(), true));
				$csrf_token_expiry = time() + $token_age;
				$_SESSION['csrf_token'] = $csrf_token;
				$_SESSION['csrf_token_expiry'] = $csrf_token_expiry;
			}

			if($token_only) return $csrf_token;
			return '<input type="hidden" id="csrf_token" name="csrf_token" value="' . $csrf_token . '">';
		}

		/* validate submitted token */
		$user_token = (isset($_REQUEST['csrf_token']) ? $_REQUEST['csrf_token'] : false);
		if($csrf_token_expiry < time() || !$user_token || $user_token != $csrf_token){
			return false;
		}

		return true;
	}
	########################################################################
	function get_plugins(){
		$plugins = array();
		$plugins_path = dirname(__FILE__) . '/../plugins/';

		if(!is_dir($plugins_path)) return $plugins;

		$pd = dir($plugins_path);
		while(false !== ($plugin = $pd->read())){
			if(!is_dir($plugins_path . $plugin) || in_array($plugin, array('projects', 'plugins-resources', '.', '..'))) continue;

			$info_file = "{$plugins_path}{$plugin}/plugin-info.json";
			if(!is_file($info_file)) continue;

			$plugins[] = json_decode(file_get_contents($info_file), true);
			$plugins[count($plugins) - 1]['admin_path'] = "../plugins/{$plugin}";
		}
		$pd->close();

		return $plugins;
	}
	########################################################################
	function maintenance_mode($new_status = ''){
		$maintenance_file = dirname(__FILE__) . '/.maintenance';

		if($new_status === true){
			/* turn on maintenance mode */
			@touch($maintenance_file);
		}elseif($new_status === false){
			/* turn off maintenance mode */
			@unlink($maintenance_file);
		}

		/* return current maintenance mode status */
		return is_file($maintenance_file);
	}
	########################################################################
	function handle_maintenance($echo = false){
		if(!maintenance_mode()) return;

		global $Translation;
		$adminConfig = config('adminConfig');

		$admin = getLoggedAdmin();
		if($admin){
			return ($echo ? '<div class="alert alert-danger" style="margin: 5em auto -5em;"><b>' . $Translation['maintenance mode admin notification'] . '</b></div>' : '');
		}

		if(!$echo) exit;

		exit('<div class="alert alert-danger" style="margin-top: 5em; font-size: 2em;"><i class="glyphicon glyphicon-exclamation-sign"></i> ' . $adminConfig['maintenance_mode_message'] . '</div>');
	}
	#########################################################
	function html_attr($str){
		if(version_compare(PHP_VERSION, '5.2.3') >= 0) return htmlspecialchars($str, ENT_QUOTES, datalist_db_encoding, false);
		return htmlspecialchars($str, ENT_QUOTES, datalist_db_encoding);
	}
	#########################################################
	function html_attr_tags_ok($str){
		// use this instead of html_attr() if you don't want html tags to be escaped
		$new_str = html_attr($str);
		return str_replace(array('&lt;', '&gt;'), array('<', '>'), $new_str);
	}
	#########################################################
	class Request{
		var $sql, $url, $attr, $html, $raw;

		function __construct($var, $filter = false){
			$this->Request($var, $filter);
		}

		function Request($var, $filter = false){
			$unsafe = (isset($_REQUEST[$var]) ? $_REQUEST[$var] : '');
			if(get_magic_quotes_gpc()) $unsafe = stripslashes($unsafe);

			if($filter){
				$unsafe = call_user_func($filter, $unsafe);
			}

			$this->sql = makeSafe($unsafe, false);
			$this->url = urlencode($unsafe);
			$this->attr = html_attr($unsafe);
			$this->html = html_attr($unsafe);
			$this->raw = $unsafe;
		}
	}
	#########################################################
	class Notification{
		/*
			Usage:
			* in the main document, initiate notifications support using this PHP code:
				echo Notification::placeholder();

			* whenever you want to show a notifcation, use this PHP code:
				echo Notification::show(array(
					'message' => 'Notification text to display',
					'class' => 'danger', // or other bootstrap state cues, 'default' if not provided
					'dismiss_seconds' => 5, // optional auto-dismiss after x seconds
					'dismiss_days' => 7, // optional dismiss for x days if closed by user -- must provide an id
					'id' => 'xyz' // optional string to identify the notification -- must use for 'dismiss_days' to work
				));
		*/
		protected static $placeholder_id; /* to force a single notifcation placeholder */

		protected function __construct(){} /* to prevent initialization */

		public static function placeholder(){
			if(self::$placeholder_id) return ''; // output placeholder code only once

			self::$placeholder_id = 'notifcation-placeholder-' . rand(10000000, 99999999);

			ob_start();
			?>

			<div class="notifcation-placeholder" id="<?php echo self::$placeholder_id; ?>"></div>
			<script>
				$j(function(){
					if(window.show_notification != undefined) return;

					window.show_notification = function(options){
						var dismiss_class = '';
						var dismiss_icon = '';
						var cookie_name = 'hide_notification_' + options.id;
						var notif_id = 'notifcation-' + Math.ceil(Math.random() * 1000000);

						/* apply provided notficiation id if unique in page */
						if(options.id != undefined){
							if(!$j('#' + options.id).length) notif_id = options.id;
						}

						/* notifcation should be hidden? */
						if(localStorage.getItem(cookie_name) != undefined) return;

						/* notification should be dismissable? */
						if(options.dismiss_seconds > 0 || options.dismiss_days > 0){
							dismiss_class = ' alert-dismissible';
							dismiss_icon = '<button type="button" class="close" data-dismiss="alert">&times;</button>';
						}

						/* remove old dismissed notficiations */
						$j('.alert-dismissible.invisible').remove();

						/* append notification to notifications container */
						$j(
							'<div class="alert alert-' + options['class'] + dismiss_class + '" id="' + notif_id + '">' + 
								dismiss_icon +
								options.message + 
							'</div>'
						).appendTo('#<?php echo self::$placeholder_id; ?>');

						var this_notif = $j('#' + notif_id);

						/* dismiss after x seconds if requested */
						if(options.dismiss_seconds > 0){
							setTimeout(function(){ /* */ this_notif.addClass('invisible'); }, options.dismiss_seconds * 1000);
						}

						/* dismiss for x days if requested and user dismisses it */
						if(options.dismiss_days > 0){
							var ex_days = options.dismiss_days;
							this_notif.on('closed.bs.alert', function(){
								/* set a cookie not to show this alert for ex_days */
								localStorage.setItem(cookie_name, '1');
							});
						}
					}
				})
			</script>

			<?php
			$html = ob_get_contents();
			ob_end_clean();

			return $html;            
		}

		protected static function default_options(&$options){
			if(!isset($options['message'])) $options['message'] = 'Notification::show() called without a message!';

			if(!isset($options['class'])) $options['class'] = 'default';

			if(!isset($options['dismiss_seconds']) || isset($options['dismiss_days'])) $options['dismiss_seconds'] = 0;

			if(!isset($options['dismiss_days'])) $options['dismiss_days'] = 0;
			if(!isset($options['id'])){
				$options['id'] = 0;
				$options['dismiss_days'] = 0;
			}
		}

		/**
		 *  @brief Notification::show($options) displays a notification
		 *  
		 *  @param $options assoc array
		 *  
		 *  @return html code for displaying the notifcation
		 */
		public static function show($options = array()){
			self::default_options($options);

			ob_start();
			?>
			<script>
				$j(function(){
					show_notification(<?php echo json_encode($options); ?>);
				})
			</script>
			<?php
			$html = ob_get_contents();
			ob_end_clean();

			return $html;
		}
	}
	#########################################################
	function sendmail($mail){
		if(!isset($mail['to'])) return 'No recipient defined';
		if(!isEmail($mail['to'])) return 'Invalid recipient email';

		$mail['subject'] = isset($mail['subject']) ? $mail['subject'] : '';
		$mail['message'] = isset($mail['message']) ? $mail['message'] : '';
		$mail['name'] = isset($mail['name']) ? $mail['name'] : '';
		$mail['debug'] = isset($mail['debug']) ? min(4, max(0, intval($mail['debug']))) : 0;

		$cfg = config('adminConfig');
		$smtp = ($cfg['mail_function'] == 'smtp');

		if(!class_exists('PHPMailer')){
			$curr_dir = dirname(__FILE__);
			include("{$curr_dir}/../resources/PHPMailer/class.phpmailer.php");
			if($smtp) include("{$curr_dir}/../resources/PHPMailer/class.smtp.php");
		}

		$pm = new PHPMailer;
		$pm->CharSet = datalist_db_encoding;

		if($smtp){
			$pm->isSMTP();
			$pm->SMTPDebug = $mail['debug'];
			$pm->Debugoutput = 'html';
			$pm->Host = $cfg['smtp_server'];
			$pm->Port = $cfg['smtp_port'];
			$pm->SMTPAuth = true;
			$pm->SMTPSecure = $cfg['smtp_encryption'];
			$pm->Username = $cfg['smtp_user'];
			$pm->Password = $cfg['smtp_pass'];
		}

		$pm->setFrom($cfg['senderEmail'], $cfg['senderName']);
		$pm->addAddress($mail['to'], $mail['name']);
		$pm->Subject = $mail['subject'];

		/* if message already contains html tags, don't apply nl2br */
		if($mail['message'] == strip_tags($mail['message']))
			$mail['message'] = nl2br($mail['message']);

		$pm->msgHTML($mail['message'], realpath("{$curr_dir}/.."));

		/* if sendmail_handler(&$pm) is defined (in hooks/__global.php) */
		if(function_exists('sendmail_handler')) sendmail_handler($pm);

		if(!$pm->send()) return $pm->ErrorInfo;

		return true;
	}
	#########################################################
	function safe_html($str){
		/* if $str has no HTML tags, apply nl2br */
		if($str == strip_tags($str)) return nl2br($str);

		$hc = new CI_Input();
		$hc->charset = datalist_db_encoding;

		return $hc->xss_clean($str);
	}
	#########################################################
	function getLoggedGroupID(){
		if($_SESSION['memberGroupID']!=''){
			return $_SESSION['memberGroupID'];
		}else{
			if(!setAnonymousAccess()) return false;
			return getLoggedGroupID();
		}
	}
	#########################################################
	function getLoggedMemberID(){
		if($_SESSION['memberID']!=''){
			return strtolower($_SESSION['memberID']);
		}else{
			if(!setAnonymousAccess()) return false;
			return getLoggedMemberID();
		}
	}
	#########################################################
	function setAnonymousAccess(){
		$adminConfig = config('adminConfig');
		$anon_group_safe = addslashes($adminConfig['anonymousGroup']);
		$anon_user_safe = strtolower(addslashes($adminConfig['anonymousMember']));

		$eo = array('silentErrors' => true);

		$res = sql("select groupID from membership_groups where name='{$anon_group_safe}'", $eo);
		if(!$res){ return false; }
		$row = db_fetch_array($res); $anonGroupID = $row[0];

		$_SESSION['memberGroupID'] = ($anonGroupID ? $anonGroupID : 0);

		$res = sql("select lcase(memberID) from membership_users where lcase(memberID)='{$anon_user_safe}' and groupID='{$anonGroupID}'", $eo);
		if(!$res){ return false; }
		$row = db_fetch_array($res); $anonMemberID = $row[0];

		$_SESSION['memberID'] = ($anonMemberID ? $anonMemberID : 0);

		return true;
	}
	#########################################################
	function getMemberInfo($memberID = ''){
		static $member_info = array();

		if(!$memberID){
			$memberID = getLoggedMemberID();
		}

		// return cached results, if present
		if(isset($member_info[$memberID])) return $member_info[$memberID];

		$adminConfig = config('adminConfig');
		$mi = array();

		if($memberID){
			$res = sql("select * from membership_users where memberID='" . makeSafe($memberID) . "'", $eo);
			if($row = db_fetch_assoc($res)){
				$mi = array(
					'username' => $memberID,
					'groupID' => $row['groupID'],
					'group' => sqlValue("select name from membership_groups where groupID='{$row['groupID']}'"),
					'admin' => ($adminConfig['adminUsername'] == $memberID ? true : false),
					'email' => $row['email'],
					'custom' => array(
						$row['custom1'], 
						$row['custom2'], 
						$row['custom3'], 
						$row['custom4']
					),
					'banned' => ($row['isBanned'] ? true : false),
					'approved' => ($row['isApproved'] ? true : false),
					'signupDate' => @date('n/j/Y', @strtotime($row['signupDate'])),
					'comments' => $row['comments'],
					'IP' => $_SERVER['REMOTE_ADDR']
				);

				// cache results
				$member_info[$memberID] = $mi;
			}
		}

		return $mi;
	}
	#########################################################
	function get_group_id($user = ''){
		$mi = getMemberInfo($user);
		return $mi['groupID'];
	}
	#########################################################
	/**
	 *  @brief Prepares data for a SET or WHERE clause, to be used in an INSERT/UPDATE query
	 *  
	 *  @param [in] $set_array Assoc array of field names => values
	 *  @param [in] $glue optional glue. Set to ' AND ' or ' OR ' if preparing a WHERE clause
	 *  @return SET string
	 */
	function prepare_sql_set($set_array, $glue = ', '){
		$fnvs = array();
		foreach($set_array as $fn => $fv){
			if($fv === null){ $fnvs[] = "{$fn}=NULL"; continue; }

			$sfv = makeSafe($fv);
			$fnvs[] = "{$fn}='{$sfv}'";
		}
		return implode($glue, $fnvs);
	}
	#########################################################
	/**
	 *  @brief Inserts a record to the database
	 *  
	 *  @param [in] $tn table name where the record would be inserted
	 *  @param [in] $set_array Assoc array of field names => values to be inserted
	 *  @param [out] $error optional string containing error message if insert fails
	 *  @return boolean indicating success/failure
	 */
	function insert($tn, $set_array, &$error = '') {
		$set = prepare_sql_set($set_array);
		if(!count($set)) return false;

		$eo = array('silentErrors' => true);
		$res = sql("INSERT INTO `{$tn}` SET {$set}", $eo);
		if($res) return true;

		$error = $eo['error'];
		return false;
	}
	#########################################################
	/**
	 *  @brief Updates a record in the database
	 *  
	 *  @param [in] $tn table name where the record would be updated
	 *  @param [in] $set_array Assoc array of field names => values to be updated
	 *  @param [in] $where_array Assoc array of field names => values used to build the WHERE clause
	 *  @return boolean indicating success/failure
	 */
	function update($tn, $set_array, $where_array){
		$set = prepare_sql_set($set_array);
		if(!count($set)) return false;

		$where = prepare_sql_set($where_array, ' AND ');
		if(!$where) $where = '1=1';

		return sql("UPDATE `{$tn}` SET {$set} WHERE {$where}", $eo);
	}
	#########################################################
	/**
	 *  @brief Set/update the owner of given record
	 *  
	 *  @param [in] $tn name of table
	 *  @param [in] $pk primary key value
	 *  @param [in] $user username to set as owner
	 *  @return boolean indicating success/failure
	 */
	function set_record_owner($tn, $pk, $user){
		$fields = array(
			'memberID' => strtolower($user),
			'dateUpdated' => time(),
			'groupID' => get_group_id($user)
		);

		$where_array = array('tableName' => $tn, 'pkValue' => $pk);
		$where = prepare_sql_set($where_array, ' AND ');
		if(!$where) return false;

		/* do we have an ownership record? */
		$existing_owner = sqlValue("select LCASE(memberID) from membership_userrecords where {$where}");
		if($existing_owner == $user) return true; // owner already set to $user

		/* update owner */
		if($existing_owner){
			$res = update('membership_userrecords', $fields, $where_array);
			return ($res ? true : false);
		}

		/* add new ownership record */
		$fields = array_merge($fields, $where_array, array('dateAdded' => time()));
		$res = insert('membership_userrecords', $fields);
		return ($res ? true : false);
	}
	#########################################################
	/**
	 *  @brief get date/time format string for use in different cases.
	 *  
	 *  @param [in] $destination string, one of these: 'php' (see date function), 'mysql', 'moment'
	 *  @param [in] $datetime string, one of these: 'd' = date, 't' = time, 'dt' = both
	 *  @return string
	 */
	function app_datetime_format($destination = 'php', $datetime = 'd'){
		switch(strtolower($destination)){
			case 'mysql':
				$date = '%d/%m/%Y';
				$time = '%H:%i:%s';
				break;
			case 'moment':
				$date = 'DD/MM/YYYY';
				$time = 'HH:mm:ss';
				break;
			default: // php
				$date = 'd/m/Y';
				$time = 'H:i:s';
		}

		$datetime = strtolower($datetime);
		if($datetime == 'dt' || $datetime == 'td') return "{$date} {$time}";
		if($datetime == 't') return $time;
		return $date;
	}
	#########################################################
	/**
	 *  @brief perform a test and return results
	 *  
	 *  @param [in] $subject string used as title of test
	 *  @param [in] $test callable function containing the test to be performed, should return true on success, false or a log string on error
	 *  @return test result
	 *  
	 *  @details if the constant 'datalist_db_encoding' is not defined, original string is returned
	 */
	function test($subject, $test) {
		ob_start();
		$result = $test();
		if($result === true) {
			echo "<div class=\"alert alert-success vspacer-sm\" style=\"padding: 0.2em;\"><i class=\"glyphicon glyphicon-ok hspacer-lg\"></i> {$subject}</div>";
			return ob_get_clean();
		}

		$log = '';
		if($result !== false) $log = "<pre style=\"margin-left: 2em; padding: 0.2em;\">{$result}</pre>";
		echo "<div class=\"alert alert-danger vspacer-sm\" style=\"padding: 0.2em;\"><i class=\"glyphicon glyphicon-remove hspacer-lg\"></i> <span class=\"text-bold\">{$subject}</span>{$log}</div>";
		return ob_get_clean();
	}
	#########################################################
	/**
	 *  @brief invoke a method of an object -- useful to call private/protected methods
	 *  
	 *  @param [in] $object instance of object containing the method
	 *  @param [in] $methodName string name of method to invoke
	 *  @param [in] $parameters array of parameters to pass to the method
	 *  @return the returned value from the invoked method
	 *  
	 *  @details if the constant 'datalist_db_encoding' is not defined, original string is returned
	 */
	function invoke_method(&$object, $methodName, array $parameters = array()) {
		$reflection = new ReflectionClass(get_class($object));
		$method = $reflection->getMethod($methodName);
		$method->setAccessible(true);

		return $method->invokeArgs($object, $parameters);
	}
	#########################################################
	/**
	 *  @brief invoke a method of a static class -- useful to call private/protected methods
	 *  
	 *  @param [in] $class string name of the class containing the method
	 *  @param [in] $methodName string name of method to invoke
	 *  @param [in] $parameters array of parameters to pass to the method
	 *  @return the returned value from the invoked method
	 *  
	 *  @details if the constant 'datalist_db_encoding' is not defined, original string is returned
	 */
	function invoke_static_method($class, $methodName, array $parameters = array()) {
		$reflection = new ReflectionClass($class);
		$method = $reflection->getMethod($methodName);
		$method->setAccessible(true);

		return $method->invokeArgs(null, $parameters);
	}
	#########################################################
	/**
	 *  @param [in] $app_datetime string, a datetime formatted in app-specific format
	 *  @return string, mysql-formatted datetime, 'yyyy-mm-dd H:i:s', or empty string on error
	 */
	function mysql_datetime($app_datetime, $date_format = null, $time_format = null){
		$app_datetime = trim($app_datetime);

		if($date_format === null) $date_format = app_datetime_format('php', 'd');
		$date_separator = $date_format[1];
		if($time_format === null) $time_format = app_datetime_format('php', 't');
		$time24 = (strpos($time_format, 'H') !== false); // true if $time_format is 24hr rather than 12

		$date_regex = str_replace(
			array('Y', 'm', 'd', '/', '.'),
			array('([0-9]{4})', '(1[012]|0?[1-9])', '([12][0-9]|3[01]|0?[1-9])', '\/', '\.'),
			$date_format
		);

		$time_regex = str_replace(
			array('H', 'h', ':i', ':s'),
			array(
				'(1[0-9]|2[0-3]|0?[0-9])', 
				'(1[012]|0?[0-9])', 
				'(:([1-5][0-9]|0?[0-9]))', 
				'(:([1-5][0-9]|0?[0-9]))?'
			),
			$time_format
		);
		if(stripos($time_regex, ' a'))
			$time_regex = str_replace(array(' a', ' A'), '\s*(am|pm|a|p)?', $time_regex);
		else
			$time_regex = str_replace(array('a', 'A'), '\s*(am|pm|a|p)?', $time_regex);

		// extract date and time
		$time = '';
		$mat = array();
		$regex = "/^({$date_regex})(\s+{$time_regex})?$/i";
		$valid_dt = preg_match($regex, $app_datetime, $mat);
		if(!$valid_dt || count($mat) < 5) return ''; // invlaid datetime
		// if we have a time, get it and change 'a' or 'p' at the end to 'am'/'pm'
		if(count($mat) >= 8) $time = preg_replace('/(a|p)$/i', '$1m', trim($mat[5]));

		// extract date elements from regex match, given 1st 2 items are full string and full date
		$date_order = str_replace($date_separator, '', $date_format);
		$day = $mat[stripos($date_order, 'd') + 2];
		$month = $mat[stripos($date_order, 'm') + 2];
		$year = $mat[stripos($date_order, 'y') + 2];

		// convert time to 24hr format if necessary
		if($time && !$time24) $time = date('H:i:s', strtotime("2000-01-01 {$time}"));

		$mysql_datetime = trim("{$year}-{$month}-{$day} {$time}");

		// strtotime handles dates between 1902 and 2037 only
		// so we need another test date for dates outside this range ...
		$test = $mysql_datetime;
		if($year < 1902 || $year > 2037) $test = str_replace($year, '2000', $mysql_datetime);

		return (strtotime($test) ? $mysql_datetime : '');
	}
	#########################################################
	/**
	 *  @param [in] $mysql_datetime string, Mysql-formatted datetime
	 *  @param [in] $datetime string, one of these: 'd' = date, 't' = time, 'dt' = both
	 *  @return string, app-formatted datetime, or empty string on error
	 *  
	 *  @details works for formatting date, time and datetime, based on 2nd param
	 */  
	function app_datetime($mysql_datetime, $datetime = 'd'){
		$pyear = $myear = substr($mysql_datetime, 0, 4);

		// strtotime handles dates between 1902 and 2037 only
		// so we need a temp date for dates outside this range ...
		if($myear < 1902 || $myear > 2037) $pyear = 2000;
		$mysql_datetime = str_replace($myear, $pyear, $mysql_datetime);

		$ts = strtotime($mysql_datetime);
		if(!$ts) return '';

		$pdate = date(app_datetime_format('php', $datetime), $ts);
		return str_replace($pyear, $myear, $pdate);
	}
	#########################################################
	/**
	 *  @brief converts string from app-configured encoding to utf8
	 *  
	 *  @param [in] $str string to convert to utf8
	 *  @return utf8-encoded string
	 *  
	 *  @details if the constant 'datalist_db_encoding' is not defined, original string is returned
	 */
	function to_utf8($str) {
		if(!defined('datalist_db_encoding')) return $str;
		if(datalist_db_encoding == 'UTF-8') return $str;
		return iconv(datalist_db_encoding, 'UTF-8', $str);
	}
	#########################################################
	/**
	 *  @brief converts string from utf8 to app-configured encoding
	 *  
	 *  @param [in] $str string to convert from utf8
	 *  @return utf8-decoded string
	 *  
	 *  @details if the constant 'datalist_db_encoding' is not defined, original string is returned
	 */
	function from_utf8($str) {
		if(!defined('datalist_db_encoding')) return $str;
		if(datalist_db_encoding == 'UTF-8') return $str;
		return iconv('UTF-8', datalist_db_encoding, $str);
	}
