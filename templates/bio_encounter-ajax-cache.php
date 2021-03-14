<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'bio_encounter';

		/* data for selected record, or defaults if none is selected */
		var data = {
			authorA: <?php echo json_encode(array('id' => $rdata['authorA'], 'value' => $rdata['authorA'], 'text' => $jdata['authorA'])); ?>,
			author_nameA: <?php echo json_encode($jdata['author_nameA']); ?>,
			bibliographyA: <?php echo json_encode(array('id' => $rdata['bibliographyA'], 'value' => $rdata['bibliographyA'], 'text' => $jdata['bibliographyA'])); ?>,
			transcriptA: <?php echo json_encode(array('id' => $rdata['transcriptA'], 'value' => $rdata['transcriptA'], 'text' => $jdata['transcriptA'])); ?>,
			tokenA: <?php echo json_encode(array('id' => $rdata['tokenA'], 'value' => $rdata['tokenA'], 'text' => $jdata['tokenA'])); ?>,
			bio_impressionA: <?php echo json_encode(array('id' => $rdata['bio_impressionA'], 'value' => $rdata['bio_impressionA'], 'text' => $jdata['bio_impressionA'])); ?>,
			bio_ntA: <?php echo json_encode(array('id' => $rdata['bio_ntA'], 'value' => $rdata['bio_ntA'], 'text' => $jdata['bio_ntA'])); ?>,
			bio_counterfactualA: <?php echo json_encode(array('id' => $rdata['bio_counterfactualA'], 'value' => $rdata['bio_counterfactualA'], 'text' => $jdata['bio_counterfactualA'])); ?>,
			bio_dilemmaA: <?php echo json_encode(array('id' => $rdata['bio_dilemmaA'], 'value' => $rdata['bio_dilemmaA'], 'text' => $jdata['bio_dilemmaA'])); ?>,
			bio_sdgA: <?php echo json_encode(array('id' => $rdata['bio_sdgA'], 'value' => $rdata['bio_sdgA'], 'text' => $jdata['bio_sdgA'])); ?>,
			startdateA: <?php echo json_encode(array('id' => $rdata['startdateA'], 'value' => $rdata['startdateA'], 'text' => $jdata['startdateA'])); ?>,
			enddateA: <?php echo json_encode(array('id' => $rdata['enddateA'], 'value' => $rdata['enddateA'], 'text' => $jdata['enddateA'])); ?>,
			sceneA: <?php echo json_encode(array('id' => $rdata['sceneA'], 'value' => $rdata['sceneA'], 'text' => $jdata['sceneA'])); ?>,
			authorB: <?php echo json_encode(array('id' => $rdata['authorB'], 'value' => $rdata['authorB'], 'text' => $jdata['authorB'])); ?>,
			author_nameB: <?php echo json_encode($jdata['author_nameB']); ?>,
			bibliographyB: <?php echo json_encode(array('id' => $rdata['bibliographyB'], 'value' => $rdata['bibliographyB'], 'text' => $jdata['bibliographyB'])); ?>,
			transcriptB: <?php echo json_encode(array('id' => $rdata['transcriptB'], 'value' => $rdata['transcriptB'], 'text' => $jdata['transcriptB'])); ?>,
			tokenB: <?php echo json_encode(array('id' => $rdata['tokenB'], 'value' => $rdata['tokenB'], 'text' => $jdata['tokenB'])); ?>,
			bio_impressionB: <?php echo json_encode(array('id' => $rdata['bio_impressionB'], 'value' => $rdata['bio_impressionB'], 'text' => $jdata['bio_impressionB'])); ?>,
			bio_ntB: <?php echo json_encode(array('id' => $rdata['bio_ntB'], 'value' => $rdata['bio_ntB'], 'text' => $jdata['bio_ntB'])); ?>,
			bio_counterfactualB: <?php echo json_encode(array('id' => $rdata['bio_counterfactualB'], 'value' => $rdata['bio_counterfactualB'], 'text' => $jdata['bio_counterfactualB'])); ?>,
			bio_dilemmaB: <?php echo json_encode(array('id' => $rdata['bio_dilemmaB'], 'value' => $rdata['bio_dilemmaB'], 'text' => $jdata['bio_dilemmaB'])); ?>,
			bio_sdgB: <?php echo json_encode(array('id' => $rdata['bio_sdgB'], 'value' => $rdata['bio_sdgB'], 'text' => $jdata['bio_sdgB'])); ?>,
			startdateB: <?php echo json_encode(array('id' => $rdata['startdateB'], 'value' => $rdata['startdateB'], 'text' => $jdata['startdateB'])); ?>,
			enddateB: <?php echo json_encode(array('id' => $rdata['enddateB'], 'value' => $rdata['enddateB'], 'text' => $jdata['enddateB'])); ?>,
			sceneB: <?php echo json_encode(array('id' => $rdata['sceneB'], 'value' => $rdata['sceneB'], 'text' => $jdata['sceneB'])); ?>,
			encounter_team: <?php echo json_encode(array('id' => $rdata['encounter_team'], 'value' => $rdata['encounter_team'], 'text' => $jdata['encounter_team'])); ?>,
			encounter_analyst: <?php echo json_encode(array('id' => $rdata['encounter_analyst'], 'value' => $rdata['encounter_analyst'], 'text' => $jdata['encounter_analyst'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for authorA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'authorA' && d.id == data.authorA.id)
				return { results: [ data.authorA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for authorA autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'authorA' && d.id == data.authorA.id) {
				$j('#author_nameA' + d[rnd]).html(data.author_nameA);
				$j('#author_nameB' + d[rnd]).html(data.author_nameB);
				return true;
			}

			return false;
		});

		/* saved value for bibliographyA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bibliographyA' && d.id == data.bibliographyA.id)
				return { results: [ data.bibliographyA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for transcriptA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'transcriptA' && d.id == data.transcriptA.id)
				return { results: [ data.transcriptA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for tokenA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'tokenA' && d.id == data.tokenA.id)
				return { results: [ data.tokenA ], more: false, elapsed: 0.01 };
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

		/* saved value for authorB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'authorB' && d.id == data.authorB.id)
				return { results: [ data.authorB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bibliographyB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bibliographyB' && d.id == data.bibliographyB.id)
				return { results: [ data.bibliographyB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for transcriptB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'transcriptB' && d.id == data.transcriptB.id)
				return { results: [ data.transcriptB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for tokenB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'tokenB' && d.id == data.tokenB.id)
				return { results: [ data.tokenB ], more: false, elapsed: 0.01 };
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

		/* saved value for sceneB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'sceneB' && d.id == data.sceneB.id)
				return { results: [ data.sceneB ], more: false, elapsed: 0.01 };
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

