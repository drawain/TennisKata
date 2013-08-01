<?php


class AdvantageResult extends Result {

	public function isTrue()
	{
		if ($this->atLeastOnePlayerHasEnoughScoreToWin() && $this->scoreDifferenceIsOne()) return true;
		return false;
	}

	public function getResult()
	{
		return "PLAYER " . $this->getLeader() . " ADVANTAGE";
	}

	private function scoreDifferenceIsOne()
	{
		return $this->getDifference() === 1;
	}
}