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
game_agent_addTip=["",spacer+"This option allows all members of the group to add records to the 'Game Agents' table. A member who adds a record to the table becomes the 'owner' of that record."];

game_agent_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Game Agents' table."];
game_agent_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Game Agents' table."];
game_agent_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Game Agents' table."];
game_agent_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Game Agents' table."];

game_agent_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Game Agents' table."];
game_agent_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Game Agents' table."];
game_agent_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Game Agents' table."];
game_agent_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Game Agents' table, regardless of their owner."];

game_agent_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Game Agents' table."];
game_agent_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Game Agents' table."];
game_agent_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Game Agents' table."];
game_agent_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Game Agents' table."];

// biblio_author table
biblio_author_addTip=["",spacer+"This option allows all members of the group to add records to the 'Authors' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_author_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Authors' table."];
biblio_author_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Authors' table."];
biblio_author_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Authors' table."];
biblio_author_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Authors' table."];

biblio_author_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Authors' table."];
biblio_author_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Authors' table."];
biblio_author_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Authors' table."];
biblio_author_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Authors' table, regardless of their owner."];

biblio_author_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Authors' table."];
biblio_author_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Authors' table."];
biblio_author_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Authors' table."];
biblio_author_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Authors' table."];

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
biblio_transcript_addTip=["",spacer+"This option allows all members of the group to add records to the 'Transcripts' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_transcript_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Transcripts' table."];
biblio_transcript_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Transcripts' table."];
biblio_transcript_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Transcripts' table."];
biblio_transcript_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Transcripts' table."];

biblio_transcript_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Transcripts' table."];
biblio_transcript_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Transcripts' table."];
biblio_transcript_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Transcripts' table."];
biblio_transcript_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Transcripts' table, regardless of their owner."];

biblio_transcript_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Transcripts' table."];
biblio_transcript_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Transcripts' table."];
biblio_transcript_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Transcripts' table."];
biblio_transcript_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Transcripts' table."];

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
biblio_code_demo_addTip=["",spacer+"This option allows all members of the group to add records to the 'Demographic encoding' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_code_demo_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Demographic encoding' table."];
biblio_code_demo_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Demographic encoding' table."];
biblio_code_demo_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Demographic encoding' table."];
biblio_code_demo_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Demographic encoding' table."];

biblio_code_demo_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Demographic encoding' table."];
biblio_code_demo_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Demographic encoding' table."];
biblio_code_demo_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Demographic encoding' table."];
biblio_code_demo_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Demographic encoding' table, regardless of their owner."];

biblio_code_demo_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Demographic encoding' table."];
biblio_code_demo_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Demographic encoding' table."];
biblio_code_demo_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Demographic encoding' table."];
biblio_code_demo_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Demographic encoding' table."];

// biblio_team table
biblio_team_addTip=["",spacer+"This option allows all members of the group to add records to the 'Bibliography team' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_team_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Bibliography team' table."];
biblio_team_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Bibliography team' table."];
biblio_team_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Bibliography team' table."];
biblio_team_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Bibliography team' table."];

biblio_team_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Bibliography team' table."];
biblio_team_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Bibliography team' table."];
biblio_team_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Bibliography team' table."];
biblio_team_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Bibliography team' table, regardless of their owner."];

biblio_team_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Bibliography team' table."];
biblio_team_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Bibliography team' table."];
biblio_team_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Bibliography team' table."];
biblio_team_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Bibliography team' table."];

// biblio_analyst table
biblio_analyst_addTip=["",spacer+"This option allows all members of the group to add records to the 'Bibliography analyst' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_analyst_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Bibliography analyst' table."];
biblio_analyst_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Bibliography analyst' table."];
biblio_analyst_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Bibliography analyst' table."];
biblio_analyst_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Bibliography analyst' table."];

biblio_analyst_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Bibliography analyst' table."];
biblio_analyst_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Bibliography analyst' table."];
biblio_analyst_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Bibliography analyst' table."];
biblio_analyst_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Bibliography analyst' table, regardless of their owner."];

