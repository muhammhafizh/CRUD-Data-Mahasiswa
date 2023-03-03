<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    <?php echo $this->session->flashdata('message');  ?>
        <nav class="navbar navbar-expand-lg bg-light">
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus mr-2"></i>Tambah Data Mahasiswa</button>
            <a class="btn btn-danger mb-3 ml-3" href="<?php echo base_url('mahasiswa/print'); ?>">
                <i class="fa fa-print mr-2"></i>Print
            </a>

            <!-- Example single danger button -->
            <div class="btn-group ml-3 mb-3">
            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-download mr-2"></i> export
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?php echo base_url('mahasiswa/pdf'); ?>"><i class="fa fa-file-pdf mr-2"></i>PDF</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url('mahasiswa/excel'); ?>"><i class="fa fa-file-excel mr-2"></i>EXCEL</a></li>
            </ul>
            </div>

            <div class="ms-auto">
                <?php echo form_open('mahasiswa/search'); ?>
                <div class="d-flex">
                <input type="text" name="keyword" class="form-control" placeholder="Search" />
                <button type="submit" class="btn btn-success ml-2">Cari</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </nav>

        <table class="table table-striped table" id="table">
            <tr>
                <th>NO</th>
                <th>NAMA MAHASISWA</th>
                <th>NIM</th>
                <th>TANGGAL LAHIR</th>
                <th>JURUSAN</th>
                <th colspan="2">AKSI</th>
            </tr>
            <?php $no = 1; foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $mhs->nama; ?></td>
                <td><?php echo $mhs->nim; ?></td>
                <td><?php echo $mhs->tgl_lahir; ?></td>
                <td><?php echo $mhs->jurusan; ?></td>
                <td><?php echo anchor('mahasiswa/detail/'.$mhs->id, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>') ?></td>
                <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('mahasiswa/hapus/'.$mhs->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                <td><?php echo anchor('mahasiswa/edit/'.$mhs->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title fs-5" id="exampleModalLabel">FORM INPUT DATA MAHASISWA</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <?php echo form_open_multipart('mahasiswa/tambah_aksi'); ?>
                <div class="form-group">
                    <label>Nama Mahasiswa</label>
                    <input type="text" name="nama" id="nama" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" name="nim" id="nim" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <select type="text" name="jurusan" id="jurusan" class="form-control">
                        <option>Sistem Informasi</option>
                        <option>Teknik Informatika</option>
                        <option>Teknik Komputer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" id="email" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Upload Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control"/>
                </div>
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Reset</button>
                <button type="submit" name="save" class="btn btn-primary">Simpan</button>
            <?php echo form_close(); ?>
        </div>
        </div>
    </div>
    </div>
</div>