<nav>
	<ul>
	@foreach( $navigation as $item )
		<li>
			<a href="{{ $item['url'] }}" class='{{ $item['color_id'] }}'>{{ $item['title'] }}</a>
		</li>
	@endforeach
	</ul>
</nav>