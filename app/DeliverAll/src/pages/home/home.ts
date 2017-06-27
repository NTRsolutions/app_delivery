import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';
import { Cliente } from '../../models/cliente';
import { Endereco } from '../../models/endereco';
import { Distancia } from '../../models/distancia';

import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

@IonicPage()
@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})

export class HomePage {

	public api_url: string;
  cliente: Cliente;
	enderecos: Endereco[];
  enderecos_id: Array<number>;
  restaurantes: Array<any>;
  restaurantes_aux: Array<any>;
  distancias: Array<Distancia>;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController) {
  	this.api_url = 'http://192.168.0.13:80/app_delivery/webservice/';

  	this.cliente = navParams.get("cliente");
    this.enderecos_id = new Array();
    this.distancias = new Array();
    this.restaurantes = new Array();
    this.restaurantes_aux = new Array();
  }

  ionViewDidLoad() {  	
    this.getEnderecos();    
  }

  getEnderecos() {
    for (var i = 0; i < this.cliente['ClienteEndereco'].length; i++) {
      this.enderecos_id.push(this.cliente['ClienteEndereco'][i]['endereco_id']);
    }

    this.http.post(this.api_url + 'enderecos/get', {'ids': this.enderecos_id})
      .map(res => res.json())
      .subscribe(
        data => {
          this.enderecos = data.message;
          if (this.enderecos.length == 1) {
            this.getRestaurantes(this.enderecos[0]['Endereco']);
          } else {
            let index = this.getEnderecoAtivo(this.enderecos)
            this.getRestaurantes(this.enderecos[index]['Endereco']);
          }
        },
        err => {
          let toast = this.toastCtrl.create({
            message: "Ocorreu algum erro, tente novamente!",
            duration: 3000,
            position: 'top'
          });
          toast.present();
        }
      );
  }

  getRestaurantes(end: Endereco) {
    this.http.post(this.api_url + 'restaurantes/get', {'cidade_id': end['cidade_id']})
      .map(res => res.json())
      .subscribe(
        data => {
          this.restaurantes = data.message;
          this.restaurantes_aux = this.restaurantes;
          console.log(end);
          console.log(this.restaurantes);

          this.calcDistancias(end);
          console.log(this.distancias);
        },
        err => {
          let toast = this.toastCtrl.create({
            message: "Ocorreu algum erro, tente novamente!",
            duration: 3000,
            position: 'top'
          });
          toast.present();
        }
      );
  }

  getEnderecoAtivo(ends: Endereco[]) {
    for (var i = 0; i < ends.length; i++) {
      if(ends[i]['Endereco']['ativo'] == true) {
        return i;
      }
    }
    return 0;
  }

  calcDistancias(end: Endereco) {
    for (var i = 0; i < this.restaurantes_aux.length; i++) {
      let r = this.restaurantes_aux[i];
      let e = r['RestauranteEndereco']['0']['Endereco']
      let d: Distancia = {'rest_id': 0, 'distancia': 0};
      d.rest_id = r['Restaurante']['id'];      
      d.distancia = this.getDistancia(end['lat'], end['lng'], e['lat'], e['lng']);
      this.distancias.push(d);
    }
  }

  getDistancia(lat1, lon1, lat2, lon2, unit = "K") {
    var radlat1 = Math.PI * lat1/180
    var radlat2 = Math.PI * lat2/180
    var theta = lon1-lon2
    var radtheta = Math.PI * theta/180
    var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
    dist = Math.acos(dist)
    dist = dist * 180/Math.PI
    dist = dist * 60 * 1.1515
    if (unit=="K") { dist = dist * 1.609344 }
    return dist
  }
}
