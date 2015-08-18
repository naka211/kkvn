<?php
// $HeadURL: https://joomgallery.org/svn/joomgallery/JG-3/Modules/JoomSearch/trunk/tmpl/default.php $
// $Id: default.php 4109 2013-02-26 10:41:21Z erftralle $
/**
* Module JoomSearch for JoomGallery
* by JoomGallery::Project Team
* @package JoomGallery
* @copyright JoomGallery::Project Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/
// No direct access
defined('_JEXEC') or die('Restricted access');
$jo = $joomsearchObj; ?>

<div class="joomsearch<?php echo $params->get('moduleclass_sfx') ?>">
<?php if(is_null($jo) || version_compare($jo->getGalleryVersion(), '3.0', 'lt')): ?>
  <p class="alert alert-error">
  <?php echo JText::_('JSJOOMGALLERY_NOT_INSTALLED_OR_OUTDATED'); ?>
  </p>
<?php else: ?>
  <form id="js_searchform<?php echo $moduleid; ?>" action="<?php echo JURI::Base(); ?>" method="post">
    <input type="hidden" name="searchphrase" value="all" />
    <input type="hidden" name="view" value="search" />
<?php if($jo->getConfig('ajaxsearch')): ?>
    <input type="hidden" name="tmpl" value="component" />
    <input type="hidden" name="type" value="raw" />
<?php endif; ?>
<?php if($jo->getConfig('itemid') != 0): ?>
    <input type="hidden" name="Itemid" value="<?php echo $jo->getConfig("itemid"); ?> " />
<?php endif; ?>
    <input type="hidden" name="option" value="com_search" />
    <input type="hidden" name="areas[0]" value="joomgallery" />
    <input type="hidden" name="limit" value="0" />
<?php if ($jo->getConfig("defcatid") != false): ?>
    <input type="hidden" name="joomsearchcatid" value="<?php echo $jo->getConfig("defcatid"); ?>" />
    <input type="hidden" name="joomsearchsubcats" value="<?php echo $jo->getConfig("defsubcats"); ?>" />
<?php endif;

if($jo->getConfig("srchbtnshow") == 1):
  if ($jo->getConfig("srchbtnimg") == 1):
    $buttonhtml = '<input type="image" value="'.$jo->getConfig("srchbtntext").'" class="button" src="'.JURI::base().'media/mod_joomsearch/search.gif" />';
  else:
    $buttonhtml = '<input class="btn btn-small btn-primary" type="submit" name="button" id="js_searchsubmit'.$moduleid.'" value="'.$jo->getConfig("srchbtntext").'" />';
  endif;
  // Button/Image right or bottom
  if ($jo->getConfig("srchbtnpos") == 0 || $jo->getConfig("srchbtnpos") == 3): ?>
    <input class="input-small" type="text" name="searchword" id="js_searchinput<?php echo $moduleid; ?>" />
<?php
    if($jo->getConfig("srchbtnpos") == 3): ?>
    <br />
<?php
    endif;
      echo $buttonhtml;
  else:
    // Button/Image left or top
    echo $buttonhtml;
    if ($jo->getConfig("srchbtnpos") == 2): ?>
    <br />
<?php
    endif;?>
    <input class="input-small" type="text" name="searchword" id="js_searchinput<?php echo $moduleid; ?>" />
<?php
  endif;
else:?>
    <input class="input-medium" type="text" name="searchword" id="js_searchinput<?php echo $moduleid; ?>" />
<?php
endif; ?>
    <input type="hidden" name="ordering" value="newest" />
<?php
// Search in categories or images
// can be overridden by user in frontend if activated
if(    $jo->getConfig("showusrpanel") == 0
    || ($jo->getConfig("showusrpanel") == 1
        && $jo->getConfig("usrlimit") == 0)):?>
    <input type="hidden" name="joomsearchcatorimg" value="<?php echo $jo->getConfig("defcatorimg"); ?>" />
<?php
endif;

// Include the user panel elements if activated
// if an option deactivated send the default value
if($joomsearchObj->getConfig('showusrpanel') == 1):
  // Search limit
  if ($jo->getConfig("usrlimit") == 1): ?>
  <label><strong><?php echo JText::_('JSSHOWUSRLIM'); ?></strong></label>
  <input class="input-mini" id="js_limit<?php echo $moduleid; ?>" type="text" name="joomsearchlimit" size="4" value="<?php echo $jo->getConfig("ulimitval"); ?>" />
<?php
  else: ?>
  <input type="hidden" name="joomsearchlimit" value="<?php echo $jo->getConfig("limit"); ?>" />
<?php
  endif;
  // Choose cat/img/bot search
  if ($jo->getConfig("usrcatorimg") == 1): ?>
  <div>
    <label><strong><?php echo JText::_('JSSHOWUSRCATORIMG'); ?></strong></label>
    <select class="input-medium" id="js_catorimg<?php echo $moduleid; ?>" name="joomsearchcatorimg">
<?php
    if ($jo->getConfig("ucatorimgval") == 0): ?>
      <option selected="selected" value="0"><?php echo JText::_('JSCAT'); ?></option>
      <option value="1"><?php echo JText::_('JSPIC'); ?></option>
<?php
    else: ?>
      <option value="0"><?php echo JText::_('JSCAT'); ?></option>
      <option selected="selected" value="1"><?php echo JText::_('JSPIC'); ?></option>
<?php
    endif; ?>
    </select>
  </div>
<?php
  else:?>
  <input type="hidden" name="joomsearchcatorimg" value="<?php echo $jo->getConfig("defcatorimg"); ?>" />
<?php
  endif;
  // Additional search in image description
  if ($jo->getConfig("usrsearchimgdescr") == 1): ?>
  <div id="js_imgdescr<?php echo $moduleid; ?>">
    <label><strong><?php echo JText::_('JSSEARCHDESCRIMG'); ?></strong></label>
<?php
    if ($jo->getConfig("uimgdescrval") == 0): ?>
    <label class="radio inline">
      <input id="js_imgdescrno<?php echo $moduleid; ?>" type="radio" name="joomsearchimgdescr" value="0" checked="checked"> <?php echo JText::_('JSNO'); ?>
    </label>
    <label class="radio inline">
      <input id="js_imgdescryes<?php echo $moduleid; ?>" type="radio" name="joomsearchimgdescr" value="1"> <?php echo JText::_('JSYES'); ?>
    </label>
<?php
    else: ?>
    <label class="radio inline">
      <input id="js_imgdescrno<?php echo $moduleid; ?>" type="radio" name="joomsearchimgdescr" value="0"> <?php echo JText::_('JSNO'); ?>
    </label>
    <label class="radio inline">
      <input id="js_imgdescryes<?php echo $moduleid; ?>" type="radio" name="joomsearchimgdescr" value="1" checked="checked" > <?php echo JText::_('JSYES'); ?>
    </label>
<?php
    endif; ?>
  </div>
  <?php
  else: ?>
  <input type="hidden" name="joomsearchimgdescr" value="<?php echo $jo->getConfig("defsearchimgdescr"); ?>" />
<?php
  endif;
  // Additional search in comments
  if ($jo->getConfig("usrsearchcomments") == 1): ?>
  <div id="js_comments<?php echo $moduleid;?>">
    <label><strong><?php echo JText::_('JSSEARCHCOMM'); ?></strong></label>
<?php
    if ($jo->getConfig("ucmtval") == 0): ?>
    <label class="radio inline">
      <input checked="checked" id="js_commentsno<?php echo $moduleid; ?>" type="radio" name="joomsearchcomments" value="0"> <?php echo JText::_('JSNO'); ?>
    </label>
    <label class="radio inline">
      <input id="js_commentsyes<?php echo $moduleid; ?>" type="radio" name="joomsearchcomments" value="1"> <?php echo JText::_('JSYES'); ?>
    </label>
<?php
    else:?>
    <label class="radio inline">
      <input id="js_commentsno<?php echo $moduleid; ?>" type="radio" name="joomsearchcomments" value="0"> <?php echo JText::_('JSNO'); ?>
    </label>
    <label class="radio inline">
      <input checked="checked" id="js_commentsyes<?php echo $moduleid; ?>" type="radio" name="joomsearchcomments" value="1"> <?php echo JText::_('JSYES'); ?>
    </label>
<?php
    endif; ?>
  </div>
<?php
  else: ?>
  <input type="hidden" name="joomsearchcomments" value="<?php echo $jo->getConfig("defsearchcomments"); ?>" />
<?php
  endif;
  // Additional search for authors
  if ($jo->getConfig("usrsearchauthors") == 1): ?>
  <div id="js_authors<?php echo $moduleid; ?>">
    <label><strong><?php echo JText::_('JSSEARCHAUTH'); ?></strong></label>
<?php
    if ($jo->getConfig("uauthorsval") == 0): ?>
    <label class="radio inline">
      <input id="js_authorsno<?php echo $moduleid; ?>" type="radio" name="joomsearchauthors" value="0" checked="checked"> <?php echo JText::_('JSNO'); ?>
    </label>
    <label class="radio inline">
      <input id="js_authorsyes<?php echo $moduleid; ?>" type="radio" name="joomsearchauthors" value="1"> <?php echo JText::_('JSYES'); ?>
    </label>
<?php
    else: ?>
      <label class="radio inline">
        <input id="js_authorsno<?php echo $moduleid; ?>" type="radio" name="joomsearchauthors" value="0"> <?php echo JText::_('JSNO'); ?>
      </label>
      <label class="radio inline">
        <input checked="checked" id="js_authorsyes<?php echo $moduleid; ?>" type="radio" name="joomsearchauthors" value="1"> <?php echo JText::_('JSYES'); ?>
      </label>
<?php
    endif; ?>
  </div>
<?php
  else: ?>
  <input type="hidden" name="joomsearchauthors" value="<?php echo $jo->getConfig("defsearchauthors"); ?>" />
<?php
  endif;
  // Additional search in cat descriptions
  if ($jo->getConfig("usrsearchcatdescr") == 1): ?>
  <div id="js_catdescr<?php echo $moduleid; ?>">
    <label><strong><?php echo JText::_('JSSEARCHDESCCAT'); ?></strong></label>
<?php
    if ($jo->getConfig("ucatdescrval") == 0): ?>
    <label class="radio inline">
      <input checked="checked" id="js_catdescrno<?php echo $moduleid; ?>" type="radio" name="joomsearchcatdescr" value="0"> <?php echo JText::_('JSNO'); ?>
    </label>
    <label class="radio inline">
      <input id="js_catdescryes<?php echo $moduleid; ?>" type="radio" name="joomsearchcatdescr" value="1"> <?php echo JText::_('JSYES'); ?>
    </label>
<?php
    else: ?>
    <label class="radio inline">
      <input id="js_catdescrno<?php echo $moduleid; ?>" type="radio" name="joomsearchcatdescr" value="0"> <?php echo JText::_('JSNO'); ?>
    </label>
    <label class="radio inline">
      <input checked="checked" id="js_catdescryes<?php echo $moduleid; ?>" type="radio" name="joomsearchcatdescr" value="1"> <?php echo JText::_('JSYES'); ?>
    </label>
<?php
    endif; ?>
  </div>
<?php
  else:?>
  <input type="hidden" name="joomsearchcatdescr" value="<?php echo $jo->getConfig("defsearchcatdescr"); ?>" />
<?php
  endif;
else:
  // No user panel, default values
?>
    <input type="hidden" name="joomsearchlimit" value="<?php echo $jo->getConfig("limit"); ?>" />
    <input type="hidden" name="joomsearchcatorimg" value="<?php echo $jo->getConfig("defcatorimg"); ?>" />
    <input type="hidden" name="joomsearchimgdescr" value="<?php echo $jo->getConfig("defsearchimgdescr"); ?>" />
    <input type="hidden" name="joomsearchcomments" value="<?php echo $jo->getConfig("defsearchcomments"); ?>" />
    <input type="hidden" name="joomsearchauthors" value="<?php echo $jo->getConfig("defsearchauthors"); ?>" />
    <input type="hidden" name="joomsearchcatdescr" value="<?php echo $jo->getConfig("defsearchcatdescr"); ?>" />
<?php
endif; ?>
  </form>
  <div id="js_searchresults<?php echo $moduleid; ?>"></div>
<?php endif; ?>
</div>