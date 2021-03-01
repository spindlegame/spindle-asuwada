<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'hist_storydynamic';

		/* data for selected record, or defaults if none is selected */
		var data = {
			hist_story: <?php echo json_encode(array('id' => $rdata['hist_story'], 'value' => $rdata['hist_story'], 'text' => $jdata['hist_story'])); ?>,
			bio_story_mc: <?php echo json_encode(array('id' => $rdata['bio_story_mc'], 'value' => $rdata['bio_story_mc'], 'text' => $jdata['bio_story_mc'])); ?>,
			hist_chr_mc: <?php echo json_encode(array('id' => $rdata['hist_chr_mc'], 'value' => $rdata['hist_chr_mc'], 'text' => $jdata['hist_chr_mc'])); ?>,
			storystatic_mc: <?php echo json_encode(array('id' => $rdata['storystatic_mc'], 'value' => $rdata['storystatic_mc'], 'text' => $jdata['storystatic_mc'])); ?>,
			story_chr_mc: <?php echo json_encode(array('id' => $rdata['story_chr_mc'], 'value' => $rdata['story_chr_mc'], 'text' => $jdata['story_chr_mc'])); ?>,
			mc_problem: <?php echo json_encode(array('id' => $rdata['mc_problem'], 'value' => $rdata['mc_problem'], 'text' => $jdata['mc_problem'])); ?>,
			mc_resolve: <?php echo json_encode(array('id' => $rdata['mc_resolve'], 'value' => $rdata['mc_resolve'], 'text' => $jdata['mc_resolve'])); ?>,
			mc_growth: <?php echo json_encode(array('id' => $rdata['mc_growth'], 'value' => $rdata['mc_growth'], 'text' => $jdata['mc_growth'])); ?>,
			mc_approach: <?php echo json_encode(array('id' => $rdata['mc_approach'], 'value' => $rdata['mc_approach'], 'text' => $jdata['mc_approach'])); ?>,
			mc_ps_style: <?php echo json_encode(array('id' => $rdata['mc_ps_style'], 'value' => $rdata['mc_ps_style'], 'text' => $jdata['mc_ps_style'])); ?>,
			story_chr_ic: <?php echo json_encode(array('id' => $rdata['story_chr_ic'], 'value' => $rdata['story_chr_ic'], 'text' => $jdata['story_chr_ic'])); ?>,
			ic_resolve: <?php echo json_encode(array('id' => $rdata['ic_resolve'], 'value' => $rdata['ic_resolve'], 'text' => $jdata['ic_resolve'])); ?>,
			dp_cat1: <?php echo json_encode(array('id' => $rdata['dp_cat1'], 'value' => $rdata['dp_cat1'], 'text' => $jdata['dp_cat1'])); ?>,
			dp_cat2: <?php echo json_encode(array('id' => $rdata['dp_cat2'], 'value' => $rdata['dp_cat2'], 'text' => $jdata['dp_cat2'])); ?>,
			dp_cat3_driver: <?php echo json_encode(array('id' => $rdata['dp_cat3_driver'], 'value' => $rdata['dp_cat3_driver'], 'text' => $jdata['dp_cat3_driver'])); ?>,
			os_driver: <?php echo json_encode(array('id' => $rdata['os_driver'], 'value' => $rdata['os_driver'], 'text' => $jdata['os_driver'])); ?>,
			dp_cat3_limit: <?php echo json_encode(array('id' => $rdata['dp_cat3_limit'], 'value' => $rdata['dp_cat3_limit'], 'text' => $jdata['dp_cat3_limit'])); ?>,
			os_limit: <?php echo json_encode(array('id' => $rdata['os_limit'], 'value' => $rdata['os_limit'], 'text' => $jdata['os_limit'])); ?>,
			dp_cat3_outcome: <?php echo json_encode(array('id' => $rdata['dp_cat3_outcome'], 'value' => $rdata['dp_cat3_outcome'], 'text' => $jdata['dp_cat3_outcome'])); ?>,
			os_outcome: <?php echo json_encode(array('id' => $rdata['os_outcome'], 'value' => $rdata['os_outcome'], 'text' => $jdata['os_outcome'])); ?>,
			dp_cat3_judgement: <?php echo json_encode(array('id' => $rdata['dp_cat3_judgement'], 'value' => $rdata['dp_cat3_judgement'], 'text' => $jdata['dp_cat3_judgement'])); ?>,
			os_judgement: <?php echo json_encode(array('id' => $rdata['os_judgement'], 'value' => $rdata['os_judgement'], 'text' => $jdata['os_judgement'])); ?>,
			os_goal_domain: <?php echo json_encode(array('id' => $rdata['os_goal_domain'], 'value' => $rdata['os_goal_domain'], 'text' => $jdata['os_goal_domain'])); ?>,
			os_goal_concern: <?php echo json_encode(array('id' => $rdata['os_goal_concern'], 'value' => $rdata['os_goal_concern'], 'text' => $jdata['os_goal_concern'])); ?>,
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

		/* saved value for hist_story */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'hist_story' && d.id == data.hist_story.id)
				return { results: [ data.hist_story ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_story_mc */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_story_mc' && d.id == data.bio_story_mc.id)
				return { results: [ data.bio_story_mc ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for hist_chr_mc */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'hist_chr_mc' && d.id == data.hist_chr_mc.id)
				return { results: [ data.hist_chr_mc ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for storystatic_mc */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'storystatic_mc' && d.id == data.storystatic_mc.id)
				return { results: [ data.storystatic_mc ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for story_chr_mc */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'story_chr_mc' && d.id == data.story_chr_mc.id)
				return { results: [ data.story_chr_mc ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for mc_problem */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'mc_problem' && d.id == data.mc_problem.id)
				return { results: [ data.mc_problem ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for mc_resolve */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'mc_resolve' && d.id == data.mc_resolve.id)
				return { results: [ data.mc_resolve ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for mc_growth */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'mc_growth' && d.id == data.mc_growth.id)
				return { results: [ data.mc_growth ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for mc_approach */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'mc_approach' && d.id == data.mc_approach.id)
				return { results: [ data.mc_approach ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for mc_ps_style */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'mc_ps_style' && d.id == data.mc_ps_style.id)
				return { results: [ data.mc_ps_style ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for story_chr_ic */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'story_chr_ic' && d.id == data.story_chr_ic.id)
				return { results: [ data.story_chr_ic ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for ic_resolve */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'ic_resolve' && d.id == data.ic_resolve.id)
				return { results: [ data.ic_resolve ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for dp_cat1 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'dp_cat1' && d.id == data.dp_cat1.id)
				return { results: [ data.dp_cat1 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for dp_cat2 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'dp_cat2' && d.id == data.dp_cat2.id)
				return { results: [ data.dp_cat2 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for dp_cat3_driver */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'dp_cat3_driver' && d.id == data.dp_cat3_driver.id)
				return { results: [ data.dp_cat3_driver ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_driver */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_driver' && d.id == data.os_driver.id)
				return { results: [ data.os_driver ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for dp_cat3_limit */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'dp_cat3_limit' && d.id == data.dp_cat3_limit.id)
				return { results: [ data.dp_cat3_limit ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_limit */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_limit' && d.id == data.os_limit.id)
				return { results: [ data.os_limit ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for dp_cat3_outcome */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'dp_cat3_outcome' && d.id == data.dp_cat3_outcome.id)
				return { results: [ data.dp_cat3_outcome ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_outcome */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_outcome' && d.id == data.os_outcome.id)
				return { results: [ data.os_outcome ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for dp_cat3_judgement */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'dp_cat3_judgement' && d.id == data.dp_cat3_judgement.id)
				return { results: [ data.dp_cat3_judgement ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_judgement */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_judgement' && d.id == data.os_judgement.id)
				return { results: [ data.os_judgement ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_goal_domain */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_goal_domain' && d.id == data.os_goal_domain.id)
				return { results: [ data.os_goal_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_goal_concern */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_goal_concern' && d.id == data.os_goal_concern.id)
				return { results: [ data.os_goal_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_consequence_domain */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_consequence_domain' && d.id == data.os_consequence_domain.id)
				return { results: [ data.os_consequence_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_consequence_concern */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_consequence_concern' && d.id == data.os_consequence_concern.id)
				return { results: [ data.os_consequence_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_cost_domain */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_cost_domain' && d.id == data.os_cost_domain.id)
				return { results: [ data.os_cost_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_cost_concern */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_cost_concern' && d.id == data.os_cost_concern.id)
				return { results: [ data.os_cost_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_dividend_domain */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_dividend_domain' && d.id == data.os_dividend_domain.id)
				return { results: [ data.os_dividend_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_dividend_concern */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_dividend_concern' && d.id == data.os_dividend_concern.id)
				return { results: [ data.os_dividend_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_requirements_domain */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_requirements_domain' && d.id == data.os_requirements_domain.id)
				return { results: [ data.os_requirements_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_requirements_concern */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_requirements_concern' && d.id == data.os_requirements_concern.id)
				return { results: [ data.os_requirements_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_prerequesites_domain */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_prerequesites_domain' && d.id == data.os_prerequesites_domain.id)
				return { results: [ data.os_prerequesites_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_prerequesites_concern */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_prerequesites_concern' && d.id == data.os_prerequesites_concern.id)
				return { results: [ data.os_prerequesites_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_preconditions_domain */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_preconditions_domain' && d.id == data.os_preconditions_domain.id)
				return { results: [ data.os_preconditions_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_preconditions_concern */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_preconditions_concern' && d.id == data.os_preconditions_concern.id)
				return { results: [ data.os_preconditions_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_forewarnings_domain */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_forewarnings_domain' && d.id == data.os_forewarnings_domain.id)
				return { results: [ data.os_forewarnings_domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for os_forewarnings_concern */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'os_forewarnings_concern' && d.id == data.os_forewarnings_concern.id)
				return { results: [ data.os_forewarnings_concern ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

