<!-- Content Section Start -->
<section class="content-section">
    <div class="container-fluid 100vh p-5">
        <div class="table-content shadow">
            <div class="table-header w-100 gap-3 d-flex flex-row">
                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addpromo">
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
                        <th class="text-start" width="20px">#</th>
                        <th class="text-start">Promo Name</th>
                        <th class="text-start">Promo Discount</th>
                        <th class="text-start">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $num = 0;
                foreach($promo as $key): 
                $num++;
                ?>
                    <tr>
                        <td class="text-center"><?= $num; ?></td>
                        <td><?= $key['procodeName']; ?></td>
                        <td class="text-center"><?= $key['procodeDiscount']; ?>%</td>
                        <td class="action-button d-flex justify-content-end">
                            <div class="flex-row gap-1">
                                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delpromo<?= $key['procodeId']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editpromo<?= $key['procodeId']; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-start" width="20px">#</th>
                        <th class="text-start">Promo Name</th>
                        <th class="text-start">Promo Discount</th>
                        <th class="text-start">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
<!-- Content Section End -->

<!-- Modal Add -->
<div class="modal fade" id="addpromo" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 mb-0" id="staticBackdropLabel">ADD PROMO CODE</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="needs-validation" action="<?= base_url('dashboard/promos/addPromo'); ?>" method="POST" novalidate>
        <div class="modal-body">
            <div class="row gy-3">
                <div class="col-8">
                    <label for="files">Promo Name</label>
                    <input class="form-control" type="text" placeholder="Promo Name" name="procodeName" required>
                    <div class="invalid-feedback">
                        You must provide a name!
                    </div>
                </div>
                <div class="col-4">
                    <label for="files">Promo Discount (%)</label>
                    <div class="input-group">
                        <input class="form-control" type="number" placeholder="Example: 10" name="procodeDiscount" required>
                        <span class="input-group-text right fw-bold">%</span>
                    </div>
                    <div class="invalid-feedback">
                        You must provide a discount!
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


<?php foreach($promo as $edit): ?>
<!-- Modal Edit -->
<div class="modal fade" id="editpromo<?= $edit['procodeId']; ?>" data-bs-backdrop="static" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 mb-0" id="staticBackdropLabel">EDIT PROMO CODE</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="needs-validation" action="<?= base_url('dashboard/promos/editPromo'); ?>"  method="POST" novalidate>
            <div class="modal-body">
                <div class="row gy-3">
                    <input type="number" name="procodeId" value="<?= $edit['procodeId']; ?>" hidden>
                    <div class="col-8">
                        <label for="files">Promo Name</label>
                        <input class="form-control" type="text" placeholder="Promo Name" name="procodeName" value="<?= $edit['procodeName']; ?>" required>
                        <div class="invalid-feedback">
                            You must provide a name!
                        </div>
                    </div>
                    <div class="col-4">
                    <label for="files">Promo Discount (%)</label>
                        <div class="input-group">
                            <input class="form-control" type="number" placeholder="Example: 10" name="procodeDiscount" value="<?= $edit['procodeDiscount']; ?>" required>
                            <span class="input-group-text right fw-bold">%</span>
                        </div>
                        <div class="invalid-feedback">
                            You must provide a discount!
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

<?php foreach($promo as $del): ?>
<!-- Modal Delete -->
<div class="modal fade" id="delpromo<?= $del['procodeId'] ?>" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="mb-0 fs-5">DELETE PROMO CODE</h3>
            </div>
            <div class="modal-body">
                Are you sure want to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">CLOSE</button>
                <a class="btn btn-secondary" href="<?= base_url('dashboard/promos/deletePromo/'.$del['procodeId']); ?>">DELETE</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>