biblio_analyst_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Bibliography analyst' table."];
biblio_analyst_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Bibliography analyst' table."];
biblio_analyst_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Bibliography analyst' table."];
biblio_analyst_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Bibliography analyst' table."];

// bio_team table
bio_team_addTip=["",spacer+"This option allows all members of the group to add records to the 'Biography team' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_team_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Biography team' table."];
bio_team_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Biography team' table."];
bio_team_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Biography team' table."];
bio_team_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Biography team' table."];

bio_team_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Biography team' table."];
bio_team_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Biography team' table."];
bio_team_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Biography team' table."];
bio_team_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Biography team' table, regardless of their owner."];

bio_team_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Biography team' table."];
bio_team_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Biography team' table."];
bio_team_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Biography team' table."];
bio_team_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Biography team' table."];

// bio_author table
bio_author_addTip=["",spacer+"This option allows all members of the group to add records to the 'Biographers' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_author_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Biographers' table."];
bio_author_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Biographers' table."];
bio_author_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Biographers' table."];
bio_author_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Biographers' table."];

bio_author_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Biographers' table."];
bio_author_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Biographers' table."];
bio_author_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Biographers' table."];
bio_author_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Biographers' table, regardless of their owner."];

bio_author_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Biographers' table."];
bio_author_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Biographers' table."];
bio_author_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Biographers' table."];
bio_author_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Biographers' table."];

// bio_story table
bio_story_addTip=["",spacer+"This option allows all members of the group to add records to the 'Biographies' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_story_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Biographies' table."];
bio_story_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Biographies' table."];
bio_story_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Biographies' table."];
bio_story_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Biographies' table."];

bio_story_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Biographies' table."];
bio_story_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Biographies' table."];
bio_story_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Biographies' table."];
bio_story_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Biographies' table, regardless of their owner."];

bio_story_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Biographies' table."];
bio_story_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Biographies' table."];
bio_story_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Biographies' table."];
bio_story_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Biographies' table."];

// bio_chr table
bio_chr_addTip=["",spacer+"This option allows all members of the group to add records to the 'Biogr. Characters' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_chr_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Biogr. Characters' table."];
bio_chr_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Biogr. Characters' table."];
bio_chr_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Biogr. Characters' table."];
bio_chr_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Biogr. Characters' table."];

bio_chr_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Biogr. Characters' table."];
bio_chr_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Biogr. Characters' table."];
bio_chr_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Biogr. Characters' table."];
bio_chr_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Biogr. Characters' table, regardless of their owner."];

bio_chr_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Biogr. Characters' table."];
bio_chr_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Biogr. Characters' table."];
bio_chr_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Biogr. Characters' table."];
bio_chr_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Biogr. Characters' table."];

// bio_storyline table
bio_storyline_addTip=["",spacer+"This option allows all members of the group to add records to the 'Bio. storylines' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_storyline_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Bio. storylines' table."];
bio_storyline_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Bio. storylines' table."];
bio_storyline_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Bio. storylines' table."];
bio_storyline_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Bio. storylines' table."];

bio_storyline_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Bio. storylines' table."];
bio_storyline_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Bio. storylines' table."];
bio_storyline_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Bio. storylines' table."];
bio_storyline_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Bio. storylines' table, regardless of their owner."];

bio_storyline_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Bio. storylines' table."];
bio_storyline_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Bio. storylines' table."];
bio_storyline_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Bio. storylines' table."];
bio_storyline_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Bio. storylines' table."];

// bio_storystatic table
bio_storystatic_addTip=["",spacer+"This option allows all members of the group to add records to the 'Bio. static storypoints' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_storystatic_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Bio. static storypoints' table."];
bio_storystatic_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Bio. static storypoints' table."];
bio_storystatic_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Bio. static storypoints' table."];
bio_storystatic_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Bio. static storypoints' table."];

