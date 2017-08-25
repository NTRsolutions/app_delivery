import { Component, ViewChild } from '@angular/core';
import { Nav, Platform, App, Events, ToastController } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { AppPreferences } from '@ionic-native/app-preferences';

import { HomePage } from '../pages/home/home';
import { LoginPage } from '../pages/login/login';
import { CadastroPage } from '../pages/cadastro/cadastro';
import { EnderecoPage } from '../pages/endereco/endereco';
import { RestaurantePage } from '../pages/restaurante/restaurante';
import { MeuPerfilPage } from '../pages/meu-perfil/meu-perfil';

import { Cliente } from '../models/cliente';
import { Link } from '../models/link';

import { LogineventProvider } from '../providers/loginevent/loginevent';

import { Http } from '@angular/http';

import 'rxjs/add/operator/map';

@Component({
  templateUrl: 'app.html'
})
export class MyApp {
  @ViewChild(Nav) nav: Nav;

  rootPage: any = LoginPage;

  pages: Array<{title: string, component: any}>;

  logado: boolean;
  cliente_carregado: boolean;
  id: any;

  cliente: Cliente;
  cliente_parametro: Cliente;
  link: Link;

  constructor(public platform: Platform, public statusBar: StatusBar, public splashScreen: SplashScreen, private appPreferences: AppPreferences, private app: App, public events: Events, public loginevent: LogineventProvider, public http: Http, private toastCtrl: ToastController) {
    this.initializeApp();

    // used for an example of ngFor and navigation
    this.pages = [
      /*{ title: 'Home', component: HomePage },
      { title: 'Login', component: LoginPage },
      { title: 'Cadastro', component: CadastroPage },
      { title: 'Endereco', component: EnderecoPage }*/
    ];

    this.link = new Link();

    this.logado = false;
    this.appPreferences.fetch('key').then((res) => { 
      if (res != '') {
        this.logado = true;
      }
    });

    this.listenToLoginEvents();
    this.setId();
  }

  initializeApp() {
    this.platform.ready().then(() => {
      // Okay, so the platform is ready and our plugins are available.
      // Here you can do any higher level native things you might need.
      this.statusBar.styleDefault();
      this.splashScreen.hide();
    });
  }

  openPage(page) {
    // Reset the content nav to have just this page
    // we wouldn't want the back button to show in this scenario
    this.nav.setRoot(page.component);
  }

  logout() {
    this.logado = false;
    this.cliente_carregado = false;
    this.appPreferences.remove('key').then((res) => { 
      if (res != '') {
        this.app.getActiveNav().setRoot(LoginPage);
      }
    });
  }

  listenToLoginEvents() {
    this.events.subscribe('user:login', () => {
      this.logado = true;
      this.setId();
    });

    this.events.subscribe('user:cadastro', () => {
      this.logado = true;
      this.setId();
    });
  }

  setId() {
    this.appPreferences.fetch('key').then((res) => { 
      if (res != '') {
        this.id = res;
        this.getCliente();
      }
    });
  }

  meu_perfil() {
    this.app.getActiveNav().setRoot(MeuPerfilPage, {id: this.id});
  }

  goToHome() {
    console.log(this.cliente_parametro)
    this.app.getActiveNav().setRoot(HomePage, {cliente: this.cliente_parametro});
  }

  getCliente() {
    this.http.post(this.link.api_url + 'clientes/get', {'id': this.id})
      .map(res => res.json())
      .subscribe(data => { 
        if (typeof data.message == "object") {
          this.setCliente(data.message['0']['Cliente']);
          this.cliente_parametro = data.message['0'];
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

  setCliente(cliente: any) {
    this.cliente = new Cliente(
        cliente['id'],
        cliente['nome'],
        cliente['email'],
        cliente['senha'],
        cliente['telefone1'],
        cliente['telefone2']);
    this.cliente_carregado = true;
  }
}
 