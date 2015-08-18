<?php
// $HeadURL: https://joomgallery.org/svn/joomgallery/JG-3/Modules/JoomSearch/trunk/mod_joomsearch.php $
// $Id: mod_joomsearch.php 4109 2013-02-26 10:41:21Z erftralle $
/**
* Module JoomSearch for JoomGallery
* by JoomGallery::Project Team
* @package JoomGallery
* @copyright JoomGallery::Project Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// No direct access
defined('_JEXEC') or die('Restricted access');

$jg_ifpath     = JPATH_ROOT.'/components/com_joomgallery/interface.php';
$joomsearchObj = null;

if(file_exists($jg_ifpath))
{
  // Include JoomGallery's interface class
  require_once $jg_ifpath;

  // Include the helper class only once
  require_once dirname(__FILE__).'/helper.php';

  // Id of actual module instance
  $moduleid = $module->id;

  // Create helper object
  $joomsearchObj = new modJoomSearchHelper($params, $moduleid);
}

// Show the module
require JModuleHelper::getLayoutPath('mod_joomsearch', $params->get('layout', 'default'));