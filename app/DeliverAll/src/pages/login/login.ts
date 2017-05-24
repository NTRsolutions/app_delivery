import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
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

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http) {
    this.api_url = 'http://localhost/app_delivery/webservice/';
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
        console.log(data.message);
    });
  }

  goToCadastro() {     
  	this.navCtrl.push(CadastroPage);   
  }

}
