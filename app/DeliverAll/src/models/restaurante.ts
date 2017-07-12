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
  classificacaos: any[];
  culinarias: any[];
  pagamentos: any[];
  produtos: any[];
  promocaos: any[];
  restaurante_enderecos: any[];

  /* criar construtor */
  constructor(id: number, nome: string, cnpj: string, email: string, descricao: string, foto: string, telefone1: string, telefone2: string, tempo_mercado: string, valor_min: string, horario_abre: string, horario_fecha: string, gerente_id: number, franqueado_id: number, classificacaos: any[], culinarias: any[], franqueados: any[], gerentes: any[], pagamentos: any[], produtos: any[], promocaos: any[], restaurante_enderecos: any[]) {
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
    this.classificacaos = classificacaos;
    this.culinarias = culinarias;
    this.pagamentos = pagamentos;
    this.produtos = produtos;
    this.promocaos = promocaos;
    this.restaurante_enderecos = restaurante_enderecos;
  }
}