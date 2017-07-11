<?php
namespace SyberIsle\Pipeline\Stub;

use SyberIsle\Pipeline\Stage;

class TimesTwoStage implements Stage
{
	public function process($payload)
	{
		return $payload * 2;
	}
}