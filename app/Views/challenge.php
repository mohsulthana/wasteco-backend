<div class="wrapper wrapper-content animated fadeInRight">
    <div class="text-danger"><?php $session = \Config\Services::session();
                                echo $session->getFlashdata('msg'); ?></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>List of Challenges</h5>
                    <div class="ibox-tools">
                        <a style="color: green !important" href="<?= base_url('/new-challenge'); ?>" ;>
                            <i class="fa fa-plus"></i> New Challenge
                        </a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12 b-r table-responsive">
                            <table class="table thead-light table-striped table-bordered table-hover" id="editable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tipe</th>
                                        <th>Deskripsi</th>
                                        <th>Dibuat pada</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($challenge as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value['challenge_name'] ?></td>
                                            <td><?= $value['description'] ?></td>
                                            <td><?= $value['description'] ?></td>
                                            <td><?= $value['created_at'] ?></td>
                                            <td><img src="<?= base_url() . $value['image'] ?>" alt=""></td>
                                            <td><?= $value['isActive'] == 0 ? 'Tidak Aktif' : 'Aktif' ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.download-dsdo').click(function(e) {
        var id = $(this).attr('id')
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("DataSubjektifObjektif/dsdoFromJson"); ?>',
            data: {
                pasien: id
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.error(error)
            },
        })
    })

    $('.btn-hapus').click(function(e) {
        var id = $(this).attr('id')

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        Swal.fire({
            title: 'Yakin ingin menghapus pasien ini?',
            showCancelButton: true,
            confirmButtonText: `Hapus`,
            cancelButtonText: 'Batal',
            confirmButtonColor: '#ed5565',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'post',
                    data: {
                        id: id
                    },
                    url: '<?= base_url('hapus-pasien'); ?>',
                    success: function(success) {
                        console.log(success)
                        swalWithBootstrapButtons.fire({
                            showConfirmButton: false,
                            icon: 'success',
                            title: 'Pasien berhasil dihapus'
                        })
                        setTimeout(() => {
                            location.reload()
                        }, 1000);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                })
            }
        })
    })
</script>