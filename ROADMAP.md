# Trilha de estudo — lista-tarefas

> Abra este arquivo quando bater a dúvida "onde estou?".
> Uma sessão de 1h por dia, sempre em cima deste mesmo projeto.

**Semana atual:** 1 de 16 · **Sessões feitas:** 2 · **Commits:** 2 · **Hoje:** Seeder

---

## Fase 1 — Fundação (semanas 1–3)

- [x] **S1a — Projeto no GitHub**
  git init, .gitignore protegendo o `.env`, primeiro commit, push.

- [x] **S1b — Três bugs corrigidos**
  `__construct` incompatível com Laravel 13, header que o layout ignorava, menu apontando pra rota errada.
  *Engenharia: ler stack trace, isolar causa, verificar correção*

- [x] **S1c — TarefaFactory + states**
  Dado de teste gerado, com `concluida()` e `atrasada()`.

- [ ] **S1d — Seeder** ← **VOCÊ ESTÁ AQUI**
  Dois usuários, 20 tarefas cada. O segundo usuário é o que vai provar isolamento nos testes.

- [ ] **S2 — Primeiros testes com Pest**
  Redirect de visitante, listagem própria, criação, validação.
  *Engenharia: testabilidade, regressão*

- [ ] **S3 — Fechar a suíte**
  Teste de autorização (403), update, delete. Quebrar o código de propósito e ver o teste pegar.

## Fase 2 — Refatoração (semanas 4–6)

- [ ] **S4 — FormRequest**
  Tirar a validação duplicada de `store` e `update`.
  *Engenharia: responsabilidade única (SRP)*

- [ ] **S5 — Policy**
  Centralizar o `abort_if` que hoje se repete em três métodos.
  *Engenharia: DRY, autorização como camada*

- [ ] **S6 — Enum + bugs do `concluido_em`**
  Matar as strings soltas de status e corrigir o cast que trunca a hora.
  *Engenharia: type safety, domínio explícito*

## Fase 3 — Banco de dados (semanas 7–10)

- [ ] **S7 — Paginação**
  Hoje o `index` traz tudo. Com 5 mil tarefas, a página morre.

- [ ] **S8 — Filtro e busca com scopes**
  Tirar a query de dentro do controller.
  *Engenharia: encapsulamento*

- [ ] **S9 — SQL na mão**
  JOIN, GROUP BY, índices — sem framework no meio.

- [ ] **S10 — Criar e corrigir o N+1**
  Provocar o bug de propósito com Debugbar, ver 21 queries, corrigir com `with()`.
  *Engenharia: o custo escondido da abstração*

## Fase 4 — Prova real (semanas 11–12)

- [ ] **S11–12 — Projeto do zero, outro domínio**
  Sem tutorial e sem copiar deste. Onde você travar é onde o conhecimento é raso — e é pra lá que a gente volta.

## Fase 5 — Nível seguinte (semanas 13–16)

- [ ] **S13 — Relação N:N**
  Etiquetas nas tarefas, com tabela pivô.

- [ ] **S14–15 — API com Sanctum**
  Resources, tokens, status codes corretos.
  *Engenharia: separar apresentação de domínio, injeção de dependência*

- [ ] **S16 — Deploy + CI**
  Projeto no ar, GitHub Actions rodando os testes a cada push, README decente.

---

## Formato de cada sessão (60 min)

| Bloco | O que acontece | Tempo |
|---|---|---|
| Aquecimento | Você explica a sessão anterior sem olhar o código | 5 min |
| Conceito | Eu explico a ideia e mostro um exemplo curto | 10 min |
| Mão na massa | Você escreve. Eu fico disponível pra destravar | 30 min |
| Revisão | Eu leio seu código e aponto melhorias | 10 min |
| Fechamento | Commit e anotar onde a próxima começa | 5 min |

---

## Bugs conhecidos, deixados de propósito

Não são esquecimento. Cada um vira aula na semana em que a ferramenta certa aparece.

- `concluido_em` é `timestamp` na migration mas o cast é `'date'` — a hora é truncada
- `concluido_em` não é limpo quando a tarefa deixa de estar concluída
- Validação idêntica duplicada em `store` e `update`
- `abort_if` repetido em três métodos do controller
- `/dashboard` e `/tarefas` renderizam exatamente a mesma tela
- `user_id` é `nullable` na migration, mas toda tarefa sempre tem dono

---

**Regra que vale mais que o plano:** consistência vence intensidade. Uma hora por dia, todo dia, bate cinco horas no sábado — e não é motivação, é como a memória funciona.
