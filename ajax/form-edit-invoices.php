<?php

include '../class/Invoice.class.php';
$invoices = new Invoice();
$datas = $invoices->getDetailInvoice($_POST);   
$details = $datas['details']; 
$items = $datas['items'];

?>
<div id="detailData"> 
    <div class="modal-body">
        <div class="table-responsive pb-4 col-md-4">
            <table class="table table-hover table-striped table-sm">
                <tr>
                    <th>ID Invoice</th>
                    <td><?=  $details->id; ?></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><?=  $details->date; ?></td>
                </tr>
                <tr>
                    <th>From/to</th>
                    <td><?=  $details->fromto; ?></td>
                </tr>
            </table>
        </div>
        <div>
            
            <div class="col-md-12 table-reponsive " > 
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Amount Price</th> 
                        </tr>
                    </thead> 
                    <tbody>

                        <?php 
                        $total = 0;
                        $totalQty = 0;
                        foreach ($items as $key => $val) { 
                            $total = $total + $val->amount;
                            $totalQty = $totalQty + $val->qty;
                        ?> 
                            <tr>
                                <td><?= $val->type;?></td> 
                                <td><?= $val->description;?></td> 
                                <td><?= $val->qty_tmp;?></td> 
                                <td>IDR <?= $val->unit_price_tmp;?></td> 
                                <td>IDR <?= $val->amount_tmp;?></td> 
                            </tr>
                        <?php } ?> 
                        <tr> 
                            <th  >Total</td>
                            <th style="text-align: right;" ></td>
                            <th  >
                                <?= number_format($totalQty,0,",","."); ?>
                            </th> 
                            <th></th>
                            <th>IDR <?= number_format($total,0,",","."); ?></th> 
                        </tr>
                    </tbody>    
                </table> 
            </div>  
        </div>
    </div>

    <div class="modal-footer text-center">

            <center>
                <button type="button" class="btn btn-secondary"  data-dismiss="modal" aria-label="Close" > Cancel </button> 
                <button onclick="deleteConfirmation()" type="button" class="btn btn-danger" > 
                    <i class="fa fa-edit fa-fw"></i> Hapus 
                </button> 
                <button onclick="editForm();" type="button" class="btn btn-success" >
                    <i class="fa fa-edit fa-fw"></i> Edit 
                </button>  
                <a target="_blank" href="../process/print-invoices.php?id=<?= $details->id; ?>" class="btn btn-warning">
                    <i class="fa fa-print fa-fw"></i> Cetak
                </a>
            </center>
    </div>
</div>

<div id="confirmation" style="display: none;">
  <div class="modal-body">
    Are you sure want to delete data ?
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary"  onclick="deleteConfirmationCancel()" >Cancel</button>
    <button type="button" onclick="deleteData()" class="btn btn-danger">Delete</button>
  </div>
</div>

<form id="formx" style="display: none;" > 
<div class="modal-body">
    <div class="row"  >
        <div class="col-md-12">
            <div class="row d-none"> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="labelRequired"  >Invoice Number</label>
                            <input required value="<?= $details->id; ?>" type="text" name="id" readonly class="form-control">
                        </div>
                    </div>
            </div>
            <div class="row"> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="labelRequired" for="fromto">From/To</label>
                            <input required value="<?= $details->fromto; ?>" type="text" name="fromto" id="fromto" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="labelRequired" for="date">date</label>
                            <input required  value="<?= $details->date; ?>" type="date" name="date" id="date" class="form-control"> 
                        </div>      
                    </div> 
            </div>
        </div> 
        <div class="col-md-12" style="border-top: 1px solid #c7c7c7; padding: 10px">
            <div class="row"> 
                    <div class="col-md-6 col-sm-6">
                        <label class="labelRequired" for="fromto">Data Invoice</label> 
                    </div> 
                    <div class="col-md-6 col-sm-6  text-right">
                        <button class="btn btn-primary btn-sm" type="button" onclick="addRow();"> 
                                <i class="fa fa-plus fa-fw"></i>
                                Tambah Item
                        </button>
                    </div> 
            </div>
        </div>  
        <div class="col-md-12 table-reponsive " > 
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Amount Price</th> 
                            </tr>
                        </thead> 
                        <tbody id="tbody"></tbody>    
                    </table> 
        </div>  
    </div>
