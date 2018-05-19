$(function () {
    $('#signup-form').on('submit', function (e) {
        $('#signup-email-error').hide();
        $('#signup-password-error').hide();

        e.preventDefault();

            if ($('#signup-password').val().length <= 10) {
                $('#signup-password-error').fadeIn(300).show();
                return;
            }

            $.ajax({
                type: 'post',
                url: 'signUpValidator',
                dataType: 'json',
                data: {
                    email: $('#signup-email').val(),
                    password: $('#signup-password').val()
                },
                success: function (response) {
                    if (response.email === false) {
                        $('#signup-email-error').fadeIn(300).show();
                        // $('#signup-email').val('');
                        $('#signup-password').val('');
                    } else {
                        $('#login-form').submit();
                    }
                }
            });
        }
    );
});
