import { Component, ViewChild } from '@angular/core';
import { Nav, Platform, App } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { AppPreferences } from '@ionic-native/app-preferences';

import { HomePage } from '../pages/home/home';
import { LoginPage } from '../pages/login/login';
import { CadastroPage } from '../pages/cadastro/cadastro';
import { EnderecoPage } from '../pages/endereco/endereco';
import { RestaurantePage } from '../pages/restaurante/restaurante';

@Component({
  templateUrl: 'app.html'
})
export class MyApp {
  @ViewChild(Nav) nav: Nav;

  rootPage: any = LoginPage;

  pages: Array<{title: string, component: any}>;

  logado: boolean;

  constructor(public platform: Platform, public statusBar: StatusBar, public splashScreen: SplashScreen, private appPreferences: AppPreferences, private app: App) {
    this.initializeApp();

    // used for an example of ngFor and navigation
    this.pages = [
      { title: 'Home', component: HomePage },
      { title: 'Login', component: LoginPage },
      { title: 'Cadastro', component: CadastroPage },
      { title: 'Endereco', component: EnderecoPage }
    ];

    this.logado = false;
    this.appPreferences.fetch('key').then((res) => { 
      if (res != '') {
        this.logado = true;
      }
    });
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
    this.appPreferences.remove('key').then((res) => { 
      if (res != '') {
        this.app.getActiveNav().setRoot(LoginPage);
      }
    });
  }
}
