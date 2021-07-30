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
            'allowed_types' => 'jpg|jpeg|png',
            'upload_path' => 'media/images/profile',
            'encrypt_name' => true
        );
        $this->load->library('upload', $config);
        $this->upload->do_upload('fileprofile');

        if($_FILES['fileprofile']['error'] == 4){
            $namaprofile = "default.png";
        }
        else {
            // $namaprofile = str_replace(" ","_", $_FILES['fileprofile']['name']);
            $namaprofile = $this->upload->data("file_name");
        }

        $data = array(
            'email' => $post['email'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'role_id' => $post['role_id'],
            'aktif' => $post['aktif'],
            'profile' => $namaprofile,
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

    function delete_gambar($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}
