<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'bio_chrs';

		/* data for selected record, or defaults if none is selected */
		var data = {
			author_id: <?php echo json_encode(array('id' => $rdata['author_id'], 'value' => $rdata['author_id'], 'text' => $jdata['author_id'])); ?>,
			author_name: <?php echo json_encode($jdata['author_name']); ?>,
			agent_id: <?php echo json_encode(array('id' => $rdata['agent_id'], 'value' => $rdata['agent_id'], 'text' => $jdata['agent_id'])); ?>,
			agent_name: <?php echo json_encode($jdata['agent_name']); ?>,
			bio_story: <?php echo json_encode(array('id' => $rdata['bio_story'], 'value' => $rdata['bio_story'], 'text' => $jdata['bio_story'])); ?>,
			bio_character: <?php echo json_encode(array('id' => $rdata['bio_character'], 'value' => $rdata['bio_character'], 'text' => $jdata['bio_character'])); ?>,
			bio_archetype: <?php echo json_encode(array('id' => $rdata['bio_archetype'], 'value' => $rdata['bio_archetype'], 'text' => $jdata['bio_archetype'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

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

		/* saved value for bio_story */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_story' && d.id == data.bio_story.id)
				return { results: [ data.bio_story ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_character */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_character' && d.id == data.bio_character.id)
				return { results: [ data.bio_character ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_archetype */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_archetype' && d.id == data.bio_archetype.id)
				return { results: [ data.bio_archetype ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

