<?php
defined('_JEXEC') OR die('Access Denied!');
### Copyright (c) 2006-2013 Joobi Limited. All rights reserved.
### license GNU GPLv3 , link http://www.joobi.co

$doc = JFactory::getDocument();
$path = JNEWS_PATH_ADMIN_IMAGES2.'toolbar/';
$css = ".icon-32-tool { background-image: url( ".$path ."cpanelT.png ); display:block;height:32px;width:32px;}";
$css .= ".icon-32-upload { background-image: url( ".$path ."export.png); display:block;height:32px;width:32px;}";
$css .= ".icon-32-refreshT { background-image: url( ".$path ."refreshT.png ); display:block;height:32px;width:32px;}";
$css .= ".icon-32-forward { background-image: url( ".$path ."message_sent.png ); display:block;height:32px;width:32px;}";
$css .= ".icon-32-addusers { background-image: url( ".$path ."subscribers.png ); display:block;height:32px;width:32px;}";
$css .= ".icon-32-subscribers 	{ background-image: url( ".$path ."subscribers.png ); display:block;height:32px;width:32px;}";
$css .= ".icon-32-export { background-image:url(".$path ."export.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-import { background-image:url(".$path ."import.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-createformT { background-image:url(".$path ."createformT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-publishT { background-image:url(".$path ."publishT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-unpublishT { background-image:url(".$path ."unpublishT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-copyT { background-image:url(".$path ."copyT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-newT { background-image:url(".$path ."newT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-deleteT { background-image:url(".$path ."deleteT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-editT { background-image:url(".$path ."editT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-copyT { background-image:url(".$path ."copyT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-backT { background-image:url(".$path ."backT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-cancelT { background-image:url(".$path ."cancelT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-saveT { background-image:url(".$path ."saveT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-process-queue { background-image:url(".$path ."process-queue.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-stop-queue { background-image:url(".$path ."stop-queue.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-start-queue { background-image:url(".$path ."start-queue.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-clean-queue { background-image:url(".$path ."clean-queue.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-message_sent { background-image:url(".$path ."message_sent.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-applyT { background-image:url(".$path ."applyT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-archiveT { background-image:url(".$path ."archiveT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-cpanelT { background-image:url(".$path ."cpanelT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-previewT { background-image:url(".$path ."previewT.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-generate { background-image:url(".$path ."generate.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-wizard { background-image:url(".$path ."wizard.png);display:block;height:32px;width:32px;}";
$css .= ".icon-16-wizard { background-image:url(".JNEWS_PATH_ADMIN_IMAGES2 ."16/wizard.png);display:block;height:16px;width:16px;}";
$css .= "span.icon-32-default { background-image:url(".$path ."defaultT.png)!important;display:block!important;height:32px!important;width:100%!important;}";
$css .= ".icon-32-defaultT { background-image:url(".$path ."defaultT.png)!important;display:block!important;height:32px!important;width:32px!important;}";
$css .= ".icon-32-defaultT { background-image:url(".$path ."more_templates.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-defaultT { background-image:url(".$path ."upload.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-preview { background-image:url(".$path ."previewT.png)!important;display:block;height:32px;width:32px;}";
$css .= ".icon-32-block { background-image:url(".$path ."block.png);display:block;height:32px;width:32px;}";
$css .= ".icon-32-unblock { background-image:url(".$path ."unblock.png)!important;display:block;height:32px;width:32px;}";

$doc->addStyleDeclaration($css);

$listId = JRequest::getInt('listid', 0, 'request');
$listType = JRequest::getInt('listype', 0, 'request');
$action = JRequest::getString('act', '', 'request');
$task = JRequest::getVar( 'task', '', '', 'WORD' );
if($action == 'arlist') $GLOBALS[JNEWS . 'titlteHeader'] = _JNEWS_ARLIST;
if($action == 'mailing' && $listType ==2) $GLOBALS[JNEWS . 'titlteHeader'] = _JNEWS_MENU_AUTOS;
if($action == 'mailing' && $listType ==2 && $task=='edit') $GLOBALS[JNEWS . 'titlteHeader'] = _JNEWS_EDIT_AR;
if ( !isset($GLOBALS[JNEWS . 'titlteHeader']) ) $GLOBALS[JNEWS . 'titlteHeader'] = '';
if ( !isset($GLOBALS[JNEWS . 'titlteImg']) ) $GLOBALS[JNEWS . 'titlteImg'] = '';

