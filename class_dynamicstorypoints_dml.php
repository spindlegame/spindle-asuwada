<?php

// Data functions (insert, update, delete, form) for table class_dynamicstorypoints

// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

function class_dynamicstorypoints_insert(&$error_message = '') {
	global $Translation;

	// mm: can member insert record?
	$arrPerm = getTablePermissions('class_dynamicstorypoints');
	if(!$arrPerm['insert']) return false;

	$data = [
		'term' => Request::val('term', ''),
		'value' => Request::val('value', ''),
		'description' => Request::val('description', ''),
		'cat1' => Request::val('cat1', ''),
		'cat2' => Request::val('cat2', ''),
		'cat3' => Request::val('cat3', ''),
	];


	// hook: class_dynamicstorypoints_before_insert
	if(function_exists('class_dynamicstorypoints_before_insert')) {
		$args = [];
		if(!class_dynamicstorypoints_before_insert($data, getMemberInfo(), $args)) {
			if(isset($args['error_message'])) $error_message = $args['error_message'];
			return false;
		}
	}

	$error = '';
	// set empty fields to NULL
	$data = array_map(function($v) { return ($v === '' ? NULL : $v); }, $data);
	insert('class_dynamicstorypoints', backtick_keys_once($data), $error);
	if($error)
		die("{$error}<br><a href=\"#\" onclick=\"history.go(-1);\">{$Translation['< back']}</a>");

	$recID = db_insert_id(db_link());

	update_calc_fields('class_dynamicstorypoints', $recID, calculated_fields()['class_dynamicstorypoints']);

	// hook: class_dynamicstorypoints_after_insert
	if(function_exists('class_dynamicstorypoints_after_insert')) {
		$res = sql("SELECT * FROM `class_dynamicstorypoints` WHERE `id`='" . makeSafe($recID, false) . "' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)) {
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args=[];
		if(!class_dynamicstorypoints_after_insert($data, getMemberInfo(), $args)) { return $recID; }
	}

	// mm: save ownership data
	set_record_owner('class_dynamicstorypoints', $recID, getLoggedMemberID());

	// if this record is a copy of another record, copy children if applicable
	if(!empty($_REQUEST['SelectedID'])) class_dynamicstorypoints_copy_children($recID, $_REQUEST['SelectedID']);

	return $recID;
}

function class_dynamicstorypoints_copy_children($destination_id, $source_id) {
	global $Translation;
	$requests = []; // array of curl handlers for launching insert requests
	$eo = ['silentErrors' => true];
	$safe_sid = makeSafe($source_id);

	// launch requests, asynchronously
	curl_batch($requests);
}

function class_dynamicstorypoints_delete($selected_id, $AllowDeleteOfParents = false, $skipChecks = false) {
	// insure referential integrity ...
	global $Translation;
	$selected_id = makeSafe($selected_id);

	// mm: can member delete record?
	if(!check_record_permission('class_dynamicstorypoints', $selected_id, 'delete')) {
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: class_dynamicstorypoints_before_delete
	if(function_exists('class_dynamicstorypoints_before_delete')) {
		$args = [];
		if(!class_dynamicstorypoints_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'] . (
				!empty($args['error_message']) ?
					'<div class="text-bold">' . strip_tags($args['error_message']) . '</div>'
					: '' 
			);
	}

	// child table: bio_drama_chr_dev
	$res = sql("SELECT `id` FROM `class_dynamicstorypoints` WHERE `id`='{$selected_id}'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("SELECT COUNT(1) FROM `bio_drama_chr_dev` WHERE `mc_resolve`='" . makeSafe($id[0]) . "'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'bio_drama_chr_dev', $RetMsg);
		return $RetMsg;
	} elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation['confirm delete'];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'bio_drama_chr_dev', $RetMsg);
		$RetMsg = str_replace('<Delete>', '<input type="button" class="button" value="' . $Translation['yes'] . '" onClick="window.location = \'class_dynamicstorypoints_view.php?SelectedID=' . urlencode($selected_id) . '&delete_x=1&confirmed=1\';">', $RetMsg);
		$RetMsg = str_replace('<Cancel>', '<input type="button" class="button" value="' . $Translation[ 'no'] . '" onClick="window.location = \'class_dynamicstorypoints_view.php?SelectedID=' . urlencode($selected_id) . '\';">', $RetMsg);
		return $RetMsg;
	}

	// child table: bio_storydynamic
	$res = sql("SELECT `id` FROM `class_dynamicstorypoints` WHERE `id`='{$selected_id}'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("SELECT COUNT(1) FROM `bio_storydynamic` WHERE `mc_resolve`='" . makeSafe($id[0]) . "'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'bio_storydynamic', $RetMsg);
		return $RetMsg;
	} elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation['confirm delete'];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'bio_storydynamic', $RetMsg);
		$RetMsg = str_replace('<Delete>', '<input type="button" class="button" value="' . $Translation['yes'] . '" onClick="window.location = \'class_dynamicstorypoints_view.php?SelectedID=' . urlencode($selected_id) . '&delete_x=1&confirmed=1\';">', $RetMsg);
		$RetMsg = str_replace('<Cancel>', '<input type="button" class="button" value="' . $Translation[ 'no'] . '" onClick="window.location = \'class_dynamicstorypoints_view.php?SelectedID=' . urlencode($selected_id) . '\';">', $RetMsg);
		return $RetMsg;
	}

	sql("DELETE FROM `class_dynamicstorypoints` WHERE `id`='{$selected_id}'", $eo);

	// hook: class_dynamicstorypoints_after_delete
	if(function_exists('class_dynamicstorypoints_after_delete')) {
		$args = [];
		class_dynamicstorypoints_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("DELETE FROM `membership_userrecords` WHERE `tableName`='class_dynamicstorypoints' AND `pkValue`='{$selected_id}'", $eo);
}

