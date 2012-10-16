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

// include dependancies
require_once dirname(__FILE__).'/helper.php';

// include JS dependancies (jquery and bootstrap js)
// this is normally included in the bootstrap template
$doc 	= JFactory::getDocument();
$mpath 	= JURI::root(true) . '/media/mod_bootstrap_carousel/';
if ($params->get('jquery') == 1) $doc->addScript($mpath.'/js/jquery.min.js'); 
if ($params->get('bootstrap') == 1) $doc->addScript($mpath.'/js/bootstrap.min.js');

// get data
$list	= &modbootstrapcarouselHelper::getList($params);

// load JSON string into the registry and merge with item params
foreach ($list as $item) {
	$image = new JRegistry;
	$image->loadString($item->images, 'JSON');
	$item->params->merge($image);
}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_bootstrap_carousel', $params->get('layout', 'default'));