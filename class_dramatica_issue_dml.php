<?php

// Data functions (insert, update, delete, form) for table class_dramatica_issue

// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

function class_dramatica_issue_insert(&$error_message = '') {
	global $Translation;

	// mm: can member insert record?
	$arrPerm = getTablePermissions('class_dramatica_issue');
	if(!$arrPerm['insert']) return false;

	$data = [
		'domain' => Request::val('domain', ''),
		'concern' => Request::val('concern', ''),
		'issue' => Request::val('issue', ''),
		'description' => Request::val('description', ''),
	];


	// hook: class_dramatica_issue_before_insert
	if(function_exists('class_dramatica_issue_before_insert')) {
		$args = [];
		if(!class_dramatica_issue_before_insert($data, getMemberInfo(), $args)) {
			if(isset($args['error_message'])) $error_message = $args['error_message'];
			return false;
		}
	}

	$error = '';
	// set empty fields to NULL
	$data = array_map(function($v) { return ($v === '' ? NULL : $v); }, $data);
	insert('class_dramatica_issue', backtick_keys_once($data), $error);
	if($error)
		die("{$error}<br><a href=\"#\" onclick=\"history.go(-1);\">{$Translation['< back']}</a>");

	$recID = db_insert_id(db_link());

	update_calc_fields('class_dramatica_issue', $recID, calculated_fields()['class_dramatica_issue']);

	// hook: class_dramatica_issue_after_insert
	if(function_exists('class_dramatica_issue_after_insert')) {
		$res = sql("SELECT * FROM `class_dramatica_issue` WHERE `id`='" . makeSafe($recID, false) . "' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)) {
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args=[];
		if(!class_dramatica_issue_after_insert($data, getMemberInfo(), $args)) { return $recID; }
	}

	// mm: save ownership data
	set_record_owner('class_dramatica_issue', $recID, getLoggedMemberID());

	// if this record is a copy of another record, copy children if applicable
	if(!empty($_REQUEST['SelectedID'])) class_dramatica_issue_copy_children($recID, $_REQUEST['SelectedID']);

	return $recID;
}

function class_dramatica_issue_copy_children($destination_id, $source_id) {
	global $Translation;
	$requests = []; // array of curl handlers for launching insert requests
	$eo = ['silentErrors' => true];
	$safe_sid = makeSafe($source_id);

	// launch requests, asynchronously
	curl_batch($requests);
}

function class_dramatica_issue_delete($selected_id, $AllowDeleteOfParents = false, $skipChecks = false) {
	// insure referential integrity ...
	global $Translation;
	$selected_id = makeSafe($selected_id);

	// mm: can member delete record?
	if(!check_record_permission('class_dramatica_issue', $selected_id, 'delete')) {
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: class_dramatica_issue_before_delete
	if(function_exists('class_dramatica_issue_before_delete')) {
		$args = [];
		if(!class_dramatica_issue_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'] . (
				!empty($args['error_message']) ?
					'<div class="text-bold">' . strip_tags($args['error_message']) . '</div>'
					: '' 
			);
	}

	// child table: bio_storystatic
	$res = sql("SELECT `id` FROM `class_dramatica_issue` WHERE `id`='{$selected_id}'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("SELECT COUNT(1) FROM `bio_storystatic` WHERE `issue`='" . makeSafe($id[0]) . "'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'bio_storystatic', $RetMsg);
		return $RetMsg;
	} elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation['confirm delete'];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'bio_storystatic', $RetMsg);
		$RetMsg = str_replace('<Delete>', '<input type="button" class="button" value="' . $Translation['yes'] . '" onClick="window.location = \'class_dramatica_issue_view.php?SelectedID=' . urlencode($selected_id) . '&delete_x=1&confirmed=1\';">', $RetMsg);
		$RetMsg = str_replace('<Cancel>', '<input type="button" class="button" value="' . $Translation[ 'no'] . '" onClick="window.location = \'class_dramatica_issue_view.php?SelectedID=' . urlencode($selected_id) . '\';">', $RetMsg);
		return $RetMsg;
	}

	// child table: bio_storyweaving_scene
	$res = sql("SELECT `id` FROM `class_dramatica_issue` WHERE `id`='{$selected_id}'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("SELECT COUNT(1) FROM `bio_storyweaving_scene` WHERE `issue`='" . makeSafe($id[0]) . "'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'bio_storyweaving_scene', $RetMsg);
		return $RetMsg;
	} elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation['confirm delete'];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'bio_storyweaving_scene', $RetMsg);
		$RetMsg = str_replace('<Delete>', '<input type="button" class="button" value="' . $Translation['yes'] . '" onClick="window.location = \'class_dramatica_issue_view.php?SelectedID=' . urlencode($selected_id) . '&delete_x=1&confirmed=1\';">', $RetMsg);
		$RetMsg = str_replace('<Cancel>', '<input type="button" class="button" value="' . $Translation[ 'no'] . '" onClick="window.location = \'class_dramatica_issue_view.php?SelectedID=' . urlencode($selected_id) . '\';">', $RetMsg);
		return $RetMsg;
	}

	// child table: hist_storystatic
	$res = sql("SELECT `id` FROM `class_dramatica_issue` WHERE `id`='{$selected_id}'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("SELECT COUNT(1) FROM `hist_storystatic` WHERE `issue`='" . makeSafe($id[0]) . "'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'hist_storystatic', $RetMsg);
		return $RetMsg;
	} elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation['confirm delete'];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'hist_storystatic', $RetMsg);
		$RetMsg = str_replace('<Delete>', '<input type="button" class="button" value="' . $Translation['yes'] . '" onClick="window.location = \'class_dramatica_issue_view.php?SelectedID=' . urlencode($selected_id) . '&delete_x=1&confirmed=1\';">', $RetMsg);
		$RetMsg = str_replace('<Cancel>', '<input type="button" class="button" value="' . $Translation[ 'no'] . '" onClick="window.location = \'class_dramatica_issue_view.php?SelectedID=' . urlencode($selected_id) . '\';">', $RetMsg);
		return $RetMsg;
	}

	// child table: hist_storyweaving_scene
	$res = sql("SELECT `id` FROM `class_dramatica_issue` WHERE `id`='{$selected_id}'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("SELECT COUNT(1) FROM `hist_storyweaving_scene` WHERE `issue`='" . makeSafe($id[0]) . "'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'hist_storyweaving_scene', $RetMsg);
		return $RetMsg;
	} elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation['confirm delete'];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'hist_storyweaving_scene', $RetMsg);
		$RetMsg = str_replace('<Delete>', '<input type="button" class="button" value="' . $Translation['yes'] . '" onClick="window.location = \'class_dramatica_issue_view.php?SelectedID=' . urlencode($selected_id) . '&delete_x=1&confirmed=1\';">', $RetMsg);
		$RetMsg = str_replace('<Cancel>', '<input type="button" class="button" value="' . $Translation[ 'no'] . '" onClick="window.location = \'class_dramatica_issue_view.php?SelectedID=' . urlencode($selected_id) . '\';">', $RetMsg);
		return $RetMsg;
	}

	// child table: class_dramatica_themes
	$res = sql("SELECT `id` FROM `class_dramatica_issue` WHERE `id`='{$selected_id}'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("SELECT COUNT(1) FROM `class_dramatica_themes` WHERE `issue`='" . makeSafe($id[0]) . "'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'class_dramatica_themes', $RetMsg);
		return $RetMsg;
	} elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation['confirm delete'];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'class_dramatica_themes', $RetMsg);
		$RetMsg = str_replace('<Delete>', '<input type="button" class="button" value="' . $Translation['yes'] . '" onClick="window.location = \'class_dramatica_issue_view.php?SelectedID=' . urlencode($selected_id) . '&delete_x=1&confirmed=1\';">', $RetMsg);
		$RetMsg = str_replace('<Cancel>', '<input type="button" class="button" value="' . $Translation[ 'no'] . '" onClick="window.location = \'class_dramatica_issue_view.php?SelectedID=' . urlencode($selected_id) . '\';">', $RetMsg);
		return $RetMsg;
	}

	sql("DELETE FROM `class_dramatica_issue` WHERE `id`='{$selected_id}'", $eo);

	// hook: class_dramatica_issue_after_delete
	if(function_exists('class_dramatica_issue_after_delete')) {
		$args = [];
		class_dramatica_issue_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("DELETE FROM `membership_userrecords` WHERE `tableName`='class_dramatica_issue' AND `pkValue`='{$selected_id}'", $eo);
}