function class_dynamicstorypoints_update(&$selected_id, &$error_message = '') {
	global $Translation;

	// mm: can member edit record?
	if(!check_record_permission('class_dynamicstorypoints', $selected_id, 'edit')) return false;

	$data = [
		'term' => Request::val('term', ''),
		'value' => Request::val('value', ''),
		'description' => Request::val('description', ''),
		'cat1' => Request::val('cat1', ''),
		'cat2' => Request::val('cat2', ''),
		'cat3' => Request::val('cat3', ''),
	];

	// get existing values
	$old_data = getRecord('class_dynamicstorypoints', $selected_id);
	if(is_array($old_data)) {
		$old_data = array_map('makeSafe', $old_data);
		$old_data['selectedID'] = makeSafe($selected_id);
	}

	$data['selectedID'] = makeSafe($selected_id);

	// hook: class_dynamicstorypoints_before_update
	if(function_exists('class_dynamicstorypoints_before_update')) {
		$args = ['old_data' => $old_data];
		if(!class_dynamicstorypoints_before_update($data, getMemberInfo(), $args)) {
			if(isset($args['error_message'])) $error_message = $args['error_message'];
			return false;
		}
	}

	$set = $data; unset($set['selectedID']);
	foreach ($set as $field => $value) {
		$set[$field] = ($value !== '' && $value !== NULL) ? $value : NULL;
	}

	if(!update(
		'class_dynamicstorypoints', 
		backtick_keys_once($set), 
		['`id`' => $selected_id], 
		$error_message
	)) {
		echo $error_message;
		echo '<a href="class_dynamicstorypoints_view.php?SelectedID=' . urlencode($selected_id) . "\">{$Translation['< back']}</a>";
		exit;
	}


	$eo = ['silentErrors' => true];

	update_calc_fields('class_dynamicstorypoints', $data['selectedID'], calculated_fields()['class_dynamicstorypoints']);

	// hook: class_dynamicstorypoints_after_update
	if(function_exists('class_dynamicstorypoints_after_update')) {
		$res = sql("SELECT * FROM `class_dynamicstorypoints` WHERE `id`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)) $data = array_map('makeSafe', $row);

		$data['selectedID'] = $data['id'];
		$args = ['old_data' => $old_data];
		if(!class_dynamicstorypoints_after_update($data, getMemberInfo(), $args)) return;
	}

	// mm: update ownership data
	sql("UPDATE `membership_userrecords` SET `dateUpdated`='" . time() . "' WHERE `tableName`='class_dynamicstorypoints' AND `pkValue`='" . makeSafe($selected_id) . "'", $eo);
}

function class_dynamicstorypoints_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $ShowCancel = 0, $TemplateDV = '', $TemplateDVP = '') {
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;

	// mm: get table permissions
	$arrPerm = getTablePermissions('class_dynamicstorypoints');
	if(!$arrPerm['insert'] && $selected_id=='') { return ''; }
	$AllowInsert = ($arrPerm['insert'] ? true : false);
	// print preview?
	$dvprint = false;
	if($selected_id && $_REQUEST['dvprint_x'] != '') {
		$dvprint = true;
	}

	$filterer_cat1 = thisOr($_REQUEST['filterer_cat1'], '');
	$filterer_cat2 = thisOr($_REQUEST['filterer_cat2'], '');
	$filterer_cat3 = thisOr($_REQUEST['filterer_cat3'], '');

	// populate filterers, starting from children to grand-parents
	if($filterer_cat2 && !$filterer_cat1) $filterer_cat1 = sqlValue("select cat1 from class_dramatica_storypoints2 where id='" . makeSafe($filterer_cat2) . "'");
	if($filterer_cat3 && !$filterer_cat1) $filterer_cat1 = sqlValue("select cat1 from class_dramatica_storypoints3 where id='" . makeSafe($filterer_cat3) . "'");
	if($filterer_cat3 && !$filterer_cat2) $filterer_cat2 = sqlValue("select cat2 from class_dramatica_storypoints3 where id='" . makeSafe($filterer_cat3) . "'");

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');
	// combobox: cat1
	$combo_cat1 = new DataCombo;
	// combobox: cat2, filterable by: cat1
	$combo_cat2 = new DataCombo;
	// combobox: cat3, filterable by: cat1,cat2
	$combo_cat3 = new DataCombo;

	if($selected_id) {
		// mm: check member permissions
		if(!$arrPerm['view']) return '';

		// mm: who is the owner?
		$ownerGroupID = sqlValue("SELECT `groupID` FROM `membership_userrecords` WHERE `tableName`='class_dynamicstorypoints' AND `pkValue`='" . makeSafe($selected_id) . "'");
		$ownerMemberID = sqlValue("SELECT LCASE(`memberID`) FROM `membership_userrecords` WHERE `tableName`='class_dynamicstorypoints' AND `pkValue`='" . makeSafe($selected_id) . "'");

		if($arrPerm['view'] == 1 && getLoggedMemberID() != $ownerMemberID) return '';
		if($arrPerm['view'] == 2 && getLoggedGroupID() != $ownerGroupID) return '';

		// can edit?
		$AllowUpdate = 0;
		if(($arrPerm['edit'] == 1 && $ownerMemberID == getLoggedMemberID()) || ($arrPerm['edit'] == 2 && $ownerGroupID == getLoggedGroupID()) || $arrPerm['edit'] == 3) {
			$AllowUpdate = 1;
		}

		$res = sql("SELECT * FROM `class_dynamicstorypoints` WHERE `id`='" . makeSafe($selected_id) . "'", $eo);
		if(!($row = db_fetch_array($res))) {
			return error_message($Translation['No records found'], 'class_dynamicstorypoints_view.php', false);
		}
		$combo_cat1->SelectedData = $row['cat1'];
		$combo_cat2->SelectedData = $row['cat2'];
		$combo_cat3->SelectedData = $row['cat3'];
		$urow = $row; /* unsanitized data */
		$hc = new CI_Input(datalist_db_encoding);
		$row = $hc->xss_clean($row); /* sanitize data */
	} else {
		$combo_cat1->SelectedData = $filterer_cat1;
		$combo_cat2->SelectedData = $filterer_cat2;
		$combo_cat3->SelectedData = $filterer_cat3;
	}
	$combo_cat1->HTML = '<span id="cat1-container' . $rnd1 . '"></span><input type="hidden" name="cat1" id="cat1' . $rnd1 . '" value="' . html_attr($combo_cat1->SelectedData) . '">';
	$combo_cat1->MatchText = '<span id="cat1-container-readonly' . $rnd1 . '"></span><input type="hidden" name="cat1" id="cat1' . $rnd1 . '" value="' . html_attr($combo_cat1->SelectedData) . '">';
	$combo_cat2->HTML = '<span id="cat2-container' . $rnd1 . '"></span><input type="hidden" name="cat2" id="cat2' . $rnd1 . '" value="' . html_attr($combo_cat2->SelectedData) . '">';
	$combo_cat2->MatchText = '<span id="cat2-container-readonly' . $rnd1 . '"></span><input type="hidden" name="cat2" id="cat2' . $rnd1 . '" value="' . html_attr($combo_cat2->SelectedData) . '">';
	$combo_cat3->HTML = '<span id="cat3-container' . $rnd1 . '"></span><input type="hidden" name="cat3" id="cat3' . $rnd1 . '" value="' . html_attr($combo_cat3->SelectedData) . '">';
	$combo_cat3->MatchText = '<span id="cat3-container-readonly' . $rnd1 . '"></span><input type="hidden" name="cat3" id="cat3' . $rnd1 . '" value="' . html_attr($combo_cat3->SelectedData) . '">';

	ob_start();
	?>

	<script>
		// initial lookup values
		AppGini.current_cat1__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['cat1'] : $filterer_cat1); ?>"};
		AppGini.current_cat2__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['cat2'] : $filterer_cat2); ?>"};
		AppGini.current_cat3__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['cat3'] : $filterer_cat3); ?>"};

		jQuery(function() {
			setTimeout(function() {
				if(typeof(cat1_reload__RAND__) == 'function') cat1_reload__RAND__();
				<?php echo (!$AllowUpdate || $dvprint ? 'if(typeof(cat2_reload__RAND__) == \'function\') cat2_reload__RAND__(AppGini.current_cat1__RAND__.value);' : ''); ?>
				<?php echo (!$AllowUpdate || $dvprint ? 'if(typeof(cat3_reload__RAND__) == \'function\') cat3_reload__RAND__(AppGini.current_cat1__RAND__.value, AppGini.current_cat2__RAND__.value);' : ''); ?>
			}, 50); /* we need to slightly delay client-side execution of the above code to allow AppGini.ajaxCache to work */
		});
		function cat1_reload__RAND__() {
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint) { ?>

			$j("#cat1-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c) {
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { id: AppGini.current_cat1__RAND__.value, t: 'class_dynamicstorypoints', f: 'cat1' },
						success: function(resp) {
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="cat1"]').val(resp.results[0].id);
							$j('[id=cat1-container-readonly__RAND__]').html('<span id="cat1-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_storypoints1_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_storypoints1_view_parent]').show(); }

						if(typeof(cat2_reload__RAND__) == 'function') cat2_reload__RAND__(AppGini.current_cat1__RAND__.value);

							if(typeof(cat1_update_autofills__RAND__) == 'function') cat1_update_autofills__RAND__();
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
					data: function(term, page) { return { s: term, p: page, t: 'class_dynamicstorypoints', f: 'cat1' }; },
					results: function(resp, page) { return resp; }
				},
				escapeMarkup: function(str) { return str; }
			}).on('change', function(e) {
				AppGini.current_cat1__RAND__.value = e.added.id;
				AppGini.current_cat1__RAND__.text = e.added.text;
				$j('[name="cat1"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_storypoints1_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_storypoints1_view_parent]').show(); }

						if(typeof(cat2_reload__RAND__) == 'function') cat2_reload__RAND__(AppGini.current_cat1__RAND__.value);

				if(typeof(cat1_update_autofills__RAND__) == 'function') cat1_update_autofills__RAND__();
			});

			if(!$j("#cat1-container__RAND__").length) {
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_cat1__RAND__.value, t: 'class_dynamicstorypoints', f: 'cat1' },
					success: function(resp) {
						$j('[name="cat1"]').val(resp.results[0].id);
						$j('[id=cat1-container-readonly__RAND__]').html('<span id="cat1-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_storypoints1_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_storypoints1_view_parent]').show(); }

						if(typeof(cat1_update_autofills__RAND__) == 'function') cat1_update_autofills__RAND__();
					}
				});
			}

		<?php } else { ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_cat1__RAND__.value, t: 'class_dynamicstorypoints', f: 'cat1' },
				success: function(resp) {
					$j('[id=cat1-container__RAND__], [id=cat1-container-readonly__RAND__]').html('<span id="cat1-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_storypoints1_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_storypoints1_view_parent]').show(); }

					if(typeof(cat1_update_autofills__RAND__) == 'function') cat1_update_autofills__RAND__();
				}
			});
		<?php } ?>

		}
		function cat2_reload__RAND__(filterer_cat1) {
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint) { ?>

			$j("#cat2-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c) {
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { filterer_cat1: filterer_cat1, id: AppGini.current_cat2__RAND__.value, t: 'class_dynamicstorypoints', f: 'cat2' },
						success: function(resp) {
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="cat2"]').val(resp.results[0].id);
							$j('[id=cat2-container-readonly__RAND__]').html('<span id="cat2-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_storypoints2_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_storypoints2_view_parent]').show(); }

						if(typeof(cat3_reload__RAND__) == 'function') cat3_reload__RAND__($j('#cat1').val(), AppGini.current_cat2__RAND__.value);

							if(typeof(cat2_update_autofills__RAND__) == 'function') cat2_update_autofills__RAND__();
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
					data: function(term, page) { return { filterer_cat1: filterer_cat1, s: term, p: page, t: 'class_dynamicstorypoints', f: 'cat2' }; },
					results: function(resp, page) { return resp; }
				},
				escapeMarkup: function(str) { return str; }
			}).on('change', function(e) {
				AppGini.current_cat2__RAND__.value = e.added.id;
				AppGini.current_cat2__RAND__.text = e.added.text;
				$j('[name="cat2"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_storypoints2_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_storypoints2_view_parent]').show(); }

						if(typeof(cat3_reload__RAND__) == 'function') cat3_reload__RAND__($j('#cat1').val(), AppGini.current_cat2__RAND__.value);

				if(typeof(cat2_update_autofills__RAND__) == 'function') cat2_update_autofills__RAND__();
			});

			if(!$j("#cat2-container__RAND__").length) {
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_cat2__RAND__.value, t: 'class_dynamicstorypoints', f: 'cat2' },
					success: function(resp) {
						$j('[name="cat2"]').val(resp.results[0].id);
						$j('[id=cat2-container-readonly__RAND__]').html('<span id="cat2-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_storypoints2_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_storypoints2_view_parent]').show(); }

						if(typeof(cat2_update_autofills__RAND__) == 'function') cat2_update_autofills__RAND__();
					}
				});
			}

		<?php } else { ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_cat2__RAND__.value, t: 'class_dynamicstorypoints', f: 'cat2' },
				success: function(resp) {
					$j('[id=cat2-container__RAND__], [id=cat2-container-readonly__RAND__]').html('<span id="cat2-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_storypoints2_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_storypoints2_view_parent]').show(); }

					if(typeof(cat2_update_autofills__RAND__) == 'function') cat2_update_autofills__RAND__();
				}
			});
		<?php } ?>

		}
		function cat3_reload__RAND__(filterer_cat1, filterer_cat2) {
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint) { ?>

			$j("#cat3-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c) {
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { filterer_cat1: filterer_cat1, filterer_cat2: filterer_cat2, id: AppGini.current_cat3__RAND__.value, t: 'class_dynamicstorypoints', f: 'cat3' },
						success: function(resp) {
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="cat3"]').val(resp.results[0].id);
							$j('[id=cat3-container-readonly__RAND__]').html('<span id="cat3-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_storypoints3_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_storypoints3_view_parent]').show(); }


							if(typeof(cat3_update_autofills__RAND__) == 'function') cat3_update_autofills__RAND__();
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
					data: function(term, page) { return { filterer_cat1: filterer_cat1, filterer_cat2: filterer_cat2, s: term, p: page, t: 'class_dynamicstorypoints', f: 'cat3' }; },
					results: function(resp, page) { return resp; }
				},
				escapeMarkup: function(str) { return str; }
			}).on('change', function(e) {
				AppGini.current_cat3__RAND__.value = e.added.id;
				AppGini.current_cat3__RAND__.text = e.added.text;
				$j('[name="cat3"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_storypoints3_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_storypoints3_view_parent]').show(); }


				if(typeof(cat3_update_autofills__RAND__) == 'function') cat3_update_autofills__RAND__();
			});

			if(!$j("#cat3-container__RAND__").length) {
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_cat3__RAND__.value, t: 'class_dynamicstorypoints', f: 'cat3' },
					success: function(resp) {
						$j('[name="cat3"]').val(resp.results[0].id);
						$j('[id=cat3-container-readonly__RAND__]').html('<span id="cat3-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_storypoints3_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_storypoints3_view_parent]').show(); }

						if(typeof(cat3_update_autofills__RAND__) == 'function') cat3_update_autofills__RAND__();
					}
				});
			}

		<?php } else { ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_cat3__RAND__.value, t: 'class_dynamicstorypoints', f: 'cat3' },
				success: function(resp) {
					$j('[id=cat3-container__RAND__], [id=cat3-container-readonly__RAND__]').html('<span id="cat3-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dramatica_storypoints3_view_parent]').hide(); } else { $j('.btn[id=class_dramatica_storypoints3_view_parent]').show(); }

					if(typeof(cat3_update_autofills__RAND__) == 'function') cat3_update_autofills__RAND__();
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
		$template_file = is_file("./{$TemplateDVP}") ? "./{$TemplateDVP}" : './templates/class_dynamicstorypoints_templateDVP.html';
		$templateCode = @file_get_contents($template_file);
	} else {
		$template_file = is_file("./{$TemplateDV}") ? "./{$TemplateDV}" : './templates/class_dynamicstorypoints_templateDV.html';
		$templateCode = @file_get_contents($template_file);
	}

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Class dynamicstorypoint details', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', ($_REQUEST['Embedded'] ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($AllowInsert) {
		if(!$selected_id) $templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return class_dynamicstorypoints_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return class_dynamicstorypoints_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
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
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return class_dynamicstorypoints_validateData();" title="' . html_attr($Translation['Save Changes']) . '"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
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
		$jsReadOnly .= "\tjQuery('#term').replaceWith('<div class=\"form-control-static\" id=\"term\">' + (jQuery('#term').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#value').replaceWith('<div class=\"form-control-static\" id=\"value\">' + (jQuery('#value').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#cat1').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#cat1_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('#cat2').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#cat2_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('#cat3').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#cat3_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('.select2-container').hide();\n";

		$noUploads = true;
	} elseif($AllowInsert) {
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
			$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos
	$templateCode = str_replace('<%%COMBO(cat1)%%>', $combo_cat1->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(cat1)%%>', $combo_cat1->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(cat1)%%>', urlencode($combo_cat1->MatchText), $templateCode);
	$templateCode = str_replace('<%%COMBO(cat2)%%>', $combo_cat2->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(cat2)%%>', $combo_cat2->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(cat2)%%>', urlencode($combo_cat2->MatchText), $templateCode);
	$templateCode = str_replace('<%%COMBO(cat3)%%>', $combo_cat3->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(cat3)%%>', $combo_cat3->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(cat3)%%>', urlencode($combo_cat3->MatchText), $templateCode);

	/* lookup fields array: 'lookup field name' => array('parent table name', 'lookup field caption') */
	$lookup_fields = array('cat1' => array('class_dramatica_storypoints1', 'Class storypoint1'), 'cat2' => array('class_dramatica_storypoints2', 'Class storypoint2'), 'cat3' => array('class_dramatica_storypoints3', 'Cat3'), );
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
	$templateCode = str_replace('<%%UPLOADFILE(term)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(value)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(description)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(cat1)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(cat2)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(cat3)%%>', '', $templateCode);

	// process values
	if($selected_id) {
		if( $dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', safe_html($urow['id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', html_attr($row['id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode($urow['id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(term)%%>', safe_html($urow['term']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(term)%%>', html_attr($row['term']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(term)%%>', urlencode($urow['term']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(value)%%>', safe_html($urow['value']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(value)%%>', html_attr($row['value']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(value)%%>', urlencode($urow['value']), $templateCode);
		if($AllowUpdate || $AllowInsert) {
			$templateCode = str_replace('<%%HTMLAREA(description)%%>', '<textarea name="description" id="description" rows="5">' . html_attr($row['description']) . '</textarea>', $templateCode);
		} else {
			$templateCode = str_replace('<%%HTMLAREA(description)%%>', '<div id="description" class="form-control-static">' . $row['description'] . '</div>', $templateCode);
		}
		$templateCode = str_replace('<%%VALUE(description)%%>', nl2br($row['description']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(description)%%>', urlencode($urow['description']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(cat1)%%>', safe_html($urow['cat1']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(cat1)%%>', html_attr($row['cat1']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(cat1)%%>', urlencode($urow['cat1']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(cat2)%%>', safe_html($urow['cat2']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(cat2)%%>', html_attr($row['cat2']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(cat2)%%>', urlencode($urow['cat2']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(cat3)%%>', safe_html($urow['cat3']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(cat3)%%>', html_attr($row['cat3']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(cat3)%%>', urlencode($urow['cat3']), $templateCode);
	} else {
		$templateCode = str_replace('<%%VALUE(id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(term)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(term)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(value)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(value)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%HTMLAREA(description)%%>', '<textarea name="description" id="description" rows="5"></textarea>', $templateCode);
		$templateCode = str_replace('<%%VALUE(cat1)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(cat1)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(cat2)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(cat2)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(cat3)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(cat3)%%>', urlencode(''), $templateCode);
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
	$rdata = $jdata = get_defaults('class_dynamicstorypoints');
	if($selected_id) {
		$jdata = get_joined_record('class_dynamicstorypoints', $selected_id);
		if($jdata === false) $jdata = get_defaults('class_dynamicstorypoints');
		$rdata = $row;
	}
	$templateCode .= loadView('class_dynamicstorypoints-ajax-cache', array('rdata' => $rdata, 'jdata' => $jdata));

	// hook: class_dynamicstorypoints_dv
	if(function_exists('class_dynamicstorypoints_dv')) {
		$args=[];
		class_dynamicstorypoints_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}