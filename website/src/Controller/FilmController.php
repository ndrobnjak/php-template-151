<?php

namespace ndrobnjak\Controller;

use ndrobnjak\SimpleTemplateEngine;
use ndrobnjak\Service\Film\FilmService;

class FilmController
{
	/**
	 * @var ndrobnjak\SimpleTemplateEngine Template engines to render output
	 */
	private $template;

	private $filmService;

	/**
	 * @param ndrobnjak\SimpleTemplateEngine
	 */
	public function __construct(SimpleTemplateEngine $template, FilmService $filmService)
	{
		$this->template = $template;
		$this->filmService = $filmService;
	}
	
	public function showFilm() {
		$allfilms = $this->filmService->film();
		echo $this->template->render("film.html.php",[
				"data" => $allfilms
		]);
	}
}

