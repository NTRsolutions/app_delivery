export class Classificacao {
  id: number;
  nota: number;
  comentario: string;
  restaurante_id: number;
  cliente_id: number;

  constructor(id: number, nota: number, comentario: string, restaurante_id: number, cliente_id: number) {
  	this.id = id;
    this.nota = nota;
    this.comentario = comentario;
    this.restaurante_id = restaurante_id;
    this.cliente_id = cliente_id;
  }
}