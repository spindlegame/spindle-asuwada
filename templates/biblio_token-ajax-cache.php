<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'biblio_token';

		/* data for selected record, or defaults if none is selected */
		var data = {
			author_id: <?php echo json_encode(array('id' => $rdata['author_id'], 'value' => $rdata['author_id'], 'text' => $jdata['author_id'])); ?>,
			author_name: <?php echo json_encode($jdata['author_name']); ?>,
			bibliography: <?php echo json_encode(array('id' => $rdata['bibliography'], 'value' => $rdata['bibliography'], 'text' => $jdata['bibliography'])); ?>,
			transcript: <?php echo json_encode(array('id' => $rdata['transcript'], 'value' => $rdata['transcript'], 'text' => $jdata['transcript'])); ?>,
			team: <?php echo json_encode(array('id' => $rdata['team'], 'value' => $rdata['team'], 'text' => $jdata['team'])); ?>,
			biblio_lead: <?php echo json_encode(array('id' => $rdata['biblio_lead'], 'value' => $rdata['biblio_lead'], 'text' => $jdata['biblio_lead'])); ?>,
			data_evaluation: <?php echo json_encode(array('id' => $rdata['data_evaluation'], 'value' => $rdata['data_evaluation'], 'text' => $jdata['data_evaluation'])); ?>
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

		/* saved value for team */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'team' && d.id == data.team.id)
				return { results: [ data.team ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for biblio_lead */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'biblio_lead' && d.id == data.biblio_lead.id)
				return { results: [ data.biblio_lead ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for data_evaluation */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'data_evaluation' && d.id == data.data_evaluation.id)
				return { results: [ data.data_evaluation ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

