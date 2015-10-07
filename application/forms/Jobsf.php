<?php

class Application_Form_Jobsf extends Zend_Form 
{
  
        /* Form Elements & Other Definitions Here ... */ 
    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('job');


        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Job Title')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty')
              ->setDecorators(array('ViewHelper','Errors','Description',
                  array(array('inner'=>'HtmlTag',array('tag'=>'div'))),
                  array('label',array('tag'=>'p')),
                  array(array('out'=>'HtmlTag'),array('tag'=>'div','class'=>'out'))));
                      
                      
                      
                      
                      
        
        $shortd = new Zend_Form_Element_Text('shortd');
        $shortd->setLabel('Short Description')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty')
              ->setDecorators(array('ViewHelper','Errors','Description',
                  array(array('inner'=>'HtmlTag',array('tag'=>'div'))),
                  array('label',array('tag'=>'p')),
                  array(array('out'=>'HtmlTag'),array('tag'=>'div','class'=>'out'))));
        
        $longd = new Zend_Form_Element_TextArea('longd');
        $longd->setLabel('Long Description')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty')
              ->setDecorators(array('ViewHelper','Errors','Description',
                  array(array('inner'=>'HtmlTag',array('tag'=>'div'))),
                  array('label',array('tag'=>'p')),
                  array(array('out'=>'HtmlTag'),array('tag'=>'div','class'=>'out'))));
        
        $exp = new Zend_Form_Element_Text('exp');
        $exp->setLabel('Experience/Skills Required')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty')
                ->setDecorators(array('ViewHelper','Errors','Description',
                  array(array('inner'=>'HtmlTag',array('tag'=>'div'))),
                  array('label',array('tag'=>'p')),
                  array(array('out'=>'HtmlTag'),array('tag'=>'div','class'=>'out'))));
        
        $location = new Zend_Form_Element_Text('location');
        $location->setLabel('Location')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty')
        ->setDecorators(array('ViewHelper','Errors','Description',
                  array(array('inner'=>'HtmlTag',array('tag'=>'div'))),
                  array('label',array('tag'=>'p')),
                  array(array('out'=>'HtmlTag'),array('tag'=>'div','class'=>'out'))));

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
      $this->addElements(array($title,$shortd,$longd,$exp,$location,$submit));
        
    }

    
}

