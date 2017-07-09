import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { TipoPagamentoPage } from './tipo-pagamento';

@NgModule({
  declarations: [
    TipoPagamentoPage,
  ],
  imports: [
    IonicPageModule.forChild(TipoPagamentoPage),
  ],
  exports: [
    TipoPagamentoPage
  ]
})
export class TipoPagamentoPageModule {}
