<?php
// This script and data application were generated by AppGini 5.40
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/class_authority_library.php");
	include("$currDir/class_authority_library_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('class_authority_library');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "class_authority_library";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV=array(   
		"`class_authority_library`.`id`" => "id",
		"`class_authority_library`.`abbreviation`" => "abbreviation",
		"`class_authority_library`.`authority_name`" => "authority_name"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`class_authority_library`.`id`',
		2 => 2,
		3 => 3
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV=array(   
		"`class_authority_library`.`id`" => "id",
		"`class_authority_library`.`abbreviation`" => "abbreviation",
		"`class_authority_library`.`authority_name`" => "authority_name"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters=array(   
		"`class_authority_library`.`id`" => "id",
		"`class_authority_library`.`abbreviation`" => "abbreviation",
		"`class_authority_library`.`authority_name`" => "authority_name"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS=array(   
		"`class_authority_library`.`id`" => "id",
		"`class_authority_library`.`abbreviation`" => "abbreviation",
		"`class_authority_library`.`authority_name`" => "authority_name"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array();

	$x->QueryFrom="`class_authority_library` ";
	$x->QueryWhere='';
	$x->QueryOrder='';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 0;
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
	$x->ScriptFileName = "class_authority_library_view.php";
	$x->RedirectAfterInsert = "class_authority_library_view.php?SelectedID=#ID#";
	$x->TableTitle = "class_authority_library";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`class_authority_library`.`id`";
	$x->DefaultSortField = '2';
	$x->DefaultSortDirection = 'asc';

	$x->ColWidth   = array(  150, 150, 150);
	$x->ColCaption = array("id", "abbreviation", "authority_name");
	$x->ColFieldName = array('id', 'abbreviation', 'authority_name');
	$x->ColNumber  = array(1, 2, 3);

	$x->Template = 'templates/class_authority_library_templateTV.html';
	$x->SelectedTemplate = 'templates/class_authority_library_templateTVS.html';
	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `class_authority_library`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='class_authority_library' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `class_authority_library`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='class_authority_library' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`class_authority_library`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: class_authority_library_init
	$render=TRUE;
	if(function_exists('class_authority_library_init')){
		$args=array();
		$render=class_authority_library_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: class_authority_library_header
	$headerCode='';
	if(function_exists('class_authority_library_header')){
		$args=array();
		$headerCode=class_authority_library_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: class_authority_library_footer
	$footerCode='';
	if(function_exists('class_authority_library_footer')){
		$args=array();
		$footerCode=class_authority_library_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>