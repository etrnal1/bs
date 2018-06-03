

<nav class="navbar navbar-default navbar_static-top">
	<div class="container">
		<div class="navbar-header">

			<button type=button class="navbar-toggle"

			data-tollage="collapse" data-target="#app-navbar-collapse"
			>
				
				<span>Toggle Naviaatic</span>
				<span>Toggle Naviaatic</span>
				<span>Toggle Naviaatic</span>
				<span>Toggle Naviaatic</span>
			</button>
			

		</div>

		<a class="navbar-brand" href={{url('/')}}>
			
			larabbs
		</a>
		

	</div>




	<div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="{{ active_class(if_route('topics.index')) }}"><a href="{{ route('topics.index') }}">话题</a></li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 1))) }}"><a href="{{ route('categories.show', 1) }}">分享</a></li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 2))) }}"><a href="{{ route('categories.show', 2) }}">教程</a></li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 3))) }}"><a href="{{ route('categories.show', 3) }}">问答</a></li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 4))) }}"><a href="{{ route('categories.show', 4) }}">公告</a></li>
            </ul>
.
		<ul class="nav navbar-nav navbar-right" >
			@guest
			<li><a href="{{route('login')}}">登录</a></li>
			<li><a href="{{route('register')}}">注册</a></li>
			@else
			<li>
				<a href="{{route('topics.create')}}">
					<span class="glyphicon glyphicon-plus" aria-hidden="true">发帖</span>
				</a>
			</li>
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <img src="https://fsdhubcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="img-responsive img-circle" width="30px" height="30px">
                            </span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

              
			<ul class="dropdown-menu" role="menu">
				@can('manage_contents')
				<li>
					<a href="{{url(config('administrator.uri'))}}">
						<span class="glyphicon-dashboard glyphicon" aria-hidden="true">管理后台</span>
					</a>
				</li>
				@endcan
				<li><a href="{{route('users.show',Auth::id())}}">个人中心</a></li>
				<li><a href="{{route('users.edit',Auth::id())}}">编辑资料</a></li>
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