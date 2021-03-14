<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'hist_chr_scene';

		/* data for selected record, or defaults if none is selected */
		var data = {
			team: <?php echo json_encode(array('id' => $rdata['team'], 'value' => $rdata['team'], 'text' => $jdata['team'])); ?>,
			author_id: <?php echo json_encode(array('id' => $rdata['author_id'], 'value' => $rdata['author_id'], 'text' => $jdata['author_id'])); ?>,
			author_name: <?php echo json_encode($jdata['author_name']); ?>,
			hist_story: <?php echo json_encode(array('id' => $rdata['hist_story'], 'value' => $rdata['hist_story'], 'text' => $jdata['hist_story'])); ?>,
			agent_id: <?php echo json_encode(array('id' => $rdata['agent_id'], 'value' => $rdata['agent_id'], 'text' => $jdata['agent_id'])); ?>,
			agent_name: <?php echo json_encode($jdata['agent_name']); ?>,
			bio_story: <?php echo json_encode(array('id' => $rdata['bio_story'], 'value' => $rdata['bio_story'], 'text' => $jdata['bio_story'])); ?>,
			hist_chr: <?php echo json_encode(array('id' => $rdata['hist_chr'], 'value' => $rdata['hist_chr'], 'text' => $jdata['hist_chr'])); ?>,
			bio_storyline_no: <?php echo json_encode(array('id' => $rdata['bio_storyline_no'], 'value' => $rdata['bio_storyline_no'], 'text' => $jdata['bio_storyline_no'])); ?>,
			bio_storyline_text: <?php echo json_encode($jdata['bio_storyline_text']); ?>,
			chr_element: <?php echo json_encode(array('id' => $rdata['chr_element'], 'value' => $rdata['chr_element'], 'text' => $jdata['chr_element'])); ?>,
			bio_chr_scene: <?php echo json_encode(array('id' => $rdata['bio_chr_scene'], 'value' => $rdata['bio_chr_scene'], 'text' => $jdata['bio_chr_scene'])); ?>,
			invivo_code: <?php echo json_encode(array('id' => $rdata['invivo_code'], 'value' => $rdata['invivo_code'], 'text' => $jdata['invivo_code'])); ?>,
			startdate: <?php echo json_encode(array('id' => $rdata['startdate'], 'value' => $rdata['startdate'], 'text' => $jdata['startdate'])); ?>,
			enddate: <?php echo json_encode(array('id' => $rdata['enddate'], 'value' => $rdata['enddate'], 'text' => $jdata['enddate'])); ?>,
			person: <?php echo json_encode(array('id' => $rdata['person'], 'value' => $rdata['person'], 'text' => $jdata['person'])); ?>,
			place: <?php echo json_encode(array('id' => $rdata['place'], 'value' => $rdata['place'], 'text' => $jdata['place'])); ?>,
			herme_code: <?php echo json_encode(array('id' => $rdata['herme_code'], 'value' => $rdata['herme_code'], 'text' => $jdata['herme_code'])); ?>,
			impression: <?php echo json_encode(array('id' => $rdata['impression'], 'value' => $rdata['impression'], 'text' => $jdata['impression'])); ?>,
			noetictension: <?php echo json_encode(array('id' => $rdata['noetictension'], 'value' => $rdata['noetictension'], 'text' => $jdata['noetictension'])); ?>,
			pc: <?php echo json_encode(array('id' => $rdata['pc'], 'value' => $rdata['pc'], 'text' => $jdata['pc'])); ?>,
			counterfactual: <?php echo json_encode(array('id' => $rdata['counterfactual'], 'value' => $rdata['counterfactual'], 'text' => $jdata['counterfactual'])); ?>,
			dilemma: <?php echo json_encode(array('id' => $rdata['dilemma'], 'value' => $rdata['dilemma'], 'text' => $jdata['dilemma'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for team */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'team' && d.id == data.team.id)
				return { results: [ data.team ], more: false, elapsed: 0.01 };
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

		/* saved value for hist_story */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'hist_story' && d.id == data.hist_story.id)
				return { results: [ data.hist_story ], more: false, elapsed: 0.01 };
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

		/* saved value for hist_chr */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'hist_chr' && d.id == data.hist_chr.id)
				return { results: [ data.hist_chr ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_storyline_no */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_storyline_no' && d.id == data.bio_storyline_no.id)
				return { results: [ data.bio_storyline_no ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_storyline_no autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'bio_storyline_no' && d.id == data.bio_storyline_no.id) {
				$j('#bio_storyline_text' + d[rnd]).html(data.bio_storyline_text);
				return true;
			}

			return false;
		});

		/* saved value for chr_element */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'chr_element' && d.id == data.chr_element.id)
				return { results: [ data.chr_element ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_chr_scene */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_chr_scene' && d.id == data.bio_chr_scene.id)
				return { results: [ data.bio_chr_scene ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for invivo_code */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'invivo_code' && d.id == data.invivo_code.id)
				return { results: [ data.invivo_code ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for startdate */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'startdate' && d.id == data.startdate.id)
				return { results: [ data.startdate ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for enddate */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'enddate' && d.id == data.enddate.id)
				return { results: [ data.enddate ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for person */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'person' && d.id == data.person.id)
				return { results: [ data.person ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for place */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'place' && d.id == data.place.id)
				return { results: [ data.place ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for herme_code */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'herme_code' && d.id == data.herme_code.id)
				return { results: [ data.herme_code ], more: false, elapsed: 0.01 };
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

		/* saved value for counterfactual */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'counterfactual' && d.id == data.counterfactual.id)
				return { results: [ data.counterfactual ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for dilemma */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'dilemma' && d.id == data.dilemma.id)
				return { results: [ data.dilemma ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

