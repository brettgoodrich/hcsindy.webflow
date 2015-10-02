
/* This is the top nav dropdown functionality. */
	$('div.topsubnav').hide();
	$('div.dropdown').hide();
	$('a.navlink').mouseenter(function() {
		$('div.topsubnav').hide();
		if ($('#'+$(this).attr('id')+'-sub').length) {
			$('div.dropdown').show();
			$('#'+$(this).attr('id')+'-sub').show();
		} else {
			$('div.dropdown').hide();
		}
	});
	$('a.navlink').mouseleave(function() {
	  //$('#'+$(this).attr('id')+'-sub').fadeToggle(300);
	});
	$('div.dropdown').mouseleave(function() {
		$('div.dropdown').hide();
	});

/* This adds the event blobs to the calendar. */
	function calendarBlobs() {
		$(this).prepend('<div class="gce-day-eventblobs"><div class="gce-day-eventblob gce-day-eventblob-1"></div><div class="gce-day-eventblob gce-day-eventblob-2"></div><div class="gce-day-eventblob gce-day-eventblob-3"></div><div class="gce-day-eventblob gce-day-eventblob-4"></div><div class="gce-day-eventblob gce-day-eventblob-5"></div></div>');
	}
	$('.gce-has-events').each(calendarBlobs);
	/* 
	 *  If Google Calendar Events plugin gets updated, you will need to add this back
	 *  into gce-script.js in the calendar render and nav click.
	 *  $('.gce-day-future').each(calendarBlobs);
	*/