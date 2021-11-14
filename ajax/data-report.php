<?php

include '../class/Report.class.php'; 
$report = new Report(); 
$datas = $report->getData($_POST['startDate'], $_POST['endDate']);
$total = 0;
foreach ($datas as $data):
    $total = $total + $data->valueIdr;
    ?>
        <tr>
            <td><?=$data->id;?></td>
            <td><?=ucfirst($data->type);?></td>
            <td><?=$data->dateOfPib;?></td>
            <td><?=$data->docNo;?></td>
            <td><?=$data->docType;?></td>
            <td><?=$data->noPengajuanDokumen;?></td>
            <td><?=$data->blNo;?></td>
            <td><?=$data->vesselName;?></td>
            <td><?=$data->shipper;?></td>
            <td><?=$data->remark;?></td> 
            <td><?=$data->valuta;?></td>
            <td><?=number_format($data->kurs, 2,",",".");?> </td>
            <td><?=number_format($data->value, 2,",",".");?> </td>
            <td>Rp. <?=number_format($data->valueIdr, 2,",",".");?></td>
        </tr>
	 <?php endforeach; ?>
            
<script>

$(".totalValue").html("Rp. <?=number_format($total, 2);?>") 
</script>