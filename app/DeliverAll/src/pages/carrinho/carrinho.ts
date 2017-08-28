import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

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
import { TipoPagamentoPage } from '../tipo-pagamento/tipo-pagamento';

import { Link } from '../../models/link';

import { CarrinhoProvider } from '../../providers/carrinho/carrinho';

import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

/**
 * Generated class for the CarrinhoPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-carrinho',
  templateUrl: 'carrinho.html',
})
export class CarrinhoPage {

	cliente: Cliente;
	carrinho_cheio: boolean = false;
	carrinho: Carrinho;

  constructor(public navCtrl: NavController, public navParams: NavParams, public cProv: CarrinhoProvider) {
  	this.cliente = navParams.get("cliente");
  }

  ionViewDidLoad() {
    this.getCarrinho();
    if (this.carrinho_cheio) {
    	this.calcTotal();
    }
  }

  removeProduto() {

  }

  calcTotal() {
  	this.cProv.calc_total(this.carrinho);
  }

  getCarrinho() {
  	this.carrinho = this.cProv.getCarrinho();
  	if (this.carrinho != undefined) {
			this.carrinho_cheio = true;
		} else {
			this.carrinho_cheio = false;
		}
  }

  revomeProduto(p: Produto) {
  	console.log('ativou remover');
  	this.cProv.remove_produto(p, this.carrinho);
  }

  goToPagamento() {
  	this.navCtrl.push(TipoPagamentoPage, {carrinho: this.carrinho});
  }
}
