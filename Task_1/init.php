<?php


class init {

    public $db;
    private $table;
    public function __construct($db){
        $this->table = "test";
        $this->db = $db;
        $this->create();
        $this->fill();
    }

    /**
     * Метод create
     *
     * создает таблицу test, содержащую 5 полей:
     * id - int
     * script_name - varchar 25
     * start_time - int
     * end_time - int
     * result - varchar [один вариант из 'normal', 'illegal', 'failed', 'success']
     */
    private function create(){

        $query = "CREATE TABLE ".$this->table." (
 id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
 PRIMARY KEY(id),
 script_name VARCHAR(25) NOT NULL,
 start_time INT(11) NOT NULL,
 end_time INT(11) NOT NULL,
 result VARCHAR(10) NOT NULL
 )";
        $this->db->query($query);

    }

    /**
     * Метод fill
     *
     * заполняет таблицу случайными данными
     * int $count_of_rows - количество записанных строк
     * int $start_time - генерируется функцией РНР time()
     * $end_time - генерируется функцией РНР time()
     */
    private function fill(){
        $count_of_rows = 13;
        $i = 1;
        while($i <= $count_of_rows){
            $start_time = time();
            $script_names = array ('Php','Python', 'Javascript','Bash', 'Ruby', "Perl");
            $result_field = array('normal', 'illegal', 'failed', 'success');
            $num_1 = rand(0, 5) ;
            $num_2 = rand(0, 3) ;

            $query = "
        INSERT INTO `".$this->table."` (`script_name`,`start_time`,`end_time`,`result`) VALUES (:script_name, :start_time, :end_time, :result)
        ";
            $end_time = time();
            $params = [
                ':script_name' => $script_names[$num_1],
                ':start_time' => $start_time,
                ':end_time' => $end_time,
                ':result' => $result_field[$num_2]
            ];
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            $i++;
        }

    }

    /**
     * Метод get
     *
     * выбирает из таблицы test, данные по критерию: result среди значений 'normal' и 'success'
     * @results -
     */
    public function get(){
        $query = "SELECT * FROM ".$this->table." WHERE `result`='normal' OR `result`='success'
        ";
        $select = $this->db->query($query);
        $results = $select->fetchAll();
        echo '<pre>';
        print_r($results);
    }

}
