<!-- Content Section Start -->
<section class="content-section">
    <div class="container-fluid 100vh p-5">
        <div class="table-content shadow">
            <div class="table-header w-100 gap-3 d-flex flex-row">
                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addboat">
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
                        <th class="text-start">Pictures</th>
                        <th class="text-start">Name</th>
                        <th class="text-start">Type</th>
                        <th class="text-start">Price</th>
                        <th class="text-start">Max People</th>
                        <th class="text-start">Stock</th>
                        <th class="text-start">Starting Point</th>
                        <th class="text-start">Description</th>
                        <th class="text-start">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($boat as $key): ?>
                    <tr>
                        <td class="d-flex justify-content-center">
                            <img src="<?= base_url('assets/uploads/'.trim(explode(',', $key['boatPictures'])[0])); ?>" width="70px" height="70px">
                        </td>
                        <td><?= $key['boatName']; ?></td>
                        <td><?= $key['boatType']; ?></td>
                        <td><?= $key['boatPrice']; ?></td>
                        <td><?= $key['maxPeople']; ?></td>
                        <td><?= $key['boatStock']; ?></td>
                        <td><?= $key['boatStartPoint']; ?></td>
                        <td class="overflow-hidden"><?= $key['boatDesc']; ?></td>
                        <td class="action-button d-flex justify-content-end">
                            <div class="d-flex flex-row gap-1">
                                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delboat<?= $key['boatId']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editboat<?= $key['boatId']; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-start">Pictures</th>
                        <th class="text-start">Name</th>
                        <th class="text-start">Type</th>
                        <th class="text-start">Price</th>
                        <th class="text-start">Max People</th>
                        <th class="text-start">Stock</th>
                        <th class="text-start">Starting Point</th>
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
<div class="modal fade" id="addboat" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 mb-0" id="staticBackdropLabel">ADD BOAT</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="needs-validation" action="<?= base_url('dashboard/boats/addBoat'); ?>"  method="POST" enctype="multipart/form-data" novalidate>
        <div class="modal-body">
            <div class="row gy-3">
                <div class="col-6">
                    <label for="files">Boat Picture</label>
                    <input class="form-control" type="file" multiple placeholder="Boat Picture" name="files[]" id="files" required>
                    <div class="invalid-feedback">
                        You must provide pictures!
                    </div>
                </div>
                <div class="col-6">
                    <label>Boat Type</label>
                    <select class="w-100 form-select" placeholder="Type" name="boatType" required>
                        <option value="private">Private</option>
                        <option value="shared">Shared</option>
                        <option value="prishare">Private & Share</option>
                    </select>
                    <div class="invalid-feedback">
                        You must provide a type!
                    </div>
                </div>
                <div class="col-12">
                    <label>Boat Name</label>
                    <input class="form-control" type="text" placeholder="Boat Name" name="boatName" required>
                    <div class="invalid-feedback">
                        You must provide a name!
                    </div>
                </div>
                <div class="col-6">
                    <label>Price</label>
                    <input class="form-control" type="number" placeholder="Price" onkeypress="return isNumberKey(event)" name="boatPrice" required>
                    <div class="invalid-feedback">
                        You must provide a price!
                    </div>
                </div>
                <div class="col-6">
                    <label>Max People</label>
                    <input class="form-control" type="number" placeholder="Max People" name="maxPeople" required>
                    <div class="invalid-feedback">
                        You must set the max people!
                    </div>
                </div>
                <div class="col-6">
                    <label>Stock</label>
                    <input class="form-control" type="number" placeholder="Stock" name="boatStock" required>
                    <div class="invalid-feedback">
                        You must provide a stock!
                    </div>
                </div>
                <div class="col-6">
                    <label>Anchor Point</label>
                    <select class="form-select" class="w-100" placeholder="Type" name="boatStartPoint" value="<?= set_value('boatStartPoint'); ?>" required>
                        <option value="nusapenida">Nusa Penida</option>
                        <option value="bali">Bali</option>
                    </select>
                </div>
                <div class="col-12">
                    <label>Anchor Point Description</label>
                    <textarea maxlength="150" class="form-control" name="boatDesc" placeholder="About this boat..." required></textarea>
                    <div class="invalid-feedback">
                        You must describe about the anchor point place!
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


