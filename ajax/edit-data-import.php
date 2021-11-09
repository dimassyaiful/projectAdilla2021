<?php

include '../class/Import.class.php';
include '../class/Kurs.class.php'; 

$imports = new Import();
$datas = $imports->getDataImportDetails($_POST['id']); 
$data = $datas;
  
$kurs = new Kurs();
$dataKurs = $kurs->getData();
function dropdownSelected($val1,$val2){
    if($val1 == $val2){
        return "selected";
    }
}

$kursPrice = 0;
$kursPriceDecimal = 0;
$valueIdr = 0;
$value = 0;
function dropdownKursSelected($val1,$val2,$value,$valueIdr){
    if($val1 == $val2){ 
        return true;
    }
    return false;
}
    ?>
    
    <div class="row">
        <div class="col-md-12"> 
            <div class="form-group">
                <label class="labelRequired" for="dateOfPib">ID</label> 
                <input readonly="" value="<?=$data->id;?>"  name="id" class=" form-control" readonly required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="labelRequired" for="dateOfPib">Date of Pib</label>
                <input value="<?=$data->dateOfPib;?>" type="date" name="dateOfPib" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="labelRequired" for="docNo">Doc No.</label>
                <input value="<?=$data->docNo;?>" type="text" name="docNo"  class="form-control" required>
            </div>
            <div class="form-group">
                <label class="labelRequired" for="docType">Doc Type</label>
                <input type="text" name="docType" value="<?=$data->docType;?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="labelRequired" for="noPengajuanDokumen">No. Pengajuan Dokumen</label>
                <input type="text" name="noPengajuanDokumen" value="<?=$data->noPengajuanDokumen;?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="labelRequired" for="blNo">BL No.</label>
                <input type="text" name="blNo" value="<?=$data->blNo;?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="labelRequired" for="vesselName">Vessel Name</label>
                <input type="text" name="vesselName" value="<?=$data->vesselName;?>" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="labelRequired" for="shipper">Shipper</label>
                <input type="text" name="shipper" value="<?=$data->shipper;?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="labelRequired" for="remark">Remark</label>
                <input type="text" name="remark" value="<?=$data->remark;?>" class="form-control" required>
            </div> 
             <div class="form-group">
                            <label class="labelRequired" for="valuta">Valuta</label>  
                            <select required="" onchange="setValue_(this.value);" class="form-control" name="valuta_" id="valuta_">
                                <option value=""> -- Pilih --</option>
                                <?php foreach ($dataKurs as $key => $val) {
                                    $valuetmp = number_format($val->kurs,0,",",".");
                                ?>
                                    <option <?php  

                                    $checked = dropdownKursSelected($val->kode,$data->valuta,$data->value,$data->valueIdr);
                        if($checked){ 
                            $kursPrice =    (double)$data->valueIdr / (double)$data->value;
                            $kursPriceDecimal = number_format($kursPrice, 0,',','.');
                            echo "selected";
                        }

                                    ?> value="<?= $val->kurs; ?>|||<?= $valuetmp; ?>|||<?= $val->kode; ?>"> <?= $val->kode; ?></option>
                                <?php } ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label class="labelRequired" for="kurs">Kurs</label>
                            <input value="<?= $kursPriceDecimal; ?>" required required readonly="" maxlength="14" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="kurs_tmp" id="kurs_tmp_" class="form-control" >
                            <input  value="<?= $kursPrice; ?>"  style="display:none" type="text" name="kurs" id="kurs_" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label class="labelRequired" for="value">Value</label>
                            <input    onkeypress="return event.charCode == 44 || (event.charCode >= 48 && event.charCode <= 57)"  value="<?=number_format($data->value, 0,',','.');?>" type="text" name="value_tmp_" id="value_tmp_" class="form-control" required>
                            <input style="display:none"  type="text" name="value" value="<?=$data->value;?> "  id="value_" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label class="labelRequired" for="valueIdr">Value in IDR</label>
                            <input value="Rp. <?=number_format($data->valueIdr, 2,',','.');?>" style="background-color: #dcffdb" readonly type="text" name="valueIdr_tmp" id="valueIdr_tmp_" class="form-control" required>
                            <input value="<?= $data->valueIdr; ?>" style="display:none" type="text" value="0" readonly name="valueIdr" id="valueIdr_" class="form-control">
                        </div>
        </div>
    </div> 
      
 
</script>

<script type="text/javascript">
    var selectedKurs = [];
    var valuta_ = "<?= $data->valuta; ?>";
    function setValue_(kursArray){

        selectedKurs = kursArray.split("|||"); 
        console.log(selectedKurs); 
        // arr 0 -> kurs
        // arr 1 -> kurstmp
        valuta_ = selectedKurs[2];
        $("#kurs_").val(selectedKurs[0]);
        $("#kurs_tmp_").val(selectedKurs[1]);
        hitungValueInIdr_();
    }
</script>
    
    <script>

var formatters = new Intl.NumberFormat("en-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 0 });
$(document).ready(function () {

    //format ribuan untuk qty
    // var tmp_qty = document.getElementById('qty_tmp_');
    // tmp_qty.addEventListener('keyup', function (e) {
    //     let value = tmp_qty.value.replace(/[.]/gi, '');
    //     let formatValue = formatters.format(value).replace(/[IDR]/gi, '').replace(/(\.+\d{2})/, '').trimLeft();
    //     let showValue = formatValue.replace(/[,]/gi, '.');
    //     // if(isNaN(showValue)){
    //     //     showValue=0;
    //     // }
    //     $("#qty_").val(value);
    //     $("#qty_tmp_").val(showValue);
    //     hitungValueInIdr_();
    // });

    //format ribuan untuk value
    var tmp_value = document.getElementById('value_tmp_');
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
        let formatValue = formatters.format(arr[0]).replace(/[IDR]/gi, '');
        let formatValue2 = formatValue.replace(/[,]/gi, '.');



        let decimal = arr[1] ? arr[1].substring(0, 2) : "";
        let Value = arr[0] + (decimalExists === true ? "." + decimal : "");
        let finalValue = formatValue2 + (decimalExists === true ? "," + decimal : "");
        $("#value_").val(Value.trimStart());
        $("#value_tmp_").val(finalValue.trimStart());
        hitungValueInIdr_();
    });

});




//fungsi untuk menghitung value in IDR
function hitungValueInIdr_() {
    let value = $("#value_").val();
    let kurs = $("#kurs_").val();
    let total = kurs * value;
    let finalTotal = total.toFixed(2);

    let arr = finalTotal.split("."); 
    let formatValue = formatters.format(arr[0]).replace(/[IDR]/gi, '');
    let formatValue2 = formatValue.replace(/[,]/gi, '.');
    let finalValue = formatValue2 + (arr[1] ? "," + arr[1] : "");

    $("#valueIdr_").val(finalTotal);
    $("#valueIdr_tmp_").val("Rp. " + finalValue);
}

</script>
