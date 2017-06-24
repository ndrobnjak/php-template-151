<?php

namespace ndrobnjak\Controller;

use ndrobnjak\SimpleTemplateEngine;
use ndrobnjak\Service\Register\RegisterService;

class RegisterController
{
	/**
	 * @var ndrobnjak\SimpleTemplateEngine Template engines to render output
	 */
	private $template;

	private $registerService;

	/**
	 * @param ndrobnjak\SimpleTemplateEngine
	 */
	public function __construct(SimpleTemplateEngine $template, RegisterService $registerService)
	{
		$this->template = $template;
		$this->registerService = $registerService;
	}

	public function showRegister() {
		echo $this->template->render("register.html.php");
	}

	public function Register(array $data) {
		if( !array_key_exists("email", $data) || !array_key_exists("pw", $data) || !array_key_exists("username", $data) || !array_key_exists("vorname", $data) || !array_key_exists("nachname", $data) || !array_key_exists("strasse", $data) || !array_key_exists("ort", $data)){
			echo $this->template->render("register.html.php",[
					"msg" => "Ungültige Anfrage"
			]);
			return;
		}

		$this->registerService->register($data['email'], $data['username'], $data['pw'], $data['vorname'], $data['nachname'], $data['strasse'], $data['ort']);
		echo $this->template->render("home.html.php");

	}
}

