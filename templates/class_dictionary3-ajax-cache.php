<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'class_dictionary3';

		/* data for selected record, or defaults if none is selected */
		var data = {
			class1: <?php echo json_encode(array('id' => $rdata['class1'], 'value' => $rdata['class1'], 'text' => $jdata['class1'])); ?>,
			class2: <?php echo json_encode(array('id' => $rdata['class2'], 'value' => $rdata['class2'], 'text' => $jdata['class2'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for class1 */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'class1' && d.id == data.class1.id)
				return { results: [ data.class1 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for class2 */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'class2' && d.id == data.class2.id)
				return { results: [ data.class2 ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

