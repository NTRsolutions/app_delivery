import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { AddProdutoCarrinhoPage } from './add-produto-carrinho';

@NgModule({
  declarations: [
    AddProdutoCarrinhoPage,
  ],
  imports: [
    IonicPageModule.forChild(AddProdutoCarrinhoPage),
  ],
  exports: [
    AddProdutoCarrinhoPage
  ]
})
export class AddProdutoCarrinhoPageModule {}
