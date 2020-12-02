<?php

namespace App\Controller;

class HomeController
{
	public static function Entry()
	{
		\App\View\HomeView::ArticleOne(
			\App\Model\HomeModel::GetNewArticle()
		);
		
		\App\View\HomeView::Articles(
			\App\Model\HomeModel::GetArticlesData()
		);
	}
}