<?php foreach($boat as $edit): ?>
<!-- Modal Edit -->
<div class="modal fade" id="editboat<?= $edit['boatId']; ?>" data-bs-backdrop="static" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 mb-0" id="staticBackdropLabel">EDIT BOAT</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="needs-validation" action="<?= base_url('dashboard/boats/editBoat'); ?>"  method="POST" enctype="multipart/form-data" novalidate>
        <div class="modal-body">
            <div class="row gy-3">
                <input type="number" name="boatId" value="<?= $edit['boatId']; ?>" hidden>
                <label>Check the Box to Delete Picture</label>
                <div class="col-12 d-flex gap-2">
                    <?php $id=0; foreach (explode(',', $edit['boatPictures']) as $pict):?>
                        <div class="del-pictures d-flex flex-column position-relative">
                            <img src="<?= base_url('assets/uploads/'.trim($pict)); ?>" style="width:70px;height:70px;">
                            <?php if (count(explode(',', $edit['boatPictures'])) > 1) { ?>
                            <input class="del-checkbox" type="checkbox" name="delpict[]" value="<?= trim(explode(',', $edit['boatpictIds'])[$id]); ?>">
                            <?php } ?>
                        </div>
                    <?php $id++; endforeach; ?>
                    <input type="number" value="<?= count(explode(',', $edit['boatPictures'])); ?>" name="countPict" hidden>
                </div>
                <div class="col-6">
                    <label>Boat Picture</label>
                    <input class="form-control" type="file" multiple placeholder="Boat Picture" name="files[]">
                </div>
                <div class="col-6">
                    <label>Boat Type</label>
                    <select class="form-select" class="w-100" placeholder="Type" name="boatType" required>
                        <option value="private" <?= $edit['boatType'] == 'private'? 'selected':''; ?>>Private</option>
                        <option value="shared" <?= $edit['boatType'] == 'shared'? 'selected':''; ?>>Shared</option>
                        <option value="prishare" <?= $edit['boatType'] == 'prishare'? 'selected':''; ?>>Private & Share</option>
                    </select>
                    <div class="invalid-feedback">
                        You must select boat type!
                    </div>
                </div>
                <div class="col-12">
                    <label>Boat Name</label>
                    <input class="form-control" type="text" placeholder="Boat Name" name="boatName" value="<?= $edit['boatName']; ?>" required>
                    <div class="invalid-feedback">
                        You must provide a name!
                    </div>
                </div>
                <div class="col-6">
                    <label>Price</label>
                    <input class="form-control" type="number" placeholder="Price" onkeypress="return isNumberKey(event)" name="boatPrice" value="<?= $edit['boatPrice']; ?>" required>
                    <div class="invalid-feedback">
                        You must provide a price!
                    </div>
                </div>
                <div class="col-6">
                    <label>Max People</label>
                    <input class="form-control" type="number" placeholder="Max People" name="maxPeople" value="<?= $edit['maxPeople']; ?>" required>
                    <div class="invalid-feedback">
                        You must set the boat max people!
                    </div>
                </div>
                <div class="col-6">
                    <label>Stock</label>
                    <input class="form-control" type="number" placeholder="Stock" name="boatStock" value="<?= $edit['boatStock']; ?>" required>
                    <div class="invalid-feedback">
                        You must provide a stock!
                    </div>
                </div>
                <div class="col-6">
                    <label>Starting Point</label>
                    <select class="form-select" class="w-100" placeholder="Type" name="boatStartPoint" required>
                        <option value="nusapenida" <?= $edit['boatStartPoint'] == 'nusapenida'? 'selected':''; ?>>
                            Nusa Penida
                        </option>
                        <option value="bali" <?= $edit['boatStartPoint'] == 'bali'? 'selected':''; ?>>Bali</option>
                    </select>
                    <div class="invalid-feedback">
                        You must select the anchor point!
                    </div>
                </div>
                <div class="col-12">
                    <label>Description</label>
                    <textarea maxlength="150" class="form-control" name="boatDesc" placeholder="About this boat..." required><?= $edit['boatDesc']; ?></textarea>
                    <div class="invalid-feedback">
                        You must describe about the anchor point place!
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

<?php foreach($boat as $del): ?>
<!-- Modal Delete -->
<div class="modal fade" id="delboat<?= $del['boatId'] ?>" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="mb-0 fs-5">DELETE DATA</h3>
            </div>
            <div class="modal-body">
                Are you sure want to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">CLOSE</button>
                <a class="btn btn-secondary" href="<?= base_url('dashboard/boats/deleteBoat/'.$del['boatId']); ?>">DELETE</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
