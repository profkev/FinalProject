
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experts</title>
    <header>
       
        <nav class="nav">
            <div class="logo">
                <a href="index1.php">    <h1>AgriConnect</h1>  </a>
                <h1>Welcome to experts corner</h1>
               
            </div>
    </header>
</head>


<style>
    nav{
        display
    }
       header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin: 15px;
            padding: 15px;
            width: calc(33% - 30px);
            min-width: 200px;
        }

        .card h2 {
            margin-top: 0;
        }

        .card p {
            margin-bottom: 10px;
        }

        #chat-section {
    display: none; /* Hide chat by default */
    /* Keep the rest of your styles for #chat-section */
}
    #chat-section {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 300px;
    background-color: #f9f9f9;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    overflow: hidden;
    display: flex;
    flex-direction: column;
}
#chat-icon {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #4CAF50;
    color: white;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    font-size: 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    z-index: 1000; /* Ensure the icon is always on top */
}





#chat-window {
    padding: 10px;
}

#chat-messages {
    height: 300px;
    overflow-y: auto;
    margin-bottom: 10px;
}

#chat-messages p {
    margin: 0;
    padding: 5px;
    border-radius: 5px;
    margin-bottom: 5px;
    word-break: break-all;
}

#chat-messages .user {
    text-align: right;
    background-color: #dcf8c6;
}

#chat-messages .bot {
    text-align: left;
    background-color: #eee;
}

#chat-input {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: calc(100% - 22px); /* Adjust based on padding */
}

#send-btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

</style>

<body>
<main>
    
        <div class="card">
            <h2>About Farming</h2>
            <p>Farming is the practice of cultivating land or raising livestock for food, fiber, or other products. It is essential for food security and contributes significantly to the economy.</p>
            <a href="#">Read More</a>
        </div>
        <div class="card">
            <h2>Seeking Advice</h2>
            <p>Seeking advice from experienced farmers, agronomists, or agricultural extension officers is crucial for successful farming. They can provide valuable insights, techniques, and solutions to common challenges.</p>
            <a href="#">Read More</a>
        </div>
        <div class="card">
            <h2>Importance of Advice</h2>
            <p>Receiving advice helps farmers make informed decisions, optimize resources, increase productivity, and mitigate risks. It also promotes sustainable practices and innovation in agriculture.</p>
            <a href="#">Read More</a>
        </div>
        <div class="card">
            <h2>Farming Techniques</h2>
            <p>There are various farming techniques such as organic farming, hydroponics, and permaculture. Each technique has its benefits and challenges, and seeking advice can help choose the most suitable approach.</p>
            <a href="#">Read More</a>
        </div>
        <!-- <div class="card">
            <h2>Benefits of Collaboration</h2>
            <p>Collaborating with other farmers or agricultural organizations fosters knowledge sharing, collective problem-solving, and access to new markets. It enhances resilience and competitiveness in farming communities.</p>
            <a href="#">Read More</a>
        </div> -->
    </main>

    <div id="chat-icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
  <path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105"/>
</svg>
</div>

<div id="chat-section">
    <div id="chat-window">
        <div id="chat-messages">
        <p class="bot">Welcome to Farmer's Friend Type your question below and get advice from our agriculture experts or our automated assistant.</p>

        </div>
        <input type="text" id="chat-input" placeholder="Type your question..." />
        <button id="send-btn">Send</button>
        <button id="close-chat" style="padding: 5px 10px; margin-top: 10px;">Close Chat</button>

        <button id="contact-expert-btn">Contact an Expert</button> 
    </div>
</div>
</body>

<script>
// Toggle the visibility of chat section and chat icon
document.getElementById('chat-icon').addEventListener('click', function() {
    const chatSection = document.getElementById('chat-section');
    const chatIcon = this; // 'this' refers to the element that triggered the event
    
    if(chatSection.style.display === 'none' || chatSection.style.display === '') {
        chatSection.style.display = 'flex';
        chatIcon.style.display = 'none';
    } else {
        chatSection.style.display = 'none';
        chatIcon.style.display = 'flex'; // Ensure icon is shown when chat is hidden
    }
});

// Close the chat section and show the chat icon when the close button is clicked
document.getElementById('close-chat').addEventListener('click', function() {
    document.getElementById('chat-section').style.display = 'none';
    document.getElementById('chat-icon').style.display = 'flex';
});

// Send message and display messages in the chat
document.getElementById('send-btn').addEventListener('click', function() {
    const inputElement = document.getElementById('chat-input');
    const message = inputElement.value.trim();
    if (message) { // Check if message is not empty
        inputElement.value = ''; // Clear input field
        displayMessage(message, 'user');

        // Send message to backend and handle response
        fetch('chatbot_backend.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({message: message})
        })
        .then(response => response.json())
        .then(data => displayMessage(data.reply, 'bot')) // Display bot response
        .catch(error => console.error('Error:', error));
    }
});

// Optional: Close chat when clicking outside of the chat section
window.addEventListener('click', function(e) {
    const chatSection = document.getElementById('chat-section');
    const chatIcon = document.getElementById('chat-icon');
    if (!chatIcon.contains(e.target) && !chatSection.contains(e.target) && chatSection.style.display !== 'none') {
        chatSection.style.display = 'none';
        chatIcon.style.display = 'flex';
    }
});

// Function to display messages in the chat
function displayMessage(message, sender) {
    const messagesDiv = document.getElementById('chat-messages');
    const messageParagraph = document.createElement('p');
    messageParagraph.textContent = message;
    messageParagraph.className = sender; // Use different classes for user and bot messages for styling
    messagesDiv.appendChild(messageParagraph);
    messagesDiv.scrollTop = messagesDiv.scrollHeight; // Auto-scroll to latest message
}

// Connect to an expert
document.getElementById('contact-expert-btn').addEventListener('click', function() {
    displayMessage("Looking for an available expert...", "bot");
    fetch('connect_to_expert.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
    })
    .then(response => response.json())
    .then(data => displayMessage(data.message, 'bot'))
    .catch(error => console.error('Error:', error));
});
</script>

</html>

