<?php
defined('_JEXEC') or die('Access Denied!');
if ( strtolower( substr( JPATH_ROOT, strlen(JPATH_ROOT)-13 ) ) =='administrator' ) {
	$adminPath = strtolower( substr( JPATH_ROOT, strlen(JPATH_ROOT)-13 ) );
} else {
	$adminPath = JPATH_ROOT;
}

if ( !defined('DS') ) define( 'DS', DIRECTORY_SEPARATOR );
$mainAdminPathDefined = $adminPath . DS.'components'.DS.'com_jnews'.DS.'defines.php';
?>
<form name="modjnewsForm1" method="post" action="<?php echo JURI::base();?>index.php?option=com_jnews" class="validation">
	<input type="text" placeholder="Tên" class="input-cl form-control" name="name">
	<input type="text" placeholder="Email" class="input-cl form-control" style="margin-top:10px;" name="email">
	<button type="submit" class="go-btn btn submit-small-btn">Subscribe</button>
	<input type="hidden" name="act" value="subscribe" />
	<input type="hidden" name="redirectlink" value="index.php?option=com_content&view=article&id=10" />
	<input type="hidden" name="listname" value="1" />
	<input type="hidden" id="passwordA" name="passwordA" value="<?php echo crypt($GLOBALS[JNEWS.'url_pass'],$GLOBALS[JNEWS.'url_pass']);?>" />
	<input type="hidden" name="fromSubscribe" value="1" />
	<input type="hidden" name="receive_html" value="1" />
	<?php echo JHtml::_( 'form.token' );?>
</form>
