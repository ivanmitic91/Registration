<?php
require_once "init.php";
class UserModel
{

    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    protected function findUserByEmail($email)
    {

        $this->db->query("SELECT * FROM users WHERE email = :email");

        $this->db->bind(':email', $email);

        $this->db->single();

        if ($this->db->rowCount() > 0) {

            return true;
        }
    }

    public function login()
    {

        $this->db->query("SELECT * FROM users WHERE  email= :email AND password = :password");

        $this->db->bind(':email', $this->email);
        $password = hash('sha256', $this->password);


        $this->db->bind(':password', $password);
        $user = $this->db->single();

        if ($this->db->rowCount() > 0) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['userName'] = $user->fullname;
            $_SESSION['cv_name'] = $user->cv;
            return true;
        }
    }

    public function insertUser()
    {
        try {

            $pass = hash('sha256', $this->password);

            $this->db->query('INSERT INTO users(fullname, email, password, phone_number, cv)
            
             VALUES
             
              (:full_name, :email, :password, :phone_number, :cv)');

            $this->db->bind('full_name', $this->fullName);
            $this->db->bind('password', $pass);
            $this->db->bind('email', $this->email);
            $this->db->bind('phone_number', $this->phoneNumber);
            $this->db->bind('cv', $this->fileName);

            $this->db->execute();

            $_SESSION['user_id'] = $this->db->lastInsertId();
            $_SESSION['userName'] = $this->fullName;

            header('Location:  index.php');
        } catch (Exception $e) {

            $this->session->flash('error', "Something gets wrong!", "alert alert-danger");

            header('Location:  register.php');
        }
    }
}
