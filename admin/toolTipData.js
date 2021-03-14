var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// game_agent table
game_agent_addTip=["",spacer+"This option allows all members of the group to add records to the 'Agentes' table. A member who adds a record to the table becomes the 'owner' of that record."];

game_agent_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Agentes' table."];
game_agent_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Agentes' table."];
game_agent_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Agentes' table."];
game_agent_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Agentes' table."];

game_agent_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Agentes' table."];
game_agent_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Agentes' table."];
game_agent_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Agentes' table."];
game_agent_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Agentes' table, regardless of their owner."];

game_agent_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Agentes' table."];
game_agent_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Agentes' table."];
game_agent_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Agentes' table."];
game_agent_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Agentes' table."];

// biblio_author table
biblio_author_addTip=["",spacer+"This option allows all members of the group to add records to the 'Autores' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_author_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Autores' table."];
biblio_author_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Autores' table."];
biblio_author_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Autores' table."];
biblio_author_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Autores' table."];

biblio_author_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Autores' table."];
biblio_author_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Autores' table."];
biblio_author_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Autores' table."];
biblio_author_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Autores' table, regardless of their owner."];

biblio_author_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Autores' table."];
biblio_author_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Autores' table."];
biblio_author_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Autores' table."];
biblio_author_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Autores' table."];

// biblio_doc table
biblio_doc_addTip=["",spacer+"This option allows all members of the group to add records to the 'Corpus' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_doc_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Corpus' table."];
biblio_doc_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Corpus' table."];
biblio_doc_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Corpus' table."];
biblio_doc_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Corpus' table."];

biblio_doc_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Corpus' table."];
biblio_doc_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Corpus' table."];
biblio_doc_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Corpus' table."];
biblio_doc_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Corpus' table, regardless of their owner."];

biblio_doc_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Corpus' table."];
biblio_doc_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Corpus' table."];
biblio_doc_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Corpus' table."];
biblio_doc_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Corpus' table."];

// biblio_transcript table
biblio_transcript_addTip=["",spacer+"This option allows all members of the group to add records to the 'Transcripci&#243;n' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_transcript_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Transcripci&#243;n' table."];
biblio_transcript_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Transcripci&#243;n' table."];
biblio_transcript_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Transcripci&#243;n' table."];
biblio_transcript_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Transcripci&#243;n' table."];

biblio_transcript_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Transcripci&#243;n' table."];
biblio_transcript_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Transcripci&#243;n' table."];
biblio_transcript_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Transcripci&#243;n' table."];
biblio_transcript_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Transcripci&#243;n' table, regardless of their owner."];

biblio_transcript_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Transcripci&#243;n' table."];
biblio_transcript_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Transcripci&#243;n' table."];
biblio_transcript_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Transcripci&#243;n' table."];
biblio_transcript_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Transcripci&#243;n' table."];

// biblio_token table
biblio_token_addTip=["",spacer+"This option allows all members of the group to add records to the 'Tokens' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_token_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Tokens' table."];
biblio_token_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Tokens' table."];
biblio_token_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Tokens' table."];
biblio_token_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Tokens' table."];

biblio_token_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Tokens' table."];
biblio_token_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Tokens' table."];
biblio_token_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Tokens' table."];
biblio_token_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Tokens' table, regardless of their owner."];

biblio_token_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Tokens' table."];
biblio_token_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Tokens' table."];
biblio_token_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Tokens' table."];
biblio_token_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Tokens' table."];

// biblio_code_invivo table
biblio_code_invivo_addTip=["",spacer+"This option allows all members of the group to add records to the 'Invivo' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_code_invivo_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Invivo' table."];
biblio_code_invivo_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Invivo' table."];
biblio_code_invivo_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Invivo' table."];
biblio_code_invivo_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Invivo' table."];

biblio_code_invivo_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Invivo' table."];
biblio_code_invivo_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Invivo' table."];
biblio_code_invivo_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Invivo' table."];
biblio_code_invivo_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Invivo' table, regardless of their owner."];

biblio_code_invivo_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Invivo' table."];
biblio_code_invivo_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Invivo' table."];
biblio_code_invivo_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Invivo' table."];
biblio_code_invivo_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Invivo' table."];

// biblio_code_demo table
biblio_code_demo_addTip=["",spacer+"This option allows all members of the group to add records to the 'Datos demogr&#225;ficos' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_code_demo_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Datos demogr&#225;ficos' table."];
biblio_code_demo_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Datos demogr&#225;ficos' table."];
biblio_code_demo_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Datos demogr&#225;ficos' table."];
biblio_code_demo_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Datos demogr&#225;ficos' table."];

biblio_code_demo_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Datos demogr&#225;ficos' table."];
biblio_code_demo_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Datos demogr&#225;ficos' table."];
biblio_code_demo_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Datos demogr&#225;ficos' table."];
biblio_code_demo_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Datos demogr&#225;ficos' table, regardless of their owner."];

biblio_code_demo_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Datos demogr&#225;ficos' table."];
biblio_code_demo_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Datos demogr&#225;ficos' table."];
biblio_code_demo_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Datos demogr&#225;ficos' table."];
biblio_code_demo_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Datos demogr&#225;ficos' table."];

// biblio_team table
biblio_team_addTip=["",spacer+"This option allows all members of the group to add records to the 'Equipos bibliogr&#225;ficos' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_team_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Equipos bibliogr&#225;ficos' table."];
biblio_team_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Equipos bibliogr&#225;ficos' table."];
biblio_team_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Equipos bibliogr&#225;ficos' table."];
biblio_team_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Equipos bibliogr&#225;ficos' table."];

biblio_team_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Equipos bibliogr&#225;ficos' table."];
biblio_team_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Equipos bibliogr&#225;ficos' table."];
biblio_team_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Equipos bibliogr&#225;ficos' table."];
biblio_team_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Equipos bibliogr&#225;ficos' table, regardless of their owner."];

biblio_team_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Equipos bibliogr&#225;ficos' table."];
biblio_team_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Equipos bibliogr&#225;ficos' table."];
biblio_team_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Equipos bibliogr&#225;ficos' table."];
biblio_team_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Equipos bibliogr&#225;ficos' table."];

// biblio_analyst table
biblio_analyst_addTip=["",spacer+"This option allows all members of the group to add records to the 'Bibli&#243;grafos' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_analyst_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Bibli&#243;grafos' table."];
biblio_analyst_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Bibli&#243;grafos' table."];
biblio_analyst_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Bibli&#243;grafos' table."];
biblio_analyst_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Bibli&#243;grafos' table."];

biblio_analyst_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Bibli&#243;grafos' table."];
biblio_analyst_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Bibli&#243;grafos' table."];
biblio_analyst_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Bibli&#243;grafos' table."];
biblio_analyst_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Bibli&#243;grafos' table, regardless of their owner."];

biblio_analyst_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Bibli&#243;grafos' table."];
biblio_analyst_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Bibli&#243;grafos' table."];
biblio_analyst_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Bibli&#243;grafos' table."];
biblio_analyst_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Bibli&#243;grafos' table."];

// bio_team table
bio_team_addTip=["",spacer+"This option allows all members of the group to add records to the 'Equipos biogr&#225;ficos' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_team_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Equipos biogr&#225;ficos' table."];
bio_team_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Equipos biogr&#225;ficos' table."];
bio_team_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Equipos biogr&#225;ficos' table."];
bio_team_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Equipos biogr&#225;ficos' table."];

bio_team_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Equipos biogr&#225;ficos' table."];
bio_team_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Equipos biogr&#225;ficos' table."];
bio_team_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Equipos biogr&#225;ficos' table."];
bio_team_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Equipos biogr&#225;ficos' table, regardless of their owner."];

bio_team_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Equipos biogr&#225;ficos' table."];
bio_team_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Equipos biogr&#225;ficos' table."];
bio_team_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Equipos biogr&#225;ficos' table."];
bio_team_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Equipos biogr&#225;ficos' table."];

// bio_author table
bio_author_addTip=["",spacer+"This option allows all members of the group to add records to the 'Bi&#243;grafos' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_author_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Bi&#243;grafos' table."];
bio_author_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Bi&#243;grafos' table."];
bio_author_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Bi&#243;grafos' table."];
bio_author_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Bi&#243;grafos' table."];

bio_author_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Bi&#243;grafos' table."];
bio_author_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Bi&#243;grafos' table."];
bio_author_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Bi&#243;grafos' table."];
bio_author_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Bi&#243;grafos' table, regardless of their owner."];

bio_author_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Bi&#243;grafos' table."];
bio_author_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Bi&#243;grafos' table."];
bio_author_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Bi&#243;grafos' table."];
bio_author_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Bi&#243;grafos' table."];

// bio_story table
bio_story_addTip=["",spacer+"This option allows all members of the group to add records to the 'Biograf&#237;as' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_story_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Biograf&#237;as' table."];
bio_story_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Biograf&#237;as' table."];
bio_story_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Biograf&#237;as' table."];
bio_story_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Biograf&#237;as' table."];

