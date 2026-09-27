<?php

declare(strict_types=1);

require_once __DIR__ . '/../../includes/header.php';
?>
<section class="instagram-agent" aria-labelledby="agent-title">
    <div class="agent-topbar">
        <div>
            <span class="eyebrow"><span class="status-dot"></span> Agente conectado</span>
            <h1 id="agent-title">Atendimento Instagram</h1>
            <p>Central inteligente para responder mensagens, qualificar clientes e não perder agendamentos.</p>
        </div>
        <button type="button" class="btn btn-light btn-new-conversation" id="new-conversation">+ Nova conversa</button>
    </div>

    <div class="agent-layout">
        <aside class="conversation-list" aria-label="Conversas do Instagram">
            <div class="inbox-heading">
                <div>
                    <span>Caixa de entrada</span>
                    <strong>12 conversas</strong>
                </div>
                <button type="button" class="icon-button" aria-label="Pesquisar conversas">⌕</button>
            </div>
            <button type="button" class="conversation active" data-name="Mariana Costa" data-handle="@marianacosta" data-initials="MC" data-message="Oi, Mari! Claro! Temos horários disponíveis esta semana. Qual serviço você gostaria de agendar?">
                <span class="avatar avatar-purple">MC</span>
                <span class="conversation-copy"><strong>Mariana Costa</strong><small>Queria saber sobre horários...</small></span>
                <span class="conversation-meta"><time>agora</time><b>1</b></span>
            </button>
            <button type="button" class="conversation" data-name="Camila Oliveira" data-handle="@camioliveira" data-initials="CO" data-message="Olá, Camila! Posso te enviar nossa tabela de serviços e valores.">
                <span class="avatar avatar-pink">CO</span>
                <span class="conversation-copy"><strong>Camila Oliveira</strong><small>Obrigada pelo retorno! ✨</small></span>
                <span class="conversation-meta"><time>12 min</time></span>
            </button>
            <button type="button" class="conversation" data-name="Beatriz Martins" data-handle="@bia.martins" data-initials="BM" data-message="Oi, Bia! Vamos encontrar o melhor horário para você. Prefere manhã ou tarde?">
                <span class="avatar avatar-orange">BM</span>
                <span class="conversation-copy"><strong>Beatriz Martins</strong><small>Vocês atendem sábado?</small></span>
                <span class="conversation-meta"><time>28 min</time></span>
            </button>
            <button type="button" class="conversation" data-name="Juliana Alves" data-handle="@ju.alves" data-initials="JA" data-message="Olá, Juliana! Seu horário está reservado. Te esperamos!">
                <span class="avatar avatar-blue">JA</span>
                <span class="conversation-copy"><strong>Juliana Alves</strong><small>Perfeito, pode confirmar.</small></span>
                <span class="conversation-meta"><time>1 h</time></span>
            </button>
        </aside>

        <main class="chat-panel" aria-label="Conversa selecionada">
            <header class="chat-header">
                <span class="avatar avatar-purple" id="chat-avatar">MC</span>
                <div><strong id="chat-name">Mariana Costa</strong><small id="chat-handle">@marianacosta · Instagram</small></div>
                <button type="button" class="details-button">Ver perfil ↗</button>
            </header>
            <div class="chat-messages" id="chat-messages">
                <div class="chat-date">HOJE</div>
                <div class="message customer">Olá! Vi o trabalho de vocês no Instagram e amei. 💜</div>
                <div class="message customer">Queria saber se vocês têm horários disponíveis esta semana.</div>
                <div class="message agent-message">Oi, Mari! Que bom que gostou do nosso trabalho! ✨</div>
                <div class="message agent-message" id="agent-welcome">Claro! Temos horários disponíveis esta semana. Qual serviço você gostaria de agendar?</div>
                <span class="message-time">14:32</span>
            </div>
            <form class="composer" id="message-form">
                <button class="emoji-button" type="button" aria-label="Adicionar emoji">☺</button>
                <input id="message-input" type="text" autocomplete="off" placeholder="Escreva uma mensagem...">
                <button class="send-button" type="submit">Enviar <span>↑</span></button>
            </form>
        </main>

        <aside class="agent-sidebar" aria-label="Painel do agente">
            <section class="agent-card">
                <div class="agent-card-heading"><span class="sparkle">✦</span><strong>Assistente Amanda</strong><span class="online-label">● Online</span></div>
                <p>Seu agente está pronto para atender.</p>
                <dl class="agent-stats"><div><dt>24</dt><dd>Atendimentos hoje</dd></div><div><dt>2 min</dt><dd>Tempo médio</dd></div></dl>
            </section>
            <section class="quick-replies">
                <div class="section-title"><strong>Respostas rápidas</strong><button type="button" id="add-quick-reply" aria-label="Adicionar resposta rápida">+</button></div>
                <button type="button" class="quick-reply" data-reply="Olá! Que bom ter você por aqui. Como podemos te ajudar?">👋 <span><b>Boas-vindas</b><small>Mensagem inicial</small></span></button>
                <button type="button" class="quick-reply" data-reply="Temos opções incríveis para você. Qual serviço gostaria de conhecer?">✦ <span><b>Serviços</b><small>Enviar catálogo</small></span></button>
                <button type="button" class="quick-reply" data-reply="Perfeito! Vou verificar a agenda e já te envio os melhores horários disponíveis.">▣ <span><b>Agendamento</b><small>Consultar horários</small></span></button>
            </section>
            <section class="tip-card"><span>💡</span><p><b>Dica da Amanda</b>Respostas rápidas ajudam a atender mais pessoas sem perder o toque pessoal.</p></section>
        </aside>
    </div>
</section>

<script>
const form = document.getElementById('message-form');
const input = document.getElementById('message-input');
const messages = document.getElementById('chat-messages');
function addMessage(text) {
    if (!text.trim()) return;
    const message = document.createElement('div');
    message.className = 'message agent-message sent';
    message.textContent = text.trim();
    messages.appendChild(message);
    messages.scrollTop = messages.scrollHeight;
}
form.addEventListener('submit', (event) => { event.preventDefault(); addMessage(input.value); input.value = ''; input.focus(); });
document.querySelectorAll('.quick-reply').forEach((button) => button.addEventListener('click', () => { input.value = button.dataset.reply; input.focus(); }));
document.querySelectorAll('.conversation').forEach((conversation) => conversation.addEventListener('click', () => {
    document.querySelector('.conversation.active').classList.remove('active'); conversation.classList.add('active');
    document.getElementById('chat-name').textContent = conversation.dataset.name;
    document.getElementById('chat-handle').textContent = conversation.dataset.handle + ' · Instagram';
    document.getElementById('chat-avatar').textContent = conversation.dataset.initials;
    document.getElementById('agent-welcome').textContent = conversation.dataset.message;
}));
document.getElementById('new-conversation').addEventListener('click', () => { input.value = ''; input.focus(); });
</script>
<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
