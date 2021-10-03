<?php
include 'header.php';
include '../class/Export.class.php';
$export = new Export();
$datas = $export->getDataExport();
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Export</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Export</a></li>
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
                        <div class="card-title">Data Export</div>
                        <div class="card-tools">
                            <a class="btn btn-primary" onclick="modalAdd()">Add Data Export</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Invoice Number</th>
                                        <th>Date of Peb</th>
                                        <th>Doc No.</th>
                                        <th>Doc Type</th>
                                        <th>No. Pengajuan Dokumen</th>
                                        <th>BL No.</th>
                                        <th>Vessel Name</th>
                                        <th>Consignee</th>
                                        <th>remark</th>
                                        <th>Qty</th>
                                        <th>Valuta</th>
                                        <th>Value</th>
                                        <th>Value in IDR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
foreach ($datas as $data):
?>
                                        <tr>
                                            <td>
                                                <?=$data->idInvoices;?>
                                            </td>
                                            <td><?=$data->dateOfPib;?></td>
                                            <td><?=$data->docNo;?></td>
                                            <td><?=$data->docType;?></td>
                                            <td><?=$data->noPengajuanDokumen;?></td>
                                            <td><?=$data->blNo;?></td>
                                            <td><?=$data->vesselName;?></td>
                                            <td><?=$data->consignee;?></td>
                                            <td><?=$data->remark;?></td>
                                            <td><?=$data->qty;?></td>
                                            <td><?=$data->valuta;?></td>
                                            <td><?=$data->value;?></td>
                                            <td><?=$data->valueIdr;?></td>
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

<!-- Modal -->

<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Export</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form method="post" id="formz">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="labelRequired" for="dateOfPib">Date of Peb</label>
                            <input type="date" name="dateOfPib" id="dateOfPib" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="docNo">Doc No.</label>
                            <input type="text" name="docNo" id="docNo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="docType">Doc Type</label>
                            <input type="text" name="docType" id="docType" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="noPengajuanDokumen">No. Pengajuan Dokumen</label>
                            <input type="text" name="noPengajuanDokumen" id="noPengajuanDokumen" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="blNo">BL No.</label>
                            <input type="text" name="blNo" id="blNo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="vesselName">Vessel Name</label>
                            <input type="text" name="vesselName" id="vesselName" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="labelRequired" for="consignee">Consignee</label>
                            <input type="text" name="consignee" id="consignee" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="remark">Remark</label>
                            <input type="text" name="remark" id="remark" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="qty">Qty</label>
                            <input type="text" name="qty" id="qty" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="valuta">Valuta</label>
                            <input type="text" name="valuta" id="valuta" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="value">Value</label>
                            <input type="text" name="value" id="value" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="valueIdr">Value in IDR</label>
                            <input type="text" name="valueIdr" id="valueIdr" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <center>
                        <button type="submit" class="btn btn-primary" >Add Export</button>
                        </center>
                    </div>
                    </div>
                    </form>

                    <div class="col-md-12 mt-2">
                        <div id="dashExport">
                        </div>

                        <div class="form-group" style="display: none" id="SaveButton">
                            <form id="formx">
                                <div class="mb-2">
                                    <label for="fromto">From To</label>
                                    <input type="text" name="fromto" id="fromto" class="form-control" required>
                                </div>
                            <center>
                                <button type="submit" class="btn btn-primary" >Save</button>
                            </center>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>



<?php include 'footer.php'?>
<script>
    $(document).ready(function() {
        $("#example").DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $("#formz").on('submit', function(e){
            e.preventDefault();
            addExport();
            $("#SaveButton").css("display","block");
        });
        $("#formx").on('submit', function(e){
            e.preventDefault();
            saveExport();
        });
    });

    function modalAdd() {
        $("#modalAdd").modal('show');
    }

    function addExport() {
        var dateOfPib = $("#dateOfPib").val();
        var docNo = $("#docNo").val();
        var docType = $("#docType").val();
        var noPengajuanDokumen = $("#noPengajuanDokumen").val();
        var blNo = $("#blNo").val();
        var vesselName = $("#vesselName").val();
        var consignee = $("#consignee").val();
        var remark = $("#remark").val();
        var valuta = $("#valuta").val();
        var value = $("#value").val();
        var valueIdr = $("#valueIdr").val();
        var qty = $("#qty").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "../process/export.process.php",
            data: {
                type: 'addExport',
                dateOfPib: dateOfPib,
                docNo: docNo,
                docType: docType,
                noPengajuanDokumen: noPengajuanDokumen,
                blNo: blNo,
                vesselName: vesselName,
                consignee: consignee,
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
                        url: "../process/export.process.php",
                        data: {
                            type: 'getDataTempExport',
                        },
                        success: function(html) {
                            $("#dashExport").html(html);
                            $("#tableExportTemp").DataTable();
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

    function saveExport() {
        var fromto = $("#fromto").val();
        if (fromto == '' || fromto == null) {
            $("#fromto").focus();
        } else {
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "../process/export.process.php",
                data: {
                    type: 'saveDataExport',
                    fromto: fromto
                },
                success: function(response) {
                    if (response == 'successSaveExport') {
                        window.location = "view-export.php";
                    }
                },
                error: function(err) {}
            });
        }
    }
</script>