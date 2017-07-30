import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';
import { Cliente } from '../../models/cliente';
import { Endereco } from '../../models/endereco';
import { Distancia } from '../../models/distancia';
import { Restaurante } from '../../models/restaurante';
import { Classificacao } from '../../models/classificacao';
import { Culinaria } from '../../models/culinaria';
import { Pagamento } from '../../models/pagamento';
import { Produto } from '../../models/produto';
import { RestauranteEndereco } from '../../models/restaurante_endereco';
import { Link } from '../../models/link';

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
	
  /* Variáveis de filtro */
  raio: number = 8;
  /* ------------------- */

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController) {
  	this.link = new Link();

  	this.restaurante = navParams.get("restaurante");
  }

  ionViewDidLoad() {
    
  }

}
