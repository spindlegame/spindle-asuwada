<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("$currDir/lib.php");

	handle_maintenance();

	header('Content-type: text/javascript; charset=' . datalist_db_encoding);

	$table_perms = getTablePermissions('hist_chr_scenes');
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
			$res = sql("SELECT `hist_authors`.`id` as 'id', IF(    CHAR_LENGTH(`hist_team1`.`id`) || CHAR_LENGTH(`hist_team1`.`team`), CONCAT_WS('',   `hist_team1`.`id`, ' - ', `hist_team1`.`team`), '') as 'team', IF(    CHAR_LENGTH(`game_agents1`.`id`) || CHAR_LENGTH(`game_agents1`.`memberID`), CONCAT_WS('',   `game_agents1`.`id`, '   ', `game_agents1`.`memberID`), '') as 'agent_id', IF(    CHAR_LENGTH(`game_agents1`.`memberID`), CONCAT_WS('',   `game_agents1`.`memberID`), '') as 'agent_memberid', IF(    CHAR_LENGTH(`game_agents1`.`last_name`), CONCAT_WS('',   `game_agents1`.`last_name`), '') as 'last_name', IF(    CHAR_LENGTH(`game_agents1`.`first_name`), CONCAT_WS('',   `game_agents1`.`first_name`), '') as 'first_name' FROM `hist_authors` LEFT JOIN `hist_team` as hist_team1 ON `hist_team1`.`id`=`hist_authors`.`team` LEFT JOIN `game_agents` as game_agents1 ON `game_agents1`.`id`=`hist_authors`.`agent_id`  WHERE `hist_authors`.`id`='{$id}' limit 1", $eo);
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
			$res = sql("SELECT `game_agents`.`id` as 'id', `game_agents`.`user_id` as 'user_id', `game_agents`.`memberID` as 'memberID', `game_agents`.`img` as 'img', `game_agents`.`groupID` as 'groupID', IF(    CHAR_LENGTH(`class_agent_selection1`.`selection_phase`), CONCAT_WS('',   `class_agent_selection1`.`selection_phase`), '') as 'selection_class', IF(    CHAR_LENGTH(`class_agent_type11`.`type`), CONCAT_WS('',   `class_agent_type11`.`type`), '') as 'agenttype1', IF(    CHAR_LENGTH(`class_agent_type21`.`type`), CONCAT_WS('',   `class_agent_type21`.`type`), '') as 'agenttype2', IF(    CHAR_LENGTH(`class_gender1`.`gender`), CONCAT_WS('',   `class_gender1`.`gender`), '') as 'gender', `game_agents`.`last_name` as 'last_name', `game_agents`.`first_name` as 'first_name', `game_agents`.`other_name` as 'other_name', DATE_FORMAT(`game_agents`.`birthday`, '%Y-%m-%d %H:%i') as 'birthday', `game_agents`.`birth_location` as 'birth_location', `game_agents`.`birth_location_map` as 'birth_location_map', DATE_FORMAT(`game_agents`.`deathday`, '%Y-%m-%d %H:%i') as 'deathday', `game_agents`.`death_location` as 'death_location', `game_agents`.`workplace` as 'workplace', `game_agents`.`knows` as 'knows', `game_agents`.`shortbio` as 'shortbio', IF(    CHAR_LENGTH(`class_evaluation1`.`evaluation_type`), CONCAT_WS('',   `class_evaluation1`.`evaluation_type`), '') as 'data_evaluation', `game_agents`.`viaf_no` as 'viaf_no', `game_agents`.`authority_record` as 'authority_record', IF(    CHAR_LENGTH(`class_authority_agent1`.`abbreviation`) || CHAR_LENGTH(`class_authority_agent1`.`authority_name`), CONCAT_WS('',   `class_authority_agent1`.`abbreviation`, '   ', `class_authority_agent1`.`authority_name`), '') as 'authority_organization' FROM `game_agents` LEFT JOIN `class_agent_selection` as class_agent_selection1 ON `class_agent_selection1`.`id`=`game_agents`.`selection_class` LEFT JOIN `class_agent_type1` as class_agent_type11 ON `class_agent_type11`.`id`=`game_agents`.`agenttype1` LEFT JOIN `class_agent_type2` as class_agent_type21 ON `class_agent_type21`.`id`=`game_agents`.`agenttype2` LEFT JOIN `class_gender` as class_gender1 ON `class_gender1`.`id`=`game_agents`.`gender` LEFT JOIN `class_evaluation` as class_evaluation1 ON `class_evaluation1`.`id`=`game_agents`.`data_evaluation` LEFT JOIN `class_authority_agent` as class_authority_agent1 ON `class_authority_agent1`.`id`=`game_agents`.`authority_organization`  WHERE `game_agents`.`id`='{$id}' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$j('#agent_name<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['last_name'].', '.$row['first_name']))); ?>&nbsp;');
			<?php
			break;

		case 'bio_storyline_no':
			if(!$id) {
				?>
				$j('#bio_storyline_text<?php echo $rnd1; ?>').html('&nbsp;');
				<?php
				break;
			}
			$res = sql("SELECT `bio_storylines`.`id` as 'id', IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, ' -  ', `bio_story1`.`story_title`), '') as 'biography', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`memberID`), '') as 'author_id', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') as 'author_name', IF(    CHAR_LENGTH(`biblio_doc1`.`id`) || CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`id`, ' - ', `biblio_doc1`.`title`), '') as 'bibliography', IF(    CHAR_LENGTH(`biblio_transcript1`.`id`) || CHAR_LENGTH(`biblio_transcript1`.`transcript_title`), CONCAT_WS('',   `biblio_transcript1`.`id`, ' - ', `biblio_transcript1`.`transcript_title`), '') as 'transcript', IF(    CHAR_LENGTH(`biblio_token1`.`id`) || CHAR_LENGTH(`biblio_token1`.`token_sequence`), CONCAT_WS('',   `biblio_token1`.`id`, ' - ', `biblio_token1`.`token_sequence`), '') as 'token_sequence', IF(    CHAR_LENGTH(`biblio_token1`.`token`), CONCAT_WS('',   `biblio_token1`.`token`), '') as 'token', IF(    CHAR_LENGTH(`class_story_acts1`.`act`), CONCAT_WS('',   `class_story_acts1`.`act`), '') as 'story_act', `bio_storylines`.`sequence` as 'sequence', IF(    CHAR_LENGTH(`game_agents1`.`id`) || CHAR_LENGTH(`game_agents1`.`memberID`) || CHAR_LENGTH(`game_agents1`.`last_name`) || CHAR_LENGTH(`game_agents1`.`first_name`), CONCAT_WS('',   `game_agents1`.`id`, '   ', `game_agents1`.`memberID`, `game_agents1`.`last_name`, ', ', `game_agents1`.`first_name`), '') as 'character', IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`) || CHAR_LENGTH(`bio_chrs1`.`role`), CONCAT_WS('',   `class_dramatica_character1`.`character`, ' - ', `bio_chrs1`.`role`), '') as 'role', `bio_storylines`.`storyline_no` as 'storyline_no', `bio_storylines`.`parenthetic` as 'parenthetic', `bio_storylines`.`storyline_title` as 'storyline_title', `bio_storylines`.`storyline` as 'storyline', `bio_storylines`.`notes` as 'notes', IF(    CHAR_LENGTH(`class_dramatica_steps1`.`step`), CONCAT_WS('',   `class_dramatica_steps1`.`step`), '') as 'storyweaving_scene_no', IF(    CHAR_LENGTH(`bio_storyweaving_scenes1`.`id`), CONCAT_WS('',   `bio_storyweaving_scenes1`.`id`), '') as 'storyweaving_scene', IF(    CHAR_LENGTH(`bio_storyweaving_scenes1`.`sequence`), CONCAT_WS('',   `bio_storyweaving_scenes1`.`sequence`), '') as 'storyweaving_sequence', IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') as 'storyweaving_theme', IF(    CHAR_LENGTH(`bio_chr_scenes1`.`id`) || CHAR_LENGTH(`bio_chr_scenes1`.`scene`), CONCAT_WS('',   `bio_chr_scenes1`.`id`, '   ', `bio_chr_scenes1`.`scene`), '') as 'character_scene', IF(    CHAR_LENGTH(`bio_encounter_scenes1`.`scene`), CONCAT_WS('',   `bio_encounter_scenes1`.`scene`), '') as 'character_event', if(`bio_storylines`.`startdate`,date_format(`bio_storylines`.`startdate`,'%d/%m/%Y %H:%i'),'') as 'startdate', if(`bio_storylines`.`enddate`,date_format(`bio_storylines`.`enddate`,'%d/%m/%Y %H:%i'),'') as 'enddate' FROM `bio_storylines` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storylines`.`biography` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`bio_storylines`.`author_id` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`bio_storylines`.`bibliography` LEFT JOIN `biblio_transcript` as biblio_transcript1 ON `biblio_transcript1`.`id`=`bio_storylines`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`bio_storylines`.`token` LEFT JOIN `class_story_acts` as class_story_acts1 ON `class_story_acts1`.`id`=`bio_storylines`.`story_act` LEFT JOIN `bio_chrs` as bio_chrs1 ON `bio_chrs1`.`id`=`bio_storylines`.`character` LEFT JOIN `game_agents` as game_agents1 ON `game_agents1`.`id`=`bio_chrs1`.`agent_id` LEFT JOIN `bio_storyweaving_scenes` as bio_storyweaving_scenes1 ON `bio_storyweaving_scenes1`.`id`=`bio_storylines`.`storyweaving_scene_no` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`bio_storyweaving_scenes1`.`step` LEFT JOIN `bio_chr_scenes` as bio_chr_scenes1 ON `bio_chr_scenes1`.`id`=`bio_storylines`.`character_scene` LEFT JOIN `bio_encounter_scenes` as bio_encounter_scenes1 ON `bio_encounter_scenes1`.`id`=`bio_storylines`.`character_event` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`bio_chrs1`.`bio_character` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storyweaving_scenes1`.`theme`  WHERE `bio_storylines`.`id`='{$id}' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$j('#bio_storyline_text<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['id'].'- '.$row['storyline']))); ?>&nbsp;');
			<?php
			break;


	}

?>