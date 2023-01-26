<?php

class Signup extends Dbh {

    protected function checkUser($username, $email, $resultCheck){

        $statement = $this.$this->connect() -> prepare(' SELECT username FROM users WHERE username = ? OR email = ?');

        if($statement -> execute(array($username, $email))){
            $statement = null;
            header("location: ../index.php?error=statmentfailed");
            exit();
        }
        $resultCheck;

        if($statement-> rowCount() > 0) {
            $resultCheck = false;
        }else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

}