<?php

trait Validate
{

    public function checkFields()
    {
        if (

            !empty($this->getPassword()) &&
            !empty($this->getConfirmPassword()) &&
            !empty($this->getfullName()) &&
            !empty($this->getEmail()) &&
            !empty($this->getPhoneNumber()) &&
            !empty($this->getFileName()) &&
            $this->confirmPasswords()

        ) {

            return true;
        }
    }
}
