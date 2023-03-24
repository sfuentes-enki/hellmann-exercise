<?php
require_once '../libraries/Database.php';

class ResetPassword{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function deleteEmail($email){
        $this->db->query('DELETE FROM pwdreset WHERE pwdResetEmail=:email');
        $this->db->bind(':email',$email);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function insertToken($email, $selector, $hashedToken, $expires){
        $this->db->query('INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, 
        pwdResetExpires) VALUES (:email, :selector, :token, :expires)');
        $this->db->bind(':email', $email);
        $this->db->bind(':selector', $selector);
        $this->db->bind(':token', $hashedToken);
        $this->db->bind(':expires', $expires);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function resetPassword($selector, $currentDate){
        $this->db->query('SELECT * FROM pwdreset WHERE  pwdResetSelector=:selector AND pwdResetExpires >= :currentDate');
        $this->db->bind(':selector',$selector);
        $this->db->bind(':currentDate',$currentDate);
        $row = $this->db->single();

        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }
}