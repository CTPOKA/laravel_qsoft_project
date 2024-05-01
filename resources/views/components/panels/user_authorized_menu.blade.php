<div>
    <nav class="flex sm:justify-end sm:items-center flex-col sm:flex-row space-y-2 md:space-y-0 sm:space-x-8 text-sm">
        <a class="text-gray-500 hover:text-orange flex items-center space-x-1" href="basket.html">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span>3</span>
        </a>
        
        <a class="text-black hover:text-orange flex items-center space-x-1" href="#">
            <x-icons.user-circle class="inline-block text-orange h-4 w-4" />
            <span class="inline-block font-bold">{{ auth()->user()?->name }}</span>
        </a>
        <a class="text-gray-500 hover:text-orange flex items-center space-x-1" href="{{ route('account') }}">
            <x-icons.house class="inline-block text-orange h-4 w-4" />
            <span>Личный кабинет</span>
        </a>
        @admin()
            <a class="text-gray-500 hover:text-orange flex items-center space-x-1" href="{{ route('admin.admin') }}">
                <x-icons.db class="inline-block text-orange h-4 w-4" />
                <span>Админка</span>
            </a>
        @endadmin
        <form method="post" action="{{ route('logout') }}" class="inline-block">
            @csrf

            <button type="submit" class="text-gray-500 hover:text-orange flex items-center space-x-1">
                <x-icons.exit class="inline-block text-orange h-4 w-4" />
                <span>Выйти</span>
            </button>
        </form>
    </nav>
</div>