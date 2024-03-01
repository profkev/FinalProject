<?php
$apiKey = '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'; // Your API key

// Handle the received message
$data = json_decode(file_get_contents('php://input'), true);
$userMessage = $data['message'];

// OpenAI API request setup
$postData = json_encode([
    'model' => 'text-davinci-003', // Adjust model as needed
    'prompt' => $userMessage,
    'temperature' => 0.5,
    'max_tokens' => 2048,
]);

// cURL setup
$ch = curl_init('https://api.openai.com/v1/completions');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

// Execute the request and handle the response
$response = curl_exec($ch);
curl_close($ch);

$responseData = json_decode($response, true);
$botReply = $responseData['choices'][0]['text'] ?? 'Sorry, I am unable to respond at the moment.';

// Send the response back to the frontend
header('Content-Type: application/json');
echo json_encode(['reply' => $botReply]);




// connect_to_expert.php
// This is a simplified example. You'll need to integrate with your actual system for managing expert availability.

header('Content-Type: application/json');

// Check for expert availability (this part is highly dependent on your application's architecture)
$expertAvailable = true; // This should be replaced with actual logic to determine availability

if ($expertAvailable) {
    echo json_encode(["message" => "An expert will join the chat shortly."]);
} else {
    echo json_encode(["message" => "All experts are currently busy. Please wait or try again later."]);
}
?>