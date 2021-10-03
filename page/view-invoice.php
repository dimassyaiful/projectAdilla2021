<?php

include 'header.php';
include '../class/Invoice.class.php';

$invoices = new Invoice();
$datas = $invoices->getDataInvoice();

?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Invoices</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Import Export Apps</a></li>
                    <li class="breadcrumb-item active">Invoices</li>
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
                        <div class="card-title">Data Invoices</div>
                        <div class="card-tools">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">Add Data Invoices</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Invoice Number</th>
                                        <th>Date</th>
                                        <th>From/To</th>
                                        <th>Type</th>
                                        <th>Print</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
foreach ($datas as $data):
?>
                                        <tr>
                                            <td><a class="btn btn-primary" style="cursor: pointer;" onclick="detailData('<?=$data->id;?>','<?=$data->type;?>')">
                                                    <?=$data->id;?></a>
                                            </td>
                                            <td><?=$data->date;?></td>
                                            <td><?=$data->fromto;?></td>
                                            <td><?=$data->type;?></td>
                                            <td><a href="../process/print-invoices.php?id=<?=$data->id;?>" class="btn btn-warning">Print</a></td>
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

<!-- Modal Add-->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modallAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modallAddLabel">Add Invoices</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="height: 27em; overflow: auto;">
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header bg-primary">
                                <div class="card-title">Data Invoice</div>
                            </div>
                            <div class="card-body">
                                <form id="formx">
                                <div class="form-group">
                                    <label class="labelRequired" for="type">Type</label>
                                    <select required name="type" id="type" class="form-control">
                                        <option value="Import">Import</option>
                                        <option value="Export">Export</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="labelRequired" for="fromto">From/To</label>
                                    <input required  type="text" name="fromto" id="fromto" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="labelRequired" for="date">date</label>
                                    <input required  type="date" name="date" id="date" class="form-control">
                                </div>
                                <center>
                                    <button type="submit" class="btn btn-primary" > Add </button>
                                    <!-- <a href="#" id="btnAddInvoice" class="btn btn-primary" onclick="AddInvoice()">Add</a> -->
                                </center>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div id="dashAddInvoice">
                            <!-- content will show here  -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="dashTableContent">
                            <!-- content will show here  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End modal Add  -->

<!-- Modal Add-->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modalDetailLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="dash">
                    <!-- this content will show here  -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End modal Detail  -->

<?php include 'footer.php'?>
<script>
    $(document).ready(function() {
        $("#example").DataTable();

        $("#formx").on('submit', function(e){
            e.preventDefault();
            AddInvoice();
        });
    });

    function detailData(id, type) {
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "../process/invoice.process.php",
            data: {
                id: id,
                type: type,
                detialInvoice: "detalInvoice"
            },
            success: function(response) {
                $(".dash").html(response);
                $("#modalDetailLabel").html(id);
                $("#example3").DataTable();
                $("#modalDetail").modal('show');
            },
            error: function(err) {
                $(".dash").html(response);
                $("#modalDetail").modal('show');
            }
        });
    }

    function AddInvoice() {
        var type = $("#type").val();
        var fromto = $("#fromto").val();
        var date = $("#date").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "../process/invoice.process.php",
            data: {
                type: type,
                fromto: fromto,
                date: date,
                posttype: "addInvoice"
            },
            success: function(response) {
                $("#dashAddInvoice").html(response);
                $("#type").prop("disabled", true);
                $("#fromto").prop("disabled", true);
                $("#date").prop("disabled", true);
                // $("#btnAddInvoice").css("display", "none");
            },
            error: function(err) {
                $("#dashAddInvoice").html(err);
            }
        });
    }

    function AddData() {
        var typeInvoices = $("#typeInvoices").val();
        if (typeInvoices == 'Import') {
            var invoiceId = $("#invoiceId").val();
            var typeInvoices = $("#typeInvoices").val();
            var dateOfPib = $("#dateOfPib").val();
            var docNo = $("#docNo").val();
            var docType = $("#docType").val();
            var noPengajuanDokumen = $("#noPengajuanDokumen").val();
            var blNo = $("#blNo").val();
            var vesselName = $("#vesselName").val();
            var shipper = $("#shipper").val();
            var remark = $("#remark").val();
            var valuta = $("#valuta").val();
            var valueInp = $("#value").val();
            var valueIdr = $("#valueIdr").val();
            var qty = $("#qty").val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "../process/invoice.process.php",
                data: {
                    invoiceId: invoiceId,
                    typeInvoices: typeInvoices,
                    dateOfPib: dateOfPib,
                    docNo: docNo,
                    docType: docType,
                    noPengajuanDokumen: noPengajuanDokumen,
                    blNo: blNo,
                    vesselName: vesselName,
                    shipper: shipper,
                    remark: remark,
                    valuta: valuta,
                    valueInp: valueInp,
                    valueIdr: valueIdr,
                    qty: qty,
                    typeInsert: "Import"
                },
                success: function(response) {
                    $("#dashTableContent").html(response);
                    $("#example1").DataTable();
                },
                error: function(err) {
                    $("#dashTableContent").html(err);
                }
            });
        } else if (typeInvoices == 'Export') {
            var invoiceId = $("#invoiceId").val();
            var typeInvoices = $("#typeInvoices").val();
            var dateOfPib = $("#dateOfPib").val();
            var docNo = $("#docNo").val();
            var docType = $("#docType").val();
            var noPengajuanDokumen = $("#noPengajuanDokumen").val();
            var blNo = $("#blNo").val();
            var vesselName = $("#vesselName").val();
            var consignee = $("#consignee").val();
            var remark = $("#remark").val();
            var valuta = $("#valuta").val();
            var valueInp = $("#value").val();
            var valueIdr = $("#valueIdr").val();
            var qty = $("#qty").val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "../process/invoice.process.php",
                data: {
                    invoiceId: invoiceId,
                    typeInvoices: typeInvoices,
                    dateOfPib: dateOfPib,
                    docNo: docNo,
                    docType: docType,
                    noPengajuanDokumen: noPengajuanDokumen,
                    blNo: blNo,
                    vesselName: vesselName,
                    consignee: consignee,
                    remark: remark,
                    valuta: valuta,
                    valueInp: valueInp,
                    valueIdr: valueIdr,
                    qty: qty,
                    typeInsert: "Export"
                },
                success: function(response) {
                    $("#dashTableContent").html(response);
                    $("#example1").DataTable();
                },
                error: function(err) {
                    $("#dashTableContent").html(err);
                }
            });
        }
    }


    $(document).ready(function() {
        //Refresh Temporary table
        $.ajax({
                type: "POST",
                dataType: "html",
                url: "../process/export.process.php",
                data: {
                    type: 'refreshTempExport',
                },
                error: function(err) {
                    console.log(err)
                }
            });

            //clear temporary table when refresh page
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "../process/import.process.php",
            data: {
                type: 'refreshTempImport',
            },
            error: function(err) {
                console.log(err)
            }
        });
    });

    $('#modalAdd').on('hidden.bs.modal', function(e) {
        window.location = "view-invoice.php";
    });
</script>