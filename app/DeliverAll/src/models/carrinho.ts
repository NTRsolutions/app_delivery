export class Carrinho {
  produtos: any[];
  qtd: any[];
  total: any;
  restaurante_id: any;
  cliente_id: any;
  troco: any;
  pagamento: any;

  constructor(restaurante_id: any, cliente_id: any) {
    this.produtos = new Array();
  	this.qtd = new Array();
    this.total = 0;
    this.restaurante_id = restaurante_id;
    this.cliente_id = cliente_id;
    this.troco = 0;
    this.pagamento = null;
  }
}