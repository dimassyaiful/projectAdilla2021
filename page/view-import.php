<?php
include 'header.php';
include '../class/Import.class.php';
// $imports = new Import();
// $datas = $imports->getDataImport();
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
                    <li class="breadcrumb-item"><a class="btn btn-primary" onclick="modalAdd()">Add Data Import</a></li>
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
                        <div class="card-title col-md-8"  >
                            <div class="row">
                                <div class="col-md-4 col-xs-4">
                                <div class="form-group ">
                                    <label style="font-size: 14px;">Dari Tanggal : </label>
                                    <input id="startDate" type="date" class="form-control form-control-sm">
                                    <small style="display:none" class="text-danger" id="dateMsg1"> </small>
                                </div>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                <div class="form-group  ">
                                    <label style="font-size: 14px;">Sampai Tanggal : </label>
                                    <input id="endDate" type="date" class="form-control form-control-sm">
                                    <small style="display:none" class="text-danger  " id="dateMsg2"> </small>
                                </div>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <button class="btn btn-sm btn-success filterBtn" onclick="filter()" id="filterBtn"> <i id="filterIcon" class="fas fa-filter"></i> Filter</button>
                                </div>
                            </div>

                        </div>
                        <div class="card-tools col-md-4">
                        <div class="form-group ">
                                    <label style="font-size: 14px;" >Total Value In IDR </label>
                                    <h3 id="totalValue">Rp. 0</h3>
                                </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="">
                            <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody  id="tbBody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="card">
        <div class="card-body ">
            <div class="row" style="font-size: 20px; text-align: right; ">
                <div class="col-md-12"> Total Value In IDR  : <div id="totalValue" style="display:inline-block; font-weight: bold;"> Rp. 0</div></div>
            </div>
        </div>
        </div> -->
    </div>


</section>


<?php include 'footer.php'?>

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
                <form method="post" id="formz">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="labelRequired" for="dateOfPib">Date of Pib</label>
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
                            <label class="labelRequired" for="shipper">Shipper</label>
                            <input type="text" name="shipper" id="shipper" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="remark">Remark</label>
                            <input type="text" name="remark" id="remark" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="qty">QTY</label>
                            <input maxlength="14" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="qty_tmp" id="qty_tmp" class="form-control" required>
                            <input style="display:none" type="text" name="qty" id="qty" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="valuta">Valuta</label>
                            <input type="text" name="valuta" id="valuta" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="value">Value</label>
                            <input  onkeypress="return event.charCode == 44 || (event.charCode >= 48 && event.charCode <= 57)" type="text" name="value_tmp" id="value_tmp" class="form-control" required>
                            <input style="display:none"  type="text" name="value" id="value" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="labelRequired" for="valueIdr">Value in IDR</label>
                            <input style="background-color: #dcffdb" readonly type="text" name="valueIdr_tmp" id="valueIdr_tmp" class="form-control" required>
                            <input style="display:none" type="text" value="0" readonly name="valueIdr" id="valueIdr" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <center>
                            <button type="submit" class="btn btn-primary" >Add Import</button>
                        </center>
                    </div>
                    </form>
                </div>
                    <div class="col-md-12 mt-2">
                        <div id="dashImport">
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

<script>
    // Get Data + Filter
    $(document).ready(async function() {
        filter(true);
    });

    async function filter(firstTimeSet= false){
        let startDate = $("#startDate").val();
        let endDate   = $("#endDate").val();
        if(firstTimeSet){
            startDate = "<?=date('Y-m-01');?>";
            endDate = "<?=date('Y-m-t');?>";
            $("#startDate").val(startDate);
            $("#endDate").val(endDate);
        }else{
            if(!startDate){
                $("#dateMsg1").html("Tidak Boleh Kosong");
                $("#dateMsg1").fadeIn();
                return;
            }else{
                $("#dateMsg1").fadeOut();
            }
            if(!endDate){
                $("#dateMsg2").html("Tidak Boleh Kosong");
                $("#dateMsg2").fadeIn();
                return;
            }else{
                $("#dateMsg2").fadeOut();
            }

            let dt1 = new Date(startDate);
            let dt2 = new Date(endDate);
            if(dt1 > dt2) {
                $("#dateMsg2").html("Tidak boleh lebih kecil");
                $("#dateMsg2").fadeIn();
                return;
            }else{
                $("#dateMsg2").fadeOut();
            }
        }




        $("#filterIcon").attr('class', 'fas fa-spin fa-sync fa-fw');
        $("#filterBtn").attr('disabled', 'true');
        setTimeout(async() => {
            let data = await getData({
                startDate: startDate,
                endDate: endDate
            });
            await reloadTable(data);
            $("#filterIcon").attr('class', 'fas fa-filter');
            $("#filterBtn").removeAttr('disabled');
        }, 300);
    }

    async function getData({startDate, endDate}){
        return await $.ajax({
            type: "POST",
            dataType: "html",
            url: "../ajax/data-import.php",
            data: {
                startDate: startDate,
                endDate: endDate,
            },
            success: function(data){
                return data;
            },
            error: function(err) {
                console.log(err)
            }
        });
    }

    async function reloadTable(data){
        $('#example').DataTable().clear().destroy();
        $("#tbBody").html(data);
        $("#example").DataTable({
            dom: 'Bfrtip',
            bDestroy: true,
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12 ]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12 ]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12 ]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    title: function () { return "Data Import"; },
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12 ]
                    }
                },
                {
                    extend: 'print',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    title: function () { return "Data Import"; },
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12 ]
                    }
                }
            ]
        });
    }
</script>

<script>
    $(document).ready(function() {


        $("#formz").on('submit', function(e){
            e.preventDefault();
            addImport();
            $("#SaveButton").css("display","block");
        });

        $("#formx").on('submit', function(e){
            e.preventDefault();
            saveImport();
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


<?php
include '../dist/customscript.php';
?>