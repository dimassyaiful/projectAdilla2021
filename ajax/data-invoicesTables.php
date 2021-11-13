<?php

include '../class/Invoice.class.php';
$invoices = new Invoice();
$datas = $invoices->getDataInvoice($_POST['startDate'], $_POST['endDate']);  
foreach ($datas as $data): 
    ?>
        <tr>
            <td><?=$data->id;?> </td>
            <td><?=$data->date;?></td>
            <td><?=$data->fromto;?></td> 
            <td>
                <button onclick="openFormDetail('<?= $data->id; ?>')" class="btn btn-success"> 
                    <i class="fa fa-search fa-fw"></i>
                    Detail</button>
            </td>
        </tr>
	 <?php endforeach; ?>
             