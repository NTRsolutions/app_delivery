export class Carrinho {
  produtos: any[];
  qtd: any[];
  total: any;
  restaurante_id: any;
  cliente_id: any;
  troco: any;
  pagamento_id: any;
  endereco_id: any;
  status: any;

  constructor(restaurante_id: any, cliente_id: any) {
    this.produtos = new Array();
  	this.qtd = new Array();
    this.total = 0;
    this.restaurante_id = restaurante_id;
    this.cliente_id = cliente_id;
    this.troco = null;
    this.pagamento_id = null;
    this.endereco_id = null;
    this.status = 0;
  }
}