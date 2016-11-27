$(window).load(function() {

    $('.alert').addClass('row');



    $('.hover-div i.fa').on('click', function(event) {
        event.preventDefault();
        var dd = $(this).parent('.hover-div').find('.submenu');
        $('.submenu').toggleClass('show');
        dd.toggleClass('show');
    });

});