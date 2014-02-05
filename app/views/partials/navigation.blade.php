<nav>
	<ul>
	@foreach( $navigation as $item )
		<li>
			<a href="/{{ $item['url'] }}" class='{{ $item['color_id'] }}'>{{ $item['title'] }}</a>
		</li>
	@endforeach
	</ul>
</nav>
<div>
	<select id="searchbox" name="q" placeholder="Search products or categories..." class="form-control"></select>
</div>