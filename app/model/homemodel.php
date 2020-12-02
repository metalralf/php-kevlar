<?php

namespace App\Model;

class HomeModel
{
	public static function GetNewArticle()
	{
		$article = new Article("Title of Article object");
		$article->setBody("Lorem ipsum dolor sit amet constectetur adipiscing elit.");
		return $article;
	}
	public static function GetArticlesData()
	{
		return [
			[
			'title' => "Aliquam ornare imperdiet sapien a porttitor",
			'intro' => "Donec non tristique turpis. Duis eu consectetur purus. Suspendisse sollicitudin arcu eget pellentesque egestas. Proin sem tortor, maximus at sem vel, aliquam dictum nunc. Quisque a ipsum gravida, sagittis risus nec, efficitur tortor. Nullam porttitor leo nec turpis dignissim vehicula. Praesent vel metus leo.",
			'image' => "https://images.pexels.com/photos/248159/pexels-photo-248159.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500",
			'body' => "Vivamus mattis neque nec venenatis facilisis. Sed nec accumsan metus, sed placerat felis. Vestibulum vehicula maximus molestie. Donec ligula mi, porta vel lectus vitae, viverra ullamcorper magna. Etiam varius lectus non enim bibendum, eget suscipit tellus venenatis. Morbi eget purus ac nulla cursus congue. Nam et odio id lacus laoreet porttitor. Sed sed congue turpis, et eleifend justo. Nunc id urna metus. Nullam vel fermentum lectus."
			],
			[
			'title' => "Quisque ac ex in nisl facilisis gravida eget auctor lacus",
			'intro' => "Donec non tristique turpis. Duis eu consectetur purus. Suspendisse sollicitudin arcu eget pellentesque egestas. Proin sem tortor, maximus at sem vel, aliquam dictum nunc. Quisque a ipsum gravida, sagittis risus nec, efficitur tortor. Nullam porttitor leo nec turpis dignissim vehicula. Praesent vel metus leo.",
			'image' => "https://images.pexels.com/photos/68147/waterfall-thac-dray-nur-buon-me-thuot-daklak-68147.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500",
			'body' => "Vivamus mattis neque nec venenatis facilisis. Sed nec accumsan metus, sed placerat felis. Vestibulum vehicula maximus molestie. Donec ligula mi, porta vel lectus vitae, viverra ullamcorper magna. Etiam varius lectus non enim bibendum, eget suscipit tellus venenatis. Morbi eget purus ac nulla cursus congue. Nam et odio id lacus laoreet porttitor. Sed sed congue turpis, et eleifend justo. Nunc id urna metus. Nullam vel fermentum lectus."
			]
		];
	}
}

