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
                        <th class="text-start">Status</th>
                        <th class="text-start">Badges</th>
                        <th class="text-start">Anchor Point</th>
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
                        <td class="text-center"><?= $key['maxPeople']; ?></td>
                        <td class="text-center"><?= $key['boatStatus']; ?></td>
                        <td>
                            <?php if ($key['boatbadgeNames']!=null) { ?>
                            <?php $id=0; foreach(explode(',', $key['boatbadgeNames']) as $badges): $id++;?>
                                <?php if ($id==1) { ?>
                                    <?= trim($badges); ?>
                                <?php }else { ?>
                                    <?= ', '.trim($badges); ?>
                                <?php } ?>
                            <?php endforeach; ?>
                            <?php }else { ?>
                                No Badges
                            <?php } ?>
                        </td>
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
                        <th class="text-start">Status</th>
                        <th class="text-start">Badges</th>
                        <th class="text-start">Anchor Point</th>
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
                        <option value="Private">Private</option>
                        <option value="Shared">Shared</option>
                        <option value="PriShare">Private & Share</option>
                    </select>
                    <div class="invalid-feedback">
                        You must provide a type!
                    </div>
                </div>
                <div class="col-12">
                    <label>Boat Name</label>
                    <input class="form-control" type="text" placeholder="Boat Name" name="boatName" maxlength="50" required>
                    <div class="invalid-feedback">
                        You must provide a name!
                    </div>
                </div>
                <div class="col-6">
                    <label>Max People</label>
                    <input class="form-control" type="number" placeholder="Max People" name="maxPeople" min="1" required>
                    <div class="invalid-feedback">
                        You must set the max people!
                    </div>
                </div>
                <div class="col-6">
                    <label>Status</label>
                    <select class="form-select" name="boatStatus" required>
                        <option value="Repair">Repair</option>
                        <option value="Booked">Booked</option>
                        <option value="Ready">Ready</option>
                    </select>
                    <div class="invalid-feedback">
                        You must provide a status!
                    </div>
                </div>
                <div class="col-6">
                    <label>Anchor Point</label>
                    <select class="form-select" class="w-100" placeholder="Type" name="boatStartPoint" required>
                        <option value="Nusa Penida">Nusa Penida</option>
                        <option value="Bali">Bali</option>
                    </select>
                </div>
                <div class="col-6">
                    <label>Price</label>
                    <input class="form-control" type="number" placeholder="Price" onkeypress="return isNumberKey(event)" name="boatPrice" min="0" required>
                    <div class="invalid-feedback">
                        You must provide a price!
                    </div>
                </div>
                <div class="col-12">
                    <label>Badge</label>
                    <select class="selectpicker w-100" data-live-search="true" name="badgeIds[]" multiple>
                        <?php foreach($badge as $key): ?>
                            <option value="<?= $key['badgeId']; ?>"><?= $key['badgeName']; ?></option>
                        <?php endforeach; ?>
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
                        <option value="Private" <?= $edit['boatType'] == 'Private'? 'selected':''; ?>>Private</option>
                        <option value="Shared" <?= $edit['boatType'] == 'Shared'? 'selected':''; ?>>Shared</option>
                        <option value="PriShare" <?= $edit['boatType'] == 'PriShare'? 'selected':''; ?>>Private & Share</option>
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
                    <input class="form-control" type="number" placeholder="Price" onkeypress="return isNumberKey(event)" name="boatPrice" min="0" value="<?= $edit['boatPrice']; ?>" required>
                    <div class="invalid-feedback">
                        You must provide a price!
                    </div>
                </div>
                <div class="col-6">
                    <label>Max People</label>
                    <input class="form-control" type="number" placeholder="Max People" name="maxPeople" value="<?= $edit['maxPeople']; ?>" min="1" required>
                    <div class="invalid-feedback">
                        You must set the boat max people!
                    </div>
                </div>
                <div class="col-6">
                    <label>Status</label>
                    <select class="form-select" name="boatStatus" required>
                        <option value="Repair" <?= $edit['boatStatus']=='Repair'?'selected':''; ?>>Repair</option>
                        <option value="Booked" <?= $edit['boatStatus']=='Booked'?'selected':''; ?>>Booked</option>
                        <option value="Ready" <?= $edit['boatStatus']=='Ready'?'selected':''; ?>>Ready</option>
                    </select>
                    <div class="invalid-feedback">
                        You must provide a status!
                    </div>
                </div>
                <div class="col-6">
                    <label>Starting Point</label>
                    <select class="form-select" class="w-100" placeholder="Type" name="boatStartPoint" required>
                        <option value="Nusa Penida" <?= $edit['boatStartPoint'] == 'nusapenida'? 'selected':''; ?>>
                            Nusa Penida
                        </option>
                        <option value="Bali" <?= $edit['boatStartPoint'] == 'bali'? 'selected':''; ?>>Bali</option>
                    </select>
                    <div class="invalid-feedback">
                        You must select the anchor point!
                    </div>
                </div>
                <div class="col-12">
                    <label>Badge</label>
                    <select class="selectpicker w-100" data-live-search="true" name="badgeIds[]" multiple>
                        <?php 
                        $selectedBadgeIds = explode(',', $edit['boatbadgeIds']); 
                        foreach ($badge as $key): 
                            $selected = in_array($key['badgeId'], $selectedBadgeIds) ? 'selected' : '';
                        ?>
                            <option value="<?= htmlspecialchars($key['badgeId']); ?>" <?= $selected; ?>><?= htmlspecialchars($key['badgeName']); ?></option>
                        <?php endforeach; ?>
                    </select>
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
