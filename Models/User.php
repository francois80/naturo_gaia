<?php

class User {

    public $id;
    public $firsname;
    public $lastname;
    public $email;
    //public $password;
    //public $register_at;
    public $role_id = 2;
    public $db;

    //public function __construct($_firstname = '', $_lastname = '', $_email = '', $_password = '') {
    public function __construct($_firstname = '', $_lastname = '', $_email = '') {
        $this->firsname = $_firstname;
        $this->lastname = $_lastname;
        $this->email = $_email;
        //$this->password = $_password;
        $this->db = Database::getInstance();
    }

    public function create() {
        //$sql = 'INSERT INTO `users`(`firstname`,`lastname`,`email`,`password`,`role_id`) VALUES (:firstname,:lastname, :email, :password, :role_id)';
        $sql = 'INSERT INTO `users`(`firstname`,`lastname`,`email`,`role_id`) VALUES (:firstname,:lastname, :email, :role_id)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':firstname', $this->firsname, PDO::PARAM_STR);
        $req->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
       // $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        $req->bindValue(':role_id', $this->role_id, PDO::PARAM_INT);

        $req->execute();
    }

    public function getOne() {
        //$sql = 'SELECT `id`,`firstname`,`lastname`,`email`,`password`,`role_id` FROM `users` WHERE `id` = :id OR `email` = :email';
        $sql = 'SELECT `id`,`firstname`,`lastname`,`email`,`role_id` FROM `users` WHERE `id` = :id OR `email` = :email';
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);

        if ($req->execute()) {
            $user = $req->fetch(PDO::FETCH_OBJ);
            $this->firsname = $user->firstname;
            $this->lastname = $user->lastname;
            $this->email = $user->email;
            //$this->password = $user->password;
            $this->role_id = $user->role_id;
            return $this;
        }
    }
    
    public function checkEmail() {
        $sql = 'SELECT COUNT(`id`) AS number_user FROM `users` WHERE `email` = :email';
        $req = $this->db->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $exist_user = false;
        if($req->execute()){
            $result = $req->fetchColumn(0);
            if(is_numeric($result) && $result > 0){
                $exist_user = true;
            }
        }
        return $exist_user;
    }

}
