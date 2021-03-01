<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("$currDir/lib.php");

	handle_maintenance();

	header('Content-type: text/javascript; charset=' . datalist_db_encoding);

	$table_perms = getTablePermissions('bio_chr');
	if(!$table_perms['access']) die('// Access denied!');

	$mfk = $_GET['mfk'];
	$id = makeSafe($_GET['id']);
	$rnd1 = intval($_GET['rnd1']); if(!$rnd1) $rnd1 = '';

	if(!$mfk) {
		die('// No js code available!');
	}

	switch($mfk) {

		case 'author_id':
			if(!$id) {
				?>
				$j('#author_name<?php echo $rnd1; ?>').html('&nbsp;');
				<?php
				break;
			}
			$res = sql("SELECT `bio_author`.`id` as 'id', IF(    CHAR_LENGTH(`bio_team1`.`team`), CONCAT_WS('',   `bio_team1`.`team`), '') as 'team', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') as 'author_id', IF(    CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`memberID`), '') as 'author_memberid', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`), CONCAT_WS('',   `biblio_author1`.`last_name`), '') as 'last_name', IF(    CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`first_name`), '') as 'first_name', IF(    CHAR_LENGTH(`biblio_author1`.`other_name`), CONCAT_WS('',   `biblio_author1`.`other_name`), '') as 'other_name' FROM `bio_author` LEFT JOIN `bio_team` as bio_team1 ON `bio_team1`.`id`=`bio_author`.`team` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_author`.`author_id`  WHERE `bio_author`.`id`='{$id}' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$j('#author_name<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['last_name'].', '.$row['first_name']))); ?>&nbsp;');
			<?php
			break;

		case 'agent_id':
			if(!$id) {
				?>
				$j('#agent_name<?php echo $rnd1; ?>').html('&nbsp;');
				<?php
				break;
			}
			$res = sql("SELECT `game_agent`.`id` as 'id', `game_agent`.`user_id` as 'user_id', `game_agent`.`memberID` as 'memberID', `game_agent`.`img` as 'img', `game_agent`.`groupID` as 'groupID', IF(    CHAR_LENGTH(`class_agent_selection1`.`selection_phase`), CONCAT_WS('',   `class_agent_selection1`.`selection_phase`), '') as 'selection_class', IF(    CHAR_LENGTH(`class_agent_type11`.`type`), CONCAT_WS('',   `class_agent_type11`.`type`), '') as 'agenttype1', IF(    CHAR_LENGTH(`class_agent_type21`.`type`), CONCAT_WS('',   `class_agent_type21`.`type`), '') as 'agenttype2', IF(    CHAR_LENGTH(`class_gender1`.`gender`), CONCAT_WS('',   `class_gender1`.`gender`), '') as 'gender', `game_agent`.`last_name` as 'last_name', `game_agent`.`first_name` as 'first_name', `game_agent`.`other_name` as 'other_name', DATE_FORMAT(`game_agent`.`birthday`, '%Y-%m-%d %H:%i') as 'birthday', `game_agent`.`birth_location` as 'birth_location', `game_agent`.`birth_location_map` as 'birth_location_map', DATE_FORMAT(`game_agent`.`deathday`, '%Y-%m-%d %H:%i') as 'deathday', `game_agent`.`death_location` as 'death_location', `game_agent`.`workplace` as 'workplace', `game_agent`.`knows` as 'knows', `game_agent`.`shortbio` as 'shortbio', IF(    CHAR_LENGTH(`class_evaluation1`.`evaluation_type`), CONCAT_WS('',   `class_evaluation1`.`evaluation_type`), '') as 'data_evaluation', `game_agent`.`viaf_no` as 'viaf_no', `game_agent`.`authority_record` as 'authority_record', IF(    CHAR_LENGTH(`class_authority_agent1`.`abbreviation`) || CHAR_LENGTH(`class_authority_agent1`.`authority_name`), CONCAT_WS('',   `class_authority_agent1`.`abbreviation`, '   ', `class_authority_agent1`.`authority_name`), '') as 'authority_organization' FROM `game_agent` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agent`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agent`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agent`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agent`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agent`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agent`.`authority_organization`  WHERE `game_agent`.`id`='{$id}' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$j('#agent_name<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['last_name'].', '.$row['first_name']))); ?>&nbsp;');
			<?php
			break;


	}

?>