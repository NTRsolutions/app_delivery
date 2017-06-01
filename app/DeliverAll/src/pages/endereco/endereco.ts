import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';
import { Cliente } from '../../models/cliente';

import { HomePage } from '../home/home';
import { Http } from '@angular/http';

import 'rxjs/add/operator/map';

/**
 * Generated class for the Endereco page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-endereco',
  templateUrl: 'endereco.html',
})
export class EnderecoPage {

	public api_url: string;
	public cep_url_ini: string;
	public cep_url_end: string;
	cliente: Cliente;
  cep: string;
  mask: any = "";

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController) {
  	this.api_url = 'http://192.168.0.13:80/app_delivery/webservice/';      
  	this.cep_url_ini = 'http://viacep.com.br/ws/';
  	this.cep_url_end = '/json/?callback=?';

  	this.cliente = navParams.get("cliente");

  	this.mask = [/[1-9]/, /\d/, /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/];
  }

  ionViewDidLoad() {
    if(typeof this.cliente == 'string'){
  		this.http.post(this.api_url + 'clientes/get', {'id': this.cliente})
      .map(res => res.json())
      .subscribe(data => {       
        
        if (typeof data.message == "object") {
          this.cliente = data.message['0']; 
          
          if (this.cliente['ClienteEndereco'].length != 0) {
          	this.goToHome(this.cliente);
          }
        } else {
          let toast = this.toastCtrl.create({
		        message: "Ocorreu algum erro, tente novamente!",
		        duration: 3000,
		        position: 'top'
		      });
		      toast.present();
        }
    	});
  	}
  }

  goToHome(cliente: Cliente){
  	this.navCtrl.setRoot(HomePage, {cliente: this.cliente});
  }

  getEndereco() {
  	console.log("blz");
  	/*this.http.get(this.cep_url_ini + this.cep + this.cep_url_end)
    .map(res => res.json())
    .subscribe(data => {
			      
  	});*/
  }
}
