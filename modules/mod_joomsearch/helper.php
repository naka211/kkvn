<?php
// $HeadURL: https://joomgallery.org/svn/joomgallery/JG-3/Modules/JoomSearch/trunk/helper.php $
// $Id: helper.php 4148 2013-03-18 16:05:32Z erftralle $
/**
* Module JoomSearch for JoomGallery
* by JoomGallery::Project Team
* @package JoomGallery
* @copyright JoomGallery::Project Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Helper class for module JoomSearch
 *
 */
class modJoomSearchHelper extends JoomInterface
{
  /**
   * Constructor
   *
   * @param   object  $params     backend parameters
   * @param   int     $module_id  the id of the module
   */
  public function __construct(&$params, $moduleid)
  {
    // Call the parent constructor
    parent::__construct();

    // Get the parameters
    $this->_getParams($params);

    // Include Javascripts if AJAX search activated
    if($this->getConfig('ajaxsearch') == 1)
    {
      $searchurl = JURI::Base();
      $doc       = JFactory::getDocument();

      // Include javascripts if not already done
      JHtml::_('behavior.framework', true);

      $doc->addScript(JURI::base().'media/mod_joomsearch/mod_joomsearch.js');
      $jsstart="    window.addEvent('domready', function(){
        jsmod".$moduleid."=new JoomSearchModule({searchurl: '".$searchurl."', moduleid:".$moduleid.", noresultstxt:'".JText::_('JSNORESULTS')."', baseURL: '".JURI::base()."'});
        jsmod".$moduleid.".initoptions();
      });";

