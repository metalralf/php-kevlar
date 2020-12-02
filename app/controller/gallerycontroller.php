<?php

namespace App\Controller;
use \System\View\View;
use \System\Utils\Dev;
use \App\Model\GalleryModel;
use \App\View\GalleryView;

class GalleryController
{
	public static function Entry($category, $album)
	{
		header('Content-Type: text/html; charset=utf-8');
		View::Out('<h1>Galéria</h1>');
		
		if($album) self::AlbumPage($category, $album);
		else 
		if($category) self::CategoryPage($category);
		else 
		self::GalleryPage();
	}
	
	private static function AlbumPage($category, $album)
	{
		View::Out('<h2>Album Page: '.$category.'/'.$album.'</h2>');
	}
	private static function CategoryPage($category)
	{
		View::Out('<h2>Kategória: '.$category.'</h2>');
		
		View::Out( GalleryView::AlbumList($category,
			GalleryModel::GetAlbumsByCategory($category)
		));
	}
	private static function GalleryPage()
	{
		View::Out('<h2>Kategóriák</h2>');
	
		View::Out( GalleryView::CategoryList( 
			GalleryModel::GetCategories() 
		));
	}
}

