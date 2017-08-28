import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';

import { Cliente } from '../../models/cliente';
import { Carrinho } from '../../models/carrinho';
import { Endereco } from '../../models/endereco';
import { Distancia } from '../../models/distancia';
import { Restaurante } from '../../models/restaurante';
import { Culinaria } from '../../models/culinaria';
import { Pagamento } from '../../models/pagamento';
import { Produto } from '../../models/produto';
import { RestauranteEndereco } from '../../models/restaurante_endereco';
import { AddProdutoCarrinhoPage } from '../add-produto-carrinho/add-produto-carrinho';

import { Link } from '../../models/link';

import { Http } from '@angular/http';

import 'rxjs/add/operator/map';


/**
 * Generated class for the TipoPagamentoPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-tipo-pagamento',
  templateUrl: 'tipo-pagamento.html',
})
export class TipoPagamentoPage {

	rest_id: number;
	carrinho: Carrinho;
	link: Link;
	pags: Pagamento[];
	pags_carregados: boolean = false;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController) {
  	this.carrinho = navParams.get('carrinho');
  	this.link = new Link();
  	this.pags = new Array();
  	this.rest_id = this.carrinho.restaurante_id;
  }

  ionViewDidLoad() {
    this.getPagamentos(this.rest_id);
  }

  getPagamentos(id: number) {  	
  	this.http.post(this.link.api_url + 'pagamentos/get', {'id': id})
      .map(res => res.json())
      .subscribe(data => {
      	for (var i = 0; i < data.message.length; i++) {
      		let p = new Pagamento(data.message[i]['Pagamento']['id'], data.message[i]['Pagamento']['idDescricao'], data.message[i]['Pagamento']['descricao'], data.message[i]['Pagamento']['restaurante_id']);
      		this.pags.push(p);
      	}
      	console.log(this.pags);
      	this.pags_carregados = true;
    	},
      err => {
        let toast = this.toastCtrl.create({
          message: "Erro ao recuperar dados de pagamento, por favor tente novamente",
          duration: 3000,
          position: 'top'
        });
        toast.present()
      });
  }
}
