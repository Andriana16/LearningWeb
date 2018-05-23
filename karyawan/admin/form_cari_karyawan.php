<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type='text/javascript'>$(document).ready(function() {
        //$("#search_results").slideUp();
        $("#button_find").click(function(event) {
            event.preventDefault();
            //search_ajax_way();
            ajax_search();
        });
        $("#search_query").keyup(function(event) {
            event.preventDefault();
            //search_ajax_way();
            ajax_search();
        });
    });
    function ajax_search() {

        var nama = $("#search_query").val();
        $.ajax({
            url : "proses_cari_karyawan.php",
            data : "nama=" + nama,
            success : function(data) {
                // jika data sukses diambil dari server, tampilkan di <select id=kota>
                $("#display_results").html(data);
            }
        });

    }</script>
<div>
    <form class="form-search">
        <div class="input-group">
          <input type="text"  name="search_query" id="search_query" class="form-control" placeholder=" Nama karyawan yang dicari? ex: 'Susi'">
          <span class="input-group-addon">
                <i class='glyphicon glyphicon-search' ></i>
          </span>
        </div>        
    </form>
</div>
<div id="display_results"  ></div>
</body>
</html> 
