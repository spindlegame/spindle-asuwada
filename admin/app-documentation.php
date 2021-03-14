<?php
	$currDir = dirname(__FILE__);
	require("{$currDir}/incCommon.php");

	$GLOBALS['page_title'] = $Translation['app documentation'];
	include("{$currDir}/incHeader.php");

	$app_title = 'ASUWADA';
?>
<div class="page-header"><h1><?php echo $app_title . ' ' . $Translation['app documentation']; ?></h1></div>
<div class="row">
	<div class="col-md-3 col-lg-2" id="toc-section">
		<nav class="hidden-print hidden-xs hidden-sm affix">
			<ul class="nav">
				<li>
					<a href="#content-section"><?php echo $app_title; ?></a>
					<ul class="nav">
						<li>
							<a href="#table-game_agent">Agentes</a>
						</li>
						<li>
							<a href="#table-biblio_author">Autores</a>
						</li>
						<li>
							<a href="#table-biblio_doc">Corpus</a>
							<ul class="nav">
								<li><a href="#field-biblio_doc-type">Tipo de texto</a></li>
							</ul>
						</li>
						<li>
							<a href="#table-biblio_team">Equipos bibliogr&#225;ficos</a>
						</li>
						<li>
							<a href="#table-biblio_analyst">Bibli&#243;grafos</a>
						</li>
						<li>
							<a href="#table-bio_author">Bi&#243;grafos</a>
						</li>
						<li>
							<a href="#table-bio_story">Biograf&#237;as</a>
							<ul class="nav">
								<li><a href="#field-bio_story-author_id">ID de bi&#243;grafo</a></li>
							</ul>
						</li>
						<li>
							<a href="#table-bio_chr_dev">Desarrollo de personajes de biograf&#237;as</a>
							<ul class="nav">
								<li><a href="#field-bio_chr_dev-dp1_resolve">Punto din&#225;mico categor&#237;a 1</a></li>
								<li><a href="#field-bio_chr_dev-dp2_resolve">Punto din&#225;mico categor&#237;a 2</a></li>
								<li><a href="#field-bio_chr_dev-dp3_resolve">Punto din&#225;mico Resoluci&#243;n</a></li>
								<li><a href="#field-bio_chr_dev-dp3_growth">Punto din&#225;mico Crecimiento</a></li>
								<li><a href="#field-bio_chr_dev-dp3_approach">Punto din&#225;mico Enfoque</a></li>
								<li><a href="#field-bio_chr_dev-dp3_psstyle">Punto din&#225;mico estilo de soluci&#243;n de problemas</a></li>
							</ul>
						</li>
						<li>
							<a href="#table-bio_chr_scene">Escenas personales de la biograf&#237;a</a>
						</li>
						<li>
							<a href="#table-bio_storyline">Trama biogr&#225;fica</a>
						</li>
						<li>
							<a href="#table-bio_storystatic">Puntos est&#225;ticos de biograf&#237;a</a>
							<ul class="nav">
								<li><a href="#field-bio_storystatic-problem">Problema</a></li>
								<li><a href="#field-bio_storystatic-solution">Soluci&#243;n</a></li>
								<li><a href="#field-bio_storystatic-catalyst">Catalizador / Habilidad &#218;nica</a></li>
							</ul>
						</li>
						<li>
							<a href="#table-bio_storydynamic">Puntos din&#225;micos de biograf&#237;a</a>
							<ul class="nav">
								<li><a href="#field-bio_storydynamic-story_chr_mc">Personaje principal</a></li>
								<li><a href="#field-bio_storydynamic-mc_resolve">Resoluci&#243;n MC</a></li>
								<li><a href="#field-bio_storydynamic-story_chr_ic">Desarrollo de personaje del personaje de obst&#225;culo (IC)</a></li>
								<li><a href="#field-bio_storydynamic-dp_cat1">Punto din&#225;mico clase 1</a></li>
								<li><a href="#field-bio_storydynamic-dp_cat2">Punto din&#225;mico clase 2</a></li>
								<li><a href="#field-bio_storydynamic-dp_cat3_driver">Valor de punto din&#225;mico Conductor (Driver)</a></li>
								<li><a href="#field-bio_storydynamic-dp_cat3_limit">Valor de punto din&#225;mico L&#237;mite</a></li>
								<li><a href="#field-bio_storydynamic-dp_cat3_outcome">Valor de punto din&#225;mico Desenlace (Outcome)</a></li>
								<li><a href="#field-bio_storydynamic-dp_cat3_judgement">Valor de punto din&#225;mico Sentencia (Judgement)</a></li>
								<li><a href="#field-bio_storydynamic-os_judgement">Sentencia OS</a></li>
								<li><a href="#field-bio_storydynamic-os_goal_domain">Dominio de objetivo OS</a></li>
							</ul>
						</li>
						<li>
							<a href="#table-bio_storyweaving_scene">Escenas de Storyweaving</a>
						</li>
						<li>
							<a href="#table-hist_chr">Personajes de la historia</a>
						</li>
						<li>
							<a href="#table-hist_chr_dev">Desarrollo de personaje de hist&#243;ria</a>
							<ul class="nav">
								<li><a href="#field-hist_chr_dev-bio_story">Biograf&#237;a</a></li>
								<li><a href="#field-hist_chr_dev-dp1_resolve">Punto din&#225;mico categor&#237;a 1</a></li>
								<li><a href="#field-hist_chr_dev-dp2_resolve">Punto din&#225;mico categor&#237;a 2</a></li>
								<li><a href="#field-hist_chr_dev-dp3_resolve">Punto din&#225;mico categor&#237;a 3</a></li>
								<li><a href="#field-hist_chr_dev-dp3_growth">Punto din&#225;mico Crecimiento</a></li>
								<li><a href="#field-hist_chr_dev-dp3_approach">Punto din&#225;mico Enfoque</a></li>
								<li><a href="#field-hist_chr_dev-dp3_psstyle">Punto din&#225;mico estilo de resolver problemas</a></li>
							</ul>
						</li>
						<li>
							<a href="#table-hist_storydynamic">Puntos din&#225;micos de biograf&#237;a</a>
							<ul class="nav">
								<li><a href="#field-hist_storydynamic-story_chr_mc">Personaje biogr&#225;fico</a></li>
								<li><a href="#field-hist_storydynamic-mc_resolve">Resoluci&#243;n MC</a></li>
								<li><a href="#field-hist_storydynamic-story_chr_ic">Desarrollo de personaje del personaje de obst&#225;culo (IC)</a></li>
								<li><a href="#field-hist_storydynamic-dp_cat1">Punto din&#225;mico clase 1</a></li>
								<li><a href="#field-hist_storydynamic-dp_cat2">Punto din&#225;mico clase 2</a></li>
								<li><a href="#field-hist_storydynamic-dp_cat3_driver">Valor de punto din&#225;mico Conductor (Driver)</a></li>
								<li><a href="#field-hist_storydynamic-dp_cat3_limit">Valor de punto din&#225;mico L&#237;mite</a></li>
								<li><a href="#field-hist_storydynamic-dp_cat3_outcome">Valor de punto din&#225;mico Desenlace (Outcome)</a></li>
								<li><a href="#field-hist_storydynamic-dp_cat3_judgement">Valor de punto din&#225;mico Sentencia (Judgement)</a></li>
								<li><a href="#field-hist_storydynamic-os_judgement">Sentencia OS</a></li>
								<li><a href="#field-hist_storydynamic-os_goal_domain">Dominio de objetivo OS</a></li>
							</ul>
						</li>
						<li>
							<a href="#table-assignments">Chrono events</a>
						</li>
						<li>
							<a href="#table-resources">Agents</a>
						</li>
						<li>
							<a href="#table-projects">Chronologies</a>
						</li>
					</ul>
				</li>
			</ul>
			<a class="back-to-top" href="#content-section"><?php echo $Translation['back to top']; ?></a>
		</nav>
	</div>

	<div class="col-md-9 col-lg-8" id="content-section">
		<p class="app-documentation" id="app-title">

