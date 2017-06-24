<?php

namespace ndrobnjak\Service\Data;

interface DataService
{
	public function getSeries($name);
	public function getActor($lastname, $firstname);
	public function getFavorites($username);
}

?>