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


	public function Add(array $data) {
		if( !array_key_exists("filmtitel", $data) || !array_key_exists("beschreibung", $data) || !array_key_exists("genreId", $data)){
			echo $this->template->render("addFilm.html.php",[
					"msg" => "Füllen Sie alle Felder aus!"
			]);
			return;
		}
	
		$this->addService->addfilm($data['filmtitel'], $data['beschreibung'], $data['genreId']);
		echo $this->template->render("filme.html.php");
	
	}
}
