<?php

include '../class/Dashboard.class.php';

$chart = new Dashboard();

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'import') {
        $data = $chart->GetDataChartImport();
        echo json_encode($data);
    } elseif ($_POST['type'] == 'export') {
        $data = $chart->GetDataChartExport();
        echo json_encode($data);
    }
}
