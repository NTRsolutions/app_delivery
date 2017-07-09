import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { SugestaoPage } from './sugestao';

@NgModule({
  declarations: [
    SugestaoPage,
  ],
  imports: [
    IonicPageModule.forChild(SugestaoPage),
  ],
  exports: [
    SugestaoPage
  ]
})
export class SugestaoPageModule {}
