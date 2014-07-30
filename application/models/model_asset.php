<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_asset extends CI_Model
{
	
	public function tambah_asset($data){
		$this->db->insert('tbl_asset',$data);
	}

	function getKantorList(){
		$result = array();
		$this->db->select('*');
		$this->db->from('tbl_kantor');
		$this->db->order_by('nama_kantor','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '- Pilih Kantor -';
            $result[$row->id]= $row->nama_kantor;
        }
        
        return $result;
	}

	function getRuanganList(){
		$id_kantor = $this->input->post('id_kantor');
		$result = array();
		$this->db->select('*');
		$this->db->from('tbl_ruangan');
		$this->db->where('id_kantor',$id_kantor);
		$this->db->order_by('nama_ruangan','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Ruangan-';
            $result[$row->id]= $row->nama_ruangan;
        }
        
        return $result;
	}

	 public function ambil_asset($num,$offset){
	 	$this->db->order_by('nama_asset', 'ASC');
    	$this->db->select('tbl_asset.id,tbl_asset.kode_asset,tbl_asset.nama_asset,tbl_kategori.nama_kategori,tbl_asset.tanggal_masuk,tbl_asset.tanggal_usia,tbl_kantor.nama_kantor,tbl_ruangan.nama_ruangan,tbl_asset.status_milik,tbl_asset.kondisi,tbl_asset.gambar');
		$this->db->from('tbl_asset');
		$this->db->join('tbl_kantor', 'tbl_kantor.id = tbl_asset.id_kantor','inner');
		$this->db->join('tbl_ruangan','tbl_ruangan.id = tbl_asset.id_ruangan','inner');
		$this->db->join('tbl_kategori','tbl_kategori.id = tbl_asset.id_kategori','inner');
		$this->db->limit($num, $offset);
		$this->db->where('status_pemusnahan','ada');
		$query = $this->db->get();
    	return $query;
    }

     public function ambil_mutasi($num,$offset){
	 	$this->db->order_by('nama_asset', 'ASC');
    	$this->db->select('tbl_asset.id,tbl_asset.kode_asset,tbl_asset.nama_asset,tbl_kategori.nama_kategori,tbl_asset.tanggal_masuk,tbl_asset.tanggal_usia,tbl_kantor.nama_kantor,tbl_ruangan.nama_ruangan,tbl_asset.status_milik,tbl_asset.kondisi,tbl_asset.gambar,tbl_asset.status_mutasi,tbl_asset.tanggal_mutasi,tbl_asset.jenis_mutasi');
		$this->db->from('tbl_asset');
		$this->db->join('tbl_kantor', 'tbl_kantor.id = tbl_asset.id_kantor','inner');
		$this->db->join('tbl_ruangan','tbl_ruangan.id = tbl_asset.id_ruangan','inner');
		$this->db->join('tbl_kategori','tbl_kategori.id = tbl_asset.id_kategori','inner');
		$this->db->where('status_mutasi','mutasi');
		$this->db->limit($num, $offset);
		$query = $this->db->get();
    	return $query;
    }

    public function ambil_data_asset(){
	 	$this->db->order_by('nama_asset', 'ASC');
    	$this->db->select('tbl_asset.id,tbl_asset.kode_asset,tbl_asset.nama_asset,tbl_kategori.nama_kategori,tbl_asset.tanggal_masuk,tbl_asset.tanggal_usia,tbl_kantor.nama_kantor,tbl_ruangan.nama_ruangan,tbl_asset.status_milik,tbl_asset.kondisi,tbl_asset.gambar,tbl_asset.status_mutasi,tbl_asset.tanggal_mutasi,tbl_asset.jenis_mutasi');
		$this->db->from('tbl_asset');
		$this->db->join('tbl_kantor', 'tbl_kantor.id = tbl_asset.id_kantor','inner');
		$this->db->join('tbl_ruangan','tbl_ruangan.id = tbl_asset.id_ruangan','inner');
		$this->db->join('tbl_kategori','tbl_kategori.id = tbl_asset.id_kategori','inner');
		
		$query = $this->db->get();
    	return $query;
    }

    public function ambil_data_pemusnahan(){
    	return $this->db->query('SELECT
						tbl_asset.id,
						tbl_asset.kode_asset,
						tbl_asset.nama_asset,
						tbl_asset.id_kategori,
						tbl_asset.tanggal_masuk,
						tbl_asset.tanggal_usia,
						tbl_asset.id_kantor,
						tbl_asset.id_ruangan,
						tbl_asset.status_milik,
						tbl_asset.kondisi,
						tbl_asset.gambar,
						tbl_asset.jenis_mutasi,
						tbl_asset.tanggal_mutasi,
						tbl_asset.status_mutasi,
						tbl_asset.pemusnahan,
						tbl_asset.tanggal_keluar,
						tbl_asset.status_pemusnahan,
						tbl_ruangan.kode_ruangan,
						tbl_ruangan.nama_ruangan,
						tbl_kantor.kode_kantor,
						tbl_kantor.nama_kantor
						FROM
						tbl_asset
						INNER JOIN tbl_kantor ON tbl_kantor.id = tbl_asset.id_kantor
						INNER JOIN tbl_ruangan ON tbl_ruangan.id = tbl_asset.id_ruangan
						WHERE status_pemusnahan="musnah"
						ORDER BY nama_asset ASC
						');

    }

    public function detail_asset($id){
	 	
    	$this->db->select('tbl_asset.id,tbl_asset.kode_asset,tbl_asset.nama_asset,tbl_kategori.nama_kategori,tbl_asset.tanggal_masuk,tbl_asset.tanggal_usia,tbl_kantor.nama_kantor,tbl_ruangan.nama_ruangan,tbl_asset.status_milik,tbl_asset.kondisi,tbl_asset.gambar,tbl_asset.id_kategori as id_kategori,tbl_kategori.nama_kategori,tbl_asset.id_kantor,tbl_kantor.nama_kantor,tbl_asset.id_ruangan,tbl_ruangan.nama_ruangan,tbl_asset.user_tambahasset,tbl_asset.user_mutasiasset');
		$this->db->from('tbl_asset');
		$this->db->join('tbl_kantor', 'tbl_kantor.id = tbl_asset.id_kantor','inner');
		$this->db->join('tbl_ruangan','tbl_ruangan.id = tbl_asset.id_ruangan','inner');
		$this->db->join('tbl_kategori','tbl_kategori.id = tbl_asset.id_kategori','inner');
		$this->db->where('tbl_asset.id',$id);
		$query = $this->db->get();
    	return $query;
    }

    public function tambah_mutasi($data,$id){
        $this->db->update("tbl_asset",$data,$id);
    }

    public function ubah_asset($data,$id){
        $this->db->update("tbl_asset",$data,$id);
    }

    public function hapus_asset($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_asset');
    }

    public function laporan_asset($tanggal_awal,$tanggal_akhir){
    	$query = $this->db->query("SELECT tbl_asset.id,
								tbl_asset.kode_asset,
								tbl_asset.nama_asset,
								tbl_kategori.nama_kategori,
								tbl_asset.tanggal_masuk,
								tbl_asset.tanggal_usia,
								tbl_kantor.nama_kantor,
								tbl_ruangan.nama_ruangan,
								tbl_asset.status_milik,
								tbl_asset.kondisi,
								tbl_asset.gambar,
								tbl_asset.user_tambahasset
								FROM
								tbl_asset
								INNER JOIN tbl_kantor ON tbl_kantor.id = tbl_asset.id_kantor
								INNER JOIN tbl_ruangan ON tbl_ruangan.id = tbl_asset.id_ruangan
								INNER JOIN tbl_kategori ON tbl_kategori.id = tbl_asset.id_kategori  WHERE tanggal_masuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
								AND status_pemusnahan != 'musnah'
								");
    	return $query;
    }

       public function laporan_asset_semua(){
    	$query = $this->db->query("SELECT tbl_asset.id,
								tbl_asset.kode_asset,
								tbl_asset.nama_asset,
								tbl_kategori.nama_kategori,
								tbl_asset.tanggal_masuk,
								tbl_asset.tanggal_usia,
								tbl_kantor.nama_kantor,
								tbl_ruangan.nama_ruangan,
								tbl_asset.status_milik,
								tbl_asset.kondisi,
								tbl_asset.gambar,
								tbl_asset.user_tambahasset
								FROM
								tbl_asset
								INNER JOIN tbl_kantor ON tbl_kantor.id = tbl_asset.id_kantor
								INNER JOIN tbl_ruangan ON tbl_ruangan.id = tbl_asset.id_ruangan
								INNER JOIN tbl_kategori ON tbl_kategori.id = tbl_asset.id_kategori  
								WHERE status_pemusnahan != 'musnah'
								");
    	return $query;
    }

     public function laporan_mutasi($tanggal_awal,$tanggal_akhir){
    	$query = $this->db->query("SELECT tbl_asset.id,
								tbl_asset.kode_asset,
								tbl_asset.nama_asset,
								tbl_asset.tanggal_mutasi,
								tbl_asset.jenis_mutasi,
								tbl_kategori.nama_kategori,
								tbl_asset.tanggal_masuk,
								tbl_asset.tanggal_usia,
								tbl_kantor.nama_kantor,
								tbl_ruangan.nama_ruangan,
								tbl_asset.status_milik,
								tbl_asset.kondisi,
								tbl_asset.gambar,
								tbl_asset.user_mutasiasset
								FROM
								tbl_asset
								INNER JOIN tbl_kantor ON tbl_kantor.id = tbl_asset.id_kantor
								INNER JOIN tbl_ruangan ON tbl_ruangan.id = tbl_asset.id_ruangan
								INNER JOIN tbl_kategori ON tbl_kategori.id = tbl_asset.id_kategori  WHERE tanggal_mutasi BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
								AND status_pemusnahan != 'musnah' AND status_mutasi = 'mutasi'
								");
    	return $query;
    }

    public function laporan_mutasi_semua(){
    	$query = $this->db->query("SELECT tbl_asset.id,
								tbl_asset.kode_asset,
								tbl_asset.nama_asset,
								tbl_asset.tanggal_mutasi,
								tbl_asset.jenis_mutasi,
								tbl_kategori.nama_kategori,
								tbl_asset.tanggal_masuk,
								tbl_asset.tanggal_usia,
								tbl_kantor.nama_kantor,
								tbl_ruangan.nama_ruangan,
								tbl_asset.status_milik,
								tbl_asset.kondisi,
								tbl_asset.gambar,
								tbl_asset.user_mutasiasset
								FROM
								tbl_asset
								INNER JOIN tbl_kantor ON tbl_kantor.id = tbl_asset.id_kantor
								INNER JOIN tbl_ruangan ON tbl_ruangan.id = tbl_asset.id_ruangan
								INNER JOIN tbl_kategori ON tbl_kategori.id = tbl_asset.id_kategori  WHERE
								status_pemusnahan != 'musnah' AND status_mutasi = 'mutasi'
								");
    	return $query;
    }

    public function laporan_pemusnahan($tanggal_awal,$tanggal_akhir){
    	$query = $this->db->query("SELECT tbl_asset.id,
								tbl_asset.kode_asset,
								tbl_asset.nama_asset,
								tbl_asset.tanggal_mutasi,
								tbl_asset.jenis_mutasi,
								tbl_kategori.nama_kategori,
								tbl_asset.tanggal_masuk,
								tbl_asset.tanggal_usia,
								tbl_kantor.nama_kantor,
								tbl_ruangan.nama_ruangan,
								tbl_asset.status_milik,
								tbl_asset.kondisi,
								tbl_asset.pemusnahan,
								tbl_asset.tanggal_keluar,
								tbl_asset.gambar,
								tbl_asset.user_pemusnahan
								FROM
								tbl_asset
								INNER JOIN tbl_kantor ON tbl_kantor.id = tbl_asset.id_kantor
								INNER JOIN tbl_ruangan ON tbl_ruangan.id = tbl_asset.id_ruangan
								INNER JOIN tbl_kategori ON tbl_kategori.id = tbl_asset.id_kategori  WHERE tanggal_keluar BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
								AND status_pemusnahan = 'musnah'
								");
    	return $query;
    }

     public function laporan_pemusnahan_semua(){
    	$query = $this->db->query("SELECT tbl_asset.id,
								tbl_asset.kode_asset,
								tbl_asset.nama_asset,
								tbl_asset.tanggal_mutasi,
								tbl_asset.jenis_mutasi,
								tbl_kategori.nama_kategori,
								tbl_asset.tanggal_masuk,
								tbl_asset.tanggal_usia,
								tbl_kantor.nama_kantor,
								tbl_ruangan.nama_ruangan,
								tbl_asset.status_milik,
								tbl_asset.kondisi,
								tbl_asset.pemusnahan,
								tbl_asset.tanggal_keluar,
								tbl_asset.gambar,
								tbl_asset.user_pemusnahan
								FROM
								tbl_asset
								INNER JOIN tbl_kantor ON tbl_kantor.id = tbl_asset.id_kantor
								INNER JOIN tbl_ruangan ON tbl_ruangan.id = tbl_asset.id_ruangan
								INNER JOIN tbl_kategori ON tbl_kategori.id = tbl_asset.id_kategori  WHERE 
								status_pemusnahan = 'musnah'
								");
    	return $query;
    }

}