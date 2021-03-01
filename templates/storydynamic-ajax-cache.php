<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'storydynamic';

		/* data for selected record, or defaults if none is selected */
		var data = {
			story: <?php echo json_encode(array('id' => $rdata['story'], 'value' => $rdata['story'], 'text' => $jdata['story'])); ?>,
			agent: <?php echo json_encode(array('id' => $rdata['agent'], 'value' => $rdata['agent'], 'text' => $jdata['agent'])); ?>,
			story_dev_chr: <?php echo json_encode(array('id' => $rdata['story_dev_chr'], 'value' => $rdata['story_dev_chr'], 'text' => $jdata['story_dev_chr'])); ?>,
			storystatic_ost: <?php echo json_encode(array('id' => $rdata['storystatic_ost'], 'value' => $rdata['storystatic_ost'], 'text' => $jdata['storystatic_ost'])); ?>,
			storystatic_chr_mc: <?php echo json_encode($jdata['storystatic_chr_mc']); ?>,
			mc_problem: <?php echo json_encode(array('id' => $rdata['mc_problem'], 'value' => $rdata['mc_problem'], 'text' => $jdata['mc_problem'])); ?>,
			mc_resolve: <?php echo json_encode(array('id' => $rdata['mc_resolve'], 'value' => $rdata['mc_resolve'], 'text' => $jdata['mc_resolve'])); ?>,
			mc_growth: <?php echo json_encode(array('id' => $rdata['mc_growth'], 'value' => $rdata['mc_growth'], 'text' => $jdata['mc_growth'])); ?>,
			mc_approach: <?php echo json_encode(array('id' => $rdata['mc_approach'], 'value' => $rdata['mc_approach'], 'text' => $jdata['mc_approach'])); ?>,
			mc_ps_style: <?php echo json_encode(array('id' => $rdata['mc_ps_style'], 'value' => $rdata['mc_ps_style'], 'text' => $jdata['mc_ps_style'])); ?>,
			os_goal_domain: <?php echo json_encode(array('id' => $rdata['os_goal_domain'], 'value' => $rdata['os_goal_domain'], 'text' => $jdata['os_goal_domain'])); ?>,
			os_goal_concern: <?php echo json_encode($jdata['os_goal_concern']); ?>,
			os_consequence_domain: <?php echo json_encode(array('id' => $rdata['os_consequence_domain'], 'value' => $rdata['os_consequence_domain'], 'text' => $jdata['os_consequence_domain'])); ?>,
			os_consequence_concern: <?php echo json_encode(array('id' => $rdata['os_consequence_concern'], 'value' => $rdata['os_consequence_concern'], 'text' => $jdata['os_consequence_concern'])); ?>,
			os_cost_domain: <?php echo json_encode(array('id' => $rdata['os_cost_domain'], 'value' => $rdata['os_cost_domain'], 'text' => $jdata['os_cost_domain'])); ?>,
			os_cost_concern: <?php echo json_encode(array('id' => $rdata['os_cost_concern'], 'value' => $rdata['os_cost_concern'], 'text' => $jdata['os_cost_concern'])); ?>,
			os_dividend_domain: <?php echo json_encode(array('id' => $rdata['os_dividend_domain'], 'value' => $rdata['os_dividend_domain'], 'text' => $jdata['os_dividend_domain'])); ?>,
			os_dividend_concern: <?php echo json_encode(array('id' => $rdata['os_dividend_concern'], 'value' => $rdata['os_dividend_concern'], 'text' => $jdata['os_dividend_concern'])); ?>,
			os_requirements_domain: <?php echo json_encode(array('id' => $rdata['os_requirements_domain'], 'value' => $rdata['os_requirements_domain'], 'text' => $jdata['os_requirements_domain'])); ?>,
			os_requirements_concern: <?php echo json_encode(array('id' => $rdata['os_requirements_concern'], 'value' => $rdata['os_requirements_concern'], 'text' => $jdata['os_requirements_concern'])); ?>,
			os_prerequesites_domain: <?php echo json_encode(array('id' => $rdata['os_prerequesites_domain'], 'value' => $rdata['os_prerequesites_domain'], 'text' => $jdata['os_prerequesites_domain'])); ?>,
			os_prerequesites_concern: <?php echo json_encode(array('id' => $rdata['os_prerequesites_concern'], 'value' => $rdata['os_prerequesites_concern'], 'text' => $jdata['os_prerequesites_concern'])); ?>,
			os_preconditions_domain: <?php echo json_encode(array('id' => $rdata['os_preconditions_domain'], 'value' => $rdata['os_preconditions_domain'], 'text' => $jdata['os_preconditions_domain'])); ?>,
			os_preconditions_concern: <?php echo json_encode(array('id' => $rdata['os_preconditions_concern'], 'value' => $rdata['os_preconditions_concern'], 'text' => $jdata['os_preconditions_concern'])); ?>,
			os_forewarnings_domain: <?php echo json_encode(array('id' => $rdata['os_forewarnings_domain'], 'value' => $rdata['os_forewarnings_domain'], 'text' => $jdata['os_forewarnings_domain'])); ?>,
			os_forewarnings_concern: <?php echo json_encode(array('id' => $rdata['os_forewarnings_concern'], 'value' => $rdata['os_forewarnings_concern'], 'text' => $jdata['os_forewarnings_concern'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for story */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'story' && d.id == data.story.id)
				return { results: [ data.story ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for agent */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'agent' && d.id == data.agent.id)
				return { results: [ data.agent ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for story_dev_chr */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'story_dev_chr' && d.id == data.story_dev_chr.id)
				return { results: [ data.story_dev_chr ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for storystatic_ost */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'storystatic_ost' && d.id == data.storystatic_ost.id)
				return { results: [ data.storystatic_ost ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for storystatic_ost autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'storystatic_ost' && d.id == data.storystatic_ost.id){
				$j('#storystatic_chr_mc' + d[rnd]).html(data.storystatic_chr_mc);
				$j('#os_goal_concern' + d[rnd]).html(data.os_goal_concern);
				return true;
			}

			return false;
		});

		/* saved value for mc_problem */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'mc_problem' && d.id == data.mc_problem.id)
				return { results: [ data.mc_problem ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for mc_resolve */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'mc_resolve' && d.id == data.mc_resolve.id)
				return { results: [ data.mc_resolve ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for mc_growth */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'mc_growth' && d.id == data.mc_growth.id)
				return { results: [ data.mc_growth ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for mc_approach */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'mc_approach' && d.id == data.mc_approach.id)
				return { results: [ data.mc_approach ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for mc_ps_style */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'mc_ps_style' && d.id == data.mc_ps_style.id)
				return { results: [ data.mc_ps_style ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_goal_domain */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_goal_domain' && d.id == data.os_goal_domain.id)
				return { results: [ data.os_goal_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_consequence_domain */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_consequence_domain' && d.id == data.os_consequence_domain.id)
				return { results: [ data.os_consequence_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_consequence_concern */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_consequence_concern' && d.id == data.os_consequence_concern.id)
				return { results: [ data.os_consequence_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_cost_domain */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_cost_domain' && d.id == data.os_cost_domain.id)
				return { results: [ data.os_cost_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_cost_concern */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_cost_concern' && d.id == data.os_cost_concern.id)
				return { results: [ data.os_cost_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_dividend_domain */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_dividend_domain' && d.id == data.os_dividend_domain.id)
				return { results: [ data.os_dividend_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_dividend_concern */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_dividend_concern' && d.id == data.os_dividend_concern.id)
				return { results: [ data.os_dividend_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_requirements_domain */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_requirements_domain' && d.id == data.os_requirements_domain.id)
				return { results: [ data.os_requirements_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_requirements_concern */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_requirements_concern' && d.id == data.os_requirements_concern.id)
				return { results: [ data.os_requirements_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_prerequesites_domain */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_prerequesites_domain' && d.id == data.os_prerequesites_domain.id)
				return { results: [ data.os_prerequesites_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_prerequesites_concern */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_prerequesites_concern' && d.id == data.os_prerequesites_concern.id)
				return { results: [ data.os_prerequesites_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_preconditions_domain */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_preconditions_domain' && d.id == data.os_preconditions_domain.id)
				return { results: [ data.os_preconditions_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_preconditions_concern */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_preconditions_concern' && d.id == data.os_preconditions_concern.id)
				return { results: [ data.os_preconditions_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_forewarnings_domain */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_forewarnings_domain' && d.id == data.os_forewarnings_domain.id)
				return { results: [ data.os_forewarnings_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_forewarnings_concern */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_forewarnings_concern' && d.id == data.os_forewarnings_concern.id)
				return { results: [ data.os_forewarnings_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

