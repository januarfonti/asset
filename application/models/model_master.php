<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_master extends CI_Model
{
	public function ambil_kantor($num,$offset){
		$this->db->order_by('nama_kantor', 'ASC');
		$query = $this->db->get('tbl_kantor',$num,$offset);
		return $query;
	}

	public function ambil_data_kantor(){
		$this->db->order_by('nama_kantor', 'ASC');
		$query = $this->db->get('tbl_kantor');
		return $query;
	}

	public function tambah_kantor($data){
		$this->db->insert('tbl_kantor',$data);
	}

	public function cek_kantor($kode_kantor,$nama_kantor){
        $query = $this->db->query("select * from tbl_kantor where kode_kantor='$kode_kantor' or nama_kantor='$nama_kantor'");
        return $query;
    }

    public function detail_kantor($id){
        return $this->db->get_where('tbl_kantor', array('id' => $id));
    }

    public function ubah_kantor($data,$id){
        $this->db->update("tbl_kantor",$data,$id);
    }

    public function hapus_kantor($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_kantor');
    }

    /** MODEL RUANGAN **/

    public function ambil_ruangan($num,$offset){
    	$this->db->select('tbl_ruangan.id as id_ruangan, tbl_ruangan.kode_ruangan,tbl_ruangan.nama_ruangan,tbl_kantor.nama_kantor,tbl_kantor.id as id_kantor');
		$this->db->from('tbl_ruangan');
		$this->db->join('tbl_kantor', 'tbl_kantor.id = tbl_ruangan.id_kantor','inner');
		$this->db->limit($num, $offset);
		$query = $this->db->get();
    	return $query;
    }

    public function tambah_ruangan($data){
		$this->db->insert('tbl_ruangan',$data);
	}

	public function cek_ruangan($kode_ruangan,$nama_ruangan){
        $query = $this->db->query("select * from tbl_ruangan where kode_ruangan='$kode_ruangan' or nama_ruangan='$nama_ruangan'");
        return $query;
    }

    public function detail_ruangan($id){
        //return $this->db->get_where('tbl_ruangan', array('id' => $id));
        $this->db->select('tbl_ruangan.id as id_ruangan,tbl_ruangan.kode_ruangan,tbl_ruangan.nama_ruangan,tbl_kantor.nama_kantor,tbl_kantor.id as id_kantor');
		$this->db->from('tbl_ruangan');
		$this->db->join('tbl_kantor', 'tbl_kantor.id = tbl_ruangan.id_kantor','inner');
		$this->db->where('tbl_ruangan.id',$id);
		$query = $this->db->get();
		return $query;
	}

    public function ubah_ruangan($data,$id){
        $this->db->update("tbl_ruangan",$data,$id);
    }

    public function hapus_ruangan($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_ruangan');
    }

    /** MODEL KATEGORI **/
    public function ambil_kategori($num,$offset){
		$this->db->order_by('nama_kategori', 'ASC');
		$query = $this->db->get('tbl_kategori',$num,$offset);
		return $query;
	}

	public function detail_kategori($id){
        return $this->db->get_where('tbl_kategori', array('id' => $id));
    }

	public function tambah_kategori($data){
		$this->db->insert('tbl_kategori',$data);
	}

	public function cek_kategori($kode_kategori,$nama_kategori){
        $query = $this->db->query("select * from tbl_kategori where kode_kategori='$kode_kategori' or nama_kategori='$nama_kategori'");
        return $query;
    }

    public function hapus_kategori($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_kategori');
    }

    public function ubah_kategori($data,$id){
        $this->db->update("tbl_kategori",$data,$id);
    }

     /** MODEL JABATAN **/
    public function ambil_jabatan($num,$offset){
        $this->db->order_by('nama_jabatan', 'ASC');
        $query = $this->db->get('tbl_jabatan',$num,$offset);
        return $query;
    }

    public function detail_jabatan($id){
        return $this->db->get_where('tbl_jabatan', array('id' => $id));
    }

    public function tambah_jabatan($data){
        $this->db->insert('tbl_jabatan',$data);
    }

    public function cek_jabatan($kode_jabatan,$nama_jabatan){
        $query = $this->db->query("select * from tbl_jabatan where kode_jabatan='$kode_jabatan' or nama_jabatan='$nama_jabatan'");
        return $query;
    }

    public function hapus_jabatan($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_jabatan');
    }

    public function ubah_jabatan($data,$id){
        $this->db->update("tbl_jabatan",$data,$id);
    }

    public function ambil_data_jabatan(){
        $this->db->order_by('nama_jabatan', 'ASC');
        $query = $this->db->get('tbl_jabatan');
        return $query;
    }


    //PEGAWAI

    public function ambil_pegawaii($num,$offset){
        $this->db->order_by('username', 'ASC');
        $query = $this->db->get('users',$num,$offset);
        return $query;
    }

    public function ambil_pegawai($num,$offset){
        //return $this->db->get_where('tbl_ruangan', array('id' => $id));
        $this->db->select('users.id as id,tbl_jabatan.id AS id_jabatan, users.nik,tbl_jabatan.nama_jabatan,users.first_name,users.last_name,users.alamat');
        $this->db->from('users');
        $this->db->join('tbl_jabatan', 'tbl_jabatan.id = users.id_jabatan','inner');
        $this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query;
    }

    public function detail_pegawai($id){
        //return $this->db->get_where('tbl_ruangan', array('id' => $id));
        $this->db->select('users.id as id,tbl_jabatan.id AS id_jabatan, users.nik,tbl_jabatan.nama_jabatan,users.first_name,users.last_name,users.alamat,email,jenis_kelamin,phone');
        $this->db->from('users');
        $this->db->join('tbl_jabatan', 'tbl_jabatan.id = users.id_jabatan','inner');
        $this->db->where('users.id',$id);
        $query = $this->db->get();
        return $query;
    }

    public function hapus_pegawai($id){
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    public function ambil_data_kategori(){
        $this->db->order_by('nama_kategori', 'ASC');
        $query = $this->db->get('tbl_kategori');
        return $query;
    }

    public function ambil_data_ruangan(){
        $this->db->order_by('nama_ruangan', 'ASC');
        $query = $this->db->get('tbl_ruangan');
        return $query;
    }

}