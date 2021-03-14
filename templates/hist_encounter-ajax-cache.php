<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'hist_encounter';

		/* data for selected record, or defaults if none is selected */
		var data = {
			hist_story: <?php echo json_encode(array('id' => $rdata['hist_story'], 'value' => $rdata['hist_story'], 'text' => $jdata['hist_story'])); ?>,
			agentA: <?php echo json_encode(array('id' => $rdata['agentA'], 'value' => $rdata['agentA'], 'text' => $jdata['agentA'])); ?>,
			agent_nameA: <?php echo json_encode($jdata['agent_nameA']); ?>,
			bio_storyA: <?php echo json_encode(array('id' => $rdata['bio_storyA'], 'value' => $rdata['bio_storyA'], 'text' => $jdata['bio_storyA'])); ?>,
			hist_chrA: <?php echo json_encode(array('id' => $rdata['hist_chrA'], 'value' => $rdata['hist_chrA'], 'text' => $jdata['hist_chrA'])); ?>,
			bio_chr_sceneA: <?php echo json_encode(array('id' => $rdata['bio_chr_sceneA'], 'value' => $rdata['bio_chr_sceneA'], 'text' => $jdata['bio_chr_sceneA'])); ?>,
			bio_impressionA: <?php echo json_encode(array('id' => $rdata['bio_impressionA'], 'value' => $rdata['bio_impressionA'], 'text' => $jdata['bio_impressionA'])); ?>,
			bio_ntA: <?php echo json_encode(array('id' => $rdata['bio_ntA'], 'value' => $rdata['bio_ntA'], 'text' => $jdata['bio_ntA'])); ?>,
			bio_counterfactualA: <?php echo json_encode(array('id' => $rdata['bio_counterfactualA'], 'value' => $rdata['bio_counterfactualA'], 'text' => $jdata['bio_counterfactualA'])); ?>,
			bio_dilemmaA: <?php echo json_encode(array('id' => $rdata['bio_dilemmaA'], 'value' => $rdata['bio_dilemmaA'], 'text' => $jdata['bio_dilemmaA'])); ?>,
			bio_sdgA: <?php echo json_encode(array('id' => $rdata['bio_sdgA'], 'value' => $rdata['bio_sdgA'], 'text' => $jdata['bio_sdgA'])); ?>,
			startdateA: <?php echo json_encode(array('id' => $rdata['startdateA'], 'value' => $rdata['startdateA'], 'text' => $jdata['startdateA'])); ?>,
			enddateA: <?php echo json_encode(array('id' => $rdata['enddateA'], 'value' => $rdata['enddateA'], 'text' => $jdata['enddateA'])); ?>,
			sceneA: <?php echo json_encode(array('id' => $rdata['sceneA'], 'value' => $rdata['sceneA'], 'text' => $jdata['sceneA'])); ?>,
			agentB: <?php echo json_encode(array('id' => $rdata['agentB'], 'value' => $rdata['agentB'], 'text' => $jdata['agentB'])); ?>,
			agent_nameB: <?php echo json_encode($jdata['agent_nameB']); ?>,
			bio_storyB: <?php echo json_encode(array('id' => $rdata['bio_storyB'], 'value' => $rdata['bio_storyB'], 'text' => $jdata['bio_storyB'])); ?>,
			hist_chrB: <?php echo json_encode(array('id' => $rdata['hist_chrB'], 'value' => $rdata['hist_chrB'], 'text' => $jdata['hist_chrB'])); ?>,
			bio_chr_sceneB: <?php echo json_encode(array('id' => $rdata['bio_chr_sceneB'], 'value' => $rdata['bio_chr_sceneB'], 'text' => $jdata['bio_chr_sceneB'])); ?>,
			bio_impressionB: <?php echo json_encode(array('id' => $rdata['bio_impressionB'], 'value' => $rdata['bio_impressionB'], 'text' => $jdata['bio_impressionB'])); ?>,
			bio_ntB: <?php echo json_encode(array('id' => $rdata['bio_ntB'], 'value' => $rdata['bio_ntB'], 'text' => $jdata['bio_ntB'])); ?>,
			bio_counterfactualB: <?php echo json_encode(array('id' => $rdata['bio_counterfactualB'], 'value' => $rdata['bio_counterfactualB'], 'text' => $jdata['bio_counterfactualB'])); ?>,
			bio_dilemmaB: <?php echo json_encode(array('id' => $rdata['bio_dilemmaB'], 'value' => $rdata['bio_dilemmaB'], 'text' => $jdata['bio_dilemmaB'])); ?>,
			bio_sdgB: <?php echo json_encode(array('id' => $rdata['bio_sdgB'], 'value' => $rdata['bio_sdgB'], 'text' => $jdata['bio_sdgB'])); ?>,
			startdateB: <?php echo json_encode(array('id' => $rdata['startdateB'], 'value' => $rdata['startdateB'], 'text' => $jdata['startdateB'])); ?>,
			enddateB: <?php echo json_encode(array('id' => $rdata['enddateB'], 'value' => $rdata['enddateB'], 'text' => $jdata['enddateB'])); ?>,
			sdg_intgr: <?php echo json_encode(array('id' => $rdata['sdg_intgr'], 'value' => $rdata['sdg_intgr'], 'text' => $jdata['sdg_intgr'])); ?>,
			encounter_team: <?php echo json_encode(array('id' => $rdata['encounter_team'], 'value' => $rdata['encounter_team'], 'text' => $jdata['encounter_team'])); ?>,
			encounter_analyst: <?php echo json_encode(array('id' => $rdata['encounter_analyst'], 'value' => $rdata['encounter_analyst'], 'text' => $jdata['encounter_analyst'])); ?>
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

		/* saved value for agentA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'agentA' && d.id == data.agentA.id)
				return { results: [ data.agentA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for agentA autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'agentA' && d.id == data.agentA.id) {
				$j('#agent_nameA' + d[rnd]).html(data.agent_nameA);
				$j('#agent_nameB' + d[rnd]).html(data.agent_nameB);
				return true;
			}

			return false;
		});

		/* saved value for bio_storyA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_storyA' && d.id == data.bio_storyA.id)
				return { results: [ data.bio_storyA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for hist_chrA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'hist_chrA' && d.id == data.hist_chrA.id)
				return { results: [ data.hist_chrA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_chr_sceneA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_chr_sceneA' && d.id == data.bio_chr_sceneA.id)
				return { results: [ data.bio_chr_sceneA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_impressionA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_impressionA' && d.id == data.bio_impressionA.id)
				return { results: [ data.bio_impressionA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_ntA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_ntA' && d.id == data.bio_ntA.id)
				return { results: [ data.bio_ntA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_counterfactualA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_counterfactualA' && d.id == data.bio_counterfactualA.id)
				return { results: [ data.bio_counterfactualA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_dilemmaA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_dilemmaA' && d.id == data.bio_dilemmaA.id)
				return { results: [ data.bio_dilemmaA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_sdgA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_sdgA' && d.id == data.bio_sdgA.id)
				return { results: [ data.bio_sdgA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for startdateA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'startdateA' && d.id == data.startdateA.id)
				return { results: [ data.startdateA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for enddateA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'enddateA' && d.id == data.enddateA.id)
				return { results: [ data.enddateA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for sceneA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'sceneA' && d.id == data.sceneA.id)
				return { results: [ data.sceneA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for agentB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'agentB' && d.id == data.agentB.id)
				return { results: [ data.agentB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_storyB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_storyB' && d.id == data.bio_storyB.id)
				return { results: [ data.bio_storyB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for hist_chrB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'hist_chrB' && d.id == data.hist_chrB.id)
				return { results: [ data.hist_chrB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_chr_sceneB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_chr_sceneB' && d.id == data.bio_chr_sceneB.id)
				return { results: [ data.bio_chr_sceneB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_impressionB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_impressionB' && d.id == data.bio_impressionB.id)
				return { results: [ data.bio_impressionB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_ntB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_ntB' && d.id == data.bio_ntB.id)
				return { results: [ data.bio_ntB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_counterfactualB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_counterfactualB' && d.id == data.bio_counterfactualB.id)
				return { results: [ data.bio_counterfactualB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_dilemmaB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_dilemmaB' && d.id == data.bio_dilemmaB.id)
				return { results: [ data.bio_dilemmaB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_sdgB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_sdgB' && d.id == data.bio_sdgB.id)
				return { results: [ data.bio_sdgB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for startdateB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'startdateB' && d.id == data.startdateB.id)
				return { results: [ data.startdateB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for enddateB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'enddateB' && d.id == data.enddateB.id)
				return { results: [ data.enddateB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for sdg_intgr */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'sdg_intgr' && d.id == data.sdg_intgr.id)
				return { results: [ data.sdg_intgr ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for encounter_team */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'encounter_team' && d.id == data.encounter_team.id)
				return { results: [ data.encounter_team ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for encounter_analyst */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'encounter_analyst' && d.id == data.encounter_analyst.id)
				return { results: [ data.encounter_analyst ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

