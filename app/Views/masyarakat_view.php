<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Masyarakat
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 md-0 text-gray-800">Masyarakat</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card border-primary">
                <div class="card-header bg-primary">
                    <a href="#" data-masyarakat="" class="btn btn-outline-light" data-target="#fMasyarakat" data-toggle="modal"><i class="fas fa-fw fa-solid fa-user-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table table-border" id="masyarakat">
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Telp</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no = 0;
                        foreach ($masyarakat as $row) {
                            $data = $row['id_masyarakat'] . "," . $row['nik'] . "," . $row['nama'] . "," . $row['username'] . "," . $row['password'] . "," . $row['telp'] . "," . base_url('masyarakat/edit/' . $row['id_masyarakat']);
                            # code...
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nik'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['telp'] ?></td>
                                <td>
                                    <a href="" data-masyarakat="<?= $data ?>" data-target="#fMasyarakat" data-toggle="modal" class="btn btn-warning"><i class="fas fa-edit"></i>edit</a>
                                    <a href="<?= base_url('masyarakat/deleted/' . $row['id_masyarakat']) ?>" onclick="return confirm('yakin mau hapus?')" class="btn btn-danger"><i class="fas fa-trash"></i>hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>

                <?php if (!empty(session()->getFlashdata("message"))) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata("message") ?>
                    </div>
                <?php endif ?>


                <div class="modal fade" id="fMasyarakat" tabindex="-1" aria-labelledby="modalMasyarakatLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Input Data Masyarakat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="editMasyarakat" action="" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nik" class="form-label">Nik</label>
                                        <input type="text" name="nik" id="nik" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password"> Password </label>
                                        <input type="password" name="password" id="password" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="telp">Telp</label>
                                        <input type="number" name="telp" id="telp" class="form-control">
                                    </div>

                                    <div class="from-group" id="ubahpassword">
                                        <label for="ubahpassword">Ubah Password</label>
                                        <input type="checkbox" name="ubahpassword" aria-label="Mau Ubah Password" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->Section("script") ?>
<script>
    $(document).ready(function() {
        $("#fMasyarakat").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var data = button.data('masyarakat');
            if (data != "") {
                const barisdata = data.split(",");
                $('#nik').val(barisdata[1]);
                $('#nama').val(barisdata[2]);
                $('#username').val(barisdata[3]);
                $('#password').val(barisdata[4]);
                $('#telp').val(barisdata[5]).change();
                $('#editMasyarakat').attr('action', barisdata[6]);
                $("#ubahpassword").show();
            } else {
                $('#nik').val('');
                $('#nama').val('');
                $('#username').val('');
                $('#password').val('');
                $('#telp').val('');
                $('#editMasyarakat').attr('action', 'masyarakat');
                $("#ubahpassword").hide();
            }
        });
        $('#masyarakat').DataTable();
    })
</script>
<?= $this->endSection() ?>