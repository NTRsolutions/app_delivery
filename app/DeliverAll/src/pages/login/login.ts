import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';
import { AppPreferences } from '@ionic-native/app-preferences';
import { CadastroPage } from '../cadastro/cadastro';

import { Http } from '@angular/http';

import 'rxjs/add/operator/map';

/**
 * Generated class for the Login page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})
export class LoginPage {

  public data: any;
  public api_url: string;

  email: string = '';
  senha: string = '';
  id: string = '';
  message: string = '';
  split: string[];

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private appPreferences: AppPreferences, private toastCtrl: ToastController) {
    this.api_url = 'http://192.168.0.13:80/app_delivery/webservice/';    
    this.appPreferences.fetch('key').then((res) => { 
    	let toast = this.toastCtrl.create({
	      message: res,
	      duration: 3000,
	      position: 'top'
	    });
	    
	    toast.present();
    });

    
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad Login');
  }

  /*loginWithGoogle() {
    this.googlePlus.login({})
      .then(res => console.log(res))
      .catch(err => console.error(err));
  }*/

  login() {
    this.http.post(this.api_url + 'clientes/login', {'Cliente': {'email': this.email, 'senha': this.senha}})
      .map(res => res.json())
      .subscribe(data => {
      	this.message = data.message;
      	this.split = this.message.split(',');
      	this.message = this.split[0];
      	this.id = this.split[1];

        if(this.message == 'Logou'){
        	this.appPreferences.store('key', this.id).then((res) => { 
        		let toast = this.toastCtrl.create({
			      message: res,
			      duration: 3000,
			      position: 'top'
			    });
			    
			    toast.present();
        	});
        }
    });
  }

  goToCadastro() {     
  	this.navCtrl.push(CadastroPage);   
  }

}