bio_story_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Biograf&#237;as' table."];
bio_story_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Biograf&#237;as' table."];
bio_story_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Biograf&#237;as' table."];
bio_story_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Biograf&#237;as' table, regardless of their owner."];

bio_story_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Biograf&#237;as' table."];
bio_story_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Biograf&#237;as' table."];
bio_story_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Biograf&#237;as' table."];
bio_story_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Biograf&#237;as' table."];

// bio_chr table
bio_chr_addTip=["",spacer+"This option allows all members of the group to add records to the 'Personajes de la biograf&#237;a' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_chr_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Personajes de la biograf&#237;a' table."];
bio_chr_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Personajes de la biograf&#237;a' table."];
bio_chr_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Personajes de la biograf&#237;a' table."];
bio_chr_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Personajes de la biograf&#237;a' table."];

bio_chr_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Personajes de la biograf&#237;a' table."];
bio_chr_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Personajes de la biograf&#237;a' table."];
bio_chr_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Personajes de la biograf&#237;a' table."];
bio_chr_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Personajes de la biograf&#237;a' table, regardless of their owner."];

bio_chr_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Personajes de la biograf&#237;a' table."];
bio_chr_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Personajes de la biograf&#237;a' table."];
bio_chr_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Personajes de la biograf&#237;a' table."];
bio_chr_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Personajes de la biograf&#237;a' table."];

// bio_chr_dev table
bio_chr_dev_addTip=["",spacer+"This option allows all members of the group to add records to the 'Desarrollo de personajes de biograf&#237;as' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_chr_dev_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Desarrollo de personajes de biograf&#237;as' table."];
bio_chr_dev_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Desarrollo de personajes de biograf&#237;as' table."];
bio_chr_dev_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Desarrollo de personajes de biograf&#237;as' table."];
bio_chr_dev_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Desarrollo de personajes de biograf&#237;as' table."];

bio_chr_dev_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Desarrollo de personajes de biograf&#237;as' table."];
bio_chr_dev_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Desarrollo de personajes de biograf&#237;as' table."];
bio_chr_dev_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Desarrollo de personajes de biograf&#237;as' table."];
bio_chr_dev_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Desarrollo de personajes de biograf&#237;as' table, regardless of their owner."];

bio_chr_dev_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Desarrollo de personajes de biograf&#237;as' table."];
bio_chr_dev_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Desarrollo de personajes de biograf&#237;as' table."];
bio_chr_dev_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Desarrollo de personajes de biograf&#237;as' table."];
bio_chr_dev_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Desarrollo de personajes de biograf&#237;as' table."];

// bio_chr_scene table
bio_chr_scene_addTip=["",spacer+"This option allows all members of the group to add records to the 'Escenas personales de la biograf&#237;a' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_chr_scene_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Escenas personales de la biograf&#237;a' table."];
bio_chr_scene_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Escenas personales de la biograf&#237;a' table."];
bio_chr_scene_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Escenas personales de la biograf&#237;a' table."];
bio_chr_scene_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Escenas personales de la biograf&#237;a' table."];

bio_chr_scene_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Escenas personales de la biograf&#237;a' table."];
bio_chr_scene_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Escenas personales de la biograf&#237;a' table."];
bio_chr_scene_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Escenas personales de la biograf&#237;a' table."];
bio_chr_scene_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Escenas personales de la biograf&#237;a' table, regardless of their owner."];

bio_chr_scene_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Escenas personales de la biograf&#237;a' table."];
bio_chr_scene_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Escenas personales de la biograf&#237;a' table."];
bio_chr_scene_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Escenas personales de la biograf&#237;a' table."];
bio_chr_scene_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Escenas personales de la biograf&#237;a' table."];

// bio_storyline table
bio_storyline_addTip=["",spacer+"This option allows all members of the group to add records to the 'Trama biogr&#225;fica' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_storyline_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Trama biogr&#225;fica' table."];
bio_storyline_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Trama biogr&#225;fica' table."];
bio_storyline_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Trama biogr&#225;fica' table."];
bio_storyline_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Trama biogr&#225;fica' table."];

bio_storyline_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Trama biogr&#225;fica' table."];
bio_storyline_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Trama biogr&#225;fica' table."];
bio_storyline_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Trama biogr&#225;fica' table."];
bio_storyline_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Trama biogr&#225;fica' table, regardless of their owner."];

bio_storyline_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Trama biogr&#225;fica' table."];
bio_storyline_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Trama biogr&#225;fica' table."];
bio_storyline_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Trama biogr&#225;fica' table."];
bio_storyline_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Trama biogr&#225;fica' table."];

// bio_storystatic table
bio_storystatic_addTip=["",spacer+"This option allows all members of the group to add records to the 'Puntos est&#225;ticos de biograf&#237;a' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_storystatic_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Puntos est&#225;ticos de biograf&#237;a' table."];
bio_storystatic_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Puntos est&#225;ticos de biograf&#237;a' table."];
bio_storystatic_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Puntos est&#225;ticos de biograf&#237;a' table."];
bio_storystatic_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Puntos est&#225;ticos de biograf&#237;a' table."];

bio_storystatic_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Puntos est&#225;ticos de biograf&#237;a' table."];
bio_storystatic_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Puntos est&#225;ticos de biograf&#237;a' table."];
bio_storystatic_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Puntos est&#225;ticos de biograf&#237;a' table."];
bio_storystatic_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Puntos est&#225;ticos de biograf&#237;a' table, regardless of their owner."];

bio_storystatic_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Puntos est&#225;ticos de biograf&#237;a' table."];
bio_storystatic_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Puntos est&#225;ticos de biograf&#237;a' table."];
bio_storystatic_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Puntos est&#225;ticos de biograf&#237;a' table."];
bio_storystatic_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Puntos est&#225;ticos de biograf&#237;a' table."];

// bio_storydynamic table
bio_storydynamic_addTip=["",spacer+"This option allows all members of the group to add records to the 'Puntos din&#225;micos de biograf&#237;a' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_storydynamic_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Puntos din&#225;micos de biograf&#237;a' table."];
bio_storydynamic_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Puntos din&#225;micos de biograf&#237;a' table."];
bio_storydynamic_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Puntos din&#225;micos de biograf&#237;a' table."];
bio_storydynamic_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Puntos din&#225;micos de biograf&#237;a' table."];

bio_storydynamic_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Puntos din&#225;micos de biograf&#237;a' table."];
bio_storydynamic_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Puntos din&#225;micos de biograf&#237;a' table."];
bio_storydynamic_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Puntos din&#225;micos de biograf&#237;a' table."];
bio_storydynamic_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Puntos din&#225;micos de biograf&#237;a' table, regardless of their owner."];

bio_storydynamic_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Puntos din&#225;micos de biograf&#237;a' table."];
bio_storydynamic_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Puntos din&#225;micos de biograf&#237;a' table."];
bio_storydynamic_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Puntos din&#225;micos de biograf&#237;a' table."];
bio_storydynamic_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Puntos din&#225;micos de biograf&#237;a' table."];

// bio_storyweaving_scene table
bio_storyweaving_scene_addTip=["",spacer+"This option allows all members of the group to add records to the 'Escenas de Storyweaving' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_storyweaving_scene_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Escenas de Storyweaving' table."];
bio_storyweaving_scene_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Escenas de Storyweaving' table."];
bio_storyweaving_scene_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Escenas de Storyweaving' table."];
bio_storyweaving_scene_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Escenas de Storyweaving' table."];

bio_storyweaving_scene_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Escenas de Storyweaving' table."];
bio_storyweaving_scene_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Escenas de Storyweaving' table."];
bio_storyweaving_scene_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Escenas de Storyweaving' table."];
bio_storyweaving_scene_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Escenas de Storyweaving' table, regardless of their owner."];

bio_storyweaving_scene_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Escenas de Storyweaving' table."];
bio_storyweaving_scene_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Escenas de Storyweaving' table."];
bio_storyweaving_scene_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Escenas de Storyweaving' table."];
bio_storyweaving_scene_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Escenas de Storyweaving' table."];

// bio_encounter table
bio_encounter_addTip=["",spacer+"This option allows all members of the group to add records to the 'Encuentros de vida' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_encounter_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Encuentros de vida' table."];
bio_encounter_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Encuentros de vida' table."];
bio_encounter_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Encuentros de vida' table."];
bio_encounter_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Encuentros de vida' table."];

bio_encounter_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Encuentros de vida' table."];
bio_encounter_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Encuentros de vida' table."];
bio_encounter_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Encuentros de vida' table."];
bio_encounter_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Encuentros de vida' table, regardless of their owner."];

bio_encounter_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Encuentros de vida' table."];
bio_encounter_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Encuentros de vida' table."];
bio_encounter_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Encuentros de vida' table."];
bio_encounter_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Encuentros de vida' table."];

// bio_encounter_scene table
bio_encounter_scene_addTip=["",spacer+"This option allows all members of the group to add records to the 'Escenas de encuentro biogr&#225;fico' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_encounter_scene_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Escenas de encuentro biogr&#225;fico' table."];
bio_encounter_scene_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Escenas de encuentro biogr&#225;fico' table."];
bio_encounter_scene_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Escenas de encuentro biogr&#225;fico' table."];
bio_encounter_scene_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Escenas de encuentro biogr&#225;fico' table."];