bio_storystatic_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Bio. static storypoints' table."];
bio_storystatic_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Bio. static storypoints' table."];
bio_storystatic_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Bio. static storypoints' table."];
bio_storystatic_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Bio. static storypoints' table, regardless of their owner."];

bio_storystatic_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Bio. static storypoints' table."];
bio_storystatic_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Bio. static storypoints' table."];
bio_storystatic_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Bio. static storypoints' table."];
bio_storystatic_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Bio. static storypoints' table."];

// bio_storyweaving_scene table
bio_storyweaving_scene_addTip=["",spacer+"This option allows all members of the group to add records to the 'Bio. storyweaving scenes' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_storyweaving_scene_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Bio. storyweaving scenes' table."];
bio_storyweaving_scene_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Bio. storyweaving scenes' table."];
bio_storyweaving_scene_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Bio. storyweaving scenes' table."];
bio_storyweaving_scene_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Bio. storyweaving scenes' table."];

bio_storyweaving_scene_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Bio. storyweaving scenes' table."];
bio_storyweaving_scene_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Bio. storyweaving scenes' table."];
bio_storyweaving_scene_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Bio. storyweaving scenes' table."];
bio_storyweaving_scene_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Bio. storyweaving scenes' table, regardless of their owner."];

bio_storyweaving_scene_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Bio. storyweaving scenes' table."];
bio_storyweaving_scene_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Bio. storyweaving scenes' table."];
bio_storyweaving_scene_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Bio. storyweaving scenes' table."];
bio_storyweaving_scene_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Bio. storyweaving scenes' table."];

// bio_chr_scene table
bio_chr_scene_addTip=["",spacer+"This option allows all members of the group to add records to the 'Bio. character scenes' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_chr_scene_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Bio. character scenes' table."];
bio_chr_scene_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Bio. character scenes' table."];
bio_chr_scene_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Bio. character scenes' table."];
bio_chr_scene_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Bio. character scenes' table."];

bio_chr_scene_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Bio. character scenes' table."];
bio_chr_scene_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Bio. character scenes' table."];
bio_chr_scene_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Bio. character scenes' table."];
bio_chr_scene_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Bio. character scenes' table, regardless of their owner."];

bio_chr_scene_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Bio. character scenes' table."];
bio_chr_scene_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Bio. character scenes' table."];
bio_chr_scene_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Bio. character scenes' table."];
bio_chr_scene_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Bio. character scenes' table."];

// bio_chr_dev table
bio_chr_dev_addTip=["",spacer+"This option allows all members of the group to add records to the 'Bio character dev.' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_chr_dev_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Bio character dev.' table."];
bio_chr_dev_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Bio character dev.' table."];
bio_chr_dev_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Bio character dev.' table."];
bio_chr_dev_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Bio character dev.' table."];

bio_chr_dev_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Bio character dev.' table."];
bio_chr_dev_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Bio character dev.' table."];
bio_chr_dev_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Bio character dev.' table."];
bio_chr_dev_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Bio character dev.' table, regardless of their owner."];

bio_chr_dev_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Bio character dev.' table."];
bio_chr_dev_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Bio character dev.' table."];
bio_chr_dev_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Bio character dev.' table."];
bio_chr_dev_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Bio character dev.' table."];

// bio_encounter table
bio_encounter_addTip=["",spacer+"This option allows all members of the group to add records to the 'Life Encounters' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_encounter_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Life Encounters' table."];
bio_encounter_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Life Encounters' table."];
bio_encounter_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Life Encounters' table."];
bio_encounter_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Life Encounters' table."];

bio_encounter_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Life Encounters' table."];
bio_encounter_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Life Encounters' table."];
bio_encounter_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Life Encounters' table."];
bio_encounter_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Life Encounters' table, regardless of their owner."];

bio_encounter_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Life Encounters' table."];
bio_encounter_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Life Encounters' table."];
bio_encounter_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Life Encounters' table."];
bio_encounter_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Life Encounters' table."];

