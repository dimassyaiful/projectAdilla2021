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
                                        <th>Action</th>
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
                                            <td><?=$data->shipper;?></td>
                                            <td><?=$data->remark;?></td>
                                            <td><?=number_format($data->qty);?></td>
                                            <td><?=$data->valuta;?></td>
                                            <td><?=number_format($data->value, 2);?> </td>
                                            <td>Rp. <?=number_format($data->valueIdr, 2);?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i> </button>
                                                <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> </button>
                                            </td>
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
    $(document).ready(function() {
        $("#example").DataTable({
            dom: 'Bfrtip',
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

        $("#formz").on('submit', function(e){
            e.preventDefault();
            addImport();
            $("#SaveButton").css("display","block");
        });

        $("#formx").on('submit', function(e){
            e.preventDefault();
            saveImport();
        });

        console.clear();
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

<script type="text/javascript">
        var formatter = new Intl.NumberFormat("en-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 0 });
        var formatterComma = new Intl.NumberFormat("en-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 2 });

        //format ribuan untuk qty
		var tmp_qty = document.getElementById('qty_tmp');
		tmp_qty.addEventListener('keyup', function(e){
            let value = tmp_qty.value.replace(/[.]/gi, '');
            let formatValue = formatter.format(value).replace(/[IDR]/gi, '').replace(/(\.+\d{2})/, '').trimLeft();
            let showValue = formatValue.replace(/[,]/gi, '.');
            if(isNaN(showValue)){
                showValue=0;
            }
            $("#qty").val(value);
            $("#qty_tmp").val(showValue);
            hitungValueInIdr();
		});


        //format ribuan untuk value
		var tmp_value = document.getElementById('value_tmp');
		tmp_value.addEventListener('keyup', function(e){
            console.clear();

            //hapus titik dan ubah koma menjadi titik
            let value =  tmp_value.value.replace(/[.]/gi, '').replace(/[,]/gi, '.');
            if(isNaN(value)){
                value = 0;
            }

            //cek apakah ada desimal
            let decimalExists = tmp_value.value.search(",") > 0 ?true:false;

            let arr =  value.split(".");
            let formatValue = formatter.format(arr[0]).replace(/[IDR]/gi, '');
            let formatValue2 = formatValue.replace(/[,]/gi, '.');



            let decimal = arr[1] ? arr[1].substring(0, 2) : "" ;
            let finalValue = formatValue2+ (decimalExists===true  ?","+decimal:"");
            $("#value").val(value.trimStart());
            $("#value_tmp").val(finalValue.trimStart());
            hitungValueInIdr();
		});

        //fungsi untuk menghitung value in IDR
        function hitungValueInIdr(){
            let value = $("#value").val();
            let qty = $("#qty").val();
            let total = qty * value;
            let finalTotal = total.toFixed(2);

            let arr =  finalTotal.split(".");
            console.log(arr)
            let formatValue = formatter.format(arr[0]).replace(/[IDR]/gi, '');
            let formatValue2 = formatValue.replace(/[,]/gi, '.');
            let finalValue = formatValue2+ (arr[1] ?","+arr[1]:"");

            $("#valueIdr").val(finalTotal);
            $("#valueIdr_tmp").val("Rp. "+ finalValue);
        }

	</script>