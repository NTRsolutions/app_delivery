export class Culinaria {
  id: number;
  idTipo: number;
  tipo: string;
  restaurante_id: number;

  constructor(id: number, idTipo: number, tipo: string, restaurante_id: number) {
  	this.id = id;
    this.idTipo = idTipo;
    this.tipo = tipo;
    this.restaurante_id = restaurante_id;
  }
}