bio_encounter_scene_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Escenas de encuentro biogr&#225;fico' table."];
bio_encounter_scene_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Escenas de encuentro biogr&#225;fico' table."];
bio_encounter_scene_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Escenas de encuentro biogr&#225;fico' table."];
bio_encounter_scene_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Escenas de encuentro biogr&#225;fico' table, regardless of their owner."];

bio_encounter_scene_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Escenas de encuentro biogr&#225;fico' table."];
bio_encounter_scene_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Escenas de encuentro biogr&#225;fico' table."];
bio_encounter_scene_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Escenas de encuentro biogr&#225;fico' table."];
bio_encounter_scene_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Escenas de encuentro biogr&#225;fico' table."];

// bio_code_herme table
bio_code_herme_addTip=["",spacer+"This option allows all members of the group to add records to the 'Hermen&#233;utica' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_code_herme_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Hermen&#233;utica' table."];
bio_code_herme_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Hermen&#233;utica' table."];
bio_code_herme_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Hermen&#233;utica' table."];
bio_code_herme_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Hermen&#233;utica' table."];

bio_code_herme_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Hermen&#233;utica' table."];
bio_code_herme_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Hermen&#233;utica' table."];
bio_code_herme_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Hermen&#233;utica' table."];
bio_code_herme_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Hermen&#233;utica' table, regardless of their owner."];

bio_code_herme_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Hermen&#233;utica' table."];
bio_code_herme_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Hermen&#233;utica' table."];
bio_code_herme_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Hermen&#233;utica' table."];
bio_code_herme_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Hermen&#233;utica' table."];

// hist_team table
hist_team_addTip=["",spacer+"This option allows all members of the group to add records to the 'Equipos de histori&#243;grafos' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_team_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Equipos de histori&#243;grafos' table."];
hist_team_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Equipos de histori&#243;grafos' table."];
hist_team_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Equipos de histori&#243;grafos' table."];
hist_team_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Equipos de histori&#243;grafos' table."];

hist_team_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Equipos de histori&#243;grafos' table."];
hist_team_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Equipos de histori&#243;grafos' table."];
hist_team_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Equipos de histori&#243;grafos' table."];
hist_team_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Equipos de histori&#243;grafos' table, regardless of their owner."];

hist_team_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Equipos de histori&#243;grafos' table."];
hist_team_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Equipos de histori&#243;grafos' table."];
hist_team_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Equipos de histori&#243;grafos' table."];
hist_team_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Equipos de histori&#243;grafos' table."];

// hist_author table
hist_author_addTip=["",spacer+"This option allows all members of the group to add records to the 'Histori&#243;grafos' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_author_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Histori&#243;grafos' table."];
hist_author_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Histori&#243;grafos' table."];
hist_author_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Histori&#243;grafos' table."];
hist_author_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Histori&#243;grafos' table."];

hist_author_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Histori&#243;grafos' table."];
hist_author_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Histori&#243;grafos' table."];
hist_author_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Histori&#243;grafos' table."];
hist_author_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Histori&#243;grafos' table, regardless of their owner."];

hist_author_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Histori&#243;grafos' table."];
hist_author_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Histori&#243;grafos' table."];
hist_author_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Histori&#243;grafos' table."];
hist_author_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Histori&#243;grafos' table."];

// hist_story table
hist_story_addTip=["",spacer+"This option allows all members of the group to add records to the 'Historias' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_story_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Historias' table."];
hist_story_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Historias' table."];
hist_story_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Historias' table."];
hist_story_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Historias' table."];

hist_story_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Historias' table."];
hist_story_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Historias' table."];
hist_story_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Historias' table."];
hist_story_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Historias' table, regardless of their owner."];

hist_story_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Historias' table."];
hist_story_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Historias' table."];
hist_story_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Historias' table."];
hist_story_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Historias' table."];

// hist_chr table
hist_chr_addTip=["",spacer+"This option allows all members of the group to add records to the 'Personajes de la historia' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_chr_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Personajes de la historia' table."];
hist_chr_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Personajes de la historia' table."];
hist_chr_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Personajes de la historia' table."];
hist_chr_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Personajes de la historia' table."];

hist_chr_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Personajes de la historia' table."];
hist_chr_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Personajes de la historia' table."];
hist_chr_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Personajes de la historia' table."];
hist_chr_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Personajes de la historia' table, regardless of their owner."];

hist_chr_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Personajes de la historia' table."];
hist_chr_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Personajes de la historia' table."];
hist_chr_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Personajes de la historia' table."];
hist_chr_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Personajes de la historia' table."];

// hist_chr_dev table
hist_chr_dev_addTip=["",spacer+"This option allows all members of the group to add records to the 'Desarrollo de personaje de hist&#243;ria' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_chr_dev_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Desarrollo de personaje de hist&#243;ria' table."];
hist_chr_dev_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Desarrollo de personaje de hist&#243;ria' table."];
hist_chr_dev_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Desarrollo de personaje de hist&#243;ria' table."];
hist_chr_dev_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Desarrollo de personaje de hist&#243;ria' table."];

hist_chr_dev_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Desarrollo de personaje de hist&#243;ria' table."];
hist_chr_dev_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Desarrollo de personaje de hist&#243;ria' table."];
hist_chr_dev_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Desarrollo de personaje de hist&#243;ria' table."];
hist_chr_dev_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Desarrollo de personaje de hist&#243;ria' table, regardless of their owner."];

hist_chr_dev_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Desarrollo de personaje de hist&#243;ria' table."];
hist_chr_dev_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Desarrollo de personaje de hist&#243;ria' table."];
hist_chr_dev_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Desarrollo de personaje de hist&#243;ria' table."];
hist_chr_dev_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Desarrollo de personaje de hist&#243;ria' table."];

// hist_chr_scene table
hist_chr_scene_addTip=["",spacer+"This option allows all members of the group to add records to the 'Escenas de personajes de la Historia' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_chr_scene_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Escenas de personajes de la Historia' table."];
hist_chr_scene_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Escenas de personajes de la Historia' table."];
hist_chr_scene_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Escenas de personajes de la Historia' table."];
hist_chr_scene_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Escenas de personajes de la Historia' table."];

hist_chr_scene_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Escenas de personajes de la Historia' table."];
hist_chr_scene_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Escenas de personajes de la Historia' table."];
hist_chr_scene_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Escenas de personajes de la Historia' table."];
hist_chr_scene_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Escenas de personajes de la Historia' table, regardless of their owner."];

hist_chr_scene_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Escenas de personajes de la Historia' table."];
hist_chr_scene_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Escenas de personajes de la Historia' table."];
hist_chr_scene_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Escenas de personajes de la Historia' table."];
hist_chr_scene_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Escenas de personajes de la Historia' table."];

// hist_storyline table
hist_storyline_addTip=["",spacer+"This option allows all members of the group to add records to the 'L&#237;neas de la trama (Storyline)' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_storyline_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'L&#237;neas de la trama (Storyline)' table."];
hist_storyline_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'L&#237;neas de la trama (Storyline)' table."];
hist_storyline_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'L&#237;neas de la trama (Storyline)' table."];
hist_storyline_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'L&#237;neas de la trama (Storyline)' table."];

hist_storyline_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'L&#237;neas de la trama (Storyline)' table."];
hist_storyline_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'L&#237;neas de la trama (Storyline)' table."];
hist_storyline_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'L&#237;neas de la trama (Storyline)' table."];
hist_storyline_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'L&#237;neas de la trama (Storyline)' table, regardless of their owner."];

hist_storyline_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'L&#237;neas de la trama (Storyline)' table."];
hist_storyline_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'L&#237;neas de la trama (Storyline)' table."];
hist_storyline_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'L&#237;neas de la trama (Storyline)' table."];
hist_storyline_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'L&#237;neas de la trama (Storyline)' table."];

// hist_storystatic table
hist_storystatic_addTip=["",spacer+"This option allows all members of the group to add records to the 'Puntos est&#225;ticos de la historia' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_storystatic_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Puntos est&#225;ticos de la historia' table."];
hist_storystatic_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Puntos est&#225;ticos de la historia' table."];
hist_storystatic_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Puntos est&#225;ticos de la historia' table."];
hist_storystatic_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Puntos est&#225;ticos de la historia' table."];

hist_storystatic_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Puntos est&#225;ticos de la historia' table."];
hist_storystatic_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Puntos est&#225;ticos de la historia' table."];
hist_storystatic_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Puntos est&#225;ticos de la historia' table."];
hist_storystatic_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Puntos est&#225;ticos de la historia' table, regardless of their owner."];

hist_storystatic_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Puntos est&#225;ticos de la historia' table."];
hist_storystatic_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Puntos est&#225;ticos de la historia' table."];
hist_storystatic_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Puntos est&#225;ticos de la historia' table."];
hist_storystatic_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Puntos est&#225;ticos de la historia' table."];

