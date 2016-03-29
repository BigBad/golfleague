<?php
/**
 * Created by PhpStorm.
 * User: michaelschmidt
 * Date: 3/25/16
 * Time: 7:50 PM
 */

class AuthValidator implements UserValidatorInterface
{

    public function validate(ConfideUserInterface $user)
    {
        unset($user->password_confirmation);
        return true; // If the user valid
    }
}