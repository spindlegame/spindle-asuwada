<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'bio_chr_scenes';

		/* data for selected record, or defaults if none is selected */
		var data = {
			biography: <?php echo json_encode(array('id' => $rdata['biography'], 'value' => $rdata['biography'], 'text' => $jdata['biography'])); ?>,
			author_id: <?php echo json_encode(array('id' => $rdata['author_id'], 'value' => $rdata['author_id'], 'text' => $jdata['author_id'])); ?>,
			author_name: <?php echo json_encode($jdata['author_name']); ?>,
			bibliography: <?php echo json_encode(array('id' => $rdata['bibliography'], 'value' => $rdata['bibliography'], 'text' => $jdata['bibliography'])); ?>,
			transcript: <?php echo json_encode(array('id' => $rdata['transcript'], 'value' => $rdata['transcript'], 'text' => $jdata['transcript'])); ?>,
			token_sequence: <?php echo json_encode($jdata['token_sequence']); ?>,
			token: <?php echo json_encode(array('id' => $rdata['token'], 'value' => $rdata['token'], 'text' => $jdata['token'])); ?>,
			invivo_code: <?php echo json_encode(array('id' => $rdata['invivo_code'], 'value' => $rdata['invivo_code'], 'text' => $jdata['invivo_code'])); ?>,
			startdate: <?php echo json_encode(array('id' => $rdata['startdate'], 'value' => $rdata['startdate'], 'text' => $jdata['startdate'])); ?>,
			enddate: <?php echo json_encode($jdata['enddate']); ?>,
			person: <?php echo json_encode($jdata['person']); ?>,
			place: <?php echo json_encode($jdata['place']); ?>,
			herme_code: <?php echo json_encode(array('id' => $rdata['herme_code'], 'value' => $rdata['herme_code'], 'text' => $jdata['herme_code'])); ?>,
			impression: <?php echo json_encode($jdata['impression']); ?>,
			noetictension: <?php echo json_encode($jdata['noetictension']); ?>,
			pc: <?php echo json_encode($jdata['pc']); ?>,
			chr_element: <?php echo json_encode(array('id' => $rdata['chr_element'], 'value' => $rdata['chr_element'], 'text' => $jdata['chr_element'])); ?>
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

		/* saved value for token */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'token' && d.id == data.token.id)
				return { results: [ data.token ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for token autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'token' && d.id == data.token.id) {
				$j('#token_sequence' + d[rnd]).html(data.token_sequence);
				return true;
			}

			return false;
		});

		/* saved value for invivo_code */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'invivo_code' && d.id == data.invivo_code.id)
				return { results: [ data.invivo_code ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for invivo_code autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'invivo_code' && d.id == data.invivo_code.id) {
				$j('#enddate' + d[rnd]).html(data.enddate);
				$j('#person' + d[rnd]).html(data.person);
				$j('#place' + d[rnd]).html(data.place);
				return true;
			}

			return false;
		});

		/* saved value for startdate */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'startdate' && d.id == data.startdate.id)
				return { results: [ data.startdate ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for herme_code */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'herme_code' && d.id == data.herme_code.id)
				return { results: [ data.herme_code ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for herme_code autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'herme_code' && d.id == data.herme_code.id) {
				$j('#impression' + d[rnd]).html(data.impression);
				$j('#noetictension' + d[rnd]).html(data.noetictension);
				$j('#pc' + d[rnd]).html(data.pc);
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

		cache.start();
	});
</script>

