<?php
include 'header.php';
include '../class/Report.class.php';
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Menu Report</h1>
            </div>
            <!-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Report</a></li>
                </ol>
            </div> -->
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Date of Pib</th>
                                        <th>Doc No.</th>
                                        <th>Doc Type</th>
                                        <th>No. Pengajuan Dokumen</th>
                                        <th>BL No.</th>
                                        <th>Vessel Name</th>
                                        <th>Shipper / Consignee</th>
                                        <th>remark</th> 
                                        <th>Valuta</th>
                                        <th>Kurs</th>
                                        <th>Value</th>
                                        <th>Value in IDR</th>
                                    </tr>
                                </thead>
                                <tbody id="tbBody"> 
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
            url: "../ajax/data-report.php",
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
                    title: function () { return `Report Import & Export Tanggal ${a} - ${b}`; },
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13 ]
                    } , footer: true,
                    title: function () { return `Report Import & Export Tanggal ${a} - ${b}`; },
                },
                {
                    extend: 'excel',
                    title: function () { return `Report Import & Export Tanggal ${a} - ${b}`; },
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13  ]
                    }, footer: true
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'legal',
                    title: function () { return `Report Import & Export \n Tanggal ${a} - ${b}`; },
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
                            '10%',   
                            '15%', 
                            '10%',    
                        ];
                    }
                },
                {
                    extend: 'print',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    title: function () { return `Report Import & Export \n Tanggal ${a} - ${b}`; },
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13 ]
                    }, footer: true
                }
            ]
        });
    }
</script>

 