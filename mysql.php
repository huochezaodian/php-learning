<?php
    class Mysql 
    {
        public $dbms='mysql';       //数据库类型
        public $host='localhost';   //数据库主机名
        public $dbName='test';    //使用的数据库
        public $user='root';          //数据库连接用户名
        public $pass='';                //对应的密码
        public $dsn='mysql:host=localhost;dbname=test';
        public $dbh=null;

        public function __construct ($conf = array()) 
        {
            if (count($conf)) 
            {
                foreach($conf as $key => $value ) 
                {
                    if (property_exists($this, $key))   //检查属性是否存在
                    {
                        $this -> $key = $value;
                    }
                }
                $this -> dsn = "{$this -> dbms}:host={$this -> host};dbname={$this -> dbName}";
            }

            $this -> init();
        }

        public function init () 
        {
            try {
                $this -> dbh = new PDO($this -> dsn, $this -> user, $this -> pass); //初始化一个PDO对象
                $this -> dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //设置sql语句执行错误抛出异常
            } catch (PDOException $e) {
                die ("Error!: " . $e->getMessage() . "<br/>");
            }
        }

        public function query ($sql)
        {
            return $this -> dbh -> query($sql);
        }

        public function exec ($sql)
        {
            return $this -> dbh -> exec($sql);
        }

        public function __distruct ()
        {
            $this -> dbh = null;
        }
    }
?>