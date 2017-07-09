export class Promocao {
  id: number;
  data_ini: Date;
  data_fim: Date;
  desconto: number;
  produto_id: number;
  restaurante_id: number;

  constructor(id: number,  data_ini: Date, data_fim: Date, desconto: number, produto_id: number, restaurante_id: number) {
  	this.id = id;
    this.data_ini = data_ini;
    this.data_fim = data_fim;
    this.desconto = desconto;
    this.produto_id = produto_id;
    this.restaurante_id = restaurante_id;
  }
}