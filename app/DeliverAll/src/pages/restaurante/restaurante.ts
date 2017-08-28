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

import { AddProdutoCarrinhoPage } from '../add-produto-carrinho/add-produto-carrinho';
import { CarrinhoPage } from '../carrinho/carrinho';

import { CarrinhoProvider } from '../../providers/carrinho/carrinho';

import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

/**
 * Generated class for the RestaurantePage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-restaurante',
  templateUrl: 'restaurante.html',
})
export class RestaurantePage {

	public link: Link;
  cliente: Cliente;
  restaurante: Restaurante;
  produtos: Produto[];
  foto: boolean;
  carrinho: boolean = false;
	
  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController, public events: Events, public cProv: CarrinhoProvider) {
    this.link = new Link();
    this.produtos = new Array();
    this.restaurante = navParams.get("restaurante");
    this.cliente = navParams.get("cliente");
  }

  ionViewDidLoad() {
    this.produtos = this.restaurante.produtos;
    this.listenCarrinho();
    this.getCarrinho();
  }

  addToCarrinho(p: Produto) {
    this.navCtrl.push(AddProdutoCarrinhoPage, {'produto': p, 'cliente': this.cliente})
  }

  listenCarrinho() {
    this.events.subscribe('carrinho:create', () => {
      this.carrinho = true;
    });

    this.events.subscribe('carrinho:addProdutoErrado', () => {
      let toast = this.toastCtrl.create({
        message: "Produto é de outro restaurante e não pode ser adicionado",
        duration: 5000,
        position: 'bottom'
      });
      toast.present();
    });

    this.events.subscribe('carrinho:addProduto', () => {
      let toast = this.toastCtrl.create({
        message: "Produto adicionado com sucesso!",
        duration: 5000,
        position: 'bottom'
      });
      toast.present();
    });
  }

  getCarrinho() {
    if (this.cProv.getCarrinho() != undefined) {
      this.carrinho = true;
    } else {
      this.carrinho = false;
    }
  }

  goToCarrinho() {
    this.navCtrl.setRoot(CarrinhoPage, {cliente: this.cliente}); 
  }
}
