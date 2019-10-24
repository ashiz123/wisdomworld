
$('form.ajax').ajaxForm({

    delegation: true,
    beforeSubmit: function(formData, jqForm, options) {

        clearFormErrors(jqForm[0]);
        toggleFormSubmitDisabled($(jqForm[0]));
    },
    error: function(data, statusText, xhr, $form) {

        if (data.status == 422) {
            // Form validation error
            //processFormErrors($form, $.parseJSON(data.responseText).errors);
            processFormErrors($form, data.responseJSON.errors);
            if (data.responseJSON.message !== 'undefined') {
                showMessage(data.responseJSON.message);
            }
            return;
        }

        showMessage('Whoops!, something went wrong..');
        toggleFormSubmitDisabled($form);
    },
    success: function(data, statusText, xhr, $form) {
        // alert('test works');

        switch (data.status)
        {
            case 'success':
                if ($form.hasClass('reset')) {
                    $form.resetForm();
                }

                if ($form.hasClass('closeModalAfter')) {
                    $('.modal').modal('hide');
                }

                toggleFormSubmitDisabled($form);

                if (typeof data.message !== 'undefined') {
                    showMessage(data.message);
                }

                if (typeof data.redirectUrl !== 'undefined') {
                    setTimeout(function () {
                        window.location.href = data.redirectUrl;
                    }, 500);
                }
                break;

            case 'error':
                if (data.messages) {
                    processFormErrors($form, data.messages);
                    return;
                }

                toggleFormSubmitDisabled($form);

                if (typeof data.message !== 'undefined') {
                    showMessage(data.message);
                }
                break;

            default:
                break;

        }

        $('.uploadProgress').hide();
    },
    dataType: 'json'
});



function toggleFormSubmitDisabled($form)
{
    var $button = $form.find('button[type=submit]');

    if ($button.hasClass('disabled')) {
        $button.attr('disabled', false).removeClass('disabled')
            .html($button.data('original-text'));
        return;
    }

    $button.data('original-text', $button.html()).attr('disabled', true)
        .addClass('disabled').html($button.html() + ' ' + '<i class="fa fa-spinner fa-spin"></i>');
}

/**
 * Toogle link / button to enable/disable
 */
function toggleElementDisabled($elem)
{
    if ($elem.hasClass('disabled')) {
        $elem.attr('disabled', false).removeClass('disabled')
            .html($elem.data('original-text'));
        return;
    }

    $elem.data('original-text', $elem.html()).attr('disabled', true)
        .addClass('disabled').html($elem.html() + ' ' + '<i class="fa fa-spinner fa-spin"></i>');
}

/**
 * Processing form errors
 */
function processFormErrors($form, errors) {
    $.each(errors, function (input_name, error){
        // input_name = dotNotationToArray(input_name);
        // var $input = $(':input[name="' + input_name + '"]', $form);

        var selector = (input_name.indexOf(".") >= 0) ? '.' + input_name.replace(/\./g, "\\.") : ':input[name*=' + input_name + ']';
        var $input = $(selector, $form);

        if ($input.parent().hasClass('input-group')) {
            $input = $input.parent();
        }

        $form.addClass('was-validated');
        $input.addClass('is-invalid');
        //$input.after('<div class="invalid-feedback">' + error + '</div>');
        $input.parent().append('<div class="invalid-feedback">' + error + '</div>');
    });

    toggleFormSubmitDisabled($form);
}

function dotNotationToArray(raw_input_name) {
    raw_input_name = raw_input_name.split('.');
    var input_name = raw_input_name.shift();

    $.each(raw_input_name, function(index, value){
        input_name =  input_name + '[' + value + ']';
    });

    return input_name;
}


function clearFormErrors($form) {
    $($form).find('.invalid-feedback').remove();
    $($form).find('.valid-feedback').remove();
    $($form).find(':input').removeClass('is-invalid');
    $($form).find(':input').removeClass('is-valid');
}

function showMessage(message) {
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "1500",
        "hideDuration": "1000",
        "timeOut": "1200",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    toastr.info(message);
}

$(document.body).on('click', '.loadModal, [data-invoke~=modal]', function(e){

    var $button = $(this);
    toggleElementDisabled($button);

    var modal_url = $(this).data('href');
    var cache_result = $(this).data('cache') === 'on';

    $('.modal').remove();
    $('html').addClass('working')

    $.ajax({
        url: modal_url,
        data: {},
        localCache: cache_result,
        dataType: 'html',
        success: function(data){

            $('body').append(data);
            var $modal = $('.modal');
            $modal.modal({
                'backdrop': 'static'
            });

            $modal.modal('show');
            $('html').removeClass('working');

            $modal.on('hidden.bs.modal', function () {
                $modal.remove();
            });
        },
    }).done(function(){
        toggleElementDisabled($button);
    }).fail(function(data){
        $('html').removeClass('working');
        toggleElementDisabled($button);
        showMessage('Whoops!, something has gone wrong.<br><br>' + ' ' + data.statusText);
    });

    e.preventDefault();

});
