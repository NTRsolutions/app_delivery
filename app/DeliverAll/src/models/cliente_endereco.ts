export class ClienteEndereco {
  cliente_id: number;
  endereco_id: number;

  constructor(cliente_id: number, endereco_id: number) {
  	this.cliente_id = cliente_id;
    this.endereco_id = endereco_id;
  }
}