<?php
/**
 * @package     Mosets
 * @subpackage  ProfileCover
 *
 * @copyright   Copyright (C) 2012-present Mosets Consulting, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

jimport('joomla.filesystem.file');

DEFINE('PROFILECOVER_PATH_1000', JPATH_ROOT.'/media/plg_user_profilecover/images/1000/');
DEFINE('PROFILECOVER_PATH_200', JPATH_ROOT.'/media/plg_user_profilecover/images/200/');
DEFINE('PROFILECOVER_PATH_ORIGINAL', JPATH_ROOT.'/media/plg_user_profilecover/images/original/');
DEFINE('PROFILECOVER_PATH_FILLER', JPATH_ROOT.'/media/plg_user_profilecover/images/filler/');

DEFINE('PROFILECOVER_SIZE_FILLER', 'filler');
DEFINE('PROFILECOVER_SIZE_ORIGINAL', 'original');
DEFINE('PROFILECOVER_SIZE_1000', 1000);
DEFINE('PROFILECOVER_SIZE_200', 200);

/**
 * Class to retrieve profile cover of a user
 *
 * @package     Mosets
 * @subpackage  ProfileCover
 * @since       1.0
 */
class ProfileCover
{
	/**
	 * @var    int  User ID
	 * @since  1.0
	 */
	public $userId = null;
	
	/**
	 * @var    string  File name of the profile cover
	 * @since  1.0
	 */
	public $filename = null;
	
	/**
	 * @const  string
	 * @since  1.0
	 */
	const PROFILE_KEY = 'profilecover.file';
	
	/**
	 * Class constructor.
	 *
	 * @param   int  $userId  User ID
	 *
	 * @since   1.0
	 */
	public function __construct($userId)
	{
		if( is_numeric($userId) )
		{
			$this->userId = $userId;
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Method to set User ID
	 *
	 * @param   int  $userId    User ID
	 *
	 * @since   1.0
	 */
	public function setUserId($userId)
	{
		$this->userId = $userId;
	}
	
	/**
	 * Method to set Profile Cover filename
	 *
	 * @param   str  $filename    Profile cover filename
	 *
	 * @since   1.0
	 */
	public function setFilename($filename)
	{
		$this->filename = $filename;
	}
	
	/**
	 * Get the user's profile cover filename.
	 *
	 * @return  str		The profile cover filename.
	 *
	 * @since   1.0
	 */
	public function getFilename()
	{
		if( !empty($this->filename) )
		{
			return $this->filename;
		}
		else
		{
			$db = JFactory::getDbo();
			$query = $db->getQuery(true)->select('profile_value')->from('#__user_profiles')
				->where('profile_key = ' . $db->quote(ProfileCover::PROFILE_KEY))
				->where('user_id = '.(int) $this->userId);
			$db->setQuery($query);
			$filename = $db->loadResult();

			if( !is_null($filename) )
			{
				$this->filename = $filename;
				return $filename;
			} else {
				return false;
			}			
		}
	}

	/**
	 * Get the user's profile cover URL.
	 *
	 * @param int $size
	 *
	 * @return  str        The profile cover URL.
	 *
	 * @since   1.0
	 */
	public function getFillerURL($size=PROFILECOVER_SIZE_200)
	{
		return JURI::root().'media/plg_user_profilecover/images/'.PROFILECOVER_SIZE_FILLER.'/'.$size.'.png';
	}

	/**
	 * Get the user's profile cover URL.
	 *
	 * @param int $size
	 *
	 * @return  str        The profile cover URL.
	 *
	 * @since   1.0
	 */
	public function getURL($size=PROFILECOVER_SIZE_200)
	{
		if( $filename = $this->getFilename() )
		{
			return JURI::root().'media/plg_user_profilecover/images/'.$size.'/'.$this->getFilename();
		} else {
			return false;
		}
	}

	/**
	 * Get the user's profile cover path.
	 *
	 * @param int $size
	 *
	 * @return  str        The profile cover path.
	 *
	 * @since   1.0
	 */
	public function getPath($size=PROFILECOVER_SIZE_200)
	{
		if( $filename = $this->getFilename() )
		{
			return JPATH_BASE.'/media/plg_user_profilecover/images/'.$size.'/'.$this->getFilename();
		} else {
			return false;
		}
	}

	/**
	 * Method to check if a profile cover of a certain size exists
	 *
	 * @param int $size
	 *
	 * @internal param \The $string size of the profile cover to check
	 *
	 * @return  boolean    True if the profile cover exists
	 *
	 * @since    1.0
	 */
	public function exists($size=PROFILECOVER_SIZE_200)
	{
		if( $filename = $this->getFilename() )
		{
			return JFile::exists($this->getPath($size));
		} else {
			return false;
		}
	}

	/**
	 * Render the IMG HTML element.
	 *
	 * @param int $size    The size of the rendered profile cover image
	 * @param string    $alt     The IMG element 'alt' attribute.
	 * @param array     $attribs Additional attributes to be inserted in to the rendered HTML
	 *
	 * @return  string The rendered IMG element.
	 *
	 * @since 1.0
	 */
	public function toHTML($size = PROFILECOVER_SIZE_200, $alt = '', $attribs = array())
	{
		if (is_array($attribs))
		{
			$attribs = JArrayHelper::toString($attribs);
		}

		$html = '';
		if( $this->exists() )
		{
			$html .= '<img src="' . $this->getURL($size).'" alt="' . $alt . '" ' . $attribs . '/>';
		} else {
			$html .= '<img src="' . $this->getFillerURL($size) . '" alt="' . $alt . '" ' . $attribs . '/>';
		}
		return $html;
	}
}
?>