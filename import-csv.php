<?php
	define('PREPEND_PATH', '');
	$app_dir = dirname(__FILE__);
	include_once("{$app_dir}/lib.php");

	// accept a record as an assoc array, return transformed row ready to insert to table
	$transformFunctions = [
		'game_agent' => function($data, $options = []) {
			if(isset($data['selection_class'])) $data['selection_class'] = pkGivenLookupText($data['selection_class'], 'game_agent', 'selection_class');
			if(isset($data['agenttype1'])) $data['agenttype1'] = pkGivenLookupText($data['agenttype1'], 'game_agent', 'agenttype1');
			if(isset($data['agenttype2'])) $data['agenttype2'] = pkGivenLookupText($data['agenttype2'], 'game_agent', 'agenttype2');
			if(isset($data['gender'])) $data['gender'] = pkGivenLookupText($data['gender'], 'game_agent', 'gender');
			if(isset($data['birthday'])) $data['birthday'] = guessMySQLDateTime($data['birthday']);
			if(isset($data['deathday'])) $data['deathday'] = guessMySQLDateTime($data['deathday']);
			if(isset($data['data_evaluation'])) $data['data_evaluation'] = pkGivenLookupText($data['data_evaluation'], 'game_agent', 'data_evaluation');

			return $data;
		},
		'biblio_author' => function($data, $options = []) {
			if(isset($data['team'])) $data['team'] = pkGivenLookupText($data['team'], 'biblio_author', 'team');
			if(isset($data['author_id'])) $data['author_id'] = pkGivenLookupText($data['author_id'], 'biblio_author', 'author_id');
			if(isset($data['authority_organization'])) $data['authority_organization'] = pkGivenLookupText($data['authority_organization'], 'biblio_author', 'authority_organization');
			if(isset($data['data_evaluation'])) $data['data_evaluation'] = pkGivenLookupText($data['data_evaluation'], 'biblio_author', 'data_evaluation');
			if(isset($data['author_memberid'])) $data['author_memberid'] = thisOr($data['author_id'], pkGivenLookupText($data['author_memberid'], 'biblio_author', 'author_memberid'));
			if(isset($data['last_name'])) $data['last_name'] = thisOr($data['author_id'], pkGivenLookupText($data['last_name'], 'biblio_author', 'last_name'));
			if(isset($data['first_name'])) $data['first_name'] = thisOr($data['author_id'], pkGivenLookupText($data['first_name'], 'biblio_author', 'first_name'));
			if(isset($data['other_name'])) $data['other_name'] = thisOr($data['author_id'], pkGivenLookupText($data['other_name'], 'biblio_author', 'other_name'));

			return $data;
		},
		'biblio_doc' => function($data, $options = []) {
			if(isset($data['author_id'])) $data['author_id'] = pkGivenLookupText($data['author_id'], 'biblio_doc', 'author_id');
			if(isset($data['type'])) $data['type'] = pkGivenLookupText($data['type'], 'biblio_doc', 'type');
			if(isset($data['genre'])) $data['genre'] = pkGivenLookupText($data['genre'], 'biblio_doc', 'genre');
			if(isset($data['created'])) $data['created'] = guessMySQLDateTime($data['created']);
			if(isset($data['published'])) $data['published'] = guessMySQLDateTime($data['published']);
			if(isset($data['medium'])) $data['medium'] = pkGivenLookupText($data['medium'], 'biblio_doc', 'medium');
			if(isset($data['language'])) $data['language'] = pkGivenLookupText($data['language'], 'biblio_doc', 'language');
			if(isset($data['rights'])) $data['rights'] = pkGivenLookupText($data['rights'], 'biblio_doc', 'rights');
			if(isset($data['authority_organization'])) $data['authority_organization'] = pkGivenLookupText($data['authority_organization'], 'biblio_doc', 'authority_organization');
			if(isset($data['team'])) $data['team'] = pkGivenLookupText($data['team'], 'biblio_doc', 'team');
			if(isset($data['biblio_lead'])) $data['biblio_lead'] = pkGivenLookupText($data['biblio_lead'], 'biblio_doc', 'biblio_lead');
			if(isset($data['data_evaluation'])) $data['data_evaluation'] = pkGivenLookupText($data['data_evaluation'], 'biblio_doc', 'data_evaluation');
			if(isset($data['author_name'])) $data['author_name'] = thisOr($data['author_id'], pkGivenLookupText($data['author_name'], 'biblio_doc', 'author_name'));

			return $data;
		},
		'biblio_transcript' => function($data, $options = []) {
			if(isset($data['author_memberID'])) $data['author_memberID'] = pkGivenLookupText($data['author_memberID'], 'biblio_transcript', 'author_memberID');
			if(isset($data['bibliography_title'])) $data['bibliography_title'] = pkGivenLookupText($data['bibliography_title'], 'biblio_transcript', 'bibliography_title');
			if(isset($data['ip_rights'])) $data['ip_rights'] = pkGivenLookupText($data['ip_rights'], 'biblio_transcript', 'ip_rights');
			if(isset($data['team'])) $data['team'] = pkGivenLookupText($data['team'], 'biblio_transcript', 'team');
			if(isset($data['biblio_lead'])) $data['biblio_lead'] = pkGivenLookupText($data['biblio_lead'], 'biblio_transcript', 'biblio_lead');
			if(isset($data['data_evaluation'])) $data['data_evaluation'] = pkGivenLookupText($data['data_evaluation'], 'biblio_transcript', 'data_evaluation');
			if(isset($data['author'])) $data['author'] = thisOr($data['author_memberID'], pkGivenLookupText($data['author'], 'biblio_transcript', 'author'));
			if(isset($data['bibliography_id'])) $data['bibliography_id'] = thisOr($data['bibliography_title'], pkGivenLookupText($data['bibliography_id'], 'biblio_transcript', 'bibliography_id'));

			return $data;
		},
		'biblio_token' => function($data, $options = []) {
			if(isset($data['author_id'])) $data['author_id'] = pkGivenLookupText($data['author_id'], 'biblio_token', 'author_id');
			if(isset($data['bibliography'])) $data['bibliography'] = pkGivenLookupText($data['bibliography'], 'biblio_token', 'bibliography');
			if(isset($data['transcript'])) $data['transcript'] = pkGivenLookupText($data['transcript'], 'biblio_token', 'transcript');
			if(isset($data['team'])) $data['team'] = pkGivenLookupText($data['team'], 'biblio_token', 'team');
			if(isset($data['biblio_lead'])) $data['biblio_lead'] = pkGivenLookupText($data['biblio_lead'], 'biblio_token', 'biblio_lead');
			if(isset($data['data_evaluation'])) $data['data_evaluation'] = pkGivenLookupText($data['data_evaluation'], 'biblio_token', 'data_evaluation');
			if(isset($data['author_name'])) $data['author_name'] = thisOr($data['author_id'], pkGivenLookupText($data['author_name'], 'biblio_token', 'author_name'));

			return $data;
		},
		'biblio_code_invivo' => function($data, $options = []) {
			if(isset($data['author'])) $data['author'] = pkGivenLookupText($data['author'], 'biblio_code_invivo', 'author');
			if(isset($data['bibliography'])) $data['bibliography'] = pkGivenLookupText($data['bibliography'], 'biblio_code_invivo', 'bibliography');
			if(isset($data['transcript'])) $data['transcript'] = pkGivenLookupText($data['transcript'], 'biblio_code_invivo', 'transcript');
			if(isset($data['token_sequence'])) $data['token_sequence'] = pkGivenLookupText($data['token_sequence'], 'biblio_code_invivo', 'token_sequence');
			if(isset($data['start_date'])) $data['start_date'] = guessMySQLDateTime($data['start_date']);
			if(isset($data['end_date'])) $data['end_date'] = guessMySQLDateTime($data['end_date']);
			if(isset($data['team'])) $data['team'] = pkGivenLookupText($data['team'], 'biblio_code_invivo', 'team');
			if(isset($data['biblio_lead'])) $data['biblio_lead'] = pkGivenLookupText($data['biblio_lead'], 'biblio_code_invivo', 'biblio_lead');
			if(isset($data['data_evaluation'])) $data['data_evaluation'] = pkGivenLookupText($data['data_evaluation'], 'biblio_code_invivo', 'data_evaluation');
			if(isset($data['token'])) $data['token'] = thisOr($data['token_sequence'], pkGivenLookupText($data['token'], 'biblio_code_invivo', 'token'));

			return $data;
		},
		'biblio_code_demo' => function($data, $options = []) {
			if(isset($data['game_agent'])) $data['game_agent'] = pkGivenLookupText($data['game_agent'], 'biblio_code_demo', 'game_agent');
			if(isset($data['author'])) $data['author'] = pkGivenLookupText($data['author'], 'biblio_code_demo', 'author');
			if(isset($data['bibliography'])) $data['bibliography'] = pkGivenLookupText($data['bibliography'], 'biblio_code_demo', 'bibliography');
			if(isset($data['transcript'])) $data['transcript'] = pkGivenLookupText($data['transcript'], 'biblio_code_demo', 'transcript');
			if(isset($data['token_id'])) $data['token_id'] = pkGivenLookupText($data['token_id'], 'biblio_code_demo', 'token_id');
			if(isset($data['token'])) $data['token'] = pkGivenLookupText($data['token'], 'biblio_code_demo', 'token');
			if(isset($data['race'])) $data['race'] = pkGivenLookupText($data['race'], 'biblio_code_demo', 'race');
			if(isset($data['religion'])) $data['religion'] = pkGivenLookupText($data['religion'], 'biblio_code_demo', 'religion');
			if(isset($data['party'])) $data['party'] = pkGivenLookupText($data['party'], 'biblio_code_demo', 'party');
			if(isset($data['job'])) $data['job'] = pkGivenLookupText($data['job'], 'biblio_code_demo', 'job');
			if(isset($data['status'])) $data['status'] = pkGivenLookupText($data['status'], 'biblio_code_demo', 'status');
			if(isset($data['sex'])) $data['sex'] = thisOr($data['game_agent'], pkGivenLookupText($data['sex'], 'biblio_code_demo', 'sex'));

			return $data;
		},
		'biblio_team' => function($data, $options = []) {

			return $data;
		},
		'biblio_analyst' => function($data, $options = []) {
			if(isset($data['team'])) $data['team'] = pkGivenLookupText($data['team'], 'biblio_analyst', 'team');
			if(isset($data['author_id'])) $data['author_id'] = pkGivenLookupText($data['author_id'], 'biblio_analyst', 'author_id');
			if(isset($data['author_memberid'])) $data['author_memberid'] = pkGivenLookupText($data['author_memberid'], 'biblio_analyst', 'author_memberid');
			if(isset($data['last_name'])) $data['last_name'] = thisOr($data['author_id'], pkGivenLookupText($data['last_name'], 'biblio_analyst', 'last_name'));
			if(isset($data['first_name'])) $data['first_name'] = thisOr($data['author_id'], pkGivenLookupText($data['first_name'], 'biblio_analyst', 'first_name'));

			return $data;
		},
		'bio_team' => function($data, $options = []) {

			return $data;
		},
		'bio_author' => function($data, $options = []) {
			if(isset($data['team'])) $data['team'] = pkGivenLookupText($data['team'], 'bio_author', 'team');
			if(isset($data['author_id'])) $data['author_id'] = pkGivenLookupText($data['author_id'], 'bio_author', 'author_id');
			if(isset($data['author_memberid'])) $data['author_memberid'] = thisOr($data['author_id'], pkGivenLookupText($data['author_memberid'], 'bio_author', 'author_memberid'));
			if(isset($data['last_name'])) $data['last_name'] = thisOr($data['author_id'], pkGivenLookupText($data['last_name'], 'bio_author', 'last_name'));
			if(isset($data['first_name'])) $data['first_name'] = thisOr($data['author_id'], pkGivenLookupText($data['first_name'], 'bio_author', 'first_name'));

			return $data;
		},
		'bio_story' => function($data, $options = []) {
			if(isset($data['bio_team'])) $data['bio_team'] = pkGivenLookupText($data['bio_team'], 'bio_story', 'bio_team');
			if(isset($data['author_id'])) $data['author_id'] = pkGivenLookupText($data['author_id'], 'bio_story', 'author_id');
			if(isset($data['type'])) $data['type'] = pkGivenLookupText($data['type'], 'bio_story', 'type');
			if(isset($data['agent_id'])) $data['agent_id'] = pkGivenLookupText($data['agent_id'], 'bio_story', 'agent_id');
			if(isset($data['collaboration_status'])) $data['collaboration_status'] = pkGivenLookupText($data['collaboration_status'], 'bio_story', 'collaboration_status');
			if(isset($data['author_name'])) $data['author_name'] = thisOr($data['author_id'], pkGivenLookupText($data['author_name'], 'bio_story', 'author_name'));
			if(isset($data['agent_name'])) $data['agent_name'] = thisOr($data['agent_id'], pkGivenLookupText($data['agent_name'], 'bio_story', 'agent_name'));

			return $data;
		},
		'bio_chr' => function($data, $options = []) {
			if(isset($data['author_id'])) $data['author_id'] = pkGivenLookupText($data['author_id'], 'bio_chr', 'author_id');
			if(isset($data['agent_id'])) $data['agent_id'] = pkGivenLookupText($data['agent_id'], 'bio_chr', 'agent_id');
			if(isset($data['bio_story'])) $data['bio_story'] = pkGivenLookupText($data['bio_story'], 'bio_chr', 'bio_story');
			if(isset($data['bio_character'])) $data['bio_character'] = pkGivenLookupText($data['bio_character'], 'bio_chr', 'bio_character');
			if(isset($data['bio_archetype'])) $data['bio_archetype'] = pkGivenLookupText($data['bio_archetype'], 'bio_chr', 'bio_archetype');
			if(isset($data['author_name'])) $data['author_name'] = thisOr($data['author_id'], pkGivenLookupText($data['author_name'], 'bio_chr', 'author_name'));
			if(isset($data['agent_name'])) $data['agent_name'] = thisOr($data['agent_id'], pkGivenLookupText($data['agent_name'], 'bio_chr', 'agent_name'));

			return $data;
		},
		'bio_chr_dev' => function($data, $options = []) {
			if(isset($data['agent_id'])) $data['agent_id'] = pkGivenLookupText($data['agent_id'], 'bio_chr_dev', 'agent_id');
			if(isset($data['bio_story'])) $data['bio_story'] = pkGivenLookupText($data['bio_story'], 'bio_chr_dev', 'bio_story');
			if(isset($data['cw_name'])) $data['cw_name'] = pkGivenLookupText($data['cw_name'], 'bio_chr_dev', 'cw_name');
			if(isset($data['dp1_resolve'])) $data['dp1_resolve'] = pkGivenLookupText($data['dp1_resolve'], 'bio_chr_dev', 'dp1_resolve');
			if(isset($data['dp2_resolve'])) $data['dp2_resolve'] = pkGivenLookupText($data['dp2_resolve'], 'bio_chr_dev', 'dp2_resolve');
			if(isset($data['dp3_resolve'])) $data['dp3_resolve'] = pkGivenLookupText($data['dp3_resolve'], 'bio_chr_dev', 'dp3_resolve');
			if(isset($data['mc_resolve'])) $data['mc_resolve'] = pkGivenLookupText($data['mc_resolve'], 'bio_chr_dev', 'mc_resolve');
			if(isset($data['illust_resolve'])) $data['illust_resolve'] = pkGivenLookupText($data['illust_resolve'], 'bio_chr_dev', 'illust_resolve');
			if(isset($data['dp3_growth'])) $data['dp3_growth'] = pkGivenLookupText($data['dp3_growth'], 'bio_chr_dev', 'dp3_growth');
			if(isset($data['mc_growth'])) $data['mc_growth'] = pkGivenLookupText($data['mc_growth'], 'bio_chr_dev', 'mc_growth');
			if(isset($data['illust_growth'])) $data['illust_growth'] = pkGivenLookupText($data['illust_growth'], 'bio_chr_dev', 'illust_growth');
			if(isset($data['dp3_approach'])) $data['dp3_approach'] = pkGivenLookupText($data['dp3_approach'], 'bio_chr_dev', 'dp3_approach');
			if(isset($data['mc_approach'])) $data['mc_approach'] = pkGivenLookupText($data['mc_approach'], 'bio_chr_dev', 'mc_approach');
			if(isset($data['illust_approach'])) $data['illust_approach'] = pkGivenLookupText($data['illust_approach'], 'bio_chr_dev', 'illust_approach');
			if(isset($data['dp3_psstyle'])) $data['dp3_psstyle'] = pkGivenLookupText($data['dp3_psstyle'], 'bio_chr_dev', 'dp3_psstyle');
			if(isset($data['mc_ps_style'])) $data['mc_ps_style'] = pkGivenLookupText($data['mc_ps_style'], 'bio_chr_dev', 'mc_ps_style');
			if(isset($data['illust_ps_style'])) $data['illust_ps_style'] = pkGivenLookupText($data['illust_ps_style'], 'bio_chr_dev', 'illust_ps_style');
			if(isset($data['cw_gender'])) $data['cw_gender'] = pkGivenLookupText($data['cw_gender'], 'bio_chr_dev', 'cw_gender');
			if(isset($data['noetictension'])) $data['noetictension'] = pkGivenLookupText($data['noetictension'], 'bio_chr_dev', 'noetictension');
			if(isset($data['illust_nt'])) $data['illust_nt'] = pkGivenLookupText($data['illust_nt'], 'bio_chr_dev', 'illust_nt');
			if(isset($data['impression'])) $data['impression'] = pkGivenLookupText($data['impression'], 'bio_chr_dev', 'impression');
			if(isset($data['illust_im'])) $data['illust_im'] = pkGivenLookupText($data['illust_im'], 'bio_chr_dev', 'illust_im');
			if(isset($data['mcs_problem'])) $data['mcs_problem'] = pkGivenLookupText($data['mcs_problem'], 'bio_chr_dev', 'mcs_problem');
			if(isset($data['illust_mcs_problem'])) $data['illust_mcs_problem'] = pkGivenLookupText($data['illust_mcs_problem'], 'bio_chr_dev', 'illust_mcs_problem');
			if(isset($data['illust_mcs_solution'])) $data['illust_mcs_solution'] = pkGivenLookupText($data['illust_mcs_solution'], 'bio_chr_dev', 'illust_mcs_solution');
			if(isset($data['illust_mcs_symptom'])) $data['illust_mcs_symptom'] = pkGivenLookupText($data['illust_mcs_symptom'], 'bio_chr_dev', 'illust_mcs_symptom');
			if(isset($data['illust_mcs_response'])) $data['illust_mcs_response'] = pkGivenLookupText($data['illust_mcs_response'], 'bio_chr_dev', 'illust_mcs_response');
			if(isset($data['agent_name'])) $data['agent_name'] = thisOr($data['agent_id'], pkGivenLookupText($data['agent_name'], 'bio_chr_dev', 'agent_name'));
			if(isset($data['mcs_solution'])) $data['mcs_solution'] = thisOr($data['mcs_problem'], pkGivenLookupText($data['mcs_solution'], 'bio_chr_dev', 'mcs_solution'));
			if(isset($data['mcs_symptom'])) $data['mcs_symptom'] = thisOr($data['mcs_problem'], pkGivenLookupText($data['mcs_symptom'], 'bio_chr_dev', 'mcs_symptom'));
			if(isset($data['mcs_response'])) $data['mcs_response'] = thisOr($data['mcs_problem'], pkGivenLookupText($data['mcs_response'], 'bio_chr_dev', 'mcs_response'));

			return $data;
		},
		'bio_chr_scene' => function($data, $options = []) {
			if(isset($data['biography'])) $data['biography'] = pkGivenLookupText($data['biography'], 'bio_chr_scene', 'biography');
			if(isset($data['author_id'])) $data['author_id'] = pkGivenLookupText($data['author_id'], 'bio_chr_scene', 'author_id');
			if(isset($data['bibliography'])) $data['bibliography'] = pkGivenLookupText($data['bibliography'], 'bio_chr_scene', 'bibliography');
			if(isset($data['transcript'])) $data['transcript'] = pkGivenLookupText($data['transcript'], 'bio_chr_scene', 'transcript');
			if(isset($data['token'])) $data['token'] = pkGivenLookupText($data['token'], 'bio_chr_scene', 'token');
			if(isset($data['invivo_code'])) $data['invivo_code'] = pkGivenLookupText($data['invivo_code'], 'bio_chr_scene', 'invivo_code');
			if(isset($data['startdate'])) $data['startdate'] = pkGivenLookupText($data['startdate'], 'bio_chr_scene', 'startdate');
			if(isset($data['herme_code'])) $data['herme_code'] = pkGivenLookupText($data['herme_code'], 'bio_chr_scene', 'herme_code');
			if(isset($data['chr_element'])) $data['chr_element'] = pkGivenLookupText($data['chr_element'], 'bio_chr_scene', 'chr_element');
			if(isset($data['author_name'])) $data['author_name'] = thisOr($data['author_id'], pkGivenLookupText($data['author_name'], 'bio_chr_scene', 'author_name'));
			if(isset($data['token_sequence'])) $data['token_sequence'] = thisOr($data['token'], pkGivenLookupText($data['token_sequence'], 'bio_chr_scene', 'token_sequence'));
			if(isset($data['enddate'])) $data['enddate'] = thisOr($data['invivo_code'], pkGivenLookupText($data['enddate'], 'bio_chr_scene', 'enddate'));
			if(isset($data['person'])) $data['person'] = thisOr($data['invivo_code'], pkGivenLookupText($data['person'], 'bio_chr_scene', 'person'));
			if(isset($data['place'])) $data['place'] = thisOr($data['invivo_code'], pkGivenLookupText($data['place'], 'bio_chr_scene', 'place'));
			if(isset($data['impression'])) $data['impression'] = thisOr($data['herme_code'], pkGivenLookupText($data['impression'], 'bio_chr_scene', 'impression'));
			if(isset($data['noetictension'])) $data['noetictension'] = thisOr($data['herme_code'], pkGivenLookupText($data['noetictension'], 'bio_chr_scene', 'noetictension'));
			if(isset($data['pc'])) $data['pc'] = thisOr($data['herme_code'], pkGivenLookupText($data['pc'], 'bio_chr_scene', 'pc'));
			if(isset($data['counterfactual'])) $data['counterfactual'] = thisOr($data['herme_code'], pkGivenLookupText($data['counterfactual'], 'bio_chr_scene', 'counterfactual'));
			if(isset($data['goal'])) $data['goal'] = thisOr($data['herme_code'], pkGivenLookupText($data['goal'], 'bio_chr_scene', 'goal'));
			if(isset($data['dilemma_ethics'])) $data['dilemma_ethics'] = thisOr($data['herme_code'], pkGivenLookupText($data['dilemma_ethics'], 'bio_chr_scene', 'dilemma_ethics'));
			if(isset($data['sdg'])) $data['sdg'] = thisOr($data['herme_code'], pkGivenLookupText($data['sdg'], 'bio_chr_scene', 'sdg'));

			return $data;
		},
		'bio_storyline' => function($data, $options = []) {
			if(isset($data['biography'])) $data['biography'] = pkGivenLookupText($data['biography'], 'bio_storyline', 'biography');
			if(isset($data['author_id'])) $data['author_id'] = pkGivenLookupText($data['author_id'], 'bio_storyline', 'author_id');
			if(isset($data['bibliography'])) $data['bibliography'] = pkGivenLookupText($data['bibliography'], 'bio_storyline', 'bibliography');
			if(isset($data['transcript'])) $data['transcript'] = pkGivenLookupText($data['transcript'], 'bio_storyline', 'transcript');
			if(isset($data['token'])) $data['token'] = pkGivenLookupText($data['token'], 'bio_storyline', 'token');
			if(isset($data['story_act'])) $data['story_act'] = pkGivenLookupText($data['story_act'], 'bio_storyline', 'story_act');
			if(isset($data['character'])) $data['character'] = pkGivenLookupText($data['character'], 'bio_storyline', 'character');
			if(isset($data['storyweaving_scene_no'])) $data['storyweaving_scene_no'] = pkGivenLookupText($data['storyweaving_scene_no'], 'bio_storyline', 'storyweaving_scene_no');
			if(isset($data['character_scene'])) $data['character_scene'] = pkGivenLookupText($data['character_scene'], 'bio_storyline', 'character_scene');
			if(isset($data['character_event'])) $data['character_event'] = pkGivenLookupText($data['character_event'], 'bio_storyline', 'character_event');
			if(isset($data['author_name'])) $data['author_name'] = thisOr($data['author_id'], pkGivenLookupText($data['author_name'], 'bio_storyline', 'author_name'));
			if(isset($data['token_sequence'])) $data['token_sequence'] = thisOr($data['token'], pkGivenLookupText($data['token_sequence'], 'bio_storyline', 'token_sequence'));
			if(isset($data['role'])) $data['role'] = thisOr($data['character'], pkGivenLookupText($data['role'], 'bio_storyline', 'role'));
			if(isset($data['storyweaving_scene'])) $data['storyweaving_scene'] = thisOr($data['storyweaving_scene_no'], pkGivenLookupText($data['storyweaving_scene'], 'bio_storyline', 'storyweaving_scene'));
			if(isset($data['storyweaving_sequence'])) $data['storyweaving_sequence'] = thisOr($data['storyweaving_scene_no'], pkGivenLookupText($data['storyweaving_sequence'], 'bio_storyline', 'storyweaving_sequence'));
			if(isset($data['storyweaving_theme'])) $data['storyweaving_theme'] = thisOr($data['storyweaving_scene_no'], pkGivenLookupText($data['storyweaving_theme'], 'bio_storyline', 'storyweaving_theme'));
			if(isset($data['startdate'])) $data['startdate'] = thisOr($data['character_scene'], pkGivenLookupText($data['startdate'], 'bio_storyline', 'startdate'));
			if(isset($data['enddate'])) $data['enddate'] = thisOr($data['character_scene'], pkGivenLookupText($data['enddate'], 'bio_storyline', 'enddate'));

			return $data;
		},
		'bio_storystatic' => function($data, $options = []) {
			if(isset($data['story'])) $data['story'] = pkGivenLookupText($data['story'], 'bio_storystatic', 'story');
			if(isset($data['throughline'])) $data['throughline'] = pkGivenLookupText($data['throughline'], 'bio_storystatic', 'throughline');
			if(isset($data['story_character_mc'])) $data['story_character_mc'] = pkGivenLookupText($data['story_character_mc'], 'bio_storystatic', 'story_character_mc');
			if(isset($data['throughline_domain'])) $data['throughline_domain'] = pkGivenLookupText($data['throughline_domain'], 'bio_storystatic', 'throughline_domain');
			if(isset($data['concern'])) $data['concern'] = pkGivenLookupText($data['concern'], 'bio_storystatic', 'concern');
			if(isset($data['issue'])) $data['issue'] = pkGivenLookupText($data['issue'], 'bio_storystatic', 'issue');
			if(isset($data['problem'])) $data['problem'] = pkGivenLookupText($data['problem'], 'bio_storystatic', 'problem');
			if(isset($data['solution'])) $data['solution'] = pkGivenLookupText($data['solution'], 'bio_storystatic', 'solution');
			if(isset($data['symptom'])) $data['symptom'] = pkGivenLookupText($data['symptom'], 'bio_storystatic', 'symptom');
			if(isset($data['response'])) $data['response'] = pkGivenLookupText($data['response'], 'bio_storystatic', 'response');
			if(isset($data['catalyst'])) $data['catalyst'] = pkGivenLookupText($data['catalyst'], 'bio_storystatic', 'catalyst');
			if(isset($data['inhibitor'])) $data['inhibitor'] = pkGivenLookupText($data['inhibitor'], 'bio_storystatic', 'inhibitor');
			if(isset($data['benchmark'])) $data['benchmark'] = pkGivenLookupText($data['benchmark'], 'bio_storystatic', 'benchmark');
			if(isset($data['signpost1'])) $data['signpost1'] = pkGivenLookupText($data['signpost1'], 'bio_storystatic', 'signpost1');
			if(isset($data['signpost2'])) $data['signpost2'] = pkGivenLookupText($data['signpost2'], 'bio_storystatic', 'signpost2');
			if(isset($data['signpost3'])) $data['signpost3'] = pkGivenLookupText($data['signpost3'], 'bio_storystatic', 'signpost3');
			if(isset($data['signpost4'])) $data['signpost4'] = pkGivenLookupText($data['signpost4'], 'bio_storystatic', 'signpost4');

			return $data;
		},
		'bio_storydynamic' => function($data, $options = []) {
			if(isset($data['story'])) $data['story'] = pkGivenLookupText($data['story'], 'bio_storydynamic', 'story');
			if(isset($data['storystatic_mc'])) $data['storystatic_mc'] = pkGivenLookupText($data['storystatic_mc'], 'bio_storydynamic', 'storystatic_mc');
			if(isset($data['story_chr_mc'])) $data['story_chr_mc'] = pkGivenLookupText($data['story_chr_mc'], 'bio_storydynamic', 'story_chr_mc');
			if(isset($data['mc_problem'])) $data['mc_problem'] = pkGivenLookupText($data['mc_problem'], 'bio_storydynamic', 'mc_problem');
			if(isset($data['mc_resolve'])) $data['mc_resolve'] = pkGivenLookupText($data['mc_resolve'], 'bio_storydynamic', 'mc_resolve');
			if(isset($data['mc_growth'])) $data['mc_growth'] = pkGivenLookupText($data['mc_growth'], 'bio_storydynamic', 'mc_growth');
			if(isset($data['mc_approach'])) $data['mc_approach'] = pkGivenLookupText($data['mc_approach'], 'bio_storydynamic', 'mc_approach');
			if(isset($data['mc_ps_style'])) $data['mc_ps_style'] = pkGivenLookupText($data['mc_ps_style'], 'bio_storydynamic', 'mc_ps_style');
			if(isset($data['story_chr_ic'])) $data['story_chr_ic'] = pkGivenLookupText($data['story_chr_ic'], 'bio_storydynamic', 'story_chr_ic');
			if(isset($data['ic_resolve'])) $data['ic_resolve'] = pkGivenLookupText($data['ic_resolve'], 'bio_storydynamic', 'ic_resolve');
			if(isset($data['dp_cat1'])) $data['dp_cat1'] = pkGivenLookupText($data['dp_cat1'], 'bio_storydynamic', 'dp_cat1');
			if(isset($data['dp_cat2'])) $data['dp_cat2'] = pkGivenLookupText($data['dp_cat2'], 'bio_storydynamic', 'dp_cat2');
			if(isset($data['dp_cat3_driver'])) $data['dp_cat3_driver'] = pkGivenLookupText($data['dp_cat3_driver'], 'bio_storydynamic', 'dp_cat3_driver');
			if(isset($data['os_driver'])) $data['os_driver'] = pkGivenLookupText($data['os_driver'], 'bio_storydynamic', 'os_driver');
			if(isset($data['dp_cat3_limit'])) $data['dp_cat3_limit'] = pkGivenLookupText($data['dp_cat3_limit'], 'bio_storydynamic', 'dp_cat3_limit');
			if(isset($data['os_limit'])) $data['os_limit'] = pkGivenLookupText($data['os_limit'], 'bio_storydynamic', 'os_limit');
			if(isset($data['dp_cat3_outcome'])) $data['dp_cat3_outcome'] = pkGivenLookupText($data['dp_cat3_outcome'], 'bio_storydynamic', 'dp_cat3_outcome');
			if(isset($data['os_outcome'])) $data['os_outcome'] = pkGivenLookupText($data['os_outcome'], 'bio_storydynamic', 'os_outcome');
			if(isset($data['dp_cat3_judgement'])) $data['dp_cat3_judgement'] = pkGivenLookupText($data['dp_cat3_judgement'], 'bio_storydynamic', 'dp_cat3_judgement');
			if(isset($data['os_judgement'])) $data['os_judgement'] = pkGivenLookupText($data['os_judgement'], 'bio_storydynamic', 'os_judgement');
			if(isset($data['os_goal_domain'])) $data['os_goal_domain'] = pkGivenLookupText($data['os_goal_domain'], 'bio_storydynamic', 'os_goal_domain');
			if(isset($data['os_consequence_domain'])) $data['os_consequence_domain'] = pkGivenLookupText($data['os_consequence_domain'], 'bio_storydynamic', 'os_consequence_domain');
			if(isset($data['os_consequence_concern'])) $data['os_consequence_concern'] = pkGivenLookupText($data['os_consequence_concern'], 'bio_storydynamic', 'os_consequence_concern');
			if(isset($data['os_cost_domain'])) $data['os_cost_domain'] = pkGivenLookupText($data['os_cost_domain'], 'bio_storydynamic', 'os_cost_domain');
			if(isset($data['os_cost_concern'])) $data['os_cost_concern'] = pkGivenLookupText($data['os_cost_concern'], 'bio_storydynamic', 'os_cost_concern');
			if(isset($data['os_dividend_domain'])) $data['os_dividend_domain'] = pkGivenLookupText($data['os_dividend_domain'], 'bio_storydynamic', 'os_dividend_domain');
			if(isset($data['os_dividend_concern'])) $data['os_dividend_concern'] = pkGivenLookupText($data['os_dividend_concern'], 'bio_storydynamic', 'os_dividend_concern');
			if(isset($data['os_requirements_domain'])) $data['os_requirements_domain'] = pkGivenLookupText($data['os_requirements_domain'], 'bio_storydynamic', 'os_requirements_domain');
			if(isset($data['os_requirements_concern'])) $data['os_requirements_concern'] = pkGivenLookupText($data['os_requirements_concern'], 'bio_storydynamic', 'os_requirements_concern');
			if(isset($data['os_prerequesites_domain'])) $data['os_prerequesites_domain'] = pkGivenLookupText($data['os_prerequesites_domain'], 'bio_storydynamic', 'os_prerequesites_domain');
			if(isset($data['os_prerequesites_concern'])) $data['os_prerequesites_concern'] = pkGivenLookupText($data['os_prerequesites_concern'], 'bio_storydynamic', 'os_prerequesites_concern');
			if(isset($data['os_preconditions_domain'])) $data['os_preconditions_domain'] = pkGivenLookupText($data['os_preconditions_domain'], 'bio_storydynamic', 'os_preconditions_domain');
			if(isset($data['os_preconditions_concern'])) $data['os_preconditions_concern'] = pkGivenLookupText($data['os_preconditions_concern'], 'bio_storydynamic', 'os_preconditions_concern');
			if(isset($data['os_forewarnings_domain'])) $data['os_forewarnings_domain'] = pkGivenLookupText($data['os_forewarnings_domain'], 'bio_storydynamic', 'os_forewarnings_domain');
			if(isset($data['os_forewarnings_concern'])) $data['os_forewarnings_concern'] = pkGivenLookupText($data['os_forewarnings_concern'], 'bio_storydynamic', 'os_forewarnings_concern');
			if(isset($data['os_goal_concern'])) $data['os_goal_concern'] = thisOr($data['storystatic_mc'], pkGivenLookupText($data['os_goal_concern'], 'bio_storydynamic', 'os_goal_concern'));

			return $data;
		},
		'bio_storyweaving_scene' => function($data, $options = []) {
			if(isset($data['story'])) $data['story'] = pkGivenLookupText($data['story'], 'bio_storyweaving_scene', 'story');
			if(isset($data['step'])) $data['step'] = pkGivenLookupText($data['step'], 'bio_storyweaving_scene', 'step');
			if(isset($data['throughline'])) $data['throughline'] = pkGivenLookupText($data['throughline'], 'bio_storyweaving_scene', 'throughline');
			if(isset($data['domain'])) $data['domain'] = pkGivenLookupText($data['domain'], 'bio_storyweaving_scene', 'domain');
			if(isset($data['concern'])) $data['concern'] = pkGivenLookupText($data['concern'], 'bio_storyweaving_scene', 'concern');
			if(isset($data['issue'])) $data['issue'] = pkGivenLookupText($data['issue'], 'bio_storyweaving_scene', 'issue');
			if(isset($data['theme'])) $data['theme'] = pkGivenLookupText($data['theme'], 'bio_storyweaving_scene', 'theme');

			return $data;
		},
		'bio_encounter' => function($data, $options = []) {
			if(isset($data['authorA'])) $data['authorA'] = pkGivenLookupText($data['authorA'], 'bio_encounter', 'authorA');
			if(isset($data['bibliographyA'])) $data['bibliographyA'] = pkGivenLookupText($data['bibliographyA'], 'bio_encounter', 'bibliographyA');
			if(isset($data['transcriptA'])) $data['transcriptA'] = pkGivenLookupText($data['transcriptA'], 'bio_encounter', 'transcriptA');
			if(isset($data['tokenA'])) $data['tokenA'] = pkGivenLookupText($data['tokenA'], 'bio_encounter', 'tokenA');
			if(isset($data['bio_impressionA'])) $data['bio_impressionA'] = pkGivenLookupText($data['bio_impressionA'], 'bio_encounter', 'bio_impressionA');
			if(isset($data['bio_ntA'])) $data['bio_ntA'] = pkGivenLookupText($data['bio_ntA'], 'bio_encounter', 'bio_ntA');
			if(isset($data['bio_counterfactualA'])) $data['bio_counterfactualA'] = pkGivenLookupText($data['bio_counterfactualA'], 'bio_encounter', 'bio_counterfactualA');
			if(isset($data['bio_dilemmaA'])) $data['bio_dilemmaA'] = pkGivenLookupText($data['bio_dilemmaA'], 'bio_encounter', 'bio_dilemmaA');
			if(isset($data['bio_sdgA'])) $data['bio_sdgA'] = pkGivenLookupText($data['bio_sdgA'], 'bio_encounter', 'bio_sdgA');
			if(isset($data['startdateA'])) $data['startdateA'] = pkGivenLookupText($data['startdateA'], 'bio_encounter', 'startdateA');
			if(isset($data['enddateA'])) $data['enddateA'] = pkGivenLookupText($data['enddateA'], 'bio_encounter', 'enddateA');
			if(isset($data['sceneA'])) $data['sceneA'] = pkGivenLookupText($data['sceneA'], 'bio_encounter', 'sceneA');
			if(isset($data['authorB'])) $data['authorB'] = pkGivenLookupText($data['authorB'], 'bio_encounter', 'authorB');
			if(isset($data['bibliographyB'])) $data['bibliographyB'] = pkGivenLookupText($data['bibliographyB'], 'bio_encounter', 'bibliographyB');
			if(isset($data['transcriptB'])) $data['transcriptB'] = pkGivenLookupText($data['transcriptB'], 'bio_encounter', 'transcriptB');
			if(isset($data['tokenB'])) $data['tokenB'] = pkGivenLookupText($data['tokenB'], 'bio_encounter', 'tokenB');
			if(isset($data['bio_impressionB'])) $data['bio_impressionB'] = pkGivenLookupText($data['bio_impressionB'], 'bio_encounter', 'bio_impressionB');
			if(isset($data['bio_ntB'])) $data['bio_ntB'] = pkGivenLookupText($data['bio_ntB'], 'bio_encounter', 'bio_ntB');
			if(isset($data['bio_counterfactualB'])) $data['bio_counterfactualB'] = pkGivenLookupText($data['bio_counterfactualB'], 'bio_encounter', 'bio_counterfactualB');
			if(isset($data['bio_dilemmaB'])) $data['bio_dilemmaB'] = pkGivenLookupText($data['bio_dilemmaB'], 'bio_encounter', 'bio_dilemmaB');
			if(isset($data['bio_sdgB'])) $data['bio_sdgB'] = pkGivenLookupText($data['bio_sdgB'], 'bio_encounter', 'bio_sdgB');
			if(isset($data['startdateB'])) $data['startdateB'] = pkGivenLookupText($data['startdateB'], 'bio_encounter', 'startdateB');
			if(isset($data['enddateB'])) $data['enddateB'] = pkGivenLookupText($data['enddateB'], 'bio_encounter', 'enddateB');
			if(isset($data['sceneB'])) $data['sceneB'] = pkGivenLookupText($data['sceneB'], 'bio_encounter', 'sceneB');
			if(isset($data['encounter_team'])) $data['encounter_team'] = pkGivenLookupText($data['encounter_team'], 'bio_encounter', 'encounter_team');
			if(isset($data['encounter_analyst'])) $data['encounter_analyst'] = pkGivenLookupText($data['encounter_analyst'], 'bio_encounter', 'encounter_analyst');
			if(isset($data['author_nameA'])) $data['author_nameA'] = thisOr($data['authorA'], pkGivenLookupText($data['author_nameA'], 'bio_encounter', 'author_nameA'));
			if(isset($data['author_nameB'])) $data['author_nameB'] = thisOr($data['authorA'], pkGivenLookupText($data['author_nameB'], 'bio_encounter', 'author_nameB'));

			return $data;
		},
		'bio_encounter_scene' => function($data, $options = []) {
			if(isset($data['encounter_team'])) $data['encounter_team'] = pkGivenLookupText($data['encounter_team'], 'bio_encounter_scene', 'encounter_team');
			if(isset($data['encounter_analyst'])) $data['encounter_analyst'] = pkGivenLookupText($data['encounter_analyst'], 'bio_encounter_scene', 'encounter_analyst');
			if(isset($data['scene'])) $data['scene'] = pkGivenLookupText($data['scene'], 'bio_encounter_scene', 'scene');

			return $data;
		},
		'bio_code_herme' => function($data, $options = []) {
			if(isset($data['biography'])) $data['biography'] = pkGivenLookupText($data['biography'], 'bio_code_herme', 'biography');
			if(isset($data['agent_id'])) $data['agent_id'] = pkGivenLookupText($data['agent_id'], 'bio_code_herme', 'agent_id');
			if(isset($data['author_id'])) $data['author_id'] = pkGivenLookupText($data['author_id'], 'bio_code_herme', 'author_id');
			if(isset($data['bibliography'])) $data['bibliography'] = pkGivenLookupText($data['bibliography'], 'bio_code_herme', 'bibliography');
			if(isset($data['transcript'])) $data['transcript'] = pkGivenLookupText($data['transcript'], 'bio_code_herme', 'transcript');
			if(isset($data['token_sequence'])) $data['token_sequence'] = pkGivenLookupText($data['token_sequence'], 'bio_code_herme', 'token_sequence');
			if(isset($data['impression'])) $data['impression'] = pkGivenLookupText($data['impression'], 'bio_code_herme', 'impression');
			if(isset($data['noetictension'])) $data['noetictension'] = pkGivenLookupText($data['noetictension'], 'bio_code_herme', 'noetictension');
			if(isset($data['pc'])) $data['pc'] = pkGivenLookupText($data['pc'], 'bio_code_herme', 'pc');
			if(isset($data['counterfactual'])) $data['counterfactual'] = pkGivenLookupText($data['counterfactual'], 'bio_code_herme', 'counterfactual');
			if(isset($data['bio_sdg'])) $data['bio_sdg'] = pkGivenLookupText($data['bio_sdg'], 'bio_code_herme', 'bio_sdg');
			if(isset($data['bio_dilemma'])) $data['bio_dilemma'] = pkGivenLookupText($data['bio_dilemma'], 'bio_code_herme', 'bio_dilemma');
			if(isset($data['bio_goals'])) $data['bio_goals'] = pkGivenLookupText($data['bio_goals'], 'bio_code_herme', 'bio_goals');
			if(isset($data['agent_name'])) $data['agent_name'] = thisOr($data['agent_id'], pkGivenLookupText($data['agent_name'], 'bio_code_herme', 'agent_name'));
			if(isset($data['author_name'])) $data['author_name'] = thisOr($data['author_id'], pkGivenLookupText($data['author_name'], 'bio_code_herme', 'author_name'));
			if(isset($data['token'])) $data['token'] = thisOr($data['token_sequence'], pkGivenLookupText($data['token'], 'bio_code_herme', 'token'));

			return $data;
		},
		'hist_team' => function($data, $options = []) {

			return $data;
		},
		'hist_author' => function($data, $options = []) {
			if(isset($data['team'])) $data['team'] = pkGivenLookupText($data['team'], 'hist_author', 'team');
			if(isset($data['agent_id'])) $data['agent_id'] = pkGivenLookupText($data['agent_id'], 'hist_author', 'agent_id');
			if(isset($data['agent_memberid'])) $data['agent_memberid'] = thisOr($data['agent_id'], pkGivenLookupText($data['agent_memberid'], 'hist_author', 'agent_memberid'));
			if(isset($data['last_name'])) $data['last_name'] = thisOr($data['agent_id'], pkGivenLookupText($data['last_name'], 'hist_author', 'last_name'));
			if(isset($data['first_name'])) $data['first_name'] = thisOr($data['agent_id'], pkGivenLookupText($data['first_name'], 'hist_author', 'first_name'));

			return $data;
		},
		'hist_story' => function($data, $options = []) {
			if(isset($data['team'])) $data['team'] = pkGivenLookupText($data['team'], 'hist_story', 'team');
			if(isset($data['hist_author_id'])) $data['hist_author_id'] = pkGivenLookupText($data['hist_author_id'], 'hist_story', 'hist_author_id');
			if(isset($data['community_id'])) $data['community_id'] = pkGivenLookupText($data['community_id'], 'hist_story', 'community_id');
			if(isset($data['genre'])) $data['genre'] = pkGivenLookupText($data['genre'], 'hist_story', 'genre');
			if(isset($data['collaboration_status'])) $data['collaboration_status'] = pkGivenLookupText($data['collaboration_status'], 'hist_story', 'collaboration_status');
			if(isset($data['language'])) $data['language'] = pkGivenLookupText($data['language'], 'hist_story', 'language');
			if(isset($data['hist_author_name'])) $data['hist_author_name'] = thisOr($data['hist_author_id'], pkGivenLookupText($data['hist_author_name'], 'hist_story', 'hist_author_name'));

			return $data;
		},
		'hist_chr' => function($data, $options = []) {
			if(isset($data['team'])) $data['team'] = pkGivenLookupText($data['team'], 'hist_chr', 'team');
			if(isset($data['hist_author_id'])) $data['hist_author_id'] = pkGivenLookupText($data['hist_author_id'], 'hist_chr', 'hist_author_id');
			if(isset($data['hist_story'])) $data['hist_story'] = pkGivenLookupText($data['hist_story'], 'hist_chr', 'hist_story');
			if(isset($data['agent_id'])) $data['agent_id'] = pkGivenLookupText($data['agent_id'], 'hist_chr', 'agent_id');
			if(isset($data['bio_story'])) $data['bio_story'] = pkGivenLookupText($data['bio_story'], 'hist_chr', 'bio_story');
			if(isset($data['story_character'])) $data['story_character'] = pkGivenLookupText($data['story_character'], 'hist_chr', 'story_character');
			if(isset($data['story_archetype'])) $data['story_archetype'] = pkGivenLookupText($data['story_archetype'], 'hist_chr', 'story_archetype');
			if(isset($data['hist_author_memberid'])) $data['hist_author_memberid'] = thisOr($data['hist_author_id'], pkGivenLookupText($data['hist_author_memberid'], 'hist_chr', 'hist_author_memberid'));
			if(isset($data['hist_author_name'])) $data['hist_author_name'] = thisOr($data['hist_author_id'], pkGivenLookupText($data['hist_author_name'], 'hist_chr', 'hist_author_name'));
			if(isset($data['agent_name'])) $data['agent_name'] = thisOr($data['agent_id'], pkGivenLookupText($data['agent_name'], 'hist_chr', 'agent_name'));

			return $data;
		},
		'hist_chr_dev' => function($data, $options = []) {
			if(isset($data['hist_story'])) $data['hist_story'] = pkGivenLookupText($data['hist_story'], 'hist_chr_dev', 'hist_story');
			if(isset($data['bio_story'])) $data['bio_story'] = pkGivenLookupText($data['bio_story'], 'hist_chr_dev', 'bio_story');
			if(isset($data['agent_id'])) $data['agent_id'] = pkGivenLookupText($data['agent_id'], 'hist_chr_dev', 'agent_id');
			if(isset($data['agent_name'])) $data['agent_name'] = pkGivenLookupText($data['agent_name'], 'hist_chr_dev', 'agent_name');
			if(isset($data['cw_name'])) $data['cw_name'] = pkGivenLookupText($data['cw_name'], 'hist_chr_dev', 'cw_name');
			if(isset($data['dp1_resolve'])) $data['dp1_resolve'] = pkGivenLookupText($data['dp1_resolve'], 'hist_chr_dev', 'dp1_resolve');
			if(isset($data['dp2_resolve'])) $data['dp2_resolve'] = pkGivenLookupText($data['dp2_resolve'], 'hist_chr_dev', 'dp2_resolve');
			if(isset($data['dp3_resolve'])) $data['dp3_resolve'] = pkGivenLookupText($data['dp3_resolve'], 'hist_chr_dev', 'dp3_resolve');
			if(isset($data['mc_resolve'])) $data['mc_resolve'] = pkGivenLookupText($data['mc_resolve'], 'hist_chr_dev', 'mc_resolve');
			if(isset($data['illust_resolve'])) $data['illust_resolve'] = pkGivenLookupText($data['illust_resolve'], 'hist_chr_dev', 'illust_resolve');
			if(isset($data['dp3_growth'])) $data['dp3_growth'] = pkGivenLookupText($data['dp3_growth'], 'hist_chr_dev', 'dp3_growth');
			if(isset($data['mc_growth'])) $data['mc_growth'] = pkGivenLookupText($data['mc_growth'], 'hist_chr_dev', 'mc_growth');
			if(isset($data['illust_growth'])) $data['illust_growth'] = pkGivenLookupText($data['illust_growth'], 'hist_chr_dev', 'illust_growth');
			if(isset($data['dp3_approach'])) $data['dp3_approach'] = pkGivenLookupText($data['dp3_approach'], 'hist_chr_dev', 'dp3_approach');
			if(isset($data['mc_approach'])) $data['mc_approach'] = pkGivenLookupText($data['mc_approach'], 'hist_chr_dev', 'mc_approach');
			if(isset($data['illust_approach'])) $data['illust_approach'] = pkGivenLookupText($data['illust_approach'], 'hist_chr_dev', 'illust_approach');
			if(isset($data['dp3_psstyle'])) $data['dp3_psstyle'] = pkGivenLookupText($data['dp3_psstyle'], 'hist_chr_dev', 'dp3_psstyle');
			if(isset($data['mc_ps_style'])) $data['mc_ps_style'] = pkGivenLookupText($data['mc_ps_style'], 'hist_chr_dev', 'mc_ps_style');
			if(isset($data['illust_ps_style'])) $data['illust_ps_style'] = pkGivenLookupText($data['illust_ps_style'], 'hist_chr_dev', 'illust_ps_style');
			if(isset($data['cw_gender'])) $data['cw_gender'] = pkGivenLookupText($data['cw_gender'], 'hist_chr_dev', 'cw_gender');
			if(isset($data['noetictension'])) $data['noetictension'] = pkGivenLookupText($data['noetictension'], 'hist_chr_dev', 'noetictension');
			if(isset($data['illust_nt'])) $data['illust_nt'] = pkGivenLookupText($data['illust_nt'], 'hist_chr_dev', 'illust_nt');
			if(isset($data['impression'])) $data['impression'] = pkGivenLookupText($data['impression'], 'hist_chr_dev', 'impression');
			if(isset($data['illust_im'])) $data['illust_im'] = pkGivenLookupText($data['illust_im'], 'hist_chr_dev', 'illust_im');
			if(isset($data['mcs_problem'])) $data['mcs_problem'] = pkGivenLookupText($data['mcs_problem'], 'hist_chr_dev', 'mcs_problem');
			if(isset($data['illust_mcs_problem'])) $data['illust_mcs_problem'] = pkGivenLookupText($data['illust_mcs_problem'], 'hist_chr_dev', 'illust_mcs_problem');
			if(isset($data['illust_mcs_solution'])) $data['illust_mcs_solution'] = pkGivenLookupText($data['illust_mcs_solution'], 'hist_chr_dev', 'illust_mcs_solution');
			if(isset($data['illust_mcs_symptom'])) $data['illust_mcs_symptom'] = pkGivenLookupText($data['illust_mcs_symptom'], 'hist_chr_dev', 'illust_mcs_symptom');
			if(isset($data['illust_mcs_response'])) $data['illust_mcs_response'] = pkGivenLookupText($data['illust_mcs_response'], 'hist_chr_dev', 'illust_mcs_response');
			if(isset($data['mcs_solution'])) $data['mcs_solution'] = thisOr($data['mcs_problem'], pkGivenLookupText($data['mcs_solution'], 'hist_chr_dev', 'mcs_solution'));
			if(isset($data['mcs_symptom'])) $data['mcs_symptom'] = thisOr($data['mcs_problem'], pkGivenLookupText($data['mcs_symptom'], 'hist_chr_dev', 'mcs_symptom'));
			if(isset($data['mcs_response'])) $data['mcs_response'] = thisOr($data['mcs_problem'], pkGivenLookupText($data['mcs_response'], 'hist_chr_dev', 'mcs_response'));

			return $data;
		},
		'hist_chr_scene' => function($data, $options = []) {
			if(isset($data['team'])) $data['team'] = pkGivenLookupText($data['team'], 'hist_chr_scene', 'team');
			if(isset($data['author_id'])) $data['author_id'] = pkGivenLookupText($data['author_id'], 'hist_chr_scene', 'author_id');
			if(isset($data['hist_story'])) $data['hist_story'] = pkGivenLookupText($data['hist_story'], 'hist_chr_scene', 'hist_story');
			if(isset($data['agent_id'])) $data['agent_id'] = pkGivenLookupText($data['agent_id'], 'hist_chr_scene', 'agent_id');
			if(isset($data['bio_story'])) $data['bio_story'] = pkGivenLookupText($data['bio_story'], 'hist_chr_scene', 'bio_story');
			if(isset($data['hist_chr'])) $data['hist_chr'] = pkGivenLookupText($data['hist_chr'], 'hist_chr_scene', 'hist_chr');
			if(isset($data['bio_storyline_no'])) $data['bio_storyline_no'] = pkGivenLookupText($data['bio_storyline_no'], 'hist_chr_scene', 'bio_storyline_no');
			if(isset($data['chr_element'])) $data['chr_element'] = pkGivenLookupText($data['chr_element'], 'hist_chr_scene', 'chr_element');
			if(isset($data['bio_chr_scene'])) $data['bio_chr_scene'] = pkGivenLookupText($data['bio_chr_scene'], 'hist_chr_scene', 'bio_chr_scene');
			if(isset($data['invivo_code'])) $data['invivo_code'] = pkGivenLookupText($data['invivo_code'], 'hist_chr_scene', 'invivo_code');
			if(isset($data['startdate'])) $data['startdate'] = pkGivenLookupText($data['startdate'], 'hist_chr_scene', 'startdate');
			if(isset($data['enddate'])) $data['enddate'] = pkGivenLookupText($data['enddate'], 'hist_chr_scene', 'enddate');
			if(isset($data['person'])) $data['person'] = pkGivenLookupText($data['person'], 'hist_chr_scene', 'person');
			if(isset($data['place'])) $data['place'] = pkGivenLookupText($data['place'], 'hist_chr_scene', 'place');
			if(isset($data['herme_code'])) $data['herme_code'] = pkGivenLookupText($data['herme_code'], 'hist_chr_scene', 'herme_code');
			if(isset($data['impression'])) $data['impression'] = pkGivenLookupText($data['impression'], 'hist_chr_scene', 'impression');
			if(isset($data['noetictension'])) $data['noetictension'] = pkGivenLookupText($data['noetictension'], 'hist_chr_scene', 'noetictension');
			if(isset($data['pc'])) $data['pc'] = pkGivenLookupText($data['pc'], 'hist_chr_scene', 'pc');
			if(isset($data['counterfactual'])) $data['counterfactual'] = pkGivenLookupText($data['counterfactual'], 'hist_chr_scene', 'counterfactual');
			if(isset($data['dilemma'])) $data['dilemma'] = pkGivenLookupText($data['dilemma'], 'hist_chr_scene', 'dilemma');
			if(isset($data['author_name'])) $data['author_name'] = thisOr($data['author_id'], pkGivenLookupText($data['author_name'], 'hist_chr_scene', 'author_name'));
			if(isset($data['agent_name'])) $data['agent_name'] = thisOr($data['agent_id'], pkGivenLookupText($data['agent_name'], 'hist_chr_scene', 'agent_name'));
			if(isset($data['bio_storyline_text'])) $data['bio_storyline_text'] = thisOr($data['bio_storyline_no'], pkGivenLookupText($data['bio_storyline_text'], 'hist_chr_scene', 'bio_storyline_text'));

			return $data;
		},
		'hist_storyline' => function($data, $options = []) {
			if(isset($data['story'])) $data['story'] = pkGivenLookupText($data['story'], 'hist_storyline', 'story');
			if(isset($data['story_act'])) $data['story_act'] = pkGivenLookupText($data['story_act'], 'hist_storyline', 'story_act');
			if(isset($data['character'])) $data['character'] = pkGivenLookupText($data['character'], 'hist_storyline', 'character');
			if(isset($data['storyweaving_scene_no'])) $data['storyweaving_scene_no'] = pkGivenLookupText($data['storyweaving_scene_no'], 'hist_storyline', 'storyweaving_scene_no');
			if(isset($data['storyweaving_scene'])) $data['storyweaving_scene'] = pkGivenLookupText($data['storyweaving_scene'], 'hist_storyline', 'storyweaving_scene');
			if(isset($data['storyweaving_sequence'])) $data['storyweaving_sequence'] = pkGivenLookupText($data['storyweaving_sequence'], 'hist_storyline', 'storyweaving_sequence');
			if(isset($data['storyweaving_theme'])) $data['storyweaving_theme'] = pkGivenLookupText($data['storyweaving_theme'], 'hist_storyline', 'storyweaving_theme');
			if(isset($data['characterevent_scene'])) $data['characterevent_scene'] = pkGivenLookupText($data['characterevent_scene'], 'hist_storyline', 'characterevent_scene');
			if(isset($data['character_event'])) $data['character_event'] = pkGivenLookupText($data['character_event'], 'hist_storyline', 'character_event');
			if(isset($data['role'])) $data['role'] = thisOr($data['character'], pkGivenLookupText($data['role'], 'hist_storyline', 'role'));
			if(isset($data['startdate'])) $data['startdate'] = thisOr($data['characterevent_scene'], pkGivenLookupText($data['startdate'], 'hist_storyline', 'startdate'));
			if(isset($data['enddate'])) $data['enddate'] = thisOr($data['characterevent_scene'], pkGivenLookupText($data['enddate'], 'hist_storyline', 'enddate'));

			return $data;
		},
		'hist_storystatic' => function($data, $options = []) {
			if(isset($data['story'])) $data['story'] = pkGivenLookupText($data['story'], 'hist_storystatic', 'story');
			if(isset($data['throughline'])) $data['throughline'] = pkGivenLookupText($data['throughline'], 'hist_storystatic', 'throughline');
			if(isset($data['story_character_mc'])) $data['story_character_mc'] = pkGivenLookupText($data['story_character_mc'], 'hist_storystatic', 'story_character_mc');
			if(isset($data['throughline_domain'])) $data['throughline_domain'] = pkGivenLookupText($data['throughline_domain'], 'hist_storystatic', 'throughline_domain');
			if(isset($data['concern'])) $data['concern'] = pkGivenLookupText($data['concern'], 'hist_storystatic', 'concern');
			if(isset($data['issue'])) $data['issue'] = pkGivenLookupText($data['issue'], 'hist_storystatic', 'issue');
			if(isset($data['problem'])) $data['problem'] = pkGivenLookupText($data['problem'], 'hist_storystatic', 'problem');
			if(isset($data['solution'])) $data['solution'] = pkGivenLookupText($data['solution'], 'hist_storystatic', 'solution');
			if(isset($data['symptom'])) $data['symptom'] = pkGivenLookupText($data['symptom'], 'hist_storystatic', 'symptom');
			if(isset($data['response'])) $data['response'] = pkGivenLookupText($data['response'], 'hist_storystatic', 'response');
			if(isset($data['catalyst'])) $data['catalyst'] = pkGivenLookupText($data['catalyst'], 'hist_storystatic', 'catalyst');
			if(isset($data['inhibitor'])) $data['inhibitor'] = pkGivenLookupText($data['inhibitor'], 'hist_storystatic', 'inhibitor');
			if(isset($data['benchmark'])) $data['benchmark'] = pkGivenLookupText($data['benchmark'], 'hist_storystatic', 'benchmark');
			if(isset($data['signpost1'])) $data['signpost1'] = pkGivenLookupText($data['signpost1'], 'hist_storystatic', 'signpost1');
			if(isset($data['signpost2'])) $data['signpost2'] = pkGivenLookupText($data['signpost2'], 'hist_storystatic', 'signpost2');
			if(isset($data['signpost3'])) $data['signpost3'] = pkGivenLookupText($data['signpost3'], 'hist_storystatic', 'signpost3');
			if(isset($data['signpost4'])) $data['signpost4'] = pkGivenLookupText($data['signpost4'], 'hist_storystatic', 'signpost4');

			return $data;
		},
		'hist_storydynamic' => function($data, $options = []) {
			if(isset($data['hist_story'])) $data['hist_story'] = pkGivenLookupText($data['hist_story'], 'hist_storydynamic', 'hist_story');
			if(isset($data['bio_story_mc'])) $data['bio_story_mc'] = pkGivenLookupText($data['bio_story_mc'], 'hist_storydynamic', 'bio_story_mc');
			if(isset($data['hist_chr_mc'])) $data['hist_chr_mc'] = pkGivenLookupText($data['hist_chr_mc'], 'hist_storydynamic', 'hist_chr_mc');
			if(isset($data['storystatic_mc'])) $data['storystatic_mc'] = pkGivenLookupText($data['storystatic_mc'], 'hist_storydynamic', 'storystatic_mc');
			if(isset($data['story_chr_mc'])) $data['story_chr_mc'] = pkGivenLookupText($data['story_chr_mc'], 'hist_storydynamic', 'story_chr_mc');
			if(isset($data['mc_problem'])) $data['mc_problem'] = pkGivenLookupText($data['mc_problem'], 'hist_storydynamic', 'mc_problem');
			if(isset($data['mc_resolve'])) $data['mc_resolve'] = pkGivenLookupText($data['mc_resolve'], 'hist_storydynamic', 'mc_resolve');
			if(isset($data['mc_growth'])) $data['mc_growth'] = pkGivenLookupText($data['mc_growth'], 'hist_storydynamic', 'mc_growth');
			if(isset($data['mc_approach'])) $data['mc_approach'] = pkGivenLookupText($data['mc_approach'], 'hist_storydynamic', 'mc_approach');
			if(isset($data['mc_ps_style'])) $data['mc_ps_style'] = pkGivenLookupText($data['mc_ps_style'], 'hist_storydynamic', 'mc_ps_style');
			if(isset($data['story_chr_ic'])) $data['story_chr_ic'] = pkGivenLookupText($data['story_chr_ic'], 'hist_storydynamic', 'story_chr_ic');
			if(isset($data['ic_resolve'])) $data['ic_resolve'] = pkGivenLookupText($data['ic_resolve'], 'hist_storydynamic', 'ic_resolve');
			if(isset($data['dp_cat1'])) $data['dp_cat1'] = pkGivenLookupText($data['dp_cat1'], 'hist_storydynamic', 'dp_cat1');
			if(isset($data['dp_cat2'])) $data['dp_cat2'] = pkGivenLookupText($data['dp_cat2'], 'hist_storydynamic', 'dp_cat2');
			if(isset($data['dp_cat3_driver'])) $data['dp_cat3_driver'] = pkGivenLookupText($data['dp_cat3_driver'], 'hist_storydynamic', 'dp_cat3_driver');
			if(isset($data['os_driver'])) $data['os_driver'] = pkGivenLookupText($data['os_driver'], 'hist_storydynamic', 'os_driver');
			if(isset($data['dp_cat3_limit'])) $data['dp_cat3_limit'] = pkGivenLookupText($data['dp_cat3_limit'], 'hist_storydynamic', 'dp_cat3_limit');
			if(isset($data['os_limit'])) $data['os_limit'] = pkGivenLookupText($data['os_limit'], 'hist_storydynamic', 'os_limit');
			if(isset($data['dp_cat3_outcome'])) $data['dp_cat3_outcome'] = pkGivenLookupText($data['dp_cat3_outcome'], 'hist_storydynamic', 'dp_cat3_outcome');
			if(isset($data['os_outcome'])) $data['os_outcome'] = pkGivenLookupText($data['os_outcome'], 'hist_storydynamic', 'os_outcome');
			if(isset($data['dp_cat3_judgement'])) $data['dp_cat3_judgement'] = pkGivenLookupText($data['dp_cat3_judgement'], 'hist_storydynamic', 'dp_cat3_judgement');
			if(isset($data['os_judgement'])) $data['os_judgement'] = pkGivenLookupText($data['os_judgement'], 'hist_storydynamic', 'os_judgement');
			if(isset($data['os_goal_domain'])) $data['os_goal_domain'] = pkGivenLookupText($data['os_goal_domain'], 'hist_storydynamic', 'os_goal_domain');
			if(isset($data['os_goal_concern'])) $data['os_goal_concern'] = pkGivenLookupText($data['os_goal_concern'], 'hist_storydynamic', 'os_goal_concern');
			if(isset($data['os_consequence_domain'])) $data['os_consequence_domain'] = pkGivenLookupText($data['os_consequence_domain'], 'hist_storydynamic', 'os_consequence_domain');
			if(isset($data['os_consequence_concern'])) $data['os_consequence_concern'] = pkGivenLookupText($data['os_consequence_concern'], 'hist_storydynamic', 'os_consequence_concern');
			if(isset($data['os_cost_domain'])) $data['os_cost_domain'] = pkGivenLookupText($data['os_cost_domain'], 'hist_storydynamic', 'os_cost_domain');
			if(isset($data['os_cost_concern'])) $data['os_cost_concern'] = pkGivenLookupText($data['os_cost_concern'], 'hist_storydynamic', 'os_cost_concern');
			if(isset($data['os_dividend_domain'])) $data['os_dividend_domain'] = pkGivenLookupText($data['os_dividend_domain'], 'hist_storydynamic', 'os_dividend_domain');
			if(isset($data['os_dividend_concern'])) $data['os_dividend_concern'] = pkGivenLookupText($data['os_dividend_concern'], 'hist_storydynamic', 'os_dividend_concern');
			if(isset($data['os_requirements_domain'])) $data['os_requirements_domain'] = pkGivenLookupText($data['os_requirements_domain'], 'hist_storydynamic', 'os_requirements_domain');
			if(isset($data['os_requirements_concern'])) $data['os_requirements_concern'] = pkGivenLookupText($data['os_requirements_concern'], 'hist_storydynamic', 'os_requirements_concern');
			if(isset($data['os_prerequesites_domain'])) $data['os_prerequesites_domain'] = pkGivenLookupText($data['os_prerequesites_domain'], 'hist_storydynamic', 'os_prerequesites_domain');
			if(isset($data['os_prerequesites_concern'])) $data['os_prerequesites_concern'] = pkGivenLookupText($data['os_prerequesites_concern'], 'hist_storydynamic', 'os_prerequesites_concern');
			if(isset($data['os_preconditions_domain'])) $data['os_preconditions_domain'] = pkGivenLookupText($data['os_preconditions_domain'], 'hist_storydynamic', 'os_preconditions_domain');
			if(isset($data['os_preconditions_concern'])) $data['os_preconditions_concern'] = pkGivenLookupText($data['os_preconditions_concern'], 'hist_storydynamic', 'os_preconditions_concern');
			if(isset($data['os_forewarnings_domain'])) $data['os_forewarnings_domain'] = pkGivenLookupText($data['os_forewarnings_domain'], 'hist_storydynamic', 'os_forewarnings_domain');
			if(isset($data['os_forewarnings_concern'])) $data['os_forewarnings_concern'] = pkGivenLookupText($data['os_forewarnings_concern'], 'hist_storydynamic', 'os_forewarnings_concern');

			return $data;
		},
		'hist_storyweaving_scene' => function($data, $options = []) {
			if(isset($data['story'])) $data['story'] = pkGivenLookupText($data['story'], 'hist_storyweaving_scene', 'story');
			if(isset($data['step'])) $data['step'] = pkGivenLookupText($data['step'], 'hist_storyweaving_scene', 'step');
			if(isset($data['throughline'])) $data['throughline'] = pkGivenLookupText($data['throughline'], 'hist_storyweaving_scene', 'throughline');
			if(isset($data['domain'])) $data['domain'] = pkGivenLookupText($data['domain'], 'hist_storyweaving_scene', 'domain');
			if(isset($data['concern'])) $data['concern'] = pkGivenLookupText($data['concern'], 'hist_storyweaving_scene', 'concern');
			if(isset($data['issue'])) $data['issue'] = pkGivenLookupText($data['issue'], 'hist_storyweaving_scene', 'issue');
			if(isset($data['theme'])) $data['theme'] = pkGivenLookupText($data['theme'], 'hist_storyweaving_scene', 'theme');

			return $data;
		},
		'hist_encounter' => function($data, $options = []) {
			if(isset($data['hist_story'])) $data['hist_story'] = pkGivenLookupText($data['hist_story'], 'hist_encounter', 'hist_story');
			if(isset($data['agentA'])) $data['agentA'] = pkGivenLookupText($data['agentA'], 'hist_encounter', 'agentA');
			if(isset($data['bio_storyA'])) $data['bio_storyA'] = pkGivenLookupText($data['bio_storyA'], 'hist_encounter', 'bio_storyA');
			if(isset($data['hist_chrA'])) $data['hist_chrA'] = pkGivenLookupText($data['hist_chrA'], 'hist_encounter', 'hist_chrA');
			if(isset($data['bio_chr_sceneA'])) $data['bio_chr_sceneA'] = pkGivenLookupText($data['bio_chr_sceneA'], 'hist_encounter', 'bio_chr_sceneA');
			if(isset($data['bio_impressionA'])) $data['bio_impressionA'] = pkGivenLookupText($data['bio_impressionA'], 'hist_encounter', 'bio_impressionA');
			if(isset($data['bio_ntA'])) $data['bio_ntA'] = pkGivenLookupText($data['bio_ntA'], 'hist_encounter', 'bio_ntA');
			if(isset($data['bio_counterfactualA'])) $data['bio_counterfactualA'] = pkGivenLookupText($data['bio_counterfactualA'], 'hist_encounter', 'bio_counterfactualA');
			if(isset($data['bio_dilemmaA'])) $data['bio_dilemmaA'] = pkGivenLookupText($data['bio_dilemmaA'], 'hist_encounter', 'bio_dilemmaA');
			if(isset($data['bio_sdgA'])) $data['bio_sdgA'] = pkGivenLookupText($data['bio_sdgA'], 'hist_encounter', 'bio_sdgA');
			if(isset($data['startdateA'])) $data['startdateA'] = pkGivenLookupText($data['startdateA'], 'hist_encounter', 'startdateA');
			if(isset($data['enddateA'])) $data['enddateA'] = pkGivenLookupText($data['enddateA'], 'hist_encounter', 'enddateA');
			if(isset($data['sceneA'])) $data['sceneA'] = pkGivenLookupText($data['sceneA'], 'hist_encounter', 'sceneA');
			if(isset($data['agentB'])) $data['agentB'] = pkGivenLookupText($data['agentB'], 'hist_encounter', 'agentB');
			if(isset($data['bio_storyB'])) $data['bio_storyB'] = pkGivenLookupText($data['bio_storyB'], 'hist_encounter', 'bio_storyB');
			if(isset($data['hist_chrB'])) $data['hist_chrB'] = pkGivenLookupText($data['hist_chrB'], 'hist_encounter', 'hist_chrB');
			if(isset($data['bio_chr_sceneB'])) $data['bio_chr_sceneB'] = pkGivenLookupText($data['bio_chr_sceneB'], 'hist_encounter', 'bio_chr_sceneB');
			if(isset($data['bio_impressionB'])) $data['bio_impressionB'] = pkGivenLookupText($data['bio_impressionB'], 'hist_encounter', 'bio_impressionB');
			if(isset($data['bio_ntB'])) $data['bio_ntB'] = pkGivenLookupText($data['bio_ntB'], 'hist_encounter', 'bio_ntB');
			if(isset($data['bio_counterfactualB'])) $data['bio_counterfactualB'] = pkGivenLookupText($data['bio_counterfactualB'], 'hist_encounter', 'bio_counterfactualB');
			if(isset($data['bio_dilemmaB'])) $data['bio_dilemmaB'] = pkGivenLookupText($data['bio_dilemmaB'], 'hist_encounter', 'bio_dilemmaB');
			if(isset($data['bio_sdgB'])) $data['bio_sdgB'] = pkGivenLookupText($data['bio_sdgB'], 'hist_encounter', 'bio_sdgB');
			if(isset($data['startdateB'])) $data['startdateB'] = pkGivenLookupText($data['startdateB'], 'hist_encounter', 'startdateB');
			if(isset($data['enddateB'])) $data['enddateB'] = pkGivenLookupText($data['enddateB'], 'hist_encounter', 'enddateB');
			if(isset($data['sdg_intgr'])) $data['sdg_intgr'] = pkGivenLookupText($data['sdg_intgr'], 'hist_encounter', 'sdg_intgr');
			if(isset($data['encounter_team'])) $data['encounter_team'] = pkGivenLookupText($data['encounter_team'], 'hist_encounter', 'encounter_team');
			if(isset($data['encounter_analyst'])) $data['encounter_analyst'] = pkGivenLookupText($data['encounter_analyst'], 'hist_encounter', 'encounter_analyst');
			if(isset($data['agent_nameA'])) $data['agent_nameA'] = thisOr($data['agentA'], pkGivenLookupText($data['agent_nameA'], 'hist_encounter', 'agent_nameA'));
			if(isset($data['agent_nameB'])) $data['agent_nameB'] = thisOr($data['agentA'], pkGivenLookupText($data['agent_nameB'], 'hist_encounter', 'agent_nameB'));

			return $data;
		},
		'hist_encounter_scene' => function($data, $options = []) {
			if(isset($data['scene'])) $data['scene'] = pkGivenLookupText($data['scene'], 'hist_encounter_scene', 'scene');
			if(isset($data['encounter_analyst'])) $data['encounter_analyst'] = pkGivenLookupText($data['encounter_analyst'], 'hist_encounter_scene', 'encounter_analyst');

			return $data;
		},
		'encounter_team' => function($data, $options = []) {

			return $data;
		},
		'ecounter_analyst' => function($data, $options = []) {
			if(isset($data['team'])) $data['team'] = pkGivenLookupText($data['team'], 'ecounter_analyst', 'team');
			if(isset($data['agent_id'])) $data['agent_id'] = pkGivenLookupText($data['agent_id'], 'ecounter_analyst', 'agent_id');
			if(isset($data['last_name'])) $data['last_name'] = thisOr($data['agent_id'], pkGivenLookupText($data['last_name'], 'ecounter_analyst', 'last_name'));
			if(isset($data['first_name'])) $data['first_name'] = thisOr($data['agent_id'], pkGivenLookupText($data['first_name'], 'ecounter_analyst', 'first_name'));

			return $data;
		},
		'hist_community' => function($data, $options = []) {

			return $data;
		},
		'class_agent_selection' => function($data, $options = []) {

			return $data;
		},
		'class_agent_type1' => function($data, $options = []) {

			return $data;
		},
		'class_agent_type2' => function($data, $options = []) {

			return $data;
		},
		'class_character_element' => function($data, $options = []) {

			return $data;
		},
		'class_gender' => function($data, $options = []) {

			return $data;
		},
		'class_agent_race' => function($data, $options = []) {

			return $data;
		},
		'class_agent_religion' => function($data, $options = []) {

			return $data;
		},
		'class_agent_job' => function($data, $options = []) {

			return $data;
		},
		'class_agent_party' => function($data, $options = []) {

			return $data;
		},
		'class_agent_status' => function($data, $options = []) {

			return $data;
		},
		'class_authority_agent' => function($data, $options = []) {

			return $data;
		},
		'class_evaluation' => function($data, $options = []) {

			return $data;
		},
		'class_bibliography_type' => function($data, $options = []) {

			return $data;
		},
		'class_bibliography_media' => function($data, $options = []) {

			return $data;
		},
		'class_bibliography_genre' => function($data, $options = []) {

			return $data;
		},
		'class_authority_library' => function($data, $options = []) {

			return $data;
		},
		'class_rights' => function($data, $options = []) {

			return $data;
		},
		'class_language' => function($data, $options = []) {

			return $data;
		},
		'class_story_collab_type' => function($data, $options = []) {

			return $data;
		},
		'class_story_acts' => function($data, $options = []) {

			return $data;
		},
		'class_story_path' => function($data, $options = []) {

			return $data;
		},
		'class_dramatica_steps' => function($data, $options = []) {
			if(isset($data['act'])) $data['act'] = pkGivenLookupText($data['act'], 'class_dramatica_steps', 'act');

			return $data;
		},
		'class_dramatica_throughline' => function($data, $options = []) {

			return $data;
		},
		'class_dramatica_signpost' => function($data, $options = []) {

			return $data;
		},
		'class_dramatica_domain' => function($data, $options = []) {

			return $data;
		},
		'class_dramatica_concern' => function($data, $options = []) {
			if(isset($data['domain'])) $data['domain'] = pkGivenLookupText($data['domain'], 'class_dramatica_concern', 'domain');

			return $data;
		},
		'class_dramatica_issue' => function($data, $options = []) {
			if(isset($data['domain'])) $data['domain'] = pkGivenLookupText($data['domain'], 'class_dramatica_issue', 'domain');
			if(isset($data['concern'])) $data['concern'] = pkGivenLookupText($data['concern'], 'class_dramatica_issue', 'concern');

			return $data;
		},
		'class_dramatica_themes' => function($data, $options = []) {
			if(isset($data['domain'])) $data['domain'] = pkGivenLookupText($data['domain'], 'class_dramatica_themes', 'domain');
			if(isset($data['concern'])) $data['concern'] = pkGivenLookupText($data['concern'], 'class_dramatica_themes', 'concern');
			if(isset($data['issue'])) $data['issue'] = pkGivenLookupText($data['issue'], 'class_dramatica_themes', 'issue');

			return $data;
		},
		'class_dramatica_archetype' => function($data, $options = []) {

			return $data;
		},
		'class_dramatica_character' => function($data, $options = []) {

			return $data;
		},
		'class_dynamicstorypoints1' => function($data, $options = []) {

			return $data;
		},
		'class_dynamicstorypoints2' => function($data, $options = []) {
			if(isset($data['cat1'])) $data['cat1'] = pkGivenLookupText($data['cat1'], 'class_dynamicstorypoints2', 'cat1');

			return $data;
		},
		'class_dynamicstorypoints3' => function($data, $options = []) {
			if(isset($data['cat1'])) $data['cat1'] = pkGivenLookupText($data['cat1'], 'class_dynamicstorypoints3', 'cat1');
			if(isset($data['cat2'])) $data['cat2'] = pkGivenLookupText($data['cat2'], 'class_dynamicstorypoints3', 'cat2');

			return $data;
		},
		'class_dynamicstorypoints4' => function($data, $options = []) {
			if(isset($data['cat1'])) $data['cat1'] = pkGivenLookupText($data['cat1'], 'class_dynamicstorypoints4', 'cat1');
			if(isset($data['cat2'])) $data['cat2'] = pkGivenLookupText($data['cat2'], 'class_dynamicstorypoints4', 'cat2');
			if(isset($data['cat3'])) $data['cat3'] = pkGivenLookupText($data['cat3'], 'class_dynamicstorypoints4', 'cat3');

			return $data;
		},
		'class_im' => function($data, $options = []) {

			return $data;
		},
		'class_pc' => function($data, $options = []) {

			return $data;
		},
		'class_nt' => function($data, $options = []) {

			return $data;
		},
		'class_dilemma' => function($data, $options = []) {

			return $data;
		},
		'class_cuadrilemma' => function($data, $options = []) {

			return $data;
		},
		'class_sdg' => function($data, $options = []) {

			return $data;
		},
		'class_sdg_intgr' => function($data, $options = []) {
			if(isset($data['sdgA'])) $data['sdgA'] = pkGivenLookupText($data['sdgA'], 'class_sdg_intgr', 'sdgA');
			if(isset($data['sdgB'])) $data['sdgB'] = pkGivenLookupText($data['sdgB'], 'class_sdg_intgr', 'sdgB');

			return $data;
		},
		'class_goals' => function($data, $options = []) {

			return $data;
		},
		'class_counterfactual' => function($data, $options = []) {

			return $data;
		},
		'dictionary' => function($data, $options = []) {

			return $data;
		},
		'class_dictionary1' => function($data, $options = []) {

			return $data;
		},
		'class_dictionary2' => function($data, $options = []) {
			if(isset($data['class1'])) $data['class1'] = pkGivenLookupText($data['class1'], 'class_dictionary2', 'class1');

			return $data;
		},
		'class_dictionary3' => function($data, $options = []) {
			if(isset($data['class1'])) $data['class1'] = pkGivenLookupText($data['class1'], 'class_dictionary3', 'class1');
			if(isset($data['class2'])) $data['class2'] = pkGivenLookupText($data['class2'], 'class_dictionary3', 'class2');

			return $data;
		},
		'class_dictionary4' => function($data, $options = []) {
			if(isset($data['class1'])) $data['class1'] = pkGivenLookupText($data['class1'], 'class_dictionary4', 'class1');
			if(isset($data['class2'])) $data['class2'] = pkGivenLookupText($data['class2'], 'class_dictionary4', 'class2');
			if(isset($data['class3'])) $data['class3'] = pkGivenLookupText($data['class3'], 'class_dictionary4', 'class3');

			return $data;
		},
		'class_dictionary5' => function($data, $options = []) {
			if(isset($data['class1'])) $data['class1'] = pkGivenLookupText($data['class1'], 'class_dictionary5', 'class1');
			if(isset($data['class2'])) $data['class2'] = pkGivenLookupText($data['class2'], 'class_dictionary5', 'class2');
			if(isset($data['class3'])) $data['class3'] = pkGivenLookupText($data['class3'], 'class_dictionary5', 'class3');
			if(isset($data['class4'])) $data['class4'] = pkGivenLookupText($data['class4'], 'class_dictionary5', 'class4');

			return $data;
		},
		'assignments' => function($data, $options = []) {
			if(isset($data['ProjectId'])) $data['ProjectId'] = pkGivenLookupText($data['ProjectId'], 'assignments', 'ProjectId');
			if(isset($data['RessourceId'])) $data['RessourceId'] = pkGivenLookupText($data['RessourceId'], 'assignments', 'RessourceId');
			if(isset($data['author_id'])) $data['author_id'] = pkGivenLookupText($data['author_id'], 'assignments', 'author_id');
			if(isset($data['biblio_doc'])) $data['biblio_doc'] = pkGivenLookupText($data['biblio_doc'], 'assignments', 'biblio_doc');
			if(isset($data['biblio_trascript'])) $data['biblio_trascript'] = pkGivenLookupText($data['biblio_trascript'], 'assignments', 'biblio_trascript');
			if(isset($data['biblio_token'])) $data['biblio_token'] = pkGivenLookupText($data['biblio_token'], 'assignments', 'biblio_token');
			if(isset($data['invivio_code'])) $data['invivio_code'] = pkGivenLookupText($data['invivio_code'], 'assignments', 'invivio_code');
			if(isset($data['StartDate'])) $data['StartDate'] = pkGivenLookupText($data['StartDate'], 'assignments', 'StartDate');
			if(isset($data['ProjectDuration'])) $data['ProjectDuration'] = thisOr($data['ProjectId'], pkGivenLookupText($data['ProjectDuration'], 'assignments', 'ProjectDuration'));
			if(isset($data['author_name'])) $data['author_name'] = thisOr($data['author_id'], pkGivenLookupText($data['author_name'], 'assignments', 'author_name'));
			if(isset($data['EndDate'])) $data['EndDate'] = thisOr($data['invivio_code'], pkGivenLookupText($data['EndDate'], 'assignments', 'EndDate'));

			return $data;
		},
		'resources' => function($data, $options = []) {
			if(isset($data['agent_id'])) $data['agent_id'] = pkGivenLookupText($data['agent_id'], 'resources', 'agent_id');
			if(isset($data['Name'])) $data['Name'] = thisOr($data['agent_id'], pkGivenLookupText($data['Name'], 'resources', 'Name'));

			return $data;
		},
		'projects' => function($data, $options = []) {
			if(isset($data['community'])) $data['community'] = pkGivenLookupText($data['community'], 'projects', 'community');
			if(isset($data['StartDate'])) $data['StartDate'] = guessMySQLDateTime($data['StartDate']);
			if(isset($data['EndDate'])) $data['EndDate'] = guessMySQLDateTime($data['EndDate']);

			return $data;
		},
		'gallery_authors' => function($data, $options = []) {

			return $data;
		},
	];

	// accept a record as an assoc array, return a boolean indicating whether to import or skip record
	$filterFunctions = [
		'game_agent' => function($data, $options = []) { return true; },
		'biblio_author' => function($data, $options = []) { return true; },
		'biblio_doc' => function($data, $options = []) { return true; },
		'biblio_transcript' => function($data, $options = []) { return true; },
		'biblio_token' => function($data, $options = []) { return true; },
		'biblio_code_invivo' => function($data, $options = []) { return true; },
		'biblio_code_demo' => function($data, $options = []) { return true; },
		'biblio_team' => function($data, $options = []) { return true; },
		'biblio_analyst' => function($data, $options = []) { return true; },
		'bio_team' => function($data, $options = []) { return true; },
		'bio_author' => function($data, $options = []) { return true; },
		'bio_story' => function($data, $options = []) { return true; },
		'bio_chr' => function($data, $options = []) { return true; },
		'bio_chr_dev' => function($data, $options = []) { return true; },
		'bio_chr_scene' => function($data, $options = []) { return true; },
		'bio_storyline' => function($data, $options = []) { return true; },
		'bio_storystatic' => function($data, $options = []) { return true; },
		'bio_storydynamic' => function($data, $options = []) { return true; },
		'bio_storyweaving_scene' => function($data, $options = []) { return true; },
		'bio_encounter' => function($data, $options = []) { return true; },
		'bio_encounter_scene' => function($data, $options = []) { return true; },
		'bio_code_herme' => function($data, $options = []) { return true; },
		'hist_team' => function($data, $options = []) { return true; },
		'hist_author' => function($data, $options = []) { return true; },
		'hist_story' => function($data, $options = []) { return true; },
		'hist_chr' => function($data, $options = []) { return true; },
		'hist_chr_dev' => function($data, $options = []) { return true; },
		'hist_chr_scene' => function($data, $options = []) { return true; },
		'hist_storyline' => function($data, $options = []) { return true; },
		'hist_storystatic' => function($data, $options = []) { return true; },
		'hist_storydynamic' => function($data, $options = []) { return true; },
		'hist_storyweaving_scene' => function($data, $options = []) { return true; },
		'hist_encounter' => function($data, $options = []) { return true; },
		'hist_encounter_scene' => function($data, $options = []) { return true; },
		'encounter_team' => function($data, $options = []) { return true; },
		'ecounter_analyst' => function($data, $options = []) { return true; },
		'hist_community' => function($data, $options = []) { return true; },
		'class_agent_selection' => function($data, $options = []) { return true; },
		'class_agent_type1' => function($data, $options = []) { return true; },
		'class_agent_type2' => function($data, $options = []) { return true; },
		'class_character_element' => function($data, $options = []) { return true; },
		'class_gender' => function($data, $options = []) { return true; },
		'class_agent_race' => function($data, $options = []) { return true; },
		'class_agent_religion' => function($data, $options = []) { return true; },
		'class_agent_job' => function($data, $options = []) { return true; },
		'class_agent_party' => function($data, $options = []) { return true; },
		'class_agent_status' => function($data, $options = []) { return true; },
		'class_authority_agent' => function($data, $options = []) { return true; },
		'class_evaluation' => function($data, $options = []) { return true; },
		'class_bibliography_type' => function($data, $options = []) { return true; },
		'class_bibliography_media' => function($data, $options = []) { return true; },
		'class_bibliography_genre' => function($data, $options = []) { return true; },
		'class_authority_library' => function($data, $options = []) { return true; },
		'class_rights' => function($data, $options = []) { return true; },
		'class_language' => function($data, $options = []) { return true; },
		'class_story_collab_type' => function($data, $options = []) { return true; },
		'class_story_acts' => function($data, $options = []) { return true; },
		'class_story_path' => function($data, $options = []) { return true; },
		'class_dramatica_steps' => function($data, $options = []) { return true; },
		'class_dramatica_throughline' => function($data, $options = []) { return true; },
		'class_dramatica_signpost' => function($data, $options = []) { return true; },
		'class_dramatica_domain' => function($data, $options = []) { return true; },
		'class_dramatica_concern' => function($data, $options = []) { return true; },
		'class_dramatica_issue' => function($data, $options = []) { return true; },
		'class_dramatica_themes' => function($data, $options = []) { return true; },
		'class_dramatica_archetype' => function($data, $options = []) { return true; },
		'class_dramatica_character' => function($data, $options = []) { return true; },
		'class_dynamicstorypoints1' => function($data, $options = []) { return true; },
		'class_dynamicstorypoints2' => function($data, $options = []) { return true; },
		'class_dynamicstorypoints3' => function($data, $options = []) { return true; },
		'class_dynamicstorypoints4' => function($data, $options = []) { return true; },
		'class_im' => function($data, $options = []) { return true; },
		'class_pc' => function($data, $options = []) { return true; },
		'class_nt' => function($data, $options = []) { return true; },
		'class_dilemma' => function($data, $options = []) { return true; },
		'class_cuadrilemma' => function($data, $options = []) { return true; },
		'class_sdg' => function($data, $options = []) { return true; },
		'class_sdg_intgr' => function($data, $options = []) { return true; },
		'class_goals' => function($data, $options = []) { return true; },
		'class_counterfactual' => function($data, $options = []) { return true; },
		'dictionary' => function($data, $options = []) { return true; },
		'class_dictionary1' => function($data, $options = []) { return true; },
		'class_dictionary2' => function($data, $options = []) { return true; },
		'class_dictionary3' => function($data, $options = []) { return true; },
		'class_dictionary4' => function($data, $options = []) { return true; },
		'class_dictionary5' => function($data, $options = []) { return true; },
		'assignments' => function($data, $options = []) { return true; },
		'resources' => function($data, $options = []) { return true; },
		'projects' => function($data, $options = []) { return true; },
		'gallery_authors' => function($data, $options = []) { return true; },
	];

	/*
	Hook file for overwriting/amending $transformFunctions and $filterFunctions:
	hooks/import-csv.php
	If found, it's included below

	The way this works is by either completely overwriting any of the above 2 arrays,
	or, more commonly, overwriting a single function, for example:
		$transformFunctions['tablename'] = function($data, $options = []) {
			// new definition here
			// then you must return transformed data
			return $data;
		};

	Another scenario is transforming a specific field and leaving other fields to the default
	transformation. One possible way of doing this is to store the original transformation function
	in GLOBALS array, calling it inside the custom transformation function, then modifying the
	specific field:
		$GLOBALS['originalTransformationFunction'] = $transformFunctions['tablename'];
		$transformFunctions['tablename'] = function($data, $options = []) {
			$data = call_user_func_array($GLOBALS['originalTransformationFunction'], [$data, $options]);
			$data['fieldname'] = 'transformed value';
			return $data;
		};
	*/

	@include("{$app_dir}/hooks/import-csv.php");

	$ui = new CSVImportUI($transformFunctions, $filterFunctions);
