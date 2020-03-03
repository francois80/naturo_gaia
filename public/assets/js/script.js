$(function () {
    $('#emailRegister').on('blur', function () {
        var email = $(this);

        if (email.val().length !== 0) {
            $.post("register.php", {checkmail: true, email: email.val()}, function (response) {
                if (response === 'ok') {
                    email.attr('class', 'form-control is-valid');
                    email.parent().find('.invalid-feedback').text('');
                } else {
                    email.attr('class', 'form-control is-invalid');
                    email.parent().find('.invalid-feedback').text('un compte existe pour cette adresse mail !');
                }
            });
        }
    });
});