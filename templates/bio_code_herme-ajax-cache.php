<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'bio_code_herme';

		/* data for selected record, or defaults if none is selected */
		var data = {
			biography: <?php echo json_encode(array('id' => $rdata['biography'], 'value' => $rdata['biography'], 'text' => $jdata['biography'])); ?>,
			agent_id: <?php echo json_encode(array('id' => $rdata['agent_id'], 'value' => $rdata['agent_id'], 'text' => $jdata['agent_id'])); ?>,
			agent_name: <?php echo json_encode($jdata['agent_name']); ?>,
			author_id: <?php echo json_encode(array('id' => $rdata['author_id'], 'value' => $rdata['author_id'], 'text' => $jdata['author_id'])); ?>,
			author_name: <?php echo json_encode($jdata['author_name']); ?>,
			bibliography: <?php echo json_encode(array('id' => $rdata['bibliography'], 'value' => $rdata['bibliography'], 'text' => $jdata['bibliography'])); ?>,
			transcript: <?php echo json_encode(array('id' => $rdata['transcript'], 'value' => $rdata['transcript'], 'text' => $jdata['transcript'])); ?>,
			token_sequence: <?php echo json_encode(array('id' => $rdata['token_sequence'], 'value' => $rdata['token_sequence'], 'text' => $jdata['token_sequence'])); ?>,
			token: <?php echo json_encode($jdata['token']); ?>,
			impression: <?php echo json_encode(array('id' => $rdata['impression'], 'value' => $rdata['impression'], 'text' => $jdata['impression'])); ?>,
			noetictension: <?php echo json_encode(array('id' => $rdata['noetictension'], 'value' => $rdata['noetictension'], 'text' => $jdata['noetictension'])); ?>,
			pc: <?php echo json_encode(array('id' => $rdata['pc'], 'value' => $rdata['pc'], 'text' => $jdata['pc'])); ?>
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

		/* saved value for token_sequence */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'token_sequence' && d.id == data.token_sequence.id)
				return { results: [ data.token_sequence ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for token_sequence autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'token_sequence' && d.id == data.token_sequence.id) {
				$j('#token' + d[rnd]).html(data.token);
				return true;
			}

			return false;
		});

		/* saved value for impression */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'impression' && d.id == data.impression.id)
				return { results: [ data.impression ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for noetictension */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'noetictension' && d.id == data.noetictension.id)
				return { results: [ data.noetictension ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for pc */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'pc' && d.id == data.pc.id)
				return { results: [ data.pc ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

