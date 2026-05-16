/**
 * menu.js — Injeta a sidebar e verifica autenticação
 * Inclua este script em todas as páginas (exceto login.html)
 */
(function () {
  // Redireciona para login se não estiver logado
  const user = (() => { try { return JSON.parse(sessionStorage.getItem('usuario_logado')); } catch { return null; } })();
  if (!user && !window.location.pathname.endsWith('login.html')) {
    window.location.href = 'login.html';
    return;
  }

  const page = window.location.pathname.split('/').pop();

  const links = [
    { href: 'index.html',      icon: 'fa-house',          label: 'Início' },
    { href: 'usuarios.html',   icon: 'fa-users',          label: 'Usuários' },
    { href: 'categorias.html', icon: 'fa-folder',         label: 'Categorias' },
    { href: 'postagens.html',  icon: 'fa-newspaper',      label: 'Postagens' },
  ];

  const nav = links.map(l => `
    <li>
      <a href="${l.href}" class="${page === l.href ? 'active' : ''}">
        <i class="fa-solid ${l.icon}"></i> ${l.label}
      </a>
    </li>`).join('');

  const avatar = `https://ui-avatars.com/api/?name=${encodeURIComponent(user?.nome || 'U')}&background=4f6ef7&color=fff`;

  document.body.insertAdjacentHTML('afterbegin', `
    <aside class="sidebar">
      <div class="sidebar-brand">Dash<span>Unifev</span></div>
      <ul>${nav}</ul>
      <div class="perfil-usuario">
        <img src="${avatar}" alt="Avatar">
        <div>
          <div style="color:var(--text);font-size:13px;font-weight:500">${user?.nome || ''}</div>
          <a href="login.html" onclick="DB.logout()" style="font-size:11px;color:var(--muted);text-decoration:none;">
            <i class="fa-solid fa-right-from-bracket"></i> Sair
          </a>
        </div>
      </div>
    </aside>
  `);
})();
