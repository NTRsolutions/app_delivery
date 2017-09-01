import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';
import { Cliente } from '../../models/cliente';
import { Endereco } from '../../models/endereco';
import { Link } from '../../models/link';

import { HomePage } from '../home/home';
import { Http } from '@angular/http';
import { Geolocation } from '@ionic-native/geolocation';
import { NativeGeocoder, NativeGeocoderReverseResult, NativeGeocoderForwardResult } from '@ionic-native/native-geocoder';

import 'rxjs/add/operator/map';

/**
 * Generated class for the Endereco page.
 *z'
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-endereco',
  templateUrl: 'endereco.html',
})
export class EnderecoPage {

	public link: Link;
	cliente: Cliente;
  end: Endereco;
  mask: any = "";
  cep_informado: boolean = false;
  rodou_geolocation: boolean = false;
  edit_end: boolean = false;
  
  cep: string;
  rua: string;
  numero: number;
  complemento: string;
  bairro: string;
  cidade: string;
  estado: string;
  estados: string[];
  lat: number;
  lng: number;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController, public geolocation: Geolocation, public geocoder: NativeGeocoder) {
  	this.link = new Link();

  	this.cliente = navParams.get("cliente");
    this.edit_end = navParams.get("edit_end");
    this.end = navParams.get("end");

  	this.mask = [/[1-9]/, /\d/, /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/];
  }

  ionViewDidLoad() {
    if(typeof this.cliente == 'string'){
      console.log("id: " + this.cliente);

  		this.http.post(this.link.api_url + 'clientes/get', {'id': this.cliente})
      .map(res => res.json())
      .subscribe(data => {
        console.log('pegou cliente');
        this.cliente = data.message['0']; 
        
        if (this.cliente['ClienteEndereco'].length != 0) {
        	this.goToHome(this.cliente);
        }
    	},
      err => {
        console.log(err);
        let toast = this.toastCtrl.create({
          message: "Erro ao recuperar dados do usuário, por favor tente novamente",
          duration: 3000,
          position: 'top'
        });
        toast.present()
      });
  	} else if (this.cliente['ClienteEndereco'].length != 0 && this.edit_end == false) {
      this.goToHome(this.cliente);
    } else {
      console.log(this.cliente);
      console.log(this.end);
    }
  }

  goToHome(cliente: Cliente){
    this.navCtrl.setRoot(HomePage, {cliente: this.cliente});  	
  }

  getEndereco() {
    if (this.cep != undefined) {
      this.cep = this.cep.replace("_","");
    }

    if (this.cep != undefined && this.cep.length != 1 && this.cep.indexOf('_') == -1) {
      this.limpar_inputs();

    	this.http.get(this.link.cep_url_ini + this.cep + this.link.cep_url_end)
      .map(res => res.json())
      .subscribe(
        data => {
          if (data['erro'] == true) {
            let toast = this.toastCtrl.create({
              message: "Desculpe, não encontramos este CEP. Informe um válido",
              duration: 5000,
              position: 'top'
            });
            toast.present();
          } else {
    			  this.cep_informado = true;
    			  this.preencher_inputs(data);            
          }
    	  },
        err => {
          let toast = this.toastCtrl.create({
            message: "Desculpe, não encontramos este CEP. Informe um válido",
            duration: 5000,
            position: 'top'
          });
          toast.present();
        });
    } else {
      let toast = this.toastCtrl.create({
        message: "Por favor, informe um CEP",
        duration: 3000,
        position: 'top'
      });
      toast.present();
    }
  }

  getLocation() {    
    this.limpar_inputs();
    this.geolocation.getCurrentPosition().then(
      (position) => { 
         this.getAddress(position);
      }, 
      (err) => {
        let toast = this.toastCtrl.create({
          message: "Erro ao recuperar localização, por favor tente novamente",
          duration: 3000,
          position: 'top'
        });
        toast.present()
      }
    ); 
  }

  getAddress(pos) {
    this.geocoder.reverseGeocode(pos.coords.latitude, pos.coords.longitude).then((res: NativeGeocoderReverseResult) => {
      this.cep = res.postalCode;
      this.lat = pos.coords.latitude;
      this.lng = pos.coords.longitude;
      console.log(this.lat + ', ' + this.lng);
      this.rodou_geolocation = true;
      this.getEndereco();
    },
    (err) => {
      let toast = this.toastCtrl.create({
        message: "Erro ao converter latitude e longitude, por favor tente novamente",
        duration: 3000,
        position: 'top'
      });
      toast.present()
    })
  }

  getLatLong(address: string) {
    console.log(address);
    this.geocoder.forwardGeocode(address).then((res: NativeGeocoderForwardResult) => {
      this.lat = +res.latitude;
      this.lng = +res.longitude;
      console.log(this.lat + ', ' + this.lng);
    },
    (err) => {
      let toast = this.toastCtrl.create({
        message: "Erro ao converter endereço, por favor tente novamente",
        duration: 3000,
        position: 'top'
      });
      toast.present()
    })
  }

  preencher_inputs(endereco: Object){
  	if (endereco['logradouro'] != '') {
  		this.rua = endereco['logradouro'];
  	}

  	if (endereco['bairro'] != '') {
  		this.bairro = endereco['bairro'];
  	}

  	if (endereco['localidade'] != '') {
  		this.cidade = endereco['localidade'];
  	}

  	if (endereco['uf'] != '') {
  		this.estado = endereco['uf'];
  	}
  }

  limpar_inputs() {
    this.rua = '';
    this.numero = null;
    this.complemento = '';
    this.bairro = '';
    this.cidade = '';
    this.estado = '';
  }

  validar() {
  	if (this.cep == '' || this.rua == '' || this.cidade == '' || this.estado == '') {
  		return false;
  	}

  	return true;
  }

  valida_endereco(){
    if (this.validar()) {
      if (!this.rodou_geolocation) {
        let address = this.rua + ' ' + this.numero + ' ' + this.bairro + ' ' + this.cidade + ' ' + this.estado;
        this.getLatLong(address);
      }

      if (this.edit_end) {
        this.http.post(this.link.api_url + 'enderecos/edit', 
                                      {'Endereco': 
                                        {'id': this.end.id,
                                         'rua': this.rua, 
                                         'cep': this.cep, 
                                         'numero': this.numero, 
                                         'complemento': this.complemento, 
                                         'bairro': this.bairro, 
                                         'cidade': this.cidade, 
                                         'estado': this.estado,
                                         'lat': this.lat,
                                         'lng': this.lng,
                                         'cliente_id': this.cliente['Cliente']['id']
                                        }
                                      })
        
        .subscribe(data => {
          this.goToHome(this.cliente);
        }, 
        err =>{
          let toast = this.toastCtrl.create({
            message: "Erro ao salvar endereço, por favor tente novamente",
            duration: 3000,
            position: 'top'
          });
          toast.present()
        });
      } else {
        this.http.post(this.link.api_url + 'enderecos/add', 
                                      {'Endereco': 
                                        {'rua': this.rua, 
                                         'cep': this.cep, 
                                         'numero': this.numero, 
                                         'complemento': this.complemento, 
                                         'bairro': this.bairro, 
                                         'cidade': this.cidade, 
                                         'estado': this.estado,
                                         'lat': this.lat,
                                         'lng': this.lng,
                                         'cliente_id': this.cliente['Cliente']['id']
                                        }
                                      })
        .map(res => res.json())
        .subscribe(data => {
          this.goToHome(this.cliente);
        }, 
        err =>{
          let toast = this.toastCtrl.create({
            message: "Erro ao inserir endereço, por favor tente novamente",
            duration: 3000,
            position: 'top'
          });
          toast.present()
        });
      }
    } else {
      let toast = this.toastCtrl.create({
        message: "Por favor, preencha o seu endereço",
        duration: 3000,
        position: 'top'
      });
      toast.present()
    }
  }
}
