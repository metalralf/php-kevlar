<?php

namespace App\View;

class HomeView
{
	public static function Articles($model)
	{
		$GLOBALS['model'] = $model;
		include 'app/view/template/home-article.php';
	}
	public static function ArticleOne($model)
	{
		$html = file_get_contents('app/view/template/home-article-one.php');
		$parser = new \System\View\ViewParser($html);
		\System\View\View::Out( $parser->render($model) );
	}
}

