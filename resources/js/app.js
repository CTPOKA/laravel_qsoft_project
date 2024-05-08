import './bootstrap';

$(function () {

  $('[data-slick-carousel]').slick({
    dots: true,
  });

  $('[data-accordion]').each(function () {
    let $accordion = $(this);
    let isOpen = $accordion.data('active') !== undefined;

    let $accordionToggle = $accordion.find('[data-accordion-toggle]');
    let $accordionNoActiveItem = $accordion.find('[data-accordion-not-active]');
    let $accordionActiveItem = $accordion.find('[data-accordion-active]');
    let $accordionContent = $accordion.find('[data-accordion-details]');

    $accordionToggle.on('click', function () {
      if (isOpen) {
        $accordionNoActiveItem.show();
        $accordionActiveItem.hide();
        $accordionContent.slideUp();
      } else {
        $accordionNoActiveItem.hide();
        $accordionActiveItem.show();
        $accordionContent.slideDown();
      }

      isOpen = !isOpen;
    })
  })

  $('[data-basket]').each(function () {
    let $basket = $(this);
    let carId = $basket.data('id');

    let $incrementButton = $basket.find('[data-basket-increment]');
    let $decrementButton = $basket.find('[data-basket-decrement]');
    let $inputField = $basket.find('input');

    $basket.on('submit', function (event) {
      event.preventDefault();
    })

    $incrementButton.on('click', function () {
      let currentValue = parseInt($inputField.val());
      $inputField.val(currentValue + 1);
      $inputField.change();
    })

    $decrementButton.on('click', function () {
      let currentValue = parseInt($inputField.val());
      $inputField.val(Math.max(1, currentValue - 1));
      $inputField.change();
    })

    $inputField.on('change', function () {
      let value = parseInt($inputField.val());
      $inputField.val(Math.max(1, value));
      $.ajax({
        url: "/basket/store",
        type: "POST",
        data: {
          "_token": "{{ csrf_token() }}",
          user_id: 1,
          car_id: carId,
          count: value,
        },
      });
    })
  })
})
