<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'biblio_doc';

		/* data for selected record, or defaults if none is selected */
		var data = {
			author_name: <?php echo json_encode($jdata['author_name']); ?>,
			author_id: <?php echo json_encode(array('id' => $rdata['author_id'], 'value' => $rdata['author_id'], 'text' => $jdata['author_id'])); ?>,
			type: <?php echo json_encode(array('id' => $rdata['type'], 'value' => $rdata['type'], 'text' => $jdata['type'])); ?>,
			genre: <?php echo json_encode(array('id' => $rdata['genre'], 'value' => $rdata['genre'], 'text' => $jdata['genre'])); ?>,
			language: <?php echo json_encode(array('id' => $rdata['language'], 'value' => $rdata['language'], 'text' => $jdata['language'])); ?>,
			rights: <?php echo json_encode(array('id' => $rdata['rights'], 'value' => $rdata['rights'], 'text' => $jdata['rights'])); ?>,
			data_evaluation: <?php echo json_encode(array('id' => $rdata['data_evaluation'], 'value' => $rdata['data_evaluation'], 'text' => $jdata['data_evaluation'])); ?>,
			authority_organization: <?php echo json_encode(array('id' => $rdata['authority_organization'], 'value' => $rdata['authority_organization'], 'text' => $jdata['authority_organization'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for author_id */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'author_id' && d.id == data.author_id.id)
				return { results: [ data.author_id ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for author_id autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'author_id' && d.id == data.author_id.id){
				$j('#author_name' + d[rnd]).html(data.author_name);
				return true;
			}

			return false;
		});

		/* saved value for type */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'type' && d.id == data.type.id)
				return { results: [ data.type ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for genre */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'genre' && d.id == data.genre.id)
				return { results: [ data.genre ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for language */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'language' && d.id == data.language.id)
				return { results: [ data.language ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for rights */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'rights' && d.id == data.rights.id)
				return { results: [ data.rights ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for data_evaluation */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'data_evaluation' && d.id == data.data_evaluation.id)
				return { results: [ data.data_evaluation ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for authority_organization */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'authority_organization' && d.id == data.authority_organization.id)
				return { results: [ data.authority_organization ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

