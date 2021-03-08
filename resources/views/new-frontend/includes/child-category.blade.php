@foreach ($child->allChildren as $child)
	<li>
		<a href="{{ route('products', ['slug'=>$child->slug])}}">
			{{\Illuminate\Support\Str::ucfirst($child->name)}}
		</a>
		<ul>
			@include('new-frontend.includes.child-category', ['child' => $child])
		</ul>
	</li>
@endforeach
