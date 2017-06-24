<?php

namespace ndrobnjak\Controller;

use ndrobnjak\SimpleTemplateEngine;
use ndrobnjak\Service\Add\AddService;

class AddController
{
	/**
	 * @var ndrobnjak\SimpleTemplateEngine Template engines to render output
	 */
	private $template;

	private $addService;

	/**
	 * @param ndrobnjak\SimpleTemplateEngine
	 */
	public function __construct(SimpleTemplateEngine $template, AddService $addService)
	{
		$this->template = $template;
		$this->addService = $addService;
	}

	public function showAddFilm() {
		echo $this->template->render("addFilm.html.php");
	}
	
	/*public function Add(array $data) {
		if(array_key_exists("email", $data)){
			echo $this->template->render("register.html.php",[
					"msg" => $data["EMail already taken"]
			]);
		}
		else {
			$this->registerService->register($data['email'], $data['pw']);
		}

	}*/

	public function AddFilm(array $data) {
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

