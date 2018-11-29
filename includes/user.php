<?php
class User{
    public $id;
    public $name;
    public $first_name;
    public $last_name;


    public static function find_all_users(){
        
        $sql = "SELECT * FROM users LIMIT 1";
        $all_users = self::find_this_query($sql);
        return $all_users;
    }

    public static function find_user_by_id($id){
        global $connection;
        $user_by_id = self::find_this_query("SELECT * FROM users WHERE id = {$id} LIMIT 1");
        $result = $user_by_id->fetch_array();
        return $result;
    }



public static function verify_the_user($password , $username){
    global $connection;
    $username = $connection->escape_string($username);
    $password = $connection->escape_string($password);

    $found_user = self::find_this_query("SELECT * FROM users WHERE name = '{$username}' AND password = '{$password}' LIMIT 1");

    return !empty($found_user) ? array_shift($found_user) : false;
}




    public static function find_this_query($sql){
        global $connection;
        $result =$connection->query($sql);
        $the_object_array = array();

        while ($row = mysqli_fetch_array($result)) {
            $the_object_array[] = self::instantation($row);
        }
        return $the_object_array;
        var_dump($the_object_array);
    }


    public static function instantation($the_record){
        $the_object = new self;
        foreach ($the_record as $the_attribute =>$value) {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute =  $value;
            }
            
        }
        return $the_object;
    }

    private function has_the_attribute($the_attribute){
        $object_proprities = get_object_vars($this);

        return array_key_exists($the_attribute, $object_proprities);
    }
}




?>