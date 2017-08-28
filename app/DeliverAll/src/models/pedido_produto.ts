export class PedidoProduto {
  qtd: number;
  produto_id: number;
  produto: any;
  pedido_id: number;
  preco: number;

  constructor(qtd: number, produto_id: number, pedido_id: number) {
  	this.qtd = qtd;
    this.produto_id = produto_id;
    this.pedido_id = pedido_id;
    this.produto = null;
    this.preco = null;
  }
}