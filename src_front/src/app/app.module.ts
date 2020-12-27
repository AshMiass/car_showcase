import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
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


@NgModule({
  imports: [
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
    ApiService
  ],
  declarations: [
    AppComponent,
    WrapperListComponent,
    ListComponent,
    RequestComponent
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
