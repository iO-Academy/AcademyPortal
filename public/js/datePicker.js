$(function() {
    $('input[name="daterange"]').daterangepicker({
        opens: 'right'
    }, function(start, end, label) {
        filterByDate(start, end)
    })
})