// bio_encounter_scene table
bio_encounter_scene_addTip=["",spacer+"This option allows all members of the group to add records to the 'Bio. encounter scenes' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_encounter_scene_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Bio. encounter scenes' table."];
bio_encounter_scene_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Bio. encounter scenes' table."];
bio_encounter_scene_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Bio. encounter scenes' table."];
bio_encounter_scene_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Bio. encounter scenes' table."];

bio_encounter_scene_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Bio. encounter scenes' table."];
bio_encounter_scene_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Bio. encounter scenes' table."];
bio_encounter_scene_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Bio. encounter scenes' table."];
bio_encounter_scene_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Bio. encounter scenes' table, regardless of their owner."];

bio_encounter_scene_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Bio. encounter scenes' table."];
bio_encounter_scene_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Bio. encounter scenes' table."];
bio_encounter_scene_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Bio. encounter scenes' table."];
bio_encounter_scene_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Bio. encounter scenes' table."];

// bio_code_herme table
bio_code_herme_addTip=["",spacer+"This option allows all members of the group to add records to the 'Hermeneutic' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_code_herme_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Hermeneutic' table."];
bio_code_herme_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Hermeneutic' table."];
bio_code_herme_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Hermeneutic' table."];
bio_code_herme_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Hermeneutic' table."];

bio_code_herme_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Hermeneutic' table."];
bio_code_herme_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Hermeneutic' table."];
bio_code_herme_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Hermeneutic' table."];
bio_code_herme_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Hermeneutic' table, regardless of their owner."];

bio_code_herme_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Hermeneutic' table."];
bio_code_herme_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Hermeneutic' table."];
bio_code_herme_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Hermeneutic' table."];
bio_code_herme_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Hermeneutic' table."];

// bio_storydynamic table
bio_storydynamic_addTip=["",spacer+"This option allows all members of the group to add records to the 'Bio dynamic storypoints' table. A member who adds a record to the table becomes the 'owner' of that record."];

bio_storydynamic_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Bio dynamic storypoints' table."];
bio_storydynamic_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Bio dynamic storypoints' table."];
bio_storydynamic_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Bio dynamic storypoints' table."];
bio_storydynamic_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Bio dynamic storypoints' table."];

bio_storydynamic_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Bio dynamic storypoints' table."];
bio_storydynamic_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Bio dynamic storypoints' table."];
bio_storydynamic_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Bio dynamic storypoints' table."];
bio_storydynamic_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Bio dynamic storypoints' table, regardless of their owner."];

bio_storydynamic_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Bio dynamic storypoints' table."];
bio_storydynamic_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Bio dynamic storypoints' table."];
bio_storydynamic_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Bio dynamic storypoints' table."];
bio_storydynamic_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Bio dynamic storypoints' table."];

// hist_author table
hist_author_addTip=["",spacer+"This option allows all members of the group to add records to the 'Historiographers' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_author_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Historiographers' table."];
hist_author_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Historiographers' table."];
hist_author_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Historiographers' table."];
hist_author_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Historiographers' table."];

hist_author_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Historiographers' table."];
hist_author_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Historiographers' table."];
hist_author_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Historiographers' table."];
hist_author_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Historiographers' table, regardless of their owner."];

hist_author_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Historiographers' table."];
hist_author_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Historiographers' table."];
hist_author_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Historiographers' table."];
hist_author_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Historiographers' table."];

// hist_team table
hist_team_addTip=["",spacer+"This option allows all members of the group to add records to the 'History Teams' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_team_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'History Teams' table."];
hist_team_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'History Teams' table."];
hist_team_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'History Teams' table."];
hist_team_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'History Teams' table."];

hist_team_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'History Teams' table."];
hist_team_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'History Teams' table."];
hist_team_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'History Teams' table."];
hist_team_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'History Teams' table, regardless of their owner."];

