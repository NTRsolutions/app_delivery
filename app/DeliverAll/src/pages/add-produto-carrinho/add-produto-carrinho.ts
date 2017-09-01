import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController, Events } from 'ionic-angular';
import { AppPreferences } from '@ionic-native/app-preferences';

import { Cliente } from '../../models/cliente';
import { Carrinho } from '../../models/carrinho';
import { Endereco } from '../../models/endereco';
import { Distancia } from '../../models/distancia';
import { Restaurante } from '../../models/restaurante';
import { Culinaria } from '../../models/culinaria';
import { Pagamento } from '../../models/pagamento';
import { Produto } from '../../models/produto';

import { CarrinhoProvider } from '../../providers/carrinho/carrinho';

/**
 * Generated class for the AddProdutoCarrinhoPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-add-produto-carrinho',
  templateUrl: 'add-produto-carrinho.html',
})
export class AddProdutoCarrinhoPage {

	produto: Produto;
	cliente: Cliente;
	carrinho: Carrinho;
  carrinho_cheio: boolean = false;
	qtd: number = 1;
	total: number;

  constructor(public navCtrl: NavController, public navParams: NavParams, private toastCtrl: ToastController, public cProv: CarrinhoProvider, public events: Events) {
  	this.produto = navParams.get('produto');
  	this.cliente = navParams.get('cliente');
  }

  ionViewDidLoad() {
    this.total = this.qtd * this.produto.preco;
    this.cProv.existCarrinho();
    this.listenCarrinho();
  }

  change(event) {
    this.qtd = event._value;
    this.total = this.qtd * this.produto.preco;
  }

  listenCarrinho() {
    this.events.subscribe('carrinho:found', () => {
      this.carrinho_cheio = true;
    });

    this.events.subscribe('carrinho:not_found', () => {
      this.carrinho_cheio = false;
    });
  }

  addToCarrinho() {    
  	if (this.carrinho_cheio) {
      console.log('cheio');
  		this.cProv.add_produto(this.produto, this.qtd);	
  	} else {
      console.log('vazio');
	  	this.cProv.create(this.produto, this.qtd, this.cliente['Cliente']['id'], this.produto.restaurante_id);	  	
    }
  	this.navCtrl.pop();
  }
}
