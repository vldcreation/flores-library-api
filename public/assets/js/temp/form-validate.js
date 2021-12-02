// btn Spinner
$(function(){
    var btnSpinner = $('button#btn-spinner');
    var preSpinner = $('div.spinner-grow');
    preSpinner.hide();
    btnSpinner.hide();
});

// Form Login validation
$('#login-form').on('submit', function (e) {
    e.preventDefault();
    var btnSubmit = $('button#btn-submit');
    var btnSpinner = $('button#btn-spinner');
    var username =  $('input[name="username"]');
    var password =  $('input[name="password"]');
    btnSubmit.hide();
    btnSpinner.show();
    $(username).on('keyup' , function(){
        $('span.credential-error').text('');
        username.removeClass('is-invalid');
        username.attr('aria-invalid','false');
        $('label.username-error').text('');
    });
    $(password).on('keyup' , function(){
        $('span.credential-error').text('');
        password.removeClass('is-invalid');
        password.attr('aria-invalid','false');
        $('label.password-error').text('');
    });
    $.ajax({
        url: $(this).attr('action'),
        method : $(this).attr('method'),
        data: new FormData(this),
        processData : false,
        dataType: "json",
        contentType : false,
        beforeSend :function(){
            $(document).find('label.error-text').text('');
        },
        success: function (response) {
            // console.log(response);
            if(response.status == 0){
                $.each(response.error , function(prefix , val){
                    // console.log(prefix);
                    $('label.'+prefix+'-error').text(val);
                    $('input[name="'+prefix+'"]').addClass('is-invalid');
                    $('input[name="'+prefix+'"]').attr('aria-invalid','true');
                });
            }
            else if(response.status == 401){
                $('span.credential-error').text(response.error);
                $('input[name="username"]').addClass('is-invalid');
                $('input[name="username"]').attr('aria-invalid','true');
                $('input[name="password"]').addClass('is-invalid');
                $('input[name="password"]').attr('aria-invalid','true');
            }
            else{
                $('#login-form')[0].reset();
                let validation = $('span#validation-credential');
                var preSpinner = $('div.spinner-grow');
                preSpinner.show();
                validation.removeClass();
                validation.attr('class','text-success');
                validation.text('please wait , while you are redirected...');
                preSpinner.html('<span class="sr-only">Loading.</span>');
                window.location.href='/admin';
            }
        }
    }).done(function() {
        btnSubmit.show();
        btnSpinner.hide();
    });
});

// Reset Passowrd
$('#reset-password-form').on('submit',function(e){
    e.preventDefault();
    var btnSubmit = $('button#btn-submit');
    var btnSpinner = $('button#btn-spinner');
    var email = $('input[name="email"]');
    btnSubmit.hide();
    btnSpinner.show();
    $(email).on('keyup' , function(){
        $('span.credential-error').text('');
        email.removeClass('is-invalid');
        email.attr('aria-invalid','false');
        $('label.username-error').text('');
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: $(this).attr('action'),
        method: $(this).attr('method'),
        data: new FormData(this),
        processData : false,
        dataType: "json",
        contentType : false,
        beforeSend :function(){
            $(document).find('label.error-text').text('');
        },
        success: function (response) {
            // console.log(response);
            if(response.status == 0){
                $.each(response.error , function(prefix , val){
                    // console.log(prefix);
                    $('label.'+prefix+'-error').text(val);
                    $('input[name="'+prefix+'"]').addClass('is-invalid');
                    $('input[name="'+prefix+'"]').attr('aria-invalid','true');
                });
            }
            else if(response.status == 401){
                $('span.credential-error').text(response.error);
                email.addClass('is-invalid');
                email.attr('aria-invalid','true');
            }
            else if(response.status == 200){
                $('#reset-password-form')[0].reset();
                let validation = $('span#validation-credential');
                var preSpinner = $('div.spinner-grow');
                preSpinner.show();
                validation.removeClass();
                validation.attr('class','text-success');
                validation.text(response.message);
                console.log(response.message);
            }
        }
    }).done(function() {
        btnSubmit.show();
        btnSpinner.hide();
    });
});

// Validasi Token Form
$('#request-new-password-form').on('submit',function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: $(this).attr('action'),
        method: $(this).attr('method'),
        data: new FormData(this),
        processData: false,
        dataType : "json",
        contentType: false,
        beforeSend :function(){
            $(document).find('label.error-text').text('');
        },
        success: function (response) {
            if(response.status == 0){
                $.each(response.error , function(prefix , val){
                    // console.log(prefix);
                    $('label.'+prefix+'-error').text(val);
                    $('input[name="'+prefix+'"]').addClass('is-invalid');
                    $('input[name="'+prefix+'"]').attr('aria-invalid','true');
                });
            }
            else if(response.status == 200){
                $('#request-new-password-form')[0].reset();
                let validation = $('span#validation-credential');
                var preSpinner = $('div.spinner-grow');
                preSpinner.show();
                validation.removeClass();
                validation.attr('class','text-success');
                validation.text('Success reset , while you are redirected...');
                preSpinner.html('<span class="sr-only">Loading.</span>');
                window.location.href='/admin';
            }
        }
    });
});