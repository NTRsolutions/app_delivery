import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';
import { Cliente } from '../../models/cliente';
import { Endereco } from '../../models/endereco';

import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

	public api_url: string;
  cliente: Cliente;
	endereco: Endereco;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController) {
  	this.api_url = 'http://192.168.0.13:80/app_delivery/webservice/';

  	this.cliente = navParams.get("cliente");
  }

  ionViewDidLoad() {
  	console.log(this.cliente);
  }
}