// hist_storydynamic table
hist_storydynamic_addTip=["",spacer+"This option allows all members of the group to add records to the 'Puntos din&#225;micos de biograf&#237;a' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_storydynamic_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Puntos din&#225;micos de biograf&#237;a' table."];
hist_storydynamic_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Puntos din&#225;micos de biograf&#237;a' table."];
hist_storydynamic_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Puntos din&#225;micos de biograf&#237;a' table."];
hist_storydynamic_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Puntos din&#225;micos de biograf&#237;a' table."];

hist_storydynamic_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Puntos din&#225;micos de biograf&#237;a' table."];
hist_storydynamic_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Puntos din&#225;micos de biograf&#237;a' table."];
hist_storydynamic_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Puntos din&#225;micos de biograf&#237;a' table."];
hist_storydynamic_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Puntos din&#225;micos de biograf&#237;a' table, regardless of their owner."];

hist_storydynamic_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Puntos din&#225;micos de biograf&#237;a' table."];
hist_storydynamic_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Puntos din&#225;micos de biograf&#237;a' table."];
hist_storydynamic_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Puntos din&#225;micos de biograf&#237;a' table."];
hist_storydynamic_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Puntos din&#225;micos de biograf&#237;a' table."];

// hist_storyweaving_scene table
hist_storyweaving_scene_addTip=["",spacer+"This option allows all members of the group to add records to the 'Escenas de Storyweaving' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_storyweaving_scene_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Escenas de Storyweaving' table."];
hist_storyweaving_scene_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Escenas de Storyweaving' table."];
hist_storyweaving_scene_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Escenas de Storyweaving' table."];
hist_storyweaving_scene_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Escenas de Storyweaving' table."];

hist_storyweaving_scene_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Escenas de Storyweaving' table."];
hist_storyweaving_scene_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Escenas de Storyweaving' table."];
hist_storyweaving_scene_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Escenas de Storyweaving' table."];
hist_storyweaving_scene_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Escenas de Storyweaving' table, regardless of their owner."];

hist_storyweaving_scene_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Escenas de Storyweaving' table."];
hist_storyweaving_scene_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Escenas de Storyweaving' table."];
hist_storyweaving_scene_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Escenas de Storyweaving' table."];
hist_storyweaving_scene_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Escenas de Storyweaving' table."];

// hist_encounter table
hist_encounter_addTip=["",spacer+"This option allows all members of the group to add records to the 'Encuentros hist&#243;ricos' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_encounter_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Encuentros hist&#243;ricos' table."];
hist_encounter_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Encuentros hist&#243;ricos' table."];
hist_encounter_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Encuentros hist&#243;ricos' table."];
hist_encounter_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Encuentros hist&#243;ricos' table."];

hist_encounter_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Encuentros hist&#243;ricos' table."];
hist_encounter_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Encuentros hist&#243;ricos' table."];
hist_encounter_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Encuentros hist&#243;ricos' table."];
hist_encounter_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Encuentros hist&#243;ricos' table, regardless of their owner."];

hist_encounter_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Encuentros hist&#243;ricos' table."];
hist_encounter_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Encuentros hist&#243;ricos' table."];
hist_encounter_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Encuentros hist&#243;ricos' table."];
hist_encounter_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Encuentros hist&#243;ricos' table."];

// hist_encounter_scene table
hist_encounter_scene_addTip=["",spacer+"This option allows all members of the group to add records to the 'Escenas de encuentros hist&#243;ricos' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_encounter_scene_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Escenas de encuentros hist&#243;ricos' table."];
hist_encounter_scene_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Escenas de encuentros hist&#243;ricos' table."];
hist_encounter_scene_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Escenas de encuentros hist&#243;ricos' table."];
hist_encounter_scene_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Escenas de encuentros hist&#243;ricos' table."];

hist_encounter_scene_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Escenas de encuentros hist&#243;ricos' table."];
hist_encounter_scene_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Escenas de encuentros hist&#243;ricos' table."];
hist_encounter_scene_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Escenas de encuentros hist&#243;ricos' table."];
hist_encounter_scene_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Escenas de encuentros hist&#243;ricos' table, regardless of their owner."];

hist_encounter_scene_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Escenas de encuentros hist&#243;ricos' table."];
hist_encounter_scene_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Escenas de encuentros hist&#243;ricos' table."];
hist_encounter_scene_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Escenas de encuentros hist&#243;ricos' table."];
hist_encounter_scene_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Escenas de encuentros hist&#243;ricos' table."];

// encounter_team table
encounter_team_addTip=["",spacer+"This option allows all members of the group to add records to the 'Equipos de soluci&#243;n de conflictos' table. A member who adds a record to the table becomes the 'owner' of that record."];

encounter_team_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Equipos de soluci&#243;n de conflictos' table."];
encounter_team_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Equipos de soluci&#243;n de conflictos' table."];
encounter_team_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Equipos de soluci&#243;n de conflictos' table."];
encounter_team_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Equipos de soluci&#243;n de conflictos' table."];

encounter_team_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Equipos de soluci&#243;n de conflictos' table."];
encounter_team_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Equipos de soluci&#243;n de conflictos' table."];
encounter_team_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Equipos de soluci&#243;n de conflictos' table."];
encounter_team_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Equipos de soluci&#243;n de conflictos' table, regardless of their owner."];

encounter_team_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Equipos de soluci&#243;n de conflictos' table."];
encounter_team_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Equipos de soluci&#243;n de conflictos' table."];
encounter_team_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Equipos de soluci&#243;n de conflictos' table."];
encounter_team_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Equipos de soluci&#243;n de conflictos' table."];

// ecounter_analyst table
ecounter_analyst_addTip=["",spacer+"This option allows all members of the group to add records to the 'Analistas de conflictos' table. A member who adds a record to the table becomes the 'owner' of that record."];

ecounter_analyst_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Analistas de conflictos' table."];
ecounter_analyst_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Analistas de conflictos' table."];
ecounter_analyst_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Analistas de conflictos' table."];
ecounter_analyst_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Analistas de conflictos' table."];

ecounter_analyst_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Analistas de conflictos' table."];
ecounter_analyst_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Analistas de conflictos' table."];
ecounter_analyst_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Analistas de conflictos' table."];
ecounter_analyst_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Analistas de conflictos' table, regardless of their owner."];

ecounter_analyst_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Analistas de conflictos' table."];
ecounter_analyst_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Analistas de conflictos' table."];
ecounter_analyst_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Analistas de conflictos' table."];
ecounter_analyst_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Analistas de conflictos' table."];

// hist_community table
hist_community_addTip=["",spacer+"This option allows all members of the group to add records to the 'Comunidades' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_community_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Comunidades' table."];
hist_community_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Comunidades' table."];
hist_community_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Comunidades' table."];
hist_community_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Comunidades' table."];

hist_community_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Comunidades' table."];
hist_community_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Comunidades' table."];
hist_community_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Comunidades' table."];
hist_community_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Comunidades' table, regardless of their owner."];

hist_community_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Comunidades' table."];
hist_community_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Comunidades' table."];
hist_community_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Comunidades' table."];
hist_community_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Comunidades' table."];

// class_agent_selection table
class_agent_selection_addTip=["",spacer+"This option allows all members of the group to add records to the 'Agent selection phase' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_agent_selection_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Agent selection phase' table."];
class_agent_selection_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Agent selection phase' table."];
class_agent_selection_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Agent selection phase' table."];
class_agent_selection_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Agent selection phase' table."];

class_agent_selection_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Agent selection phase' table."];
class_agent_selection_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Agent selection phase' table."];
class_agent_selection_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Agent selection phase' table."];
class_agent_selection_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Agent selection phase' table, regardless of their owner."];

class_agent_selection_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Agent selection phase' table."];
class_agent_selection_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Agent selection phase' table."];
class_agent_selection_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Agent selection phase' table."];
class_agent_selection_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Agent selection phase' table."];

// class_agent_type1 table
class_agent_type1_addTip=["",spacer+"This option allows all members of the group to add records to the 'Agent type 1' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_agent_type1_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Agent type 1' table."];
class_agent_type1_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Agent type 1' table."];
class_agent_type1_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Agent type 1' table."];
class_agent_type1_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Agent type 1' table."];

class_agent_type1_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Agent type 1' table."];
class_agent_type1_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Agent type 1' table."];
class_agent_type1_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Agent type 1' table."];
class_agent_type1_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Agent type 1' table, regardless of their owner."];

class_agent_type1_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Agent type 1' table."];
class_agent_type1_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Agent type 1' table."];
class_agent_type1_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Agent type 1' table."];
class_agent_type1_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Agent type 1' table."];

// class_agent_type2 table
class_agent_type2_addTip=["",spacer+"This option allows all members of the group to add records to the 'Agent type 2' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_agent_type2_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Agent type 2' table."];
class_agent_type2_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Agent type 2' table."];
class_agent_type2_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Agent type 2' table."];
class_agent_type2_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Agent type 2' table."];

class_agent_type2_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Agent type 2' table."];
class_agent_type2_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Agent type 2' table."];
class_agent_type2_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Agent type 2' table."];
class_agent_type2_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Agent type 2' table, regardless of their owner."];

