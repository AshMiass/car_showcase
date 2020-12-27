import { BrowserModule } from '@angular/platform-browser';
import { NgModule, LOCALE_ID } from '@angular/core';
import { HttpClientModule } from "@angular/common/http";
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ApiService } from './service/api.service';
import { WrapperListComponent } from './components/wrapper/list/wrapperlist.component';
import { ListComponent } from './components/list/list.component';
import { RequestComponent } from './components/request/request.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { CarMaterialModule } from "./material.module";
import { FormsModule, ReactiveFormsModule } from "@angular/forms";
import { RouterModule } from '@angular/router';
import { NgPipesModule } from 'ngx-pipes';
import { BrandPipe } from "./pipes/brand.pipe";
import { CarCardComponent } from "./components/car-card/car-card.component";
import { registerLocaleData } from '@angular/common';
import localeRu from '@angular/common/locales/ru';
registerLocaleData(localeRu, 'ru');

@NgModule({
  imports: [
    NgPipesModule,
    BrowserModule,
    HttpClientModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    CarMaterialModule,
    FormsModule,
    ReactiveFormsModule,
    RouterModule
  ],
  providers: [
    ApiService,
    { provide: LOCALE_ID, useValue: 'ru' }
  ],
  declarations: [
    AppComponent,
    WrapperListComponent,
    ListComponent,
    RequestComponent,
    BrandPipe,
    CarCardComponent
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