<p><b>Developer </b></p>
Tabea Hirzel</p>
</p>
<p><b>Introduction</b></p>
The Spindle is a PHP MYSQL application that serves to play collaborative networked storytelling games based on historiographic data. 
It was originally developed as a prototype in the course of the research <a href="https://www.academia.edu/32032532/Principles_of_Liberty_A_Design_based_Research_on_Liberty_as_A_Priori_Constitutive_Principle_of_the_Social_in_the_Swiss_Nation_Story><b>Principles of Liberty</b></a> by Dr. Tabea Hirzel. 
There are different modes of playing this game, all included in the diferent releases of Spindle. 

<p><b>Introduction</b></p>
Historiography is a highly complex research process producing important and deep rooting social phenomena.
It has the power to improve personal development and to (re)construct societies in a resilient and sustainable way.
Especially the use of scientific data (text, artefacts) in historiographic productions have a high potential of propagandistic power.
This means, that historiographic writings have a strongly manipulative effect on the mind of their audiences.
It is this effect that constructs the view of a society and even a world view.
But mostly, at the moment, most historiographers use this effect in a unconscious and subconscious way.
They claim for truth, whereas the factual truth is the most dangerous aspect within historiography.
It is the aim of this tool, to make these effects and the overall process visible.
<p>
<p><b>Current state</b></p>
This is Agile/LEAN documentation for Spindle version 2.0
Originally emerged from a set of complex entangled Excel tables, at this point, the whole code is not more than a specific CMS for historiography with a stron table logic.
</p>
<p><b>Purpose</b></p>
This tool serves to make the encoding and decoding process and the different fields of historiography visible; from text analysis towards the narrative resume of history as a historiographic or biographic narrative.
100% traceability from original text token, including all collaborators shall be achieved.
This will allow to extract information for statistical calculations in historiography, such as the percentage of own words and original terms used by a historiographer, gender or ethnic bias, geographical extension and geocoded word uses.
</p>
<p><b>Goal</b></p>
The aim is to develop this into a seamless code that can run in the background of many different applications used within current history writing; reaching from social media and blogs, videoblogs, over official archives, legal and civil registers, historiographic productions such as books, films and teaching resources, towards open world video games such as LoL, Second Life, OpenSim, Minecraft, Robblox, etc.


		</p>

		<h2 class="table-documentation" id="table-game_agent">Agentes</h2>
		<p class="table-documentation">

