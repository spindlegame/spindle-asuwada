<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'biblio_author';

		/* data for selected record, or defaults if none is selected */
		var data = {
			game_agent_id: <?php echo json_encode(array('id' => $rdata['game_agent_id'], 'value' => $rdata['game_agent_id'], 'text' => $jdata['game_agent_id'])); ?>,
			agent_name: <?php echo json_encode($jdata['agent_name']); ?>,
			selection_class: <?php echo json_encode(array('id' => $rdata['selection_class'], 'value' => $rdata['selection_class'], 'text' => $jdata['selection_class'])); ?>,
			agenttype1: <?php echo json_encode(array('id' => $rdata['agenttype1'], 'value' => $rdata['agenttype1'], 'text' => $jdata['agenttype1'])); ?>,
			agenttype2: <?php echo json_encode(array('id' => $rdata['agenttype2'], 'value' => $rdata['agenttype2'], 'text' => $jdata['agenttype2'])); ?>,
			gender: <?php echo json_encode(array('id' => $rdata['gender'], 'value' => $rdata['gender'], 'text' => $jdata['gender'])); ?>,
			data_evaluation: <?php echo json_encode(array('id' => $rdata['data_evaluation'], 'value' => $rdata['data_evaluation'], 'text' => $jdata['data_evaluation'])); ?>,
			authority_organization: <?php echo json_encode(array('id' => $rdata['authority_organization'], 'value' => $rdata['authority_organization'], 'text' => $jdata['authority_organization'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for game_agent_id */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'game_agent_id' && d.id == data.game_agent_id.id)
				return { results: [ data.game_agent_id ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for game_agent_id autofills */
		cache.addCheck(function(u, d) {
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'game_agent_id' && d.id == data.game_agent_id.id) {
				$j('#agent_name' + d[rnd]).html(data.agent_name);
				return true;
			}

			return false;
		});

		/* saved value for selection_class */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'selection_class' && d.id == data.selection_class.id)
				return { results: [ data.selection_class ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for agenttype1 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'agenttype1' && d.id == data.agenttype1.id)
				return { results: [ data.agenttype1 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for agenttype2 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'agenttype2' && d.id == data.agenttype2.id)
				return { results: [ data.agenttype2 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for gender */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'gender' && d.id == data.gender.id)
				return { results: [ data.gender ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for data_evaluation */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'data_evaluation' && d.id == data.data_evaluation.id)
				return { results: [ data.data_evaluation ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for authority_organization */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'authority_organization' && d.id == data.authority_organization.id)
				return { results: [ data.authority_organization ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

