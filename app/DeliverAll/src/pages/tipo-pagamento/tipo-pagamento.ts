import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController, AlertController, Events } from 'ionic-angular';
import { AppPreferences } from '@ionic-native/app-preferences';

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
import { PedidosPage } from '../pedidos/pedidos';

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
	cliente: Cliente;
	link: Link;
	pags: Pagamento[];
	pags_carregados: boolean = false;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController, public alertCtrl: AlertController, private appPrefs: AppPreferences, public events: Events) {
  	this.carrinho = navParams.get('carrinho');
  	this.cliente = navParams.get('cliente');
  	this.link = new Link();
  	this.pags = new Array();
  	this.rest_id = this.carrinho.restaurante_id;
  }

  ionViewDidLoad() {
    this.getPagamentos(this.rest_id);
    this.carrinho.endereco_id = this.cliente['ClienteEndereco']['0']['endereco_id'];

    console.log('carrinho pag: ');
    console.log(this.carrinho);
    console.log('cliente pag: ');
    console.log(this.cliente);
  }

  getPagamentos(id: number) {  	
  	this.http.post(this.link.api_url + 'pagamentos/get', {'id': id})
      .map(res => res.json())
      .subscribe(data => {
      	for (var i = 0; i < data.message.length; i++) {
      		let p = new Pagamento(data.message[i]['Pagamento']['id'], data.message[i]['Pagamento']['idDescricao'], data.message[i]['Pagamento']['descricao'], data.message[i]['Pagamento']['restaurante_id']);
      		this.pags.push(p);
      	}
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

  select(id, descricao) {    
    this.carrinho.pagamento_id = id;

    if (descricao.indexOf("inheiro") >= 0) {
    	this.setTroco();
    } else {
    	this.carrinho.troco = null;
    }
  }

  confirmaPedido() {
  	if (this.carrinho.pagamento_id == null) {
  		let toast = this.toastCtrl.create({
        message: "Por favor, selecione uma forma de pagamento",
        duration: 3000,
        position: 'top'
      });
      toast.present()
  	} else {
	  	this.http.post(this.link.api_url + 'pedidos/add', {'Pedido': this.carrinho})
	      .map(res => res.json())
	      .subscribe(
	      	data => {
	      		if (data.message == '1') {	
	      			this.pags_carregados = false;
				      this.appPrefs.remove('car', 'carrinho').then((res) => {
				        if (res != '') {
				          this.events.publish('carrinho:empty');
				          let toast = this.toastCtrl.create({
					          message: "Seu pedido foi realizado com sucesso!",
					          duration: 3000,
					          position: 'top'
					        });
					        toast.present()
					        this.carrinho = undefined;
					        this.navCtrl.setRoot(PedidosPage, {id: this.cliente['Cliente']['id']})
				        }
				      });
	      		}
	      	},
	      	err => {
	      		console.log(err);
	      		let toast = this.toastCtrl.create({
		          message: "Erro ao registrar pedido, por favor tente novamente",
		          duration: 3000,
		          position: 'top'
		        });
		        toast.present()
	      	}
	      );
	  }
  }

  setTroco() {
    let confirm = this.alertCtrl.create({
      title: 'Troco',
      message: 'Deseja troco para quanto? Se não precisar, clique em Cancelar',
      inputs: [
	      {
	        name: 'troco',
	        placeholder: 'Ex: 10',
	        type: 'number'
	      }
	    ],
      buttons: [
        {
          text: 'Cancelar',
          handler: () => {
            this.carrinho.troco = null
          }
        },
        {
          text: 'Confirmar',
          handler: (data) => {
           	this.carrinho.troco = data.troco             
          }
        }
      ]
    });
    confirm.present();
  }
}
