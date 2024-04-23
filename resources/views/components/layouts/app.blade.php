<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/assets/css/form.min.css" rel="stylesheet">
    <link href="/assets/css/tailwind.css" rel="stylesheet">
    <link href="/assets/css/base.css" rel="stylesheet">
    <link href="/assets/css/main_page_template_styles.css" rel="stylesheet">

    <script src="/assets/js/vendor/jquery-3.6.0.min.js"></script>

    <link href="/assets/js/vendor/slick.css" rel="stylesheet">
    <script src="/assets/js/vendor/slick.min.js"></script>
    
    <script src="/assets/js/script.js"></script>
    <title>Рога и Сила - {{ $pageTitle ?? 'Главная страница' }}</title>
    <link href="/assets/favicon.ico" rel="shortcut icon" type="image/x-icon">

    @isset($scripts)
        {{ $scripts }}
    @endisset
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
<div class="wrapper flex flex-1 flex-col">
    <header class="bg-white">
        <div class="border-b">
            <div class="container mx-auto block sm:flex sm:justify-between sm:items-center py-4 px-4 sm:px-0 space-y-4 sm:space-y-0">
                <div class="flex justify-center">
                    <span class="inline-block sm:inline">
                        <img src="/assets/images/logo.png" width="222" height="30" alt="">
                    </span>
                </div>
                <div>
                    <x-panels.user_authorized_menu />
                </div>
            </div>
        </div>
        <div class="border-b">
            <div class="container mx-auto block lg:flex justify-between items-center px-2 sm:px-0">
                <form name="search_form" class="bg-gray-100 rounded-full flex items-center px-3 text-sm order-2 my-4 lg:my-0">
                    <label for="search-input" class="hidden"></label>
                    <input id="search-input" type="text" placeholder="Поиск по сайту" class="bg-gray-100 rounded-full py-1 px-1 focus:outline-none placeholder-opacity-50 flex-1 border-none focus:shadow-none focus:ring-0">
                    <button type="submit" class="group focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-black group-hover:text-orange h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
                @isset($menu)
                    {{ $menu }}
                @else
                    <x-panels.catalog_navigation_menu />
                @endisset
                
            </div>
        </div>
    </header>

    {{ $slot }}

    <footer class="container mx-auto">
        @isset($footerNavigation)
        {{ $footerNavigation }}
        @else
            <section class="block sm:flex bg-white p-4">
            <div class="flex-1">
                <x-panels.salons />
            </div>
            <div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
                <x-information-menu template="footer" />
                </div>
            </section>
        @endisset
        <x-panels.copyrights />
    </footer>
</div>

</body>
</html>