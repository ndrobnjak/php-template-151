<?php

namespace ndrobnjak\Service\Add;
class AddPdoService implements AddService
{
	private $pdo;

	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function addfilm($filmtitel, $beschreibung, $genreId)
	{
		$stmt = $this->pdo->prepare("INSERT INTO Film (FilmTitel, Beschreibung, GenreID) VALUES(?, ?, ?)");
		$stmt->bindValue(1, $filmtitel);
		$stmt->bindValue(2, $beschreibung);
		$stmt->bindValue(3, $genreId);
		$stmt->execute();
	}
}
?>
