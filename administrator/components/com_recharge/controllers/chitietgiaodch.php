<?php
/**
 * @version     1.0.0
 * @package     com_recharge
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Nguyen Thanh Trung <nttrung211@yahoo.com> - 
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Chitietgiaodch controller class.
 */
class RechargeControllerChitietgiaodch extends JControllerForm
{

    function __construct() {
        $this->view_list = 'cacgiaodich';
        parent::__construct();
    }

}