<p><b>To do</p></b>
For the naming of tables and fields the standards as defined by LOV Linked Open Vocabularies for Authorized Access Point (AAP) should be used.

<a href="https://lov.linkeddata.es/dataset/lov/about">LOV references</a>.



Further it has to be considered to use terms that improve compatibility with related software in order to facilitate connectivity, such as
Gramps, Voyant Tools, etc.

See also IFLA Value Vocabularies
Multilingual dictionary of cataloguing terms and concepts <a href="https://www.iflastandards.info/muldicat/">(MulDiCat)</a> and <a href="https://www.ibm.com/support/pages/how-import-genealogy-gedcom-files-analysts-notebook">IBM Import of Gedcom Data</a>.



		</p>

		<h2 class="table-documentation" id="table-biblio_author">Autores</h2>
		<p class="table-documentation">

<p><b>To do</p></b>
The whole part related to bibliography and authors is already developed in the OS Software GRAMPS, but much better.
It would be great to integrate both, or at least, use a simple Gedcom-File import function in order to populate and update these data with a database created in GRAMPS.
<p><b>Use</p></b>
This is technical information for the table biblio_author

		</p>

		<h2 class="table-documentation" id="table-biblio_doc">Corpus</h2>
		<p class="table-documentation">



		</p>

		<h3 class="field-documentation" id="field-biblio_doc-type">Tipo de texto</h3>
		<p class="field-documentation">

<p><b>Integration</p></b>
The goal is to integrate these data with Zotero and Mendeley database file-formats, either through an export-import function or direct crawling of data.

		</p>
		<h2 class="table-documentation" id="table-biblio_team">Equipos bibliogr&#225;ficos</h2>
		<p class="table-documentation">

<p><b>To do</p></b>The whole concept of teams and team members (authors/analysts) might be redundant with the user groups system.
This is something to reconsider.

		</p>

		<h2 class="table-documentation" id="table-biblio_analyst">Bibli&#243;grafos</h2>
		<p class="table-documentation">

<p><b>Note</b></p>Only writers of biographical bibliography should appear here.
I copied the whole agent table over, for reasons of simplicity, which would not be correct in real game play.

		</p>

		<h2 class="table-documentation" id="table-bio_author">Bi&#243;grafos</h2>
		<p class="table-documentation">

