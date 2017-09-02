import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController, Events} from 'ionic-angular';
import { Cliente } from '../../models/cliente';
import { ClienteEndereco } from '../../models/cliente_endereco';
import { Endereco } from '../../models/endereco';
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
	cliente_ends: ClienteEndereco[];
	ends: Endereco[];
	enderecos_id: Array<number>;
	link: Link;
	edit_block: boolean = true;
	nome: string;
	email: string;
	telefone1: string;
	telefone2: string;
	senha: string;
	nova_senha: string;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController, public events: Events) {
  	this.link = new Link();
  	this.cliente_ends = new Array();
  	this.enderecos_id = new Array();
  	this.ends = new Array();

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
          this.setEnderecos(this.cliente['ClienteEndereco']);
          this.getEnderecos();

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
          message: "Erro ao recuperar dados do usuário, por favor tente novamente",
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
	  		this.http.post(this.link.api_url + 'clientes/edit', 
	  											{'id': this.id,
	  											 'nome': this.nome, 
	  											 'email': this.email,
	  											 'telefone1': this.telefone1,
	  											 'telefone2': this.telefone2,
	  											 'senha': ""
	  											})
		      .map(res => res.json())
		      .subscribe(data => {
		      	if (data.message == "1") { 
		      		let toast = this.toastCtrl.create({
			          message: "Dados salvos com sucesso!",
			          duration: 3000,
			          position: 'top'
			        });
			        toast.present()
			        this.edit_block = true;
			        this.senha = "";
  						this.nova_senha = "";

              /* evento de salvar */
              this.events.publish('user:salvar');
		      	} else {
		      		let toast = this.toastCtrl.create({
			          message: "Erro ao salvar, por favor tente novamente",
			          duration: 3000,
			          position: 'top'
			        });
			        toast.present()
		      	}
		    	},
		      err => {
		        let toast = this.toastCtrl.create({
		          message: "Erro ao salvar, por favor tente novamente",
		          duration: 3000,
		          position: 'top'
		        });
		        toast.present()
		      });
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

  editEndereco(end: Endereco) {
  	this.navCtrl.push(EnderecoPage, {cliente: this.cliente, end: end, edit_end: true});
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
      		this.http.post(this.link.api_url + 'clientes/edit', 
	  											{'id': this.id,
	  											 'nome': this.nome, 
	  											 'email': this.email,
	  											 'telefone1': this.telefone1,
	  											 'telefone2': this.telefone2,
	  											 'senha': this.nova_senha
	  											})
		      .map(res => res.json())
		      .subscribe(data => {
		      	if (data.message == "1") {
		      		let toast = this.toastCtrl.create({
			          message: "Dados salvos com sucesso!",
			          duration: 3000,
			          position: 'top'
			        });
			        toast.present()
			        this.edit_block = true;
			        this.senha = "";
  						this.nova_senha = "";	

              /* evento de salvar */
              this.events.publish('user:salvar');        
		      	} else {
		      		let toast = this.toastCtrl.create({
			          message: "Erro ao salvar, por favor tente novamente",
			          duration: 3000,
			          position: 'top'
			        });
			        toast.present()
		      	}
		    	},
		      err => {
		        let toast = this.toastCtrl.create({
		          message: "Erro ao salvar, por favor tente novamente",
		          duration: 3000,
		          position: 'top'
		        });
		        toast.present()
		      });
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
          message: "Erro ao validar senha, por favor tente novamente",
          duration: 3000,
          position: 'top'
        });
        toast.present()
      });
  	}
  }

  setEnderecos(ends: any[]) {
  	for (var j = 0; j < ends.length; j++) {
      let ce = new ClienteEndereco(
          ends[j]['cliente_id'],
          ends[j]['endereco_id']);
      this.cliente_ends.push(ce);
    }
  }

  getEnderecos() {
  	for (var j = 0; j < this.cliente_ends.length; j++) {
  		this.enderecos_id.push(this.cliente_ends[j].endereco_id);
  	}

		this.http.post(this.link.api_url + 'enderecos/get', {'ids': this.enderecos_id})
    .map(res => res.json())
    .subscribe(data => {
    	for (var j = 0; j < data.message.length; j++) {
				let e = new Endereco(
					data.message[j]['Endereco']['id'],
					data.message[j]['Endereco']['numero'],
					data.message[j]['Endereco']['rua'],
					data.message[j]['Endereco']['bairro'],
					data.message[j]['Cidade']['nome'],
					data.message[j]['Cidade']['estado_id'],
					data.message[j]['Endereco']['complemento'],
					data.message[j]['Endereco']['cep'],
					data.message[j]['Endereco']['lat'],
					data.message[j]['Endereco']['lng']
				);
				this.ends.push(e);
			}
  	});  	
  }
}
