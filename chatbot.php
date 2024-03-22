<?php
$apiKey = '';


if(isset($_POST['message'])) {
    $message = $_POST['message'];

    $data = array(
        'prompt' => $message,
        'max_tokens' => 50,
        'temperature' => 0.7,
        'stop' => '###'
    );

    $ch = curl_init('https://api.openai.com/v1/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ));

    // Set the path to the CA certificates bundle
    curl_setopt($ch, CURLOPT_CAINFO, '/path/to/cacert.pem');

    $result = curl_exec($ch);
    $error = curl_error($ch); // Check for errors
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Check HTTP response code
    curl_close($ch);

    if ($result === false) {
        // Handle cURL error
        echo json_encode(array('error' => 'cURL error: ' . $error));
    } elseif ($httpCode !== 200) {
        // Handle HTTP error
        echo json_encode(array('error' => 'HTTP error code: ' . $httpCode));
    } else {
        $response = json_decode($result, true);

        if (isset($response['choices'][0]['text'])) {
            echo json_encode(array('message' => $response['choices'][0]['text']));
        } else {
            echo json_encode(array('error' => 'Invalid response from OpenAI API'));
        }
    }
}
?>
