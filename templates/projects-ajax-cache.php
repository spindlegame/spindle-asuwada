<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'projects';

		/* data for selected record, or defaults if none is selected */
		var data = {
			community: <?php echo json_encode(array('id' => $rdata['community'], 'value' => $rdata['community'], 'text' => $jdata['community'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for community */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'community' && d.id == data.community.id)
				return { results: [ data.community ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

