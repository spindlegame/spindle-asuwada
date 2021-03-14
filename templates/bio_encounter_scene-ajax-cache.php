<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'bio_encounter_scene';

		/* data for selected record, or defaults if none is selected */
		var data = {
			encounter_team: <?php echo json_encode(array('id' => $rdata['encounter_team'], 'value' => $rdata['encounter_team'], 'text' => $jdata['encounter_team'])); ?>,
			encounter_analyst: <?php echo json_encode(array('id' => $rdata['encounter_analyst'], 'value' => $rdata['encounter_analyst'], 'text' => $jdata['encounter_analyst'])); ?>,
			scene: <?php echo json_encode(array('id' => $rdata['scene'], 'value' => $rdata['scene'], 'text' => $jdata['scene'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for encounter_team */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'encounter_team' && d.id == data.encounter_team.id)
				return { results: [ data.encounter_team ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for encounter_analyst */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'encounter_analyst' && d.id == data.encounter_analyst.id)
				return { results: [ data.encounter_analyst ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for scene */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'scene' && d.id == data.scene.id)
				return { results: [ data.scene ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

