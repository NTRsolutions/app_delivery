import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController} from 'ionic-angular';
import { Cliente } from '../../models/cliente';
import { Link } from '../../models/link';

import { Http } from '@angular/http';

import 'rxjs/add/operator/map';

/**
 * Generated class for the MeuPerfilPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-meu-perfil',
  templateUrl: 'meu-perfil.html',
})
export class MeuPerfilPage {

	id: any;
	cliente: Cliente;
	link: Link;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController) {
  	this.link = new Link();

  	this.id = navParams.get("id");
  }

  ionViewDidLoad() {
    this.getCliente();
  }

  getCliente() {
  	this.http.post(this.link.api_url + 'clientes/get', {'id': this.id})
      .map(res => res.json())
      .subscribe(data => {       
        
        if (typeof data.message == "object") {
          this.cliente = data.message['0']; 

          console.log(this.cliente);
          
          if (this.cliente['ClienteEndereco'].length != 0) {
          	
          }
        } else {
          let toast = this.toastCtrl.create({
		        message: "Ocorreu algum erro, tente novamente!",
		        duration: 3000,
		        position: 'top'
		      });
		      toast.present();
        }
    	},
      err => {
        let toast = this.toastCtrl.create({
          message: "Erro, por favor tente novamente",
          duration: 3000,
          position: 'top'
        });
        toast.present()
      });
  }
}
