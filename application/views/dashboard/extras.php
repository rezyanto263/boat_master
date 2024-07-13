<!-- Content Section Start -->
<section class="content-section">
    <div class="container-fluid 100vh p-5">
        <div class="table-content shadow">
            <div class="table-header w-100 gap-3 d-flex flex-row">
                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addextra">
                    <i class="fa-solid fa-circle-plus me-1"></i>
                    ADD
                </button>
            </div>
            <hr>
            <div class="text-center">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <table id="datatable" class="display table my-3" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-start">#</th>
                        <th class="text-start">Picture</th>
                        <th class="text-start">Name</th>
                        <th class="text-start">Category</th>
                        <th class="text-start">Stock</th>
                        <th class="text-start">Price</th>
                        <th class="text-start">Description</th>
                        <th class="text-start">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $num=0; foreach($extra as $key): $num++;?>
                    <tr>
                        <td class="text-center"><?= $num; ?></td>
                        <td class="d-flex justify-content-center">
                            <img src="<?= base_url('assets/uploads/'.$key['extraPicture']) ?>" width="70px" height="70px">
                        </td>
                        <td><?= $key['extraName']; ?></td>
                        <td><?= $key['extraCategory']; ?></td>
                        <td class="text-center"><?= $key['extraStock']; ?></td>
                        <td><?= number_format($key['extraPrice']); ?></td>
                        <td class="overflow-hidden"><?= $key['extraDesc']; ?></td>
                        <td class="action-button d-flex justify-content-end">
                            <div class="d-flex flex-row gap-1">
                                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delextra<?= $key['extraId']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editextra<?= $key['extraId']; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-start">#</th>
                        <th class="text-start">Picture</th>
                        <th class="text-start">Name</th>
                        <th class="text-start">Category</th>
                        <th class="text-start">Stock</th>
                        <th class="text-start">Price</th>
                        <th class="text-start">Description</th>
                        <th class="text-start">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
<!-- Content Section End -->

<!-- Modal Add -->
<div class="modal fade" id="addextra" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 mb-0" id="staticBackdropLabel">ADD EXTRA</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="needs-validation" action="<?= base_url('dashboard/extras/addExtra'); ?>"  method="POST" enctype="multipart/form-data" novalidate>
        <div class="modal-body">
            <div class="row gy-3">
                <div class="col-6">
                    <label>Extra Picture</label>
                    <input class="form-control" type="file" placeholder="Extra Picture" name="extraPicture" required>
                    <div class="invalid-feedback">
                        You must provide a picture!
                    </div>
                </div>
                <div class="col-6">
                    <label>Extra Category</label>
                    <select class="w-100 form-select" placeholder="Type" name="extraCategory" required>
                        <option value="Recommended">Recommended</option>
                        <option value="Free">Free</option>
                        <option value="Add-Ons">Add-Ons</option>
                    </select>
                    <div class="invalid-feedback">
                        You must provide a Category!
                    </div>
                </div>
                <div class="col-12">
                    <label>Extra Name</label>
                    <input class="form-control" type="text" placeholder="Extra Name" name="extraName" required>
                    <div class="invalid-feedback">  
                        You must provide a name!
                    </div>
                </div>
                <div class="col-6">
                    <label>Price</label>
                    <input class="form-control" type="number" placeholder="Price" onkeypress="return isNumberKey(event)" name="extraPrice" required>
                    <div class="invalid-feedback">
                        You must provide a price!
                    </div>
                </div>
                <div class="col-6">
                    <label>Stock</label>
                    <input class="form-control" type="number" placeholder="Stock" name="extraStock" required>
                    <div class="invalid-feedback">
                        You must provide a stock!
                    </div>
                </div>
                <div class="col-12">
                    <label>Description</label>
                    <textarea maxlength="150" class="form-control" name="extraDesc" placeholder="About this extra..." required></textarea>
                    <div class="invalid-feedback">
                        You must describe about the extra!
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
            <button type="submit" class="btn btn-primary">ADD</button>
        </div>
        </form>
        </div>
    </div>
</div>


<?php foreach($extra as $edit): ?>
<!-- Modal Edit -->
<div class="modal fade" id="editextra<?= $edit['extraId']; ?>" data-bs-backdrop="static" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 mb-0" id="staticBackdropLabel">EDIT EXTRA</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="needs-validation" action="<?= base_url('dashboard/extras/editExtra'); ?>"  method="POST" enctype="multipart/form-data" novalidate>
        <div class="modal-body">
            <div class="row gy-3">
                <input type="number" name="extraId" value="<?= $edit['extraId']; ?>" hidden>
                <div class="col-12 d-flex gap-2">
                    <img src="<?= base_url('assets/uploads/'.$edit['extraPicture']); ?>" alt="">
                </div>
                <div class="col-6">
                    <label>Extra Picture</label>
                    <input class="form-control" type="file" placeholder="Extra Picture" name="extraPicture">
                </div>
                <div class="col-6">
                    <label>Extra Category</label>
                    <select class="w-100 form-select" placeholder="Type" name="extraCategory" required>
                        <option value="Recommended" <?= $edit['extraCategory'] == 'Recommended'? 'selected':''; ?>>Recommended</option>
                        <option value="Free" <?= $edit['extraCategory'] == 'Free'? 'selected':''; ?>>Free</option>
                        <option value="Add-Ons" <?= $edit['extraCategory'] == 'Add-Ons'? 'selected':''; ?>>Add-Ons</option>
                    </select>
                    <div class="invalid-feedback">
                        You must provide a Category!
                    </div>
                </div>
                <div class="col-12">
                    <label>Extra Name</label>
                    <input class="form-control" type="text" placeholder="Extra Name" name="extraName" value="<?= $edit['extraName']; ?>" required>
                    <div class="invalid-feedback">  
                        You must provide a name!
                    </div>
                </div>
                <div class="col-6">
                    <label>Price</label>
                    <input class="form-control" type="number" placeholder="Price" onkeypress="return isNumberKey(event)" name="extraPrice" value="<?= $edit['extraPrice']; ?>" required>
                    <div class="invalid-feedback">
                        You must provide a price!
                    </div>
                </div>
                <div class="col-6">
                    <label>Stock</label>
                    <input class="form-control" type="number" placeholder="Stock" name="extraStock" value="<?= $edit['extraStock']; ?>" required>
                    <div class="invalid-feedback">
                        You must provide a stock!
                    </div>
                </div>
                <div class="col-12">
                    <label>Description</label>
                    <textarea maxlength="150" class="form-control" name="extraDesc" placeholder="About this extra..." required><?= $edit['extraDesc']; ?></textarea>
                    <div class="invalid-feedback">
                        You must describe about the extra!
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
            <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
        </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php foreach($extra as $del): ?>
<!-- Modal Delete -->
<div class="modal fade" id="delextra<?= $del['extraId'] ?>" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="mb-0 fs-5">DELETE EXTRA</h3>
            </div>
            <div class="modal-body">
                Are you sure want to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">CLOSE</button>
                <a class="btn btn-secondary" href="<?= base_url('dashboard/extras/deleteExtra/'.$del['extraId']); ?>">DELETE</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
