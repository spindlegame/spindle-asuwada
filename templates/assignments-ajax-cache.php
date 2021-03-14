<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'assignments';

		/* data for selected record, or defaults if none is selected */
		var data = {
			ProjectId: <?php echo json_encode(array('id' => $rdata['ProjectId'], 'value' => $rdata['ProjectId'], 'text' => $jdata['ProjectId'])); ?>,
			ProjectDuration: <?php echo json_encode($jdata['ProjectDuration']); ?>,
			RessourceId: <?php echo json_encode(array('id' => $rdata['RessourceId'], 'value' => $rdata['RessourceId'], 'text' => $jdata['RessourceId'])); ?>,
			author_id: <?php echo json_encode(array('id' => $rdata['author_id'], 'value' => $rdata['author_id'], 'text' => $jdata['author_id'])); ?>,
			author_name: <?php echo json_encode($jdata['author_name']); ?>,
			biblio_doc: <?php echo json_encode(array('id' => $rdata['biblio_doc'], 'value' => $rdata['biblio_doc'], 'text' => $jdata['biblio_doc'])); ?>,
			biblio_trascript: <?php echo json_encode(array('id' => $rdata['biblio_trascript'], 'value' => $rdata['biblio_trascript'], 'text' => $jdata['biblio_trascript'])); ?>,
			biblio_token: <?php echo json_encode(array('id' => $rdata['biblio_token'], 'value' => $rdata['biblio_token'], 'text' => $jdata['biblio_token'])); ?>,
			invivio_code: <?php echo json_encode(array('id' => $rdata['invivio_code'], 'value' => $rdata['invivio_code'], 'text' => $jdata['invivio_code'])); ?>,
			StartDate: <?php echo json_encode(array('id' => $rdata['StartDate'], 'value' => $rdata['StartDate'], 'text' => $jdata['StartDate'])); ?>,
			EndDate: <?php echo json_encode($jdata['EndDate']); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for ProjectId */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'ProjectId' && d.id == data.ProjectId.id)
				return { results: [ data.ProjectId ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for ProjectId autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'ProjectId' && d.id == data.ProjectId.id) {
				$j('#ProjectDuration' + d[rnd]).html(data.ProjectDuration);
				return true;
			}

			return false;
		});

		/* saved value for RessourceId */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'RessourceId' && d.id == data.RessourceId.id)
				return { results: [ data.RessourceId ], more: false, elapsed: 0.01 };
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

		/* saved value for biblio_doc */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'biblio_doc' && d.id == data.biblio_doc.id)
				return { results: [ data.biblio_doc ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for biblio_trascript */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'biblio_trascript' && d.id == data.biblio_trascript.id)
				return { results: [ data.biblio_trascript ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for biblio_token */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'biblio_token' && d.id == data.biblio_token.id)
				return { results: [ data.biblio_token ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for invivio_code */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'invivio_code' && d.id == data.invivio_code.id)
				return { results: [ data.invivio_code ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for invivio_code autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'invivio_code' && d.id == data.invivio_code.id) {
				$j('#EndDate' + d[rnd]).html(data.EndDate);
				return true;
			}

			return false;
		});

		/* saved value for StartDate */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'StartDate' && d.id == data.StartDate.id)
				return { results: [ data.StartDate ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

