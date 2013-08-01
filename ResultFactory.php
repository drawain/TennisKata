<?php

require_once 'Exception.php';
require_once 'results/Result.php';
require_once 'results/StandardResult.php';
require_once 'results/DeuceResult.php';
require_once 'results/AdvantageResult.php';
require_once 'results/WinResult.php';

class ResultFactory implements ResultFactoryInterface {

	const STANDARD  = 'StandardResult';
	const DEUCE     = 'DeuceResult';
	const ADVANTAGE = 'AdvantageResult';
	const WIN       = 'WinResult';

	public function create($resultClass, $scores)
	{
		if (!defined($this->getResultConstant($resultClass))) throw new UnknownResultClassException();
		return new $resultClass($scores);
	}

	private function getResultConstant($resultClass)
	{
		return 'ResultFactory::' . strtoupper(str_replace('Result', '', $resultClass));
	}

}

interface ResultFactoryInterface {
	public function create($resultClass, $scores);
}