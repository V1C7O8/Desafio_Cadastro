# 🔒 Sistema de Perfil de Usuário com Banco de Dados

> **Desafio 3 (15d_desafio3)** — Aplicação web em PHP com autenticação de usuário via MySQL, controle de sessão e personalização dinamica de interface.

---

## 📋 Sobre o Projeto

Este projeto consiste em um sistema completo de login e gerenciamento de perfil simples desenvolvido em **PHP** e **MySQL**. O sistema permite que usuários previamente cadastrados realizem o acesso, personalizem a cor de fundo do seu painel e mantenham sua sessão ativa com segurança.

---

## 🚀 Funcionalidades

- [x] **Autenticação Segura:** Validação de usuário e senha consultando diretamente a tabela `usuarios` no banco de dados `exercicio`.
- [x] **Personalização de Interface:** Seleção da cor de fundo da página de perfil durante o processo de login.
- [x] **Controle de Acesso por Sessão:** Restrição de acesso à página de perfil apenas para usuários devidamente autenticados (`$_SESSION`).
- [x] **Encerramento de Sessão (Logout):** Destruição completa da sessão e redirecionamento seguro para a tela de login.

---

## 📁 Estrutura de Arquivos

```text
.
├── 15d_login.php    # Formulário de acesso, validação no MySQL e criação de sessão
├── 15d_perfil.php   # Painel do usuário autenticado com cor personalizada
└── 15d_logout.php   # Encerramento de sessão e destruição de variáveis