<p><b>Note</b></p>Only writers of biographical bibliography should appear here.
I copied the whole agent table over, for reasons of simplicity, which would not be correct in real game play.

		</p>

		<h2 class="table-documentation" id="table-bio_story">Biograf&#237;as</h2>
		<p class="table-documentation">

<p><b>Change log</>
In former version biographies and historiographies were represented in one table and differentiated by attributes in colomns such as genre or tags.</p>
<p><b>Purpose</>
On of the important functions of the biography table is to combine the tokens of different bibliographic sources within one biographical writing.</p>
<p><b>Relations</>
One of the critical relations is between the different actors around a biography: biography author, authors of sources used in the biography, the characters appearing in the biography (including the protagonist), the analyst of the biography, etc.</p>


		</p>

		<h3 class="field-documentation" id="field-bio_story-author_id">ID de bi&#243;grafo</h3>
		<p class="field-documentation">

By analysing text corpus related to other persons, we automatically rewrite their live story again, by setting in context and higlighting what we understand.
Each act of analysing is always simultaneously an act of narrative production.
This is one of the major challenges in database relations in here.

		</p>
		<h2 class="table-documentation" id="table-bio_chr_dev">Desarrollo de personajes de biograf&#237;as</h2>
		<p class="table-documentation">

In Version 1.0, this table was intended for a more extend psychoanalytical encoding.
Meanwhile, it was also maintained for the free encoding of characters, based on their authentic bibliography, independent from their relation to their role within a biography or historiography.
The relational logic is still not mature.
In version 1.0, the different dynamic storypoints from Dramatica were programmed as option lists in text format and not as lookup fields related to other tables.
For this purpose a set of 4 class tables for Dramatica points were added with the hope to be able to constrain the whole choice making according to the internal logic of Dramatica in future development.
This part is still not mature.

		</p>

		<h3 class="field-documentation" id="field-bio_chr_dev-dp1_resolve">Punto din&#225;mico categor&#237;a 1</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-bio_chr_dev-dp2_resolve">Punto din&#225;mico categor&#237;a 2</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-bio_chr_dev-dp3_resolve">Punto din&#225;mico Resoluci&#243;n</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-bio_chr_dev-dp3_growth">Punto din&#225;mico Crecimiento</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-bio_chr_dev-dp3_approach">Punto din&#225;mico Enfoque</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-bio_chr_dev-dp3_psstyle">Punto din&#225;mico estilo de soluci&#243;n de problemas</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h2 class="table-documentation" id="table-bio_chr_scene">Escenas personales de la biograf&#237;a</h2>
		<p class="table-documentation">

<p><b>Open question</p></b>
It is not fully clear if Character scenes and Storylines'd be better separate tables or merged into one.

		</p>

		<h2 class="table-documentation" id="table-bio_storyline">Trama biogr&#225;fica</h2>
		<p class="table-documentation">

<p><b>Integration</p></b>
You can make a timeline by downloading this tables as csv and using this <a href="https://timeline.knightlab.com/">Timeline Tool</a>.
But it would be desirable to have such a tool directly integrated, as a java script, for example.

		</p>

		<h2 class="table-documentation" id="table-bio_storystatic">Puntos est&#225;ticos de biograf&#237;a</h2>
		<p class="table-documentation">



		</p>

		<h3 class="field-documentation" id="field-bio_storystatic-problem">Problema</h3>
		<p class="field-documentation">

<p><b>Bug</p></b> 
The fields Problem and Solution seem not to encoded correctly.

		</p>
		<h3 class="field-documentation" id="field-bio_storystatic-solution">Soluci&#243;n</h3>
		<p class="field-documentation">

<p><b>Field Filters</p></b>
This field is filtered by Throughline and Concern, but not by Issue.
Otherwise, it constrains the possibilities for ICT and RST too much.

		</p>
		<h3 class="field-documentation" id="field-bio_storystatic-catalyst">Catalizador / Habilidad &#218;nica</h3>
		<p class="field-documentation">

This appears to be multiplied by 4 for some reason (in each concenr?), do to lack in filtering.
The reason is that I do not really know how to filter it correctly.

		</p>
		<h2 class="table-documentation" id="table-bio_storydynamic">Puntos din&#225;micos de biograf&#237;a</h2>
		<p class="table-documentation">



		</p>

		<h3 class="field-documentation" id="field-bio_storydynamic-story_chr_mc">Personaje principal</h3>
		<p class="field-documentation">

