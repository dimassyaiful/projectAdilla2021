<?php
include 'header.php';
include '../class/Import.class.php';
include '../class/Kurs.class.php';
// $imports = new Import();
// $datas = $imports->getDataImport();


$kurs = new Kurs();
$dataKurs = $kurs->getData();

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
                                    <h3 class="totalValue">Rp. 0</h3>
                                </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered " style="width:100%">
                                <thead>
                                    <tr> 
                                        <th>ID</th>
                                        <th style="min-width: 100px">From To</th>
                                        <th style="min-width: 100px">Date of Pib</th>
                                        <th>Doc No.</th>
                                        <th>Doc Type</th>
                                        <th>No. Pengajuan Dokumen</th>
                                        <th>BL No.</th>
                                        <th>Vessel Name</th>
                                        <th>Shipper</th>
                                        <th>remark</th> 
                                        <th>Valuta</th>
                                        <th>Kurs</th>
                                        <th style="min-width: 150px">Value</th>
                                        <th style="min-width: 150px">Value in IDR   </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody  id="tbBody">

                                </tbody>
                                <tfoot style="display: none;">
                                <tr>
                                    <th colspan=12> </th>  
                                    <th align="right"> Total: </th> 
                                    <th class="totalValue"> </th>  
                                </tr>
                                </tfoot>
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
                            <label class="labelRequired" for="valuta">Valuta</label>  
                            <select required="" onchange="setValue(this.value);" class="form-control" name="valuta" id="valuta">
                                <option value=""> -- Pilih --</option>
                                <?php foreach ($dataKurs as $key => $val) {
                                    $valuetmp = number_format($val->kurs,0,",",".");
                                ?>
                                    <option value="<?= $val->kurs; ?>|||<?= $valuetmp; ?>|||<?= $val->kode; ?>"> <?= $val->kode; ?></option>
                                <?php } ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label class="labelRequired" for="kurs">Kurs</label>
                            <input required required readonly="" maxlength="14" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="kurs_tmp" id="kurs_tmp" class="form-control" >
                            <input style="display:none" type="text" name="kurs" id="kurs" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label class="labelRequired" for="value">Value</label>
                            <input    onkeypress="return event.charCode == 44 || (event.charCode >= 48 && event.charCode <= 57)" type="text" name="value_tmp" id="value_tmp" class="form-control" required>
                            <input style="display:none"  type="text" name="value" id="value" class="form-control"  >
                        </div>

                        <div class="form-group">
                            <label class="labelRequired" for="valueIdr">Value in IDR</label>
                            <input style="background-color: #dcffdb" readonly type="text" name="valueIdr_tmp" id="valueIdr_tmp" class="form-control" required>
                            <input style="display:none" type="text" value="0" readonly name="valueIdr" id="valueIdr" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <center>
                            <button type="submit" class="btn btn-primary" >
                                Add Import
                            </button>
                        </center>
                    </div>
                    </form>
                </div>
                    <div class="col-md-12 mt-4">
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

<!-- Modal Confirmation --> 
<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" >
  <div class="modal-dialog  modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete data ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" onclick="deleteData()" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    var selectedKurs = [];
    function setValue(kursArray){

        selectedKurs = kursArray.split("|||"); 
        console.log(selectedKurs); 
        // arr 0 -> kurs
        // arr 1 -> kurstmp

        $("#kurs").val(selectedKurs[0]);
        $("#kurs_tmp").val(selectedKurs[1]);
        hitungValueInIdr();
    }
</script>

<script>
    let deleteId = null;
    function deleteConfirmation(id){ 
        $('#confirmation').modal('show');
        deleteId = id;
    }
    async function deleteData(){
        console.log(deleteId);
        await  $.ajax({
            type: "POST",
            dataType: "html",
            url: "../process/import.process.php",
            data: {
                type: 'deleteImport',
                id: deleteId 
            },
            success: function(data){
                $('#confirmation').modal('hide');
                filter();
            },
            error: function(err) {
                console.log(err)
            }
        });
    }
</script>
<!-- End Modal Confirmation -->


