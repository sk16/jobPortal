<?php

class Application_Model_DbTable_JobPortal extends Zend_Db_Table_Abstract
{

    protected $_name = 'jobs';
     public function getJob($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function addJob($title,$shortd,$longd,$exp,$location)
    {
        $data = array(
            'title' => $title,
            'shortd' => $shortd,
            'longd' => $longd,
            'exp' => $exp,
            'location' => $location,
        );
        
        $this->insert($data);
    }

    public function updateJob($id,$title,$shortd,$longd,$exp,$location)
    {
        $data = array(
            'title' => $title,
            'shortd' => $shortd,
            'longd' => $longd,
            'exp' => $exp,
            'location' => $location,
        );
        $this->update($data, 'id = '. (int)$id);
    }

    public function deleteJob($id)
    {
        $this->delete('id =' . (int)$id);
        $index = Zend_Search_Lucene::create('C:\indexed');
        $index->optimize();
    }
}
    



