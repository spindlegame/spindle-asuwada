<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'bio_encounters';

		/* data for selected record, or defaults if none is selected */
		var data = {
			authorA: <?php echo json_encode(array('id' => $rdata['authorA'], 'value' => $rdata['authorA'], 'text' => $jdata['authorA'])); ?>,
			author_nameA: <?php echo json_encode(array('id' => $rdata['author_nameA'], 'value' => $rdata['author_nameA'], 'text' => $jdata['author_nameA'])); ?>,
			bibliographyA: <?php echo json_encode(array('id' => $rdata['bibliographyA'], 'value' => $rdata['bibliographyA'], 'text' => $jdata['bibliographyA'])); ?>,
			transcriptA: <?php echo json_encode(array('id' => $rdata['transcriptA'], 'value' => $rdata['transcriptA'], 'text' => $jdata['transcriptA'])); ?>,
			tokenA: <?php echo json_encode(array('id' => $rdata['tokenA'], 'value' => $rdata['tokenA'], 'text' => $jdata['tokenA'])); ?>,
			sceneA: <?php echo json_encode(array('id' => $rdata['sceneA'], 'value' => $rdata['sceneA'], 'text' => $jdata['sceneA'])); ?>,
			authorB: <?php echo json_encode(array('id' => $rdata['authorB'], 'value' => $rdata['authorB'], 'text' => $jdata['authorB'])); ?>,
			authornameB: <?php echo json_encode(array('id' => $rdata['authornameB'], 'value' => $rdata['authornameB'], 'text' => $jdata['authornameB'])); ?>,
			bibliographyB: <?php echo json_encode(array('id' => $rdata['bibliographyB'], 'value' => $rdata['bibliographyB'], 'text' => $jdata['bibliographyB'])); ?>,
			transcriptB: <?php echo json_encode(array('id' => $rdata['transcriptB'], 'value' => $rdata['transcriptB'], 'text' => $jdata['transcriptB'])); ?>,
			tokenB: <?php echo json_encode(array('id' => $rdata['tokenB'], 'value' => $rdata['tokenB'], 'text' => $jdata['tokenB'])); ?>,
			sceneB: <?php echo json_encode(array('id' => $rdata['sceneB'], 'value' => $rdata['sceneB'], 'text' => $jdata['sceneB'])); ?>
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

		/* saved value for author_nameA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'author_nameA' && d.id == data.author_nameA.id)
				return { results: [ data.author_nameA ], more: false, elapsed: 0.01 };
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

		/* saved value for authornameB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'authornameB' && d.id == data.authornameB.id)
				return { results: [ data.authornameB ], more: false, elapsed: 0.01 };
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

		/* saved value for sceneB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'sceneB' && d.id == data.sceneB.id)
				return { results: [ data.sceneB ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

