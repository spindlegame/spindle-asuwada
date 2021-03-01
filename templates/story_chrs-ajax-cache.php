<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'story_chrs';

		/* data for selected record, or defaults if none is selected */
		var data = {
			agent_id: <?php echo json_encode(array('id' => $rdata['agent_id'], 'value' => $rdata['agent_id'], 'text' => $jdata['agent_id'])); ?>,
			agent_name: <?php echo json_encode($jdata['agent_name']); ?>,
			character: <?php echo json_encode(array('id' => $rdata['character'], 'value' => $rdata['character'], 'text' => $jdata['character'])); ?>,
			story_character: <?php echo json_encode(array('id' => $rdata['story_character'], 'value' => $rdata['story_character'], 'text' => $jdata['story_character'])); ?>,
			story: <?php echo json_encode(array('id' => $rdata['story'], 'value' => $rdata['story'], 'text' => $jdata['story'])); ?>,
			story_archetype: <?php echo json_encode(array('id' => $rdata['story_archetype'], 'value' => $rdata['story_archetype'], 'text' => $jdata['story_archetype'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for agent_id */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'agent_id' && d.id == data.agent_id.id)
				return { results: [ data.agent_id ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for agent_id autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'agent_id' && d.id == data.agent_id.id) {
				$j('#agent_name' + d[rnd]).html(data.agent_name);
				return true;
			}

			return false;
		});

		/* saved value for character */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'character' && d.id == data.character.id)
				return { results: [ data.character ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for story_character */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'story_character' && d.id == data.story_character.id)
				return { results: [ data.story_character ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for story */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'story' && d.id == data.story.id)
				return { results: [ data.story ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for story_archetype */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'story_archetype' && d.id == data.story_archetype.id)
				return { results: [ data.story_archetype ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

