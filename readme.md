##初始项目

 composer config -g repo.packagist composer https://packagist.phpcomposer.com

 ####创建laravel 应用

  composer create-project laravel/laravel bbs --prefer-dist "5.5.*"

### 如果是从网上拉取的项目

composer install 

php artisan key:generate


yarn install  
使用laravel 的Mix 


##layout 
分为主页 帮助页  头部

app()->getLocale()
获取的是config.app  里面的语言选项

asset  使用当前的协议请求地址
### 用户的登录注册 ，使用用户的注册认证协议

 php artisan  make:auth

  /home  替代成  / 

### 添加验证码 

  使用第三方扩展包
  composer require "mews/captcha:~2.0"

执行命令生成 基本的配置文件
  php artisan vendor:publish --provider='Mews\Captcha\CaptchaServiceProvider'

  下载包
   写一点js 代码 点击的时候自动换图片
    ```
    onclick="this.src='/captcha/flat?'+Math.random()"
    ```
captcha_src()
 用于生成验证码

 ####后端验证 

  在控制方法里面 找到

  validator  

  里面添加验证方法
     'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '请输入正确的验证码',


          此验证方法  是mews/captcha 自定义表单的验证规则
          
## 数据库连接管理工具

  WINDOWS  HeidiSQL [:https://pan.baidu.com/s/1jH6o5sa#list/path=%2F]

  MAC   [https://pan.baidu.com/s/1jH6o5sa#list/path=%2FLaravelTutorials%2FWindows&parentPath=%2FLaravelTutorials]


  php  artisan migrate

  ###进行个人页面的展示 
   resource 方法

   与user 表建立联系
   		App\User替换App\Models\User
   创建UserController 方法
      定义show 方法
       分配数据使用composer

   展示页面 

    存在问题  页面不够美观

   show.blade.php


   ##用户

    ###用户编辑

      panel-body  panel-default panel col-md-10 col-md-offset-1

      panel-heading  glyphicon glyphicon-edit




      ##帖子
      php artisan make:model Models/Category -m
      

      ####修复了一个Bug 

      laravel 5.5  mysql 版本低于5.7 ,需要手动配置迁移生成的默认字符串长度


      需要修改一处文件，不然容易报user表已经存在的错误

      该文件在app 下面的appserviceprovider 文件

      use Illuminate\Support\Facades\Schema;

      /**
 * 引导任何应用程序服务。
 *
 * @return void
 */
public function boot()
{
    Schema::defaultStringLength(191);
}


然后执行 php artisan migrate
###添加了用户上传头像的功能


###写帖子
php artisan make:migration seed_categories_data
 
  批量注入假数据
  truncate()方法清空
   ####使用代码生成器 利用composer
   composer require "summerblue/generator:~0.5" --dev
#### 批量注入假数据
 1. 数据模型 User.php
2.用户的数据工厂 database/factories/UserFactory.php
3.用户的数据填充 database/seeds/UsersTableSeeder.php
4.注册数据填充 database/seeds/DatabaseSeeder.php
###使用belongsTo  方法
  一个话题属于一个分类  一个话题拥有一个作者


  ### 新建帖子 下面不允许修改

    user_id —— 文章的作者，我们不希望文章的作者可以被随便指派；
    last_reply_user_id —— 最后回复的用户 ID，将有程序来维护；
    order —— 文章排序，将会是管理员专属的功能；
    reply_count —— 回复数量，程序维护；
    view_count —— 查看数量，程序维护；



##模板 
    @extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <div class="panel-body">
                <h2 class="text-center">
                    <i class="glyphicon glyphicon-edit"></i>
                    @if($topic->id)
                        编辑话题
                    @else
                        新建话题
                    @endif
                </h2>

                <hr>

                @include('common.error')

                @if($topic->id)
                    <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <input class="form-control" type="text" name="title" value="{{ old('title', $topic->title ) }}" placeholder="请填写标题" required/>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="category_id" required>
                            <option value="" hidden disabled selected>请选择分类</option>
                            @foreach ($categories as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <textarea name="body" class="form-control" id="editor" rows="3" placeholder="请填入至少三个字符的内容。" required>{{ old('body', $topic->body ) }}</textarea>
                    </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection



###模型
excerpt 字段存储的是话题的摘录，将作为文章页面的 description 元标签使用，有利于 SEO 搜索引擎优化。 摘录由文章内容中自动生成，生成的时机是在话题数据存入数据库之前。 我们将使用 Eloquent 的 观察器 来实现此功能。

Eloquent 模型会触发许多事件（Event），我们可以对模型的生命周期内多个时间点进行监控： creating, created, updating, updated, saving, saved, deleting, deleted, restoring, restored。 事件让你每当有特定的模型类在数据库保存或更新时，执行代码。 当一个新模型被初次保存将会触发 creating 以及 created 事件。 如果一个模型已经存在于数据库且调用了 save 方法，将会触发 updating 和 updated 事件。 在这两种情况下都会触发 saving 和 saved 事件。

Eloquent 观察器允许我们对给定模型中进行事件监控，观察者类里的方法名对应 Eloquent 想监听的事件。 每种方法接收 model 作为其唯一的参数。 代码生成器已经为我们生成了一个观察器文件，并在 AppServiceProvider 中注册。 接下来我们要定制此观察器，在 Topic 模型保存时触发的 saving 事件中，对 excerpt 字段进行赋值：



####判断帖子id 页面

<div class="form-group">
                        <select class="form-control" name="category_id" required>
                            <option value="" hidden disabled {{ $topic->id ? '' : 'selected' }}>请选择分类</option>
                            @foreach ($categories as $value)
                                <option value="{{ $value->id }}" {{ $topic->category_id == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>

  ### 配置了百度翻译

     安装转换拼音包
     拼音方案生成优化描述
     composer require "overtrue/pinyin:~3.0"

     百度翻译包  请求百度翻译接口
     composer require "guzzlehttp/guzzle:~6.3"

     laravel 对列表
     composer require "laravel/horizon:~1.0"


     ###权限管理
     composer require "spatie/laravel-permission:~2.7"
     php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
     composer

  ####表的作用
     roles —— 角色的模型表；
permissions —— 权限的模型表；
model_has_roles —— 模型与角色的关联表，用户拥有什么角色在此表中定义，一个用户能拥有多个角色；
role_has_permissions —— 角色拥有的权限关联表，如管理员拥有查看后台的权限都是在此表定义，一个角色能拥有多个权限；
model_has_permissions —— 模型与权限关联表，一个模型能拥有多个权限。

 执行数据库迁移
  php artisan migrate
  生成配置信息
 php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"
####使用用户切换工具 sudo-su
 composer require "viacreative/sudo-su:~1.1"
 添加provider
####生成配置文件
 php artisan vendor:publish --provider="VIACreative\SudoSu\ServiceProvider"