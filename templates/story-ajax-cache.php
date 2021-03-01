<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'story';

		/* data for selected record, or defaults if none is selected */
		var data = {
			com_name: <?php echo json_encode(array('id' => $rdata['com_name'], 'value' => $rdata['com_name'], 'text' => $jdata['com_name'])); ?>,
			collaboration_status: <?php echo json_encode(array('id' => $rdata['collaboration_status'], 'value' => $rdata['collaboration_status'], 'text' => $jdata['collaboration_status'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for com_name */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'com_name' && d.id == data.com_name.id)
				return { results: [ data.com_name ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for collaboration_status */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'collaboration_status' && d.id == data.collaboration_status.id)
				return { results: [ data.collaboration_status ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

