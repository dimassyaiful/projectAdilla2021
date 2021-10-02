<div class="card shadow">
    <div class="card-header bg-primary">
        <div class="card-title">Data <?= $data['type']; ?></div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="invoiceId">Invoice ID</label>
                    <input type="text" value="<?= $data['id']; ?>" name="invoiceId" id="invoiceId" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="typeInvoices">type</label>
                    <input type="text" name="typeInvoices" id="typeInvoices" value="<?= $data['type']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="dateOfPib">Date Of PIB</label>
                    <input type="date" name="dateOfPib" id="dateOfPib" class="form-control">
                </div>
                <div class="form-group">
                    <label for="docNo">Doc No.</label>
                    <input type="text" name="docNo" id="docNo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="docType">Doc Type</label>
                    <input type="text" name="docType" id="docType" class="form-control">
                </div>
                <div class="form-group">
                    <label for="noPengajuanDokumen">No Pengajuan Dokumen</label>
                    <input type="text" name="noPengajuanDokumen" id="noPengajuanDokumen" class="form-control">
                </div>
                <div class="form-group">
                    <label for="qty">QTY</label>
                    <input type="number" name="qty" id="qty" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="blNo">BL No</label>
                    <input type="text" name="blNo" id="blNo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="vesselName">Vessel Name</label>
                    <input type="text" name="vesselName" id="vesselName" class="form-control">
                </div>
                <?php
                if ($data['type'] == 'Import') :
                ?>
                    <div class="form-group">
                        <label for="shipper">Shipper</label>
                        <input type="text" name="shipper" id="shipper" class="form-control">
                    </div>
                <?php
                else :
                ?>
                    <div class="form-group">
                        <label for="consignee">Consignee</label>
                        <input type="text" name="consignee" id="consignee" class="form-control">
                    </div>
                <?php
                endif;
                ?>
                <div class="form-group">
                    <label for="remark">Remark</label>
                    <input type="text" name="remark" id="remark" class="form-control">
                </div>
                <div class="form-group">
                    <label for="valuta">Valuta</label>
                    <input type="text" class="form-control" id="valuta" name="valuta">
                </div>
                <div class="form-group">
                    <label for="value">Value</label>
                    <input type="number" name="value" id="value" class="form-control">
                </div>
                <div class="form-group">
                    <label for="valueIdr">Value IDR</label>
                    <input type="number" name="valueIdr" id="valueIdr" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <center>
                    <a class="btn btn-primary" style="cursor: pointer;" onclick="AddData()">Add <?= $data['type']; ?></a>
                </center>
            </div>
        </div>
    </div>
</div>