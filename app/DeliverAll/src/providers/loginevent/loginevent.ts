import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Events } from 'ionic-angular';
import 'rxjs/add/operator/map';

/*
  Generated class for the LogineventProvider provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class LogineventProvider {

  constructor(public events: Events, public http: Http) {
    
  }

  login() {
  	this.events.publish('user:login');
  }

  cadastro() {
  	this.events.publish('user:cadastro');
  }
}
