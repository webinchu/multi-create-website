<?php

include './MysqlTool.php';
include './ArgMapping.php';

shell_exec("sudo cp -R / ");
shell_exec("sudo chmod 777 -R /");
$nginxHostFileName = 'test.conf';
file_put_contents($nginxHostFileName, "test");
$shellCommand = "mv ./" . $nginxHostFileName . "  " . "/";
//用终端命令移动文件至对应文件夹
shell_exec($shellCommand);
//创建数据库
//reload nginx
shell_exec("nginx -s reload");

$sql = "mysql -h {$this->serverName} -u{$this->dbUser} -p{$this->dbPassword} {$dbName} < {$mysqlFile}";
exec($sql);
echo $sql . " DONE . \n";
return $sql;

$dbRes = $mysql->createDatabase($domain);
//导入数据
$mysql->exportData($domain, $data['mysqlFilePath']);
//更新数据
$mysql->updateSite($domain, $domain);
$wpConfigTpl = include $tplDir . "wpConfigTpl.php";
file_put_contents($dirPath . '/wp-config.php', $wpConfigTpl);
