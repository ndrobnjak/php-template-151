<?php

namespace ndrobnjak\Service\Add;

interface AddService
{
	public function addSeries($name);
	public function addActor($lastname, $firstname);
}

?>