class_agent_type2_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Agent type 2' table."];
class_agent_type2_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Agent type 2' table."];
class_agent_type2_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Agent type 2' table."];
class_agent_type2_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Agent type 2' table."];

// class_character_element table
class_character_element_addTip=["",spacer+"This option allows all members of the group to add records to the 'Character elements' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_character_element_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Character elements' table."];
class_character_element_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Character elements' table."];
class_character_element_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Character elements' table."];
class_character_element_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Character elements' table."];

class_character_element_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Character elements' table."];
class_character_element_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Character elements' table."];
class_character_element_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Character elements' table."];
class_character_element_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Character elements' table, regardless of their owner."];

class_character_element_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Character elements' table."];
class_character_element_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Character elements' table."];
class_character_element_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Character elements' table."];
class_character_element_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Character elements' table."];

// class_gender table
class_gender_addTip=["",spacer+"This option allows all members of the group to add records to the 'Gender' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_gender_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Gender' table."];
class_gender_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Gender' table."];
class_gender_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Gender' table."];
class_gender_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Gender' table."];

class_gender_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Gender' table."];
class_gender_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Gender' table."];
class_gender_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Gender' table."];
class_gender_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Gender' table, regardless of their owner."];

class_gender_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Gender' table."];
class_gender_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Gender' table."];
class_gender_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Gender' table."];
class_gender_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Gender' table."];

// class_agent_race table
class_agent_race_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class agent race' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_agent_race_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class agent race' table."];
class_agent_race_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class agent race' table."];
class_agent_race_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class agent race' table."];
class_agent_race_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class agent race' table."];

class_agent_race_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class agent race' table."];
class_agent_race_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class agent race' table."];
class_agent_race_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class agent race' table."];
class_agent_race_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class agent race' table, regardless of their owner."];

class_agent_race_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class agent race' table."];
class_agent_race_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class agent race' table."];
class_agent_race_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class agent race' table."];
class_agent_race_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class agent race' table."];

// class_agent_religion table
class_agent_religion_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class agent religion' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_agent_religion_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class agent religion' table."];
class_agent_religion_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class agent religion' table."];
class_agent_religion_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class agent religion' table."];
class_agent_religion_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class agent religion' table."];

class_agent_religion_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class agent religion' table."];
class_agent_religion_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class agent religion' table."];
class_agent_religion_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class agent religion' table."];
class_agent_religion_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class agent religion' table, regardless of their owner."];

class_agent_religion_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class agent religion' table."];
class_agent_religion_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class agent religion' table."];
class_agent_religion_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class agent religion' table."];
class_agent_religion_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class agent religion' table."];

// class_agent_job table
class_agent_job_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class agent job' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_agent_job_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class agent job' table."];
class_agent_job_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class agent job' table."];
class_agent_job_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class agent job' table."];
class_agent_job_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class agent job' table."];

class_agent_job_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class agent job' table."];
class_agent_job_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class agent job' table."];
class_agent_job_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class agent job' table."];
class_agent_job_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class agent job' table, regardless of their owner."];

class_agent_job_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class agent job' table."];
class_agent_job_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class agent job' table."];
class_agent_job_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class agent job' table."];
class_agent_job_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class agent job' table."];

// class_agent_party table
class_agent_party_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class agent party' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_agent_party_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class agent party' table."];
class_agent_party_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class agent party' table."];
class_agent_party_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class agent party' table."];
class_agent_party_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class agent party' table."];

class_agent_party_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class agent party' table."];
class_agent_party_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class agent party' table."];
class_agent_party_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class agent party' table."];
class_agent_party_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class agent party' table, regardless of their owner."];

class_agent_party_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class agent party' table."];
class_agent_party_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class agent party' table."];
class_agent_party_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class agent party' table."];
class_agent_party_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class agent party' table."];

// class_agent_status table
class_agent_status_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class agent status' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_agent_status_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class agent status' table."];
class_agent_status_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class agent status' table."];
class_agent_status_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class agent status' table."];
class_agent_status_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class agent status' table."];

class_agent_status_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class agent status' table."];
class_agent_status_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class agent status' table."];
class_agent_status_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class agent status' table."];
class_agent_status_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class agent status' table, regardless of their owner."];

class_agent_status_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class agent status' table."];
class_agent_status_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class agent status' table."];
class_agent_status_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class agent status' table."];
class_agent_status_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class agent status' table."];

// class_authority_agent table
class_authority_agent_addTip=["",spacer+"This option allows all members of the group to add records to the 'Agent authority code' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_authority_agent_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Agent authority code' table."];
class_authority_agent_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Agent authority code' table."];
class_authority_agent_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Agent authority code' table."];
class_authority_agent_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Agent authority code' table."];

class_authority_agent_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Agent authority code' table."];
class_authority_agent_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Agent authority code' table."];
class_authority_agent_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Agent authority code' table."];
class_authority_agent_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Agent authority code' table, regardless of their owner."];

class_authority_agent_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Agent authority code' table."];
class_authority_agent_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Agent authority code' table."];
class_authority_agent_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Agent authority code' table."];
class_authority_agent_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Agent authority code' table."];

// class_evaluation table
class_evaluation_addTip=["",spacer+"This option allows all members of the group to add records to the 'Evaluation phase' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_evaluation_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Evaluation phase' table."];
class_evaluation_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Evaluation phase' table."];
class_evaluation_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Evaluation phase' table."];
class_evaluation_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Evaluation phase' table."];

class_evaluation_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Evaluation phase' table."];
class_evaluation_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Evaluation phase' table."];
class_evaluation_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Evaluation phase' table."];
class_evaluation_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Evaluation phase' table, regardless of their owner."];

class_evaluation_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Evaluation phase' table."];
class_evaluation_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Evaluation phase' table."];
class_evaluation_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Evaluation phase' table."];
class_evaluation_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Evaluation phase' table."];

// class_bibliography_type table
class_bibliography_type_addTip=["",spacer+"This option allows all members of the group to add records to the 'Text type' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_bibliography_type_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Text type' table."];
class_bibliography_type_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Text type' table."];
class_bibliography_type_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Text type' table."];
class_bibliography_type_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Text type' table."];

class_bibliography_type_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Text type' table."];
class_bibliography_type_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Text type' table."];
class_bibliography_type_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Text type' table."];
class_bibliography_type_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Text type' table, regardless of their owner."];

class_bibliography_type_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Text type' table."];
class_bibliography_type_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Text type' table."];
class_bibliography_type_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Text type' table."];
class_bibliography_type_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Text type' table."];

// class_bibliography_media table
class_bibliography_media_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class media' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_bibliography_media_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class media' table."];
class_bibliography_media_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class media' table."];
class_bibliography_media_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class media' table."];
class_bibliography_media_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class media' table."];

class_bibliography_media_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class media' table."];
class_bibliography_media_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class media' table."];
class_bibliography_media_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class media' table."];
class_bibliography_media_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class media' table, regardless of their owner."];

class_bibliography_media_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class media' table."];
class_bibliography_media_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class media' table."];
class_bibliography_media_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class media' table."];
class_bibliography_media_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class media' table."];

// class_bibliography_genre table
class_bibliography_genre_addTip=["",spacer+"This option allows all members of the group to add records to the 'Genre' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_bibliography_genre_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Genre' table."];
class_bibliography_genre_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Genre' table."];
class_bibliography_genre_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Genre' table."];
class_bibliography_genre_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Genre' table."];

class_bibliography_genre_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Genre' table."];
class_bibliography_genre_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Genre' table."];
class_bibliography_genre_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Genre' table."];
class_bibliography_genre_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Genre' table, regardless of their owner."];

class_bibliography_genre_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Genre' table."];
class_bibliography_genre_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Genre' table."];
class_bibliography_genre_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Genre' table."];
class_bibliography_genre_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Genre' table."];

// class_authority_library table
class_authority_library_addTip=["",spacer+"This option allows all members of the group to add records to the 'Text authority code' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_authority_library_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Text authority code' table."];
class_authority_library_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Text authority code' table."];
class_authority_library_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Text authority code' table."];
class_authority_library_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Text authority code' table."];

class_authority_library_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Text authority code' table."];
class_authority_library_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Text authority code' table."];
class_authority_library_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Text authority code' table."];
class_authority_library_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Text authority code' table, regardless of their owner."];

class_authority_library_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Text authority code' table."];
class_authority_library_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Text authority code' table."];
class_authority_library_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Text authority code' table."];
class_authority_library_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Text authority code' table."];

// class_rights table
class_rights_addTip=["",spacer+"This option allows all members of the group to add records to the 'IP Rigths' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_rights_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'IP Rigths' table."];
class_rights_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'IP Rigths' table."];
class_rights_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'IP Rigths' table."];
class_rights_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'IP Rigths' table."];

class_rights_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'IP Rigths' table."];
class_rights_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'IP Rigths' table."];
class_rights_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'IP Rigths' table."];
class_rights_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'IP Rigths' table, regardless of their owner."];

