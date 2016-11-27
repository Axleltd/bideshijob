$(window).load(function() {

    $('.alert').addClass('row');



    $('.hover-div i.fa').on('click', function(event) {
        event.preventDefault();
        var dd = $(this).parent('.hover-div').find('.submenu');
        dd.toggleClass('show');
    });

});