<?php
// This script and data application were generated by AppGini 5.40
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/storydynamic.php");
	include("$currDir/storydynamic_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('storydynamic');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "storydynamic";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV=array(   
		"`storydynamic`.`id`" => "id",
		"IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, '  ', `story1`.`story`), '') /* Story */" => "story",
		"`storydynamic`.`MC_resolve`" => "MC_resolve",
		"`storydynamic`.`MC_growth`" => "MC_growth",
		"`storydynamic`.`MC_approach`" => "MC_approach",
		"`storydynamic`.`MC_PS_style`" => "MC_PS_style",
		"`storydynamic`.`IC_resolve`" => "IC_resolve",
		"`storydynamic`.`OS_driver`" => "OS_driver",
		"`storydynamic`.`OS_limit`" => "OS_limit",
		"`storydynamic`.`OS_outcome`" => "OS_outcome",
		"`storydynamic`.`OS_judgement`" => "OS_judgement",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* Overall goal */" => "OS_goal_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* Goal concern */" => "OS_goal_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_domain2`.`domain`), '') /* Overall consequence */" => "OS_consequence_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern2`.`concern`), CONCAT_WS('',   `class_dramatica_concern2`.`concern`), '') /* Consequence concern */" => "OS_consequence_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain3`.`domain`), CONCAT_WS('',   `class_dramatica_domain3`.`domain`), '') /* Overall cost */" => "OS_cost_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_concern3`.`concern`), '') /* Cost concern */" => "OS_cost_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain4`.`domain`), CONCAT_WS('',   `class_dramatica_domain4`.`domain`), '') /* Overall dividend */" => "OS_dividend_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`), '') /* Dividend concern */" => "OS_dividend_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain5`.`domain`), CONCAT_WS('',   `class_dramatica_domain5`.`domain`), '') /* Overall requirements */" => "OS_requirements_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') /* Requirements concern */" => "OS_requirements_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain6`.`domain`), CONCAT_WS('',   `class_dramatica_domain6`.`domain`), '') /* Overall prerequesites */" => "OS_prerequesites_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') /* Prerequesites concern */" => "OS_prerequesites_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain7`.`domain`), CONCAT_WS('',   `class_dramatica_domain7`.`domain`), '') /* Overall preconditions */" => "OS_preconditions_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern7`.`concern`), CONCAT_WS('',   `class_dramatica_concern7`.`concern`), '') /* Preconditions concern */" => "OS_preconditions_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain8`.`domain`), CONCAT_WS('',   `class_dramatica_domain8`.`domain`), '') /* Overall forewarnings */" => "OS_forewarnings_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern8`.`concern`), CONCAT_WS('',   `class_dramatica_concern8`.`concern`), '') /* Forewarnings concern */" => "OS_forewarnings_concern",
		"`storydynamic`.`analyse_essence`" => "analyse_essence",
		"`storydynamic`.`analyse_nature`" => "analyse_nature",
		"`storydynamic`.`analyse_tendency`" => "analyse_tendency",
		"`storydynamic`.`analyse_reach`" => "analyse_reach"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`storydynamic`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6,
		7 => 7,
		8 => 8,
		9 => 9,
		10 => 10,
		11 => 11,
		12 => 12,
		13 => 13,
		14 => 14,
		15 => 15,
		16 => 16,
		17 => 17,
		18 => 18,
		19 => 19,
		20 => 20,
		21 => 21,
		22 => 22,
		23 => 23,
		24 => 24,
		25 => 25,
		26 => 26,
		27 => 27,
		28 => 28,
		29 => 29,
		30 => 30,
		31 => 31
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV=array(   
		"`storydynamic`.`id`" => "id",
		"IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, '  ', `story1`.`story`), '') /* Story */" => "story",
		"`storydynamic`.`MC_resolve`" => "MC_resolve",
		"`storydynamic`.`MC_growth`" => "MC_growth",
		"`storydynamic`.`MC_approach`" => "MC_approach",
		"`storydynamic`.`MC_PS_style`" => "MC_PS_style",
		"`storydynamic`.`IC_resolve`" => "IC_resolve",
		"`storydynamic`.`OS_driver`" => "OS_driver",
		"`storydynamic`.`OS_limit`" => "OS_limit",
		"`storydynamic`.`OS_outcome`" => "OS_outcome",
		"`storydynamic`.`OS_judgement`" => "OS_judgement",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* Overall goal */" => "OS_goal_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* Goal concern */" => "OS_goal_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_domain2`.`domain`), '') /* Overall consequence */" => "OS_consequence_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern2`.`concern`), CONCAT_WS('',   `class_dramatica_concern2`.`concern`), '') /* Consequence concern */" => "OS_consequence_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain3`.`domain`), CONCAT_WS('',   `class_dramatica_domain3`.`domain`), '') /* Overall cost */" => "OS_cost_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_concern3`.`concern`), '') /* Cost concern */" => "OS_cost_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain4`.`domain`), CONCAT_WS('',   `class_dramatica_domain4`.`domain`), '') /* Overall dividend */" => "OS_dividend_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`), '') /* Dividend concern */" => "OS_dividend_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain5`.`domain`), CONCAT_WS('',   `class_dramatica_domain5`.`domain`), '') /* Overall requirements */" => "OS_requirements_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') /* Requirements concern */" => "OS_requirements_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain6`.`domain`), CONCAT_WS('',   `class_dramatica_domain6`.`domain`), '') /* Overall prerequesites */" => "OS_prerequesites_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') /* Prerequesites concern */" => "OS_prerequesites_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain7`.`domain`), CONCAT_WS('',   `class_dramatica_domain7`.`domain`), '') /* Overall preconditions */" => "OS_preconditions_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern7`.`concern`), CONCAT_WS('',   `class_dramatica_concern7`.`concern`), '') /* Preconditions concern */" => "OS_preconditions_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain8`.`domain`), CONCAT_WS('',   `class_dramatica_domain8`.`domain`), '') /* Overall forewarnings */" => "OS_forewarnings_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern8`.`concern`), CONCAT_WS('',   `class_dramatica_concern8`.`concern`), '') /* Forewarnings concern */" => "OS_forewarnings_concern",
		"`storydynamic`.`analyse_essence`" => "analyse_essence",
		"`storydynamic`.`analyse_nature`" => "analyse_nature",
		"`storydynamic`.`analyse_tendency`" => "analyse_tendency",
		"`storydynamic`.`analyse_reach`" => "analyse_reach"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters=array(   
		"`storydynamic`.`id`" => "id",
		"IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, '  ', `story1`.`story`), '') /* Story */" => "Story",
		"`storydynamic`.`MC_resolve`" => "MC resolve",
		"`storydynamic`.`MC_growth`" => "MC growth",
		"`storydynamic`.`MC_approach`" => "MC approach",
		"`storydynamic`.`MC_PS_style`" => "MC PS style",
		"`storydynamic`.`IC_resolve`" => "IC resolve",
		"`storydynamic`.`OS_driver`" => "Overall driver",
		"`storydynamic`.`OS_limit`" => "Overal limit",
		"`storydynamic`.`OS_outcome`" => "Overall outcome",
		"`storydynamic`.`OS_judgement`" => "Overall judgement",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* Overall goal */" => "Overall goal",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* Goal concern */" => "Goal concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_domain2`.`domain`), '') /* Overall consequence */" => "Overall consequence",
		"IF(    CHAR_LENGTH(`class_dramatica_concern2`.`concern`), CONCAT_WS('',   `class_dramatica_concern2`.`concern`), '') /* Consequence concern */" => "Consequence concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain3`.`domain`), CONCAT_WS('',   `class_dramatica_domain3`.`domain`), '') /* Overall cost */" => "Overall cost",
		"IF(    CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_concern3`.`concern`), '') /* Cost concern */" => "Cost concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain4`.`domain`), CONCAT_WS('',   `class_dramatica_domain4`.`domain`), '') /* Overall dividend */" => "Overall dividend",
		"IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`), '') /* Dividend concern */" => "Dividend concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain5`.`domain`), CONCAT_WS('',   `class_dramatica_domain5`.`domain`), '') /* Overall requirements */" => "Overall requirements",
		"IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') /* Requirements concern */" => "Requirements concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain6`.`domain`), CONCAT_WS('',   `class_dramatica_domain6`.`domain`), '') /* Overall prerequesites */" => "Overall prerequesites",
		"IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') /* Prerequesites concern */" => "Prerequesites concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain7`.`domain`), CONCAT_WS('',   `class_dramatica_domain7`.`domain`), '') /* Overall preconditions */" => "Overall preconditions",
		"IF(    CHAR_LENGTH(`class_dramatica_concern7`.`concern`), CONCAT_WS('',   `class_dramatica_concern7`.`concern`), '') /* Preconditions concern */" => "Preconditions concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain8`.`domain`), CONCAT_WS('',   `class_dramatica_domain8`.`domain`), '') /* Overall forewarnings */" => "Overall forewarnings",
		"IF(    CHAR_LENGTH(`class_dramatica_concern8`.`concern`), CONCAT_WS('',   `class_dramatica_concern8`.`concern`), '') /* Forewarnings concern */" => "Forewarnings concern",
		"`storydynamic`.`analyse_essence`" => "Adience appreciation - Essence",
		"`storydynamic`.`analyse_nature`" => "Adience appreciation - Nature",
		"`storydynamic`.`analyse_tendency`" => "Adience appreciation - Tendency",
		"`storydynamic`.`analyse_reach`" => "Adience appreciation - Reach"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS=array(   
		"`storydynamic`.`id`" => "id",
		"IF(    CHAR_LENGTH(`story1`.`id`) || CHAR_LENGTH(`story1`.`story`), CONCAT_WS('',   `story1`.`id`, '  ', `story1`.`story`), '') /* Story */" => "story",
		"`storydynamic`.`MC_resolve`" => "MC_resolve",
		"`storydynamic`.`MC_growth`" => "MC_growth",
		"`storydynamic`.`MC_approach`" => "MC_approach",
		"`storydynamic`.`MC_PS_style`" => "MC_PS_style",
		"`storydynamic`.`IC_resolve`" => "IC_resolve",
		"`storydynamic`.`OS_driver`" => "OS_driver",
		"`storydynamic`.`OS_limit`" => "OS_limit",
		"`storydynamic`.`OS_outcome`" => "OS_outcome",
		"`storydynamic`.`OS_judgement`" => "OS_judgement",
		"IF(    CHAR_LENGTH(`class_dramatica_domain1`.`domain`), CONCAT_WS('',   `class_dramatica_domain1`.`domain`), '') /* Overall goal */" => "OS_goal_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern1`.`concern`), CONCAT_WS('',   `class_dramatica_concern1`.`concern`), '') /* Goal concern */" => "OS_goal_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain2`.`domain`), CONCAT_WS('',   `class_dramatica_domain2`.`domain`), '') /* Overall consequence */" => "OS_consequence_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern2`.`concern`), CONCAT_WS('',   `class_dramatica_concern2`.`concern`), '') /* Consequence concern */" => "OS_consequence_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain3`.`domain`), CONCAT_WS('',   `class_dramatica_domain3`.`domain`), '') /* Overall cost */" => "OS_cost_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern3`.`concern`), CONCAT_WS('',   `class_dramatica_concern3`.`concern`), '') /* Cost concern */" => "OS_cost_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain4`.`domain`), CONCAT_WS('',   `class_dramatica_domain4`.`domain`), '') /* Overall dividend */" => "OS_dividend_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern4`.`concern`), CONCAT_WS('',   `class_dramatica_concern4`.`concern`), '') /* Dividend concern */" => "OS_dividend_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain5`.`domain`), CONCAT_WS('',   `class_dramatica_domain5`.`domain`), '') /* Overall requirements */" => "OS_requirements_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern5`.`concern`), CONCAT_WS('',   `class_dramatica_concern5`.`concern`), '') /* Requirements concern */" => "OS_requirements_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain6`.`domain`), CONCAT_WS('',   `class_dramatica_domain6`.`domain`), '') /* Overall prerequesites */" => "OS_prerequesites_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern6`.`concern`), CONCAT_WS('',   `class_dramatica_concern6`.`concern`), '') /* Prerequesites concern */" => "OS_prerequesites_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain7`.`domain`), CONCAT_WS('',   `class_dramatica_domain7`.`domain`), '') /* Overall preconditions */" => "OS_preconditions_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern7`.`concern`), CONCAT_WS('',   `class_dramatica_concern7`.`concern`), '') /* Preconditions concern */" => "OS_preconditions_concern",
		"IF(    CHAR_LENGTH(`class_dramatica_domain8`.`domain`), CONCAT_WS('',   `class_dramatica_domain8`.`domain`), '') /* Overall forewarnings */" => "OS_forewarnings_domain",
		"IF(    CHAR_LENGTH(`class_dramatica_concern8`.`concern`), CONCAT_WS('',   `class_dramatica_concern8`.`concern`), '') /* Forewarnings concern */" => "OS_forewarnings_concern",
		"`storydynamic`.`analyse_essence`" => "analyse_essence",
		"`storydynamic`.`analyse_nature`" => "analyse_nature",
		"`storydynamic`.`analyse_tendency`" => "analyse_tendency",
		"`storydynamic`.`analyse_reach`" => "analyse_reach"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'story' => 'Story', 'OS_goal_domain' => 'Overall goal', 'OS_goal_concern' => 'Goal concern', 'OS_consequence_domain' => 'Overall consequence', 'OS_consequence_concern' => 'Consequence concern', 'OS_cost_domain' => 'Overall cost', 'OS_cost_concern' => 'Cost concern', 'OS_dividend_domain' => 'Overall dividend', 'OS_dividend_concern' => 'Dividend concern', 'OS_requirements_domain' => 'Overall requirements', 'OS_requirements_concern' => 'Requirements concern', 'OS_prerequesites_domain' => 'Overall prerequesites', 'OS_prerequesites_concern' => 'Prerequesites concern', 'OS_preconditions_domain' => 'Overall preconditions', 'OS_preconditions_concern' => 'Preconditions concern', 'OS_forewarnings_domain' => 'Overall forewarnings', 'OS_forewarnings_concern' => 'Forewarnings concern');

	$x->QueryFrom="`storydynamic` LEFT JOIN `story` as story1 ON `story1`.`id`=`storydynamic`.`story` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain1 ON `class_dramatica_domain1`.`id`=`storydynamic`.`OS_goal_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern1 ON `class_dramatica_concern1`.`id`=`storydynamic`.`OS_goal_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain2 ON `class_dramatica_domain2`.`id`=`storydynamic`.`OS_consequence_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern2 ON `class_dramatica_concern2`.`id`=`storydynamic`.`OS_consequence_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain3 ON `class_dramatica_domain3`.`id`=`storydynamic`.`OS_cost_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern3 ON `class_dramatica_concern3`.`id`=`storydynamic`.`OS_cost_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain4 ON `class_dramatica_domain4`.`id`=`storydynamic`.`OS_dividend_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern4 ON `class_dramatica_concern4`.`id`=`storydynamic`.`OS_dividend_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain5 ON `class_dramatica_domain5`.`id`=`storydynamic`.`OS_requirements_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern5 ON `class_dramatica_concern5`.`id`=`storydynamic`.`OS_requirements_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain6 ON `class_dramatica_domain6`.`id`=`storydynamic`.`OS_prerequesites_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern6 ON `class_dramatica_concern6`.`id`=`storydynamic`.`OS_prerequesites_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain7 ON `class_dramatica_domain7`.`id`=`storydynamic`.`OS_preconditions_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern7 ON `class_dramatica_concern7`.`id`=`storydynamic`.`OS_preconditions_concern` LEFT JOIN `class_dramatica_domain` as class_dramatica_domain8 ON `class_dramatica_domain8`.`id`=`storydynamic`.`OS_forewarnings_domain` LEFT JOIN `class_dramatica_concern` as class_dramatica_concern8 ON `class_dramatica_concern8`.`id`=`storydynamic`.`OS_forewarnings_concern` ";
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
	$x->ScriptFileName = "storydynamic_view.php";
	$x->RedirectAfterInsert = "storydynamic_view.php";
	$x->TableTitle = "Story dynamics";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`storydynamic`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("id", "Story", "MC resolve", "MC growth", "MC approach", "MC PS style", "IC resolve", "Adience appreciation - Essence", "Adience appreciation - Nature", "Adience appreciation - Tendency", "Adience appreciation - Reach");
	$x->ColFieldName = array('id', 'story', 'MC_resolve', 'MC_growth', 'MC_approach', 'MC_PS_style', 'IC_resolve', 'analyse_essence', 'analyse_nature', 'analyse_tendency', 'analyse_reach');
	$x->ColNumber  = array(1, 2, 3, 4, 5, 6, 7, 28, 29, 30, 31);

	$x->Template = 'templates/storydynamic_templateTV.html';
	$x->SelectedTemplate = 'templates/storydynamic_templateTVS.html';
	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `storydynamic`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='storydynamic' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `storydynamic`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='storydynamic' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`storydynamic`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: storydynamic_init
	$render=TRUE;
	if(function_exists('storydynamic_init')){
		$args=array();
		$render=storydynamic_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: storydynamic_header
	$headerCode='';
	if(function_exists('storydynamic_header')){
		$args=array();
		$headerCode=storydynamic_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: storydynamic_footer
	$footerCode='';
	if(function_exists('storydynamic_footer')){
		$args=array();
		$footerCode=storydynamic_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>