hist_team_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'History Teams' table."];
hist_team_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'History Teams' table."];
hist_team_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'History Teams' table."];
hist_team_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'History Teams' table."];

// hist_story table
hist_story_addTip=["",spacer+"This option allows all members of the group to add records to the 'Nation story' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_story_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Nation story' table."];
hist_story_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Nation story' table."];
hist_story_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Nation story' table."];
hist_story_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Nation story' table."];

hist_story_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Nation story' table."];
hist_story_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Nation story' table."];
hist_story_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Nation story' table."];
hist_story_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Nation story' table, regardless of their owner."];

hist_story_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Nation story' table."];
hist_story_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Nation story' table."];
hist_story_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Nation story' table."];
hist_story_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Nation story' table."];

// hist_chr table
hist_chr_addTip=["",spacer+"This option allows all members of the group to add records to the 'History characters' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_chr_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'History characters' table."];
hist_chr_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'History characters' table."];
hist_chr_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'History characters' table."];
hist_chr_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'History characters' table."];

hist_chr_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'History characters' table."];
hist_chr_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'History characters' table."];
hist_chr_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'History characters' table."];
hist_chr_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'History characters' table, regardless of their owner."];

hist_chr_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'History characters' table."];
hist_chr_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'History characters' table."];
hist_chr_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'History characters' table."];
hist_chr_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'History characters' table."];

// hist_chr_dev table
hist_chr_dev_addTip=["",spacer+"This option allows all members of the group to add records to the 'Hist. character dev.' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_chr_dev_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Hist. character dev.' table."];
hist_chr_dev_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Hist. character dev.' table."];
hist_chr_dev_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Hist. character dev.' table."];
hist_chr_dev_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Hist. character dev.' table."];

hist_chr_dev_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Hist. character dev.' table."];
hist_chr_dev_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Hist. character dev.' table."];
hist_chr_dev_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Hist. character dev.' table."];
hist_chr_dev_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Hist. character dev.' table, regardless of their owner."];

hist_chr_dev_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Hist. character dev.' table."];
hist_chr_dev_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Hist. character dev.' table."];
hist_chr_dev_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Hist. character dev.' table."];
hist_chr_dev_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Hist. character dev.' table."];

// hist_chr_scene table
hist_chr_scene_addTip=["",spacer+"This option allows all members of the group to add records to the 'Historical character scenes' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_chr_scene_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Historical character scenes' table."];
hist_chr_scene_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Historical character scenes' table."];
hist_chr_scene_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Historical character scenes' table."];
hist_chr_scene_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Historical character scenes' table."];

hist_chr_scene_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Historical character scenes' table."];
hist_chr_scene_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Historical character scenes' table."];
hist_chr_scene_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Historical character scenes' table."];
hist_chr_scene_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Historical character scenes' table, regardless of their owner."];

hist_chr_scene_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Historical character scenes' table."];
hist_chr_scene_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Historical character scenes' table."];
hist_chr_scene_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Historical character scenes' table."];
hist_chr_scene_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Historical character scenes' table."];

// hist_storyline table
hist_storyline_addTip=["",spacer+"This option allows all members of the group to add records to the 'History storylines' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_storyline_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'History storylines' table."];
hist_storyline_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'History storylines' table."];
hist_storyline_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'History storylines' table."];
hist_storyline_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'History storylines' table."];

hist_storyline_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'History storylines' table."];
hist_storyline_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'History storylines' table."];
hist_storyline_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'History storylines' table."];
hist_storyline_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'History storylines' table, regardless of their owner."];

hist_storyline_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'History storylines' table."];
hist_storyline_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'History storylines' table."];
hist_storyline_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'History storylines' table."];
hist_storyline_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'History storylines' table."];

// hist_storystatic table
hist_storystatic_addTip=["",spacer+"This option allows all members of the group to add records to the 'History static storypoints' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_storystatic_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'History static storypoints' table."];
hist_storystatic_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'History static storypoints' table."];
hist_storystatic_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'History static storypoints' table."];
hist_storystatic_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'History static storypoints' table."];

