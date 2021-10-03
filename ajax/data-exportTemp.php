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
                <th>Consignee</th>
                <th>remark</th>
                <th>Qty</th>
                <th>Valuta</th>
                <th>Value</th>
                <th>Value in IDR</th>
            </tr>
        </thead>
        <tbody>
            <?php
foreach ($datas as $data):
?>
                <tr>
                    <td><?=$data->dateOfPib;?></td>
                    <td><?=$data->docNo;?></td>
                    <td><?=$data->docType;?></td>
                    <td><?=$data->noPengajuanDokumen;?></td>
                    <td><?=$data->blNo;?></td>
                    <td><?=$data->vesselName;?></td>
                    <td><?=$data->consignee;?></td>
                    <td><?=$data->remark;?></td>
                    <td><?=number_format($data->qty);?></td>
                    <td><?=$data->valuta;?></td>
                    <td><?=number_format($data->value, 2);?></td>
                    <td>Rp. <?=number_format($data->valueIdr, 2);?></td>
                </tr>
            <?php
endforeach;
?>
        </tbody>
    </table>
</div>
