<?php 
include_once 'connectdb.php';
session_start();


include_once 'header_kormocharitwo.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Astha ChatBot</title>
    <style>
        .main-content-wrapper {
  margin-left: 230px; /* space for sidebar */
  padding: 20px;
  min-height: 100vh;
  background-color: #f9fafb; /* LIGHT color */
  box-sizing: border-box;
}
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f0f0;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .chat-container {
    background-color: #ffffff;
    border-radius: 10px;
    width: 1200px;
    max-width: 90%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    display: flex;
    flex-direction: column;
}


        .chat-header {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .chat-messages {
            padding: 15px;
            height: 400px;
            overflow-y: auto;
            border-bottom: 1px solid #ddd;
        }

        .chat-input {
            display: flex;
            border-top: 1px solid #ccc;
        }

        .chat-input input {
            flex: 1;
            padding: 15px;
            border: none;
            font-size: 16px;
            border-bottom-left-radius: 10px;
        }

        .chat-input button {
            padding: 15px 25px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            border-bottom-right-radius: 10px;
        }

        .chat-input button:hover {
            background-color: #2980b9;
        }

        .user-msg {
            color: #2c3e50;
            margin: 5px 0;
        }

        .bot-msg {
            color: #16a085;
            margin: 5px 0;
        }
    </style>
</head>
<body>
<div class="main-content-wrapper">
    <div class="chat-container">
        <div class="chat-header">Microfinance ChatBot</div>
        <div class="chat-messages" id="chat-messages"></div>
        <div class="chat-input">
            <input type="text" id="user-input" placeholder="Ask anything...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>
</div>
    <script>
        function sendMessage() {
            const userInput = document.getElementById("user-input");
            const message = userInput.value.trim();
            if (message === "") return;

            const chatMessages = document.getElementById("chat-messages");

            const userMessage = document.createElement("div");
            userMessage.classList.add("user-msg");
            userMessage.innerHTML = "<strong>You:</strong> " + message;
            chatMessages.appendChild(userMessage);

            fetch("chatbot_response.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: "message=" + encodeURIComponent(message)
            })
            .then(response => response.text())
            .then(data => {
                const botMessage = document.createElement("div");
                botMessage.classList.add("bot-msg");
                botMessage.innerHTML = "<strong>Bot:</strong> " + data;
                chatMessages.appendChild(botMessage);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            });

            userInput.value = "";
        }

        document.getElementById("user-input").addEventListener("keypress", function(e) {
            if (e.key === "Enter") {
                sendMessage();
            }
        });
    </script>
</body>
</html>
