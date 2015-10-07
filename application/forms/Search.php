<?php

class Application_Form_Search extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('search');
            
        $query = new Zend_Form_Element_Text('query');
        $query->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->setDecorators(array('ViewHelper','Errors','Description',
                  array(array('inner'=>'HtmlTag',array('tag'=>'div'))),
                  array('label',array('tag'=>'p')),
                  array(array('out'=>'HtmlTag'),array('tag'=>'div','class'=>'out'))));
              
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton')
               ->setDecorators(array('ViewHelper','Errors','Description',
                  array(array('inner'=>'HtmlTag',array('tag'=>'div'))),
                  array('label',array('tag'=>'p')),
                  array(array('out'=>'HtmlTag'),array('tag'=>'div','class'=>'out'))));
        $this->addElements(array($query,$submit));
    }
    

}

