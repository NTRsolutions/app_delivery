export class Complemento {
  id: number;
  nome: string;
  descricao: string;
  preco: number;
  produto_id: number;

  constructor(id: number, nome: string, descricao: string, preco: number, produto_id: number) {
    this.id = id;
    this.nome = nome;
    this.descricao = descricao;
    this.preco = preco;
    this.produto_id = produto_id;
  }
}