hist_storystatic_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'History static storypoints' table."];
hist_storystatic_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'History static storypoints' table."];
hist_storystatic_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'History static storypoints' table."];
hist_storystatic_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'History static storypoints' table, regardless of their owner."];

hist_storystatic_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'History static storypoints' table."];
hist_storystatic_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'History static storypoints' table."];
hist_storystatic_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'History static storypoints' table."];
hist_storystatic_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'History static storypoints' table."];

// hist_storydynamic table
hist_storydynamic_addTip=["",spacer+"This option allows all members of the group to add records to the 'Hist. dynamic storypoints' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_storydynamic_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Hist. dynamic storypoints' table."];
hist_storydynamic_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Hist. dynamic storypoints' table."];
hist_storydynamic_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Hist. dynamic storypoints' table."];
hist_storydynamic_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Hist. dynamic storypoints' table."];

hist_storydynamic_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Hist. dynamic storypoints' table."];
hist_storydynamic_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Hist. dynamic storypoints' table."];
hist_storydynamic_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Hist. dynamic storypoints' table."];
hist_storydynamic_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Hist. dynamic storypoints' table, regardless of their owner."];

hist_storydynamic_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Hist. dynamic storypoints' table."];
hist_storydynamic_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Hist. dynamic storypoints' table."];
hist_storydynamic_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Hist. dynamic storypoints' table."];
hist_storydynamic_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Hist. dynamic storypoints' table."];

// hist_storyweaving_scene table
hist_storyweaving_scene_addTip=["",spacer+"This option allows all members of the group to add records to the 'History storyweaving scenes' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_storyweaving_scene_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'History storyweaving scenes' table."];
hist_storyweaving_scene_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'History storyweaving scenes' table."];
hist_storyweaving_scene_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'History storyweaving scenes' table."];
hist_storyweaving_scene_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'History storyweaving scenes' table."];

hist_storyweaving_scene_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'History storyweaving scenes' table."];
hist_storyweaving_scene_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'History storyweaving scenes' table."];
hist_storyweaving_scene_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'History storyweaving scenes' table."];
hist_storyweaving_scene_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'History storyweaving scenes' table, regardless of their owner."];

hist_storyweaving_scene_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'History storyweaving scenes' table."];
hist_storyweaving_scene_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'History storyweaving scenes' table."];
hist_storyweaving_scene_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'History storyweaving scenes' table."];
hist_storyweaving_scene_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'History storyweaving scenes' table."];

// hist_encounter table
hist_encounter_addTip=["",spacer+"This option allows all members of the group to add records to the 'Historical events' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_encounter_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Historical events' table."];
hist_encounter_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Historical events' table."];
hist_encounter_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Historical events' table."];
hist_encounter_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Historical events' table."];

hist_encounter_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Historical events' table."];
hist_encounter_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Historical events' table."];
hist_encounter_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Historical events' table."];
hist_encounter_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Historical events' table, regardless of their owner."];

hist_encounter_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Historical events' table."];
hist_encounter_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Historical events' table."];
hist_encounter_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Historical events' table."];
hist_encounter_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Historical events' table."];

// hist_encounter_scene table
hist_encounter_scene_addTip=["",spacer+"This option allows all members of the group to add records to the 'History encounter scenes' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_encounter_scene_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'History encounter scenes' table."];
hist_encounter_scene_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'History encounter scenes' table."];
hist_encounter_scene_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'History encounter scenes' table."];
hist_encounter_scene_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'History encounter scenes' table."];

hist_encounter_scene_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'History encounter scenes' table."];
hist_encounter_scene_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'History encounter scenes' table."];
hist_encounter_scene_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'History encounter scenes' table."];
hist_encounter_scene_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'History encounter scenes' table, regardless of their owner."];

hist_encounter_scene_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'History encounter scenes' table."];
hist_encounter_scene_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'History encounter scenes' table."];
hist_encounter_scene_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'History encounter scenes' table."];
hist_encounter_scene_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'History encounter scenes' table."];

