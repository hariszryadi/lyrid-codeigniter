<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Employee</h1>

    <!-- DataTales Example -->
    <?php if(!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success">
            <?php echo session()->getFlashdata('message');?>
        </div>
    <?php endif ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('employee/create') ?>" class="btn btn-md btn-success">Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>NIP</th>
                            <th>Place of Birth</th>
                            <th>Date of Birth</th>
                            <th>Photo</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($employees as $key => $employee) : ?>
                            <tr>
                                <td><?= $key+1 ?></td>
                                <td><?= $employee['name'] ?></td>
                                <td><?= $employee['nip'] ?></td>
                                <td><?= $employee['place_of_birth'] ?></td>
                                <td><?= date('d-m-Y', strtotime($employee['date_of_birth'])) ?></td>
                                <td><img src="<?= base_url('uploads/photo/' . $employee['photo']) ?>" class="img-thumbnail" alt="" width="100"></td>
                                <td class="text-center">
                                    <a href="<?= base_url('employee/edit/' . $employee['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="<?= base_url('employee/delete/' . $employee['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
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
