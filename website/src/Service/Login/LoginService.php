<?php 

namespace ndrobnjak\Service\Login;

interface LoginService
{
	public function authenticate($username, $password);
	public function updatePW($email, $password);
}

?>