// hist_community table
hist_community_addTip=["",spacer+"This option allows all members of the group to add records to the 'Communities' table. A member who adds a record to the table becomes the 'owner' of that record."];

hist_community_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Communities' table."];
hist_community_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Communities' table."];
hist_community_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Communities' table."];
hist_community_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Communities' table."];

hist_community_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Communities' table."];
hist_community_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Communities' table."];
hist_community_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Communities' table."];
hist_community_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Communities' table, regardless of their owner."];

hist_community_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Communities' table."];
hist_community_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Communities' table."];
hist_community_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Communities' table."];
hist_community_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Communities' table."];

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
class_dramatica_character_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class dramatica character' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dramatica_character_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class dramatica character' table."];
class_dramatica_character_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class dramatica character' table."];
class_dramatica_character_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class dramatica character' table."];
class_dramatica_character_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class dramatica character' table."];

class_dramatica_character_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class dramatica character' table."];
class_dramatica_character_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class dramatica character' table."];
class_dramatica_character_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class dramatica character' table."];
class_dramatica_character_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class dramatica character' table, regardless of their owner."];

class_dramatica_character_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class dramatica character' table."];
class_dramatica_character_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class dramatica character' table."];
class_dramatica_character_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class dramatica character' table."];
class_dramatica_character_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class dramatica character' table."];

// class_dramatica_storypoints1 table
class_dramatica_storypoints1_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class dramatica storypoints 1' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dramatica_storypoints1_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class dramatica storypoints 1' table."];
class_dramatica_storypoints1_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class dramatica storypoints 1' table."];
class_dramatica_storypoints1_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class dramatica storypoints 1' table."];
class_dramatica_storypoints1_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class dramatica storypoints 1' table."];

class_dramatica_storypoints1_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class dramatica storypoints 1' table."];
class_dramatica_storypoints1_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class dramatica storypoints 1' table."];
class_dramatica_storypoints1_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class dramatica storypoints 1' table."];
class_dramatica_storypoints1_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class dramatica storypoints 1' table, regardless of their owner."];

class_dramatica_storypoints1_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class dramatica storypoints 1' table."];
class_dramatica_storypoints1_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class dramatica storypoints 1' table."];
class_dramatica_storypoints1_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class dramatica storypoints 1' table."];
class_dramatica_storypoints1_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class dramatica storypoints 1' table."];

// class_dramatica_storypoints2 table
class_dramatica_storypoints2_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class dramatica storypoints 2' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dramatica_storypoints2_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class dramatica storypoints 2' table."];
class_dramatica_storypoints2_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class dramatica storypoints 2' table."];
class_dramatica_storypoints2_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class dramatica storypoints 2' table."];
class_dramatica_storypoints2_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class dramatica storypoints 2' table."];

class_dramatica_storypoints2_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class dramatica storypoints 2' table."];
class_dramatica_storypoints2_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class dramatica storypoints 2' table."];
class_dramatica_storypoints2_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class dramatica storypoints 2' table."];
class_dramatica_storypoints2_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class dramatica storypoints 2' table, regardless of their owner."];

class_dramatica_storypoints2_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class dramatica storypoints 2' table."];
class_dramatica_storypoints2_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class dramatica storypoints 2' table."];
class_dramatica_storypoints2_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class dramatica storypoints 2' table."];
class_dramatica_storypoints2_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class dramatica storypoints 2' table."];

// class_dramatica_storypoints3 table
class_dramatica_storypoints3_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class dramatica storypoints 3' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dramatica_storypoints3_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class dramatica storypoints 3' table."];
class_dramatica_storypoints3_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class dramatica storypoints 3' table."];
class_dramatica_storypoints3_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class dramatica storypoints 3' table."];
class_dramatica_storypoints3_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class dramatica storypoints 3' table."];

