<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List User</h1>

    <!-- DataTales Example -->
    <?php if(!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success">
            <?php echo session()->getFlashdata('message');?>
        </div>
    <?php endif ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('user/create') ?>" class="btn btn-md btn-success">Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $key => $user) : ?>
                            <tr>
                                <td><?= $key+1 ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('user/edit/' . $user['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="<?= base_url('user/delete/' . $user['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                            $key++; 
                            endforeach 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>