function class_dramatica_issue_update(&$selected_id, &$error_message = '') {
	global $Translation;

	// mm: can member edit record?
	if(!check_record_permission('class_dramatica_issue', $selected_id, 'edit')) return false;

	$data = [
		'domain' => Request::val('domain', ''),
		'concern' => Request::val('concern', ''),
		'issue' => Request::val('issue', ''),
		'description' => Request::val('description', ''),
	];

	// get existing values
	$old_data = getRecord('class_dramatica_issue', $selected_id);
	if(is_array($old_data)) {
		$old_data = array_map('makeSafe', $old_data);
		$old_data['selectedID'] = makeSafe($selected_id);
	}

	$data['selectedID'] = makeSafe($selected_id);

	// hook: class_dramatica_issue_before_update
	if(function_exists('class_dramatica_issue_before_update')) {
		$args = ['old_data' => $old_data];
		if(!class_dramatica_issue_before_update($data, getMemberInfo(), $args)) {
			if(isset($args['error_message'])) $error_message = $args['error_message'];
			return false;
		}
	}

	$set = $data; unset($set['selectedID']);
	foreach ($set as $field => $value) {
		$set[$field] = ($value !== '' && $value !== NULL) ? $value : NULL;
	}

	if(!update(
		'class_dramatica_issue', 
		backtick_keys_once($set), 
		['`id`' => $selected_id], 
		$error_message
	)) {
		echo $error_message;
		echo '<a href="class_dramatica_issue_view.php?SelectedID=' . urlencode($selected_id) . "\">{$Translation['< back']}</a>";
		exit;
	}


	$eo = ['silentErrors' => true];

	update_calc_fields('class_dramatica_issue', $data['selectedID'], calculated_fields()['class_dramatica_issue']);

	// hook: class_dramatica_issue_after_update
	if(function_exists('class_dramatica_issue_after_update')) {
		$res = sql("SELECT * FROM `class_dramatica_issue` WHERE `id`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)) $data = array_map('makeSafe', $row);

		$data['selectedID'] = $data['id'];
		$args = ['old_data' => $old_data];
		if(!class_dramatica_issue_after_update($data, getMemberInfo(), $args)) return;
	}

	// mm: update ownership data
	sql("UPDATE `membership_userrecords` SET `dateUpdated`='" . time() . "' WHERE `tableName`='class_dramatica_issue' AND `pkValue`='" . makeSafe($selected_id) . "'", $eo);
}

function class_dramatica_issue_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $ShowCancel = 0, $TemplateDV = '', $TemplateDVP = '') {
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;

	// mm: get table permissions
	$arrPerm = getTablePermissions('class_dramatica_issue');
	if(!$arrPerm['insert'] && $selected_id=='') { return ''; }
	$AllowInsert = ($arrPerm['insert'] ? true : false);
	// print preview?
	$dvprint = false;
	if($selected_id && $_REQUEST['dvprint_x'] != '') {
		$dvprint = true;
	}

	$filterer_domain = thisOr($_REQUEST['filterer_domain'], '');
	$filterer_concern = thisOr($_REQUEST['filterer_concern'], '');

	// populate filterers, starting from children to grand-parents
	if($filterer_concern && !$filterer_domain) $filterer_domain = sqlValue("select domain from class_dramatica_concern where id='" . makeSafe($filterer_concern) . "'");

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');
	// combobox: domain
	$combo_domain = new DataCombo;
	// combobox: concern, filterable by: domain
	$combo_concern = new DataCombo;

	if($selected_id) {
		// mm: check member permissions
		if(!$arrPerm['view']) return '';

		// mm: who is the owner?
		$ownerGroupID = sqlValue("SELECT `groupID` FROM `membership_userrecords` WHERE `tableName`='class_dramatica_issue' AND `pkValue`='" . makeSafe($selected_id) . "'");
		$ownerMemberID = sqlValue("SELECT LCASE(`memberID`) FROM `membership_userrecords` WHERE `tableName`='class_dramatica_issue' AND `pkValue`='" . makeSafe($selected_id) . "'");

		if($arrPerm['view'] == 1 && getLoggedMemberID() != $ownerMemberID) return '';
		if($arrPerm['view'] == 2 && getLoggedGroupID() != $ownerGroupID) return '';

		// can edit?
		$AllowUpdate = 0;
		if(($arrPerm['edit'] == 1 && $ownerMemberID == getLoggedMemberID()) || ($arrPerm['edit'] == 2 && $ownerGroupID == getLoggedGroupID()) || $arrPerm['edit'] == 3) {
			$AllowUpdate = 1;
		}

		$res = sql("SELECT * FROM `class_dramatica_issue` WHERE `id`='" . makeSafe($selected_id) . "'", $eo);
		if(!($row = db_fetch_array($res))) {
			return error_message($Translation['No records found'], 'class_dramatica_issue_view.php', false);
		}
		$combo_domain->SelectedData = $row['domain'];
		$combo_concern->SelectedData = $row['concern'];
		$urow = $row; /* unsanitized data */
		$hc = new CI_Input(datalist_db_encoding);
		$row = $hc->xss_clean($row); /* sanitize data */
	} else {
		$combo_domain->SelectedData = $filterer_domain;
		$combo_concern->SelectedData = $filterer_concern;
	}
	$combo_domain->HTML = '<span id="domain-container' . $rnd1 . '"></span><input type="hidden" name="domain" id="domain' . $rnd1 . '" value="' . html_attr($combo_domain->SelectedData) . '">';
	$combo_domain->MatchText = '<span id="domain-container-readonly' . $rnd1 . '"></span><input type="hidden" name="domain" id="domain' . $rnd1 . '" value="' . html_attr($combo_domain->SelectedData) . '">';
	$combo_concern->HTML = '<span id="concern-container' . $rnd1 . '"></span><input type="hidden" name="concern" id="concern' . $rnd1 . '" value="' . html_attr($combo_concern->SelectedData) . '">';
	$combo_concern->MatchText = '<span id="concern-container-readonly' . $rnd1 . '"></span><input type="hidden" name="concern" id="concern' . $rnd1 . '" value="' . html_attr($combo_concern->SelectedData) . '">';

	ob_start();
	?>

	<script>
		// initial lookup values
		AppGini.current_domain__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['domain'] : $filterer_domain); ?>"};
		AppGini.current_concern__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['concern'] : $filterer_concern); ?>"};

		jQuery(function() {
			setTimeout(function() {
				if(typeof(domain_reload__RAND__) == 'function') domain_reload__RAND__();
				<?php echo (!$AllowUpdate || $dvprint ? 'if(typeof(concern_reload__RAND__) == \'function\') concern_reload__RAND__(AppGini.current_domain__RAND__.value);' : ''); ?>
			}, 50); /* we need to slightly delay client-side execution of the above code to allow AppGini.ajaxCache to work */
		});
		function domain_reload__RAND__() {
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint) { ?>

			$j("#domain-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c) {
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { id: AppGini.current_domain__RAND__.value, t: 'class_dramatica_issue', f: 'domain' },
						success: function(resp) {
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="domain"]').val(resp.results[0].id);
							$j('[id=domain-container-readonly__RAND__]').html('<span id="domain-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_domain_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_domain_view_parent]').show(); }

						if(typeof(concern_reload__RAND__) == 'function') concern_reload__RAND__(AppGini.current_domain__RAND__.value);

							if(typeof(domain_update_autofills__RAND__) == 'function') domain_update_autofills__RAND__();
						}
					});
				},
				width: '100%',
				formatNoMatches: function(term) { return '<?php echo addslashes($Translation['No matches found!']); ?>'; },
				minimumResultsForSearch: 5,
				loadMorePadding: 200,
				ajax: {
					url: 'ajax_combo.php',
					dataType: 'json',
					cache: true,
					data: function(term, page) { return { s: term, p: page, t: 'class_dramatica_issue', f: 'domain' }; },
					results: function(resp, page) { return resp; }
				},
				escapeMarkup: function(str) { return str; }
			}).on('change', function(e) {
				AppGini.current_domain__RAND__.value = e.added.id;
				AppGini.current_domain__RAND__.text = e.added.text;
				$j('[name="domain"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_domain_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_domain_view_parent]').show(); }

						if(typeof(concern_reload__RAND__) == 'function') concern_reload__RAND__(AppGini.current_domain__RAND__.value);

				if(typeof(domain_update_autofills__RAND__) == 'function') domain_update_autofills__RAND__();
			});

			if(!$j("#domain-container__RAND__").length) {
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_domain__RAND__.value, t: 'class_dramatica_issue', f: 'domain' },
					success: function(resp) {
						$j('[name="domain"]').val(resp.results[0].id);
						$j('[id=domain-container-readonly__RAND__]').html('<span id="domain-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_domain_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_domain_view_parent]').show(); }

						if(typeof(domain_update_autofills__RAND__) == 'function') domain_update_autofills__RAND__();
					}
				});
			}

		<?php } else { ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_domain__RAND__.value, t: 'class_dramatica_issue', f: 'domain' },
				success: function(resp) {
					$j('[id=domain-container__RAND__], [id=domain-container-readonly__RAND__]').html('<span id="domain-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_domain_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_domain_view_parent]').show(); }

					if(typeof(domain_update_autofills__RAND__) == 'function') domain_update_autofills__RAND__();
				}
			});
		<?php } ?>

		}
		function concern_reload__RAND__(filterer_domain) {
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint) { ?>

			$j("#concern-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c) {
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { filterer_domain: filterer_domain, id: AppGini.current_concern__RAND__.value, t: 'class_dramatica_issue', f: 'concern' },
						success: function(resp) {
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="concern"]').val(resp.results[0].id);
							$j('[id=concern-container-readonly__RAND__]').html('<span id="concern-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_concern_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_concern_view_parent]').show(); }


							if(typeof(concern_update_autofills__RAND__) == 'function') concern_update_autofills__RAND__();
						}
					});
				},
				width: '100%',
				formatNoMatches: function(term) { return '<?php echo addslashes($Translation['No matches found!']); ?>'; },
				minimumResultsForSearch: 5,
				loadMorePadding: 200,
				ajax: {
					url: 'ajax_combo.php',
					dataType: 'json',
					cache: true,
					data: function(term, page) { return { filterer_domain: filterer_domain, s: term, p: page, t: 'class_dramatica_issue', f: 'concern' }; },
					results: function(resp, page) { return resp; }
				},
				escapeMarkup: function(str) { return str; }
			}).on('change', function(e) {
				AppGini.current_concern__RAND__.value = e.added.id;
				AppGini.current_concern__RAND__.text = e.added.text;
				$j('[name="concern"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_concern_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_concern_view_parent]').show(); }


				if(typeof(concern_update_autofills__RAND__) == 'function') concern_update_autofills__RAND__();
			});

			if(!$j("#concern-container__RAND__").length) {
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_concern__RAND__.value, t: 'class_dramatica_issue', f: 'concern' },
					success: function(resp) {
						$j('[name="concern"]').val(resp.results[0].id);
						$j('[id=concern-container-readonly__RAND__]').html('<span id="concern-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_concern_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_concern_view_parent]').show(); }

						if(typeof(concern_update_autofills__RAND__) == 'function') concern_update_autofills__RAND__();
					}
				});
			}

		<?php } else { ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_concern__RAND__.value, t: 'class_dramatica_issue', f: 'concern' },
				success: function(resp) {
					$j('[id=concern-container__RAND__], [id=concern-container-readonly__RAND__]').html('<span id="concern-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_concern_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_concern_view_parent]').show(); }

					if(typeof(concern_update_autofills__RAND__) == 'function') concern_update_autofills__RAND__();
				}
			});
		<?php } ?>

		}
	</script>
	<?php

	$lookups = str_replace('__RAND__', $rnd1, ob_get_contents());
	ob_end_clean();


	// code for template based detail view forms

	// open the detail view template
	if($dvprint) {
		$template_file = is_file("./{$TemplateDVP}") ? "./{$TemplateDVP}" : './templates/class_dramatica_issue_templateDVP.html';
		$templateCode = @file_get_contents($template_file);
	} else {
		$template_file = is_file("./{$TemplateDV}") ? "./{$TemplateDV}" : './templates/class_dramatica_issue_templateDV.html';
		$templateCode = @file_get_contents($template_file);
	}

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Detail View', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', ($_REQUEST['Embedded'] ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($AllowInsert) {
		if(!$selected_id) $templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return class_dramatica_issue_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return class_dramatica_issue_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
	} else {
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '', $templateCode);
	}

	// 'Back' button action
	if($_REQUEST['Embedded']) {
		$backAction = 'AppGini.closeParentModal(); return false;';
	} else {
		$backAction = '$j(\'form\').eq(0).attr(\'novalidate\', \'novalidate\'); document.myform.reset(); return true;';
	}

	if($selected_id) {
		if(!$_REQUEST['Embedded']) $templateCode = str_replace('<%%DVPRINT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="dvprint" name="dvprint_x" value="1" onclick="$j(\'form\').eq(0).prop(\'novalidate\', true); document.myform.reset(); return true;" title="' . html_attr($Translation['Print Preview']) . '"><i class="glyphicon glyphicon-print"></i> ' . $Translation['Print Preview'] . '</button>', $templateCode);
		if($AllowUpdate) {
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return class_dramatica_issue_validateData();" title="' . html_attr($Translation['Save Changes']) . '"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
		} else {
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		}
		if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3) { // allow delete?
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '<button type="submit" class="btn btn-danger" id="delete" name="delete_x" value="1" onclick="return confirm(\'' . $Translation['are you sure?'] . '\');" title="' . html_attr($Translation['Delete']) . '"><i class="glyphicon glyphicon-trash"></i> ' . $Translation['Delete'] . '</button>', $templateCode);
		} else {
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		}
		$templateCode = str_replace('<%%DESELECT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '" title="' . html_attr($Translation['Back']) . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>', $templateCode);
	} else {
		$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		$templateCode = str_replace('<%%DESELECT_BUTTON%%>', ($ShowCancel ? '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '" title="' . html_attr($Translation['Back']) . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>' : ''), $templateCode);
	}

	// set records to read only if user can't insert new records and can't edit current record
	if(($selected_id && !$AllowUpdate && !$AllowInsert) || (!$selected_id && !$AllowInsert)) {
		$jsReadOnly .= "\tjQuery('#domain').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#domain_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('#concern').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#concern_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('#issue').replaceWith('<div class=\"form-control-static\" id=\"issue\">' + (jQuery('#issue').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#description').replaceWith('<div class=\"form-control-static\" id=\"description\">' + (jQuery('#description').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('.select2-container').hide();\n";

		$noUploads = true;
	} elseif($AllowInsert) {
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
			$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos
	$templateCode = str_replace('<%%COMBO(domain)%%>', $combo_domain->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(domain)%%>', $combo_domain->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(domain)%%>', urlencode($combo_domain->MatchText), $templateCode);
	$templateCode = str_replace('<%%COMBO(concern)%%>', $combo_concern->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(concern)%%>', $combo_concern->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(concern)%%>', urlencode($combo_concern->MatchText), $templateCode);

	/* lookup fields array: 'lookup field name' => array('parent table name', 'lookup field caption') */
	$lookup_fields = array('domain' => array('class_dramatica_domain', 'Domain'), 'concern' => array('class_dramatica_concern', 'Concern'), );
	foreach($lookup_fields as $luf => $ptfc) {
		$pt_perm = getTablePermissions($ptfc[0]);

		// process foreign key links
		if($pt_perm['view'] || $pt_perm['edit']) {
			$templateCode = str_replace("<%%PLINK({$luf})%%>", '<button type="button" class="btn btn-default view_parent hspacer-md" id="' . $ptfc[0] . '_view_parent" title="' . html_attr($Translation['View'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-eye-open"></i></button>', $templateCode);
		}

		// if user has insert permission to parent table of a lookup field, put an add new button
		if($pt_perm['insert'] && !$_REQUEST['Embedded']) {
			$templateCode = str_replace("<%%ADDNEW({$ptfc[0]})%%>", '<button type="button" class="btn btn-success add_new_parent hspacer-md" id="' . $ptfc[0] . '_add_new" title="' . html_attr($Translation['Add New'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-plus-sign"></i></button>', $templateCode);
		}
	}

	// process images
	$templateCode = str_replace('<%%UPLOADFILE(id)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(domain)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(concern)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(issue)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(description)%%>', '', $templateCode);

	// process values
	if($selected_id) {
		if( $dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', safe_html($urow['id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', html_attr($row['id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode($urow['id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(domain)%%>', safe_html($urow['domain']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(domain)%%>', html_attr($row['domain']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(domain)%%>', urlencode($urow['domain']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(concern)%%>', safe_html($urow['concern']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(concern)%%>', html_attr($row['concern']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(concern)%%>', urlencode($urow['concern']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(issue)%%>', safe_html($urow['issue']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(issue)%%>', html_attr($row['issue']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(issue)%%>', urlencode($urow['issue']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(description)%%>', safe_html($urow['description']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(description)%%>', html_attr($row['description']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(description)%%>', urlencode($urow['description']), $templateCode);
	} else {
		$templateCode = str_replace('<%%VALUE(id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(domain)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(domain)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(concern)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(concern)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(issue)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(issue)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(description)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(description)%%>', urlencode(''), $templateCode);
	}

	// process translations
	$templateCode = parseTemplate($templateCode);

	// clear scrap
	$templateCode = str_replace('<%%', '<!-- ', $templateCode);
	$templateCode = str_replace('%%>', ' -->', $templateCode);

	// hide links to inaccessible tables
	if($_REQUEST['dvprint_x'] == '') {
		$templateCode .= "\n\n<script>\$j(function() {\n";
		$arrTables = getTableList();
		foreach($arrTables as $name => $caption) {
			$templateCode .= "\t\$j('#{$name}_link').removeClass('hidden');\n";
			$templateCode .= "\t\$j('#xs_{$name}_link').removeClass('hidden');\n";
		}

		$templateCode .= $jsReadOnly;
		$templateCode .= $jsEditable;

		if(!$selected_id) {
		}

		$templateCode.="\n});</script>\n";
	}

	// ajaxed auto-fill fields
	$templateCode .= '<script>';
	$templateCode .= '$j(function() {';


	$templateCode.="});";
	$templateCode.="</script>";
	$templateCode .= $lookups;

	// handle enforced parent values for read-only lookup fields

	// don't include blank images in lightbox gallery
	$templateCode = preg_replace('/blank.gif" data-lightbox=".*?"/', 'blank.gif"', $templateCode);

	// don't display empty email links
	$templateCode=preg_replace('/<a .*?href="mailto:".*?<\/a>/', '', $templateCode);

	/* default field values */
	$rdata = $jdata = get_defaults('class_dramatica_issue');
	if($selected_id) {
		$jdata = get_joined_record('class_dramatica_issue', $selected_id);
		if($jdata === false) $jdata = get_defaults('class_dramatica_issue');
		$rdata = $row;
	}
	$templateCode .= loadView('class_dramatica_issue-ajax-cache', array('rdata' => $rdata, 'jdata' => $jdata));

	// hook: class_dramatica_issue_dv
	if(function_exists('class_dramatica_issue_dv')) {
		$args=[];
		class_dramatica_issue_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}