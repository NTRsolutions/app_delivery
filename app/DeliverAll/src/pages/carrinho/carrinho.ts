import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, Events } from 'ionic-angular';

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
import { AppPreferences } from '@ionic-native/app-preferences';

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

  constructor(public navCtrl: NavController, public navParams: NavParams, public cProv: CarrinhoProvider, public events: Events, public appPrefs: AppPreferences) {
  	this.cliente = navParams.get("cliente");
  }

  ionViewDidLoad() {
    this.getCarrinho();

    this.listenCarrinho();
  }

  calcTotal() {
  	this.cProv.calc_total(this.carrinho);
  }

  listenCarrinho() { 
    this.events.subscribe('carrinho:empty', () => {
    	this.carrinho_cheio = false;
    });
  }

  revomeProduto(index: any) {
  	console.log('ativou remover');
  	this.cProv.remove_produto(index, this.carrinho);
  	this.calcTotal();
  }

  goToPagamento() {
  	this.navCtrl.push(TipoPagamentoPage, {carrinho: this.carrinho});
  }

  getCarrinho(): any {
  	this.appPrefs.fetch('car', 'carrinho').then((res) => {
      let c: Carrinho = JSON.parse(res);
      this.carrinho = new Carrinho(c.restaurante_id, c.cliente_id);
      this.carrinho.produtos = c.produtos;
      this.carrinho.qtd = c.qtd;      

    	this.calcTotal();
      this.carrinho_cheio = true;
    });
  }
}
