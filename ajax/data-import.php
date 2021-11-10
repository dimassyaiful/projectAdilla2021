<?php

include '../class/Import.class.php';
$imports = new Import();
$datas = $imports->getDataImport($_POST['startDate'], $_POST['endDate']);
$total = 0;
foreach ($datas as $data):
    $total = $total + $data->valueIdr;
    ?>
        <tr> 
            <td><?=$data->id;?></td>
            <td><?=$data->fromto;?></td>
            <td><?=$data->dateOfPib;?></td>
            <td><?=$data->docNo;?></td>
            <td><?=$data->docType;?></td>
            <td><?=$data->noPengajuanDokumen;?></td>
            <td><?=$data->blNo;?></td>
            <td><?=$data->vesselName;?></td>
            <td><?=$data->shipper;?></td>
            <td><?=$data->remark;?></td> 
            <td><?=$data->valuta;?></td> 
            <td><?=number_format($data->kurs, 0,",",".");?> </td>
            <td><?=number_format($data->value, 2,",",".");?> </td>
            <td>Rp. <?= number_format($data->valueIdr, 2,",",".");?></td>
            <td>
                <button type="button" onclick="editModal(<?=$data->id;?>)"  class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i> </button>
                <button type="button" onclick="deleteConfirmation(<?=$data->id;?>)" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> </button>
            </td>
        </tr>
	 <?php endforeach; ?>
            
<script>

$(".totalValue").html("Rp. <?=number_format($total, 2);?>") 
</script>