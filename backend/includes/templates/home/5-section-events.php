<?php
$events = get_posts([
    'post_type' => 'events',
]);
?>

<div class="nsection nevent" id="bos-event">
    <div class="ncontainer">
        <div class="nheading__wrap txt--c">
            <h5 class="nheading__wrap-h5 heading-h5 f--400 txt--up cl--white1"><?= translateText('event_session/title/main') ?></h5>
            <h2 class="heading-h2 f--600 txt--cap lh--12 cl--white inlineb-t">
                <?= translateText('event_session/description') ?>
                <div class="nline-title white-after"></div>
            </h2>
        </div>
        <div class="nevent__schedule">
            <div class="item nevent__schedule-name">
                <img src="<?php echo $path_template_url ?>/assets/images/event.svg" alt="" class="nimg nicon inlineb-m">
                <h5 class="heading-h5 f--500 cl--white txt--up inlineb-m"><?= translateText('event_session/title/filter') ?></h5> <br />
                <ul class="nevent__schedule-name__date">
				<li class="item nevent__error">
					<div class="error"></div>
				</li>
				<li class="item">
				<input type="text" id="start-date" class="nform-control custom-datepick" placeholder="<?= translateText('event_session/field/start_date') ?>" readonly>
				</li>
				<li class="item">
				<input type="text" id="end-date" class="nform-control custom-datepick" placeholder="<?= translateText('event_session/field/end_date') ?>" readonly>
				</li>
				<li class="item">
				<a id="filter-events"  class="nbutton color--1 nsize--b f--500 txt--up" title="Find Event"><?= translateText('event_session/button') ?></a>
				</li>
                </ul>
            </div>
            <div id="content-events">
			<?php
			foreach ($events as $event){
				$filename = \includes\Bootstrap::getPath() . '/templates/events/item.php';
				echo \includes\Bootstrap::bootstrap()->helper->render($filename, [
					'event' => $event
				]);
			}
			?>
            </div>
		<div class="no-events txt--c">
			<img src="<?php echo $path_template_url ?>/assets/images/sad.svg" alt="" class="nimg no-events__img">
			<div class="no-events__txt f--500">
				<?= translateText('event_session/error/error_01') ?><br />
				<p class="txt-small f--400"><?= translateText('event_session/error/error_02') ?></p>
			</div>
		</div>
        </div>
    </div>
</div>
<script>
    var Events = {
        events: {
            filterEvents: () => {

			function checkDate(element, message, e ) {
				element.addClass('active');
				element.find('.error').text(message);
				e.preventDefault();
				setTimeout(() => {
					element.removeClass('active');
				}, 5000);
			}

			let filterElement  = $('.nevent__schedule #filter-events');
			filterElement.on('click', () => {
				let  ajaxurl = $('ajaxurl').data('ajax'),
					startDate = $('#start-date').val(),
					endDate = $('#end-date').val(),
					errorElement = $('.nevent__error'),
					startDateParse = `Date.parse(startDate),
					endDateParse = Date.parse(endDate);
					// console.log(startDate);
					// console.log(endDate);
					// console.log(startDateParse);
					// console.log(endDateParse);
				if (startDate == '' || endDate == '') {
					checkDate(errorElement, '<?= translateText('event_session/error/error_field_01') ?>', event);
					return;
				}
				if (startDateParse > endDateParse) {
					checkDate(errorElement, '<?= translateText('event_session/error/error_field_02') ?>', event);
					return;
				}

				$.post(ajaxurl, {
					action: 'front',
					method: 'filterEvent', 
					dataType: 'jsonp',
					start: startDateParse, 
					end: endDateParse }, res => {
						$('.nevent__schedule #content-events').html(res);
						$.main.accordionContent($('.nevent__schedule-info .inner-pane'), $('.nevent__schedule-info .inner-content'));
						$('.no-events').removeClass('active');
						if (!res.length) {
							$('.no-events').addClass('active');
						}
				})
				
			});
            }
        },
        init: () => {
            console.log('init events');
            Events.events.filterEvents();
        }
    };
    jQuery(function ($) {
	  Events.init();
    });
</script>