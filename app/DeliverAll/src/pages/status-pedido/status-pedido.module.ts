import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { StatusPedidoPage } from './status-pedido';

@NgModule({
  declarations: [
    StatusPedidoPage,
  ],
  imports: [
    IonicPageModule.forChild(StatusPedidoPage),
  ],
  exports: [
    StatusPedidoPage
  ]
})
export class StatusPedidoPageModule {}
