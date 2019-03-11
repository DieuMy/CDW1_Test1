$(document).ready(function () {
    $('#btn-search').on('click',function (e) {
        e.preventDefault()
        var from = $('#from option:selected').val();
        var to = $('#to option:selected').val();
        var departure = $('#departure').val()
        var way_type = $("input[name='flight_type']:checked").val();
        var return_day = $('#date_return').val();
        var flight_class = $('#flight-class option:selected').val();
        var total_person = $('#total-person option:selected').val();
        console.log(`${from} ${to} ${departure} ${way_type} ${return_day} ${flight_class} ${total_person} `);
        if(way_type == "one-way")
        {
            if (from && to && departure && way_type && flight_class && total_person)
            {
                if (from == to)
                {
                    swal("Cảnh báo", "Nơi đi không được trùng nơi đến", "error");
                }
                else
                {
                // console.log('ok')
                // window.location.replace('/flight-list');
                    $('#search').submit()
                }
            }else
                {
                    swal("Thiếu thông tin", "Vui lòng nhập đủ thông tin", "error");
                }
        }else
        {
            if (from && to && departure && return_day && way_type && flight_class && total_person)
            {
                if (from == to)
                {
                    swal("Cảnh báo", "Nơi đi không được trùng nơi đến", "error");
                }
                else
                {
                // console.log('ok')
                // window.location.replace('/flight-list');
                    $('#search').submit()
                }
            }else
            {
                swal("Thiếu thông tin", "Vui lòng nhập đủ thông tin", "error");
            }
        }
    })
})