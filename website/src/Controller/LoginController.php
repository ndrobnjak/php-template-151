<?php

namespace ndrobnjak\Controller;

use ndrobnjak\SimpleTemplateEngine;
use ndrobnjak\Service\Login\LoginService;

class LoginController 
{
  /**
   * @var ndrobnjak\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  private $loginService;
  
  /**
   * @param ndrobnjak\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template, LoginService $loginService)
  {
     $this->template = $template;
     $this->loginService = $loginService;
  }

  public function showLogin() {
    echo $this->template->render("login.html.php");
  }

  public function Login(array $data) {
  	if(!array_key_exists("username", $data) OR !array_key_exists("pw", $data)){
  		$this->showLogin();
  		return;
  	}
  	
  	
  	
  	if($this->loginService->authenticate($data['username'], $data['pw'])){
  		header("Location: /");
  	}
  	else{
  		echo $this->template->render("login.html.php",[
  				"username" => $data["username"]
  		]);
  	}
  }
  
  public function showForgotPW (){
  	echo $this->template->render("forgotPW.html.php");
  }
  
  public function forgotPW (array $data){
  	if(!array_key_exists("email", $data) OR !array_key_exists("pw", $data)){
  		$this->showForgotPW();
  		return;
  	}
  	else{
  		$this->loginService->updatePW($data['email'], $data['pw']);
  		header("Location: /");
  	}
  
  
  
  
  }
  
  public function Logout(){
  	session_destroy();
  	header("Location: /");
  }
  
}
