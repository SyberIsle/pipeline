<?php
namespace SyberIsle\Pipeline\Stub;

use SyberIsle\Pipeline\Stage;

class AddOneStage implements Stage
{
	public function process($payload)
	{
		return $payload + 1;
	}
}