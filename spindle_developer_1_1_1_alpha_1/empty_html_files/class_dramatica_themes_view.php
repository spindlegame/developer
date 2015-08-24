<?php
// This script and data application were generated by AppGini 5.40
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/class_dramatica_themes.php");
	include("$currDir/class_dramatica_themes_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('class_dramatica_themes');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "class_dramatica_themes";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV=array(   
		"`class_dramatica_themes`.`id`" => "id",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* domain */" => "domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* concern */" => "concern",
		"IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') /* issue */" => "issue",
		"`class_dramatica_themes`.`theme`" => "theme",
		"`class_dramatica_themes`.`description`" => "description"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`class_dramatica_themes`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV=array(   
		"`class_dramatica_themes`.`id`" => "id",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* domain */" => "domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* concern */" => "concern",
		"IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') /* issue */" => "issue",
		"`class_dramatica_themes`.`theme`" => "theme",
		"`class_dramatica_themes`.`description`" => "description"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters=array(   
		"`class_dramatica_themes`.`id`" => "id",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* domain */" => "domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* concern */" => "concern",
		"IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') /* issue */" => "issue",
		"`class_dramatica_themes`.`theme`" => "theme",
		"`class_dramatica_themes`.`description`" => "description"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS=array(   
		"`class_dramatica_themes`.`id`" => "id",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* domain */" => "domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* concern */" => "concern",
		"IF(    CHAR_LENGTH(`class_dramatica_issue1`.`issue`), CONCAT_WS('',   `class_dramatica_issue1`.`issue`), '') /* issue */" => "issue",
		"`class_dramatica_themes`.`theme`" => "theme",
		"`class_dramatica_themes`.`description`" => "description"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'domain' => 'domain', 'concern' => 'concern', 'issue' => 'issue');

	$x->QueryFrom="`class_dramatica_themes` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`class_dramatica_themes`.`domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`class_dramatica_themes`.`concern` LEFT JOIN `class_dramatica_issue` as class_dramatica_issue1 ON `class_dramatica_issue1`.`id`=`class_dramatica_themes`.`issue` ";
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
	$x->ScriptFileName = "class_dramatica_themes_view.php";
	$x->RedirectAfterInsert = "class_dramatica_themes_view.php?SelectedID=#ID#";
	$x->TableTitle = "Themes";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`class_dramatica_themes`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("id", "domain", "concern", "issue", "theme", "description");
	$x->ColFieldName = array('id', 'domain', 'concern', 'issue', 'theme', 'description');
	$x->ColNumber  = array(1, 2, 3, 4, 5, 6);

	$x->Template = 'templates/class_dramatica_themes_templateTV.html';
	$x->SelectedTemplate = 'templates/class_dramatica_themes_templateTVS.html';
	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `class_dramatica_themes`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='class_dramatica_themes' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `class_dramatica_themes`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='class_dramatica_themes' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`class_dramatica_themes`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: class_dramatica_themes_init
	$render=TRUE;
	if(function_exists('class_dramatica_themes_init')){
		$args=array();
		$render=class_dramatica_themes_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: class_dramatica_themes_header
	$headerCode='';
	if(function_exists('class_dramatica_themes_header')){
		$args=array();
		$headerCode=class_dramatica_themes_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: class_dramatica_themes_footer
	$footerCode='';
	if(function_exists('class_dramatica_themes_footer')){
		$args=array();
		$footerCode=class_dramatica_themes_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>