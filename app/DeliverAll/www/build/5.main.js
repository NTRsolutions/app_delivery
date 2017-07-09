webpackJsonp([5],{

/***/ 277:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(28);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__meu_perfil__ = __webpack_require__(286);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "MeuPerfilPageModule", function() { return MeuPerfilPageModule; });
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var MeuPerfilPageModule = (function () {
    function MeuPerfilPageModule() {
    }
    return MeuPerfilPageModule;
}());
MeuPerfilPageModule = __decorate([
    __webpack_require__.i(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
        declarations: [
            __WEBPACK_IMPORTED_MODULE_2__meu_perfil__["a" /* MeuPerfilPage */],
        ],
        imports: [
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["d" /* IonicPageModule */].forChild(__WEBPACK_IMPORTED_MODULE_2__meu_perfil__["a" /* MeuPerfilPage */]),
        ],
        exports: [
            __WEBPACK_IMPORTED_MODULE_2__meu_perfil__["a" /* MeuPerfilPage */]
        ]
    })
], MeuPerfilPageModule);

//# sourceMappingURL=meu-perfil.module.js.map

/***/ }),

/***/ 286:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(28);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return MeuPerfilPage; });
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


/**
 * Generated class for the MeuPerfilPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
var MeuPerfilPage = (function () {
    function MeuPerfilPage(navCtrl, navParams) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
    }
    MeuPerfilPage.prototype.ionViewDidLoad = function () {
        console.log('ionViewDidLoad MeuPerfilPage');
    };
    return MeuPerfilPage;
}());
MeuPerfilPage = __decorate([
    __webpack_require__.i(__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["e" /* IonicPage */])(),
    __webpack_require__.i(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
        selector: 'page-meu-perfil',template:/*ion-inline-start:"C:\wamp\www\app_delivery\app\DeliverAll\src\pages\meu-perfil\meu-perfil.html"*/'<!--\n  Generated template for the MeuPerfilPage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n  <ion-navbar>\n    <ion-title>meu_perfil</ion-title>\n  </ion-navbar>\n\n</ion-header>\n\n\n<ion-content padding>\n\n</ion-content>\n'/*ion-inline-end:"C:\wamp\www\app_delivery\app\DeliverAll\src\pages\meu-perfil\meu-perfil.html"*/,
    }),
    __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["f" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["g" /* NavParams */]])
], MeuPerfilPage);

//# sourceMappingURL=meu-perfil.js.map

/***/ })

});
//# sourceMappingURL=5.main.js.map