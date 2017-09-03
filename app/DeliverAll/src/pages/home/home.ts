import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController, Events } from 'ionic-angular';
import { Cliente } from '../../models/cliente';
import { Endereco } from '../../models/endereco';
import { Distancia } from '../../models/distancia';
import { Restaurante } from '../../models/restaurante';
import { Culinaria } from '../../models/culinaria';
import { Pagamento } from '../../models/pagamento';
import { Produto } from '../../models/produto';
import { RestauranteEndereco } from '../../models/restaurante_endereco';
import { Link } from '../../models/link';

import { RestaurantePage } from '../restaurante/restaurante';
import { CarrinhoPage } from '../carrinho/carrinho';

import { CarrinhoProvider } from '../../providers/carrinho/carrinho';

import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

@IonicPage()
@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})

export class HomePage {

	public link: Link;
  cliente: Cliente;
	enderecos: Endereco[];
  enderecos_id: Array<number>;
  restaurantes: Array<Restaurante>;
  restaurantes_aux: Array<Restaurante>;
  distancias: Array<Distancia>;

  culinarias: Culinaria[];
  pagamentos: Pagamento[];
  produtos: Produto[];
  restaurante_enderecos: RestauranteEndereco[];

  rests_carregados: boolean = false;
  carrinho: boolean = false;

