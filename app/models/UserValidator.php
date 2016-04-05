<?php
/**
 * Created by PhpStorm.
 * User: michaelschmidt
 * Date: 4/2/16
 * Time: 4:25 PM
 */

use Zizaco\Confide\UserValidator as ConfideUserValidator;
use Zizaco\Confide\UserValidatorInterface;

class UserValidator extends ConfideUserValidator implements UserValidatorInterface
{

    public $rules = [
        'create' => [
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ],
        'update' => [
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]
    ];
}