class_rights_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'IP Rigths' table."];
class_rights_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'IP Rigths' table."];
class_rights_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'IP Rigths' table."];
class_rights_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'IP Rigths' table."];

// class_language table
class_language_addTip=["",spacer+"This option allows all members of the group to add records to the 'Document Language' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_language_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Document Language' table."];
class_language_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Document Language' table."];
class_language_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Document Language' table."];
class_language_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Document Language' table."];

class_language_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Document Language' table."];
class_language_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Document Language' table."];
class_language_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Document Language' table."];
class_language_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Document Language' table, regardless of their owner."];

class_language_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Document Language' table."];
class_language_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Document Language' table."];
class_language_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Document Language' table."];
class_language_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Document Language' table."];

// class_story_collab_type table
class_story_collab_type_addTip=["",spacer+"This option allows all members of the group to add records to the 'Collaboration type' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_story_collab_type_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Collaboration type' table."];
class_story_collab_type_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Collaboration type' table."];
class_story_collab_type_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Collaboration type' table."];
class_story_collab_type_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Collaboration type' table."];

class_story_collab_type_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Collaboration type' table."];
class_story_collab_type_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Collaboration type' table."];
class_story_collab_type_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Collaboration type' table."];
class_story_collab_type_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Collaboration type' table, regardless of their owner."];

class_story_collab_type_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Collaboration type' table."];
class_story_collab_type_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Collaboration type' table."];
class_story_collab_type_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Collaboration type' table."];
class_story_collab_type_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Collaboration type' table."];

// class_story_acts table
class_story_acts_addTip=["",spacer+"This option allows all members of the group to add records to the 'Story acts' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_story_acts_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Story acts' table."];
class_story_acts_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Story acts' table."];
class_story_acts_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Story acts' table."];
class_story_acts_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Story acts' table."];

class_story_acts_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Story acts' table."];
class_story_acts_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Story acts' table."];
class_story_acts_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Story acts' table."];
class_story_acts_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Story acts' table, regardless of their owner."];

class_story_acts_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Story acts' table."];
class_story_acts_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Story acts' table."];
class_story_acts_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Story acts' table."];
class_story_acts_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Story acts' table."];

// class_story_path table
class_story_path_addTip=["",spacer+"This option allows all members of the group to add records to the 'Story pathes' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_story_path_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Story pathes' table."];
class_story_path_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Story pathes' table."];
class_story_path_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Story pathes' table."];
class_story_path_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Story pathes' table."];

class_story_path_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Story pathes' table."];
class_story_path_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Story pathes' table."];
class_story_path_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Story pathes' table."];
class_story_path_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Story pathes' table, regardless of their owner."];

class_story_path_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Story pathes' table."];
class_story_path_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Story pathes' table."];
class_story_path_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Story pathes' table."];
class_story_path_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Story pathes' table."];

// class_dramatica_steps table
class_dramatica_steps_addTip=["",spacer+"This option allows all members of the group to add records to the 'Steps' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dramatica_steps_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Steps' table."];
class_dramatica_steps_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Steps' table."];
class_dramatica_steps_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Steps' table."];
class_dramatica_steps_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Steps' table."];

class_dramatica_steps_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Steps' table."];
class_dramatica_steps_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Steps' table."];
class_dramatica_steps_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Steps' table."];
class_dramatica_steps_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Steps' table, regardless of their owner."];

class_dramatica_steps_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Steps' table."];
class_dramatica_steps_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Steps' table."];
class_dramatica_steps_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Steps' table."];
class_dramatica_steps_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Steps' table."];

// class_dramatica_throughline table
class_dramatica_throughline_addTip=["",spacer+"This option allows all members of the group to add records to the 'Throughlines' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dramatica_throughline_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Throughlines' table."];
class_dramatica_throughline_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Throughlines' table."];
class_dramatica_throughline_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Throughlines' table."];
class_dramatica_throughline_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Throughlines' table."];

class_dramatica_throughline_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Throughlines' table."];
class_dramatica_throughline_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Throughlines' table."];
class_dramatica_throughline_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Throughlines' table."];
class_dramatica_throughline_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Throughlines' table, regardless of their owner."];

class_dramatica_throughline_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Throughlines' table."];
class_dramatica_throughline_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Throughlines' table."];
class_dramatica_throughline_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Throughlines' table."];
class_dramatica_throughline_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Throughlines' table."];

// class_dramatica_signpost table
class_dramatica_signpost_addTip=["",spacer+"This option allows all members of the group to add records to the 'Signposts' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dramatica_signpost_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Signposts' table."];
class_dramatica_signpost_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Signposts' table."];
class_dramatica_signpost_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Signposts' table."];
class_dramatica_signpost_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Signposts' table."];

class_dramatica_signpost_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Signposts' table."];
class_dramatica_signpost_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Signposts' table."];
class_dramatica_signpost_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Signposts' table."];
class_dramatica_signpost_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Signposts' table, regardless of their owner."];

class_dramatica_signpost_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Signposts' table."];
class_dramatica_signpost_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Signposts' table."];
class_dramatica_signpost_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Signposts' table."];
class_dramatica_signpost_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Signposts' table."];

// class_dramatica_domain table
class_dramatica_domain_addTip=["",spacer+"This option allows all members of the group to add records to the 'Domains' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dramatica_domain_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Domains' table."];
class_dramatica_domain_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Domains' table."];
class_dramatica_domain_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Domains' table."];
class_dramatica_domain_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Domains' table."];

class_dramatica_domain_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Domains' table."];
class_dramatica_domain_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Domains' table."];
class_dramatica_domain_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Domains' table."];
class_dramatica_domain_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Domains' table, regardless of their owner."];

class_dramatica_domain_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Domains' table."];
class_dramatica_domain_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Domains' table."];
class_dramatica_domain_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Domains' table."];
class_dramatica_domain_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Domains' table."];

// class_dramatica_concern table
class_dramatica_concern_addTip=["",spacer+"This option allows all members of the group to add records to the 'Concerns' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dramatica_concern_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Concerns' table."];
class_dramatica_concern_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Concerns' table."];
class_dramatica_concern_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Concerns' table."];
class_dramatica_concern_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Concerns' table."];

class_dramatica_concern_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Concerns' table."];
class_dramatica_concern_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Concerns' table."];
class_dramatica_concern_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Concerns' table."];
class_dramatica_concern_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Concerns' table, regardless of their owner."];

class_dramatica_concern_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Concerns' table."];
class_dramatica_concern_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Concerns' table."];
class_dramatica_concern_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Concerns' table."];
class_dramatica_concern_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Concerns' table."];

// class_dramatica_issue table
class_dramatica_issue_addTip=["",spacer+"This option allows all members of the group to add records to the 'Issues' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dramatica_issue_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Issues' table."];
class_dramatica_issue_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Issues' table."];
class_dramatica_issue_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Issues' table."];
class_dramatica_issue_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Issues' table."];

class_dramatica_issue_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Issues' table."];
class_dramatica_issue_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Issues' table."];
class_dramatica_issue_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Issues' table."];
class_dramatica_issue_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Issues' table, regardless of their owner."];

class_dramatica_issue_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Issues' table."];
class_dramatica_issue_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Issues' table."];
class_dramatica_issue_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Issues' table."];
class_dramatica_issue_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Issues' table."];

// class_dramatica_themes table
class_dramatica_themes_addTip=["",spacer+"This option allows all members of the group to add records to the 'Themes' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dramatica_themes_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Themes' table."];
class_dramatica_themes_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Themes' table."];
class_dramatica_themes_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Themes' table."];
class_dramatica_themes_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Themes' table."];

class_dramatica_themes_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Themes' table."];
class_dramatica_themes_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Themes' table."];
class_dramatica_themes_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Themes' table."];
class_dramatica_themes_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Themes' table, regardless of their owner."];

class_dramatica_themes_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Themes' table."];
class_dramatica_themes_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Themes' table."];
class_dramatica_themes_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Themes' table."];
class_dramatica_themes_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Themes' table."];

// class_dramatica_archetype table
class_dramatica_archetype_addTip=["",spacer+"This option allows all members of the group to add records to the 'Archetypes' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dramatica_archetype_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Archetypes' table."];
class_dramatica_archetype_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Archetypes' table."];
class_dramatica_archetype_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Archetypes' table."];
class_dramatica_archetype_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Archetypes' table."];

class_dramatica_archetype_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Archetypes' table."];
class_dramatica_archetype_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Archetypes' table."];
class_dramatica_archetype_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Archetypes' table."];
class_dramatica_archetype_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Archetypes' table, regardless of their owner."];

class_dramatica_archetype_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Archetypes' table."];
class_dramatica_archetype_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Archetypes' table."];
class_dramatica_archetype_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Archetypes' table."];
class_dramatica_archetype_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Archetypes' table."];

// class_dramatica_character table
class_dramatica_character_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class Dramatica character' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dramatica_character_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class Dramatica character' table."];
class_dramatica_character_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class Dramatica character' table."];
class_dramatica_character_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class Dramatica character' table."];
class_dramatica_character_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class Dramatica character' table."];

