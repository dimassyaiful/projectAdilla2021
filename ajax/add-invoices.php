<div class="card shadow">
    <div class="card-header bg-primary">
        <div class="card-title">Data <?=$data['type'];?></div>
    </div>

    <form id="formz">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="labelRequired"  for="invoiceId">Invoice ID</label>
                    <input type="text" value="<?=$data['id'];?>" name="invoiceId" id="invoiceId" class="form-control" required readonly>
                </div>
                <div class="form-group">
                    <label class="labelRequired"  for="typeInvoices">type</label>
                    <input type="text" name="typeInvoices" id="typeInvoices" value="<?=$data['type'];?>" class="form-control" required readonly>
                </div>
                <div class="form-group">
                    <label class="labelRequired"  for="dateOfPib">Date Of PIB</label>
                    <input type="date" name="dateOfPib" id="dateOfPib" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="labelRequired"  for="docNo">Doc No.</label>
                    <input type="text" name="docNo" id="docNo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="labelRequired"  for="docType">Doc Type</label>
                    <input type="text" name="docType" id="docType" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="labelRequired"  for="noPengajuanDokumen">No Pengajuan Dokumen</label>
                    <input type="text" name="noPengajuanDokumen" id="noPengajuanDokumen" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="labelRequired" for="qty">QTY</label>
                    <input maxlength="14" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="qty_tmp" id="qty_tmp" class="form-control" required>
                    <input style="display:none" type="text" name="qty" id="qty" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="labelRequired"  for="blNo">BL No</label>
                    <input type="text" name="blNo" id="blNo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="labelRequired"  for="vesselName">Vessel Name</label>
                    <input type="text" name="vesselName" id="vesselName" class="form-control" required>
                </div>
                <?php
if ($data['type'] == 'Import'):
?>
                    <div class="form-group">
                        <label class="labelRequired"  for="shipper">Shipper</label>
                        <input type="text" name="shipper" id="shipper" class="form-control" required>
                    </div>
                <?php
else:
?>
                    <div class="form-group">
                        <label class="labelRequired"  for="consignee">Consignee</label>
                        <input type="text" name="consignee" id="consignee" class="form-control" required>
                    </div>
                <?php
endif;
?>
                <div class="form-group">
                    <label class="labelRequired"  for="remark">Remark</label>
                    <input type="text" name="remark" id="remark" class="form-control" required>
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
                    <button type="submit" class="btn btn-primary" style="cursor: pointer;"  >Add <?=$data['type'];?></button>
                </center>
            </div>
        </div>
    </div>
    </form>
</div>

<script>
        $("#formz").on('submit', function(e){
            e.preventDefault();
            AddData();
        });
</script>


<?php
include '../dist/customscript.php';
?>