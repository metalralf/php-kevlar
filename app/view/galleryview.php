<?php

namespace App\View;

class GalleryView
{
	public static function CategoryList($categories)
	{
		$html = '<ul>';

		foreach($categories as $category)
		{
			$html .= ('<li><a href="?gallery/'.$category['url'].'">'.$category['name'].'</a></li>');
		}
		$html .= '</ul>';
		
		return $html;
	}
	public static function AlbumList($category, $albums)
	{
		$html = '<ul>';

		foreach($albums as $album)
		{
			$html .= ('<li><a href="?gallery/'.$category.'/'.$album['url'].'">'.$album['name'].'</a></li>');
		}
		$html .= '</ul>';
		
		return $html;
	}
}

