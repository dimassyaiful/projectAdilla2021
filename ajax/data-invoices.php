<div class="card shadow">
    <div class="card-header bg-primary">
        <div class="card-title">Data Invoices</div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Invoice Number</th>
                        <th>Date OF PIB</th>
                        <th>Doc No.</th>
                        <th>Doc Type</th>
                        <th>No Pengajuan Dokumen</th>
                        <th>BL No</th>
                        <th>Vessel Name</th>
                        <?=$_POST['typeInsert'] == 'Import' ? '<th>Shipper</th>' : '<th>consignee</th>'?>
                        <th>Remark</th>
                        <th>QTY</th>
                        <th>Valuta</th>
                        <th>Value</th>
                        <th>Value IDR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
foreach ($datas as $data):
?>
                        <tr>
                            <td><?=$data->idInvoices;?></td>
                            <td><?=$data->dateOfPib;?></td>
                            <td><?=$data->docNo;?></td>
                            <td><?=$data->docType;?></td>
                            <td><?=$data->noPengajuanDokumen;?></td>
                            <td> <?=$data->blNo?></td>
                            <td><?=$data->vesselName;?></td>
                            <?=$_POST['typeInsert'] == 'Import' ? "<td>$data->shipper</td>" : "<td>$data->consignee</td>"?>
                            <td><?=$data->remark;?></td>
                            <td><?=number_format($data->qty,0,",",".");?></td>
                            <td><?=$data->valuta;?></td>
                            <td><?=number_format($data->value, 2,",",".");?></td>
                            <td>Rp. <?=number_format($data->valueIdr, 2,",",".");?></td>
                        </tr>
                    <?php
endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>