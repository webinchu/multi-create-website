<?php
include './MysqlTool.php';
include './ArgMapping.php';

//参数个数
$argvLength = 8;

$argvs = $_SERVER['argv'];
if (empty($argvs) || $_SERVER['argc'] != $argvLength) {
    echo "argvs is illegal，please check your configuration";
    exit();
}
$data = ArgMapping::getArgs($argvs);

// sudo will
$mysqlUser = $data['mysqlUserName'];
$mysqlPwd = $data['mysqlPwd'];
$nginxHostPath = $data['nginxHostPath'];
$mysql = new MysqlTool($mysqlUser, $mysqlPwd);
$rootPath = $data['rootPath'];
$targetDir = $rootPath . '/' . $data['targetDir'];
$domains = array_unique(explode(';', $data['domains']));
if (empty($domains) || !is_dir($targetDir)) {
    echo "Domain is empty or Target dir " . $targetDir . " is not dir，please check rules\n";
    exit;
}

$multiPath = $rootPath . '/multiSite/';
if (!is_dir($multiPath)) {
    mkdir($multiPath, 777);
}

$tplDir = './tpl/';
//multi create site
foreach ($domains as $domain) {
    $dirPath = $multiPath . $domain;
    $nginxTpl = include $tplDir . "nginxTpl.php";
    //exec command
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
    $wpConfigTpl = include $tplDir . "wpConfigTpl.php";
    file_put_contents($dirPath . '/wp-config.php', $wpConfigTpl);
    //reload nginx
    shell_exec("nginx -s reload");
}

