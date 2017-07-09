export class Pagamento {
  id: number;
  idDescricao: number;
  descricao: string;
  restaurante_id: number;

  constructor(id: number, idDescricao: number, descricao: string, restaurante_id: number) {
  	this.id = id;
    this.idDescricao = idDescricao;
    this.descricao = descricao;
    this.restaurante_id = restaurante_id;
  }
}