<p><b>To do</p></b>
It would be great to calculate this field automatically from the static storypoints.

		</p>
		<h3 class="field-documentation" id="field-bio_storydynamic-mc_resolve">Resoluci&#243;n MC</h3>
		<p class="field-documentation">

<p><b>Important</p></b>
There can be no direct dependency from the story, only from the story_chr_mc.
Otherwise, the right value cannot be selected.

		</p>
		<h3 class="field-documentation" id="field-bio_storydynamic-story_chr_ic">Desarrollo de personaje del personaje de obst&#225;culo (IC)</h3>
		<p class="field-documentation">

<p><b>To do</p></b>
It would be great to calculate this field automatically from the static storypoints.

		</p>
		<h3 class="field-documentation" id="field-bio_storydynamic-dp_cat1">Punto din&#225;mico clase 1</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-bio_storydynamic-dp_cat2">Punto din&#225;mico clase 2</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-bio_storydynamic-dp_cat3_driver">Valor de punto din&#225;mico Conductor (Driver)</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-bio_storydynamic-dp_cat3_limit">Valor de punto din&#225;mico L&#237;mite</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-bio_storydynamic-dp_cat3_outcome">Valor de punto din&#225;mico Desenlace (Outcome)</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-bio_storydynamic-dp_cat3_judgement">Valor de punto din&#225;mico Sentencia (Judgement)</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-bio_storydynamic-os_judgement">Sentencia OS</h3>
		<p class="field-documentation">

<p><b>To do</p></b>
The PHP encoding must be done manuelly.

		</p>
		<h3 class="field-documentation" id="field-bio_storydynamic-os_goal_domain">Dominio de objetivo OS</h3>
		<p class="field-documentation">

<p><b>Bug</p></b>
This field seems NOT to be filtered in the right way according to Dramatica.
Review!

		</p>
		<h2 class="table-documentation" id="table-bio_storyweaving_scene">Escenas de Storyweaving</h2>
		<p class="table-documentation">

<p><b>To do</p></b>
Each Signpost is a Quad distributed among the 4 Storyligns. This has still to be filtered in a better way, to create the right constraints and calculate the remaining options possible.
This table needs a specifically defined UI to be really meaningful.

		</p>

		<h2 class="table-documentation" id="table-hist_chr">Personajes de la historia</h2>
		<p class="table-documentation">

One of the central issues is to decide the right amount and type of constraints.
Characters should be developed by a team. And they should depend on a set of biographical writings.
But this should be a n-n relationship. And the writings must not be created by the same who develope the characters.

		</p>

		<h2 class="table-documentation" id="table-hist_chr_dev">Desarrollo de personaje de hist&#243;ria</h2>
		<p class="table-documentation">

<p><b>Game logic</p></b>
In Version 1.0, this table was intended for a more extend psychoanalytical encoding.
Meanwhile, it was also maintained for the free encoding of characters, based on their authentic bibliography, independent from their relation to their role within a biography or historiography.
The relational logic is still not mature.
In version 1.0, the different dynamic storypoints from Dramatica were programmed as option lists in text format and not as lookup fields related to other tables.
For this purpose a set of 4 class tables for Dramatica points were added with the hope to be able to constrain the whole choice making according to the internal logic of Dramatica in future development.
This part is still not mature.

<p><b>Encoding</p></b>
Arguably, characters could be encoded just once as biographical characters, and reused for the construction of the nation story.
The aim in this game is to keep the character development on the biographical level tight to the self-expression of authors in autobiographical writings and to abstain as much as possible from secondary literature for their incoding.
Whereas for historiographic writings, these autobiographies are blended with the evaluation of contemporaries and additional information from secondary literature.
As such, not only historiographic writings belong to a higher level of abstraction, also the characters used in them are futher abstractions from characters in biographical writings.

		</p>

		<h3 class="field-documentation" id="field-hist_chr_dev-bio_story">Biograf&#237;a</h3>
		<p class="field-documentation">

