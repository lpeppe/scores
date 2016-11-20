<?php
/**
 * Created by PhpStorm.
 * User: vicec
 * Date: 11/18/2016
 * Time: 5:03 PM
 */
class SCORES_CTRL_Manager extends OW_ActionController
{
    public function index($params)
    {
        //perform some actions and assign data to the view
        $this->assign('some_param', $params['some_param']);
        $this->setPageTitle(OW::getLanguage()->text('scores', 'index_page_title'));
        $this->setPageHeading(OW::getLanguage()->text('scores', 'index_page_heading'));
        $form = new SCORES_CLASS_Form("scores_form");
        $form->setMethod(Form::METHOD_POST);
        $form->setEnctype(Form::ENCTYPE_MULTYPART_FORMDATA);
        $this->addForm($form);
        $submitedFields = array();
        if ( OW::getRequest()->isPost() && $form->isValid($_POST) )
        {
            $values = $form->getValues();
            $form->reset();

            foreach ( $form->getElements() as $element )
            {
                /* @var $element FormElement */
                if ($element->getName() == 'file')
                {
                    $submitedFields[] = array(
                        "label" => $element->getName(),
                        "value" => $_FILES['file']['name'].' ('.$_FILES['file']['size'].' bytes)'
                    );
                }
                else
                {
                    $submitedFields[] = array(
                        "label" => $element->getName(),
                        "value" => is_array($values[$element->getName()]) ? implode(", ", $values[$element->getName()]) : $values[$element->getName()]
                    );
                }
            }

            $this->assign("submitedFields", $submitedFields);
            OW::getDocument()->addScript(OW::getPluginManager()->getPlugin('scores')->getStaticJsUrl().'vexflow.musicxml.min.js');
            OW::getDocument()->addScript(OW::getPluginManager()->getPlugin('scores')->getStaticJsUrl().'vexflow.musicxml.js');
            OW::getDocument()->addScript(OW::getPluginManager()->getPlugin('scores')->getStaticJsUrl().'demo.js');
        }
    }
}