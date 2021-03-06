<?php
// This script and data application were generated by AppGini 5.40
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/biblio_trascript.php");
	include("$currDir/biblio_trascript_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('biblio_trascript');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "biblio_trascript";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV=array(   
		"`biblio_trascript`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ',', `biblio_author1`.`first_name`), '') /* Author */" => "author",
		"IF(    CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`memberID`), '') /* Author id. */" => "author_memberID",
		"IF(    CHAR_LENGTH(`biblio_doc1`.`id`), CONCAT_WS('',   `biblio_doc1`.`id`), '') /* Bibliography id. */" => "bibliography_id",
		"IF(    CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`title`), '') /* Bibliography title */" => "bibliography_title",
		"`biblio_trascript`.`trascriber_memberID`" => "trascriber_memberID",
		"`biblio_trascript`.`transcript_title`" => "transcript_title",
		"`biblio_trascript`.`transcript`" => "transcript",
		"`biblio_trascript`.`credits`" => "credits"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`biblio_trascript`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6,
		7 => 7,
		8 => 8,
		9 => 9
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV=array(   
		"`biblio_trascript`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ',', `biblio_author1`.`first_name`), '') /* Author */" => "author",
		"IF(    CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`memberID`), '') /* Author id. */" => "author_memberID",
		"IF(    CHAR_LENGTH(`biblio_doc1`.`id`), CONCAT_WS('',   `biblio_doc1`.`id`), '') /* Bibliography id. */" => "bibliography_id",
		"IF(    CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`title`), '') /* Bibliography title */" => "bibliography_title",
		"`biblio_trascript`.`trascriber_memberID`" => "trascriber_memberID",
		"`biblio_trascript`.`transcript_title`" => "transcript_title",
		"`biblio_trascript`.`transcript`" => "transcript",
		"`biblio_trascript`.`credits`" => "credits"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters=array(   
		"`biblio_trascript`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ',', `biblio_author1`.`first_name`), '') /* Author */" => "Author",
		"IF(    CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`memberID`), '') /* Author id. */" => "Author id.",
		"IF(    CHAR_LENGTH(`biblio_doc1`.`id`), CONCAT_WS('',   `biblio_doc1`.`id`), '') /* Bibliography id. */" => "Bibliography id.",
		"IF(    CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`title`), '') /* Bibliography title */" => "Bibliography title",
		"`biblio_trascript`.`trascriber_memberID`" => "Trascriber id.",
		"`biblio_trascript`.`transcript_title`" => "Transcript title",
		"`biblio_trascript`.`transcript`" => "Transcript",
		"`biblio_trascript`.`credits`" => "Credits"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS=array(   
		"`biblio_trascript`.`id`" => "id",
		"IF(    CHAR_LENGTH(`biblio_author1`.`last_name`) || CHAR_LENGTH(`biblio_author1`.`first_name`), CONCAT_WS('',   `biblio_author1`.`last_name`, ',', `biblio_author1`.`first_name`), '') /* Author */" => "author",
		"IF(    CHAR_LENGTH(`biblio_author1`.`memberID`), CONCAT_WS('',   `biblio_author1`.`memberID`), '') /* Author id. */" => "author_memberID",
		"IF(    CHAR_LENGTH(`biblio_doc1`.`id`), CONCAT_WS('',   `biblio_doc1`.`id`), '') /* Bibliography id. */" => "bibliography_id",
		"IF(    CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`title`), '') /* Bibliography title */" => "bibliography_title",
		"`biblio_trascript`.`trascriber_memberID`" => "trascriber_memberID",
		"`biblio_trascript`.`transcript_title`" => "transcript_title",
		"`biblio_trascript`.`transcript`" => "transcript",
		"`biblio_trascript`.`credits`" => "credits"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'author' => 'Author', 'bibliography_title' => 'Bibliography title');

	$x->QueryFrom="`biblio_trascript` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_trascript`.`author` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_trascript`.`bibliography_title` ";
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
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "biblio_trascript_view.php";
	$x->RedirectAfterInsert = "biblio_trascript_view.php?SelectedID=#ID#";
	$x->TableTitle = "Trascripts";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`biblio_trascript`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("Author", "Author id.", "Bibliography id.", "Bibliography title", "Trascriber id.", "Transcript title", "Transcript", "Credits");
	$x->ColFieldName = array('author', 'author_memberID', 'bibliography_id', 'bibliography_title', 'trascriber_memberID', 'transcript_title', 'transcript', 'credits');
	$x->ColNumber  = array(2, 3, 4, 5, 6, 7, 8, 9);

	$x->Template = 'templates/biblio_trascript_templateTV.html';
	$x->SelectedTemplate = 'templates/biblio_trascript_templateTVS.html';
	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `biblio_trascript`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='biblio_trascript' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `biblio_trascript`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='biblio_trascript' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`biblio_trascript`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: biblio_trascript_init
	$render=TRUE;
	if(function_exists('biblio_trascript_init')){
		$args=array();
		$render=biblio_trascript_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: biblio_trascript_header
	$headerCode='';
	if(function_exists('biblio_trascript_header')){
		$args=array();
		$headerCode=biblio_trascript_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: biblio_trascript_footer
	$footerCode='';
	if(function_exists('biblio_trascript_footer')){
		$args=array();
		$footerCode=biblio_trascript_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>