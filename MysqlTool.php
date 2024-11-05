<?php

class MysqlTool
{

    protected string $serverName;
    protected string $dbUser;
    protected string $dbPassword;
    private PDO $mysqlPdo;

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
     * 更新站点数据
     * @param string $dbName 数据库
     * @param string $domain 域名
     * @return string
     */
    public function updateSiteByHttps(string $dbName, string $domain)
    {
        $sql = "update `$dbName`.wp_options set option_value = 'https://" . $domain . "' where option_name= 'siteurl' or option_name = 'home' or option_name = 'blogname'";
        try {
            $this->mysqlPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->mysqlPdo->exec($sql);
            echo $sql . " DONE . \n"; //输出信息
            return $sql;
        } catch (Throwable $e) {
            echo "updateSite ERROR : " . $e->getMessage() . "; SQL: " . $sql . "\n";
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

    /**
     * 条件查询
     * @param $tableName
     * @param $query
     * @return string|void
     */
    public function findByQuery($tableName, $query)
    {
        $sql = "select * from " . $tableName;
        try {
            $this->mysqlPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->mysqlPdo->exec($sql);
            echo $sql . " DONE . \n"; //输出信息
            return $sql;
        } catch (Throwable $e) {
            echo "updateSite ERROR : " . $e->getMessage() . "; SQL: " . $sql . "\n";
        }
    }

    public function insertData($tableName, $data)
    {
        // 构建插入 SQL 语句
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO " . $tableName . " (" . $columns . ") VALUES (" . $placeholders . ")";

        try {
            // 设置 PDO 错误模式为异常
            $this->mysqlPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // 预处理 SQL 语句
            $stmt = $this->mysqlPdo->prepare($sql);

            // 绑定数据
            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            // 执行 SQL 语句
            $stmt->execute();

            // 输出成功信息
            echo $sql . " DONE. \n";

            // 返回插入的 SQL
            return $sql;
        } catch (Throwable $e) {
            // 输出错误信息
            echo "insertData ERROR: " . $e->getMessage() . "; SQL: " . $sql . "\n";
        }
    }

    public function updateArr()
    {
        // 构建 SQL 语句
        $sql = "UPDATE wp_options SET option_value = 'https://www.wordpress.test' WHERE option_name = 'home' OR option_name ='siteurl'";

        try {
            // 设置 PDO 错误模式为异常
            $this->mysqlPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // 执行 SQL 语句
            $this->mysqlPdo->exec($sql);

            // 输出成功信息
            echo $sql . " DONE. \n";
        } catch (Throwable $e) {
            // 输出错误信息
            echo "update ERROR: " . $e->getMessage() . "; SQL: " . $sql . "\n";
        }
    }


}

