<?php
libxml_use_internal_errors(TRUE);

$dom = new DomDocument;
$dom->loadHTMLFile('http://www.fftt.com/sportif/pclassement/php3/FFTTfo.php3?Menu=J2');
$xpath = new DomXPath($dom);

$cookies = array();
foreach ($http_response_header as $h) {
    if (0 === stripos($h, 'Set-Cookie: ')) {
        $cookies[] = substr($h, strlen('Set-Cookie: '), strpos($h, ';') - strlen('Set-Cookie: '));
    }
}
$data = http_build_query(
    array(
        'cler' => $xpath->query('//input[@name = "cler"]')->item(0)->getAttribute('value'),
        //'precision' => '4514821',
        'precision' => $_SESSION['licence'],
        //'reqid' => '200',
        'reqid' => $_SESSION['sexe'],
        'Submit' => 'Envoyer',
    )
);
$contents = file_get_contents(
    'http://www.fftt.com/sportif/pclassement/php3/FFTTfi.php3',
    FALSE,
    stream_context_create(
        array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-type: application/x-www-form-urlencoded\r\nContent-Length: " . strlen($data) . "\r\n" . ($cookies ? 'Cookie: ' . implode('; ', $cookies) . "\r\n" : ''),
                'content' => $data,
            )
        )
    )
);
//var_dump($contents);
$recherche = '#Pts : (.+)</td>#';
preg_match ($recherche, $contents, $out);
$_SESSION['points_adv'] = $out[1];
?>

