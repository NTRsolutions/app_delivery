export class Restaurante {
  id: number;
  nome: string;
  cnpj: string;
  email: string;
  descricao: string;
  foto: string;
  telefone1: string;
  telefone2: string;
  tempo_mercado: string;
  valor_min: string;
  horario_abre: string;
  horario_fecha: string;
  gerente_id: number;
  franqueado_id: number;

  /* criar construtor */
  constructor(id: number, nome: string, cnpj: string, email: string, descricao: string, foto: string, telefone1: string, telefone2: string, tempo_mercado: string, valor_min: string, horario_abre: string, horario_fecha: string, gerente_id: number, franqueado_id: number) {
    this.id = id;
    this.nome = nome;
    this.cnpj = cnpj;
    this.email = email;
    this.descricao = descricao;
    this.foto = foto;
    this.telefone1 = telefone1;
    this.telefone2 = telefone2;
    this.tempo_mercado = tempo_mercado;
    this.valor_min = valor_min;
    this.horario_abre = horario_abre;
    this.horario_fecha = horario_fecha;
    this.gerente_id = gerente_id;
    this.franqueado_id = franqueado_id;
  }
}