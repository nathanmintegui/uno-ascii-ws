const WebSocket = require('ws');

const socket = new WebSocket('ws://localhost:8080');
const messageQueue = [];
let isProcessing = false;

socket.on('open', function() {
  console.log('Connected to WebSocket server');
});

socket.on('message', function(data) {
  messageQueue.push(data.toString());
  processQueue();
});

socket.on('close', function() {
  console.log('Disconnected from WebSocket server');
});

socket.on('error', function(error) {
  console.error('WebSocket error:', error);
});

function sleep(ms = 500) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

async function processQueue() {
  if (isProcessing) {
    return;
  };

  isProcessing = true;

  while (messageQueue.length > 0) {
    const msg = messageQueue.shift();

    process.stdout.write('\x1B[2J\x1B[0f');
    console.log(msg);

    await sleep();
  }

  isProcessing = false;
}

