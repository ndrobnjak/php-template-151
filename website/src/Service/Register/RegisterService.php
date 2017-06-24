<?php 

namespace ndrobnjak\Service\Register;

interface RegisterService
{
	public function register($email, $username, $password, $vorname, $nachname, $strasse, $ort);
}

?>