<?php
class UsersDAO {
  public function __construct(private PDO $db){}

  public function findByUsername($u){
    $st = $this->db->prepare('SELECT * FROM users WHERE username=?');
    $st->execute([$u]);
    return $st->fetch(PDO::FETCH_ASSOC);
  }

  public function list(){
    return $this->db->query('SELECT id,username,role,created_at FROM users ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create($username,$password,$role){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $st = $this->db->prepare('INSERT INTO users(username,password,role) VALUES(?,?,?)');
    $st->execute([$username,$hash,$role]);
  }
}
?>
