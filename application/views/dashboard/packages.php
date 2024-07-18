<!-- Content Section Start -->
<section class="content-section">
    <div class="container-fluid 100vh p-5">
        <div class="table-content shadow">
            <div class="table-header w-100 gap-3 d-flex flex-row">
                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addpackage">
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
                        <th class="text-start">Package Name</th>
                        <th class="text-start">Tour</th>
                        <th class="text-start">Type</th>
                        <th class="text-start">Badges</th>
                        <th class="text-start">Price</th>
                        <th class="text-start">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $num=0; foreach($package as $key): $num++;?>
                    <tr>
                        <td class="text-center"><?= $num; ?></td>
                        <td><?= $key['packageName']; ?></td>
                        <td>
                            <?php $id=0; foreach(explode('`', $key['tourNames']) as $tourNames): $id++;?>
                                <?php if ($id==1) { ?>
                                    <?= $tourNames ?>
                                <?php }else { ?>
                                    <?= ', '.$tourNames ?>
                                <?php } ?>
                            <?php endforeach; ?>
                        </td>
                        <td><?= $key['packageType']; ?></td>
                        <td>
                            <?php if ($key['packagebadgeNames']!=null) { ?>
                            <?php $id=0; foreach(explode('`', $key['packagebadgeNames']) as $badges): $id++;?>
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
                        <td><?= number_format($key['packagePrice']); ?></td>
                        <td class="action-button d-flex justify-content-end">
                            <div class="d-flex flex-row gap-1">
                                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delpackage<?= $key['packageId']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editpackage<?= $key['packageId']; ?>">
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
                        <th class="text-start">Package Name</th>
                        <th class="text-start">Tour</th>
                        <th class="text-start">Type</th>
                        <th class="text-start">Badges</th>
                        <th class="text-start">Price</th>
                        <th class="text-start">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
<!-- Content Section End -->

<!-- Modal Add -->
<div class="modal fade" id="addpackage" data-bs-backdrop="static"  aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 mb-0" id="staticBackdropLabel">ADD PACKAGE</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" tab-index="-1" aria-label="Close"></button>
        </div>
        <form class="needs-validation" action="<?= base_url('dashboard/packages/addPackage'); ?>"  method="POST" novalidate>
        <div class="modal-body">
            <div class="row gy-3">
                <div class="col-12">
                    <label>Package Name</label>
                    <input class="form-control" type="text" placeholder="Package Name" name="packageName" required>
                    <div class="invalid-feedback">  
                        You must provide a name!
                    </div>
                </div>
                <div class="col-6">
                    <label>Package Type</label>
                    <select class="w-100 form-select" placeholder="Type" name="packageType" required>
                        <option value="Private">Private</option>
                        <option value="Shared">Shared</option>
                    </select>
                    <div class="invalid-feedback">
                        You must provide a Category!
                    </div>
                </div>
                <div class="col-6">
                    <label>Price</label>
                    <input class="form-control" type="number" placeholder="Price" onkeypress="return isNumberKey(event)" name="packagePrice" required>
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
                    <div class="invalid-feedback">
                        You must provide a badge!
                    </div>
                </div>
                <div class="col-12 add-tour-input">
                    <label>Package Tour Details</label>
                    <div class="input-tour-container">
                        <div class="input-tour d-flex gap-3 mb-3">
                            <input class="form-control w-75" type="text" name="tourNames[]" placeholder="Tour Name" required>
                            <input class="form-control w-25" type="time" name="tourTimes[]" required>
                        </div>
                        <textarea class="form-control w-100" type="text" name="tourDescs[]" placeholder="Simple description about the tour..." maxlength="50" required></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <button type="button" class="btn-outline-primary w-100" onclick="addTour()">
                        <i class="fa-solid fa-circle-plus me-1"></i>
                        ADD TOUR ATTRACTION
                    </button>
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

<?php foreach($package as $edit): ?>
<!-- Modal Edit -->
<div class="modal fade" id="editpackage<?= $edit['packageId']; ?>" data-bs-backdrop="static" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 mb-0" id="staticBackdropLabel">EDIT PACKAGE</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="needs-validation" action="<?= base_url('dashboard/packages/editPackage'); ?>"  method="POST" novalidate>
        <div class="modal-body">
            <div class="row gy-3">
                <input type="number" name="packageId" value="<?= $edit['packageId']; ?>" hidden>
                <div class="col-12">
                    <label>Package Name</label>
                    <input class="form-control" type="text" placeholder="Package Name" name="packageName" value="<?= $edit['packageName']; ?>" required>
                    <div class="invalid-feedback">  
                        You must provide a name!
                    </div>
                </div>
                <div class="col-6">
                    <label>Package Type</label>
                    <select class="w-100 form-select" placeholder="Type" name="packageType" required>
                        <option value="Private" <?= $edit['packageType'] == 'Private'? 'selected':''; ?>>Private</option>
                        <option value="Shared" <?= $edit['packageType'] == 'Shared'? 'selected':''; ?>>Shared</option>
                    </select>
                    <div class="invalid-feedback">
                        You must provide a Category!
                    </div>
                </div>
                <div class="col-6">
                    <label>Price</label>
                    <input class="form-control" type="number" placeholder="Price" onkeypress="return isNumberKey(event)" name="packagePrice" value="<?= $edit['packagePrice']; ?>" required>
                    <div class="invalid-feedback">
                        You must provide a price!
                    </div>
                </div>
                <div class="col-12">
                    <label>Badge</label>
                    <select class="selectpicker w-100" data-live-search="true" name="badgeIds[]" multiple>
                        <?php 
                        $selectedBadgeIds = explode('`', $edit['packagebadgeIds']); 
                        foreach ($badge as $key): 
                            $selected = in_array($key['badgeId'], $selectedBadgeIds) ? 'selected' : '';
                        ?>
                            <option value="<?= htmlspecialchars($key['badgeId']); ?>" <?= $selected; ?>><?= htmlspecialchars($key['badgeName']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 edit-tour-input<?= $edit['packageId']; ?>">
                    <?php $id=0; foreach(explode('`', $edit['tourIds']) as $tourId): ?>
                    <input type="checkbox" class="del-checkbox-tour me-2" name="delTour[]" value="<?= trim($tourId); ?>"><label>Package Tour (Check the box to Delete!)</label>
                    <div class="input-tour-container">
                        <input type="number" name="tourIds[]" value="<?= trim($tourId); ?>" hidden>
                        <div class="input-tour d-flex gap-3 mb-3">
                            <input class="form-control w-75" type="text" name="tourNames[]" placeholder="Tour Name" value="<?= explode('`', $edit['tourNames'])[$id]; ?>" required>
                            <input class="form-control w-25" type="time" name="tourTimes[]" value="<?= explode('`', $edit['tourTimes'])[$id]; ?>" required>
                        </div>
                        <textarea class="form-control w-100 mb-3" type="text" name="tourDescs[]" placeholder="Simple description about the tour..." maxlength="50" required><?= explode('`', $edit['tourDescs'])[$id]; ?></textarea>
                    </div>
                    <?php $id++; endforeach; ?>
                    <input type="number" value="<?= count(explode('`', $edit['tourIds'])); ?>" name="countTour" hidden>
                </div>
                <div class="col-12">
                    <button type="button" class="btn-outline-primary w-100" onclick="addTourEdit(<?=$edit['packageId'];?>)">
                        <i class="fa-solid fa-circle-plus me-1"></i>
                        ADD TOUR ATTRACTION
                    </button>
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

<?php foreach($package as $del): ?>
<!-- Modal Delete -->
<div class="modal fade" id="delpackage<?= $del['packageId'] ?>" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="mb-0 fs-5">DELETE PACKAGE</h3>
            </div>
            <div class="modal-body">
                Are you sure want to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">CLOSE</button>
                <a class="btn btn-secondary" href="<?= base_url('dashboard/packages/delPackage/'.$del['packageId']); ?>">DELETE</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>