if ( !class_exists('JToolBarHelper') )  @include_once( JPATH_ROOT . DS . 'administrator' . DS . 'includes' . DS . 'toolbar.php' );
JToolBarHelper::title( $GLOBALS[JNEWS . 'titlteHeader'] , $GLOBALS[JNEWS . 'titlteImg'] );

 switch ($action) {
	 case ('subscribers'):

	 	switch ($task) {
			case ('import'):
				jNews_Menu::IMPORT();
				break;
			case ('export'):
				jNews_Menu::EXPORT();
				break;
			case ('new'):
			case ('add'):
				jNews_Menu::NEWSUBSCRIBER();
				break;
			case ('show'):
				jNews_Menu::SHOWSUBSCRIBER();
				break;
			case ('doExport'):
			case ('cpanel'):

				break;
			default :
				jNews_Menu::REGISTERED();
				break;
	 	}
	 	break;
	 case ('list'):

	 	switch ($task) {
			case ('new'):
			case ('add'):
				jNews_Menu::NEW_LIST('');
				break;
			case ('edit'):
				jNews_Menu::EDIT_LIST('');
				break;
			case ('cpanel'):

				break;
			default:
				jNews_Menu::SHOW_LIST();
				break;
	 	}
	 	break;
	 case ('arlist'):

	 	switch ($task) {
			case ('new'):
			case ('add'):
				jNews_Menu::NEW_LIST('');
				break;
			case ('edit'):
				jNews_Menu::EDIT_LIST('');
				break;
			case ('cpanel'):

				break;
			default:
				jNews_Menu::SHOW_ARLIST();
				break;
	 	}
	 	break;

	 case ('mailing'):

	 	switch ($task) {
			case ('edit'):
				jNews_Menu::NEWMAILING();
				break;
			case ('preview'):
				jNews_Menu::PREVIEWMAILING('show');
				break;
			case ('savePreview'):
				jNews_Menu::PREVIEWMAILING('show');
				break;
			case ('view'):
				jNews_Menu::CANCEL_ONLY('cancelMailing');
				break;
			case ('publish'):
				jNews_Menu::CANCEL_ONLY('');
				break;
			case ('cpanel'):

				break;
			case ('show'):
			default :
				jNews_Menu::SHOW_MAILINGS();
				break;
	 	}
	 	break;
	 case ('configuration'):

	 	switch ($task) {
			case ('save'):
			case ('cpanel'):

				break;
			default :
				jNews_Menu::CONFIGURATION();
				break;
	 	}
	 	break;
	 case ('statistics'):

	 	switch ($task) {
			case ('edit'):
				jNews_Menu::CANCEL_ONLY('cancel');
				break;
			case ('cpanel'):

				break;
			default :
				jNews_Menu::STATISTICS();
				break;
	 	}
	 	break;

	case('queue'):

	 	switch ($task) {
			case ('pqueue'):
				jNews_Menu::QUEUE_MENU('pqueue');
				break;
			case ('delq'):
				jNews_Menu::QUEUE_MENU('delq');
				break;
			case ('cleanq'):
				jNews_Menu::QUEUE_MENU('cleanq');
				break;

			case ('cpanel'):

				break;
			default :

				jNews_Menu::QUEUE_MENU();

				break;
	 	}
	 	break;

	 	case('templates'):
	 	switch ($task) {
	 		case ('new'):
			case ('add'):
				jNews_Menu::NEWTEMPLATE('');
				break;
			case ('edit'):
				jNews_Menu::EDITTEMPLATE('');
				break;
			case ('cpanel'):

				break;

			default :
				jNews_Menu::TEMPLATES_MENU();
				break;
	 	}
	 	break;

	 case ('update'):

	 	switch ($task) {
			case ('doUpdate'):
			case ('version'):
			case ('new1'):
			case ('new2'):
			case ('new3'):
				jNews_Menu::CANCEL_ONLY('show');
				break;
			case ('cpanel'):

				break;
			case ('complete'):
				jNews_Menu::DOUPDATE();
				break;
			case ('show'):
			default :
				jNews_Menu::UPDATE();
				break;
	 	}
	 	break;
	 case ('about'):

	 	switch ($task) {
			case ('cpanel'):

				break;
			default :
				jNews_Menu::ABOUT();
				break;
	 	}
	 	break;
	 default :
	 	break;
 }

 
 class jNews_Menu {

	 public static function REGISTERED() {
		JToolbarHelper::addNew('add');
		
		JToolbarHelper::editList('edit');
					
		JToolBarHelper::divider();			
		JToolbarHelper::deleteList('', 'delete', _JNEWS_DELETE );
	 	
		JToolBarHelper::divider();	
		JToolBarHelper::custom('export', 'archive.png', 'archive.png', _JNEWS_MENU_EXPORT , false );
		JToolBarHelper::custom('import', 'archive.png', 'archive.png', _JNEWS_MENU_IMPORT , false );

		JToolBarHelper::divider();
		jNews_Menu::_cPanelBtn();
		jNews_Menu::_wizardBtn( 'list-subscribers' );
	 }

	 public static function SHOWSUBSCRIBER() {

		JToolBarHelper::custom('updateOneSub', 'save.png', 'save.png', _JNEWS_UPDATE , false);
		JToolBarHelper::custom('cancelSub', 'cancel.png', 'cancel.png', 'JTOOLBAR_CANCEL' , false);
		JToolBarHelper::divider();
		jNews_Menu::_wizardBtn( 'edit-subscriber' );
//		jNews_Menu::_cPanelBtn();
	 }

	 public static function NEWSUBSCRIBER() {
		JToolBarHelper::custom('doNew', 'save.png', 'save.png', 'JTOOLBAR_SAVE' , false);
		JToolBarHelper::custom('cancelSub', 'cancel.png', 'cancel.png', 'JTOOLBAR_CANCEL' , false);
		JToolBarHelper::divider();
		jNews_Menu::_wizardBtn( 'edit-subscriber' );
//		jNews_Menu::_cPanelBtn();
	 }

	 public static function IMPORT() {
		JToolBarHelper::custom('doImport', 'import.png', 'import.png', _JNEWS_MENU_IMPORT , false);
		jNews_Menu::_backBtn();
		JToolBarHelper::divider();
		jNews_Menu::_wizardBtn( 'import-subscriber' );
		jNews_Menu::_cPanelBtn();
	 }

	 public static function EXPORT() {
		JToolBarHelper::custom('doExport', 'export.png', 'export.png', _JNEWS_MENU_EXPORT , false);
		jNews_Menu::_backBtn();
		JToolBarHelper::divider();
		jNews_Menu::_wizardBtn( 'export-subscriber' );
		jNews_Menu::_cPanelBtn();
	 }

	 public static function SHOW_LIST( $help='list-lists' ) {
			
		JToolbarHelper::addNew('add');
		
		JToolbarHelper::editList('edit');
					
		JToolbarHelper::publish('publish', 'JTOOLBAR_PUBLISH', true );
		JToolbarHelper::unpublish('unpublish', 'JTOOLBAR_UNPUBLISH', true );

		JToolBarHelper::custom( 'copy', 'refresh.png', 'refresh_f2.png', _JNEWS_MENU_COPY , true);
		
		JToolBarHelper::divider();			
		JToolbarHelper::deleteList('', 'delete', _JNEWS_DELETE );

		JToolBarHelper::divider();			
		
		if ( class_exists('jNews_Pro') ) {
			$bar = JToolBar::getInstance('toolbar');
			$linkBut = jNews_Tools::completeLink( 'option='.JNEWS_OPTION.'&act=list&task=forms', true, false, true );
			$bar->appendButton( 'Popup', 'forms', _JNEWS_FORM_BUTTON, $linkBut );//create form
		}
			
		
		JToolBarHelper::divider();
		jNews_Menu::_wizardBtn( 'list-lists' );
		jNews_Menu::_cPanelBtn();
		
	 }

	 public static function SHOW_ARLIST() {
	 	
	 	jNews_Menu::SHOW_LIST( 'list-autoresponders' );

	 }

	 public static function EDIT_LIST($task) {
	 	JToolBarHelper::custom( 'update', 'save.png', 'save.png', 'JTOOLBAR_SAVE' , false);
		JToolBarHelper::custom( $task, 'cancel.png', 'cancel.png', 'JTOOLBAR_CANCEL' , false);
		JToolBarHelper::divider();
		$act = JRequest::getVar( 'act', '', '', 'WORD' );
		$doc = $act=='arlist' ? 'edit-autoresponder' : 'edit-list';
		jNews_Menu::_wizardBtn( $doc );
	 }

	 public static function NEW_LIST($task) {
		JToolBarHelper::custom( 'doNew', 'save.png', 'save.png', 'JTOOLBAR_SAVE' , false);
		JToolBarHelper::custom( $task, 'cancel.png', 'cancel.png', 'JTOOLBAR_CANCEL' , false);
		
		JToolBarHelper::divider();
		$act = JRequest::getVar( 'act', '', '', 'WORD' );
		$doc = $act=='arlist' ? 'edit-autoresponder' : 'edit-list';
		jNews_Menu::_wizardBtn( $doc );
	 }

	 public static function SHOW_MAILINGS() {

	 	$listtype = JRequest::getInt('listype');
	 	
		JToolbarHelper::addNew('add');
		
		JToolbarHelper::editList('edit');
					
		if ($listtype != '7') JToolbarHelper::unpublish('unpublishMailing', 'JTOOLBAR_UNPUBLISH', true );

		if ($listtype != '7') JToolBarHelper::custom( 'copy', 'refresh.png', 'refresh_f2.png', _JNEWS_MENU_COPY , true);
		
		JToolBarHelper::divider();			
		JToolbarHelper::deleteList('', 'deleteMailing', _JNEWS_DELETE );
	 	
	 	
	 	JToolBarHelper::divider();
		JToolBarHelper::custom('preview', 'share.png', 'share.png', _JNEWS_MENU_PREVIEW , true );
		
		JToolBarHelper::divider();
		$doc = $listtype == '7' ? 'list-smart-newsletter' : 'list-newsletter';
		jNews_Menu::_wizardBtn( $doc );
		jNews_Menu::_cPanelBtn();
		
	 }

	 public static function NEWMAILING() {

		JToolBarHelper::custom('apply', 'apply.png', 'apply.png', 'JTOOLBAR_APPLY' , false);
		JToolBarHelper::custom('save', 'save.png', 'save.png', 'JTOOLBAR_SAVE' , false);
		JToolBarHelper::custom('show', 'cancel.png', 'cancel.png', _JNEWS_MENU_CANCEL , false);
	 	
		JToolBarHelper::divider();
		
		$mailingID = JRequest::getInt('mailingid', '', 'request');
		$bar = JToolBar::getInstance('toolbar');
		$doc = JFactory::getDocument();

		if (empty($mailingID) || $mailingID < 1) {
		 	$css = 'span.icon-32-acatemplate {background-image:url('. JNEWS_PATH_ADMIN_IMAGES2 .'toolbar/templates.png)}';
	        $doc->addStyleDeclaration($css, $type = 'text/css');
			$bar->appendButton( 'Popup', 'acatemplate', _JNEWS_TEMPLATE, jNews_Tools::completeLink( 'option='.JNEWS_OPTION.'&act=templates&task=assign', true, false, true ) );
			JToolBarHelper::divider();
		}

		$listype = JRequest::getInt('listype', 0 );
		$css = 'span.icon-32-acatags {background-image:url('. JNEWS_PATH_ADMIN_IMAGES2 .'toolbar/tag.png)}';
	    $doc->addStyleDeclaration($css, $type = 'text/css');

		if($listype == 7) {

			$catid = JRequest::getVar('cat_id', 0, 'request');
			if(empty($mailingID) || $mailingID < 1){
				$link = jNews_Tools::completeLink( 'option='.JNEWS_OPTION.'&act=tags&listype='.$listype.'&cat_id='.$catid.'&new=1' , true, false, true );
			}else{
				$delaymax = JRequest::getInt('delay_max', 0, 'request');
				$notifyID = JRequest::getInt('notify_id', 0, 'request');
				$link= jNews_Tools::completeLink( 'option='.JNEWS_OPTION.'&act=tags&listype='.$listype.'&cat_id='.$catid.'&delay_max='.$delaymax.'&notify_id='.$notifyID , true, false, true );
			}
		}else{
			$link = jNews_Tools::completeLink( 'option='.JNEWS_OPTION.'&act=tags&listype='.$listype , true, false, true );
		}
		
		$bar->appendButton( 'Popup', 'acatags', _JNEWS_MENU_TAG, $link );
		JToolBarHelper::divider();
		JToolBarHelper::custom('savePreview', 'share.png', 'share.png', _JNEWS_MENU_PREVIEW , false );
		
		if ( empty($listype) ) {
			$droplistW = JRequest::getVar('droplist', '');
			$maliste = explode('-',$droplistW );
			if ( !empty($maliste[0]) ) {
				$listype = $maliste[0];
			} else {
				$listidW = JRequest::getVar('listid', 0 );
				$maliste = jNews_Lists::getLists($listidW,0,null,'listnameA',false,false,false,false);
				$listype = $maliste[0]->list_type;
			}
		}

		JToolBarHelper::divider();
		
		$docLink = ( $listype == '7') ? 'edit-smart-newsletter' : 'edit-newsletter';
		jNews_Menu::_wizardBtn( $docLink );

	 }

	 
	 public static function PREVIEWMAILING($task) {
		$mailingid = JRequest::getVar('mailingid','0');
		$mailingid = ($mailingid==0) ? jNews_Mailing::getLastMailingId() : $mailingid;

		if ( $GLOBALS[JNEWS.'level'] > 1 && !jnews::isLocal() ) {
			$bar = JToolBar::getInstance('toolbar');
			$linkSpam = jNews_Tools::completeLink( 'option='.JNEWS_OPTION.'&act=mailing&task=testspam&mailingid='.$mailingid.'&tmpl=component', true, false, true );
			
	    	$html = '<a class="modal btn btn-small" href="'. $linkSpam.'" rel="{handler: \'iframe\', size: {x: 1050, y: 800}}" ><span style="float:left;"><img width=16 height=16 src="'. JNEWS_PATH_ADMIN_IMAGES2 .'toolbar/block.png"></span><span style="float:left; margin-left:8px;">'._JNEWS_MENU_SEND_TESTSPAM.'</span></a>';

			$bar->appendButton( 'Custom', $html );			
			JToolBarHelper::spacer();
		}
		
		JToolBarHelper::custom('preview', 'mail.png', 'mail.png', _JNEWS_MENU_SEND_TEST , false);
		
		JToolBarHelper::spacer();
		

		$listype = JRequest::getInt('listype', 0, 'request');
		
		if($listype==1){
			$bar = JToolBar::getInstance('toolbar');
			$linkViewOnline = jNews_Tools::completeLink( 'option='.JNEWS_OPTION.'&act=mailing&task=view&mailingid='.$mailingid.'&format=raw', true, false, true );
			$bar->appendButton( 'Popup', 'preview', _JNEWS_VIEW_BROWSER, $linkViewOnline );
			JToolBarHelper::spacer();
			
			$bar = JToolBar::getInstance('toolbar');
			$linkBut = jNews_Tools::completeLink( 'option='.JNEWS_OPTION.'&act=mailing&task=sendready&mailingid='.$mailingid, true, false, true );
			$bar->appendButton( 'Popup', 'sendT', _JNEWS_MENU_SEND, $linkBut );
			JToolBarHelper::spacer();
			
		}

		jNews_Menu::_editMailingPrev();
		JToolBarHelper::spacer();

		JToolBarHelper::custom('show', 'cancel.png', 'cancel.png', _JNEWS_MENU_CANCEL , false);
		JToolBarHelper::divider();
//		jNews_Menu::_wizardBtn();
		jNews_Menu::_cPanelBtn();
	 }

	 public static function QUEUE_MENU(){
	 	if(class_exists('jNews_QueueHTML')){
			$bar = JToolBar::getInstance('toolbar');
			$linkBut = jNews_Tools::completeLink( 'option='.JNEWS_OPTION.'&act=queue&task=pqueue&mailingid=0' , true, false, true );
			$bar->appendButton( 'Popup', 'process', _JNEWS_MENU_SEND_QUEUE, $linkBut );
			JToolBarHelper::spacer();
			JToolBarHelper::divider();
			JToolBarHelper::custom('block', 'lock.png', 'lock.png', _JNEWS_QUEUE_BLOCK , false);
			JToolBarHelper::custom('unblock', 'unblock.png','unblock.png', _JNEWS_QUEUE_UNBLOCK ,false);
			JToolBarHelper::spacer();
			JToolBarHelper::divider();
			JToolBarHelper::custom('delq', 'delete.png', 'delete.png', _JNEWS_DELETE , false);
			JToolBarHelper::custom('cleanq', 'folder.png','folder.png', _JNEWS_EMPTY_Q ,false);
			JToolBarHelper::divider();
			jNews_Menu::_wizardBtn( 'list-queue' );
			jNews_Menu::_cPanelBtn();
	 	}
	 }

	 public static function TEMPLATES_MENU(){
	 	if(class_exists('jNews_TemplatesHTML')){
	 		
			JToolbarHelper::addNew('add');
			
			JToolbarHelper::editList('edit');
						
			JToolbarHelper::publish('publish', 'JTOOLBAR_PUBLISH', true );
			JToolbarHelper::unpublish('unpublish', 'JTOOLBAR_UNPUBLISH', true );
	
			JToolBarHelper::custom( 'copy', 'refresh.png', 'refresh_f2.png', _JNEWS_MENU_COPY , true);
			
			JToolBarHelper::divider();			
			JToolbarHelper::deleteList('', 'delete', _JNEWS_DELETE );
	
			JToolBarHelper::divider();			
		 		
			JToolBarHelper::divider();
			JToolBarHelper::makedefault('default', 'Default');
			
	 		
	 		$bar = JToolBar::getInstance('toolbar');
	 		JHTML::_( 'behavior.modal' );

		    $html = '<a class="modal btn btn-small" href="'. jNews_Tools::completeLink('option='.JNEWS_OPTION.'&act=templates&task=tempupload', true, false, true ).'" rel="{handler: \'iframe\', size: {x: 850, y: 500}}" ><span style="float:left;"><img width=16 height=16 src="'. JNEWS_PATH_ADMIN_IMAGES2 .'toolbar/upload.png"></span><span style="float:left; margin-left:8px;">'._JNEWS_FILES_UPLOAD.'</span></a>';

			$bar->appendButton( 'Custom', $html );
			JToolBarHelper::divider();
			$html = '<a class="btn btn-small" target="_NEW" href="http://www.joobi.co/index.php?option=com_jlinks&controller=redirect&link=newsletter-templates"><span style="float:left;"><img width=16 height=16 src="'. JNEWS_PATH_ADMIN_IMAGES2 .'toolbar/more_templates.png"></span><span style="float:left; margin-left:8px;">'._JNEWS_MORE_TEMPLATES.'</span></a>';
			$bar->appendButton( 'Custom', $html );
			JToolBarHelper::divider();
			jNews_Menu::_wizardBtn( 'list-templates' );
			jNews_Menu::_cPanelBtn();
	 	}
	 }

	 public static function NEWTEMPLATE(){

	 	JToolBarHelper::custom('sendtest', 'mail.png', 'mail.png', _JNEWS_SENDTEST_TEMP , false);
		JToolBarHelper::divider();

	 	if(class_exists('jNews_TemplatesHTML')){

			$bar = JToolBar::getInstance('toolbar');
			$HTML = '<a class="modal btn btn-small" title="'._JNEWS_MAILING_TAG.'" href="'. jNews_Tools::completeLink('option='.JNEWS_OPTION.'&act=tags', true, false, true ).'" rel="{handler: \'iframe\', size: {x: 850, y: 500}}"><span style="float:left;"><img width=16 height=16 src="'. JNEWS_PATH_ADMIN_IMAGES2 .'toolbar/tag.png"/></span><span style="float:left; margin-left:8px;">'._JNEWS_MAILING_TAG.'</span></a>';
			
			$bar->appendButton( 'Custom', $HTML );
	 		JToolBarHelper::divider();
	 		JToolBarHelper::custom('apply', 'apply.png', 'apply.png', 'JTOOLBAR_APPLY' , false);
			JToolBarHelper::custom('save', 'save.png', 'save.png', 'JTOOLBAR_SAVE' , false);
			JToolBarHelper::divider();
			JToolBarHelper::custom('cancel', 'cancel.png', 'cancel.png', 'JTOOLBAR_CANCEL' , false);
			JToolBarHelper::divider();
			jNews_Menu::_wizardBtn( 'edit-template' );

	 	}
	 }

	  public static function EDITTEMPLATE(){
	 	if(class_exists('jNews_TemplatesHTML')){
	 		
	 		$script = 'function getTemplate() {
var form = form = document.adminForm;
template_id = form.template_id.value;
	 		}';

			$doc = JFactory::getDocument();
			$doc->addScriptDeclaration( $script);
			$template_id = JRequest::getVar('template_id');

	 		JToolBarHelper::custom('apply', 'apply.png', 'apply.png', 'JTOOLBAR_APPLY' , false);
	 		JToolBarHelper::custom('save', 'save.png', 'save.png', 'JTOOLBAR_SAVE' , false);
			JToolBarHelper::divider();
			JToolBarHelper::custom('cancel', 'cancel.png', 'cancel.png', 'JTOOLBAR_CANCEL' , false);
			JToolBarHelper::divider();
			
			JToolBarHelper::custom('sendtest', 'mail.png', 'mail.png', _JNEWS_SENDTEST_TEMP , false);
			JToolBarHelper::divider();

			$bar = JToolBar::getInstance('toolbar');
			
			$html1 = '<a class="modal btn btn-small" onclick="getTemplate()" title="'._JNEWS_MENU_PREVIEW.'" href="'. jNews_Tools::completeLink( 'option='.JNEWS_OPTION.'&act=templates&task=preview&template_id='.$template_id , true, false, true ).'" rel="{handler: \'iframe\', size: {x: 850, y: 500}}"><span style="float:left;"><img width=16 height=16 src="'. JNEWS_PATH_ADMIN_IMAGES2 .'toolbar/preview_template.png"></span><span style="float:left; margin-left:8px;">'._JNEWS_MENU_PREVIEW.'</span></a>';
			$bar->appendButton( 'Custom', $html1 );
			
			$HTML = '<a class="modal btn btn-small" title="'._JNEWS_MAILING_TAG.'" href="'. jNews_Tools::completeLink('option='.JNEWS_OPTION.'&act=tags', true, false, true ).'" rel="{handler: \'iframe\', size: {x: 850, y: 500}}"><span style="float:left;"><img width=16 height=16 src="'. JNEWS_PATH_ADMIN_IMAGES2 .'toolbar/tag.png"/></span><span style="float:left; margin-left:8px;">'._JNEWS_MAILING_TAG.'</span></a>';
			$bar->appendButton( 'Custom', $HTML );
			
			JToolBarHelper::divider();
			jNews_Menu::_wizardBtn( 'edit-template' );
	 	}
	 	
	 }

	 public static function CONFIGURATION(){

		JToolBarHelper::custom('apply', 'apply.png', 'apply.png', 'JTOOLBAR_APPLY' , false);
		JToolBarHelper::custom('save', 'save.png', 'save.png', 'JTOOLBAR_SAVE' , false);
		JToolBarHelper::custom('cancel', 'cancel.png', 'cancel.png', 'JTOOLBAR_CANCEL' , false);
		
		JToolBarHelper::divider();
	 	
	 	//check if acajoom datas are already transferred to jnews tables
	 	require_once( JNEWSPATH_CLASS . 'class.update.php');
	 	if(jNews_Update::checkAcajoom()){
	 		if(!jNews_Update::checkAcaUpdate()){
		 		JToolBarHelper::custom('acaupdate', 'import.png', 'import.png', _JNEWS_INSTALL_ACAUPDATEBTN, false);
		 		JToolBarHelper::divider();
	 		}
	 	}

	 	JToolBarHelper::custom('sendtest', 'mail.png', 'mail.png', _JNEWS_MENU_SEND_TEST , false);
		JToolBarHelper::spacer();

		if (class_exists('aca_archive') ) {
			JToolBarHelper::custom('archiveAll', 'archiveT.png', 'archiveT.png', _JNEWS_MENU_ARCHIVE_ALL, false);
			JToolBarHelper::spacer();
		}

		JToolBarHelper::custom('syncUsers','users.png','users.png', _JNEWS_MENU_SYNC_USERS ,false);
		JToolBarHelper::divider();

		jNews_Menu::_wizardBtn( 'configuration' );
		jNews_Menu::_cPanelBtn();
	 }

	 public static function CANCEL_ONLY($task) {
		JToolBarHelper::custom('cancelMailing', 'cancel.png', 'cancel.png', _JNEWS_MENU_CANCEL , false);
		JToolBarHelper::divider();
//		jNews_Menu::_wizardBtn();
		jNews_Menu::_cPanelBtn();
	 }

	 public static function STATISTICS() {

		$html = '<a class="btn btn-small" onclick ="javascript: submitbutton(\'refresh\')" href="#"> <img width=16 height=16 src="'. JNEWS_PATH_ADMIN_IMAGES2 .'toolbar/refreshT.png"/>'._JNEWS_MENU_REFRESH_STATS.'</a>';
		$bar = JToolBar::getInstance('toolbar');
		$bar->appendButton( 'Custom', $html );
		$html = '<a class="btn btn-small" onclick ="javascript: submitbutton(\'generate\')" href="#"> <img width=16 height=16 src="'. JNEWS_PATH_ADMIN_IMAGES2 .'toolbar/generate.png"/>'._JNEWS_MENU_GENERATE_STATS.'</a>';
		$bar = JToolBar::getInstance('toolbar');
		$bar->appendButton( 'Custom', $html );
			
		JToolBarHelper::divider();
		jNews_Menu::_wizardBtn( 'statistics' );
		jNews_Menu::_cPanelBtn();
	 }


	 public static function UPDATE() {
	 	jNews_Menu::_backBtn();
		jNews_Menu::_cPanelBtn();
	 }

	 public static function DOUPDATE() {
	 	jNews_Menu::_backBtn();
		jNews_Menu::_cPanelBtn();
	 }

	 public static function about() {
		jNews_Menu::_cPanelBtn();
	 }

	/**
	 * <p>public static function to create the wizard menu<p>
	 * @return boolean
	 */
	 public static function _wizardBtn( $name='' ) {
		
		include_once( JNEWSPATH_ADMIN . 'buttons' . DS . 'wizard.php' );	 	
	 	
	 	$bar = JToolBar::getInstance('toolbar');
		$bar->appendButton( 'Wizard', $name );
	 	
	 	return true;
	 	
	 }


	  /**
	  * <p>public static function to create the custom cpanel menu</p>
	  * @return boolean
	  */
	  public static function _cPanelBtn() {
	  	
	  	$html = '<a class="btn btn-small" href=\'index.php?option='.JNEWS_OPTION.'\'><img width=16 height=16 src="'. JNEWS_PATH_ADMIN_IMAGES2 .'toolbar/cpanelT.png"/></a>';
		$bar = JToolBar::getInstance('toolbar');
		$bar->appendButton( 'Custom', $html );
		
		return true;
		
	  }