class_dramatica_storypoints3_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class dramatica storypoints 3' table."];
class_dramatica_storypoints3_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class dramatica storypoints 3' table."];
class_dramatica_storypoints3_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class dramatica storypoints 3' table."];
class_dramatica_storypoints3_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class dramatica storypoints 3' table, regardless of their owner."];

class_dramatica_storypoints3_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class dramatica storypoints 3' table."];
class_dramatica_storypoints3_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class dramatica storypoints 3' table."];
class_dramatica_storypoints3_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class dramatica storypoints 3' table."];
class_dramatica_storypoints3_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class dramatica storypoints 3' table."];

// class_dynamicstorypoints4 table
class_dynamicstorypoints4_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class dynamicstorypoints' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dynamicstorypoints4_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints4_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints4_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints4_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class dynamicstorypoints' table."];

class_dynamicstorypoints4_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints4_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints4_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints4_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class dynamicstorypoints' table, regardless of their owner."];

class_dynamicstorypoints4_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints4_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints4_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints4_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class dynamicstorypoints' table."];

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
class_dictionary1_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class dictionary1' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dictionary1_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class dictionary1' table."];
class_dictionary1_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class dictionary1' table."];
class_dictionary1_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary1_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class dictionary1' table."];

class_dictionary1_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class dictionary1' table."];
class_dictionary1_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class dictionary1' table."];
class_dictionary1_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary1_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class dictionary1' table, regardless of their owner."];

class_dictionary1_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class dictionary1' table."];
class_dictionary1_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class dictionary1' table."];
class_dictionary1_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary1_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class dictionary1' table."];

// class_dictionary2 table
class_dictionary2_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class dictionary1' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dictionary2_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class dictionary1' table."];
class_dictionary2_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class dictionary1' table."];
class_dictionary2_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary2_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class dictionary1' table."];

class_dictionary2_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class dictionary1' table."];
class_dictionary2_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class dictionary1' table."];
class_dictionary2_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary2_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class dictionary1' table, regardless of their owner."];

class_dictionary2_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class dictionary1' table."];
class_dictionary2_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class dictionary1' table."];
class_dictionary2_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary2_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class dictionary1' table."];

// class_dictionary3 table
class_dictionary3_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class dictionary1' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dictionary3_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class dictionary1' table."];
class_dictionary3_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class dictionary1' table."];
class_dictionary3_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary3_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class dictionary1' table."];

class_dictionary3_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class dictionary1' table."];
class_dictionary3_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class dictionary1' table."];
class_dictionary3_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary3_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class dictionary1' table, regardless of their owner."];

class_dictionary3_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class dictionary1' table."];
class_dictionary3_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class dictionary1' table."];
class_dictionary3_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary3_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class dictionary1' table."];

// class_dictionary5 table
class_dictionary5_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class dictionary1' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dictionary5_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class dictionary1' table."];
class_dictionary5_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class dictionary1' table."];
class_dictionary5_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary5_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class dictionary1' table."];

class_dictionary5_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class dictionary1' table."];
class_dictionary5_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class dictionary1' table."];
class_dictionary5_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary5_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class dictionary1' table, regardless of their owner."];

class_dictionary5_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class dictionary1' table."];
class_dictionary5_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class dictionary1' table."];
class_dictionary5_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary5_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class dictionary1' table."];

// class_dictionary4 table
class_dictionary4_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class dictionary1' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dictionary4_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class dictionary1' table."];
class_dictionary4_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class dictionary1' table."];
class_dictionary4_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary4_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class dictionary1' table."];

class_dictionary4_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class dictionary1' table."];
class_dictionary4_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class dictionary1' table."];
class_dictionary4_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary4_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class dictionary1' table, regardless of their owner."];

class_dictionary4_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class dictionary1' table."];
class_dictionary4_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class dictionary1' table."];
class_dictionary4_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class dictionary1' table."];
class_dictionary4_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class dictionary1' table."];

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
