<?php
    session_start();

    $Poster=new DB("poster");

    class DB {
        protected $table;
        protected $pdo;
        protected $dsn="mysql:host=localhost;dbname=db203;charset=utf8";


        function __construct($table){

            $this->table=$table;
            $this->pdo=new PDO ($this->dsn,'root','');

        }

        function all(...$arg){
            $sql="select * from $this->table where ";
                if(isset($arg[0])){
                    if(is_array($arg[0])){
                    foreach($arg[0] as $key =>$value){
                        $tmp[]=spintf("`%s`='%s'",$key,$value);
                    }
                    $sql .= implode(" && ",$tmp);
                    }else{
                        $sql .= $arg[0];
                    }
                }

                if(isset($arg[1])){
                    $sql .= $arg[1];
                }

                return $this->pdo->query($sql)->fetchAll();
        }

        function count(...$arg){
            $sql="select count(*) from $this->table where ";
                if(isset($arg[0])){
                    if(is_array($arg[0])){
                        foreach($arg[0] as $key =>$value){
                            $tmp[]=sprintf("`%s`='%s'",$key,$value);
                        }
                        $sql .= implode(" && ",$tmp);
                    }else{
                        $sql .= $arg[0];
                    }
                }

                if(isset($arg[1])){
                    $sql .= $arg[1];
                }

                return $this->pdo->query($sql)->fetchcolumn();
        }

        function find($id){
            $sql="select * from $this->table where ";
                if(is_array($id)){
                    foreach($id as $key =>$value){
                        $tmp[]=spintf("`%s`='%s'",$key,$value);
                    }
                    $sql .= implode(" && ",$tmp);
                }else{
                        $sql .="`id`=$id";
                    }

                return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        }

        function del($id){
            $sql="delete  from $this->table where ";
            if(is_array($id)){
                foreach($id as $key =>$value){
                    $tmp[]=spintf("`%s`='%s'",$key,$value);
                }
                $sql .= implode(" && ",$tmp);
            }else{
                    $sql .="`id`=$id";
                }

            return $this->pdo->exec($sql);
        }

        function save($arr){
            if(iseet($arr['id'])){
                
                foreach($arr as $key =>$value){
                    $tmp[]=spintf("`%s`='%s'",$key,$value);
                }
                $sql ="update $this->table set ".implode(" && ",$tmp)."where `id`={$arr['id']}";
            }else{
                $sql="insert into $this->table (`".implode("`,`",array_keys($arr))."`) values ('".implode("','",$arr)."')";
            }
            return $this->pdo->exec($sql);
        }
        function q($sql){
            return $this->pdo->query($sql)->fetchAll();
        }

        function to($url){
            header("location:".$url);
        }
    }

?>