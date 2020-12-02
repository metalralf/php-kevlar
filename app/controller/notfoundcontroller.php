<?php

namespace App\Controller;
use \System\View\View;

class NotFoundController
{
	public static function Entry()
	{
		http_response_code(404);
		View::Out('<h1>Page Not Found :(</h1>');
	}
}

