<?php 
include 'header.php';
include '../class/Invoice.class.php'; 
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
                    <li class="breadcrumb-item">
                        <button href="#" class="btn btn-primary" onclick="openFormAdd();">
                            Add Data Invoices
                        </button>
                    </li>
                     
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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table  table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Invoice Number</th>
                                        <th>Date</th>
                                        <th>From/To</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbBody">  
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
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modallAddLabel" aria-hidden="true" data-backdrop="static"  >
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modallAddLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="divAdd" >
                
            </div>
        </div>
    </div>
</div>

<!-- End modal Add  -->
 

<?php include 'footer.php'?>


<script>
    var obj;
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
            url: "../ajax/data-invoicesTables.php",
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

        //datatable
        $('#example').DataTable().clear().destroy();
        $("#tbBody").html(data);
        $("#example").DataTable({ 
            bDestroy: true  ,
            button: [] 
        });
    }
</script>

<script type="text/javascript">
    async function openFormAdd(){

        $("#modallAddLabel").html("Add Data Invoice");
        $("#divAdd").html("<div class='text-center p-3'> <i class='fa fa-spin fa-spinner fa-2x'></i> </div>");
        $("#modalAdd").modal("show");
        return await $.ajax({
            type: "POST",
            dataType: "html",
            url: "../ajax/form-add-invoices.php", 
            success: function(data){
                $("#divAdd").html(data); 
            },
            error: function(err) {
                console.log(err)
            }
        });
    }

    async function openFormDetail(id){
        $("#modallAddLabel").html("Detail Data Invoice | "+id);
        $("#divAdd").html("<div class='text-center p-3'> <i class='fa fa-spin fa-spinner fa-2x'></i> </div>");
        $("#modalAdd").modal("show");
        return await $.ajax({
            type: "POST",
            dataType: "html",
            url: "../ajax/form-edit-invoices.php", 
            data:"id="+id,
            success: function(data){
                $("#divAdd").html(data); 
            },
            error: function(err) {
                console.log(err)
            }
        });
    }
</script>
   