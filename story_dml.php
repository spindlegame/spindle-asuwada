<?php

// Data functions (insert, update, delete, form) for table story

// This script and data application were generated by AppGini 5.76
// Download AppGini for free from https://bigprof.com/appgini/download/

function story_insert(){
	global $Translation;

	// mm: can member insert record?
	$arrPerm=getTablePermissions('story');
	if(!$arrPerm[1]){
		return false;
	}

	$data['com_name'] = makeSafe($_REQUEST['com_name']);
		if($data['com_name'] == empty_lookup_value){ $data['com_name'] = ''; }
	$data['project_leader'] = makeSafe($_REQUEST['project_leader']);
		if($data['project_leader'] == empty_lookup_value){ $data['project_leader'] = ''; }
	$data['subject'] = makeSafe($_REQUEST['subject']);
		if($data['subject'] == empty_lookup_value){ $data['subject'] = ''; }
	$data['story'] = makeSafe($_REQUEST['story']);
		if($data['story'] == empty_lookup_value){ $data['story'] = ''; }
	$data['approach'] = makeSafe($_REQUEST['approach']);
		if($data['approach'] == empty_lookup_value){ $data['approach'] = ''; }
	$data['tags'] = makeSafe($_REQUEST['tags']);
		if($data['tags'] == empty_lookup_value){ $data['tags'] = ''; }
	$data['collaboration_status'] = makeSafe($_REQUEST['collaboration_status']);
		if($data['collaboration_status'] == empty_lookup_value){ $data['collaboration_status'] = ''; }

	// hook: story_before_insert
	if(function_exists('story_before_insert')){
		$args=array();
		if(!story_before_insert($data, getMemberInfo(), $args)){ return false; }
	}

	$o = array('silentErrors' => true);
	sql('insert into `story` set       `com_name`=' . (($data['com_name'] !== '' && $data['com_name'] !== NULL) ? "'{$data['com_name']}'" : 'NULL') . ', `project_leader`=' . (($data['project_leader'] !== '' && $data['project_leader'] !== NULL) ? "'{$data['project_leader']}'" : 'NULL') . ', `subject`=' . (($data['subject'] !== '' && $data['subject'] !== NULL) ? "'{$data['subject']}'" : 'NULL') . ', `story`=' . (($data['story'] !== '' && $data['story'] !== NULL) ? "'{$data['story']}'" : 'NULL') . ', `approach`=' . (($data['approach'] !== '' && $data['approach'] !== NULL) ? "'{$data['approach']}'" : 'NULL') . ', `tags`=' . (($data['tags'] !== '' && $data['tags'] !== NULL) ? "'{$data['tags']}'" : 'NULL') . ', `collaboration_status`=' . (($data['collaboration_status'] !== '' && $data['collaboration_status'] !== NULL) ? "'{$data['collaboration_status']}'" : 'NULL'), $o);
	if($o['error']!=''){
		echo $o['error'];
		echo "<a href=\"story_view.php?addNew_x=1\">{$Translation['< back']}</a>";
		exit;
	}

	$recID = db_insert_id(db_link());

	// hook: story_after_insert
	if(function_exists('story_after_insert')){
		$res = sql("select * from `story` where `id`='" . makeSafe($recID, false) . "' limit 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args=array();
		if(!story_after_insert($data, getMemberInfo(), $args)){ return $recID; }
	}

	// mm: save ownership data
	set_record_owner('story', $recID, getLoggedMemberID());

	return $recID;
}

function story_delete($selected_id, $AllowDeleteOfParents=false, $skipChecks=false){
	// insure referential integrity ...
	global $Translation;
	$selected_id=makeSafe($selected_id);

	// mm: can member delete record?
	$arrPerm=getTablePermissions('story');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='story' and pkValue='$selected_id'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='story' and pkValue='$selected_id'");
	if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
		// delete allowed, so continue ...
	}else{
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: story_before_delete
	if(function_exists('story_before_delete')){
		$args=array();
		if(!story_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'];
	}

	// child table: storylines
	$res = sql("select `id` from `story` where `id`='$selected_id'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("select count(1) from `storylines` where `story`='".addslashes($id[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "storylines", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "storylines", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='story_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='story_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: story_chrs
	$res = sql("select `id` from `story` where `id`='$selected_id'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("select count(1) from `story_chrs` where `story`='".addslashes($id[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "story_chrs", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "story_chrs", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='story_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='story_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: storystatic
	$res = sql("select `id` from `story` where `id`='$selected_id'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("select count(1) from `storystatic` where `story`='".addslashes($id[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "storystatic", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "storystatic", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='story_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='story_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: storydynamic
	$res = sql("select `id` from `story` where `id`='$selected_id'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("select count(1) from `storydynamic` where `story`='".addslashes($id[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "storydynamic", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "storydynamic", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='story_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='story_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: storyweaving_scenes
	$res = sql("select `id` from `story` where `id`='$selected_id'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("select count(1) from `storyweaving_scenes` where `story`='".addslashes($id[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "storyweaving_scenes", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "storyweaving_scenes", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='story_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='story_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	sql("delete from `story` where `id`='$selected_id'", $eo);

	// hook: story_after_delete
	if(function_exists('story_after_delete')){
		$args=array();
		story_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("delete from membership_userrecords where tableName='story' and pkValue='$selected_id'", $eo);
}

function story_update($selected_id){
	global $Translation;

	// mm: can member edit record?
	$arrPerm=getTablePermissions('story');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='story' and pkValue='".makeSafe($selected_id)."'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='story' and pkValue='".makeSafe($selected_id)."'");
	if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){ // allow update?
		// update allowed, so continue ...
	}else{
		return false;
	}

	$data['com_name'] = makeSafe($_REQUEST['com_name']);
		if($data['com_name'] == empty_lookup_value){ $data['com_name'] = ''; }
	$data['project_leader'] = makeSafe($_REQUEST['project_leader']);
		if($data['project_leader'] == empty_lookup_value){ $data['project_leader'] = ''; }
	$data['subject'] = makeSafe($_REQUEST['subject']);
		if($data['subject'] == empty_lookup_value){ $data['subject'] = ''; }
	$data['story'] = makeSafe($_REQUEST['story']);
		if($data['story'] == empty_lookup_value){ $data['story'] = ''; }
	$data['approach'] = makeSafe($_REQUEST['approach']);
		if($data['approach'] == empty_lookup_value){ $data['approach'] = ''; }
	$data['tags'] = makeSafe($_REQUEST['tags']);
		if($data['tags'] == empty_lookup_value){ $data['tags'] = ''; }
	$data['collaboration_status'] = makeSafe($_REQUEST['collaboration_status']);
		if($data['collaboration_status'] == empty_lookup_value){ $data['collaboration_status'] = ''; }
	$data['selectedID']=makeSafe($selected_id);

	// hook: story_before_update
	if(function_exists('story_before_update')){
		$args=array();
		if(!story_before_update($data, getMemberInfo(), $args)){ return false; }
	}

	$o=array('silentErrors' => true);
	sql('update `story` set       `com_name`=' . (($data['com_name'] !== '' && $data['com_name'] !== NULL) ? "'{$data['com_name']}'" : 'NULL') . ', `project_leader`=' . (($data['project_leader'] !== '' && $data['project_leader'] !== NULL) ? "'{$data['project_leader']}'" : 'NULL') . ', `subject`=' . (($data['subject'] !== '' && $data['subject'] !== NULL) ? "'{$data['subject']}'" : 'NULL') . ', `story`=' . (($data['story'] !== '' && $data['story'] !== NULL) ? "'{$data['story']}'" : 'NULL') . ', `approach`=' . (($data['approach'] !== '' && $data['approach'] !== NULL) ? "'{$data['approach']}'" : 'NULL') . ', `tags`=' . (($data['tags'] !== '' && $data['tags'] !== NULL) ? "'{$data['tags']}'" : 'NULL') . ', `collaboration_status`=' . (($data['collaboration_status'] !== '' && $data['collaboration_status'] !== NULL) ? "'{$data['collaboration_status']}'" : 'NULL') . " where `id`='".makeSafe($selected_id)."'", $o);
	if($o['error']!=''){
		echo $o['error'];
		echo '<a href="story_view.php?SelectedID='.urlencode($selected_id)."\">{$Translation['< back']}</a>";
		exit;
	}


	// hook: story_after_update
	if(function_exists('story_after_update')){
		$res = sql("SELECT * FROM `story` WHERE `id`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = $data['id'];
		$args = array();
		if(!story_after_update($data, getMemberInfo(), $args)){ return; }
	}

	// mm: update ownership data
	sql("update membership_userrecords set dateUpdated='".time()."' where tableName='story' and pkValue='".makeSafe($selected_id)."'", $eo);

}

function story_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $ShowCancel = 0, $TemplateDV = '', $TemplateDVP = ''){
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;

	// mm: get table permissions
	$arrPerm=getTablePermissions('story');
	if(!$arrPerm[1] && $selected_id==''){ return ''; }
	$AllowInsert = ($arrPerm[1] ? true : false);
	// print preview?
	$dvprint = false;
	if($selected_id && $_REQUEST['dvprint_x'] != ''){
		$dvprint = true;
	}

	$filterer_com_name = thisOr(undo_magic_quotes($_REQUEST['filterer_com_name']), '');
	$filterer_collaboration_status = thisOr(undo_magic_quotes($_REQUEST['filterer_collaboration_status']), '');

	// populate filterers, starting from children to grand-parents

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');
	// combobox: com_name
	$combo_com_name = new DataCombo;
	// combobox: collaboration_status
	$combo_collaboration_status = new DataCombo;

	if($selected_id){
		// mm: check member permissions
		if(!$arrPerm[2]){
			return "";
		}
		// mm: who is the owner?
		$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='story' and pkValue='".makeSafe($selected_id)."'");
		$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='story' and pkValue='".makeSafe($selected_id)."'");
		if($arrPerm[2]==1 && getLoggedMemberID()!=$ownerMemberID){
			return "";
		}
		if($arrPerm[2]==2 && getLoggedGroupID()!=$ownerGroupID){
			return "";
		}

		// can edit?
		if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){
			$AllowUpdate=1;
		}else{
			$AllowUpdate=0;
		}

		$res = sql("select * from `story` where `id`='".makeSafe($selected_id)."'", $eo);
		if(!($row = db_fetch_array($res))){
			return error_message($Translation['No records found'], 'story_view.php', false);
		}
		$urow = $row; /* unsanitized data */
		$hc = new CI_Input();
		$row = $hc->xss_clean($row); /* sanitize data */
		$combo_com_name->SelectedData = $row['com_name'];
		$combo_collaboration_status->SelectedData = $row['collaboration_status'];
	}else{
		$combo_com_name->SelectedData = $filterer_com_name;
		$combo_collaboration_status->SelectedData = $filterer_collaboration_status;
	}
	$combo_com_name->HTML = '<span id="com_name-container' . $rnd1 . '"></span><input type="hidden" name="com_name" id="com_name' . $rnd1 . '" value="' . html_attr($combo_com_name->SelectedData) . '">';
	$combo_com_name->MatchText = '<span id="com_name-container-readonly' . $rnd1 . '"></span><input type="hidden" name="com_name" id="com_name' . $rnd1 . '" value="' . html_attr($combo_com_name->SelectedData) . '">';
	$combo_collaboration_status->HTML = '<span id="collaboration_status-container' . $rnd1 . '"></span><input type="hidden" name="collaboration_status" id="collaboration_status' . $rnd1 . '" value="' . html_attr($combo_collaboration_status->SelectedData) . '">';
	$combo_collaboration_status->MatchText = '<span id="collaboration_status-container-readonly' . $rnd1 . '"></span><input type="hidden" name="collaboration_status" id="collaboration_status' . $rnd1 . '" value="' . html_attr($combo_collaboration_status->SelectedData) . '">';

	ob_start();
	?>

	<script>
		// initial lookup values
		AppGini.current_com_name__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['com_name'] : $filterer_com_name); ?>"};
		AppGini.current_collaboration_status__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['collaboration_status'] : $filterer_collaboration_status); ?>"};

		jQuery(function() {
			setTimeout(function(){
				if(typeof(com_name_reload__RAND__) == 'function') com_name_reload__RAND__();
				if(typeof(collaboration_status_reload__RAND__) == 'function') collaboration_status_reload__RAND__();
			}, 10); /* we need to slightly delay client-side execution of the above code to allow AppGini.ajaxCache to work */
		});
		function com_name_reload__RAND__(){
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint){ ?>

			$j("#com_name-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c){
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { id: AppGini.current_com_name__RAND__.value, t: 'story', f: 'com_name' },
						success: function(resp){
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="com_name"]').val(resp.results[0].id);
							$j('[id=com_name-container-readonly__RAND__]').html('<span id="com_name-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=biblio_community_view_parent]').hide(); }else{ $j('.btn[id=biblio_community_view_parent]').show(); }


							if(typeof(com_name_update_autofills__RAND__) == 'function') com_name_update_autofills__RAND__();
						}
					});
				},
				width: '100%',
				formatNoMatches: function(term){ /* */ return '<?php echo addslashes($Translation['No matches found!']); ?>'; },
				minimumResultsForSearch: 5,
				loadMorePadding: 200,
				ajax: {
					url: 'ajax_combo.php',
					dataType: 'json',
					cache: true,
					data: function(term, page){ /* */ return { s: term, p: page, t: 'story', f: 'com_name' }; },
					results: function(resp, page){ /* */ return resp; }
				},
				escapeMarkup: function(str){ /* */ return str; }
			}).on('change', function(e){
				AppGini.current_com_name__RAND__.value = e.added.id;
				AppGini.current_com_name__RAND__.text = e.added.text;
				$j('[name="com_name"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=biblio_community_view_parent]').hide(); }else{ $j('.btn[id=biblio_community_view_parent]').show(); }


				if(typeof(com_name_update_autofills__RAND__) == 'function') com_name_update_autofills__RAND__();
			});

			if(!$j("#com_name-container__RAND__").length){
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_com_name__RAND__.value, t: 'story', f: 'com_name' },
					success: function(resp){
						$j('[name="com_name"]').val(resp.results[0].id);
						$j('[id=com_name-container-readonly__RAND__]').html('<span id="com_name-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=biblio_community_view_parent]').hide(); }else{ $j('.btn[id=biblio_community_view_parent]').show(); }

						if(typeof(com_name_update_autofills__RAND__) == 'function') com_name_update_autofills__RAND__();
					}
				});
			}

		<?php }else{ ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_com_name__RAND__.value, t: 'story', f: 'com_name' },
				success: function(resp){
					$j('[id=com_name-container__RAND__], [id=com_name-container-readonly__RAND__]').html('<span id="com_name-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=biblio_community_view_parent]').hide(); }else{ $j('.btn[id=biblio_community_view_parent]').show(); }

					if(typeof(com_name_update_autofills__RAND__) == 'function') com_name_update_autofills__RAND__();
				}
			});
		<?php } ?>

		}
		function collaboration_status_reload__RAND__(){
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint){ ?>

			$j("#collaboration_status-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c){
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { id: AppGini.current_collaboration_status__RAND__.value, t: 'story', f: 'collaboration_status' },
						success: function(resp){
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="collaboration_status"]').val(resp.results[0].id);
							$j('[id=collaboration_status-container-readonly__RAND__]').html('<span id="collaboration_status-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=class_story_collab_type_view_parent]').hide(); }else{ $j('.btn[id=class_story_collab_type_view_parent]').show(); }


							if(typeof(collaboration_status_update_autofills__RAND__) == 'function') collaboration_status_update_autofills__RAND__();
						}
					});
				},
				width: '100%',
				formatNoMatches: function(term){ /* */ return '<?php echo addslashes($Translation['No matches found!']); ?>'; },
				minimumResultsForSearch: 5,
				loadMorePadding: 200,
				ajax: {
					url: 'ajax_combo.php',
					dataType: 'json',
					cache: true,
					data: function(term, page){ /* */ return { s: term, p: page, t: 'story', f: 'collaboration_status' }; },
					results: function(resp, page){ /* */ return resp; }
				},
				escapeMarkup: function(str){ /* */ return str; }
			}).on('change', function(e){
				AppGini.current_collaboration_status__RAND__.value = e.added.id;
				AppGini.current_collaboration_status__RAND__.text = e.added.text;
				$j('[name="collaboration_status"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=class_story_collab_type_view_parent]').hide(); }else{ $j('.btn[id=class_story_collab_type_view_parent]').show(); }


				if(typeof(collaboration_status_update_autofills__RAND__) == 'function') collaboration_status_update_autofills__RAND__();
			});

			if(!$j("#collaboration_status-container__RAND__").length){
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_collaboration_status__RAND__.value, t: 'story', f: 'collaboration_status' },
					success: function(resp){
						$j('[name="collaboration_status"]').val(resp.results[0].id);
						$j('[id=collaboration_status-container-readonly__RAND__]').html('<span id="collaboration_status-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=class_story_collab_type_view_parent]').hide(); }else{ $j('.btn[id=class_story_collab_type_view_parent]').show(); }

						if(typeof(collaboration_status_update_autofills__RAND__) == 'function') collaboration_status_update_autofills__RAND__();
					}
				});
			}

		<?php }else{ ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_collaboration_status__RAND__.value, t: 'story', f: 'collaboration_status' },
				success: function(resp){
					$j('[id=collaboration_status-container__RAND__], [id=collaboration_status-container-readonly__RAND__]').html('<span id="collaboration_status-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=class_story_collab_type_view_parent]').hide(); }else{ $j('.btn[id=class_story_collab_type_view_parent]').show(); }

					if(typeof(collaboration_status_update_autofills__RAND__) == 'function') collaboration_status_update_autofills__RAND__();
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
	if($dvprint){
		$template_file = is_file("./{$TemplateDVP}") ? "./{$TemplateDVP}" : './templates/story_templateDVP.html';
		$templateCode = @file_get_contents($template_file);
	}else{
		$template_file = is_file("./{$TemplateDV}") ? "./{$TemplateDV}" : './templates/story_templateDV.html';
		$templateCode = @file_get_contents($template_file);
	}

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Detail View', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', ($_REQUEST['Embedded'] ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($AllowInsert){
		if(!$selected_id) $templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return story_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return story_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
	}else{
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '', $templateCode);
	}

	// 'Back' button action
	if($_REQUEST['Embedded']){
		$backAction = 'AppGini.closeParentModal(); return false;';
	}else{
		$backAction = '$j(\'form\').eq(0).attr(\'novalidate\', \'novalidate\'); document.myform.reset(); return true;';
	}

	if($selected_id){
		if(!$_REQUEST['Embedded']) $templateCode = str_replace('<%%DVPRINT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="dvprint" name="dvprint_x" value="1" onclick="$j(\'form\').eq(0).prop(\'novalidate\', true); document.myform.reset(); return true;" title="' . html_attr($Translation['Print Preview']) . '"><i class="glyphicon glyphicon-print"></i> ' . $Translation['Print Preview'] . '</button>', $templateCode);
		if($AllowUpdate){
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return story_validateData();" title="' . html_attr($Translation['Save Changes']) . '"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
		}else{
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		}
		if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '<button type="submit" class="btn btn-danger" id="delete" name="delete_x" value="1" onclick="return confirm(\'' . $Translation['are you sure?'] . '\');" title="' . html_attr($Translation['Delete']) . '"><i class="glyphicon glyphicon-trash"></i> ' . $Translation['Delete'] . '</button>', $templateCode);
		}else{
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		}
		$templateCode = str_replace('<%%DESELECT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '" title="' . html_attr($Translation['Back']) . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>', $templateCode);
	}else{
		$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		$templateCode = str_replace('<%%DESELECT_BUTTON%%>', ($ShowCancel ? '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '" title="' . html_attr($Translation['Back']) . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>' : ''), $templateCode);
	}

	// set records to read only if user can't insert new records and can't edit current record
	if(($selected_id && !$AllowUpdate && !$AllowInsert) || (!$selected_id && !$AllowInsert)){
		$jsReadOnly .= "\tjQuery('#com_name').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#com_name_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('#project_leader').replaceWith('<div class=\"form-control-static\" id=\"project_leader\">' + (jQuery('#project_leader').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#subject').replaceWith('<div class=\"form-control-static\" id=\"subject\">' + (jQuery('#subject').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#story').replaceWith('<div class=\"form-control-static\" id=\"story\">' + (jQuery('#story').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#approach').replaceWith('<div class=\"form-control-static\" id=\"approach\">' + (jQuery('#approach').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#tags').replaceWith('<div class=\"form-control-static\" id=\"tags\">' + (jQuery('#tags').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#collaboration_status').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#collaboration_status_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('.select2-container').hide();\n";

		$noUploads = true;
	}elseif($AllowInsert){
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
			$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos
	$templateCode = str_replace('<%%COMBO(com_name)%%>', $combo_com_name->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(com_name)%%>', $combo_com_name->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(com_name)%%>', urlencode($combo_com_name->MatchText), $templateCode);
	$templateCode = str_replace('<%%COMBO(collaboration_status)%%>', $combo_collaboration_status->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(collaboration_status)%%>', $combo_collaboration_status->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(collaboration_status)%%>', urlencode($combo_collaboration_status->MatchText), $templateCode);

	/* lookup fields array: 'lookup field name' => array('parent table name', 'lookup field caption') */
	$lookup_fields = array(  'com_name' => array('biblio_community', 'Comm name'), 'collaboration_status' => array('class_story_collab_type', 'Collaboration status'));
	foreach($lookup_fields as $luf => $ptfc){
		$pt_perm = getTablePermissions($ptfc[0]);

		// process foreign key links
		if($pt_perm['view'] || $pt_perm['edit']){
			$templateCode = str_replace("<%%PLINK({$luf})%%>", '<button type="button" class="btn btn-default view_parent hspacer-md" id="' . $ptfc[0] . '_view_parent" title="' . html_attr($Translation['View'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-eye-open"></i></button>', $templateCode);
		}

		// if user has insert permission to parent table of a lookup field, put an add new button
		if($pt_perm['insert'] && !$_REQUEST['Embedded']){
			$templateCode = str_replace("<%%ADDNEW({$ptfc[0]})%%>", '<button type="button" class="btn btn-success add_new_parent hspacer-md" id="' . $ptfc[0] . '_add_new" title="' . html_attr($Translation['Add New'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-plus-sign"></i></button>', $templateCode);
		}
	}

	// process images
	$templateCode = str_replace('<%%UPLOADFILE(id)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(com_name)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(project_leader)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(subject)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(story)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(approach)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(tags)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(collaboration_status)%%>', '', $templateCode);

	// process values
	if($selected_id){
		if( $dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', safe_html($urow['id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', html_attr($row['id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode($urow['id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(com_name)%%>', safe_html($urow['com_name']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(com_name)%%>', html_attr($row['com_name']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(com_name)%%>', urlencode($urow['com_name']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(project_leader)%%>', safe_html($urow['project_leader']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(project_leader)%%>', html_attr($row['project_leader']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(project_leader)%%>', urlencode($urow['project_leader']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(subject)%%>', safe_html($urow['subject']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(subject)%%>', html_attr($row['subject']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(subject)%%>', urlencode($urow['subject']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(story)%%>', safe_html($urow['story']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(story)%%>', html_attr($row['story']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(story)%%>', urlencode($urow['story']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(approach)%%>', safe_html($urow['approach']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(approach)%%>', html_attr($row['approach']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(approach)%%>', urlencode($urow['approach']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(tags)%%>', safe_html($urow['tags']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(tags)%%>', html_attr($row['tags']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(tags)%%>', urlencode($urow['tags']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(collaboration_status)%%>', safe_html($urow['collaboration_status']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(collaboration_status)%%>', html_attr($row['collaboration_status']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(collaboration_status)%%>', urlencode($urow['collaboration_status']), $templateCode);
	}else{
		$templateCode = str_replace('<%%VALUE(id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(com_name)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(com_name)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(project_leader)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(project_leader)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(subject)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(subject)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(story)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(story)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(approach)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(approach)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(tags)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(tags)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(collaboration_status)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(collaboration_status)%%>', urlencode(''), $templateCode);
	}

	// process translations
	foreach($Translation as $symbol=>$trans){
		$templateCode = str_replace("<%%TRANSLATION($symbol)%%>", $trans, $templateCode);
	}

	// clear scrap
	$templateCode = str_replace('<%%', '<!-- ', $templateCode);
	$templateCode = str_replace('%%>', ' -->', $templateCode);

	// hide links to inaccessible tables
	if($_REQUEST['dvprint_x'] == ''){
		$templateCode .= "\n\n<script>\$j(function(){\n";
		$arrTables = getTableList();
		foreach($arrTables as $name => $caption){
			$templateCode .= "\t\$j('#{$name}_link').removeClass('hidden');\n";
			$templateCode .= "\t\$j('#xs_{$name}_link').removeClass('hidden');\n";
		}

		$templateCode .= $jsReadOnly;
		$templateCode .= $jsEditable;

		if(!$selected_id){
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
	$rdata = $jdata = get_defaults('story');
	if($selected_id){
		$jdata = get_joined_record('story', $selected_id);
		if($jdata === false) $jdata = get_defaults('story');
		$rdata = $row;
	}
	$templateCode .= loadView('story-ajax-cache', array('rdata' => $rdata, 'jdata' => $jdata));

	// hook: story_dv
	if(function_exists('story_dv')){
		$args=array();
		story_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}
?>