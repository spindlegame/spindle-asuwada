<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'characters';

		/* data for selected record, or defaults if none is selected */
		var data = {
			agent_id: <?php echo json_encode(array('id' => $rdata['agent_id'], 'value' => $rdata['agent_id'], 'text' => $jdata['agent_id'])); ?>,
			agent_name: <?php echo json_encode($jdata['agent_name']); ?>,
			illust_resolve: <?php echo json_encode(array('id' => $rdata['illust_resolve'], 'value' => $rdata['illust_resolve'], 'text' => $jdata['illust_resolve'])); ?>,
			illust_growth: <?php echo json_encode(array('id' => $rdata['illust_growth'], 'value' => $rdata['illust_growth'], 'text' => $jdata['illust_growth'])); ?>,
			illust_approach: <?php echo json_encode(array('id' => $rdata['illust_approach'], 'value' => $rdata['illust_approach'], 'text' => $jdata['illust_approach'])); ?>,
			illust_ps_style: <?php echo json_encode(array('id' => $rdata['illust_ps_style'], 'value' => $rdata['illust_ps_style'], 'text' => $jdata['illust_ps_style'])); ?>,
			noetictension: <?php echo json_encode(array('id' => $rdata['noetictension'], 'value' => $rdata['noetictension'], 'text' => $jdata['noetictension'])); ?>,
			illust_nt: <?php echo json_encode(array('id' => $rdata['illust_nt'], 'value' => $rdata['illust_nt'], 'text' => $jdata['illust_nt'])); ?>,
			impression: <?php echo json_encode(array('id' => $rdata['impression'], 'value' => $rdata['impression'], 'text' => $jdata['impression'])); ?>,
			illust_im: <?php echo json_encode(array('id' => $rdata['illust_im'], 'value' => $rdata['illust_im'], 'text' => $jdata['illust_im'])); ?>,
			mcs_problem: <?php echo json_encode(array('id' => $rdata['mcs_problem'], 'value' => $rdata['mcs_problem'], 'text' => $jdata['mcs_problem'])); ?>,
			illust_mcs_problem: <?php echo json_encode(array('id' => $rdata['illust_mcs_problem'], 'value' => $rdata['illust_mcs_problem'], 'text' => $jdata['illust_mcs_problem'])); ?>,
			mcs_solution: <?php echo json_encode($jdata['mcs_solution']); ?>,
			illust_mcs_solution: <?php echo json_encode(array('id' => $rdata['illust_mcs_solution'], 'value' => $rdata['illust_mcs_solution'], 'text' => $jdata['illust_mcs_solution'])); ?>,
			mcs_symptom: <?php echo json_encode($jdata['mcs_symptom']); ?>,
			illust_mcs_symptom: <?php echo json_encode(array('id' => $rdata['illust_mcs_symptom'], 'value' => $rdata['illust_mcs_symptom'], 'text' => $jdata['illust_mcs_symptom'])); ?>,
			mcs_response: <?php echo json_encode($jdata['mcs_response']); ?>,
			illust_mcs_response: <?php echo json_encode(array('id' => $rdata['illust_mcs_response'], 'value' => $rdata['illust_mcs_response'], 'text' => $jdata['illust_mcs_response'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for agent_id */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'agent_id' && d.id == data.agent_id.id)
				return { results: [ data.agent_id ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for agent_id autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'agent_id' && d.id == data.agent_id.id){
				$j('#agent_name' + d[rnd]).html(data.agent_name);
				return true;
			}

			return false;
		});

		/* saved value for illust_resolve */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'illust_resolve' && d.id == data.illust_resolve.id)
				return { results: [ data.illust_resolve ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for illust_growth */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'illust_growth' && d.id == data.illust_growth.id)
				return { results: [ data.illust_growth ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for illust_approach */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'illust_approach' && d.id == data.illust_approach.id)
				return { results: [ data.illust_approach ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for illust_ps_style */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'illust_ps_style' && d.id == data.illust_ps_style.id)
				return { results: [ data.illust_ps_style ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for noetictension */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'noetictension' && d.id == data.noetictension.id)
				return { results: [ data.noetictension ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for illust_nt */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'illust_nt' && d.id == data.illust_nt.id)
				return { results: [ data.illust_nt ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for impression */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'impression' && d.id == data.impression.id)
				return { results: [ data.impression ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for illust_im */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'illust_im' && d.id == data.illust_im.id)
				return { results: [ data.illust_im ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for mcs_problem */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'mcs_problem' && d.id == data.mcs_problem.id)
				return { results: [ data.mcs_problem ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for mcs_problem autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'mcs_problem' && d.id == data.mcs_problem.id){
				$j('#mcs_solution' + d[rnd]).html(data.mcs_solution);
				$j('#mcs_symptom' + d[rnd]).html(data.mcs_symptom);
				$j('#mcs_response' + d[rnd]).html(data.mcs_response);
				return true;
			}

			return false;
		});

		/* saved value for illust_mcs_problem */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'illust_mcs_problem' && d.id == data.illust_mcs_problem.id)
				return { results: [ data.illust_mcs_problem ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for illust_mcs_solution */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'illust_mcs_solution' && d.id == data.illust_mcs_solution.id)
				return { results: [ data.illust_mcs_solution ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for illust_mcs_symptom */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'illust_mcs_symptom' && d.id == data.illust_mcs_symptom.id)
				return { results: [ data.illust_mcs_symptom ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for illust_mcs_response */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'illust_mcs_response' && d.id == data.illust_mcs_response.id)
				return { results: [ data.illust_mcs_response ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

