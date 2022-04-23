<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<div class="row col-12">
    <div class="col-3">
        <table class="table">
            <thead>
                <tr>
                    <td>Mobil</td>
                </tr>
            </thead>
            <tbody id="tableDataMobil"></tbody>
        </table>
    </div>
    <div class="col-3">
        <table class="table">
            <thead>
                <tr>
                    <td>Motor</td>
                </tr>
            </thead>
            <tbody id="tableDataMotor"></tbody>
        </table>
    </div>
</div>

<div class="row col-12">
    <div class="col-12">
        <label for="inputSearch">Search Data</label>
        <input id="inputSearch" type="text"> <button onclick="searchData()">Search</button>
        <div class="row col-12">
            <div id="divResult"></div>
        </div>
    </div>
</div>

<script>
    var data = <?= json_encode($results)?>;

    var tableStringMobil = "";
    var tableStringMotor = "";
    data.forEach(function(item, index){
        if ( item.vehicle_type == 1 ) {
            tableStringMobil += "\
                <tr>\
                    <td>"+item.name+"</td>\
                </tr>\
            ";
        } else {
            tableStringMotor += "\
                <tr>\
                    <td>"+item.name+"</td>\
                </tr>\
            ";
        }
    });
    $('#tableDataMobil').html(tableStringMobil);
    $('#tableDataMotor').html(tableStringMotor);

    function searchData(){
        var formData = new FormData();
        formData.append('data', $('#inputSearch').val());
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url : "{{ route('search')}}",
            type: "POST",
            data : formData,
            contentType: false,
            processData: false,
            dataType : "JSON",
            success: function (result) {
                var str = "";
                var flag = true;
                result.forEach(function(item, index){
                    if ( flag ) {
                        str += item.name;
                        flag = false;
                    } else {
                        str += ", " + item.name;
                    }
                });
                $('#divResult').text(str);
            }
        });
    }
</script>