<?php

class Application_Form_Book extends Zend_Form
{

    public function init()
    {
        $this->setName('Book');
        $id = new Zend_Form_Element_Hidden('labelid');
        $id->addFilter('Int');
        $label = new Zend_Form_Element_Text('label');
        $label->setLabel('label')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Title')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(array($id, $label, $title, $submit));
    }


}

