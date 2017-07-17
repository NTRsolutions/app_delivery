export class RestauranteEndereco {
  restaurante_id: number;
  endereco_id: number;
  endereco: any[];

  constructor(restaurante_id: number, endereco_id: number, endereco: any[]) {
  	this.restaurante_id = restaurante_id;
    this.endereco_id = endereco_id;
    this.endereco = endereco;
  }
}