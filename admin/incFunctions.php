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
		get_parent_tables($tn) -- returns parents of given table: ['parent table' => [main lookup fields in child], ..]
		backtick_keys_once($data) -- wraps keys of given array with backticks ` if not already wrapped. Useful for use with fieldnames passed to update() and insert()
		calculated_fields() -- returns calculated fields config array: [table => [field => query, ..], ..]
		update_calc_fields($table, $id, $formulas, $mi = false) -- updates record of given $id in given $table according to given $formulas on behalf of user specified in given info array (or current user if false)
		latest_jquery() -- detects and returns the name of the latest jQuery file found in resources/jquery/js
		existing_value($tn, $fn, $id, $cache = true) -- returns (cached) value of field $fn of record having $id in table $tn. Set $cache to false to bypass caching.
		checkAppRequirements() -- if PHP doesn't meet app requirements, outputs error and exits
		getRecord($table, $id) -- return the record having a PK of $id from $table as an associative array, falsy value on error/not found
		guessMySQLDateTime($dt) -- if $dt is not already a mysql date/datetime, use mysql_datetime() to convert then return mysql date/datetime. Returns false if $dt invalid or couldn't be detected.
		pkGivenLookupText($val, $tn, $lookupField, $falseIfNotFound) -- returns corresponding PK value for given $val which is the textual lookup value for given $lookupField in given $tn table. If $val has no corresponding PK value, $val is returned as-is, unless $falseIfNotFound is set to true, in which case false is returned.
		userCanImport() -- returns true if user (or his group) can import CSV files (through the permission set in the group page in the admin area).
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	*/
	########################################################################
	function set_headers() {
		@header('Content-Type: text/html; charset=' . datalist_db_encoding);
		@header('X-Frame-Options: SAMEORIGIN'); // prevent iframing by other sites to prevent clickjacking
	}
	########################################################################
	function get_tables_info($skip_authentication = false) {
		static $all_tables = [], $accessible_tables = [];

		/* return cached results, if found */
		if(($skip_authentication || getLoggedAdmin()) && count($all_tables)) return $all_tables;
		if(!$skip_authentication && count($accessible_tables)) return $accessible_tables;

		/* table groups */
		$tg = array(
			'I. Data Collection &amp; Selection (Bibliography)',
			'II. Text analysis &amp; Character Dev. (Biography)',
			'III. Collab. narrative production (Historiography)',
			'Dramatica Codes',
			'Library Codes',
			'Discursive Codes',
			'Gameplay'
		);

		$all_tables = array(
			/* ['table_name' => [table props assoc array] */   
				'game_agent' => array(
					'Caption' => 'Game Agents',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/user_edit.png',
					'group' => $tg[6],
					'homepageShowCount' => 1
				),
				'biblio_author' => array(
					'Caption' => 'Authors',
					'Description' => 'Agents who have text corpus become authors.',
					'tableIcon' => 'resources/table_icons/user_edit.png',
					'group' => $tg[0],
					'homepageShowCount' => 1
				),
				'biblio_doc' => array(
					'Caption' => 'Corpus',
					'Description' => 'At level III, collect autobiographical writings as part of the text corpus.',
					'tableIcon' => 'resources/table_icons/books.png',
					'group' => $tg[0],
					'homepageShowCount' => 1
				),
				'biblio_transcript' => array(
					'Caption' => 'Transcripts',
					'Description' => 'Part of the preparation requires to transcribe all handwritten manuscrips, and to make all text avaible for OCR.',
					'tableIcon' => 'resources/table_icons/book_edit.png',
					'group' => $tg[0],
					'homepageShowCount' => 1
				),
				'biblio_token' => array(
					'Caption' => 'Tokens',
					'Description' => 'After transcription, the data are ready to be tokenized. Use Voyant Tools for this purpose.',
					'tableIcon' => 'resources/table_icons/book_key.png',
					'group' => $tg[0],
					'homepageShowCount' => 1
				),
				'biblio_code_invivo' => array(
					'Caption' => 'Invivo',
					'Description' => 'Start encoding the data based on invivo; dates, places, names.<br>Voyant tool for semantic anaylsis: https://voyant-tools.org/',
					'tableIcon' => 'resources/table_icons/book_link.png',
					'group' => $tg[0],
					'homepageShowCount' => 1
				),
				'biblio_code_demo' => array(
					'Caption' => 'Demographic encoding',
					'Description' => 'Archeological and archivistic data; as sex, age, race.<br>Some inspiratin here: https://applieddemogtoolbox.github.io/',
					'tableIcon' => 'table.gif',
					'group' => $tg[0],
					'homepageShowCount' => 1
				),
				'biblio_team' => array(
					'Caption' => 'Bibliography team',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[0],
					'homepageShowCount' => 1
				),
				'biblio_analyst' => array(
					'Caption' => 'Bibliography analyst',
					'Description' => 'Agents who write about agents become biographers.<br>If they write about themselves, they become autobiographers.',
					'tableIcon' => 'resources/table_icons/user_edit.png',
					'group' => $tg[0],
					'homepageShowCount' => 1
				),
				'bio_team' => array(
					'Caption' => 'Biography team',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'bio_author' => array(
					'Caption' => 'Biographers',
					'Description' => 'Agents who write about agents become biographers.<br>If they write about themselves, they become autobiographers.',
					'tableIcon' => 'resources/table_icons/user_edit.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'bio_story' => array(
					'Caption' => 'Biographies',
					'Description' => 'This is the biography of an agent, either as authobiographical writing or by a third person.',
					'tableIcon' => 'resources/table_icons/butterfly.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'bio_chr' => array(
					'Caption' => 'Biogr. Characters',
					'Description' => 'Encode a characters role within a biographical context.',
					'tableIcon' => 'resources/table_icons/map_edit.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'bio_storyline' => array(
					'Caption' => 'Bio. storylines',
					'Description' => 'Tell the biography along a story line.',
					'tableIcon' => 'resources/table_icons/chart_curve_edit.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'bio_storystatic' => array(
					'Caption' => 'Bio. static storypoints',
					'Description' => 'Encode static story points.<br>They are also known  as static plot points and remain the same throughout an entire story.',
					'tableIcon' => 'resources/table_icons/application_view_tile.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'bio_storyweaving_scene' => array(
					'Caption' => 'Bio. storyweaving scenes',
					'Description' => 'Create scenes for further story weaving.',
					'tableIcon' => 'resources/table_icons/layers_map.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'bio_chr_scene' => array(
					'Caption' => 'Bio. character scenes',
					'Description' => 'Take part of the authentic text and convert it in character scenes by coding relevant scenes for the character.<br>For Biographies, Character scenes and Storylines are identical, from a storytelling point of view.<br>Storylines encode the order in which these scenes appear, and the Character scenes encode invivo, demographic and hermeneutic codes for the character.',
					'tableIcon' => 'resources/table_icons/camera.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'bio_chr_dev' => array(
					'Caption' => 'Bio character dev.',
					'Description' => 'Convert some of the authors in characters for the story you are telling.<br>Use character creation tools such as Dramatica Pro Character Builder to assign Elements in the correct way.',
					'tableIcon' => 'resources/table_icons/private.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'bio_encounter' => array(
					'Caption' => 'Life Encounters',
					'Description' => 'Combine encounter scenes of different characters into a one-to-one encounter.',
					'tableIcon' => 'resources/table_icons/arrow_refresh.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'bio_encounter_scene' => array(
					'Caption' => 'Bio. encounter scenes',
					'Description' => 'Select special scenes in which characters encounter with others.',
					'tableIcon' => 'resources/table_icons/comments.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'bio_code_herme' => array(
					'Caption' => 'Hermeneutic',
					'Description' => 'Based on the use of language and the context, encode the impression management and noetic interpretation.<br>TapoRWare for text analysis: http://tapor.ca/home/',
					'tableIcon' => 'resources/table_icons/book_next.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'bio_storydynamic' => array(
					'Caption' => 'Bio dynamic storypoints',
					'Description' => 'Encode the story dynamic base on Dramatica.<br>They are the dynamic forces that will act upon the dramatic potentials to change the relationship between characters, change the course of the plot and develop the theme as the story unfolds.',
					'tableIcon' => 'resources/table_icons/areachart.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'hist_author' => array(
					'Caption' => 'Historiographers',
					'Description' => 'Agents who combine individual life writings into a story about a concrete community become historiographers.',
					'tableIcon' => 'resources/table_icons/user_edit.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'hist_team' => array(
					'Caption' => 'History Teams',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'hist_story' => array(
					'Caption' => 'Nation story',
					'Description' => 'This is your final nation story, which can be analysed and compared.',
					'tableIcon' => 'resources/table_icons/butterfly.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'hist_chr' => array(
					'Caption' => 'History characters',
					'Description' => 'Encode a characters role within the context of the nation story.',
					'tableIcon' => 'resources/table_icons/map_edit.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'hist_chr_dev' => array(
					'Caption' => 'Hist. character dev.',
					'Description' => 'Convert some of the biographical characters into story characters.<br>At this level, psychological aspects are already given. Here we encode only the dramatic aspects.<br>Use character creation tools such as Dramatica Pro Character Builder to assign Elements in the correct way.',
					'tableIcon' => 'resources/table_icons/private.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'hist_chr_scene' => array(
					'Caption' => 'Historical character scenes',
					'Description' => 'Take part of the biographical storylines and convert them into character scenes.',
					'tableIcon' => 'resources/table_icons/camera.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'hist_storyline' => array(
					'Caption' => 'History storylines',
					'Description' => 'Weave your story along a story line.',
					'tableIcon' => 'resources/table_icons/chart_curve_edit.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'hist_storystatic' => array(
					'Caption' => 'History static storypoints',
					'Description' => 'Encode static story points.<br>They are also known  as static plot points and remain the same throughout an entire story.',
					'tableIcon' => 'resources/table_icons/application_view_tile.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'hist_storydynamic' => array(
					'Caption' => 'Hist. dynamic storypoints',
					'Description' => 'Encode the story dynamic base on Dramatica.<br>They are the dynamic forces that will act upon the dramatic potentials to change the relationship between characters, change the course of the plot and develop the theme as the story unfolds.',
					'tableIcon' => 'resources/table_icons/areachart.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'hist_storyweaving_scene' => array(
					'Caption' => 'History storyweaving scenes',
					'Description' => 'Weave the scenes within your story.<br>This is more than a literary device. It is the tool were you lay the full argumentation of the Grand Argument within your story down.',
					'tableIcon' => 'resources/table_icons/layers_map.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'hist_encounter' => array(
					'Caption' => 'Historical events',
					'Description' => 'Combine encounter scenes of different characters into a one-to-one encounter.',
					'tableIcon' => 'resources/table_icons/arrow_refresh.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'hist_encounter_scene' => array(
					'Caption' => 'History encounter scenes',
					'Description' => 'Write scenes of encounter.',
					'tableIcon' => 'resources/table_icons/comments.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'hist_community' => array(
					'Caption' => 'Communities',
					'Description' => 'First we look for covenant communities, communities whose shared narrative linkes their material existence with a transcendent experience.',
					'tableIcon' => 'resources/table_icons/tower.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'class_agent_selection' => array(
					'Caption' => 'Agent selection phase',
					'Description' => 'The phase of the selection process this agent belong to and the strategy used.',
					'tableIcon' => 'table.gif',
					'group' => $tg[4],
					'homepageShowCount' => 0
				),
				'class_agent_type1' => array(
					'Caption' => 'Agent type 1',
					'Description' => 'Use this category for strategic sampling groups.',
					'tableIcon' => 'resources/table_icons/group_key.png',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'class_agent_type2' => array(
					'Caption' => 'Agent type 2',
					'Description' => 'Use this category for strategic sampling groups.',
					'tableIcon' => 'resources/table_icons/group_key.png',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'class_character_element' => array(
					'Caption' => 'Character elements',
					'Description' => 'Character elements as defined by Dramatica.',
					'tableIcon' => 'resources/table_icons/application_view_gallery.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'class_gender' => array(
					'Caption' => 'Gender',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[4],
					'homepageShowCount' => 0
				),
				'class_authority_agent' => array(
					'Caption' => 'Agent authority code',
					'Description' => 'Set here the code that assigns a unique identifier to the historical persons.',
					'tableIcon' => 'resources/table_icons/barcode.png',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'class_evaluation' => array(
					'Caption' => 'Evaluation phase',
					'Description' => 'The level of certainty the associated data have and who proved them.',
					'tableIcon' => 'table.gif',
					'group' => $tg[4],
					'homepageShowCount' => 0
				),
				'class_bibliography_type' => array(
					'Caption' => 'Text type',
					'Description' => 'Classify your text.',
					'tableIcon' => 'resources/table_icons/align_center.png',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'class_bibliography_genre' => array(
					'Caption' => 'Genre',
					'Description' => 'Define a genre.',
					'tableIcon' => 'resources/table_icons/text_drama.png',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'class_authority_library' => array(
					'Caption' => 'Text authority code',
					'Description' => 'Set here the code that assigns a unique identifier to the text.',
					'tableIcon' => 'resources/table_icons/barcode.png',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'class_rights' => array(
					'Caption' => 'IP Rigths',
					'Description' => 'Define the intelectual property right of the corpus.',
					'tableIcon' => 'resources/table_icons/balance_unbalance.png',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'class_language' => array(
					'Caption' => 'Document Language',
					'Description' => 'Languages for documents.',
					'tableIcon' => 'resources/table_icons/arrow_switch.png',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'class_story_collab_type' => array(
					'Caption' => 'Collaboration type',
					'Description' => 'What level of collaboration used to write the story.',
					'tableIcon' => 'table.gif',
					'group' => $tg[6],
					'homepageShowCount' => 0
				),
				'class_story_acts' => array(
					'Caption' => 'Story acts',
					'Description' => 'Structure your story along acts.<br>They are the largest sequential increments by which the progress of a story is measured.',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'class_story_path' => array(
					'Caption' => 'Story pathes',
					'Description' => 'I am not sure what I used this for.',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'class_dramatica_steps' => array(
					'Caption' => 'Steps',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'class_dramatica_throughline' => array(
					'Caption' => 'Throughlines',
					'Description' => 'Throughlines as defined by Dramatica.<br>A Throughline is a sequence of story points within a single perspective.',
					'tableIcon' => 'resources/table_icons/participation_rate.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'class_dramatica_signpost' => array(
					'Caption' => 'Signposts',
					'Description' => 'Sequential markers of a story\'s progress that indicate the kind of concern central to each throughline in each Act.',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'class_dramatica_domain' => array(
					'Caption' => 'Domains',
					'Description' => 'As defined  by Dramatica.',
					'tableIcon' => 'resources/table_icons/flood_it.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'class_dramatica_concern' => array(
					'Caption' => 'Concerns',
					'Description' => 'As defined  by Dramatica.',
					'tableIcon' => 'resources/table_icons/server_components.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'class_dramatica_issue' => array(
					'Caption' => 'Issues',
					'Description' => 'As defined  by Dramatica.',
					'tableIcon' => 'resources/table_icons/winrar_view.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'class_dramatica_themes' => array(
					'Caption' => 'Themes',
					'Description' => 'Themes as defined by Dramatica.',
					'tableIcon' => 'resources/table_icons/barchart.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'class_dramatica_archetype' => array(
					'Caption' => 'Archetypes',
					'Description' => 'Archetypes as defined by Dramatica.',
					'tableIcon' => 'resources/table_icons/application_view_icons.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'class_dramatica_character' => array(
					'Caption' => 'Class dramatica character',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'class_dramatica_storypoints1' => array(
					'Caption' => 'Class dramatica storypoints 1',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'class_dramatica_storypoints2' => array(
					'Caption' => 'Class dramatica storypoints 2',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'class_dramatica_storypoints3' => array(
					'Caption' => 'Class dramatica storypoints 3',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'class_dynamicstorypoints4' => array(
					'Caption' => 'Class dynamicstorypoints',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'class_im' => array(
					'Caption' => 'Impressions',
					'Description' => 'Impressions as defined by Goffmanian impression management.',
					'tableIcon' => 'resources/table_icons/3d_glasses.png',
					'group' => $tg[5],
					'homepageShowCount' => 1
				),
				'class_pc' => array(
					'Caption' => 'Performative contradiction',
					'Description' => 'Performative contradiction, types and definitions according to Chapman et al.(2013).',
					'tableIcon' => 'table.gif',
					'group' => $tg[5],
					'homepageShowCount' => 0
				),
				'class_nt' => array(
					'Caption' => 'Noetic tension',
					'Description' => 'Impressions as defined by Franklian logotherapy.',
					'tableIcon' => 'resources/table_icons/application_lightning.png',
					'group' => $tg[5],
					'homepageShowCount' => 1
				),
				'dictionary' => array(
					'Caption' => 'Dictionary',
					'Description' => 'A general reference database for terminology.',
					'tableIcon' => 'resources/table_icons/books.png',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'class_dictionary1' => array(
					'Caption' => 'Class dictionary1',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[4],
					'homepageShowCount' => 0
				),
				'class_dictionary2' => array(
					'Caption' => 'Class dictionary1',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[4],
					'homepageShowCount' => 0
				),
				'class_dictionary3' => array(
					'Caption' => 'Class dictionary1',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[4],
					'homepageShowCount' => 0
				),
				'class_dictionary5' => array(
					'Caption' => 'Class dictionary1',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[4],
					'homepageShowCount' => 0
				),
				'class_dictionary4' => array(
					'Caption' => 'Class dictionary1',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[4],
					'homepageShowCount' => 0
				),
		);

		if($skip_authentication || getLoggedAdmin()) return $all_tables;

		foreach($all_tables as $tn => $ti) {
			$arrPerm = getTablePermissions($tn);
			if($arrPerm['access']) $accessible_tables[$tn] = $ti;
		}

		return $accessible_tables;
	}
	#########################################################
	if(!function_exists('getTableList')) {
		function getTableList($skip_authentication = false) {
			$arrTables = array(
				'game_agent' => 'Game Agents',
				'biblio_author' => 'Authors',
				'biblio_doc' => 'Corpus',
				'biblio_transcript' => 'Transcripts',
				'biblio_token' => 'Tokens',
				'biblio_code_invivo' => 'Invivo',
				'biblio_code_demo' => 'Demographic encoding',
				'biblio_team' => 'Bibliography team',
				'biblio_analyst' => 'Bibliography analyst',
				'bio_team' => 'Biography team',
				'bio_author' => 'Biographers',
				'bio_story' => 'Biographies',
				'bio_chr' => 'Biogr. Characters',
				'bio_storyline' => 'Bio. storylines',
				'bio_storystatic' => 'Bio. static storypoints',
				'bio_storyweaving_scene' => 'Bio. storyweaving scenes',
				'bio_chr_scene' => 'Bio. character scenes',
				'bio_chr_dev' => 'Bio character dev.',
				'bio_encounter' => 'Life Encounters',
				'bio_encounter_scene' => 'Bio. encounter scenes',
				'bio_code_herme' => 'Hermeneutic',
				'bio_storydynamic' => 'Bio dynamic storypoints',
				'hist_author' => 'Historiographers',
				'hist_team' => 'History Teams',
				'hist_story' => 'Nation story',
				'hist_chr' => 'History characters',
				'hist_chr_dev' => 'Hist. character dev.',
				'hist_chr_scene' => 'Historical character scenes',
				'hist_storyline' => 'History storylines',
				'hist_storystatic' => 'History static storypoints',
				'hist_storydynamic' => 'Hist. dynamic storypoints',
				'hist_storyweaving_scene' => 'History storyweaving scenes',
				'hist_encounter' => 'Historical events',
				'hist_encounter_scene' => 'History encounter scenes',
				'hist_community' => 'Communities',
				'class_agent_selection' => 'Agent selection phase',
				'class_agent_type1' => 'Agent type 1',
				'class_agent_type2' => 'Agent type 2',
				'class_character_element' => 'Character elements',
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
				'class_dramatica_storypoints1' => 'Class dramatica storypoints 1',
				'class_dramatica_storypoints2' => 'Class dramatica storypoints 2',
				'class_dramatica_storypoints3' => 'Class dramatica storypoints 3',
				'class_dynamicstorypoints4' => 'Class dynamicstorypoints',
				'class_im' => 'Impressions',
				'class_pc' => 'Performative contradiction',
				'class_nt' => 'Noetic tension',
				'dictionary' => 'Dictionary',
				'class_dictionary1' => 'Class dictionary1',
				'class_dictionary2' => 'Class dictionary1',
				'class_dictionary3' => 'Class dictionary1',
				'class_dictionary5' => 'Class dictionary1',
				'class_dictionary4' => 'Class dictionary1',
			);

			return $arrTables;
		}
	}
	########################################################################
	function getThumbnailSpecs($tableName, $fieldName, $view) {
		if($tableName=='game_agent' && $fieldName=='img' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='game_agent' && $fieldName=='img' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='biblio_author' && $fieldName=='img' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='biblio_author' && $fieldName=='img' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='biblio_doc' && $fieldName=='img' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='biblio_doc' && $fieldName=='img' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='bio_chr' && $fieldName=='img' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='bio_chr' && $fieldName=='img' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		return FALSE;
	}
	########################################################################
	function createThumbnail($img, $specs) {
		$w = $specs['width'];
		$h = $specs['height'];
		$id = $specs['identifier'];
		$path = dirname($img);

		// image doesn't exist or inaccessible?
		if(!$size = @getimagesize($img)) return false;

		// calculate thumbnail size to maintain aspect ratio
		$ow = $size[0]; // original image width
		$oh = $size[1]; // original image height
		$twbh = $h / $oh * $ow; // calculated thumbnail width based on given height
		$thbw = $w / $ow * $oh; // calculated thumbnail height based on given width
		if($w && $h) {
			if($twbh > $w) $h = $thbw;
			if($thbw > $h) $w = $twbh;
		} elseif($w) {
			$h = $thbw;
		} elseif($h) {
			$w = $twbh;
		} else {
			return false;
		}

		// dir not writeable?
		if(!is_writable($path)) return false;

		// GD lib not loaded?
		if(!function_exists('gd_info')) return false;
		$gd = gd_info();

		// GD lib older than 2.0?
		preg_match('/\d/', $gd['GD Version'], $gdm);
		if($gdm[0] < 2) return false;

		// get file extension
		preg_match('/\.[a-zA-Z]{3,4}$/U', $img, $matches);
		$ext = strtolower($matches[0]);

		// check if supplied image is supported and specify actions based on file type
		if($ext == '.gif') {
			if(!$gd['GIF Create Support']) return false;
			$thumbFunc = 'imagegif';
		} elseif($ext == '.png') {
			if(!$gd['PNG Support'])  return false;
			$thumbFunc = 'imagepng';
		} elseif($ext == '.jpg' || $ext == '.jpe' || $ext == '.jpeg') {
			if(!$gd['JPG Support'] && !$gd['JPEG Support'])  return false;
			$thumbFunc = 'imagejpeg';
		} else {
			return false;
		}

		// determine thumbnail file name
		$ext = $matches[0];
		$thumb = substr($img, 0, -5) . str_replace($ext, $id . $ext, substr($img, -5));

		// if the original image smaller than thumb, then just copy it to thumb
		if($h > $oh && $w > $ow) {
			return (@copy($img, $thumb) ? true : false);
		}

		// get image data
		if(!$imgData = imagecreatefromstring(implode('', file($img)))) return false;

		// finally, create thumbnail
		$thumbData = imagecreatetruecolor($w, $h);

		//preserve transparency of png and gif images
		if($thumbFunc == 'imagepng') {
			if(($clr = @imagecolorallocate($thumbData, 0, 0, 0)) != -1) {
				@imagecolortransparent($thumbData, $clr);
				@imagealphablending($thumbData, false);
				@imagesavealpha($thumbData, true);
			}
		} elseif($thumbFunc == 'imagegif') {
			@imagealphablending($thumbData, false);
			$transIndex = imagecolortransparent($imgData);
			if($transIndex >= 0) {
				$transClr = imagecolorsforindex($imgData, $transIndex);
				$transIndex = imagecolorallocatealpha($thumbData, $transClr['red'], $transClr['green'], $transClr['blue'], 127);
				imagefill($thumbData, 0, 0, $transIndex);
			}
		}

		// resize original image into thumbnail
		if(!imagecopyresampled($thumbData, $imgData, 0, 0 , 0, 0, $w, $h, $ow, $oh)) return false;
		unset($imgData);

		// gif transparency
		if($thumbFunc == 'imagegif' && $transIndex >= 0) {
			imagecolortransparent($thumbData, $transIndex);
			for($y = 0; $y < $h; ++$y)
				for($x = 0; $x < $w; ++$x)
					if(((imagecolorat($thumbData, $x, $y) >> 24) & 0x7F) >= 100) imagesetpixel($thumbData, $x, $y, $transIndex);
			imagetruecolortopalette($thumbData, true, 255);
			imagesavealpha($thumbData, false);
		}

		if(!$thumbFunc($thumbData, $thumb)) return false;
		unset($thumbData);

		return true;
	}
	########################################################################
	function makeSafe($string, $is_gpc = true) {
		static $cached = []; /* str => escaped_str */

		if(!db_link()) sql("SELECT 1+1", $eo);

		// if this is a previously escaped string, return from cached
		// checking both keys and values
		if(isset($cached[$string])) return $cached[$string];
		$key = array_search($string, $cached);
		if($key !== false) return $string; // already an escaped string

		$cached[$string] = db_escape($string);
		return $cached[$string];
	}
	########################################################################
	function checkPermissionVal($pvn) {
		// fn to make sure the value in the given POST variable is 0, 1, 2 or 3
		// if the value is invalid, it default to 0
		$pvn=intval($_POST[$pvn]);
		if($pvn!=1 && $pvn!=2 && $pvn!=3) {
			return 0;
		} else {
			return $pvn;
		}
	}
	########################################################################
	if(!function_exists('sql')) {
		function sql($statment, &$o) {

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

			if(!$connected) {
				/****** Connect to MySQL ******/
				if(!extension_loaded('mysql') && !extension_loaded('mysqli')) {
					$o['error'] = 'PHP is not configured to connect to MySQL on this machine. Please see <a href="https://www.php.net/manual/en/ref.mysql.php">this page</a> for help on how to configure MySQL.';
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

				if(!($db_link = @db_connect($dbServer, $dbUsername, $dbPassword))) {
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
				if(!db_select_db($dbDatabase, $db_link)) {
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

			if(!$result = @db_query($statment, $db_link)) {
				if(!stristr($statment, "show columns")) {
					// retrieve error codes
					$errorNum = db_errno($db_link);
					$errorMsg = htmlspecialchars(db_error($db_link));

					if(getLoggedAdmin()) $errorMsg .= "<pre class=\"ltr\">{$Translation['query:']}\n" . htmlspecialchars($statment) . "</pre><p><i class=\"text-right\">{$Translation['admin-only info']}</i></p><p>{$Translation['try rebuild fields']}</p>";

					if($o['silentErrors']) { $o['error'] = $errorMsg; return false; }

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
	function sqlValue($statment, &$error = NULL) {
		// executes a statment that retreives a single data value and returns the value retrieved
		$eo = ['silentErrors' => true];
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
		if(empty($_SESSION['memberID'])) return false;
		if($_SESSION['memberID'] == $adminConfig['adminUsername']) {
			$_SESSION['adminUsername'] = $_SESSION['memberID'];
			return $_SESSION['adminUsername'];
		}

		unset($_SESSION['adminUsername']);
		return false;
	}
	########################################################################
	function checkUser($username, $password) {
		// checks given username and password for validity
		// if valid, registers the username in a session and returns true
		// else, returns false and destroys session

		$adminConfig = config('adminConfig');
		if($username != $adminConfig['adminUsername'] || !password_match($password, $adminConfig['adminPassword'])) {
			return false;
		}

		$_SESSION['adminUsername'] = $username;
		$_SESSION['memberGroupID'] = sqlValue("select groupID from membership_users where memberID='" . makeSafe($username) ."'");
		$_SESSION['memberID'] = $username;
		return true;
	}
	########################################################################
	function initSession() {
		$sh = @ini_get('session.save_handler');

		$options = [
			'name' => 'spindle',
			'save_handler' => stripos($sh, 'memcache') === false ? 'files' : $sh,
			'serialize_handler' => 'php',
			'cookie_lifetime' => '0',
			'cookie_path' => '/' . trim(config('appURI'), '/'),
			'cookie_httponly' => '1',
			'use_strict_mode' => '1',
			'use_cookies' => '1',
			'use_only_cookies' => '1',
			'cache_limiter' => $_SERVER['REQUEST_METHOD'] == 'POST' ? 'private' : 'nocache',
			'cache_expire' => '2',
		];

		// hook: session_options(), if defined, $options is passed to it by reference
		// to override default session behavior.
		// should be defined in hooks/bootstrap.php
		if(function_exists('session_options')) session_options($options);

		// check sessions config
		$noPathCheck = true; // set to false for debugging session issues
		$arrPath = explode(';', ini_get('session.save_path'));
		$save_path = $arrPath[count($arrPath) - 1];
		if(!$noPathCheck && !is_dir($save_path)) die('Invalid session.save_path in php.ini');

		if(session_id()) { session_write_close(); }

		foreach($options as $key => $value)
			@ini_set("session.{$key}", $value);

		session_start();
	}
	########################################################################
	function jwt_key() {
		$config_file = dirname(__FILE__) . '/../config.php';
		if(!is_file($config_file)) return false;
		return md5_file($config_file);
	}
	########################################################################
	function jwt_token($user = false) {
		if($user === false) $user = $_SESSION['memberID'];
		$key = jwt_key();
		if($key === false) return false;
		return JWT::encode(array('user' => $user), $key);
	}
	########################################################################
	function jwt_header() {
		/* adapted from https://stackoverflow.com/a/40582472/1945185 */
		$auth_header = null;
		if(isset($_SERVER['Authorization'])) {
			$auth_header = trim($_SERVER['Authorization']);
		} elseif(isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
			$auth_header = trim($_SERVER['HTTP_AUTHORIZATION']);
		} elseif(isset($_SERVER['HTTP_X_AUTHORIZATION'])) { //hack if all else fails
			$auth_header = trim($_SERVER['HTTP_X_AUTHORIZATION']);
		} elseif(function_exists('apache_request_headers')) {
			$rh = apache_request_headers();
			// Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
			$rh = array_combine(array_map('ucwords', array_keys($rh)), array_values($rh));
			if(isset($rh['Authorization'])) {
				$auth_header = trim($rh['Authorization']);
			} elseif(isset($rh['X-Authorization'])) {
				$auth_header = trim($rh['X-Authorization']);
			}
		}

		if(!empty($auth_header)) {
			if(preg_match('/Bearer\s(\S+)/', $auth_header, $matches)) return $matches[1];
		}

		return null;
	}
	########################################################################
	function jwt_check_login() {
		// do we have an Authorization Bearer header?
		$token = jwt_header();
		if(!$token) return false;

		$key = jwt_key();
		if($key === false) return false;

		$error = '';
		$payload = JWT::decode($token, $key, $error);
		if(empty($payload['user'])) return false;

		$_SESSION['memberID'] = $payload['user'];
		$safe_user = makeSafe($payload['user']);
		$_SESSION['memberGroupID'] = sqlValue(
			"SELECT `groupID` FROM `membership_users` WHERE `memberID`='{$safe_user}'" 
		);

		// for API calls that just trigger an action and then close connection, 
		// we need to continue running
		@ignore_user_abort(true);
		@set_time_limit(120);

		return true;
	}
	########################################################################
	function curl_insert_handler($table, $data) {
		if(!function_exists('curl_init')) return false;
		$ch = curl_init();

		$payload = $data;
		$payload['insert_x'] = 1;

		$url = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . config('host') . '/' . application_uri("{$table}_view.php");
		$token = jwt_token();
		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => http_build_query($payload),
			CURLOPT_HTTPHEADER => array(
				"User-Agent: {$_SERVER['HTTP_USER_AGENT']}",
				"Accept: {$_SERVER['HTTP_ACCEPT']}",
				"Authorization: Bearer " . $token,
				"X-Authorization: Bearer " . $token,
			),
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_RETURNTRANSFER => true,

			/* this is a localhost request so need to verify SSL */
			CURLOPT_SSL_VERIFYPEER => false,

			// the following option allows sending request and then 
			// closing the connection without waiting for response
			// see https://stackoverflow.com/a/10895361/1945185
			CURLOPT_TIMEOUT => 8,
		);

		if(defined('CURLOPT_TCP_FASTOPEN')) $options[CURLOPT_TCP_FASTOPEN] = true;
		if(defined('CURLOPT_SAFE_UPLOAD'))
			$options[CURLOPT_SAFE_UPLOAD] = function_exists('curl_file_create');

		// this is safe to use as we're sending a local request
		if(defined('CURLOPT_UNRESTRICTED_AUTH')) $options[CURLOPT_UNRESTRICTED_AUTH] = 1;

		curl_setopt_array($ch, $options);

		return $ch;
	}
########################################################################
	function curl_batch($handlers) {
		if(!function_exists('curl_init')) return false;
		if(!is_array($handlers)) return false;
		if(!count($handlers)) return false;

		$mh = curl_multi_init();
		if(function_exists('curl_multi_setopt')) {
			curl_multi_setopt($mh, CURLMOPT_PIPELINING, 1);
			curl_multi_setopt($mh, CURLMOPT_MAXCONNECTS, min(20, count($handlers)));
		}

		foreach($handlers as $ch) {
			@curl_multi_add_handle($mh, $ch);
		}

		$active = false;
		do {
			@curl_multi_exec($mh, $active);
			usleep(2000);
		} while($active > 0);
	}
	########################################################################
	function logOutUser() {
		RememberMe::logout();
	}
	########################################################################
	function getPKFieldName($tn) {
		// get pk field name of given table
		static $pk = [];
		if(isset($pk[$tn])) return $pk[$tn];

		$stn = makeSafe($tn, false);
		$eo = ['silentErrors' => true];
		if(!$res = sql("SHOW FIELDS FROM `$stn`", $eo)) return $pk[$tn] = false;

		while($row = db_fetch_assoc($res))
			if($row['Key'] == 'PRI') return $pk[$tn] = $row['Field'];

		return $pk[$tn] = false;
	}
	########################################################################
	function getCSVData($tn, $pkValue, $stripTags=true) {
		// get pk field name for given table
		if(!$pkField=getPKFieldName($tn)) {
			return "";
		}

		// get a concat string to produce a csv list of field values for given table record
		if(!$res=sql("show fields from `$tn`", $eo)) {
			return "";
		}
		while($row=db_fetch_assoc($res)) {
			$csvFieldList.="`{$row['Field']}`,";
		}
		$csvFieldList=substr($csvFieldList, 0, -1);

		$csvData=sqlValue("select CONCAT_WS(', ', $csvFieldList) from `$tn` where `$pkField`='" . makeSafe($pkValue, false) . "'");

		return ($stripTags ? strip_tags($csvData) : $csvData);
	}
	########################################################################
	function errorMsg($msg) {
		echo "<div class=\"alert alert-danger\">{$msg}</div>";
	}
	########################################################################
	function redirect($url, $absolute = false) {
		$fullURL = ($absolute ? $url : application_url($url));
		if(!headers_sent()) header("Location: {$fullURL}");

		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;url={$fullURL}\">";
		echo "<br><br><a href=\"{$fullURL}\">Click here</a> if you aren't automatically redirected.";
		exit;
	}
	########################################################################
	function htmlRadioGroup($name, $arrValue, $arrCaption, $selectedValue, $selClass = 'text-primary', $class = '', $separator = '<br>') {
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
		for($i = 0; $i < count($arrValue); $i++) {
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
	function htmlSelect($name, $arrValue, $arrCaption, $selectedValue, $class = '', $selectedClass = '') {
		if($selectedClass == '') {
			$selectedClass=$class;
		}
		if(is_array($arrValue)) {
			$out="<select name=\"$name\" id=\"$name\">";
			for($i = 0; $i < count($arrValue); $i++) {
				$out .= '<option value="' . $arrValue[$i] . '"' . ($arrValue[$i] == $selectedValue ? " selected class=\"$class\"" : " class=\"$selectedClass\"") . '>' . $arrCaption[$i] . '</option>';
			}
			$out .= '</select>';
		}
		return $out;
	}
	########################################################################
	function htmlSQLSelect($name, $sql, $selectedValue, $class = '', $selectedClass = '') {
		$arrVal[] = '';
		$arrCap[] = '';
		if($res = sql($sql, $eo)) {
			while($row = db_fetch_row($res)) {
				$arrVal[] = $row[0];
				$arrCap[] = $row[1];
			}
			return htmlSelect($name, $arrVal, $arrCap, $selectedValue, $class, $selectedClass);
		} else {
			return "";
		}
	}
	########################################################################
	function bootstrapSelect($name, $arrValue, $arrCaption, $selectedValue, $class = '', $selectedClass = '') {
		if($selectedClass == '') $selectedClass = $class;

		$out = "<select class=\"form-control\" name=\"{$name}\" id=\"{$name}\">";
		if(is_array($arrValue)) {
			for($i = 0; $i < count($arrValue); $i++) {
				$selected = "class=\"{$class}\"";
				if($arrValue[$i] == $selectedValue) $selected = "selected class=\"{$selectedClass}\"";
				$out .= "<option value=\"{$arrValue[$i]}\" {$selected}>{$arrCaption[$i]}</option>";
			}
		}
		$out .= '</select>';

		return $out;
	}
	########################################################################
	function bootstrapSQLSelect($name, $sql, $selectedValue, $class = '', $selectedClass = '') {
		$arrVal[] = '';
		$arrCap[] = '';
		if($res = sql($sql, $eo)) {
			while($row = db_fetch_row($res)) {
				$arrVal[] = $row[0];
				$arrCap[] = $row[1];
			}
			return bootstrapSelect($name, $arrVal, $arrCap, $selectedValue, $class, $selectedClass);
		}

		return '';
	}
	########################################################################
	function isEmail($email) {
		return filter_var(trim($email), FILTER_VALIDATE_EMAIL);
	}
	########################################################################
	function notifyMemberApproval($memberID) {
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
		$eo = ['silentErrors' => true];

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
		$eo = ['silentErrors' => true];

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
		$keys = [];
		$res = sql("SHOW KEYS FROM `{$tn}`", $eo);
		while($row = db_fetch_assoc($res))
			$keys[$row['Key_name']][$row['Seq_in_index']] = $row;

		return $keys;
	}
	########################################################################
	function get_table_fields($tn = null) {
		static $schema = null;
		if($schema === null) {
			/* application schema as created in AppGini */
			$schema = [
				'game_agent' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'user_id' => ['appgini' => "VARCHAR(40) NULL"],
					'memberID' => ['appgini' => "VARCHAR(40) NULL UNIQUE"],
					'img' => ['appgini' => "VARCHAR(40) NULL"],
					'groupID' => ['appgini' => "VARCHAR(40) NULL"],
					'selection_class' => ['appgini' => "INT UNSIGNED NULL"],
					'agenttype1' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agenttype2' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'gender' => ['appgini' => "INT UNSIGNED NULL"],
					'last_name' => ['appgini' => "VARCHAR(40) NULL"],
					'first_name' => ['appgini' => "VARCHAR(40) NULL"],
					'other_name' => ['appgini' => "VARCHAR(40) NULL"],
					'birthday' => ['appgini' => "DATETIME NULL"],
					'birth_location' => ['appgini' => "VARCHAR(250) NULL"],
					'birth_location_map' => ['appgini' => "VARCHAR(40) NULL"],
					'deathday' => ['appgini' => "DATETIME NULL"],
					'death_location' => ['appgini' => "VARCHAR(250) NULL"],
					'workplace' => ['appgini' => "VARCHAR(250) NULL"],
					'knows' => ['appgini' => "VARCHAR(250) NULL"],
					'shortbio' => ['appgini' => "LONGTEXT NULL"],
					'data_evaluation' => ['appgini' => "INT UNSIGNED NULL"],
					'viaf_no' => ['appgini' => "VARCHAR(40) NULL"],
					'authority_record' => ['appgini' => "VARCHAR(255) NULL"],
					'authority_organization' => ['appgini' => "INT(10) UNSIGNED NULL"],
				],
				'biblio_author' => [
					'game_agent_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'memberID' => ['appgini' => "VARCHAR(40) NULL"],
					'agent_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'img' => ['appgini' => "VARCHAR(40) NULL"],
					'groupID' => ['appgini' => "VARCHAR(40) NULL"],
					'selection_class' => ['appgini' => "INT UNSIGNED NULL"],
					'agenttype1' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agenttype2' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'gender' => ['appgini' => "INT UNSIGNED NULL"],
					'last_name' => ['appgini' => "VARCHAR(40) NULL"],
					'first_name' => ['appgini' => "VARCHAR(40) NULL"],
					'other_name' => ['appgini' => "VARCHAR(40) NULL"],
					'birthday' => ['appgini' => "DATETIME NULL"],
					'birth_location' => ['appgini' => "VARCHAR(250) NULL"],
					'birth_location_map' => ['appgini' => "VARCHAR(40) NULL"],
					'deathday' => ['appgini' => "DATETIME NULL"],
					'death_location' => ['appgini' => "VARCHAR(250) NULL"],
					'workplace' => ['appgini' => "VARCHAR(250) NULL"],
					'knows' => ['appgini' => "VARCHAR(250) NULL"],
					'shortbio' => ['appgini' => "LONGTEXT NULL"],
					'data_evaluation' => ['appgini' => "INT UNSIGNED NULL"],
					'authority_record' => ['appgini' => "VARCHAR(255) NULL"],
					'authority_organization' => ['appgini' => "INT(10) UNSIGNED NULL"],
				],
				'biblio_doc' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'img' => ['appgini' => "VARCHAR(40) NULL"],
					'author_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_id' => ['appgini' => "INT(10) UNSIGNED NOT NULL"],
					'type' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'genre' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'created' => ['appgini' => "DATETIME NULL"],
					'published' => ['appgini' => "DATETIME NULL"],
					'title' => ['appgini' => "LONGTEXT NOT NULL"],
					'subtitle' => ['appgini' => "LONGTEXT NULL"],
					'publisher' => ['appgini' => "VARCHAR(40) NULL"],
					'location' => ['appgini' => "VARCHAR(250) NULL"],
					'citation' => ['appgini' => "TEXT NULL"],
					'description' => ['appgini' => "TEXT NULL"],
					'source' => ['appgini' => "VARCHAR(40) NULL"],
					'medium' => ['appgini' => "VARCHAR(40) NULL"],
					'language' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'format' => ['appgini' => "VARCHAR(40) NULL"],
					'subject' => ['appgini' => "TEXT NULL"],
					'rights' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'rights_holder' => ['appgini' => "VARCHAR(255) NULL"],
					'data_evaluation' => ['appgini' => "INT UNSIGNED NULL"],
					'world_cat_no' => ['appgini' => "VARCHAR(40) NULL"],
					'authority_record' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'authority_organization' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'pdf_book' => ['appgini' => "VARCHAR(255) NULL"],
					'ext_source' => ['appgini' => "VARCHAR(255) NULL"],
					'tags' => ['appgini' => "LONGTEXT NULL"],
					'team' => ['appgini' => "INT UNSIGNED NULL"],
					'biblio_lead' => ['appgini' => "INT(10) UNSIGNED NULL"],
				],
				'biblio_transcript' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'author' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_memberID' => ['appgini' => "INT(10) UNSIGNED NOT NULL"],
					'bibliography_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bibliography_title' => ['appgini' => "INT(10) UNSIGNED NOT NULL"],
					'trascriber_memberID' => ['appgini' => "VARCHAR(40) NULL"],
					'transcript_title' => ['appgini' => "VARCHAR(250) NOT NULL"],
					'transcript' => ['appgini' => "VARCHAR(40) NOT NULL"],
					'credits' => ['appgini' => "VARCHAR(40) NULL"],
					'ip_rights' => ['appgini' => "INT(10) UNSIGNED NOT NULL"],
				],
				'biblio_token' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'author_id' => ['appgini' => "INT(10) UNSIGNED NOT NULL"],
					'author_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bibliography' => ['appgini' => "INT(10) UNSIGNED NOT NULL"],
					'transcript' => ['appgini' => "INT(10) UNSIGNED NOT NULL"],
					'token_sequence' => ['appgini' => "INT(11) NULL"],
					'token' => ['appgini' => "LONGTEXT NULL"],
				],
				'biblio_code_invivo' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'author' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bibliography' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'transcript' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'token_sequence' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'token' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'invivo' => ['appgini' => "LONGTEXT NULL"],
					'start_date' => ['appgini' => "DATETIME NULL"],
					'end_date' => ['appgini' => "DATETIME NULL"],
					'person' => ['appgini' => "VARCHAR(255) NULL"],
					'place' => ['appgini' => "VARCHAR(40) NULL"],
					'freecode' => ['appgini' => "LONGTEXT NULL"],
					'tags' => ['appgini' => "LONGTEXT NULL"],
				],
				'biblio_code_demo' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'author' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bibliography' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'transcript' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'token_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'token' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'sex' => ['appgini' => "VARCHAR(40) NULL"],
					'race' => ['appgini' => "VARCHAR(40) NULL"],
					'age' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'biblio_team' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'team' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'biblio_analyst' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'team' => ['appgini' => "INT UNSIGNED NULL"],
					'author_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_memberid' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'last_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'first_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'other_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
				],
				'bio_team' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'team' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'bio_author' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'team' => ['appgini' => "INT UNSIGNED NULL"],
					'author_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_memberid' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'last_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'first_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'other_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
				],
				'bio_story' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'bio_team' => ['appgini' => "INT UNSIGNED NULL"],
					'author_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'type' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'story_title' => ['appgini' => "VARCHAR(250) NULL"],
					'approach' => ['appgini' => "VARCHAR(40) NULL"],
					'tags' => ['appgini' => "VARCHAR(80) NULL"],
					'collaboration_status' => ['appgini' => "INT UNSIGNED NULL"],
				],
				'bio_chr' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'img' => ['appgini' => "VARCHAR(40) NULL"],
					'author_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_character' => ['appgini' => "INT UNSIGNED NULL"],
					'bio_archetype' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'character_name' => ['appgini' => "VARCHAR(40) NULL"],
					'role' => ['appgini' => "VARCHAR(250) NULL"],
					'comment' => ['appgini' => "TEXT NULL"],
				],
				'bio_storyline' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'biography' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bibliography' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'transcript' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'token_sequence' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'token' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'story_act' => ['appgini' => "INT UNSIGNED NULL"],
					'sequence' => ['appgini' => "VARCHAR(40) NULL"],
					'character' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'role' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'storyline_no' => ['appgini' => "VARCHAR(40) NULL"],
					'parenthetic' => ['appgini' => "VARCHAR(40) NULL"],
					'storyline_title' => ['appgini' => "VARCHAR(250) NULL"],
					'storyline' => ['appgini' => "LONGTEXT NULL"],
					'notes' => ['appgini' => "TEXT NULL"],
					'storyweaving_scene_no' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'storyweaving_scene' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'storyweaving_sequence' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'storyweaving_theme' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'character_scene' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'character_event' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'startdate' => ['appgini' => "DATETIME NULL"],
					'enddate' => ['appgini' => "DATETIME NULL"],
				],
				'bio_storystatic' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'throughline' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'story_character_mc' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'throughline_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'issue' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'problem' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'solution' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'symptom' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'response' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'catalyst' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'inhibitor' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'benchmark' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'signpost1' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'signpost2' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'signpost3' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'signpost4' => ['appgini' => "INT(10) UNSIGNED NULL"],
				],
				'bio_storyweaving_scene' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'step' => ['appgini' => "INT UNSIGNED NULL"],
					'throughline' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'issue' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'theme' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'sequence' => ['appgini' => "VARCHAR(40) NULL"],
					'encoding' => ['appgini' => "LONGTEXT NULL"],
				],
				'bio_chr_scene' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'biography' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bibliography' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'transcript' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'token_sequence' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'token' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'invivo_code' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'startdate' => ['appgini' => "INT(10) UNSIGNED NULL DEFAULT '1'"],
					'enddate' => ['appgini' => "INT(10) UNSIGNED NULL DEFAULT '1'"],
					'person' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'place' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'herme_code' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'impression' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'noetictension' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'pc' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'chr_element' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'comment' => ['appgini' => "TEXT NULL"],
					'illustration' => ['appgini' => "TEXT NULL"],
					'scene' => ['appgini' => "LONGTEXT NULL"],
				],
				'bio_chr_dev' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'agent_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'cw_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'dp1_resolve' => ['appgini' => "INT UNSIGNED NULL"],
					'dp2_resolve' => ['appgini' => "INT UNSIGNED NULL"],
					'dp3_resolve' => ['appgini' => "INT UNSIGNED NULL"],
					'mc_resolve' => ['appgini' => "INT UNSIGNED NULL"],
					'illust_resolve' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'dp3_growth' => ['appgini' => "INT UNSIGNED NULL"],
					'mc_growth' => ['appgini' => "INT UNSIGNED NULL"],
					'illust_growth' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'dp3_approach' => ['appgini' => "INT UNSIGNED NULL"],
					'mc_approach' => ['appgini' => "INT UNSIGNED NULL"],
					'illust_approach' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'dp3_psstyle' => ['appgini' => "INT UNSIGNED NULL"],
					'mc_ps_style' => ['appgini' => "INT UNSIGNED NULL"],
					'illust_ps_style' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'cw_age' => ['appgini' => "VARCHAR(40) NULL"],
					'cw_gender' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'cw_communication_style' => ['appgini' => "TEXT NULL"],
					'cw_background' => ['appgini' => "TEXT NULL"],
					'cw_appearance' => ['appgini' => "TEXT NULL"],
					'cw_relationships' => ['appgini' => "VARCHAR(255) NULL"],
					'cw_ambition' => ['appgini' => "TEXT NULL"],
					'cw_defects' => ['appgini' => "TEXT NULL"],
					'cw_thoughts' => ['appgini' => "TEXT NULL"],
					'cw_relatedness' => ['appgini' => "VARCHAR(255) NULL"],
					'cw_restrictions' => ['appgini' => "TEXT NULL"],
					'locations' => ['appgini' => "VARCHAR(255) NULL"],
					'persons' => ['appgini' => "VARCHAR(255) NULL"],
					'events' => ['appgini' => "TEXT NULL"],
					'noetictension' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'illust_nt' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'impression' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'illust_im' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mcs_problem' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'illust_mcs_problem' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mcs_solution' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'illust_mcs_solution' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mcs_symptom' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'illust_mcs_symptom' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mcs_response' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'illust_mcs_response' => ['appgini' => "INT(10) UNSIGNED NULL"],
				],
				'bio_encounter' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'authorA' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_nameA' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bibliographyA' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'transcriptA' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'tokenA' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'sceneA' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'authorB' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'authornameB' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bibliographyB' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'transcriptB' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'tokenB' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'sceneB' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'relation_description' => ['appgini' => "LONGTEXT NULL"],
					'type' => ['appgini' => "VARCHAR(40) NULL"],
					'conflicttype' => ['appgini' => "VARCHAR(40) NULL"],
					'story_scene' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'nd_color' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'nd_width' => ['appgini' => "VARCHAR(40) NULL"],
					'nd_style' => ['appgini' => "VARCHAR(40) NULL"],
					'nd_opacity' => ['appgini' => "VARCHAR(40) NULL"],
					'nd_visibility' => ['appgini' => "VARCHAR(40) NULL"],
					'lbl_lable' => ['appgini' => "VARCHAR(40) NULL"],
					'lbl_color' => ['appgini' => "VARCHAR(40) NULL"],
					'lbl_size' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'bio_encounter_scene' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'scene' => ['appgini' => "TEXT NULL"],
				],
				'bio_code_herme' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'biography' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bibliography' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'transcript' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'token_sequence' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'token' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'hermeneutic' => ['appgini' => "TEXT NULL"],
					'impression' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'noetictension' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'quadrilemma' => ['appgini' => "BLOB NULL"],
					'pc' => ['appgini' => "INT UNSIGNED NULL"],
					'freecode' => ['appgini' => "LONGTEXT NULL"],
				],
				'bio_storydynamic' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'storystatic_mc' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'story_chr_mc' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mc_problem' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mc_resolve' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mc_growth' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mc_approach' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mc_ps_style' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'story_chr_ic' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'ic_resolve' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'dp_cat1' => ['appgini' => "INT UNSIGNED NULL"],
					'dp_cat2' => ['appgini' => "INT UNSIGNED NULL"],
					'dp_cat3_driver' => ['appgini' => "INT UNSIGNED NULL"],
					'os_driver' => ['appgini' => "INT UNSIGNED NULL"],
					'dp_cat3_limit' => ['appgini' => "INT UNSIGNED NULL"],
					'os_limit' => ['appgini' => "INT UNSIGNED NULL"],
					'dp_cat3_outcome' => ['appgini' => "INT UNSIGNED NULL"],
					'os_outcome' => ['appgini' => "INT UNSIGNED NULL"],
					'dp_cat3_judgement' => ['appgini' => "INT UNSIGNED NULL"],
					'os_judgement' => ['appgini' => "INT UNSIGNED NULL"],
					'os_goal_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_goal_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_consequence_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_consequence_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_cost_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_cost_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_dividend_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_dividend_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_requirements_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_requirements_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_prerequesites_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_prerequesites_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_preconditions_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_preconditions_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_forewarnings_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_forewarnings_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
				],
				'hist_author' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'team' => ['appgini' => "INT UNSIGNED NULL"],
					'agent_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_memberid' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'last_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'first_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
				],
				'hist_team' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'team' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'hist_story' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'team' => ['appgini' => "INT UNSIGNED NULL"],
					'hist_lead_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'hist_lead_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'community_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'story_title' => ['appgini' => "VARCHAR(250) NULL"],
					'genre' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'approach' => ['appgini' => "VARCHAR(250) NULL"],
					'description' => ['appgini' => "LONGTEXT NULL"],
					'tags' => ['appgini' => "LONGTEXT NULL"],
					'collaboration_status' => ['appgini' => "INT UNSIGNED NULL"],
					'language' => ['appgini' => "INT(10) UNSIGNED NULL"],
				],
				'hist_chr' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'team' => ['appgini' => "INT UNSIGNED NULL"],
					'hist_lead_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'hist_lead_memberid' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'hist_lead_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'hist_story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'story_character' => ['appgini' => "INT UNSIGNED NULL"],
					'story_archetype' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'character_name' => ['appgini' => "VARCHAR(40) NULL"],
					'role' => ['appgini' => "VARCHAR(40) NULL"],
					'comment' => ['appgini' => "TEXT NULL"],
				],
				'hist_chr_dev' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'hist_story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'cw_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'dp1_resolve' => ['appgini' => "INT UNSIGNED NULL"],
					'dp2_resolve' => ['appgini' => "INT UNSIGNED NULL"],
					'dp3_resolve' => ['appgini' => "INT UNSIGNED NULL"],
					'mc_resolve' => ['appgini' => "INT UNSIGNED NULL"],
					'illust_resolve' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'dp3_growth' => ['appgini' => "INT UNSIGNED NULL"],
					'mc_growth' => ['appgini' => "INT UNSIGNED NULL"],
					'illust_growth' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'dp3_approach' => ['appgini' => "INT UNSIGNED NULL"],
					'mc_approach' => ['appgini' => "INT UNSIGNED NULL"],
					'illust_approach' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'dp3_psstyle' => ['appgini' => "INT UNSIGNED NULL"],
					'mc_ps_style' => ['appgini' => "INT UNSIGNED NULL"],
					'illust_ps_style' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'cw_age' => ['appgini' => "VARCHAR(40) NULL"],
					'cw_gender' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'cw_communication_style' => ['appgini' => "TEXT NULL"],
					'cw_background' => ['appgini' => "TEXT NULL"],
					'cw_appearance' => ['appgini' => "TEXT NULL"],
					'cw_relationships' => ['appgini' => "VARCHAR(255) NULL"],
					'cw_ambition' => ['appgini' => "TEXT NULL"],
					'cw_defects' => ['appgini' => "TEXT NULL"],
					'cw_thoughts' => ['appgini' => "TEXT NULL"],
					'cw_relatedness' => ['appgini' => "VARCHAR(255) NULL"],
					'cw_restrictions' => ['appgini' => "TEXT NULL"],
					'locations' => ['appgini' => "VARCHAR(255) NULL"],
					'persons' => ['appgini' => "VARCHAR(255) NULL"],
					'events' => ['appgini' => "TEXT NULL"],
					'noetictension' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'illust_nt' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'impression' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'illust_im' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mcs_problem' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'illust_mcs_problem' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mcs_solution' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'illust_mcs_solution' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mcs_symptom' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'illust_mcs_symptom' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mcs_response' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'illust_mcs_response' => ['appgini' => "INT(10) UNSIGNED NULL"],
				],
				'hist_chr_scene' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'author_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'author_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'hist_story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'character' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_id' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'agent_name' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_storyline_no' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_storyline_text' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'chr_element' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'scene' => ['appgini' => "LONGTEXT NULL"],
					'illustration' => ['appgini' => "TEXT NULL"],
					'comment' => ['appgini' => "TEXT NULL"],
				],
				'hist_storyline' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'story_act' => ['appgini' => "INT UNSIGNED NULL"],
					'character' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'role' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'scene' => ['appgini' => "VARCHAR(40) NULL"],
					'sequence' => ['appgini' => "VARCHAR(40) NULL"],
					'storyline_no' => ['appgini' => "VARCHAR(40) NULL"],
					'parenthetic' => ['appgini' => "VARCHAR(250) NULL"],
					'storyline_title' => ['appgini' => "VARCHAR(250) NULL"],
					'storyline' => ['appgini' => "LONGTEXT NULL"],
					'notes' => ['appgini' => "TEXT NULL"],
					'storyweaving_scene_no' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'storyweaving_scene' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'storyweaving_sequence' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'storyweaving_theme' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'characterevent_scene' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'character_event' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'startdate' => ['appgini' => "DATE NULL"],
					'enddate' => ['appgini' => "DATE NULL"],
				],
				'hist_storystatic' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'throughline' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'story_character_mc' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'throughline_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'issue' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'problem' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'solution' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'symptom' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'response' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'catalyst' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'inhibitor' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'benchmark' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'signpost1' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'signpost2' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'signpost3' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'signpost4' => ['appgini' => "INT(10) UNSIGNED NULL"],
				],
				'hist_storydynamic' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'hist_story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_story_mc' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'hist_chr_mc' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'storystatic_mc' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'story_chr_mc' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mc_problem' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mc_resolve' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mc_growth' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mc_approach' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'mc_ps_style' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'story_chr_ic' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'ic_resolve' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'dp_cat1' => ['appgini' => "INT UNSIGNED NULL"],
					'dp_cat2' => ['appgini' => "INT UNSIGNED NULL"],
					'dp_cat3_driver' => ['appgini' => "INT UNSIGNED NULL"],
					'os_driver' => ['appgini' => "INT UNSIGNED NULL"],
					'dp_cat3_limit' => ['appgini' => "INT UNSIGNED NULL"],
					'os_limit' => ['appgini' => "INT UNSIGNED NULL"],
					'dp_cat3_outcome' => ['appgini' => "INT UNSIGNED NULL"],
					'os_outcome' => ['appgini' => "INT UNSIGNED NULL"],
					'dp_cat3_judgement' => ['appgini' => "INT UNSIGNED NULL"],
					'os_judgement' => ['appgini' => "INT UNSIGNED NULL"],
					'os_goal_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_goal_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_consequence_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_consequence_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_cost_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_cost_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_dividend_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_dividend_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_requirements_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_requirements_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_prerequesites_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_prerequesites_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_preconditions_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_preconditions_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_forewarnings_domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'os_forewarnings_concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
				],
				'hist_storyweaving_scene' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'story' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'step' => ['appgini' => "INT UNSIGNED NULL"],
					'throughline' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'issue' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'theme' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'sequence' => ['appgini' => "VARCHAR(40) NULL"],
					'encoding' => ['appgini' => "LONGTEXT NULL"],
				],
				'hist_encounter' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'bio_chrA' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_storyA' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_storyline' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_storytext' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'sceneA' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_chrB' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_storyB' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_storylineB' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'bio_storytextB' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'type' => ['appgini' => "VARCHAR(40) NULL"],
					'conflicttype' => ['appgini' => "VARCHAR(40) NULL"],
					'story_scene' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'nd_color' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'nd_width' => ['appgini' => "VARCHAR(40) NULL"],
					'nd_style' => ['appgini' => "VARCHAR(40) NULL"],
					'nd_opacity' => ['appgini' => "VARCHAR(40) NULL"],
					'nd_visibility' => ['appgini' => "VARCHAR(40) NULL"],
					'lbl_lable' => ['appgini' => "VARCHAR(40) NULL"],
					'lbl_color' => ['appgini' => "VARCHAR(40) NULL"],
					'lbl_size' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'hist_encounter_scene' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'scene' => ['appgini' => "TEXT NULL"],
				],
				'hist_community' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'com_name' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_agent_selection' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'selection_phase' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_agent_type1' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'type' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_agent_type2' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'type' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_character_element' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'element' => ['appgini' => "VARCHAR(40) NULL"],
					'value' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'class_gender' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'gender' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'class_authority_agent' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'abbreviation' => ['appgini' => "VARCHAR(40) NULL"],
					'authority_name' => ['appgini' => "VARCHAR(250) NULL"],
				],
				'class_evaluation' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'evaluation_type' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_bibliography_type' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'type' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_bibliography_genre' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'genre' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_authority_library' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'abbreviation' => ['appgini' => "VARCHAR(40) NULL"],
					'authority_name' => ['appgini' => "VARCHAR(80) NULL"],
				],
				'class_rights' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'right' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
					'certification' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'class_language' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'short' => ['appgini' => "VARCHAR(40) NULL"],
					'language' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'class_story_collab_type' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'collab_type' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_story_acts' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'act' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'class_story_path' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'path' => ['appgini' => "VARCHAR(40) NULL"],
					'topic' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'class_dramatica_steps' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'step' => ['appgini' => "VARCHAR(40) NULL"],
					'type' => ['appgini' => "VARCHAR(40) NULL"],
					'act' => ['appgini' => "INT UNSIGNED NULL"],
				],
				'class_dramatica_throughline' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'throughline' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_dramatica_signpost' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'signpost' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'class_dramatica_domain' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'domain' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_dramatica_concern' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'concern' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_dramatica_issue' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'issue' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_dramatica_themes' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'domain' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'concern' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'issue' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'theme' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_dramatica_archetype' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'archetype' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_dramatica_character' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'character' => ['appgini' => "VARCHAR(40) NULL"],
					'definition' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'class_dramatica_storypoints1' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'term' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_dramatica_storypoints2' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'cat1' => ['appgini' => "INT UNSIGNED NULL"],
					'term' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_dramatica_storypoints3' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'cat1' => ['appgini' => "INT UNSIGNED NULL"],
					'cat2' => ['appgini' => "INT UNSIGNED NULL"],
					'term' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_dynamicstorypoints4' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'cat1' => ['appgini' => "INT UNSIGNED NULL"],
					'cat2' => ['appgini' => "INT UNSIGNED NULL"],
					'cat3' => ['appgini' => "INT UNSIGNED NULL"],
					'term' => ['appgini' => "VARCHAR(40) NULL"],
					'value' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_im' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'impression' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
					'category' => ['appgini' => "TEXT NULL"],
				],
				'class_pc' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'perform_contrad' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'class_nt' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'noetictension' => ['appgini' => "VARCHAR(40) NULL"],
					'description' => ['appgini' => "TEXT NULL"],
				],
				'dictionary' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'term' => ['appgini' => "VARCHAR(40) NULL"],
					'definition' => ['appgini' => "TEXT NULL"],
				],
				'class_dictionary1' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'category' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'class_dictionary2' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'class1' => ['appgini' => "INT UNSIGNED NULL"],
					'category' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'class_dictionary3' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'class1' => ['appgini' => "INT UNSIGNED NULL"],
					'class2' => ['appgini' => "INT UNSIGNED NULL"],
					'category' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'class_dictionary5' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'class1' => ['appgini' => "INT UNSIGNED NULL"],
					'class2' => ['appgini' => "INT UNSIGNED NULL"],
					'class3' => ['appgini' => "INT UNSIGNED NULL"],
					'class4' => ['appgini' => "INT UNSIGNED NULL"],
					'category' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'class_dictionary4' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'class1' => ['appgini' => "INT UNSIGNED NULL"],
					'class2' => ['appgini' => "INT UNSIGNED NULL"],
					'class3' => ['appgini' => "INT UNSIGNED NULL"],
					'category' => ['appgini' => "VARCHAR(40) NULL"],
				],
			];
		}

		if($tn === null) return $schema;

		return isset($schema[$tn]) ? $schema[$tn] : [];
	}
	########################################################################
	function update_membership_groups() {
		$tn = 'membership_groups';
		$eo = ['silentErrors' => true];

		sql(
			"CREATE TABLE IF NOT EXISTS `{$tn}` (
				`groupID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				`name` varchar(100) NOT NULL,
				`description` TEXT,
				`allowSignup` TINYINT,
				`needsApproval` TINYINT,
				`allowCSVImport` TINYINT NOT NULL DEFAULT '0',
				PRIMARY KEY (`groupID`)
			) CHARSET " . mysql_charset,
		$eo);

		sql("ALTER TABLE `{$tn}` CHANGE COLUMN `name` `name` VARCHAR(100) NOT NULL", $eo);
		sql("ALTER TABLE `{$tn}` ADD UNIQUE INDEX `name` (`name`)", $eo);
		sql("ALTER TABLE `{$tn}` ADD COLUMN `allowCSVImport` TINYINT NOT NULL DEFAULT '0'", $eo);
	}
	########################################################################
	function update_membership_users() {
		$tn = 'membership_users';
		$eo = ['silentErrors' => true];

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
				`allowCSVImport` TINYINT NOT NULL DEFAULT '0', 
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
		sql("ALTER TABLE `{$tn}` ADD COLUMN `allowCSVImport` TINYINT NOT NULL DEFAULT '0'", $eo);
	}
	########################################################################
	function update_membership_userrecords() {
		$tn = 'membership_userrecords';
		$eo = ['silentErrors' => true];

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
		$eo = ['silentErrors' => true];

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
		$eo = ['silentErrors' => true];

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
		$eo = ['silentErrors' => true];

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
	function thisOr($this_val, $or = '&nbsp;') {
		return ($this_val != '' ? $this_val : $or);
	}
	########################################################################
	function getUploadedFile($FieldName, $MaxSize=0, $FileTypes='csv|txt', $NoRename=false, $dir='') {
		$currDir=dirname(__FILE__);
		if(is_array($_FILES)) {
			$f = $_FILES[$FieldName];
		} else {
			return 'Your php settings don\'t allow file uploads.';
		}

		if(!$MaxSize) {
			$MaxSize=toBytes(ini_get('upload_max_filesize'));
		}

		if(!is_dir("$currDir/csv")) {
			@mkdir("$currDir/csv");
		}

		$dir=(is_dir($dir) && is_writable($dir) ? $dir : "$currDir/csv/");

		if($f['error']!=4 && $f['name']!='') {
			if($f['size']>$MaxSize || $f['error']) {
				return 'File size exceeds maximum allowed of '.intval($MaxSize / 1024).'KB';
			}
			if(!preg_match('/\.('.$FileTypes.')$/i', $f['name'], $ft)) {
				return 'File type not allowed. Only these file types are allowed: '.str_replace('|', ', ', $FileTypes);
			}

			if($NoRename) {
				$n  = str_replace(' ', '_', $f['name']);
			} else {
				$n  = microtime();
				$n  = str_replace(' ', '_', $n);
				$n  = str_replace('0.', '', $n);
				$n .= $ft[0];
			}

			if(!@move_uploaded_file($f['tmp_name'], $dir . $n)) {
				return 'Couldn\'t save the uploaded file. Try chmoding the upload folder "'.$dir.'" to 777.';
			} else {
				@chmod($dir.$n, 0666);
				return $dir.$n;
			}
		}
		return 'An error occured while uploading the file. Please try again.';
	}
	########################################################################
	function toBytes($val) {
		$val = trim($val);
		$last = strtolower($val[strlen($val)-1]);
		switch($last) {
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
	function convertLegacyOptions($CSVList) {
		$CSVList=str_replace(';;;', ';||', $CSVList);
		$CSVList=str_replace(';;', '||', $CSVList);
		return trim($CSVList, '|');
	}
	########################################################################
	function getValueGivenCaption($query, $caption) {
		if(!preg_match('/select\s+(.*?)\s*,\s*(.*?)\s+from\s+(.*?)\s+order by.*/i', $query, $m)) {
			if(!preg_match('/select\s+(.*?)\s*,\s*(.*?)\s+from\s+(.*)/i', $query, $m)) {
				return '';
			}
		}

		// get where clause if present
		if(preg_match('/\s+from\s+(.*?)\s+where\s+(.*?)\s+order by.*/i', $query, $mw)) {
			$where = "where ({$mw[2]}) AND";
			$m[3] = $mw[1];
		} else {
			$where = 'where';
		}

		$caption = makeSafe($caption);
		return sqlValue("SELECT {$m[1]} FROM {$m[3]} {$where} {$m[2]}='{$caption}'");
	}
	########################################################################
	function time24($t = false) {
		if($t === false) $t = date('Y-m-d H:i:s'); // time now if $t not passed
		elseif(!$t) return ''; // empty string if $t empty
		return date('H:i:s', strtotime($t));
	}
	########################################################################
	function time12($t = false) {
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
	function is_ajax() {
		return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	}
	########################################################################
	function array_trim($arr) {
		if(!is_array($arr)) return trim($arr);
		return array_map('array_trim', $arr);
	}
	########################################################################
	function is_allowed_username($username, $exception = false) {
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
			2. when validating a submitted form: if(!csrf_token(true)) { reject_submission_somehow(); }
	*/
	function csrf_token($validate = false, $token_only = false) {
		$token_age = 60 * 60;
		/* retrieve token from session */
		$csrf_token = (isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : false);
		$csrf_token_expiry = (isset($_SESSION['csrf_token_expiry']) ? $_SESSION['csrf_token_expiry'] : false);

		if(!$validate) {
			/* create a new token if necessary */
			if($csrf_token_expiry < time() || !$csrf_token) {
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
		if($csrf_token_expiry < time() || !$user_token || $user_token != $csrf_token) {
			return false;
		}

		return true;
	}
	########################################################################
	function get_plugins() {
		$plugins = [];
		$plugins_path = dirname(__FILE__) . '/../plugins/';

		if(!is_dir($plugins_path)) return $plugins;

		$pd = dir($plugins_path);
		while(false !== ($plugin = $pd->read())) {
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
	function maintenance_mode($new_status = '') {
		$maintenance_file = dirname(__FILE__) . '/.maintenance';

		if($new_status === true) {
			/* turn on maintenance mode */
			@touch($maintenance_file);
		} elseif($new_status === false) {
			/* turn off maintenance mode */
			@unlink($maintenance_file);
		}

		/* return current maintenance mode status */
		return is_file($maintenance_file);
	}
	########################################################################
	function handle_maintenance($echo = false) {
		if(!maintenance_mode()) return;

		global $Translation;
		$adminConfig = config('adminConfig');

		$admin = getLoggedAdmin();
		if($admin) {
			return ($echo ? '<div class="alert alert-danger" style="margin: 5em auto -5em;"><b>' . $Translation['maintenance mode admin notification'] . '</b></div>' : '');
		}

		if(!$echo) exit;

		exit('<div class="alert alert-danger" style="margin-top: 5em; font-size: 2em;"><i class="glyphicon glyphicon-exclamation-sign"></i> ' . $adminConfig['maintenance_mode_message'] . '</div>');
	}
	#########################################################
	function html_attr($str) {
		if(version_compare(PHP_VERSION, '5.2.3') >= 0) return htmlspecialchars($str, ENT_QUOTES, datalist_db_encoding, false);
		return htmlspecialchars($str, ENT_QUOTES, datalist_db_encoding);
	}
	#########################################################
	function html_attr_tags_ok($str) {
		// use this instead of html_attr() if you don't want html tags to be escaped
		$new_str = html_attr($str);
		return str_replace(array('&lt;', '&gt;'), array('<', '>'), $new_str);
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

		protected function __construct() {} /* to prevent initialization */

		public static function placeholder() {
			if(self::$placeholder_id) return ''; // output placeholder code only once

			self::$placeholder_id = 'notifcation-placeholder-' . rand(10000000, 99999999);

			ob_start();
			?>

			<div class="notifcation-placeholder" id="<?php echo self::$placeholder_id; ?>"></div>
			<script>
				$j(function() {
					if(window.show_notification != undefined) return;

					window.show_notification = function(options) {
						var dismiss_class = '';
						var dismiss_icon = '';
						var cookie_name = 'hide_notification_' + options.id;
						var notif_id = 'notifcation-' + Math.ceil(Math.random() * 1000000);

						/* apply provided notficiation id if unique in page */
						if(options.id != undefined) {
							if(!$j('#' + options.id).length) notif_id = options.id;
						}

						/* notifcation should be hidden? */
						if(localStorage.getItem(cookie_name) != undefined) return;

						/* notification should be dismissable? */
						if(options.dismiss_seconds > 0 || options.dismiss_days > 0) {
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
						if(options.dismiss_seconds > 0) {
							setTimeout(function() { this_notif.addClass('invisible'); }, options.dismiss_seconds * 1000);
						}

						/* dismiss for x days if requested and user dismisses it */
						if(options.dismiss_days > 0) {
							var ex_days = options.dismiss_days;
							this_notif.on('closed.bs.alert', function() {
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

		protected static function default_options(&$options) {
			if(!isset($options['message'])) $options['message'] = 'Notification::show() called without a message!';

			if(!isset($options['class'])) $options['class'] = 'default';

			if(!isset($options['dismiss_seconds']) || isset($options['dismiss_days'])) $options['dismiss_seconds'] = 0;

			if(!isset($options['dismiss_days'])) $options['dismiss_days'] = 0;
			if(!isset($options['id'])) {
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
		public static function show($options = []) {
			self::default_options($options);

			ob_start();
			?>
			<script>
				$j(function() {
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
	function sendmail($mail) {
		if(!isset($mail['to'])) return 'No recipient defined';
		if(!isEmail($mail['to'])) return 'Invalid recipient email';

		$mail['subject'] = isset($mail['subject']) ? $mail['subject'] : '';
		$mail['message'] = isset($mail['message']) ? $mail['message'] : '';
		$mail['name'] = isset($mail['name']) ? $mail['name'] : '';
		$mail['debug'] = isset($mail['debug']) ? min(4, max(0, intval($mail['debug']))) : 0;

		$cfg = config('adminConfig');
		$smtp = ($cfg['mail_function'] == 'smtp');

		if(!class_exists('PHPMailer', false)) {
			$curr_dir = dirname(__FILE__);
			include_once("{$curr_dir}/../resources/PHPMailer/class.phpmailer.php");
			if($smtp) include_once("{$curr_dir}/../resources/PHPMailer/class.smtp.php");
		}

		$pm = new PHPMailer;
		$pm->CharSet = datalist_db_encoding;

		if($smtp) {
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
	function safe_html($str) {
		/* if $str has no HTML tags, apply nl2br */
		if($str == strip_tags($str)) return nl2br($str);

		$hc = new CI_Input(datalist_db_encoding);

		return $hc->xss_clean($str);
	}
	#########################################################
	function getLoggedGroupID() {
		if($_SESSION['memberGroupID'] != '') {
			return $_SESSION['memberGroupID'];
		} else {
			if(!setAnonymousAccess()) return false;
			return getLoggedGroupID();
		}
	}
	#########################################################
	function getLoggedMemberID() {
		if($_SESSION['memberID']!='') {
			return strtolower($_SESSION['memberID']);
		} else {
			if(!setAnonymousAccess()) return false;
			return getLoggedMemberID();
		}
	}
	#########################################################
	function setAnonymousAccess() {
		$adminConfig = config('adminConfig');
		$anon_group_safe = addslashes($adminConfig['anonymousGroup']);
		$anon_user_safe = strtolower(addslashes($adminConfig['anonymousMember']));

		$eo = ['silentErrors' => true];

		$res = sql("select groupID from membership_groups where name='{$anon_group_safe}'", $eo);
		if(!$res) { return false; }
		$row = db_fetch_array($res); $anonGroupID = $row[0];

		$_SESSION['memberGroupID'] = ($anonGroupID ? $anonGroupID : 0);

		$res = sql("select lcase(memberID) from membership_users where lcase(memberID)='{$anon_user_safe}' and groupID='{$anonGroupID}'", $eo);
		if(!$res) { return false; }
		$row = db_fetch_array($res); $anonMemberID = $row[0];

		$_SESSION['memberID'] = ($anonMemberID ? $anonMemberID : 0);

		return true;
	}
	#########################################################
	function getMemberInfo($memberID = '') {
		static $member_info = [];

		if(!$memberID) {
			$memberID = getLoggedMemberID();
		}

		// return cached results, if present
		if(isset($member_info[$memberID])) return $member_info[$memberID];

		$adminConfig = config('adminConfig');
		$mi = [];

		if($memberID) {
			$res = sql("select * from membership_users where memberID='" . makeSafe($memberID) . "'", $eo);
			if($row = db_fetch_assoc($res)) {
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
	function get_group_id($user = '') {
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
	function prepare_sql_set($set_array, $glue = ', ') {
		$fnvs = [];
		foreach($set_array as $fn => $fv) {
			if($fv === null) { $fnvs[] = "{$fn}=NULL"; continue; }

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
		if(!$set) return false;

		$eo = ['silentErrors' => true];
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
	 *  @param [out] $error optional string containing error message if insert fails
	 *  @return boolean indicating success/failure
	 */
	function update($tn, $set_array, $where_array, &$error = '') {
		$set = prepare_sql_set($set_array);
		if(!$set) return false;

		$where = prepare_sql_set($where_array, ' AND ');
		if(!$where) $where = '1=1';

		$eo = ['silentErrors' => true];
		$res = sql("UPDATE `{$tn}` SET {$set} WHERE {$where}", $eo);
		if($res) return true;

		$error = $eo['error'];
		return false;
	}
	#########################################################
	/**
	 *  @brief Set/update the owner of given record
	 *  
	 *  @param [in] $tn name of table
	 *  @param [in] $pk primary key value
	 *  @param [in] $user username to set as owner. If not provided (or false), update dateUpdated only
	 *  @return boolean indicating success/failure
	 */
	function set_record_owner($tn, $pk, $user = false) {
		$fields = [
			'memberID' => strtolower($user),
			'dateUpdated' => time(),
			'groupID' => get_group_id($user)
		];

		// don't update user if false
		if($user === false) unset($fields['memberID'], $fields['groupID']);

		$where_array = ['tableName' => $tn, 'pkValue' => $pk];
		$where = prepare_sql_set($where_array, ' AND ');
		if(!$where) return false;

		/* do we have an existing ownership record? */
		$res = sql("SELECT * FROM `membership_userrecords` WHERE {$where}", $eo);
		if($row = db_fetch_assoc($res)) {
			if($row['memberID'] == $user) return true; // owner already set to $user

			/* update owner and/or dateUpdated */
			$res = update('membership_userrecords', backtick_keys_once($fields), $where_array);
			return ($res ? true : false);
		}

		/* add new ownership record */
		$fields = array_merge($fields, $where_array, ['dateAdded' => time()]);
		$res = insert('membership_userrecords', backtick_keys_once($fields));
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
	function app_datetime_format($destination = 'php', $datetime = 'd') {
		switch(strtolower($destination)) {
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
	 */
	function invoke_method(&$object, $methodName, array $parameters = []) {
		$reflection = new ReflectionClass(get_class($object));
		$method = $reflection->getMethod($methodName);
		$method->setAccessible(true);

		return $method->invokeArgs($object, $parameters);
	}
	#########################################################
	/**
	 *  @brief retrieve the value of a property of an object -- useful to retrieve private/protected props
	 *  
	 *  @param [in] $object instance of object containing the method
	 *  @param [in] $propName string name of property to retrieve
	 *  @return the returned value of the given property, or null if property doesn't exist
	 */
	function get_property(&$object, $propName) {
		$reflection = new ReflectionClass(get_class($object));
		try {
			$prop = $reflection->getProperty($propName);
		} catch(Exception $e) {
			return null;
		}

		$prop->setAccessible(true);

		return $prop->getValue($object);
	}

	#########################################################
	/**
	 *  @brief invoke a method of a static class -- useful to call private/protected methods
	 *  
	 *  @param [in] $class string name of the class containing the method
	 *  @param [in] $methodName string name of method to invoke
	 *  @param [in] $parameters array of parameters to pass to the method
	 *  @return the returned value from the invoked method
	 */
	function invoke_static_method($class, $methodName, array $parameters = []) {
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
	function mysql_datetime($app_datetime, $date_format = null, $time_format = null) {
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
		$mat = [];
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
	function app_datetime($mysql_datetime, $datetime = 'd') {
		$pyear = $myear = substr($mysql_datetime, 0, 4);

		// if date is 0 (0000-00-00) return empty string
		if(!$mysql_datetime || substr($mysql_datetime, 0, 10) == '0000-00-00') return '';

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
	#########################################################
	function get_parent_tables($table) {
		/* parents array:
		 * 'child table' => [parents], ...
		 *         where parents array:
		 *             'parent table' => [main lookup fields in child]
		 */
		$parents = [
			'game_agent' => [
				'class_agent_selection' => ['selection_class'],
				'class_agent_type1' => ['agenttype1'],
				'class_agent_type2' => ['agenttype2'],
				'class_gender' => ['gender'],
				'class_evaluation' => ['data_evaluation'],
				'class_authority_agent' => ['authority_organization'],
			],
			'biblio_author' => [
				'game_agent' => ['game_agent_id'],
				'class_agent_selection' => ['selection_class'],
				'class_agent_type1' => ['agenttype1'],
				'class_agent_type2' => ['agenttype2'],
				'class_gender' => ['gender'],
				'class_evaluation' => ['data_evaluation'],
				'class_authority_agent' => ['authority_organization'],
			],
			'biblio_doc' => [
				'biblio_author' => ['author_id'],
				'class_bibliography_type' => ['type'],
				'class_bibliography_genre' => ['genre'],
				'class_language' => ['language'],
				'class_rights' => ['rights'],
				'class_evaluation' => ['data_evaluation'],
				'class_authority_library' => ['authority_organization'],
				'biblio_team' => ['team'],
				'biblio_analyst' => ['biblio_lead'],
			],
			'biblio_transcript' => [
				'biblio_author' => ['author_memberID'],
				'biblio_doc' => ['bibliography_title'],
				'class_rights' => ['ip_rights'],
			],
			'biblio_token' => [
				'biblio_author' => ['author_id'],
				'biblio_doc' => ['bibliography'],
				'biblio_transcript' => ['transcript'],
			],
			'biblio_code_invivo' => [
				'biblio_author' => ['author'],
				'biblio_doc' => ['bibliography'],
				'biblio_transcript' => ['transcript'],
				'biblio_token' => ['token_sequence'],
			],
			'biblio_code_demo' => [
				'biblio_author' => ['author'],
				'biblio_doc' => ['bibliography'],
				'biblio_transcript' => ['transcript'],
				'biblio_token' => ['token', 'token_id'],
			],
			'biblio_analyst' => [
				'biblio_team' => ['team'],
				'biblio_author' => ['author_id'],
			],
			'bio_author' => [
				'bio_team' => ['team'],
				'biblio_author' => ['author_id'],
			],
			'bio_story' => [
				'bio_team' => ['bio_team'],
				'bio_author' => ['author_id'],
				'class_bibliography_type' => ['type'],
				'game_agent' => ['agent_id'],
				'class_story_collab_type' => ['collaboration_status'],
			],
			'bio_chr' => [
				'bio_author' => ['author_id'],
				'game_agent' => ['agent_id'],
				'bio_story' => ['bio_story'],
				'class_dramatica_character' => ['bio_character'],
				'class_dramatica_archetype' => ['bio_archetype'],
			],
			'bio_storyline' => [
				'bio_story' => ['biography'],
				'biblio_author' => ['author_id'],
				'biblio_doc' => ['bibliography'],
				'biblio_transcript' => ['transcript'],
				'biblio_token' => ['token'],
				'class_story_acts' => ['story_act'],
				'bio_chr' => ['character'],
				'bio_storyweaving_scene' => ['storyweaving_scene_no'],
				'bio_chr_scene' => ['character_scene'],
				'bio_encounter_scene' => ['character_event'],
			],
			'bio_storystatic' => [
				'bio_story' => ['story'],
				'class_dramatica_throughline' => ['throughline'],
				'bio_chr' => ['story_character_mc'],
				'class_dramatica_domain' => ['throughline_domain'],
				'class_dramatica_concern' => ['signpost4', 'signpost3', 'signpost2', 'signpost1', 'concern'],
				'class_dramatica_issue' => ['issue'],
				'class_dramatica_themes' => ['benchmark', 'inhibitor', 'catalyst', 'response', 'symptom', 'solution', 'problem'],
			],
			'bio_storyweaving_scene' => [
				'bio_story' => ['story'],
				'class_dramatica_steps' => ['step'],
				'class_dramatica_throughline' => ['throughline'],
				'class_dramatica_domain' => ['domain'],
				'class_dramatica_concern' => ['concern'],
				'class_dramatica_issue' => ['issue'],
				'class_dramatica_themes' => ['theme'],
			],
			'bio_chr_scene' => [
				'bio_story' => ['biography'],
				'biblio_author' => ['author_id'],
				'biblio_doc' => ['bibliography'],
				'biblio_transcript' => ['transcript'],
				'biblio_token' => ['token'],
				'biblio_code_invivo' => ['startdate', 'invivo_code'],
				'bio_code_herme' => ['herme_code'],
				'class_character_element' => ['chr_element'],
			],
			'bio_chr_dev' => [
				'biblio_author' => ['agent_id'],
				'bio_story' => ['bio_story'],
				'bio_chr' => ['cw_name'],
				'class_dramatica_storypoints1' => ['dp1_resolve'],
				'class_dramatica_storypoints2' => ['dp2_resolve'],
				'class_dramatica_storypoints3' => ['dp3_psstyle', 'dp3_approach', 'dp3_growth', 'dp3_resolve'],
				'class_dynamicstorypoints4' => ['mc_ps_style', 'mc_approach', 'mc_growth', 'mc_resolve'],
				'bio_chr_scene' => ['illust_mcs_response', 'illust_mcs_symptom', 'illust_mcs_solution', 'illust_mcs_problem', 'illust_im', 'illust_nt', 'illust_ps_style', 'illust_approach', 'illust_growth', 'illust_resolve'],
				'class_nt' => ['noetictension'],
				'class_im' => ['impression'],
				'bio_storystatic' => ['mcs_problem'],
			],
			'bio_encounter' => [
				'game_agent' => ['authornameB', 'authorB', 'author_nameA', 'authorA'],
				'biblio_doc' => ['bibliographyB', 'bibliographyA'],
				'biblio_transcript' => ['transcriptB', 'transcriptA'],
				'biblio_token' => ['tokenB', 'tokenA'],
				'bio_chr_scene' => ['sceneB', 'sceneA'],
			],
			'bio_code_herme' => [
				'bio_story' => ['biography'],
				'game_agent' => ['agent_id'],
				'biblio_author' => ['author_id'],
				'biblio_doc' => ['bibliography'],
				'biblio_transcript' => ['transcript'],
				'biblio_token' => ['token_sequence'],
				'class_im' => ['impression'],
				'class_nt' => ['noetictension'],
				'class_pc' => ['pc'],
			],
			'bio_storydynamic' => [
				'bio_story' => ['story'],
				'bio_storystatic' => ['os_goal_domain', 'mc_problem', 'storystatic_mc'],
				'bio_chr' => ['story_chr_ic', 'story_chr_mc'],
				'bio_chr_dev' => ['ic_resolve', 'mc_ps_style', 'mc_approach', 'mc_growth', 'mc_resolve'],
				'class_dramatica_storypoints1' => ['dp_cat1'],
				'class_dramatica_storypoints2' => ['dp_cat2'],
				'class_dramatica_storypoints3' => ['dp_cat3_judgement', 'dp_cat3_outcome', 'dp_cat3_limit', 'dp_cat3_driver'],
				'class_dynamicstorypoints4' => ['os_judgement', 'os_outcome', 'os_limit', 'os_driver'],
				'class_dramatica_domain' => ['os_forewarnings_domain', 'os_preconditions_domain', 'os_prerequesites_domain', 'os_requirements_domain', 'os_dividend_domain', 'os_cost_domain', 'os_consequence_domain'],
				'class_dramatica_concern' => ['os_forewarnings_concern', 'os_preconditions_concern', 'os_prerequesites_concern', 'os_requirements_concern', 'os_dividend_concern', 'os_cost_concern', 'os_consequence_concern'],
			],
			'hist_author' => [
				'hist_team' => ['team'],
				'game_agent' => ['agent_id'],
			],
			'hist_story' => [
				'hist_team' => ['team'],
				'hist_author' => ['hist_lead_id'],
				'hist_community' => ['community_id'],
				'class_bibliography_genre' => ['genre'],
				'class_story_collab_type' => ['collaboration_status'],
				'class_language' => ['language'],
			],
			'hist_chr' => [
				'hist_team' => ['team'],
				'hist_author' => ['hist_lead_id'],
				'hist_story' => ['hist_story'],
				'game_agent' => ['agent_id'],
				'bio_story' => ['bio_story'],
				'class_dramatica_character' => ['story_character'],
				'class_dramatica_archetype' => ['story_archetype'],
			],
			'hist_chr_dev' => [
				'hist_story' => ['hist_story'],
				'bio_story' => ['bio_story'],
				'biblio_author' => ['agent_id'],
				'hist_chr' => ['cw_name', 'agent_name'],
				'class_dramatica_storypoints1' => ['dp1_resolve'],
				'class_dramatica_storypoints2' => ['dp2_resolve'],
				'class_dramatica_storypoints3' => ['dp3_psstyle', 'dp3_approach', 'dp3_growth', 'dp3_resolve'],
				'class_dynamicstorypoints4' => ['mc_ps_style', 'mc_approach', 'mc_growth', 'mc_resolve'],
				'hist_chr_scene' => ['illust_mcs_response', 'illust_mcs_symptom', 'illust_mcs_solution', 'illust_mcs_problem', 'illust_im', 'illust_nt', 'illust_ps_style', 'illust_approach', 'illust_growth', 'illust_resolve'],
				'class_nt' => ['noetictension'],
				'class_im' => ['impression'],
				'hist_storystatic' => ['mcs_problem'],
			],
			'hist_chr_scene' => [
				'hist_author' => ['author_id'],
				'hist_story' => ['hist_story'],
				'hist_chr' => ['character'],
				'game_agent' => ['agent_id'],
				'bio_story' => ['bio_story'],
				'bio_storyline' => ['bio_storyline_no'],
				'class_character_element' => ['chr_element'],
			],
			'hist_storyline' => [
				'hist_story' => ['story'],
				'class_story_acts' => ['story_act'],
				'hist_chr' => ['character'],
				'hist_storyweaving_scene' => ['storyweaving_theme', 'storyweaving_sequence', 'storyweaving_scene', 'storyweaving_scene_no'],
				'hist_chr_scene' => ['characterevent_scene'],
				'hist_encounter_scene' => ['character_event'],
			],
			'hist_storystatic' => [
				'hist_story' => ['story'],
				'class_dramatica_throughline' => ['throughline'],
				'hist_chr' => ['story_character_mc'],
				'class_dramatica_domain' => ['throughline_domain'],
				'class_dramatica_concern' => ['signpost4', 'signpost3', 'signpost2', 'signpost1', 'concern'],
				'class_dramatica_issue' => ['issue'],
				'class_dramatica_themes' => ['benchmark', 'inhibitor', 'catalyst', 'response', 'symptom', 'solution', 'problem'],
			],
			'hist_storydynamic' => [
				'hist_story' => ['hist_story'],
				'bio_story' => ['bio_story_mc'],
				'hist_chr' => ['hist_chr_mc'],
				'bio_storystatic' => ['os_goal_concern', 'os_goal_domain', 'mc_problem', 'storystatic_mc'],
				'bio_chr' => ['story_chr_ic', 'story_chr_mc'],
				'bio_chr_dev' => ['ic_resolve', 'mc_ps_style', 'mc_approach', 'mc_growth', 'mc_resolve'],
				'class_dramatica_storypoints1' => ['dp_cat1'],
				'class_dramatica_storypoints2' => ['dp_cat2'],
				'class_dramatica_storypoints3' => ['dp_cat3_judgement', 'dp_cat3_outcome', 'dp_cat3_limit', 'dp_cat3_driver'],
				'class_dynamicstorypoints4' => ['os_judgement', 'os_outcome', 'os_limit', 'os_driver'],
				'class_dramatica_domain' => ['os_forewarnings_domain', 'os_preconditions_domain', 'os_prerequesites_domain', 'os_requirements_domain', 'os_dividend_domain', 'os_cost_domain', 'os_consequence_domain'],
				'class_dramatica_concern' => ['os_forewarnings_concern', 'os_preconditions_concern', 'os_prerequesites_concern', 'os_requirements_concern', 'os_dividend_concern', 'os_cost_concern', 'os_consequence_concern'],
			],
			'hist_storyweaving_scene' => [
				'hist_story' => ['story'],
				'class_dramatica_steps' => ['step'],
				'class_dramatica_throughline' => ['throughline'],
				'class_dramatica_domain' => ['domain'],
				'class_dramatica_concern' => ['concern'],
				'class_dramatica_issue' => ['issue'],
				'class_dramatica_themes' => ['theme'],
			],
			'hist_encounter' => [
				'bio_chr' => ['bio_chrB', 'bio_chrA'],
				'bio_story' => ['bio_storyB', 'bio_storyA'],
				'bio_storyline' => ['bio_storytextB', 'bio_storylineB', 'bio_storytext', 'bio_storyline'],
				'hist_chr_scene' => ['sceneA'],
			],
			'class_dramatica_steps' => [
				'class_story_acts' => ['act'],
			],
			'class_dramatica_concern' => [
				'class_dramatica_domain' => ['domain'],
			],
			'class_dramatica_issue' => [
				'class_dramatica_domain' => ['domain'],
				'class_dramatica_concern' => ['concern'],
			],
			'class_dramatica_themes' => [
				'class_dramatica_domain' => ['domain'],
				'class_dramatica_concern' => ['concern'],
				'class_dramatica_issue' => ['issue'],
			],
			'class_dramatica_storypoints2' => [
				'class_dramatica_storypoints1' => ['cat1'],
			],
			'class_dramatica_storypoints3' => [
				'class_dramatica_storypoints1' => ['cat1'],
				'class_dramatica_storypoints2' => ['cat2'],
			],
			'class_dynamicstorypoints4' => [
				'class_dramatica_storypoints1' => ['cat1'],
				'class_dramatica_storypoints2' => ['cat2'],
				'class_dramatica_storypoints3' => ['cat3'],
			],
			'class_dictionary2' => [
				'class_dictionary1' => ['class1'],
			],
			'class_dictionary3' => [
				'class_dictionary1' => ['class1'],
				'class_dictionary2' => ['class2'],
			],
			'class_dictionary5' => [
				'class_dictionary1' => ['class1'],
				'class_dictionary2' => ['class2'],
				'class_dictionary3' => ['class3'],
				'class_dictionary4' => ['class4'],
			],
			'class_dictionary4' => [
				'class_dictionary1' => ['class1'],
				'class_dictionary2' => ['class2'],
				'class_dictionary3' => ['class3'],
			],
		];

		return isset($parents[$table]) ? $parents[$table] : [];
	}
	#########################################################
	function backtick_keys_once($arr_data) {
		return array_combine(
			/* add backticks to keys */
			array_map(
				function($e) { return '`' . trim($e, '`') . '`'; }, 
				array_keys($arr_data)
			), 
			/* and combine with values */
			array_values($arr_data)
		);
	}
	#########################################################
	function calculated_fields() {
		/*
		 * calculated fields configuration array, $calc:
		 *         table => [calculated fields], ..
		 *         where calculated fields:
		 *             field => query, ...
		 */
		return array(
			'game_agent' => array(
			),
			'biblio_author' => array(
			),
			'biblio_doc' => array(
			),
			'biblio_transcript' => array(
			),
			'biblio_token' => array(
			),
			'biblio_code_invivo' => array(
			),
			'biblio_code_demo' => array(
			),
			'biblio_team' => array(
			),
			'biblio_analyst' => array(
			),
			'bio_team' => array(
			),
			'bio_author' => array(
			),
			'bio_story' => array(
			),
			'bio_chr' => array(
			),
			'bio_storyline' => array(
			),
			'bio_storystatic' => array(
			),
			'bio_storyweaving_scene' => array(
			),
			'bio_chr_scene' => array(
			),
			'bio_chr_dev' => array(
			),
			'bio_encounter' => array(
			),
			'bio_encounter_scene' => array(
			),
			'bio_code_herme' => array(
			),
			'bio_storydynamic' => array(
			),
			'hist_author' => array(
			),
			'hist_team' => array(
			),
			'hist_story' => array(
			),
			'hist_chr' => array(
			),
			'hist_chr_dev' => array(
			),
			'hist_chr_scene' => array(
			),
			'hist_storyline' => array(
			),
			'hist_storystatic' => array(
			),
			'hist_storydynamic' => array(
			),
			'hist_storyweaving_scene' => array(
			),
			'hist_encounter' => array(
			),
			'hist_encounter_scene' => array(
			),
			'hist_community' => array(
			),
			'class_agent_selection' => array(
			),
			'class_agent_type1' => array(
			),
			'class_agent_type2' => array(
			),
			'class_character_element' => array(
			),
			'class_gender' => array(
			),
			'class_authority_agent' => array(
			),
			'class_evaluation' => array(
			),
			'class_bibliography_type' => array(
			),
			'class_bibliography_genre' => array(
			),
			'class_authority_library' => array(
			),
			'class_rights' => array(
			),
			'class_language' => array(
			),
			'class_story_collab_type' => array(
			),
			'class_story_acts' => array(
			),
			'class_story_path' => array(
			),
			'class_dramatica_steps' => array(
			),
			'class_dramatica_throughline' => array(
			),
			'class_dramatica_signpost' => array(
			),
			'class_dramatica_domain' => array(
			),
			'class_dramatica_concern' => array(
			),
			'class_dramatica_issue' => array(
			),
			'class_dramatica_themes' => array(
			),
			'class_dramatica_archetype' => array(
			),
			'class_dramatica_character' => array(
			),
			'class_dramatica_storypoints1' => array(
			),
			'class_dramatica_storypoints2' => array(
			),
			'class_dramatica_storypoints3' => array(
			),
			'class_dynamicstorypoints4' => array(
			),
			'class_im' => array(
			),
			'class_pc' => array(
			),
			'class_nt' => array(
			),
			'dictionary' => array(
			),
			'class_dictionary1' => array(
			),
			'class_dictionary2' => array(
			),
			'class_dictionary3' => array(
			),
			'class_dictionary5' => array(
			),
			'class_dictionary4' => array(
			),
		);
	}
	#########################################################
	function update_calc_fields($table, $id, $formulas, $mi = false) {
		if($mi === false) $mi = getMemberInfo();
		$pk = getPKFieldName($table);
		$safe_id = makeSafe($id);
		$eo = ['silentErrors' => true];
		$caluclations_made = [];
		$replace = array(
			'%ID%' => $safe_id,
			'%USERNAME%' => makeSafe($mi['username']),
			'%GROUPID%' => makeSafe($mi['groupID']),
			'%GROUP%' => makeSafe($mi['group']),
			'%TABLENAME%' => makeSafe($table),
			'%PKFIELD%' => makeSafe($pk),
		);

		foreach($formulas as $field => $query) {
			// for queries that include unicode entities, replace them with actual unicode characters
			if(preg_match('/&#\d{2,5};/', $query)) $query = entitiesToUTF8($query);

			$query = str_replace(array_keys($replace), array_values($replace), $query);
			$calc_value = sqlValue($query);
			if($calc_value  === false) continue;

			// update calculated field
			$safe_calc_value = makeSafe($calc_value);
			$update_query = "UPDATE `{$table}` SET `{$field}`='{$safe_calc_value}' " .
				"WHERE `{$pk}`='{$safe_id}'";
			$res = sql($update_query, $eo);
			if($res) $caluclations_made[] = array(
				'table' => $table,
				'id' => $id,
				'field' => $field,
				'value' => $calc_value
			);
		}

		return $caluclations_made;
	}
	#########################################################
	function latest_jquery() {
		$jquery_dir = dirname(__FILE__) . '/../resources/jquery/js';

		$files = scandir($jquery_dir, SCANDIR_SORT_DESCENDING);
		foreach($files as $entry) {
			if(preg_match('/^jquery[-0-9\.]*\.min\.js$/i', $entry))
				return $entry;
		}

		return '';
	}
	#########################################################
	function existing_value($tn, $fn, $id, $cache = true) {
		/* cache results in records[tablename][id] */
		static $record = [];

		if($cache && !empty($record[$tn][$id])) return $record[$tn][$id][$fn];
		if(!$pk = getPKFieldName($tn)) return false;

		$sid = makeSafe($id);
		$eo = ['silentErrors' => true];
		$res = sql("SELECT * FROM `{$tn}` WHERE `{$pk}`='{$sid}'", $eo);
		$record[$tn][$id] = db_fetch_assoc($res);

		return $record[$tn][$id][$fn];
	}
	#########################################################
	function checkAppRequirements() {
		global $Translation;

		$reqErrors = [];
		$minPHP = '5.6.0';

		if(version_compare(PHP_VERSION, $minPHP) == -1)
			$reqErrors[] = str_replace(
				['<PHP_VERSION>', '<minPHP>'], 
				[PHP_VERSION, $minPHP], 
				$Translation['old php version']
			);

		if(!function_exists('mysqli_connect'))
			$reqErrors[] = str_replace('<EXTENSION>', 'mysqli', $Translation['extension not enabled']);

		if(!function_exists('mb_convert_encoding'))
			$reqErrors[] = str_replace('<EXTENSION>', 'mbstring', $Translation['extension not enabled']);

		// end of checks

		if(!count($reqErrors)) return;

		exit(
			'<div style="padding: 3em; font-size: 1.5em; color: #A94442; line-height: 150%; font-family: arial; text-rendering: optimizelegibility; text-shadow: 0px 0px 1px;">' .
				'<ul><li>' .
				implode('</li><li>', $reqErrors) .
				'</li><ul>' .
			'</div>'
		);
	}
	#########################################################
	function getRecord($table, $id) {
		// get PK fieldname
		if(!$pk = getPKFieldName($table)) return false;

		$safeId = makeSafe($id);
		$eo = ['silentErrors' => true];
		$res = sql("SELECT * FROM `{$table}` WHERE `{$pk}`='{$safeId}'", $eo);
		return db_fetch_assoc($res);
	}
	#########################################################
	function guessMySQLDateTime($dt) {
		// extract date and time, assuming a space separator
		list($date, $time, $ampm) = preg_split('/\s+/', trim($dt));

		// if date is not already in mysql format, try mysql_datetime
		if(!(preg_match('/^[0-9]{4}-(0?[1-9]|1[0-2])-([1-2][0-9]|30|31|0?[1-9])$/', $date) && strtotime($date)))
			if(!$date = mysql_datetime($date)) return false;

		// if time 
		if($t = time12(trim("$time $ampm")))
			$time = time24($t);
		elseif($t = time24($time))
			$time = $t;
		else
			$time = '';

		return trim("$date $time");
	}
	#########################################################
	function lookupQuery($tn, $lookupField) {
		/* 
			This is the query accessible from the 'Advanced' window under the 'Lookup field' tab in AppGini.
			For auto-fill lookups, this is the same as the query of the main lookup field, except the second
			column is replaced by the caption of the auto-fill lookup field.
		*/
		$lookupQuery = [
			'game_agent' => [
				'selection_class' => 'SELECT `class_agent_selection`.`id`, `class_agent_selection`.`selection_phase` FROM `class_agent_selection` ORDER BY 2',
				'agenttype1' => 'SELECT `class_agent_type1`.`id`, `class_agent_type1`.`type` FROM `class_agent_type1` ORDER BY 2',
				'agenttype2' => 'SELECT `class_agent_type2`.`id`, `class_agent_type2`.`type` FROM `class_agent_type2` ORDER BY 2',
				'gender' => 'SELECT `class_gender`.`id`, `class_gender`.`gender` FROM `class_gender` ORDER BY 2',
				'data_evaluation' => 'SELECT `class_evaluation`.`id`, `class_evaluation`.`evaluation_type` FROM `class_evaluation` ORDER BY 2',
				'authority_organization' => 'SELECT `class_authority_agent`.`id`, IF(CHAR_LENGTH(`class_authority_agent`.`abbreviation`) || CHAR_LENGTH(`class_authority_agent`.`authority_name`), CONCAT_WS(\'\', `class_authority_agent`.`abbreviation`, \'   \', `class_authority_agent`.`authority_name`), \'\') FROM `class_authority_agent` ORDER BY 2',
			],
			'biblio_author' => [
				'game_agent_id' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`id`) || CHAR_LENGTH(`game_agent`.`memberID`), CONCAT_WS(\'\', `game_agent`.`id`, \'   \', `game_agent`.`memberID`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'agent_name' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`last_name`) || CHAR_LENGTH(`game_agent`.`first_name`), CONCAT_WS(\'\', `game_agent`.`last_name`, \', \', `game_agent`.`first_name`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'selection_class' => 'SELECT `class_agent_selection`.`id`, `class_agent_selection`.`selection_phase` FROM `class_agent_selection` ORDER BY 2',
				'agenttype1' => 'SELECT `class_agent_type1`.`id`, `class_agent_type1`.`type` FROM `class_agent_type1` ORDER BY 2',
				'agenttype2' => 'SELECT `class_agent_type2`.`id`, `class_agent_type2`.`type` FROM `class_agent_type2` ORDER BY 2',
				'gender' => 'SELECT `class_gender`.`id`, `class_gender`.`gender` FROM `class_gender` ORDER BY 2',
				'data_evaluation' => 'SELECT `class_evaluation`.`id`, `class_evaluation`.`evaluation_type` FROM `class_evaluation` ORDER BY 2',
				'authority_organization' => 'SELECT `class_authority_agent`.`id`, IF(CHAR_LENGTH(`class_authority_agent`.`abbreviation`) || CHAR_LENGTH(`class_authority_agent`.`authority_name`), CONCAT_WS(\'\', `class_authority_agent`.`abbreviation`, \'   \', `class_authority_agent`.`authority_name`), \'\') FROM `class_authority_agent` ORDER BY 2',
			],
			'biblio_doc' => [
				'author_name' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`last_name`) || CHAR_LENGTH(`biblio_author`.`first_name`), CONCAT_WS(\'\', `biblio_author`.`last_name`, \', \', `biblio_author`.`first_name`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'author_id' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`id`) || CHAR_LENGTH(`biblio_author`.`memberID`), CONCAT_WS(\'\', `biblio_author`.`id`, \'    \', `biblio_author`.`memberID`), \'\') FROM `biblio_author` LEFT JOIN `game_agents` as game_agents1 ON `game_agents1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'type' => 'SELECT `class_bibliography_type`.`id`, `class_bibliography_type`.`type` FROM `class_bibliography_type` ORDER BY 2',
				'genre' => 'SELECT `class_bibliography_genre`.`id`, `class_bibliography_genre`.`genre` FROM `class_bibliography_genre` ORDER BY 2',
				'language' => 'SELECT `class_language`.`id`, IF(CHAR_LENGTH(`class_language`.`short`) || CHAR_LENGTH(`class_language`.`language`), CONCAT_WS(\'\', `class_language`.`short`, \'   \', `class_language`.`language`), \'\') FROM `class_language` ORDER BY 2',
				'rights' => 'SELECT `class_rights`.`id`, `class_rights`.`right` FROM `class_rights` ORDER BY 2',
				'data_evaluation' => 'SELECT `class_evaluation`.`id`, `class_evaluation`.`evaluation_type` FROM `class_evaluation` ORDER BY 2',
				'authority_organization' => 'SELECT `class_authority_library`.`id`, IF(CHAR_LENGTH(`class_authority_library`.`abbreviation`) || CHAR_LENGTH(`class_authority_library`.`authority_name`), CONCAT_WS(\'\', `class_authority_library`.`abbreviation`, \'   \', `class_authority_library`.`authority_name`), \'\') FROM `class_authority_library` ORDER BY 2',
				'team' => 'SELECT `biblio_team`.`id`, `biblio_team`.`team` FROM `biblio_team` ORDER BY 2',
				'biblio_lead' => 'SELECT `biblio_analyst`.`id`, IF(CHAR_LENGTH(`biblio_analyst`.`last_name`) || CHAR_LENGTH(`biblio_analyst`.`first_name`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`), CONCAT_WS(\'\',   `biblio_author1`.`last_name`), \'\'), \', \', IF(    CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS(\'\',   `biblio_author1`.`first_name`), \'\')), \'\') FROM `biblio_analyst` LEFT JOIN `biblio_team` as biblio_team1 ON `biblio_team1`.`id`=`biblio_analyst`.`team` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_analyst`.`author_id` ORDER BY 2',
			],
			'biblio_transcript' => [
				'author' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`last_name`) || CHAR_LENGTH(`biblio_author`.`first_name`), CONCAT_WS(\'\', `biblio_author`.`last_name`, \', \', `biblio_author`.`first_name`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'author_memberID' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`id`) || CHAR_LENGTH(`biblio_author`.`memberID`), CONCAT_WS(\'\', `biblio_author`.`id`, \'   \', `biblio_author`.`memberID`), \'\') FROM `biblio_author` LEFT JOIN `game_agents` as game_agents1 ON `game_agents1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'bibliography_id' => 'SELECT `biblio_doc`.`id`, IF(CHAR_LENGTH(`biblio_doc`.`id`), CONCAT_WS(\'\', `biblio_doc`.`id`, \'   \'), \'\') FROM `biblio_doc` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_doc`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`biblio_doc`.`type` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`biblio_doc`.`genre` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`biblio_doc`.`language` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_doc`.`rights` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_doc`.`data_evaluation` LEFT JOIN `class_authority_library` as class_authority_library1 ON `class_authority_library1`.`id`=`biblio_doc`.`authority_organization` ORDER BY 2',
				'bibliography_title' => 'SELECT `biblio_doc`.`id`, IF(CHAR_LENGTH(`biblio_doc`.`id`) || CHAR_LENGTH(`biblio_doc`.`title`), CONCAT_WS(\'\', `biblio_doc`.`id`, `biblio_doc`.`title`), \'\') FROM `biblio_doc` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_doc`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`biblio_doc`.`type` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`biblio_doc`.`genre` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`biblio_doc`.`language` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_doc`.`rights` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_doc`.`data_evaluation` LEFT JOIN `class_authority_library` as class_authority_library1 ON `class_authority_library1`.`id`=`biblio_doc`.`authority_organization` ORDER BY 2',
				'ip_rights' => 'SELECT `class_rights`.`id`, `class_rights`.`right` FROM `class_rights` ORDER BY 2',
			],
			'biblio_token' => [
				'author_id' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`id`) || CHAR_LENGTH(`biblio_author`.`id`), CONCAT_WS(\'\', `biblio_author`.`id`, \'   \', `biblio_author`.`id`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'author_name' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`last_name`) || CHAR_LENGTH(`biblio_author`.`last_name`), CONCAT_WS(\'\', `biblio_author`.`last_name`, \', \', `biblio_author`.`last_name`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'bibliography' => 'SELECT `biblio_doc`.`id`, IF(CHAR_LENGTH(`biblio_doc`.`id`) || CHAR_LENGTH(`biblio_doc`.`title`), CONCAT_WS(\'\', `biblio_doc`.`id`, \'   \', `biblio_doc`.`title`), \'\') FROM `biblio_doc` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_doc`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`biblio_doc`.`type` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`biblio_doc`.`genre` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`biblio_doc`.`language` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_doc`.`rights` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_doc`.`data_evaluation` LEFT JOIN `class_authority_library` as class_authority_library1 ON `class_authority_library1`.`id`=`biblio_doc`.`authority_organization` LEFT JOIN `biblio_team` as biblio_team1 ON `biblio_team1`.`id`=`biblio_doc`.`team` LEFT JOIN `biblio_analyst` as biblio_analyst1 ON `biblio_analyst1`.`id`=`biblio_doc`.`biblio_lead` ORDER BY 2',
				'transcript' => 'SELECT `biblio_transcript`.`id`, IF(CHAR_LENGTH(`biblio_transcript`.`id`) || CHAR_LENGTH(`biblio_transcript`.`transcript_title`), CONCAT_WS(\'\', `biblio_transcript`.`id`, \'   \', `biblio_transcript`.`transcript_title`), \'\') FROM `biblio_transcript` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_transcript`.`author_memberID` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_transcript`.`bibliography_title` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_transcript`.`ip_rights` ORDER BY 2',
			],
			'biblio_code_invivo' => [
				'author' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`id`) || CHAR_LENGTH(`biblio_author`.`memberID`), CONCAT_WS(\'\', `biblio_author`.`id`, \'   \', IF(    CHAR_LENGTH(`game_agents1`.`memberID`), CONCAT_WS(\'\',   `game_agents1`.`memberID`), \'\')), \'\') FROM `biblio_author` LEFT JOIN `game_agents` as game_agents1 ON `game_agents1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'bibliography' => 'SELECT `biblio_doc`.`id`, IF(CHAR_LENGTH(`biblio_doc`.`id`) || CHAR_LENGTH(`biblio_doc`.`title`), CONCAT_WS(\'\', `biblio_doc`.`id`, \'   \', `biblio_doc`.`title`), \'\') FROM `biblio_doc` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_doc`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`biblio_doc`.`type` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`biblio_doc`.`genre` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`biblio_doc`.`language` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_doc`.`rights` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_doc`.`data_evaluation` LEFT JOIN `class_authority_library` as class_authority_library1 ON `class_authority_library1`.`id`=`biblio_doc`.`authority_organization` ORDER BY 2',
				'transcript' => 'SELECT `biblio_transcript`.`id`, IF(CHAR_LENGTH(`biblio_transcript`.`id`) || CHAR_LENGTH(`biblio_transcript`.`transcript_title`), CONCAT_WS(\'\', `biblio_transcript`.`id`, \'   \', `biblio_transcript`.`transcript_title`), \'\') FROM `biblio_transcript` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_transcript`.`author_memberID` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_transcript`.`bibliography_title` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_transcript`.`ip_rights` ORDER BY 2',
				'token_sequence' => 'SELECT `biblio_token`.`id`, IF(CHAR_LENGTH(`biblio_token`.`id`) || CHAR_LENGTH(`biblio_token`.`token_sequence`), CONCAT_WS(\'\', `biblio_token`.`id`, \'   \', `biblio_token`.`token_sequence`), \'\') FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript` ORDER BY 2',
				'token' => 'SELECT `biblio_token`.`id`, `biblio_token`.`token` FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript` ORDER BY 2',
			],
			'biblio_code_demo' => [
				'author' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`id`) || CHAR_LENGTH(`biblio_author`.`memberID`), CONCAT_WS(\'\', `biblio_author`.`id`, \'   \', `biblio_author`.`memberID`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'bibliography' => 'SELECT `biblio_doc`.`id`, IF(CHAR_LENGTH(`biblio_doc`.`id`) || CHAR_LENGTH(`biblio_doc`.`title`), CONCAT_WS(\'\', `biblio_doc`.`id`, \' - \', `biblio_doc`.`title`), \'\') FROM `biblio_doc` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_doc`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`biblio_doc`.`type` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`biblio_doc`.`genre` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`biblio_doc`.`language` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_doc`.`rights` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_doc`.`data_evaluation` LEFT JOIN `class_authority_library` as class_authority_library1 ON `class_authority_library1`.`id`=`biblio_doc`.`authority_organization` LEFT JOIN `biblio_team` as biblio_team1 ON `biblio_team1`.`id`=`biblio_doc`.`team` LEFT JOIN `biblio_analyst` as biblio_analyst1 ON `biblio_analyst1`.`id`=`biblio_doc`.`biblio_lead` ORDER BY 2',
				'transcript' => 'SELECT `biblio_transcript`.`id`, IF(CHAR_LENGTH(`biblio_transcript`.`id`) || CHAR_LENGTH(`biblio_transcript`.`transcript_title`), CONCAT_WS(\'\', `biblio_transcript`.`id`, \' - \', `biblio_transcript`.`transcript_title`), \'\') FROM `biblio_transcript` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_transcript`.`author_memberID` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_transcript`.`bibliography_title` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_transcript`.`ip_rights` ORDER BY 2',
				'token_id' => 'SELECT `biblio_token`.`id`, IF(CHAR_LENGTH(`biblio_token`.`id`) || CHAR_LENGTH(`biblio_token`.`token_sequence`), CONCAT_WS(\'\', `biblio_token`.`id`, \' - \', `biblio_token`.`token_sequence`), \'\') FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript` ORDER BY 2',
				'token' => 'SELECT `biblio_token`.`id`, `biblio_token`.`token` FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript` ORDER BY 2',
			],
			'biblio_team' => [
			],
			'biblio_analyst' => [
				'team' => 'SELECT `biblio_team`.`id`, `biblio_team`.`team` FROM `biblio_team` ORDER BY 2',
				'author_id' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`id`) || CHAR_LENGTH(`biblio_author`.`memberID`), CONCAT_WS(\'\', `biblio_author`.`id`, \'   \', `biblio_author`.`memberID`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'author_memberid' => 'SELECT `biblio_author`.`id`, `biblio_author`.`memberID` FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'last_name' => 'SELECT `biblio_author`.`id`, `biblio_author`.`last_name` FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'first_name' => 'SELECT `biblio_author`.`id`, `biblio_author`.`first_name` FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'other_name' => 'SELECT `biblio_author`.`id`, `biblio_author`.`other_name` FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
			],
			'bio_team' => [
			],
			'bio_author' => [
				'team' => 'SELECT `bio_team`.`id`, `bio_team`.`team` FROM `bio_team` ORDER BY 2',
				'author_id' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`id`) || CHAR_LENGTH(`biblio_author`.`memberID`), CONCAT_WS(\'\', `biblio_author`.`id`, \'   \', `biblio_author`.`memberID`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'author_memberid' => 'SELECT `biblio_author`.`id`, `biblio_author`.`memberID` FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'last_name' => 'SELECT `biblio_author`.`id`, `biblio_author`.`last_name` FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'first_name' => 'SELECT `biblio_author`.`id`, `biblio_author`.`first_name` FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'other_name' => 'SELECT `biblio_author`.`id`, `biblio_author`.`other_name` FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
			],
			'bio_story' => [
				'bio_team' => 'SELECT `bio_team`.`id`, `bio_team`.`team` FROM `bio_team` ORDER BY 2',
				'author_id' => 'SELECT `bio_author`.`id`, IF(CHAR_LENGTH(`bio_author`.`id`) || CHAR_LENGTH(`bio_author`.`author_memberid`), CONCAT_WS(\'\', `bio_author`.`id`, \'   \', IF(    CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS(\'\',   `biblio_author1`.`memberID`), \'\')), \'\') FROM `bio_author` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_author`.`team` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_author`.`author_id` ORDER BY 2',
				'author_name' => 'SELECT `bio_author`.`id`, IF(CHAR_LENGTH(`bio_author`.`last_name`) || CHAR_LENGTH(`bio_author`.`first_name`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`), CONCAT_WS(\'\',   `biblio_author1`.`last_name`), \'\'), \', \', IF(    CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS(\'\',   `biblio_author1`.`first_name`), \'\')), \'\') FROM `bio_author` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_author`.`team` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_author`.`author_id` ORDER BY 2',
				'type' => 'SELECT `class_bibliography_type`.`id`, `class_bibliography_type`.`type` FROM `class_bibliography_type` ORDER BY 2',
				'agent_id' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`id`) || CHAR_LENGTH(`game_agent`.`memberID`), CONCAT_WS(\'\', `game_agent`.`id`, \'   \', `game_agent`.`memberID`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'agent_name' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`last_name`) || CHAR_LENGTH(`game_agent`.`first_name`), CONCAT_WS(\'\', `game_agent`.`last_name`, \', \', `game_agent`.`first_name`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'collaboration_status' => 'SELECT `class_story_collab_type`.`id`, `class_story_collab_type`.`collab_type` FROM `class_story_collab_type` ORDER BY 2',
			],
			'bio_chr' => [
				'author_id' => 'SELECT `bio_author`.`id`, IF(CHAR_LENGTH(`bio_author`.`id`) || CHAR_LENGTH(`bio_author`.`author_memberid`), CONCAT_WS(\'\', `bio_author`.`id`, \'   \', IF(    CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS(\'\',   `biblio_author1`.`memberID`), \'\')), \'\') FROM `bio_author` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_author`.`team` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_author`.`author_id` ORDER BY 2',
				'author_name' => 'SELECT `bio_author`.`id`, IF(CHAR_LENGTH(`bio_author`.`last_name`) || CHAR_LENGTH(`bio_author`.`first_name`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`), CONCAT_WS(\'\',   `biblio_author1`.`last_name`), \'\'), \', \', IF(    CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS(\'\',   `biblio_author1`.`first_name`), \'\')), \'\') FROM `bio_author` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_author`.`team` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_author`.`author_id` ORDER BY 2',
				'agent_id' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`id`) || CHAR_LENGTH(`game_agent`.`memberID`), CONCAT_WS(\'\', `game_agent`.`id`, \'   \', `game_agent`.`memberID`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'agent_name' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`last_name`) || CHAR_LENGTH(`game_agent`.`first_name`), CONCAT_WS(\'\', `game_agent`.`last_name`, \', \', `game_agent`.`first_name`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'bio_story' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`story_title`), CONCAT_WS(\'\', `bio_story`.`id`, \' - \', `bio_story`.`story_title`), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'bio_character' => 'SELECT `class_dramatica_character`.`id`, `class_dramatica_character`.`character` FROM `class_dramatica_character` ORDER BY 2',
				'bio_archetype' => 'SELECT `class_dramatica_archetype`.`id`, IF(CHAR_LENGTH(`class_dramatica_archetype`.`archetype`), CONCAT_WS(\'\', `class_dramatica_archetype`.`archetype`, \' \'), \'\') FROM `class_dramatica_archetype` ORDER BY 2',
			],
			'bio_storyline' => [
				'biography' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`story_title`), CONCAT_WS(\'\', `bio_story`.`id`, \' -  \', `bio_story`.`story_title`), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'author_id' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`id`) || CHAR_LENGTH(`biblio_author`.`memberID`), CONCAT_WS(\'\', `biblio_author`.`id`, \'   \', `biblio_author`.`memberID`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'author_name' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`last_name`) || CHAR_LENGTH(`biblio_author`.`first_name`), CONCAT_WS(\'\', `biblio_author`.`last_name`, \', \', `biblio_author`.`first_name`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'bibliography' => 'SELECT `biblio_doc`.`id`, IF(CHAR_LENGTH(`biblio_doc`.`id`) || CHAR_LENGTH(`biblio_doc`.`title`), CONCAT_WS(\'\', `biblio_doc`.`id`, \' - \', `biblio_doc`.`title`), \'\') FROM `biblio_doc` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_doc`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`biblio_doc`.`type` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`biblio_doc`.`genre` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`biblio_doc`.`language` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_doc`.`rights` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_doc`.`data_evaluation` LEFT JOIN `class_authority_library` as class_authority_library1 ON `class_authority_library1`.`id`=`biblio_doc`.`authority_organization` LEFT JOIN `biblio_team` as biblio_team1 ON `biblio_team1`.`id`=`biblio_doc`.`team` LEFT JOIN `biblio_analyst` as biblio_analyst1 ON `biblio_analyst1`.`id`=`biblio_doc`.`biblio_lead` ORDER BY 2',
				'transcript' => 'SELECT `biblio_transcript`.`id`, IF(CHAR_LENGTH(`biblio_transcript`.`id`) || CHAR_LENGTH(`biblio_transcript`.`transcript_title`), CONCAT_WS(\'\', `biblio_transcript`.`id`, \' - \', `biblio_transcript`.`transcript_title`), \'\') FROM `biblio_transcript` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_transcript`.`author_memberID` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_transcript`.`bibliography_title` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_transcript`.`ip_rights` ORDER BY 2',
				'token_sequence' => 'SELECT `biblio_token`.`id`, IF(CHAR_LENGTH(`biblio_token`.`id`) || CHAR_LENGTH(`biblio_token`.`token_sequence`), CONCAT_WS(\'\', `biblio_token`.`id`, \' - \', `biblio_token`.`token_sequence`), \'\') FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript` ORDER BY 2',
				'token' => 'SELECT `biblio_token`.`id`, `biblio_token`.`token` FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript` ORDER BY 2',
				'story_act' => 'SELECT `class_story_acts`.`id`, `class_story_acts`.`act` FROM `class_story_acts` ORDER BY 2',
				'character' => 'SELECT `bio_chr`.`id`, IF(CHAR_LENGTH(`bio_chr`.`agent_id`) || CHAR_LENGTH(`bio_chr`.`agent_name`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS(\'\',   `game_agent1`.`id`, \'   \', `game_agent1`.`memberID`), \'\'), \' - \', IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS(\'\',   `game_agent1`.`last_name`, \', \', `game_agent1`.`first_name`), \'\')), \'\') FROM `bio_chr` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_chr`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr`.`bio_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr`.`bio_archetype` ORDER BY 2',
				'role' => 'SELECT `bio_chr`.`id`, IF(CHAR_LENGTH(`bio_chr`.`bio_character`) || CHAR_LENGTH(`bio_chr`.`role`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`), CONCAT_WS(\'\',   `class_dramatica_character1`.`character`), \'\'), \' - \', `bio_chr`.`role`), \'\') FROM `bio_chr` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_chr`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr`.`bio_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr`.`bio_archetype` ORDER BY 2',
				'storyweaving_scene_no' => 'SELECT `bio_storyweaving_scene`.`id`, IF(    CHAR_LENGTH(`class_dramatica_steps1`.`step`), CONCAT_WS(\'\',   `class_dramatica_steps1`.`step`), \'\') FROM `bio_storyweaving_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storyweaving_scene`.`story` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`bio_storyweaving_scene`.`step` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storyweaving_scene`.`throughline` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storyweaving_scene`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storyweaving_scene`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storyweaving_scene`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storyweaving_scene`.`theme` ORDER BY 2',
				'storyweaving_scene' => 'SELECT `bio_storyweaving_scene`.`id`, `bio_storyweaving_scene`.`id` FROM `bio_storyweaving_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storyweaving_scene`.`story` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`bio_storyweaving_scene`.`step` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storyweaving_scene`.`throughline` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storyweaving_scene`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storyweaving_scene`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storyweaving_scene`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storyweaving_scene`.`theme` ORDER BY 2',
				'storyweaving_sequence' => 'SELECT `bio_storyweaving_scene`.`id`, `bio_storyweaving_scene`.`sequence` FROM `bio_storyweaving_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storyweaving_scene`.`story` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`bio_storyweaving_scene`.`step` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storyweaving_scene`.`throughline` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storyweaving_scene`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storyweaving_scene`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storyweaving_scene`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storyweaving_scene`.`theme` ORDER BY 2',
				'storyweaving_theme' => 'SELECT `bio_storyweaving_scene`.`id`, IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS(\'\',   `class_dramatica_themes1`.`theme`), \'\') FROM `bio_storyweaving_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storyweaving_scene`.`story` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`bio_storyweaving_scene`.`step` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storyweaving_scene`.`throughline` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storyweaving_scene`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storyweaving_scene`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storyweaving_scene`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storyweaving_scene`.`theme` ORDER BY 2',
				'character_scene' => 'SELECT `bio_chr_scene`.`id`, IF(CHAR_LENGTH(`bio_chr_scene`.`id`) || CHAR_LENGTH(`bio_chr_scene`.`scene`), CONCAT_WS(\'\', `bio_chr_scene`.`id`, \'   \', `bio_chr_scene`.`scene`), \'\') FROM `bio_chr_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_scene`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_scene`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_chr_scene`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_chr_scene`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_chr_scene`.`token` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo1 ON `biblio_code_invivo1`.`id`=`bio_chr_scene`.`invivo_code` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo2 ON `biblio_code_invivo2`.`id`=`bio_chr_scene`.`startdate` LEFT JOIN `bio_code_herme` as bio_code_herme1 ON `bio_code_herme1`.`id`=`bio_chr_scene`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`bio_chr_scene`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme1`.`pc` ORDER BY 2',
				'character_event' => 'SELECT `bio_encounter_scene`.`id`, `bio_encounter_scene`.`scene` FROM `bio_encounter_scene` ORDER BY 2',
			],
			'bio_storystatic' => [
				'story' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`story_title`), CONCAT_WS(\'\', `bio_story`.`id`, \'   \', `bio_story`.`story_title`), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'throughline' => 'SELECT `class_dramatica_throughline`.`id`, `class_dramatica_throughline`.`throughline` FROM `class_dramatica_throughline` ORDER BY 2',
				'story_character_mc' => 'SELECT `bio_chr`.`id`, IF(CHAR_LENGTH(`bio_chr`.`character_name`) || CHAR_LENGTH(`bio_chr`.`bio_archetype`), CONCAT_WS(\'\', `bio_chr`.`character_name`, \' - \', IF(    CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS(\'\',   `class_dramatica_archetype1`.`archetype`, \' \'), \'\')), \'\') FROM `bio_chr` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_chr`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr`.`bio_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr`.`bio_archetype` ORDER BY 2',
				'throughline_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'issue' => 'SELECT `class_dramatica_issue`.`id`, `class_dramatica_issue`.`issue` FROM `class_dramatica_issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_issue`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_issue`.`concern` ORDER BY 2',
				'problem' => 'SELECT `class_dramatica_themes`.`id`, `class_dramatica_themes`.`theme` FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'solution' => 'SELECT `class_dramatica_themes`.`id`, `class_dramatica_themes`.`theme` FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'symptom' => 'SELECT `class_dramatica_themes`.`id`, `class_dramatica_themes`.`theme` FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'response' => 'SELECT `class_dramatica_themes`.`id`, `class_dramatica_themes`.`theme` FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'catalyst' => 'SELECT `class_dramatica_themes`.`id`, IF(CHAR_LENGTH(`class_dramatica_themes`.`issue`) || CHAR_LENGTH(`class_dramatica_themes`.`concern`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS(\'\',   `class_dramatica_issue1`.`issue`), \'\'), \' - \', IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS(\'\',   `class_dramatica_concern1`.`concern`), \'\')), \'\') FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'inhibitor' => 'SELECT `class_dramatica_themes`.`id`, IF(CHAR_LENGTH(`class_dramatica_themes`.`issue`) || CHAR_LENGTH(`class_dramatica_themes`.`concern`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS(\'\',   `class_dramatica_issue1`.`issue`), \'\'), \'- \', IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS(\'\',   `class_dramatica_concern1`.`concern`), \'\')), \'\') FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'benchmark' => 'SELECT `class_dramatica_themes`.`id`, IF(CHAR_LENGTH(`class_dramatica_themes`.`concern`) || CHAR_LENGTH(`class_dramatica_themes`.`domain`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS(\'\',   `class_dramatica_concern1`.`concern`), \'\'), \' - \', IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS(\'\',   `class_dramatica_domain1`.`domain`), \'\')), \'\') FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'signpost1' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'signpost2' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'signpost3' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'signpost4' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
			],
			'bio_storyweaving_scene' => [
				'story' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`story_title`), CONCAT_WS(\'\', `bio_story`.`id`, \'   \', `bio_story`.`story_title`), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'step' => 'SELECT `class_dramatica_steps`.`id`, `class_dramatica_steps`.`step` FROM `class_dramatica_steps` LEFT JOIN `class_story_acts` as class_story_acts1 ON `class_story_acts1`.`id`=`class_dramatica_steps`.`act` ORDER BY 2',
				'throughline' => 'SELECT `class_dramatica_throughline`.`id`, `class_dramatica_throughline`.`throughline` FROM `class_dramatica_throughline` ORDER BY 2',
				'domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'issue' => 'SELECT `class_dramatica_issue`.`id`, `class_dramatica_issue`.`issue` FROM `class_dramatica_issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_issue`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_issue`.`concern` ORDER BY 2',
				'theme' => 'SELECT `class_dramatica_themes`.`id`, `class_dramatica_themes`.`theme` FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
			],
			'bio_chr_scene' => [
				'biography' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`story_title`), CONCAT_WS(\'\', `bio_story`.`id`, \' - \', `bio_story`.`story_title`), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'author_id' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`id`) || CHAR_LENGTH(`biblio_author`.`memberID`), CONCAT_WS(\'\', `biblio_author`.`id`, \'    \', `biblio_author`.`memberID`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'author_name' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`last_name`) || CHAR_LENGTH(`biblio_author`.`first_name`), CONCAT_WS(\'\', `biblio_author`.`last_name`, \', \', `biblio_author`.`first_name`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'bibliography' => 'SELECT `biblio_doc`.`id`, IF(CHAR_LENGTH(`biblio_doc`.`id`) || CHAR_LENGTH(`biblio_doc`.`title`), CONCAT_WS(\'\', `biblio_doc`.`id`, \'    \', `biblio_doc`.`title`), \'\') FROM `biblio_doc` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_doc`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`biblio_doc`.`type` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`biblio_doc`.`genre` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`biblio_doc`.`language` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_doc`.`rights` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_doc`.`data_evaluation` LEFT JOIN `class_authority_library` as class_authority_library1 ON `class_authority_library1`.`id`=`biblio_doc`.`authority_organization` LEFT JOIN `biblio_team` as biblio_team1 ON `biblio_team1`.`id`=`biblio_doc`.`team` LEFT JOIN `biblio_analyst` as biblio_analyst1 ON `biblio_analyst1`.`id`=`biblio_doc`.`biblio_lead` ORDER BY 2',
				'transcript' => 'SELECT `biblio_transcript`.`id`, IF(CHAR_LENGTH(`biblio_transcript`.`id`) || CHAR_LENGTH(`biblio_transcript`.`transcript_title`), CONCAT_WS(\'\', `biblio_transcript`.`id`, \'   \', `biblio_transcript`.`transcript_title`), \'\') FROM `biblio_transcript` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_transcript`.`author_memberID` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_transcript`.`bibliography_title` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_transcript`.`ip_rights` ORDER BY 2',
				'token_sequence' => 'SELECT `biblio_token`.`id`, IF(CHAR_LENGTH(`biblio_token`.`id`) || CHAR_LENGTH(`biblio_token`.`token_sequence`), CONCAT_WS(\'\', `biblio_token`.`id`, \'   \', `biblio_token`.`token_sequence`), \'\') FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript` ORDER BY 2',
				'token' => 'SELECT `biblio_token`.`id`, `biblio_token`.`token` FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript` ORDER BY 2',
				'invivo_code' => 'SELECT `biblio_code_invivo`.`id`, `biblio_code_invivo`.`invivo` FROM `biblio_code_invivo` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_code_invivo`.`author` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_code_invivo`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_code_invivo`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`biblio_code_invivo`.`token_sequence` ORDER BY 2',
				'startdate' => 'SELECT `biblio_code_invivo`.`id`, IF(CHAR_LENGTH(if(`biblio_code_invivo`.`start_date`,date_format(`biblio_code_invivo`.`start_date`,\'%d/%m/%Y %H:%i\'),\'\')) || CHAR_LENGTH(if(`biblio_code_invivo`.`end_date`,date_format(`biblio_code_invivo`.`end_date`,\'%d/%m/%Y %H:%i\'),\'\')), CONCAT_WS(\'\', if(`biblio_code_invivo`.`start_date`,date_format(`biblio_code_invivo`.`start_date`,\'%d/%m/%Y %H:%i\'),\'\'), \' - \', if(`biblio_code_invivo`.`end_date`,date_format(`biblio_code_invivo`.`end_date`,\'%d/%m/%Y %H:%i\'),\'\')), \'\') FROM `biblio_code_invivo` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_code_invivo`.`author` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_code_invivo`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_code_invivo`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`biblio_code_invivo`.`token_sequence` ORDER BY 2',
				'enddate' => 'SELECT `biblio_code_invivo`.`id`, if(`biblio_code_invivo`.`end_date`,date_format(`biblio_code_invivo`.`end_date`,\'%d/%m/%Y %H:%i\'),\'\') FROM `biblio_code_invivo` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_code_invivo`.`author` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_code_invivo`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_code_invivo`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`biblio_code_invivo`.`token_sequence` ORDER BY 2',
				'person' => 'SELECT `biblio_code_invivo`.`id`, `biblio_code_invivo`.`person` FROM `biblio_code_invivo` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_code_invivo`.`author` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_code_invivo`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_code_invivo`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`biblio_code_invivo`.`token_sequence` ORDER BY 2',
				'place' => 'SELECT `biblio_code_invivo`.`id`, `biblio_code_invivo`.`place` FROM `biblio_code_invivo` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_code_invivo`.`author` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_code_invivo`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_code_invivo`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`biblio_code_invivo`.`token_sequence` ORDER BY 2',
				'herme_code' => 'SELECT `bio_code_herme`.`id`, `bio_code_herme`.`hermeneutic` FROM `bio_code_herme` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_code_herme`.`biography` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_code_herme`.`agent_id` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_code_herme`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_code_herme`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_code_herme`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_code_herme`.`token_sequence` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme`.`pc` ORDER BY 2',
				'impression' => 'SELECT `bio_code_herme`.`id`, IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS(\'\',   `class_im1`.`impression`), \'\') FROM `bio_code_herme` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_code_herme`.`biography` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_code_herme`.`agent_id` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_code_herme`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_code_herme`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_code_herme`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_code_herme`.`token_sequence` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme`.`pc` ORDER BY 2',
				'noetictension' => 'SELECT `bio_code_herme`.`id`, IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS(\'\',   `class_nt1`.`noetictension`), \'\') FROM `bio_code_herme` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_code_herme`.`biography` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_code_herme`.`agent_id` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_code_herme`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_code_herme`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_code_herme`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_code_herme`.`token_sequence` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme`.`pc` ORDER BY 2',
				'pc' => 'SELECT `bio_code_herme`.`id`, IF(    CHAR_LENGTH(`class_pc1`.`perform_contrad`), CONCAT_WS(\'\',   `class_pc1`.`perform_contrad`), \'\') FROM `bio_code_herme` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_code_herme`.`biography` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_code_herme`.`agent_id` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_code_herme`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_code_herme`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_code_herme`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_code_herme`.`token_sequence` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme`.`pc` ORDER BY 2',
				'chr_element' => 'SELECT `class_character_element`.`id`, IF(CHAR_LENGTH(`class_character_element`.`element`) || CHAR_LENGTH(`class_character_element`.`value`), CONCAT_WS(\'\', `class_character_element`.`element`, \'- \', `class_character_element`.`value`), \'\') FROM `class_character_element` ORDER BY 2',
			],
			'bio_chr_dev' => [
				'agent_id' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`id`) || CHAR_LENGTH(`biblio_author`.`memberID`), CONCAT_WS(\'\', `biblio_author`.`id`, \'   \', `biblio_author`.`memberID`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'agent_name' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`last_name`) || CHAR_LENGTH(`biblio_author`.`first_name`), CONCAT_WS(\'\', `biblio_author`.`last_name`, \', \', `biblio_author`.`first_name`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'bio_story' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`story_title`), CONCAT_WS(\'\', `bio_story`.`id`, \' - \', `bio_story`.`story_title`), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'cw_name' => 'SELECT `bio_chr`.`id`, IF(CHAR_LENGTH(`bio_chr`.`character_name`) || CHAR_LENGTH(`bio_chr`.`agent_name`), CONCAT_WS(\'\', `bio_chr`.`character_name`, \' - \', IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS(\'\',   `game_agent1`.`last_name`, \', \', `game_agent1`.`first_name`), \'\')), \'\') FROM `bio_chr` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_chr`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr`.`bio_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr`.`bio_archetype` ORDER BY 2',
				'dp1_resolve' => 'SELECT `class_dramatica_storypoints1`.`id`, `class_dramatica_storypoints1`.`term` FROM `class_dramatica_storypoints1` ORDER BY 2',
				'dp2_resolve' => 'SELECT `class_dramatica_storypoints2`.`id`, `class_dramatica_storypoints2`.`term` FROM `class_dramatica_storypoints2` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints2`.`cat1` ORDER BY 2',
				'dp3_resolve' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'mc_resolve' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'illust_resolve' => 'SELECT `bio_chr_scene`.`id`, IF(CHAR_LENGTH(`bio_chr_scene`.`id`) || CHAR_LENGTH(`bio_chr_scene`.`illustration`), CONCAT_WS(\'\', `bio_chr_scene`.`id`, \' - \', `bio_chr_scene`.`illustration`), \'\') FROM `bio_chr_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_scene`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_scene`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_chr_scene`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_chr_scene`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_chr_scene`.`token` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo1 ON `biblio_code_invivo1`.`id`=`bio_chr_scene`.`invivo_code` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo2 ON `biblio_code_invivo2`.`id`=`bio_chr_scene`.`startdate` LEFT JOIN `bio_code_herme` as bio_code_herme1 ON `bio_code_herme1`.`id`=`bio_chr_scene`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`bio_chr_scene`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme1`.`pc` ORDER BY 2',
				'dp3_growth' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'mc_growth' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'illust_growth' => 'SELECT `bio_chr_scene`.`id`, IF(CHAR_LENGTH(`bio_chr_scene`.`id`) || CHAR_LENGTH(`bio_chr_scene`.`illustration`), CONCAT_WS(\'\', `bio_chr_scene`.`id`, \' - \', `bio_chr_scene`.`illustration`), \'\') FROM `bio_chr_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_scene`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_scene`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_chr_scene`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_chr_scene`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_chr_scene`.`token` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo1 ON `biblio_code_invivo1`.`id`=`bio_chr_scene`.`invivo_code` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo2 ON `biblio_code_invivo2`.`id`=`bio_chr_scene`.`startdate` LEFT JOIN `bio_code_herme` as bio_code_herme1 ON `bio_code_herme1`.`id`=`bio_chr_scene`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`bio_chr_scene`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme1`.`pc` ORDER BY 2',
				'dp3_approach' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'mc_approach' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'illust_approach' => 'SELECT `bio_chr_scene`.`id`, IF(CHAR_LENGTH(`bio_chr_scene`.`id`) || CHAR_LENGTH(`bio_chr_scene`.`illustration`), CONCAT_WS(\'\', `bio_chr_scene`.`id`, \' - \', `bio_chr_scene`.`illustration`), \'\') FROM `bio_chr_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_scene`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_scene`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_chr_scene`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_chr_scene`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_chr_scene`.`token` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo1 ON `biblio_code_invivo1`.`id`=`bio_chr_scene`.`invivo_code` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo2 ON `biblio_code_invivo2`.`id`=`bio_chr_scene`.`startdate` LEFT JOIN `bio_code_herme` as bio_code_herme1 ON `bio_code_herme1`.`id`=`bio_chr_scene`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`bio_chr_scene`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme1`.`pc` ORDER BY 2',
				'dp3_psstyle' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'mc_ps_style' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'illust_ps_style' => 'SELECT `bio_chr_scene`.`id`, IF(CHAR_LENGTH(`bio_chr_scene`.`id`) || CHAR_LENGTH(`bio_chr_scene`.`illustration`), CONCAT_WS(\'\', `bio_chr_scene`.`id`, \' - \', `bio_chr_scene`.`illustration`), \'\') FROM `bio_chr_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_scene`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_scene`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_chr_scene`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_chr_scene`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_chr_scene`.`token` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo1 ON `biblio_code_invivo1`.`id`=`bio_chr_scene`.`invivo_code` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo2 ON `biblio_code_invivo2`.`id`=`bio_chr_scene`.`startdate` LEFT JOIN `bio_code_herme` as bio_code_herme1 ON `bio_code_herme1`.`id`=`bio_chr_scene`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`bio_chr_scene`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme1`.`pc` ORDER BY 2',
				'noetictension' => 'SELECT `class_nt`.`id`, `class_nt`.`noetictension` FROM `class_nt` ORDER BY 2',
				'illust_nt' => 'SELECT `bio_chr_scene`.`id`, IF(CHAR_LENGTH(`bio_chr_scene`.`id`) || CHAR_LENGTH(`bio_chr_scene`.`illustration`), CONCAT_WS(\'\', `bio_chr_scene`.`id`, \' - \', `bio_chr_scene`.`illustration`), \'\') FROM `bio_chr_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_scene`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_scene`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_chr_scene`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_chr_scene`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_chr_scene`.`token` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo1 ON `biblio_code_invivo1`.`id`=`bio_chr_scene`.`invivo_code` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo2 ON `biblio_code_invivo2`.`id`=`bio_chr_scene`.`startdate` LEFT JOIN `bio_code_herme` as bio_code_herme1 ON `bio_code_herme1`.`id`=`bio_chr_scene`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`bio_chr_scene`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme1`.`pc` ORDER BY 2',
				'impression' => 'SELECT `class_im`.`id`, `class_im`.`impression` FROM `class_im` ORDER BY 2',
				'illust_im' => 'SELECT `bio_chr_scene`.`id`, IF(CHAR_LENGTH(`bio_chr_scene`.`id`) || CHAR_LENGTH(`bio_chr_scene`.`illustration`), CONCAT_WS(\'\', `bio_chr_scene`.`id`, \' - \', `bio_chr_scene`.`illustration`), \'\') FROM `bio_chr_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_scene`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_scene`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_chr_scene`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_chr_scene`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_chr_scene`.`token` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo1 ON `biblio_code_invivo1`.`id`=`bio_chr_scene`.`invivo_code` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo2 ON `biblio_code_invivo2`.`id`=`bio_chr_scene`.`startdate` LEFT JOIN `bio_code_herme` as bio_code_herme1 ON `bio_code_herme1`.`id`=`bio_chr_scene`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`bio_chr_scene`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme1`.`pc` ORDER BY 2',
				'mcs_problem' => 'SELECT `bio_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS(\'\',   `class_dramatica_themes1`.`theme`), \'\') FROM `bio_storystatic` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storystatic`.`throughline` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr1`.`bio_archetype` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`bio_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes5`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`bio_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`class_dramatica_themes6`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`bio_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`bio_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`bio_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`bio_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`bio_storystatic`.`signpost4` ORDER BY 2',
				'illust_mcs_problem' => 'SELECT `bio_chr_scene`.`id`, IF(CHAR_LENGTH(`bio_chr_scene`.`id`) || CHAR_LENGTH(`bio_chr_scene`.`illustration`), CONCAT_WS(\'\', `bio_chr_scene`.`id`, \' - \', `bio_chr_scene`.`illustration`), \'\') FROM `bio_chr_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_scene`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_scene`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_chr_scene`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_chr_scene`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_chr_scene`.`token` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo1 ON `biblio_code_invivo1`.`id`=`bio_chr_scene`.`invivo_code` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo2 ON `biblio_code_invivo2`.`id`=`bio_chr_scene`.`startdate` LEFT JOIN `bio_code_herme` as bio_code_herme1 ON `bio_code_herme1`.`id`=`bio_chr_scene`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`bio_chr_scene`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme1`.`pc` ORDER BY 2',
				'mcs_solution' => 'SELECT `bio_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS(\'\',   `class_dramatica_themes2`.`theme`), \'\') FROM `bio_storystatic` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storystatic`.`throughline` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr1`.`bio_archetype` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`bio_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes5`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`bio_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`class_dramatica_themes6`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`bio_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`bio_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`bio_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`bio_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`bio_storystatic`.`signpost4` ORDER BY 2',
				'illust_mcs_solution' => 'SELECT `bio_chr_scene`.`id`, IF(CHAR_LENGTH(`bio_chr_scene`.`id`) || CHAR_LENGTH(`bio_chr_scene`.`illustration`), CONCAT_WS(\'\', `bio_chr_scene`.`id`, \' - \', `bio_chr_scene`.`illustration`), \'\') FROM `bio_chr_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_scene`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_scene`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_chr_scene`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_chr_scene`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_chr_scene`.`token` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo1 ON `biblio_code_invivo1`.`id`=`bio_chr_scene`.`invivo_code` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo2 ON `biblio_code_invivo2`.`id`=`bio_chr_scene`.`startdate` LEFT JOIN `bio_code_herme` as bio_code_herme1 ON `bio_code_herme1`.`id`=`bio_chr_scene`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`bio_chr_scene`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme1`.`pc` ORDER BY 2',
				'mcs_symptom' => 'SELECT `bio_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS(\'\',   `class_dramatica_themes3`.`theme`), \'\') FROM `bio_storystatic` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storystatic`.`throughline` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr1`.`bio_archetype` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`bio_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes5`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`bio_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`class_dramatica_themes6`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`bio_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`bio_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`bio_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`bio_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`bio_storystatic`.`signpost4` ORDER BY 2',
				'illust_mcs_symptom' => 'SELECT `bio_chr_scene`.`id`, IF(CHAR_LENGTH(`bio_chr_scene`.`id`) || CHAR_LENGTH(`bio_chr_scene`.`illustration`), CONCAT_WS(\'\', `bio_chr_scene`.`id`, \' - \', `bio_chr_scene`.`illustration`), \'\') FROM `bio_chr_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_scene`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_scene`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_chr_scene`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_chr_scene`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_chr_scene`.`token` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo1 ON `biblio_code_invivo1`.`id`=`bio_chr_scene`.`invivo_code` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo2 ON `biblio_code_invivo2`.`id`=`bio_chr_scene`.`startdate` LEFT JOIN `bio_code_herme` as bio_code_herme1 ON `bio_code_herme1`.`id`=`bio_chr_scene`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`bio_chr_scene`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme1`.`pc` ORDER BY 2',
				'mcs_response' => 'SELECT `bio_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS(\'\',   `class_dramatica_themes4`.`theme`), \'\') FROM `bio_storystatic` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storystatic`.`throughline` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr1`.`bio_archetype` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`bio_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes5`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`bio_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`class_dramatica_themes6`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`bio_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`bio_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`bio_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`bio_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`bio_storystatic`.`signpost4` ORDER BY 2',
				'illust_mcs_response' => 'SELECT `bio_chr_scene`.`id`, IF(CHAR_LENGTH(`bio_chr_scene`.`id`) || CHAR_LENGTH(`bio_chr_scene`.`illustration`), CONCAT_WS(\'\', `bio_chr_scene`.`id`, \' - \', `bio_chr_scene`.`illustration`), \'\') FROM `bio_chr_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_scene`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_scene`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_chr_scene`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_chr_scene`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_chr_scene`.`token` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo1 ON `biblio_code_invivo1`.`id`=`bio_chr_scene`.`invivo_code` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo2 ON `biblio_code_invivo2`.`id`=`bio_chr_scene`.`startdate` LEFT JOIN `bio_code_herme` as bio_code_herme1 ON `bio_code_herme1`.`id`=`bio_chr_scene`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`bio_chr_scene`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme1`.`pc` ORDER BY 2',
			],
			'bio_encounter' => [
				'authorA' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`id`) || CHAR_LENGTH(`game_agent`.`memberID`), CONCAT_WS(\'\', `game_agent`.`id`, \'   \', `game_agent`.`memberID`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'author_nameA' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`last_name`) || CHAR_LENGTH(`biblio_author`.`first_name`), CONCAT_WS(\'\', `biblio_author`.`last_name`, \', \', `biblio_author`.`first_name`), \'\') FROM `biblio_author` LEFT JOIN `game_agents` as game_agents1 ON `game_agents1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'bibliographyA' => 'SELECT `biblio_doc`.`id`, IF(CHAR_LENGTH(`biblio_doc`.`id`) || CHAR_LENGTH(`biblio_doc`.`title`), CONCAT_WS(\'\', `biblio_doc`.`id`, \'   \', `biblio_doc`.`title`), \'\') FROM `biblio_doc` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_doc`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`biblio_doc`.`type` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`biblio_doc`.`genre` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`biblio_doc`.`language` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_doc`.`rights` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_doc`.`data_evaluation` LEFT JOIN `class_authority_library` as class_authority_library1 ON `class_authority_library1`.`id`=`biblio_doc`.`authority_organization` LEFT JOIN `biblio_team` as biblio_team1 ON `biblio_team1`.`id`=`biblio_doc`.`team` LEFT JOIN `biblio_analyst` as biblio_analyst1 ON `biblio_analyst1`.`id`=`biblio_doc`.`biblio_lead` ORDER BY 2',
				'transcriptA' => 'SELECT `biblio_transcript`.`id`, IF(CHAR_LENGTH(`biblio_transcript`.`id`) || CHAR_LENGTH(`biblio_transcript`.`bibliography_title`), CONCAT_WS(\'\', `biblio_transcript`.`id`, \'    \', IF(    CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS(\'\',   `biblio_doc1`.`title`), \'\')), \'\') FROM `biblio_transcript` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_transcript`.`author_memberID` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_transcript`.`bibliography_title` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_transcript`.`ip_rights` ORDER BY 2',
				'tokenA' => 'SELECT `biblio_token`.`id`, IF(CHAR_LENGTH(`biblio_token`.`token_sequence`) || CHAR_LENGTH(`biblio_token`.`token`), CONCAT_WS(\'\', `biblio_token`.`token_sequence`, \'   \', `biblio_token`.`token`), \'\') FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript` ORDER BY 2',
				'sceneA' => 'SELECT `bio_chr_scene`.`id`, IF(CHAR_LENGTH(`bio_chr_scene`.`id`) || CHAR_LENGTH(`bio_chr_scene`.`scene`), CONCAT_WS(\'\', `bio_chr_scene`.`id`, \'   \', `bio_chr_scene`.`scene`), \'\') FROM `bio_chr_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_scene`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_scene`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_chr_scene`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_chr_scene`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_chr_scene`.`token` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo1 ON `biblio_code_invivo1`.`id`=`bio_chr_scene`.`invivo_code` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo2 ON `biblio_code_invivo2`.`id`=`bio_chr_scene`.`startdate` LEFT JOIN `bio_code_herme` as bio_code_herme1 ON `bio_code_herme1`.`id`=`bio_chr_scene`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`bio_chr_scene`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme1`.`pc` ORDER BY 2',
				'authorB' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`id`) || CHAR_LENGTH(`game_agent`.`memberID`), CONCAT_WS(\'\', `game_agent`.`id`, \'   \', `game_agent`.`memberID`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'authornameB' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`last_name`) || CHAR_LENGTH(`game_agent`.`first_name`), CONCAT_WS(\'\', `game_agent`.`last_name`, \', \', `game_agent`.`first_name`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'bibliographyB' => 'SELECT `biblio_doc`.`id`, IF(CHAR_LENGTH(`biblio_doc`.`id`) || CHAR_LENGTH(`biblio_doc`.`title`), CONCAT_WS(\'\', `biblio_doc`.`id`, \'   \', `biblio_doc`.`title`), \'\') FROM `biblio_doc` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_doc`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`biblio_doc`.`type` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`biblio_doc`.`genre` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`biblio_doc`.`language` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_doc`.`rights` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_doc`.`data_evaluation` LEFT JOIN `class_authority_library` as class_authority_library1 ON `class_authority_library1`.`id`=`biblio_doc`.`authority_organization` LEFT JOIN `biblio_team` as biblio_team1 ON `biblio_team1`.`id`=`biblio_doc`.`team` LEFT JOIN `biblio_analyst` as biblio_analyst1 ON `biblio_analyst1`.`id`=`biblio_doc`.`biblio_lead` ORDER BY 2',
				'transcriptB' => 'SELECT `biblio_transcript`.`id`, IF(CHAR_LENGTH(`biblio_transcript`.`id`) || CHAR_LENGTH(`biblio_transcript`.`transcript_title`), CONCAT_WS(\'\', `biblio_transcript`.`id`, \'   \', `biblio_transcript`.`transcript_title`), \'\') FROM `biblio_transcript` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_transcript`.`author_memberID` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_transcript`.`bibliography_title` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_transcript`.`ip_rights` ORDER BY 2',
				'tokenB' => 'SELECT `biblio_token`.`id`, IF(CHAR_LENGTH(`biblio_token`.`token_sequence`) || CHAR_LENGTH(`biblio_token`.`token`), CONCAT_WS(\'\', `biblio_token`.`token_sequence`, \'   \', `biblio_token`.`token`), \'\') FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript` ORDER BY 2',
				'sceneB' => 'SELECT `bio_chr_scene`.`id`, IF(CHAR_LENGTH(`bio_chr_scene`.`id`) || CHAR_LENGTH(`bio_chr_scene`.`scene`), CONCAT_WS(\'\', `bio_chr_scene`.`id`, \'   \', `bio_chr_scene`.`scene`), \'\') FROM `bio_chr_scene` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_scene`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_scene`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_chr_scene`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_chr_scene`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_chr_scene`.`token` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo1 ON `biblio_code_invivo1`.`id`=`bio_chr_scene`.`invivo_code` LEFT JOIN `biblio_code_invivo` as biblio_code_invivo2 ON `biblio_code_invivo2`.`id`=`bio_chr_scene`.`startdate` LEFT JOIN `bio_code_herme` as bio_code_herme1 ON `bio_code_herme1`.`id`=`bio_chr_scene`.`herme_code` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`bio_chr_scene`.`chr_element` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_code_herme1`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_code_herme1`.`noetictension` LEFT JOIN `class_pc` as class_pc1 ON `class_pc1`.`id`=`bio_code_herme1`.`pc` ORDER BY 2',
			],
			'bio_encounter_scene' => [
			],
			'bio_code_herme' => [
				'biography' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`story_title`), CONCAT_WS(\'\', `bio_story`.`id`, \' - \', `bio_story`.`story_title`), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'agent_id' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`id`) || CHAR_LENGTH(`game_agent`.`memberID`), CONCAT_WS(\'\', `game_agent`.`id`, \'   \', `game_agent`.`memberID`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'agent_name' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`last_name`) || CHAR_LENGTH(`game_agent`.`first_name`), CONCAT_WS(\'\', `game_agent`.`last_name`, \', \', `game_agent`.`first_name`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'author_id' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`id`) || CHAR_LENGTH(`biblio_author`.`id`), CONCAT_WS(\'\', `biblio_author`.`id`, \'   \', `biblio_author`.`id`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'author_name' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`last_name`) || CHAR_LENGTH(`biblio_author`.`first_name`), CONCAT_WS(\'\', `biblio_author`.`last_name`, \', \', `biblio_author`.`first_name`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'bibliography' => 'SELECT `biblio_doc`.`id`, IF(CHAR_LENGTH(`biblio_doc`.`id`) || CHAR_LENGTH(`biblio_doc`.`title`), CONCAT_WS(\'\', `biblio_doc`.`id`, \'   \', `biblio_doc`.`title`), \'\') FROM `biblio_doc` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_doc`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`biblio_doc`.`type` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`biblio_doc`.`genre` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`biblio_doc`.`language` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_doc`.`rights` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_doc`.`data_evaluation` LEFT JOIN `class_authority_library` as class_authority_library1 ON `class_authority_library1`.`id`=`biblio_doc`.`authority_organization` LEFT JOIN `biblio_team` as biblio_team1 ON `biblio_team1`.`id`=`biblio_doc`.`team` LEFT JOIN `biblio_analyst` as biblio_analyst1 ON `biblio_analyst1`.`id`=`biblio_doc`.`biblio_lead` ORDER BY 2',
				'transcript' => 'SELECT `biblio_transcript`.`id`, IF(CHAR_LENGTH(`biblio_transcript`.`id`) || CHAR_LENGTH(`biblio_transcript`.`transcript_title`), CONCAT_WS(\'\', `biblio_transcript`.`id`, \'   \', `biblio_transcript`.`transcript_title`), \'\') FROM `biblio_transcript` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_transcript`.`author_memberID` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_transcript`.`bibliography_title` LEFT JOIN `class_rights` as class_rights1 ON `class_rights1`.`id`=`biblio_transcript`.`ip_rights` ORDER BY 2',
				'token_sequence' => 'SELECT `biblio_token`.`id`, IF(CHAR_LENGTH(`biblio_token`.`id`) || CHAR_LENGTH(`biblio_token`.`token_sequence`), CONCAT_WS(\'\', `biblio_token`.`id`, \' - \', `biblio_token`.`token_sequence`), \'\') FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript` ORDER BY 2',
				'token' => 'SELECT `biblio_token`.`id`, `biblio_token`.`token` FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript` ORDER BY 2',
				'impression' => 'SELECT `class_im`.`id`, `class_im`.`impression` FROM `class_im` ORDER BY 2',
				'noetictension' => 'SELECT `class_nt`.`id`, `class_nt`.`noetictension` FROM `class_nt` ORDER BY 2',
				'pc' => 'SELECT `class_pc`.`id`, `class_pc`.`perform_contrad` FROM `class_pc` ORDER BY 2',
			],
			'bio_storydynamic' => [
				'story' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`story_title`), CONCAT_WS(\'\', `bio_story`.`id`, `bio_story`.`story_title`), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'storystatic_mc' => 'SELECT `bio_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS(\'\',   `class_dramatica_throughline1`.`throughline`), \'\') FROM `bio_storystatic` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storystatic`.`throughline` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr1`.`bio_archetype` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`bio_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes5`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`bio_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`class_dramatica_themes6`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`bio_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`bio_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`bio_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`bio_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`bio_storystatic`.`signpost4` ORDER BY 2',
				'story_chr_mc' => 'SELECT `bio_chr`.`id`, IF(CHAR_LENGTH(`bio_chr`.`character_name`) || CHAR_LENGTH(`bio_chr`.`agent_name`), CONCAT_WS(\'\', `bio_chr`.`character_name`, \' agent:\', IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS(\'\',   `game_agent1`.`last_name`, \', \', `game_agent1`.`first_name`), \'\')), \'\') FROM `bio_chr` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_chr`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr`.`bio_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr`.`bio_archetype` ORDER BY 2',
				'mc_problem' => 'SELECT `bio_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS(\'\',   `class_dramatica_themes1`.`theme`), \'\') FROM `bio_storystatic` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storystatic`.`throughline` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr1`.`bio_archetype` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`bio_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes5`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`bio_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`class_dramatica_themes6`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`bio_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`bio_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`bio_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`bio_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`bio_storystatic`.`signpost4` ORDER BY 2',
				'mc_resolve' => 'SELECT `bio_chr_dev`.`id`, IF(    CHAR_LENGTH(`class_dynamicstorypoints41`.`term`), CONCAT_WS(\'\',   `class_dynamicstorypoints41`.`term`), \'\') FROM `bio_chr_dev` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_dev`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_dev`.`bio_story` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_chr_dev`.`cw_name` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`bio_chr_dev`.`dp1_resolve` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`bio_chr_dev`.`dp2_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`bio_chr_dev`.`dp3_resolve` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints41 ON `class_dynamicstorypoints41`.`id`=`bio_chr_dev`.`mc_resolve` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_chr_dev`.`illust_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints32 ON `class_dramatica_storypoints32`.`id`=`bio_chr_dev`.`dp3_growth` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints42 ON `class_dynamicstorypoints42`.`id`=`bio_chr_dev`.`mc_growth` LEFT JOIN `bio_chr_scene` as bio_chr_scene2 ON `bio_chr_scene2`.`id`=`bio_chr_dev`.`illust_growth` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints33 ON `class_dramatica_storypoints33`.`id`=`bio_chr_dev`.`dp3_approach` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints43 ON `class_dynamicstorypoints43`.`id`=`bio_chr_dev`.`mc_approach` LEFT JOIN `bio_chr_scene` as bio_chr_scene3 ON `bio_chr_scene3`.`id`=`bio_chr_dev`.`illust_approach` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints34 ON `class_dramatica_storypoints34`.`id`=`bio_chr_dev`.`dp3_psstyle` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints44 ON `class_dynamicstorypoints44`.`id`=`bio_chr_dev`.`mc_ps_style` LEFT JOIN `bio_chr_scene` as bio_chr_scene4 ON `bio_chr_scene4`.`id`=`bio_chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_chr_dev`.`noetictension` LEFT JOIN `bio_chr_scene` as bio_chr_scene5 ON `bio_chr_scene5`.`id`=`bio_chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_chr_dev`.`impression` LEFT JOIN `bio_chr_scene` as bio_chr_scene6 ON `bio_chr_scene6`.`id`=`bio_chr_dev`.`illust_im` LEFT JOIN `bio_storystatic` as bio_storystatic1 ON `bio_storystatic1`.`id`=`bio_chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic1`.`problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene7 ON `bio_chr_scene7`.`id`=`bio_chr_dev`.`illust_mcs_problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene8 ON `bio_chr_scene8`.`id`=`bio_chr_dev`.`illust_mcs_solution` LEFT JOIN `bio_chr_scene` as bio_chr_scene9 ON `bio_chr_scene9`.`id`=`bio_chr_dev`.`illust_mcs_symptom` LEFT JOIN `bio_chr_scene` as bio_chr_scene10 ON `bio_chr_scene10`.`id`=`bio_chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic1`.`response` ORDER BY 2',
				'mc_growth' => 'SELECT `bio_chr_dev`.`id`, IF(    CHAR_LENGTH(`class_dynamicstorypoints42`.`term`), CONCAT_WS(\'\',   `class_dynamicstorypoints42`.`term`), \'\') FROM `bio_chr_dev` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_dev`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_dev`.`bio_story` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_chr_dev`.`cw_name` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`bio_chr_dev`.`dp1_resolve` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`bio_chr_dev`.`dp2_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`bio_chr_dev`.`dp3_resolve` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints41 ON `class_dynamicstorypoints41`.`id`=`bio_chr_dev`.`mc_resolve` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_chr_dev`.`illust_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints32 ON `class_dramatica_storypoints32`.`id`=`bio_chr_dev`.`dp3_growth` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints42 ON `class_dynamicstorypoints42`.`id`=`bio_chr_dev`.`mc_growth` LEFT JOIN `bio_chr_scene` as bio_chr_scene2 ON `bio_chr_scene2`.`id`=`bio_chr_dev`.`illust_growth` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints33 ON `class_dramatica_storypoints33`.`id`=`bio_chr_dev`.`dp3_approach` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints43 ON `class_dynamicstorypoints43`.`id`=`bio_chr_dev`.`mc_approach` LEFT JOIN `bio_chr_scene` as bio_chr_scene3 ON `bio_chr_scene3`.`id`=`bio_chr_dev`.`illust_approach` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints34 ON `class_dramatica_storypoints34`.`id`=`bio_chr_dev`.`dp3_psstyle` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints44 ON `class_dynamicstorypoints44`.`id`=`bio_chr_dev`.`mc_ps_style` LEFT JOIN `bio_chr_scene` as bio_chr_scene4 ON `bio_chr_scene4`.`id`=`bio_chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_chr_dev`.`noetictension` LEFT JOIN `bio_chr_scene` as bio_chr_scene5 ON `bio_chr_scene5`.`id`=`bio_chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_chr_dev`.`impression` LEFT JOIN `bio_chr_scene` as bio_chr_scene6 ON `bio_chr_scene6`.`id`=`bio_chr_dev`.`illust_im` LEFT JOIN `bio_storystatic` as bio_storystatic1 ON `bio_storystatic1`.`id`=`bio_chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic1`.`problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene7 ON `bio_chr_scene7`.`id`=`bio_chr_dev`.`illust_mcs_problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene8 ON `bio_chr_scene8`.`id`=`bio_chr_dev`.`illust_mcs_solution` LEFT JOIN `bio_chr_scene` as bio_chr_scene9 ON `bio_chr_scene9`.`id`=`bio_chr_dev`.`illust_mcs_symptom` LEFT JOIN `bio_chr_scene` as bio_chr_scene10 ON `bio_chr_scene10`.`id`=`bio_chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic1`.`response` ORDER BY 2',
				'mc_approach' => 'SELECT `bio_chr_dev`.`id`, IF(    CHAR_LENGTH(`class_dynamicstorypoints43`.`term`), CONCAT_WS(\'\',   `class_dynamicstorypoints43`.`term`), \'\') FROM `bio_chr_dev` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_dev`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_dev`.`bio_story` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_chr_dev`.`cw_name` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`bio_chr_dev`.`dp1_resolve` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`bio_chr_dev`.`dp2_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`bio_chr_dev`.`dp3_resolve` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints41 ON `class_dynamicstorypoints41`.`id`=`bio_chr_dev`.`mc_resolve` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_chr_dev`.`illust_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints32 ON `class_dramatica_storypoints32`.`id`=`bio_chr_dev`.`dp3_growth` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints42 ON `class_dynamicstorypoints42`.`id`=`bio_chr_dev`.`mc_growth` LEFT JOIN `bio_chr_scene` as bio_chr_scene2 ON `bio_chr_scene2`.`id`=`bio_chr_dev`.`illust_growth` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints33 ON `class_dramatica_storypoints33`.`id`=`bio_chr_dev`.`dp3_approach` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints43 ON `class_dynamicstorypoints43`.`id`=`bio_chr_dev`.`mc_approach` LEFT JOIN `bio_chr_scene` as bio_chr_scene3 ON `bio_chr_scene3`.`id`=`bio_chr_dev`.`illust_approach` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints34 ON `class_dramatica_storypoints34`.`id`=`bio_chr_dev`.`dp3_psstyle` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints44 ON `class_dynamicstorypoints44`.`id`=`bio_chr_dev`.`mc_ps_style` LEFT JOIN `bio_chr_scene` as bio_chr_scene4 ON `bio_chr_scene4`.`id`=`bio_chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_chr_dev`.`noetictension` LEFT JOIN `bio_chr_scene` as bio_chr_scene5 ON `bio_chr_scene5`.`id`=`bio_chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_chr_dev`.`impression` LEFT JOIN `bio_chr_scene` as bio_chr_scene6 ON `bio_chr_scene6`.`id`=`bio_chr_dev`.`illust_im` LEFT JOIN `bio_storystatic` as bio_storystatic1 ON `bio_storystatic1`.`id`=`bio_chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic1`.`problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene7 ON `bio_chr_scene7`.`id`=`bio_chr_dev`.`illust_mcs_problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene8 ON `bio_chr_scene8`.`id`=`bio_chr_dev`.`illust_mcs_solution` LEFT JOIN `bio_chr_scene` as bio_chr_scene9 ON `bio_chr_scene9`.`id`=`bio_chr_dev`.`illust_mcs_symptom` LEFT JOIN `bio_chr_scene` as bio_chr_scene10 ON `bio_chr_scene10`.`id`=`bio_chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic1`.`response` ORDER BY 2',
				'mc_ps_style' => 'SELECT `bio_chr_dev`.`id`, IF(    CHAR_LENGTH(`class_dynamicstorypoints44`.`term`), CONCAT_WS(\'\',   `class_dynamicstorypoints44`.`term`), \'\') FROM `bio_chr_dev` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_dev`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_dev`.`bio_story` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_chr_dev`.`cw_name` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`bio_chr_dev`.`dp1_resolve` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`bio_chr_dev`.`dp2_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`bio_chr_dev`.`dp3_resolve` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints41 ON `class_dynamicstorypoints41`.`id`=`bio_chr_dev`.`mc_resolve` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_chr_dev`.`illust_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints32 ON `class_dramatica_storypoints32`.`id`=`bio_chr_dev`.`dp3_growth` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints42 ON `class_dynamicstorypoints42`.`id`=`bio_chr_dev`.`mc_growth` LEFT JOIN `bio_chr_scene` as bio_chr_scene2 ON `bio_chr_scene2`.`id`=`bio_chr_dev`.`illust_growth` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints33 ON `class_dramatica_storypoints33`.`id`=`bio_chr_dev`.`dp3_approach` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints43 ON `class_dynamicstorypoints43`.`id`=`bio_chr_dev`.`mc_approach` LEFT JOIN `bio_chr_scene` as bio_chr_scene3 ON `bio_chr_scene3`.`id`=`bio_chr_dev`.`illust_approach` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints34 ON `class_dramatica_storypoints34`.`id`=`bio_chr_dev`.`dp3_psstyle` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints44 ON `class_dynamicstorypoints44`.`id`=`bio_chr_dev`.`mc_ps_style` LEFT JOIN `bio_chr_scene` as bio_chr_scene4 ON `bio_chr_scene4`.`id`=`bio_chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_chr_dev`.`noetictension` LEFT JOIN `bio_chr_scene` as bio_chr_scene5 ON `bio_chr_scene5`.`id`=`bio_chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_chr_dev`.`impression` LEFT JOIN `bio_chr_scene` as bio_chr_scene6 ON `bio_chr_scene6`.`id`=`bio_chr_dev`.`illust_im` LEFT JOIN `bio_storystatic` as bio_storystatic1 ON `bio_storystatic1`.`id`=`bio_chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic1`.`problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene7 ON `bio_chr_scene7`.`id`=`bio_chr_dev`.`illust_mcs_problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene8 ON `bio_chr_scene8`.`id`=`bio_chr_dev`.`illust_mcs_solution` LEFT JOIN `bio_chr_scene` as bio_chr_scene9 ON `bio_chr_scene9`.`id`=`bio_chr_dev`.`illust_mcs_symptom` LEFT JOIN `bio_chr_scene` as bio_chr_scene10 ON `bio_chr_scene10`.`id`=`bio_chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic1`.`response` ORDER BY 2',
				'story_chr_ic' => 'SELECT `bio_chr`.`id`, IF(CHAR_LENGTH(`bio_chr`.`id`) || CHAR_LENGTH(`bio_chr`.`character_name`), CONCAT_WS(\'\', `bio_chr`.`id`, \' agent:\', `bio_chr`.`character_name`), \'\') FROM `bio_chr` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_chr`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr`.`bio_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr`.`bio_archetype` ORDER BY 2',
				'ic_resolve' => 'SELECT `bio_chr_dev`.`id`, IF(    CHAR_LENGTH(`class_dynamicstorypoints41`.`term`), CONCAT_WS(\'\',   `class_dynamicstorypoints41`.`term`), \'\') FROM `bio_chr_dev` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_dev`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_dev`.`bio_story` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_chr_dev`.`cw_name` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`bio_chr_dev`.`dp1_resolve` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`bio_chr_dev`.`dp2_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`bio_chr_dev`.`dp3_resolve` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints41 ON `class_dynamicstorypoints41`.`id`=`bio_chr_dev`.`mc_resolve` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_chr_dev`.`illust_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints32 ON `class_dramatica_storypoints32`.`id`=`bio_chr_dev`.`dp3_growth` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints42 ON `class_dynamicstorypoints42`.`id`=`bio_chr_dev`.`mc_growth` LEFT JOIN `bio_chr_scene` as bio_chr_scene2 ON `bio_chr_scene2`.`id`=`bio_chr_dev`.`illust_growth` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints33 ON `class_dramatica_storypoints33`.`id`=`bio_chr_dev`.`dp3_approach` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints43 ON `class_dynamicstorypoints43`.`id`=`bio_chr_dev`.`mc_approach` LEFT JOIN `bio_chr_scene` as bio_chr_scene3 ON `bio_chr_scene3`.`id`=`bio_chr_dev`.`illust_approach` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints34 ON `class_dramatica_storypoints34`.`id`=`bio_chr_dev`.`dp3_psstyle` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints44 ON `class_dynamicstorypoints44`.`id`=`bio_chr_dev`.`mc_ps_style` LEFT JOIN `bio_chr_scene` as bio_chr_scene4 ON `bio_chr_scene4`.`id`=`bio_chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_chr_dev`.`noetictension` LEFT JOIN `bio_chr_scene` as bio_chr_scene5 ON `bio_chr_scene5`.`id`=`bio_chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_chr_dev`.`impression` LEFT JOIN `bio_chr_scene` as bio_chr_scene6 ON `bio_chr_scene6`.`id`=`bio_chr_dev`.`illust_im` LEFT JOIN `bio_storystatic` as bio_storystatic1 ON `bio_storystatic1`.`id`=`bio_chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic1`.`problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene7 ON `bio_chr_scene7`.`id`=`bio_chr_dev`.`illust_mcs_problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene8 ON `bio_chr_scene8`.`id`=`bio_chr_dev`.`illust_mcs_solution` LEFT JOIN `bio_chr_scene` as bio_chr_scene9 ON `bio_chr_scene9`.`id`=`bio_chr_dev`.`illust_mcs_symptom` LEFT JOIN `bio_chr_scene` as bio_chr_scene10 ON `bio_chr_scene10`.`id`=`bio_chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic1`.`response` ORDER BY 2',
				'dp_cat1' => 'SELECT `class_dramatica_storypoints1`.`id`, `class_dramatica_storypoints1`.`term` FROM `class_dramatica_storypoints1` ORDER BY 2',
				'dp_cat2' => 'SELECT `class_dramatica_storypoints2`.`id`, `class_dramatica_storypoints2`.`term` FROM `class_dramatica_storypoints2` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints2`.`cat1` ORDER BY 2',
				'dp_cat3_driver' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'os_driver' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'dp_cat3_limit' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'os_limit' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'dp_cat3_outcome' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'os_outcome' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'dp_cat3_judgement' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'os_judgement' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'os_goal_domain' => 'SELECT `bio_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS(\'\',   `class_dramatica_domain1`.`domain`), \'\') FROM `bio_storystatic` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storystatic`.`throughline` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr1`.`bio_archetype` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`bio_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes5`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`bio_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`class_dramatica_themes6`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`bio_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`bio_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`bio_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`bio_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`bio_storystatic`.`signpost4` ORDER BY 2',
				'os_goal_concern' => 'SELECT `bio_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS(\'\',   `class_dramatica_concern1`.`concern`), \'\') FROM `bio_storystatic` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storystatic`.`throughline` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr1`.`bio_archetype` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`bio_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes5`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`bio_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`class_dramatica_themes6`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`bio_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`bio_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`bio_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`bio_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`bio_storystatic`.`signpost4` ORDER BY 2',
				'os_consequence_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_consequence_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'os_cost_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_cost_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'os_dividend_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_dividend_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'os_requirements_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_requirements_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'os_prerequesites_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_prerequesites_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'os_preconditions_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_preconditions_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'os_forewarnings_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_forewarnings_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
			],
			'hist_author' => [
				'team' => 'SELECT `hist_team`.`id`, IF(CHAR_LENGTH(`hist_team`.`id`) || CHAR_LENGTH(`hist_team`.`team`), CONCAT_WS(\'\', `hist_team`.`id`, \' - \', `hist_team`.`team`), \'\') FROM `hist_team` ORDER BY 2',
				'agent_id' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`id`) || CHAR_LENGTH(`game_agent`.`memberID`), CONCAT_WS(\'\', `game_agent`.`id`, \'   \', `game_agent`.`memberID`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'agent_memberid' => 'SELECT `game_agent`.`id`, `game_agent`.`memberID` FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'last_name' => 'SELECT `game_agent`.`id`, `game_agent`.`last_name` FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'first_name' => 'SELECT `game_agent`.`id`, `game_agent`.`first_name` FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
			],
			'hist_team' => [
			],
			'hist_story' => [
				'team' => 'SELECT `hist_team`.`id`, IF(CHAR_LENGTH(`hist_team`.`id`) || CHAR_LENGTH(`hist_team`.`team`), CONCAT_WS(\'\', `hist_team`.`id`, \' - \', `hist_team`.`team`), \'\') FROM `hist_team` ORDER BY 2',
				'hist_lead_id' => 'SELECT `hist_author`.`id`, IF(CHAR_LENGTH(`hist_author`.`agent_id`) || CHAR_LENGTH(`hist_author`.`agent_memberid`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS(\'\',   `game_agent1`.`id`, \'   \', `game_agent1`.`memberID`), \'\'), \'   \', IF(    CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS(\'\',   `game_agent1`.`memberID`), \'\')), \'\') FROM `hist_author` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_author`.`team` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author`.`agent_id` ORDER BY 2',
				'hist_lead_name' => 'SELECT `hist_author`.`id`, IF(CHAR_LENGTH(`hist_author`.`last_name`) || CHAR_LENGTH(`hist_author`.`first_name`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`game_agent1`.`last_name`), CONCAT_WS(\'\',   `game_agent1`.`last_name`), \'\'), \', \', IF(    CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS(\'\',   `game_agent1`.`first_name`), \'\')), \'\') FROM `hist_author` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_author`.`team` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author`.`agent_id` ORDER BY 2',
				'community_id' => 'SELECT `hist_community`.`id`, IF(CHAR_LENGTH(`hist_community`.`id`) || CHAR_LENGTH(`hist_community`.`com_name`), CONCAT_WS(\'\', `hist_community`.`id`, \' - \', `hist_community`.`com_name`), \'\') FROM `hist_community` ORDER BY 2',
				'genre' => 'SELECT `class_bibliography_genre`.`id`, `class_bibliography_genre`.`genre` FROM `class_bibliography_genre` ORDER BY 2',
				'collaboration_status' => 'SELECT `class_story_collab_type`.`id`, `class_story_collab_type`.`collab_type` FROM `class_story_collab_type` ORDER BY 2',
				'language' => 'SELECT `class_language`.`id`, `class_language`.`short` FROM `class_language` ORDER BY 2',
			],
			'hist_chr' => [
				'team' => 'SELECT `hist_team`.`id`, `hist_team`.`team` FROM `hist_team` ORDER BY 2',
				'hist_lead_id' => 'SELECT `hist_author`.`id`, IF(CHAR_LENGTH(`hist_author`.`agent_id`) || CHAR_LENGTH(`hist_author`.`agent_memberid`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS(\'\',   `game_agent1`.`id`, \'   \', `game_agent1`.`memberID`), \'\'), \'   \', IF(    CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS(\'\',   `game_agent1`.`memberID`), \'\')), \'\') FROM `hist_author` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_author`.`team` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author`.`agent_id` ORDER BY 2',
				'hist_lead_memberid' => 'SELECT `hist_author`.`id`, IF(    CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS(\'\',   `game_agent1`.`memberID`), \'\') FROM `hist_author` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_author`.`team` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author`.`agent_id` ORDER BY 2',
				'hist_lead_name' => 'SELECT `hist_author`.`id`, IF(CHAR_LENGTH(`hist_author`.`last_name`) || CHAR_LENGTH(`hist_author`.`first_name`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`game_agent1`.`last_name`), CONCAT_WS(\'\',   `game_agent1`.`last_name`), \'\'), \', \', IF(    CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS(\'\',   `game_agent1`.`first_name`), \'\')), \'\') FROM `hist_author` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_author`.`team` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author`.`agent_id` ORDER BY 2',
				'hist_story' => 'SELECT `hist_story`.`id`, IF(CHAR_LENGTH(`hist_story`.`id`) || CHAR_LENGTH(`hist_story`.`story_title`), CONCAT_WS(\'\', `hist_story`.`id`, \' - \', `hist_story`.`story_title`), \'\') FROM `hist_story` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_story`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_story`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_community` as hist_community1 ON `hist_community1`.`id`=`hist_story`.`community_id` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`hist_story`.`genre` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`hist_story`.`collaboration_status` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`hist_story`.`language` ORDER BY 2',
				'agent_id' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`id`) || CHAR_LENGTH(`game_agent`.`memberID`), CONCAT_WS(\'\', `game_agent`.`id`, \'   \', `game_agent`.`memberID`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'agent_name' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`last_name`) || CHAR_LENGTH(`game_agent`.`first_name`), CONCAT_WS(\'\', `game_agent`.`last_name`, \', \', `game_agent`.`first_name`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'bio_story' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`story_title`), CONCAT_WS(\'\', `bio_story`.`id`, \' - \', `bio_story`.`story_title`), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'story_character' => 'SELECT `class_dramatica_character`.`id`, `class_dramatica_character`.`character` FROM `class_dramatica_character` ORDER BY 2',
				'story_archetype' => 'SELECT `class_dramatica_archetype`.`id`, IF(CHAR_LENGTH(`class_dramatica_archetype`.`archetype`), CONCAT_WS(\'\', `class_dramatica_archetype`.`archetype`, \' \'), \'\') FROM `class_dramatica_archetype` ORDER BY 2',
			],
			'hist_chr_dev' => [
				'hist_story' => 'SELECT `hist_story`.`id`, IF(CHAR_LENGTH(`hist_story`.`id`) || CHAR_LENGTH(`hist_story`.`story_title`), CONCAT_WS(\'\', `hist_story`.`id`, \' - \', `hist_story`.`story_title`), \'\') FROM `hist_story` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_story`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_story`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_community` as hist_community1 ON `hist_community1`.`id`=`hist_story`.`community_id` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`hist_story`.`genre` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`hist_story`.`collaboration_status` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`hist_story`.`language` ORDER BY 2',
				'bio_story' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`story_title`), CONCAT_WS(\'\', `bio_story`.`id`, \' - \', `bio_story`.`story_title`), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'agent_id' => 'SELECT `biblio_author`.`id`, IF(CHAR_LENGTH(`biblio_author`.`id`) || CHAR_LENGTH(`biblio_author`.`memberID`), CONCAT_WS(\'\', `biblio_author`.`id`, \'   \', `biblio_author`.`memberID`), \'\') FROM `biblio_author` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`biblio_author`.`game_agent_id` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization` ORDER BY 2',
				'agent_name' => 'SELECT `hist_chr`.`id`, IF(CHAR_LENGTH(`hist_chr`.`story_character`) || CHAR_LENGTH(`hist_chr`.`agent_name`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`), CONCAT_WS(\'\',   `class_dramatica_character1`.`character`), \'\'), \', \', IF(    CHAR_LENGTH(`game_agent3`.`last_name`) || CHAR_LENGTH(`game_agent3`.`first_name`), CONCAT_WS(\'\',   `game_agent3`.`last_name`, \', \', `game_agent3`.`first_name`), \'\')), \'\') FROM `hist_chr` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_chr`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr`.`hist_story` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr`.`story_archetype` ORDER BY 2',
				'cw_name' => 'SELECT `hist_chr`.`id`, `hist_chr`.`character_name` FROM `hist_chr` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_chr`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr`.`hist_story` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr`.`story_archetype` ORDER BY 2',
				'dp1_resolve' => 'SELECT `class_dramatica_storypoints1`.`id`, `class_dramatica_storypoints1`.`term` FROM `class_dramatica_storypoints1` ORDER BY 2',
				'dp2_resolve' => 'SELECT `class_dramatica_storypoints2`.`id`, `class_dramatica_storypoints2`.`term` FROM `class_dramatica_storypoints2` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints2`.`cat1` ORDER BY 2',
				'dp3_resolve' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'mc_resolve' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'illust_resolve' => 'SELECT `hist_chr_scene`.`id`, IF(CHAR_LENGTH(`hist_chr_scene`.`id`) || CHAR_LENGTH(`hist_chr_scene`.`illustration`), CONCAT_WS(\'\', `hist_chr_scene`.`id`, \' - \', `hist_chr_scene`.`illustration`), \'\') FROM `hist_chr_scene` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr_scene`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr_scene`.`hist_story` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_chr_scene`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr1`.`story_archetype` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr_scene`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr_scene`.`bio_story` LEFT JOIN `bio_storyline` as bio_storyline1 ON `bio_storyline1`.`id`=`hist_chr_scene`.`bio_storyline_no` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`hist_chr_scene`.`chr_element` ORDER BY 2',
				'dp3_growth' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'mc_growth' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'illust_growth' => 'SELECT `hist_chr_scene`.`id`, IF(CHAR_LENGTH(`hist_chr_scene`.`id`) || CHAR_LENGTH(`hist_chr_scene`.`illustration`), CONCAT_WS(\'\', `hist_chr_scene`.`id`, \' - \', `hist_chr_scene`.`illustration`), \'\') FROM `hist_chr_scene` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr_scene`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr_scene`.`hist_story` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_chr_scene`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr1`.`story_archetype` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr_scene`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr_scene`.`bio_story` LEFT JOIN `bio_storyline` as bio_storyline1 ON `bio_storyline1`.`id`=`hist_chr_scene`.`bio_storyline_no` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`hist_chr_scene`.`chr_element` ORDER BY 2',
				'dp3_approach' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'mc_approach' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'illust_approach' => 'SELECT `hist_chr_scene`.`id`, IF(CHAR_LENGTH(`hist_chr_scene`.`id`) || CHAR_LENGTH(`hist_chr_scene`.`illustration`), CONCAT_WS(\'\', `hist_chr_scene`.`id`, \' - \', `hist_chr_scene`.`illustration`), \'\') FROM `hist_chr_scene` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr_scene`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr_scene`.`hist_story` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_chr_scene`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr1`.`story_archetype` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr_scene`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr_scene`.`bio_story` LEFT JOIN `bio_storyline` as bio_storyline1 ON `bio_storyline1`.`id`=`hist_chr_scene`.`bio_storyline_no` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`hist_chr_scene`.`chr_element` ORDER BY 2',
				'dp3_psstyle' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'mc_ps_style' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'illust_ps_style' => 'SELECT `hist_chr_scene`.`id`, IF(CHAR_LENGTH(`hist_chr_scene`.`id`) || CHAR_LENGTH(`hist_chr_scene`.`illustration`), CONCAT_WS(\'\', `hist_chr_scene`.`id`, \' - \', `hist_chr_scene`.`illustration`), \'\') FROM `hist_chr_scene` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr_scene`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr_scene`.`hist_story` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_chr_scene`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr1`.`story_archetype` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr_scene`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr_scene`.`bio_story` LEFT JOIN `bio_storyline` as bio_storyline1 ON `bio_storyline1`.`id`=`hist_chr_scene`.`bio_storyline_no` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`hist_chr_scene`.`chr_element` ORDER BY 2',
				'noetictension' => 'SELECT `class_nt`.`id`, `class_nt`.`noetictension` FROM `class_nt` ORDER BY 2',
				'illust_nt' => 'SELECT `hist_chr_scene`.`id`, IF(CHAR_LENGTH(`hist_chr_scene`.`id`) || CHAR_LENGTH(`hist_chr_scene`.`illustration`), CONCAT_WS(\'\', `hist_chr_scene`.`id`, \' - \', `hist_chr_scene`.`illustration`), \'\') FROM `hist_chr_scene` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr_scene`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr_scene`.`hist_story` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_chr_scene`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr1`.`story_archetype` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr_scene`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr_scene`.`bio_story` LEFT JOIN `bio_storyline` as bio_storyline1 ON `bio_storyline1`.`id`=`hist_chr_scene`.`bio_storyline_no` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`hist_chr_scene`.`chr_element` ORDER BY 2',
				'impression' => 'SELECT `class_im`.`id`, `class_im`.`impression` FROM `class_im` ORDER BY 2',
				'illust_im' => 'SELECT `hist_chr_scene`.`id`, IF(CHAR_LENGTH(`hist_chr_scene`.`id`) || CHAR_LENGTH(`hist_chr_scene`.`illustration`), CONCAT_WS(\'\', `hist_chr_scene`.`id`, \' - \', `hist_chr_scene`.`illustration`), \'\') FROM `hist_chr_scene` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr_scene`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr_scene`.`hist_story` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_chr_scene`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr1`.`story_archetype` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr_scene`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr_scene`.`bio_story` LEFT JOIN `bio_storyline` as bio_storyline1 ON `bio_storyline1`.`id`=`hist_chr_scene`.`bio_storyline_no` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`hist_chr_scene`.`chr_element` ORDER BY 2',
				'mcs_problem' => 'SELECT `hist_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS(\'\',   `class_dramatica_themes1`.`theme`), \'\') FROM `hist_storystatic` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`hist_storystatic`.`throughline` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`hist_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`hist_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`hist_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`hist_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`hist_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`hist_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`hist_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`hist_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes5`.`domain` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`hist_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain3 ON `class_dramatica_domain3`.`id`=`class_dramatica_themes6`.`domain` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`hist_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain4 ON `class_dramatica_domain4`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`hist_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`hist_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`hist_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`hist_storystatic`.`signpost4` ORDER BY 2',
				'illust_mcs_problem' => 'SELECT `hist_chr_scene`.`id`, IF(CHAR_LENGTH(`hist_chr_scene`.`id`) || CHAR_LENGTH(`hist_chr_scene`.`illustration`), CONCAT_WS(\'\', `hist_chr_scene`.`id`, \' - \', `hist_chr_scene`.`illustration`), \'\') FROM `hist_chr_scene` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr_scene`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr_scene`.`hist_story` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_chr_scene`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr1`.`story_archetype` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr_scene`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr_scene`.`bio_story` LEFT JOIN `bio_storyline` as bio_storyline1 ON `bio_storyline1`.`id`=`hist_chr_scene`.`bio_storyline_no` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`hist_chr_scene`.`chr_element` ORDER BY 2',
				'mcs_solution' => 'SELECT `hist_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS(\'\',   `class_dramatica_themes2`.`theme`), \'\') FROM `hist_storystatic` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`hist_storystatic`.`throughline` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`hist_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`hist_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`hist_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`hist_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`hist_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`hist_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`hist_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`hist_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes5`.`domain` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`hist_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain3 ON `class_dramatica_domain3`.`id`=`class_dramatica_themes6`.`domain` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`hist_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain4 ON `class_dramatica_domain4`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`hist_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`hist_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`hist_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`hist_storystatic`.`signpost4` ORDER BY 2',
				'illust_mcs_solution' => 'SELECT `hist_chr_scene`.`id`, IF(CHAR_LENGTH(`hist_chr_scene`.`id`) || CHAR_LENGTH(`hist_chr_scene`.`illustration`), CONCAT_WS(\'\', `hist_chr_scene`.`id`, \' - \', `hist_chr_scene`.`illustration`), \'\') FROM `hist_chr_scene` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr_scene`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr_scene`.`hist_story` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_chr_scene`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr1`.`story_archetype` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr_scene`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr_scene`.`bio_story` LEFT JOIN `bio_storyline` as bio_storyline1 ON `bio_storyline1`.`id`=`hist_chr_scene`.`bio_storyline_no` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`hist_chr_scene`.`chr_element` ORDER BY 2',
				'mcs_symptom' => 'SELECT `hist_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS(\'\',   `class_dramatica_themes3`.`theme`), \'\') FROM `hist_storystatic` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`hist_storystatic`.`throughline` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`hist_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`hist_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`hist_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`hist_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`hist_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`hist_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`hist_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`hist_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes5`.`domain` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`hist_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain3 ON `class_dramatica_domain3`.`id`=`class_dramatica_themes6`.`domain` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`hist_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain4 ON `class_dramatica_domain4`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`hist_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`hist_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`hist_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`hist_storystatic`.`signpost4` ORDER BY 2',
				'illust_mcs_symptom' => 'SELECT `hist_chr_scene`.`id`, IF(CHAR_LENGTH(`hist_chr_scene`.`id`) || CHAR_LENGTH(`hist_chr_scene`.`illustration`), CONCAT_WS(\'\', `hist_chr_scene`.`id`, \' - \', `hist_chr_scene`.`illustration`), \'\') FROM `hist_chr_scene` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr_scene`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr_scene`.`hist_story` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_chr_scene`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr1`.`story_archetype` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr_scene`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr_scene`.`bio_story` LEFT JOIN `bio_storyline` as bio_storyline1 ON `bio_storyline1`.`id`=`hist_chr_scene`.`bio_storyline_no` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`hist_chr_scene`.`chr_element` ORDER BY 2',
				'mcs_response' => 'SELECT `hist_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS(\'\',   `class_dramatica_themes4`.`theme`), \'\') FROM `hist_storystatic` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`hist_storystatic`.`throughline` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`hist_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`hist_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`hist_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`hist_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`hist_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`hist_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`hist_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`hist_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes5`.`domain` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`hist_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain3 ON `class_dramatica_domain3`.`id`=`class_dramatica_themes6`.`domain` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`hist_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain4 ON `class_dramatica_domain4`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`hist_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`hist_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`hist_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`hist_storystatic`.`signpost4` ORDER BY 2',
				'illust_mcs_response' => 'SELECT `hist_chr_scene`.`id`, IF(CHAR_LENGTH(`hist_chr_scene`.`id`) || CHAR_LENGTH(`hist_chr_scene`.`illustration`), CONCAT_WS(\'\', `hist_chr_scene`.`id`, \' - \', `hist_chr_scene`.`illustration`), \'\') FROM `hist_chr_scene` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr_scene`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr_scene`.`hist_story` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_chr_scene`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr1`.`story_archetype` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr_scene`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr_scene`.`bio_story` LEFT JOIN `bio_storyline` as bio_storyline1 ON `bio_storyline1`.`id`=`hist_chr_scene`.`bio_storyline_no` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`hist_chr_scene`.`chr_element` ORDER BY 2',
			],
			'hist_chr_scene' => [
				'author_id' => 'SELECT `hist_author`.`id`, IF(CHAR_LENGTH(`hist_author`.`agent_id`) || CHAR_LENGTH(`hist_author`.`agent_memberid`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS(\'\',   `game_agent1`.`id`, \'   \', `game_agent1`.`memberID`), \'\'), \'    \', IF(    CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS(\'\',   `game_agent1`.`memberID`), \'\')), \'\') FROM `hist_author` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_author`.`team` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author`.`agent_id` ORDER BY 2',
				'author_name' => 'SELECT `hist_author`.`id`, IF(CHAR_LENGTH(`hist_author`.`last_name`) || CHAR_LENGTH(`hist_author`.`first_name`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`game_agent1`.`last_name`), CONCAT_WS(\'\',   `game_agent1`.`last_name`), \'\'), \', \', IF(    CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS(\'\',   `game_agent1`.`first_name`), \'\')), \'\') FROM `hist_author` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_author`.`team` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author`.`agent_id` ORDER BY 2',
				'hist_story' => 'SELECT `hist_story`.`id`, IF(CHAR_LENGTH(`hist_story`.`id`) || CHAR_LENGTH(`hist_story`.`story_title`), CONCAT_WS(\'\', `hist_story`.`id`, \' - \', `hist_story`.`story_title`), \'\') FROM `hist_story` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_story`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_story`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_community` as hist_community1 ON `hist_community1`.`id`=`hist_story`.`community_id` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`hist_story`.`genre` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`hist_story`.`collaboration_status` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`hist_story`.`language` ORDER BY 2',
				'character' => 'SELECT `hist_chr`.`id`, IF(CHAR_LENGTH(`hist_chr`.`story_character`) || CHAR_LENGTH(`hist_chr`.`story_archetype`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`), CONCAT_WS(\'\',   `class_dramatica_character1`.`character`), \'\'), \' - \', IF(    CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS(\'\',   `class_dramatica_archetype1`.`archetype`, \' \'), \'\')), \'\') FROM `hist_chr` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_chr`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr`.`hist_story` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr`.`story_archetype` ORDER BY 2',
				'agent_id' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`id`) || CHAR_LENGTH(`game_agent`.`memberID`), CONCAT_WS(\'\', `game_agent`.`id`, \'   \', `game_agent`.`memberID`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'agent_name' => 'SELECT `game_agent`.`id`, IF(CHAR_LENGTH(`game_agent`.`last_name`) || CHAR_LENGTH(`game_agent`.`first_name`), CONCAT_WS(\'\', `game_agent`.`last_name`, \', \', `game_agent`.`first_name`), \'\') FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization` ORDER BY 2',
				'bio_story' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`story_title`), CONCAT_WS(\'\', `bio_story`.`id`, \' -     \', `bio_story`.`story_title`), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'bio_storyline_no' => 'SELECT `bio_storyline`.`id`, IF(CHAR_LENGTH(`bio_storyline`.`storyline_no`) || CHAR_LENGTH(`bio_storyline`.`storyline_title`), CONCAT_WS(\'\', `bio_storyline`.`storyline_no`, \' - \', `bio_storyline`.`storyline_title`), \'\') FROM `bio_storyline` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storyline`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_storyline`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_storyline`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_storyline`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_storyline`.`token` LEFT JOIN `class_story_acts` as class_story_acts1 ON `class_story_acts1`.`id`=`bio_storyline`.`story_act` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storyline`.`character` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr1`.`agent_id` LEFT JOIN `bio_storyweaving_scene` as bio_storyweaving_scene1 ON `bio_storyweaving_scene1`.`id`=`bio_storyline`.`storyweaving_scene_no` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`bio_storyweaving_scene1`.`step` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_storyline`.`character_scene` LEFT JOIN `bio_encounter_scene` as bio_encounter_scene1 ON `bio_encounter_scene1`.`id`=`bio_storyline`.`character_event` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr1`.`bio_character` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storyweaving_scene1`.`theme` ORDER BY 2',
				'bio_storyline_text' => 'SELECT `bio_storyline`.`id`, IF(CHAR_LENGTH(`bio_storyline`.`id`) || CHAR_LENGTH(`bio_storyline`.`storyline`), CONCAT_WS(\'\', `bio_storyline`.`id`, \'- \', `bio_storyline`.`storyline`), \'\') FROM `bio_storyline` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storyline`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_storyline`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_storyline`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_storyline`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_storyline`.`token` LEFT JOIN `class_story_acts` as class_story_acts1 ON `class_story_acts1`.`id`=`bio_storyline`.`story_act` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storyline`.`character` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr1`.`agent_id` LEFT JOIN `bio_storyweaving_scene` as bio_storyweaving_scene1 ON `bio_storyweaving_scene1`.`id`=`bio_storyline`.`storyweaving_scene_no` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`bio_storyweaving_scene1`.`step` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_storyline`.`character_scene` LEFT JOIN `bio_encounter_scene` as bio_encounter_scene1 ON `bio_encounter_scene1`.`id`=`bio_storyline`.`character_event` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr1`.`bio_character` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storyweaving_scene1`.`theme` ORDER BY 2',
				'chr_element' => 'SELECT `class_character_element`.`id`, IF(CHAR_LENGTH(`class_character_element`.`element`) || CHAR_LENGTH(`class_character_element`.`value`), CONCAT_WS(\'\', `class_character_element`.`element`, \'- \', `class_character_element`.`value`), \'\') FROM `class_character_element` ORDER BY 2',
			],
			'hist_storyline' => [
				'story' => 'SELECT `hist_story`.`id`, IF(CHAR_LENGTH(`hist_story`.`id`) || CHAR_LENGTH(`hist_story`.`story_title`), CONCAT_WS(\'\', `hist_story`.`id`, \'   \', `hist_story`.`story_title`), \'\') FROM `hist_story` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_story`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_story`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_community` as hist_community1 ON `hist_community1`.`id`=`hist_story`.`community_id` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`hist_story`.`genre` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`hist_story`.`collaboration_status` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`hist_story`.`language` ORDER BY 2',
				'story_act' => 'SELECT `class_story_acts`.`id`, `class_story_acts`.`act` FROM `class_story_acts` ORDER BY 2',
				'character' => 'SELECT `hist_chr`.`id`, IF(CHAR_LENGTH(`hist_chr`.`id`) || CHAR_LENGTH(`hist_chr`.`agent_name`), CONCAT_WS(\'\', `hist_chr`.`id`, \' - \', IF(    CHAR_LENGTH(`game_agent3`.`last_name`) || CHAR_LENGTH(`game_agent3`.`first_name`), CONCAT_WS(\'\',   `game_agent3`.`last_name`, \', \', `game_agent3`.`first_name`), \'\')), \'\') FROM `hist_chr` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_chr`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr`.`hist_story` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr`.`story_archetype` ORDER BY 2',
				'role' => 'SELECT `hist_chr`.`id`, IF(CHAR_LENGTH(`hist_chr`.`story_archetype`) || CHAR_LENGTH(`hist_chr`.`role`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS(\'\',   `class_dramatica_archetype1`.`archetype`, \' \'), \'\'), \' - \', `hist_chr`.`role`), \'\') FROM `hist_chr` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_chr`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr`.`hist_story` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr`.`story_archetype` ORDER BY 2',
				'storyweaving_scene_no' => 'SELECT `hist_storyweaving_scene`.`id`, IF(    CHAR_LENGTH(`class_dramatica_steps1`.`step`), CONCAT_WS(\'\',   `class_dramatica_steps1`.`step`), \'\') FROM `hist_storyweaving_scene` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_storyweaving_scene`.`story` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`hist_storyweaving_scene`.`step` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`hist_storyweaving_scene`.`throughline` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`hist_storyweaving_scene`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`hist_storyweaving_scene`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`hist_storyweaving_scene`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`hist_storyweaving_scene`.`theme` ORDER BY 2',
				'storyweaving_scene' => 'SELECT `hist_storyweaving_scene`.`id`, `hist_storyweaving_scene`.`id` FROM `hist_storyweaving_scene` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_storyweaving_scene`.`story` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`hist_storyweaving_scene`.`step` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`hist_storyweaving_scene`.`throughline` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`hist_storyweaving_scene`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`hist_storyweaving_scene`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`hist_storyweaving_scene`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`hist_storyweaving_scene`.`theme` ORDER BY 2',
				'storyweaving_sequence' => 'SELECT `hist_storyweaving_scene`.`id`, `hist_storyweaving_scene`.`sequence` FROM `hist_storyweaving_scene` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_storyweaving_scene`.`story` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`hist_storyweaving_scene`.`step` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`hist_storyweaving_scene`.`throughline` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`hist_storyweaving_scene`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`hist_storyweaving_scene`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`hist_storyweaving_scene`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`hist_storyweaving_scene`.`theme` ORDER BY 2',
				'storyweaving_theme' => 'SELECT `hist_storyweaving_scene`.`id`, IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS(\'\',   `class_dramatica_themes1`.`theme`), \'\') FROM `hist_storyweaving_scene` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_storyweaving_scene`.`story` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`hist_storyweaving_scene`.`step` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`hist_storyweaving_scene`.`throughline` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`hist_storyweaving_scene`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`hist_storyweaving_scene`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`hist_storyweaving_scene`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`hist_storyweaving_scene`.`theme` ORDER BY 2',
				'characterevent_scene' => 'SELECT `hist_chr_scenes`.`id`, IF(CHAR_LENGTH(`hist_chr_scenes`.`id`) || CHAR_LENGTH(`hist_chr_scenes`.`scene`), CONCAT_WS(\'\', `hist_chr_scenes`.`id`, \'   \', `hist_chr_scenes`.`scene`), \'\') FROM `hist_chr_scenes` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr_scenes`.`author_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr_scenes`.`hist_story` LEFT JOIN `hist_story_chrs` as hist_story_chrs1 ON `hist_story_chrs1`.`id`=`hist_chr_scenes`.`character` LEFT JOIN `bio_chrs` as bio_chrs1 ON `bio_chrs1`.`id`=`hist_story_chrs1`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_story_chrs1`.`story_archetype` LEFT JOIN `game_agents` as game_agents1 ON `game_agents1`.`id`=`hist_chr_scenes`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr_scenes`.`bio_story` LEFT JOIN `bio_storylines` as bio_storylines1 ON `bio_storylines1`.`id`=`hist_chr_scenes`.`bio_storyline_no` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`hist_chr_scenes`.`chr_element` ORDER BY 2',
				'character_event' => 'SELECT `hist_encounter_scenes`.`id`, `hist_encounter_scenes`.`scene` FROM `hist_encounter_scenes` ORDER BY 2',
			],
			'hist_storystatic' => [
				'story' => 'SELECT `hist_story`.`id`, IF(CHAR_LENGTH(`hist_story`.`id`) || CHAR_LENGTH(`hist_story`.`story_title`), CONCAT_WS(\'\', `hist_story`.`id`, \'   \', `hist_story`.`story_title`), \'\') FROM `hist_story` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_story`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_story`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_community` as hist_community1 ON `hist_community1`.`id`=`hist_story`.`community_id` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`hist_story`.`genre` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`hist_story`.`collaboration_status` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`hist_story`.`language` ORDER BY 2',
				'throughline' => 'SELECT `class_dramatica_throughline`.`id`, `class_dramatica_throughline`.`throughline` FROM `class_dramatica_throughline` ORDER BY 2',
				'story_character_mc' => 'SELECT `hist_chr`.`id`, IF(CHAR_LENGTH(`hist_chr`.`story_character`) || CHAR_LENGTH(`hist_chr`.`agent_name`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`), CONCAT_WS(\'\',   `class_dramatica_character1`.`character`), \'\'), \' - \', IF(    CHAR_LENGTH(`game_agent3`.`last_name`) || CHAR_LENGTH(`game_agent3`.`first_name`), CONCAT_WS(\'\',   `game_agent3`.`last_name`, \', \', `game_agent3`.`first_name`), \'\')), \'\') FROM `hist_chr` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_chr`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr`.`hist_story` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr`.`story_archetype` ORDER BY 2',
				'throughline_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'issue' => 'SELECT `class_dramatica_issue`.`id`, `class_dramatica_issue`.`issue` FROM `class_dramatica_issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_issue`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_issue`.`concern` ORDER BY 2',
				'problem' => 'SELECT `class_dramatica_themes`.`id`, `class_dramatica_themes`.`theme` FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'solution' => 'SELECT `class_dramatica_themes`.`id`, `class_dramatica_themes`.`theme` FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'symptom' => 'SELECT `class_dramatica_themes`.`id`, `class_dramatica_themes`.`theme` FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'response' => 'SELECT `class_dramatica_themes`.`id`, `class_dramatica_themes`.`theme` FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'catalyst' => 'SELECT `class_dramatica_themes`.`id`, IF(CHAR_LENGTH(`class_dramatica_themes`.`issue`) || CHAR_LENGTH(`class_dramatica_themes`.`domain`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS(\'\',   `class_dramatica_issue1`.`issue`), \'\'), \' - \', IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS(\'\',   `class_dramatica_domain1`.`domain`), \'\')), \'\') FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'inhibitor' => 'SELECT `class_dramatica_themes`.`id`, IF(CHAR_LENGTH(`class_dramatica_themes`.`issue`) || CHAR_LENGTH(`class_dramatica_themes`.`domain`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS(\'\',   `class_dramatica_issue1`.`issue`), \'\'), \'- \', IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS(\'\',   `class_dramatica_domain1`.`domain`), \'\')), \'\') FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'benchmark' => 'SELECT `class_dramatica_themes`.`id`, IF(CHAR_LENGTH(`class_dramatica_themes`.`concern`) || CHAR_LENGTH(`class_dramatica_themes`.`domain`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS(\'\',   `class_dramatica_concern1`.`concern`), \'\'), \' - \', IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS(\'\',   `class_dramatica_domain1`.`domain`), \'\')), \'\') FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
				'signpost1' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'signpost2' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'signpost3' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'signpost4' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
			],
			'hist_storydynamic' => [
				'hist_story' => 'SELECT `hist_story`.`id`, IF(CHAR_LENGTH(`hist_story`.`id`) || CHAR_LENGTH(`hist_story`.`story_title`), CONCAT_WS(\'\', `hist_story`.`id`, \' - \', `hist_story`.`story_title`), \'\') FROM `hist_story` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_story`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_story`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_community` as hist_community1 ON `hist_community1`.`id`=`hist_story`.`community_id` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`hist_story`.`genre` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`hist_story`.`collaboration_status` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`hist_story`.`language` ORDER BY 2',
				'bio_story_mc' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`agent_name`), CONCAT_WS(\'\', `bio_story`.`id`, \' - \', IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS(\'\',   `game_agent1`.`last_name`, \', \', `game_agent1`.`first_name`), \'\')), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'hist_chr_mc' => 'SELECT `hist_chr`.`id`, IF(CHAR_LENGTH(`hist_chr`.`story_character`) || CHAR_LENGTH(`hist_chr`.`agent_name`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`), CONCAT_WS(\'\',   `class_dramatica_character1`.`character`), \'\'), \' - \', IF(    CHAR_LENGTH(`game_agent3`.`last_name`) || CHAR_LENGTH(`game_agent3`.`first_name`), CONCAT_WS(\'\',   `game_agent3`.`last_name`, \', \', `game_agent3`.`first_name`), \'\')), \'\') FROM `hist_chr` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_chr`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr`.`hist_story` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr`.`story_archetype` ORDER BY 2',
				'storystatic_mc' => 'SELECT `bio_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS(\'\',   `class_dramatica_throughline1`.`throughline`), \'\') FROM `bio_storystatic` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storystatic`.`throughline` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr1`.`bio_archetype` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`bio_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes5`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`bio_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`class_dramatica_themes6`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`bio_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`bio_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`bio_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`bio_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`bio_storystatic`.`signpost4` ORDER BY 2',
				'story_chr_mc' => 'SELECT `bio_chr`.`id`, IF(CHAR_LENGTH(`bio_chr`.`bio_character`) || CHAR_LENGTH(`bio_chr`.`agent_name`), CONCAT_WS(\'\', IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`), CONCAT_WS(\'\',   `class_dramatica_character1`.`character`), \'\'), \' agent:\', IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS(\'\',   `game_agent1`.`last_name`, \', \', `game_agent1`.`first_name`), \'\')), \'\') FROM `bio_chr` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_chr`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr`.`bio_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr`.`bio_archetype` ORDER BY 2',
				'mc_problem' => 'SELECT `bio_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS(\'\',   `class_dramatica_themes1`.`theme`), \'\') FROM `bio_storystatic` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storystatic`.`throughline` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr1`.`bio_archetype` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`bio_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes5`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`bio_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`class_dramatica_themes6`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`bio_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`bio_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`bio_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`bio_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`bio_storystatic`.`signpost4` ORDER BY 2',
				'mc_resolve' => 'SELECT `bio_chr_dev`.`id`, IF(    CHAR_LENGTH(`class_dynamicstorypoints41`.`term`), CONCAT_WS(\'\',   `class_dynamicstorypoints41`.`term`), \'\') FROM `bio_chr_dev` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_dev`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_dev`.`bio_story` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_chr_dev`.`cw_name` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`bio_chr_dev`.`dp1_resolve` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`bio_chr_dev`.`dp2_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`bio_chr_dev`.`dp3_resolve` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints41 ON `class_dynamicstorypoints41`.`id`=`bio_chr_dev`.`mc_resolve` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_chr_dev`.`illust_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints32 ON `class_dramatica_storypoints32`.`id`=`bio_chr_dev`.`dp3_growth` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints42 ON `class_dynamicstorypoints42`.`id`=`bio_chr_dev`.`mc_growth` LEFT JOIN `bio_chr_scene` as bio_chr_scene2 ON `bio_chr_scene2`.`id`=`bio_chr_dev`.`illust_growth` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints33 ON `class_dramatica_storypoints33`.`id`=`bio_chr_dev`.`dp3_approach` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints43 ON `class_dynamicstorypoints43`.`id`=`bio_chr_dev`.`mc_approach` LEFT JOIN `bio_chr_scene` as bio_chr_scene3 ON `bio_chr_scene3`.`id`=`bio_chr_dev`.`illust_approach` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints34 ON `class_dramatica_storypoints34`.`id`=`bio_chr_dev`.`dp3_psstyle` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints44 ON `class_dynamicstorypoints44`.`id`=`bio_chr_dev`.`mc_ps_style` LEFT JOIN `bio_chr_scene` as bio_chr_scene4 ON `bio_chr_scene4`.`id`=`bio_chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_chr_dev`.`noetictension` LEFT JOIN `bio_chr_scene` as bio_chr_scene5 ON `bio_chr_scene5`.`id`=`bio_chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_chr_dev`.`impression` LEFT JOIN `bio_chr_scene` as bio_chr_scene6 ON `bio_chr_scene6`.`id`=`bio_chr_dev`.`illust_im` LEFT JOIN `bio_storystatic` as bio_storystatic1 ON `bio_storystatic1`.`id`=`bio_chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic1`.`problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene7 ON `bio_chr_scene7`.`id`=`bio_chr_dev`.`illust_mcs_problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene8 ON `bio_chr_scene8`.`id`=`bio_chr_dev`.`illust_mcs_solution` LEFT JOIN `bio_chr_scene` as bio_chr_scene9 ON `bio_chr_scene9`.`id`=`bio_chr_dev`.`illust_mcs_symptom` LEFT JOIN `bio_chr_scene` as bio_chr_scene10 ON `bio_chr_scene10`.`id`=`bio_chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic1`.`response` ORDER BY 2',
				'mc_growth' => 'SELECT `bio_chr_dev`.`id`, IF(    CHAR_LENGTH(`class_dynamicstorypoints42`.`term`), CONCAT_WS(\'\',   `class_dynamicstorypoints42`.`term`), \'\') FROM `bio_chr_dev` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_dev`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_dev`.`bio_story` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_chr_dev`.`cw_name` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`bio_chr_dev`.`dp1_resolve` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`bio_chr_dev`.`dp2_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`bio_chr_dev`.`dp3_resolve` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints41 ON `class_dynamicstorypoints41`.`id`=`bio_chr_dev`.`mc_resolve` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_chr_dev`.`illust_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints32 ON `class_dramatica_storypoints32`.`id`=`bio_chr_dev`.`dp3_growth` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints42 ON `class_dynamicstorypoints42`.`id`=`bio_chr_dev`.`mc_growth` LEFT JOIN `bio_chr_scene` as bio_chr_scene2 ON `bio_chr_scene2`.`id`=`bio_chr_dev`.`illust_growth` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints33 ON `class_dramatica_storypoints33`.`id`=`bio_chr_dev`.`dp3_approach` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints43 ON `class_dynamicstorypoints43`.`id`=`bio_chr_dev`.`mc_approach` LEFT JOIN `bio_chr_scene` as bio_chr_scene3 ON `bio_chr_scene3`.`id`=`bio_chr_dev`.`illust_approach` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints34 ON `class_dramatica_storypoints34`.`id`=`bio_chr_dev`.`dp3_psstyle` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints44 ON `class_dynamicstorypoints44`.`id`=`bio_chr_dev`.`mc_ps_style` LEFT JOIN `bio_chr_scene` as bio_chr_scene4 ON `bio_chr_scene4`.`id`=`bio_chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_chr_dev`.`noetictension` LEFT JOIN `bio_chr_scene` as bio_chr_scene5 ON `bio_chr_scene5`.`id`=`bio_chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_chr_dev`.`impression` LEFT JOIN `bio_chr_scene` as bio_chr_scene6 ON `bio_chr_scene6`.`id`=`bio_chr_dev`.`illust_im` LEFT JOIN `bio_storystatic` as bio_storystatic1 ON `bio_storystatic1`.`id`=`bio_chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic1`.`problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene7 ON `bio_chr_scene7`.`id`=`bio_chr_dev`.`illust_mcs_problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene8 ON `bio_chr_scene8`.`id`=`bio_chr_dev`.`illust_mcs_solution` LEFT JOIN `bio_chr_scene` as bio_chr_scene9 ON `bio_chr_scene9`.`id`=`bio_chr_dev`.`illust_mcs_symptom` LEFT JOIN `bio_chr_scene` as bio_chr_scene10 ON `bio_chr_scene10`.`id`=`bio_chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic1`.`response` ORDER BY 2',
				'mc_approach' => 'SELECT `bio_chr_dev`.`id`, IF(    CHAR_LENGTH(`class_dynamicstorypoints43`.`term`), CONCAT_WS(\'\',   `class_dynamicstorypoints43`.`term`), \'\') FROM `bio_chr_dev` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_dev`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_dev`.`bio_story` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_chr_dev`.`cw_name` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`bio_chr_dev`.`dp1_resolve` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`bio_chr_dev`.`dp2_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`bio_chr_dev`.`dp3_resolve` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints41 ON `class_dynamicstorypoints41`.`id`=`bio_chr_dev`.`mc_resolve` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_chr_dev`.`illust_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints32 ON `class_dramatica_storypoints32`.`id`=`bio_chr_dev`.`dp3_growth` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints42 ON `class_dynamicstorypoints42`.`id`=`bio_chr_dev`.`mc_growth` LEFT JOIN `bio_chr_scene` as bio_chr_scene2 ON `bio_chr_scene2`.`id`=`bio_chr_dev`.`illust_growth` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints33 ON `class_dramatica_storypoints33`.`id`=`bio_chr_dev`.`dp3_approach` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints43 ON `class_dynamicstorypoints43`.`id`=`bio_chr_dev`.`mc_approach` LEFT JOIN `bio_chr_scene` as bio_chr_scene3 ON `bio_chr_scene3`.`id`=`bio_chr_dev`.`illust_approach` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints34 ON `class_dramatica_storypoints34`.`id`=`bio_chr_dev`.`dp3_psstyle` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints44 ON `class_dynamicstorypoints44`.`id`=`bio_chr_dev`.`mc_ps_style` LEFT JOIN `bio_chr_scene` as bio_chr_scene4 ON `bio_chr_scene4`.`id`=`bio_chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_chr_dev`.`noetictension` LEFT JOIN `bio_chr_scene` as bio_chr_scene5 ON `bio_chr_scene5`.`id`=`bio_chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_chr_dev`.`impression` LEFT JOIN `bio_chr_scene` as bio_chr_scene6 ON `bio_chr_scene6`.`id`=`bio_chr_dev`.`illust_im` LEFT JOIN `bio_storystatic` as bio_storystatic1 ON `bio_storystatic1`.`id`=`bio_chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic1`.`problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene7 ON `bio_chr_scene7`.`id`=`bio_chr_dev`.`illust_mcs_problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene8 ON `bio_chr_scene8`.`id`=`bio_chr_dev`.`illust_mcs_solution` LEFT JOIN `bio_chr_scene` as bio_chr_scene9 ON `bio_chr_scene9`.`id`=`bio_chr_dev`.`illust_mcs_symptom` LEFT JOIN `bio_chr_scene` as bio_chr_scene10 ON `bio_chr_scene10`.`id`=`bio_chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic1`.`response` ORDER BY 2',
				'mc_ps_style' => 'SELECT `bio_chr_dev`.`id`, IF(    CHAR_LENGTH(`class_dynamicstorypoints44`.`term`), CONCAT_WS(\'\',   `class_dynamicstorypoints44`.`term`), \'\') FROM `bio_chr_dev` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_dev`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_dev`.`bio_story` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_chr_dev`.`cw_name` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`bio_chr_dev`.`dp1_resolve` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`bio_chr_dev`.`dp2_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`bio_chr_dev`.`dp3_resolve` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints41 ON `class_dynamicstorypoints41`.`id`=`bio_chr_dev`.`mc_resolve` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_chr_dev`.`illust_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints32 ON `class_dramatica_storypoints32`.`id`=`bio_chr_dev`.`dp3_growth` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints42 ON `class_dynamicstorypoints42`.`id`=`bio_chr_dev`.`mc_growth` LEFT JOIN `bio_chr_scene` as bio_chr_scene2 ON `bio_chr_scene2`.`id`=`bio_chr_dev`.`illust_growth` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints33 ON `class_dramatica_storypoints33`.`id`=`bio_chr_dev`.`dp3_approach` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints43 ON `class_dynamicstorypoints43`.`id`=`bio_chr_dev`.`mc_approach` LEFT JOIN `bio_chr_scene` as bio_chr_scene3 ON `bio_chr_scene3`.`id`=`bio_chr_dev`.`illust_approach` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints34 ON `class_dramatica_storypoints34`.`id`=`bio_chr_dev`.`dp3_psstyle` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints44 ON `class_dynamicstorypoints44`.`id`=`bio_chr_dev`.`mc_ps_style` LEFT JOIN `bio_chr_scene` as bio_chr_scene4 ON `bio_chr_scene4`.`id`=`bio_chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_chr_dev`.`noetictension` LEFT JOIN `bio_chr_scene` as bio_chr_scene5 ON `bio_chr_scene5`.`id`=`bio_chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_chr_dev`.`impression` LEFT JOIN `bio_chr_scene` as bio_chr_scene6 ON `bio_chr_scene6`.`id`=`bio_chr_dev`.`illust_im` LEFT JOIN `bio_storystatic` as bio_storystatic1 ON `bio_storystatic1`.`id`=`bio_chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic1`.`problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene7 ON `bio_chr_scene7`.`id`=`bio_chr_dev`.`illust_mcs_problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene8 ON `bio_chr_scene8`.`id`=`bio_chr_dev`.`illust_mcs_solution` LEFT JOIN `bio_chr_scene` as bio_chr_scene9 ON `bio_chr_scene9`.`id`=`bio_chr_dev`.`illust_mcs_symptom` LEFT JOIN `bio_chr_scene` as bio_chr_scene10 ON `bio_chr_scene10`.`id`=`bio_chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic1`.`response` ORDER BY 2',
				'story_chr_ic' => 'SELECT `bio_chr`.`id`, IF(CHAR_LENGTH(`bio_chr`.`id`) || CHAR_LENGTH(`bio_chr`.`character_name`), CONCAT_WS(\'\', `bio_chr`.`id`, \' agent:\', `bio_chr`.`character_name`), \'\') FROM `bio_chr` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_chr`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr`.`bio_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr`.`bio_archetype` ORDER BY 2',
				'ic_resolve' => 'SELECT `bio_chr_dev`.`id`, IF(    CHAR_LENGTH(`class_dynamicstorypoints41`.`term`), CONCAT_WS(\'\',   `class_dynamicstorypoints41`.`term`), \'\') FROM `bio_chr_dev` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_chr_dev`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr_dev`.`bio_story` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_chr_dev`.`cw_name` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`bio_chr_dev`.`dp1_resolve` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`bio_chr_dev`.`dp2_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`bio_chr_dev`.`dp3_resolve` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints41 ON `class_dynamicstorypoints41`.`id`=`bio_chr_dev`.`mc_resolve` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_chr_dev`.`illust_resolve` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints32 ON `class_dramatica_storypoints32`.`id`=`bio_chr_dev`.`dp3_growth` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints42 ON `class_dynamicstorypoints42`.`id`=`bio_chr_dev`.`mc_growth` LEFT JOIN `bio_chr_scene` as bio_chr_scene2 ON `bio_chr_scene2`.`id`=`bio_chr_dev`.`illust_growth` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints33 ON `class_dramatica_storypoints33`.`id`=`bio_chr_dev`.`dp3_approach` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints43 ON `class_dynamicstorypoints43`.`id`=`bio_chr_dev`.`mc_approach` LEFT JOIN `bio_chr_scene` as bio_chr_scene3 ON `bio_chr_scene3`.`id`=`bio_chr_dev`.`illust_approach` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints34 ON `class_dramatica_storypoints34`.`id`=`bio_chr_dev`.`dp3_psstyle` LEFT JOIN `class_dynamicstorypoints4` as class_dynamicstorypoints44 ON `class_dynamicstorypoints44`.`id`=`bio_chr_dev`.`mc_ps_style` LEFT JOIN `bio_chr_scene` as bio_chr_scene4 ON `bio_chr_scene4`.`id`=`bio_chr_dev`.`illust_ps_style` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`bio_chr_dev`.`noetictension` LEFT JOIN `bio_chr_scene` as bio_chr_scene5 ON `bio_chr_scene5`.`id`=`bio_chr_dev`.`illust_nt` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`bio_chr_dev`.`impression` LEFT JOIN `bio_chr_scene` as bio_chr_scene6 ON `bio_chr_scene6`.`id`=`bio_chr_dev`.`illust_im` LEFT JOIN `bio_storystatic` as bio_storystatic1 ON `bio_storystatic1`.`id`=`bio_chr_dev`.`mcs_problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic1`.`problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene7 ON `bio_chr_scene7`.`id`=`bio_chr_dev`.`illust_mcs_problem` LEFT JOIN `bio_chr_scene` as bio_chr_scene8 ON `bio_chr_scene8`.`id`=`bio_chr_dev`.`illust_mcs_solution` LEFT JOIN `bio_chr_scene` as bio_chr_scene9 ON `bio_chr_scene9`.`id`=`bio_chr_dev`.`illust_mcs_symptom` LEFT JOIN `bio_chr_scene` as bio_chr_scene10 ON `bio_chr_scene10`.`id`=`bio_chr_dev`.`illust_mcs_response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic1`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic1`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic1`.`response` ORDER BY 2',
				'dp_cat1' => 'SELECT `class_dramatica_storypoints1`.`id`, `class_dramatica_storypoints1`.`term` FROM `class_dramatica_storypoints1` ORDER BY 2',
				'dp_cat2' => 'SELECT `class_dramatica_storypoints2`.`id`, `class_dramatica_storypoints2`.`term` FROM `class_dramatica_storypoints2` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints2`.`cat1` ORDER BY 2',
				'dp_cat3_driver' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'os_driver' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'dp_cat3_limit' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'os_limit' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'dp_cat3_outcome' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'os_outcome' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'dp_cat3_judgement' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
				'os_judgement' => 'SELECT `class_dynamicstorypoints4`.`id`, `class_dynamicstorypoints4`.`term` FROM `class_dynamicstorypoints4` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dynamicstorypoints4`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dynamicstorypoints4`.`cat2` LEFT JOIN `class_dramatica_storypoints3` as class_dramatica_storypoints31 ON `class_dramatica_storypoints31`.`id`=`class_dynamicstorypoints4`.`cat3` ORDER BY 2',
				'os_goal_domain' => 'SELECT `bio_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS(\'\',   `class_dramatica_domain1`.`domain`), \'\') FROM `bio_storystatic` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storystatic`.`throughline` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr1`.`bio_archetype` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`bio_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes5`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`bio_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`class_dramatica_themes6`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`bio_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`bio_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`bio_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`bio_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`bio_storystatic`.`signpost4` ORDER BY 2',
				'os_goal_concern' => 'SELECT `bio_storystatic`.`id`, IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS(\'\',   `class_dramatica_concern1`.`concern`), \'\') FROM `bio_storystatic` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storystatic`.`throughline` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr1`.`bio_archetype` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`bio_storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`bio_storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`bio_storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`bio_storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes5`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`bio_storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`class_dramatica_themes6`.`concern` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`bio_storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`bio_storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`bio_storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`bio_storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`bio_storystatic`.`signpost4` ORDER BY 2',
				'os_consequence_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_consequence_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'os_cost_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_cost_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'os_dividend_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_dividend_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'os_requirements_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_requirements_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'os_prerequesites_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_prerequesites_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'os_preconditions_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_preconditions_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'os_forewarnings_domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'os_forewarnings_concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
			],
			'hist_storyweaving_scene' => [
				'story' => 'SELECT `hist_story`.`id`, IF(CHAR_LENGTH(`hist_story`.`id`) || CHAR_LENGTH(`hist_story`.`story_title`), CONCAT_WS(\'\', `hist_story`.`id`, \'   \', `hist_story`.`story_title`), \'\') FROM `hist_story` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_story`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_story`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_community` as hist_community1 ON `hist_community1`.`id`=`hist_story`.`community_id` LEFT JOIN `class_bibliography_genre` as class_bibliography_genre1 ON `class_bibliography_genre1`.`id`=`hist_story`.`genre` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`hist_story`.`collaboration_status` LEFT JOIN `class_language` as class_language1 ON `class_language1`.`id`=`hist_story`.`language` ORDER BY 2',
				'step' => 'SELECT `class_dramatica_steps`.`id`, `class_dramatica_steps`.`step` FROM `class_dramatica_steps` LEFT JOIN `class_story_acts` as class_story_acts1 ON `class_story_acts1`.`id`=`class_dramatica_steps`.`act` ORDER BY 2',
				'throughline' => 'SELECT `class_dramatica_throughline`.`id`, `class_dramatica_throughline`.`throughline` FROM `class_dramatica_throughline` ORDER BY 2',
				'domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'issue' => 'SELECT `class_dramatica_issue`.`id`, `class_dramatica_issue`.`issue` FROM `class_dramatica_issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_issue`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_issue`.`concern` ORDER BY 2',
				'theme' => 'SELECT `class_dramatica_themes`.`id`, `class_dramatica_themes`.`theme` FROM `class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ORDER BY 2',
			],
			'hist_encounter' => [
				'bio_chrA' => 'SELECT `bio_chr`.`id`, IF(CHAR_LENGTH(`bio_chr`.`id`) || CHAR_LENGTH(`bio_chr`.`character_name`), CONCAT_WS(\'\', `bio_chr`.`id`, \'   \', `bio_chr`.`character_name`), \'\') FROM `bio_chr` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_chr`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr`.`bio_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr`.`bio_archetype` ORDER BY 2',
				'bio_storyA' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`story_title`), CONCAT_WS(\'\', `bio_story`.`id`, \'   \', `bio_story`.`story_title`), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'bio_storyline' => 'SELECT `bio_storyline`.`id`, IF(CHAR_LENGTH(`bio_storyline`.`id`) || CHAR_LENGTH(`bio_storyline`.`storyline_title`), CONCAT_WS(\'\', `bio_storyline`.`id`, \'    \', `bio_storyline`.`storyline_title`), \'\') FROM `bio_storyline` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storyline`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_storyline`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_storyline`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_storyline`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_storyline`.`token` LEFT JOIN `class_story_acts` as class_story_acts1 ON `class_story_acts1`.`id`=`bio_storyline`.`story_act` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storyline`.`character` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr1`.`agent_id` LEFT JOIN `bio_storyweaving_scene` as bio_storyweaving_scene1 ON `bio_storyweaving_scene1`.`id`=`bio_storyline`.`storyweaving_scene_no` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`bio_storyweaving_scene1`.`step` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_storyline`.`character_scene` LEFT JOIN `bio_encounter_scene` as bio_encounter_scene1 ON `bio_encounter_scene1`.`id`=`bio_storyline`.`character_event` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr1`.`bio_character` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storyweaving_scene1`.`theme` ORDER BY 2',
				'bio_storytext' => 'SELECT `bio_storyline`.`id`, IF(CHAR_LENGTH(`bio_storyline`.`storyline`), CONCAT_WS(\'\', `bio_storyline`.`storyline`, \'   \'), \'\') FROM `bio_storyline` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storyline`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_storyline`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_storyline`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_storyline`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_storyline`.`token` LEFT JOIN `class_story_acts` as class_story_acts1 ON `class_story_acts1`.`id`=`bio_storyline`.`story_act` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storyline`.`character` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr1`.`agent_id` LEFT JOIN `bio_storyweaving_scene` as bio_storyweaving_scene1 ON `bio_storyweaving_scene1`.`id`=`bio_storyline`.`storyweaving_scene_no` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`bio_storyweaving_scene1`.`step` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_storyline`.`character_scene` LEFT JOIN `bio_encounter_scene` as bio_encounter_scene1 ON `bio_encounter_scene1`.`id`=`bio_storyline`.`character_event` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr1`.`bio_character` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storyweaving_scene1`.`theme` ORDER BY 2',
				'sceneA' => 'SELECT `hist_chr_scene`.`id`, IF(CHAR_LENGTH(`hist_chr_scene`.`id`), CONCAT_WS(\'\', `hist_chr_scene`.`id`, \'   \'), \'\') FROM `hist_chr_scene` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr_scene`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr_scene`.`hist_story` LEFT JOIN `hist_chr` as hist_chr1 ON `hist_chr1`.`id`=`hist_chr_scene`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr1`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr1`.`story_archetype` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr_scene`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr_scene`.`bio_story` LEFT JOIN `bio_storyline` as bio_storyline1 ON `bio_storyline1`.`id`=`hist_chr_scene`.`bio_storyline_no` LEFT JOIN `class_character_element` as class_character_element1 ON `class_character_element1`.`id`=`hist_chr_scene`.`chr_element` ORDER BY 2',
				'bio_chrB' => 'SELECT `bio_chr`.`id`, IF(CHAR_LENGTH(`bio_chr`.`id`) || CHAR_LENGTH(`bio_chr`.`character_name`), CONCAT_WS(\'\', `bio_chr`.`id`, \'   \', `bio_chr`.`character_name`), \'\') FROM `bio_chr` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_chr`.`author_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr`.`bio_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`bio_chr`.`bio_archetype` ORDER BY 2',
				'bio_storyB' => 'SELECT `bio_story`.`id`, IF(CHAR_LENGTH(`bio_story`.`id`) || CHAR_LENGTH(`bio_story`.`story_title`), CONCAT_WS(\'\', `bio_story`.`id`, \' -  \', `bio_story`.`story_title`), \'\') FROM `bio_story` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_story`.`bio_team` LEFT JOIN `bio_author` as bio_author1 ON `bio_author1`.`id`=`bio_story`.`author_id` LEFT JOIN `class_bibliography_type` as class_bibliography_type1 ON `class_bibliography_type1`.`id`=`bio_story`.`type` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_story`.`agent_id` LEFT JOIN `class_story_collab_type` as class_story_collab_type1 ON `class_story_collab_type1`.`id`=`bio_story`.`collaboration_status` ORDER BY 2',
				'bio_storylineB' => 'SELECT `bio_storyline`.`id`, IF(CHAR_LENGTH(`bio_storyline`.`storyline_no`) || CHAR_LENGTH(`bio_storyline`.`storyline_title`), CONCAT_WS(\'\', `bio_storyline`.`storyline_no`, \'   \', `bio_storyline`.`storyline_title`), \'\') FROM `bio_storyline` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storyline`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_storyline`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_storyline`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_storyline`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_storyline`.`token` LEFT JOIN `class_story_acts` as class_story_acts1 ON `class_story_acts1`.`id`=`bio_storyline`.`story_act` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storyline`.`character` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr1`.`agent_id` LEFT JOIN `bio_storyweaving_scene` as bio_storyweaving_scene1 ON `bio_storyweaving_scene1`.`id`=`bio_storyline`.`storyweaving_scene_no` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`bio_storyweaving_scene1`.`step` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_storyline`.`character_scene` LEFT JOIN `bio_encounter_scene` as bio_encounter_scene1 ON `bio_encounter_scene1`.`id`=`bio_storyline`.`character_event` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr1`.`bio_character` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storyweaving_scene1`.`theme` ORDER BY 2',
				'bio_storytextB' => 'SELECT `bio_storyline`.`id`, IF(CHAR_LENGTH(`bio_storyline`.`storyline`), CONCAT_WS(\'\', `bio_storyline`.`storyline`, \'   \'), \'\') FROM `bio_storyline` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storyline`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_storyline`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_storyline`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_storyline`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_storyline`.`token` LEFT JOIN `class_story_acts` as class_story_acts1 ON `class_story_acts1`.`id`=`bio_storyline`.`story_act` LEFT JOIN `bio_chr` as bio_chr1 ON `bio_chr1`.`id`=`bio_storyline`.`character` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`bio_chr1`.`agent_id` LEFT JOIN `bio_storyweaving_scene` as bio_storyweaving_scene1 ON `bio_storyweaving_scene1`.`id`=`bio_storyline`.`storyweaving_scene_no` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`bio_storyweaving_scene1`.`step` LEFT JOIN `bio_chr_scene` as bio_chr_scene1 ON `bio_chr_scene1`.`id`=`bio_storyline`.`character_scene` LEFT JOIN `bio_encounter_scene` as bio_encounter_scene1 ON `bio_encounter_scene1`.`id`=`bio_storyline`.`character_event` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chr1`.`bio_character` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storyweaving_scene1`.`theme` ORDER BY 2',
			],
			'hist_encounter_scene' => [
			],
			'hist_community' => [
			],
			'class_agent_selection' => [
			],
			'class_agent_type1' => [
			],
			'class_agent_type2' => [
			],
			'class_character_element' => [
			],
			'class_gender' => [
			],
			'class_authority_agent' => [
			],
			'class_evaluation' => [
			],
			'class_bibliography_type' => [
			],
			'class_bibliography_genre' => [
			],
			'class_authority_library' => [
			],
			'class_rights' => [
			],
			'class_language' => [
			],
			'class_story_collab_type' => [
			],
			'class_story_acts' => [
			],
			'class_story_path' => [
			],
			'class_dramatica_steps' => [
				'act' => 'SELECT `class_story_acts`.`id`, `class_story_acts`.`act` FROM `class_story_acts` ORDER BY 2',
			],
			'class_dramatica_throughline' => [
			],
			'class_dramatica_signpost' => [
			],
			'class_dramatica_domain' => [
			],
			'class_dramatica_concern' => [
				'domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
			],
			'class_dramatica_issue' => [
				'domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
			],
			'class_dramatica_themes' => [
				'domain' => 'SELECT `class_dramatica_domain`.`id`, `class_dramatica_domain`.`domain` FROM `class_dramatica_domain` ORDER BY 2',
				'concern' => 'SELECT `class_dramatica_concern`.`id`, `class_dramatica_concern`.`concern` FROM `class_dramatica_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_concern`.`domain` ORDER BY 2',
				'issue' => 'SELECT `class_dramatica_issue`.`id`, `class_dramatica_issue`.`issue` FROM `class_dramatica_issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_issue`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_issue`.`concern` ORDER BY 2',
			],
			'class_dramatica_archetype' => [
			],
			'class_dramatica_character' => [
			],
			'class_dramatica_storypoints1' => [
			],
			'class_dramatica_storypoints2' => [
				'cat1' => 'SELECT `class_dramatica_storypoints1`.`id`, `class_dramatica_storypoints1`.`term` FROM `class_dramatica_storypoints1` ORDER BY 2',
			],
			'class_dramatica_storypoints3' => [
				'cat1' => 'SELECT `class_dramatica_storypoints1`.`id`, `class_dramatica_storypoints1`.`term` FROM `class_dramatica_storypoints1` ORDER BY 2',
				'cat2' => 'SELECT `class_dramatica_storypoints2`.`id`, `class_dramatica_storypoints2`.`term` FROM `class_dramatica_storypoints2` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints2`.`cat1` ORDER BY 2',
			],
			'class_dynamicstorypoints4' => [
				'cat1' => 'SELECT `class_dramatica_storypoints1`.`id`, `class_dramatica_storypoints1`.`term` FROM `class_dramatica_storypoints1` ORDER BY 2',
				'cat2' => 'SELECT `class_dramatica_storypoints2`.`id`, `class_dramatica_storypoints2`.`term` FROM `class_dramatica_storypoints2` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints2`.`cat1` ORDER BY 2',
				'cat3' => 'SELECT `class_dramatica_storypoints3`.`id`, `class_dramatica_storypoints3`.`term` FROM `class_dramatica_storypoints3` LEFT JOIN `class_dramatica_storypoints1` as class_dramatica_storypoints11 ON `class_dramatica_storypoints11`.`id`=`class_dramatica_storypoints3`.`cat1` LEFT JOIN `class_dramatica_storypoints2` as class_dramatica_storypoints21 ON `class_dramatica_storypoints21`.`id`=`class_dramatica_storypoints3`.`cat2` ORDER BY 2',
			],
			'class_im' => [
			],
			'class_pc' => [
			],
			'class_nt' => [
			],
			'dictionary' => [
			],
			'class_dictionary1' => [
			],
			'class_dictionary2' => [
				'class1' => 'SELECT `class_dictionary1`.`id`, `class_dictionary1`.`category` FROM `class_dictionary1` ORDER BY 2',
			],
			'class_dictionary3' => [
				'class1' => 'SELECT `class_dictionary1`.`id`, `class_dictionary1`.`category` FROM `class_dictionary1` ORDER BY 2',
				'class2' => 'SELECT `class_dictionary2`.`id`, `class_dictionary2`.`category` FROM `class_dictionary2` LEFT JOIN `class_dictionary1` as class_dictionary11 ON `class_dictionary11`.`id`=`class_dictionary2`.`class1` ORDER BY 2',
			],
			'class_dictionary5' => [
				'class1' => 'SELECT `class_dictionary1`.`id`, `class_dictionary1`.`category` FROM `class_dictionary1` ORDER BY 2',
				'class2' => 'SELECT `class_dictionary2`.`id`, `class_dictionary2`.`category` FROM `class_dictionary2` LEFT JOIN `class_dictionary1` as class_dictionary11 ON `class_dictionary11`.`id`=`class_dictionary2`.`class1` ORDER BY 2',
				'class3' => 'SELECT `class_dictionary3`.`id`, `class_dictionary3`.`category` FROM `class_dictionary3` LEFT JOIN `class_dictionary1` as class_dictionary11 ON `class_dictionary11`.`id`=`class_dictionary3`.`class1` LEFT JOIN `class_dictionary2` as class_dictionary21 ON `class_dictionary21`.`id`=`class_dictionary3`.`class2` ORDER BY 2',
				'class4' => 'SELECT `class_dictionary4`.`id`, `class_dictionary4`.`category` FROM `class_dictionary4` LEFT JOIN `class_dictionary1` as class_dictionary11 ON `class_dictionary11`.`id`=`class_dictionary4`.`class1` LEFT JOIN `class_dictionary2` as class_dictionary21 ON `class_dictionary21`.`id`=`class_dictionary4`.`class2` LEFT JOIN `class_dictionary3` as class_dictionary31 ON `class_dictionary31`.`id`=`class_dictionary4`.`class3` ORDER BY 2',
			],
			'class_dictionary4' => [
				'class1' => 'SELECT `class_dictionary1`.`id`, `class_dictionary1`.`category` FROM `class_dictionary1` ORDER BY 2',
				'class2' => 'SELECT `class_dictionary2`.`id`, `class_dictionary2`.`category` FROM `class_dictionary2` LEFT JOIN `class_dictionary1` as class_dictionary11 ON `class_dictionary11`.`id`=`class_dictionary2`.`class1` ORDER BY 2',
				'class3' => 'SELECT `class_dictionary3`.`id`, `class_dictionary3`.`category` FROM `class_dictionary3` LEFT JOIN `class_dictionary1` as class_dictionary11 ON `class_dictionary11`.`id`=`class_dictionary3`.`class1` LEFT JOIN `class_dictionary2` as class_dictionary21 ON `class_dictionary21`.`id`=`class_dictionary3`.`class2` ORDER BY 2',
			],
		];

		return $lookupQuery[$tn][$lookupField];
	}

	#########################################################
	function pkGivenLookupText($val, $tn, $lookupField, $falseIfNotFound = false) {
		static $cache = [];
		if(isset($cache[$tn][$lookupField][$val])) return $cache[$tn][$lookupField][$val];

		if(!$lookupQuery = lookupQuery($tn, $lookupField)) {
			$cache[$tn][$lookupField][$val] = false;
			return false;
		}

		$m = [];

		// quit if query can't be parsed
		if(!preg_match('/select\s+(.*?),\s+(.*?)\s+from\s+(.*)/i', $lookupQuery, $m)) {
			$cache[$tn][$lookupField][$val] = false;
			return false;
		}

		list($all, $pkField, $lookupField, $from) = $m;
		$from = preg_replace('/\s+order\s+by.*$/i', '', $from);
		if(!$lookupField || !$from) {
			$cache[$tn][$lookupField][$val] = false;
			return false;
		}

		// append WHERE if not already there
		if(!preg_match('/\s+where\s+/i', $from)) $from .= ' WHERE 1=1 AND';

		$safeVal = makeSafe($val);
		$id = sqlValue("SELECT {$pkField} FROM {$from} {$lookupField}='{$safeVal}'");
		if($id !== false) {
			$cache[$tn][$lookupField][$val] = $id;
			return $id;
		}

		// no corresponding PK value found
		if($falseIfNotFound) {
			$cache[$tn][$lookupField][$val] = false;
			return false;
		} else {
			$cache[$tn][$lookupField][$val] = $val;
			return $val;
		}
	}
	#########################################################
	function userCanImport() {
		$mi = getMemberInfo();
		$safeUser = makeSafe($mi['username']);
		$groupID = intval($mi['groupID']);

		// admins can always import
		if($mi['group'] == 'Admins') return true;

		// anonymous users can never import
		if($mi['group'] == config('adminConfig')['anonymousGroup']) return false;

		// specific user can import?
		if(sqlValue("SELECT COUNT(1) FROM `membership_users` WHERE `memberID`='{$safeUser}' AND `allowCSVImport`='1'")) return true;

		// user's group can import?
		if(sqlValue("SELECT COUNT(1) FROM `membership_groups` WHERE `groupID`='{$groupID}' AND `allowCSVImport`='1'")) return true;

		return false;
	}
	#########################################################
	function parseTemplate($template) {
		if(trim($template) == '') return $template;

		global $Translation;
		foreach($Translation as $symbol => $trans)
			$template = str_replace("<%%TRANSLATION($symbol)%%>", $trans, $template);

		// Correct <MaxSize> and <FileTypes> to prevent invalid HTML
		$template = str_replace(['<MaxSize>', '<FileTypes>'], ['{MaxSize}', '{FileTypes}'], $template);
		$template = str_replace('<%%BASE_UPLOAD_PATH%%>', getUploadDir(''), $template);

		return $template;
	}
	#########################################################
	function getUploadDir($dir) {
		if($dir == '') $dir = config('adminConfig')['baseUploadPath'];

		return rtrim($dir, '\\/') . '/';
	}
