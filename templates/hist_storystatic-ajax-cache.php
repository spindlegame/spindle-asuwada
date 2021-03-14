<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'hist_storystatic';

		/* data for selected record, or defaults if none is selected */
		var data = {
			story: <?php echo json_encode(array('id' => $rdata['story'], 'value' => $rdata['story'], 'text' => $jdata['story'])); ?>,
			throughline: <?php echo json_encode(array('id' => $rdata['throughline'], 'value' => $rdata['throughline'], 'text' => $jdata['throughline'])); ?>,
			story_character_mc: <?php echo json_encode(array('id' => $rdata['story_character_mc'], 'value' => $rdata['story_character_mc'], 'text' => $jdata['story_character_mc'])); ?>,
			throughline_domain: <?php echo json_encode(array('id' => $rdata['throughline_domain'], 'value' => $rdata['throughline_domain'], 'text' => $jdata['throughline_domain'])); ?>,
			concern: <?php echo json_encode(array('id' => $rdata['concern'], 'value' => $rdata['concern'], 'text' => $jdata['concern'])); ?>,
			issue: <?php echo json_encode(array('id' => $rdata['issue'], 'value' => $rdata['issue'], 'text' => $jdata['issue'])); ?>,
			problem: <?php echo json_encode(array('id' => $rdata['problem'], 'value' => $rdata['problem'], 'text' => $jdata['problem'])); ?>,
			solution: <?php echo json_encode(array('id' => $rdata['solution'], 'value' => $rdata['solution'], 'text' => $jdata['solution'])); ?>,
			symptom: <?php echo json_encode(array('id' => $rdata['symptom'], 'value' => $rdata['symptom'], 'text' => $jdata['symptom'])); ?>,
			response: <?php echo json_encode(array('id' => $rdata['response'], 'value' => $rdata['response'], 'text' => $jdata['response'])); ?>,
			catalyst: <?php echo json_encode(array('id' => $rdata['catalyst'], 'value' => $rdata['catalyst'], 'text' => $jdata['catalyst'])); ?>,
			inhibitor: <?php echo json_encode(array('id' => $rdata['inhibitor'], 'value' => $rdata['inhibitor'], 'text' => $jdata['inhibitor'])); ?>,
			benchmark: <?php echo json_encode(array('id' => $rdata['benchmark'], 'value' => $rdata['benchmark'], 'text' => $jdata['benchmark'])); ?>,
			signpost1: <?php echo json_encode(array('id' => $rdata['signpost1'], 'value' => $rdata['signpost1'], 'text' => $jdata['signpost1'])); ?>,
			signpost2: <?php echo json_encode(array('id' => $rdata['signpost2'], 'value' => $rdata['signpost2'], 'text' => $jdata['signpost2'])); ?>,
			signpost3: <?php echo json_encode(array('id' => $rdata['signpost3'], 'value' => $rdata['signpost3'], 'text' => $jdata['signpost3'])); ?>,
			signpost4: <?php echo json_encode(array('id' => $rdata['signpost4'], 'value' => $rdata['signpost4'], 'text' => $jdata['signpost4'])); ?>
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

		/* saved value for throughline */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'throughline' && d.id == data.throughline.id)
				return { results: [ data.throughline ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for story_character_mc */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'story_character_mc' && d.id == data.story_character_mc.id)
				return { results: [ data.story_character_mc ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for throughline_domain */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'throughline_domain' && d.id == data.throughline_domain.id)
				return { results: [ data.throughline_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for concern */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'concern' && d.id == data.concern.id)
				return { results: [ data.concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for issue */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'issue' && d.id == data.issue.id)
				return { results: [ data.issue ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for problem */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'problem' && d.id == data.problem.id)
				return { results: [ data.problem ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for solution */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'solution' && d.id == data.solution.id)
				return { results: [ data.solution ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for symptom */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'symptom' && d.id == data.symptom.id)
				return { results: [ data.symptom ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for response */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'response' && d.id == data.response.id)
				return { results: [ data.response ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for catalyst */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'catalyst' && d.id == data.catalyst.id)
				return { results: [ data.catalyst ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for inhibitor */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'inhibitor' && d.id == data.inhibitor.id)
				return { results: [ data.inhibitor ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for benchmark */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'benchmark' && d.id == data.benchmark.id)
				return { results: [ data.benchmark ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for signpost1 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'signpost1' && d.id == data.signpost1.id)
				return { results: [ data.signpost1 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for signpost2 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'signpost2' && d.id == data.signpost2.id)
				return { results: [ data.signpost2 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for signpost3 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'signpost3' && d.id == data.signpost3.id)
				return { results: [ data.signpost3 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for signpost4 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'signpost4' && d.id == data.signpost4.id)
				return { results: [ data.signpost4 ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

