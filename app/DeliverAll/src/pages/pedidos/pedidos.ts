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
  restaurantes: string[];
  produtos: Produto[];
  pedido_produtos: PedidoProduto[];
  pedido_produtos_aux: Array<any>;
  pedidos: Pedido[];
  pedidos_abertos: Pedido[];
  pedidos_fechados: Pedido[];
  id: number;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController) {
  	this.link = new Link();
    //this.produtos = new Array();    
    this.restaurantes = new Array();
    this.pedidos = new Array();
    this.pedidos_abertos = new Array();
    this.pedidos_fechados = new Array();
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
          //console.log(this.pedidos);
          this.getRests();          
          /*this.getProdutos();
          console.log(this.pedidos);
					console.log(this.pedido_produtos);*/
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
        pp[j]['PedidoProduto']['qtd'],
        pp[j]['PedidoProduto']['produto_id'],
        pp[j]['PedidoProduto']['pedido_id']);
      p.produto = pp[j]['Produto']['nome'];
      p.preco = pp[j]['Produto']['preco'];
      this.pedido_produtos.push(p);
    }
  }

  getPedidoProdutos() {
  	let ids = new Array();
		for (var i = 0; i < this.pedidos.length; i++) {
			ids.push(this.pedidos[i].id);
		}

  	this.http.post(this.link.api_url + 'pedidoProdutos/get', {'ids': ids})
      .map(res => res.json())
      .subscribe(data => {               
        let pp = data.message;              
        this.setPedidoProdutos(pp);
        //console.log(this.pedido_produtos);
        this.addPPToPedidos();
        this.splitStatus();
        //console.log(this.pedidos_abertos);
        //console.log(this.pedidos_fechados);
    	},
      err => {
        let toast = this.toastCtrl.create({
          message: "Erro ao recuperar produtos, por favor tente novamente",
          duration: 3000,
          position: 'top'
        });
        toast.present()
      });
  }

  setPedidos(pedidos: any[]) {
    for (var j = 0; j < pedidos.length; j++) {
      let status = this.setStatus(pedidos[j]['status'])
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
      p.status_nome = status;
      this.pedidos.push(p);
    }    
  }

  setStatus(id: any) {
    switch (id) {
      case "0":
        return "Pendente"
      case "1":
        return "Em preparo"
      case "2":
        return "À caminho"
      case "3":
        return "Entregue"
      default:
        // code...
        break;
    }
  }

  getRests() {
		let ids = new Array();
		for (var i = 0; i < this.pedidos.length; i++) {
			ids.push(this.pedidos[i].restaurante_id);
		}

  	this.http.post(this.link.api_url + 'restaurantes/getById', {'ids': ids})
      .map(res => res.json())
      .subscribe(data => {
        let r = data.message;
        this.setRestsNames(r);
        this.getPedidoProdutos();
    	},
      err => {
        let toast = this.toastCtrl.create({
          message: "Erro ao recuperar restaurantes, por favor tente novamente",
          duration: 3000,
          position: 'top'
        });
        toast.present()
      });
  }

  setRestsNames(r: any[]) {
  	for (var i = 0; i < r.length; i++) {
  		this.pedidos[i].restaurante = r[i]['Restaurante']['nome'];
  	}
  }

  addPPToPedidos() {
  	for (var i = 0; i < this.pedidos.length; i++) {
    	this.pedidos[i].pedido_produto = new Array<PedidoProduto>();
    	for (var j = 0; j < this.pedido_produtos.length; j++) {    		
	    	if (this.pedidos[i].id == this.pedido_produtos[j].pedido_id) {
	    		this.pedidos[i].pedido_produto.push(this.pedido_produtos[j]);
	    	}
    	}
    }
  }

  splitStatus() {
  	for (var i = 0; i < this.pedidos.length; i++) {
  		if (this.pedidos[i].status == 3) {
  			this.pedidos_fechados.push(this.pedidos[i]);
  		} else {
  			this.pedidos_abertos.push(this.pedidos[i]);
  		}
  	}
  }
}
