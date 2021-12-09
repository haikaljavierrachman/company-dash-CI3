<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>




    <div class="input-group col-lg-4">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>

    <hr>


    <table class="table table-hover col-lg-8">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Email</th>
                <th scope="col">Access</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($name as $n) : ?>
                <tr>
                    <th scope="row"></th>
                    <td>
                        <?= $n['name']; ?>
                    </td>
                    <td>
                        <?= $n['email']; ?>
                    </td>
                    <td>
                        <a href="" class="badge badge-warning">Access</a>
                        <a href="<?= base_url('admin/') . $n['id']; ?>" class="badge badge-danger">delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>






</div>

</div>
<!-- End of Main Content -->