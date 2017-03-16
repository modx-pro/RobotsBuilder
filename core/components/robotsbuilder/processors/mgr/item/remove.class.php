<?php

class RobotsBuilderItemRemoveProcessor extends modObjectProcessor
{
    public $objectType = 'RobotsBuilderItem';
    public $classKey = 'RobotsBuilderItem';
    public $languageTopics = array('robotsbuilder');
    //public $permission = 'remove';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('robotsbuilder_item_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var RobotsBuilderItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('robotsbuilder_item_err_nf'));
            }

            $object->remove();
        }

        return $this->success();
    }

}

return 'RobotsBuilderItemRemoveProcessor';