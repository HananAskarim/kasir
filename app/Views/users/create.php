<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title; ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">General Form</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?= $this->include('alert/error'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="<?= base_url('user/store'); ?>">
        <?= csrf_field(); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= old('username'); ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>">
            </div>
            <div class="form-group">
                <label for="nama">Level</label>
                <select name="level" id="level" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                    <option value="owner">Owner</option>
                </select>
            </div>
            <div class="form-group">
                <label for="is_aktif">Status Aktif</label>
                <select name="is_aktif" id="is_aktif" class="form-control">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<!-- /.card -->
<?= $this->endSection('content'); ?>