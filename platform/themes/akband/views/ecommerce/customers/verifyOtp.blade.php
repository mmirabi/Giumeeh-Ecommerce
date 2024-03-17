@php
    Theme::layout('full-width');
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content pt-50 pb-150">
    {!! $form->renderForm() !!}
</div>

<form action="{{route('customer.access.otp.send_post')}}" method="post" id="retry_send_otp_form">
    @csrf
    <input type="hidden" name="phone" value={{$phone}}>
</form>

<script>
    jQuery('#otp_box').html("<span id='timer'></span> {{__('Retry otp time')}}");
</script>

<script>
    let timerOn = true;

    function submitOtpForm() {
        document.getElementById("retry_send_otp_form").submit();
    }

    function timer(remaining) {
        var m = Math.floor(remaining / 60);
        var s = remaining % 60;

        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        document.getElementById('timer').innerHTML = m + ':' + s;
        remaining -= 1;

        if (remaining >= 0 && timerOn) {
            setTimeout(function () {
                timer(remaining);
            }, 1000);
            return;
        }

        jQuery('#otp_box').html("<a href='#' id='retry_send_otp_tag'>{{__('Retry send')}}</a>");
        $('#retry_send_otp_tag').attr('onclick', 'submitOtpForm()');
    }

    timer({{ $otpExpireTime }});
</script>

