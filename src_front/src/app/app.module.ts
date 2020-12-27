import { BrowserModule } from '@angular/platform-browser';
import { NgModule, LOCALE_ID } from '@angular/core';
import { HttpClientModule } from "@angular/common/http";
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ApiService } from './service/api.service';
import { MainComponent } from './components/main/main.component';
import { ListComponent } from './components/list/list.component';
import { RequestComponent } from './components/request/request.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { CarMaterialModule } from "./material.module";
// import { MAT_DIALOG_DATA } from "@angular/material/dialog";
import { FormsModule, ReactiveFormsModule } from "@angular/forms";
import { RouterModule } from '@angular/router';
import { BrandPipe } from "./pipes/brand.pipe";
import { WithLoadingPipe } from "./pipes/withLoading.pipe";
import { CarCardComponent } from "./components/car-card/car-card.component";
import { registerLocaleData } from '@angular/common';
import localeRu from '@angular/common/locales/ru';
import { ThanksComponent } from './components/thanks/thanks.component';
import { MatDialogModule } from "@angular/material/dialog";
import { PersonalDataProcessAcceptComponent } from "./components/personal-data/process-accept/process-accept.component";
import { PersonalDataProcessingPolicyComponent } from "./components/personal-data/data-processing-policy/data-processing-policy.component";
registerLocaleData(localeRu, 'ru');

@NgModule({
  imports: [
    BrowserModule,
    HttpClientModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    CarMaterialModule,
    FormsModule,
    ReactiveFormsModule,
    RouterModule,
    MatDialogModule
  ],
  // entryComponents:[ThanksComponent],
  providers: [
    ApiService,
    { provide: LOCALE_ID, useValue: 'ru' }
  ],
  declarations: [
    AppComponent,
    MainComponent,
    ListComponent,
    RequestComponent,
    BrandPipe,
    WithLoadingPipe,
    CarCardComponent,
    ThanksComponent,
    PersonalDataProcessAcceptComponent,
    PersonalDataProcessingPolicyComponent
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
