<?php
class EngineersDAO {
  public function __construct(private PDO $db){}

  // جلب جميع المهندسين
  public function list(){
    $st = $this->db->query('SELECT * FROM engineers ORDER BY created_at DESC');
    return $st->fetchAll(PDO::FETCH_ASSOC);
  }

  // إنشاء مهندس جديد
  public function create($name, $phone, $specialty = null){
    $st = $this->db->prepare('INSERT INTO engineers(name, phone, specialty) VALUES(?, ?, ?)');
    $st->execute([$name, $phone, $specialty]);
    return $this->db->lastInsertId();
  }

  // جلب مهندس عبر الـ ID
  public function findById($id){
    $st = $this->db->prepare('SELECT * FROM engineers WHERE id=?');
    $st->execute([$id]);
    return $st->fetch(PDO::FETCH_ASSOC);
  }

  // تحديث بيانات مهندس
  public function update($id, $name, $phone, $specialty = null){
    $st = $this->db->prepare('UPDATE engineers SET name=?, phone=?, specialty=? WHERE id=?');
    $st->execute([$name, $phone, $specialty, $id]);
    return $st->rowCount();
  }

  // حذف مهندس
  public function delete($id){
    $st = $this->db->prepare('DELETE FROM engineers WHERE id=?');
    $st->execute([$id]);
    return $st->rowCount();
  }
}
