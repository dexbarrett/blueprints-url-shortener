<?php
namespace Blueprint\Services\Validation;

class LinkValidator extends Validator
{
    static $rules = array(
        'link' => 'required|url'
    );
}