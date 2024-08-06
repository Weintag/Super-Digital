let rowsclick;
$('.sortable').on('click', function () {
    $('.arrowsort-show').removeClass('arrowsort-show')
    var arrow = $(this).children().last()
    var rowsname = $(this).attr('id')
    var type = 'ASC'
    arrow.css('transform', 'rotate(0deg)')
    arrow.addClass('arrowsort-show')
    if (rowsclick === rowsname) {
        if ($(this).attr('data-double') === '1') {
            type = 'ASC'
            arrow.css('transform', 'rotate(0deg)')
            $(this).attr('data-double', '')
        } else {
            type = 'DESC'
            arrow.css('transform', 'rotate(180deg)')
            $(this).attr('data-double', '1')
        }
    }
    rowsclick = $(this).attr('id')
    sort(rowsname, type)
})
function sort(rowsname, type) {
    axios.post('/sortprod', {
        rowsname: rowsname,
        type: type,
    })
        .then(function (response) {
          $('#myTable').html(response.data)
        })
        .catch(function (error) {
            console.log(error)
        });
};