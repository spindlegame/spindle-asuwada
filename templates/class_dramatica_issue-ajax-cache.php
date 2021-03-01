<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'class_dramatica_issue';

		/* data for selected record, or defaults if none is selected */
		var data = {
			domain: <?php echo json_encode(array('id' => $rdata['domain'], 'value' => $rdata['domain'], 'text' => $jdata['domain'])); ?>,
			concern: <?php echo json_encode(array('id' => $rdata['concern'], 'value' => $rdata['concern'], 'text' => $jdata['concern'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for domain */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'domain' && d.id == data.domain.id)
				return { results: [ data.domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for concern */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'concern' && d.id == data.concern.id)
				return { results: [ data.concern ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

