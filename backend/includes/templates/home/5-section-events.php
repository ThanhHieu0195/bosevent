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
        <div class="nevent__schedule ">
            <div class="item nevent__schedule-name">
                <img src="<?php echo $path_template_url ?>/assets/images/event.svg" alt="" class="nimg nicon inlineb-m">
                <h5 class="heading-h5 f--500 cl--white txt--up inlineb-m"><?= translateText('event_session/title/filter') ?></h5>
                <ul class="nevent__schedule-name__date">
                    <li class="item">
                        <input type="text" id="start-date" class="nform-control custom-datepick" placeholder="Start Date" readonly>
                    </li>
                    <li class="item">
                        <input type="text" id="end-date" class="nform-control custom-datepick" placeholder="End Date" readonly>
                    </li>
                    <li class="item">
                        <a id="filter-events"  class="nbutton color--1 nsize--b f--500 txt--up" title="Find Event"><?= translateText('event_session/button') ?></a>
                    </li>
                </ul>
            </div>
            <ul id="content-events">
                <?php
                foreach ($events as $event){
                    $filename = \includes\Bootstrap::getPath() . '/templates/events/item.php';
                    echo \includes\Bootstrap::bootstrap()->helper->render($filename, [
                        'event' => $event
                    ]);
                }
                ?>
            </ul>

        </div>
    </div>
</div>
<script>
    var Events = {
        events: {
            filterEvents: () => {
                $('#filter-events').on('click', () => {
                    let ajaxurl = $('ajaxurl').data('ajax');
                    let start = $('#start-date').val();
			  let end = $('#end-date').val();
                    if (Date.parse(start) <= Date.parse(end)) {
                        $.post(ajaxurl, {action: 'front', method: 'filterEvent', start: Date.parse(start), end: Date.parse(end)}, res => {
				    $('#content-events').html(res);
				    alert('thanh cong');
                        })
                    }else if (Date.parse(start) > Date.parse(end)){
				  alert('Please ensure that the End Date is greater than or equal to the Start Date.');
				//   return false;
			  } else if (start == '' || end == '') {
				alert('Not empty!');
                    }
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