<!DOCTYPE html>
<html class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Royal @yield('title')</title>
    @yield('css')
    <link rel="stylesheet" href="{{ asset('/css/app2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.css') }}"/>
    <link rel="icon" type="image/icon" href="/svgexport-13.svg">
</head>
<body>
@include('partials.mobile-menu')
@include('partials.top-menu')
<div class="flex overflow-hidden">
    @include('partials.menu')
    <div class="content">
        @yield('content')
    </div>
</div>
<script src="{{ asset('/js/enigma.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
{{--<script type="text/javascript">
    $( "option" ).on('click', function() {
        alert( "Handler for called." );
    });
    $('#search').on('keyup', function () {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{URL::to('search')}}',
            data: {'search': $value},
            success: function (data) {
                console.log(data);
                $('#Content').html(data);
            },
        });
    });
</script>--}}

@yield('scripts')


<script type="text/javascript">
    if ($('html').hasClass('dark')) {
        $('.dark-mode-switcher__toggle').addClass('dark-mode-switcher__toggle--active')
    } else {
        $('.dark-mode-switcher__toggle').removeClass('dark-mode-switcher__toggle--active')
    }

    function switchDark() {
        $('html').toggleClass('dark')
        if ($('html').hasClass('dark')) {
            $('.dark-mode-switcher__toggle').addClass('dark-mode-switcher__toggle--active')
        } else {
            $('.dark-mode-switcher__toggle').removeClass('dark-mode-switcher__toggle--active')
        }
    }
</script>

</body>
</html>
