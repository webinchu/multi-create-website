<?php

class MysqlTool
{

    protected string $serverName;
    protected string $dbUser;
    protected string $dbPassword;
    private PDO $mysqlPdo;

    const MYSQL_PWD_STRING = 'mysqlPwd';
    const MYSQL_FILE_PATH_STRING = 'mysqlFilePath';

    const MYSQL_HOST = "localhost";

    public function __construct($mysqlUser, $mysqlPwd)
    {
        $this->serverName = $this::MYSQL_HOST;
        $this->dbUser = $mysqlUser;
        $this->dbPassword = $mysqlPwd;
        $this->mysqlPdo = new PDO("mysql:host=$this->serverName", $this->dbUser, $this->dbPassword);
    }

    /**
     * 创建数据库
     * @param string $dbName 数据库名称
     * @return string
     */
    public function createDatabase(string $dbName)
    {
        $sql = "CREATE DATABASE IF NOT EXISTS `$dbName`";
        try {
            $this->mysqlPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->mysqlPdo->exec($sql);
            echo $sql . " DONE . \n";
            return $sql;
        } catch (Throwable $e) {
            return "createDatabase ERROR : " . $e->getMessage() . "; SQL: " . $sql . "\n";
        }
    }

    /**
     * 导入demo数据
     * @param string $dbName 数据库
     * @param string $mysqlFile 数据库文件路径
     * @return string
     */
    public function exportData(string $dbName, string $mysqlFile)
    {
        try {
            $sql = "mysql -h {$this->serverName} -u{$this->dbUser} -p{$this->dbPassword} {$dbName} < {$mysqlFile}";
            exec($sql);
            echo $sql . " DONE . \n";
            return $sql;
        } catch (Throwable $e) {
            echo "exportData ERROR : " . $e->getMessage() . "; SQL: " . $sql . "\n";
        }
    }

    /**
     * 更新站点数据
     * @param string $dbName 数据库
     * @param string $domain 域名
     * @return string
     */
    public function updateSite(string $dbName, string $domain)
    {
        $sql = "update `$dbName`.wp_options set option_value = 'http://" . $domain . "' where option_name= 'siteurl' or option_name = 'home' or option_name = 'blogname'";
        try {
            $this->mysqlPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->mysqlPdo->exec($sql);
            echo $sql . " DONE . \n"; //输出信息
            return $sql;
        } catch (Throwable $e) {
            echo "updateSite ERROR : " . $e->getMessage() . "; SQL: " . $sql . "\n";
        }
    }
}

