<?php

namespace Encore\Admin\Form\Field;

use Encore\Admin\Form\Field;

class UEditor extends Field
{

    protected static $js = [
//        '//cdn.ckeditor.com/4.5.10/standard/ckeditor.js',
    ];

    public function render()
    {
        $this->script = "
            var ue = UE.getEditor('{$this->column}');
            ue.ready(function() {
                ue.setContent('{$this->value}');
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.    
            });
       
        ";

        return parent::render();
    }
}
