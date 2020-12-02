<?php if(!class_exists("System\Utils\AutoLoad")) die();

new \System\Model\Database(Config::$dbType, Config::$dbHost, 
	Config::$dbName, Config::$dbUser, Config::$dbPass);

\System\Control\Router::
Route(null, function()
{
	\App\Controller\HomeController::Entry();
})
->Route("gallery", function($category=null, $album=null)
{
	\App\Controller\GalleryController::Entry($category, $album);
})
->DefaultMethod(function($params)
{
	\App\Controller\NotFoundController::Entry();
});