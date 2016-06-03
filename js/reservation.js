jQuery(function($){

    Date.prototype.yyyymmdd = function() {
        var yyyy = this.getFullYear().toString();
        var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
        var dd  = this.getDate().toString();
        return yyyy + (mm[1]?mm:"0"+mm[0]) + (dd[1]?dd:"0"+dd[0]); // padding
    };

    d = new Date();
    var $now = d.yyyymmdd();

        $('.book').popover({
            html: true,
            placement: 'left'
        });
        $('.book')
            .mouseenter(function(){
                $(this).popover('show');
            })
            .mouseleave(function(){
                $(this).popover('hide');
            });
        var $book = $('.book[date="'+$now+'"]:eq(0)');
        if ( $book.length ) {
            $book.popover('show');
            $('.calendar').bind('mouseenter', on_calendar_mouseenter);
            function on_calendar_mouseenter() {
                $book.popover('hide');
                console.log('mouseenter: calendar');
                $('.calendar').unbind('mouseenter', on_calendar_mouseenter);
            }
        }

});