<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'biblio_transcript';

		/* data for selected record, or defaults if none is selected */
		var data = {
			author: <?php echo json_encode($jdata['author']); ?>,
			author_memberID: <?php echo json_encode(array('id' => $rdata['author_memberID'], 'value' => $rdata['author_memberID'], 'text' => $jdata['author_memberID'])); ?>,
			bibliography_id: <?php echo json_encode($jdata['bibliography_id']); ?>,
			bibliography_title: <?php echo json_encode(array('id' => $rdata['bibliography_title'], 'value' => $rdata['bibliography_title'], 'text' => $jdata['bibliography_title'])); ?>,
			ip_rights: <?php echo json_encode(array('id' => $rdata['ip_rights'], 'value' => $rdata['ip_rights'], 'text' => $jdata['ip_rights'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for author_memberID */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'author_memberID' && d.id == data.author_memberID.id)
				return { results: [ data.author_memberID ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for author_memberID autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'author_memberID' && d.id == data.author_memberID.id){
				$j('#author' + d[rnd]).html(data.author);
				return true;
			}

			return false;
		});

		/* saved value for bibliography_title */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bibliography_title' && d.id == data.bibliography_title.id)
				return { results: [ data.bibliography_title ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bibliography_title autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'bibliography_title' && d.id == data.bibliography_title.id){
				$j('#bibliography_id' + d[rnd]).html(data.bibliography_id);
				return true;
			}

			return false;
		});

		/* saved value for ip_rights */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'ip_rights' && d.id == data.ip_rights.id)
				return { results: [ data.ip_rights ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

