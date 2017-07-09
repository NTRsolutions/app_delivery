export class Cliente {
  id: number;
  nome: string;
  email: string;
  senha: string;
  telefone1: string;
  telefone2: string;

  constructor(id: number, nome: string, email: string, senha: string, telefone1: string, telefone2: string) {
  	this.id = id;
    this.nome = nome;
    this.email = email;
    this.senha = senha;
    this.telefone1 = telefone1;
    this.telefone2 = telefone2;
  }
}