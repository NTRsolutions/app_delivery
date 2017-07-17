export class Link {
  	api_url: string;
    /*this.maps_url_ini = 'https://maps.googleapis.com/maps/api/geocode/json?address=';
    this.maps_url_end = '&key=AIzaSyAcSWtNDWRyJ_DERHgP5yWv2QkacKeqaYU';*/
  	cep_url_ini: string;
  	cep_url_end: string;

  	constructor() {
		  this.api_url = 'http://deliverall-com-br.umbler.net/webservice/';
		  this.cep_url_ini = 'http://viacep.com.br/ws/';
  		this.cep_url_end = '/json/?callback=';
  	}
}