<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'class_dynamicstorypoints';

		/* data for selected record, or defaults if none is selected */
		var data = {
			cat1: <?php echo json_encode(array('id' => $rdata['cat1'], 'value' => $rdata['cat1'], 'text' => $jdata['cat1'])); ?>,
			cat2: <?php echo json_encode(array('id' => $rdata['cat2'], 'value' => $rdata['cat2'], 'text' => $jdata['cat2'])); ?>,
			cat3: <?php echo json_encode(array('id' => $rdata['cat3'], 'value' => $rdata['cat3'], 'text' => $jdata['cat3'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for cat1 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'cat1' && d.id == data.cat1.id)
				return { results: [ data.cat1 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for cat2 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'cat2' && d.id == data.cat2.id)
				return { results: [ data.cat2 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for cat3 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'cat3' && d.id == data.cat3.id)
				return { results: [ data.cat3 ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