<!-- Modal Edit --> 
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" >
<form method="post" id="formy">
  <div class="modal-dialog   modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="editModalBody">
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" id="saveEdit" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</form>
</div>

<script> 
    var successEdit = "<div style='text-align:center;'><h3 class='text-success'><i class='fas fa-check'></i> </h3><h4>Data Berhasil di Edit</h4></div>";
    var gagalEdit = "<div style='text-align:center;'><h3 class='text-danger'><i class='fas fa-times'></i> </h3><h4>Maaf, terjadi kesalahan</h4></div>";

    function editModal(id){ 
        $('#editModal').modal('show'); 
        getFormEdit(id);
    }

    async function getFormEdit(id){ 
        $("#saveEdit").removeAttr('disabled');
        $("#saveEdit").css('display','block');

        await  $.ajax({
            type: "POST",
            dataType: "html",
            url: "../ajax/edit-data-import.php",
            data: { 
                id: id 
            },
            success: function(data){
                $('#editModalBody').html(data); 
            },
            error: function(err) {
                console.log(err)
            }
        });
    }

    $("#formy").on('submit', function(e){
            e.preventDefault(); 
            $("#saveEdit").attr('disabled','true');
            let sendData = $( this ).serialize() ; 
             $.ajax({
                type: "POST",
                
                dataType: "html",
                url: "../process/import.process.php",
                data: sendData+"&valuta="+valuta_+"&type=editImport", 
                success: function(data){
                    if(data=="successEdit"){
                        $("#saveEdit").css('display','none');
                        $('#editModalBody').fadeOut(400, () => { 
                            $('#editModalBody').html(successEdit); 
                            $('#editModalBody').fadeIn(); 
                            filter();
                            setTimeout(() => { 
                                $('#editModal').modal('hide'); 
                            }, 500);
                        });  
                        
                    }else{
                        console.log(data);
                        $('#editModalBody').html(gagalEdit); 
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            });
        });
</script>

<!--  End Modal Edit  -->

<script>
    var startDate = null;
    var endDate = null;

    // Get Data + Filter
    $(document).ready(async function() {
        filter(true);
    });

    async function filter(firstTimeSet= false){
        startDate = $("#startDate").val();
        endDate   = $("#endDate").val();
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
        //title export
        var options = {   year: 'numeric', month: 'long', day: 'numeric' };
        var a = new Date(startDate).toLocaleString('id', options); 
        var b = new Date(endDate).toLocaleString('id', options);  

        //datatable
        $('#example').DataTable().clear().destroy();
        $("#tbBody").html(data);
        $("#example").DataTable({
            dom: 'Bfrtip',
            bDestroy: true, 
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13 ]
                    }, footer: true,
                    title: function () { return `Data Import Tanggal ${a} - ${b}`; },
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13 ]
                    } , footer: true,
                    title: function () { return `Data Import Tanggal ${a} - ${b}`; },
                },
                {
                    extend: 'excel',
                    title: function () { return `Data Import Tanggal ${a} - ${b}`; },
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13 ]
                    }, footer: true
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'legal',
                    title: function () { return `Data Import \n Tanggal ${a} - ${b}`; },
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13 ]
                    }, 
                    footer: true, 
                    customize : function(doc) {
                        console.log(doc);
                        doc.content[1].table.widths = [ 
                            'auto',   
                            'auto',   
                            'auto',   
                            'auto',   
                            'auto',   
                            'auto',   
                            'auto',   
                            'auto',   
                            'auto',   
                            'auto',   
                            'auto',   
                            'auto',     
                            '10%',   
                            '15%',   
                        ];
                    }
                },
                {
                    extend: 'print',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    title: function () { return `Data Import \n Tanggal ${a} - ${b}`; },
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13 ]
                    }, footer: true
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
        var valuta = selectedKurs[2];
        var value = $("#value").val();
        var valueIdr = $("#valueIdr").val(); 
        var kurs = $("#kurs").val(); 
        var qty = 0; 
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
                valueIdr: valueIdr ,
                kurs: kurs ,
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