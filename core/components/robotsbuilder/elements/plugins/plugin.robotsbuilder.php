<?php
@ini_set('display_errors', 1);
/** @var modX $modx */
if ($modx->context->key == 'mgr') return;
switch ($modx->event->name) {
    case 'OnHandleRequest':
        if ($_SERVER['REQUEST_URI'] == '/robots.txt') {
            $modelPath = $modx->getOption('robotsbuilder_core_path',null,$modx->getOption('core_path').'components/robotsbuilder/').'model/';
            $modx->addPackage('robotsbuilder', $modelPath);
            if ($robots = $modx->getObject('RobotsBuilderItem', array('context' => $modx->context->key, 'active' => true))) {
                if ($chunk = $modx->newObject('modChunk', array('snippet' => $robots->get('content')))){
                    $chunk->setCacheable(false);
                    $output = $chunk->process();
                }
            }
        }
        if ($output) {
            header('Content-Type: text/plain');
            print $output;
            die();
        }
        break;
    default:
        break;
}
return;