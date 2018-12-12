<!DOCTYPE html>
<html>
    <head>

        <title>@yield('title'){{get_bloginfo('name')}}</title>

        <meta content='width=device-width,initial-scale=1' name='viewport'>
        <meta charset="UTF-8">

        <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/assets/favicon/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/assets/favicon/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/assets/favicon/manifest.json">
        <link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" type="text/css" href="/css/app.css">
    </head>
    <body>


        <div class="header">

        </div>


        <div class="menu">

            <div class="container menu__wrapper clearfix t-center">

                <ul class="menu__items">
                    <li class="menu__item">
                        <a href="/" class="menu__item-anchor" data-slug="home">
                            Home
                        </a>
                    </li>
                    <li class="menu__item">
                        <a href="/blog" class="menu__item-anchor" data-slug="home">
                            Blog
                        </a>
                    </li>
                    @foreach ( Post::type('page')->published()->get() as $menuItem )
                        <li class="menu__item">
                            <a href="/{{ $menuItem['slug'] }}" class="menu__item-anchor @if( $content->slug == $menuItem['slug']) active @endif " data-slug="{{ $menuItem['slug'] }}">
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
            <p align="center">Develop by Gragio</p>
        </footer>

        @yield('page-scripts')

        <script type="text/javascript" src="/js/app.js"></script>

        @if( env('APP_ENV') === 'local' )
            <div class="debug">
                {{ dump(get_defined_vars()['__data']) }}
            </div>
        @endif

    </body>
</html>
