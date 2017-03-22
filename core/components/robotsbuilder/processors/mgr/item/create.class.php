<?php

class RobotsBuilderItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'RobotsBuilderItem';
    public $classKey = 'RobotsBuilderItem';
    public $languageTopics = array('robotsbuilder');
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('context'));
        if (empty($name)) {
            $this->modx->error->addField('context', $this->modx->lexicon('robotsbuilder_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, array('context' => $name, 'type' => $this->getProperty('type')))) {
            $this->modx->error->addField('context', $this->modx->lexicon('robotsbuilder_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'RobotsBuilderItemCreateProcessor';