<?php


class StandardResult extends Result  {
	private $standardScores = array(0, 15, 30, 40);

	public function isTrue()
	{
		if ($this->getMaxScore() <= 3) return true;
		return false;
	}

	public function getResult()
	{
		return $this->standardScores[$this->scores[0]] . '-' . $this->standardScores[$this->scores[1]];
	}
}