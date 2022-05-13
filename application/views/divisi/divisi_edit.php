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
            <h3 class="box-title"><?= ucfirst($page) ?> Departemen</h3>
            <div class="pull-right">
                <a href="<?= site_url('divisi') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>

        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="POST">
                        <div class="form-group ">
                            <label for="username">No. Divisi <small class="text-danger">*</small></label>
                            <input type="varchar" name="no_divisi" value="<?= $divisi_by_id['no_divisi']; ?>" class="form-control">
                            <small class="text-danger"><?= form_error('no_divisi'); ?></small>
                        </div>
                        <div class="form-group ">
                            <label for="username">Divisi <small class="text-danger">*</small></label>
                            <input type="varchar" name="divisi_d" value="<?= $divisi_by_id['divisi_d']; ?>" class="form-control">
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