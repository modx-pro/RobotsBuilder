<?php

/**
 * The home manager controller for RobotsBuilder.
 *
 */
class RobotsBuilderHomeManagerController extends modExtraManagerController
{
    /** @var RobotsBuilder $RobotsBuilder */
    public $RobotsBuilder;


    /**
     *
     */
    public function initialize()
    {
        $path = $this->modx->getOption('robotsbuilder_core_path', null,
                $this->modx->getOption('core_path') . 'components/robotsbuilder/') . 'model/robotsbuilder/';
        $this->RobotsBuilder = $this->modx->getService('robotsbuilder', 'RobotsBuilder', $path);
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('robotsbuilder:default');
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('robotsbuilder');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->RobotsBuilder->config['cssUrl'] . 'mgr/main.css');
        $this->addCss($this->RobotsBuilder->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
        $this->addJavascript($this->RobotsBuilder->config['jsUrl'] . 'mgr/robotsbuilder.js');
        $this->addJavascript($this->RobotsBuilder->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->RobotsBuilder->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->RobotsBuilder->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->RobotsBuilder->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->RobotsBuilder->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->RobotsBuilder->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        RobotsBuilder.config = ' . json_encode($this->RobotsBuilder->config) . ';
        RobotsBuilder.config.connector_url = "' . $this->RobotsBuilder->config['connectorUrl'] . '";
        Ext.onReady(function() {
            MODx.load({ xtype: "robotsbuilder-page-home"});
        });
        </script>
        ');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->RobotsBuilder->config['templatesPath'] . 'home.tpl';
    }
}