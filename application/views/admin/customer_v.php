<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </div>

    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            <!-- <button class="btn btn-sm btn-success" onclick="add_new()">Tambah Data</button> -->
            <button class="btn btn-sm btn-success" onclick="reload_table()">Reload</button>
        </div>
        <div class="table-responsive p-3">
            <table id="table" class="table align-items-center table-flush nowrap">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Username</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>


<!-- javascript -->
<script type="text/javascript">
    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax
    }

    function hapus(id) {
        Swal.fire({
            title: 'Apa anda yakin ?',
            text: "Data akan dihapus secara permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url($module . 'ajax_delete/') ?>" + id,
                    type: "POST",
                    dataType: "JSON",

                    success: function(data) {
                        if (data.status == '00') {
                            reload_table();
                            Swal.fire('Suksess', data.mess, 'success');
                        } else {
                            Swal.fire('Yaahh...', data.mess, 'error');
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire('Ooppss :(', 'Kesalahan saat menghapus data', 'error');
                    }
                });
            }
        });
    }

    $(document).ready(function() {

        // datatable
        table = $('#table').DataTable({
            "searching": true,
            "destroy": true,
            "responsive": true,
            "processing": true, //Feature control the processing indicator.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url($module . 'ajax_list') ?>",
                "type": "POST",
                "dataSrc": ""
            },

        });
    });
</script>