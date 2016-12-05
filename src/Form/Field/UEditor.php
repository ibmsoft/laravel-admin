<?php

namespace Encore\Admin\Form\Field;

use Encore\Admin\Form\Field;

/**
* 保存前  $form->ftext = htmlspecialchars($form->ftext);
**/
class UEditor extends Field
{

    protected static $js = [
//        '//cdn.ckeditor.com/4.5.10/standard/ckeditor.js',
    ];

    public function render()
    {
        $ftext = html_entity_decode( $this->value );

        $this->script = "
            var ue = UE.getEditor('{$this->column}');
            ue.ready(function() {
                ue.setContent('{$ftext}');
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');    
            });
       
        ";

        return parent::render();
    }
}
