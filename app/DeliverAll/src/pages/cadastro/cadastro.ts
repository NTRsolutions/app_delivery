import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';

import { Http } from '@angular/http';

import 'rxjs/add/operator/map';

/**
 * Generated class for the Cadastro page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-cadastro',
  templateUrl: 'cadastro.html',
})
export class CadastroPage {

  public data: any;
  public api_url: string;

  nome: string = '';
  email: string = '';
  senha: string = '';

  constructor(private toastCtrl: ToastController, public navCtrl: NavController, public navParams: NavParams, public http: Http) {
    this.api_url = 'http://localhost/app_delivery/webservice/';
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad Cadastro');
  }

  usuario_add() {
    this.http.post(this.api_url + 'clientes/add', {'Cliente': {'nome': this.nome, 'email': this.email, 'senha': this.senha}})
      .map(res => res.json())
      .subscribe(data => {
        console.log(data.message);
    });
  

    /*let toast = this.toastCtrl.create({
      message: this.nome,
      duration: 3000,
      position: 'top'
    });

    toast.onDidDismiss(() => {
      console.log('Dismissed toast');
    });

    toast.present();*/

  }

}
