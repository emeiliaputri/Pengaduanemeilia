<?= $this->extend('layouts/admin')?>
<?= $this->section('judul')?> 
     Edit Profil
<?= $this->endSection()?> 
<?= $this->section('content')?> 
     <div class="col-md-6"> 
        <?php 
        if(!empty(session()->getFlashdata("sukses"))):
        ?> 
        <div class="alert alert-success"> 
            <?= session()->setFlashdata("sukses")?>
        </div> 
        <?php endif?>
        <div class="card"> 
            <div class="card-header"> 
                <h3>Edit Profil</h3>
            </div> 
            <form action="/editprofil" method="post"> 
                <div class="card-body"> 
                    <?php 
                    if(session('level')=='masyarakat'){
                        $id = $user[0]['id_masyarakat'];
                        $nama = $user[0]['nama'];
                        $username = $user[0]['username'];
                        $telp = $user[0]['telp'];
                    }else{
                        $id = $user[0]['id_masyarakat'];
                        $nama = $user[0]['nama_petugas'];
                        $username = $user[0]['username'];
                        $telp = $user[0]['telp'];
                    }
                    ?>
                    <input type="hidden" name='id' value="<?=$id?>"> 
                    <div class="form-group"> 
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="<?=$nama?>" class="form-control">
                    </div> 
                    <div class="form-group"> 
                        <label for="">Username</label>
                        <input type="text" name="username" value="<?=$username?>" class="form-control">
                    </div> 
                    <div class="form-group"> 
                        <label for="">Password lama <span
                        class="text-danger">kosongkan jika tidak ingin di ganti</span></label>
                        <input type="password" name="password_new" class="form-control">
                    </div> 
                </div> 
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Profil</button>
                </div> 
            </form> 
        </div> 
     </div> 
     <?=$this->endSection()?>