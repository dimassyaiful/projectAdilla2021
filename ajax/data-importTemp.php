<div class="table-responsive">
    <table id="tableImportTemp" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
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
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datas as $data) :
            ?>
                <tr>
                    <td><?= $data->dateOfPib; ?></td>
                    <td><?= $data->docNo; ?></td>
                    <td><?= $data->docType; ?></td>
                    <td><?= $data->noPengajuanDokumen; ?></td>
                    <td><?= $data->blNo; ?></td>
                    <td><?= $data->vesselName; ?></td>
                    <td><?= $data->shipper; ?></td>
                    <td><?= $data->remark; ?></td>
                    <td><?= $data->qty; ?></td>
                    <td><?= $data->valuta; ?></td>
                    <td><?= $data->value; ?></td>
                    <td><?= $data->valueIdr; ?></td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>
<div class="form-group">
<label for="fromto">From To</label>
<input type="text" name="fromto" id="fromto" class="form-control">
</div>
<center>
    <a class="btn btn-primary" onclick="saveImport()">Save</a>
</center>