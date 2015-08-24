<?php
// This script and data application were generated by AppGini 5.40
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");

	header("Content-type: text/javascript; charset=UTF-8");

	$mfk=$_GET['mfk'];
	$id=makeSafe($_GET['id']);
	$rnd1=intval($_GET['rnd1']); if(!$rnd1) $rnd1='';

	if(!$mfk){
		die('// no js code available!');
	}

	switch($mfk){

		case 'storyweaving_scene_no':
			if(!$id){
				?>
				$('storyweaving_scene<?php echo $rnd1; ?>').innerHTML='&nbsp;';
				$('storyweaving_sequence<?php echo $rnd1; ?>').innerHTML='&nbsp;';
				$('storyweaving_theme<?php echo $rnd1; ?>').innerHTML='&nbsp;';
				<?php
				break;
			}
			$res = sql("SELECT `storyweaving_scenes`.`id` as 'id', `storyweaving_scenes`.`weaving_no` as 'weaving_no', IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, '  ', `story1`.`story`), '') as 'story', `storyweaving_scenes`.`step` as 'step', IF(    CHAR_LENGTH(`class_dramatica_throughline1`.`throughline`), CONCAT_WS('',   `class_dramatica_throughline1`.`throughline`), '') as 'throughline', IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') as 'domain', IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') as 'concern', `storyweaving_scenes`.`sequence` as 'sequence', IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') as 'issue', IF(    CHAR_LENGTH(`class_dramatica_themes1`.`theme`), CONCAT_WS('',   `class_dramatica_themes1`.`theme`), '') as 'theme' FROM `storyweaving_scenes` LEFT JOIN `story` as story1 ON `story1`.`id`=`storyweaving_scenes`.`story` LEFT JOIN `class_dramatica_throughline` as class_dramatica_throughline1 ON `class_dramatica_throughline1`.`id`=`storyweaving_scenes`.`throughline` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`storyweaving_scenes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`storyweaving_scenes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`storyweaving_scenes`.`issue` LEFT JOIN `class_dramatica_themes` as class_dramatica_themes1 ON `class_dramatica_themes1`.`id`=`storyweaving_scenes`.`theme`  WHERE `storyweaving_scenes`.`id`='$id' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$('storyweaving_scene<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['step'].'  '.$row['throughline']))); ?>&nbsp;';
			$('storyweaving_sequence<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['sequence']))); ?>&nbsp;';
			$('storyweaving_theme<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['issue'].' - '.$row['theme']))); ?>&nbsp;';
			<?php
			break;

		case 'characterevent_scene':
			if(!$id){
				?>
				$('character_event<?php echo $rnd1; ?>').innerHTML='&nbsp;';
				<?php
				break;
			}
			$res = sql("SELECT `code_encounters`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`memberID`), '') as 'agentA', IF(    CHAR_LENGTH(`biblio_author2`.`memberID`), CONCAT_WS('',   `biblio_author2`.`memberID`), '') as 'authorA', IF(    CHAR_LENGTH(`biblio_doc1`.`id`) || CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`id`, '  ', `biblio_doc1`.`title`), '') as 'bibliographyA', IF(    CHAR_LENGTH(`biblio_trascript1`.`trascriber_memberID`) || CHAR_LENGTH(`biblio_trascript1`.`transcript_title`), CONCAT_WS('',   `biblio_trascript1`.`trascriber_memberID`, ' - ', `biblio_trascript1`.`transcript_title`), '') as 'transcriptA', IF(    CHAR_LENGTH(`biblio_token1`.`token_sequence`) || CHAR_LENGTH(`biblio_token1`.`token`), CONCAT_WS('',   `biblio_token1`.`token_sequence`, '  ', `biblio_token1`.`token`), '') as 'tokenA', IF(    CHAR_LENGTH(`code_encounter_scenes1`.`scene`), CONCAT_WS('',   `code_encounter_scenes1`.`scene`), '') as 'sceneA', IF(    CHAR_LENGTH(`biblio_author3`.`memberID`), CONCAT_WS('',   `biblio_author3`.`memberID`), '') as 'agentB', IF(    CHAR_LENGTH(`biblio_author4`.`memberID`), CONCAT_WS('',   `biblio_author4`.`memberID`), '') as 'authorB', IF(    CHAR_LENGTH(`biblio_doc2`.`id`) || CHAR_LENGTH(`biblio_doc2`.`title`), CONCAT_WS('',   `biblio_doc2`.`id`, '  ', `biblio_doc2`.`title`), '') as 'bibliographyB', IF(    CHAR_LENGTH(`biblio_trascript2`.`trascriber_memberID`) || CHAR_LENGTH(`biblio_trascript2`.`transcript_title`), CONCAT_WS('',   `biblio_trascript2`.`trascriber_memberID`, ' - ', `biblio_trascript2`.`transcript_title`), '') as 'transcriptB', IF(    CHAR_LENGTH(`biblio_token2`.`id`) || CHAR_LENGTH(`biblio_token2`.`token`), CONCAT_WS('',   `biblio_token2`.`id`, '  ', `biblio_token2`.`token`), '') as 'tokenB', IF(    CHAR_LENGTH(`code_encounter_scenes2`.`scene`), CONCAT_WS('',   `code_encounter_scenes2`.`scene`, '  '), '') as 'sceneB', `code_encounters`.`type` as 'type', `code_encounters`.`conflicttype` as 'conflicttype', IF(    CHAR_LENGTH(`code_encounter_scenes3`.`scene`), CONCAT_WS('',   `code_encounter_scenes3`.`scene`), '') as 'story_scene', `code_encounters`.`nd_color` as 'nd_color', `code_encounters`.`nd_width` as 'nd_width', `code_encounters`.`nd_style` as 'nd_style', `code_encounters`.`nd_opacity` as 'nd_opacity', `code_encounters`.`nd_visibility` as 'nd_visibility', `code_encounters`.`lbl_lable` as 'lbl_lable', `code_encounters`.`lbl_color` as 'lbl_color', `code_encounters`.`lbl_size` as 'lbl_size' FROM `code_encounters` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`code_encounters`.`agentA` LEFT JOIN `biblio_author` as biblio_author2 ON `biblio_author2`.`id`=`code_encounters`.`authorA` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`code_encounters`.`bibliographyA` LEFT JOIN `biblio_trascript` as biblio_trascript1 ON `biblio_trascript1`.`id`=`code_encounters`.`transcriptA` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`code_encounters`.`tokenA` LEFT JOIN `code_encounter_scenes` as code_encounter_scenes1 ON `code_encounter_scenes1`.`id`=`code_encounters`.`sceneA` LEFT JOIN `biblio_author` as biblio_author3 ON `biblio_author3`.`id`=`code_encounters`.`agentB` LEFT JOIN `biblio_author` as biblio_author4 ON `biblio_author4`.`id`=`code_encounters`.`authorB` LEFT JOIN `biblio_doc` as biblio_doc2 ON `biblio_doc2`.`id`=`code_encounters`.`bibliographyB` LEFT JOIN `biblio_trascript` as biblio_trascript2 ON `biblio_trascript2`.`id`=`code_encounters`.`transcriptB` LEFT JOIN `biblio_token` as biblio_token2 ON `biblio_token2`.`id`=`code_encounters`.`tokenB` LEFT JOIN `code_encounter_scenes` as code_encounter_scenes2 ON `code_encounter_scenes2`.`id`=`code_encounters`.`sceneB` LEFT JOIN `code_encounter_scenes` as code_encounter_scenes3 ON `code_encounter_scenes3`.`id`=`code_encounters`.`story_scene`  WHERE `code_encounters`.`id`='$id' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$('character_event<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['sceneA'].'|- - - - - - - - - - | '.$row['sceneB']))); ?>&nbsp;';
			<?php
			break;


	}

?>