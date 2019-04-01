$(document).ready(function () {
    $('#btnCreate').on('click',function (e) {
        e.preventDefault()
        var from = $('#from option:selected').val();
        var to = $('#to option:selected').val();
        var org = $('#org option:selected').val();
        var departure = $('#departure').val()
        var end = $('#end').val()
        var way_type = $("input[name='flight_type']:checked").val();
        var return_day = $('#date_return').val();
        var total_person = $('#total').val();
        var code = $('#code').val();
        console.log(`${from} ${to} ${org} ${departure} ${way_type} ${end} ${return_day} ${total_person} ${code} `);
            if (from && to && departure && org && end && way_type && return_day && total_person && code)
            {
                if (from == to)
                {
                    swal("Cảnh báo", "Nơi đi không được trùng nơi đến", "error");
                }
                else
                {
                    $('#create').submit()
                }
            }else
                {
                    swal("Thiếu thông tin", "Vui lòng nhập đủ thông tin", "error");
                }
    })
})