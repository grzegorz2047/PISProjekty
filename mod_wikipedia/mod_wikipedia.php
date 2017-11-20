<?php

// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

$country = $params->get('query', 'Poznań');
$hello = wikipediaHelper::getJson($country);

require JModuleHelper::getLayoutPath('mod_wikipedia');
?>