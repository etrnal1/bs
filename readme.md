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

