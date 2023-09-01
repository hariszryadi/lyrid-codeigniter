<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create Employee</h1>

    <!-- DataTales Example -->
    <?php if(isset($validation)) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $validation->listErrors() ?>
        </div>
    <?php } ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3"></div>
        <div class="card-body">
            <form action="<?= base_url('employee/update/' . $employee['id']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $employee['name'] ?>">
                </div>
                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nip" placeholder="NIP" value="<?= $employee['nip'] ?>">
                </div>
                <div class="form-group">
                    <label>Place of Birth</label>
                    <input type="text" class="form-control" name="place_of_birth" placeholder="Place of Birth" value="<?= $employee['place_of_birth'] ?>">
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" placeholder="Date of Birth" value="<?= $employee['date_of_birth'] ?>">
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" class="form-control" name="photo">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
