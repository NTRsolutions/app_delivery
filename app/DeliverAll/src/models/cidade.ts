export class Cidade {
  id: number;
  nome: string;
  estado_id: number;

  constructor(id: number, nome: string, estado_id: number) {
  	this.id = id;
    this.nome = nome;
    this.estado_id = estado_id;
  }
}