<p><b>Encoding</p></b>
Agents are only dependend to a history, but not a biography.
The reason is that all characters are developed specifically for one history and only one.
But the views expressed in different biographical writings and their analyses can be merge together.

		</p>
		<h3 class="field-documentation" id="field-hist_chr_dev-dp1_resolve">Punto din&#225;mico categor&#237;a 1</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-hist_chr_dev-dp2_resolve">Punto din&#225;mico categor&#237;a 2</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-hist_chr_dev-dp3_resolve">Punto din&#225;mico categor&#237;a 3</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-hist_chr_dev-dp3_growth">Punto din&#225;mico Crecimiento</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-hist_chr_dev-dp3_approach">Punto din&#225;mico Enfoque</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-hist_chr_dev-dp3_psstyle">Punto din&#225;mico estilo de resolver problemas</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h2 class="table-documentation" id="table-hist_storydynamic">Puntos din&#225;micos de biograf&#237;a</h2>
		<p class="table-documentation">



		</p>

		<h3 class="field-documentation" id="field-hist_storydynamic-story_chr_mc">Personaje biogr&#225;fico</h3>
		<p class="field-documentation">

<p><b>To do</p></b>
It would be great to calculate this field automatically from the static storypoints.

		</p>
		<h3 class="field-documentation" id="field-hist_storydynamic-mc_resolve">Resoluci&#243;n MC</h3>
		<p class="field-documentation">

<p><b>Important</p></b>
There can be no direct dependency from the story, only from the story_chr_mc.
Otherwise, the right value cannot be selected.

		</p>
		<h3 class="field-documentation" id="field-hist_storydynamic-story_chr_ic">Desarrollo de personaje del personaje de obst&#225;culo (IC)</h3>
		<p class="field-documentation">

<p><b>To do</p></b>
It would be great to calculate this field automatically from the static storypoints.

		</p>
		<h3 class="field-documentation" id="field-hist_storydynamic-dp_cat1">Punto din&#225;mico clase 1</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-hist_storydynamic-dp_cat2">Punto din&#225;mico clase 2</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-hist_storydynamic-dp_cat3_driver">Valor de punto din&#225;mico Conductor (Driver)</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-hist_storydynamic-dp_cat3_limit">Valor de punto din&#225;mico L&#237;mite</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-hist_storydynamic-dp_cat3_outcome">Valor de punto din&#225;mico Desenlace (Outcome)</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-hist_storydynamic-dp_cat3_judgement">Valor de punto din&#225;mico Sentencia (Judgement)</h3>
		<p class="field-documentation">

This field should be hidden and calculated automatically.

		</p>
		<h3 class="field-documentation" id="field-hist_storydynamic-os_judgement">Sentencia OS</h3>
		<p class="field-documentation">

<p><b>To do</p></b>
The PHP encoding must be done manuelly.

		</p>
		<h3 class="field-documentation" id="field-hist_storydynamic-os_goal_domain">Dominio de objetivo OS</h3>
		<p class="field-documentation">

<p><b>Bug</p></b>
This field seems NOT to be filtered in the right way according to Dramatica.
Review!

		</p>
		<h2 class="table-documentation" id="table-assignments">Chrono events</h2>
		<p class="table-documentation">

<p><b>Use</p></b>
This table is based on the Ruviewer "assignemnts" table from the Ruviewer App.
<p><b>To do</p></b>
The assignments table should be merged into the invivo_code table.

		</p>

		<h2 class="table-documentation" id="table-resources">Agents</h2>
		<p class="table-documentation">

<p><b>Bug</p></b>
The resource table should be merged into the authors table.
In the grid view ID instead of Names are shown.
This must be forked.

		</p>

		<h2 class="table-documentation" id="table-projects">Chronologies</h2>
		<p class="table-documentation">

<p><b>Use</p></b>
Shows the time period for a community that should be analyzed.

<p><b>To do</p></b>
This table could either be merged into the communities table, or even better, be added as a subcategory for the communities.
<p></p>
Structure:<p></p>
<p>1. Community</p>
<p>2. Community >> Period</p>

		</p>

	</div>
</div>

<style>
	body { position: relative; }
	#toc-section ul.nav:nth-child(2) {
		margin-left: 1.5em;
	}
	#content-section { border-left: 1px dotted #ddd; padding-top: 6em; }
	h2.table-documentation, h3.field-documentation { padding-top: 3em; }
	#toc-section li.active { font-weight: bold; }
	#toc-section li:not(.active) { font-weight: normal; }
</style>

<script>
	$j(function() {
		$j('body').scrollspy({ target: '#toc-section', offset: 80 });
	})
</script>

<?php
	include("{$currDir}/incFooter.php");
