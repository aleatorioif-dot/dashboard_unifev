/**
 * db.js — Camada de dados usando LocalStorage
 * Substitui conexao.php + todos os arquivos processar-*.php
 */

const DB = {

  // ── Helpers ───────────────────────────────────────────────
  _get(key) {
    try { return JSON.parse(localStorage.getItem(key) || '[]'); } catch { return []; }
  },
  _set(key, data) {
    localStorage.setItem(key, JSON.stringify(data));
  },
  _nextId(list) {
    return list.length > 0 ? Math.max(...list.map(i => i.id)) + 1 : 1;
  },

  // ── USUÁRIOS ──────────────────────────────────────────────
  getUsuarios() { return this._get('usuarios'); },

  getUsuario(id) {
    return this.getUsuarios().find(u => u.id === parseInt(id)) || null;
  },

  criarUsuario({ nome, email, senha, acesso }) {
    const lista = this.getUsuarios();
    if (lista.find(u => u.email === email)) return { ok: false, msg: 'E-mail já cadastrado.' };
    lista.push({
      id: this._nextId(lista),
      nome, email,
      senha, // em produção real: nunca salvar senha em texto plano
      acesso: acesso || 'Usuário',
      status: 'Ativo',
      criado: new Date().toLocaleDateString('pt-BR')
    });
    this._set('usuarios', lista);
    return { ok: true };
  },

  editarUsuario(id, { nome, email, acesso }) {
    const lista = this.getUsuarios();
    const idx = lista.findIndex(u => u.id === parseInt(id));
    if (idx < 0) return { ok: false, msg: 'Usuário não encontrado.' };
    lista[idx] = { ...lista[idx], nome, email, acesso };
    this._set('usuarios', lista);
    return { ok: true };
  },

  toggleStatusUsuario(id) {
    const lista = this.getUsuarios();
    const idx = lista.findIndex(u => u.id === parseInt(id));
    if (idx < 0) return;
    lista[idx].status = lista[idx].status === 'Ativo' ? 'Inativo' : 'Ativo';
    this._set('usuarios', lista);
  },

  excluirUsuario(id) {
    this._set('usuarios', this.getUsuarios().filter(u => u.id !== parseInt(id)));
  },

  // ── CATEGORIAS ────────────────────────────────────────────
  getCategorias() { return this._get('categorias'); },

  getCategoria(id) {
    return this.getCategorias().find(c => c.id === parseInt(id)) || null;
  },

  criarCategoria({ nome, descricao }) {
    const lista = this.getCategorias();
    lista.push({
      id: this._nextId(lista),
      nome,
      descricao: descricao || '',
      status: 'Ativo',
      criado: new Date().toLocaleDateString('pt-BR')
    });
    this._set('categorias', lista);
    return { ok: true };
  },

  editarCategoria(id, { nome, descricao, status }) {
    const lista = this.getCategorias();
    const idx = lista.findIndex(c => c.id === parseInt(id));
    if (idx < 0) return { ok: false };
    lista[idx] = { ...lista[idx], nome, descricao: descricao || '', status };
    this._set('categorias', lista);
    return { ok: true };
  },

  toggleStatusCategoria(id) {
    const lista = this.getCategorias();
    const idx = lista.findIndex(c => c.id === parseInt(id));
    if (idx < 0) return;
    lista[idx].status = lista[idx].status === 'Ativo' ? 'Inativo' : 'Ativo';
    this._set('categorias', lista);
  },

  excluirCategoria(id) {
    this._set('categorias', this.getCategorias().filter(c => c.id !== parseInt(id)));
  },

  // ── POSTAGENS ─────────────────────────────────────────────
  getPostagens() { return this._get('postagens'); },

  getPostagem(id) {
    return this.getPostagens().find(p => p.id === parseInt(id)) || null;
  },

  criarPostagem({ titulo, conteudo, id_cat }) {
    const lista = this.getPostagens();
    lista.push({
      id: this._nextId(lista),
      titulo, conteudo,
      id_cat: parseInt(id_cat) || null,
      status: 'Ativo',
      criado: new Date().toLocaleDateString('pt-BR')
    });
    this._set('postagens', lista);
    return { ok: true };
  },

  editarPostagem(id, { titulo, conteudo, id_cat, status }) {
    const lista = this.getPostagens();
    const idx = lista.findIndex(p => p.id === parseInt(id));
    if (idx < 0) return { ok: false };
    lista[idx] = { ...lista[idx], titulo, conteudo, id_cat: parseInt(id_cat) || null, status };
    this._set('postagens', lista);
    return { ok: true };
  },

  toggleStatusPostagem(id) {
    const lista = this.getPostagens();
    const idx = lista.findIndex(p => p.id === parseInt(id));
    if (idx < 0) return;
    lista[idx].status = lista[idx].status === 'Ativo' ? 'Inativo' : 'Ativo';
    this._set('postagens', lista);
  },

  excluirPostagem(id) {
    this._set('postagens', this.getPostagens().filter(p => p.id !== parseInt(id)));
  },

  // ── SESSÃO (login simples) ────────────────────────────────
  login(email, senha) {
    const user = this.getUsuarios().find(u => u.email === email && u.senha === senha && u.status === 'Ativo');
    if (user) {
      sessionStorage.setItem('usuario_logado', JSON.stringify({ id: user.id, nome: user.nome, acesso: user.acesso }));
      return { ok: true };
    }
    return { ok: false, msg: 'E-mail ou senha inválidos.' };
  },

  logout() { sessionStorage.removeItem('usuario_logado'); },

  getLogado() {
    try { return JSON.parse(sessionStorage.getItem('usuario_logado')); } catch { return null; }
  },

  // ── SEED (dados iniciais) ─────────────────────────────────
  seed() {
    if (this.getUsuarios().length > 0) return; // já tem dados
    this.criarUsuario({ nome: 'Administrador', email: 'admin@unifev.com', senha: 'admin123', acesso: 'Administrador' });
    this.criarCategoria({ nome: 'Notícias', descricao: 'Notícias gerais da instituição' });
    this.criarCategoria({ nome: 'Eventos', descricao: 'Eventos e palestras' });
    this.criarPostagem({ titulo: 'Bem-vindo ao sistema', conteudo: 'Esta é a primeira postagem do dashboard.', id_cat: 1 });
  }
};

// Inicializa dados de exemplo na primeira vez
DB.seed();
