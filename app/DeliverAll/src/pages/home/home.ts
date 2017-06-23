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
    this.getEnderecos();    
  }

  getEnderecos() {
    this.http.post(this.api_url + 'enderecos/get', {'ids': this.cliente['ClienteEndereco']})
      .map(res => res.json())
      .subscribe(
        data => {
          console.log(data.message);
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
}
