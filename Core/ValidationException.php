<?php

namespace Core;

class ValidationException extends \Exception
{
    protected $errors = [];
    protected $old = [];


}