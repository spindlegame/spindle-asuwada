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

// biblio_community table
biblio_community_addTip=["",spacer+"This option allows all members of the group to add records to the 'I.1. Communities' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_community_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'I.1. Communities' table."];
biblio_community_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'I.1. Communities' table."];
biblio_community_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'I.1. Communities' table."];
biblio_community_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'I.1. Communities' table."];

biblio_community_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'I.1. Communities' table."];
biblio_community_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'I.1. Communities' table."];
biblio_community_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'I.1. Communities' table."];
biblio_community_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'I.1. Communities' table, regardless of their owner."];

biblio_community_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'I.1. Communities' table."];
biblio_community_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'I.1. Communities' table."];
biblio_community_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'I.1. Communities' table."];
biblio_community_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'I.1. Communities' table."];

// biblio_author table
biblio_author_addTip=["",spacer+"This option allows all members of the group to add records to the 'I.2. Authors' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_author_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'I.2. Authors' table."];
biblio_author_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'I.2. Authors' table."];
biblio_author_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'I.2. Authors' table."];
biblio_author_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'I.2. Authors' table."];

biblio_author_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'I.2. Authors' table."];
biblio_author_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'I.2. Authors' table."];
biblio_author_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'I.2. Authors' table."];
biblio_author_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'I.2. Authors' table, regardless of their owner."];

biblio_author_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'I.2. Authors' table."];
biblio_author_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'I.2. Authors' table."];
biblio_author_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'I.2. Authors' table."];
biblio_author_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'I.2. Authors' table."];

// biblio_doc table
biblio_doc_addTip=["",spacer+"This option allows all members of the group to add records to the 'I.3. Corpus' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_doc_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'I.3. Corpus' table."];
biblio_doc_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'I.3. Corpus' table."];
biblio_doc_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'I.3. Corpus' table."];
biblio_doc_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'I.3. Corpus' table."];

biblio_doc_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'I.3. Corpus' table."];
biblio_doc_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'I.3. Corpus' table."];
biblio_doc_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'I.3. Corpus' table."];
biblio_doc_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'I.3. Corpus' table, regardless of their owner."];

biblio_doc_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'I.3. Corpus' table."];
biblio_doc_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'I.3. Corpus' table."];
biblio_doc_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'I.3. Corpus' table."];
biblio_doc_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'I.3. Corpus' table."];

// biblio_transcript table
biblio_transcript_addTip=["",spacer+"This option allows all members of the group to add records to the 'II.1. Transcripts' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_transcript_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'II.1. Transcripts' table."];
biblio_transcript_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'II.1. Transcripts' table."];
biblio_transcript_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'II.1. Transcripts' table."];
biblio_transcript_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'II.1. Transcripts' table."];

biblio_transcript_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'II.1. Transcripts' table."];
biblio_transcript_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'II.1. Transcripts' table."];
biblio_transcript_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'II.1. Transcripts' table."];
biblio_transcript_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'II.1. Transcripts' table, regardless of their owner."];

biblio_transcript_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'II.1. Transcripts' table."];
biblio_transcript_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'II.1. Transcripts' table."];
biblio_transcript_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'II.1. Transcripts' table."];
biblio_transcript_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'II.1. Transcripts' table."];

// biblio_token table
biblio_token_addTip=["",spacer+"This option allows all members of the group to add records to the 'II.2. Tokens' table. A member who adds a record to the table becomes the 'owner' of that record."];

biblio_token_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'II.2. Tokens' table."];
biblio_token_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'II.2. Tokens' table."];
biblio_token_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'II.2. Tokens' table."];
biblio_token_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'II.2. Tokens' table."];

biblio_token_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'II.2. Tokens' table."];
biblio_token_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'II.2. Tokens' table."];
biblio_token_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'II.2. Tokens' table."];
biblio_token_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'II.2. Tokens' table, regardless of their owner."];

biblio_token_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'II.2. Tokens' table."];
biblio_token_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'II.2. Tokens' table."];
biblio_token_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'II.2. Tokens' table."];
biblio_token_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'II.2. Tokens' table."];

// code_invivo table
code_invivo_addTip=["",spacer+"This option allows all members of the group to add records to the 'III.1. Invivo' table. A member who adds a record to the table becomes the 'owner' of that record."];

code_invivo_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'III.1. Invivo' table."];
code_invivo_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'III.1. Invivo' table."];
code_invivo_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'III.1. Invivo' table."];
code_invivo_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'III.1. Invivo' table."];

code_invivo_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'III.1. Invivo' table."];
code_invivo_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'III.1. Invivo' table."];
code_invivo_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'III.1. Invivo' table."];
code_invivo_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'III.1. Invivo' table, regardless of their owner."];

code_invivo_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'III.1. Invivo' table."];
code_invivo_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'III.1. Invivo' table."];
code_invivo_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'III.1. Invivo' table."];
code_invivo_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'III.1. Invivo' table."];

// code_herme table
code_herme_addTip=["",spacer+"This option allows all members of the group to add records to the 'III.2. Hermeneutic' table. A member who adds a record to the table becomes the 'owner' of that record."];

