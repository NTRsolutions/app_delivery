import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { TextMaskModule } from 'angular2-text-mask';

import { AppPreferences } from '@ionic-native/app-preferences';
import { HttpModule } from '@angular/http';
import { Geolocation } from '@ionic-native/geolocation';
import { NativeGeocoder } from '@ionic-native/native-geocoder';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { PedidosPage } from '../pages/pedidos/pedidos';
import { AddProdutoCarrinhoPage } from '../pages/add-produto-carrinho/add-produto-carrinho';
import { LoginPage } from '../pages/login/login';
import { CadastroPage } from '../pages/cadastro/cadastro';
import { EnderecoPage } from '../pages/endereco/endereco';
import { RestaurantePage } from '../pages/restaurante/restaurante';
import { MeuPerfilPage } from '../pages/meu-perfil/meu-perfil';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { LogineventProvider } from '../providers/loginevent/loginevent';

@NgModule({
  declarations: [
    MyApp,
    HomePage,
    LoginPage,
    CadastroPage,
    EnderecoPage,
    RestaurantePage,
    MeuPerfilPage,
    PedidosPage,
    AddProdutoCarrinhoPage
  ],
  imports: [
    HttpModule,
    BrowserModule,
    TextMaskModule,
    IonicModule.forRoot(MyApp),
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    LoginPage,
    CadastroPage,
    EnderecoPage,
    RestaurantePage,
    MeuPerfilPage,
    PedidosPage,
    AddProdutoCarrinhoPage
  ],
  providers: [
    StatusBar,
    AppPreferences,
    SplashScreen,
    Geolocation,
    NativeGeocoder,  
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    LogineventProvider,
    LogineventProvider
  ]
})
export class AppModule {}
