<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("$currDir/lib.php");

	handle_maintenance();

	header('Content-type: text/javascript; charset=' . datalist_db_encoding);

	$table_perms = getTablePermissions('hist_storyline');
	if(!$table_perms['access']) die('// Access denied!');

	$mfk = $_GET['mfk'];
	$id = makeSafe($_GET['id']);
	$rnd1 = intval($_GET['rnd1']); if(!$rnd1) $rnd1 = '';

	if(!$mfk) {
		die('// No js code available!');
	}

	switch($mfk) {

		case 'character':
			if(!$id) {
				?>
				$j('#role<?php echo $rnd1; ?>').html('&nbsp;');
				<?php
				break;
			}
			$res = sql("SELECT `hist_chr`.`id` as 'id', IF(    CHAR_LENGTH(`hist_team1`.`team`), CONCAT_WS('',   `hist_team1`.`team`), '') as 'team', IF(    CHAR_LENGTH(`game_agent1`.`id`) || CHAR_LENGTH(`game_agent1`.`memberID`) || CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`id`, '   ', `game_agent1`.`memberID`, `game_agent1`.`memberID`), '') as 'hist_lead_id', IF(    CHAR_LENGTH(`game_agent1`.`memberID`), CONCAT_WS('',   `game_agent1`.`memberID`), '') as 'hist_lead_memberid', IF(    CHAR_LENGTH(`game_agent1`.`last_name`) || CHAR_LENGTH(`game_agent1`.`first_name`), CONCAT_WS('',   `game_agent1`.`last_name`, ', ', `game_agent1`.`first_name`), '') as 'hist_lead_name', IF(    CHAR_LENGTH(`hist_story1`.`id`) || CHAR_LENGTH(`hist_story1`.`story_title`), CONCAT_WS('',   `hist_story1`.`id`, ' - ', `hist_story1`.`story_title`), '') as 'hist_story', IF(    CHAR_LENGTH(`game_agent3`.`id`) || CHAR_LENGTH(`game_agent3`.`memberID`), CONCAT_WS('',   `game_agent3`.`id`, '   ', `game_agent3`.`memberID`), '') as 'agent_id', IF(    CHAR_LENGTH(`game_agent3`.`last_name`) || CHAR_LENGTH(`game_agent3`.`first_name`), CONCAT_WS('',   `game_agent3`.`last_name`, ', ', `game_agent3`.`first_name`), '') as 'agent_name', IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, ' - ', `bio_story1`.`story_title`), '') as 'bio_story', IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`), CONCAT_WS('',   `class_dramatica_character1`.`character`), '') as 'story_character', IF(    CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS('',   `class_dramatica_archetype1`.`archetype`, ' '), '') as 'story_archetype', `hist_chr`.`character_name` as 'character_name', `hist_chr`.`role` as 'role', `hist_chr`.`comment` as 'comment' FROM `hist_chr` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_chr`.`team` LEFT JOIN `hist_author` as hist_author1 ON `hist_author1`.`id`=`hist_chr`.`hist_lead_id` LEFT JOIN `game_agent` as game_agent1 ON `game_agent1`.`id`=`hist_author1`.`agent_id` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`hist_chr`.`hist_story` LEFT JOIN `game_agent` as game_agent3 ON `game_agent3`.`id`=`hist_chr`.`agent_id` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`hist_chr`.`bio_story` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`hist_chr`.`story_character` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`hist_chr`.`story_archetype`  WHERE `hist_chr`.`id`='{$id}' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$j('#role<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['story_archetype'].' - '.$row['role']))); ?>&nbsp;');
			<?php
			break;


	}

?>