import { Endereco } from '../../models/endereco';
import { Distancia } from '../../models/distancia';
import { Culinaria } from '../../models/culinaria';
import { Pagamento } from '../../models/pagamento';
import { Produto } from '../../models/produto';
import { RestauranteEndereco } from '../../models/restaurante_endereco';

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
  gerente_id: number;
  franqueado_id: number;
  culinarias: any[];
  pagamentos: any[];
  produtos: any[];
  restaurante_enderecos: any[];

  /* criar construtor */
  constructor(id: number, nome: string, cnpj: string, email: string, descricao: string, foto: string, telefone1: string, telefone2: string, tempo_mercado: string, gerente_id: number, franqueado_id: number, culinarias: any[], pagamentos: any[], produtos: any[], restaurante_enderecos: any[]) {
    this.id = id;
    this.nome = nome;
    this.cnpj = cnpj;
    this.email = email;
    this.descricao = descricao;
    this.foto = 'http://deliverall-com-br.umbler.net/site/img/'+foto;
    this.telefone1 = telefone1;
    this.telefone2 = telefone2;
    this.tempo_mercado = tempo_mercado;
    this.gerente_id = gerente_id;
    this.franqueado_id = franqueado_id;
    this.culinarias = culinarias;
    this.pagamentos = pagamentos;
    this.produtos = produtos;
    this.restaurante_enderecos = restaurante_enderecos;
  }  
}