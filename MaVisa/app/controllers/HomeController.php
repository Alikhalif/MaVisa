<?php

class HomeController
{
    public function index(){
        View::load('home');
    }

    public function logout(){
        session_destroy();
        session_unset();
        View::load('home');
    }
    
}