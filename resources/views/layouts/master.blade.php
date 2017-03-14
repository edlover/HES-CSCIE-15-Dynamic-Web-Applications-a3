<!DOCTYPE html>
<html>
    <head>
        <title>
            @yield('title', 'Bill Splitter')
        </title>
        <meta charset='utf-8'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="/css/billsplitter.css" type='text/css' rel='stylesheet'>
        @stack('head')
    </head>

    <body>

        <header>
        </header>

        <section>
            @yield('content')
        </section>

        <footer>
            &copy; {{ date('Y') }}
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        @stack('body')

    </body>
</html>