  /* Variáveis de filtro */
  raio: number = 15;
  /* ------------------- */

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController, public cProv: CarrinhoProvider, public events: Events) {
  	this.link = new Link();

  	this.cliente = navParams.get("cliente");
    this.enderecos_id = new Array();
    this.distancias = new Array();
    this.restaurantes = new Array();
    this.restaurantes_aux = new Array();
  }

  ionViewDidLoad() {    
    this.cProv.existCarrinho();
    this.listenCarrinho();
    this.getEnderecos();
  }

  getEnderecos() {
    console.log("cliente: ");
    console.log(this.cliente);
    for (var i = 0; i < this.cliente['ClienteEndereco'].length; i++) {
      this.enderecos_id.push(this.cliente['ClienteEndereco'][i]['endereco_id']);
    }

    this.http.post(this.link.api_url + 'enderecos/get', {'ids': this.enderecos_id})
      .map(res => res.json())
      .subscribe(
        data => {
          this.enderecos = data.message;
          console.log("endereço: ");
          console.log(this.enderecos);
          this.getRestaurantes(this.enderecos[0]['Endereco']);
        },
        err => {
          let toast = this.toastCtrl.create({
            message: "Ocorreu algum erro, tente novamente!",
            duration: 3000,
            position: 'top'
          });
          toast.present();
        }
      );
  }

  getRestaurantes(end: Endereco) {
    this.http.post(this.link.api_url + 'restaurantes/get', {'cidade_id': end['cidade_id']})
      .map(res => res.json())
      .subscribe(
        data => {
          for (var i = 0; i < data.message.length; i++) {
            this.culinarias = new Array();
            this.pagamentos = new Array();
            this.produtos = new Array();
            this.restaurante_enderecos = new Array();

            if (data.message[i]['Culinaria'].length > 0) {              
              this.setCulinarias(data.message[i]['Culinaria']);
            }

            if (data.message[i]['Pagamento'].length > 0) {
              this.setPagamentos(data.message[i]['Pagamento']);
            }

            if (data.message[i]['Produto'].length > 0) {              
              this.setProdutos(data.message[i]['Produto']);
            }

            if (data.message[i]['RestauranteEndereco'].length > 0) {              
              this.setRestauranteEnderecos(data.message[i]['RestauranteEndereco']);
            }

            this.setRestaurantes(data.message[i]['Restaurante']);
          }
          
          this.restaurantes_aux = this.restaurantes;

          this.calcDistancias(end);
          //this.filterRestaurantes();

          //console.log(data.message);
          //console.log(this.restaurantes_aux);
          //console.log(JSON.stringify(this.restaurantes_aux,undefined,2));
          //console.log(this.distancias);
          this.rests_carregados = true;
        },
        err => {
          let toast = this.toastCtrl.create({
            message: "Ocorreu algum erro, tente novamente!",
            duration: 3000,
            position: 'top'
          });
          toast.present();
        }
      );
  }

  calcDistancias(end: Endereco) {
    for (var i = 0; i < this.restaurantes_aux.length; i++) {
      let r = this.restaurantes_aux[i];
      let ends = r['restaurante_enderecos'];

      for (var j = 0; j < ends.length; j++) {
        let d: Distancia = {'rest_id': 0, 'distancia': 0};
        let e = ends[j]['endereco'];
        d.rest_id = r['id'];      
        d.distancia = this.getDistancia(end['lat'], end['lng'], e['lat'], e['lng']);
        this.restaurantes_aux[i].distancia = d.distancia.toFixed(1);
        this.distancias.push(d);
      }
    }
  }

  getDistancia(lat1, lon1, lat2, lon2, unit = "K") {
    var radlat1 = Math.PI * lat1/180
    var radlat2 = Math.PI * lat2/180
    var theta = lon1-lon2
    var radtheta = Math.PI * theta/180
    var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
    dist = Math.acos(dist)
    dist = dist * 180/Math.PI
    dist = dist * 60 * 1.1515
    if (unit=="K") { dist = dist * 1.609344 }
    return dist
  }

  filterRestaurantes() {
    for (var i = 0; i < this.distancias.length; i++) {
      let d = this.distancias[i];
      if (d['distancia'] >= this.raio) {
        let index = this.findRestaurante(d['rest_id']);
        this.restaurantes_aux.splice(index, 1);
        this.distancias.splice(i, 1);
      }
    }
  }

  findRestaurante(id: number) {    
    for (var i = 0; i < this.restaurantes_aux.length; i++) {
      let r = this.restaurantes_aux[i];
      if (r['id'] == id) {
        return i;
      }
    }
    return -1;
  }

  setCulinarias(culinarias: any[]) {
    for (var j = 0; j < culinarias.length; j++) {
      let c = new Culinaria(
          culinarias[j]['id'],
          culinarias[j]['idTipo'],
          culinarias[j]['tipo'],
          culinarias[j]['restaurante_id']);
      this.culinarias.push(c);
    }
  }

  setPagamentos(pagamentos: any[]) {
    for (var j = 0; j < pagamentos.length; j++) {
      let p = new Pagamento(
          pagamentos[j]['id'],
          pagamentos[j]['idDescricao'],
          pagamentos[j]['descricao'],
          pagamentos[j]['restaurante_id']);
      this.pagamentos.push(p);
    }
  }

  setProdutos(produtos: any[]) {
    for (var j = 0; j < produtos.length; j++) {
      let p = new Produto(
          produtos[j]['id'],
          produtos[j]['nome'],
          produtos[j]['tipo'],
          produtos[j]['descricao'],
          produtos[j]['preco'],
          produtos[j]['foto'],
          produtos[j]['restaurante_id']);
      this.produtos.push(p);
    }
  }

  setRestaurantes(restaurantes: any) {
    let r = new Restaurante(
        restaurantes['id'],
        restaurantes['nome'],
        restaurantes['cnpj'],
        restaurantes['email'],
        restaurantes['descricao'],
        restaurantes['foto'],
        restaurantes['telefone1'],
        restaurantes['telefone2'],
        restaurantes['tempo_mercado'],
        restaurantes['gerente_id'],
        restaurantes['franqueado_id'],
        this.culinarias,
        this.pagamentos,
        this.produtos,
        this.restaurante_enderecos);
    this.restaurantes.push(r);
  }

  setRestauranteEnderecos(rest_ends: any[]) {
    for (var j = 0; j < rest_ends.length; j++) {
      let re = new RestauranteEndereco(
          rest_ends[j]['restaurante_id'],
          rest_ends[j]['endereco_id'],
          rest_ends[j]['Endereco']);                
      this.restaurante_enderecos.push(re);
    }
  }

  goToRestaurante(rest: Restaurante){
    this.navCtrl.push(RestaurantePage, {restaurante: rest, cliente: this.cliente});    
  }

  goToCarrinho() {
    this.navCtrl.setRoot(CarrinhoPage, {cliente: this.cliente}); 
  }

  listenCarrinho() {
    this.events.subscribe('carrinho:found', () => {
      this.carrinho = true;
    });

    this.events.subscribe('carrinho:not_found', () => {
      this.carrinho = false;
    });
  }
}