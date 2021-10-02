<?php
include 'header.php';

include '../class/Import.class.php';
$imports = new Import();
$datas = $imports->getDataImport();
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Import</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Import</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-title">
                            Data Import
                        </div>
                        <div class="card-tools">
                            <a class="btn btn-primary" onclick="modalAdd()">Add Data Import</a>
                        </div>
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
                                        <th>Shipper</th>
                                        <th>remark</th>
                                        <th>Qty</th>
                                        <th>Valuta</th>
                                        <th>Value</th>
                                        <th>Value in IDR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($datas as $data) :
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $data->idInvoices; ?>
                                            </td>
                                            <td><?= $data->dateOfPib; ?></td>
                                            <td><?= $data->docNo; ?></td>
                                            <td><?= $data->docType; ?></td>
                                            <td><?= $data->noPengajuanDokumen; ?></td>
                                            <td><?= $data->blNo; ?></td>
                                            <td><?= $data->vesselName; ?></td>
                                            <td><?= $data->shipper; ?></td>
                                            <td><?= $data->remark; ?></td>
                                            <td><?= $data->qty; ?></td>
                                            <td><?= $data->valuta; ?></td>
                                            <td><?= $data->value; ?></td>
                                            <td><?= $data->valueIdr; ?></td>
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

<?php include 'footer.php' ?>

<!-- Modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Data Import</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dateOfPib">Date of Pib</label>
                            <input type="date" name="dateOfPib" id="dateOfPib" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="docNo">Doc No.</label>
                            <input type="text" name="docNo" id="docNo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="docType">Doc Type</label>
                            <input type="text" name="docType" id="docType" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="noPengajuanDokumen">No. Pengajuan Dokumen</label>
                            <input type="text" name="noPengajuanDokumen" id="noPengajuanDokumen" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="blNo">BL No.</label>
                            <input type="text" name="blNo" id="blNo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="vesselName">Vessel Name</label>
                            <input type="text" name="vesselName" id="vesselName" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="shipper">Shipper</label>
                            <input type="text" name="shipper" id="shipper" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="remark">Remark</label>
                            <input type="text" name="remark" id="remark" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="qty">QTY</label>
                            <input type="text" name="qty" id="qty" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="valuta">Valuta</label>
                            <input type="text" name="valuta" id="valuta" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="value">Value</label>
                            <input type="text" name="value" id="value" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="valueIdr">Value in IDR</label>
                            <input type="text" name="valueIdr" id="valueIdr" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <center>
                            <a class="btn btn-primary" onclick="addImport()">Add Import</a>
                        </center>
                    </div>
                    <div class="col-md-12">
                        <div id="dashImport">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#example").DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

    function modalAdd() {
        $("#modalAdd").modal('show');
    }

    function addImport() {
        var dateOfPib = $("#dateOfPib").val();
        var docNo = $("#docNo").val();
        var docType = $("#docType").val();
        var noPengajuanDokumen = $("#noPengajuanDokumen").val();
        var blNo = $("#blNo").val();
        var vesselName = $("#vesselName").val();
        var shipper = $("#shipper").val();
        var remark = $("#remark").val();
        var valuta = $("#valuta").val();
        var value = $("#value").val();
        var valueIdr = $("#valueIdr").val();
        var qty = $("#qty").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "../process/import.process.php",
            data: {
                type: 'addImport',
                dateOfPib: dateOfPib,
                docNo: docNo,
                docType: docType,
                noPengajuanDokumen: noPengajuanDokumen,
                blNo: blNo,
                vesselName: vesselName,
                shipper: shipper,
                remark: remark,
                valuta: valuta,
                value: value,
                valueIdr: valueIdr,
                qty: qty
            },
            success: function(response) {
                if (response == 'successAdd') {
                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: "../process/import.process.php",
                        data: {
                            type: 'getDataTempImport',
                        },
                        success: function(html) {
                            $("#dashImport").html(html);
                            $("#tableImportTemp").DataTable();
                        },
                        error: function(err) {}
                    });
                } else {
                    alert(response);
                }
            },
            error: function(err) {}
        });
    }

    function saveImport() {
        var fromto = $("#fromto").val();
        if (fromto == '' || fromto == null) {
            $("#fromto").focus();
        } else {
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "../process/import.process.php",
                data: {
                    type: 'saveDataImport',
                    fromto: fromto
                },
                success: function(response) {
                    if (response == 'successSaveImport') {
                        window.location = "view-import.php";
                    }
                },
                error: function(err) {}
            });
        }
    }
</script>