code_herme_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'III.2. Hermeneutic' table."];
code_herme_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'III.2. Hermeneutic' table."];
code_herme_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'III.2. Hermeneutic' table."];
code_herme_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'III.2. Hermeneutic' table."];

code_herme_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'III.2. Hermeneutic' table."];
code_herme_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'III.2. Hermeneutic' table."];
code_herme_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'III.2. Hermeneutic' table."];
code_herme_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'III.2. Hermeneutic' table, regardless of their owner."];

code_herme_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'III.2. Hermeneutic' table."];
code_herme_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'III.2. Hermeneutic' table."];
code_herme_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'III.2. Hermeneutic' table."];
code_herme_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'III.2. Hermeneutic' table."];

// chr_dev table
chr_dev_addTip=["",spacer+"This option allows all members of the group to add records to the 'IV.1. Character Dev.' table. A member who adds a record to the table becomes the 'owner' of that record."];

chr_dev_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'IV.1. Character Dev.' table."];
chr_dev_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'IV.1. Character Dev.' table."];
chr_dev_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'IV.1. Character Dev.' table."];
chr_dev_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'IV.1. Character Dev.' table."];

chr_dev_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'IV.1. Character Dev.' table."];
chr_dev_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'IV.1. Character Dev.' table."];
chr_dev_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'IV.1. Character Dev.' table."];
chr_dev_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'IV.1. Character Dev.' table, regardless of their owner."];

chr_dev_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'IV.1. Character Dev.' table."];
chr_dev_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'IV.1. Character Dev.' table."];
chr_dev_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'IV.1. Character Dev.' table."];
chr_dev_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'IV.1. Character Dev.' table."];

// chr_scenes table
chr_scenes_addTip=["",spacer+"This option allows all members of the group to add records to the 'IV.2. Character scenes' table. A member who adds a record to the table becomes the 'owner' of that record."];

chr_scenes_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'IV.2. Character scenes' table."];
chr_scenes_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'IV.2. Character scenes' table."];
chr_scenes_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'IV.2. Character scenes' table."];
chr_scenes_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'IV.2. Character scenes' table."];

chr_scenes_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'IV.2. Character scenes' table."];
chr_scenes_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'IV.2. Character scenes' table."];
chr_scenes_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'IV.2. Character scenes' table."];
chr_scenes_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'IV.2. Character scenes' table, regardless of their owner."];

chr_scenes_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'IV.2. Character scenes' table."];
chr_scenes_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'IV.2. Character scenes' table."];
chr_scenes_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'IV.2. Character scenes' table."];
chr_scenes_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'IV.2. Character scenes' table."];

// code_encounter_scenes table
code_encounter_scenes_addTip=["",spacer+"This option allows all members of the group to add records to the 'IV.4. Encounter scenes' table. A member who adds a record to the table becomes the 'owner' of that record."];

code_encounter_scenes_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'IV.4. Encounter scenes' table."];
code_encounter_scenes_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'IV.4. Encounter scenes' table."];
code_encounter_scenes_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'IV.4. Encounter scenes' table."];
code_encounter_scenes_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'IV.4. Encounter scenes' table."];

code_encounter_scenes_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'IV.4. Encounter scenes' table."];
code_encounter_scenes_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'IV.4. Encounter scenes' table."];
code_encounter_scenes_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'IV.4. Encounter scenes' table."];
code_encounter_scenes_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'IV.4. Encounter scenes' table, regardless of their owner."];

code_encounter_scenes_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'IV.4. Encounter scenes' table."];
code_encounter_scenes_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'IV.4. Encounter scenes' table."];
code_encounter_scenes_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'IV.4. Encounter scenes' table."];
code_encounter_scenes_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'IV.4. Encounter scenes' table."];

// code_encounters table
code_encounters_addTip=["",spacer+"This option allows all members of the group to add records to the 'IV.5. Encounters' table. A member who adds a record to the table becomes the 'owner' of that record."];

code_encounters_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'IV.5. Encounters' table."];
code_encounters_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'IV.5. Encounters' table."];
code_encounters_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'IV.5. Encounters' table."];
code_encounters_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'IV.5. Encounters' table."];

code_encounters_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'IV.5. Encounters' table."];
code_encounters_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'IV.5. Encounters' table."];
code_encounters_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'IV.5. Encounters' table."];
code_encounters_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'IV.5. Encounters' table, regardless of their owner."];

code_encounters_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'IV.5. Encounters' table."];
code_encounters_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'IV.5. Encounters' table."];
code_encounters_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'IV.5. Encounters' table."];
code_encounters_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'IV.5. Encounters' table."];

// story table
story_addTip=["",spacer+"This option allows all members of the group to add records to the 'V.1. Stories' table. A member who adds a record to the table becomes the 'owner' of that record."];

story_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'V.1. Stories' table."];
story_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'V.1. Stories' table."];
story_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'V.1. Stories' table."];
story_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'V.1. Stories' table."];

story_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'V.1. Stories' table."];
story_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'V.1. Stories' table."];
story_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'V.1. Stories' table."];
story_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'V.1. Stories' table, regardless of their owner."];