class_dramatica_character_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class Dramatica character' table."];
class_dramatica_character_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class Dramatica character' table."];
class_dramatica_character_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class Dramatica character' table."];
class_dramatica_character_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class Dramatica character' table, regardless of their owner."];

class_dramatica_character_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class Dramatica character' table."];
class_dramatica_character_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class Dramatica character' table."];
class_dramatica_character_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class Dramatica character' table."];
class_dramatica_character_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class Dramatica character' table."];

// class_dynamicstorypoints1 table
class_dynamicstorypoints1_addTip=["",spacer+"This option allows all members of the group to add records to the 'Dynamic storypoints 1' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dynamicstorypoints1_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Dynamic storypoints 1' table."];
class_dynamicstorypoints1_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Dynamic storypoints 1' table."];
class_dynamicstorypoints1_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Dynamic storypoints 1' table."];
class_dynamicstorypoints1_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Dynamic storypoints 1' table."];

class_dynamicstorypoints1_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Dynamic storypoints 1' table."];
class_dynamicstorypoints1_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Dynamic storypoints 1' table."];
class_dynamicstorypoints1_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Dynamic storypoints 1' table."];
class_dynamicstorypoints1_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Dynamic storypoints 1' table, regardless of their owner."];

class_dynamicstorypoints1_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Dynamic storypoints 1' table."];
class_dynamicstorypoints1_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Dynamic storypoints 1' table."];
class_dynamicstorypoints1_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Dynamic storypoints 1' table."];
class_dynamicstorypoints1_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Dynamic storypoints 1' table."];

// class_dynamicstorypoints2 table
class_dynamicstorypoints2_addTip=["",spacer+"This option allows all members of the group to add records to the 'Dynamic storypoints 2' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dynamicstorypoints2_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Dynamic storypoints 2' table."];
class_dynamicstorypoints2_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Dynamic storypoints 2' table."];
class_dynamicstorypoints2_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Dynamic storypoints 2' table."];
class_dynamicstorypoints2_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Dynamic storypoints 2' table."];

class_dynamicstorypoints2_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Dynamic storypoints 2' table."];
class_dynamicstorypoints2_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Dynamic storypoints 2' table."];
class_dynamicstorypoints2_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Dynamic storypoints 2' table."];
class_dynamicstorypoints2_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Dynamic storypoints 2' table, regardless of their owner."];

class_dynamicstorypoints2_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Dynamic storypoints 2' table."];
class_dynamicstorypoints2_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Dynamic storypoints 2' table."];
class_dynamicstorypoints2_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Dynamic storypoints 2' table."];
class_dynamicstorypoints2_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Dynamic storypoints 2' table."];

// class_dynamicstorypoints3 table
class_dynamicstorypoints3_addTip=["",spacer+"This option allows all members of the group to add records to the 'Dynamic storypoints 3' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dynamicstorypoints3_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Dynamic storypoints 3' table."];
class_dynamicstorypoints3_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Dynamic storypoints 3' table."];
class_dynamicstorypoints3_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Dynamic storypoints 3' table."];
class_dynamicstorypoints3_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Dynamic storypoints 3' table."];

class_dynamicstorypoints3_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Dynamic storypoints 3' table."];
class_dynamicstorypoints3_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Dynamic storypoints 3' table."];
class_dynamicstorypoints3_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Dynamic storypoints 3' table."];
class_dynamicstorypoints3_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Dynamic storypoints 3' table, regardless of their owner."];

class_dynamicstorypoints3_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Dynamic storypoints 3' table."];
class_dynamicstorypoints3_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Dynamic storypoints 3' table."];
class_dynamicstorypoints3_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Dynamic storypoints 3' table."];
class_dynamicstorypoints3_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Dynamic storypoints 3' table."];

// class_dynamicstorypoints4 table
class_dynamicstorypoints4_addTip=["",spacer+"This option allows all members of the group to add records to the 'Dynamic storypoints 4' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dynamicstorypoints4_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Dynamic storypoints 4' table."];
class_dynamicstorypoints4_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Dynamic storypoints 4' table."];
class_dynamicstorypoints4_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Dynamic storypoints 4' table."];
class_dynamicstorypoints4_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Dynamic storypoints 4' table."];

class_dynamicstorypoints4_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Dynamic storypoints 4' table."];
class_dynamicstorypoints4_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Dynamic storypoints 4' table."];
class_dynamicstorypoints4_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Dynamic storypoints 4' table."];
class_dynamicstorypoints4_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Dynamic storypoints 4' table, regardless of their owner."];

class_dynamicstorypoints4_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Dynamic storypoints 4' table."];
class_dynamicstorypoints4_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Dynamic storypoints 4' table."];
class_dynamicstorypoints4_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Dynamic storypoints 4' table."];
class_dynamicstorypoints4_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Dynamic storypoints 4' table."];

// class_im table
class_im_addTip=["",spacer+"This option allows all members of the group to add records to the 'Impressions' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_im_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Impressions' table."];
class_im_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Impressions' table."];
class_im_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Impressions' table."];
class_im_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Impressions' table."];

class_im_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Impressions' table."];
class_im_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Impressions' table."];
class_im_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Impressions' table."];
class_im_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Impressions' table, regardless of their owner."];

class_im_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Impressions' table."];
class_im_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Impressions' table."];
class_im_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Impressions' table."];
class_im_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Impressions' table."];

// class_pc table
class_pc_addTip=["",spacer+"This option allows all members of the group to add records to the 'Performative contradiction' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_pc_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Performative contradiction' table."];
class_pc_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Performative contradiction' table."];
class_pc_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Performative contradiction' table."];
class_pc_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Performative contradiction' table."];

class_pc_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Performative contradiction' table."];
class_pc_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Performative contradiction' table."];
class_pc_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Performative contradiction' table."];
class_pc_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Performative contradiction' table, regardless of their owner."];

class_pc_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Performative contradiction' table."];
class_pc_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Performative contradiction' table."];
class_pc_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Performative contradiction' table."];
class_pc_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Performative contradiction' table."];

// class_nt table
class_nt_addTip=["",spacer+"This option allows all members of the group to add records to the 'Noetic tension' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_nt_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Noetic tension' table."];
class_nt_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Noetic tension' table."];
class_nt_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Noetic tension' table."];
class_nt_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Noetic tension' table."];

class_nt_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Noetic tension' table."];
class_nt_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Noetic tension' table."];
class_nt_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Noetic tension' table."];
class_nt_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Noetic tension' table, regardless of their owner."];

class_nt_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Noetic tension' table."];
class_nt_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Noetic tension' table."];
class_nt_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Noetic tension' table."];
class_nt_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Noetic tension' table."];

// class_dilemma table
class_dilemma_addTip=["",spacer+"This option allows all members of the group to add records to the 'Defense ethical categories' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dilemma_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Defense ethical categories' table."];
class_dilemma_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Defense ethical categories' table."];
class_dilemma_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Defense ethical categories' table."];
class_dilemma_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Defense ethical categories' table."];

class_dilemma_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Defense ethical categories' table."];
class_dilemma_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Defense ethical categories' table."];
class_dilemma_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Defense ethical categories' table."];
class_dilemma_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Defense ethical categories' table, regardless of their owner."];

class_dilemma_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Defense ethical categories' table."];
class_dilemma_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Defense ethical categories' table."];
class_dilemma_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Defense ethical categories' table."];
class_dilemma_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Defense ethical categories' table."];

// class_cuadrilemma table
class_cuadrilemma_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class cuadrilemma' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_cuadrilemma_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class cuadrilemma' table."];
class_cuadrilemma_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class cuadrilemma' table."];
class_cuadrilemma_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class cuadrilemma' table."];
class_cuadrilemma_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class cuadrilemma' table."];

class_cuadrilemma_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class cuadrilemma' table."];
class_cuadrilemma_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class cuadrilemma' table."];
class_cuadrilemma_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class cuadrilemma' table."];
class_cuadrilemma_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class cuadrilemma' table, regardless of their owner."];

class_cuadrilemma_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class cuadrilemma' table."];
class_cuadrilemma_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class cuadrilemma' table."];
class_cuadrilemma_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class cuadrilemma' table."];
class_cuadrilemma_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class cuadrilemma' table."];

// class_sdg table
class_sdg_addTip=["",spacer+"This option allows all members of the group to add records to the 'SDG' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_sdg_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'SDG' table."];
class_sdg_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'SDG' table."];
class_sdg_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'SDG' table."];
class_sdg_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'SDG' table."];

class_sdg_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'SDG' table."];
class_sdg_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'SDG' table."];
class_sdg_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'SDG' table."];
class_sdg_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'SDG' table, regardless of their owner."];

class_sdg_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'SDG' table."];
class_sdg_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'SDG' table."];
class_sdg_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'SDG' table."];
class_sdg_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'SDG' table."];

// class_sdg_intgr table
class_sdg_intgr_addTip=["",spacer+"This option allows all members of the group to add records to the 'SDG integration' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_sdg_intgr_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'SDG integration' table."];
class_sdg_intgr_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'SDG integration' table."];
class_sdg_intgr_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'SDG integration' table."];
class_sdg_intgr_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'SDG integration' table."];

