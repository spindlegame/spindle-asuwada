<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'bio_storyweaving_scene';

		/* data for selected record, or defaults if none is selected */
		var data = {
			story: <?php echo json_encode(array('id' => $rdata['story'], 'value' => $rdata['story'], 'text' => $jdata['story'])); ?>,
			step: <?php echo json_encode(array('id' => $rdata['step'], 'value' => $rdata['step'], 'text' => $jdata['step'])); ?>,
			throughline: <?php echo json_encode(array('id' => $rdata['throughline'], 'value' => $rdata['throughline'], 'text' => $jdata['throughline'])); ?>,
			domain: <?php echo json_encode(array('id' => $rdata['domain'], 'value' => $rdata['domain'], 'text' => $jdata['domain'])); ?>,
			concern: <?php echo json_encode(array('id' => $rdata['concern'], 'value' => $rdata['concern'], 'text' => $jdata['concern'])); ?>,
			issue: <?php echo json_encode(array('id' => $rdata['issue'], 'value' => $rdata['issue'], 'text' => $jdata['issue'])); ?>,
			theme: <?php echo json_encode(array('id' => $rdata['theme'], 'value' => $rdata['theme'], 'text' => $jdata['theme'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for story */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'story' && d.id == data.story.id)
				return { results: [ data.story ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for step */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'step' && d.id == data.step.id)
				return { results: [ data.step ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for throughline */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'throughline' && d.id == data.throughline.id)
				return { results: [ data.throughline ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for domain */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'domain' && d.id == data.domain.id)
				return { results: [ data.domain ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for concern */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'concern' && d.id == data.concern.id)
				return { results: [ data.concern ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for issue */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'issue' && d.id == data.issue.id)
				return { results: [ data.issue ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for theme */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'theme' && d.id == data.theme.id)
				return { results: [ data.theme ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