/**
	  * <p>public static function to create the custom back menu</p>
	  * @return boolean
	  */
	  public static function _backBtn(){
	  	$html = '<a class="btn btn-small" href=\'javascript:history.go(-1)\'><span style="float:left;"><img width=16 height=16 src="'. JNEWS_PATH_ADMIN_IMAGES2 .'toolbar/backT.png"/></span><span style="float:left; margin-left:8px;">'._JNEWS_MENU_BACK.'</span></a>';
		$bar = JToolBar::getInstance('toolbar');
		$bar->appendButton( 'Custom', $html );
		return true;
	  }
	  
	  
/**
	  * <p>public static function to create the custom cpanel menu</p>
	  * @return boolean
	  */
	  public static function _editMailingPrev(){
		$mailingType = JRequest::getVar( 'listype' );
		$mailingid = JRequest::getVar('mailingid', '0');
		$listId = JRequest::getVar('listid', '0');

		$mailingid = ($mailingid==0) ? jNews_Mailing::getLastMailingId() : $mailingid;

	  	$html = '<a class="btn btn-small" href="index.php?option='.JNEWS_OPTION.'&act=mailing&task=edit&listype='.$mailingType.'&mailingid='.$mailingid.'&listid='.$listId.'"><span style="float:left;"><img width=16 height=16 src="'. JNEWS_PATH_ADMIN_IMAGES2 .'toolbar/editT.png"/></span><span style="float:left; margin-left:8px;">'._JNEWS_MENU_EDIT.'</span></a>';
		$bar = JToolBar::getInstance('toolbar');
		$bar->appendButton( 'Custom', $html );
		return true;
	  }


 }
 