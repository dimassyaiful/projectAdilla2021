<?php

class CurencyLang
{
    static function toEnglish($number)
    {
        if($number <= 0){
          return " - ";
        }

        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            1000000             => 'million',
            1000000000          => 'billion',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . self::toEnglish(abs($number));
        }

        $string = $fraction = null;
        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string    = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . self::toEnglish($remainder);
                }
                break;
            default:
                $baseUnit     = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder    = $number % $baseUnit;
                $string       = self::toEnglish($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= self::toEnglish($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return ucwords($string." Rupiah ");
    }
  }
function penyebut($nilai) {
  $nilai = abs($nilai);
  $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  $temp = "";
  if ($nilai < 12) {
    $temp = " ". $huruf[$nilai];
  } else if ($nilai <20) {
    $temp = penyebut($nilai - 10). " belas";
  } else if ($nilai < 100) {
    $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
  } else if ($nilai < 200) {
    $temp = " seratus" . penyebut($nilai - 100);
  } else if ($nilai < 1000) {
    $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
  } else if ($nilai < 2000) {
    $temp = " seribu" . penyebut($nilai - 1000);
  } else if ($nilai < 1000000) {
    $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
  } else if ($nilai < 1000000000) {
    $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
  } else if ($nilai < 1000000000000) {
    $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
  } else if ($nilai < 1000000000000000) {
    $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
  }     
  return $temp;
}
function terbilang($nilai) {
  if($nilai<=0) {
    $hasil = " - ";
  } else {
    $hasil = trim(penyebut($nilai))." Rupiah";
  }     		
  return $hasil;
}
 

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
                <b><u> INVOICE </u></b>
                <br>
                <br>
              </td>
            </tr>
            <tr>
              <td width="75%" rowspan="3" style="vertical-align: text-top">BIL TO : '.$res->fromto.'</td>
              <td>INV</td>
              <td>: ' . $res->id . '</td>
            </tr>
            <tr>
              <td>DATE</td>
              <td>: ' . $new_date . '</td>
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
                  <td style="font-weight: bold">'.$type.'</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>';
            $no = 1;
            $totalQty = 0;
            $totalValue = 0;
            $totalValueIdr = 0;
            while ($result = $statement->fetchObject()):
              
                $totalQty = $totalQty+$result->qty ;
                $totalValue = $totalValue+$result->value;
                $totalValueIdr = $totalValueIdr+$result->valueIdr;

                $html .= '
	                <tr>
	                    <td>' . $no++ . '</td>
	                    <td>' . $result->vesselName . '</td>
	                    <td style="text-align: right; padding-right: 20px;">' . number_format($result->qty) . '</td>
	                    <td style="text-align: right; padding-right: 20px;">'.$result->valuta . ' '.number_format($result->value , 2) . '</td>
	                    <td style="text-align: right; padding-right: 20px;"> IDR ' . number_format($result->valueIdr  , 2). '</td>
	                </tr>
	                ';
            endwhile;
            
            $terbilang = terbilang($totalValueIdr);
            $say =  CurencyLang::toEnglish($totalValueIdr) ;

            $html .= ' 
                <tr> 
                <td colspan=2 style="font-weight: bold; text-align:right; padding-right: 20px;">TOTAL</td>
                <td style="text-align: right;font-weight: bold; padding-right: 20px;">'.number_format($totalQty).'</td>
                <td style="text-align: right;font-weight: bold; padding-right: 20px;">  </td>
                <td style="text-align: right;font-weight: bold; padding-right: 20px;">IDR '.number_format($totalValueIdr  , 2).'</td>
              </tr> 
              </table> 

              
            <br>
            <br> 
            <table width="100%">
            <tr>
            <td>
            
            <div style="background-color: #ffd3ba; font-weight: bold; border:2px solid black; width:97%; padding:10px;">  
            
            Say : '.$say.'<br>
            Terbilang : '.ucwords($terbilang).'
            </div>
            
            </td>
            </tr> 
            </table> 

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

            <script type="text/javascript">
              window.print();
              setTimeout(window.close, 500);
            </script>
          ';

             
            echo $html;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }
}

