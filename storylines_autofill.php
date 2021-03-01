<?php
// This script and data application were generated by AppGini 5.94
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("$currDir/lib.php");

	handle_maintenance();

	header('Content-type: text/javascript; charset=' . datalist_db_encoding);

	$table_perms = getTablePermissions('storylines');
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
			$res = sql("SELECT `story_chrs`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`id`) || CHAR_LENGTH(`biblio_author1`.`id`), CONCAT_WS('',   `biblio_author1`.`id`, '   ', `biblio_author1`.`id`), '') as 'agent_id', IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ', ', `biblio_author1`.`first_name`), '') as 'agent_name', IF(    CHAR_LENGTH(`bio_drama_chr_dev1`.`cw_name`), CONCAT_WS('',   `bio_drama_chr_dev1`.`cw_name`), '') as 'character', `story_chrs`.`role` as 'role', IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`), CONCAT_WS('',   `class_dramatica_character1`.`character`), '') as 'story_character', IF(    CHAR_LENGTH(`hist_story1`.`id`) || CHAR_LENGTH(`hist_story1`.`story_title`), CONCAT_WS('',   `hist_story1`.`id`, ' - ', `hist_story1`.`story_title`), '') as 'story', IF(    CHAR_LENGTH(`class_dramatica_archetype1`.`archetype`), CONCAT_WS('',   `class_dramatica_archetype1`.`archetype`, ' '), '') as 'story_archetype', `story_chrs`.`comment` as 'comment' FROM `story_chrs` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`story_chrs`.`agent_id` LEFT JOIN `bio_drama_chr_dev` as bio_drama_chr_dev1 ON `bio_drama_chr_dev1`.`id`=`story_chrs`.`character` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`story_chrs`.`story_character` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`story_chrs`.`story` LEFT JOIN `class_dramatica_archetype` as class_dramatica_archetype1 ON `class_dramatica_archetype1`.`id`=`story_chrs`.`story_archetype`  WHERE `story_chrs`.`id`='{$id}' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$j('#role<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['character'].' - '.$row['role']))); ?>&nbsp;');
			<?php
			break;

		case 'storyweaving_scene_no':
			if(!$id) {
				?>
				$j('#storyweaving_scene<?php echo $rnd1; ?>').html('&nbsp;');
				$j('#storyweaving_sequence<?php echo $rnd1; ?>').html('&nbsp;');
				$j('#storyweaving_theme<?php echo $rnd1; ?>').html('&nbsp;');
				<?php
				break;
			}
			$res = sql("SELECT `bio_storyweaving_scenes`.`id` as 'id', IF(    CHAR_LENGTH(`bio_story1`.`id`) || CHAR_LENGTH(`bio_story1`.`story_title`), CONCAT_WS('',   `bio_story1`.`id`, '   ', `bio_story1`.`story_title`), '') as 'story', IF(    CHAR_LENGTH(`class_dramatica_steps1`.`step`), CONCAT_WS('',   `class_dramatica_steps1`.`step`), '') as 'step', IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') as 'throughline', IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') as 'domain', IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') as 'concern', IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') as 'issue', IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') as 'theme', `bio_storyweaving_scenes`.`sequence` as 'sequence' FROM `bio_storyweaving_scenes` LEFT JOIN `bio_story` as bio_story1 ON `bio_story1`.`id`=`bio_storyweaving_scenes`.`story` LEFT JOIN `class_dramatica_steps` as class_dramatica_steps1 ON `class_dramatica_steps1`.`id`=`bio_storyweaving_scenes`.`step` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`bio_storyweaving_scenes`.`throughline` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`bio_storyweaving_scenes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`bio_storyweaving_scenes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`bio_storyweaving_scenes`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`bio_storyweaving_scenes`.`theme`  WHERE `bio_storyweaving_scenes`.`id`='{$id}' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$j('#storyweaving_scene<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['id']))); ?>&nbsp;');
			$j('#storyweaving_sequence<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['sequence']))); ?>&nbsp;');
			$j('#storyweaving_theme<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['theme']))); ?>&nbsp;');
			<?php
			break;


	}

?>