      $doc->addScriptDeclaration($jsstart);
    }

    // Include common css
    // TODO
    // #js_searchform and #js_searchresults
    // $doc->addStyleSheet(JURI::base().'modules/mod_joomsearch/assets/mod_joomsearch.css');

    // Generate and include css
    $this->_renderCSS($moduleid);

    // Check cookie and fill the params for user panel
    // first view = default backend parameters
    // or existing cookie vars
    $this->_checkCookie($moduleid);
  }

  /**
   * Get the params set in module backend
   *
   * @param  object  $params  backend parameters
   * @return void
   */
  private function _getParams(&$params)
  {
    // Get the parameters and add them to the config
    $this->addConfig('itemid', $params->get('itemid', 0 ));
    if($this->getConfig('itemid') != 0)
    {
      $this->addConfig('itemidtxt', '&amp;Itemid='.$this->getConfig('itemid'));
    }
    else
    {
      $this->addConfig('itemidtxt', $this->getJoomId());
    }
    $this->addConfig('ajaxsearch', $params->get('ajaxsearch', 0));
    // Default settings
    $this->addConfig('limit', $params->get('limit', 4 ));
    $this->addConfig('defcatorimg', $params->get('defcatorimg', 0 ));
    $this->addConfig('defcatid', $params->get('defcatid', '' ));

    $this->addConfig('syncjoom' ,$params->get('syncjoom', 0 ));

    // Synchronize with view of JoomGallery
    if($this->getConfig('syncjoom') == 1)
    {
      // Check if in a view of JoomGallery
      $option = $this->_mainframe->input->getString('option', '');

      if($option == 'com_joomgallery')
      {
        // Check if in detail or category view
        $view = $this->_mainframe->input->getString('view', '');
        if($view == 'category')
        {
          $catid = $this->_mainframe->input->getInt('catid', 0);
          // Override/fill defcatid
          $this->addConfig('defcatid', $catid);
        }
        else if($view=='detail')
        {
          $id = $this->_mainframe->input->getInt('id', 0);

          // Get the catid of picture
          $catid = $this->_getCatid($id);
          // Override/fill defcatid
          $this->addConfig('defcatid', $catid);
        }
      }
    }

    $this->addConfig('defsubcats', $params->get('defsubcats', '' ));
    $this->addConfig('defsearchimgdescr', $params->get('defsearchimgdescr',1));
    $this->addConfig('defsearchcomments', $params->get('defsearchcomments',0));
    $this->addConfig('defsearchauthors', $params->get('defsearchauthors',0 ));
    $this->addConfig('defsearchcatdescr', $params->get('defsearchcatdescr',0 ));

    // User panel settings
    $this->addConfig('showusrpanel', $params->get('showusrpanel', 1 ));
    $this->addConfig('usrlimit', $params->get('usrlimit', 0 ));
    $this->addConfig('usrcatorimg', $params->get('usrcatorimg', 0 ));
    $this->addConfig('usrsearchimgdescr', $params->get('usrsearchimgdescr', 1));
    $this->addConfig('usrsearchcomments', $params->get('usrsearchcomments', 0));
    $this->addConfig('usrsearchauthors', $params->get('usrsearchauthors', 0 ));
    $this->addConfig('usrsearchcatdescr', $params->get('usrsearchcatdescr', 0 ));

    // Layout settings
    $this->addConfig('inputboxwidth', $params->get('inputboxwidth', 0 ));
    $this->addConfig('resultwidth', $params->get('resultwidth', 0 ));
    $this->addConfig('resultheight', $params->get('resultheight', 0 ));
    $this->addConfig('srchbtnshow', $params->get('srchbtnshow', 0 ));
    $this->addConfig('srchbtntext', $params->get('srchbtntext', JText::_('JSSEARCH')));
    $this->addConfig('srchbtnimg', $params->get('srchbtnimg', 0 ));
    $this->addConfig('srchbtnpos', $params->get('srchbtnpos', 0 ));
  }

  /**
   * Generate the CSS for module instance
   *
   * @param   $moduleid
   * @return  void
   */
  private function _renderCSS($moduleid)
  {
    $css = '';

    //$css="#js_searchform$moduleid {\n"
    //  ."  background:#fff;\n"
    //  ."}\n";

    if($this->getConfig('inputboxwidth') > 0)
    {
      $css .= "#js_searchinput$moduleid {\n"
        ."width:".$this->getConfig('inputboxwidth')."px;\n"
        ."}\n";
    }

    $css .= "#js_searchresults$moduleid {\n";
    if($this->getConfig('resultwidth') > 0)
    {
      $css .= "  width:".$this->getConfig('resultwidth')."px;\n";
    }

    if($this->getConfig('resultheight') > 0)
    {
      $css .= "  height:".$this->getConfig('resultheight')."px;\n";
    }
    $css .= "  background-color:#fff;\n"
      ."  padding:0.5em;\n"
      ."  border:1px solid #000;\n"
      ."  position:fixed;\n"
      ."  margin:0;\n"
      ."  z-index:1000;\n"
      ."  visibility:hidden;\n"
      ."  overflow-x:auto;\n"
      ."}";

    $doc = JFactory::getDocument();
    $doc->addStyleDeclaration($css);
  }

  /**
   * Cookiehandling for actual settings in user panel
   * if not existent create it with params of default settings
   *
   * @param  $moduleid
   * @return void
   */
  private function _checkCookie($moduleid)
  {
    // Check a cookie for module instance
    $modcookie = null;
    if(isset($_COOKIE['joomsearch'.$moduleid]))
    {
      $jscookie = $_COOKIE['joomsearch'.$moduleid];
      $modcookie = @explode('-',$jscookie);
      // Check if cookie valid
      if(is_array($modcookie) && count($modcookie) == 6)
      {
        $this->addConfig('ulimitval', $modcookie[0]);
        $this->addConfig('ucatorimgval', $modcookie[1]);
        $this->addConfig('uimgdescrval', $modcookie[2]);
        $this->addConfig('ucmtval', $modcookie[3]);
        $this->addConfig('uauthorsval', $modcookie[4]);
        $this->addConfig('ucatdescrval', $modcookie[5]);
      }
      else
      {
        // Otherwise set defaults
        $this->addConfig('ulimitval', $this->getConfig('limit'));
        $this->addConfig('ucatorimgval', $this->getConfig('defcatorimg'));
        $this->addConfig('uimgdescrval', $this->getConfig('defsearchimgdescr'));
        $this->addConfig('ucmtval', $this->getConfig('defsearchcomments'));
        $this->addConfig('uauthorsval', $this->getConfig('defsearchauthors'));
        $this->addConfig('ucatdescrval', $this->getConfig('defsearchcatdescr'));
      }
    }
    else
    {
      // Otherwise set defaults
      $this->addConfig('ulimitval', $this->getConfig('limit'));
      $this->addConfig('ucatorimgval', $this->getConfig('defcatorimg'));
      $this->addConfig('uimgdescrval', $this->getConfig('defsearchimgdescr'));
      $this->addConfig('ucmtval', $this->getConfig('defsearchcomments'));
      $this->addConfig('uauthorsval', $this->getConfig('defsearchauthors'));
      $this->addConfig('ucatdescrval', $this->getConfig('defsearchcatdescr'));
    }
  }

  /**
   * Get the id of category for image in detail view
   *
   * @param  int  $id  id of the image
   * @return int  the category id of the image
   */
  function _getCatid($id)
  {
    $db = JFactory::getDBO();

    $query = $db->getQuery(true)
          ->select('catid')
          ->from(_JOOM_TABLE_IMAGES)
          ->where('id = '.$id);
    $db->setQuery($query);

    return $db->loadResult();
  }
}