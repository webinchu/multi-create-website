<?php

$argvs = $_SERVER['argv'];

echo "<pre>";
print_r($argvs);
echo "</pre>";

if (empty($argvs) || $_SERVER['argc'] != 8) {
    echo "argvs is illegal";
    exit();
}

include './ArgMapping.php';
$data = ArgMapping::getArgs($argvs);

$mysqlUser = $data['mysqlUserName'];
$mysqlPwd = $data['mysqlPwd'];
$nginxHostPath = $data['nginxHostPath'];

include './MysqlTool.php';
$mysql = new MysqlTool($mysqlUser, $mysqlPwd);

$rootPath = $data['rootPath'];
//$nginxHostPath = '/www/server/panel/vhost/nginx';
$targetDir = $rootPath . '/' . $data['targetDir'];
$domains = array_unique(explode(';', $data['domains']));
if (empty($domains)) {
    echo "Domain is empty";
    exit;
}

if (!is_dir($targetDir)) {
    echo 'Target dir ' . $targetDir . " is not dir";
    exit;
}

$multiPath = $rootPath . '/multiSite/';
if (!is_dir($multiPath)) {
    mkdir($multiPath, 777);
}


foreach ($domains as $domain) {
    $dirPath = $multiPath . $domain;
    $nginxTpl = include "./tpl/nginxTpl.php";
    shell_exec("sudo cp -R $targetDir $dirPath");
    shell_exec("sudo chmod 777 -R $dirPath");
    $nginxHostFileName = $domain . '.conf';
    file_put_contents($nginxHostFileName, $nginxTpl);
    $shellCommand = "mv ./" . $nginxHostFileName . "  " . $nginxHostPath;
    //用终端命令移动文件至对应文件夹
    shell_exec($shellCommand);
    //创建数据库
    $dbRes = $mysql->createDatabase($domain);
    //导入数据
    $mysql->exportData($domain, $data['mysqlFilePath']);
    //更新数据
    $mysql->updateSite($domain, $domain);
    $wpConfigTpl = include "./tpl/wpConfigTpl.php";
    file_put_contents($dirPath . '/wp-config.php', $wpConfigTpl);
    shell_exec("nginx -s reload");
}

