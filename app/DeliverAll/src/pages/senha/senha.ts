import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';

import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

import { Link } from '../../models/link';

/**
 * Generated class for the SenhaPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-senha',
  templateUrl: 'senha.html',
})
export class SenhaPage {

	email: string;
	link: Link;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController) {
  	this.link = new Link();
  }

  ionViewDidLoad() {
    
  }

  recuperar() {
  	this.http.post(this.link.api_url + 'clientes/recupera', {'email': this.email})
      .map(res => res.json())
      .subscribe(
        data => {
        	if (data.message == '1') {
        		let toast = this.toastCtrl.create({
	            message: "Uma nova senha foi enviada neste email.",
	            duration: 5000,
	            position: 'bottom'
	          });
	          toast.present();
            this.navCtrl.pop();
        	} else if (data.message == '-1') {
        		let toast = this.toastCtrl.create({
	            message: "Email não encontrado, favor inserir um email válido!",
	            duration: 3000,
	            position: 'top'
	          });
	          toast.present();
        	} else {
        		let toast = this.toastCtrl.create({
	            message: "Erro ao recuperar senha, tente novamente!",
	            duration: 3000,
	            position: 'top'
	          });
	          toast.present();
        	}
        }, 
        err => {
        	console.log(err)
        	let toast = this.toastCtrl.create({
            message: "Erro ao recuperar senha, tente novamente!",
            duration: 3000,
            position: 'top'
          });
          toast.present();
        });
  }
}
