<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'code_chrev_scenes';

		/* data for selected record, or defaults if none is selected */
		var data = {
			author: <?php echo json_encode(array('id' => $rdata['author'], 'value' => $rdata['author'], 'text' => $jdata['author'])); ?>,
			bibliography: <?php echo json_encode(array('id' => $rdata['bibliography'], 'value' => $rdata['bibliography'], 'text' => $jdata['bibliography'])); ?>,
			transcript: <?php echo json_encode(array('id' => $rdata['transcript'], 'value' => $rdata['transcript'], 'text' => $jdata['transcript'])); ?>,
			token_sequence: <?php echo json_encode(array('id' => $rdata['token_sequence'], 'value' => $rdata['token_sequence'], 'text' => $jdata['token_sequence'])); ?>,
			token: <?php echo json_encode($jdata['token']); ?>,
			invivo_code: <?php echo json_encode(array('id' => $rdata['invivo_code'], 'value' => $rdata['invivo_code'], 'text' => $jdata['invivo_code'])); ?>,
			startdate: <?php echo json_encode(array('id' => $rdata['startdate'], 'value' => $rdata['startdate'], 'text' => $jdata['startdate'])); ?>,
			enddate: <?php echo json_encode($jdata['enddate']); ?>,
			person: <?php echo json_encode($jdata['person']); ?>,
			place: <?php echo json_encode($jdata['place']); ?>,
			herme_code: <?php echo json_encode(array('id' => $rdata['herme_code'], 'value' => $rdata['herme_code'], 'text' => $jdata['herme_code'])); ?>,
			impression: <?php echo json_encode($jdata['impression']); ?>,
			noetictension: <?php echo json_encode($jdata['noetictension']); ?>,
			pc: <?php echo json_encode($jdata['pc']); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for author */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'author' && d.id == data.author.id)
				return { results: [ data.author ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bibliography */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bibliography' && d.id == data.bibliography.id)
				return { results: [ data.bibliography ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for transcript */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'transcript' && d.id == data.transcript.id)
				return { results: [ data.transcript ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for token_sequence */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'token_sequence' && d.id == data.token_sequence.id)
				return { results: [ data.token_sequence ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for token_sequence autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'token_sequence' && d.id == data.token_sequence.id){
				$j('#token' + d[rnd]).html(data.token);
				return true;
			}

			return false;
		});

		/* saved value for invivo_code */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'invivo_code' && d.id == data.invivo_code.id)
				return { results: [ data.invivo_code ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for invivo_code autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'invivo_code' && d.id == data.invivo_code.id){
				$j('#enddate' + d[rnd]).html(data.enddate);
				$j('#person' + d[rnd]).html(data.person);
				$j('#place' + d[rnd]).html(data.place);
				return true;
			}

			return false;
		});

		/* saved value for startdate */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'startdate' && d.id == data.startdate.id)
				return { results: [ data.startdate ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for herme_code */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'herme_code' && d.id == data.herme_code.id)
				return { results: [ data.herme_code ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for herme_code autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'herme_code' && d.id == data.herme_code.id){
				$j('#impression' + d[rnd]).html(data.impression);
				$j('#noetictension' + d[rnd]).html(data.noetictension);
				$j('#pc' + d[rnd]).html(data.pc);
				return true;
			}

			return false;
		});

		cache.start();
	});
</script>

