export class RestauranteEndereco {
  restaurante_id: number;
  endereco_id: number;

  constructor(restaurante_id: number, endereco_id: number) {
  	this.restaurante_id = restaurante_id;
    this.endereco_id = endereco_id;
  }
}