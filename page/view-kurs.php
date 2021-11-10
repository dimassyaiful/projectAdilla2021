<?php
include 'header.php';
include '../class/Kurs.class.php';


$export = new Kurs();
$datas = $export->getData();   

?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Setting Kurs</h1>
            </div> 
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="btn btn-primary" onclick="modalAdd()">Add Data Kurs</a></li>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-sm table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode</th>
                                        <th>Kurs</th> 
                                        <th>Action</th> 
                                    </tr>
                                </thead>
        <tbody id="tbBody"> 
            <?php  foreach ($datas as $row => $val) { 
                $valuetmp = number_format($val->kurs,0,",",".");
                ?>
                <tr>
                    <td><?= $val->id; ?></td>
                    <td><?= $val->kode; ?></td>
                    <td>Rp. <?= $valuetmp; ?></td> 
                    <td>
                        <button onclick="editData('<?= $val->id; ?>','<?= $val->kode; ?>','<?= $val->kurs; ?>','<?= $valuetmp; ?>');" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="deleteConfirmation(<?= $val->id; ?>);"  class="btn btn-sm btn-danger">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
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
</section>

<?php include 'footer.php'?>

<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title">Tambah Kurs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form method="post" id="formx">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="labelRequired" for="docNo">Kode</label>
                            <input type="text" name="kode" id="kode" class="form-control" required>
                        </div> 

                        <div class="form-group">
                            <label class="labelRequired" for="value">Nilai Kurs</label>
                            <input  onkeypress="return event.charCode == 44 || (event.charCode >= 48 && event.charCode <= 57)" type="text" name="kurs_tmp" id="value_tmp" class="form-control" required>
                            <input style="display:none"  type="text" name="kurs" id="value" class="form-control">
                        </div> 
                    </div>

                    <div class="col-md-12">
                        <div style="display: none;" id="alert-gagal" class="alert alert-danger">
                            Kode sudah terdaftar di database
                        </div>
                        <div style="display: none;" id="alert-berhasil" class="alert alert-success">
                            Data Kurs berhasil disimpan
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary" >
                                Simpan
                            </button>
                        </center>
                    </div>
                    </div>
                    </form>
 

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
            url: "../process/kurs.process.php",
            data: {
                type: 'delete',
                id: deleteId 
            },
            success: function(data){
                $('#confirmation').modal('hide');
                location.reload();
            },
            error: function(err) {
                console.log(err)
            }
        });
    }
</script>
<!-- End Modal Confirmation -->

<script>
    var startDate = null;
    var endDate = null;
    var actionType = null;
    var selectedId = null;

    function editData(id, kode, kurs, kursTmp){
        actionType = "editData"; 
        $("#modalTitle").html("Edit Data Kurs | ID: "+ id);
        $("#kode").val(kode);
        $("#value").val(kurs);
        $("#value_tmp ").val(kursTmp);
        selectedId = id;
        $("#modalAdd").modal('show');
    }


    function hapusModal(id, kode, kurs){
        actionType = "editData";
        $("#modalAdd").modal('show');
    }

 
    $(document).ready(async function() {
        $("#example").DataTable({
            dom: 'Bfrtip',
            bDestroy: true, 
            buttons: [ 
            ]
        });

        $("#formx").on('submit', function(e){ 
            e.preventDefault();  
            let _data;
 
            let kode = $("#kode").val();
            let kurs = $("#value").val();
            if(actionType=="insertData"){
                _data = {
                    type: actionType,
                    kode: kode,
                    kurs: kurs,
                } 
            }else{ 
                _data = {
                    type: actionType,
                    kode: kode,
                    kurs: kurs, 
                    id: selectedId, 
                }
            }

            $.ajax({
                type: "POST",
                dataType: "html",
                url: "../process/kurs.process.php",
                data: _data,
                success: function(response) {
                    if (response == 'success') { 
                        $("#alert-gagal").fadeOut('fast',() => {
                            $("#alert-berhasil").fadeIn(); 
                            setTimeout(function(){
                            window.location = 'view-kurs.php'; 
                            }, 500);
                        });
                    }else{
                        $("#alert-berhasil").fadeOut('fast',() => {
                            $("#alert-gagal").fadeIn(); 
                        });
                    }
                },
                error: function(err) {}
            });
        });

    }); 
  
 
  function modalAdd(){
        $("#modalTitle").html("Tambah Data Kurs");
        actionType = "insertData";
        $("#kode").val("");
        $("#kode").removeAttr("readonly");
        $("#value").val('');
        $("#value_tmp ").val("");
        $("#modalAdd").modal('show');
  }

var formatter = new Intl.NumberFormat("en-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 0 }); 
  var tmp_value = document.getElementById('value_tmp');
    tmp_value.addEventListener('keyup', function (e) {
        console.clear();

        //hapus titik dan ubah koma menjadi titik
        let value = tmp_value.value.replace(/[.]/gi, '').replace(/[,]/gi, '.');
        if (isNaN(value)) {
            value = 0;
        }

        //cek apakah ada desimal
        let decimalExists = tmp_value.value.search(",") > 0 ? true : false;

        let arr = value.split(".");
        let formatValue = formatter.format(arr[0]).replace(/[IDR]/gi, '');
        let formatValue2 = formatValue.replace(/[,]/gi, '.');



        let decimal = arr[1] ? arr[1].substring(0, 2) : "";
        let Value = arr[0] + (decimalExists === true ? "." + decimal : "");
        let finalValue = formatValue2 + (decimalExists === true ? "," + decimal : ""); 
        $("#value").val(Value.trimStart());

        if(finalValue==0){
            $("#value_tmp").val("");  
        }else{
            $("#value_tmp").val(finalValue.trimStart());   
        }
    });
</script>
 

 