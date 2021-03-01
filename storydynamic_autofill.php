<?php
// This script and data application were generated by AppGini 5.76
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");

	handle_maintenance();

	header('Content-type: text/javascript; charset=' . datalist_db_encoding);

	$table_perms = getTablePermissions('storydynamic');
	if(!$table_perms[0]){ die('// Access denied!'); }

	$mfk = $_GET['mfk'];
	$id = makeSafe($_GET['id']);
	$rnd1 = intval($_GET['rnd1']); if(!$rnd1) $rnd1 = '';

	if(!$mfk){
		die('// No js code available!');
	}

	switch($mfk){

		case 'storystatic_ost':
			if(!$id){
				?>
				$j('#storystatic_chr_mc<?php echo $rnd1; ?>').html('&nbsp;');
				$j('#os_goal_concern<?php echo $rnd1; ?>').html('&nbsp;');
				<?php
				break;
			}
			$res = sql("SELECT `storystatic`.`id` as 'id', IF(    CHAR_LENGTH(`hist_story1`.`id`) || CHAR_LENGTH(`hist_story1`.`story_title`), CONCAT_WS('',   `hist_story1`.`id`, '   ', `hist_story1`.`story_title`), '') as 'story', IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') as 'throughline', IF(    CHAR_LENGTH(`class_dramatica_character1`.`character`) || CHAR_LENGTH(`story_chrs1`.`agent_name`), CONCAT_WS('',   `class_dramatica_character1`.`character`, ' - ', ' - ', `story_chrs1`.`agent_name`), '') as 'story_character_mc', IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') as 'throughline_domain', IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') as 'concern', IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') as 'issue', IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') as 'problem', IF(    CHAR_LENGTH(`class_dramatica_themes2`.`theme`), CONCAT_WS('',   `class_dramatica_themes2`.`theme`), '') as 'solution', IF(    CHAR_LENGTH(`class_dramatica_themes3`.`theme`), CONCAT_WS('',   `class_dramatica_themes3`.`theme`), '') as 'symptom', IF(    CHAR_LENGTH(`class_dramatica_themes4`.`theme`), CONCAT_WS('',   `class_dramatica_themes4`.`theme`), '') as 'response', IF(    CHAR_LENGTH(`class_dramatica_issue2`.`issue`) || CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_issue2`.`issue`, ' - ', `class_dramatica_domain2`.`domain`), '') as 'catalyst', IF(    CHAR_LENGTH(`class_dramatica_issue3`.`issue`) || CHAR_LENGTH(`class_dramatica_domain3`.`domain`), CONCAT_WS('',   `class_dramatica_issue3`.`issue`, '- ', `class_dramatica_domain3`.`domain`), '') as 'inhibitor', IF(    CHAR_LENGTH(`class_dramatica_concern2`.`concern`) || CHAR_LENGTH(`class_dramatica_domain4`.`domain`), CONCAT_WS('',   `class_dramatica_concern2`.`concern`, ' - ', `class_dramatica_domain4`.`domain`), '') as 'benchmark', IF(    CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_concern3`.`concern`), '') as 'signpost1', IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`), '') as 'signpost2', IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') as 'signpost3', IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') as 'signpost4' FROM `storystatic` LEFT JOIN `hist_story` as hist_story1 ON `hist_story1`.`id`=`storystatic`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`storystatic`.`throughline` LEFT JOIN `story_chrs` as story_chrs1 ON `story_chrs1`.`id`=`storystatic`.`story_character_mc` LEFT JOIN `class_dramatica_character` as class_dramatica_character1 ON `class_dramatica_character1`.`id`=`story_chrs1`.`story_character` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`storystatic`.`throughline_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`storystatic`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`storystatic`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`storystatic`.`problem` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes2 ON `class_dramatica_themes2`.`id`=`storystatic`.`solution` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes3 ON `class_dramatica_themes3`.`id`=`storystatic`.`symptom` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes4 ON `class_dramatica_themes4`.`id`=`storystatic`.`response` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes5 ON `class_dramatica_themes5`.`id`=`storystatic`.`catalyst` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue2 ON `class_dramatica_issue2`.`id`=`class_dramatica_themes5`.`issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`class_dramatica_themes5`.`domain` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes6 ON `class_dramatica_themes6`.`id`=`storystatic`.`inhibitor` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue3 ON `class_dramatica_issue3`.`id`=`class_dramatica_themes6`.`issue` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain3 ON `class_dramatica_domain3`.`id`=`class_dramatica_themes6`.`domain` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes7 ON `class_dramatica_themes7`.`id`=`storystatic`.`benchmark` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`class_dramatica_themes7`.`concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain4 ON `class_dramatica_domain4`.`id`=`class_dramatica_themes7`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`storystatic`.`signpost1` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`storystatic`.`signpost2` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`storystatic`.`signpost3` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`storystatic`.`signpost4`  WHERE `storystatic`.`id`='{$id}' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$j('#storystatic_chr_mc<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['story_character_mc']))); ?>&nbsp;');
			$j('#os_goal_concern<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['concern']))); ?>&nbsp;');
			<?php
			break;


	}

?>