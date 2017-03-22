<?php
/** @var modX $modx */
if ($modx->context->key == 'mgr') return;
switch ($modx->event->name) {
    case 'OnHandleRequest':
        $output = '';
        $uri = substr($_SERVER['REQUEST_URI'], 1);
        switch ($uri) {
            case 'robots.txt':
            case 'sitemap.xml':
                $modelPath = $modx->getOption('robotsbuilder_core_path',null,$modx->getOption('core_path').'components/robotsbuilder/').'model/';
                $modx->addPackage('robotsbuilder', $modelPath);
                if ($robots = $modx->getObject('RobotsBuilderItem', array('context' => $modx->context->key, 'type' => $uri, 'active' => true))) {
                    if ($chunk = $modx->newObject('modChunk', array('snippet' => $robots->get('content')))){
                        $chunk->setCacheable(false);
                        $output = $chunk->process();
                    }
                }
                break;
            default:
                break;
        }
        if ($output) {
            switch ($uri) {
                case 'robots.txt':
                    header('Content-Type: text/plain');
                    break;
                case 'sitemap.xml':
                    header('Content-Type: text/xml');
                    break;
                default:
                    return;
                    break;
            }
            print $output;
            die();
        }
        break;
    default:
        break;
}
return;