$(window).load(function() {

    $('.alert').addClass('row');



    $('.hover-div i.fa').on('click', function(event) {
        event.preventDefault();
        var dd = $(this).parent('.hover-div').find('.submenu');
        $('.hover-div').find('.submenu').removeClass('show');
        dd.toggleClass('show');
    });

    $('.nav-toggle').on('click', function(event) {
    	event.preventDefault();
    	$('.sidenav').toggleClass('show');
    	$('.page-wrap').toggleClass('show');
    	$('header').toggleClass('show');

    });

    $('#country').attr('autocomplete', 'off');


});