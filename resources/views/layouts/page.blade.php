<!DOCTYPE html>
<html>
    <head>

        <title>Wordavel @if(isset($content)) | {{$content['title']}} @endif</title>

        <meta content='width=device-width,initial-scale=1' name='viewport'>
        <meta charset="UTF-8">

        <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/assets/favicon/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/assets/favicon/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/assets/favicon/manifest.json">
        <link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <head>
    <body>


        <div class="header">

        </div>


        <div class="menu">

            <div class="container menu__wrapper clearfix t-center">

                <ul class="menu__items">

                    @foreach ( $menu as $menuItem )

                        <li class="menu__item">

                            <a href="/{{ $menuItem['slug'] }}" class="menu__item-anchor @if( $slug == $menuItem['slug']) active @endif " data-slug="{{ $menuItem['slug'] }}">
                                {{ $menuItem['title'] }}
                            </a>

                        </li>
                        <!-- /.menu__item -->

                    @endforeach

                </ul>
                <!-- /.menu__items -->

            </div>
            <!-- /.menu__wrapper -->
        </div>
        <!-- /.menu -->

        <div class="main">

            @yield('main')

        </div>
        <!-- /.main -->

        <footer>
            <p align="center">Develop by Alkemy Dev</p>
        </footer>

        @yield('page-scripts')

    </body>
</html>
