<?php

namespace ndrobnjak\Controller;

use ndrobnjak\SimpleTemplateEngine;
use ndrobnjak\Service\Search\SearchService;

class SearchController
{
	/**
	 * @var ndrobnjak\SimpleTemplateEngine Template engines to render output
	 */
	private $template;

	private $searchService;

	/**
	 * @param ndrobnjak\SimpleTemplateEngine
	 */
	public function __construct(SimpleTemplateEngine $template, SearchService $searchService)
	{
		$this->template = $template;
		$this->searchService = $searchService;
	}

	public function showSearch() {
		echo $this->template->render("search.html.php");
	}

	/*public function Search(array $data) {
		if(array_key_exists("email", $data)){
			echo $this->template->render("search.html.php",[
					"msg" => $data["EMail already taken"]
			]);
		}
		else {
			$this->searchService->searchActor($data['email'], $data['pw']);
		}

	}*/
	
	public function SearchSeries(array $data){
		$this->searchService->searchSeries($data['search_s']);
	}
	
	public function SearchActor(array $data){
		$this->searchService->searchSeries($data['search_a_f'], $data['search_a_l']);
		
		
	}

}



