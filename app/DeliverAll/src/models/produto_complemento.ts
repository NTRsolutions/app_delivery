export class ProdutoComplemento {
  qtd: number;
  produto_id: number;
  pedido_id: number;
  complemento_id: number;

  constructor(qtd: number, produto_id: number, pedido_id: number, complemento_id: number) {
  	this.qtd = qtd;
    this.produto_id = produto_id;
    this.pedido_id = pedido_id;
    this.complemento_id = complemento_id;
  }
}