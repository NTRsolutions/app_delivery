import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { ComplementoPage } from './complemento';

@NgModule({
  declarations: [
    ComplementoPage,
  ],
  imports: [
    IonicPageModule.forChild(ComplementoPage),
  ],
  exports: [
    ComplementoPage
  ]
})
export class ComplementoPageModule {}
