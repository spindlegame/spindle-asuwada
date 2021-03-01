<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'bio_storylines';

		/* data for selected record, or defaults if none is selected */
		var data = {
			biography: <?php echo json_encode(array('id' => $rdata['biography'], 'value' => $rdata['biography'], 'text' => $jdata['biography'])); ?>,
			author_id: <?php echo json_encode(array('id' => $rdata['author_id'], 'value' => $rdata['author_id'], 'text' => $jdata['author_id'])); ?>,
			author_name: <?php echo json_encode($jdata['author_name']); ?>,
			bibliography: <?php echo json_encode(array('id' => $rdata['bibliography'], 'value' => $rdata['bibliography'], 'text' => $jdata['bibliography'])); ?>,
			transcript: <?php echo json_encode(array('id' => $rdata['transcript'], 'value' => $rdata['transcript'], 'text' => $jdata['transcript'])); ?>,
			token_sequence: <?php echo json_encode($jdata['token_sequence']); ?>,
			token: <?php echo json_encode(array('id' => $rdata['token'], 'value' => $rdata['token'], 'text' => $jdata['token'])); ?>,
			story_act: <?php echo json_encode(array('id' => $rdata['story_act'], 'value' => $rdata['story_act'], 'text' => $jdata['story_act'])); ?>,
			character: <?php echo json_encode(array('id' => $rdata['character'], 'value' => $rdata['character'], 'text' => $jdata['character'])); ?>,
			role: <?php echo json_encode($jdata['role']); ?>,
			storyweaving_scene_no: <?php echo json_encode(array('id' => $rdata['storyweaving_scene_no'], 'value' => $rdata['storyweaving_scene_no'], 'text' => $jdata['storyweaving_scene_no'])); ?>,
			storyweaving_scene: <?php echo json_encode($jdata['storyweaving_scene']); ?>,
			storyweaving_sequence: <?php echo json_encode($jdata['storyweaving_sequence']); ?>,
			storyweaving_theme: <?php echo json_encode($jdata['storyweaving_theme']); ?>,
			character_scene: <?php echo json_encode(array('id' => $rdata['character_scene'], 'value' => $rdata['character_scene'], 'text' => $jdata['character_scene'])); ?>,
			character_event: <?php echo json_encode(array('id' => $rdata['character_event'], 'value' => $rdata['character_event'], 'text' => $jdata['character_event'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for biography */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'biography' && d.id == data.biography.id)
				return { results: [ data.biography ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for author_id */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'author_id' && d.id == data.author_id.id)
				return { results: [ data.author_id ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for author_id autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'author_id' && d.id == data.author_id.id) {
				$j('#author_name' + d[rnd]).html(data.author_name);
				return true;
			}

			return false;
		});

		/* saved value for bibliography */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bibliography' && d.id == data.bibliography.id)
				return { results: [ data.bibliography ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for transcript */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'transcript' && d.id == data.transcript.id)
				return { results: [ data.transcript ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for token */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'token' && d.id == data.token.id)
				return { results: [ data.token ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for token autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'token' && d.id == data.token.id) {
				$j('#token_sequence' + d[rnd]).html(data.token_sequence);
				return true;
			}

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

		/* saved value for storyweaving_scene_no autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'storyweaving_scene_no' && d.id == data.storyweaving_scene_no.id) {
				$j('#storyweaving_scene' + d[rnd]).html(data.storyweaving_scene);
				$j('#storyweaving_sequence' + d[rnd]).html(data.storyweaving_sequence);
				$j('#storyweaving_theme' + d[rnd]).html(data.storyweaving_theme);
				return true;
			}

			return false;
		});

		/* saved value for character_scene */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'character_scene' && d.id == data.character_scene.id)
				return { results: [ data.character_scene ], more: false, elapsed: 0.01 };
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

