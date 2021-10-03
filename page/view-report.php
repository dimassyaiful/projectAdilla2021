<?php
include 'header.php';
include '../class/Report.class.php';
$report = new Report();
$datas = $report->getData();
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Menu Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Report</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Report</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Invoice Number</th>
                                        <th>Date of Pib</th>
                                        <th>Doc No.</th>
                                        <th>Doc Type</th>
                                        <th>No. Pengajuan Dokumen</th>
                                        <th>BL No.</th>
                                        <th>Vessel Name</th>
                                        <th>Shipper / Consignee</th>
                                        <th>remark</th>
                                        <th>Qty</th>
                                        <th>Valuta</th>
                                        <th>Value</th>
                                        <th>Value in IDR</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
foreach ($datas as $data):
?>
                                        <tr>
                                            <td><?=$data->idInvoices;?></td>
                                            <td><?=$data->dateOfPib;?></td>
                                            <td><?=$data->docNo;?></td>
                                            <td><?=$data->docType;?></td>
                                            <td><?=$data->noPengajuanDokumen;?></td>
                                            <td><?=$data->blNo;?></td>
                                            <td><?=$data->vesselName;?></td>
                                            <td><?=$data->shipper;?></td>
                                            <td><?=$data->remark;?></td>
                                            <td><?=$data->qty;?></td>
                                            <td><?=$data->valuta;?></td>
                                            <td><?=$data->value;?></td>
                                            <td><?=$data->valueIdr;?></td>
                                            <td><?=ucfirst($data->type);?></td>
                                        </tr>
                                    <?php

endforeach;
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'?>
<script>
    $(document).ready(function() {
        $("#example").DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13 ]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13 ]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13 ]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    title: function () { return "Report"; },
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13 ]
                    }
                },
                {
                    extend: 'print',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    title: function () { return "Report Import & Export"; },
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13 ]
                    }
                }
            ]
        });
    });
</script>