<?php
/**
 * @package     Mosets
 * @subpackage  Profile Cover
 *
 * @copyright   Copyright (C) 2012-present Mosets Consulting, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Form Field class for Mosets Profile Cover.
 * Provides an input field for profile cover
 *
 * @package     Mosets
 * @subpackage  Profile Cover
 * @link        http://www.w3.org/TR/html-markup/input.file.html#input.file
 * @since       1.0
 */
class JFormFieldProfileCover extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  1.0
	 */
	public $type = 'ProfileCover';

	/**
	 * The Profile Cover plugin parameter
	 *
	 * @var    JRegistry
	 * @since  1.0
	 */
	public $params;

	/**
	 * The Profile Cover plugin parameter
	 *
	 * @var    Integer
	 * @since  1.0
	 */
	public $maxUploadSizeInBytes;

	/**
	 * The inline CSS style for IMG element
	 *
	 * @var    string
	 * @since  2.0
	 */
	public $inlineStyleImg = 'float:left;clear:left;margin:6px 0';

	/**
	 * The inline CSS style for LABEL element
	 *
	 * @var    string
	 * @since  2.0
	 */
	public $inlineStyleLabel = 'float:left;clear:none';

	/**
	 * The inline CSS style for INPUT element
	 *
	 * @var    string
	 * @since  2.0
	 */
	public $inlineStyleInput = 'float:left;clear:left;width:auto';

	/**
	 * Override by loading Profile Cover parameters.
	 *
	 * @param   JForm  $form  The form to attach to the form field object.
	 *
	 * @since   2.0
	 */
	public function __construct($form = null)
	{
		$plugin = JPluginHelper::getPlugin('user', 'profilecover');
		$this->params = new JRegistry($plugin->params);

		$this->maxUploadSizeInBytes = $this->params->get('maxUploadSizeInBytes', 2000000);

		parent::__construct($form);
	}

	/**
	 * Method to get the field input markup for the file field.
	 * Field attributes allow specification of a maximum file size and a string
	 * of accepted file extensions.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   1.0
	 */
	protected function getInput()
	{
		// Initialize some field attributes.
		$accept = $this->element['accept'] ? ' accept="' . (string) $this->element['accept'] . '"' : '';
		$size = $this->element['size'] ? ' size="' . (int) $this->element['size'] . '"' : '';
		$class = $this->element['class'] ? ' class="' . (string) $this->element['class'] . '"' : '';
		$disabled = ((string) $this->element['disabled'] == 'true') ? ' disabled="disabled"' : '';

		// Initialize JavaScript field attributes.
		$onchange = $this->element['onchange'] ? ' onchange="' . (string) $this->element['onchange'] . '"' : '';
		
		$profilecover = '';
		$remove_pp = '';

		if( !empty($this->value) ) {
			$path = JURI::root().'media/plg_user_profilecover/images/200/'.$this->value;

			// <IMG> element
			$profilecover .= '<img src="'.$path.'" ';

			if( !empty($this->inlineStyleImg) )
			{
				$profilecover .= 'style="' . $this->inlineStyleImg . '" ';
			}

			$profilecover .= '/>';

			// <INPUT> element for removing profile cover
			$remove_pp .= '<input type="checkbox" ';
			$remove_pp .= 'id="'.$this->id.'remove" ';
			$remove_pp .= 'name="'.$this->name.'[remove]" ';
			$remove_pp .= 'value="'.$this->value.'" ';

			if( !empty($this->inlineStyleInput) )
			{
				$remove_pp .= 'style="' . $this->inlineStyleInput . '" ';
			}

			$remove_pp .= '/>';

			// <LABEL> element
			$remove_pp .= '<label ';
			$remove_pp .= 'for="'.$this->id.'remove" ';

			if( !empty($this->inlineStyleLabel) )
			{
				$remove_pp .= 'style="' . $this->inlineStyleLabel . '" ';
			}

			$remove_pp .= '>';
			$remove_pp .= JText::_('PLG_USER_PROFILECOVER_FIELD_COVER_REMOVE');
			$remove_pp .= '</label>';
		}

		$message = '<p>';
		$message .= JText::sprintf('PLG_USER_PROFILECOVER_FIELD_MAXUPLOADSIZEINBYTES_MESSAGE', $this->maxUploadSizeInKB());
		$message .= '<br>';
		$message .= JText::_('PLG_USER_PROFILECOVER_FIELD_MINDIMENSION_MESSAGE');
		$message .= '</p>';

		return '<input type="file" name="' . $this->name . '" id="' . $this->id . '"' . ' value=""' . $accept . $disabled . $class . $size
			. $onchange . ' />'.$message.$profilecover.$remove_pp;
	}

	/**
	 * Return the configured parameter for maximum allowed uploaded file size.
	 *
	 * @return    int
	 * @since    2.0
	 */	protected function maxUploadSizeInKB()
	{
		return $this->maxUploadSizeInBytes / 1000;
	}
}
