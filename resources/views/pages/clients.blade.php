<x-layouts.inner page-title="Для клиентов" title="Для клиентов">
    <div class="space-y-4">
        <p>1. Средняя цена моделей</p>
        @dump($averagePrice)

        <p>2. Средняя цена моделей со скидкой</p>
        @dump($averageDiscountedPrice)

        <p>3. Самая дорогая модель</p>
        @dump($mostExpensiveModel)

        <p>4. Все виды салонов моделей</p>
        @dump($uniqueSalons)

        <p>5. Названия двигателей в алфавитном порядке</p>
        @dump($sortedEngines)

        <p>6. Названия классов моделей с ключами</p>
        @dump($sortedClassNames)

        <p>7. Модели со скидкой и содержащие цифру 5 или 6</p>
        @dump($discountedModels)

        <p>8. Средние цены по видам кузовов</p>
        @dump($averagePricesByBodyType)
    </div>
</x-layouts.inner>