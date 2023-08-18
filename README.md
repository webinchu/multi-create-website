## 批量创建站点(Generate wordpress sites in batches)

- 1、解压(unzip)

~~~
unzip ./sql/wp-tmp1-demo.sql.gz && unzip  ./tmp/wp-tmp1.zip 
~~~

- 2、执行命令(exec command)

~~~
 php sh.php --domains="www.wordpress.test;www.wordpress1.test;www.wordpress1.test" --nginxHostPath=/www/server/panel/vhost/nginx --rootPath=/www/wwwroot --targetDir=wp-tmp --mysqlUser=root --mysqlPwd=root@2020 --dbFilePathmysqlFilePath=/www/demo.sql
~~~

解析 :

- --domains 域名(多个用英文;分隔 multiple in English ; separated)
- --nginxHostPath nginx 配置文件位置(nginx configuration file location)
- --rootPath 项目执行并保存的根目录(The root directory where the project is executed and saved)
- --targetDir 需要复制的目标目录(The target directory to be copied)
- --mysqlUser 数据库用户名(DB username)
- --mysqlPwd 数据库用户密码(DB userpassword)
- --mysqlFilePath 数据库文件(website sql file)


