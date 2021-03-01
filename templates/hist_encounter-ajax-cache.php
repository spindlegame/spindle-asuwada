<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'hist_encounter';

		/* data for selected record, or defaults if none is selected */
		var data = {
			bio_chrA: <?php echo json_encode(array('id' => $rdata['bio_chrA'], 'value' => $rdata['bio_chrA'], 'text' => $jdata['bio_chrA'])); ?>,
			bio_storyA: <?php echo json_encode(array('id' => $rdata['bio_storyA'], 'value' => $rdata['bio_storyA'], 'text' => $jdata['bio_storyA'])); ?>,
			bio_storyline: <?php echo json_encode(array('id' => $rdata['bio_storyline'], 'value' => $rdata['bio_storyline'], 'text' => $jdata['bio_storyline'])); ?>,
			bio_storytext: <?php echo json_encode(array('id' => $rdata['bio_storytext'], 'value' => $rdata['bio_storytext'], 'text' => $jdata['bio_storytext'])); ?>,
			sceneA: <?php echo json_encode(array('id' => $rdata['sceneA'], 'value' => $rdata['sceneA'], 'text' => $jdata['sceneA'])); ?>,
			bio_chrB: <?php echo json_encode(array('id' => $rdata['bio_chrB'], 'value' => $rdata['bio_chrB'], 'text' => $jdata['bio_chrB'])); ?>,
			bio_storyB: <?php echo json_encode(array('id' => $rdata['bio_storyB'], 'value' => $rdata['bio_storyB'], 'text' => $jdata['bio_storyB'])); ?>,
			bio_storylineB: <?php echo json_encode(array('id' => $rdata['bio_storylineB'], 'value' => $rdata['bio_storylineB'], 'text' => $jdata['bio_storylineB'])); ?>,
			bio_storytextB: <?php echo json_encode(array('id' => $rdata['bio_storytextB'], 'value' => $rdata['bio_storytextB'], 'text' => $jdata['bio_storytextB'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for bio_chrA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_chrA' && d.id == data.bio_chrA.id)
				return { results: [ data.bio_chrA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_storyA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_storyA' && d.id == data.bio_storyA.id)
				return { results: [ data.bio_storyA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_storyline */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_storyline' && d.id == data.bio_storyline.id)
				return { results: [ data.bio_storyline ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_storytext */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_storytext' && d.id == data.bio_storytext.id)
				return { results: [ data.bio_storytext ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for sceneA */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'sceneA' && d.id == data.sceneA.id)
				return { results: [ data.sceneA ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_chrB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_chrB' && d.id == data.bio_chrB.id)
				return { results: [ data.bio_chrB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_storyB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_storyB' && d.id == data.bio_storyB.id)
				return { results: [ data.bio_storyB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_storylineB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_storylineB' && d.id == data.bio_storylineB.id)
				return { results: [ data.bio_storylineB ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bio_storytextB */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bio_storytextB' && d.id == data.bio_storytextB.id)
				return { results: [ data.bio_storytextB ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

