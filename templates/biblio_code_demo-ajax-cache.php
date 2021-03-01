<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'biblio_code_demo';

		/* data for selected record, or defaults if none is selected */
		var data = {
			author: <?php echo json_encode(array('id' => $rdata['author'], 'value' => $rdata['author'], 'text' => $jdata['author'])); ?>,
			bibliography: <?php echo json_encode(array('id' => $rdata['bibliography'], 'value' => $rdata['bibliography'], 'text' => $jdata['bibliography'])); ?>,
			transcript: <?php echo json_encode(array('id' => $rdata['transcript'], 'value' => $rdata['transcript'], 'text' => $jdata['transcript'])); ?>,
			token_id: <?php echo json_encode(array('id' => $rdata['token_id'], 'value' => $rdata['token_id'], 'text' => $jdata['token_id'])); ?>,
			token: <?php echo json_encode(array('id' => $rdata['token'], 'value' => $rdata['token'], 'text' => $jdata['token'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for author */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'author' && d.id == data.author.id)
				return { results: [ data.author ], more: false, elapsed: 0.01 };
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

		/* saved value for token_id */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'token_id' && d.id == data.token_id.id)
				return { results: [ data.token_id ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for token */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'token' && d.id == data.token.id)
				return { results: [ data.token ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

