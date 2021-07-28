<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_all extends CI_Model
{

    public function index()
    {
        $this->load->view('welcome_message');
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_total_kontak()
    {
        $sql = $this->db->query('SELECT COUNT(*) AS kontak FROM data_kontak');
        return $sql->result();
    }
    function get_total_akun()
    {
        $sql = $this->db->query('SELECT COUNT(*) AS akun FROM data_akun');
        return $sql->result();
    }
    function get_total_media()
    {
        $sql = $this->db->query('SELECT COUNT(*) AS media FROM data_media');
        return $sql->result();
    }
    function get_total_kamar()
    {
        $sql = $this->db->query('SELECT COUNT(*) AS kamar FROM data_kamar');
        return $sql->result();
    }
    function get_total_reservasi()
    {
        $sql = $this->db->query('SELECT COUNT(*) AS reservasi FROM data_reservasi');
        return $sql->result();
    }
    function get_total_checkin()
    {
        $sql = $this->db->query('SELECT COUNT(*) AS checkin FROM data_checkin');
        return $sql->result();
    }
    function get_total_checkout()
    {
        $sql = $this->db->query('SELECT COUNT(*) AS checkout FROM data_checkout');
        return $sql->result();
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_profile()
    {
        $this->db->join('data_pegawai', 'data_pegawai.akun_id=data_akun.id_akun');
        $this->db->join('data_tamu', 'data_tamu.akun_id=data_akun.id_akun');
        $this->db->where('id_akun', $this->session->userdata('id_akun'));
        $data = $this->db->get('data_akun')->row_array();
        return $data;
    }
    function get_data_akun()
    {
        $data = $this->db->get('data_akun')->result_array();
        return $data;
    }
    function save_akun($post)
    {
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media/images/profile'),

        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $data = array(
            'email' => $post['email'],
            'password' => $post['password'],
            'role_id' => $post['role_id'],
            'aktif' => $post['aktif'],
            'profile' => $_FILES['fileprofile']['name'],
        );
        $this->db->insert('data_akun', $data);
    }
    function save_update_akun($post)
    {
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media/images/profile'),

        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $data = array(
            'email' => $post['email'],
            //'password' => $post['password'],
            'role_id' => $post['role_id'],
            'aktif' => $post['aktif'],
            'profile' => $_FILES['fileprofile']['name'],
        );
        $this->db->where('md5(id_akun)', $post['id_akun']);
        $this->db->update('data_akun', $data);
    }
    function delete_akun($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_data_pegawai()
    {
        $this->db->join('data_akun', 'data_akun.id_akun=data_pegawai.akun_id');
        $data = $this->db->get('data_pegawai')->result_array();
        return $data;
    }
    function save_pegawai($post)
    {
        $data = array(
            'akun_id' => $post['akun_id'],
            'nama_pegawai' => $post['nama_pegawai'],
            'jabatan' => $post['jabatan'],
            'alamat' => $post['alamat'],
            'telepon' => $post['telepon'],
        );
        $this->db->insert('data_pegawai', $data);
    }
    function save_update_pegawai($post)
    {
        $data = array(
            'akun_id' => $post['akun_id'],
            'nama_pegawai' => $post['nama_pegawai'],
            'jabatan' => $post['jabatan'],
            'alamat' => $post['alamat'],
            'telepon' => $post['telepon'],
        );
        $this->db->where('md5(id_pegawai)', $post['id_pegawai']);
        $this->db->update('data_pegawai', $data);
    }
    function delete_pegawai($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_md_role()
    {
        $data = $this->db->get('md_role')->result_array();
        return $data;
    }
    function save_role($post)
    {
        $data = array(
            'role' => $post['role'],
        );
        $this->db->insert('md_role', $data);
    }
    function save_update_role($post)
    {
        $data = array(
            'role' => $post['role'],
        );
        $this->db->where('md5(id_role)', $post['id_role']);
        $this->db->update('md_role', $data);
    }
    function delete_role($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_data_tamu()
    {
        $this->db->join('data_akun', 'data_akun.id_akun=data_tamu.akun_id');
        $data = $this->db->get('data_tamu')->result_array();
        return $data;
    }
    function save_tamu($post)
    {
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media/images/bukti_identitas'),

        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();

        $data = array(
            'akun_id' => $post['akun_id'],
            'nama_tamu' => $post['nama_tamu'],
            'jk_tamu' => $post['jk_tamu'],
            'telepon_tamu' => $post['telepon_tamu'],
            'asal_tamu' => $post['asal_tamu'],
            'alamat_tamu' => $post['alamat_tamu'],
            'nomer_bukti' => $post['nomer_bukti'],
            'bukti_identitas' => $_FILES['fileidentitas']['name'],
        );
        $this->db->insert('data_tamu', $data);
    }
    function save_update_tamu($post)
    {
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media/images/bukti_identitas'),

        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $data = array(
            'akun_id' => $post['akun_id'],
            'nama_tamu' => $post['nama_tamu'],
            'jk_tamu' => $post['jk_tamu'],
            'telepon_tamu' => $post['telepon_tamu'],
            'asal_tamu' => $post['asal_tamu'],
            'alamat_tamu' => $post['alamat_tamu'],
            'nomer_bukti' => $post['nomer_bukti'],
            'bukti_identitas' => $_FILES['fileidentitas']['name'],
        );
        $this->db->where('md5(id_tamu)', $post['id_tamu']);
        $this->db->update('data_tamu', $data);
    }
    function delete_tamu($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_data_kontak()
    {
        $data = $this->db->get('data_kontak')->result_array();
        return $data;
    }

    function save_kontak($post)
    {
        $data = array(
            'nama_pengirim' => $post['nama_pengirim'],
            'email_pengirim' => $post['email_pengirim'],
            'subjek' => $post['subjek'],
            'pesan' => $post['pesan'],
            'tanggal_dikirim' => Date('Y-m-d h:i:s'),
            'tanggapan' => 'Belum Ditanggapi',
        );
        $this->db->insert('data_kontak', $data);
    }
    function save_update_kontak($post)
    {
        $data = array(
            'nama_pengirim' => $post['nama_pengirim'],
            'email_pengirim' => $post['email_pengirim'],
            'subjek' => $post['subjek'],
            'pesan' => $post['pesan'],
            'tanggal_dikirim' => $post['tanggal_dikirim'],
            'tanggapan' => 'Ditanggapi',
        );
        $this->db->where('md5(id_kontak)', $post['id_kontak']);
        $this->db->update('data_kontak', $data);
    }
    function delete_kontak($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_data_media()
    {
        $data = $this->db->get('data_media')->result_array();
        return $data;
    }
    function save_media($post)
    {
        $config = array(
            'allowed_types' => 'jpg|jpeg|png',
            'upload_path' => realpath('./media/images/gambar_lokasi'),

        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $data = array(
            'nama_media' => $post['nama_media'],
            'media' => $_FILES['filemedia']['name'],
        );
        $this->db->insert('data_media', $data);
    }
    function save_update_media($post)
    {
        $config = array(
            'allowed_types' => 'jpg|jpeg|png',
            'upload_path' => realpath('./media/images/gambar_lokasi'),

        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $data = array(
            'nama_media' => $post['nama_media'],
            'media' => $_FILES['filemedia']['name'],
        );
        $this->db->where('md5(id_media)', $post['id_media']);
        $this->db->update('data_media', $data);
    }
    function delete_media($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_md_jenis()
    {
        $data = $this->db->get('md_jeniskamar')->result_array();
        return $data;
    }
    function save_jenis($post)
    {
        $data = array(
            'nama_jk' => $post['nama_jk'],
            'anak' => $post['anak'],
            'dewasa' => $post['dewasa'],
            'single' => $post['single'],
            'double' => $post['double'],
        );
        $this->db->insert('md_jeniskamar', $data);
    }
    function save_update_jenis($post)
    {
        $data = array(
            'nama_jk' => $post['nama_jk'],
            'anak' => $post['anak'],
            'dewasa' => $post['dewasa'],
            'single' => $post['single'],
            'double' => $post['double'],
        );
        $this->db->where('md5(id_jk)', $post['id_jk']);
        $this->db->update('md_jeniskamar', $data);
    }
    function delete_jenis($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_data_fasilitas()
    {
        $data = $this->db->get('data_fasilitas')->result_array();
        return $data;
    }
    function save_fasilitas($post)
    {
        $data = array(
            'jenis_fasilitas' => $post['jenis_fasilitas'],
            'harga_fasilitas' => $post['harga_fasilitas'],
            'ketentuan' => $post['ketentuan'],
        );
        $this->db->insert('data_fasilitas', $data);
    }
    function save_update_fasilitas($post)
    {
        $data = array(
            'jenis_fasilitas' => $post['jenis_fasilitas'],
            'harga_fasilitas' => $post['harga_fasilitas'],
            'ketentuan' => $post['ketentuan'],
        );
        $this->db->where('md5(id_fasilitas)', $post['id_fasilitas']);
        $this->db->update('data_fasilitas', $data);
    }
    function delete_fasilitas($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_keyword_kamar($keyword)
    {
        $this->db->select('*');
        $this->db->from('data_kamar');
        $this->db->join('md_jeniskamar', 'md_jeniskamar.id_jk=data_kamar.jk_id');

        $this->db->like('jk_id', $keyword);
        $this->db->or_like('jk_id', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('status_kamar', $keyword);
        $this->db->or_like('foto_kamar', $keyword);
        return $this->db->get()->result_array();
    }
    function get_data_kamar()
    {
        $this->db->join('md_jeniskamar', 'md_jeniskamar.id_jk=data_kamar.jk_id');
        $data = $this->db->get('data_kamar')->result_array();
        return $data;
    }
    function save_kamar($post)
    {
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp|webp',
            'upload_path' => realpath('./media/images/kamar'),

        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();

        $data = array(
            'no_kamar' => $post['no_kamar'],
            'jk_id' => $post['jk_id'],
            'harga' => $post['harga'],
            'deskripsi' => $post['deskripsi'],
            'foto_kamar' => $_FILES['filekamar']['name'],
        );
        $this->db->insert('data_kamar', $data);
    }
    function save_update_kamar($post)
    {
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp|webp',
            'upload_path' => realpath('./media/images/kamar'),

        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $data = array(
            'no_kamar' => $post['no_kamar'],
            'jk_id' => $post['jk_id'],
            'harga' => $post['harga'],
            'deskripsi' => $post['deskripsi'],
            'foto_kamar' => $_FILES['filekamar']['name'],
        );
        $this->db->where('md5(id_kamar)', $post['id_kamar']);
        $this->db->update('data_kamar', $data);
    }
    function delete_kamar($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function get_detail_kamar($kode)
    {
        $this->db->join('md_jeniskamar', 'md_jeniskamar.id_jk=data_kamar.jk_id');
        $hsl = $this->db->query("SELECT * FROM data_kamar WHERE id_kamar='$kode'");
        return $hsl;
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_reservasidetail($rd)
    {
        $dr = $this->db->query("SELECT * FROM data_reservasi WHERE id_reservasi='$rd'");
        return $dr;
    }
    function get_data_reservasi()
    {
        $this->db->join('data_akun', 'data_akun.id_akun=data_reservasi.akun_id');
        $this->db->join('data_kamar', 'data_kamar.id_kamar=data_reservasi.kamar_id');
        $this->db->join('data_fasilitas', 'data_fasilitas.id_fasilitas=data_reservasi.fasilitas_id');

        $data = $this->db->get('data_reservasi')->result_array();
        return $data;
    }
    function get_reservasi()
    {
        $data = $this->db->get('data_reservasi')->result_array();
        return $data;
    }
    function save_reservasi($post)
    {

        $data = array(
            'akun_id' => $this->session->userdata('id_akun'),
            'tgl_reservasi' => date('Y-M-d H:i:s'),
            'kamar_id' => $post['kamar_id'],
            'fasilitas_id' => $post['fasilitas_id'],
            'menginap' => $post['menginap'],
            'mulai_sejak' => $post['mulai_sejak'],
            'berakhir_sejak' => $post['berakhir_sejak'],
            'status_reservasi' => 'Menunggu',
        );
        $this->db->insert('data_reservasi', $data);
    }
    function save_update_reservasi($post)
    {

        $data = array(
            //'tamu_id' => $post['no_kamar'],
            //'tgl_reservasi' => date('D, d M Y'),
            'kamar_id' => $post['kamar_id'],
            'fasilitas_id' => $post['fasilitas_id'],
            'menginap' => $post['menginap'],
            'mulai_sejak' => $post['mulai_sejak'],
            'berakhir_sejak' => $post['berakhir_sejak'],
            'status_reservasi' => 'Selesai',
        );
        $this->db->where('md5(id_reservasi)', $post['id_reservasi']);
        $this->db->update('data_reservasi', $data);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_data_checkin()
    {
        $data = $this->db->get('data_checkin')->result_array();
        return $data;
    }
    function save_checkin($post)
    {
        $data = array(
            'waktu_checkin' => date('Y-M-d H:i:s'),
            'reservasi_id' => $post['reservasi_id'],
            'akun_id' => $post['akun_id'],
            'tamu_id' => $post['tamu_id'],
        );
        $this->db->insert('data_checkin', $data);
    }
    function save_update_checkin($post)
    {
        $data = array(
            'reservasi_id' => $post['reservasi_id'],
            'akun_id' => $post['akun_id'],
            'tamu_id' => $post['tamu_id'],
        );
        $this->db->where('md5(id_checkin)', $post['id_checkin']);
        $this->db->update('data_checkin', $data);
    }
    function delete_checkin($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_data_checkout()
    {
        $this->db->join('tb_lokasi', 'id_lokasi.id_reservasi=data_checkout.reservasi_id');
        $this->db->join('data_checkin', 'data_checkin.id_checkin=data_checkout.checkin_id');

        $data = $this->db->get('data_checkout')->result_array();
        return $data;
    }
    function save_checkout($post)
    {
        $data = array(
            'waktu_checkout' => date('Y-M-d H:i:s'),
            'reservasi_id' => $post['reservasi_id'],
            'checkin_id' => $post['checkin_id'],
            'jumlah_pembayaran' => $post['jumlah_pembayaran'],
            'metode_pembayaran' => $post['metode_pembayaran'],
            'status_pembayaran' => 'Belum Lunas',
        );
        $this->db->insert('data_checkout', $data);
    }
    function save_update_checkout($post)
    {
        $data = array(
            //'waktu_checkout' => time('Y-M-d'),
            'reservasi_id' => $post['reservasi_id'],
            'checkin_id' => $post['checkin_id'],
            'jumlah_pembayaran' => $post['jumlah_pembayaran'],
            'metode_pembayaran' => $post['metode_pembayaran'],
            'status_pembayaran' => 'Lunas',
        );
        $this->db->where('md5(id_checkout)', $post['id_checkout']);
        $this->db->update('data_checkout', $data);
    }
    function delete_checkout($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_all()
    {
        $this->db->join('data_akun', 'data_akun.id_akun=data_checkin.akun_id');
        $this->db->join('data_tamu', 'data_tamu.id_tamu=data_checkin.tamu_id');
        $this->db->join('data_checkout', 'data_checkout.id_checkout=data_checkin.checkout_id');

        $data = $this->db->get('data_checkin')->result_array();
        return $data;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_checkin()
    {
        $this->db->join('data_akun', 'data_akun.id_akun=data_checkin.akun_id');
        $this->db->join('data_tamu', 'data_tamu.id_tamu=data_checkin.tamu_id');
        $this->db->join('data_reservasi', 'data_reservasi.id_reservasi=data_checkin.reservasi_id');

        $data = $this->db->get('data_checkin')->result_array();
        return $data;
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_total_lokasi()
    {

        $sql = $this->db->query('SELECT COUNT(*) AS Lokasi FROM tb_lokasi');

        return $sql->result();
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_lokasi()
    {
        $data = $this->db->get('tb_lokasi')->result_array();
        return $data;
    }

    function get_data_lokasibyid($id)
    {
        $this->db->where('id_lokasi',$id);
        $data = $this->db->get('tb_lokasi')->row_array();
        return $data;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_gambar()
    {
        $data = $this->db->get('tb_lokasi')->result_array();
        return $data;
    }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_gambar_lokasi($id)
    {
        $this->db->where('id_lokasi',$id);
        $data = $this->db->get('tb_gambar')->result_array();
        return $data;
    }
    
}
