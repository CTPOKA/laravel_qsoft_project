<div>
    <nav class="flex sm:justify-end sm:items-center flex-col sm:flex-row space-y-2 md:space-y-0 sm:space-x-8 text-sm">
        <a class="text-gray-500 hover:text-orange flex items-center space-x-1" href="basket.html">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span>3</span>
        </a>
        <a class="text-black hover:text-orange flex items-center space-x-1" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="inline-block font-bold">Иван Владимирович</span>
        </a>
        <a class="text-gray-500 hover:text-orange flex items-center space-x-1" href="account.html">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            <span>Личный кабинет</span>
        </a>
        @admin()
            <a class="text-gray-500 hover:text-orange flex items-center space-x-1" href="{{ route('admin.admin') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z" />
                    <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z" />
                    <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z" />
                </svg>
                <span>Админка</span>
            </a>
        @endadmin
        <a class="text-gray-500 hover:text-orange flex items-center space-x-1" href="index.html">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span>Выйти</span>
        </a>
    </nav>
</div>