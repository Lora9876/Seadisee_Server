<?php

function redirect($url) {
	header ('Location: ' . Conf::get('site_url') . $url);
	exit;
}

function format_date($timestamp) {
	return date('d.m.Y.', $timestamp);
}

function output_json($data) {
	echo json_encode($data);
	exit;
}

function base64url_decode($data) { 
	return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
}

function show_error($msg) {
	Template::assign('page_title', 'Дошло је до грешке');
	Template::assign('is_guest', true);
	Template::assign('msg', $msg);
	Template::display('error.tpl');
	exit;
}

// Gettext ^_^ :)
function txt_plural($num, $form1, $form2, $form3) {
	if ($num % 10 == 1 && $num % 100 != 11)
		return $form1;
	elseif ($num % 10 >= 2 && $num % 10 <= 4 && ($num % 100 < 10 || $num % 100 >= 20))
		return $form2;
	else
		return $form3;
}

function get_class_name($year, $class) {
	if (date('n') > 9)
		return (arabic_to_roman(date('Y') - $year + 1) . '-' . $class);
	else
		return (arabic_to_roman(date('Y') - $year) . '-' . $class);
}

function arabic_to_roman($number) {
	if ($number == 1)
		return 'I';
	
	if ($number == 2)
		return 'II';
	
	if ($number == 3)
		return 'III';
	
	return 'IV';
}

function send_mail($to, $subject, $body) {
	$headers = 'From: Evok biblioteke <info@evokbiblioteke.rs>' . "\r\n";
	$headers .= 'Reply-To: info@evokbiblioteke.rs';
	$headers .= 'MIME-Version: 1.0' . "\r\n"; 
	$headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";

	@mail($to, $subject, $body, $headers);
}

function convert_word($word) {
	$replace_pairs = array(
		'А' => 'A',
		'Б' => 'B',
		'В' => 'V',
		'Г' => 'G',
		'Д' => 'D',
		'Ђ' => 'DJ',
		'Е' => 'E',
		'Ж' => 'Z',
		'З' => 'Z',
		'И' => 'I',
		'Ј' => 'J',
		'К' => 'K',
		'Л' => 'L',
		'Љ' => 'LJ',
		'М' => 'M',
		'Н' => 'N',
		'Њ' => 'NJ',
		'О' => 'O',
		'П' => 'P',
		'Р' => 'R',
		'С' => 'S',
		'Т' => 'T',
		'Ћ' => 'C',
		'У' => 'U',
		'Ф' => 'F',
		'Х' => 'H',
		'Ц' => 'C',
		'Ч' => 'C',
		'Џ' => 'DZ',
		'Ш' => 'S',
        'а' => 'a',
		'б' => 'b',
		'в' => 'v',
		'г' => 'g',
		'д' => 'd',
		'ђ' => 'dj',
		'е' => 'e',
		'ж' => 'z',
		'з' => 'z',
		'и' => 'i',
		'ј' => 'j',
		'к' => 'k',
		'л' => 'l',
		'љ' => 'lj',
		'м' => 'm',
		'н' => 'n',
		'њ' => 'nj',
		'о' => 'o',
		'п' => 'p',
		'р' => 'r',
		'с' => 's',
		'т' => 't',
		'ћ' => 'c',
		'у' => 'u',
		'ф' => 'f',
		'х' => 'h',
		'ц' => 'c',
		'ч' => 'c',
		'џ' => 'dz',
		'ш' => 's',
		'Ња' => 'Nja',
		'Ње' => 'Nje',
		'Њи' => 'Nji',
		'Њо' => 'Njo',
		'Њу' => 'Nju',
		'Ља' => 'Lja',
		'Ље' => 'Lje',
		'Љи' => 'Lji',
		'Љо' => 'Ljo',
		'Љу' => 'Lju',
		'Џа' => 'Dza',
		'Џе' => 'Dze',
		'Џи' => 'Dzi',
		'Џо' => 'Dzo',
		'Џу' => 'Dzu', 
		'"' => ''
	);
	
	return strtr($word, $replace_pairs);
}

?>