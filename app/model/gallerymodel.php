<?php
namespace App\Model;

class GalleryModel
{
	public static function GetCategories()
	{
		return 
		[
			[ 'cid' => 1, 'url' => "allatok", 'name' => "Állatok" ],
			[ 'cid' => 2, 'url' => "csalad", 'name' => "Család" ],
			[ 'cid' => 3, 'url' => "baratok", 'name' => "Barátok" ],
			[ 'cid' => 4, 'url' => "kirandulas", 'name' => "Kirándulás" ],
			[ 'cid' => 5, 'url' => "privat", 'name' => "Privát" ]
		];
	}
	public static function GetAlbumsByCategory($category)
	{
		$data = 
		[
			'allatok' => 
			[
				[ 'aid' => 1, 'url' => "macskak", 'name' => "Macskák" ],
				[ 'aid' => 2, 'url' => "kutyak", 'name' => "Kutyák" ]
			],
			'csalad' => 
			[
				[ 'aid' => 3, 'url' => "karacsony", 'name' => "Karácsony" ],
				[ 'aid' => 4, 'url' => "szilveszter", 'name' => "Szilveszter" ],
				[ 'aid' => 5, 'url' => "szulinap", 'name' => "Szülinap" ]
			],
			'baratok' => 
			[
				[ 'aid' => 6, 'url' => "iszogatas", 'name' => "Iszogatás" ]
			],
			'kirandulas' => [],
			'privat' => []
		];
		
		return $data[$category];
	}
}


