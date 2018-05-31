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
