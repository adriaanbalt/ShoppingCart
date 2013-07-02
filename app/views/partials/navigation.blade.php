<nav>
	<ul>
	@foreach( $navigation as $item )
		<li>
			<a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
		</li>
	@endforeach
	</ul>
</nav>