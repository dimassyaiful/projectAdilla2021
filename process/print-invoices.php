<?php

if (isset($_GET)) {
    if ($_GET['id'] != '' || $_GET['id'] != null) {
        require '../plugins/html2pdf/autoload.php';
        $id = $_GET['id'];
        $host = "localhost";
        $username = "root";
        $password = "";
        $db = "aldilla";
        try {
            $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM tbl_invoices WHERE id = '" . $id . "'";
            $statement = $conn->prepare($sql);
            if (!$statement->execute()) {
                die('Something Wrong');
            }

            $res = $statement->fetchObject();
            $type = $res->type;

            $old_date = $res->date;
            $old_date_timestamp = strtotime($old_date);
            $new_date = date('d F Y', $old_date_timestamp);

            if ($type == 'Import') {
                $sql = "SELECT * FROM `tbl_import` WHERE idInvoices = '" . $id . "'";
            } elseif ($type == 'Export') {
                $sql = "SELECT * FROM `tbl_export` WHERE idInvoices = '" . $id . "'";
            }
            $statement = $conn->prepare($sql);
            if (!$statement->execute()) {
                die('something wrong');
            }

            $html = '<table width="100%">
            <tr>
              <td colspan="3" style="text-align: center">
                <b><u>' . $res->fromto . '</u></b>
              </td>
            </tr>
            <tr>
              <td width="75%" rowspan="3" style="vertical-align: text-top">BIL TO :</td>
              <td>INV</td>
              <td>: ' . $id . '</td>
            </tr>
            <tr>
              <td>DATE</td>
              <td>: ' . $new_date . '</td>
            </tr>
            <tr>
              <td>TERMS</td>
              <td>: 60 DAYS</td>
            </tr>
            <tr>
              <table border="1" style="border-collapse: collapse" width="100%">
                <tr>
                  <th>No</th>
                  <th>Description</th>
                  <th>QTY</th>
                  <th>Unit Price</th>
                  <th>Amount (IDR)</th>
                </tr>
                <tr>
                  <td></td>
                  <td style="font-weight: bold">Import</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>';
            $no = 1;
            while ($result = $statement->fetchObject()):
                $html .= '
	                <tr>
	                    <td>' . $no++ . '</td>
	                    <td>' . $result->vesselName . '</td>
	                    <td style="text-align: center">' . $result->qty . '</td>
	                    <td style="text-align: center">' . $result->value . '</td>
	                    <td style="text-align: center">' . $result->valueIdr . '</td>
	                </tr>
	                ';
            endwhile;
            $html .= '
              </table>
            </tr>
            <table width="100%" style="margin-top: 50px">
              <tr>
                <td style="text-align:left">PAYMENT TO BENEFICIARY BELLOW:</td>
                <td style="text-align:center">PT. BATAM SELALU BERSATU</td>
              </tr>
              <tr>
                <td style="text-align:left">PT. BATAM SELALU BERSATU</td>
                <td style="text-align:center"></td>
              </tr>
              <tr>
                <td style="text-align:left">BANK BII - 034 BATAM BRANCH</td>
                <td style="text-align:center"></td>
              </tr>
              <tr>
                <td style="text-align:left">Swift Code: IBBK IDJA</td>
                <td style="text-align:center"></td>
              </tr>
              <tr>
                <td style="text-align:left"><b>A/C : 0234256617</b></td>
                <td style="text-align:center">Abul Hadi</td>
              </tr>
              <tr>
                <td style="text-align:left"><b>Account IDR</b></td>
                <td style="text-align:center">Direktur</td>
              </tr>
            </table>
          ';
            echo $html;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }
}
