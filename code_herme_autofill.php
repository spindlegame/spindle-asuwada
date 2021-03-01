<?php
// This script and data application were generated by AppGini 5.76
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");

	handle_maintenance();

	header('Content-type: text/javascript; charset=' . datalist_db_encoding);

	$table_perms = getTablePermissions('code_herme');
	if(!$table_perms[0]){ die('// Access denied!'); }

	$mfk = $_GET['mfk'];
	$id = makeSafe($_GET['id']);
	$rnd1 = intval($_GET['rnd1']); if(!$rnd1) $rnd1 = '';

	if(!$mfk){
		die('// No js code available!');
	}

	switch($mfk){

		case 'author_id':
			if(!$id){
				?>
				$j('#author_name<?php echo $rnd1; ?>').html('&nbsp;');
				<?php
				break;
			}
			$res = sql("SELECT `biblio_author`.`id` as 'id', `biblio_author`.`memberID` as 'memberID', `biblio_author`.`img` as 'img', `biblio_author`.`groupID` as 'groupID', IF(    CHAR_LENGTH(`class_agent_selection1`.`selection_phase`), CONCAT_WS('',   `class_agent_selection1`.`selection_phase`), '') as 'selection_class', IF(    CHAR_LENGTH(`class_agent_type11`.`type`), CONCAT_WS('',   `class_agent_type11`.`type`), '') as 'agenttype1', IF(    CHAR_LENGTH(`class_agent_type21`.`type`), CONCAT_WS('',   `class_agent_type21`.`type`), '') as 'agenttype2', IF(    CHAR_LENGTH(`class_gender1`.`gender`), CONCAT_WS('',   `class_gender1`.`gender`), '') as 'gender', `biblio_author`.`last_name` as 'last_name', `biblio_author`.`first_name` as 'first_name', `biblio_author`.`other_name` as 'other_name', if(`biblio_author`.`birthday`,date_format(`biblio_author`.`birthday`,'%d/%m/%Y %H:%i'),'') as 'birthday', `biblio_author`.`birth_location` as 'birth_location', `biblio_author`.`birth_location_map` as 'birth_location_map', if(`biblio_author`.`deathday`,date_format(`biblio_author`.`deathday`,'%d/%m/%Y %H:%i'),'') as 'deathday', `biblio_author`.`death_location` as 'death_location', `biblio_author`.`workplace` as 'workplace', `biblio_author`.`knows` as 'knows', `biblio_author`.`shortbio` as 'shortbio', IF(    CHAR_LENGTH(`class_evaluation1`.`evaluation_type`), CONCAT_WS('',   `class_evaluation1`.`evaluation_type`), '') as 'data_evaluation', `biblio_author`.`authority_record` as 'authority_record', IF(    CHAR_LENGTH(`class_authority_agent1`.`abbreviation`) || CHAR_LENGTH(`class_authority_agent1`.`authority_name`), CONCAT_WS('',   `class_authority_agent1`.`abbreviation`, '   ', `class_authority_agent1`.`authority_name`), '') as 'authority_organization' FROM `biblio_author` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`biblio_author`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`biblio_author`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`biblio_author`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`biblio_author`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`biblio_author`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`biblio_author`.`authority_organization`  WHERE `biblio_author`.`id`='{$id}' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$j('#author_name<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['last_name'].', '.$row['first_name']))); ?>&nbsp;');
			<?php
			break;

		case 'token_sequence':
			if(!$id){
				?>
				$j('#token<?php echo $rnd1; ?>').html('&nbsp;');
				<?php
				break;
			}
			$res = sql("SELECT `biblio_token`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') as 'author_id', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`last_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`last_name`), '') as 'author_name', IF(    CHAR_LENGTH(`biblio_doc1`.`id`) || CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`id`, '   ', `biblio_doc1`.`title`), '') as 'bibliography', IF(    CHAR_LENGTH(`biblio_transcript1`.`id`) || CHAR_LENGTH(`biblio_transcript1`.`transcript_title`), CONCAT_WS('',   `biblio_transcript1`.`id`, '   ', `biblio_transcript1`.`transcript_title`), '') as 'transcript', `biblio_token`.`token_sequence` as 'token_sequence', `biblio_token`.`token` as 'token' FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`biblio_token`.`transcript`  WHERE `biblio_token`.`id`='{$id}' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$j('#token<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['token']))); ?>&nbsp;');
			<?php
			break;


	}

?>