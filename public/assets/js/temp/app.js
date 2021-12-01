$('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('data-target');
    // console.log(url);
    var bookName = $(this).attr('data-whatever');
    swal({
        title: 'Are you sure?',
        text: bookName.concat(' will be permanantly deleted!'),
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
