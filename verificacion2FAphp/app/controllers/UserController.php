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

        // segundo factor

        $this->createSession($user['id'], $user['email']);
        return ['result' => true];
        
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
}