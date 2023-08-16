<?php
declare(strict_types=1);

/**
 * Created by phpStorm.
 * User: webin
 * Date: 2023/7/3
 * Time: 17:45
 */
class ArgMapping
{
    const WEB_DOMAINS = '--domains';
    const ROOT_PATH_STRING = '--rootPath';
    const NGINX_HOST_FILE_PATH_STRING = '--nginxHostPath';
    const TARGET_DIR_STRING = '--targetDir';
    const MYSQL_USER_STRING = '--mysqlUser';
    const MYSQL_PWD_STRING = '--mysqlPwd';
    const MYSQL_FILE_PATH_STRING = '--mysqlFilePath';

    public static function getArgs(array $argvs)
    {
        $data = [
            'domains' => '', //域名
            'rootPath' => '', //根目录
            'targetDir' => '', //需要复制的目标文件夹
            'mysqlUserName' => '', //数据库用户名
            'mysqlPwd' => '', //数据库密码
            'nginxHostPath' => '', //nginx 配置文件夹路径
            'mysqlFilePath' => '' //需要导入的数据库文件
        ];

        foreach ($argvs as $argv) {
            //格式化参数
            list($param, $value) = explode('=', $argv, 2);
            switch ($param) {
                case self::WEB_DOMAINS:
                    $data['domains'] = $value;
                    break;
                case self::ROOT_PATH_STRING:
                    $data['rootPath'] = $value;
                    break;
                case self::TARGET_DIR_STRING:
                    $data['targetDir'] = $value;
                    break;
                case self::MYSQL_USER_STRING:
                    $data['mysqlUserName'] = $value;
                    break;
                case self::MYSQL_PWD_STRING:
                    $data['mysqlPwd'] = $value;
                    break;
                case self::NGINX_HOST_FILE_PATH_STRING:
                    $data['nginxHostPath'] = $value;
                    break;
                case self::MYSQL_FILE_PATH_STRING:
                    $data['mysqlFilePath'] = $value;
                    break;
                default:
                    // Handle unknown parameter or provide an error message
                    break;
            }
        }
        return $data;
//
//
//        if (strstr($argv, self::WEB_SITE_NUM_STRING)) {
//            $data['domains'] = explode(self::WEB_SITE_NUM_STRING, $argv)[1];
//        }
//
//        if (strstr($argv, self::ROOT_PATH_STRING)) {
//            $data['rootPath'] = explode(self::ROOT_PATH_STRING, $argv)[1];
//        }
//
//        if (strstr($argv, self::TARGET_DIR_STRING)) {
//            $data['targetDir'] = explode(self::TARGET_DIR_STRING, $argv)[1];
//        }
//
//        if (strstr($argv, self::MYSQL_USER_STRING)) {
//            $data['mysqlUserName'] = explode(self::MYSQL_USER_STRING, $argv)[1];
//        }
//
//        if (strstr($argv, self::MYSQL_PWD_STRING)) {
//            $data['mysqlPwd'] = explode(self::MYSQL_PWD_STRING, $argv)[1];
//        }
//
//        if (strstr($argv, self::NGINX_HOST_FILE_PATH_STRING)) {
//            $data['nginxHostPath'] = explode(self::NGINX_HOST_FILE_PATH_STRING, $argv)[1];
//        }
//
//        if (strstr($argv, self::MYSQL_FILE_PATH_STRING)) {
//            $data['mysqlFilePath'] = explode(self::MYSQL_FILE_PATH_STRING, $argv)[1];
//        }
    }
}
