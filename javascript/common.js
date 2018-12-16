$(document).ready(function() {
	$('input[name=cancel]').click(function() {
		window.location = site_url + '/taxi';
		return false;
	});
});

var phone_id = 0;
var rate_id = 0;

function add_phone() {
	var html = '<select name="phones[new' + phone_id + '][type]" class="field size3">' +
				'<option value="local">fiksni</option>' + 
				'<option value="mobile">mobilni</option>' +
				'<option value="free">besplatni</option>' + 
			'</select> ' +
			'<input type="text" name="phones[new' + phone_id + '][num]" value="" class="field size4" /><br />';
	
	phone_id++;
	
	$('#phones').append(html);
}

function add_rate() {
	var html = '<strong>Opis:</strong> <input type="text" name="rates[new' + rate_id + '][desc]" value="" class="field size4" /> ' + 
			'&nbsp;&nbsp;&nbsp; ' +
			'<strong>Cena:</strong> <input type="text" name="rates[new' + rate_id + '][price]" value="" class="field size2" /> dinara<br />';
	
	rate_id++;
	
	$('#rates').append(html);
}

function new_token_s() {
	$.getJSON(
		site_url + '/taxi/new-token.ajax', 
		function(response) {
			if (response.status == 'ok') {
				$('input[name=gen-new-token]').val(response.value);
			} else {
				alert('Došlo je do greške pri generisanju tokena. Probajte ponovo.');
			}
		}
	);
}

function new_token_v() {
	$.getJSON(
		site_url + '/vehicle/new-token.ajax', 
		function(response) {
			if (response.status == 'ok') {
				$('input[name=gen-new-token]').val(response.value);
			} else {
				alert('Došlo je do greške pri generisanju tokena. Probajte ponovo.');
			}
		}
	);
}