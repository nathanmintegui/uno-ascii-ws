// Install 'ws' with: npm install ws

const WebSocket = require('ws');

// Connect to the WebSocket server
const socket = new WebSocket('ws://localhost:8080');

socket.on('open', () => {
  console.log('Connected to WebSocket server');
});

socket.on('message', (data) => {
  console.log(data.toString());
});

socket.on('close', () => {
  console.log('Disconnected from WebSocket server');
});

socket.on('error', (error) => {
  console.error('WebSocket error:', error);
});