story_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'V.1. Stories' table."];
story_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'V.1. Stories' table."];
story_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'V.1. Stories' table."];
story_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'V.1. Stories' table."];

// storylines table
storylines_addTip=["",spacer+"This option allows all members of the group to add records to the 'V.3. Story lines' table. A member who adds a record to the table becomes the 'owner' of that record."];

storylines_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'V.3. Story lines' table."];
storylines_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'V.3. Story lines' table."];
storylines_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'V.3. Story lines' table."];
storylines_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'V.3. Story lines' table."];

storylines_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'V.3. Story lines' table."];
storylines_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'V.3. Story lines' table."];
storylines_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'V.3. Story lines' table."];
storylines_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'V.3. Story lines' table, regardless of their owner."];

storylines_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'V.3. Story lines' table."];
storylines_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'V.3. Story lines' table."];
storylines_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'V.3. Story lines' table."];
storylines_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'V.3. Story lines' table."];

// story_chrs table
story_chrs_addTip=["",spacer+"This option allows all members of the group to add records to the 'V.2. Characters' table. A member who adds a record to the table becomes the 'owner' of that record."];

story_chrs_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'V.2. Characters' table."];
story_chrs_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'V.2. Characters' table."];
story_chrs_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'V.2. Characters' table."];
story_chrs_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'V.2. Characters' table."];

story_chrs_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'V.2. Characters' table."];
story_chrs_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'V.2. Characters' table."];
story_chrs_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'V.2. Characters' table."];
story_chrs_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'V.2. Characters' table, regardless of their owner."];

story_chrs_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'V.2. Characters' table."];
story_chrs_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'V.2. Characters' table."];
story_chrs_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'V.2. Characters' table."];
story_chrs_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'V.2. Characters' table."];

// storystatic table
storystatic_addTip=["",spacer+"This option allows all members of the group to add records to the 'VI.1. Static story points' table. A member who adds a record to the table becomes the 'owner' of that record."];

storystatic_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'VI.1. Static story points' table."];
storystatic_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'VI.1. Static story points' table."];
storystatic_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'VI.1. Static story points' table."];
storystatic_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'VI.1. Static story points' table."];

storystatic_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'VI.1. Static story points' table."];
storystatic_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'VI.1. Static story points' table."];
storystatic_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'VI.1. Static story points' table."];
storystatic_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'VI.1. Static story points' table, regardless of their owner."];

storystatic_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'VI.1. Static story points' table."];
storystatic_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'VI.1. Static story points' table."];
storystatic_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'VI.1. Static story points' table."];
storystatic_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'VI.1. Static story points' table."];

// storydynamic table
storydynamic_addTip=["",spacer+"This option allows all members of the group to add records to the 'VI.2. Dynamic story points' table. A member who adds a record to the table becomes the 'owner' of that record."];

storydynamic_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'VI.2. Dynamic story points' table."];
storydynamic_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'VI.2. Dynamic story points' table."];
storydynamic_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'VI.2. Dynamic story points' table."];
storydynamic_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'VI.2. Dynamic story points' table."];

storydynamic_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'VI.2. Dynamic story points' table."];
storydynamic_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'VI.2. Dynamic story points' table."];
storydynamic_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'VI.2. Dynamic story points' table."];
storydynamic_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'VI.2. Dynamic story points' table, regardless of their owner."];

storydynamic_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'VI.2. Dynamic story points' table."];
storydynamic_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'VI.2. Dynamic story points' table."];
storydynamic_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'VI.2. Dynamic story points' table."];
storydynamic_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'VI.2. Dynamic story points' table."];

// storyweaving_scenes table
storyweaving_scenes_addTip=["",spacer+"This option allows all members of the group to add records to the 'VI.3. Story weaving scenes' table. A member who adds a record to the table becomes the 'owner' of that record."];

storyweaving_scenes_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'VI.3. Story weaving scenes' table."];
storyweaving_scenes_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'VI.3. Story weaving scenes' table."];
storyweaving_scenes_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'VI.3. Story weaving scenes' table."];
storyweaving_scenes_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'VI.3. Story weaving scenes' table."];

storyweaving_scenes_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'VI.3. Story weaving scenes' table."];
storyweaving_scenes_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'VI.3. Story weaving scenes' table."];
storyweaving_scenes_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'VI.3. Story weaving scenes' table."];
storyweaving_scenes_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'VI.3. Story weaving scenes' table, regardless of their owner."];

storyweaving_scenes_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'VI.3. Story weaving scenes' table."];
storyweaving_scenes_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'VI.3. Story weaving scenes' table."];
storyweaving_scenes_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'VI.3. Story weaving scenes' table."];
storyweaving_scenes_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'VI.3. Story weaving scenes' table."];

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

// class_dynamicstorypoints table
class_dynamicstorypoints_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class dynamicstorypoints' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_dynamicstorypoints_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class dynamicstorypoints' table."];

class_dynamicstorypoints_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class dynamicstorypoints' table, regardless of their owner."];

class_dynamicstorypoints_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class dynamicstorypoints' table."];
class_dynamicstorypoints_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class dynamicstorypoints' table."];

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
