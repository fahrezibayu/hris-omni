<section class="content-header">
    <h1>Departemen
        <small>Data Divisi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-building"></i> </a></li>
        <li class="active">Departemen</li>

    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Add Departemen</h3>
            <div class="pull-right">
                <a href="<?= site_url('divisi') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>

        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('divisi/add') ?>" method="POST">
                        <!--<div class="form-group">-->
                        <!--  <label>No. Divisi *</label>
                        <input type="hidden" name="id" value="<?= $row->id_divisi ?>">
                        <input type="varchar" name="no_divisi" value="<?= $row->no_divisi ?>" class="form-control" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group ">
                        <label>Divisi *</label>
                        <input type="text" name="div" value="<?= $row->divisi_d ?>" class="form-control" required>
                        <div class="invalid-feedback"></div>
                    </div>-->
                        <div class="form-group ">
                            <label for="username">No. Divisi <small class="text-danger">*</small></label>
                            <input type="varchar" name="no_divisi" value="<?= set_value('no_divisi'); ?>" class="form-control">
                            <small class="text-danger"><?= form_error('no_divisi'); ?></small>
                        </div>
                        <div class="form-group ">
                            <label for="username">Divisi <small class="text-danger">*</small></label>
                            <input type="varchar" name="divisi_d" value="<?= set_value('divisi_d'); ?>" class="form-control">
                            <small class="text-danger"><?= form_error('divisi_d'); ?></small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Simpan
                            </button>
                            <button type="Reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>