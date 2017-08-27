import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';

import { Cliente } from '../../models/cliente';
import { Endereco } from '../../models/endereco';
import { Restaurante } from '../../models/restaurante';
import { Produto } from '../../models/produto';
import { PedidoProduto } from '../../models/pedido_produto';
import { Pedido } from '../../models/pedido';
import { Link } from '../../models/link';

import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

/**
 * Generated class for the PedidosPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-pedidos',
  templateUrl: 'pedidos.html',
})
export class PedidosPage {

	public link: Link;
  cliente: Cliente;
  restaurantes: Restaurante[];
  produtos: Produto[];
  pedido_produtos: PedidoProduto[];
  pedido_produtos_aux: Array<any>;
  pedidos: Pedido[];
  id: number;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController) {
  	this.link = new Link();
    //this.produtos = new Array();    
    //this.restaurantes = new Array();
    this.pedidos = new Array();
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
          
          this.setPedidos(this.cliente['Pedido']);
          this.getRests();
          this.getPedidoProdutos();
          this.setPedidoProdutos(this.pedido_produtos);
          this.getProdutos();
          console.log(this.pedidos);
					console.log(this.pedido_produtos);
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

  setPedidoProdutos(pp: any[]) {
  	this.pedido_produtos = new Array();
  	for (var j = 0; j < pp.length; j++) {
      let p = new PedidoProduto(
          pp[j]['qtd'],
          pp[j]['produto_id'],
          pp[j]['pedido_id']);
      //p.produto = this.getProduto(pp[j]['produto_id']);
      this.pedido_produtos.push(p);
    }
  }

  getPedidoProdutos() {
  	for (var i = 0; i < this.pedidos.length; i++) {
	  	this.http.post(this.link.api_url + 'pedidoProdutos/get', {'id': this.pedidos[i].id})
	      .map(res => res.json())
	      .subscribe(data => {               
	        let pp = data.message['0'];
	        this.setPedidoProdutos(pp);
	        this.pedidos[i].pedido_produto = this.pedido_produtos;
	    	},
	      err => {
	        let toast = this.toastCtrl.create({
	          message: "Erro ao recuperar produto, por favor tente novamente",
	          duration: 3000,
	          position: 'top'
	        });
	        toast.present()
	      });  		
  	}
  }

  setPedidos(pedidos: any[]) {
  	for (var j = 0; j < pedidos.length; j++) {
      let p = new Pedido(
          pedidos[j]['id'],
          pedidos[j]['total'],
          pedidos[j]['status'],
          pedidos[j]['data'],
          pedidos[j]['troco'],
          pedidos[j]['cliente_id'],
          pedidos[j]['endereco_id'],
          pedidos[j]['restaurante_id'],
          pedidos[j]['pagamento_id']);
      //p.restaurante = this.getRest(pedidos[j]['restaurante_id']);
      this.pedidos.push(p);
    }
  }

  getProdutos() {
  	for (var i = 0; i < this.pedido_produtos.length; i++) {
	  	this.http.post(this.link.api_url + 'produtos/get', {'id': this.pedido_produtos[i].produto_id})
	      .map(res => res.json())
	      .subscribe(data => {               
	        let r = data.message['0'];
	        this.pedido_produtos[i].produto = r['Produto']['nome'];
	    	},
	      err => {
	        let toast = this.toastCtrl.create({
	          message: "Erro ao recuperar produto, por favor tente novamente",
	          duration: 3000,
	          position: 'top'
	        });
	        toast.present()
	      });  		
  	}
  }

  getRests() {
  	for (var i = 0; i < this.pedidos.length; i++) {
	  	this.http.post(this.link.api_url + 'restaurantes/getById', {'id': this.pedidos[i].restaurante_id})
	      .map(res => res.json())
	      .subscribe(data => {               
	        let r = data.message['0'];
	        this.pedidos[i].restaurante = r['Restaurante']['nome'];
	    	},
	      err => {
	        let toast = this.toastCtrl.create({
	          message: "Erro ao recuperar restaurante, por favor tente novamente",
	          duration: 3000,
	          position: 'top'
	        });
	        toast.present()
	      });  		
  	}
  }
}
