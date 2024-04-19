@extends('layouts.app')
@section('content')
<section class="slider">
    <div data-slick-carousel>
        <div class="relative banner">
            <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="/assets/pictures/test_banner_1.jpg" alt="" title=""></div>
            <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">Купи Астон Мартин, получи секретное Задание</h1>
                <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире <a href="#" class="text-orange hover:opacity-75">подробнее</a></h2>
            </div>
        </div>
        <div class="relative banner">
            <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="/assets/pictures/test_banner_2.jpg" alt="" title=""></div>
            <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">Купи Роллс Ройс, получи Отчество к&nbsp;своему имени</h1>
                <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире <a href="#" class="text-orange hover:opacity-75">подробнее</a></h2>
            </div>
        </div>
        <div class="relative banner">
            <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="/assets/pictures/test_banner_3.jpg" alt="" title=""></div>
            <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">Купи Бентли, получи бейсболку</h1>
                <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире <a href="#" class="text-orange hover:opacity-75">подробнее</a></h2>
            </div>
        </div>
    </div>
</section>
@include('panels.week_models', ['cars' => $cars])
@include('panels.articles.footer_articles', ['articles' => $articles])
@endsection