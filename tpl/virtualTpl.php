<?php

<<< HEAD
##<VirtualHost *:80>
    ##ServerAdmin webmaster@dummy-host.example.com
    ##DocumentRoot "E:/xampp/htdocs/dummy-host.example.com"
    ##ServerName dummy-host.example.com
    ##ServerAlias www.dummy-host.example.com
    ##ErrorLog "logs/dummy-host.example.com-error.log"
    ##CustomLog "logs/dummy-host.example.com-access.log" common
##</VirtualHost>
 
<VirtualHost localhost:80>
    DocumentRoot "E:/xampp/htdocs/"
    ServerName localhost
    ErrorLog "logs/dummy-host2.example.com-error.log"
    CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>
<VirtualHost qiphon.com:80>
	#指定域名
	ServerName qiphon.com
	#指定默认的主页，如果不指定继承全局的
	DirectoryIndex index.html index.php
	#指定根目录
	DocumentRoot "e:/Users/liqifeng/Desktop/myServer/yinyue2018/"
</VirtualHost>
 
HEAD;
