$(function () {
    $('#signup-submit').on('click', function (e) {
            console.log('click');
            let passwordField = $('#signup-password');
            let passwordError = $('#signup-password-error');

            $('#signup-email-error').hide();
            passwordError.hide();
            if (passwordField.val().length <= 10) {
                passwordError.fadeIn(300).show();
                return;
            }

            $.ajax({
                type: 'post',
                url: 'signUpValidator',
                dataType: 'json',
                data: {
                    email: $('#signup-email').val(),
                    password: passwordField.val()
                },
                success: function (response) {
                    console.log(response);
                    if (response.email === false) {
                        console.log(response);
                        $('#signup-password').val('');
                        $('#signup-email-error').fadeIn(300).show();
                    } else if (passwordField.val().length <= 10) {
                        passwordError.fadeIn(300).show();
                    } else {
                        $(".signup-modal").classList.toggle("show-modal");
                        $('#signup-form').submit();
                    }
                },
                error: function (response){
                    console.log('fail');
                }
            });
        }
    );
});
