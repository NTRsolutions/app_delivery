import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

import { Cliente } from '../../models/cliente';
import { Endereco } from '../../models/endereco';
import { Distancia } from '../../models/distancia';
import { Restaurante } from '../../models/restaurante';
import { Culinaria } from '../../models/culinaria';
import { Pagamento } from '../../models/pagamento';
import { Produto } from '../../models/produto';

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

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  	
  }

  ionViewDidLoad() {
    
  }

}
