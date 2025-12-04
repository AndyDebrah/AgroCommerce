<!-- filepath: d:\xamp\htdocs\Ecom\resources\views\home\chat.blade.php -->
<!-- Chat Widget Styles & HTML -->
<style>
    #chat-fab {
        position: fixed;
        bottom: 32px;
        right: 32px;
        width: 60px;
        height: 60px;
        background: #4a6fdc;
        color: #fff;
        border-radius: 50%;
        box-shadow: 0 4px 16px rgba(76,110,220,0.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        cursor: pointer;
        z-index: 9999;
        transition: background 0.2s;
    }
    #chat-fab:hover {
        background: #3546a6;
    }
    #chat-box {
        position: fixed;
        bottom: 100px;
        right: 32px;
        width: 340px;
        max-width: 95vw;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 8px 32px rgba(76,110,220,0.18);
        display: none;
        flex-direction: column;
        z-index: 9999;
        overflow: hidden;
        animation: fadeInUp .3s;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px);}
        to { opacity: 1; transform: translateY(0);}
    }
    #chat-header {
        background: #4a6fdc;
        color: #fff;
        padding: 14px 18px;
        font-weight: 600;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    #chat-close {
        cursor: pointer;
        font-size: 1.2rem;
    }
    #chat-messages {
        padding: 16px;
        height: 220px;
        overflow-y: auto;
        background: #f8f9fa;
        font-size: 0.97rem;
    }
    .chat-msg {
        margin-bottom: 12px;
        display: flex;
        flex-direction: column;
    }
    .chat-msg.user {
        align-items: flex-end;
    }
    .chat-msg.bot {
        align-items: flex-start;
    }
    .chat-bubble {
        padding: 8px 14px;
        border-radius: 16px;
        max-width: 80%;
        word-break: break-word;
        margin-bottom: 2px;
    }
    .chat-msg.user .chat-bubble {
        background: #4a6fdc;
        color: #fff;
        border-bottom-right-radius: 4px;
    }
    .chat-msg.bot .chat-bubble {
        background: #e9eefd;
        color: #222;
        border-bottom-left-radius: 4px;
    }
    #chat-form {
        display: flex;
        border-top: 1px solid #e5e7eb;
        background: #fff;
    }
    #chat-input {
        flex: 1;
        border: none;
        padding: 12px;
        font-size: 1rem;
        outline: none;
        background: #fff;
    }
    #chat-send {
        background: #4a6fdc;
        color: #fff;
        border: none;
        padding: 0 18px;
        font-size: 1.2rem;
        cursor: pointer;
        transition: background 0.2s;
    }
    #chat-send:hover {
        background: #3546a6;
    }
</style>

<div id="chat-fab" title="Chat with us">
    <i class="fa fa-comments"></i>
</div>
<div id="chat-box">
    <div id="chat-header">
        <span>Live Chat</span>
        <span id="chat-close">&times;</span>
    </div>
    <div id="chat-messages"></div>
    <form id="chat-form" autocomplete="off">
        <input type="text" id="chat-input" placeholder="Type your question..." autocomplete="off" />
        <button type="submit" id="chat-send"><i class="fa fa-paper-plane"></i></button>
    </form>
</div>

<script>
    // Show/hide chat box
    document.getElementById('chat-fab').onclick = function() {
        document.getElementById('chat-box').style.display = 'flex';
        setTimeout(() => {
            document.getElementById('chat-input').focus();
        }, 200);
    };
    document.getElementById('chat-close').onclick = function() {
        document.getElementById('chat-box').style.display = 'none';
    };

    // Chat logic
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');

    function appendMessage(text, sender = 'user') {
        const msgDiv = document.createElement('div');
        msgDiv.className = 'chat-msg ' + sender;
        const bubble = document.createElement('div');
        bubble.className = 'chat-bubble';
        bubble.innerText = text;
        msgDiv.appendChild(bubble);
        chatMessages.appendChild(msgDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

     chatForm.onsubmit = async function(e) {
        e.preventDefault();
        const userMsg = chatInput.value.trim();
        if (!userMsg) return;
        appendMessage(userMsg, 'user');
        chatInput.value = '';
        appendMessage('...', 'bot');
        // Send user message to Laravel backend for product-based response
        try {
            const res = await fetch('/chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message: userMsg })
            });
            const data = await res.json();
            chatMessages.removeChild(chatMessages.lastChild);
            appendMessage(data.reply, 'bot');
        } catch {
            chatMessages.removeChild(chatMessages.lastChild);
            appendMessage("Sorry, I couldn't get a response. Please try again.", 'bot');
        }
    };
</script>
