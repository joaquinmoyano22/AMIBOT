// cacheAPI.js - MVP Simple
const API_URL = 'http://18.189.31.189:3000/api/chat';

function getConversationId() {
  let id = localStorage.getItem('conversationId');
  if (!id) {
    id = `conv-${Date.now()}`;
    localStorage.setItem('conversationId', id);
  }
  return id;
}

function saveMessage(message, role) {
  const conversationId = getConversationId();
  
  fetch(API_URL, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      conversationId: conversationId,
      message: message,
      role: role
    })
  });
}

// Hacer disponible globalmente
window.saveMessage = saveMessage;