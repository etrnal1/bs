@extends('layouts.app')

@section('title',$user->name.'的个人中心')

@section('content')

<div class="row">
	<div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
		<div class="panel panel-default" >

			<div class="panel-body">
				<div class="media">
					<div align="center">
						<img src="thumnail img-responsive">
						
					</div>
					<div class="media-body">
						<hr>
						<h4>个人简介</h4>
						 <p>你好</p>

						 <hr>
						 <h4><strong>注册于</strong></h4>
							<p> January 01 1901</p>
					</div>
					
				</div>
				
			</div>
			
		</div>
		



	</div>	

	<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		<div class="panel panel-default" >
			<div class="panel-body">
				<span>
					<h1>
						
					</h1>
				</span>
				
			</div>
			
		</div>

		<hr>
		<!-- 用户发布数据 -->
		 <div class="panel-default panel">
		 	<div class="panel-body">
		 		  暂无数据
		 	</div>
		 	
		 </div>
		

	</div>


</div>