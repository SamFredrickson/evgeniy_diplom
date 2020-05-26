<?php

class Database extends Printer{

    private $db = null;

    public function __construct(){
        try{
            $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME .';charset=utf8', USER, PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->db = $db;

        }catch(PDOException $e){
            print "Could not connect: " . $e->getMessage();
        }
    }

    public function get_context(){
        return $this->db;
    }

    public function get_cart_total_price(){

        $total = 0;

        $q = $this->db->query("SELECT cart.amount, item.price from cart
        join item on cart.id_item = item.id where id_user = $_SESSION[id]");
        while($row = $q->fetch()) 
            $total += $row['amount'] * $row['price'];

         return $total;
    }

    public function getIdByLogin($login){
        $q = $this->db->query("SELECT id FROM users WHERE login = '$login'");
        $rows = $q->fetchAll();

        return $rows[0]['id'];
    }

    public function getRoleByLogin($login){
        $q = $this->db->query("SELECT user_role FROM users WHERE login = '$login'");
        $rows = $q->fetchAll();

        return $rows[0]['user_role'];
    }

    private function isUserExixts($login){

        $q = $this->db->query("SELECT * FROM users WHERE
        login = '$login'");
        $rows = $q->fetchAll();
       
       if(count($rows) <= 0)
           return 0;
        else 
            return 1;

    }

    public function create_user($login, $password, $firstname, $lastname, $middlename, $phone, $email, $role, $regDate){
        $e = $this->db->exec("INSERT INTO users (login, user_password, firstname, lastname, middlename, phone, email, user_role, registerDate)
        VALUES ('$login', '$password', '$firstname', '$lastname', '$middlename', '$phone', '$email', '$role', '$regDate')");
    }

    public function insert_item($title, $size, $price, $desc, $pic){
        $e = $this->db->exec("INSERT INTO item (title, size, price, description_item, item_image)
        VALUES ('$title', $size, $price, '$desc', '$pic')");

    }

    public function show_items(){
        $q = $this->db->query("SELECT * FROM item");
        while($row = $q->fetch()) 
            $this->show_item($row['id'], $row['item_image'], $row['size'], $row['title'], $row['price']);
    }

    private function get_user_hash($login){
        $q = $this->db->query("SELECT user_password FROM users WHERE
        login = '$login'");
        $rows = $q->fetchAll();

        return $rows[0]['user_password'];
    }

    public function validate_user($login, $password){

        if(!$this->isUserExixts($login)) return false;
        if(!password_verify($password, $this->get_user_hash($login))) return false;

        return true;
    }

    public function get_item_title($id){
        $q = $this->db->query("SELECT title FROM item WHERE
        id = '$id'");
        $rows = $q->fetchAll();

        return $rows[0]['title'];
    }

    public function get_item_price($id){
        $q = $this->db->query("SELECT price FROM item WHERE
        id = '$id'");
        $rows = $q->fetchAll();

        return $rows[0]['price'];
    }

    public function get_item_desc($id){
        $q = $this->db->query("SELECT description_item FROM item WHERE
        id = '$id'");
        $rows = $q->fetchAll();

        return $rows[0]['description_item'];
    }

    public function get_item_image($id){
        $q = $this->db->query("SELECT item_image FROM item WHERE
        id = '$id'");
        $rows = $q->fetchAll();

        return $rows[0]['item_image'];
    }

    public function get_amount_items(){
        if(isset($_SESSION['login'])){
            $q = $this->db->query("SELECT count(*) FROM cart WHERE id_user = $_SESSION[id]");
            $rows = $q->fetchAll();
            return $rows[0][0];
        }else{

            return 0;
        }
    }

    public function get_amount_users(){
        $q = $this->db->query("SELECT count(*) FROM users");
            $rows = $q->fetchAll();
            return $rows[0][0];
    }

    public function get_amount_comments(){
        $q = $this->db->query("SELECT count(*) FROM comments");
            $rows = $q->fetchAll();
            return $rows[0][0];
    }

    public function get_amount_items_all(){
        
        $q = $this->db->query("SELECT count(*) FROM item");
            $rows = $q->fetchAll();
            return $rows[0][0];
    }

    public function get_amount_items_specific($item_id){
        if(isset($_SESSION['login'])){
            $q = $this->db->query("SELECT count(*) FROM cart WHERE id_user = $_SESSION[id] and id_item = $item_id");
            $rows = $q->fetchAll();
            return $rows[0][0];
        }
    }

    public function get_amount_items_specific_field($item_id){
        if(isset($_SESSION['login'])){
            $q = $this->db->query("SELECT amount FROM cart WHERE id_user = $_SESSION[id] and id_item = $item_id");
            $rows = $q->fetchAll();
            return $rows[0]['amount'];
        }
    }

    public function add_to_item(){

    }

    public function insert_cart($item_id){
        $count = $this->get_amount_items_specific($item_id);

        if($count == 0){
            $e = $this->db->exec("INSERT INTO cart (id_user, id_item, amount)
                 VALUES ($_SESSION[id], $item_id, 1)");
        }else{
            $amount = $this->get_amount_items_specific_field($item_id) + 1;
            $e = $this->db->exec("UPDATE cart SET amount = '$amount' WHERE id_user = $_SESSION[id] and id_item = $item_id");
        }
    }

    public function insert_cart_amount($item_id, $amount){
        $count = $this->get_amount_items_specific($item_id);

        if($count == 0){
            $e = $this->db->exec("INSERT INTO cart (id_user, id_item, amount)
                 VALUES ($_SESSION[id], $item_id, $amount)");
        }else{
            $amount = $this->get_amount_items_specific_field($item_id) + $amount;
            $e = $this->db->exec("UPDATE cart SET amount = '$amount' WHERE id_user = $_SESSION[id] and id_item = $item_id");
        }
    }

    public function insert_cart_amount_update($item_id, $amount){

        $e = $this->db->exec("UPDATE cart SET amount = '$amount' WHERE id_user = $_SESSION[id] and id_item = $item_id");

    }

    public function insert_comment($user_id, $item_id, $comment, $date){
        $e = $this->db->exec("INSERT INTO comments (id_user, id_item, comment_text, date_comment) 
        VALUES ($user_id, $item_id, '$comment', '$date')");
    }

    public function show_cart_items(){
        $q = $this->db->query("SELECT item.id, item.title, item.description_item, item.item_image, item.price, item.size, cart.amount from cart 
        join users on cart.id_user = users.id
        join item  on cart.id_item = item.id where cart.id_user = $_SESSION[id]");
        while($row = $q->fetch()) 
            $this->show_cart_item($row['id'], $row['title'], $row['description_item'], $row['item_image'], $row['price'], $row['amount']);
    }

    public function delete_from_cart($item_id){
        $e = $this->db->exec("DELETE FROM cart WHERE id_user = $_SESSION[id] AND id_item = $item_id");
    }

    public function delete_from_item($item_id){
        $e = $this->db->exec("DELETE FROM item WHERE id = $item_id");
    }

    public function show_comments($id){
        $q = $this->db->query("SELECT comments.id, comments.comment_text, users.login from comments
        join item on comments.id_item = item.id
        join users on comments.id_user = users.id WHERE id_item = $id");
        while($row = $q->fetch()) 
            $this->show_comment($row['id'], $row['login'], $row['comment_text']);

    }

    public function show_admin_items(){
        $q = $this->db->query("SELECT * FROM item");
        while($row = $q->fetch()) 
            $this->show_admin_item($row['id'], $row['title'], $row['price'], $row['size']);
    }
}