<nav class="navbar navbar-default navbar_static-top">
	<div class="container">
		<div class="navbar-header">

			<button type=button class="navbar-toggle">
				
				<span>Toggle Naviaatic</span>
			</button>
			

		</div>

		<a class="navbar-brand" href={{url('/')}}>
			
			larabbs
		</a>
		

	</div>




	<div class="collapse navbar-collapse" id="app-navbar-collapse">
		
		<ul class="nav navbar-nav navbar-right" >
			@guest
			<li><a href="{{route('login')}}">登录</a></li>
			<li><a href="{{route('register')}}">注册</a></li>
			@else
			<li>
			<a href="#">{{Auth::user()->name}}</a>
			<a href="{{route('users.edit',Auth::id())}}">编辑材料</a>

			<ul class="dropdown-menu" role="menu">

				<li>
					<a href="{{route('users.edit',Auth::id())}}">编辑材料</a>
				</li>
				<li>
					<a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
						
						退出登录
					</a>
					<form id="logout-form" action="{{route('logout')}}" method="post">
						
						{{csrf_field()}}
					</form>
				</li>
			</ul>	

				
			</li>


			@endguest
		</ul>

	</div>

</nav>