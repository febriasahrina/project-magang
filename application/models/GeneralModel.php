<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class GeneralModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function like_match($pattern, $subject)
  {
      $subject = str_replace('%', '.*', preg_quote($subject, '/'));
      return (bool) preg_match("/^{$subject}$/i", $pattern);
  }

  function get_general($table)
  {
    $query = $this->db->get($table);
    return $query->result();
  }

  function get_general_group_by($table,$group_by)
  {
    $query = $this->db->query("SELECT * FROM $table GROUP BY $group_by");
    return $query->result();
  }

  function get_general_order_by($table,$by,$order)
  {
    return $query = $this->db->query("SELECT * FROM $table ORDER BY $by $order")->result();
  }

  function truncate_general($table)
  {
    return $this->db->query("TRUNCATE TABLE $table");
  }

  function count_general($table)
  {
    return $this->db->query("SELECT COUNT(*) as jumlah FROM $table")->row();
  }

  function count_by_id_general($table, $id, $val)
  {
    return $this->db->query("SELECT COUNT(*) as jumlah FROM $table WHERE $id = '$val'")->row();
  }

  function get_by_id_general($table, $id, $val)
  {
    $query = $this->db->where($id, $val)->get($table);
    return $query->result();
  }

  function get_by_id_general_row($table, $id, $val)
  {
    $query = $this->db->where($id, $val)->get($table);
    return $query->row();
  }

  function create_general($table, $data)
  {
    return $this->db->insert($table, $data);
  }

  function create_general2($table, $data)
  {
    $this->db->insert($table, $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  function update_general($table, $id, $val, $data)
  {
    $this->db->where($id, $val);
    return $this->db->update($table, $data);
  }

  function delete_general($table, $id, $val)
  {
    $this->db->where($id, $val);
    return $this->db->delete($table);
  }

  function limit_general($table, $limit)
  {
    return $this->db->query("SELECT * FROM $table LIMIT $limit")->result();
  }

  function limit_general_order_by($table, $order_by, $order ,$limit)
  {
    return $this->db->query("SELECT * FROM $table ORDER BY $order_by $order LIMIT $limit")->result();
  }

  function requestTask($persetujuan)
  {
    return $this->db->query("SELECT * FROM tb_tasklist t ,tb_pengguna p WHERE t.created_by = p.id_pengguna AND t.status_persetujuan ='$persetujuan'")->result();
  }

  function requestHistoryTask($persetujuan,$persetujuan2)
  {
    return $this->db->query("SELECT * FROM tb_tasklist t ,tb_pengguna p WHERE t.created_by = p.id_pengguna AND t.status_persetujuan ='$persetujuan' AND t.status_detail_pekerjaan = '$persetujuan2'")->result();
  }

  function requestHakAkses()
  {
    return $this->db->query("SELECT DISTINCT p.hak_akses FROM tb_tasklist t ,tb_pengguna p WHERE t.created_by = p.id_pengguna AND t.bidang_kerja = 'SVP CORPU' OR p.hak_akses LIKE '%VP%'")->result();
  }

  function requestHakAkses_cek($hak_akses)
  {
    return $this->db->query("SELECT p.hak_akses FROM tb_tasklist t ,tb_pengguna p WHERE t.created_by = p.id_pengguna AND p.hak_akses = '$hak_akses' AND p.hak_akses NOT LIKE '%Staff%'")->result();
  }

  function requestTask_hak($persetujuan,$hak)
  {
    $hak = str_replace("VP ", "", $hak);
    return $this->db->query("SELECT * FROM tb_tasklist t ,tb_pengguna p WHERE t.created_by = p.id_pengguna AND t.status_persetujuan ='$persetujuan' AND p.hak_akses LIKE '%{$hak}%'")->result();
  }

  function requestHistoryTask_hak($persetujuan,$persetujuan2,$hak)
  {
    $hak = str_replace("VP ", "", $hak);
    return $this->db->query("SELECT * FROM tb_tasklist t ,tb_pengguna p WHERE t.created_by = p.id_pengguna AND t.status_persetujuan ='$persetujuan' AND t.status_detail_pekerjaan ='$persetujuan2' AND t.bidang_kerja LIKE '%{$hak}%'")->result();
  }

  function requestTaskId($persetujuan,$id_pengguna)
  {
    return $this->db->query("SELECT * FROM tb_tasklist t ,tb_pengguna p WHERE t.created_by = p.id_pengguna AND t.status_persetujuan ='$persetujuan' AND created_by ='$id_pengguna'")->result();
  }

  function requestHistoryTaskId($persetujuan,$persetujuan2,$id_pengguna)
  {
    return $this->db->query("SELECT * FROM tb_tasklist t ,tb_pengguna p WHERE t.created_by = p.id_pengguna AND t.status_persetujuan ='$persetujuan' AND t.status_detail_pekerjaan ='$persetujuan2' AND created_by ='$id_pengguna'")->result();
  }

  function selectTaskId($persetujuan,$id_pengguna)
  {
    return $this->db->query("SELECT * FROM tb_tasklist t ,tb_pengguna p WHERE t.created_by = p.id_pengguna AND t.status_persetujuan ='$persetujuan' AND created_by ='$id_pengguna'")->result();
  }

  function requestJudulTask($id_task)
  {
    return $this->db->query("SELECT nama_pekerjaan FROM tb_tasklist WHERE id_tasklist = '$id_task'")->result();
  }

  function getProgressAll()
  {
    return $this->db->query("SELECT status_detail_pekerjaan FROM tb_tasklist WHERE status_persetujuan = 'Approve'")->result();
  }

  function getProgress($val)
  {
    return $this->db->query("SELECT status_detail_pekerjaan FROM tb_tasklist WHERE bidang_kerja = '$val' AND status_persetujuan = 'Approve'")->result();
  }

  function getSubProgress($val)
  {
    return $this->db->query("SELECT a.status_detail_pekerjaan, b.hak_akses, a.nama_pekerjaan FROM tb_tasklist a, tb_pengguna b WHERE a.created_by = b.id_pengguna AND b.hak_akses = '$val' AND a.status_persetujuan = 'Approve'")->result();
  }

  function exportLaporan($start_date,$end_date)
  {
    $id_pengguna = $this->session->userdata('id_pengguna');
    return $this->db->query("SELECT * FROM tb_tasklist t ,tb_pengguna p WHERE t.created_by = '$id_pengguna' AND t.created_by = p.id_pengguna AND t.start_date >= '$start_date' AND t.end_date <= '$end_date' AND status_persetujuan='Approve'")->result();
  }

  function get_nama_penerima($id_tasklist)
  {
    return $this->db->query("SELECT p.nama_lengkap FROM tb_tasklist t JOIN tb_pengguna p ON t.created_by=p.id_pengguna WHERE t.id_tasklist = '$id_tasklist'")->result();
  }

  function get_jabatan($hak_akses)
  {
    $hasil = preg_split('/[\s,]+/', $hak_akses, 3);
    return $hasil[0];
  }

  function get_atasan($hak_akses)
  {
    $hasil = preg_split('/[\s,]+/', $hak_akses, 3);
    $nama = "VP ".$hasil[1];
    return $this->db->query("SELECT nama_lengkap FROM tb_pengguna WHERE hak_akses = '$nama'")->result();
  }

  function get_bawahan($hak_akses)
  {
    $hasil = preg_split('/[\s,]+/', $hak_akses, 3);
    $nama = "Staff ".$hasil[1];
    return $this->db->query("SELECT nama_lengkap FROM tb_pengguna WHERE hak_akses = '$nama'")->result();
  }

  function get_svp($hak_akses)
  {
    $hasil = preg_split('/[\s,]+/', $hak_akses, 3);
    // $nama = "Staff ".$hasil[1];
    return $this->db->query("SELECT nama_lengkap FROM tb_pengguna WHERE hak_akses LIKE '%{$hasil[1]}%'")->result();
  }

  function get_svp2($hak_akses)
  {
    $hasil = preg_split('/[\s,]+/', $hak_akses, 3);
    $nama = "VP ".$hasil[1];
    return $this->db->query("SELECT nama_lengkap FROM tb_pengguna WHERE hak_akses LIKE '%{$nama}%'")->result();
  }

  function jlh_notif($nama_user)
  {
    // header("Refresh:0");
    return $this->db->query("SELECT count(id_notifikasi) as jumlah, nama_pengirim, id_detail_task FROM tb_notifikasi WHERE nama_penerima = '$nama_user' AND baca ='N'")->result();
  }

  function sudah_baca($id_detail_task,$nama_penerima)
  {
    $this->db->query("UPDATE tb_notifikasi SET baca='Y' WHERE id_detail_task='$id_detail_task' AND nama_penerima='$nama_penerima' AND baca='N'");
  }

  function get_pengguna($id_detail_task)
  {
    return $this->db->query("SELECT hak_akses FROM tb_detail_task t ,tb_pengguna p WHERE t.id_detail_task = '$id_detail_task' AND t.created_by = p.id_pengguna")->result();
  }

  
}