class_sdg_intgr_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'SDG integration' table."];
class_sdg_intgr_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'SDG integration' table."];
class_sdg_intgr_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'SDG integration' table."];
class_sdg_intgr_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'SDG integration' table, regardless of their owner."];

class_sdg_intgr_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'SDG integration' table."];
class_sdg_intgr_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'SDG integration' table."];
class_sdg_intgr_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'SDG integration' table."];
class_sdg_intgr_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'SDG integration' table."];

// class_goals table
class_goals_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class goals' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_goals_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class goals' table."];
class_goals_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class goals' table."];
class_goals_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class goals' table."];
class_goals_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class goals' table."];

class_goals_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class goals' table."];
class_goals_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class goals' table."];
class_goals_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class goals' table."];
class_goals_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class goals' table, regardless of their owner."];

class_goals_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class goals' table."];
class_goals_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class goals' table."];
class_goals_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class goals' table."];
class_goals_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class goals' table."];

// class_counterfactual table
class_counterfactual_addTip=["",spacer+"This option allows all members of the group to add records to the 'Counterfactual' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_counterfactual_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Counterfactual' table."];
class_counterfactual_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Counterfactual' table."];
class_counterfactual_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Counterfactual' table."];
class_counterfactual_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Counterfactual' table."];

class_counterfactual_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Counterfactual' table."];
class_counterfactual_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Counterfactual' table."];
class_counterfactual_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Counterfactual' table."];
class_counterfactual_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Counterfactual' table, regardless of their owner."];

class_counterfactual_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Counterfactual' table."];
class_counterfactual_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Counterfactual' table."];
class_counterfactual_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Counterfactual' table."];
class_counterfactual_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Counterfactual' table."];

// dictionary table
dictionary_addTip=["",spacer+"This option allows all members of the group to add records to the 'Dictionary' table. A member who adds a record to the table becomes the 'owner' of that record."];

dictionary_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Dictionary' table."];
dictionary_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Dictionary' table."];
dictionary_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Dictionary' table."];
dictionary_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Dictionary' table."];

dictionary_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Dictionary' table."];
dictionary_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Dictionary' table."];
dictionary_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Dictionary' table."];
dictionary_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Dictionary' table, regardless of their owner."];

dictionary_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Dictionary' table."];
dictionary_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Dictionary' table."];
dictionary_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Dictionary' table."];
dictionary_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Dictionary' table."];

// class_dictionary1 table
class_dictionary1_addTip=["",spacer+"This option allows all members of the group to add records to the 'Dictionary category 1' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dictionary1_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Dictionary category 1' table."];
class_dictionary1_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Dictionary category 1' table."];
class_dictionary1_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Dictionary category 1' table."];
class_dictionary1_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Dictionary category 1' table."];

class_dictionary1_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Dictionary category 1' table."];
class_dictionary1_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Dictionary category 1' table."];
class_dictionary1_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Dictionary category 1' table."];
class_dictionary1_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Dictionary category 1' table, regardless of their owner."];

class_dictionary1_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Dictionary category 1' table."];
class_dictionary1_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Dictionary category 1' table."];
class_dictionary1_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Dictionary category 1' table."];
class_dictionary1_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Dictionary category 1' table."];

// class_dictionary2 table
class_dictionary2_addTip=["",spacer+"This option allows all members of the group to add records to the 'Dictionary category 2' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dictionary2_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Dictionary category 2' table."];
class_dictionary2_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Dictionary category 2' table."];
class_dictionary2_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Dictionary category 2' table."];
class_dictionary2_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Dictionary category 2' table."];

class_dictionary2_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Dictionary category 2' table."];
class_dictionary2_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Dictionary category 2' table."];
class_dictionary2_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Dictionary category 2' table."];
class_dictionary2_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Dictionary category 2' table, regardless of their owner."];

class_dictionary2_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Dictionary category 2' table."];
class_dictionary2_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Dictionary category 2' table."];
class_dictionary2_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Dictionary category 2' table."];
class_dictionary2_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Dictionary category 2' table."];

// class_dictionary3 table
class_dictionary3_addTip=["",spacer+"This option allows all members of the group to add records to the 'Dictionary category 3' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dictionary3_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Dictionary category 3' table."];
class_dictionary3_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Dictionary category 3' table."];
class_dictionary3_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Dictionary category 3' table."];
class_dictionary3_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Dictionary category 3' table."];

class_dictionary3_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Dictionary category 3' table."];
class_dictionary3_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Dictionary category 3' table."];
class_dictionary3_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Dictionary category 3' table."];
class_dictionary3_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Dictionary category 3' table, regardless of their owner."];

class_dictionary3_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Dictionary category 3' table."];
class_dictionary3_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Dictionary category 3' table."];
class_dictionary3_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Dictionary category 3' table."];
class_dictionary3_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Dictionary category 3' table."];

// class_dictionary4 table
class_dictionary4_addTip=["",spacer+"This option allows all members of the group to add records to the 'Dictionary category 4' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dictionary4_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Dictionary category 4' table."];
class_dictionary4_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Dictionary category 4' table."];
class_dictionary4_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Dictionary category 4' table."];
class_dictionary4_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Dictionary category 4' table."];

class_dictionary4_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Dictionary category 4' table."];
class_dictionary4_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Dictionary category 4' table."];
class_dictionary4_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Dictionary category 4' table."];
class_dictionary4_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Dictionary category 4' table, regardless of their owner."];

class_dictionary4_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Dictionary category 4' table."];
class_dictionary4_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Dictionary category 4' table."];
class_dictionary4_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Dictionary category 4' table."];
class_dictionary4_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Dictionary category 4' table."];

// class_dictionary5 table
class_dictionary5_addTip=["",spacer+"This option allows all members of the group to add records to the 'Dictionary category 5' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dictionary5_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Dictionary category 5' table."];
class_dictionary5_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Dictionary category 5' table."];
class_dictionary5_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Dictionary category 5' table."];
class_dictionary5_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Dictionary category 5' table."];

class_dictionary5_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Dictionary category 5' table."];
class_dictionary5_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Dictionary category 5' table."];
class_dictionary5_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Dictionary category 5' table."];
class_dictionary5_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Dictionary category 5' table, regardless of their owner."];

class_dictionary5_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Dictionary category 5' table."];
class_dictionary5_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Dictionary category 5' table."];
class_dictionary5_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Dictionary category 5' table."];
class_dictionary5_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Dictionary category 5' table."];

// assignments table
assignments_addTip=["",spacer+"This option allows all members of the group to add records to the 'Chrono events' table. A member who adds a record to the table becomes the 'owner' of that record."];

assignments_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Chrono events' table."];
assignments_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Chrono events' table."];
assignments_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Chrono events' table."];
assignments_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Chrono events' table."];

assignments_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Chrono events' table."];
assignments_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Chrono events' table."];
assignments_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Chrono events' table."];
assignments_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Chrono events' table, regardless of their owner."];

assignments_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Chrono events' table."];
assignments_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Chrono events' table."];
assignments_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Chrono events' table."];
assignments_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Chrono events' table."];

// resources table
resources_addTip=["",spacer+"This option allows all members of the group to add records to the 'Agents' table. A member who adds a record to the table becomes the 'owner' of that record."];

resources_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Agents' table."];
resources_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Agents' table."];
resources_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Agents' table."];
resources_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Agents' table."];

resources_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Agents' table."];
resources_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Agents' table."];
resources_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Agents' table."];
resources_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Agents' table, regardless of their owner."];

resources_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Agents' table."];
resources_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Agents' table."];
resources_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Agents' table."];
resources_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Agents' table."];

// projects table
projects_addTip=["",spacer+"This option allows all members of the group to add records to the 'Chronologies' table. A member who adds a record to the table becomes the 'owner' of that record."];

projects_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Chronologies' table."];
projects_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Chronologies' table."];
projects_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Chronologies' table."];
projects_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Chronologies' table."];

projects_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Chronologies' table."];
projects_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Chronologies' table."];
projects_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Chronologies' table."];
projects_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Chronologies' table, regardless of their owner."];

projects_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Chronologies' table."];
projects_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Chronologies' table."];
projects_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Chronologies' table."];
projects_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Chronologies' table."];

// gallery_authors table
gallery_authors_addTip=["",spacer+"This option allows all members of the group to add records to the 'Gallery authors' table. A member who adds a record to the table becomes the 'owner' of that record."];

gallery_authors_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Gallery authors' table."];
gallery_authors_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Gallery authors' table."];
gallery_authors_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Gallery authors' table."];
gallery_authors_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Gallery authors' table."];

gallery_authors_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Gallery authors' table."];
gallery_authors_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Gallery authors' table."];
gallery_authors_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Gallery authors' table."];
gallery_authors_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Gallery authors' table, regardless of their owner."];

gallery_authors_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Gallery authors' table."];
gallery_authors_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Gallery authors' table."];
gallery_authors_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Gallery authors' table."];
gallery_authors_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Gallery authors' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
