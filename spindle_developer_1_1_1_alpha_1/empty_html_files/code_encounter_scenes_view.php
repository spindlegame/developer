<?php
// This script and data application were generated by AppGini 5.40
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/code_encounter_scenes.php");
	include("$currDir/code_encounter_scenes_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('code_encounter_scenes');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "code_encounter_scenes";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV=array(   
		"`code_encounter_scenes`.`id`" => "id",
		"`code_encounter_scenes`.`scene`" => "scene"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`code_encounter_scenes`.`id`',
		2 => 2
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV=array(   
		"`code_encounter_scenes`.`id`" => "id",
		"`code_encounter_scenes`.`scene`" => "scene"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters=array(   
		"`code_encounter_scenes`.`id`" => "id",
		"`code_encounter_scenes`.`scene`" => "Scene"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS=array(   
		"`code_encounter_scenes`.`id`" => "id",
		"`code_encounter_scenes`.`scene`" => "scene"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array();

	$x->QueryFrom="`code_encounter_scenes` ";
	$x->QueryWhere='';
	$x->QueryOrder='';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "code_encounter_scenes_view.php";
	$x->RedirectAfterInsert = "code_encounter_scenes_view.php?SelectedID=#ID#";
	$x->TableTitle = "Encounter scenes";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`code_encounter_scenes`.`id`";

	$x->ColWidth   = array(  150);
	$x->ColCaption = array("Scene");
	$x->ColFieldName = array('scene');
	$x->ColNumber  = array(2);

	$x->Template = 'templates/code_encounter_scenes_templateTV.html';
	$x->SelectedTemplate = 'templates/code_encounter_scenes_templateTVS.html';
	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `code_encounter_scenes`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='code_encounter_scenes' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `code_encounter_scenes`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='code_encounter_scenes' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`code_encounter_scenes`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: code_encounter_scenes_init
	$render=TRUE;
	if(function_exists('code_encounter_scenes_init')){
		$args=array();
		$render=code_encounter_scenes_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: code_encounter_scenes_header
	$headerCode='';
	if(function_exists('code_encounter_scenes_header')){
		$args=array();
		$headerCode=code_encounter_scenes_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: code_encounter_scenes_footer
	$footerCode='';
	if(function_exists('code_encounter_scenes_footer')){
		$args=array();
		$footerCode=code_encounter_scenes_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>