<!-- Content Section Start -->
<section class="content-section">
    <div class="container-fluid 100vh p-5">
        <div class="table-content shadow">
            <div class="table-header w-100 gap-3 d-flex flex-row">
                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addguides">
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
                        <th class="text-start">Biography</th>
                        <th class="text-start">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $num=0; foreach($guides as $key): $num++;?>
                    <tr>
                        <td class="text-center"><?= $num; ?></td>
                        <td class="d-flex justify-content-center">
                            <img src="<?= base_url('assets/uploads/'.$key['guidesPicture']) ?>" width="70px" height="70px">
                        </td>
                        <td><?= $key['guidesName']; ?></td>
                        <td><?= $key['guidesBio']; ?></td>
                        <td class="action-button d-flex justify-content-end">
                            <div class="d-flex flex-row gap-1">
                                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delguides<?= $key['guidesId']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editguides<?= $key['guidesId']; ?>">
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
                        <th class="text-start">Biography</th>
                        <th class="text-start">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
<!-- Content Section End -->

<!-- Modal Add -->
<div class="modal fade" id="addguides" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 mb-0" id="staticBackdropLabel">ADD GUIDES</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="needs-validation" action="<?= base_url('dashboard/guides/addGuides'); ?>"  method="POST" enctype="multipart/form-data" novalidate>
        <div class="modal-body">
            <div class="row gy-3">
                <div class="col-6">
                    <label>Guides Name</label>
                    <input class="form-control" type="text" placeholder="Guides Name" name="guidesName" required>
                    <div class="invalid-feedback">  
                        You must provide a name!
                    </div>
                </div>
                <div class="col-6">
                    <label>Guides Picture</label>
                    <input class="form-control" type="file" placeholder="Guides Picture" name="guidesPicture" required>
                    <div class="invalid-feedback">
                        You must provide a picture!
                    </div>
                </div>
                <div class="col-12">
                    <label>Biography</label>
                    <textarea maxlength="150" class="form-control" name="guidesBio" placeholder="Guides biography" required></textarea>
                    <div class="invalid-feedback">
                        You must provide a biography!
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


<?php foreach($guides as $edit): ?>
<!-- Modal Edit -->
<div class="modal fade" id="editguides<?= $edit['guidesId']; ?>" data-bs-backdrop="static" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 mb-0" id="staticBackdropLabel">EDIT GUIDES</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="needs-validation" action="<?= base_url('dashboard/guides/editGuides'); ?>"  method="POST" enctype="multipart/form-data" novalidate>
        <div class="modal-body">
            <div class="row gy-3">
                <input type="number" name="guidesId" value="<?= $edit['guidesId']; ?>" hidden>
                <div class="col-12 d-flex gap-2">
                    <img src="<?= base_url('assets/uploads/'.$edit['guidesPicture']); ?>" alt="">
                </div>
                <div class="col-6">
                    <label>Guides Picture</label>
                    <input class="form-control" type="file" placeholder="Guides Picture" name="guidesPicture">
                </div>
                <div class="col-6">
                    <label>Guides Name</label>
                    <input class="form-control" type="text" placeholder="Guides Name" name="guidesName" value="<?= $edit['guidesName']; ?>" required>
                    <div class="invalid-feedback">  
                        You must provide a name!
                    </div>
                </div>
                <div class="col-12">
                    <label>Description</label>
                    <textarea maxlength="150" class="form-control" name="guidesBio" placeholder="Guides Biography" required><?= $edit['guidesBio']; ?></textarea>
                    <div class="invalid-feedback">
                        You must provide a biography!
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

<?php foreach($guides as $del): ?>
<!-- Modal Delete -->
<div class="modal fade" id="delguides<?= $del['guidesId'] ?>" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="mb-0 fs-5">DELETE GUIDES</h3>
            </div>
            <div class="modal-body">
                Are you sure want to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">CLOSE</button>
                <a class="btn btn-secondary" href="<?= base_url('dashboard/guides/deleteGuides/'.$del['guidesId']); ?>">DELETE</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
