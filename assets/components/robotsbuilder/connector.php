<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
}
else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var RobotsBuilder $RobotsBuilder */
$RobotsBuilder = $modx->getService('robotsbuilder', 'RobotsBuilder', $modx->getOption('robotsbuilder_core_path', null,
        $modx->getOption('core_path') . 'components/robotsbuilder/') . 'model/robotsbuilder/'
);
$modx->lexicon->load('robotsbuilder:default');

// handle request
$corePath = $modx->getOption('robotsbuilder_core_path', null, $modx->getOption('core_path') . 'components/robotsbuilder/');
$path = $modx->getOption('processorsPath', $RobotsBuilder->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));