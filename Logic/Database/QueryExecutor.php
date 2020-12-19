<?php
class QueryExecutor
{
    protected static $instance;

    private $contextDb;

    private function __construct(){
        $this->contextDb = new PDO("mysql:dbname=animal_shelter;host=localhost", "root", "root");
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new QueryExecutor();
        }

        return self::$instance;
    }

    public function authorization($login, $password){
        return !is_null($this->executeQuery("SELECT * FROM user WHERE login='$login' AND password='$password' LIMIT 1")[0]);
    }

    public function getUser($login){
        return $this->executeQuery("SELECT * FROM v_user WHERE login='$login' LIMIT 1")[0];
    }

    public function containsUser($login){
        return !is_null($this->executeQuery("SELECT * FROM user WHERE login='$login' LIMIT 1")[0]);
    }

    public function registration($roleId, $fullName, $eMail, $phoneNumber, $address, $dateOfBirth, $login, $password){
        $this->executeQuery("INSERT INTO user (role_id, full_name, e_mail, phone_number, address, date_of_birth, login, password) VALUES($roleId, '$fullName', '$eMail', '$phoneNumber', '$address', '$dateOfBirth', '$login', '$password')");
    }

    public function getRoles(){
        return $this->executeQuery("SELECT * FROM role");
    }

    public function getPets(){
        return $this->executeQuery("SELECT * FROM pet");
    }

    public function addPet($photo, $name, $age, $description = null){
        $this->executeQuery("INSERT INTO pet (photo, name, age, description) VALUE ('$photo', '$name', $age, '$description')");
    }

    public function getPet($id){
        return $this->executeQuery("SELECT * FROM pet WHERE id=$id LIMIT 1")[0];
    }

    public function updatePet($id, $photo, $name, $age, $description = null){
        $this->executeQuery("UPDATE pet SET photo='$photo', name='$name', age='$age', description='$description' WHERE id=$id");
    }

    public function removePet($id){
        $this->executeQuery("DELETE FROM pet WHERE id=$id");
    }

    public function getMalling(){
        return $this->executeQuery("SELECT * FROM mailing INNER JOIN user ON user.id = mailing.user_id");
    }

    public function getMessages(){
        return $this->executeQuery("SELECT * FROM message INNER JOIN user ON user.id = message.user_id");
    }

    public function getGallery(){
        return $this->executeQuery("SELECT * FROM gallery");
    }

    public function addPhotoForGallery($photo){
        $this->executeQuery("INSERT INTO gallery (photo) VALUES ('$photo')");
    }

    public function getPhotoForGallery($id){
        return $this->executeQuery("SELECT * FROM gallery WHERE id=$id LIMIT 1")[0];
    }

    public function updatePhotoForGallery($id, $photo){
        $this->executeQuery("UPDATE gallery SET photo='$photo' WHERE id=$id");
    }

    public function removePhotoForGallery($id){
        $this->executeQuery("DELETE FROM gallery WHERE id=$id");
    }

    public function sendMessage($userId, $message){
        $date = date("Y-m-d H:i:s");
        $this->executeQuery("INSERT INTO message (user_id, message, date_of_send) VALUES ($userId, '$message', '$date')");
    }

    public function containsMailing($userId){
        return !is_null($this->executeQuery("SELECT * FROM mailing WHERE user_id=$userId LIMIT 1")[0]);
    }

    public function addMailing($userId){
        $this->executeQuery("INSERT INTO mailing (user_id) VALUES ($userId)");
    }

    public function containsUserPet($userId, $petId){
        return !is_null($this->executeQuery("SELECT * FROM user_pet WHERE user_id=$userId AND pet_id=$petId LIMIT 1")[0]);
    }

    public function addUserPet($userId, $petId){
        $this->executeQuery("INSERT INTO user_pet (user_id, pet_id) VALUES ($userId, $petId)");
    }

    private function executeQuery($query){
        try{
            return ($this->contextDb->query($query))->FETCHALL(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e){
            die($e->getMessage());
        }
    }
}
?>