import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';
import { Cliente } from '../../models/cliente';

import { Http } from '@angular/http';
import { Geolocation } from '@ionic-native/geolocation';
import 'rxjs/add/operator/map';

declare var google;

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

	public api_url: string;
	cliente: Cliente;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController, public geolocation: Geolocation) {
  	this.api_url = 'http://192.168.0.13:80/app_delivery/webservice/';

  	this.cliente = navParams.get("cliente");
  }

  ionViewDidLoad() {
  	this.loadMap();
  }

  loadMap(){
    this.geolocation.getCurrentPosition().then(
    	(position) => { 
 	  		console.log(position.coords.latitude + ' - ' + position.coords.longitude); 	  		
    	}, 
    	(err) => {
      	console.log(err);
    	}
    ); 
  }
}
