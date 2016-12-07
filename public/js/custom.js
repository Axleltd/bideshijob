$(window).load(function() {

    wow = new WOW();
    wow.init();

    // $('.particle-div').particleground({
    //     dotColor: '#fff',
    //     lineColor: 'transparent',
    //     lineWidth: 0,
    //     particleRadius: 3,
    //     maxSpeedX: 0.05,
    //     maxSpeedY: 0.05
    // });

    $('ul.lang').one('click', function(event) {
        event.preventDefault();
        $(this).addClass('show');

    });
    
    $('.modal').modal();

    // $('.page-head h1 span').textillate(
    //     { in: {
    //         effect: 'flipInX',
    //         delay: 100
    //     } }
    // );

    // $('.page-inside .banner').


});