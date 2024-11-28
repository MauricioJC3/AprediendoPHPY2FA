<?php

namespace App\Controllers;

use App\Models\User;

class UserController 
{

    public function register($name, $email, $password)
    {
        $id = (new User())->createUser($name, $email, $password);
        return $id;
    }

    public function login($email, $password)
    {
        $user = (new User())->getUser($email);
        
        if($user === null) {
            return ['result' => false];
        }
        
        if(!password_verify($password, $user['password'])) {
            return ['result' => false];
        }

        // si no tiene el segundo factor activado
        if($user['two_secret'] !== null) 
        {
            $this->createSession(null, $user['email'], false);
            return ['result'=> true, 'secondFactor' => true];
        }

        $this->createSession($user['id'], $user['email']);

        // segundo factor

       
        return ['result' => true, 'secondFactor' => false];
        
    }


    protected function createSession($id, $email, $isLoggedIn = true)
    {
        $_SESSION['userId'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['isLoggedIn'] = $isLoggedIn;
    }


    public function isUserLoggedIn()
    {
        return isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'];
    }


    public function logout()
    {
        try {
            unset($_SESSION['userId']);
            unset($_SESSION['email']);
            unset($_SESSION['isLoggedIn']);
        } catch (\Throwable $ex) {
            
        }
    }

    public function getUser()
    {
        $email = $_SESSION['email'];
        return (new User())->getUser($email);
    } 

    public function activateSecondFactor($secret, $code)
    {
        if($this->checkGoogleAuthenticatorCode($secret, $code)) {
            $id = $_SESSION['userId'];
            (new User())->createSecret($secret, $id);
            return true;
        }
        return false;
    }

    public function checkGoogleAuthenticatorCode($secret, $code)
    {  
        $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        if ($g->checkCode($secret, $code)) {
            return true;
        }
        return false;
    }

    public function desactivateSecondFactor()
    {
        $id = $_SESSION['userId'];
        (new User())->deleteSecret( $id);

    }

    public function validateCode($code)
    {
        $user = $this->getUser();
        
        if ($this->checkGoogleAuthenticatorCode($user['two_secret'], $code)) {
            $this->createSession($user['id'], $user['email']);
            return true;
        }
        return false;
    }
}