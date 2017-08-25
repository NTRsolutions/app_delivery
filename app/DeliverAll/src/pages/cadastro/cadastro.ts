import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController, Events } from 'ionic-angular';
import { AppPreferences } from '@ionic-native/app-preferences';

import { Cliente } from '../../models/cliente';
import { EnderecoPage } from '../endereco/endereco';
import { Link } from '../../models/link';

import { LogineventProvider } from '../../providers/loginevent/loginevent';

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
  public link: Link;

  nome: string = '';
  email: string = '';
  senha: string = '';
  cliente: Cliente;

  constructor(private toastCtrl: ToastController, public navCtrl: NavController, public navParams: NavParams, public http: Http, private appPreferences: AppPreferences, public loginevent: LogineventProvider) {
    this.link = new Link();
  }

  ionViewDidLoad() {
    
  }

  usuario_add() {
    if (this.validaCampos()) {
      this.http.post(this.link.api_url + 'clientes/add', {'Cliente': {'nome': this.nome, 'email': this.email, 'senha': this.senha}})
        .map(res => res.json())
        .subscribe(data => {
          if (typeof data.message == "object") {
            this.cliente = data.message['0'];
            this.appPreferences.store('key', this.cliente['Cliente']['id'].toString()).then((res) => { 
              this.loginevent.cadastro();
              this.goToEndereco(0);
            });
          } else {
            this.toast(data.message);
          }
      });
    } else {
       let toast = this.toastCtrl.create({
        message: "Preencha os campos, por gentileza",
        duration: 3000,
        position: 'top'
      });
      toast.present();
    }
  }

  toast(cod: Number) {
    switch (cod) {      
      case -2:
        let toast = this.toastCtrl.create({
          message: "Usuário já existe, tente novamente",
          duration: 3000,
          position: 'top'
        });
        toast.present();
        break;

      case -10:
        toast = this.toastCtrl.create({
          message: "Ocorreu algum erro, tente novamente",
          duration: 3000,
          position: 'top'
        });
        toast.present();
        break;
    }    
  }

  goToEndereco(id: number) {     
    if (id != 0) {
      this.navCtrl.setRoot(EnderecoPage, {cliente: id});
    } else {
      this.navCtrl.setRoot(EnderecoPage, {cliente: this.cliente});
    }
  }

  validaCampos() {
    if (this.nome == "" || this.email == "" || this.senha == "") {
      return false;
    }
    return true;
  }
}
