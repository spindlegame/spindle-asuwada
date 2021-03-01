<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'hist_storyline';

		/* data for selected record, or defaults if none is selected */
		var data = {
			story: <?php echo json_encode(array('id' => $rdata['story'], 'value' => $rdata['story'], 'text' => $jdata['story'])); ?>,
			story_act: <?php echo json_encode(array('id' => $rdata['story_act'], 'value' => $rdata['story_act'], 'text' => $jdata['story_act'])); ?>,
			character: <?php echo json_encode(array('id' => $rdata['character'], 'value' => $rdata['character'], 'text' => $jdata['character'])); ?>,
			role: <?php echo json_encode($jdata['role']); ?>,
			storyweaving_scene_no: <?php echo json_encode(array('id' => $rdata['storyweaving_scene_no'], 'value' => $rdata['storyweaving_scene_no'], 'text' => $jdata['storyweaving_scene_no'])); ?>,
			storyweaving_scene: <?php echo json_encode(array('id' => $rdata['storyweaving_scene'], 'value' => $rdata['storyweaving_scene'], 'text' => $jdata['storyweaving_scene'])); ?>,
			storyweaving_sequence: <?php echo json_encode(array('id' => $rdata['storyweaving_sequence'], 'value' => $rdata['storyweaving_sequence'], 'text' => $jdata['storyweaving_sequence'])); ?>,
			storyweaving_theme: <?php echo json_encode(array('id' => $rdata['storyweaving_theme'], 'value' => $rdata['storyweaving_theme'], 'text' => $jdata['storyweaving_theme'])); ?>,
			characterevent_scene: <?php echo json_encode(array('id' => $rdata['characterevent_scene'], 'value' => $rdata['characterevent_scene'], 'text' => $jdata['characterevent_scene'])); ?>,
			character_event: <?php echo json_encode(array('id' => $rdata['character_event'], 'value' => $rdata['character_event'], 'text' => $jdata['character_event'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for story */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'story' && d.id == data.story.id)
				return { results: [ data.story ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for story_act */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'story_act' && d.id == data.story_act.id)
				return { results: [ data.story_act ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for character */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'character' && d.id == data.character.id)
				return { results: [ data.character ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for character autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'character' && d.id == data.character.id) {
				$j('#role' + d[rnd]).html(data.role);
				return true;
			}

			return false;
		});

		/* saved value for storyweaving_scene_no */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'storyweaving_scene_no' && d.id == data.storyweaving_scene_no.id)
				return { results: [ data.storyweaving_scene_no ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for storyweaving_scene */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'storyweaving_scene' && d.id == data.storyweaving_scene.id)
				return { results: [ data.storyweaving_scene ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for storyweaving_sequence */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'storyweaving_sequence' && d.id == data.storyweaving_sequence.id)
				return { results: [ data.storyweaving_sequence ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for storyweaving_theme */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'storyweaving_theme' && d.id == data.storyweaving_theme.id)
				return { results: [ data.storyweaving_theme ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for characterevent_scene */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'characterevent_scene' && d.id == data.characterevent_scene.id)
				return { results: [ data.characterevent_scene ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for character_event */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'character_event' && d.id == data.character_event.id)
				return { results: [ data.character_event ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

