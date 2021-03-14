<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'hist_story';

		/* data for selected record, or defaults if none is selected */
		var data = {
			team: <?php echo json_encode(array('id' => $rdata['team'], 'value' => $rdata['team'], 'text' => $jdata['team'])); ?>,
			hist_author_id: <?php echo json_encode(array('id' => $rdata['hist_author_id'], 'value' => $rdata['hist_author_id'], 'text' => $jdata['hist_author_id'])); ?>,
			hist_author_name: <?php echo json_encode($jdata['hist_author_name']); ?>,
			community_id: <?php echo json_encode(array('id' => $rdata['community_id'], 'value' => $rdata['community_id'], 'text' => $jdata['community_id'])); ?>,
			genre: <?php echo json_encode(array('id' => $rdata['genre'], 'value' => $rdata['genre'], 'text' => $jdata['genre'])); ?>,
			collaboration_status: <?php echo json_encode(array('id' => $rdata['collaboration_status'], 'value' => $rdata['collaboration_status'], 'text' => $jdata['collaboration_status'])); ?>,
			language: <?php echo json_encode(array('id' => $rdata['language'], 'value' => $rdata['language'], 'text' => $jdata['language'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for team */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'team' && d.id == data.team.id)
				return { results: [ data.team ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for hist_author_id */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'hist_author_id' && d.id == data.hist_author_id.id)
				return { results: [ data.hist_author_id ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for hist_author_id autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'hist_author_id' && d.id == data.hist_author_id.id) {
				$j('#hist_author_name' + d[rnd]).html(data.hist_author_name);
				return true;
			}

			return false;
		});

		/* saved value for community_id */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'community_id' && d.id == data.community_id.id)
				return { results: [ data.community_id ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for genre */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'genre' && d.id == data.genre.id)
				return { results: [ data.genre ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for collaboration_status */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'collaboration_status' && d.id == data.collaboration_status.id)
				return { results: [ data.collaboration_status ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for language */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'language' && d.id == data.language.id)
				return { results: [ data.language ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

