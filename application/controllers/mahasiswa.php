<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct(){
        //call CodeIgniter's default Constructor
        parent::__construct();
        
        //load database libray manually
        $this->load->database();
        
        //load Model
        $this->load->model('m_mahasiswa');
	}

	public function index()
	{
		$data['mahasiswa'] = $this->m_mahasiswa->tampil_data()->result();
        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('mahasiswa', $data);
		$this->load->view('templates/footer');
	}

    public function tambah_aksi()
	{   
        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jurusan = $this->input->post('jurusan');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');
        $foto = $_FILES['foto'];

        if ($foto != '') {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('foto')) {
                echo "Upload Gagal"; die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama' => $nama,
            'nim' => $nim,
            'tgl_lahir' => $tgl_lahir,
            'jurusan' => $jurusan,
            'alamat' => $alamat,
            'email' => $email,
            'no_telp' => $no_telp,
            'foto' => $foto
        );

        $this->m_mahasiswa->input_data($data);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil di tambahkan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('mahasiswa/index');
	}

    public function hapus($id){
        $where = array('id' => $id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data berhasil di hapus
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        $this->m_mahasiswa->hapus_data($where, 'tb_mahasiswa');
        redirect('mahasiswa/index');
    }

    public function edit($id){
        $where = array('id' => $id);
        $data['mahasiswa'] = $this->m_mahasiswa->edit_data($where, 'tb_mahasiswa')->result();

        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('edit', $data);
		$this->load->view('templates/footer');
    }

    public function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jurusan = $this->input->post('jurusan');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');


        $data = array(
            'nama' => $nama,
            'nim' => $nim,
            'tgl_lahir' => $tgl_lahir,
            'jurusan' => $jurusan,
            'alamat' => $alamat,
            'email' => $email,
            'no_telp' => $no_telp
        );

        $where = array(
            'id' => $id
        );

        $this->m_mahasiswa->update_data($where, $data, 'tb_mahasiswa');
        $this->session->set_flashdata('message', '
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Data berhasil di update
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('mahasiswa/index');
    }

    public function detail($id){
        $this->load->model('m_mahasiswa');
        $detail = $this->m_mahasiswa->detail_data($id);
        $data['detail'] =  $detail;

        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail', $data);
		$this->load->view('templates/footer'); 
    }

    public function print(){
        $data['mahasiswa'] = $this->m_mahasiswa->tampil_data()->result();
        $this->load->view('print_mahasiswa', $data);
    }

    public function pdf(){
        //$this->load->library('dompdf_gen');
        $data['mahasiswa'] = $this->m_mahasiswa->tampil_data()->result();
        $this->load->view('laporan_pdf', $data);

        // $paper_size = 'A4';
        // $orientation = 'landscape';
        // $html =  $this->output->get_output();

        // $this->dompdf->set_paper($paper_size, $orientation);

        // $this->dompdf->load_html($html);
        //$this->dompdf->render();
        //$this->dompdf->stream("laporan_mahasiswa.pdf", array('Attachment' => 0));
    }

    public function excel(){
        $data['mahasiswa'] = $this->m_mahasiswa->tampil_data()->result();
        $this->load->view('laporan_excel', $data);
    }

    public function search(){
        $keyword = $this->input->post('keyword');
        $data['mahasiswa'] = $this->m_mahasiswa->get_keyword($keyword);
        
        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('mahasiswa', $data);
		$this->load->view('templates/footer'); 
    }
}