</div>
<div class="modal-footer text-center">

        <center>
            <button type="button" class="btn  btn-secondary"  data-dismiss="modal" aria-label="Close" > Cancel </button> 
            <button id="btnSimpanx" type="submit" class="btn btn-success" > Simpan </button> 
        </center>
</div>
</form> 

<script type="text/javascript">
    var formatter = new Intl.NumberFormat("en-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 0 });

    function qtyChange(id){
        let tmp_qty = document.getElementById('qty_tmp'+id);
        let value = tmp_qty.value.replace(/[.]/gi, '');
        let formatValue = formatter.format(value).replace(/[IDR]/gi, '').replace(/(\.+\d{2})/, '').trimLeft();
        let showValue = formatValue.replace(/[,]/gi, '.');
        $("#qty"+id).val(value);
        $("#qty_tmp"+id).val(showValue); 
        hitungValue(id); 
    }

    function editForm(){
        $("#detailData").css('display','none');
        $("#formx").css('display','block');
    }

    function unitPriceChange(id){
        let tmp_unit_price = document.getElementById('unit_price_tmp'+id);
        let value = tmp_unit_price.value.replace(/[.]/gi, '');
        let formatValue = formatter.format(value).replace(/[IDR]/gi, '').replace(/(\.+\d{2})/, '').trimLeft();
        let showValue = formatValue.replace(/[,]/gi, '.');
        $("#unit_price"+id).val(value);
        $("#unit_price_tmp"+id).val(showValue); 
        hitungValue(id); 
    }

    function hitungValue(id){ 
        let qty = $("#qty"+id).val() ?$("#qty"+id).val():0;
        let unitPrice = $("#unit_price"+id).val()?$("#unit_price"+id).val():0;
        let total = parseInt(qty) * parseInt(unitPrice);


        let formatValue = formatter.format(total).replace(/[IDR]/gi, '').replace(/(\.+\d{2})/, '').trimLeft();
        $("#amount_price_tmp"+id).val(formatValue);
        $("#amount_price"+id).val(total);
    }
</script>

<script type="text/javascript">
    var count = 0;
    var idCount = 1;
    function addRow(data=null){
        if(data==null){
            var html ='<tr id="row'+idCount+'"> <td> <select required name="itemType[]" class="form-control form-control-sm"> <option value="">-- Pilih --</option> <option value="export">Import</option> <option value="import">Export</option> </select> </td><td><input type="text" name="description[]" value="" class="form-control form-control-sm" required></td> <td> <input onkeypress="return event.charCode==44 || (event.charCode >=48 && event.charCode <=57)" onkeyup="qtyChange('+idCount+')" required id="qty_tmp'+idCount+'" class="form-control form-control-sm" type="text"> <input id="qty'+idCount+'" class="d-none form-control form-control-sm" type="text" name="qty[]"> </td><td> <input onkeypress="return event.charCode==44 || (event.charCode >=48 && event.charCode <=57)" onkeyup="unitPriceChange('+idCount+')" id="unit_price_tmp'+idCount+'" required class="form-control form-control-sm" type="text" > <input id="unit_price'+idCount+'" class="d-none form-control form-control-sm" type="text" name="unit_price[]"> </td><td> <input required id="amount_price_tmp'+idCount+'" class="form-control form-control-sm" readonly="" type="text"> <input id="amount_price'+idCount+'" class="d-none form-control form-control-sm" type="text" name="amount_price[]"> </td><td> <button onclick="deleteRow('+idCount+');" type="button" class="btn btn-danger btn-sm"> <i class="fa fa-minus"></i> </button> </td></tr>'; 
        }else{
            var html ='<tr id="row'+idCount+'"> <td> <select required name="itemType[]" class="form-control form-control-sm"> <option value="">-- Pilih --</option> <option '+data.import+'  value="import">Import</option> <option value="export" '+data.export+'>Export</option> </select> </td><td><input type="text" name="description[]" value="'+data.description+'" class="form-control form-control-sm" required></td> ';
            html += '<td> <input value="'+data.qty_tmp+'" onkeypress="return event.charCode==44 || (event.charCode >=48 && event.charCode <=57)" onkeyup="qtyChange('+idCount+')" required id="qty_tmp'+idCount+'" class="form-control form-control-sm" type="text"> <input id="qty'+idCount+'" class="d-none form-control form-control-sm" type="text" name="qty[]" value="'+data.qty+'"> </td><td> <input onkeypress="return event.charCode==44 || (event.charCode >=48 && event.charCode <=57)" onkeyup="unitPriceChange('+idCount+')" id="unit_price_tmp'+idCount+'" required class="form-control form-control-sm" type="text" value="'+data.unit_price_tmp+'"> <input id="unit_price'+idCount+'" class="d-none form-control form-control-sm" type="text" name="unit_price[]" value="'+data.unit_price+'"> </td><td> <input required id="amount_price_tmp'+idCount+'" class="form-control form-control-sm" readonly="" type="text" value="'+data.amount_tmp+'"> <input id="amount_price'+idCount+'" class="d-none form-control form-control-sm" type="text" name="amount_price[]" value="'+data.amount+'"> </td><td> <button onclick="deleteRow('+idCount+');" type="button" class="btn btn-danger btn-sm"> <i class="fa fa-minus"></i> </button> </td></tr>';  
        }

        $("#tbody").append(html);
        count++;
        idCount++;
        if(count > 0){
            $("#btnSimpanx").removeAttr("disabled");
        }
    }

    function deleteRow(id){
        $("#row"+id).remove();
        count--;

        if(count < 1){
            $("#btnSimpanx").attr("disabled","disabled"); 
        }
    }
</script>
 
 <script type="text/javascript"> 
    
    var successEdit = "<div style='text-align:center;padding: 20px;'><h3 class='text-success'><i class='fas fa-check'></i> </h3><h4>Data Berhasil di Edit</h4></div>";
    var gagalEdit = "<div style='text-align:center;padding: 20px;'><h3 class='text-danger'><i class='fas fa-times'></i> </h3><h4>Maaf, terjadi kesalahan</h4></div>";
    var successDelete = "<div style='text-align:center;padding: 20px;'><h3 class='text-success'><i class='fas fa-check'></i> </h3><h4>Data Berhasil di Hapus</h4></div>";

    function setButtonSubmit(stats){
        if(stats==true){
            $("#btnSimpanx").removeAttr("disabled");
            $("#btnSimpanx").html("Simpan");

        }else{
            $("#btnSimpanx").attr("disabled","disabled");
            $("#btnSimpanx").html("<i class='fa fa-spin fa-spinner fa-fw'></i> Mohon Tunggu . . .");

        }
    }
 
     // Submit script 
     $("#formx").on('submit', function(e){
        e.preventDefault();

        let sendData = $( this ).serialize(); 
        setButtonSubmit(false);  
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "../process/invoice.process.php",
            data: sendData+"&type=edit",
            success: function(response) {
                setButtonSubmit(true);  
                if (response == 'success') { 
                    $("#divAdd").html(successEdit);
                }else{
                    console.log(response);
                    $("#divAdd").html(gagalEdit);
                }

                setTimeout(function() {
                    $("#modalAdd").modal("hide"); 
                }, 500);
                filter(); 
            },
            error: function(err) {
                setButtonSubmit(true);  
                console.log(err);
            }
        });
    });
 </script>

 <script type="text/javascript">
    obj = JSON.parse('<?= json_encode($items); ?>'); 
    obj.forEach((val) => {
        console.log(val);
        addRow(val);
    });

 </script>

 

<script type="text/javascript">
    // openFormDetail
    function deleteConfirmation(){ 
        $('#detailData').css('display', 'none'); 
        $('#confirmation').css('display', 'block'); 
    }

    function deleteConfirmationCancel(){ 
        $('#detailData').css('display', 'block'); 
        $('#confirmation').css('display', 'none');  
    }
    async function deleteData(){ 
        await  $.ajax({
            type: "POST",
            dataType: "html",
            url: "../process/invoice.process.php",
            data: {
                type: 'delete',
                id: '<?= $details->id; ?>' 
            },
            success: function(data){
                 $("#divAdd").html(successDelete);
                    setTimeout(function() {
                        filter();
                        $("#modalAdd").modal("hide"); 
                    }, 500);
            },
            error: function(err) {
                console.log(err)
            }
        });
    }
</script>