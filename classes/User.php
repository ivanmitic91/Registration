<?php
require_once "config.php";
require_once "models/UserModel.php";

class User extends UserModel
{

    use Validate, File;

    protected $fullName;
    protected $email;
    protected $password;
    private $confirm_password;
    protected $phoneNumber;

    public $errors = [];
    protected $session;

    public function __construct()
    {
        parent::__construct();

        $this->session = new Session();
    }

    public function setPassword($password)
    {

        $password_length = strlen($password);

        if (empty($password)) {

            $this->errors[] = 'Please enter your password!';
        } else if ($password_length < 5) {

            $this->errors[] = 'Passwords is less than 5 characters!';
        } else {

            $this->password = $password;
        }
    }

    public function confirmPasswords()
    {

        if ($this->getConfirmPassword() !== $this->getPassword()) {

            $this->errors[] = 'Passwords must be the same!';
        } else {
            return true;
        }
    }

    public function getPassword()
    {

        return $this->password;
    }

    public function setFullName($fullName)
    {

        if (empty($fullName)) {

            $this->errors[] = 'Please enter your full name!';
        } else if (preg_match('~[0-9]+~', $fullName)) {
            $this->errors[] = 'Full Name cannot contain digits!';
        } else {

            $this->fullName = $fullName;
        }
    }

    public function getfullName()
    {

        return $this->fullName;
    }

    public function setEmail($email)
    {

        if (empty($email)) {
            $this->errors[] = 'Please enter your email!';
        } else if ($this->findUserByEmail($email)) {
            $this->errors[] = 'Email was already taken!';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'Invalid email format!';
        } else {

            $this->email = $email;
        }
    }

    public function setLoginEmail($email)
    {

        if (empty($email)) {
            $this->errors[] = 'Please enter your email!';
        } else {

            $this->email = $email;
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPhoneNumber($phoneNumber)
    {

        $phoneNumberLength = strlen($phoneNumber);
        if (empty($phoneNumber)) {
            $this->errors[] = 'Please enter your phone number!';
        } else if (!is_numeric($phoneNumber)) {
            $this->errors[] = 'Phone Number must only contain digits!';
        } else if ($phoneNumberLength < 7) {
            $this->errors[] = 'Phone Number must be at least 7 caracters long!';
        } else if ($phoneNumberLength > 11) {
            $this->errors[] = 'Max number of digits for Phone Number was 11!';
        } else {
            $this->phoneNumber = $phoneNumber;
        }
    }

    public function getPhoneNumber()
    {

        return $this->phoneNumber;
    }

    public function setConfirmPassword($confirmPassword)
    {
        if (empty($confirmPassword)) {

            $this->errors[] = 'Please enter your confirm password!';
        } else {
            $this->confirm_password = $confirmPassword;
        }
    }

    public function getConfirmPassword()
    {
        return $this->confirm_password;
    }
}
