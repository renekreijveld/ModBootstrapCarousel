<?php
/**
 * Bootstrap Carousel Module
 * @package     BoostrapCarousel
 * @subpackage  Modules
 * @copyright   Copyright (C) 2012 Rene Kreijveld
 * @author      Rene Kreijveld <email@renekreijvel.nl>
 *              Based on the original work of Christian Hent, www.zenjiapps.com
 * @license     GNU General Public License version 2 or later
 *
 * @version      1.1.8
 */

// no direct access
defined('_JEXEC') or die;

class modbootstrapcarouselHelper
{
	public static function getList(&$params)
	{
		// Get the dbo
		$db = JFactory::getDbo();

		// Get an instance of the generic articles model
		$model = JModelLegacy::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		// Set application parameters in model
		$app = JFactory::getApplication();
		$appParams = $app->getParams();
		$model->setState('params', $appParams);

		// Set the filters based on the module params
		$model->setState('list.start', 0);
		$model->setState('list.limit', (int) $params->get('count', 10));
		$model->setState('filter.published', 1);

		// Access filter
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');
		$authorised = JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id'));
		$model->setState('filter.access', $access);

		// Category filter
		$model->setState('filter.category_id', $params->get('catid', array(),'title'));
		
		// Ordering
		$model->setState('list.ordering', $params->get('article_ordering', 'a.ordering'));
		$model->setState('list.direction', $params->get('article_ordering_direction', 'ASC'));

		$items = $model->getItems();
		
		return $items;
	}
}