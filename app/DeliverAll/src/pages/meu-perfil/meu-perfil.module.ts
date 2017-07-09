import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { MeuPerfilPage } from './meu-perfil';

@NgModule({
  declarations: [
    MeuPerfilPage,
  ],
  imports: [
    IonicPageModule.forChild(MeuPerfilPage),
  ],
  exports: [
    MeuPerfilPage
  ]
})
export class MeuPerfilPageModule {}
