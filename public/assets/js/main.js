
<!-- Show Image -->

    $(document).ready(function(){
        $(".image-popup").click(function(e) {
            e.preventDefault();
            var imgSrc = $(this).find('img').attr('src');
            var popup = '<div class="image-popup-overlay"><img src="' + imgSrc + '"></div>';
            $("body").append(popup);
            $(".image-popup-overlay").fadeIn();
        });

        $(document).on('click', '.image-popup-overlay', function() {
            $(this).fadeOut(100, function() {
                $(this).remove();
            });
        });
    });

    function showConfirmation(message, form) {
        swal({
            title: message,
            icon: "warning",
            buttons: {
                cancel: {
                    text: "Cancel",
                    value: false,
                    visible: true,
                    className: "",
                    closeModal: true,
                },
                confirm: {
                    text: "Yes",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: false
                }
            },
            dangerMode: true,
            buttonsStyling: false,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    }
