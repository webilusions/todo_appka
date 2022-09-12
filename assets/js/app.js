(function ($) {

   // console.log("Hello !");

    /**
     *
     * INSERT FORMULAR
     */

    var form = $('#add-form'),
        list = $('#item-list'),
        input = form.find('#text');

    input.val('').focus();
    $('.submit-button').hide();

    /**
     *
     * SETTINGS
     * */

    var animation = {
        startColor: '#bcb603',
        endColor:  list.find('li').css('backgroundColor') || '#222',
        delay: 200
    }



    form.on('submit', function (event) {
        event.preventDefault();

        var req = $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            dataType: 'json'
        });

        req.done(function (data) {
          //  console.log(data);
          //  console.log(data.status);
          //  console.log(data.id);

            if ( data === 'success' ){
                $.ajax({ url: baseURL }).done(function (html) {
                  var newItem = $(html).find('li:last-child');
                  //  var newItem = $(html).find('#item-' + data.id);

                  newItem.appendTo(list)
                    // .fadeIn();
                      .css({backgroundColor: animation.startColor})
                      .delay(animation.delay)
                      .animate({backgroundColor: animation.endColor});

                  input.val('').focus();

                });
            }
        });
    });


    input.on('keypress', function (event) {
        if (event.which === 13){
            form.submit();

            return false;
        }

    });


    /**
     *
     * EDIT FORMULAR
     */
    $('#edit-form').find('#text').select();   // označí text v poli text



    /**
     *
     * delete FORMULAR
     */
    $('#delete-form').on('submit', function (event) {   //potvrdzovací dialóg
        return confirm('Naozaj to chcete vymazat ?');

    });

}(jQuery));