import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';
import { Cliente } from '../../models/cliente';

import { HomePage } from '../home/home';
import { Http } from '@angular/http';
import { Geolocation } from '@ionic-native/geolocation';
import { NativeGeocoder, NativeGeocoderReverseResult } from '@ionic-native/native-geocoder';

import 'rxjs/add/operator/map';

/**
 * Generated class for the Endereco page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-endereco',
  templateUrl: 'endereco.html',
})
export class EnderecoPage {

	public api_url: string;
  public maps_url: string;
	public cep_url_ini: string;
	public cep_url_end: string;
	cliente: Cliente;
  mask: any = "";
  cep_informado: boolean = false;
  
  cep: string;
  rua: string;
  numero: number;
  complemento: string;
  bairro: string;
  cidade: string;
  estado: string;
  items: string[];
  showList: boolean;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, private toastCtrl: ToastController, public geolocation: Geolocation, public geocoder: NativeGeocoder) {
  	this.api_url = 'http://192.168.0.13:80/app_delivery/webservice/';
    this.maps_url = 'http://maps.google.com/maps/api/js?key=AIzaSyBSmyP1-LsT1xk072vjsPcB-yyBUWrdD3A';
  	this.cep_url_ini = 'http://viacep.com.br/ws/';
  	this.cep_url_end = '/json/?callback=';

  	this.cliente = navParams.get("cliente");

  	this.mask = [/[1-9]/, /\d/, /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/];

    this.initializeItems();
  }

  ionViewDidLoad() {
    if(typeof this.cliente == 'string'){
  		this.http.post(this.api_url + 'clientes/get', {'id': this.cliente})
      .map(res => res.json())
      .subscribe(data => {       
        
        if (typeof data.message == "object") {
          this.cliente = data.message['0']; 
          
          if (this.cliente['ClienteEndereco'].length != 0) {
          	this.goToHome(this.cliente);
          }
        } else {
          let toast = this.toastCtrl.create({
		        message: "Ocorreu algum erro, tente novamente!",
		        duration: 3000,
		        position: 'top'
		      });
		      toast.present();
        }
    	});
  	} else {
      if (this.cliente['ClienteEndereco'].length != 0) {
        this.goToHome(this.cliente);
      }
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

    	this.http.get(this.cep_url_ini + this.cep + this.cep_url_end)
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
    this.geolocation.getCurrentPosition().then(
      (position) => { 
         //console.log(position.coords.latitude + ' - ' + position.coords.longitude); 
         this.getAddress(position);
      }, 
      (err) => {
        let toast = this.toastCtrl.create({
          message: "Erro, por favor tente novamente",
          duration: 3000,
          position: 'top'
        });
        toast.present()
      }
    ); 
  }

  getAddress(pos) {
    this.geocoder.reverseGeocode(pos.coords.latitude, pos.coords.longitude).then((res: NativeGeocoderReverseResult) => {
      this.cep_informado = true;
      this.rua = res.street;
      this.bairro = res.district;
      this.cidade = res.city;
    },
    (err) => {
      let toast = this.toastCtrl.create({
        message: "Erro, por favor tente novamente",
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
      this.http.post(this.api_url + 'enderecos/add', 
                                    {'Endereco': 
                                      {'rua': this.rua, 
                                       'cep': this.cep, 
                                       'numero': this.numero, 
                                       'complemento': this.complemento, 
                                       'bairro': this.bairro, 
                                       'cidade': this.cidade, 
                                       'estado': this.estado, 
                                       'cliente_id': this.cliente['Cliente']['id']
                                      }
                                    })
      .map(res => res.json())
      .subscribe(data => {
        console.log(data);
        //this.goToHome(this.cliente);
      });
    } else {
      let toast = this.toastCtrl.create({
        message: "Por favor, preencha o seu endereço",
        duration: 3000,
        position: 'top'
      });
      toast.present()
    }
  }

  initializeItems() {
    this.items = [
      'AC',   
      'AL',   
      'AP',   
      'AM',   
      'BA',   
      'CE',   
      'DF',   
      'ES',   
      'GO',   
      'MA',   
      'MT',   
      'MS',   
      'MG',   
      'PA',   
      'PB',   
      'PR',   
      'PE',   
      'PI',   
      'RJ',   
      'RN',   
      'RS',   
      'RO',   
      'RR',   
      'SC',   
      'SP',   
      'SE',   
      'TO'
    ];
  }

  getEstados(ev: any) {
    // Reset items back to all of the items
    this.initializeItems();

    // set val to the value of the searchbar
    let val = ev.target.value;

    // if the value is an empty string don't filter the items
    if (val && val.trim() != '') {
      
      // Filter the items
      this.items = this.items.filter((item) => {
        return (item.toLowerCase().indexOf(val.toLowerCase()) > -1);
      });
      
      // Show the results
      this.showList = true;
    } else {
      
      // hide the results when the query is empty
      this.showList = false;
    }
  }
}
