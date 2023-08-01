## 批量生成站点

- 1、解压

~~~
unzip ./sql/wp-tmp1-demo.sql.gz && unzip  ./tmp/wp-tmp1.zip 
~~~

- 2、执行命令

~~~
 php sh.php --domains="www.wordpress.test;www.wordpress1.test;www.wordpress1.test" --nginxHostPath=/www/server/panel/vhost/nginx --rootPath=/www/wwwroot --targetDir=wp-tmp --mysqlUser=root --mysqlPwd=root@2020 --dbFilePathmysqlFilePath=/www/demo.sql
~~~

解析 :

- --domains 域名(多个用英文;分隔)
- --nginxHostPath nginx 配置文件位置
- --rootPath 项目执行并保存的根目录
- --targetDir 需要复制的目标目录
- --mysqlUser 数据库用户名
- --mysqlPwd 数据库用户密码
- --mysqlFilePath 数据库文件


