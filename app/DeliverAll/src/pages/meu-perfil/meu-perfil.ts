import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController} from 'ionic-angular';
import { Cliente } from '../../models/cliente';
import { ClienteEndereco } from '../../models/cliente_endereco';
import { Link } from '../../models/link';

import { EnderecoPage } from '../endereco/endereco';

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
	cliente_ends: ClienteEndereco;
	link: Link;
	edit_block: boolean = true;
	nome: string;
	email: string;
	telefone1: string;
	telefone2: string;
	senha: string;
	nova_senha: string;

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
          this.cliente_ends = this.cliente['ClienteEndereco'];
          console.log(this.cliente_ends);
          this.setInputs();
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

  editar() {
  	this.edit_block = false;
  }

  salvar() {
  	if (this.validaCampos()) {
	  	if (this.senha == "") { /* salva sem senha */
	  		
	  	} else {
	  		this.validaSenha();
	  	} 
  	} else {
       let toast = this.toastCtrl.create({
        message: "Preencha os campos de nome e email, por gentileza",
        duration: 3000,
        position: 'top'
      });
      toast.present();
    }
  }

  cancelar() {
  	this.edit_block = true;
  	this.setInputs();
  }

  setInputs() {
  	this.nome = this.cliente['Cliente']['nome'];
  	this.email = this.cliente['Cliente']['email'];
  	this.telefone1 = this.cliente['Cliente']['telefone1'];
  	this.telefone2 = this.cliente['Cliente']['telefone2'];
  	this.senha = "";
  	this.nova_senha = "";
  }

  addEndereco() {
  	this.navCtrl.push(EnderecoPage, {cliente: this.cliente, novo_end: true});
  }

  editEndereco() {
  	this.navCtrl.push(EnderecoPage, {cliente: this.cliente, edit_end: true});
  }

  validaCampos() {
    if (this.nome == "" || this.email == "") {
      return false;
    }
    return true;
  }

  validaSenha() {
  	if(this.nova_senha == "") {
  		let toast = this.toastCtrl.create({
        message: "Por favor, preencha o campo com a nova senha",
        duration: 3000,
        position: 'top'
      });
      toast.present()
  	} else {
  		this.http.post(this.link.api_url + 'clientes/check_senha', {'senha1': this.senha, 'senha2': this.cliente['Cliente']['senha']})
      .map(res => res.json())
      .subscribe(data => {
      	if (data.message == "1") { /* salva com senha */
      		
      	} else {
      		let toast = this.toastCtrl.create({
	          message: "Erro, senha inserida não bate com senha atual",
	          duration: 3000,
	          position: 'top'
	        });
	        toast.present()
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

  getEnderecos() {

  }
}
