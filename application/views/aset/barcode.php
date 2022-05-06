<div class="card" style=" width: 21rem;" id="printableArea">
    <div class="card-body p-3">

        <img src="<?= base_url('assets/images/logogisaka.png')  ?>" alt="..." class="" style="height: 37px; transform: rotate(270deg); position: relative; right: 40px; top:-35">
        <img src="<?= base_url('aset/set_barcode/') . $code ?>" alt="..." class="" style="position: relative; right: 80px;">
    </div>
</div>
<br>
<button class="btn btn-default mt-5" onclick="printDiv('printableArea')" id="btn"><i class="fa fa-print" aria-hidden="true" style="margin-top:20;    font-size: 17px;"> Print</i></button>

<script>
    function printDiv(divName) {
        var x = document.getElementById("btn");
        x.style.display = "none";
        window.print();

    }
</script>