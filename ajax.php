<?php

require "main.php";

$data_form = $_POST;
$data_form_error = [];

foreach($data_form as $k => $v) {
    if(isset($valid_conf[$k])) {
        if(!preg_match($valid_conf[$k], $v)) {
            if($v == '') $data_form_error[$k] = 'wartość nie moze być pusta'; // TODO
            else $data_form_error[$k] = 'błędna wartość'; // TODO
        }
    } else {
        ; //TODO log
        unset($data_form[$k]);
    }
}

$response = [];
if(!empty($data_form_error)) {
    // TODO log
    $response['error'] = $data_form_error;
} else {

    // TODO właściwa obsługa e-mail'a
    $send_mail = mail(
        $data_form['email'],
        'Witamy w bazie użytkowników',
        '',
    ); 

    // TODO, można by zastosować bindowanie, acz w obecnej formie dane są bezpieczne
    $pdo->exec(
        "INSERT INTO users(content, send_email) 
        VALUES('".json_encode($data_form)."', ".($send_mail?'true':'false').")"
    );

    $response = 'success';
}

header('Content-Type: application/json');
echo json_encode($response);
