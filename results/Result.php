<?php

interface ResultInterface {
	public function __construct($scores);
	public function isTrue();
	public function getResult();
}

abstract class Result implements ResultInterface {
	protected $scores;

	public function __construct($scores)
	{
		$this->scores = $scores;
	}

	protected function getMaxScore()
	{
		return max($this->scores);
	}

	protected function getDifference()
	{
		return abs($this->scores[0] - $this->scores[1]);
	}

	protected function atLeastOnePlayerHasEnoughScoreToWin()
	{
		return $this->getMaxScore() >= 4;
	}

	protected function getLeader()
	{
		if ($this->scores[0] > $this->scores[1]) return 1;
		return 2;
	}
}