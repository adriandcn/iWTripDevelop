  
  $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
                });
  $('.error').html('');
    

                $("#registro_step1").submit(function (event) {
                
                    $('#container').loadingOverlay();
                    event.preventDefault();
                    var $form = $(this),
                            data = $form.serialize(),
                            url = $form.attr("action");
                            
     
                    var posting = $.post(url, {formData: data});
                    posting.done(function (data) {
                        if (data.fail) {

                            var errorString = '<ul>';
                            $.each(data.errors, function (key, value) {
                                errorString += '<li>' + value + '</li>';
                            });
                            errorString += '</ul>';
                            $('#target').loadingOverlay('remove');
                            //$('.rowerror').html(errorString);
                            $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'"+errorString+"'])");

                        }
                        if (data.success) {
                        	alert(data.html);
                        	window.location.replace(data.html);
                            $('#registro-step1').html(data.html);
                            $('#container').loadingOverlay('remove');
                            $('.register').fadeOut(); //hiding Reg form
                            var successContent = '' + data.message + '';
       $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'"+successContent+"'])");
       
       
                        } //success
                    }); //done
                });
    