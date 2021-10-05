<?php

include '../class/Invoice.class.php';
$invoices = new Invoice();
$datas = $invoices->getDataInvoice($_POST['startDate'], $_POST['endDate']);  
foreach ($datas as $data): 
    ?>
        <tr>
            <td><a class="btn btn-primary" style="cursor: pointer;" onclick="detailData('<?=$data->id;?>','<?=$data->type;?>')">
                    <?=$data->id;?></a>
            </td>
            <td><?=$data->date;?></td>
            <td><?=$data->fromto;?></td>
            <td><?=$data->type;?></td>
            <td><a  target="_blank" href="../process/print-invoices.php?id=<?=$data->id;?>" class="btn btn-warning">Print</a></td>
        </tr>
	 <?php endforeach; ?>
             