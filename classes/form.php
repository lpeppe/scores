<?php
class SCORES_CLASS_Form extends Form {
    public function __construct($name){
        parent::__construct($name);
        $language = OW::getLanguage();
        //File upload field
        $uploadField = new FileField("file");
        $uploadField->setLabel($language->text("skeleton", "forms_file_field_label"));
        $this->addElement($uploadField);
    }
}