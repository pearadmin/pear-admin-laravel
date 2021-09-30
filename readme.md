## TODO
- [ ] 更新上传功能,包括单文件上传,多文件上传,编辑器上传
- [ ] 集成百度编辑器(UEditor)
- [x] 集成MarkDown编辑器(Editor.io)
- [ ] 集成stock.io实时接收通知
- [ ] 集成log-viewer可视化管理项目日志

## 安装

#### 获取项目代码
```shell
cd web部署目录
git clone https://gitee.com/pear-admin/Pear-Admin-Laravel.git
chmod -R 755 ./Pear-Admin-Laravel
cd ./Pear-Admin-Laravel
composer update
```

#### 创建数据库
```shell
mysql -uroot -p  #输入密码
create database pear_admin_laravel
```

#### 配置数据库
```shell
cp .env.example .env #配置.env里的数据库连接信息
```

#### 初始化数据
```shell
php artisan key:generate    #初始化key
php artisan storage:link    #软连文件存储目录
php artisan migrate --step  #执行数据迁移
php artisan db:seed         #写入初始化数据
```

> 初始化完成后浏览器打开项目地址 https://www.domain.com/admin 登录
> 
> 初始化登录用户名:admin 密码:password
> 
> 可视化日志管理路由  https://www.domain.com/log-viewer
> ![](https://gitee.com/whongbin/FigureBed/raw/master/20210930162959.png)

**务必在登录成功后修改密码**

## 其他

### Vhost-Apache配置
```text
<VirtualHost *:80>
    DocumentRoot "/var/www/html/Pear-Admin-Laravel/public"
    ServerName www.domain.com
    ErrorLog "logs/site1-error.log"
    CustomLog "logs/site1-access.log" common
    <Directory "/var/www/html/HBAdmin/public">
        Options FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### Vhost-Nginx配置
```text
server {
    listen       80;
    server_name  www.domain.com;
    root         /var/www/html/Pear-Admin-Laravel/public;
    index index.html index.htm index.php;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { 
        access_log off; 
        log_not_found off; 
    }
    location = /robots.txt  { 
        access_log off; 
        log_not_found off; 
    }

    location ~ .php$ {
        try_files $uri =404;
        root /var/www/html/Pear-Admin-Laravel/public;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi.conf;
    }
    
    error_page 404 /404.html;
    location = /40x.html {
    }
    error_page 500 502 503 504 /50x.html;
        location = /50x.html {
    }
}
```

### redis安装

```shell
cd ~
wget https://download.redis.io/releases/redis-6.2.5.tar.gz
tar xzf redis-6.2.5.tar.gz 
cd redis-6.2.5
make
make install PREFIX=/usr/local/redis
cd /usr/local/redis/bin/
ll
cp ~/redis-6.2.5/redis.conf ./
vim redis.conf  #找到daemonize no 改为daemonize yes
./redis-server redis.conf  #后台启动redis
ps aux|grep redis  #查看redis进程
```
