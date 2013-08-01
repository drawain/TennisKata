<?php


class DeuceResult extends Result {

	public function isTrue()
	{
		return $this->playersHasSameScore() && $this->playersHasEnoughScoreToDeuce();
	}

	public function getResult()
	{
		return 'DEUCE';
	}

	private function playersHasSameScore()
	{
		return $this->scores[0] == $this->scores[1];
	}

	private function playersHasEnoughScoreToDeuce()
	{
		return $this->scores[0] >= 3;
	}
}