<?php
defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.formvalidator');
?>
<form id="<?php echo $formName; ?>" action="<?php echo JRoute::_('index.php'); ?>" method="post" name="<?php echo $formName ?>" class="form-validate" >
	<input type="text" placeholder="Tên" class="input-cl form-control required">
	<input type="text" placeholder="Email" class="input-cl form-control required" style="margin-top:10px;">
	<button type="submit" class="go-btn btn submit-small-btn validate">Search</button>
</form>
