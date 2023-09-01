<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create User</h1>

    <!-- DataTales Example -->
    <?php if(isset($validation)) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $validation->listErrors() ?>
        </div>
    <?php } ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3"></div>
        <div class="card-body">
            <form action="<?= base_url('user/update/' . $user['id']) ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $user['name'] ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $user['email'] ?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
