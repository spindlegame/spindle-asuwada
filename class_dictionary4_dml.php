<?php

// Data functions (insert, update, delete, form) for table class_dictionary4

// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

function class_dictionary4_insert(&$error_message = '') {
	global $Translation;

	// mm: can member insert record?
	$arrPerm = getTablePermissions('class_dictionary4');
	if(!$arrPerm['insert']) return false;

	$data = [
		'class1' => Request::val('class1', ''),
		'class2' => Request::val('class2', ''),
		'class3' => Request::val('class3', ''),
		'category' => Request::val('category', ''),
	];


	// hook: class_dictionary4_before_insert
	if(function_exists('class_dictionary4_before_insert')) {
		$args = [];
		if(!class_dictionary4_before_insert($data, getMemberInfo(), $args)) {
			if(isset($args['error_message'])) $error_message = $args['error_message'];
			return false;
		}
	}

	$error = '';
	// set empty fields to NULL
	$data = array_map(function($v) { return ($v === '' ? NULL : $v); }, $data);
	insert('class_dictionary4', backtick_keys_once($data), $error);
	if($error)
		die("{$error}<br><a href=\"#\" onclick=\"history.go(-1);\">{$Translation['< back']}</a>");

	$recID = db_insert_id(db_link());

	update_calc_fields('class_dictionary4', $recID, calculated_fields()['class_dictionary4']);

	// hook: class_dictionary4_after_insert
	if(function_exists('class_dictionary4_after_insert')) {
		$res = sql("SELECT * FROM `class_dictionary4` WHERE `id`='" . makeSafe($recID, false) . "' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)) {
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args=[];
		if(!class_dictionary4_after_insert($data, getMemberInfo(), $args)) { return $recID; }
	}

	// mm: save ownership data
	set_record_owner('class_dictionary4', $recID, getLoggedMemberID());

	// if this record is a copy of another record, copy children if applicable
	if(!empty($_REQUEST['SelectedID'])) class_dictionary4_copy_children($recID, $_REQUEST['SelectedID']);

	return $recID;
}

function class_dictionary4_copy_children($destination_id, $source_id) {
	global $Translation;
	$requests = []; // array of curl handlers for launching insert requests
	$eo = ['silentErrors' => true];
	$safe_sid = makeSafe($source_id);

	// launch requests, asynchronously
	curl_batch($requests);
}

function class_dictionary4_delete($selected_id, $AllowDeleteOfParents = false, $skipChecks = false) {
	// insure referential integrity ...
	global $Translation;
	$selected_id = makeSafe($selected_id);

	// mm: can member delete record?
	if(!check_record_permission('class_dictionary4', $selected_id, 'delete')) {
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: class_dictionary4_before_delete
	if(function_exists('class_dictionary4_before_delete')) {
		$args = [];
		if(!class_dictionary4_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'] . (
				!empty($args['error_message']) ?
					'<div class="text-bold">' . strip_tags($args['error_message']) . '</div>'
					: '' 
			);
	}

	// child table: class_dictionary5
	$res = sql("SELECT `id` FROM `class_dictionary4` WHERE `id`='{$selected_id}'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("SELECT COUNT(1) FROM `class_dictionary5` WHERE `class4`='" . makeSafe($id[0]) . "'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'class_dictionary5', $RetMsg);
		return $RetMsg;
	} elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks) {
		$RetMsg = $Translation['confirm delete'];
		$RetMsg = str_replace('<RelatedRecords>', $rirow[0], $RetMsg);
		$RetMsg = str_replace('<TableName>', 'class_dictionary5', $RetMsg);
		$RetMsg = str_replace('<Delete>', '<input type="button" class="button" value="' . $Translation['yes'] . '" onClick="window.location = \'class_dictionary4_view.php?SelectedID=' . urlencode($selected_id) . '&delete_x=1&confirmed=1\';">', $RetMsg);
		$RetMsg = str_replace('<Cancel>', '<input type="button" class="button" value="' . $Translation[ 'no'] . '" onClick="window.location = \'class_dictionary4_view.php?SelectedID=' . urlencode($selected_id) . '\';">', $RetMsg);
		return $RetMsg;
	}

	sql("DELETE FROM `class_dictionary4` WHERE `id`='{$selected_id}'", $eo);

	// hook: class_dictionary4_after_delete
	if(function_exists('class_dictionary4_after_delete')) {
		$args = [];
		class_dictionary4_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("DELETE FROM `membership_userrecords` WHERE `tableName`='class_dictionary4' AND `pkValue`='{$selected_id}'", $eo);
}

function class_dictionary4_update(&$selected_id, &$error_message = '') {
	global $Translation;

	// mm: can member edit record?
	if(!check_record_permission('class_dictionary4', $selected_id, 'edit')) return false;

	$data = [
		'class1' => Request::val('class1', ''),
		'class2' => Request::val('class2', ''),
		'class3' => Request::val('class3', ''),
		'category' => Request::val('category', ''),
	];

	// get existing values
	$old_data = getRecord('class_dictionary4', $selected_id);
	if(is_array($old_data)) {
		$old_data = array_map('makeSafe', $old_data);
		$old_data['selectedID'] = makeSafe($selected_id);
	}

	$data['selectedID'] = makeSafe($selected_id);

	// hook: class_dictionary4_before_update
	if(function_exists('class_dictionary4_before_update')) {
		$args = ['old_data' => $old_data];
		if(!class_dictionary4_before_update($data, getMemberInfo(), $args)) {
			if(isset($args['error_message'])) $error_message = $args['error_message'];
			return false;
		}
	}

	$set = $data; unset($set['selectedID']);
	foreach ($set as $field => $value) {
		$set[$field] = ($value !== '' && $value !== NULL) ? $value : NULL;
	}

	if(!update(
		'class_dictionary4', 
		backtick_keys_once($set), 
		['`id`' => $selected_id], 
		$error_message
	)) {
		echo $error_message;
		echo '<a href="class_dictionary4_view.php?SelectedID=' . urlencode($selected_id) . "\">{$Translation['< back']}</a>";
		exit;
	}


	$eo = ['silentErrors' => true];

	update_calc_fields('class_dictionary4', $data['selectedID'], calculated_fields()['class_dictionary4']);

	// hook: class_dictionary4_after_update
	if(function_exists('class_dictionary4_after_update')) {
		$res = sql("SELECT * FROM `class_dictionary4` WHERE `id`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)) $data = array_map('makeSafe', $row);

		$data['selectedID'] = $data['id'];
		$args = ['old_data' => $old_data];
		if(!class_dictionary4_after_update($data, getMemberInfo(), $args)) return;
	}

	// mm: update ownership data
	sql("UPDATE `membership_userrecords` SET `dateUpdated`='" . time() . "' WHERE `tableName`='class_dictionary4' AND `pkValue`='" . makeSafe($selected_id) . "'", $eo);
}

function class_dictionary4_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $ShowCancel = 0, $TemplateDV = '', $TemplateDVP = '') {
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;

	// mm: get table permissions
	$arrPerm = getTablePermissions('class_dictionary4');
	if(!$arrPerm['insert'] && $selected_id=='') { return ''; }
	$AllowInsert = ($arrPerm['insert'] ? true : false);
	// print preview?
	$dvprint = false;
	if($selected_id && $_REQUEST['dvprint_x'] != '') {
		$dvprint = true;
	}

	$filterer_class1 = thisOr($_REQUEST['filterer_class1'], '');
	$filterer_class2 = thisOr($_REQUEST['filterer_class2'], '');
	$filterer_class3 = thisOr($_REQUEST['filterer_class3'], '');

	// populate filterers, starting from children to grand-parents
	if($filterer_class2 && !$filterer_class1) $filterer_class1 = sqlValue("select class1 from class_dictionary2 where id='" . makeSafe($filterer_class2) . "'");
	if($filterer_class3 && !$filterer_class1) $filterer_class1 = sqlValue("select class1 from class_dictionary3 where id='" . makeSafe($filterer_class3) . "'");
	if($filterer_class3 && !$filterer_class2) $filterer_class2 = sqlValue("select class2 from class_dictionary3 where id='" . makeSafe($filterer_class3) . "'");

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');
	// combobox: class1
	$combo_class1 = new DataCombo;
	// combobox: class2, filterable by: class1
	$combo_class2 = new DataCombo;
	// combobox: class3, filterable by: class1,class2
	$combo_class3 = new DataCombo;

	if($selected_id) {
		// mm: check member permissions
		if(!$arrPerm['view']) return '';

		// mm: who is the owner?
		$ownerGroupID = sqlValue("SELECT `groupID` FROM `membership_userrecords` WHERE `tableName`='class_dictionary4' AND `pkValue`='" . makeSafe($selected_id) . "'");
		$ownerMemberID = sqlValue("SELECT LCASE(`memberID`) FROM `membership_userrecords` WHERE `tableName`='class_dictionary4' AND `pkValue`='" . makeSafe($selected_id) . "'");

		if($arrPerm['view'] == 1 && getLoggedMemberID() != $ownerMemberID) return '';
		if($arrPerm['view'] == 2 && getLoggedGroupID() != $ownerGroupID) return '';

		// can edit?
		$AllowUpdate = 0;
		if(($arrPerm['edit'] == 1 && $ownerMemberID == getLoggedMemberID()) || ($arrPerm['edit'] == 2 && $ownerGroupID == getLoggedGroupID()) || $arrPerm['edit'] == 3) {
			$AllowUpdate = 1;
		}

		$res = sql("SELECT * FROM `class_dictionary4` WHERE `id`='" . makeSafe($selected_id) . "'", $eo);
		if(!($row = db_fetch_array($res))) {
			return error_message($Translation['No records found'], 'class_dictionary4_view.php', false);
		}
		$combo_class1->SelectedData = $row['class1'];
		$combo_class2->SelectedData = $row['class2'];
		$combo_class3->SelectedData = $row['class3'];
		$urow = $row; /* unsanitized data */
		$hc = new CI_Input(datalist_db_encoding);
		$row = $hc->xss_clean($row); /* sanitize data */
	} else {
		$combo_class1->SelectedData = $filterer_class1;
		$combo_class2->SelectedData = $filterer_class2;
		$combo_class3->SelectedData = $filterer_class3;
	}
	$combo_class1->HTML = '<span id="class1-container' . $rnd1 . '"></span><input type="hidden" name="class1" id="class1' . $rnd1 . '" value="' . html_attr($combo_class1->SelectedData) . '">';
	$combo_class1->MatchText = '<span id="class1-container-readonly' . $rnd1 . '"></span><input type="hidden" name="class1" id="class1' . $rnd1 . '" value="' . html_attr($combo_class1->SelectedData) . '">';
	$combo_class2->HTML = '<span id="class2-container' . $rnd1 . '"></span><input type="hidden" name="class2" id="class2' . $rnd1 . '" value="' . html_attr($combo_class2->SelectedData) . '">';
	$combo_class2->MatchText = '<span id="class2-container-readonly' . $rnd1 . '"></span><input type="hidden" name="class2" id="class2' . $rnd1 . '" value="' . html_attr($combo_class2->SelectedData) . '">';
	$combo_class3->HTML = '<span id="class3-container' . $rnd1 . '"></span><input type="hidden" name="class3" id="class3' . $rnd1 . '" value="' . html_attr($combo_class3->SelectedData) . '">';
	$combo_class3->MatchText = '<span id="class3-container-readonly' . $rnd1 . '"></span><input type="hidden" name="class3" id="class3' . $rnd1 . '" value="' . html_attr($combo_class3->SelectedData) . '">';

	ob_start();
	?>

	<script>
		// initial lookup values
		AppGini.current_class1__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['class1'] : $filterer_class1); ?>"};
		AppGini.current_class2__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['class2'] : $filterer_class2); ?>"};
		AppGini.current_class3__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['class3'] : $filterer_class3); ?>"};

		jQuery(function() {
			setTimeout(function() {
				if(typeof(class1_reload__RAND__) == 'function') class1_reload__RAND__();
				<?php echo (!$AllowUpdate || $dvprint ? 'if(typeof(class2_reload__RAND__) == \'function\') class2_reload__RAND__(AppGini.current_class1__RAND__.value);' : ''); ?>
				<?php echo (!$AllowUpdate || $dvprint ? 'if(typeof(class3_reload__RAND__) == \'function\') class3_reload__RAND__(AppGini.current_class1__RAND__.value, AppGini.current_class2__RAND__.value);' : ''); ?>
			}, 50); /* we need to slightly delay client-side execution of the above code to allow AppGini.ajaxCache to work */
		});
		function class1_reload__RAND__() {
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint) { ?>

			$j("#class1-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c) {
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { id: AppGini.current_class1__RAND__.value, t: 'class_dictionary4', f: 'class1' },
						success: function(resp) {
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="class1"]').val(resp.results[0].id);
							$j('[id=class1-container-readonly__RAND__]').html('<span id="class1-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dictionary1_view_parent]').hide(); } else { $j('.btn[id=class_dictionary1_view_parent]').show(); }

						if(typeof(class2_reload__RAND__) == 'function') class2_reload__RAND__(AppGini.current_class1__RAND__.value);

							if(typeof(class1_update_autofills__RAND__) == 'function') class1_update_autofills__RAND__();
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
					data: function(term, page) { return { s: term, p: page, t: 'class_dictionary4', f: 'class1' }; },
					results: function(resp, page) { return resp; }
				},
				escapeMarkup: function(str) { return str; }
			}).on('change', function(e) {
				AppGini.current_class1__RAND__.value = e.added.id;
				AppGini.current_class1__RAND__.text = e.added.text;
				$j('[name="class1"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dictionary1_view_parent]').hide(); } else { $j('.btn[id=class_dictionary1_view_parent]').show(); }

						if(typeof(class2_reload__RAND__) == 'function') class2_reload__RAND__(AppGini.current_class1__RAND__.value);

				if(typeof(class1_update_autofills__RAND__) == 'function') class1_update_autofills__RAND__();
			});

			if(!$j("#class1-container__RAND__").length) {
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_class1__RAND__.value, t: 'class_dictionary4', f: 'class1' },
					success: function(resp) {
						$j('[name="class1"]').val(resp.results[0].id);
						$j('[id=class1-container-readonly__RAND__]').html('<span id="class1-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dictionary1_view_parent]').hide(); } else { $j('.btn[id=class_dictionary1_view_parent]').show(); }

						if(typeof(class1_update_autofills__RAND__) == 'function') class1_update_autofills__RAND__();
					}
				});
			}

		<?php } else { ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_class1__RAND__.value, t: 'class_dictionary4', f: 'class1' },
				success: function(resp) {
					$j('[id=class1-container__RAND__], [id=class1-container-readonly__RAND__]').html('<span id="class1-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dictionary1_view_parent]').hide(); } else { $j('.btn[id=class_dictionary1_view_parent]').show(); }

					if(typeof(class1_update_autofills__RAND__) == 'function') class1_update_autofills__RAND__();
				}
			});
		<?php } ?>

		}
		function class2_reload__RAND__(filterer_class1) {
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint) { ?>

			$j("#class2-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c) {
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { filterer_class1: filterer_class1, id: AppGini.current_class2__RAND__.value, t: 'class_dictionary4', f: 'class2' },
						success: function(resp) {
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="class2"]').val(resp.results[0].id);
							$j('[id=class2-container-readonly__RAND__]').html('<span id="class2-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dictionary2_view_parent]').hide(); } else { $j('.btn[id=class_dictionary2_view_parent]').show(); }

						if(typeof(class3_reload__RAND__) == 'function') class3_reload__RAND__($j('#class1').val(), AppGini.current_class2__RAND__.value);

							if(typeof(class2_update_autofills__RAND__) == 'function') class2_update_autofills__RAND__();
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
					data: function(term, page) { return { filterer_class1: filterer_class1, s: term, p: page, t: 'class_dictionary4', f: 'class2' }; },
					results: function(resp, page) { return resp; }
				},
				escapeMarkup: function(str) { return str; }
			}).on('change', function(e) {
				AppGini.current_class2__RAND__.value = e.added.id;
				AppGini.current_class2__RAND__.text = e.added.text;
				$j('[name="class2"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dictionary2_view_parent]').hide(); } else { $j('.btn[id=class_dictionary2_view_parent]').show(); }

						if(typeof(class3_reload__RAND__) == 'function') class3_reload__RAND__($j('#class1').val(), AppGini.current_class2__RAND__.value);

				if(typeof(class2_update_autofills__RAND__) == 'function') class2_update_autofills__RAND__();
			});

			if(!$j("#class2-container__RAND__").length) {
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_class2__RAND__.value, t: 'class_dictionary4', f: 'class2' },
					success: function(resp) {
						$j('[name="class2"]').val(resp.results[0].id);
						$j('[id=class2-container-readonly__RAND__]').html('<span id="class2-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dictionary2_view_parent]').hide(); } else { $j('.btn[id=class_dictionary2_view_parent]').show(); }

						if(typeof(class2_update_autofills__RAND__) == 'function') class2_update_autofills__RAND__();
					}
				});
			}

		<?php } else { ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_class2__RAND__.value, t: 'class_dictionary4', f: 'class2' },
				success: function(resp) {
					$j('[id=class2-container__RAND__], [id=class2-container-readonly__RAND__]').html('<span id="class2-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dictionary2_view_parent]').hide(); } else { $j('.btn[id=class_dictionary2_view_parent]').show(); }

					if(typeof(class2_update_autofills__RAND__) == 'function') class2_update_autofills__RAND__();
				}
			});
		<?php } ?>

		}
		function class3_reload__RAND__(filterer_class1, filterer_class2) {
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint) { ?>

			$j("#class3-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c) {
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { filterer_class1: filterer_class1, filterer_class2: filterer_class2, id: AppGini.current_class3__RAND__.value, t: 'class_dictionary4', f: 'class3' },
						success: function(resp) {
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="class3"]').val(resp.results[0].id);
							$j('[id=class3-container-readonly__RAND__]').html('<span id="class3-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dictionary3_view_parent]').hide(); } else { $j('.btn[id=class_dictionary3_view_parent]').show(); }


							if(typeof(class3_update_autofills__RAND__) == 'function') class3_update_autofills__RAND__();
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
					data: function(term, page) { return { filterer_class1: filterer_class1, filterer_class2: filterer_class2, s: term, p: page, t: 'class_dictionary4', f: 'class3' }; },
					results: function(resp, page) { return resp; }
				},
				escapeMarkup: function(str) { return str; }
			}).on('change', function(e) {
				AppGini.current_class3__RAND__.value = e.added.id;
				AppGini.current_class3__RAND__.text = e.added.text;
				$j('[name="class3"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dictionary3_view_parent]').hide(); } else { $j('.btn[id=class_dictionary3_view_parent]').show(); }


				if(typeof(class3_update_autofills__RAND__) == 'function') class3_update_autofills__RAND__();
			});

			if(!$j("#class3-container__RAND__").length) {
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_class3__RAND__.value, t: 'class_dictionary4', f: 'class3' },
					success: function(resp) {
						$j('[name="class3"]').val(resp.results[0].id);
						$j('[id=class3-container-readonly__RAND__]').html('<span id="class3-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dictionary3_view_parent]').hide(); } else { $j('.btn[id=class_dictionary3_view_parent]').show(); }

						if(typeof(class3_update_autofills__RAND__) == 'function') class3_update_autofills__RAND__();
					}
				});
			}

		<?php } else { ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_class3__RAND__.value, t: 'class_dictionary4', f: 'class3' },
				success: function(resp) {
					$j('[id=class3-container__RAND__], [id=class3-container-readonly__RAND__]').html('<span id="class3-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>') { $j('.btn[id=class_dictionary3_view_parent]').hide(); } else { $j('.btn[id=class_dictionary3_view_parent]').show(); }

					if(typeof(class3_update_autofills__RAND__) == 'function') class3_update_autofills__RAND__();
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
		$template_file = is_file("./{$TemplateDVP}") ? "./{$TemplateDVP}" : './templates/class_dictionary4_templateDVP.html';
		$templateCode = @file_get_contents($template_file);
	} else {
		$template_file = is_file("./{$TemplateDV}") ? "./{$TemplateDV}" : './templates/class_dictionary4_templateDV.html';
		$templateCode = @file_get_contents($template_file);
	}

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Class dictionary1 details', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', ($_REQUEST['Embedded'] ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($AllowInsert) {
		if(!$selected_id) $templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return class_dictionary4_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return class_dictionary4_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
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
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return class_dictionary4_validateData();" title="' . html_attr($Translation['Save Changes']) . '"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
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
		$jsReadOnly .= "\tjQuery('#class1').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#class1_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('#class2').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#class2_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('#class3').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#class3_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('#category').replaceWith('<div class=\"form-control-static\" id=\"category\">' + (jQuery('#category').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('.select2-container').hide();\n";

		$noUploads = true;
	} elseif($AllowInsert) {
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
			$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos
	$templateCode = str_replace('<%%COMBO(class1)%%>', $combo_class1->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(class1)%%>', $combo_class1->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(class1)%%>', urlencode($combo_class1->MatchText), $templateCode);
	$templateCode = str_replace('<%%COMBO(class2)%%>', $combo_class2->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(class2)%%>', $combo_class2->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(class2)%%>', urlencode($combo_class2->MatchText), $templateCode);
	$templateCode = str_replace('<%%COMBO(class3)%%>', $combo_class3->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(class3)%%>', $combo_class3->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(class3)%%>', urlencode($combo_class3->MatchText), $templateCode);

	/* lookup fields array: 'lookup field name' => array('parent table name', 'lookup field caption') */
	$lookup_fields = array('class1' => array('class_dictionary1', 'Class1'), 'class2' => array('class_dictionary2', 'Class2'), 'class3' => array('class_dictionary3', 'Class3'), );
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
	$templateCode = str_replace('<%%UPLOADFILE(class1)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(class2)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(class3)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(category)%%>', '', $templateCode);

	// process values
	if($selected_id) {
		if( $dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', safe_html($urow['id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', html_attr($row['id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode($urow['id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(class1)%%>', safe_html($urow['class1']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(class1)%%>', html_attr($row['class1']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(class1)%%>', urlencode($urow['class1']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(class2)%%>', safe_html($urow['class2']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(class2)%%>', html_attr($row['class2']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(class2)%%>', urlencode($urow['class2']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(class3)%%>', safe_html($urow['class3']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(class3)%%>', html_attr($row['class3']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(class3)%%>', urlencode($urow['class3']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(category)%%>', safe_html($urow['category']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(category)%%>', html_attr($row['category']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(category)%%>', urlencode($urow['category']), $templateCode);
	} else {
		$templateCode = str_replace('<%%VALUE(id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(class1)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(class1)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(class2)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(class2)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(class3)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(class3)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(category)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(category)%%>', urlencode(''), $templateCode);
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
	$rdata = $jdata = get_defaults('class_dictionary4');
	if($selected_id) {
		$jdata = get_joined_record('class_dictionary4', $selected_id);
		if($jdata === false) $jdata = get_defaults('class_dictionary4');
		$rdata = $row;
	}
	$templateCode .= loadView('class_dictionary4-ajax-cache', array('rdata' => $rdata, 'jdata' => $jdata));

	// hook: class_dictionary4_dv
	if(function_exists('class_dictionary4_dv')) {
		$args=[];
		class_dictionary4_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}