export class Endereco {
  id: number;
  numero: number;
  rua: string;
  bairro: string;
  cidade: string;
  estado: string;
  complemento: string;
  cep: string;
  lat: number;
  lng: number;

  constructor(id: number, numero: number, rua: string, bairro: string, cidade: string, estado: string, complemento: string, cep: string, lat: number, lng: number) {
  	this.id = id;
    this.numero = numero;
    this.rua = rua;
    this.bairro = bairro;
    this.cidade = cidade;
    this.estado = estado;
    this.complemento = complemento;
    this.cep = cep;
    this.lat = lat;
    this.lng = lng;
  }
}