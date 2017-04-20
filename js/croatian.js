jQuery(function($){
	$.datepicker.regional['hr'] = {
		closeText: 'Zatvori',
		prevText: 'Prethodni mjesec',
		nextText: 'Slijedeći mjesec',
		currentText: 'Danas',
		monthNames: ['Siječanj','Veljača','Ožujak','Travanj','Svibanj','Lipanj',
		'Srpanj','Kolovoz','Rujan','Listopad','Studeni','Prosinac'],
		monthNamesShort: ['Sij.','Velj.','Ožu.','Tra.','Svi.','Lip.',
		'Srp.','Kol.','Ruj.','Lis.','Stu.','Pro.'],
		dayNames: ['Nedjelja','Ponedjeljak','Utorak','Srijeda','Četvrtak','Petak','Subota'],
		dayNamesShort: ['Ned.','Pon.','Uto.','Sri.','Čet.','Pet.','Sub.'],
		dayNamesMin: ['N','P','U','S','Č','P','S'],
		weekHeader: 'Tjedan',
		dateFormat: 'dd.mm.yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['hr']);
});


