<script>

var formatter = new Intl.NumberFormat("en-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 0 });
$(document).ready(function () {

    //format ribuan untuk qty
    var tmp_qty = document.getElementById('qty_tmp');
    tmp_qty.addEventListener('keyup', function (e) {
        let value = tmp_qty.value.replace(/[.]/gi, '');
        let formatValue = formatter.format(value).replace(/[IDR]/gi, '').replace(/(\.+\d{2})/, '').trimLeft();
        let showValue = formatValue.replace(/[,]/gi, '.');
        // if(isNaN(showValue)){
        //     showValue=0;
        // }
        $("#qty").val(value);
        $("#qty_tmp").val(showValue);
        hitungValueInIdr();
    });

    //format ribuan untuk value
    var tmp_value = document.getElementById('value_tmp');
    tmp_value.addEventListener('keyup', function (e) {
        console.clear();

        //hapus titik dan ubah koma menjadi titik
        let value = tmp_value.value.replace(/[.]/gi, '').replace(/[,]/gi, '.');
        if (isNaN(value)) {
            value = 0;
        }

        //cek apakah ada desimal
        let decimalExists = tmp_value.value.search(",") > 0 ? true : false;

        let arr = value.split(".");
        let formatValue = formatter.format(arr[0]).replace(/[IDR]/gi, '');
        let formatValue2 = formatValue.replace(/[,]/gi, '.');



        let decimal = arr[1] ? arr[1].substring(0, 2) : "";
        let Value = arr[0] + (decimalExists === true ? "." + decimal : "");
        let finalValue = formatValue2 + (decimalExists === true ? "," + decimal : ""); 
        $("#value").val(Value.trimStart());
        $("#value_tmp").val(finalValue.trimStart());
        hitungValueInIdr();
    });

});




//fungsi untuk menghitung value in IDR
function hitungValueInIdr() {
    let value = $("#value").val();
    let qty = $("#qty").val();
    let total = qty * value;
    let finalTotal = total.toFixed(2);

    let arr = finalTotal.split(".");
    console.log(arr)
    let formatValue = formatter.format(arr[0]).replace(/[IDR]/gi, '');
    let formatValue2 = formatValue.replace(/[,]/gi, '.');
    let finalValue = formatValue2 + (arr[1] ? "," + arr[1] : "");

    $("#valueIdr").val(finalTotal);
    $("#valueIdr_tmp").val("Rp. " + finalValue);
}

</script>
