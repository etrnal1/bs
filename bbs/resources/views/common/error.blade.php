@if(count($errors)>0)


	<div>
		<h4>有错误发生</h4>

		<ul>
			@foreach($errors->all() as $error)
			<li><i>{{$error}}</i></li>
			@endforeach
		</ul>

	</div>


@endif

