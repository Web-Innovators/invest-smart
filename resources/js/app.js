import './bootstrap';

const axios = require('axios');

const form = document.getElementById('chatForm');
const inputMessage = document.getElementById('input-msg');
form.addEventListener('submit',function(){
    event.preventDefault();

    const userInput = inputMessage.value;
    axios.post('/chat-post',{
        message: userInput,
    })
})

// cht event for chating
window.Echo.channel('public.sms')
    .listen('chat-message', (event) => {  // Remove the dot (.)
        console.log("Received Event:", event);
    });

// Debugging WebSocket connection
window.Echo.connector.pusher.connection.bind('connected', function () {
    console.log("✅ WebSocket Connected!");
});

window.Echo.connector.pusher.connection.bind('error', function (err) {
    console.error("❌ WebSocket Error:", err);
});